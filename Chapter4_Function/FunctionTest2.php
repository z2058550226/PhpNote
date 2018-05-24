<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/4/21
 * Time: 14:01
 */

require_once "../util/CommonUtils.inc.php";

//总利息
$sumInterest = 0;
//总还款额
$sumPayment = 0;
//本金加和
$sumPrincipal = 0;

/**
 * 递归还贷进度计算器
 *
 * @param $pNum int 还款编号
 * @param $periodicPayment float 每月总还款额
 * @param $balance float 剩余贷款额
 * @param $monthlyInterest float 每月的利率
 * @return int
 */
function amortizationTable($pNum, $periodicPayment, $balance, $monthlyInterest)
{
    global $sumInterest;
    global $sumPayment;
    global $sumPrincipal;

    $sumPayment += $periodicPayment;

    //当月支付的利息
    $paymentInterest = round($balance * $monthlyInterest, 2);

    $sumInterest += $paymentInterest;
    //还款本金
    $paymentPrincipal = round($periodicPayment - $paymentInterest, 2);

    $sumPrincipal += $paymentPrincipal;
    //用余额减去还款额
    $newBalance = round($balance - $paymentPrincipal, 2);
    //如果余额<每月还款，设置为0
    if ($newBalance < $paymentPrincipal) {
        $newBalance = 0;
    }

    printf("<tr><td>%d</td>", $pNum);
    printf("<td>%s</td>", number_format($newBalance, 2));
    printf("<td>%s</td>", number_format($periodicPayment, 2));
    printf("<td>%s</td>", number_format($paymentPrincipal, 2));
    printf("<td>%s</td>", number_format($paymentInterest, 2));

    # If balance not yet zero, recursively call amortizationTable()
    if ($newBalance > 0) {
        $pNum++;
        amortizationTable($pNum, $periodicPayment, $newBalance, $monthlyInterest);
    } else {
        return 0;
    }
}

//贷款余额
$balance = 10000.00;
//贷款利率
$interestRate = 0.575;
//每月利率
$monthlyInterest = $interestRate / 12;
//贷款期限，单位为年
$termLength = 5;
//每年支付次数
$paymentPerYear = 12;
//付款迭代
$paymentNumber = 1;
//确定支付总次数
$totalPayments = $termLength * $paymentPerYear;
//确定分期付款的利息部分
$intCalc = 1 + $interestRate / $paymentPerYear;
//确定定期支付
$periodicPayment = $balance * pow($intCalc, $totalPayments) * ($intCalc - 1) / (pow($intCalc, $totalPayments) - 1);
//每月还款额限制到小数点后两位
$periodicPayment = round($periodicPayment, 2);
//创建表
echo "<table width='50%' align='center' border='1'>";
echo "<tr>
    <th>Payment Number</th>
    <th>Balance</th>
    <th>Payment</th>
    <th>Principal</th>
    <th>Interest</th>
</tr>";

amortizationTable($paymentNumber, $periodicPayment, $balance, $monthlyInterest);

echo "<tr>
    <td>Total</td>
    <td>0</td>
    <td>{$sumPayment}</td>
    <td>{$sumPrincipal}</td>
    <td>{$sumInterest}</td>
</tr>";

echo "</table>";

loge("每月还款额 ：" . $periodicPayment);

loge("初始贷款额 ：" . $balance);

loge("每月利率 : " . $monthlyInterest);

exit(0);
