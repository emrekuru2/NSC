<?php
$title = "Homepage"; 
include 'includes/components/newheader.php'; 
?>

    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

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
        
        <div id="carouselExampleIndicators" class="carousel" data-ride="carousel" >
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
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
            <div class="carousel-item" style="height: 15rem; width: 100vh; margin-right:5vh; background-color: grey;">
                <img class="d-block" src="" alt="Second slide" object-fit="fill">
            </div>
            <div class="carousel-item" style="height: 15rem; width: 100vh; margin-right:5vh; background-color: grey;">
                <img class="d-block" src="" alt="Third slide" object-fit="fill">
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
        <div class="card d-flex flex-column " style="width: 20vw; height: 30vw; padding: 10px;">
        <!-- <img class="card-img-top" src="<?php echo $newsImagePath ?>" alt="Card image cap"> -->
            <img class="card-img-top" src="img\teamProfilePictures\HomePageNews1.jpeg" alt="Card image cap">
            <div class="card-body">
                <div class="text-center" style="height:4rem">
                    <h4 class="card-title mt-2"><?php echo substr($newsTitle, 0, 25); ?></h4>
                </div>
                <p class="card-text" style="height:7rem"><?php echo substr($newsContent,0 ,  150); ?></p>
                <div class="text-center">
                    <a href="singleNews.php?id=<?php echo $newsID;?>" class="btn btn-primary mt-3; padding: 10px" >Find out more</a>
                </div>
            </div>
        </div>

        <?php }?>
    </div>

    <!-- The Team Section -->
    <div class="container d-flex flex-row justify-content-between" style="padding-top:2vw; padding-bottom:10vw;">
        <div class="row">
            <div class="col-7" style="padding:4vw">
                <h3>Provincial Team</h3>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec. </p>
                <a href="#" class="btn btn-primary">Find out more</a>
            </div>
       
            <div class="col-5" style="padding:4vw">
            <!-- Contact Us -->
                <div class="card" style="background-color: blue;">
                <div class="card-body">
                    <h5 class="card-title text-white">Contact Us</h5>
                    <div class="container text-white">
                        <div class="row">
                            <div class="col-2">
                                <a href="https://www.facebook.com/novascotiacricket/" class="mr-2 text-white fs-2" role="button"><i class="bi bi-facebook"></i></a>
                            </div>
                            <div class="col m-auto"><h5>Facebook</h5></div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <a href="http://www.novascotiacricket.com" class="mr-2 text-white fs-2" role="button"><i class="bi bi-envelope"></i></a>
                            </div>
                            <div class="col m-auto"><h5>Email</h5></div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>



<?php
include "includes/components/footer.php"
?>
