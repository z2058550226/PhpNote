<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/6/1
 * Time: 10:41
 */

require_once "../Chapter30_MySQL_API/MySQL_Conn.inc.php";

$mysqli = connectZJY();

$sql = "call get_log()";

$result = $mysqli->query($sql);

while ($row = $result->fetch_array(MYSQLI_NUM)) {
    print_r($row);
    echo "<br/>";
}

$mysqli->close();