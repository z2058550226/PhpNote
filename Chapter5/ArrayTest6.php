<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/23
 * Time: 16:14
 */

$garden = array("cabbage", "peppers", "turnips", "carrots");
echo count($garden);//output 4
echo "<br/>";

$location = array("Italy", "Amsterdam", array("Boston", "Des Moines"), "Miami");
echo count($location, 1);//output 6
echo "<br/>";

$states = array("Ohio", "Iowa", "Arizona", "Iowa", "Ohio");
$stateFrequency = array_count_values($states);
print_r($stateFrequency);//output : Array ( [Ohio] => 2 [Iowa] => 2 [Arizona] => 1 )
echo "<br/>";

$states = array("Ohio", "Iowa", "Arizona", "Iowa", "Ohio");
$stateUnique = array_unique($states);
print_r($stateUnique);//output : Array ( [0] => Ohio [1] => Iowa [2] => Arizona )
echo "<br/>";

$states = array("Delaware", "Pennsylvania", "New Jersey");
$statesR = array_reverse($states);
print_r($statesR);//output : Array ( [0] => New Jersey [1] => Pennsylvania [2] => Delaware )
echo "<br/>";
$statesR = array_reverse($states, 1);
print_r($statesR);
echo "<br/>";//output : Array ( [2] => New Jersey [1] => Pennsylvania [0] => Delaware )

$states = array("Delaware", "Pennsylvania", "New Jersey");
$states = array_flip($states);
print_r($states);//output : Array ( [Delaware] => 0 [Pennsylvania] => 1 [New Jersey] => 2 )
echo "<br/>";

$grades = array(43, 41, 92, 11, 23);
sort($grades);
print_r($grades);//output : Array ( [0] => 11 [1] => 23 [2] => 41 [3] => 43 [4] => 92 )
echo "<br/>";

$states = array("OH" => "Ohio", "CA" => "California", "MD" => "Maryland");
sort($states);
print_r($states);//output : Array ( [0] => California [1] => Maryland [2] => Ohio )
echo "<br/>";

$state = array();
$state[] = "Delaware";
$state[] = "Pennsylvania";
$state[] = "New Jersey";
asort($state);
print_r($state);//output : Array ( [0] => Delaware [2] => New Jersey [1] => Pennsylvania )
echo "<br/>";

$state = array();
$state[] = "Delaware";
$state[] = "Pennsylvania";
$state[] = "New Jersey";
rsort($state);
print_r($state);//output : Array ( [0] => Pennsylvania [1] => New Jersey [2] => Delaware )
echo "<br/>";

$state = array();
$state[] = "Delaware";
$state[] = "Pennsylvania";
$state[] = "New Jersey";
arsort($state);
print_r($state);//output : Array ( [1] => Pennsylvania [2] => New Jersey [0] => Delaware )
echo "<br/>";

$pictures = array("picture1.jpg", "picture2.jpg", "picture10.jpg", "picture20.jpg");
sort($pictures);
print_r($pictures);//default output : Array ( [0] => picture1.jpg [1] => picture10.jpg [2] => picture2.jpg [3] => picture20.jpg )
echo "<br/>";
natsort($pictures);
print_r($pictures);//natural output : Array ( [0] => picture1.jpg [1] => picture2.jpg [2] => picture10.jpg [3] => picture20.jpg )
echo "<br/>";

$pictures = array("picture1.jpg", "picture2.jpg", "PICTURE10.jpg", "picture20.jpg");
natsort($pictures);
print_r($pictures);//default output : Array ( [2] => PICTURE10.jpg [0] => picture1.jpg [1] => picture2.jpg [3] => picture20.jpg )
echo "<br/>";
natcasesort($pictures);
print_r($pictures);//natural output : Array ( [0] => picture1.jpg [1] => picture2.jpg [2] => PICTURE10.jpg [3] => picture20.jpg )
echo "<br/>";







