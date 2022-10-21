<?php
    $title = "Edit Locations";
    include "../includes/components/adminHeader.php";
    // Prevent Direct access and prevent non-admin's to access
    RestrictAdmin(CheckRole($_SESSION['User_ID']));
    defined('_DEFVAR') or exit(header('Location: ../index.php'));
    
    $conn = OpenCon();

?>
    <div class="col-7 offset-2">


    </div>

<?php include "../includes/components/footer.php"; ?>