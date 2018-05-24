<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/24
 * Time: 16:46
 */

class Employee
{
    public $name;
    public $city;
    protected $wage;

    function __get($propName)
    {
        echo "__get called!<br/>";
        $vars = array("name", "city");
        if (in_array($propName, $vars)) {
            return $this->$propName;
        } else {
            return "No such variable";
        }
    }
}

$employee = new Employee();
$employee->name = "Mario";
$employee->city = "Phoenix";
echo "$employee->name" . "<br/>";//Mario
echo "$employee->age" . "<br/>";//__get called!  No such variable
echo "$employee->city" . "<br/>";//Phoenix

class MathFunctions
{
    const E = 2.7182818284;
    const PI = 3.14159265;
    const EULER = 0.5772156649;
}

echo MathFunctions::EULER . "<br/>";//0.5772156649





