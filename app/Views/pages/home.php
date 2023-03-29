<?= $this->extend('layouts/default') ?>

<?= $this->section('mainContent') ?>
    <!-- The about us section:
        It has an image background with text and link over it
    -->
    <div class="justify-content-center container my-4" style="padding-top:2vw; position: relative;">
        <img src="<?= base_url('assets/images/General/logo1.png') ?>" alt="about-us" style="width:45%; height:auto;">
        <div class="text-bold" style="position: absolute; top: 50%; transform: translateY(-50%); right: 2vw; width: 40%; max-height: 80%; overflow-y: auto;">
            <h3>About us</h3>
            <p style="opacity: 1;">
                Pellentesque ullamcorper lorem lorem, elementum malesuada urna commodo vitae. Integer pulvinar tortor eget sapien aliquam cursus ac rutrum risus. Fusce et iaculis neque, ut ornare ligula. Vestibulum orci lacus, vestibulum vel orci varius, placerat dapibus nulla. Etiam vehicula diam a mi lobortis efficitur. Morbi interdum ipsum sit amet neque elementum, accumsan placerat lectus suscipit. Maecenas vel urna vitae dui gravida ornare in eget elit. Morbi congue mauris eget egestas iaculis. Ut sagittis mauris id diam sodales, in auctor felis fermentum. Nam sodales nunc odio, sed tincidunt tellus vulputate ac. Nulla at leo augue. Quisque in tellus viverra, viverra ante eget, tincidunt nunc.
                Pellentesque ullamcorper lorem lorem, elementum malesuada urna commodo vitae. Integer pulvinar tortor eget sapien aliquam cursus ac rutrum risus. Fusce et iaculis neque, ut ornare ligula. Vestibulum orci lacus, vestibulum vel orci varius, placerat dapibus nulla. Etiam vehicula diam a mi lobortis efficitur. Morbi interdum ipsum sit amet neque elementum, accumsan placerat lectus suscipit.
            </p>
        </div>
    </div>

    <div class="justify-content-center container d-flex flex-wrap" style="padding-top:2vw;">
        <div id="carouselExampleIndicators" class="carousel" style="padding-right: 1vw;" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active" style=" height:15rem; width: 40vw; max-width: 100%; position: relative; overflow: hidden;">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"  preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
                    <div class="carousel-caption text-end">
                        <h1>Clubs</h1>
                        <p>Take a look at our clubs that play in the HCL</p>
                        <p><a class="btn btn-primary" href="/clubs">Find out more</a></p>
                    </div>
                </div>
                <div class="carousel-item" style="height: 15rem; width: 50vw; max-width: 100%; margin-right:5vh; position: relative; overflow: hidden; background-color: grey;">
                    <img class="d-block" src="" alt="Second slide" object-fit="fill">
                </div>
                <div class="carousel-item" style="height: 15rem; width: 50vw; max-width: 100%; margin-right:5vh; position: relative; overflow: hidden; background-color: grey;">
                    <img class="d-block" src="" alt="Third slide" object-fit="fill">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only"></span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only"></span>
            </a>
        </div>
        <!-- DevPrograms Card -->
        <div class="card bg-info" style="height: 15rem; width: 25vw; max-width: 100%; position: relative; overflow: hidden;">
            <div class="card-body text-center pt-5" style="color: white; overflow-y: scroll;">
                <h2 class="card-title">Development Programs</h2>
                <p class="card-text" style="color: white;">Sign up for our new and upcoming programs
                    <br>and become a member at NSCA</p>
                <p class="d-flex justify-content-center" style=" bottom: 1px; overflow: hidden;">
                    <a class="btn btn-primary" href="/development" style="word-wrap: break-word;">Get involved</a>
                </p>
            </div>
        </div>
    </div>

    <!-- The New Section -->
    <div class="container my-4">
        <h1 class="text-center">News</h1>
        <hr>
    </div>
    <div class="container d-flex flex-row flex-wrap justify-content-center" style="padding-top:2vw;">
        <?php if (!empty($news) && is_array($news)) : ?>
            <?php foreach ($news as $news_item) : ?>
                <div class="card mb-3 mx-5" style="width: 20rem; background-color: lightgray;">
                    <div class="card-body d-flex flex-column">
                        <div class="text-center mb-1">
                            <h3 class="card-title" style="border: #222222; background-color: black; padding: 10px; color: white"><?= esc($news_item->title) ?></h3>
                            <?= $news_item->content ?>
                        </div>
                        <div class="mt-auto text-center">
                            <a href="news/<?= esc($news_item->id)?>" class="btn btn-primary btn-block">Find out more</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        <?php else : ?>
            <h3>No News</h3>
            <p>Unable to find any news for you.</p>
        <?php endif ?>
    </div>

    <!-- The Team Section -->
    <div class="container d-flex flex-wrap justify-content-between py-5">
        <div class="col-lg-6 col-md-12 mb-5">
            <div class="card h-100">
                <div class="card-body">
                    <h3 class="card-title">Provincial Team</h3>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec.</p>
                    <a href="#" class="btn btn-primary">Find out more</a>
                </div>
            </div>
        </div>
        <!-- Contact Us -->
        <div class="col-lg-5 col-md-12 mb-5">
            <div class="card h-100" style="background-color: deepskyblue;">
                <div class="card-body">
                    <h3 class="card-title text-white">Contact Us</h3>
                    <div class="container text-white">
                        <div class="row align-items-center">
                            <div class="col-2">
                                <a href="https://www.facebook.com/novascotiacricket/" target="_blank" class="mr-2 mb-3 text-white fs-2" role="button"><i class="fab fa-facebook"></i></a>
                            </div>
                            <div class="col padding-left: 2px;"><h5>Facebook</h5></div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-2">
                                <a href="https://twitter.com/nscricket" target="_blank" class="mr-2 mb-3 text-white fs-2" role="button"><i class="fab fa-twitter"></i></a>
                            </div>
                            <div class="col"><h5>Twitter</h5></div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-2">
                                <a href="mailto:testadmin@cricketnovascotia.ca" class="mr-2 mb-3 text-white fs-2" role="button"><i class="fas fa-envelope"></i></a>
                            </div>
                            <div class="col"><h5>Email</h5></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>