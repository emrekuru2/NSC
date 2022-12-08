<?php
    $title = "Edit Competition Types";
    include_once "../includes/components/adminHeader.php";
    // Prevent Direct access and prevent non-admin's to access
    RestrictAdmin(CheckRole($_SESSION['User_ID']));
    defined('_DEFVAR') or exit(header('Location: ../index.php'));
?>
    <div class="alert alert-warning w-60 text-centre m-auto p-3" role="alert">
            <h3>Sorry this page is not available yet. Please return to <a href="../index.php">home</a></h3>
        
    </div>
<?php include_once "../includes/components/footer.php"; ?>