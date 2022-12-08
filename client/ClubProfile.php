<?php
    include_once 'includes/components/newheader.php';
    $title = "ClubsProfile";
    // Only the coach can see this page
    CheckLoggedIn();
    AccessControlBasedOnLevel(MANAGER_ACCESS_LVL, $_SESSION['User_ID'])
?>
    <h1> Sorry this page is not available. Please return to <a href="index.php">home</a> </h1>
<?php
    include 'includes/components/footer.php'
?>