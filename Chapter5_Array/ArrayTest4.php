<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/23
 * Time: 14:01
 */

$capitals = array("Ohio" => "Columbus", "Iowa" => "Des Moines");
echo "<p>Can you name the capitals of these states?</p>";
while ($key = key($capitals)) {
    printf("%s <br/>", $key);
    next($capitals);
}

echo "<br/>";

$capitals = array("Ohio" => "Columbus", "Iowa" => "Des Moines");
echo "<p>Can you name the states belonging to these capitals?</p>";
while ($capital = current($capitals)) {
    printf("%s <br/>", $capital);
    next($capitals);
}

$capitals = array("Ohio" => "Columbus", "Iowa" => "Des Moines");
echo "<p>The map relation is below</p>";
while ($entry = each($capitals)) {
    print_r($entry);
    echo "<br/>";
}

$fruits = array("apple", "orange", "banana");
$fruit = next($fruits);
echo $fruit . "<br/>";//output orange
$fruit = next($fruits);
echo $fruit . "<br/>";//output banana

//数组指针前移一位
$fruits = array("apple", "orange", "banana");
$fruit = next($fruits);
echo $fruit . "<br/>";//output orange
$fruit = prev($fruits);
echo $fruit . "<br/>";//output apple

//数组指针移到最前
$fruits = array("apple", "orange", "banana");
$fruit = next($fruits);
echo $fruit . "<br/>";//output orange
$fruit = next($fruits);
echo $fruit . "<br/>";//output banana
$fruit = reset($fruits);
echo $fruit . "<br/>";//output apple

//数组指针移到最后
$fruits = array("apple", "orange", "banana");
$fruit = end($fruits);
echo $fruit . "<br/>";//output banana