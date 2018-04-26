<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/26
 * Time: 9:06
 */

namespace suikajy\Chapter\Library;

class Clean
{
    function filterTitle($text)
    {
        //Uppercase the first character and remove unreadable character and whitespace.
        return ucfirst(trim($text));
    }
}