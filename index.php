<?php

require_once "util/LogUtils.inc.php";

$log = "一个测试的log";
echo json_decode($log);
$b = json_decode($log);
$a = array("a" => $b);
echo serialize($a);
exit;
loge($log);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>suika test</title>
</head>
<body>
<form action="Chapter3/VarTest2.php" method="post" enctype="multipart/form-data">
    <input type="file" name="thumb" value=""/>
    <input type="submit" name="subscribe" value="subscribe!"/>
</form>
</body>
</html>