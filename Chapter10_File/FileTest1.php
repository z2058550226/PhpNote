<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/1
 * Time: 10:35
 */

$path = 'aaa/file/user.txt';

printf("Filename: %s <br/>", basename($path));
printf("Filename sans extension: %s <br/>", basename($path, ".txt"));
printf("Directory path: %s", dirname($path));

echo "<br/>";

$pathinfo = pathinfo('/home/www/htdocs/book/chapter10/index.html');

print_r($pathinfo);//Array ( [dirname] => /home/www/htdocs/book/chapter10 [basename] => index.html [extension] => html [filename] => index )

echo "<br/>";