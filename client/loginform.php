<?php
    $title = "Login";
    $loginOrRegistrationPage = true;
    
    include_once 'includes/components/newheader.php';

    if (isset($_GET['postRegister']) && $_GET['postRegister'] == "success"){
        echo "<div class='bg-warning text-center font-weight-normal' style='padding: 1%'>You have registered successfully! Please login to access your account</div>";
        echo "</div>";
    }
?>

<body class="light-blue">

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <a href="../../index.php"><img src="../../img/logo.png" class="img-fluid" alt="Responsive image"></a>
                        <br>

                        <!-- Default form login -->
                        <form class="text-center" action="includes/components/login.php" method="POST">

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

