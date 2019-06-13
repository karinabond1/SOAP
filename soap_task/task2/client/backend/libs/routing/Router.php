<?php

namespace libs\routing;

class Router
{
  private static $_routes = array();
  private static $_instance = null;
  private $ctrlsNamespace;
  private $view;
  
  private function __construct() 
  { 
    $this->view = new \libs\View();
  }
  
  protected function __clone()
  {
  }
  
  static public function getInstance()
  {
    if(is_null(self::$_instance))
    {
      self::$_instance = new self();
    }
    return self::$_instance;
  }
  
  public function register($method, $path, $class, $function)
  {
    
  }
  
  public function configure($ctrlsNamespace=null)
  {
    $this->ctrlsNamespace = $ctrlsNamespace;
  }
  
  public function route($path, $method, $data=null)
  {
    $dir = BASE_DIR.'/'.str_replace("\\", "/", $this->ctrlsNamespace);
    if(is_dir($dir))
    {
      $items = scandir($dir);
      $search_array = array_map('strtolower', $items);
      $index = array_search(strtolower($path.'.php'), $search_array);
      if(false !== $index)
      {
        $file = $items[$index];
        $clasName = pathinfo($file, PATHINFO_FILENAME);
        $reflect = new \ReflectionClass($this->ctrlsNamespace.$clasName);
        if(true === $reflect->implementsInterface(BASE_CTRL) && false === $reflect->isInterface())
        {
          $method = ucfirst(strtolower($method));
          if(true === $reflect->hasMethod($method))
          {
            $postdata = file_get_contents("php://input");
            $data = json_decode($postdata);
            $instance = $reflect->newInstance();
            $instance->$method($data);
          }
          else
          {
            $this->view->sendError(404,(object)array('code'=>404,'message'=>'Method Not Found'));  
          }
        }
        else
        {
          $this->view->sendError(404,(object)array('code'=>404,'message'=>'Path Not Found'));
        }
      }
      else
      {
        $this->view->sendError(404,(object)array('code'=>404,'message'=>'Path Not Found'));
      }
    }
  }
}
