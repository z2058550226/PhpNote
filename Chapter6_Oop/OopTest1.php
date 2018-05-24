<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/24
 * Time: 15:06
 */

class Employee
{
    public $name;

    function __set($name, $value)
    {
        // TODO: Implement __set() method.
        echo "Nonexistent variable: \$$name!";
    }
}

$employee = new Employee();
$employee->name = "Mary Swanson";
$name = $employee->name;
echo "New employee : $name";
echo "<br/>";
$nameIn = &$name;
$nameIn = "mary";
echo $nameIn . "<br/>";
echo $name . "<br/>";
echo $employee->name . "<br/>";
