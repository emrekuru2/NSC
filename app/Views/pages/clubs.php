<?= $this->extend('layouts/default') ?>

<?= $this->section('mainContent') ?>

<div class="container my-5">


        <!-- Section: Block Content -->
        <section class="dark-grey-text text-center">

            <h1 class="display-3 text-center font-weight-bold">Clubs</h1>
            <br>

            <!-- Grid row -->
            <div class="row">
                <?php if (!empty($clubs) && is_array($clubs)) : ?>
                    <?php foreach ($clubs as $club) : ?>
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" src="<?=base_url("/assets/images/Clubs/default.png")?>" alt="..." />
                            <div class="card-body p-4">
                                <button class="text-decoration-none link-dark stretched-link" data-toggle="modal" data-target="#exampleModalCenter"></button>
                                <h2 class="lead fw-normal text-muted mb-0"><?=$club->name?></h2>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                
                                </div>
                            </div>
                        </div>
                    </div>

                        <!-- Grid column -->
                    <?php endforeach; ?>
                    <!-- Modal pop up-->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
            </div>
                <?php endif; ?>
        

            </div>

        </section>
        <!-- Section: Block Content -->


    </div>


<?= $this->endSection() ?>