<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/22 0022
 * Time: 下午 16:07
 */
//组头添加元素
$state = array("Ohio", "New York");
array_unshift($state, "California", "Texas", "Cleveland", "Alaska");
print_r($state);

echo "<br/>";

$state = array("Ohio", "New York");
array_push($state, "California", "Texas");
print_r($state);

echo "<br/>";

$states = array("Ohio", "New York", "California", "Texas");
$state = array_shift($states);
print_r($states);
echo $state;

echo "<br/>";

$states = array("Ohio", "New York", "California", "Texas");
$state = array_pop($states);
print_r($states);
echo $state;

echo "<br/>";

$states = array("Ohio", "New York", "California", "Texas");
$state = "Ohio";
if (in_array($state, $states)) {
    echo "Not to worry, $state is smoke-free";
}


