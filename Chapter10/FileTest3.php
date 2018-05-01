<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/1
 * Time: 13:08
 */

$socsecurity = "file/socsecurity.txt";

$fh = fopen($socsecurity, 'r');

while ($user = fscanf($fh, "%d-%d-%d")) {
    print_r($user);
    echo "<br/>";
    list($part1, $part2, $part3) = $user;
    printf("Part1: %d Part2: %d Part3: %d <br/>", $part1, $part2, $part3);
}

//output
//Part1: 123 Part2: 45 Part3: 6789
//Part1: 234 Part2: 56 Part3: 5546
//Part1: 345 Part2: 67 Part3: 8974