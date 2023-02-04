<?php
$title = "Send Email";

include_once "../includes/components/adminHeader.php";
// Prevent Direct access and prevent non-admin's to access
RestrictAdmin(CheckRole($_SESSION['User_ID']));
defined('_DEFVAR') or exit(header('Location: ../index.php'));

?>

    <form class="container-fluid">
        <h5>Temp Text.</h5>
    </form>

    <script src="../js/admin-email-pages.js"></script>
<?php
include_once "../includes/components/footer.php";
?>
