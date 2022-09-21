
<?php
$title = "Add Team To Club";
include 'includes/components/header.php'
?>

<div class="container my-5 py-5 z-depth-1">


    <!--Section: Content-->
    <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">


        <!--Grid row-->
        <div class="row d-flex justify-content-center">

            <!--Grid column-->
            <div class="col-md-6">

                <!-- Default form login -->
                <form class="text-center" method="post">
                   <?php
                    displayAllTheClub();
                   ?>

                    <br>
                    <!-- Sign in button -->
                    <button class="btn btn-info btn-block my-4" type="submit">Submit</button>

                </form>
                <!-- Default form login -->
                <?php
                    setClubToTeam();
                ?>




            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->


    </section>
    <!--Section: Content-->


</div>

<?php
include 'includes/components/footer.php'
?>