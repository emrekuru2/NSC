<?= $this->extend('layouts/default') ?>

<?= $this->section('mainContent') ?>
<!--     The about us section:-->
<!--        It has an image background with text and link over it-->
<!--    -->
<!--    <div class="justify-content-center container my-4" style="padding-top:2vw; position: relative;">-->
<!--        <img src="--><?php //= base_url('assets/images/General/logo1.png') ?><!--" alt="about-us" style="width:45%; height:auto;">-->
<!--        <div class="text-bold" style="position: absolute; top: 50%; transform: translateY(-50%); right: 2vw; width: 40%; max-height: 80%; overflow-y: auto;">-->
<!--            <h3>About us</h3>-->
<!--            <p style="opacity: 1;">-->
<!--                Pellentesque ullamcorper lorem lorem, elementum malesuada urna commodo vitae. Integer pulvinar tortor eget sapien aliquam cursus ac rutrum risus. Fusce et iaculis neque, ut ornare ligula. Vestibulum orci lacus, vestibulum vel orci varius, placerat dapibus nulla. Etiam vehicula diam a mi lobortis efficitur. Morbi interdum ipsum sit amet neque elementum, accumsan placerat lectus suscipit. Maecenas vel urna vitae dui gravida ornare in eget elit. Morbi congue mauris eget egestas iaculis. Ut sagittis mauris id diam sodales, in auctor felis fermentum. Nam sodales nunc odio, sed tincidunt tellus vulputate ac. Nulla at leo augue. Quisque in tellus viverra, viverra ante eget, tincidunt nunc.-->
<!--                Pellentesque ullamcorper lorem lorem, elementum malesuada urna commodo vitae. Integer pulvinar tortor eget sapien aliquam cursus ac rutrum risus. Fusce et iaculis neque, ut ornare ligula. Vestibulum orci lacus, vestibulum vel orci varius, placerat dapibus nulla. Etiam vehicula diam a mi lobortis efficitur. Morbi interdum ipsum sit amet neque elementum, accumsan placerat lectus suscipit.-->
<!--            </p>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div class="justify-content-center container d-flex flex-wrap" style="padding-top:2vw;">-->
<!--        <div id="carouselExampleIndicators" class="carousel" style="padding-right: 1vw;" data-ride="carousel">-->
<!--            <ol class="carousel-indicators">-->
<!--                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>-->
<!--                <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>-->
<!--                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>-->
<!--            </ol>-->
<!--            <div class="carousel-inner">-->
<!--                <div class="carousel-item active" style=" height:15rem; width: 40vw; max-width: 100%; position: relative; overflow: hidden;">-->
<!--                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"  preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>-->
<!--                    <div class="carousel-caption text-end">-->
<!--                        <h1>Clubs</h1>-->
<!--                        <p>Take a look at our clubs that play in the HCL</p>-->
<!--                        <p><a class="btn btn-primary" href="/clubs">Find out more</a></p>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="carousel-item" style="height: 15rem; width: 50vw; max-width: 100%; margin-right:5vh; position: relative; overflow: hidden; background-color: grey;">-->
<!--                    <img class="d-block" src="" alt="Second slide" object-fit="fill">-->
<!--                </div>-->
<!--                <div class="carousel-item" style="height: 15rem; width: 50vw; max-width: 100%; margin-right:5vh; position: relative; overflow: hidden; background-color: grey;">-->
<!--                    <img class="d-block" src="" alt="Third slide" object-fit="fill">-->
<!--                </div>-->
<!--            </div>-->
<!--            <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">-->
<!--                <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
<!--                <span class="sr-only"></span>-->
<!--            </a>-->
<!--            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">-->
<!--                <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
<!--                <span class="sr-only"></span>-->
<!--            </a>-->
<!--        </div>-->
<!--        DevPrograms Card -->
<!--        <div class="card bg-info" style="height: 15rem; width: 25vw; max-width: 100%; position: relative; overflow: hidden;">-->
<!--            <div class="card-body text-center pt-5" style="color: white; overflow-y: scroll;">-->
<!--                <h2 class="card-title">Development Programs</h2>-->
<!--                <p class="card-text" style="color: white;">Sign up for our new and upcoming programs-->
<!--                    <br>and become a member at NSCA</p>-->
<!--                <p class="d-flex justify-content-center" style=" bottom: 1px; overflow: hidden;">-->
<!--                    <a class="btn btn-primary" href="/development" style="word-wrap: break-word;">Get involved</a>-->
<!--                </p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    The New Section -->
<!--    <div class="container my-4">-->
<!--        <h1 class="text-center">News</h1>-->
<!--        <hr>-->
<!--    </div>-->
<!--    <div class="container d-flex flex-row flex-wrap justify-content-center" style="padding-top:2vw;">-->
<!--        --><?php //if (!empty($news) && is_array($news)) : ?>
<!--            --><?php //foreach ($news as $news_item) : ?>
<!--                <div class="card mb-3 mx-5" style="width: 20rem; background-color: lightgray;">-->
<!--                    <div class="card-body d-flex flex-column">-->
<!--                        <div class="text-center mb-1">-->
<!--                            <h3 class="card-title" style="border: #222222; background-color: black; padding: 10px; color: white">--><?php //= esc($news_item->title) ?><!--</h3>-->
<!--                            --><?php //= $news_item->content ?>
<!--                        </div>-->
<!--                        <div class="mt-auto text-center">-->
<!--                            <a href="news/--><?php //= esc($news_item->id)?><!--" class="btn btn-primary btn-block">Find out more</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            --><?php //endforeach ?>
<!--        --><?php //else : ?>
<!--            <h3>No News</h3>-->
<!--            <p>Unable to find any news for you.</p>-->
<!--        --><?php //endif ?>
<!--    </div>-->
<!---->
<!--     The Team Section -->
<!--    <div class="container d-flex flex-wrap justify-content-between py-5">-->
<!--        <div class="col-lg-6 col-md-12 mb-5">-->
<!--            <div class="card h-100">-->
<!--                <div class="card-body">-->
<!--                    <h3 class="card-title">Provincial Team</h3>-->
<!--                    <p class="card-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec.</p>-->
<!--                    <a href="#" class="btn btn-primary">Find out more</a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--         Contact Us -->
<!--        <div class="col-lg-5 col-md-12 mb-5">-->
<!--            <div class="card h-100" style="background-color: deepskyblue;">-->
<!--                <div class="card-body">-->
<!--                    <h3 class="card-title text-white">Contact Us</h3>-->
<!--                    <div class="container text-white">-->
<!--                        <div class="row align-items-center">-->
<!--                            <div class="col-2">-->
<!--                                <a href="https://www.facebook.com/novascotiacricket/" target="_blank" class="mr-2 mb-3 text-white fs-2" role="button"><i class="fab fa-facebook"></i></a>-->
<!--                            </div>-->
<!--                            <div class="col padding-left: 2px;"><h5>Facebook</h5></div>-->
<!--                        </div>-->
<!--                        <div class="row align-items-center">-->
<!--                            <div class="col-2">-->
<!--                                <a href="https://twitter.com/nscricket" target="_blank" class="mr-2 mb-3 text-white fs-2" role="button"><i class="fab fa-twitter"></i></a>-->
<!--                            </div>-->
<!--                            <div class="col"><h5>Twitter</h5></div>-->
<!--                        </div>-->
<!--                        <div class="row align-items-center">-->
<!--                            <div class="col-2">-->
<!--                                <a href="mailto:testadmin@cricketnovascotia.ca" class="mr-2 mb-3 text-white fs-2" role="button"><i class="fas fa-envelope"></i></a>-->
<!--                            </div>-->
<!--                            <div class="col"><h5>Email</h5></div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <header class="bg-dark py-5">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bolder text-white mb-2">Cricket Nova Scotia</h1>
                        <p class="lead fw-normal text-white-50 mb-4">Welcome to the official Nova Scotia Cricket Association website. Here you can stay updated on upcoming matches, events and other important bulletins. New members, whether you are a player or a fan of the game, are always welcome</p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-primary btn-lg px-4 me-sm-3" href="/register">Sign up</a>
                            <a class="btn btn-outline-light btn-lg px-4" href="/about">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="<?php base_url('assets/images/General/logo1.png') ?>" alt="..." /></div>
            </div>
        </div>
    </header>

    <!-- News preview section-->
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="text-center">
                        <h2 class="fw-bolder">News</h2>
                        <p class="lead fw-normal text-muted mb-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque fugit ratione dicta mollitia. Officiis ad.</p>
                    </div>
                </div>
            </div>
            <div class="row gx-5">
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <img class="card-img-top" src="https://dummyimage.com/600x350/ced4da/6c757d" alt="..." />
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                            <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3">Blog post title</h5></a>
                            <p class="card-text mb-0">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                    <div class="small">
                                        <div class="fw-bold">Kelly Rowan</div>
                                        <div class="text-muted">March 12, 2023 &middot; 6 min read</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <img class="card-img-top" src="https://dummyimage.com/600x350/adb5bd/495057" alt="..." />
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">Media</div>
                            <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3">Another blog post title</h5></a>
                            <p class="card-text mb-0">This text is a bit longer to illustrate the adaptive height of each card. Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                    <div class="small">
                                        <div class="fw-bold">Josiah Barclay</div>
                                        <div class="text-muted">March 23, 2023 &middot; 4 min read</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">
                        <img class="card-img-top" src="https://dummyimage.com/600x350/6c757d/343a40" alt="..." />
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                            <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3">The last blog post title is a little bit longer than the others</h5></a>
                            <p class="card-text mb-0">Some more quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                    <div class="small">
                                        <div class="fw-bold">Evelyn Martinez</div>
                                        <div class="text-muted">April 2, 2023 &middot; 10 min read</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Call to action-->
            <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5">
                <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                    <div class="mb-4 mb-xl-0">
                        <div class="fs-3 fw-bold text-white">Provincial Team</div>
                        <div class="text-white-50">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
                            <br> Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec.</div>
                    </div>
                    <div class="ms-xl-4">
                        <div class="input-group mb-2">
                            <button class="btn btn-outline-light" id="button-newsletter" type="button">Find out More</button>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </section>

<?= $this->endSection() ?>