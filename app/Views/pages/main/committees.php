<?= $this->extend('layouts/default') ?>

<?= $this->section('mainContent') ?>

<div class="container my-5">


        <!-- Section: Block Content -->
        <section class="dark-grey-text text-center">
            <h1 class="display-3 text-center font-weight-bold">Committees</h1>

            <!-- Grid row -->
            <div class="row">
                <?php if (! empty($committees) && is_array($committees)) : ?>
                    <?php foreach ($committees as $committee) : ?>
                        <!-- Grid column -->
                        <div class="col-md-6 mb-4">

                            <div class="view overlay rounded">
                                <a>
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <img src=<?= esc($committee->image)?> class="img-thumbnail  rounded w-15% h-15%">
                            <div class="px-3 pt-3 mx-1 mt-1 pb-0">
                                <h4 class="font-weight-bold mb-3"><?= esc($committee->name) ?>(<?= esc($committee->years) ?>)</h4>
                                <p><?= esc($committee->description) ?></p>
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