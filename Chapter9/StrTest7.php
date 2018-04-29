<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/28
 * Time: 10:27
 */

//可以匹配所有HTML标记的开始和结束的正则表达式
$pattern = "/<[\/\!]*[^<>]*>/is";

//声明一个带有多个HTML标记的文本
$text = "这个文本中有</b>粗体</b>和<u>带有下画线</u>以及<i>斜体</i>
             还有<font color='red' size='7'>带有颜色和字体大小</font>的标记";
//将所有HTML标记替换为空，即删除所有HTML标记
echo preg_replace($pattern, "", $text);

//通过第四个参数传入数字2，替换前两个HTML标记
echo preg_replace($pattern, "", $text, 2);