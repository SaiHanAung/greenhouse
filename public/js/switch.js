function myFunction(switchID) {
    var plot_id = document.getElementById('plot_id').value;
    var value = document.getElementById("port_" + switchID).value;
    var valueS = document.getElementById("s_" + switchID).value;

    // MQTT Host
    var host = document.getElementById("input_host").value
    var port = 8000;
    var x = Math.floor(Math.random() * 10000);
    var cname = "controlform-" + x;
    client = mqtt = new Paho.MQTT.Client(host, port, cname);


    if (value == 1) {
        document.getElementById("port_" + switchID).value = 0;

        // MQTT send topic_sub
        client.connect({
            onSuccess: onConnect
        });

        function onConnect() {
            if (valueS == 'soc_0') {
                message = new Paho.MQTT.Message('{"soc":0,"status":0}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message
            }
            if (valueS == 'soc_1') {
                message = new Paho.MQTT.Message('{"soc":1,"status":0}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message
            }
            if (valueS == 'soc_2') {
                message = new Paho.MQTT.Message('{"soc":2,"status":0}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message
            }
            if (valueS == 'soc_3') {
                message = new Paho.MQTT.Message('{"soc":3,"status":0}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message
            }
            if (valueS == 'soc_4') {
                message = new Paho.MQTT.Message('{"soc":4,"status":0}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message
            }
            if (valueS == 'soc_5') {
                message = new Paho.MQTT.Message('{"soc":5,"status":0}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message
            }
            if (valueS == 'soc_6') {
                message = new Paho.MQTT.Message('{"soc":6,"status":0}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message
            }
            if (valueS == 'soc_7') {
                message = new Paho.MQTT.Message('{"soc":7,"status":0}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message
            }
        }
    }

    if (value == 0) {
        document.getElementById("port_" + switchID).value = 1;

        // MQTT send topic_sub
        client.connect({
            onSuccess: onConnect
        });

        function onConnect() {
            if (valueS == 'soc_0') {
                message = new Paho.MQTT.Message('{"soc":0,"status":1}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message
            }
            if (valueS == 'soc_1') {
                message = new Paho.MQTT.Message('{"soc":1,"status":1}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message
            }
            if (valueS == 'soc_2') {
                message = new Paho.MQTT.Message('{"soc":2,"status":1}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message
            }
            if (valueS == 'soc_3') {
                message = new Paho.MQTT.Message('{"soc":3,"status":1}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message
            }
            if (valueS == 'soc_4') {
                message = new Paho.MQTT.Message('{"soc":4,"status":1}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message
            }
            if (valueS == 'soc_5') {
                message = new Paho.MQTT.Message('{"soc":5,"status":1}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message
            }
            if (valueS == 'soc_6') {
                message = new Paho.MQTT.Message('{"soc":6,"status":1}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message
            }
            if (valueS == 'soc_7') {
                message = new Paho.MQTT.Message('{"soc":7,"status":1}');
                message.destinationName = document.getElementById("input_topic").value;
                client.send(message); // publish message
            }
        }
    }

    var port_id = switchID;
    var newPermLevel = document.getElementById("port_" + switchID).value

    $.ajax({
        type: 'GET', // Type of response and matches what we said in the route
        url: '/switch1/' + port_id, // This is the url we gave in the route
        data: {
            'port_id': port_id,
            'value': newPermLevel,
            plot_id,

        },
        // a JSON object to send back
        success: function(data) { // What to do if we succeed
            console.log(data);
            // alert("Ajax success");
            // location.reload();
        },
        error: function(data) { // What to do if we succeed
            console.log(data);
            // alert("Ajax error");
            // location.reload();
        },
    });

}

function stopTimeSet(switchID) {
    var btn_stop = document.getElementById('stop_id_' + switchID).value = 0;
    var port_stop = document.getElementById('port_stop_id_' + switchID).value;
    plot_id = document.getElementById('plot_id').value;

    var host = document.getElementById("input_host").value
    var port = 8000;
    var x = Math.floor(Math.random() * 10000);
    var cname = "controlform-" + x;
    client = mqtt = new Paho.MQTT.Client(host, port, cname);

    client.connect({
        onSuccess: onConnect
    });

    function onConnect() {
        if (port_stop == 'soc_0') {
            message = new Paho.MQTT.Message('{"soc":0,"status":0}');
            message.destinationName = document.getElementById("input_topic").value;
            client.send(message); // publish message
        }
        if (port_stop == 'soc_1') {
            message = new Paho.MQTT.Message('{"soc":1,"status":0}');
            message.destinationName = document.getElementById("input_topic").value;
            client.send(message); // publish message
        }
        if (port_stop == 'soc_2') {
            message = new Paho.MQTT.Message('{"soc":2,"status":0}');
            message.destinationName = document.getElementById("input_topic").value;
            client.send(message); // publish message
        }
        if (port_stop == 'soc_3') {
            message = new Paho.MQTT.Message('{"soc":3,"status":0}');
            message.destinationName = document.getElementById("input_topic").value;
            client.send(message); // publish message
        }
        if (port_stop == 'soc_4') {
            message = new Paho.MQTT.Message('{"soc":4,"status":0}');
            message.destinationName = document.getElementById("input_topic").value;
            client.send(message); // publish message
        }
        if (port_stop == 'soc_5') {
            message = new Paho.MQTT.Message('{"soc":5,"status":0}');
            message.destinationName = document.getElementById("input_topic").value;
            client.send(message); // publish message
        }
        if (port_stop == 'soc_6') {
            message = new Paho.MQTT.Message('{"soc":6,"status":0}');
            message.destinationName = document.getElementById("input_topic").value;
            client.send(message); // publish message
        }
        if (port_stop == 'soc_7') {
            message = new Paho.MQTT.Message('{"soc":7,"status":0}');
            message.destinationName = document.getElementById("input_topic").value;
            client.send(message); // publish message
        }
    }

    $.ajax({
        type: 'GET',
        url: '/stop-time-set/' + switchID,
        data: {
            'switch_id': switchID,
            'value': btn_stop,
            plot_id,
        },
        success: function(data) {
            console.log(data);
            setInterval(() => {
                location.reload();
            }, 1000)
        },
        error: function(data) {
            console.log(data);
        },
    });

}