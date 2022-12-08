<?php
    $title = "Team";
    include_once 'includes/components/newheader.php';
    include_once 'includes/functions/security.php';
    CheckLoggedIn();
    AccessControlBasedOnLevel(PLAYER_ACCESS_LVL, $_SESSION['User_ID']);
?>
    <div class="container mt-5">


        <!--Section: Content-->
        <section class="team-section text-center dark-grey-text">

            <!-- Section heading -->
            <h1 class="display-3 text-center font-weight-bold">Our Amazing Teams</h1>
            <hr class="w-25 my-5">
            <br><br>
            <?php
                displayTeamsForApply();
            ?>

        </section>
        <!--Section: Content-->
        
    </div>

<?php
    include "includes/components/footer.php";
?>
