<pre>
<?php
/**
 * /pattern/modifiers
 */

$string = "PHP is the web script-ing i p,hp 5.22 langua?ge of choice 825 https://bijoy.dev/
this is a 
car";

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

// $exp = preg_match_all("/php|web|the/i", $string, $array); // | with this we can search multiple items
// $exp = preg_match_all("/[wol]/i", $string, $array); // [] this will search letter indivisually
// $exp = preg_match_all("/[^wol]/i", $string, $array); // ^ it will search ever element without those
// $exp = preg_match_all("/[a-d]/i", $string, $array); // - it will define a renge. It will seach a,b,c,d
// $exp = preg_match_all("/[a-jA-j]/", $string, $array); // searching multiple renge
// $exp = preg_match_all("/[0-9]/", $string, $array); // searching number renge
// $exp = preg_match_all("/[^0-4]/", $string, $array); // it will find rest of the item without these
// $exp = preg_match_all("/[a-d0-5]/", $string, $array); // number and letter search
// $exp = preg_match_all("/\w/", $string, $array); // it will take all the letter, leav all the spesical charrecter
// $exp = preg_match_all("/\W/", $string, $array); // it will take all the special charecter, leav all the letter
// $exp = preg_match_all("/\d/", $string, $array); // it will select all the numbers
// $exp = preg_match_all("/\D/", $string, $array); // it will select all the letter, leave all the numbrs
// $exp = preg_match_all("/\s/", $string, $array); // it will select all spaces
// $exp = preg_match_all("/\S/", $string, $array); // it will select all other things, wihout the spaces
// $exp = preg_match_all("/\bi\b/", $string, $array); // it will select all i, it will search inside \b of these word/letters

// $exp = preg_match_all("/ph./i", $string, $array); // . mean single charecter, it will take the word ph and one more leetter, if I incress the dot, it will select multiple charecter
// $exp = preg_match_all("/\?/i", $string, $array); // finder the special charecter ? . [ ] ^ $ + -
// $exp = preg_match_all("/https:\/\/bijoy\.dev\//i", $string, $array); // finder the special charecter ? . [ ] ^ $ + -
// $exp = preg_match_all("this is a \nchar/i", $string, $array); // finder multi line
$exp = preg_match_all("this is a \nchar/i", $string, $array); // finder multi line











/**
 * https://regex101.com/
 * visite this website you will learn everything
 */










var_export($exp);
print_r($array);
?>
</pre>