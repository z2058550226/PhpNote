<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/12
 * Time: 14:02
 */

$email = "2058550226@qq.com";
$host = explode("@", $email);

$recordexits = checkdnsrr($host[1], "ANY");
if ($recordexits) {
    echo "domain exists";
} else {
    echo "domain not exists";
}