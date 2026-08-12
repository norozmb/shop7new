<?php
// include './header.php';
session_unset();
session_destroy();
header("location:login.php");
?>

<?php
// include './footer.php';
?>