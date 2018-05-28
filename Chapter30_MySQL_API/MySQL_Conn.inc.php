<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/25
 * Time: 9:31
 */

function connectZJY()
{
    //创建mysqli对象，它是一个mysql的操作类对象
    $mysqli = new mysqli();

    $host = "119.3.23.148";
    $user = "root";
    $password = "ZJY@123456a";
    $database = "zjy";
    $port = "8635";
    //链接数据库
    $mysqli->connect($host, $user, $password, $database, $port);

    if ($mysqli->errno) {
        die("数据库连接错误" . $mysqli->error);
    }

    //使用数据库（use database）
    $mysqli->select_db($database);

    return $mysqli;
}



