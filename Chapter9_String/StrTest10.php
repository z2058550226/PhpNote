<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/29
 * Time: 14:53
 */

$delimitedText = "Jason+++Gilmore+++++++++++Columbus++OH";

//由于+是元字符，所以转义成一个原子，然后用+修饰\+，表示1个或多个加号
$friends = preg_split("/\++/", $delimitedText);

print_r($friends);//Array ( [0] => Jason [1] => Gilmore [2] => Columbus [3] => OH )