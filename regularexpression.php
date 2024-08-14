<pre>
<?php
/**
 * /pattern/modifiers
 */

$string = "<h1>PHP is the web</h1> script-ing i p,hp 5.22 langua?ge phhhhp of choice 825 https://bijoy.dev/
this is a 
car
1
12
123
1234
12345
123456
word
1word
12word
123word
1234word
12345word
123456word
212-456-7896
212*456*7896
color 
colour
jan
january
august 22nd
aug 22
aug 22nd
august 22

file.txt
file1.xlsx
file20.docx
fileabc1.pptx

I like Toyta and Honda
I like Toyta and Honda and Toyta
I like Toyta and Honda and Honda

bill paid
bill not paid
bill paid
bill not paid

100 USD 
250 JPY
900 EUR
856 INR

free course
paid course
free course
paid course

social worker
hard worker
lazy worker
poor worker
ontelligent worker";

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
// $exp = preg_match_all("/this is a \nchar/i", $string, $array); // finder multi line



/**
 * "*" 0 or more
 * "+" 1 or more
 * "?" 0 or one
 * "{3}" Excat Number
 * "{3,5}" range of numbers (minumum, maximum)
 * "{3,}" minumum number to infinite
 * () this use for grouping
 * remeber this site will count only previous one letter
 * If you do the groping then it will count multiple line
 */

// $exp = preg_match_all("/ph*p/i", $string, $array); // * this can select multiple charecter like phhhhhhhp
// $exp = preg_match_all("/\d*/i", $string, $array); // * this can select multiple charecter this will select all the numbrs
// $exp = preg_match_all("/\d*word/i", $string, $array); // * this will select all the word with or witout numbers
// $exp = preg_match_all("/\d+word/i", $string, $array); // + this will select all the word with atlist one numbers
// $exp = preg_match_all("/\d?word/i", $string, $array); // ? this will select all the word with one numbers and without word
// $exp = preg_match_all("/\d{3}word/i", $string, $array); // this will select all the word with three numbers
// $exp = preg_match_all("/\d{3, 5}word/i", $string, $array); // this will select all the word with three numbers, 4 numbers, 5 numbers
// $exp = preg_match_all("/\d{3,}word/i", $string, $array); // this will select all the word with three numbers or mores
// $exp = preg_match_all("/\d+.\d+.\d+/i", $string, $array); // this will (212-456-7896) and (212*456*7896) these type of numbers
// $exp = preg_match_all("/\d+[-]\d+[-]\d+/i", $string, $array); // this will 212-456-7896 only with hipens these type of numbers
// $exp = preg_match_all("/jan(uary)?/i", $string, $array); // this will select jan and january
// $exp = preg_match_all("/aug(ust)?\s22(nd)?/i", $string, $array); // this will select aug date



/**
 * *n Greedy match
 * +n greedy match
 * *?n lazy match
 * +?n lazy match
 */

// $exp = preg_match_all("/s[a-z]*i/i", $string, $array); // this is gridy so it will select last i
/*$exp = preg_match_all("/<.*?>/i", $string, $array); // this will select all the tags*/
/* $exp = preg_match_all("/<.*?>/i", $string, $array); // this will select all the tags with center text */
// $exp = preg_match_all("/file\w*\.(txt|xlsx|docx|pptx)/i", $string, $array); // this will select all file name with extention
// $exp = preg_match_all("/I like (Toyta) and (Honda) and \1/i", $string, $array); // calling group






/**
 * Assertion
 * ?=n positive lookahead
 * ?!n Negative Lookahead
 * ?<= Positive lookbehide
 * ?!= negative Lookbehind
 * ?<! negative Lookbehind
 */




// $exp = preg_match_all("/bill(?=\spaid)/i", $string, $array); // select those billed whcih is paid
// $exp = preg_match_all("/\d*(?=\seur)/i", $string, $array); // select the number before the eur, \s is space
// $exp = preg_match_all("/bill(?!\spaid)/i", $string, $array); // select those billed whcih is not paid , that's mean it will not select those bill which have paid after the billed, it will select not paid billed
// $exp = preg_match_all("/(?<=free\s)course/i", $string, $array); // select those course wich is after free
// $exp = preg_match_all("/(?<=social\s)worker/i", $string, $array); // select those worker wich is after social
// $exp = preg_match_all("/(?<!social\s)worker/i", $string, $array); // select those worker wich is not after social

/**
 * "^" it will select frist word of the paragraph
 * "$" thsi can select last word of the paragraph
 */

/**
 * https://regex101.com/
 * visite this website you will learn everything
 */

 var_export($exp);
print_r($array);
?>
</pre>