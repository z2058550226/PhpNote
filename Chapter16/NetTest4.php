<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/12
 * Time: 14:30
 */

echo getservbyname("http", "tcp") . "<br/>";

echo getservbyport(80,"tcp")."<br/>";

phpinfo();
