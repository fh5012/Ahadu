<?php
require_once('Database/db.php');
if(isset($_POST['submit'])) {
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;   
    $hashed_password = password_hash($_POST['password'],PASSWORD_DEFAULT);
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
      
      header('location:admin.php');
      echo($email);
    } else {
      $message = '<span style="background-color:red;color:white;">Email/Password is wrong</span>';
      echo($message);
 
    }

   //Retrieve the user account information for the given username.
    $sql = "SELECT id, email, password FROM users WHERE email = :email";
    $stmt = $DB_con->prepare($sql);
    
    //Bind value.
    $stmt->bindValue(':email', $email);
    
    //Execute.
    $stmt->execute();
    
    //Fetch row.
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //If $row is FALSE.
    if($user === false){
        //Could not find a user with that username!
        //PS: You might want to handle this error in a more user-friendly manner!
        die('Incorrect username / password combination!');
    } else{
      $validPassword = password_verify($pass,$hashed_password);
      print_r($hashed_password);
        
        //If $validPassword is TRUE, the login has been successful.
        if($validPassword){
            
            //Provide the user with a login session.
            $_SESSION['firstname'] = $user['id'];
            
            //Redirect to our protected page, which we called home.php
            header('Location: user.php');
            exit;
            
        } else{
           //$validPassword was FALSE. Passwords do not match.
           die('Incorrect username / password combination!2');
}
    }
  }
}