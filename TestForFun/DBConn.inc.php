<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/23
 * Time: 11:39
 */

//每页有多少项
define('ITEM_NUM_OP', 10);

$jsonArray = array('status' => 0, 'msg' => '访问失败');

function connectDB()
{
    header("Content-type:text/html;charset=utf-8");//字符编码设置

    $conn = mysqli_connect("119.3.23.148", "root", "ZJY@123456a", "zjy", "8635");

    if (!$conn) {
        die("链接数据库错误" . mysqli_connect_error());
    } else {
        return $conn;
    }
}