<?php
$title = "News";
include 'includes/components/header.php';
?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-md-8">
            <br><br>
            <h3 class="text-center font-weight-bold dark-grey-text mb-4 pb-2">News</h3>

            <?php

            $conn = OpenCon();

            if (isset($_GET['searchAnnouncement'])){
                $allAnnouncements = searchAnnouncements($conn, $_GET['searchAnnouncement']);
                echo mysqli_error($conn);
            } else {
                $allAnnouncements = getAnnouncements($conn);
            }
            while($row = mysqli_fetch_array($allAnnouncements)) {
                ?>

                <div class="card mb-4">
                    <div>
                        <!-- Preview Image -->
                        <img class="card-img-top" src="http://placehold.it/900x300" alt="">
                    </div>
                    <div class="card-body">
                        <!-- Title -->
                        <h2 class="card-title font-weight-bold"><?php echo $row['Title']; ?></h2>
                        <!-- Post Content -->
                        <?php
                        $content = substr($row['Content'],0 ,  300);
                        ?>
                        <p class="card-text"><?php echo $content;?></p>

                        <a href="singleNews.php?id=<?php echo $row['NewsID']?>" class= "btn btn-primary">Read More</a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on <?php echo date("F j, Y", strtotime($row['Date'])) . " at ". date("g:i A", strtotime($row['Date'])); ?>
                        <br>
                        by <a href="UserProfile.php?profile=<?=$row['UserID']?>"><?php echo $row['FirstName'] . " " . $row['LastName']; ?></a>
                    </div>
                </div>
                <br>

                <?php
            }
            ?>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <form class="form-inline" action="<?php $_SERVER['PHP_SELF']; ?>" method="GET">
                            <input type="text" name="searchAnnouncement" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                             <button class="btn btn-sm light-blue text-white" type="submit" name="submitSearch">Go!</button></span>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
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
            <div class="card my-4">
                <h5 class="card-header">Side Widget</h5>
                <div class="card-body">
                    You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->


<?php
include 'includes/components/footer.php'
?>
