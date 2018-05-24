<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/27
 * Time: 11:52
 */

$pattern = '/^abc/m';
$string = 'bcd 
abc 
cba';
if (preg_match($pattern, $string, $arr)) {
    echo "正则表达式<b>{$pattern}</b>和字符串<b>{$string}</b>匹配成功<br>";
    print_r($arr);
} else {
    echo "<font color='red'>正则表达式{$pattern}和字符串{$string}匹配失败</font>";
}