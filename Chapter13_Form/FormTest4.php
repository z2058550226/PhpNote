<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/6
 * Time: 11:14
 */

if (isset($_POST['submit'])) {
    echo "You like the following languages:<br/>";
    foreach ($_POST['languages'] as $language) {
        echo "$language <br/>";
    }
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    What's your favorite programing language?<br/>
    (Check all that apply):<br/>
    <input type="checkbox" name="languages[]" value="C#"/>C#<br/>
    <input type="checkbox" name="languages[]" value="JavaScript"/>JavaScript<br/>
    <input type="checkbox" name="languages[]" value="perl"/>perl<br/>
    <input type="checkbox" name="languages[]" value="php"/>php<br/>
    <input type="submit" name="submit" value="Submit!">
</form>
