<?php
/**
 * we can add name space in the same page
 * We can declare namspace with semicolon and brakets
 * Check both file you will see the two type
 * 
 * When you are useing name space all the code must be contain any of namespace 
 * If they are in diffrent file then you can put the code out side of namespace
 * and if you are not using any other page then all the name space should be same formate, only braket or only ;
 * 
 * You can do nested namespace but for this there is a syntaxt, check name_space_without_brakets.php
 * 
 * we can rename the name space
 * we can also rename the classes
 * 
 * If name space are in same page you must need to add a \ on the starting
 */

 echo "this is namespace file<br>";
 
require "first.php";
require "second.php";

$obj1 = new first\test();
echo ($obj1->show());

echo "<br>";

$obj2 = new second\test();
echo ($obj2->show());


echo "<br>";

use second as se; // rename the name space
$obj3 = new se\test();
echo ($obj3->show());


echo "<br>";

use first\test as T; // rename the class name
$obj4 = new T();
echo ($obj4->show());


echo "<br><br>-------------------------------------------------<br><br>";

require "same_file_namespace.php";

echo "<br><br>-------------------------------------------------<br><br>";

require "namespace_without_brakets.php";

echo "<br><br>-------------------------------------------------<br><br>";




