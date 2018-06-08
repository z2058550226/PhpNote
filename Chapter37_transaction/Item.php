<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/6/6
 * Time: 11:57
 */

require_once "../Chapter30_MySQL_API/MySQL_Conn.inc.php";

class Item
{
    private $mysqli;

    public function getItemOwner($itemID)
    {
        $sql = "select owner from trunks where id = {$itemID}";
        $result = $this->mysqli->query($sql);
        $row = $result->fetch_row();
        return $row[0];
    }

    public function getPrice($itemID)
    {
        $sql = "select price from trunks where id = {$itemID}";
        $result = $this->mysqli->query($sql);
        $row = $result->fetch_row();
        return $row[0];
    }

    function __construct()
    {
        $this->mysqli = connectZJY();
    }

    public function __destruct()
    {
        $this->mysqli->close();
    }
}