<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/29
 * Time: 15:00
 */

$psw = "qwertyuioa";

if (strlen($psw) < 10) {//java 的 String::length();
    echo "password is too short";
} else {
    echo "password is allowed";
}

echo "<br/>";

$psw1 = "super secret";
$psw2 = "super secret2";

if (strcasecmp($psw1, $psw2)) {
    echo "Passwords do not match";
} else {
    echo "Passwords match!";
}

echo "<br/>";

$psw = "3312345";

if (strspn($psw, "1234567890") == strlen($psw)) {
    echo "The password cannot consist solely of numbers";
}

echo "<br/>";

$psw = "a12345a";

if (strcspn($psw, "1234567890") == 0) {//这里不为数字的字符长度为1，返回第一部分不为数字的长度
    echo "The password cannot consist solely of numbers";
}

echo "<br/>";

$advertisement = "Coffee at 'café francaise' cost $2.25";
echo $advertisement . "<br/>";
echo htmlentities($advertisement);//Coffee at 'café francaise' cost $2.25

echo "<br/></br>";


$table = array('<b>' => '<i>', '</b>' => '</i>');
$html = "<b>Today in PHP-Powered News</b>";
echo $html;
echo "<br/>";
echo strtr($html, $table);
echo "<br/>";

$input = "This is <a href='StrTest5.php'>baidu</a>";
echo $input;
echo "<br/>";
echo strip_tags($input);
echo "<br/>";
echo strip_tags($input, "<a>");



