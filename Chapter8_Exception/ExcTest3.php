<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/26
 * Time: 16:38
 */

class MyException extends Exception
{
    public $language = "";
    public $error_code = 0;

    public function __construct($language, $error_code)
    {
        $this->language = $language;
        $this->error_code = $error_code;
    }

    function getMessageMap()
    {
        $errors = file("errors/" . $this->language . ".txt");
        $errorArray = array();
        foreach ($errors as $error) {
            list($key, $value) = explode(",", $error, 3);
            $errorArray[$key] = $value;
        }
        return $errorArray[$this->error_code];
    }
}

try {
    throw new MyException("English", 4);
} catch (MyException $e) {
    echo $e->getMessageMap();//You do not possess adequate privileges to execute this command.
}