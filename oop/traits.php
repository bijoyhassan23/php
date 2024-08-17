<?php

/**
 * Trait
 * Use a function in multiple class
 */

 trait test{
    public $x = 'var store';
    public function hello($a){
        return $a . " hello test";
    }
 }
 trait test2{
    public function okay($a){
        return $a . " okay test2";
    }
 }

 class a{
    use test, test2;
 }

 class b{
    use test;
    use test2;
 }

 $tr_obj = new a();
 echo($tr_obj->hello('Bijoy'));
 echo "<br>";
 echo($tr_obj->okay('Bijoy2'));
 echo "<br>";
 echo($tr_obj->x);

 echo "<br><br>";

 $tr_obj2 = new b();
 echo($tr_obj2->hello('Rakib'));
 echo "<br>";
 echo($tr_obj2->okay('Rakib2'));
 echo "<br>";
 echo($tr_obj2->x);


echo "<br><br>--------------------------------------------------------------------------------<br><br>";

/**
 * trait overriding
 * It's depend on Priority
 * 1st priority which one is define on the class
 * 2nd if class use traits on his body
 * 3rd extends functions
 */
class c{
    use test, test2; // 2nd priority for c
    public function hello($a){ // 3rd priority for d and 1st prority for c
        return $a . " Hello c";
    }
 }

 class d extends c{
    use test, test2; // 2nd priority
    public function hello($a){ // 1st priority
        return $a . " Hello d";
    }
 }


 $tr_obj3 = new c();
 echo($tr_obj3->hello('Bijoy'));

 echo "<br><br>";

 $tr_obj4 = new d();
 echo($tr_obj4->hello('Rakib'));

 echo "<br><br>--------------------------------------------------------------------------------<br><br>";
 
 /**
  * If both traits use same functions
  * Scop rejulation oparator
  */

  trait test3{
    public function hello($a){
        return $a . " hello test3";
    }
    public function okay($a){
        return $a . " okay test3";
    }
    private function right($a){
        return $a . " right test3";
    }
  }

  trait test4{
    public function hello($a){
        return $a . " hello test4";
    }
    public function okay($a){
        return $a . " okay test4";
    }
    private function right2($a){
        return $a . " right2 test4";
    }
  }

  class e{
    use test3, test4{
        test3::hello insteadof test4; // saying which function to use 
        test4::hello as newHello; // rename the test4 hello function
        test3::right as public; // change the function privet to public
        test4::right2 as public test4Right; // publick and rename

        test3::okay insteadof test4;
        test4::okay as newokay;
    }
 }

 $tr_obj5 = new e();

 echo($tr_obj5->hello('Bijoy'));
 echo "<br>";
 echo($tr_obj5->newHello('Bijoy'));
 echo "<br>";
 echo($tr_obj5->right('Bijoy'));

 echo "<br><br>";
 
 echo($tr_obj5->okay('Bijoy'));
 echo "<br>";
 echo($tr_obj5->newokay('Bijoy'));
 echo "<br>";
 echo($tr_obj5->test4Right('Bijoy'));
 
 
 echo "<br><br>--------------------------------------------------------------------------------<br><br>";

