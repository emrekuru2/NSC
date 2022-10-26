<?php
    include_once "../includes/components/adminHeader.php";
    // Prevent Direct access and prevent non-admin's to access
    RestrictAdmin(CheckRole($_SESSION['User_ID']));
    defined('_DEFVAR') or exit(header('Location: ../index.php'));
    // Admin
?>

<h1> Sorry this page is not available yet.Please redurn to <a href="../index.php">home</a> </p>

<?php
    include_once '../includes/components/footer.php'
?>