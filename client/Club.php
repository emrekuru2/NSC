<?php
    $title = "Clubs";
    include_once 'includes/components/header.php';
?>



<div class="container mt-5">
    <!-- Icon imported from fontawesome.com -->
    <script src="https://kit.fontawesome.com/723c51cb84.js" crossorigin="anonymous"></script>

    <!-- CSS file -->
    <link rel="stylesheet" href="css/club.css">

    <!--Section: Content-->
    <section class="mx-md-5 dark-grey-text">

        <!-- Section heading -->
        <h3 class="text-center font-weight-bold mb-4 pb-2">HCL CLUBS</h3>
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
            <h4 class="font-weight-bold mb-3"><strong><?=$row['Name']?></strong></h4>

            <div class="club-container">
                <img class="feature-img rounded-circle" src="<?=$row['TeamImage']?>"
                             alt="Sample image">   
                
                  
                <div class="club-info">
                    <div class="email">
                        <i class="fa-solid fa-envelope"></i>
                        <a href="Mailto:<?=$row['Email']?>"><?=$row['Email']?></a><br>
                    </div>

                    <div class="phone">
                        <i class="fa-solid fa-phone"></i>
                        <a href="tel:<?=$row['Phone']?>"><?=$row['Phone']?></a><br>
                    </div>

                    <div class="facebook">
                        <i class="fa-brands fa-facebook"></i>
                        <a href="<?=$row['Facebook']?>"><?=$row['Name']?></a><br>
                    </div>
                    <?php
                        if (!empty($row['Website'])) {
                            ?>
                            <div>
                                <i class="fa-solid fa-window-maximize"></i>
                                <a href="<?=$row['Website']?>"><?=$row['Website']?></a>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
            <br><br><br>
            <?php
        }
        ?>




        <br><br><br>
    </section>
    <!--Section: Content-->
    

</div>

<?php
    include_once 'includes/components/footer.php'
?>
