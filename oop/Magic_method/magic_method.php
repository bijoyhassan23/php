<?php

/**
 * Mahic Methods
 * For these method we don't need to create object
 * these will called autometically, base on the condition
 * like __construct
 * They will start with (__)
 */
echo "--Magic Methods:";


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
        echo "<br><br>-This is __destruct method {$x} : this is comming form first-  <br>";
    }
}

$obj1 = new abc1();
$obj1->hello();
$obj1 = ""; // $obj1 __destruct will called in here

echo "<br><br>";

$obj1_2 = new abc1();
$obj1_2->hello(); // $obj1_2 __destruct will called end of everything

echo "<br><br>--------------------------------------------------------------------------------<br><br>";

/**
 * __get this will call if you want to access privet value outside of class
 * it will triger when you want to call privet
 * it will work only the variables, not with method
 * this will take one parameters, this is variable name
 */
echo "--(__get) Methods:<br><br>";

class abc2{
    private $temp = 0;
    private $data = ["a"=> "Saif", "b" => "bijoy"];
    private $data2 = ["a"=> "Saif", "b" => "bijoy"];

    public function __get($property){
        if(array_key_exists($property, $this->data)){
            return $this->data[$property];
        }else{
            echo $property . " This is not here or this is privet<br>";
        }
    }
}

$obj2 = new abc2();
$obj2->temp; // this is for varibale
$obj2->data; // this si assosiative array
echo ($obj2->a); // this si assosiative array

echo "<br><br>--------------------------------------------------------------------------------<br><br>";
/**
 * __set this will call if you to assian value in a privet property
 * with this fun you can assin value on a privet property
 * this will take two parameter one is variable name and second is provided value
 */
echo "--(__set) Methods:<br><br>";

class abc3{
    private $temp;

    private function hello(){
        echo "This is hello method <br>";
    }

    public function __set($name , $value){
        if(property_exists($this, $name)){
            $this->$name = $value; // we can assin privat property value out side with this fun
        }
        echo "this is privat property or non existing " . $name . " - " . $value;
    }
}

$obj3 = new abc3();
$obj3->temp = 10;



echo "<br><br>--------------------------------------------------------------------------------<br><br>";
/**
 * This function will called when you want to access a privet method
 *  with this fun you can access privat method from out side of class
 * it will get two value one is method name and
 * second is parameters value but it will store on array
 */
echo "--(__call) Methods:<br><br>";

class abc4{
    private function hello($a){
        echo $a . " This is hello method <br>";
    }

    public function __call($name , $value){
       
        if(method_exists($this, $name)){
            $this->$name($value[0]); // both are doing same thing
            call_user_func_array([$this, $name], $value); // both are doing same thing 
        }

        echo "this is privat or non existing method " . $name . " - ";
        print_r($value);
        
    }
}

$obj4 = new abc4();
$obj4->hello("okay");

echo "<br><br>--------------------------------------------------------------------------------<br><br>";
/**
 * this function will call if the private method is also a static method 
 * make sure you are using self
 * :: scop rezulation oparator
 */
echo "--(__callStatic) Methods:<br><br>";

class abc5{
    private static function hello($a){
        echo $a . " This is hello method <br>";
    }

    public static function __callStatic($name , $value){
       
        if(method_exists(self::class, $name)){
            self::$name($value[0]); // both are doing same thing
            call_user_func_array([self::class, $name], $value); // both are doing same thing 
        }


        /**
         * Second way
         */
        if(method_exists(__CLASS__, $name)){
            call_user_func_array([__CLASS__, $name], $value); // both are doing same thing 
        }
        
        echo "this is privat static or non existing method " . $name . " - ";
        print_r($value);
        
    }
}

abc5::hello("okay");

 echo "<br><br>--------------------------------------------------------------------------------<br><br>";
/**
 * This function will called when you want to check a privet proparty set or not
 */
 echo "--(__isset) Methods:<br><br>";

 class abc6{
     public $a = 10;
     public $b;
     private $c = 10;
     private $d;
 
     public function __isset($name ){
        return isset($this->$name);
     }
 }
 
 $obj6 = new abc6();

 echo "<br>Public a: ";
 var_export(isset($obj6->a)); // here __isset will not call

 echo "<br>Public b: ";
 var_export(isset($obj6->b)); // here __isset will not call

 echo "<br>privat c: ";
 var_export(isset($obj6->c)); // here __isset will call

 echo "<br>Privat d: ";
 var_export(isset($obj6->d)); // here __isset will call

 echo "<br><br>--------------------------------------------------------------------------------<br><br>";
 /**
 * This function will called when you want to unset a privet proparty
 */
echo "--(__isset) Methods:<br><br>";

class abc7{
    public $a = 10;
    private $b = 10;

    public function __unset($name){
        unset($this->$name);
    }

    public function __isset($name ){
        return isset($this->$name);
     }
}

$obj7 = new abc7();

echo "<br>Public a: ";
unset($obj7->a);
var_export(isset($obj7->a)); 

echo "<br>Public b: ";
unset($obj7->b);
var_export(isset($obj7->b)); 

echo "<br><br>--------------------------------------------------------------------------------<br><br>";

 /**
 * This function will called when you want to call class obj like a variable
 */
echo "--(__toString) Methods:<br><br>";

class abc8{

    public function __toString(){
        return "This is a class you can't call it like this";
    }
}

$obj8 = new abc8();
echo($obj8); 

echo "<br><br>--------------------------------------------------------------------------------<br><br>";
/**
 * __sleep this fucntion will call when You want to serialize a obj
 * __wakeup thsi function will call when you unserialize the obj
 */
echo "--(__sleep) Methods:<br><br>";

class abc9{

    public $a = 10;
    public $b = 20;
    public $c = 30; 
    public function __sleep(){ // when serialize
        return ["a","b"];
    }

    public function __wakeup(){ // when unserialize
        echo "<br>the data is unserialized<br>";
    }
}

$obj9 = new abc9();
$te = serialize($obj9);
echo $te . "<br>"; 
var_export(unserialize($te));
echo "<br>"; 
var_export($obj9);


echo "<br><br>--------------------------------------------------------------------------------<br><br>";
/**
 * __clone will call when you are cloning this obj
 */
echo "--(__clone) Methods:<br><br>";


class abc10{
    public function __clone(){
        echo "this will called when you are cloninig";
    }

}

$obj10 = new abc10();
$obj10_1 = clone $obj10;

echo "<br><br>--------------------------------------------------------------------------------<br><br>";
/**
 * __invoke() this full will call, if you call the object like a fuction
 */
echo "--(__invoke) Methods:<br><br>";

class abc11{
    public function __invoke(){
        return "Your invoke function is ";
    }
}

$obj11 = new abc11();
echo ($obj11()); // you call the object like a function

echo "<br><br>--------------------------------------------------------------------------------<br><br>";
