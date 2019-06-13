<?php
namespace libs\services;
class CarService
{
  private $executor;
  
  public function __construct($executor)
  {
    $this->executor = $executor;    
  }
  
  public function getShortList()
  {
    return $this->executor->select(array('cars.id', 'mark.nam AS mark', 'model.nam AS model'))
              ->setTable(array('cars'))
              ->join('model','model.id','cars.idmodel')
              ->join('mark','model.idmark','mark.id')
              ->exec();
  }
  
  public function getById($id)
  {
    return $this->executor->select(array('cars.id', 'mark.nam AS mark', 'model.nam AS model', 'cars.year', 'cars.engine', 'cars.color', 'cars.maxspeed', 'cars.price'))
      ->setTable(array('cars'))
      ->join('model','model.id','cars.idmodel')
      ->join('mark','model.idmark','mark.id')
      ->setParam(array('id' => $id))
		  ->where('cars.id','=',':id')
      ->exec();
  }
  public function Order($order)
  {
    $this->executor
        ->insert((array)$order)
				->setTable('orders')
        ->exec();
        
  }
  
  public function CarFilter($data)
  { 
    $data = (array)$data;
    $query = $this->executor->select(array('cars.id', 'mark.nam AS mark', 'model.nam AS model', 'cars.year', 'cars.engine', 'cars.color', 'cars.maxspeed', 'cars.price'))
      ->setTable(array('cars'))
      ->join('model','model.id','cars.idmodel')
      ->join('mark','model.idmark','mark.id')
      ->setParam(array('year' => $data['year']))
 		  ->where('cars.year','=',':year');
    
      if(array_key_exists('model', $data))
      {
        $query = $query->setParam(array('model' => '%'.$data['model'].'%'))
  		  ->where('model.nam','LIKE',':model', 'AND');
      }
      if(array_key_exists('mark', $data))
      {
        $query = $query->setParam(array('mark' => '%'.$data['mark'].'%'))
  		  ->where('mark.nam','LIKE',':mark', 'AND');
      }
      if(array_key_exists('engine', $data))
      {
        $query = $query->setParam(array('engine' => $data['engine']))
  		  ->where('cars.engine','=',':engine', 'AND');
      }
      if(array_key_exists('color', $data))
      {
        $query = $query->setParam(array('color' => $data['color']))
  		  ->where('cars.color','=',':color', 'AND');
      }
      if(array_key_exists('maxspeed', $data))
      {
        $query = $query->setParam(array('maxspeed' => $data['maxspeed']))
  		  ->where('cars.maxspeed','=',':maxspeed', 'AND');
      }
      if(array_key_exists('price', $data))
      {
        $query = $query->setParam(array('price' => $data['price']))
  		  ->where('cars.price','=',':price', 'AND');
      }
    $result =  $query->exec();    
    return $result;
  }
}