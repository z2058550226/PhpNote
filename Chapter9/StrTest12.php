<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/30
 * Time: 14:53
 */

$info = "J. Gilmore:jason@example.com|Columbus, Ohio";
//界定符包括冒号:竖线|和逗号,
$tokens = ":|,";
$tokenized = strtok($info, $tokens);

while ($tokenized) {
    echo "Element = $tokenized <br/>";
    $tokenized = strtok($tokens);
}

$summary = <<< summary
In the latest installment of the ongoing Developer.com PHP series,
I discuss the many improvements and additions to <a href="http://www.php.net">PHP 5's</a>
object-oriented architecture.
summary;

$wordsArr = explode(' ', strip_tags($summary));

$words = sizeof($wordsArr);

print_r($wordsArr);//Array ( [0] => In [1] => the [2] => latest [3] => installment [4] => of [5] => the [6] => ongoing [7] => Developer.com [8] => PHP [9] => series, I [10] => discuss [11] => the [12] => many [13] => improvements [14] => and [15] => additions [16] => to [17] => PHP [18] => 5's object-oriented [19] => architecture. )
echo "<br/>";
echo "Total words in summary: $words";//Total words in summary: 20
echo "<br/>";

$cities = array("Columbus", "Akron", "Cleveland", "Cincinnati");
echo implode("|", $cities);//Columbus|Akron|Cleveland|Cincinnati

echo "<br/>";

$substr = "index.html";

$log = <<< logfile
192.168.1.11:/www/htdocs/index.html:[2010/02/10:20:36:50]
192.168.1.13:/www/htdocs/about.html:[2010/02/11:04:15:23]
192.168.1.15:/www/htdocs/index.html:[2010/02/15:17:25]
logfile;
//$substr在log中首次出现的位置时什么？
$pos = strpos($log, $substr);//pos = 25
//查找行结束符的数值位置
$pos2 = strpos($log, "\n", $pos);//pos2 = 58
//计算时间戳的开始
$pos = $pos + strlen($substr) + 1;//pos = 36
//检索时间戳

$timestamp = substr($log, $pos, $pos2 - $pos);

echo "The file $substr was first accessed on : $timestamp";//The file index.html was first accessed on : [2010/02/10:20:36:50]

echo "<br/>";

$author = "jason@example.com";
$author = str_replace("@", "(at)", $author);
echo "$author <br/>";//jason(at)example.com

$url = "sales@example.com";
echo strstr($url, "@") . "<br/>";//@example.com
echo ltrim(strstr($url, "@"), "@");//example.com

echo "<br/>";

$car = "1944 Ford";
echo substr($car, 2, -5);//44

echo "<br/>";

$buzzwords = array("mindshare", "synergy", "space");

$talk = <<< talk
I'm certain that we should dominate mindshare in this space with
out new product, establishing a true synergy between the marketing
and product development teams. We'll own this space in three months.
talk;

foreach ($buzzwords as $bw) {
    echo "The word $bw appears " . substr_count($talk, $bw) . " time(s)" . "<br/>";
}

$ccnumber = "12345678911119999";
echo substr_replace($ccnumber, "***********", 0, 12);//***********19999


