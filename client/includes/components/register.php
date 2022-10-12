
<?php
include_once "../../db/database.php";
include_once "../../db/dbFunctions.php";

$conn = OpenCon();



?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>Register</title>

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
<style>

</style>

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-lg-8 mx-auto">
            <div class="card card-signin my-5 border border-dark">
                <div class="card-body">
                    <a href="../../index.php"><img src="../../img/logo.png" class="img-fluid" alt="Responsive image"></a>
                    <br>


                    <div class="forminput">
                    <!-- Default form login -->
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

                        <p class="h4 mb-4 text-center">Sign Up</p>

                        <div class="form-row">
                            <label for="RegisterFormFirstName"></label>
                            <div class="form-group col-sm-6">
                                <input type="text" id="RegisterFormFirstName" name="RegisterFormFirstName" class="form-control" placeholder="First Name" value="<?php if(isset($_POST['RegisterFormFirstName'])){ echo htmlentities($_POST['RegisterFormFirstName']);}?>" required>
                            </div>

                            <label for="RegisterFormLastName"></label>
                            <div class="form-group col-sm-6">
                                <input type="text" id="RegisterFormLastName" name="RegisterFormLastName" class="form-control" placeholder="Last Name" value="<?php if(isset($_POST['RegisterFormLastName'])){ echo htmlentities($_POST['RegisterFormLastName']);}?>" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <label for="RegisterFormEmail"></label>
                            <div class="form-group col-sm-6">
                                <input type="email" id="RegisterFormEmail" name="RegisterFormEmail" class="form-control" placeholder="E-mail" value="<?php if(isset($_POST['RegisterFormEmail'])){ echo htmlentities($_POST['RegisterFormEmail']);}?>" required>
                            </div>


                            <label for="RegisterFormPhone"></label>
                            <div class="form-group col-sm-6">
                                <input type="number" id="RegisterFormPhone" name="RegisterFormPhone" class="form-control" placeholder="Phone Number" pattern="^(1?(-?\d{3})-?)?(\d{3})(-?\d{4})$" value="<?php if(isset($_POST['RegisterFormPhone'])){ echo htmlentities($_POST['RegisterFormPhone']);}?>" required>
                                <small class="form-text text-muted mb-0 mt-1"><i class="fas fa-exclamation-circle" style="color:orange"></i>&nbsp;Format: 10 digits, numbers only eg. 5051234567</small>

                            </div>

                        </div>

                        <div class="form-row">
                            <label for="RegisterFormStreetAddress"></label>
                            <div class="form-group col-sm-8">
                                <input type="text" id="RegisterFormStreetAddress" name="RegisterFormStreetAddress" class="form-control" placeholder="Street Address" value="<?php if(isset($_POST['RegisterFormStreetAddress'])){ echo htmlentities($_POST['RegisterFormStreetAddress']);}?>" required>
                            </div>


                            <label for="RegisterFormCity"></label>
                            <div class="form-group col-sm-4">
                                <input type="text" id="RegisterFormCity" name="RegisterFormCity" class="form-control" placeholder="City" value="<?php if(isset($_POST['RegisterFormCity'])){ echo htmlentities($_POST['RegisterFormCity']);}?>" required>
                            </div>

                        </div>

                        <div class="form-row">
                            <label for="RegisterFormProvince"></label>
                            <div class="form-group col-sm-5">
                                <select id="RegisterFormProvince" name="RegisterFormProvince" class="form-control" required>
                                    <option value="AB">Alberta</option>
                                    <option value="BC">British Columbia</option>
                                    <option value="MB">Manitoba</option>
                                    <option value="NB">New Brunswick</option>
                                    <option value="NL">Newfoundland and Labrador</option>
                                    <option value="NS">Nova Scotia</option>
                                    <option value="ON">Ontario</option>
                                    <option value="PE">Prince Edward Island</option>
                                    <option value="QC">Quebec</option>
                                    <option value="SK">Saskatchewan</option>
                                    <option value="NT">Northwest Territories</option>
                                    <option value="NU">Nunavut</option>
                                    <option value="YT">Yukon</option>
                                </select>
                            </div>

                            <label for="RegisterFormCountry"></label>
                            <div class="form-group col-sm-3">
                                <input type="text" id="RegisterFormCountry" name="RegisterFormCountry" class="form-control" value="Canada" required readonly>
                            </div>

                            <label for="RegisterFormPostalCode"></label>
                            <div class="form-group col-sm-4">
                                <input type="text" id="RegisterFormPostalCode" name="RegisterFormPostalCode" class="form-control" pattern="[0-9a-zA-Z]{6}" maxlength = "6" placeholder="Postal Code" value="<?php if(isset($_POST['RegisterFormPostalCode'])){ echo htmlentities($_POST['RegisterFormPostalCode']);}?>" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <label for="RegisterFormPassword"></label>
                            <div class="form-group col-sm-6">
                                <input type="password" id="RegisterFormPassword" name="RegisterFormPassword" class="form-control" placeholder="Password" required>
                                <small class="form-text text-muted mb-0 mt-1"><i class="fas fa-exclamation-circle" style="color:orange"></i>&nbsp;Minimum 8 characters, one uppercase, one number</small>

                            </div>


                            <label for="RegisterFormPasswordConfirm"></label>
                            <div class="form-group col-sm-6">
                                <input type="password" id="RegisterFormPasswordConfirm" name="RegisterFormPasswordConfirm" class="form-control" placeholder="Confirm Password" required>
                            </div>
                        </div>

                        <!-- Role DropDown -->
                        <div class="form-row">
                            <label for="RegisterFormRole"></label>
                            <div class="form-group col-sm-12">
                                <select id="RegisterFormRole" name="RegisterFormRole" class="form-control" required>
                                    <?php
                                    $roleResult = getRoles($conn);

                                    while ($row = mysqli_fetch_assoc($roleResult)) { ?>
                                        <option value="<?=$row['RoleID']?>"><?=$row['Name']?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- Profile Picture -->
                        <div class="form-row">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="profilePictureAddon">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" accept="image/*"  id="file-upload" class="custom-file-input" name="profilePicture" aria-describedby="profilePictureAddon">
                                        <label class="custom-file-label" id="file-name" for="profilePicture">Profile Picture</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sign in button -->
                        <button class="btn light-blue text-white btn-block my-4" type="submit" id ="registerFormSubmit" name="registerFormSubmit">Sign Up</button>

                        <?php

                        if (isset ($_POST['registerFormSubmit'])) {
                            $registerFirstName = check_input($conn, $_POST['RegisterFormFirstName']);
                            $registerMiddleName = "";
                            $registerLastName = check_input($conn, $_POST['RegisterFormLastName']);
                            $registerEmail = check_input($conn, $_POST['RegisterFormEmail']);
                            $registerUserRole = check_input($conn, $_POST['RegisterFormRole']);
                            $registerStreetAddress = check_input($conn, $_POST['RegisterFormStreetAddress']);
                            $registerCity = check_input($conn, $_POST['RegisterFormCity']);
                            $registerProvince = check_input($conn, $_POST['RegisterFormProvince']);
                            $registerCountry = check_input($conn, $_POST['RegisterFormCountry']);
                            $registerPostalCode = check_input($conn, $_POST['RegisterFormPostalCode']);
                            $registerDescription = "Hello! My name is " . $registerFirstName . " " . $registerLastName . "!";
                            $registerPhone = check_input($conn, $_POST['RegisterFormPhone']);
                            $registerPassword = check_input($conn, $_POST['RegisterFormPassword']);
                            $registerPasswordConfirm = check_input($conn, $_POST['RegisterFormPasswordConfirm']);

                            // Create User Image Directory
                            $folderName = uniqid($registerFirstName . "_" . $registerLastName . "_");
                            if (is_dir("../../img/userPictures/".$folderName) === false) {
                                mkdir("../../img/userPictures/".$folderName, 0700, true);

                                //error checking below. In the very small chance that the folder generated already exists, create another one
                            } else {
                                $folderName = uniqid($registerFirstName . "_" . $registerLastName . "_");
                                if (is_dir("../../img/userPictures/".$folderName) === false) {
                                    mkdir("../../img/userPictures/".$folderName, 0700, true);
                                } else {
                                    die(); //if they second folder generated exists too. Just give up and move on.
                                }
                            }

                            // Check To See If File Is Actually Uploaded
                            if (is_uploaded_file($_FILES["profilePicture"]["tmp_name"])) {
                                // File Handling
                                $target_dir = "../../img/userPictures/" . $folderName . "/";
                                $target_file = $target_dir . basename($_FILES["profilePicture"]["name"]);
                                $uploadOk = 1;
                                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                                $file_path = $target_dir;

                                // If File Is Too Large Give Error and remove folder
                                if ($_FILES['profilePicture']['size'] > 3145728) {
                                    echo "<br><p class='text-danger'>File is too large, Please try again.</p>";
                                    rmdir("../../img/userPictures/".$folderName);
                                    die();
                                }
                                // If File Type is incorrect Give Error and remove folder
                                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                                    echo "<br><p class='text-danger'>File type is incorrect, Please try again.</p>";
                                    rmdir("../../img/userPictures/".$folderName);
                                    die();
                                }
                                // Rename The File To profilePicture
                                if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $target_file)) {
                                    rename($target_file, $target_dir . "profilePicture.jpg");
                                } else {
                                    echo "<br><p class='text-danger'>File upload failed, Please try again.</p>";
                                    rmdir("../../img/userPictures/".$folderName);
                                    die();
                                }
                            }
                            // If User Dose Not Upload File, Create Folder
                            else {
                                $file_path = $target_dir = "../../img/userPictures/" . $folderName . "/";
                                copy('../../img/playerImg.png', "../../img/userPictures/" . $folderName . "/ProfilePicture.jpg");
                            }

                            $UserDate = date("Y-m-d H:i:s");

                            $hashedpassword = password_hash($registerPassword, PASSWORD_DEFAULT);

                            $stmt = $conn->prepare("SELECT * FROM nsca_user WHERE email = ?");
                            $stmt->bind_param("s", $registerEmail);
                            $stmt->execute();
                            $sqlusernamecheck = $stmt->get_result();
                            $stmt->close();

//                            $sqlusernamecheck = "SELECT * FROM NSCA_User WHERE email='$registerEmail'";
//                            $sqlusernamecheck = mysqli_query($conn, $sqlusernamecheck);

                            if (mysqli_num_rows($sqlusernamecheck) == 0) { //checks if a username already exists
                                if ($registerPassword == $registerPasswordConfirm) {
                                    if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $registerPassword)) {
                                        // Create User Info Insert Query
                                        $stmt = $conn->prepare("INSERT INTO nsca_user(email, UserRole, FirstName, MiddleName, LastName, StreetAddress, City, Province, Country, PostalCode, Phone, UserDate, userDescription, imgFolder) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                                        //Bind Values
                                        $stmt->bind_param("ssssssssssssss", $registerEmail, $registerUserRole, $registerFirstName, $registerMiddleName,  $registerLastName, $registerStreetAddress, $registerCity, $registerProvince, $registerCountry, $registerPostalCode, $registerPhone, $UserDate, $registerDescription, $file_path);
                                        //Execute Query
                                        $sqluserdataquery = $stmt->execute();
                                        //Get Last Insert ID
                                        $idoflastuserid = $stmt->insert_id;
                                        $stmt->close();

                                        // Create Login Info Insert
                                        $stmt = $conn->prepare("INSERT INTO nsca_login(email, password, UserID) VALUES (?, ?, ?)");
                                        //Bind Values
                                        $stmt->bind_param("ssi", $registerEmail, $hashedpassword, $idoflastuserid);
                                        // Execute
                                        $sqllogindataquery = $stmt->execute();
                                        mysqli_error($conn);
                                        $stmt->close();

                                        $stmt = $conn->prepare("INSERT INTO nsca_userroles(RoleID, UserID) VALUES (?,?)");
                                        $stmt->bind_param(("ii"), $registerUserRole, $idoflastuserid);
                                        $sqlUserRoleInsert = $stmt->execute();
                                        mysqli_error($conn);
                                        $stmt->close();

                                        if ($sqluserdataquery and $sqllogindataquery and $sqlUserRoleInsert) {
                                            echo "<br><p class='text-success'>You have registered successful!</p>";
                                            echo "<meta http-equiv='refresh' content='0; url=../../index.php?postRegister=success'>";
                                            exit();
                                        } else {
                                            echo "ERROR: Could not execute " . $sqlUserRoleInsert . mysqli_error($conn);
                                            error_log(mysqli_error($conn));
                                        }

                                        // Close connection
                                        mysqli_close($conn);
                                    } else {
                                        echo "<br><p class='text-danger'>The password must be 8 characters long and contain at least one uppercase, one lowercase, and one number. Please try again.</p>";
                                    }
                                } else {
                                    echo "<br><p class='text-danger'>The passwords do not match. Please try again.</p>";
                                }
                            } else {
                                echo "<br><p class='text-danger'>The provided email is already in use. Please log in or use a different email address.</p>";
                            }
                        }
                        ?>
                        <!-- Register -->
                        <div class="text-center">
                            Already a member?
                            <a href="loginform.php">Login</a>
                        </div>

                    </form>
                    </div>
                    <!-- Default form login -->

                </div>
            </div>
        </div>
    </div>
</div>
<script src="../../js/fileNameChange.js"></script>
</body>
</html>
