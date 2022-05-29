function myFunction(id) {

    var value = document.getElementById("port_" + id).value;
    var valueS = document.getElementById("s_" + id).value;

    // MQTT Host
    var host = document.getElementById("input_host").value
    var port = 8000;
    var x = Math.floor(Math.random() * 10000);
    var cname = "controlform-" + x;
    client = mqtt = new Paho.MQTT.Client(host, port, cname);

    if (value == 1) {
        document.getElementById("port_" + id).value = 0;

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
        document.getElementById("port_" + id).value = 1;

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

    var port_id = id;
    var newPermLevel = document.getElementById("port_" + id).value;

    $.ajax({
        type: 'GET', // Type of response and matches what we said in the route
        url: '/switch1/' + port_id, // This is the url we gave in the route
        data: {
            'port_id': port_id,
            'value': newPermLevel,

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