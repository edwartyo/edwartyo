<?php
$db_host = 'localhost';
$db_user = 'if0_37755845';
$db_pass = 'WTaSjFNNTb8';
$db_name = 'if0_37755845_dbase';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
