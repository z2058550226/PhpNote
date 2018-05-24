<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/26
 * Time: 9:05
 */

namespace ThirdPart\TPL;

class Clean
{
    function removeProfanity($text)
    {
        $badWords = array("idiotic" => "shortsighted",
            "moronic" => "unreasonable",
            "insane" => "illogical");

        return strtr($text, $badWords);//string translate 函数，将文字中出现的关键字用一个数组中的值替代
    }
}