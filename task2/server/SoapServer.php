<?php
ini_set("soap.wsdl_cache_enabled", "0");

/*include('libs/db.php');
include('libs/AutoShop.php');*/

/*include 'config.php';
include 'DB.php';*/

$server = new SoapServer("http://tc.geeksforless.net/~user14/SOAP/SOAP/task2/server/autoshop.wsdl");
$server->setClass("DB");
$server->handle();