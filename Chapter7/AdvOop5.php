<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/26
 * Time: 8:50
 */

interface IPillage
{
    function emptyBankAccount();

    function burnDocument();
}

class Employee
{
}

class Executable extends Employee implements IPillage
{
    private $totalStockOptions;

    function emptyBankAccount()
    {
        echo "Call CFO and ask to transfer funds to Swiss bank account.";
    }

    function burnDocument()
    {
        echo "Go on shopping spree with office credit card.";
    }
}

$exe = new Executable();

if (is_a($exe,"IPillage")){
    echo $exe->burnDocument();//Go on shopping spree with office credit card.
}
