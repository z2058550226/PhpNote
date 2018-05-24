<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/12
 * Time: 13:42
 */

define("FILE_DIR", "D:/phpcode/copy/");

if (is_uploaded_file($_FILES['classnotes']['tmp_name'])) {
    if ($_FILES['classnotes']['type'] != 'application/pdf') {
        echo "<p>Class notes must be upload in PDF format.</p>";
    } else {
        $name = $_POST['name'];
        $result = move_uploaded_file($_FILES['classnotes']['tmp_name'], FILE_DIR . $_FILES['classnotes']['name']);
        if ($result == 1) {
            echo "<p>file upload success!</p>";
        } else {
            echo "<p>There is a problem uploading the file. err is {$_FILES['classnotes']['error']}</p>";
        }
    }
}