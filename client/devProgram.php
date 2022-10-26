<?php
$title = "Development Programs";
include 'includes/components/header.php';
?>

<link rel="stylesheet" type="text/css" href="../../css/devProgram.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<body>
    <div class = "content">
    
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="./img/DevProgram_Dummy/banner1.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Dummy Text</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./img/DevProgram_Dummy/program-pic1.jpeg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./img/DevProgram_Dummy/program-pic2.jpeg" alt="Third slide">
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
        <!-- <div class = "content-inside">
            <div class="banner">
                <img class = "banner_img" src='./img/DevProgram_Dummy/banner1.jpg' alt='banner picture'>
                <div class= "banner_text">
                    <h2>Dummy Text</h2>
                </div>
            </div> -->


            <div class="programs-board">
                <div class="mb-5" >
                    <div class="row g-0">
                        <div class="col">
                        <img src="./img/DevProgram_Dummy/program-pic1.jpeg" style="width:100%" alt="...">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This text has no meaning but I just put it in here to see how it will appear on the website.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                <a href="#" class="btn btn-primary">Find out more!</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <div class="row g-0">
                        <div class="col order-last">
                        <img src="./img/DevProgram_Dummy/program-pic2.jpeg" style="width:100%" alt="...">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This text has no meaning but I just put it in here to see how it will appear on the website.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                <a href="#" class="btn btn-primary">Find out more!</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <div class="row g-0">
                        <div class="col">
                        <img src="./img/DevProgram_Dummy/program-pic3.jpeg" style="width:100%" alt="...">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This text has no meaning but I just put it in here to see how it will appear on the website.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                <a href="#" class="btn btn-primary">Find out more!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- issue -->

    <?php
        include 'includes/components/footer.php';
    ?>
</body>

