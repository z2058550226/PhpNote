<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/22
 * Time: 18:12
 */

//header("Content-type:text/html;charset=utf-8");//字符编码设置
////每页有多少项
//define('ITEM_NUM_OP', 10);
//
//$conn = mysqli_connect("119.3.23.148", "root", "ZJY@123456a", "zjy", "8635");
//
//if (!$conn) {
//    die("链接数据库错误" . mysqli_connect_error());
//}

require_once "DBConn.inc.php";

$conn = connectDB();

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'restore_log':
            if (isset($_POST['log'])) {
                $log = $_POST['log'];
                $tag = isset($_POST['tag']) ? $_POST['tag'] : 'suikajy';
                $time = isset($_POST['time']) ? $_POST['time'] : time();
                $sql = "INSERT INTO `zjy`.`android_log` (`log`, `tag`, `create_time`) VALUES ('{$_POST['log']}', 'suikajy', '$time')";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    $jsonArray['status'] = 0;
                    $jsonArray['msg'] = '插入log失败';
                } else {
                    $jsonArray['status'] = 1;
                    $jsonArray['msg'] = '插入log成功';
                }
                mysqli_close($conn);
                die(json_encode($jsonArray));
            } else {
                $jsonArray['status'] = 0;
                $jsonArray['msg'] = "没传log参数";
                die(json_encode($jsonArray));
            }
            break;
        case 'query_all_log':
            $page = isset($_POST['page']) ? $_POST['page'] : 1;
            $sql = 'SELECT * from android_log limit ' . ($page - 1) * ITEM_NUM_OP . ',' . ITEM_NUM_OP;
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                $jsonArray['status'] = 0;
                $jsonArray['msg'] = "数据库没有log";
                die(json_encode($jsonArray));
            }
            $logArray = array();
            while ($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
//                $count = count($rows);
//                print_r($rows);
//                for ($i = 0; $i < $count; $i++) {
//                    unset($rows[$i]);
//                }

                array_push($logArray, $rows);
            }
            $jsonArray['status'] = 1;
            $jsonArray['list'] = $logArray;
            $jsonArray['msg'] = "查询成功";
            mysqli_close($conn);
            die(json_encode($jsonArray));
            break;
        case 'clear_log':

            break;
    }
} else {
    die("参数错误，no action");
}
