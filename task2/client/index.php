<?php

$client = new SoapClient('http://tc.geeksforless.net/~user14/SOAP/SOAP/task2/server/?WSDL', array('cache_wsdl' => WSDL_CACHE_NONE));
//$client = new SoapClient('http://192.168.0.15/~user14/SOAP/SOAP/task2/server/?WSDL', array('cache_wsdl' => WSDL_CACHE_NONE));
//print_r($client->__getFunctions());
// print_r($client);
$cars = array();
foreach($client->getAllCars()->item as $value){
    $temp = array();
    array_push($temp,$value->item[0]->value);
    array_push($temp,$value->item[2]->value);
    array_push($temp,$value->item[3]->value);
    array_push($cars, $temp);
    //var_dump($value->item[0]->value);
}
//var_dump($cars);

$carInfo = array();
foreach($client->getCarinfo()->item as $value){
    $temp = array();
    /*array_push($temp,$value->item[0]->value);
    array_push($temp,$value->item[2]->value);
    array_push($temp,$value->item[3]->value);
    array_push($carInfo, $temp);*/
    var_dump($value);
}

?>