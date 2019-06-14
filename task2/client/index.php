<?php

$client = new SoapClient('http://tc.geeksforless.net/~user14/SOAP/SOAP/task2/server/?WSDL');

//print_r($client->__getFunctions());
// print_r($client);
$cars = array();
foreach($client->getAllCars()->item as $value){
    array_push($cars,$value->item);
}
//$result = $client->getAllCars()->item[0]->item;
//var_dump($cars);

foreach($cars as $car){
    foreach($car as $value){
        foreach($value as $value1){
            //var_dump($value);
           echo $value1;
        }      
    }
    echo "<br>";
}