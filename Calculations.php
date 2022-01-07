<?php

 class Calculations {

  public $u;
  public $uD;
  public $bags;

 // Method to return the value to use to divide the dimensions to convert into metres
   public function unit($unit){

      if($unit == "metres"){
        $this->u = 1;
      } elseif($unit == "feet"){
        $this->u = 3.281;
      } elseif($unit == "yards"){
        $this->u = 1.094;
      }

      return $this->u;

   }

 /* I reckon that this method is not actually needed as to calculate the bags we will need
  the metres squared, not the volume. But I am going to write it anyway as it is required in the specs
  This method returns the value to divide the depth to convert it into metres*/
   public function depthUnit($depthUnit){

     if($depthUnit == "centimetres"){
       $this->uD = 100;
     } elseif ($depthUnit == "inches"){
       $this->uD == 39.37;
     }

     return $this->uD;

   }


   // Method to calculate how many bags are needed

   public function calculate($width, $length, $unit){  // we could add $depth and $depthUnit if needed

      $inMetres = $this->unit($unit);

      // if need to convert depth into metres
      // $inM = $this->depthUnit($depthUnit);
      // $depthInMetres = $depth / $inM;

      $widthInMetres = $width / $inMetres;
      $lengthInMetres = $length / $inMetres;

      $metresSquared = $widthInMetres * $lengthInMetres;

      // if we need the volume
      // $volume = $widthInMetres * $lengthInMetres * $depthInMetres;

      $x = $metresSquared * 0.025;

      // if we want to use the volume
      // $x = $volume * 0.025;

      $y = $x * 1.4;

      $this->bags = ceil($y);

      return $this->bags;

   }

// Method that generates the JSON that can be used in Postman

   public function generateJSON($unit, $width, $length, $depthUnit, $depth){

     $object = [];

     $this->bags = $this->calculate($width, $length, $unit);

     $object = ['unit' => $unit, 'width' => $width, 'length' => $length, 'depth unit' => $depthUnit, 'depth' => $depth, 'Total bags needed' => $this->bags ];

     return $object;


   }


 }
