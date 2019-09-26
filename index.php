<?php
$title = 'እንኳን ደህና መጣችሁ';
include_once("base.php");
include_once("Database/db.php");
include_once("header.php");
?>
<!--------------------------------------------- Loging Form -------------------------->

<?php
require_once('./Include/inc.user.php');
?>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Sign In</h5>
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="form-label-group">
                            <input type="text" name="email" class="form-control" placeholder="Votre identifiant" required autofocus>
                            <label for="email">Email address</label>
                        </div>

                        <div class="form-label-group">
                            <input type="password" name="password" class="form-control" placeholder="Votre mot de passe" />
                            <label for="password">Password</label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" name="submit" value="submit">Sign in</button>
                        <hr class="my-4">
                        <button onclick="window.location.href = 'register.php';" class="btn btn-lg btn-warning btn-block text-uppercase" type="button"><i class="fas fa-sign-in-alt px-2"></i>register with new account</button>
                        <button onclick="window.location.href = 'random.php';" class="btn btn-lg btn-info btn-block text-uppercase" type="button"><i class="fas fa-running px-2"></i>continue without login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>