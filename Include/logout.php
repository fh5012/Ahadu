<?php
    require '../Database/db.php';
    // unset($_SESSION['fname']);
	session_destroy();
	header('Location: ../index.php');
?>