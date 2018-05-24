<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/2
 * Time: 8:51
 */

$path = "file/";

$dh = opendir($path);

while ($file = readdir($dh)) {
    echo $file . "<br/>";
}

closedir($dh);

dirname(dirname(__FILE__));

//echo readdir($dh);
