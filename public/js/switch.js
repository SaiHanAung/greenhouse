function myFunction(id) {

    var value = document.getElementById("port_" + id).value;

    if (value == 1) {
        document.getElementById("port_" + id).value = 0;
        // alert(document.getElementById("port_" + id).value);
    }
    if (value == 0) {
        document.getElementById("port_" + id).value = 1;
        // alert(document.getElementById("port_" + id).value);
    }

    var port_id = id;
    var newPermLevel = document.getElementById("port_" + id).value;

    $.ajax({
        type: 'GET', // Type of response and matches what we said in the route
        url: '/dashboard1/' + port_id, // This is the url we gave in the route
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

function myFunction2(id) {

    var value2 = document.getElementById("port_2" + id).value;

    if (value2 == 1) {
        document.getElementById("port_2" + id).value = 0;
        // alert(document.getElementById("port_2" + id).value);
    }
    if (value2 == 0) {
        document.getElementById("port_2" + id).value = 1;
        // alert(document.getElementById("port_2" + id).value);
    }

    var port_id2 = id;
    var newPermLevel2 = document.getElementById("port_2" + id).value;

    $.ajax({
        type: 'GET', // Type of response and matches what we said in the route
        url: '/dashboard2/' + port_id2, // This is the url we gave in the route
        data: {
            'port_id': port_id2,
            'value': newPermLevel2,

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
        }
    });
}

function myFunction3(id) {

    var value3 = document.getElementById("port_3" + id).value;

    if (value3 == 1) {
        document.getElementById("port_3" + id).value = 0;
        // alert(document.getElementById("port_3" + id).value);
    }
    if (value3 == 0) {
        document.getElementById("port_3" + id).value = 1;
        // alert(document.getElementById("port_3" + id).value);
    }

    var port_id3 = id;
    var newPermLevel3 = document.getElementById("port_3" + id).value;

    $.ajax({
        type: 'GET', // Type of response and matches what we said in the route
        url: '/dashboard3/' + port_id3, // This is the url we gave in the route
        data: {
            'port_id': port_id3,
            'value': newPermLevel3,

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
        }
    });
}

function myFunction4(id) {

    var value4 = document.getElementById("port_4" + id).value;

    if (value4 == 1) {
        document.getElementById("port_4" + id).value = 0;
        // alert(document.getElementById("port_4" + id).value);
    }
    if (value4 == 0) {
        document.getElementById("port_4" + id).value = 1;
        // alert(document.getElementById("port_4" + id).value);
    }

    var port_id4 = id;
    var newPermLevel4 = document.getElementById("port_4" + id).value;

    $.ajax({
        type: 'GET', // Type of response and matches what we said in the route
        url: '/dashboard4/' + port_id4, // This is the url we gave in the route
        data: {
            'port_id': port_id4,
            'value': newPermLevel4,

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
        }
    });
}

function myFunction5(id) {

    var value5 = document.getElementById("port_5" + id).value;

    if (value5 == 1) {
        document.getElementById("port_5" + id).value = 0;
        // alert(document.getElementById("port_5" + id).value);
    }
    if (value5 == 0) {
        document.getElementById("port_5" + id).value = 1;
        // alert(document.getElementById("port_5" + id).value);
    }

    var port_id5 = id;
    var newPermLevel5 = document.getElementById("port_5" + id).value;

    $.ajax({
        type: 'GET', // Type of response and matches what we said in the route
        url: '/dashboard5/' + port_id5, // This is the url we gave in the route
        data: {
            'port_id': port_id5,
            'value': newPermLevel5,

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
        }
    });
}

function myFunction6(id) {

    var value6 = document.getElementById("port_6" + id).value;

    if (value6 == 1) {
        document.getElementById("port_6" + id).value = 0;
        // alert(document.getElementById("port_6" + id).value);
    }
    if (value6 == 0) {
        document.getElementById("port_6" + id).value = 1;
        // alert(document.getElementById("port_6" + id).value);
    }

    var port_id6 = id;
    var newPermLevel6 = document.getElementById("port_6" + id).value;

    $.ajax({
        type: 'GET', // Type of response and matches what we said in the route
        url: '/dashboard6/' + port_id6, // This is the url we gave in the route
        data: {
            'port_id': port_id6,
            'value': newPermLevel6,

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
        }
    });
}

function myFunction7(id) {

    var value7 = document.getElementById("port_7" + id).value;

    if (value7 == 1) {
        document.getElementById("port_7" + id).value = 0;
        // alert(document.getElementById("port_7" + id).value);
    }
    if (value7 == 0) {
        document.getElementById("port_7" + id).value = 1;
        // alert(document.getElementById("port_7" + id).value);
    }

    var port_id7 = id;
    var newPermLevel7 = document.getElementById("port_7" + id).value;

    $.ajax({
        type: 'GET', // Type of response and matches what we said in the route
        url: '/dashboard7/' + port_id7, // This is the url we gave in the route
        data: {
            'port_id': port_id7,
            'value': newPermLevel7,

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
        }
    });
}

function myFunction8(id) {

    var value8 = document.getElementById("port_8" + id).value;

    if (value8 == 1) {
        document.getElementById("port_8" + id).value = 0;
        // alert(document.getElementById("port_8" + id).value);
    }
    if (value8 == 0) {
        document.getElementById("port_8" + id).value = 1;
        // alert(document.getElementById("port_8" + id).value);
    }

    var port_id8 = id;
    var newPermLevel8 = document.getElementById("port_8" + id).value;

    $.ajax({
        type: 'GET', // Type of response and matches what we said in the route
        url: '/dashboard8/' + port_id8, // This is the url we gave in the route
        data: {
            'port_id': port_id8,
            'value': newPermLevel8,

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
        }
    });
}