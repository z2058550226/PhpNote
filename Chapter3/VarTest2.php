<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/17
 * Time: 20:17
 */

//foreach ($_SERVER as $var => $value) {
//    echo "$var => $value<br/>";
//}
//使用全局变量（上下文）
echo $_SERVER["HTTP_HOST"] . "<br/>";
//输出本网页的url
//echo $_SERVER["HTTP_REFERER"] . "<br/>";
//输出本网页
echo $_SERVER["REMOTE_ADDR"] . "<br/>";

//echo $_GET["id"]."<br/>";
////echo $_GET["cat"]."<br/>";
//获取post请求的表单参数
//echo $_POST["username"]. "<br/>";
//echo $_POST["email"]. "<br/>";
//echo $_POST["pswd"]. "<br/>";
//echo $_POST["subscribe"]. "<br/>";
//echo $_POST["subscribe"] . "<br/>";

//echo $_COOKIE["suikajy"]."<br/>";

print_r($_FILES);

//查看上传文件
//echo $_FILES['file']['name']."<br/>";
//echo $_FILES['file']['type']."<br/>";
//echo $_FILES['file']['size']."<br/>";
//echo $_FILES['file']['tmp_name']."<br/>";
//echo $_FILES['file']['error']."<br/>"

$recipe = "spaghetti";

$$recipe = "meatballs";

echo "<br/>";

echo $recipe . $spaghetti . "<br/>";

echo $recipe . ${$recipe} . "<br/>";

define("PI", 3.14, true);

echo pi . "<br/>";

echo PI . "<br/>";

define("KEY_CONST", "key_const");

echo KEY_CONST . "<br/>";

$var1 = 3;

$var2 = 3.0;

echo "\$var1 is {$var1}\\n" . "<br/>";

include "D:/phpcode/suikajy/util/CommonUtils.inc.php";

loge("哈哈哈");

//类型不同
$var1 === $var2 OR die("不等于" . "<br/>");


exit("<br/>exit string");



