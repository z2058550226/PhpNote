<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/6
 * Time: 10:47
 */

$email = "john@example.com";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "INVALID E-MAIL!";
}