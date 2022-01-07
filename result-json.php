<?php

//error_reporting(E_ALL);
//ini_set('display_errors','On');

include_once("Calculations.php");


$c = new Calculations;


if(isset($_GET['calculate'])){

     if(isset($_GET['select-unit']) && $_GET['select-unit'] != "select"){
      $unit = $_GET['select-unit'];
    }

    if(isset($_GET['select-depth-unit']) && $_GET['select-depth-unit'] != "select"){
     $depthUnit = $_GET['select-depth-unit'];
   } 

    if(isset($_GET['width'])){
     $width = $_GET['width'];
    } else {
     $width = 0;
    }

    if(isset($_GET['length'])){
     $length = $_GET['length'];
    } else {
     $length = 0;
    }

    if(isset($_GET['depth'])){
     $depth = $_GET['depth'];
    } else {
      $depth = 0;
    }


$arr = $c->generateJSON($unit, $width, $length, $depthUnit, $depth);

//print_r($arr);

header('Content-Type: application/json');
 print json_encode($arr, JSON_UNESCAPED_SLASHES);

}
