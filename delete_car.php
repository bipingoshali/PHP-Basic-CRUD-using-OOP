<?php
include "class/car.php";
$car = new car();
$car->deleteCar($_GET['car_id']);
header("location: car.php");