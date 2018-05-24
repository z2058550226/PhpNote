<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/26
 * Time: 16:12
 */

try {
    $fh = fopen("Contacts.txt", "r");
//    $fh = false;
    if (!$fh) {
        throw new Exception("Could not open the file!");
    }
    $test = array();
    echo $test[2];
} catch (Exception $e) {
    echo "Error (File: " . $e->getFile() . ", line " . $e->getLine() . "):" . $e->getMessage();//Error (File: D:\phpcode\suikajy\Chapter8_Exception\ExcTest2.php, line 13):Could not open the file!
}