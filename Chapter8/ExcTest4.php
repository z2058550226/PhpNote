<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/26
 * Time: 17:15
 */

/* 如果一封电子邮件被视为非法，则InvalidEmailException就会通知管理员 */

class InvalidEmailException extends Exception
{
    public function __construct($message, $email)
    {
        $this->message = $message;
        $this->notifyAdmin($email);
    }

    public function notifyAdmin($email)
    {
//        mail("2058550226@qq.com", "INVALID EMAIL", $email, "From:web@example.com");
        echo "通報しました！" . "<br/>";
        echo $this->message . "<br/>";
    }
}

class Subscribe
{
    function validateEmail($email)
    {
        try {
            if ($email == null) {
                throw new Exception("You must enter an e-main address!");
            } else {
                list($user, $domain) = explode("@", $email);
                if (!checkdnsrr($domain, "MX")) {
                    throw new InvalidEmailException("Invalid e-mail address!", $email);
                } else {
                    return 1;
                }
            }
        } catch (InvalidEmailException $e) {
            echo $e->getMessage() . "<br/>";
            $e->notifyAdmin($email);
        } catch (Exception $e) {
            echo "父类Exception输出 ：".$e->getMessage() . "<br/>";
        } finally {
            echo "this is finally output ^_^<br/>";
        }
    }

    function subscribeUser($email)
    {
        echo $email . " added to the database!";
    }
}

//假设电子邮件地址来自订阅表格

$_POST['email'] = "someuser@example.com";

if (isset($_POST['email'])) {
    $subscribe = new Subscribe();
    if ($subscribe->validateEmail($_POST['email'])) {
        $subscribe->subscribeUser($_POST['email']);
    }
}

