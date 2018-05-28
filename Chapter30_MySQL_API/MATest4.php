<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/25
 * Time: 19:59
 */

require_once "MySQL_Conn.inc.php";

$mysqli = connectZJY();

$sql = "DELETE FROM android_log WHERE create_time='1527043575'";

$mysqli->query($sql);

echo "删除了{$mysqli->affected_rows}行";

$mysqli->close();

exit(0);