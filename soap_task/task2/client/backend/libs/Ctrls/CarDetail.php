<?php

namespace libs\Ctrls;
  
class CarDetail implements ICtrl
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
    try
    {
      $result = $this->soap->getById($data->id);
      $this->view->Response($result);
    }
    catch(Exception $e)
    {
      $this->view->sendError(500,(object)array('code'=>101,'message'=>$e->getMessage()));      
    }
  }
}