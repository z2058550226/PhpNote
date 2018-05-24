<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/5
 * Time: 16:58
 */

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    printf("Hi %s <br/>", $name);
    printf("The address %s will soon be a spam-magnet" . "<br/>", $email);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <p>
        Name:<br/>
        <input type="text" id="name" name="name" size="20" maxlength="40"/>
    </p>
    <p>
        Email Address:<br/>
        <input type="text" id="email" name="email" size="20" maxlength="40"/>
    </p>
    <input type="submit" name="submit" id="submit" value="Go!"/>
</form>
</body>
</html>
