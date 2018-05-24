<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/23
 * Time: 15:14
 */
//回调函数
function sanitize_data(&$value, $key)
{
    $value = strip_tags($value);
    echo $value . "<br/>";
}

//遍历keyword数组，并对每一个元素进行自定义回调处理
array_walk($_POST['keyword'], "sanitize_data");

