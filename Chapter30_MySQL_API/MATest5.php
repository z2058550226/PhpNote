<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/28
 * Time: 11:32
 */

require_once "MySQL_Conn.inc.php";

$mysqli = connectZJY();

$sql = "SELECT log, tag, create_time FROM android_log order by id desc";

$stmt = $mysqli->stmt_init();

$stmt->prepare($sql);

$stmt->execute();

$stmt->bind_result($log, $tag, $ct);

while ($stmt->fetch()) {
    echo "\$log : {$log}, \$tag : {$tag} \$ct : {$ct}";
    echo "<br/>";
}

$stmt->close();

$mysqli->close();