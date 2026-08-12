<?php
$db_server = getenv('DB_SERVER') ?: 'localhost';
$db_user = getenv('DB_USER') ?: 'root';
$db_pwd = getenv('DB_PWD') ?: '';
$db_name = getenv('DB_NAME') ?: 'shop';

$con = mysqli_connect($db_server, $db_user, $db_pwd, $db_name);

if ($con === false) {
    die(mysqli_connect_error());
} else {
    // echo "Connection Successful";
}

?>