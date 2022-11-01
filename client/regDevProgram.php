<?php
    $title = "Registration Page | Development Programs";
    include 'includes/components/header.php';

    $devID = $_GET["devID"];
    $_SESSION['devID'] = $devID;

    if (isset($_SESSION['LoggedIn']) && $_SESSION['LoggedIn'] == true) {
        $userID = $_SESSION["User_ID"];
        $sql = "INSERT INTO user_devprogram (`DevId`, `UserID`, `Time`) VALUES ($devID, $userID, now())";

?>

<body>

    <?php if ($conn->query($sql) === TRUE) { ?>

        <div class="content text-center" style="height: 80vh;">
            <img src="./img/tick.png" alt="success" class="rounded mx-auto d-block" style="height: 20%; margin: 10% 10% 3% 10%">
            <p class="h5" style="color: #00A79D;">You have successfully registered for the program!</p>
            <br>
            <a class="btn light-blue text-white" href="./devProgram.php">Browse More</a>
        </div>

    <?php } else { ?>

        <div class="content text-center" style="height: 80vh;">
            <img src="./img/error.png" alt="error" class="rounded mx-auto d-block" style="height: 20%; margin: 10% 10% 3% 10%">
            <p class="h5" style="color: #E81A00;">There was an unexpected error while processing your request!</p>
            <br>
            <a class="btn light-blue text-white" href="./devProgram.php">Back</a>
            <br>
            <br>
            <?php 
                if ($conn->errno == 1062) {
            ?>
            <p class="text-danger">You have already registered for this program!</p>
            <?php } ?>
        </div>

    <?php } 
    } else {
        $regDev = true;
        $_SESSION['regDev'] = true;
        header("Location: ./404.php?loggedIn=false");
    } ?>

</body>