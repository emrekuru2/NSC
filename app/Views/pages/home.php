<?= $this->extend('layouts/default') ?>

<?= $this->section('mainContent') ?>
    <!-- The about us section:
        It has an image background with text and link over it
    -->
    <div class="container my-4" style="padding-top:2vw; position: relative;">
        <img src="/assets/images/General/logo1.png" alt="about-us" style="width:40%; height:auto;">
        <div class="text-bold" style="position:absolute; top:50%; transform: translateY(-50%); right:2vw; width: 40%;">
            <h3>About us</h3>
            <p style="opacity:1;">
                Pellentesque ullamcorper lorem lorem, elementum malesuada urna commodo vitae. Integer pulvinar tortor eget sapien aliquam cursus ac rutrum risus. Fusce et iaculis neque, ut ornare ligula. Vestibulum orci lacus, vestibulum vel orci varius, placerat dapibus nulla. Etiam vehicula diam a mi lobortis efficitur. Morbi interdum ipsum sit amet neque elementum, accumsan placerat lectus suscipit. Maecenas vel urna vitae dui gravida ornare in eget elit. Morbi congue mauris eget egestas iaculis. Ut sagittis mauris id diam sodales, in auctor felis fermentum. Nam sodales nunc odio, sed tincidunt tellus vulputate ac. Nulla at leo augue. Quisque in tellus viverra, viverra ante eget, tincidunt nunc.
            </p>
        </div>
    </div>

    <style>
        @media (max-width: 767px) {
            .container {
                display: flex;
                flex-direction: column-reverse;
                align-items: center;
            }
            img {
                width: 100%;
                height: auto;
            }
            .text-bold {
                position: static;
                margin-top: 2vw;
                width: 100%;
                text-align: center;
            }
        }
    </style>



    <div class="container d-flex" style="padding-top:2vw;">

        <div id="carouselExampleIndicators" class="carousel" data-ride="carousel" >
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" >
                <div class="carousel-item active" style="height: 20rem;width: 100vh; margin-right:5vh;">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"  preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
                    <div class="carousel-caption text-end">
                        <h1>Clubs</h1>
                        <p>Take a look at the our clubs that play in the HCL</p>
                        <p><a class="btn btn-primary" href="/clubs">Find out more</a></p>
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
        <div class="card bg-info" style="height:20rem; width: 70vh; position: relative;">
            <div class="card-body text-center pt-5" style="color: white;">
                <h2 class="card-title">Development Programs</h2>
                <p class="card-text" style="color: white;">Sign up for our new and upcoming programs
                    <br>and become a member at NSCA</p>
                <p style="position: absolute; bottom: 1px;"><a class="btn btn-primary" href="/development">Get involved</a></p>
            </div>
        </div>
        <style>
            /* Media query for screens smaller than 768px */
            @media screen and (max-width: 767px) {
                .d-flex {
                    flex-wrap: wrap;
                }

                .carousel {
                    margin-bottom: 2vw;
                }

                .card {
                    width: 100%;
                }
            }
        </style>

    </div>

    <!-- The New Section -->
<!--    <div class="container d-flex flex-row justify-content-between" style="padding-top:2vw;">-->
<!--        --><?php
//        $sql = "SELECT NewsID, Title, Content, Pictures FROM nsca_news ORDER BY NewsID DESC LIMIT 3";
//
//        $stmt = $conn->prepare($sql);
//        $stmt->execute();
//        $stmt->store_result();
//        $stmt->bind_result($newsID, $newsTitle, $newsContent, $newsImagePath);
//
//        while($stmt->fetch()) {
//
//            ?>
<!--            <div class="card d-flex flex-column " style="width: 20vw; height: 30vw; padding: 10px;">-->
<!--                 <img class="card-img-top" src="--><?php //echo $newsImagePath ?><!--" alt="Card image cap"> -->
<!--                <img class="card-img-top" src="img\teamProfilePictures\HomePageNews1.jpeg" alt="Card image cap">-->
<!--                <div class="card-body">-->
<!--                    <div class="text-center" style="height:4rem">-->
<!--                        <h4 class="card-title mt-2">--><?php //echo substr($newsTitle, 0, 25); ?><!--</h4>-->
<!--                    </div>-->
<!--                    <p class="card-text" style="height:7rem">--><?php //echo substr($newsContent,0 ,  150); ?><!--</p>-->
<!--                    <div class="text-center">-->
<!--                        <a href="news.php?id=--><?php //echo $newsID;?><!--" class="btn btn-primary mt-3; padding: 10px" >Find out more</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--        --><?php //}?>
<!--    </div>-->

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
                                    <a href="https://www.novascotiacricket.com" class="mr-2 text-white fs-2" role="button"><i class="bi bi-envelope"></i></a>
                                </div>
                                <div class="col m-auto"><h5>Email</h5></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?= $this->endSection() ?>