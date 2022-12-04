<?php
$title = "Homepage"; 
include 'includes/components/newheader.php'; 
?>

    

<!-- The about us section:
    It has an image background with text and link over it 
-->
    <div class="container position-relative" style="padding-top:2vw;">
        <img src="img/background.jpeg" alt="about-us" style="width:100%;height:40vw">
        <div class="text-white" style="position:absolute; bottom:2vw; right:4vw;">
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
            <div class="carousel-item active" style="height: 15rem;width: 100vh; margin-right:5vh;">
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
            <span class="sr-only"></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only"></span>
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
        <?php 
            $sql = "SELECT NewsID, Title, Content, Pictures FROM nsca_news ORDER BY NewsID DESC LIMIT 3";

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($newsID, $newsTitle, $newsContent, $newsImagePath);

            while($stmt->fetch()) {
            
        ?>
        <div class="card d-flex flex-column " style="width: 20vw; height: 30vw">
        <!-- <img class="card-img-top" src="<?php echo $newsImagePath ?>" alt="Card image cap"> -->
            <img class="card-img-top" src="img\teamProfilePictures\HomePageNews1.jpeg" alt="Card image cap">
            <div class="card-body">
                <div class="text-center" style="height:4rem">
                    <h4 class="card-title mt-2"><?php echo substr($newsTitle, 0, 25); ?></h4>
                </div>
                <p class="card-text" style="height:7rem"><?php echo substr($newsContent,0 ,  150); ?></p>
                <div class="text-center">
                    <a href="singleNews.php?id=<?php echo $newsID;?>" class="btn btn-primary mt-3" >Find out more</a>
                </div>
            </div>
        </div>

        <?php }?>
    </div>


    <!-- The Team Section -->
    <div class="container d-flex flex-row justify-content-between" style="padding-top:2vw; padding-bottom:10vw;">
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


