<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/23
 * Time: 11:38
 */

require_once "DBConn.inc.php";

$conn = connectDB();

echo "<table width='50%' align='center' border='1'>";

echo "<tr>
    <th>ID</th>
    <th>Log</th>
    <th>Tag</th>
    <th>time</th>
</tr>";

$sql = 'SELECT * from android_log';
$result = mysqli_query($conn, $sql);

if (!$result) {
    die(json_encode($jsonArray));
}

while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<tr><td>{$rows['id']}</td>";
    echo "<td>{$rows['log']}</td>";
    echo "<td>{$rows['tag']}</td>";
    echo "<td>{$rows['create_time']}</td></tr>";
}

mysqli_close($conn);

die("</table>");
