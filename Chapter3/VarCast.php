<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/17
 * Time: 14:00
 */

$model = "Toyota";

$obj = (object)$model;

echo "<br>{$obj->scalar}";

$score1 = (double)13;

$score2 = (int)12.3;

$sentence = "This is a sentence";

echo (int)$sentence;

$score3 = 121;

$scoreBoard = (array)$score3;

echo "<br>{$scoreBoard[0]}";

$total = "     45 fire engines";
$incoming = 10;
$total = $incoming + $total;

echo "<br>{$total}";

$str1 = "aaa";

$result = gettype($str1);
$isString = is_string($str1);
if ($isString) echo "<br>是字符串";

$value1 = "Hello";

function change(&$var)
{
    $var = "changed";
}

echo "<p>{$value1}</p>";//输出Hello

change($value1);

echo "<p>{$value1}</p>";//输出changed

$value2 = 15;

function inc()
{
    global $value2;
    $value2++;
    echo "<p>{$value2}</p>";
}

inc();//输出16

$value3 = 15;

function inc2()
{
    $GLOBALS["value3"]++;
}

inc2();

echo "<p>{$value3}</p>";//输出16

function recursive()
{
    static $varS = 0;
    $varS++;
    echo "<p>{$varS}</p>";
    if ($varS < 3) {
        recursive();
    }
}

recursive();//输出123


