<?php
    include_once '../includes/components/adminHeader.php';
    // Prevent Direct access and prevent non-admin's to access
    RestrictAdmin(CheckRole($_SESSION['User_ID']));
    defined('_DEFVAR') or exit(header('Location: ../index.php'));
?>


<div class="container my-5 py-5 z-depth-1">


    <!--Section: Content-->
    <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">


        <!--Grid row-->
        <div class="row d-flex justify-content-center">

            <!--Grid column-->
            <div class="col-md-6">


                <!-- Default form login -->
                <form class="text-center" method="post">

                    <p class="h4 mb-4">Create A New Program</p>
                    <br><br>
                    <!-- Name -->
                    <div class="form-group row">
                        <label for="programName" class="col-form-label">Program Name</label>
                        <input type="text"  name="programName" class="form-control mb-4" placeholder="Ex.Youth Summer Camp" required>
                    </div>

                    <!-- Duration -->
                    <div class="form-group row">
                        <label for="duration" class="col-form-label">Program Duration</label>
                        <input type="text"  name="duration" class="form-control mb-4" placeholder="Ex. 16 weeks" required>
                    </div>

                    <!-- Discription -->
                    <div class="form-group row">
                        <label for="programDescription" class="col-form-label">Program Description</label>
                        <textarea name="programDescription"  placeholder="Ex. Fun summer camp aiming to teach cricket to youth" class="form-control mb-4" required></textarea>
                    </div>
                    <!-- Time -->
                    <div class="form-group row">
                        <label for="time" class="col-form-label">Program Timing</label>
                        <input type="text"  name="time" class="form-control mb-4" placeholder="Ex. 0915-1515" required>    
                    </div>
                    <!-- Charges -->
                    <div class="form-group row">
                        <label for="charge" class="col-form-label">Charge for the Program</label>
                        <input type="text"  name="charges" class="form-control mb-4" placeholder="Ex. $50 monthly" required>
                    </div>

                    <!-- Type -->
                    <div class="form-group row">
                        <label for="type" class="col-form-label">Program Type</label>
                        <input type="text"  name="type" class="form-control mb-4" placeholder="Ex. youth" required>
                    </div>

                    <!-- Days run -->
                    <div class="form-group row">
                        <label for="days" class="col-form-label">Days of the week Program is run</label>
                        <input type="text"  name="days" class="form-control mb-4" placeholder="Ex. Saturdays and Sundays" required>
                    </div>

                    <!-- Picture -->
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
                    <button class="btn btn-info btn-block my-4" type="submit" name = "submitNewProgram">Submit</button>

                </form>
                <!-- Default form login -->
                <?php
                    if(isset ($_POST['submitNewProgram'])){
                        // Create User Image Directory
                        $folderName = uniqid($registerFirstName . "_" . $registerLastName . "_");
                        if (is_dir("img/userPictures/".$folderName) === false) {
                            mkdir("img/userPictures/".$folderName, 0700, true);

                            //error checking below. In the very small chance that the folder generated already exists, create another one
                        } else {
                            $folderName = uniqid($registerFirstName . "_" . $registerLastName . "_");
                            if (is_dir("img/userPictures/".$folderName) === false) {
                                mkdir("img/userPictures/".$folderName, 0700, true);
                            } else {
                                die(); //if they second folder generated exists too. Just give up and move on.
                            }
                        }

                        // Check To See If File Is Actually Uploaded
                        if (is_uploaded_file($_FILES["profilePicture"]["tmp_name"])) {
                            // File Handling
                            $target_dir = "img/userPictures/" . $folderName . "/";
                            $target_file = $target_dir . basename($_FILES["profilePicture"]["name"]);
                            $uploadOk = 1;
                            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                            $file_path = $target_dir;

                            // If File Is Too Large Give Error and remove folder
                            if ($_FILES['profilePicture']['size'] > 3145728) {
                                echo "<br><p class='text-danger'>File is too large, Please try again.</p>";
                                rmdir("img/userPictures/".$folderName);
                                die();
                            }
                            // If File Type is incorrect Give Error and remove folder
                            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                                echo "<br><p class='text-danger'>File type is incorrect, Please try again.</p>";
                                rmdir("img/userPictures/".$folderName);
                                die();
                            }
                            // Rename The File To profilePicture
                            if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $target_file)) {
                                rename($target_file, $target_dir . "profilePicture.jpg");
                            } else {
                                echo "<br><p class='text-danger'>File upload failed, Please try again.</p>";
                                rmdir("img/userPictures/".$folderName);
                                die();
                            }
                        }
                        // If User Dose Not Upload File, Create Folder
                        else {
                            $file_path = $target_dir = "img/userPictures/" . $folderName . "/";
                            copy('img/playerImg.png', "img/userPictures/" . $folderName . "/ProfilePicture.jpg");
                        }
                        createNewProgram($file_path);
                    }
                ?>

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->


    </section>
    <!--Section: Content-->


</div>


<?php
    include_once '../includes/components/footer.php'
?>