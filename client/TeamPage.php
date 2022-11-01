<?php
    $title = "Team";
    include_once 'includes/components/header.php';
    include_once 'includes/functions/security.php';
    $isLoggedIn = isset($_SESSION['LoggedIn']) && $_SESSION['LoggedIn'] == true;
    $isGuestUser = isset($_SESSION['User_ID']) && CheckRole($_SESSION['User_ID']) == 'Guest User';

    if(!$isLoggedIn || $isGuestUser) { 
        RedirectToIndex();
    }
?>
    <div class="container mt-5 pt-5">


        <!--Section: Content-->
        <section class="team-section text-center dark-grey-text">

            <!-- Section heading -->
            <h3 class="font-weight-bold mb-4 pb-2">Our Amazing Teams</h3>
            <hr class="w-25 my-5">
            <br><br>
            <?php
                displayTeams();
            ?>

        </section>
        <!--Section: Content-->


    </div>

<?php include_once 'includes/components/footer.php'?>