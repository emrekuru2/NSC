<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
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
                    <a class="collapse-item" href="../../admin/editLocations.php">Edit Locations</a>
                    <a class="collapse-item" href="../../admin/editSubCommittees.php">Edit Sub Committees</a>
                    <a class="collapse-item" href="../../admin/editUserRole.php">Edit User Role</a>
                    <a class="collapse-item" href="../../admin/postAnnouncement.php">Post Announcement</a>
                    <a class="collapse-item" href="../../admin/sendEmail.php">Send Email</a>
                    <a class="collapse-item" href="../../admin/manageApplication.php">Manage Team Application</a>
                    <a class="collapse-item" href="../../admin/manageTeamList.php">Manage Team List</a>


                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
<!--        <li class="nav-item">-->
<!--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">-->
<!--                <i class="fas fa-fw fa-wrench"></i>-->
<!--                <span>Utilities</span>-->
<!--            </a>-->
<!--            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">-->
<!--                <div class="bg-white py-2 collapse-inner rounded">-->
<!--                    <h6 class="collapse-header">Custom Utilities:</h6>-->
<!--                    <a class="collapse-item" href="utilities-color.html">Colors</a>-->
<!--                    <a class="collapse-item" href="utilities-border.html">Borders</a>-->
<!--                    <a class="collapse-item" href="utilities-animation.html">Animations</a>-->
<!--                    <a class="collapse-item" href="utilities-other.html">Other</a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </li>-->

        <!-- Divider -->
        <hr class="sidebar-divider">




        <!-- For future purposes
        <!- - Heading -- >
        <div class="sidebar-heading">
            Addons
        </div>

        <!- - Nav Item - Pages Collapse Menu -- >
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Pages</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Login Screens:</h6>
                    <a class="collapse-item" href="login.html">Login</a>
                    <a class="collapse-item" href="register.html">Register</a>
                    <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">Other Pages:</h6>
                    <a class="collapse-item" href="404.html">404 Page</a>
                    <a class="collapse-item" href="blank.html">Blank Page</a>
                </div>
            </div>
        </li>

        <!- - Nav Item - Charts -- >
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span></a>
        </li>

        <! -- Nav Item - Tables -- >
        <li class="nav-item">
            <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-table"></i>
                <span>Tables</span></a>
        </li>



        <!- - Divider -- >
        <hr class="sidebar-divider d-none d-md-block">

        -->

        <!- - Sidebar Toggler (Sidebar) -- >
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>



    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">


           <?php
            include "header.php";
            ?>

        <br>
