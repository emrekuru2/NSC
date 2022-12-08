<?php
    // Prevent direct access
    if(preg_match("/includes/", $_SERVER["PHP_SELF"]) == 1) {
        header("Location: ../../index.php");
        die();
    }
    elseif(preg_match("/admin/", $_SERVER["PHP_SELF"]) == 1) {
        include_once("../includes/functions/security.php");
        //RestrictAdmin();
        DefineSecurity();
        include_once("../db/database.php");
        include_once("../db/dbFunctions.php");
    }
    else {
        include_once("includes/functions/security.php");
        RestrictIncludes();
    }
    
    session_start();
    inactiveLogout();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title?></title>

    <link rel="icon" href="../../img/favicon.jpeg">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../../css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" type="text/css" href="../../css/style.css">

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">



</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav light-blue sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../../admin/dashboard.php">
            <div class="sidebar-brand-icon">
                <i class="fas fa-users-cog"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Admin Console</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="../../admin/dashboard.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Administrative Options
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Components</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Components:</h6>
                    <a class="collapse-item" href="../../admin/editAlertBanner.php">Edit Alert Banner</a>
                    <a class="collapse-item" href="../../admin/editClubInfo.php">Edit Clubs</a>
                    <a class="collapse-item" href="../../admin/editCompType.php">Edit Competition Types</a>
                    <a class="collapse-item" href="../../admin/editSubCommittees.php">Edit Sub Committees</a>
                    <a class="collapse-item" href="../../admin/editDevPrograms.php">Edit Devolepment Programs</a>
                    <a class="collapse-item" href="../../admin/editUserRole.php">Edit User Role</a>
                    <a class="collapse-item" href="../../admin/sendEmail.php">Send Email</a>
                    <a class="collapse-item" href="../../admin/manageApplication.php">Manage Team Application</a>
                    <a class="collapse-item" href="../../admin/manageTeamList.php">Manage Team List</a>


                </div>
            </div>
        </li>
        <hr class="sidebar-divider">

        <!- - Sidebar Toggler (Sidebar) -- >
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>



    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">


           <?php
            include_once "../includes/components/header.php";
            ?>

        <br>


