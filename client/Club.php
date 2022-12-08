<?php
    $title = "Clubs";
    include_once 'includes/components/newheader.php';
?>



<div class="container mt-5">
    <!-- Icon imported from fontawesome.com -->
    <script src="https://kit.fontawesome.com/723c51cb84.js" crossorigin="anonymous"></script>

    <!-- CSS file -->
    <link rel="stylesheet" href="css/club.css">

    <!--Section: Content-->
    <section class="mx-md-5 dark-grey-text">

        <!-- Section heading -->
        <h1 class="display-3 text-center font-weight-bold">HCL CLUBS</h1>
        <!-- Section description -->
        <p class="text-center mx-auto mb-5"> The following clubs play in the Halifax Cricket League (HCL) outdoor summer competition.
            <br>If you wish to play outdoor summer cricket, please contact the following clubs.</p>

        <hr class="my-5">

        <?php

        $conn = OpenCon();

        $allClubs = getClubs($conn);

        while ($row = mysqli_fetch_array($allClubs)) {

            ?>
            <!-- Post title -->
            <h2 class="display-7 mb-2 text-center font-weight-normal"><?=$row['Name']?></h4>
            <br>
            
            <div class="club-container">
                <img class="feature-img rounded-circle" src="<?=$row['TeamImage']?>"
                             alt="Sample image">   
                
                  
                <div class="club-info">
                    <div class="info-container">
                        <i class="fa-solid fa-envelope"></i>
                        <a href="Mailto:<?=$row['Email']?>">: <?=$row['Email']?></a>
                    </div>

                    <div class="info-container">
                        <i class="fa-solid fa-phone"></i>
                        <a href="tel:<?=$row['Phone']?>">: <?=$row['Phone']?></a>
                    </div>

                    <div class="info-container">
                        <i class="fa-brands fa-facebook"></i>
                        <a href="<?=$row['Facebook']?>">: <?=$row['Name']?></a>
                    </div>
                    <?php
                        if (!empty($row['Website'])) {
                            ?>
                            <div class = "info-container">
                                <i class="fa-solid fa-window-maximize"></i>
                                <a href="<?=$row['Website']?>">: <?=$row['Website']?></a>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
            <br><br><br><br><br>
            <?php
        }
        ?>




        <br><br><br>
    </section>
    <!--Section: Content-->
    

</div>

<?php
    include "includes/components/footer.php";
?>
