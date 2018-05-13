<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/6
 * Time: 16:33
 */

$authorized = FALSE;

if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
    $authFile = file("file/authenticationFile.txt");
    if (in_array($_SERVER['PHP_AUTH_USER'] . ":" . md5($_SERVER['PHP_AUTH_PW']) . "\r\n", $authFile)) {
        $authorized = TRUE;
    }
} else {
    header('WWW-Authenticate: Basic Realm="Book Projects"');
    header('HTTP/1.1 401 Unauthorized');
    print "You must provide the proper credentials!";
    exit;
}

if ($authorized) {
    //此后的代码是被限制访问的部分
    echo "Welcome";
} else {
    header('WWW-Authenticate: Basic Realm="Book Projects"');
    header('HTTP/1.1 401 Unauthorized');
    print "You must provide the proper credentials!";
    exit;
}