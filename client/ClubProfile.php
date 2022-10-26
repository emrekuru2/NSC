<?php
    include_once 'includes/components/header.php';
    // Only the coach can see this page
    if (isset($_SESSION['User_ID']) && CheckRole($SESSION['User_ID']) == 'Coach') { 
    
?>
    <h1> Sorry this page is not availabl. Please return to <a href="index.php">home</a> </p>
<?php
    }
    else {
        RedirectToIndex();
    }
    include 'includes/components/footer.php'
?>