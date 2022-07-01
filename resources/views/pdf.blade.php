<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }
 
        body {
            font-family: "THSarabunNew";
        }
    </style>
</head>

<body>
    <center>
        <p style="font-size: x-large; font-weight: bold;">QR Code ตรวจสอบย้อนกลับ - Green House</p>
    </center>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th style="text-align: center; font-size: xx-medium;">แปลง</th>
                    <th style="text-align: center; font-size: xx-medium;">ผลผลิต</th>
                    <th style="text-align: center; font-size: xx-medium;">ผู้ปลูก</th>
                    <th style="text-align: center; font-size: xx-medium;">เริ่มปลูกวันที่</th>
                    <th style="text-align: center; font-size: xx-medium;">เก็บเกี่ยววันที่</th>
                    <th style="text-align: center; font-size: xx-medium;">ดาวน์โหลด</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <center>
                        @foreach ($plot_name as $key_name => $value_name)
                        {{ $value_name->name }}
                        @endforeach
                        </center>
                    </td>
                    <td>
                        <center>
                        @foreach($setting_plant as $key_setting_plant => $value_setting_plant)
                        {{ $value_setting_plant->name }}
                        @endforeach
                        </center>
                    </td>
                    <td>
                        <center>
                        @foreach($setting_plant as $key_setting_plant => $value_setting_plant)
                        {{ $value_setting_plant->grower_name }}
                        @endforeach
                        </center>
                    </td>
                    <td>
                        @foreach($setting_plant as $key_setting_plant => $value_setting_plant)
                        <?php
                        $plant_date = thaidate('d-m-Y', strtotime($value_setting_plant->date_of_plant));
                        ?>
                        <center>
                            {{ $plant_date }}
                        </center>
                        @endforeach
                    </td>
                    <td>
                        @foreach($get_data_trac_harv as $key_harvDate => $val_harvDate)
                        <?php
                        $harvest_date = thaidate('d-m-Y', strtotime($val_harvDate->date));
                        ?>
                        <center>
                            {{ $harvest_date }}
                        </center>
                        @endforeach
                    </td>
                    <?php
                    $nowDate = thaidate('d-m-Y H:i:s', strtotime($now_date));
                    ?>
                    <td>
                        <center>
                            {{ $nowDate }}
                        </center>
                    </td>
                </tr>
            </tbody>
        </table>
    <center>
        <img src="{{ $qrcode }}" alt="QR Code" style="margin-top: 1.5em;">
        <img src="{{ $qrcode }}" alt="QR Code" style="margin-top: 1.5em;">
        <img src="{{ $qrcode }}" alt="QR Code" style="margin-top: 1.5em;">
        <img src="{{ $qrcode }}" alt="QR Code">
        <img src="{{ $qrcode }}" alt="QR Code">
        <img src="{{ $qrcode }}" alt="QR Code">
        <img src="{{ $qrcode }}" alt="QR Code">
        <img src="{{ $qrcode }}" alt="QR Code">
        <img src="{{ $qrcode }}" alt="QR Code">
        <img src="{{ $qrcode }}" alt="QR Code">
        <img src="{{ $qrcode }}" alt="QR Code">
        <img src="{{ $qrcode }}" alt="QR Code">
    </center>

</body>

</html>