<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/27 0027
 * Time: 上午 10:33
 */

define('DB_HOST', "119.3.23.148");
define('DB_USER', "root");
define('DB_PSW', "ZJY@123456a");
define('DB_DEF_DATABASE', "zjy");
define('DB_PORT', "8635");

function connect_db()
{
    $mysqli = new mysqli(DB_HOST, DB_USER,
        DB_PSW, DB_DEF_DATABASE, DB_PORT);

    if ($mysqli->errno) {
        die("数据库连接失败：$mysqli->error");
    } else {
        return $mysqli;
    }
}

