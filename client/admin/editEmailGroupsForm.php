<?php
$title = "Edit or Delete Group";
include_once "../includes/components/adminHeader.php";
// Prevent Direct access and prevent non-admin's to access
RestrictAdmin(CheckRole($_SESSION['User_ID']));
defined('_DEFVAR') or exit(header('Location: ../index.php'));
?>
