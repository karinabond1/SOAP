<?php
require_once 'autoload.php';
require_once 'config.php';

if(0 !== strcmp($_SERVER['REQUEST_METHOD'], 'OPTIONS'))
{
  try
  {
    $router = libs\routing\Router::getInstance();
    $router->configure('libs\Ctrls\\');
    $router->route($_REQUEST['path'], $_SERVER['REQUEST_METHOD']);
  }
  catch(Exception $e)
  {
    $view = new \libs\View();
    $view->sendError(500,(object)array('code'=>101,'message'=>$e->getMessage()));
  }
  
}
else
{
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, PATCH, DELETE');
  header('Access-Control-Max-Age: 1000');
  header('Access-Control-Allow-Headers: *');
}

//$postdata = file_get_contents("php://input");
// var_dump($_SERVER['REQUEST_URI']);
// echo '<br />';
// var_dump($_REQUEST['path']);
// echo '<br />';
// var_dump($_SERVER['REQUEST_METHOD']);

 

// echo '<pre>';
// var_dump($soapClient->getAllFunc());
// echo '</pre>';
//  $result = $soapClient->getCarList();
//  echo '<pre>';
//  var_dump($result);
//  echo '</pre>';
//  $idresult = $soapClient->getById(1);
//  echo '<pre>';
//  var_dump($idresult);
//  echo '</pre>';
 

