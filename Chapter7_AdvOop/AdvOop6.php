<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/26
 * Time: 9:05
 */

require_once "Library.inc.php";
require_once "ThirdPartLib.inc.php";

use suikajy\Chapter\Library AS Lib;
use ThirdPart\TPL AS TL;

$filter = new Lib\Clean();
$profanity = new TL\Clean();

$title = "the idiotic sun also rise";

printf("Title before filters: %s <br/>", $title);//Title before filters: the idiotic sun also rise

$title = $profanity->removeProfanity($title);

printf("Title after Lib\Clean: %s <br/>", $title);//Title after Lib\Clean: the shortsighted sun also rise

$title = $filter->filterTitle($title);

printf("Title after TL\Clean: %s <br/>", $title);//Title after TL\Clean: The shortsighted sun also rise