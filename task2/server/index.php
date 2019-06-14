<?php
include 'config.php';
include 'DB.php';
include 'SoapServer.php';


$autoshop = new DB;
$cars = $autoshop->getAllCars();
$carInfo = $autoshop->getCarInfo();

include 'templates/index.php';
?>