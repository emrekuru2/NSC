<?php
    $urlHeader = "";


if(session_status() !== PHP_SESSION_ACTIVE) session_start();

include_once $_SERVER["DOCUMENT_ROOT"]."/db/database.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/db/dbFunctions.php";



?>



<!doctype html>
<html lang="en">

<head>
    <base href="header.php">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title><?php echo $title ?></title>

    <link rel="icon" href="../../img/favicon.jpeg">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../../css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>


<body>


<nav class="navbar navbar-expand-lg navbar-dark light-blue">
    <a class="navbar-brand" href="../../">Nova Scotia Cricket Association</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../../">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../Club.php">Clubs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../Committees.php">Committees</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../TeamPage.php">Teams</a>
            </li>

        </ul>
        <ul class="navbar-nav ml-auto">

            <!-- Join a team or My Team -->
            <?php
                checkHasATeam();
            ?>
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="../../Team">My Team</a>-->
<!--            </li>-->

            <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="../../news.php">
                    <i class="fas fa-envelope"></i> News
                </a>
            </li>


            <?php

            //$_SESSION['loggedin'] = true; //for testing

            if (isset($_SESSION['LoggedIn']) && $_SESSION['LoggedIn'] == true) { ?>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id=\"navbarDropdownMenuLink-333\" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i> <?php echo $_SESSION['FirstName']." ".$_SESSION['LastName']?> </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-default\" aria-labelledby=\"navbarDropdownMenuLink-333\">
                    <a class="dropdown-item" href="../../UserProfile.php">My Profile</a>
                    <div class="dropdown-divider"></div>
                    <?php
                    if (isset($_SESSION['UserRole']) && $_SESSION['UserRole'] == "3") { //<<<------ THIS NEEDS TO BE CHANGED WHEN ADMIN ROLE IS ADDED
                        ?>
                        <a class="dropdown-item" href="../../admin/dashboard.php">Admin Dashboard</a>
                        <?php
                    }
                    ?>
                    <a class="dropdown-item" href="includes/components/logout.php">Logout</a>
                </div>
            </li>
            <?php
            } else {
                ?>
                <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="includes/components/loginform.php">
                    <i class="fas fa-user"></i> Login
                </a>
                </li>
            

    <?php
            }
            ?>

        </ul>
    </div>
</nav>

<?php
$conn = OpenCon();
if (getAlertStatus($conn) == "active"){
    $row = getAlerts($conn);
    echo mysqli_error($conn);
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h4 class="alert-heading"><?php echo $row['Alert_Title']; ?></h4>
        <p><?php echo $row['Alert_Content']; ?></p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <?php
}
?>





