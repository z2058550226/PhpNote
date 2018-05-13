<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/12
 * Time: 14:34
 */

//$http = fsockopen("192.168.1.30",)
$http = fsockopen("192.168.1.30", 80);

$req = "GET / HTTP/1.1\r\n";
$req .= "Host:192.168.1.30\r\n";
$req .= "Connection:Close\r\n";

fputs($http, $req);

while (!feof($http)) {
    echo fgets($http, 1024);
}

fclose($http);