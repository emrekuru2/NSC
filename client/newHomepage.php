<?php
include 'includes/components/newheader.php';
?>
<head>
    <title>Home</title>
</head>

    

<!-- The about us section:
    It has an image background with text and link over it 
-->
    <div class="container position-relative" style="padding-top:2vw;">
        <img src="img/background.jpeg" alt="about-us" style="width:100%;height:40vw">
        <div class="text-white" style="position:absolute; bottom:1vw; right:1px;">
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
            <div class="carousel-item active" style="height: 15rem;width: 115vh; margin-right:5vh;">
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
    <div class="container d-flex flex-row justify-content-between" style="padding-top:2vw;">
        <div class="card" style="width: 20vw; height: 30vw">

            <div class="card-body text-center">
                <h5 class="card-title ">News title</h5>
                <p class="card-text m-4 ">News content</p>
                <a href="#" class="btn btn-primary position-absolute bottom-4vw start-50 translate-middle-x">Find out more</a>
            </div>
        </div>

        <div class="card" style="width: 20vw;">
            <div class="card-body">
                <img src="img/teamProfilePictures/HomePageNews1.jpeg" alt="New image" style="width:100%;height:12vw;">
                <p class="card-text m-4 text-center">News content</p>
            </div>
        </div>

        <div class="card" style="width: 20vw;">
            <div class="card-body">
                <img src="img/teamProfilePictures/HomePageNews2.jpeg" alt="New image" style="width:100%;height:12vw;">
                <p class="card-text m-4 text-center">News content</p>
            </div>
        </div>

        <div class="card " style="width: 20vw;">
            <div class="card-body">
                <img src="img/teamProfilePictures/HomePageNews3.jpeg" alt="New image" style="width:100%;height:12vw;">
                <p class="card-text m-4 text-center">News content</p>
            </div>
        </div>
    </div>

    <!-- The Team Section -->
    <div class="container d-flex flex-row justify-content-between" style="padding-top:2vw;">
        <div style="padding:4vw">
            <h3>Team</h3>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.  </p>
            <a href="#" class="btn btn-primary">Find out more</a>
        </div>
        <div>
            <img src="img/teamProfilePictures/HomePageTeam.jpeg" alt="Homme Page Team"  style="width:40vw">
        </div>
    </div>

<?php
include "includes/components/newfooter.php"
?>


