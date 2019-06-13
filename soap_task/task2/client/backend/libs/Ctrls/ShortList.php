<?php

namespace libs\Ctrls;
  
class ShortList implements ICtrl
{
  private $soap;
  private $view;
  
  public function __construct()
  {
    $this->soap = new \libs\ApiSoapClient();
    $this->view = new \libs\View();
  }
  
  public function Get()
  {
    try
    {
      $result = $this->soap->getCarList();
      $this->view->Response($result);      
    }
    catch(Exception $e)
    {
      $this->view->sendError(500,(object)array('code'=>101,'message'=>$e->getMessage()));            
    }
  }
}