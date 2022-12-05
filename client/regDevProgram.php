<?php
    $title = "Registration Page | Development Programs";
    include 'includes/components/newheader.php';

    if (isset($_GET["devID"])) {

        $devID = $_GET["devID"];
        $userID = $_SESSION["User_ID"];
        $sql = "INSERT INTO user_devprogram (`DevId`, `UserID`, `Time`) VALUES ($devID, $userID, now())";

?>

<?php if (isset($_SESSION['LoggedIn']) && $_SESSION['LoggedIn'] == true) { ?>

<body>

    <?php

        try {
            $result = $conn->query($sql);

            if ($result === TRUE) { ?>

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
            <?php echo $sql."<br>".$conn->error;?>
        </div>
        <?php }
            
        } catch (mysqli_sql_exception $e) {
?>
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

<?php 
        }
} else {
    header("location: loginform.php");
        }
    } else {
        echo "<h5 class='text-danger text-center' style='margin-top: 3%;'>Please select a valid development program to register!</h5>";
?>
<div class="row h-100" style="margin: 2%;">
    <div class="col-sm-6 offset-3 text-center">
        <a class="btn light-blue text-white" href="devProgram.php">Back to Development Programs</a>
        <br>
        <a class="btn light-blue text-white" href="<?= $previous ?>">Return To Last Page</a>
    </div>
</div>
    <?php }
    ?>

</body>