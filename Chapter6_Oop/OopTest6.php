<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/25
 * Time: 8:50
 */

function __autoload($className)
{
    //此处使用相对路径
    require_once("/$className.class.php");
}

$person = new Person();

$person->name = "suika";

echo $person->name . "<br/>";

class Visitor
{
    private static $visitors = 0;

    public function __construct()
    {
        self::$visitors++;
    }

    static function getVisitors()
    {
        return self::$visitors;
    }
}


$visits = new Visitor();

echo Visitor::getVisitors() . "<br/>";//1

$visits2 = new Visitor();

echo Visitor::getVisitors() . "<br/>";//2

if (is_a($visits, "Visitor")) {
    echo "\$visits is a Visitor" . "<br/>";
}

