<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/24
 * Time: 14:35
 */

$states = array("Ohio" => "Columbus", "Iowa" => "Des Moines", "Arizona" => "Phoenix");
$randomStates = array_rand($states, 2);
print_r($randomStates);//output : Array ( [0] => Ohio [1] => Iowa )
echo "<br/>";

$cards = array("A", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K");
shuffle($cards);
print_r($cards);//output : Array ( [0] => 1 [1] => 3 [2] => Q [3] => 9 [4] => J [5] => K [6] => 6 [7] => 7 [8] => 2 [9] => A [10] => 10 [11] => 5 [12] => 4 [13] => 8 )

echo "<br/>";

$grades = array(42, "ERROR_SCORE", 41);
$total = array_sum($grades);
echo $total;//output : 83

echo "<br/>";

$cards = array("jh", "js", "jd", "jc", "qh", "qs", "qd", "qc", "kh", "ks", "kd", "kc", "ah", "as", "ad", "ac");
shuffle($cards);
$chunkCards = array_chunk($cards, 4);
print_r($chunkCards);//output : Array ( [0] => Array ( [0] => jh [1] => as [2] => jc [3] => qh ) [1] => Array ( [0] => kd [1] => qd [2] => ah [3] => ad ) [2] => Array ( [0] => jd [1] => qs [2] => kc [3] => ac ) [3] => Array ( [0] => kh [1] => js [2] => ks [3] => qc ) )