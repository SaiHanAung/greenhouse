<!DOCTYPE html>
<html>

<head>
    <title>Traceability-Green house</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<script>
    function myFunction(x) {
        document.getElementById("mySidenav").classList.toggle("open");
        x.classList.toggle("change");
    }
</script>

<body>
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #49cea1;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 0.5rem;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #fff;
            display: block;
            transition: 0.3s
        }

        .sidenav a:hover,
        .offcanvas a:focus {
            color: #333;
        }

        .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px !important;
            margin-left: 50px;
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }

        .flex {
            display: flex;
            align-items: stretch;
        }


        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }

        .container {
            display: inline-block;
            cursor: pointer;
            max-width: fit-content;
        }

        .bar1,
        .bar2,
        .bar3 {
            width: 35px;
            height: 5px;
            background-color: #49cea1;
            margin: 6px 0;
            transition: .9s;
        }

        .change .bar1 {
            -webkit-transform: rotate(-45deg) translate(-9px, 6px);
            transform: rotate(-45deg) translate(-9px, 6px);
        }

        .change .bar2 {
            opacity: 0;
        }

        .change .bar3 {
            -webkit-transform: rotate(45deg) translate(-8px, -8px);
            transform: rotate(45deg) translate(-8px, -8px);
        }

        /* ----- START -----  */

        .open {
            width: 250px;
        }

        .open~#main {
            margin-left: 250px;
        }

        /* ----- END ----- */

        img {
            padding-top: 0.5rem;
            /* background-color: #f1f1f1; */
            /* border-radius: 0.25rem; */
            /* margin-top: -2rem; */
            /* box-sizing: content-box; */
        }
    </style>

    <div id="mySidenav" class="sidenav">
        <div class="row" style="background-color: #fff; clear:both;">
            <center>
                <img src="../imgs/green-house.png" width="30%" alt="Icon">
            </center>
        </div>
        <hr style="height: 0.25rem; background-color: #fff;">
        <a href="{{route('login') }}">เข้าสู่ระบบ</a>
    </div>

    <div id="main">
        <div class="flex">
            <span style="cursor:pointer" style="flex-grow: 1">
                <div class="container" onclick="myFunction(this)">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
            </span>
            <header class="w3-container" style="flex-grow: 8;">
                <h3>ตรวจสอบย้อนกลับ</h3>
            </header>
        </div>
        <header class="w3-container mt-2" style="background-color: #49cea1; color:#fff;">
            <h4>ข้อมูลการเพาะปลูก</h4>
        </header>
        <div class="w3-container">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">เหตุการณ์</th>
                        <th scope="col">วันที่</th>
                        <th scope="col">ผู้ลงบันทึก</th>
                        <th scope="col">หมายเหตุ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>