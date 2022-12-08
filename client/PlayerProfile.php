<?php
    include_once 'includes/components/newheader.php';
    include_once 'includes/functions/security.php';
    // Player, Admin, Coach
    CheckLoggedIn();
    AccessControlBasedOnLevel(PLAYER_ACCESS_LVL, $_SESSION['User_ID'])
?>

<h1> Sorry this page is not available.Please return to <a href="index.php">home</a> </p>

<?php
    include 'includes/components/footer.php'
?>