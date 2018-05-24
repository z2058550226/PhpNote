<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/5
 * Time: 12:56
 */

require_once("Numbers/Roman.php");

$year = date("Y");

$nr = new Numbers_Roman();

$romanYears = $nr->toNumeral($year);
//$romanYears = Numbers_Roman::toNumeral($year);

echo "Copyright &copy; $romanYears";


