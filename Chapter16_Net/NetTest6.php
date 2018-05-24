<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/12
 * Time: 14:56
 */

$target = "www.baidu.com";
echo "<pre>";
system("/user/bin/nmap $target");
echo "</pre>";

system("killall -q nmap");