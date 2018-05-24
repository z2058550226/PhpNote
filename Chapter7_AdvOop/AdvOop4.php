<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/26
 * Time: 8:44
 */

class Employee
{
    public static $favSport = "Football";

    public static function watchTV()
    {
        echo "Watching " . static::$favSport;
    }
}

class Executable extends Employee
{
    public static $favSport = "Polo";
}

Executable::watchTV();//Watching Polo

