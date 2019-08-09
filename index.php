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
                        <form class ="" action="" method ="post"role="form">
                            <div class="form-label-group">
                            <input type="text" name="email" class="form-control" placeholder="Votre identifiant" required autofocus>
                                <label for="inputEmail">Email address</label>
                            </div>

                            <div class="form-label-group">
                            <input type="password" name="password" class="form-control" placeholder="Votre mot de passe" />
                                <label for="inputPassword">Password</label>
                            </div>

                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" value="1" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Remember password</label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase"  name="submit" value="submit">Sign in</button>
                            <hr class="my-4">
                            <button class="btn btn-lg btn-warning btn-block text-uppercase" type="submit"><i class="fas fa-sign-in-alt px-2"></i>register with new account</button>
                            <button class="btn btn-lg btn-info btn-block text-uppercase" type="submit"><i class="fas fa-running px-2"></i>continue without login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>