<?php
/**
 * Created by PhpStorm.
 * User: 20585
 * Date: 2018/9/11
 * Time: 16:14
 */

//创建画布
$canvas = imagecreatetruecolor(300, 400);
header("content-type:image/png");
$color = imagecolorallocate($canvas, 0x66, 0xcc, 0xff);
imagefill($canvas, 0, 0, $color);

$color2 = imagecolorallocate($canvas, 0xcc, 0x66, 0xff);
imagefill($canvas, 0, 100, $color2);

imagepng($canvas);