cl = console.log.bind();
// *************************************************

var express = require('express');
var app = express();
var bodyParser = require('body-parser');
var mysql = require('mysql');

// *************************************************

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({
    extended: true
}));

// *************************************************

var dbCon = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'green_house'
});

// *************************************************

app.get('/', function(_req, res) {
    // dbCon.query('SELECT topic_send FROM plots', function(error, results, _fields) {
    //     if (error) throw error;



    //     return res.send(results);
    // });

    // return res.send({
    //     error: true,
    //     message: 'yyyy',
    //     results: results[0]
    // });
});

// *************************************************

app.listen(3000, function() {
    console.log('Runnig on port 3000');
});

module.exports = app;

// *************************************************

dbCon.query('SELECT topic_send,topic_sub,host,id FROM plots', function(error, get_topic_send, _fields) {
    var topic_send = get_topic_send;
    for (let zero = 0; zero < topic_send.length; zero++) {
        var idPlot = topic_send[zero].id;
        var topicSend = topic_send[zero].topic_send;
        var topicSub = topic_send[zero].topic_sub;
        var Host = topic_send[zero].host;
        var mqtt = require('mqtt');
        // var Broker_URL = 'mqtt://broker.hivemq.com:1883';
        var Broker_URL = 'mqtt://' + Host + ':1883';

        var options = {
            clientId: 'mqttjs_' + Math.random().toString(16),
            port: 1883,
            //username: 'mqtt_user',
            //password: 'mqtt_password',	
            // keepalive: 60
        };

        var client = mqtt.connect(Broker_URL, options);
        client.on('connect', mqtt_connect);
        client.on('reconnect', mqtt_reconnect);
        client.on('error', mqtt_error);
        client.on('message', mqtt_messsageReceived);
        // client.on('close', mqtt_close);

        function mqtt_connect(topicSend) {
            // console.log("Connecting MQTT");
            client.subscribe(topic_send[zero].topic_send, mqtt_subscribe);
        }

        function mqtt_subscribe(err, topicSend) {
            // console.log("Subscribed to " + topic_send[zero].topic_send);
            // console.log("Subscribed to " + topicSend);
            if (err) { console.log(err); }
        }

        function mqtt_reconnect(err) {
            //console.log("Reconnect MQTT");
            if (err) { console.log(err); }
            client = mqtt.connect(Broker_URL, options);
        }

        function mqtt_error(err) {
            // console.log("Error!");
            if (err) { console.log(err); }
        }

        function mqtt_messsageReceived(topicSend, message, packet) {
            obj = eval("(function(){return " + message + ";})()");
            // console.log('Message received = ' + " " + topicSend);

            const now = new Date();
            const zeroFill = n => {
                return ('0' + n).slice(-2);
            }
            const countSeconds = zeroFill(now.getSeconds());
            dateNow = now.getFullYear() + "-" + (now.getMonth() + 1) + "-" + now.getDate();

            // dbCon.query('SELECT id FROM plots', function(error, get_plotID, _fields) {
            //         var plotID = get_plotID[zero].id;
            var insertTemps = "INSERT INTO temps (??, ??, ??, ??) VALUES (?, ?, ?, ?)";
            var paramTemps = ['temp', 'plot_id', 'created_at', 'date', obj.temp, idPlot, now, dateNow];
            insertTemps = mysql.format(insertTemps, paramTemps);

            var insertHumids = "INSERT INTO humids (??, ??, ??, ??) VALUES (?, ?, ?, ?)";
            var paramHumids = ['humid', 'plot_id', 'created_at', 'date', obj.humid, idPlot, now, dateNow];
            insertHumids = mysql.format(insertHumids, paramHumids);

            setTimeout(function() {
                if (countSeconds == 00) {
                    dbCon.query(insertTemps, function(error, results) {
                        // if (error) throw error;
                        console.log("Temps 1 record inserted");
                    });
                    dbCon.query(insertHumids, function(error, results) {
                        // if (error) throw error;
                        console.log("Humid 1 record inserted");
                    });
                }
            }, 100);
            // setInterval(function() {
            // }, 100);
        }

        setInterval(function() {
                dbCon.query('SELECT name,plot_id,port,start_time,stop_time,status FROM switch_time_sets', function(error, switch_time_set, _fields) {
                    var switch_time_sets = switch_time_set;
                    const zeroFill = n => {
                        return ('0' + n).slice(-2);
                    }
                    for (let zero = 0; zero < switch_time_sets.length; zero++) {
                        const newDate = new Date();
                        const nowTime = zeroFill(newDate.getHours()) + ':' + zeroFill(newDate.getMinutes()) + ':' + zeroFill(newDate.getSeconds());
                        const nowDate = newDate.getFullYear() + "-" + zeroFill(newDate.getMonth() + 1) + "-" + zeroFill(newDate.getDate()) + " " + zeroFill(newDate.getHours()) + ':' + zeroFill(newDate.getMinutes()) + ':' + zeroFill(newDate.getSeconds());

                        if (nowTime == switch_time_sets[zero].start_time) {
                            setTimeout(function() {
                                    if (switch_time_sets[zero].port == 'soc_0') {
                                        client.publish(topicSub, '{"soc":0,"status":1}');
                                        dbCon.query("UPDATE switch_time_sets SET status = 1 WHERE plot_id = " + "'" + switch_time_sets[zero].plot_id + "'" + " AND port = " + "'" + switch_time_sets[zero].port + "'");
                                        dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                            "'" + switch_time_sets[zero].name + "'" + ", " + "'" + switch_time_sets[zero].port + "'" + ", " + "'" + 1 + "'" + ", " + "'" + switch_time_sets[zero].plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                    }
                                    if (switch_time_sets[zero].port == 'soc_1') {
                                        client.publish(topicSub, '{"soc":1,"status":1}');
                                        dbCon.query("UPDATE switch_time_sets SET status = 1 WHERE plot_id = " + "'" + switch_time_sets[zero].plot_id + "'" + " AND port = " + "'" + switch_time_sets[zero].port + "'");
                                        dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                            "'" + switch_time_sets[zero].name + "'" + ", " + "'" + switch_time_sets[zero].port + "'" + ", " + "'" + 1 + "'" + ", " + "'" + switch_time_sets[zero].plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                    }
                                    if (switch_time_sets[zero].port == 'soc_2') {
                                        client.publish(topicSub, '{"soc":2,"status":1}');
                                        dbCon.query("UPDATE switch_time_sets SET status = 1 WHERE plot_id = " + "'" + switch_time_sets[zero].plot_id + "'" + " AND port = " + "'" + switch_time_sets[zero].port + "'");
                                        dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                            "'" + switch_time_sets[zero].name + "'" + ", " + "'" + switch_time_sets[zero].port + "'" + ", " + "'" + 1 + "'" + ", " + "'" + switch_time_sets[zero].plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                    }
                                    if (switch_time_sets[zero].port == 'soc_3') {
                                        client.publish(topicSub, '{"soc":3,"status":1}');
                                        dbCon.query("UPDATE switch_time_sets SET status = 1 WHERE plot_id = " + "'" + switch_time_sets[zero].plot_id + "'" + " AND port = " + "'" + switch_time_sets[zero].port + "'");
                                        dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                            "'" + switch_time_sets[zero].name + "'" + ", " + "'" + switch_time_sets[zero].port + "'" + ", " + "'" + 1 + "'" + ", " + "'" + switch_time_sets[zero].plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                    }
                                    if (switch_time_sets[zero].port == 'soc_4') {
                                        client.publish(topicSub, '{"soc":4,"status":1}');
                                        dbCon.query("UPDATE switch_time_sets SET status = 1 WHERE plot_id = " + "'" + switch_time_sets[zero].plot_id + "'" + " AND port = " + "'" + switch_time_sets[zero].port + "'");
                                        dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                            "'" + switch_time_sets[zero].name + "'" + ", " + "'" + switch_time_sets[zero].port + "'" + ", " + "'" + 1 + "'" + ", " + "'" + switch_time_sets[zero].plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                    }
                                    if (switch_time_sets[zero].port == 'soc_5') {
                                        client.publish(topicSub, '{"soc":5,"status":1}');
                                        dbCon.query("UPDATE switch_time_sets SET status = 1 WHERE plot_id = " + "'" + switch_time_sets[zero].plot_id + "'" + " AND port = " + "'" + switch_time_sets[zero].port + "'");
                                        dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                            "'" + switch_time_sets[zero].name + "'" + ", " + "'" + switch_time_sets[zero].port + "'" + ", " + "'" + 1 + "'" + ", " + "'" + switch_time_sets[zero].plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                    }
                                    if (switch_time_sets[zero].port == 'soc_6') {
                                        client.publish(topicSub, '{"soc":6,"status":1}');
                                        dbCon.query("UPDATE switch_time_sets SET status = 1 WHERE plot_id = " + "'" + switch_time_sets[zero].plot_id + "'" + " AND port = " + "'" + switch_time_sets[zero].port + "'");
                                        dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                            "'" + switch_time_sets[zero].name + "'" + ", " + "'" + switch_time_sets[zero].port + "'" + ", " + "'" + 1 + "'" + ", " + "'" + switch_time_sets[zero].plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                    }
                                    if (switch_time_sets[zero].port == 'soc_7') {
                                        client.publish(topicSub, '{"soc":7,"status":1}');
                                        dbCon.query("UPDATE switch_time_sets SET status = 1 WHERE plot_id = " + "'" + switch_time_sets[zero].plot_id + "'" + " AND port = " + "'" + switch_time_sets[zero].port + "'");
                                        dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                            "'" + switch_time_sets[zero].name + "'" + ", " + "'" + switch_time_sets[zero].port + "'" + ", " + "'" + 1 + "'" + ", " + "'" + switch_time_sets[zero].plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                    }
                                },
                                1000);
                        }
                        if (nowTime == switch_time_sets[zero].stop_time) {
                            setTimeout(function() {

                                    if (switch_time_sets[zero].port == 'soc_0') {
                                        client.publish(topicSub, '{"soc":0,"status":0}');
                                        dbCon.query("UPDATE switch_time_sets SET status = 0 WHERE plot_id = " + "'" + switch_time_sets[zero].plot_id + "'" + " AND port = " + "'" + switch_time_sets[zero].port + "'");
                                        dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                            "'" + switch_time_sets[zero].name + "'" + ", " + "'" + switch_time_sets[zero].port + "'" + ", " + "'" + 0 + "'" + ", " + "'" + switch_time_sets[zero].plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                    }
                                    if (switch_time_sets[zero].port == 'soc_1') {
                                        client.publish(topicSub, '{"soc":1,"status":0}');
                                        dbCon.query("UPDATE switch_time_sets SET status = 0 WHERE plot_id = " + "'" + switch_time_sets[zero].plot_id + "'" + " AND port = " + "'" + switch_time_sets[zero].port + "'");
                                        dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                            "'" + switch_time_sets[zero].name + "'" + ", " + "'" + switch_time_sets[zero].port + "'" + ", " + "'" + 0 + "'" + ", " + "'" + switch_time_sets[zero].plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                    }
                                    if (switch_time_sets[zero].port == 'soc_2') {
                                        client.publish(topicSub, '{"soc":2,"status":0}');
                                        dbCon.query("UPDATE switch_time_sets SET status = 0 WHERE plot_id = " + "'" + switch_time_sets[zero].plot_id + "'" + " AND port = " + "'" + switch_time_sets[zero].port + "'");
                                        dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                            "'" + switch_time_sets[zero].name + "'" + ", " + "'" + switch_time_sets[zero].port + "'" + ", " + "'" + 0 + "'" + ", " + "'" + switch_time_sets[zero].plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                    }
                                    if (switch_time_sets[zero].port == 'soc_3') {
                                        client.publish(topicSub, '{"soc":3,"status":0}');
                                        dbCon.query("UPDATE switch_time_sets SET status = 0 WHERE plot_id = " + "'" + switch_time_sets[zero].plot_id + "'" + " AND port = " + "'" + switch_time_sets[zero].port + "'");
                                        dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                            "'" + switch_time_sets[zero].name + "'" + ", " + "'" + switch_time_sets[zero].port + "'" + ", " + "'" + 0 + "'" + ", " + "'" + switch_time_sets[zero].plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                    }
                                    if (switch_time_sets[zero].port == 'soc_4') {
                                        client.publish(topicSub, '{"soc":4,"status":0}');
                                        dbCon.query("UPDATE switch_time_sets SET status = 0 WHERE plot_id = " + "'" + switch_time_sets[zero].plot_id + "'" + " AND port = " + "'" + switch_time_sets[zero].port + "'");
                                        dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                            "'" + switch_time_sets[zero].name + "'" + ", " + "'" + switch_time_sets[zero].port + "'" + ", " + "'" + 0 + "'" + ", " + "'" + switch_time_sets[zero].plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                    }
                                    if (switch_time_sets[zero].port == 'soc_5') {
                                        client.publish(topicSub, '{"soc":5,"status":0}');
                                        dbCon.query("UPDATE switch_time_sets SET status = 0 WHERE plot_id = " + "'" + switch_time_sets[zero].plot_id + "'" + " AND port = " + "'" + switch_time_sets[zero].port + "'");
                                        dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                            "'" + switch_time_sets[zero].name + "'" + ", " + "'" + switch_time_sets[zero].port + "'" + ", " + "'" + 0 + "'" + ", " + "'" + switch_time_sets[zero].plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                    }
                                    if (switch_time_sets[zero].port == 'soc_6') {
                                        client.publish(topicSub, '{"soc":6,"status":0}');
                                        dbCon.query("UPDATE switch_time_sets SET status = 0 WHERE plot_id = " + "'" + switch_time_sets[zero].plot_id + "'" + " AND port = " + "'" + switch_time_sets[zero].port + "'");
                                        dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                            "'" + switch_time_sets[zero].name + "'" + ", " + "'" + switch_time_sets[zero].port + "'" + ", " + "'" + 0 + "'" + ", " + "'" + switch_time_sets[zero].plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                    }
                                    if (switch_time_sets[zero].port == 'soc_7') {
                                        client.publish(topicSub, '{"soc":7,"status":0}');
                                        dbCon.query("UPDATE switch_time_sets SET status = 0 WHERE plot_id = " + "'" + switch_time_sets[zero].plot_id + "'" + " AND port = " + "'" + switch_time_sets[zero].port + "'");
                                        dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                            "'" + switch_time_sets[zero].name + "'" + ", " + "'" + switch_time_sets[zero].port + "'" + ", " + "'" + 0 + "'" + ", " + "'" + switch_time_sets[zero].plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                    }
                                },
                                1000);
                        }
                    }
                });
            },
            1000);
        // client.publish(topicSub, '{"soc":0,"status":0}', function() {
        //     console.log("Message is published");
        // });
    }
});

// *************************************************