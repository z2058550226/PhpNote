<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/20
 * Time: 15:12
 */

define("TAG", " - - suikajy log - - ");

function loge($message)
{
    $tag = TAG;
    $time = date('y-m-d h:i:s', time());
    echo "<p><font color='#dc143c'>{$tag}  {$time}</font> : <font color='#006400'>{$message}</font> </p>";
}
