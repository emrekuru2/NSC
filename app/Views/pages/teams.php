<?= $this->extend('layouts/default') ?>

<?= $this->section('mainContent') ?>

<div class="container my-5">
    <section class="dark-grey-text text-center">
        <h1 class="display-3 text-center font-weight-bold">Teams</h1>
        <br>

        <div class="row">
            <?php if (! empty($teams) && is_array($teams)) : ?>
                <?php foreach ($teams as $team) : ?>
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" src="<?=base_url($team->image)?>" alt="Team Image"/>

                            <div class="card-body p-4">
<!--                                <a class="text-decoration-none link-dark stretched-link"><h5 class="fw-bolder">--><?php //=$team->name?><!--</h5></a>-->
                                <h5 class="text-decoration-none link-dark stretched-link"><?= $team->name ?></h5>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

    </section>
</div>

<?= $this->endSection() ?>