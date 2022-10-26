<?php
    $title = "Edit Competition Types";
    include "../includes/components/adminHeader.php";
    // Prevent Direct access and prevent non-admin's to access
    RestrictAdmin(CheckRole($_SESSION['User_ID']));
    defined('_DEFVAR') or exit(header('Location: ../index.php'));
?>
    <h1> Sorry this page is not available yet.Please return to <a href="../index.php">home</a> </p>

<?php include "../includes/components/footer.php"; ?>