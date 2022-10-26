<!-- Development Programs
This page contains current and upcoming devlopment programs.
-->
<?php
$title = "Development Programs";
include 'includes/components/header.php';
?>

<!-- Css and script links -->
<link rel="stylesheet" type="text/css" href="../../css/devProgram.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<body>

    <h1 class="text-center pt-5" id="pageTitle">Development Programs</h1>
    <!-- Dummy Text: Page Discription -->
    <p class="text-center p-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi 
        ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p>

    <div class = "content">
        <div class = "content-inside">
        <!-- 
            Carousel
            Page title: Caerousel.Bootsrtap
            Code source: https://getbootstrap.com/docs/4.0/components/carousel/
            Version: 4.0
            Date accessed: Octover 25, 2022
        -->
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" style="height: 70vh; width: 90vw; margin: auto; margin-top: 2vh;">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="./img/DevProgram/banner1-1.jpg" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Dummy Text</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./img/DevProgram/program-pic11.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./img/DevProgram/program-pic22.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <!-- Program list: Information on each developmental program  
                images, 
                program title, 
                program discription and sign up  -->
            <div class="programs-board">
                <div class="mb-5" >
                    <div class="row g-0">
                        <div class="col">
                        <img src="./img/DevProgram/program-pic1.jpeg" style="width:100%" alt="...">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                <a href="#" class="btn btn-primary">Find out more!</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <div class="row g-0">
                        <div class="col order-last">
                        <img src="./img/DevProgram/program-pic2.jpeg" style="width:100%" alt="...">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                <a href="#" class="btn btn-primary">Find out more!</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <div class="row g-0">
                        <div class="col">
                        <img src="./img/DevProgram/program-pic3.jpeg" style="width:100%" alt="...">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                <a href="#" class="btn btn-primary">Find out more!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        include 'includes/components/footer.php';
    ?>
</body>

