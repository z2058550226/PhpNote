<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/20
 * Time: 9:32
 */

//heredoc 语法

$website = "http://www.romatermini.it";

echo <<<EXCERPT
<p>
Rome's central train station, known as <a href="$website">Roma Termini</a>,
was built in 1867. Because it has fallen into severe disrepair in the late 20th
century, the government knew that considerable resources were required to rehabilitate 
the station prior to the 50-year <i>Giubileo</i>.
</p>
EXCERPT;

$links = array("www.baidu.com", "www.suikajy.com", "www.hao123.com");

echo "<b>Online Resources</b>:<br/>";

foreach ($links as $var) {
    echo "<a href=\"http://$var\">{$var}</a><br/>";
}

$links2 = array(
    "baidu" => "www.baidu.com",
    "suikajy" => "www.suikajy.com",
    "hao123" => "www.hao123.com"
);

print_r($links2);

foreach ($links2 as $key => $value) {
    echo "key is {$key} => value is {$value} <br/>";
}