<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/26
 * Time: 18:54
 */

$pattern = "/\bis\b/";

$subject1 = "ppp";

$subject2 = "This island is is a beautiful land";

if (preg_match($pattern, $subject2, $matches)) {
    echo "right" . "<br/>";
    echo count($matches) . "<br/>";
    foreach ($matches as $key => $value) {
        echo "key is $key, value is $value" . "<br/>";
    }
    echo preg_replace($pattern, "si", $subject2);//This island si si a beautiful land
} else {
    echo "emm";
}
