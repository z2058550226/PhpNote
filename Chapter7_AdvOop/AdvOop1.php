<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/25
 * Time: 10:35
 */

class Corporate_Drone
{
    private $employeeId;
    private $tieColor;

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
}

$drone1 = new Corporate_Drone();

$drone1->setEmployeeId("12345");

$drone1->setTieColor("red");

$drone2 = clone $drone1;

$drone2->setEmployeeId("67890");

printf("Drone1 employee ID %d <br/>", $drone1->getEmployeeId());//Drone1 employee ID 12345
printf("Drone1 tie color %s <br/>", $drone1->getTieColor());//Drone1 tie color red

printf("Drone2 employee ID %d <br/>", $drone2->getEmployeeId());//Drone2 employee ID 67890
printf("Drone2 tie color %s <br/>", $drone2->getTieColor());//Drone2 tie color red