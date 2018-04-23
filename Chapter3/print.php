<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/11
 * Time: 13:31
 */
print("<p>I love the summertime!</p>");

$season = "summertime";

print("<p>I love the $season</p>");

print "<p>I love the summertime</p>";

echo "I love the summertime<br>";

$person1 = "ma chao1";

$person2 = "ma chao2";

echo $person1 . " and " . $person2 . " is the same person" . "<br>";

$me = "zjy";

$tall = 180;

printf("%s is a %dcm man", $me, $tall);
//相当于java的String.format();
$num = sprintf("%.2f", 43.2);

echo "<p>number is $num</p>";

$num1 = 1.1E+5;

$num2 = 1000;

printf("result is %f ", $num1 - $num2);

$num3 = 0111;

echo "", $num3;

$str = "abcd";
echo $str[2];

$state1[0] = "a";
$state1[1] = "b";
$state1[2] = "c";
$state1[3] = "d";
$state1[4] = "e";

$state2[0] = "A";
$state2[1] = "B";
$state2[2] = "C";
$state2[3] = "D";
$state2[4] = "E";

$total["s1"] = $state1;
$total["s2"] = $state2;

echo $total["s2"][3] . "<br>";

//echo "<p>{$total['s2'][3]}}</p>";

print_r($total);

echo "<br>";

echo "<p> <marquee>实现的方法就是在IE的标签上稍微多加了几个参数产生了更加丰富的变化。设置behavior=alternate表示双向移动，direction= left表示运动方向向左。marquee的宽度可以使用绝对象素值，例如width=200等这个值限定了跑马灯滚动的范围。需要说明的是该效果在 Netscape下是看不到的。</marquee> </p>";

class Appliance
{
    private $_power;

    function setPower($status)
    {
        $this->_power = $status;
    }

    public function getPower()
    {
        return $this->_power;
    }
}

$blender = new Appliance();

$blender->setPower(false);

echo $blender->getPower();



