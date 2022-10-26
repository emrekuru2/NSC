<?php
    include_once 'includes/components/header.php';
    include_once 'includes/functions/security.php';
    // Player, Admin, Coach
    $isLoggedIn = isset($_SESSION['LoggedIn']) && $_SESSION['LoggedIn'] == true;
    $isPlayer = isset($_SESSION['User_ID']) && CheckRole($_SESSION['User_ID']) == 'Player';
    
    // Must be logged and must be player
    if(!$isLoggedIn || !$isPlayer) {
        RedirectToIndex();
    }
?>

<h1> Sorry this page is not available.Please return to <a href="index.php">home</a> </p>

<?php
    include 'includes/components/footer.php'
?>