<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/23
 * Time: 19:19
 */

$dates = array('10-10-2011', '2-17-2010', '2-16-2011', '1-01-2013', '10-10-2012');

sort($dates);

echo "<p>Sorting array using the sort() function:</p>";
print_r($dates);//output : Array ( [0] => 1-01-2013 [1] => 10-10-2011 [2] => 10-10-2012 [3] => 2-16-2011 [4] => 2-17-2010 )

natsort($dates);
echo "<p>Sorting the array using the natsort() function:</p>";
print_r($dates);//output : Array ( [0] => 1-01-2013 [3] => 2-16-2011 [4] => 2-17-2010 [1] => 10-10-2011 [2] => 10-10-2012 )

function DateSort($a, $b)
{
    //如果日期相等，则什么也不做
    if ($a == $b) return 0;

    //反汇编日期
    list($amonth, $aday, $ayear) = explode('-', $a);
    list($bmonth, $bday, $byear) = explode('-', $b);

    $amonth = str_pad($amonth, 2, "0", STR_PAD_LEFT);
    $bmonth = str_pad($bmonth, 2, '0', STR_PAD_LEFT);

    $aday = str_pad($aday, 2, '0', STR_PAD_LEFT);
    $bday = str_pad($bday, 2, '0', STR_PAD_LEFT);

    $a = $ayear . $amonth . $aday;
    $b = $byear . $bmonth . $bday;

    return ($a > $b) ? 1 : -1;
}

usort($dates, 'DateSort');

echo "<p>Sorting the array using the user-defined DateSort() function:</p>";

print_r($dates);//output : Array ( [0] => 2-17-2010 [1] => 2-16-2011 [2] => 10-10-2011 [3] => 10-10-2012 [4] => 1-01-2013 )
