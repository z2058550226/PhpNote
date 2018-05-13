<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/6
 * Time: 18:15
 */

//$psw = "a123456";
//$a = json_decode($psw);
$array1 = array("OH"=>array("CA", "NY", "HI", "CT"), "CA", "NY", "HI", "CT");
$json = json_encode($array1);
echo json_encode($array1);
//echo md5(md5($a['p'].$b));