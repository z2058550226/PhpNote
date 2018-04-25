<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/25
 * Time: 8:50
 */

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

