<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/25
 * Time: 8:41
 */

class Book
{
    private $title;
    private $isbn;
    private $copies;

    function __construct()
    {
        echo "<p>Book class instance created.</p>";
    }

    function __destruct()
    {
        echo "<p>Book class instance destroyed.</p>";
    }
}

$book = new Book();//Book class instance created.

//Book class instance destroyed.

