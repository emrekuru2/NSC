<?= $this->extend('layouts/default') ?>

<?= $this->section('mainContent') ?>

<div class="container my-5">


        <!-- Section: Block Content -->
        <section class="dark-grey-text text-center">

            <h1 class="display-3 text-center font-weight-bold">Teams</h3>

            <!-- Grid row -->
            <div class="row">
                <?php if (!empty($teams) && is_array($teams)) : ?>
                    <?php foreach ($teams as $team) : ?>
                        <!-- Grid column -->
                        <div class="col-md-6 mb-4">

                            <div class="view overlay rounded">
                                <a>
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>

                            <div class="px-3 pt-3 mx-1 mt-1 pb-0">
                                <!-- image -->
                                <img src="<?= base_url($team->image) ?>" class="img-thumbnail  rounded w-25 h-25" alt="Team logo">
                                <h4 class="font-weight-bold mb-3"><?= esc($team->name) ?></h4>
                                <p><?= esc($team->description) ?></p>
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