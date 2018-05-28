<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/25
 * Time: 17:02
 */

require_once "MySQL_Conn.inc.php";
//链接数据库
$mysqli = connectZJY();
//创建查询语句和占位符
$sql = "insert into android_log set log = ?,tag = ?,create_time= ?";
//创建参数化sql语句对象
$stmt = $mysqli->stmt_init();
//为执行准备参数化sql语句
$stmt->prepare($sql);
//绑定参数 type 写 ssd 意思是参数分别是 string string digital
//因为这里定义的是三个字符串所以type设置为sss
$stmt->bind_param('sss', $log, $tag, $create_time);

$logArray = array("log1", "log2", "log3", "log4", "log5");

$tagArray = array("tag1", "tag2", "tag3", "tag4", "tag5");

$createTimeArray = array("1527043575", "1527043576", "1527043577", "1527043578", "1527043579");
//初始化计数器
$x = 0;
//执行成功结果数
$result = 0;
//处理循环，迭代执行查询
while ($x < sizeof($logArray)) {
    $log = $logArray[$x];
    $tag = $tagArray[$x];
    $create_time = $createTimeArray[$x];
    $result += $stmt->execute();
    $x++;
}
//回收stmt语句资源
$stmt->close();
//关闭链接
$mysqli->close();

die("执行成功结果数：$result");



