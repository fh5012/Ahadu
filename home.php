<?php 
session_start();
 
 
/**
 * Check if the user is logged in.
 */
if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
    //User not logged in. Redirect them back to the login.php page.
    header('Location: index.php');
    exit;
}
 
 
/**
 * Print out something that only logged in users can see.
 */
 
echo 'Congratulations! You are logged in!';