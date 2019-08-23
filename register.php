<?php
include_once("base.php");
require_once('./Include/register.user.php');
$title = 'Register_User';
include_once("Database/db.php");
include_once("header.php");
?>
<div class="container" style="margin-top: 100px">
		<div class="row justify-content-center">			       
		    <div class="col-md-3 col-offset-3 text-center">
		    	<i class="fas fa-sign-in-alt"><a href="admin.php"> Dire-line </a></i>
				<form action="#" method="POST" enctype="multipart/form-data">
						<input type ="text" placeholder="FristName..." name="firstname" class="form-control">
						<input type ="text" placeholder="LastName..." name="lastname" class="form-control">	    		    	
			    		<input type ="text" placeholder="Email..." name="email" class="form-control">
			    		<input type="password" placeholder="Choose a password..." name="pass" class="form-control">
			    		<button type="submit" name="register" value="Register">Signup</button>
</form>
</div>
</div>
</div>