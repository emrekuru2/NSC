
<!doctype html>
<html lang="en">

<head>
    <base href="header.php">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>Page Not Found</title>

    <link rel="icon" href="img/favicon.jpeg">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../../css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" type="text/css" href="../../css/style.css">

    <?php 

        $previous = "javascript:history.go(-1)";
        if(isset($_SERVER['HTTP_REFERER'])) {
            $previous = $_SERVER['HTTP_REFERER'];
        }

        include_once "./includes/components/newheader.php";

    ?>

</head>

<body>

<div class="row h-100">

<?php if (isset($_GET['loggedIn']) && ($_GET['loggedIn'] == "false")) { ?>

    <div class="col-sm-6 offset-3 text-center" style="margin-top: 7vh;">
        <h1>User Not Found!</h1>
        <p class="text-danger">Invalid Session</p>
        <p>Looks like you are not logged in. No worries! Click the link below to log in quickly.
        </p>
        <a class="btn light-blue text-white" href="loginForm.php">Log In</a>
        <br>
    </div>

    <?php } else { ?>

    <div class="col-sm-6 offset-3 text-center" style="margin-top: 7vh;">
        <h1>Page Not Found</h1>
        <p class="text-danger">Error 404</p>
        <p>Looks like you took a wrong turn. No worries! Press the back button on your browser or click the link below to head back.
        </p>
        <a class="btn light-blue text-white" href="..">Home</a>
        <br>
        <a class="btn light-blue text-white" href="<?= $previous ?>">Return To Last Page</a>
    </div>

    <?php } ?>

</div>

</body>
</html>
