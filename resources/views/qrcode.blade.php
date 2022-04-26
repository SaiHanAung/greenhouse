<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

    <div class="container">

        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card mt-5">
                    <div class="card-body">
                        <h5 class="card-title">Create QR Code</h5>
                        <!-- <form action="" method="post"> -->


                        <div class="form-group">

                                <!-- <label for="">Data</label>
                                <input type="text" name="data" class="form-control" placeholder="QR Code Data" required>

                            </div>

                            <div class="form-group">
                                <label for="">Size</label>
                                <input type="text" class="form-control" name="size" placeholder="200x200" required>
                            </div>

                            <div class="form-group">

                                <label for="">Color</label>
                                <input type="color" class="form-control" name="color" placeholder="Color Code">

                            </div> -->

                            <div class="form-group">
                                <button class="btn btn-success btn-block" type="submit" id="request" name="submit">Create QR Code</button>
                            </div>

                            <div class="form-group text-center" id="bio">
                                <!-- <img src="" id="bio" class="img-fluid" alt=""> -->
                            </div>


                        {{--
                            <?php

                            $post = false;
                            if (isset($_POST['submit'])) {
                                $post = true;
                                $data = $_POST['data'];
                                $size = $_POST['size'];
                                $color = str_replace('#', '', $_POST['color']);
                                $qr = 'https://chart.googleapis.com/chart?cht=qr&chs=' . $size . '&chl=' . $data . '&chco=' . $color;
                            }

                            ?>

                            <?php
                            if ($post) {
                            ?>

                                <div class="form-group text-center">
                                    <img src="<?php echo $qr; ?>" class="img-fluid" alt="">
                                </div>

                            <?php } ?>
                            --}}




                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- <button id="request">create</button>
    <div id="bio"></div> -->

    <script src="{{ asset('js/ajax.js') }}"></script>


</body>

</html>