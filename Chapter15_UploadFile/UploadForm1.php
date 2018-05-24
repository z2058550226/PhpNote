<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/12
 * Time: 9:48
 */
?>

<form action="UploadTest2.php" method="post" enctype="multipart/form-data">

    <label>
        Name:<br/>
        <input type="text" name="name" value=""/>
    </label> <br/>

    <label>
        Email:<br/>
        <input type="text" name="email" value=""/>
    </label> <br/>

    <label>
        Class notes:<br/>
        <input type="file" name="homework" value=""/>
    </label> <br/>

    <input type="submit" name="submit" value="Submit Homework"/>

</form>
