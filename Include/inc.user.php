<?php
require_once('Database/db.php');

if(isset($_POST['submit'])) {

    $email = $_POST['email'];
    $pass = $_POST['password'];

if(empty($email) || empty($pass)) {
    $message = '<span style="background-color:red;color:white;">All fields are required</span>';
      echo($message);
    } else {
    $query = $DB_con->prepare("SELECT email, password, firstname FROM admin WHERE 
    email=? AND password=? ");
    $query->execute(array($email,$pass));
    $row = $query->fetch(PDO::FETCH_BOTH);
    
    if($query->rowCount() > 0) {
      $_SESSION['email'] = $email;
      $_SESSION['firstname'] = $row['firstname'];
      

      header('location:main.php');
      echo($email);
    } else {
      $message = '<span style="background-color:red;color:white;">Email/Password is wrong</span>';
      echo($message);
 
    }
    
    
    }
}