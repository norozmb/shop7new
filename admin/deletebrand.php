<?php
include './config.php';

if (isset($_GET['id'])) {
    $dataid = mysqli_real_escape_string($con, $_GET['id']);
    $query = "DELETE FROM brand WHERE id = '$dataid'";
    $result = mysqli_query($con, $query);
}

header('location:viewbrand.php');
exit;
?>