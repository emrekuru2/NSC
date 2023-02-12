<?php
    $title = "Forgot Password?";
    $loginOrRegistrationPage = true;
    
    include_once 'includes/components/newheader.php';
    include_once "./db/database.php";
    include_once "./db/dbFunctions.php";
    include_once "./includes/functions/security.php";
    $conn = OpenCon();
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
                        <form class="text-center" action="includes/components/updatePassword.php" method="POST">

                            <p class="h4 mb-4">Reset password</p>
                            
                            <?php
                            if (isset ($_GET['code'])){
                                // check if code exists in the database
                                $code = $_GET['code'];
                                $sql = "SELECT * FROM nsca_resetcodes WHERE code = '$code' AND expiry_date > NOW()";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                                if($row==null){
                                    echo "<br><p class='text-danger'>Invalid code</p>";
                                }else{
                                    echo "<div class='form-group row'>
                                            <label for='LoginFormPassword' class='col-sm-1 col-form-label'><i class='fas fa-key'></i></label>
                                            <div class='col-sm-11'>
                                                <input type='password' id='newPassword' name='newPassword' class='form-control' placeholder='New password' required>
                                                <small class='form-text text-muted mb-0 mt-1'><i class='fas fa-exclamation-circle' style='color:orange'></i>&nbsp;Minimum 8 characters, one uppercase, one number</small>
                                            </div>
                                        </div>";
                                        echo "<div class='form-group row'>
                                        <label for='LoginFormPassword' class='col-sm-1 col-form-label'><i class='fas fa-key'></i></label>
                                        <div class='col-sm-11'>
                                            <input type='password' id='confirmedPassword' name='confirmedPassword' class='form-control' placeholder='Confirm password' required>
                                        </div>
                                    </div>";
                                    echo "<button class='btn light-blue text-white btn-block my-4' type='submit' name='resetPassword' id='resetPassword' >Send email</button>";
                                }
                            }
                            if(isset($_GET['error']) && $_GET['error'] == true){
                                echo "<br><p class='text-danger'>Passwords do not match</p>";
                            }
                            if(isset($_GET['valid']) && $_GET['valid'] == true){
                                echo "<br><p class='text-danger'>Password is not valid</p>";
                            }
                            ?>
                            <input type="hidden" id="resetCode" name="resetCode" value="<?php echo $_GET['code'] ?>" required>
                            <!-- Sign in button -->
                            
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

