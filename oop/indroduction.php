<pre>
<?php
/**
 * public you can access from anyware
 * privet you can't access out side of class
 * proteced you can't access this out side of class but you can access this on the extended class
 * static you can access this without call the class and you can update this variable any time (it will work like you assin a variable declare outside and you are updating it)
 */

class calculation{
public $c;
private $d = 10;
protected $e = 100;

private static $f = 10; // static variable
protected static $g = 100;
public static $h;

public function __construct($x, $b = 10, $c = 7) {
    $this->a = $x;
    $this->b = $b;
    echo("Calculation Constructor Run" . "<br>");
    self::$h = $c;
}

public function sum(){
    $this->c = $this->a + $this->b;
    return $this->c;
}


function sub(){
    $this->c = $this->a - $this->b;
    return $this->c;
}

public static function static_sum(){
    return self::$f + self::$g; // use static variable for static function
}
}

/**
 * class called
 */

var_export(calculation::$h); //static check
echo "<br>";

$bi = new calculation(15, 10, 9);

var_export(calculation::$h); // static check
echo "<br>";

echo "<br>";
calculation::$h = 100;
var_export(calculation::$h); // static check
echo "<br>";
// $bi->a = 10;
// $bi->b = 5;

echo "<br><br>--------------------------------------------------------------------------------<br><br>";

echo ($bi->sum());
echo "<br>";
echo ($bi->sub());

echo "<br><br>--------------------------------------------------------------------------------<br><br>";
/**
 * Class output view
 */
var_export($bi);
echo "<br>";
var_dump($bi);
echo "<br>";
print_r($bi);

echo "<br><br>--------------------------------------------------------------------------------<br><br>";
/**
 * Static Called
 */
echo($bi->static_sum());
echo "<br>";
echo(calculation::static_sum()) ;


echo "<br><br>--------------------------------------------------------------------------------<br><br>";
/**
 * Inheritance
 */
class child extends calculation{
function __construct(){
    parent::__construct(10); // run the parent class constructor
    echo("manager");
}
function sum(){
    echo "<br>sum body has changed:";
    echo "still calling previouse one<br>";
    return parent::sum();
}
}
$ch = new child();
echo ($ch->sum());

echo "<br><br>--------------------------------------------------------------------------------<br><br>";

/**
 * Storing a class on a variable
 */
$o;
function callFun(){
$GLOBALS['o'] = new class{
    public function __construct(){
        $this->name = "John";
    }
    public function say(){
        echo $this->name;
    }
};
}
callFun();
var_export($o);
echo "<br>";
$bi2 = new $o();
$bi2->say();


echo "<br><br>--------------------------------------------------------------------------------<br><br>";
/**
 * Abstrct class
 * use this for security like you can't craete say funcion the main fuction
 */

abstract class pclass{
abstract public function say($a, $b);
}
class cclass extends pclass{
public function say($a, $b){
    echo "Hello<br>";
    echo $a + $b;
}
}

$abc = new cclass();
$abc->say(5,6);



echo "<br><br>--------------------------------------------------------------------------------<br><br>";
/**
 * Interface
 * Use inharitate multiple interface (it's not class)
 */

interface A{
    function a1($a);
}
interface B{
    function b1($b);
}

class C implements A,B{
    public function a1($a){
        return ("A inter face a1 function: " .$a);
    }
    public function b1($a){
        return ("B inter face b1 function: " .$a);
    }
}

$inter = new C();
echo $inter->a1(5);
echo "<br>";
echo $inter->b1(4);

echo "<br><br>--------------------------------------------------------------------------------<br><br>";




/**
 * Late static
 * It will update child data
 */

 class personal{
    public static $name = "Yahoo";
    public function say(){
        echo "Hello, my name is " . self::$name ."||". static::$name . "<br>";
    }
 }

 class childPerso extends personal{
    public static $name = "Baba";
 }


 $perso = new personal();
 $perso->say();

 $childPe = new childPerso();
 $perso->say();
 $childPe->say();


 echo "<br><br>--------------------------------------------------------------------------------<br><br>";








?>
</pre>