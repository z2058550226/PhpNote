<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/24
 * Time: 8:56
 */

$face = array("J", "Q", "K", "A");
$numbered = array("2", "3", "4", "5", "6", "7", "8", "9");
$card = array_merge($face, $numbered);
shuffle($card);//将数组顺序打乱
print_r($card);//output : Array ( [0] => 5 [1] => 7 [2] => J [3] => 3 [4] => Q [5] => 4 [6] => 6 [7] => 2 [8] => 8 [9] => K [10] => A [11] => 9 )

echo "<br/>";

$class1 = array("John" => 100, "James" => 85);
$class2 = array("Micky" => 78, "John" => 45);
$total = array_merge_recursive($class1, $class2);
print_r($total);//output : Array ( [John] => Array ( [0] => 100 [1] => 45 ) [James] => 85 [Micky] => 78 )

echo "<br/>";

$abbreviations = array("AL", "AK", "AZ", "AR");
$states = array("Alabama", "Alaska", "Arizona", "Arkansas");
$stateMap = array_combine($abbreviations, $states);//output : Array ( [AL] => Alabama [AK] => Alaska [AZ] => Arizona [AR] => Arkansas )
print_r($stateMap);

echo "<br/>";

$states = array("Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut");
$subset = array_slice($states, 4);
print_r($subset);//output : Array ( [0] => California [1] => Colorado [2] => Connecticut )

echo "<br/>";

$states = array("Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut");
$subset = array_slice($states, 3, -1, true);
print_r($subset);//output : Array ( [3] => Arkansas [4] => California [5] => Colorado )

echo "<br/>";

$states = array("Alabama", "Alaska", "Arizona", "Arkansas", "California", "Connecticut");
$subset = array_splice($states, 4);
print_r($states);//output : Array ( [0] => Alabama [1] => Alaska [2] => Arizona [3] => Arkansas )
echo "<br/>";
print_r($subset);//output : Array ( [0] => California [1] => Connecticut )
echo "<br/>";

$states = array("Alabama", "Alaska", "Arizona", "Arkansas", "California", "Connecticut");
$subset = array_splice($states, 4, -1, array("New York", "Florida"));
print_r($states);//output : Array ( [0] => Alabama [1] => Alaska [2] => Arizona [3] => Arkansas [4] => New York [5] => Florida [6] => Connecticut )
echo "<br/>";
print_r($subset);//output : Array ( [0] => California )
echo "<br/>";

echo "<br/>";

//取交集
$array1 = array("OH", "CA", "NY", "HI", "CT");
$array2 = array("OH", "CA", "HI", "NY", "IA");
$array3 = array("TX", "MD", "NE", "OH", "HI");
$intersection = array_intersect($array1, $array2, $array3);
print_r($intersection);//output : Array ( [0] => OH [3] => HI )
echo "<br/>";

$array1 = array("OH" => "Ohio", "CA" => "California", "HI" => "Hawaii");
$array2 = array("50" => "Hawaii", "CA" => "California", "OH" => "Ohio");
$array3 = array("TX" => "Texas", "MD" => "Maryland", "OH" => "Ohio");
$intersection = array_intersect_assoc($array1, $array2, $array3);
print_r($intersection);//output ：Array ( [OH] => Ohio )
echo "<br/>";

//取差集
$array1 = array("OH", "CA", "NY", "HI", "CT");
$array2 = array("OH", "CA", "HI", "NY", "IA");
$array3 = array("TX", "MD", "NE", "OH", "HI");
$intersection = array_diff($array1, $array2, $array3);
print_r($intersection);//output : Array ( [4] => CT )
echo "<br/>";






