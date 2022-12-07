<?php
    $title = "News";
    include_once 'includes/components/newheader.php';
    include_once 'includes/functions/security.php';
    if(isset($_SESSION["LoggedIn"]) && $_SESSION["LoggedIn"] == true) {
        CheckLoggedIn();
        $userID = $_SESSION["User_ID"];
    }
?>

<!-- Page Content -->
<div class="container pb-5">
    <!-- Heading -->
    <h1 class="text-center font-weight-bold dark-grey-text m-4 h1">News</h1>

    <!-- Search widget -->
    <div class="search-bar m-4">
        <form class="form-inline d-flex  justify-content-center" action="<?php $_SERVER['PHP_SELF']; ?>" method="GET">
            <div class="input-group w-75">
                <input  class="form-control w-75 mt-1" type="search" placeholder="Search more..." aria-label="Search" id="news-bar"  name="searchAnnouncement" required>
                <button class="btn-blue-grey mt-1" type="button" id="btn-search" name="btn-search-news">
                        <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
    </div>
    <?php if(isset($userID) && CheckRole($userID) == "Admin") { ?>
    <div class = "d-flex justify-content-end my-3">
        <a href="singleNews.php?new=1" id="btn-add-news" class="btn btn-sml btn-black"><i class="fa fa-plus fa-lg"></i></a>
        <button type="button" data-toggle="modal" data-target="#delete-news" class="btn btn-sml btn-danger ml-3" id="btn-remove-player"><i class="fa fa-times fa-lg"></i></button>
    </div>
    <?php } ?>

    <div class="flex-d row">
        <!-- Post Content Column -->
        <div class="overflow-auto border rounded bg-dark p-3" style="height: 600px; width:72%">
            
            <?php

            $conn = OpenCon();

            if (isset($_GET['searchAnnouncement'])){
                $allAnnouncements = searchAnnouncements($conn, $_GET['searchAnnouncement']);
                echo mysqli_error($conn);
            } else {
                $allAnnouncements = getAnnouncements($conn);
            }
            if(mysqli_num_rows($allAnnouncements) == 0) {
            ?>
                 <div class="card mb-4 border-info ">
                    <p class="alert alert-warning" id="noNews"> No news found. Try changing search input or come back later for more news. </p>
                </div> 
            <?php
            }
            else {
            while($row = mysqli_fetch_array($allAnnouncements)) {
            ?>
                <div class="card mb-4 border-info ">

                    <div class="card-body">
                        <!-- Title -->
                        <div class="flex-d">
                            <?php 
                            
                            $newsTitle = $row['Title'];
                            $newsID = $row['NewsID'];
                            $userID = isset($_SESSION['User_ID']) ? $_SESSION['User_ID'] : null;
                            if(isset($userID) && CheckRole($userID) == 'Admin') {
                            ?>
                                <input type="checkbox" class="form-check-input mx-1"  value="<?php echo $newsTitle; ?>" id="checkboxNews-<?php echo $newsID; ?>" onClick="changeLstSelected('<?php echo $newsID ?>')"  style="width:2rem; height: 2rem; position:relative"/>
                            <?php
                            } 
                            ?>
                            <label class="h2 font-weight-bolder mx-1" for="checkboxNews-<?php echo $row['NewsID']; ?>"><?php echo $newsTitle; ?></label>
                            
                        </div>
                        <hr>
                        <!-- Post Content -->
                        <?php
                        // echo substr($row['Pictures'], 0, -1);
                        // rmdir(substr($row['Pictures'], 0, -1));
                        $content = substr($row['Content'],0 ,  300);
                        ?>
                        <p class="card-text"><?php echo $content;?></p>
                        
                    </div>
                    <div class="card-footer text-muted d-flex flex-row justify-content-between">
                        <div>
                        Posted on <?php echo date("F j, Y", strtotime($row['Date'])) . " at ". date("g:i A", strtotime($row['Date'])); ?>
                        <br>
                        by <a href="UserProfile.php?profile=<?=$row['UserID']?>"><?php echo $row['FirstName'] . " " . $row['LastName']; ?></a>
                        </div>
                        <div>
                            <?php
                                if(isset($userID) && CheckRole($userID) == 'Admin') { echo '<a href="singleNews.php?id='.$row["NewsID"].'&e=1" class= "btn btn-secondary">Edit</a>';}?>
                            <a href="singleNews.php?id=<?php echo $row['NewsID']?>" class= "btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
               
                <br>

                <?php
            }}
            ?>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-3 border rounded bg-dark p-3 mx-1">

            <!-- Categories Widget -->
            <div class="card mb-4">
                <h4 class="card-header font-weight-bold">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">Web Design</a>
                                </li>
                                <li>
                                    <a href="#">HTML</a>
                                </li>
                                <li>
                                    <a href="#">Freebies</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">JavaScript</a>
                                </li>
                                <li>
                                    <a href="#">CSS</a>
                                </li>
                                <li>
                                    <a href="#">Tutorials</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card mb-4">
                <h4 class="card-header font-weight-bold">Side Widget</h5>
                <div class="card-body">
                    You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<div class="modal fade " id="delete-news" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger font-weight-bolder" id="pop-upLabel">Delete News</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-inline my-2 my-lg-0 d-flex justify-content-center container" id= "search-form">
                        <!-- Player Name input-->
                        <div class="row mb-2">
                            <div class="col-5">
                                <h5>News Title:</h5>
                            </div>
                            <div class="col-7" id="news-delete-display">
                                <input class="form-control mt-1" placeholder="No news selected" id="display" disabled>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" onclick="deleteNews(<?php echo $userID ?>)">Delete</button>
                </div>
                </div>
            </div>
        </div>
<script src="../../js/newsList.js"></script>
<?php
    include "includes/components/footer.php";
?>
