<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/6/6
 * Time: 9:08
 */

require_once "../Chapter30_MySQL_API/MySQL_Conn.inc.php";
require_once "Item.php";

//首先假设事务操作都已经成功
$success = true;
//给已提交项的ID一个用户友好的变量名
//$itemID = filter_var($_POST['itemid'], FILTER_VALIDATE_INT);

$itemID = 1;

$buyer_id = 1;

$item = new Item();
$sellerID = $item->getItemOwner($itemID);
$price = $item->getPrice($itemID);

$mysqli = connectZJY();
//禁止自动提交功能
$mysqli->autocommit(false);

//登入购买者账户
$stmt = $mysqli->prepare("update participants set cash = cash-? where id = ?");

$stmt->bind_param('di', $price, $buyer_id);

$stmt->execute();

if ($mysqli->affected_rows != 1) {
    $success = false;
}

//计入卖方账户
$stmt = $mysqli->prepare("update participants set cash = cash+? where id =?");

$stmt->bind_param('di', $price, $sellerID);

$stmt->execute();

if ($mysqli->affected_rows != 1) {
    $success = false;
}

$stmt = $mysqli->prepare("update trunks set owner = ? where id =?");

$stmt->bind_param('ii', $buyer_id, $itemID);

$stmt->execute();

if ($mysqli->affected_rows != 1) {
    $success = false;
}

if ($success) {
    $mysqli->commit();
    echo "The swap took place! Congratulations!";
} else {
    $mysqli->rollback();
    echo "There was a problem with the swap!";
}

$mysqli->close();

