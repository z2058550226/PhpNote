<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/28
 * Time: 8:47
 */

//下方正则：http/https/ftp/ftps
$pattern = '/(https?|ftps?):\/\/(www)\.([^\.\/]+)\.(com|net|org)(\/[\w-\.\/\?\%\&\=]*)?/i';
//被搜索字符串
$subject = "网址为http://www.baidu.com/index.php的位置是百度首页";
//使用preg_match()函数进行匹配
if(preg_match($pattern, $subject, $matches)) {
    echo count($matches)."<br/>";
    echo "搜索到的URL为：".$matches[0]."<br/>";    //数组中第一个元素保存全部匹配结果http://www.baidu.com/index.php
    echo "URL中的协议为：".$matches[1]."<br/>";    //数组中第二个元素保存第一个子表达式(https?|ftps?)
    echo "URL中的主机为：".$matches[2]."<br/>";    //数组中第三个元素保存第二个子表达式(www)
    echo "URL中的域名为：".$matches[3]."<br/>";    //数组中第四个元素保存第三个子表达式([^\.\/]+)
    echo "URL中的顶域为：".$matches[4]."<br/>";    //数组中第五个元素保存第四个子表达式(com|net|org)
    echo "URL中的文件为：".$matches[5]."<br/>";    //数组中第六个元素保存第五个子表达式(\/[\w-\.\/\?\%\&\=]*)
} else {
    echo "搜索失败！";                             //如果和正则表达式没有匹配成功则输出
}