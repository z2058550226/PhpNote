<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/1
 * Time: 9:22
 */

$sentence = "The rain in Spain falls mainly on the plain";

$chart = count_chars($sentence, 1);

foreach ($chart as $letter => $frequency) {
    echo "Character " . chr($letter) . " appears $frequency times. <br/>";
}

$the = array(1,2,3,4,4);
printf("%s",$the);