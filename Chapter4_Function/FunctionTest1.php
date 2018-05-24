<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/21
 * Time: 11:52
 */

require_once "D:/phpcode/suikajy/util/CommonUtils.inc.php";

$userArray = array("a", "b", "c");

$userArray[] = "d";

print_r($userArray);

function retrieveUserProfile()
{
    $user[] = "Jason Gilmore";
    $user[] = "jason@example.com";
    $user[] = "English";
    return $user;
}

list($name, $email) = retrieveUserProfile();

list($a, $b, $c, $d) = $userArray;

loge($name);

loge($email);

loge($a . $b . $c . $d);