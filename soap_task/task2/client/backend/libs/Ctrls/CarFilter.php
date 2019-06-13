<?php

namespace libs\Ctrls;
  
class CarFilter implements ICtrl
{
  private $soap;
  private $view;
    
  public function __construct()
  {
    $this->soap = new \libs\ApiSoapClient();
    $this->view = new \libs\View();
  }
  
  public function Post($data)
  {
    //var_dump($data);
    try
    {
      $result = $this->soap->CarFilter($data);
      $this->view->Response($result);
    }
    catch(Exception $e)
    {
      $this->view->sendError(500,(object)array('code'=>101,'message'=>$e->getMessage()));      
    }
  }
}