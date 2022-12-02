
<?php
    $title = "News";
    $newsNotFound = false;
    include_once 'includes/components/header.php';
    include_once 'includes/functions/security.php';

    CheckLoggedIn();
    $firstName = $_SESSION["FirstName"];
    $lastName = $_SESSION["LastName"];
    $userID = $_SESSION["User_ID"];
    $email = $_SESSION["Email"];

?>
    <div class="w-75 m-auto">

        <!-- Post Content Column -->
        <div>
            <!-- Post Content -->
           
            <?php
                $edit = false;
                $newsID = -1;
                $newNews = isset($_GET['new']) && $_GET['new'] == '1';
                $editNews = isset($_GET['e']) && $_GET['e'] == 1;
                if(isset($_GET['id'])) {
                    $newID = $_GET['id'];
                    if($editNews) {
                        $edit = true;
                        $newsID = $_GET['id'];
                        $stmt = $conn->prepare( "SELECT Title,Pictures,Date,content,FirstName,LastName FROM nsca_news
                        WHERE NewsID = $newsID LIMIT 1");
                        //execute
                        $stmt->execute();
                        //save the data
                        $stmt->store_result();
                        //bind the data
                        $stmt->bind_result($titleSaved,$imagePathSaved,$dateSaved,$postContentSaved,$firstNameSaved,$lastNameSaved);
                        if($stmt->num_rows >0){ $stmt->fetch(); } else { $newsNotFound = true; }
                    }
                    else{
                        getSingleNewscontent($_GET['id']);
                    }
                }
                if($newsNotFound) {
                    echo "<p class=\"alert alert-warning w-75mx-auto my-5 p-5 text-lg-center\" style=\"font-size:4rem\"> Sorry, could not find the requested news. Please check another news.</p>";
                }
                else {
                    if($newNews || ($editNews && $newsID > 0)) {
                        $date = date("F j, Y");
                        $time = date("g:i A");
                    
            ?>
            <!-- Title -->
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                <div class="flex-d row justify-content-between mx-1\">
                    <div class="float-left mt-4 mx-2">
                        <input type="test" class="h1 form-control-plaintext" placeholder="<?php if($newNews) {echo "Insert Title";} else { echo $titleSaved;}?>"  id="newsTitle" name="newsTitle">
                    </div>
                    <div class="float-right mt-4">
                        <button class="btn btn-success" id="saveNews" name="saveNews"><?php if($newNews) {echo "Save";} else { echo "Save Update";}?></button>
                    </div>
                </div>

                <!-- Author -->
                <div class="flex-d row justify-content-between mx-1 border-bottom">
                    <p>
                        <?php if($newNews) {echo "by $firstName  $lastName"; } else {echo "by $firstNameSaved $lastNameSaved";} ?>
                    </p>

                    <!-- Date/Time -->
                    <p> <?php echo "Today is ". $date .". The time is ". $time . "</p>"; ?>
                </div>
                <!-- Preview Image -->
                <div class="flex-d row">
                    <img class="card-img-top rounded  mr-2 my-1" style="width:40%" src="<?php if(isset($imagePathSaved)) {echo $imagePathSaved."/newsImage.jpg";} else { echo "https://via.placeholder.com/150

C/O https://placeholder.com/#How_To_Use_Our_Placeholders ";} ?>" alt="Image" >
                    <div class="my-1">
                    <textarea type="text" class="form-control border-dark" rows="20" cols="70" id="postContent" name="postContent" placeholder="<?php if($newNews) {echo "Please Insert post content here"; } ?>"> <?php if($editNews) { echo $postContentSaved;} ?></textarea>
                    </div>
                </div>
                <hr>
                <div class="flex-d justify-content-end">
                    <div class="custom-file w-75 mt-2 ml-2">
                        <input type="file" accept="image/*" id="file-upload" class="custom-file-input"
                                name="newsImage" aria-describedby="newsPicture">
                        <label class="custom-file-label" id="file-name" for="newsImage">Insert news image</label>
                    </div>
                    <div class="float-right">
                        <button class="btn btn-success" type="submit" id="saveNews" name="saveNews"><?php if($newNews) {echo "Save";} else { echo "Save Update";}?></button>
                    </div>
                </div>
            <form>
            <?php 
            }
            if(isset($_POST["saveNews"])) {
                $titleNews = sanitize($conn, $_POST['newsTitle']);
                $postContent = sanitize($conn, $_POST["postContent"]);

                $folderName = uniqid($firstName . "_" . $lastName . "_");
                if (is_dir("img/newsImages/".$folderName) === false) {
                    mkdir("img/newsImages/".$folderName, 0700, true);

                    //error checking below. In the very small chance that the folder generated already exists, create another one
                } else {
                    $folderName = uniqid($firstName . "_" . $lastName . "_");
                    if (is_dir("img/newsImages/".$folderName) === false) {
                        mkdir("img/newsImages/".$folderName, 0700, true);
                    } else {
                        die(); //if they second folder generated exists too. Just give up and move on.
                    }
                }
                    // Check To See If File Is Actually Uploaded
                    if (is_uploaded_file($_FILES["newsImage"]["tmp_name"])) {
                        echo "True";
                        // File Handling
                        $target_dir = "img/newsImages/" . $folderName . "/";
                        $target_file = $target_dir . basename($_FILES["newsImage"]["name"]);
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        $file_path = $target_dir;

                        // If File Is Too Large Give Error and remove folder
                        if ($_FILES['newsImage']['size'] > 3145728) {
                            echo "<br><p class='text-danger'>File is too large, Please try again.</p>";
                            rmdir("img/newsImage/".$folderName);
                            die();
                        }
                        // If File Type is incorrect Give Error and remove folder
                        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                            echo "<br><p class='text-danger'>File type is incorrect, Please try again.</p>";
                            rmdir("img/newsImage/".$folderName);
                            die();
                        }
                        // Rename The File To profilePicture
                        if (move_uploaded_file($_FILES["newsImage"]["tmp_name"], $target_file)) {
                            rename($target_file, $target_dir . "newsImage.jpg");
                        } else {
                            echo "<br><p class='text-danger'>File upload failed, Please try again.</p>";
                            rmdir("img/newsImages/".$folderName);
                            die();
                        }
                    }
                    // If User Dose Not Upload File, Create Folder
                    else {
                        $file_path = $target_dir = "img/newsImages/" . $folderName;
                        if (!is_dir($file_path)) {
                            mkdir($file_path, 0777, true);
                        }
                        copy('img/sampleNews.png', $file_path."/newsImage.jpg");
                    }

                    $newsDate = date("Y-m-d H:i:s");

                    $stmt = $conn->prepare("INSERT INTO `nsca_news`(`UserID`, `Title`, `FirstName`, `LastName`, `Email`, `Date`, `Content`, `Pictures`) 
                                                VALUES ('$userID','$titleNews','$firstName','$lastName','$email','$newsDate','$postContent','$target_dir')");
                    $stmt->execute();
                    $stmt->get_result();
                    $stmt->close();
                }
            }
            
            ?>
            <hr class="">
        </div>

    </div>
    <!-- /.row -->

<?php
    include_once 'includes/components/footer.php'
?>