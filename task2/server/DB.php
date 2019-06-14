<?php

class DB
{
    public function getAllCars()
    {
        $cars = array();
        $brands = array();
        $result = array();

        try {

            $mysql = new PDO("mysql:host=" . HOST . ";port=" . PORT . ";dbname=" . DATABASE , USER_NAME, USER_PASS);
            $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $selectCars = $mysql->prepare("SELECT id, brand_id, model FROM autoshop_cars;");
            $selectCars->execute();

            $selectBrands = $mysql->prepare("SELECT id, brand FROM autoshop_brand;");
            $selectBrands->execute();

            $indexCars = 0;
            while ($row = $selectCars->fetch(PDO::FETCH_ASSOC)) {
                $cars[$indexCars] = $row;
                $indexCars++;
            }
            
            $indexBrands = 0;
            while ($row = $selectBrands->fetch(PDO::FETCH_ASSOC)) {
                $brands[$indexBrands] = $row;
                $indexBrands++;
            }
            foreach($cars as $keyCar => $valueCar){
                foreach($brands as $keyBrand => $valueBrand){
                    if($valueCar[brand_id]==$valueBrand[id]){
                        array_push($valueCar, $valueBrand[brand]);
                    }                    
                }
                array_push($result, $valueCar);
            }
            //var_dump($result);

        } catch (PDOException $e) {
            echo $str = 'Error:+ ' . $e->getMessage();
        }
        return $result;
    }

    public function getCarinfo()
    {
        $id = 2;
        $cars = array();
        $brand = array();
        $result = array();
        $colorId = array();
        $color = array();
        try {

            $mysql = new PDO("mysql:host=" . HOST . ";port=" . PORT . ";dbname=" . DATABASE , USER_NAME, USER_PASS);
            $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $selectCarinfo = $mysql->prepare("SELECT id, brand_id, model, year_issue, engin_capacity, max_speed, price FROM autoshop_cars WHERE id = ".$id);
            $selectCarinfo->execute();

            $indexCar = 0;
            while ($row = $selectCarinfo->fetch(PDO::FETCH_ASSOC)) {
                $cars[$indexCar] = $row;
                $indexCar++;
            }

            $selectBrand = $mysql->prepare("SELECT brand FROM autoshop_brand WHERE id = ".$cars[0][brand_id]);
            $selectBrand->execute();         
            
            $indexBrand = 0;
            while ($row = $selectBrand->fetch(PDO::FETCH_ASSOC)) {
                $brand[$indexBrand] = $row;
                $indexBrand++;
            }            

            $selectColorId = $mysql->prepare("SELECT color_id FROM autoshop_car_color WHERE car_id = ".$cars[0][id]);
            $selectColorId->execute(); 
            $indexColorid = 0;
            while ($row = $selectColorId->fetch(PDO::FETCH_ASSOC)) {
                $colorId[$indexColorid] = $row;
                $indexColorid++;
            }

            $selectColor = $mysql->prepare("SELECT color FROM autoshop_color WHERE id = ".$colorId[0][color_id]);
            $selectColor->execute(); 
            $indexColor = 0;
            while ($row = $selectColor->fetch(PDO::FETCH_ASSOC)) {
                $color[$indexColor] = $row;
                $indexColor++;
            }

            array_push($result,$cars);
            array_push($result,$brand);
            array_push($result,$color);
            //var_dump($result);

        } catch (PDOException $e) {
            echo $str = 'Error:+ ' . $e->getMessage();
        }
        return $result;
    }
}