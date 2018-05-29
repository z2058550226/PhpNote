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