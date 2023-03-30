<?= $this->extend('layouts/default') ?>

<?= $this->section('mainContent') ?>

<div class="container my-5">


        <!-- Section: Block Content -->
        <section class="dark-grey-text text-center">

            <h1 class="display-3 text-center font-weight-bold">Clubs</h1>

            <!-- Grid row -->
            <div class="row">
                <?php if (! empty($clubs) && is_array($clubs)) : ?>
                    <?php foreach ($clubs as $club) : ?>

                        <h2 class="display-7 mb-2 text-center font-weight-normal"><?=$club->name?></h2>
            <br>

            <div class="club-container">
                <img class="feature-img rounded-circle" src="<?=base_url('/assets/images/Clubs/default.png')?>"
                            alt="Sample image">

                <div class="club-info">
                    <div class="info-container">
                        <i class="fa-solid fa-envelope"></i>
                        <a href="Mailto:<?=$club->email?>">: <?=$club->email?></a>
                    </div>

                    <div class="info-container">
                        <i class="fa-solid fa-phone"></i>
                        <a href="tel:<?=$club->phone?>">: <?=$club->phone?></a>
                    </div>
                    <?php if($club->facebook !== null) {;
                    }?>
                    <div class="info-container">
                        <i class="fa-brands fa-facebook"></i>
                        <a href="<?=$club->facebook?>">: <?=$club->name?></a>
                    </div>
                </div>
            </div>

                        <!-- Grid column -->
                    <?php endforeach; ?>
                <?php endif; ?>


            </div>

        </section>
        <!-- Section: Block Content -->


    </div>


<?= $this->endSection() ?>