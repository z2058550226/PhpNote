<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/25
 * Time: 11:37
 */

require_once "MySQL_Conn.inc.php";

$mysqli = connectZJY();

$sql = "delete from android_log where create_time='1527043581'";

$result = $mysqli->query($sql);

die("{$mysqli->affected_rows}行被删除");