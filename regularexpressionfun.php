
<pre>
<?php
/**
 * with this function we can replace
 * and we can split it
 * and last one added backslash before the special charecter
 * -----------------------------------------------------------------------------------
 * -----------------------------------------------------------------------------------
 * preg_replace(pattern, replacement, string, limit)
 * preg_split(pattern, string, limit, flags)
 * preg_quote(string, delimiter, limit)
 */


$string = "<h1>php is the web scripting php language of choice</h1>";

$pattern = "/PHP/i";
$replacement = "JavaScript";

echo preg_replace($pattern, $replacement, $string); // replace all the php
echo "<br><br>";
echo preg_replace($pattern, $replacement, $string, 1); // replace only one time

echo "<br><br>";
$pattern = "/<.+?>/i";
$replacement = "";
echo preg_replace($pattern, $replacement, $string); // replace all the php h1 to ""

echo "<br><br>";
$string = "april 15, 2020";
$pattern = "/(\w+) (\d+), (\d+)/i";
$replacement = "$1 25, $3"; //$1 ,$3 we selected the group 1 and 3
echo preg_replace($pattern, $replacement, $string);

echo "<br><br>";
$string = "{startDate} = 1999-5-10";
$pattern = ["/(19|20)(\d{2})-(\d{1,2})-(\d{1,2})/i", "/^\s*{(\w+)}\s*=/i"];
$replacement = ["$4/$3/$1$2", "$1 ="]; // change the date formate and use multi search
echo preg_replace($pattern, $replacement, $string);

echo "<br><br>";
$string2 = "$5.99";
echo preg_quote($string2); // it will add \ for every special charecter

echo "<br><br>";
$string = "php is the web scripting    php language of choice";
$split = preg_split("/[\s]+/i", $string); // it will devite it
print_r($split);

echo "<br><br>";
$string = "php is the web scripting    php language of choice";
$split = preg_split("/[\s]+/i", $string, 3); // it will device the it array
print_r($split);

echo "<br><br>";
$string = "php is the web scripting php language of choice";
$split = preg_split("/web|of/i", $string); // it will device the it array
print_r($split);

echo "<br><br>";
$string = "https://bijoy.dev/portfolio/";
$split = preg_split("/\//i", $string); // it will device the it array
print_r($split);

echo "<br><br>";
$string = "https://bijoy.dev/portfolio/";
$split = preg_split("/\//i", $string, -1, PREG_SPLIT_NO_EMPTY); // it will device the it array
print_r($split);

echo "<br><br>";
$string = "php hypertext language programming";
$split = preg_split("/ /i", $string, -1, PREG_SPLIT_OFFSET_CAPTURE); // it will device the it array
print_r($split);
?>
</pre>
