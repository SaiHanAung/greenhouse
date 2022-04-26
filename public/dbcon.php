<?php

$db = mysqli_connect("green_house","root","");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>