<?= $this->extend('layouts/default') ?>

<?= $this->section('mainContent') ?>

<div class="container my-5">


        <!-- Section: Block Content -->
        <section class="dark-grey-text text-center">

            <h1 class="display-3 text-center font-weight-bold">Teams</h3>
            <br>

            <!-- Grid row -->
            <div class="row">
                <?php if (!empty($teams) && is_array($teams)) : ?>
                    <?php foreach ($teams as $team) : ?>
                        <!-- Grid column -->
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top" src="<?=base_url($team->image)?>" alt="..." />
                                <div class="card-body p-4">
                                    <a class="text-decoration-none link-dark stretched-link"><h5 class="fw-bolder"><?=$team->name?></h5></a>
                                    <h2 class="lead fw-normal text-muted mb-0"><?=$team->description?></h2>
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