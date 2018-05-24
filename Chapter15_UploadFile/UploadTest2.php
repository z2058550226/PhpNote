<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/12
 * Time: 12:06
 */

if (is_uploaded_file($_FILES['homework']['tmp_name'])) {

    if (copy($_FILES['homework']['tmp_name'], "D:\phpcode\copy" . $_FILES['homework']['name'])) {
        echo "copy success";
    };
} else {
    echo "Potential script abuse attempt detected!";
}

