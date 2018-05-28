<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/25
 * Time: 10:21
 */

require_once "MySQL_Conn.inc.php";

$mysqli = connectZJY();

$sql = "select * from android_log";

$result = $mysqli->query($sql);

//while (list($id, $log, $tag, $create_time) = $result->fetch_row()) {
//    echo "id : $id, log : $log, tag ; $tag, create_time : " . date('h:i:s', $create_time ? $create_time : 0) . "<br/>";
//}

//while ($row = $result->fetch_row()) {
//    print_r($row);
//    echo "<br/>";
//}

while ($row = $result->fetch_assoc()) {
    print_r($row);
    echo "<br/>";
}

$mysqli->close();