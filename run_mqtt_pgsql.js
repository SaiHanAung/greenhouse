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

// var dbCon = mysql.createConnection({
//     host: 'localhost',
//     user: 'root',
//     password: '',
//     database: 'green_house'
// });

const { Client } = require('pg');

const dbCon = new Client({
    connectionString: 'postgres://cczpsxupjoovro:780f7dd54d9221af531eac52a66004ba6b8d3c3a5275c5fb97ea37d8c55b2656@ec2-23-23-182-238.compute-1.amazonaws.com:5432/d6q8pl497890ab',
    ssl: {
        rejectUnauthorized: false
    }
});
dbCon.connect();

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
    dbCon.query('SELECT COUNT(topic_send) FROM plots', (err, c_plot) => {
        // var topic_send = get_topic_send;
        for (let topic_send of get_topic_send.rows) {
            // for (let zero = 0; zero < c_plot.rowCount; zero++) {
            var idPlot = topic_send.id;
            var topicSend = topic_send.topic_send;
            var topicSub = topic_send.topic_sub;
            var Host = topic_send.host;
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

            var mqtt_client = mqtt.connect(Broker_URL, options);
            mqtt_client.on('connect', mqtt_connect);
            mqtt_client.on('reconnect', mqtt_reconnect);
            mqtt_client.on('error', mqtt_error);
            mqtt_client.on('message', mqtt_messsageReceived);
            // mqtt_client.on('close', mqtt_close);

            function mqtt_connect(topicSend) {
                console.log("Connecting MQTT");
                mqtt_client.subscribe(topic_send.topic_send, mqtt_subscribe);
            }

            function mqtt_subscribe(err, topicSend) {
                // console.log("Subscribed to " + topic_send.topic_send);
                // console.log("Subscribed to " + topicSend);
                if (err) { console.log(err); }
            }

            function mqtt_reconnect(err) {
                //console.log("Reconnect MQTT");
                if (err) { console.log(err); }
                mqtt_client = mqtt.connect(Broker_URL, options);
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
                //         var plotID = get_plotID.id;
                var insertTemps = "INSERT INTO temps (??, ??, ??, ??) VALUES (?, ?, ?, ?)";
                var paramTemps = ['temp', 'plot_id', 'created_at', 'date', obj.temp, idPlot, now, dateNow];
                insertTemps = mysql.format(insertTemps, paramTemps);

                var insertHumids = "INSERT INTO humids (??, ??, ??, ??) VALUES (?, ?, ?, ?)";
                var paramHumids = ['humid', 'plot_id', 'created_at', 'date', obj.humid, idPlot, now, dateNow];
                insertHumids = mysql.format(insertHumids, paramHumids);

                setTimeout(function() {
                    // if (countSeconds == 00) {
                    dbCon.query(insertTemps, function(error, results) {
                        // if (error) throw error;
                        console.log("Temps 1 record inserted");
                    });
                    dbCon.query(insertHumids, function(error, results) {
                        // if (error) throw error;
                        console.log("Humid 1 record inserted");
                    });
                    // }
                }, 1000);
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

                            if (nowTime == switch_time_sets.start_time) {
                                setTimeout(function() {
                                        if (switch_time_sets.port == 'soc_0') {
                                            mqtt_client.publish(topicSub, '{"soc":0,"status":1}');
                                            dbCon.query("UPDATE switch_time_sets SET status = 1 WHERE plot_id = " + "'" + switch_time_sets.plot_id + "'" + " AND port = " + "'" + switch_time_sets.port + "'");
                                            dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                                "'" + switch_time_sets.name + "'" + ", " + "'" + switch_time_sets.port + "'" + ", " + "'" + 1 + "'" + ", " + "'" + switch_time_sets.plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                        }
                                        if (switch_time_sets.port == 'soc_1') {
                                            mqtt_client.publish(topicSub, '{"soc":1,"status":1}');
                                            dbCon.query("UPDATE switch_time_sets SET status = 1 WHERE plot_id = " + "'" + switch_time_sets.plot_id + "'" + " AND port = " + "'" + switch_time_sets.port + "'");
                                            dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                                "'" + switch_time_sets.name + "'" + ", " + "'" + switch_time_sets.port + "'" + ", " + "'" + 1 + "'" + ", " + "'" + switch_time_sets.plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                        }
                                        if (switch_time_sets.port == 'soc_2') {
                                            mqtt_client.publish(topicSub, '{"soc":2,"status":1}');
                                            dbCon.query("UPDATE switch_time_sets SET status = 1 WHERE plot_id = " + "'" + switch_time_sets.plot_id + "'" + " AND port = " + "'" + switch_time_sets.port + "'");
                                            dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                                "'" + switch_time_sets.name + "'" + ", " + "'" + switch_time_sets.port + "'" + ", " + "'" + 1 + "'" + ", " + "'" + switch_time_sets.plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                        }
                                        if (switch_time_sets.port == 'soc_3') {
                                            mqtt_client.publish(topicSub, '{"soc":3,"status":1}');
                                            dbCon.query("UPDATE switch_time_sets SET status = 1 WHERE plot_id = " + "'" + switch_time_sets.plot_id + "'" + " AND port = " + "'" + switch_time_sets.port + "'");
                                            dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                                "'" + switch_time_sets.name + "'" + ", " + "'" + switch_time_sets.port + "'" + ", " + "'" + 1 + "'" + ", " + "'" + switch_time_sets.plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                        }
                                        if (switch_time_sets.port == 'soc_4') {
                                            mqtt_client.publish(topicSub, '{"soc":4,"status":1}');
                                            dbCon.query("UPDATE switch_time_sets SET status = 1 WHERE plot_id = " + "'" + switch_time_sets.plot_id + "'" + " AND port = " + "'" + switch_time_sets.port + "'");
                                            dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                                "'" + switch_time_sets.name + "'" + ", " + "'" + switch_time_sets.port + "'" + ", " + "'" + 1 + "'" + ", " + "'" + switch_time_sets.plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                        }
                                        if (switch_time_sets.port == 'soc_5') {
                                            mqtt_client.publish(topicSub, '{"soc":5,"status":1}');
                                            dbCon.query("UPDATE switch_time_sets SET status = 1 WHERE plot_id = " + "'" + switch_time_sets.plot_id + "'" + " AND port = " + "'" + switch_time_sets.port + "'");
                                            dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                                "'" + switch_time_sets.name + "'" + ", " + "'" + switch_time_sets.port + "'" + ", " + "'" + 1 + "'" + ", " + "'" + switch_time_sets.plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                        }
                                        if (switch_time_sets.port == 'soc_6') {
                                            mqtt_client.publish(topicSub, '{"soc":6,"status":1}');
                                            dbCon.query("UPDATE switch_time_sets SET status = 1 WHERE plot_id = " + "'" + switch_time_sets.plot_id + "'" + " AND port = " + "'" + switch_time_sets.port + "'");
                                            dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                                "'" + switch_time_sets.name + "'" + ", " + "'" + switch_time_sets.port + "'" + ", " + "'" + 1 + "'" + ", " + "'" + switch_time_sets.plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                        }
                                        if (switch_time_sets.port == 'soc_7') {
                                            mqtt_client.publish(topicSub, '{"soc":7,"status":1}');
                                            dbCon.query("UPDATE switch_time_sets SET status = 1 WHERE plot_id = " + "'" + switch_time_sets.plot_id + "'" + " AND port = " + "'" + switch_time_sets.port + "'");
                                            dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                                "'" + switch_time_sets.name + "'" + ", " + "'" + switch_time_sets.port + "'" + ", " + "'" + 1 + "'" + ", " + "'" + switch_time_sets.plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                        }
                                    },
                                    1000);
                            }
                            if (nowTime == switch_time_sets.stop_time) {
                                setTimeout(function() {

                                        if (switch_time_sets.port == 'soc_0') {
                                            mqtt_client.publish(topicSub, '{"soc":0,"status":0}');
                                            dbCon.query("UPDATE switch_time_sets SET status = 0 WHERE plot_id = " + "'" + switch_time_sets.plot_id + "'" + " AND port = " + "'" + switch_time_sets.port + "'");
                                            dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                                "'" + switch_time_sets.name + "'" + ", " + "'" + switch_time_sets.port + "'" + ", " + "'" + 0 + "'" + ", " + "'" + switch_time_sets.plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                        }
                                        if (switch_time_sets.port == 'soc_1') {
                                            mqtt_client.publish(topicSub, '{"soc":1,"status":0}');
                                            dbCon.query("UPDATE switch_time_sets SET status = 0 WHERE plot_id = " + "'" + switch_time_sets.plot_id + "'" + " AND port = " + "'" + switch_time_sets.port + "'");
                                            dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                                "'" + switch_time_sets.name + "'" + ", " + "'" + switch_time_sets.port + "'" + ", " + "'" + 0 + "'" + ", " + "'" + switch_time_sets.plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                        }
                                        if (switch_time_sets.port == 'soc_2') {
                                            mqtt_client.publish(topicSub, '{"soc":2,"status":0}');
                                            dbCon.query("UPDATE switch_time_sets SET status = 0 WHERE plot_id = " + "'" + switch_time_sets.plot_id + "'" + " AND port = " + "'" + switch_time_sets.port + "'");
                                            dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                                "'" + switch_time_sets.name + "'" + ", " + "'" + switch_time_sets.port + "'" + ", " + "'" + 0 + "'" + ", " + "'" + switch_time_sets.plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                        }
                                        if (switch_time_sets.port == 'soc_3') {
                                            mqtt_client.publish(topicSub, '{"soc":3,"status":0}');
                                            dbCon.query("UPDATE switch_time_sets SET status = 0 WHERE plot_id = " + "'" + switch_time_sets.plot_id + "'" + " AND port = " + "'" + switch_time_sets.port + "'");
                                            dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                                "'" + switch_time_sets.name + "'" + ", " + "'" + switch_time_sets.port + "'" + ", " + "'" + 0 + "'" + ", " + "'" + switch_time_sets.plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                        }
                                        if (switch_time_sets.port == 'soc_4') {
                                            mqtt_client.publish(topicSub, '{"soc":4,"status":0}');
                                            dbCon.query("UPDATE switch_time_sets SET status = 0 WHERE plot_id = " + "'" + switch_time_sets.plot_id + "'" + " AND port = " + "'" + switch_time_sets.port + "'");
                                            dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                                "'" + switch_time_sets.name + "'" + ", " + "'" + switch_time_sets.port + "'" + ", " + "'" + 0 + "'" + ", " + "'" + switch_time_sets.plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                        }
                                        if (switch_time_sets.port == 'soc_5') {
                                            mqtt_client.publish(topicSub, '{"soc":5,"status":0}');
                                            dbCon.query("UPDATE switch_time_sets SET status = 0 WHERE plot_id = " + "'" + switch_time_sets.plot_id + "'" + " AND port = " + "'" + switch_time_sets.port + "'");
                                            dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                                "'" + switch_time_sets.name + "'" + ", " + "'" + switch_time_sets.port + "'" + ", " + "'" + 0 + "'" + ", " + "'" + switch_time_sets.plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                        }
                                        if (switch_time_sets.port == 'soc_6') {
                                            mqtt_client.publish(topicSub, '{"soc":6,"status":0}');
                                            dbCon.query("UPDATE switch_time_sets SET status = 0 WHERE plot_id = " + "'" + switch_time_sets.plot_id + "'" + " AND port = " + "'" + switch_time_sets.port + "'");
                                            dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                                "'" + switch_time_sets.name + "'" + ", " + "'" + switch_time_sets.port + "'" + ", " + "'" + 0 + "'" + ", " + "'" + switch_time_sets.plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                        }
                                        if (switch_time_sets.port == 'soc_7') {
                                            mqtt_client.publish(topicSub, '{"soc":7,"status":0}');
                                            dbCon.query("UPDATE switch_time_sets SET status = 0 WHERE plot_id = " + "'" + switch_time_sets.plot_id + "'" + " AND port = " + "'" + switch_time_sets.port + "'");
                                            dbCon.query("INSERT INTO switch_time_set_logs (name,port,status,plot_id,created_at) VALUES (" +
                                                "'" + switch_time_sets.name + "'" + ", " + "'" + switch_time_sets.port + "'" + ", " + "'" + 0 + "'" + ", " + "'" + switch_time_sets.plot_id + "'" + ", " + "'" + nowDate + "'" + ")");
                                        }
                                    },
                                    1000);
                            }
                        }
                    });
                },
                1000);
            // ******************************
            // mqtt_client.publish(topicSub, '{"soc":0,"status":0}', function() {
            //     console.log("Message is published");
            // });
            // }
        }
    })
});

// *************************************************
// *************************************************