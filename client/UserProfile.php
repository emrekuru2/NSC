<?php
$title = "Profile";
include 'includes/components/header.php';


$userInformation = getUserInfo($conn, $_SESSION['User_ID']);
$userInformation = mysqli_fetch_assoc($userInformation);


if (isset($_GET['profile'])) {


    $userInformation = getUserInfo($conn, $_GET['profile']);
    $userInformation = mysqli_fetch_assoc($userInformation);

}


if (isset($_GET['ProfileEdit']) && $_GET['ProfileEdit'] == "success") {
    echo "<br><br><p class='text-center text-success'>Profile edited successfully!</p>";
} else if (isset($_GET['profileEdit']) && $_GET['profileEdit'] == "error") {
    echo "<br><br><p class='text-center text-success'>There was an error updating your profile. Please check your inputs and try again.</p>";
}


if (isset ($_POST['submitEditProfile'])) {

    $registerLastName = sanitize($conn, $_POST['inputLastName']);
    $_SESSION['LastName'] = $registerLastName;

    $registerEmail = sanitize($conn, $_POST['inputEmail']);
    $_SESSION['Email'] = $registerEmail;

    $registerStreetAddress = sanitize($conn, $_POST['inputStreetAddress']);
    $_SESSION['StreetAddress'] = $registerStreetAddress;

    $registerCity = sanitize($conn, $_POST['inputCity']);
    $_SESSION['City'] = $registerCity;

    $registerProvince = sanitize($conn, $_POST['inputProvince']);
    $_SESSION['Province'] = $registerProvince;

    $registerCountry = sanitize($conn, $_POST['inputCountry']);
    $_SESSION['Country'] = $registerCountry;

    $registerPostalCode = sanitize($conn, $_POST['inputPostalCode']);
    $_SESSION['PostalCode'] = $registerPostalCode;

    $registerPhone = sanitize($conn, $_POST['inputPhone']);
    $_SESSION['phone'] = $registerPhone;


    $firstName = $_SESSION["FirstName"];
    $lastName = $_SESSION["LastName"];
    $userID = $_SESSION["User_ID"];

    $filepath = $_SESSION['imgFolder'];


    $stmt = $conn->prepare("UPDATE NSCA_User SET LastName = ?, Email = ?, StreetAddress = ?, City = ?, Province = ?, Country = ?, PostalCode = ?, Phone = ? Where UserID = ?");
    echo $conn->error;
    $stmt->bind_param("sssssssss", $registerLastName, $registerEmail, $registerStreetAddress, $registerCity, $registerProvince, $registerCountry, $registerPostalCode, $registerPhone, $userID);

    if ($stmt->execute()) {
        $emailChange = $conn->prepare("UPDATE nsca_login SET Email = ? WHERE userID = ?");
        echo $conn->error;
        $emailChange->bind_param("ss", $registerEmail, $userID);
        if ($emailChange->execute()) {
            echo "<meta http-equiv='refresh' content='0; url=../../UserProfile.php?ProfileEdit=success'>";
        } else {
            echo "<meta http-equiv='refresh' content='0; url=UserProfile.php?ProfileEdit=error'>";
        }
    } else {
        echo "<meta http-equiv='refresh' content='0; url=UserProfile.php?ProfileEdit=error'>";
    }
    $stmt->close();

}

if (isset ($_POST['submitEditDescription'])) {
    $registerDesc = sanitize($conn, $_POST['desc']);
    $stmt = $conn->prepare("UPDATE NSCA_User SET userDescription = ? WHERE UserID = ?");
    echo $conn->error;
    $_SESSION['UserDescription'] = $registerDesc;
    $stmt->bind_param("ss", $registerDesc, $_SESSION['User_ID']);
    if ($stmt->execute()) {
        echo "<meta http-equiv='refresh' content='0; url=../../UserProfile.php?ProfileEdit=success'>";
    } else {
        echo "<meta http-equiv='refresh' content='0; url=UserProfile.php?ProfileEdit=error'>";
    }
    $stmt->close();


}

if (isset ($_POST['submitPhotoChange'])) {
    if (is_uploaded_file($_FILES["profilePicture"]["tmp_name"])) {
        // File Handling
        $target_dir = substr($_SESSION['imgFolder'], 6);
        $target_file = $target_dir . basename($_FILES["profilePicture"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $file_path = $target_dir;

        // If File Is Too Large Give Error and remove folder
        if ($_FILES['profilePicture']['size'] > 3145728) {
            echo "<br><p class='text-danger'>File is too large, Please try again.</p>";
            die();
        }
        // If File Type is incorrect Give Error and remove folder
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "<br><p class='text-danger'>File type is incorrect, Please try again.</p>";
            die();
        }
        // Rename The File To profilePicture
        if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $target_file)) {
            rename($target_file, $target_dir . "profilePicture.jpg");
            echo "<meta http-equiv='refresh' content='0; url=../../UserProfile.php?ProfileEdit=success'>";


        } else {
            echo "<br><p class='text-danger'>File upload failed, Please try again.</p>";
            die();
        }
    }

}
?>
    <div class="container">


        <br>
        <br>

        <p class="text-uppercase text-center display-1"><?= $userInformation['FirstName'] . " " . $userInformation['LastName'] ?></p>


        <div class="row">
            <div class="col-5">
                <img class="img-fluid img-thumbnail card-img-top"
                     src="<?= $userInformation['imgFolder'] . "profilePicture.jpg"; ?>" alt="Card image cap">
                <br>
                <br>

                <?php


                if (!isset($_GET['profile']) || isset($_GET['profile']) && $_GET['profile'] == $_SESSION['User_ID']) {
                    ?>
                    <form action="UserProfile.php" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" accept="image/*" id="file-upload" class="custom-file-input"
                                           name="profilePicture" aria-describedby="profilePictureAddon">
                                    <label class="custom-file-label" id="file-name" for="profilePicture">Change Profile
                                        Picture</label>
                                </div>
                                <input type="submit" class="btn-primary" name="submitPhotoChange" value="Submit">

                            </div>
                        </div>
                    </form>
                    <?php
                }
                ?>

            </div>
            <div class="col-7">
                <div class="card-body">

                    <?php
                    if (!isset($_GET['profile']) || isset($_GET['profile']) && $_GET['profile'] == $_SESSION['User_ID']) {
                        ?>

                        <a href="UserProfile.php?editProfile=true">Edit my Bio</a>

                        <?php
                    }
                    ?>
                    <?php
                    if (isset($_GET['editProfile'])) {
                        ?>
                        <form action="UserProfile.php" method="POST">
                            <label for="desc">User Description</label>
                            <textarea id="desc" rows="10" cols="60"
                                      name="desc"><?= $userInformation['UserDescription'] ?></textarea>
                            <input type="submit" name="submitEditDescription" class="btn btn-primary">
                        </form>
                        <?php
                    } else {
                        ?>
                        <p class="card-text"><?php echo $userInformation['UserDescription'] ?></p>
                        <?php
                    }
                    ?>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card-body">
                            <ul class="list-group">
                                <a class="list-group-item">
                                    <div class="bmd-list-group-col">
                                        <p class="list-group-item-heading">Team</p>
                                        <p class="list-group-item-text">Some text about team</p>
                                    </div>
                                </a>
                                <a class="list-group-item">
                                    <div class="bmd-list-group-col">
                                        <p class="list-group-item-heading">List group item heading</p>
                                        <p class="list-group-item-text">Some text</p>
                                    </div>
                                </a>
                                <a class="list-group-item">
                                    <div class="bmd-list-group-col">
                                        <p class="list-group-item-heading">List group item heading</p>
                                        <p class="list-group-item-text">Some text</p>
                                    </div>
                                </a>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <br>


        <?php
        if (!isset($_GET['profile']) || isset($_GET['profile']) && $_GET['profile'] == $_SESSION['User_ID']) {
            ?>

            <div class="row">
                <div class="col">

                    <h1>Account</h1>
                    <hr>
                    <br>
                    <form action="UserProfile.php" method="POST">
                        <div class="form-group row">
                            <label for="inputFirstName" class="col-sm-2 col-form-label">First Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputFirstName" name="inputFirstName"
                                       value="<?= $_SESSION['FirstName'] ?>" required readonly disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputLastName" class="col-sm-2 col-form-label">Last Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputLastName" name="inputLastName"
                                       value="<?= $_SESSION['LastName'] ?>" required disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail" name="inputEmail"
                                       value="<?= $_SESSION['Email'] ?>" required disabled>
                                <i class="fas fa-exclamation-circle" style="color:orange"></i> This is the email you use
                                to sign in.
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputStreetAddress" class="col-sm-2 col-form-label">Street Address</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputStreetAddress"
                                       name="inputStreetAddress"
                                       value="<?= $_SESSION['StreetAddress'] ?>" required disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputCity" class="col-sm-2 col-form-label">City</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputCity" name="inputCity"
                                       value="<?= $_SESSION['City'] ?>" required disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputProvince" class="col-sm-2 col-form-label">Province</label>
                            <div class="col-sm-10">
                                <select id="inputProvince" name="inputProvince" class="form-control" disabled>

                                    <option value="AB"<?php echo ($_SESSION["Province"] == 'AB') ? "selected" : "" ?>>
                                        Alberta
                                    </option>
                                    <option value="BC"<?php echo ($_SESSION["Province"] == 'BC') ? "selected" : "" ?>>
                                        British Columbia
                                    </option>
                                    <option value="MB"<?php echo ($_SESSION["Province"] == 'MB') ? "selected" : "" ?>>
                                        Manitoba
                                    </option>
                                    <option value="NB"<?php echo ($_SESSION["Province"] == 'NB') ? "selected" : "" ?>>
                                        New Brunswick
                                    </option>
                                    <option value="NL"<?php echo ($_SESSION["Province"] == 'NL') ? "selected" : "" ?>>
                                        Newfoundland and Labrador
                                    </option>
                                    <option value="NS"<?php echo ($_SESSION["Province"] == 'NS') ? "selected" : "" ?>>
                                        Nova Scotia
                                    </option>
                                    <option value="ON"<?php echo ($_SESSION["Province"] == 'ON') ? "selected" : "" ?>>
                                        Ontario
                                    </option>
                                    <option value="PE"<?php echo ($_SESSION["Province"] == 'PE') ? "selected" : "" ?>>
                                        Prince Edward Island
                                    </option>
                                    <option value="QC"<?php echo ($_SESSION["Province"] == 'QC') ? "selected" : "" ?>>
                                        Quebec
                                    </option>
                                    <option value="SK"<?php echo ($_SESSION["Province"] == 'SK') ? "selected" : "" ?>>
                                        Saskatchewan
                                    </option>
                                    <option value="NT"<?php echo ($_SESSION["Province"] == 'NT') ? "selected" : "" ?>>
                                        Northwest Territories
                                    </option>
                                    <option value="NU"<?php echo ($_SESSION["Province"] == 'NU') ? "selected" : "" ?>>
                                        Nunavut
                                    </option>
                                    <option value="YT"<?php echo ($_SESSION["Province"] == 'YT') ? "selected" : "" ?>>
                                        Yukon
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputCountry" class="col-sm-2 col-form-label">Country</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputCountry" name="inputCountry"
                                       value="<?= $_SESSION['Country'] ?>" required readonly disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPostalCode" class="col-sm-2 col-form-label">Postal Code</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPostalCode" name="inputPostalCode"
                                       value="<?= $_SESSION['PostalCode'] ?>" pattern="[0-9a-zA-Z]{6}" maxlength="6"
                                       required disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPhone" class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input type="tel" class="form-control" id="inputPhone" name="inputPhone"
                                       value="<?= $_SESSION['phone'] ?>" pattern="[0-9]{3}[0-9]{3}[0-9]{4}"
                                       maxlength="10" required disabled>
                            </div>
                        </div>


                        <!-- Future Functionality
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password" required>
                            </div>
                        </div>
                        -->


                        <script src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
                        <script>
                            $(document).ready(function () {

                                $("#editProfile").click(function () {
                                    $("#inputLastName").prop("disabled", false);
                                    $("#inputEmail").prop("disabled", false);
                                    $("#inputCity").prop("disabled", false);
                                    $("#inputCountry").prop("disabled", false);
                                    $("#inputProvince").prop("disabled", false);
                                    $("#inputPostalCode").prop("disabled", false);
                                    $("#inputStreetAddress").prop("disabled", false);
                                    $("#inputPhone").prop("disabled", false);
                                    $("#submitEditProfile").prop("disabled", false);
                                    $("#editProfile").prop("hidden", true);
                                    $("#nevermind").prop("hidden", false);

                                });

                                $("#nevermind").click(function () {
                                    $("#inputLastName").prop("disabled", true);
                                    $("#inputEmail").prop("disabled", true);
                                    $("#inputCity").prop("disabled", true);
                                    $("#inputCountry").prop("disabled", true);
                                    $("#inputProvince").prop("disabled", true);
                                    $("#inputPostalCode").prop("disabled", true);
                                    $("#inputStreetAddress").prop("disabled", true);
                                    $("#inputPhone").prop("disabled", true);
                                    $("#submitEditProfile").prop("disabled", true);
                                    $("#editProfile").prop("hidden", false);
                                    $("#nevermind").prop("hidden", true);
                                });

                            });
                        </script>


                        <div class="form-group row">
                            <input type="button" id="editProfile" class="btn btn-primary" value="Edit Account">
                            <input type="button" id="nevermind" class="btn btn-primary" value="Nevermind" hidden>
                            <button type="submit" id="submitEditProfile" name="submitEditProfile"
                                    class="btn btn-primary" readonly disabled>Update User Profile
                            </button>
                        </div>


                    </form>


                    </div>
                </div>
            </div>

            <?php
        }
        ?>
    </div>

<?php
include 'includes/components/footer.php'
?>