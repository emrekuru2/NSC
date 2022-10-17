<?php
$title = "News";
include 'includes/components/header.php';
?>

<link rel="stylesheet" type="text/css" href="../../css/devProgram.css">

<div class="banner">
    <img class = "banner_img" src='./img/dummyImg/banner_DevProgram.jpg' alt='banner picture'>
    <div class= "banner_text">
        <h2>Dummy Text</h2>
    </div>
</div>


<div class="programs-board">
    <div class="program" id="program1">
        <img class="program-img" src="./img/dummyImg/program-pic1.jpeg" alt="program picture">
        <div class="program-info">
            <h2>Dummy text</h2>
            <button class="info-button" onclick="#">More info!</button>
        </div>
    </div>

    <div class="program" id="program2">
        <img class="program-img" src="./img/dummyImg/program-pic2.jpeg" alt="program picture">
        <div class="program-info">
            <h2>Dummy text</h2>
            <button class="info-button" onclick="#">More info!</button>
        </div>
    </div>

    <div class="program" id="program3">
        <img class="program-img" src="./img/dummyImg/program-pic3.jpeg" alt="program picture">
        <div class="program-info">
            <h2>Dummy text</h2>
            <button class="info-button" onclick="#">More info!</button>
        </div>
    </div>
</div>

<!-- issue -->

<?php
    include 'includes/components/footer.php';
?>

