<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/22 0022
 * Time: 下午 14:31
 */

define("TAG", "suikajy");

/**
 * p标签打印日志在浏览器上
 *
 * @param $message
 */
function loge($message)
{

    $time = date("y-m-d h:i:s", time());

    printf("<p><font color='red'>%s log %s</font> : <font color='#006400'>%s</font></p>", TAG, $time, $message);

}

function vloge(...$messages)
{
    foreach ($messages as $msg) {
        loge($msg);
    }
}