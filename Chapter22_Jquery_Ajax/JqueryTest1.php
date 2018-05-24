<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/13
 * Time: 12:33
 */

$accounts = array("wjgilmore", "suikajy", "reimu");

$result = array();

if (isset($_GET['username'])) {
    $username = filter_var($_GET['username'], FILTER_SANITIZE_STRING);

    if (in_array($username, $accounts)) {
        $result['status'] = TRUE;
    } else {
        $result['status'] = FALSE;
    }

    echo json_encode($result);
}

exit;