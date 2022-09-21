<?php
$title = "Clubs";
include 'includes/components/header.php';

?>
<div class="container mt-5">


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

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-lg-5 col-xl-4">
                    <!-- Featured image -->
                    <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4" style="height: 200px;width:200px">
                        <img class="img-fluid z-depth-1 rounded-circle" src="<?=$row['TeamImage']?>"
                             alt="Sample image">
                        <a href="ClubProfile?id=<?=$row['ClubID']?>">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-lg-7 col-xl-8">
                    <!-- Post title -->
                    <h4 class="font-weight-bold mb-3"><strong><?=$row['Name']?></strong></h4>
                    <!-- Excerpt -->
                    <p class="dark-grey-text">
                        <strong class="font-weight-bold mb-3">Email:</strong>
                        <a href="Mailto:<?=$row['Email']?>"><?=$row['Email']?></a><br>

                        <br>

                        <strong class="font-weight-bold mb-3">Phone:</strong>
                        <a href="tel:<?=$row['Phone']?>"><?=$row['Phone']?></a><br>

                        <br>

                        <strong class="font-weight-bold mb-3">Facebook: </strong><a href="<?=$row['Facebook']?>"><?=$row['Facebook']?></a>

                        <br>

                        <?php
                        if (!empty($row['Website'])) {
                            ?>
                            <br><strong class="font-weight-bold mb-3">Website: </strong><a href="<?=$row['Website']?>"><?=$row['Website']?></a>
                            <?php
                        }
                        ?>

                    </p>
                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->
            <hr class="my-5">


            <?php
        }
        ?>




        <br><br><br>
    </section>
    <!--Section: Content-->


</div>

<?php
include 'includes/components/footer.php'
?>
