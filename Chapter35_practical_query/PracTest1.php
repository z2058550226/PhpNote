<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/6/5
 * Time: 18:46
 */

require_once "HTML/Table.php";
require_once "../Chapter30_MySQL_API/MySQL_Conn.inc.php";

$mysqli = connectZJY();

$attributes = array('border' => '1');

$table = new HTML_Table($attributes);

$table->setHeaderContents(0, 0, "Order ID");
$table->setHeaderContents(0, 1, "Client ID");
$table->setHeaderContents(0, 2, "Order Time");
$table->setHeaderContents(0, 3, "Sub Total");
$table->setHeaderContents(0, 4, "Shipping Cost");
$table->setHeaderContents(0, 5, "Total Cost");

$sql = "select id as `Order ID`,client_id as `Client ID` ,order_time as `Order Time` ,
concat('$',sub_total) as `Sub Total`,
concat('$',shipping_cost) as `Shipping Cost`,
concat('$',total_cost) as `Total Cost`
 from sales order by id";

$stmt = $mysqli->prepare($sql);

$stmt->execute();

$stmt->bind_result($orderId, $clientId, $orderTime, $subTotal, $shippingCost, $totalCost);

$rownum = 1;

while ($stmt->fetch()) {
    $table->setCellContents($rownum, 0, $orderId);
    $table->setCellContents($rownum, 1, $clientId);
    $table->setCellContents($rownum, 2, $orderTime);
    $table->setCellContents($rownum, 3, $subTotal);
    $table->setCellContents($rownum, 4, $shippingCost);
    $table->setCellContents($rownum, 5, $totalCost);
    $rownum++;
}

echo $table->toHtml();

$mysqli->close();
