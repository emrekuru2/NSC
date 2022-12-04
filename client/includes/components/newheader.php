<?php 
    // Prevent direct access
    // If it the admin then all the validation is already handled in admin files.
    if(preg_match("/admin/", $_SERVER["PHP_SELF"]) == 0) {
        if(preg_match("/includes/", $_SERVER["PHP_SELF"]) == 1) {
            header("Location: ../../index.php");
            die();
        }
        else {
            include_once("includes/functions/security.php");
            RestrictIncludes();
            DefineSecurity();
        }

        include_once("db/database.php");
        include_once("db/dbFunctions.php");
        $conn = OpenCon();
    }

    if (isset($loginOrRegistrationPage) && $loginOrRegistrationPage) 
    {
        session_start();
        $session_token = md5(uniqid(rand(), true));

        $_SESSION['session_token'] = $session_token;
    }
    else 
    {
        if(session_status() !== PHP_SESSION_ACTIVE) session_start();
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
  </head>
  <body>
    
    <!-- Logo, bell and login -->
    <nav class="navbar bg-light">
        <div class="container">
            <!-- Logo -->
            <div class="m-auto d-flex">
                <img src="img/headerImg.png" alt="logo" width="80vw">
                <h2 class="m-auto">
                Nova Scotia 
                Cricket Association
                </h2>
            </div>

        </div>
    </nav>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-primary " >
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" style="width:50vw; margin-left:3vw; font-size: 1.5vw; ">
                    <li class="nav-item">
                    <a class="nav-link text-white " href="../../">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-white" href="../../Club.php">Clubs</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-white" href="../../Committees.php">Committees</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-white" href="../../TeamPage.php">Teams</a>
                    </li>
                </ul>
                <ul class="navbar-nav" style="width:50vw; margin-left:32vw; font-size: 1.5vw; ">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../../loginform.php">
                                <i class="bi bi-person-circle" style="color: white; font-size: 2vw;"></i>
                                Login 
                        </a>
                    </li>
                </ul>
            </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    