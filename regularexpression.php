<pre>
<?php
/**
 * /pattern/modifiers
 */

$string = "PHP is the web scripting php  language of choice";

/**
 * preg_match(pattern, string, array)
 * array is optional
 * it store the match on the array
 * this will match only one
 * If it's find one of the patter in the string it will return true
 */

// $exp = preg_match("/PHP/", $string); // it will take the same text
// $exp = preg_match("/php/i", $string); // it will take samll, capetal both (i) universel modifier


/**
 * preg_math_all(pattern, string, array)
 * Basically we use this fuction with multiple matches
 */

$exp = preg_match_all("/php/i", $string, $array); // it will shwo the math and store matches on the array

var_export($exp);
print_r($array);
?>
</pre>