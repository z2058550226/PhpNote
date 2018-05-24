<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/23
 * Time: 15:12
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>suika test</title>
</head>
<body>
<form action="ArrayTest5.php" method="post" enctype="multipart/form-data">

    <p>Provide up to six keyword that you believe best describe the state in which you live:</p>

    <p>Keyword1:<br/>
        <input type="text" name="keyword[]" size="20" maxlength="20" value=""/></p>
    <p>Keyword2:<br/>
        <input type="text" name="keyword[]" size="20" maxlength="20" value=""/></p>
    <p>Keyword3:<br/>
        <input type="text" name="keyword[]" size="20" maxlength="20" value=""/></p>
    <p>Keyword4:<br/>
        <input type="text" name="keyword[]" size="20" maxlength="20" value=""/></p>
    <p>Keyword5:<br/>
        <input type="text" name="keyword[]" size="20" maxlength="20" value=""/></p>
    <p>Keyword6:<br/>
        <input type="text" name="keyword[]" size="20" maxlength="20" value=""/></p>
    <p><input type="submit" value="Submit!"/></p>
</form>
</body>
</html>
