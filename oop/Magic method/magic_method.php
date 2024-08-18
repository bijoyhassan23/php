<?php

/**
 * Mahic Methods
 * For these method we don't need to create object
 * these will called autometically, base on the condition
 * like __construct
 * They will start with (__)
 */
echo "--Magic Methods:<br><br>";


echo "<br><br>--------------------------------------------------------------------------------<br><br>";
echo "--(__destruct) Methods:<br><br>";
/**
 * __construct will called when object is defile
 * __destruct will called when object work is done
 * It will called when object is no longer available
 */

class abc1{
    public static $temp = 0;
    public function __construct(){
        echo "This is constructor method <br>";
    }
    public function hello(){
        echo "Hello every one <br>";
    }
    public function __destruct(){
        self::$temp++;
        $x = self::$temp;
        echo "<br>This is __destruct method {$x} : this is comming form first  <br>";
    }
}

$obj1 = new abc1();
$obj1->hello();
$obj1 = ""; // $obj1 __destruct will called in here

echo "<br><br>";

$obj1_2 = new abc1();
$obj1_2->hello(); // $obj1_2 __destruct will called end of everything

echo "<br><br>--------------------------------------------------------------------------------<br><br>";

echo "--() Methods:<br><br>";