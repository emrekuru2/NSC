<?php
include_once "../db/database.php";
include_once "../db/dbFunctions.php";
$conn = OpenCon();

if (isset($_POST['submitAlert'])) {
    if (setAlerts($conn, $_POST['alertFormTitle'], $_POST['alertFormTextBox'])) {
        header("Location: editAlertBanner.php?AlertUpdated=true");
    }
    echo mysqli_error($conn);

} else if (isset($_POST['disableAlert'])) {
    setAlertStatus($conn, "inactive");
    echo mysqli_error($conn);
    header("Location: editAlertBanner.php?AlertDisabled=true");
}
?>


<?php

$title = "Edit Alert Banner";
include "../includes/components/adminHeader.php";
?>





<?php
$row = getAlerts($conn);

?>

<div class="row">
    <div class="col-7 offset-2">
        <div class="text-center">
            <h1 class="h1 mb-0 text-gray-800">Edit Alert Banner</h1>
        </div>


        <div class="text-center">
            <?php
            if (isset($_GET['AlertUpdated']) && $_GET['AlertUpdated'] == true) {
                echo "<p class='text-success'>Alert updated successful</p>";
            } else if (isset($_GET['AlertDisabled']) && $_GET['AlertDisabled'] == true) {
                echo "<p class='text-success'>Alert disabled successfully</p>";
            }
            ?>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-7 offset-2">


        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

            <div class="form-group row">
                <label for="alertFormTitle" class="col-form-label">Email Subject</label>
                <input type="text" name="alertFormTitle" id="alertFormTitle" class="form-control" placeholder="Subject"
                       value="<?php echo $row['Alert_Title']; ?>" required>
            </div>

            <div class="form-group row">
                <label for="alertFormTextBox" class="col-form-label">Post Content</label>
                <textarea name="alertFormTextBox" id="alertFormTextBox" cols="100" rows="14"
                          required><?php echo $row['Alert_Content']; ?></textarea>
            </div>


            <!-- Submit button -->
            <button class="btn light-blue text-white btn-block my-4" type="submit" name="submitAlert">Enable/Update
                Alert
            </button>
            <button class="btn red text-white btn-block my-4" type="submit" name="disableAlert">Disable Alert</button>


        </form>
    </div>
</div>


<?php

include "../includes/components/footer.php";