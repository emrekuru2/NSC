
<?php
    $title = "News";
    include_once 'includes/components/header.php';
    include_once 'includes/functions/security.php';

    CheckLoggedIn();
    $firstName = $_SESSION["FirstName"];
    $lastName = $_SESSION["LastName"];
    $userID = $_SESSION["User_ID"];

?>
    <div class="w-75 m-auto">

        <!-- Post Content Column -->
        <div>
            <!-- Post Content -->

            <?php
                if(isset($_GET['id'])) {
                    if(isset($_GET['e']) && $_GET['e'] == 1) {
                        editSingleNewscontent($_GET['id']);
                    }
                    else{
                        getSingleNewscontent($_GET['id']);
                    }
                }
                elseif(isset($_GET['new']) && $_GET['new'] == '1') {
            ?>
            <!-- Title -->
            <div class="flex-d row justify-content-between mx-1\">
                <div class="float-left mt-4 mx-2">
                    <input type="test" class="h1 form-control-plaintext" placeholder="Insert Title">
                </div>
                <div class="float-right mt-4">
                    <button class="btn btn-success">Save</button>
                </div>
            </div>

            <!-- Author -->
            <div class="flex-d row justify-content-between mx-1 border-bottom">
                <p>
                    <?php echo "by $firstName  $lastName"; ?>
                </p>

                <!-- Date/Time -->
                <p> <?php echo "Today is ". date("F j, Y") .". The time is ". date("g:i A") . "</p>"; ?>
            </div>
                
            <!-- Preview Image -->
            <div>
                <textarea type="text" class="form-control border-dark" rows="20" cols="50"></textarea>
            </div>
            
            <div class="flex-d row justify-content-between my-1">
                <div class="custom-file w-50 mt-2 ml-2">
                    <input type="file" accept="image/*" id="file-upload" class="custom-file-input"
                        name="profilePicture" aria-describedby="profilePictureAddon">
                    <label class="custom-file-label" id="file-name" for="profilePicture">Insert news image</label>
                </div>
                <div class="float-right">
                    <button class="btn btn-success">Save</button>
                </div>

            </div>
            <?php } ?>
            <hr class="">
        </div>

    </div>
    <!-- /.row -->

<?php
    include_once 'includes/components/footer.php'
?>