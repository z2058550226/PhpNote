<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/20
 * Time: 13:45
 */


//break 和 java一样
//$primes = array(2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47);
//
//for ($count = 1; $count < 1000; $count++) {
//    $randomNumber = rand(1, 50);
//    if (in_array($randomNumber, $primes)) {
//        break;
//    } else {
//        printf("Non-prime number found: %d <br/>", $randomNumber);
//    }
//}

for ($count = 0; $count < 10; $count++) {
    $randomNumber = rand(1, 50);

    if ($randomNumber < 10) {
        goto less;
    } else {
        echo "Number greater than 10: $randomNumber <br/>";
    }
}

less:
echo "Number less than 10: $randomNumber <br/>";

exit(0);