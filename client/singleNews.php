
<?php
    $title = "News";
    $newsNotFound = false;
    include_once 'includes/components/newheader.php';
    include_once 'includes/functions/security.php';
?>
    <div class="w-75 m-auto">

        <!-- Post Content Column -->
        <div>
            <!-- Post Content -->
           
            <?php
                $userID = isset($_SESSION["User_ID"]) ? $_SESSION["User_ID"] : null;
                $edit = false;
                $newsID = -1;
                $newNews = isset($_GET['new']) && $_GET['new'] == '1';
                $editNews = isset($_GET['e']) && $_GET['e'] == 1;
                if(isset($_GET['id'])) {
                    $newsID = $_GET['id'];
                    if($editNews) {
                        $edit = true;
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
                        //sql statement
                        $stmt = $conn->prepare( "SELECT Title,Pictures,Date,content,FirstName,LastName FROM nsca_news
                                                WHERE NewsID = $newsID");
                        //execute
                        $stmt->execute();
                        //save the data
                        $stmt->store_result();
                        //bind the data
                        $stmt->bind_result($title,$image,$date,$post,$firstName,$lastName);

                        if($stmt->num_rows >0){
                            while ($stmt->fetch()) {

                                $editBtn = "";
                                if(isset($userID) && CheckRole($userID) == 'Admin') {
                                    $editBtn =  "<a href=\"singleNews.php?id=$newsID&e=1\" class=\"btn btn-primary\">Edit</a>";
                                }
                                echo "
                                    <!-- Title -->
                                    <div class=\"d-flex flex-row justify-content-between mx-1\">
                                        <div class=\"float-left mt-4\">
                                            <input type=\"test\" readonly class=\"h1 form-control-plaintext\" placeholder=\"$title\">
                                        </div>
                                        <div class=\"float-right mt-4\">
                                            <a href=\"news.php\" class=\"btn btn-secondary\">All News</a>
                                        ".$editBtn."
                                        </div>
                                    </div>

                                    <!-- Author -->
                                    <div class=\"d-flex flex-row justify-content-between mx-1 border-bottom\">
                                        <p>
                                            by " . $firstName ." ". $lastName . "
                                        </p>

                                        <!-- Date/Time -->
                                        <p>Posted on " . date("F j, Y", strtotime($date)) . " at ". date("g:i A", strtotime($date)) . "</p>
                                    </div>


                                    <!-- Preview Image -->
                                    <div class=\"d-flex flex-row my-3 mx-1\">
                                        <div class=\"float-left\" style=\"width:40%\">
                                            <img class=\"card-img-top rounded  mr-2 my-1\" src=\"$image/newsImage.jpg\" alt=\"Image\" >
                                        </div>

                                        <div style=\"width:58%\">
                                            <textarea type\"text\" readonly class=\"form-control-plaintext ml-2\" rows=\"20\" cols=\"69\">$post</textarea>
                                        </div>
                                    </div>  
                                        ";
                            }
                        }
                        else {
                            echo "<p class=\"alert alert-warning w-75mx-auto my-5 p-5 text-lg-center\" style=\"font-size:4rem\"> Sorry, could not find the requested news. Please check another news.</p>";
                            }
                    }
                }
                if($newsNotFound) {
                    echo "<p class=\"alert alert-warning w-75mx-auto my-5 p-5 text-lg-center\" style=\"font-size:4rem\"> Sorry, could not find the requested news. Please check another news.</p>";
                }
                elseif($newNews || ($editNews && $newsID > 0)) {
                    CheckLoggedIn();
                    $userID = $_SESSION["User_ID"];
                    $firstName = $_SESSION["FirstName"];
                    $lastName = $_SESSION["LastName"];
                    $email = $_SESSION["Email"];
                    AccessControlBasedOnLevel($_ADMIN_ACCESS_LST, $userID);
                    if(isset($_POST["saveNews"])) {
                        $titleNews = check_input($conn, $_POST['newsTitle']);
                        $postContent = check_input($conn, $_POST["postContent"]);
    
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
                            if($newNews) { 
                                $file_path = $target_dir = "img/newsImages/" . $folderName;
                                if (!is_dir($file_path)) {
                                    mkdir($file_path, 0777, true);
                                }
                                copy('img/sampleNews.png', $file_path."/newsImage.jpg");
                            }
                            else {
                                $target_dir = $imagePathSaved; // If the user does not upload, keep the existing one
                            }
                        }
    
                        $newsDate = date("Y-m-d H:i:s");
                        if($newNews) {
                            if((!isset($postContent) || empty($postContent)) || (!isset($titleNews) || empty($titleNews))) {
                                $invalidInput = true;
                                $invalidContent = !isset($postContent) || empty($postContent);
                                $invalidTitle = !isset($titleNews) || empty($titleNews);
                                
                            }
                            else {
                                $stmt = $conn->prepare("INSERT INTO `nsca_news`(`UserID`, `Title`, `FirstName`, `LastName`, `Email`, `Date`, `Content`, `Pictures`) 
                                VALUES ('$userID','$titleNews','$firstName','$lastName','$email','$newsDate','$postContent','$target_dir')");
                            }
    
                        }
                        else {
                            // If values are not modified then do not change them.
                            if(!isset($postContent) || empty($postContent)) { $postContent = $postContentSaved;}
                            if(!isset($titleNews) || empty($titleNews))  { $titleNews = $titleSaved;}
    
                            $stmt = $conn->prepare("UPDATE `nsca_news` 
                            SET `Title`='$titleNews',`Date`='$newsDate',`Content`='$postContent',`Pictures`='$target_dir' WHERE `NewsID` = $newsID");
                        }
                        if(!$invalidInput) {
                            $stmt->execute();
                            
                            $insert_id = $stmt->insert_id;
                            $newsIDSaved = $newsID==-1 ? $insert_id : $newsID;
                            $stmt->close();
                            header("Location: singleNews.php?id=$newsIDSaved&e=1");
                        }
                    }
                     // Only the Admin can edit/add news.
                    if($newNews || ($editNews && $newsID > 0)) {
                        $date = date("F j, Y");
                        $time = date("g:i A");
                    
            ?>
            <!-- Title -->
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                <div class="d-flex flex-row justify-content-between mx-1">
                    <div class="float-left mt-4 mx-2">
                        <input type="test" class="h1 form-control-plaintext border <?php if(isset($invalidTitle) && $invalidTitle) { echo "alert-danger";} ?>" 
                        placeholder="<?php 
                        if($newNews) {
                             echo (isset($invalidTitle) && !$invalidTitle) ?  $_POST["newsTitle"]: "Insert Title";
                             } else { 
                                echo $titleSaved;
                            }
                            ?>"  id="newsTitle" name="newsTitle">
                    </div>
                    <div class="float-right mt-4">
                        <?php if($editNews) { echo "<a class=\"btn btn-secondary\" id=\"allNews\" href=\"news.php\">All News</a>"; } ?>
                        <button class="btn btn-success" id="saveNews" name="saveNews"><?php if($newNews) {echo "Save";} else { echo "Save Update";}?></button>
                    </div>
                </div>

                <!-- Author -->
                <div class="d-flex flex-row justify-content-between mx-1 border-bottom">
                    <p>
                        <?php if($newNews) {echo "by $firstName  $lastName"; } else {echo "by $firstNameSaved $lastNameSaved";} ?>
                    </p>

                    <!-- Date/Time -->
                    <p> <?php echo "Today is ". $date .". The time is ". $time . "</p>"; ?>
                </div>
                <!-- Preview Image -->
                <div class="d-flex flex-row">
                    <img class="card-img-top rounded  mr-2 my-1" style="width:40%" src="<?php if(isset($imagePathSaved)) {echo $imagePathSaved."/newsImage.jpg";} else { echo "https://via.placeholder.com/150

C/O https://placeholder.com/#How_To_Use_Our_Placeholders ";} ?>" alt="Image" >
                    <div class="my-1" style="width:58%">
                        <textarea type="text" class="form-control border-dark <?php if(isset($invalidContent) && $invalidContent) { echo "alert-danger";} ?>" rows="20" cols="70" id="postContent" name="postContent" 
                        placeholder="<?php 
                        if($newNews) {
                            echo "Please Insert post content here"; 
                        } 
                        ?>"> <?php if($editNews) { echo $postContentSaved;} elseif(isset($invalidContent) && !$invalidContent) { echo $_POST['postContent'];} ?></textarea>
                    </div>
                </div>
                <hr>
                <div class="d-flex flex-row justify-content-end">
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
                
            }
            ?>
            <hr class="">
        </div>

    </div>
    <!-- /.row -->

<?php
    include_once 'includes/components/footer.php'
?>