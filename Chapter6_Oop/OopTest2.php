<?php /** @noinspection PhpUndefinedClassInspection */

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/24
 * Time: 16:16
 */
class Employee
{
    public $name;

    function __set($name, $value)
    {
        echo "Nonexistent variable: \$$name!";
        echo "<br/>";
        echo "The value is $value";
        echo "<br/>";
    }
}

$employee2 = new Employee();
$employee2->name = "suika";
$employee2->title = "title";
$employee2->age = 12;

class Employee2
{
    public $name;

    public function __set($propName, $value)
    {
        $this->$propName = $value;
    }
}

$employee3 = new Employee2();
$employee3->age = 13;
$employee3->title = "title";
echo $employee3->age . "<br/>";//output : 13
echo "$employee3->title" . "<br/>";//output : title
