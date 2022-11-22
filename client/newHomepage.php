<?php
include 'includes/components/newheader.php';
?>
<head>
    <title>Home</title>
</head>
<div style="padding-left:5vw;padding-left:5vw;">
    

<!-- The about us section:
    It has an image background with text and link over it 
-->
    <div class="container position-relative" style="padding-top:2vw; width:80vw">
        <img src="img/background.jpeg" alt="about-us" style="width:80vw;height:40vw">
        <div class="bg-success p-2 text-white bg-opacity-25" style="position:absolute; bottom:1vw; right:1px;">
            <h3>About us</h3>
            <p style="opacity:1;">
                Some content Some content Some content  Some content
            </p>
        </div>      
    </div>

    <div class="container d-flex" style="padding-top:2vw;">
        
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" >
            <div class="carousel-item active" style="height: 15rem;width: 130vh;">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"  preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
                <div class="carousel-caption text-end">
                    <h1>Clubs</h1>
                    <p>Take a look at the our clubs that play in the HCL</p>
                    <p><a class="btn btn-primary" href="Club.php">Find out more</a></p>
                </div>
            </div>
            <div class="carousel-item">
            <img class="d-block" src="../../img/clubs/EastCoastCricketClub.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="..." alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>

        <!-- DevPrograms Card -->
        <div class="card bg-info " style="height:15rem; width: 70vh;">
            <div class="card-body text-center pt-5" style="color: white;" >
                <h2 class="card-title">Development Programs</h2>
                <p class="card-text " style="color: white;">Sign up for our new and upcoming programs
                    <br>and become a member at NSCA</p>
                    <p><a class="btn btn-primary" href="devProgram.php">Get involved</a></p>
            </div>
        </div>
                 
    </div>
    
    <!-- The New Section -->
    <div class="d-flex flex-row justify-content-between" style="padding-top:2vw;">
        <div class="card" style="width: 22vw; height: 30vw">

            <div class="card-body text-center">
                <h5 class="card-title ">News title</h5>
                <p class="card-text m-4 ">News content</p>
                <a href="#" class="btn btn-primary position-absolute bottom-0 start-50 translate-middle-x">Find out more</a>
            </div>
        </div>

        <div class="card" style="width: 22vw;">
            <div class="card-body">
                <img src="img/teamProfilePictures/HomePageNews1.jpeg" alt="New image" style="width:100%;height:12vw;">
                <p class="card-text m-4 text-center">News content</p>
            </div>
        </div>

        <div class="card" style="width: 22vw;">
            <div class="card-body">
                <img src="img/teamProfilePictures/HomePageNews2.jpeg" alt="New image" style="width:100%;height:12vw;">
                <p class="card-text m-4 text-center">News content</p>
            </div>
        </div>

        <div class="card " style="width: 22vw;">
            <div class="card-body">
                <img src="img/teamProfilePictures/HomePageNews3.jpeg" alt="New image" style="width:100%;height:12vw;">
                <p class="card-text m-4 text-center">News content</p>
            </div>
        </div>

    </div>
</>
