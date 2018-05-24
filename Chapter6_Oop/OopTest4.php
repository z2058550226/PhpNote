<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/24
 * Time: 17:57
 */

class Employee
{
    protected $name;
    protected $title;

    public function __construct()
    {
        echo "<p>Employee constructor called!</p>";
    }
}

class Manager extends Employee
{
    public function __construct()
    {
        parent::__construct();
        echo "<p>Manager constructor called!</p>";
    }
}

$manager = new Manager();

