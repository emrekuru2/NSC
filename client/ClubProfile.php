<?php
    include_once 'includes/components/header.php';
    $title = "ClubsProfile";
    // Only the coach can see this page
    if (isset($_SESSION['User_ID']) && (CheckRole($_SESSION['User_ID']) == 'Coach' || CheckRole($_SESSION['User_ID']) == 'Admin')) { 
    
?>
    <h1> Sorry this page is not available. Please return to <a href="index.php">home</a> </p>
<?php
    }
    else {
        RedirectToIndex();
    }
    include 'includes/components/footer.php'
?>