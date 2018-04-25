<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/25
 * Time: 15:43
 */

class Corporate_Drone
{
    private $employeeId;
    private $tieColor;
    public static $initCount = 0;
    public $sub;

    public function __construct()
    {
        self::$initCount++;
        if (self::$initCount == 1) {
            $this->sub = new Corporate_Drone();
            $this->sub->tieColor = "green";
            $this->sub->employeeId = "111";
        } else {
            $this->sub = null;
        }
        echo "No." . self::$initCount . " instance initiated" . "<br/>";
    }

    public function getEmployeeId()
    {
        return $this->employeeId;
    }

    public function setEmployeeId($employeeId)
    {
        $this->employeeId = $employeeId;
    }

    public function getTieColor()
    {
        return $this->tieColor;
    }

    public function setTieColor($tieColor)
    {
        $this->tieColor = $tieColor;
    }

    public function __clone()
    {
        $this->tieColor = "blue";
    }
}

class Cup
{
    public $size = 0;
}

$drone1 = new Corporate_Drone();

$drone1->setEmployeeId("12345");

$drone1->setTieColor("red");

$drone2 = clone $drone1;

$drone2->setEmployeeId("67890");

printf("Drone1 employee ID %d <br/>", $drone1->getEmployeeId());//Drone1 employee ID 12345
printf("Drone1 tie color %s <br/>", $drone1->getTieColor());//Drone1 tie color red

printf("Drone2 employee ID %d <br/>", $drone2->getEmployeeId());//Drone2 employee ID 67890
printf("Drone2 tie color %s <br/>", $drone2->getTieColor());//Drone2 tie color blue;

echo $drone2->sub->getTieColor();//green

echo "<br/>";

$drone2->sub->setTieColor("pink");

echo $drone1->sub->getTieColor();//pink
