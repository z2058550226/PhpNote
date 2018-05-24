<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/28
 * Time: 9:31
 */

//声明一个可以匹配URL的正则表达式
$pattern = '/(https?|ftps?):\/\/(www|bbs)\.([^\.\/]+)\.(com|net|org)(\/[\w-\.\/\?\%\&\=]*)?/i';
//声明一个包含多个URL链接地址的多行文字
$subject = "网址为http://www.baidu.com/index.php的位置是百度，
            网址为http://www.google.com/index.php的位置是谷歌。";
$i = 1;    //定义一个计数器，用来统计搜索到的结果数
//搜索全部的结果
if (preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER)) {
    foreach ($matches as $urls) {     //循环遍历二维数组$matches
        echo "搜索到第" . $i . "个URL为：" . $urls[0] . "<br/>";
        echo "第" . $i . "个URL中的协议为：" . $urls[1] . "<br/>";
        echo "第" . $i . "个URL中的主机为：" . $urls[2] . "<br/>";
        echo "第" . $i . "个URL中的域名为：" . $urls[3] . "<br/>";
        echo "第" . $i . "个URL中的顶域为：" . $urls[4] . "<br/>";
        echo "第" . $i . "个URL中的文件为：" . $urls[5] . "<br/>";
        $i++;  //计数器累加
    }
} else {
    echo "搜索失败！";
}