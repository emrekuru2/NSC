<?php
$title = "Edit or Delete Group";
include_once "../includes/components/adminHeader.php";
// Prevent Direct access and prevent non-admin's to access
RestrictAdmin(CheckRole($_SESSION['User_ID']));
defined('_DEFVAR') or exit(header('Location: ../index.php'));
?>
<div class="send-email-group-section">
    <a href="../admin/editEmailGroups.php"><button class="send-email-group-edit-groups-btn btn light-blue text-white my-4" type="button" id="send-email--btn" title="Return to Edit Email Group Page">Return to Manage Email Group Page</button></a>
</div>