<!DOCTYPE html>
<html>

<head>
    <title>test</title>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <style>
        body {
            font-family: monaco;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        h1 {
            margin-bottom: 50px;
        }

        .count-digit {
            color: #ffffff;
            background-color: #333;
            font-size: 56px;
            padding: 10px 20px;
            text-shadow: 0 1px 0 white;
            border-radius: 10%;
        }

        .separator {
            font-size: 56px;
        }

        .options {
            margin-top: 50px;
            display: flex;
            gap: 30px;
        }
    </style>
</head>

<body>
    <img id="output" src="" alt="QR-Code">
    <p id="url"></p>
    <!-- <p id="demo"></p> -->
    <!-- <img src="https://chart.googleapis.com/chart?cht=qr&chl=http://www.google.com&chs=180x180&choe=UTF-8" alt=""> -->
    <script>
        var currentUrl = window.location.href;
        document.getElementById("url").innerHTML = currentUrl;

        var urlText = document.getElementById("url").innerHTML = currentUrl;
        var srcText = document.getElementById("output").src = "https://chart.googleapis.com/chart?cht=qr&chl=" + urlText + "&chs=180x180&choe=UTF-8";

        console.log(srcText);
    </script>
</body>

</html>