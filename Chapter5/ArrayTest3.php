<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/22 0022
 * Time: 下午 16:58
 */

$state["Delaware"] = "December 7 ,1787";
$state["Pennsylvania"] = "December 12,1787";
$state["Ohio"] = "March 1,1803";
if (array_key_exists("Ohio", $state)) {
    echo "Ohio joined the Union on {$state["Ohio"]}";
}

echo "<br/>";

$state["Delaware"] = "December 7 ,1787";
$state["Pennsylvania"] = "December 12,1787";
$state["Ohio"] = "March 1,1803";
$founded = array_search("March 1,1803", $state);
if ($founded) {
    printf("%s was founded on %s", $founded, $state[$founded]);

} else {
    echo "can not find this value";
}

echo "<br/>";