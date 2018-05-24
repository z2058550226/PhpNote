<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/25
 * Time: 16:44
 */

class Employee
{
    private $name;

    public function __construct($name)
    {
        $this->setName($name);
    }

    // 为私有属性$name定义一个设置方法
    public function setName($name)
    {
        if ($name == "") {
            echo "Name cannot be blank!";
        }
        $this->name = $name;
    }

    public function getName()
    {
        return "My name is " . $this->name . ".<br/>";
    }
}

class Executable extends Employee
{
    function pillageCompany()
    {
        echo "I'm selling company assets to finance my yacht!";
    }
}

$exec = new Executable("Richard");

//$exec->setName("Richard");

echo $exec->getName() . "<br/>";

$exec->pillageCompany();

echo "<br/>";