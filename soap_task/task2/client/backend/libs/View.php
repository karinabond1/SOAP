<?php

namespace libs;

class View
{
  private $type = 1;
  
  function __construct()
  {
    header('Access-Control-Allow-Origin: *');
    $headers =  getallheaders();
    if(array_key_exists('Accept', $headers))
    {
      if (1 === preg_match('#^application/json#i', $headers['Accept'])) 
      {
        $this->type = 1;
      }
      else
      {
        $this->sendError(415,(object)array('code'=>100,'message'=>'not suported content type'));
      }
    }
    else
    {
      $this->sendError(415,(object)array('code'=>100,'message'=>'not valid headers'));
    }
    
  }
  
  public function Response($data)
  {
    switch ($this->type) 
    {    
    case 1:
        header('Content-Type: application/json');
        echo json_encode($data);
        break;
    default:
        header('Content-Type: application/json');
        echo json_encode($data);
        break;
    }
  }
  
  public function sendError($status,$error)
  {
    http_response_code($status);
    $this->Response($error);
    exit;
  }
  
}