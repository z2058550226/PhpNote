<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/22 0022
 * Time: 下午 14:27
 */

require_once "../utils/LogUtils.inc.php";

$language = array("English", "Gaelic", "Spanish");

print_r($language);

loge($language[0]);

$language = array("china" => "chinese", "United States" => "English", "Ireland" => "Gaelic");

print_r($language);

$users = fopen("user.txt", "r");

echo "<br/>";
//若文件未达到EOF，则获取下一行
while ($line = fgets($users, 4096)) {
    //用explode()分离数据片段
    list($name, $occupation, $color) = explode("|", $line);
    printf("Name : %s<br/>", $name);
    printf("Occupation : %s<br/>", $occupation);
    printf("Color : %s<br/>", $color);
}

$even = range(0, 20, 2);

print_r($even);

$arrayTest = range(1, 5);

$isArray = is_array($arrayTest);//值为true

$customers = array();
$customers[] = array("Jason Gilmore", "jason@example.com", "614-999-9999");
$customers[] = array("Jesse James", "jesse@example.net", "818-999-9999");
$customers[] = array("Donald Duck", "donald@example.com", "212-999-9999");

foreach ($customers AS $customer) {
    vprintf("<p>Name: %s<br/>Email: %s<br/>PhoneNum: %s</p>",$customer);
}

