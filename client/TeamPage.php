<?php
    $title = "Team";
    include_once 'includes/components/newheader.php';
    include_once 'includes/functions/security.php';
?>
    <div class="container mt-5">


        <!--Section: Content-->
        <section class="team-section text-center dark-grey-text">

            <!-- Section heading -->
            <h1 class="display-3 text-center font-weight-bold">Our Amazing Teams</h1>
            <hr class="w-25 my-5">
            <br><br>
            <?php
                displayTeams();
            ?>

        </section>
        <!--Section: Content-->


    </div>

<?php include_once 'includes/components/footer.php'?>