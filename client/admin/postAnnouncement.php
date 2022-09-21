<?php

$title = "Post Announcement";

include_once "../includes/components/adminHeader.php";
include_once "../db/dbFunctions.php";
?>

    <div class="container-fluid">

        <div class="row">
            <div class="col-7 offset-2">
                <div class="text-center">
                    <h1 class="h1 mb-0 text-gray-800">Post Announcement</h1>
                </div>
                    <!-- Default form login -->

                <?php
                if (isset($_POST['postFormSubmit'])){

                    $conn = openCon();
                    $announcementUserID = $_POST['postFormUserID'];
                    $announcementTitle = sanitize($conn, $_POST['postFormTitle']);
                    $announcementFirstName = sanitize($conn, $_POST['postFormFirstName']);
                    $announcementLastName = sanitize($conn, $_POST['postFormLastName']);
                    $announcementEmail = sanitize($conn, $_POST['postFormEmail']);
                    $announcementContent = sanitize($conn, $_POST['postFormTextBox']);
                    $announcementDate = date("Y-m-d H:i:s");

                    if (postAnnouncement($conn, $announcementUserID, $announcementTitle, $announcementFirstName, $announcementLastName, $announcementEmail, $announcementDate, $announcementContent)){
                        echo "<p class='text-success text-center'>Announcement posted Successfully!</p>";
                    } else {
                        echo mysqli_error($conn);
                    }
                }
                ?>

            </div>
        </div>
    <div class="row">
        <div class="col-7 offset-2">

            <form class="text-center" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">



                <div class="form-group row">
                    <input type="text" name="postFormUserID" id="postFormUserID" class="form-control" placeholder="Title" value="<?= $_SESSION['User_ID']?>" required hidden>
                </div>

                <div class="form-group row">
                    <label for="postFormTitle" class="col-form-label">Post Title</label>
                        <input type="text" name="postFormTitle" id="postFormTitle" class="form-control" placeholder="Title" required>
                </div>

                <div class="form-group row">
                    <label for="postFormFirstName" class="col-form-label">Author First Name</label>
                        <input type="text" name="postFormFirstName" id="postFormFirstName" class="form-control" placeholder="First Name" required>
                </div>

                <div class="form-group row">
                    <label for="postFormLastName" class="col-form-label">Author Last Name</label>
                        <input type="text" name="postFormLastName" id="postFormLastName" class="form-control" placeholder="Last Name" required>
                </div>

                <div class="form-group row">
                    <label for="postFormEmail" class="col-form-label">Author Email</label>
                        <input type="email" name="postFormEmail" id="postFormEmail" value="<?php echo $_SESSION['Email'] ?>" class="form-control" placeholder="E-mail" required readonly>
                </div>

                <div class="form-group row">
                    <label for="postFormTextBox" class="col-form-label">Post Content</label>
                        <textarea name="postFormTextBox" id="postFormTextBox" cols="100" rows="14" required></textarea>
                </div>


                <!-- Submit button -->
                <button class="btn light-blue text-white btn-block my-4" type="submit" name="postFormSubmit">Submit Post</button>




                </form>

            </div>
        </div>
    </div>




<?php

include "../includes/components/footer.php";
