<?= $this->extend('layouts/default') ?>

<?= $this->section('mainContent') ?>
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
            <?php if (!empty($news) && is_array($news)) : ?>
                <?php foreach ($news as $news_item) : ?>
                <?php
                    $html_string = $news_item->content;
                    $dom = new DOMDocument();
                    $dom->loadHTML($html_string);

                    // Extract the contents of each element
                    $h4_content = $dom->getElementsByTagName('h4')->item(0)->nodeValue;
                    $code_content = $dom->getElementsByTagName('code')->item(0)->nodeValue;
                    $img_src = $dom->getElementsByTagName('img')->item(0)->getAttribute('src');
                ?>
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0 d-flex align-items-center">
                        <img class="card-img-top" src="<?= $img_src; ?>" alt="..." />
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                            <h4 class="card-title mb-3"><?= $h4_content ?></h4>
                            <p class="card-text mb-0"><?= $code_content ?></p>
                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                        <a href="news/<?= esc($news_item->id)?>" class="btn btn-primary btn-block">Find out more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            <?php endif ?>

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
                            <button class="btn btn-outline-light" id="button-newsletter" type="button">Find out more</button>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </section>

<?= $this->endSection() ?>