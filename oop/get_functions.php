<?php

echo "<br><br>--------------------------------------------------------------------------------<br><br>";
/**
 * get_class(object) this will return the class name
 * You can place it inside of class or outside of class 
 */
echo "--(get_class) function:<br><br>";
 class abc1{
    function a(){
        return "Class Name : " . get_class($this);
    }
 }

 $obj1 = new abc1();

 echo $obj1->a();
 echo "<br>";
 echo "Class Name : " . get_class($obj1);

echo "<br><br>--------------------------------------------------------------------------------<br><br>";
/**
 * get_parent_class(object) this will return the parent class name
 * You can place it inside of class or outside of class 
 */
echo "--(get_parent_class) function:<br><br>";

 class abc2 extends abc1{
    function b(){
        return "Parent Class Name : " . get_parent_class($this);
    }
 }

 $obj2 = new abc2();

 echo $obj2->b();
 echo "<br>";
 echo "Parent Class Name : " . get_parent_class($obj2);

echo "<br><br>--------------------------------------------------------------------------------<br><br>";

/**
 * get_class_methods(object) this will return the array of all methods
 * when you called it inside you will get all the method
 * when YOu called from outside you will get only the plblic methods
 */
echo "--(get_class_methods) function:<br><br>";

 class abc3{
    function __construct(){
        echo "<pre>call from inside: <br>";
        print_r(get_class_methods(__CLASS__)); // all method
        echo "</pre><br>";
    }

    function a(){
        return "a";
    }

    private function b(){
        return "b";
    }
 }

 $obj3 = new abc3();

 echo "<pre>called from outside: <br>";
 print_r(get_class_methods('abc3')); // only public method
 echo "</pre>";

 echo "<br><br>--------------------------------------------------------------------------------<br><br>";

 /**
 * get_class_vars(object) this will return the array of all variables of class
 * when you called it inside you will get all the variables  of class
 * when YOu called from outside you will get only the plblic variables  of class
 * And when you addin this inside the class don't put $this
 * 
 * remember this function always provide the value wich set in start
 */
echo "--(get_class_vars) function:<br><br>";

class abc4{

    public $a1;
    public $a2 = "hello";
    public $a3 = 100;
    private $a4;
    private $a5 = "privet property";

   function __construct(){
    $this->a1 = "none";
    $this->a2 = "Not cool man";

        echo "<pre>call from inside: <br>";
        print_r(get_class_vars(__CLASS__)); // all variables
        echo "</pre><br>";
   }

   public function a(){
    $this->a1 = "set from method";
    $this->a2 = "set from method 2";

        echo "<pre>call from inside: <br>";
        print_r(get_class_vars(__CLASS__)); // all variables
        echo "</pre><br>";
   }

}

$obj4 = new abc4();
$obj4->a();
echo "<pre>called from outside: <br>";
print_r(get_class_vars('abc4')); // only plublic variables
echo "</pre>";


 echo "<br><br>--------------------------------------------------------------------------------<br><br>";
 

 /**
 * get_object_vars(object) this will return the array of all variables of object
 * when you called it inside you will get all the variables of object
 * when YOu called from outside you will get only the plblic variables of object
 * 
 * remember this function always provide the value current value 
 */
echo "--(get_class_vars) function:<br><br>";

class abc5{

    public $a1;
    public $a2 = "hello";
    public $a3 = 100;
    private $a4;
    private $a5 = "privet property";

   function __construct(){
    $this->a1 = "none";
    $this->a2 = "Not cool man";

        echo "<pre>call from inside: <br>";
        print_r(get_object_vars($this)); // all variables
        echo "</pre><br>";
   }
}

$obj5 = new abc5();

echo "<pre>called from outside: <br>";
print_r(get_object_vars($obj5)); // only plublic variables
echo "</pre>";

echo "<br><br>--------------------------------------------------------------------------------<br><br>";

/**
 * get_called_class() this full return name of the class whcih one is called
 * Like when you are calling with child class it will return the child class name
 */
echo "--(get_called_class) function:<br><br>";

class abc6{
    static public function a(){
        var_dump(get_called_class());
        echo "<br>";
    }
}

class abc7 extends abc6{

}
abc6::a();
abc7::a();

echo "<br><br>--------------------------------------------------------------------------------<br><br>";

/**
 * get_declared_classes() this will return all the classes name wich is in this page
 * this will also return all the php classes
 */
echo "--(get_declared_classes) function:<br><br>";

echo "<pre>This will return all the class name of this page: <br>";
print_r(get_declared_classes());
echo "</pre><br>";

echo "<br><br>--------------------------------------------------------------------------------<br><br>";

echo "<br><br>--------------------------------------------------------------------------------<br><br>";

/**
 * get_declared_interfaces() this will return all the interface name wich is in this page
 * this will also return all the php interface
 */
echo "--(get_declared_interfaces) function:<br><br>";

interface A{
    public function a();
    public function b();
}

interface B{
    public function a();
    public function b();
}
echo "<pre>This will return all the class name of this page: <br>";
print_r(get_declared_interfaces());
echo "</pre><br>";

echo "<br><br>--------------------------------------------------------------------------------<br><br>";

/**
 * get_declared_traits() this will return all the traits name wich is in this page
 */

 echo "--(get_declared_traits) function:<br><br>";
trait C{
    public function a(){

    }
    public function b(){

    }
}

echo "<pre>This will return all the class name of this page: <br>";
print_r(get_declared_traits());
echo "</pre><br>";

echo "<br><br>--------------------------------------------------------------------------------<br><br>";
