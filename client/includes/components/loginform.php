

<?php
session_start();
$session_token = md5(uniqid(rand(), true));

$_SESSION['session_token'] = $session_token;
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>Login</title>

    <link rel="icon" href="../../img/favicon.jpeg">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../../css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>

<body class="light-blue">

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <a href="../../index.php"><img src="../../img/logo.png" class="img-fluid" alt="Responsive image"></a>
                    <br>

                    <!-- Default form login -->
                    <form class="text-center" action="login.php" method="POST">

                        <p class="h4 mb-4">Sign in</p>

                        <div class="form-group row">
                            <label for="LoginFormEmail" class="col-sm-1 col-form-label"><i class="fas fa-envelope"></i></label>
                            <div class="col-sm-11">
                                <input type="email" id="LoginFormEmail" name="LoginFormEmail" class="form-control" placeholder="E-mail" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="LoginFormPassword" class="col-sm-1 col-form-label"><i class="fas fa-key"></i></label>
                            <div class="col-sm-11">
                                <input type="password" id="LoginFormPassword" name="LoginFormPassword" class="form-control" placeholder="Password" required>
                            </div>
                        </div>

                        <input type="hidden" id="login_token" name="LoginFormToken" value="<?php echo $_SESSION['session_token'] ?>" required>


                        <div class="d-flex justify-content-around">

                            <!--
                            <div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                                    <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                                </div>
                            </div>
                            -->

                            <div>
                                <!-- Forgot password -->
                                <a href="">Forgot password?</a>
                            </div>
                        </div>

                        <!-- Sign in button -->
                        <button class="btn light-blue text-white btn-block my-4" type="submit" name="submitLogin" id="submitLogin" >Sign in</button>
                        <?php
                        if (isset ($_GET['LoginError']) && $_GET['LoginError'] == true){
                            echo "<br><p class='text-danger'>You have entered incorrect credentials. Please try again.</p>";
                        }
                        if (isset ($_GET['sessionMismatch']) && $_GET['sessionMismatch'] == true){
                            echo "<br><p class='text-danger'>There was an error with your login. Please try again later.</p>";
                        }

                        ?>
                        <!-- Register -->
                        <p>Not a member?
                            <a href="register.php">Register</a>
                        </p>

                    </form>
                    <!-- Default form login -->
                </div>
            </div>
        </div>
    </div>
</div>



</body>
</html>