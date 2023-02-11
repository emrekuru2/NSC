<?php
    $title = "Forgot Password?";
    $loginOrRegistrationPage = true;
    
    include_once 'includes/components/newheader.php';
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
                        <form class="text-center" action="includes/components/reset.php" method="POST">

                            <p class="h4 mb-4">Forgot Password?</p>

                            <div class="form-group row">
                                <label for="LoginFormEmail" class="col-sm-1 col-form-label"><i class="fas fa-envelope"></i></label>
                                <div class="col-sm-11">
                                    <input type="email" id="resetEmail" name="resetEmail" class="form-control" placeholder="E-mail" required>
                                </div>
                            </div>
                            <!-- Sign in button -->
                            <button class="btn light-blue text-white btn-block my-4" type="submit" name="submitReset" id="submitReset" >Send email</button>
                            <?php
                            if (isset ($_GET['error']) && $_GET['error'] == true){
                                echo "<br><p class='text-danger'>You have entered a wrong email</p>";
                            }
                            if (isset ($_GET['reset']) && $_GET['reset'] == true){
                                echo "<br><p class='text-success'>Email sent successfully. <br>Code is valid for 1 hour</p>";
                            }

                            ?>
                            <!-- Register -->
                            <p>Already a member?
                                <a href="loginform.php">Login</a>
                            </p>

                        </form>
                        <!-- Default form login -->
                    </div>
                </div>
            </div>
        </div>
    </div>

