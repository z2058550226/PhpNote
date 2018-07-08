<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/18
 * Time: 9:48
 */

for ($num = 1; $num < 1000; $num++) {
    if (18446744073709551615 == pow(2, $num)) {
        echo $num;//64
        break;
    }
}

echo "<br/>";

for ($num = 1; $num < 1000; $num++) {
    if (4294967296 == pow(2, $num)) {
        echo $num;//32
        break;
    }
}

echo "<br/>";

for ($num = 1; $num < 1000; $num++) {
    if (16777216 == pow(2, $num)) {
        echo $num;//24
        break;
    }
}

echo "<br/>";

for ($num = 1; $num < 1000; $num++) {
    if (65536 == pow(2, $num)) {
        echo $num;//16
        break;
    }

}

echo "<br/>";

$a = 1;
$b = 0.997;
echo bcsub($a, $b, 5);

echo "<br/>";

require_once "../Chapter30_MySQL_API/MySQL_Conn.inc.php";

$mysqli = connectZJY();

$result = $mysqli->query("select * from random_table");

var_dump($result);

var_dump($result instanceof mysqli_result);

$ran_num = 0;

$result = $mysqli->query("select ran_num1 into {$ran_num} from random_table where id = (select min(id) from random_table)");

var_dump($result);

var_dump($ran_num);


$lista = array(array(array(1, 2, 3), 4, 5, 6), array(array(7, 8, 9), 10, 11, 12), array(array(13, 14, 15), 16, 17, 18));

$listc = array();

function gg($array, &$resultArr)
{
    if (is_array($array)) {
        $hasArray = false;
        foreach ($array as $subArr) {
            if (is_array($subArr)) {
                $hasArray = true;
                gg($subArr, $resultArr);
            }
        }
        if (!$hasArray) {
            array_push($resultArr, $array);
        }
    }
}

gg($lista,$listc);

print_r($listc);

