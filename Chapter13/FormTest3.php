<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/6
 * Time: 10:52
 */

$userInput = "Love the site. E-main me at <a href='http://www.example.com'>Spammer</a>";

$sanitizedInput = filter_var($userInput, FILTER_SANITIZE_STRING);

echo $userInput . "<br/>";

echo $sanitizedInput . "<br/>";