<?php
$title = "Send Email";

include_once "../includes/components/adminHeader.php";
// Prevent Direct access and prevent non-admin's to access
RestrictAdmin(CheckRole($_SESSION['User_ID']));
defined('_DEFVAR') or exit(header('Location: ../index.php'));

?>

    <form class="container-fluid">
        <h5>Test Text.</h5>
    </form>

    <script>
        console.log("Email Subject: " + sessionStorage.getItem('emailSubject'))
        console.log("Email Name: " + sessionStorage.getItem('emailName'))
        console.log("Email Recipients: " + sessionStorage.getItem('emailRecipients'))
        console.log("Email Body: " + sessionStorage.getItem('emailBody'))
    </script>
<?php
include_once "../includes/components/footer.php";
?>
