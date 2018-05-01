<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/1
 * Time: 11:40
 */

$fh = fopen('file/user.txt', 'r');

while (!feof($fh)) {
    echo fgets($fh) . "<br/>";
}

fclose($fh);