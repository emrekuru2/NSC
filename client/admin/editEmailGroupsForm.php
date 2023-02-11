<?php
$title = "Edit or Delete Group";
include_once "../includes/components/adminHeader.php";
// Prevent Direct access and prevent non-admin's to access
RestrictAdmin(CheckRole($_SESSION['User_ID']));
defined('_DEFVAR') or exit(header('Location: ../index.php'));
?>
<a href="../admin/editEmailGroups.php"<button class="btn light-blue text-white btn-md mx-0 btn-rounded">Go Back</button>
