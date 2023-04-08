<?= $this->extend('layouts/default') ?>

<?= $this->section('mainContent') ?>

<!-- Modal -->
<div class="modal fade" id="clubsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-header"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-1">
                        <i class="fa-solid fa-newspaper" title="Description"></i>
                    </div>
                    <div class="col-11">
                        <span id="modal-description"></span>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-1">
                        <i class="fa-solid fa-envelope" title="Email"></i>
                    </div>
                    <div class="col-11">
                        <a id="modal-email" href=""></a>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-1">
                        <i class="fa-solid fa-globe" title="Website"></i>
                    </div>
                    <div class="col-11">
                        <a id="modal-site" href=""></a>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-1">
                        <i class="fa-solid fa-phone" title="Phone"></i>
                    </div>
                    <div class="col-11">
                        <span id="modal-phone"></span>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-1">
                        <i class="fa-brands fa-square-facebook" title="Facebook"></i>
                    </div>
                    <div class="col-11">
                        <a id="modal-fb" href="" title="Facebook"></a>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <section class="dark-grey-text text-center">
        <h1 class="display-3 text-center font-weight-bold">Clubs</h1>

        <br>

        <div class="row">
            <?php if (!empty($clubs) && is_array($clubs)) : ?>
                <?php foreach ($clubs as $club) : ?>
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" src="<?=base_url("/assets/images/Clubs/default.png")?>" alt="..." />
                            <div class="card-body p-4">
                                <input type="hidden" name="club-json" value='{"cName":"<?=$club->name?>", "email":"<?= $club->email == null || $club->email == '' ? 'N/A' : $club->email ?>", "description":"<?= $club->description == null || $club->description == '' ? 'N/A' : $club->description ?>", "website":"<?= $club->website == null || $club->website == '' ? 'N/A' : $club->website ?>", "phone":"<?= $club->phone == null || $club->phone == '' ? 'N/A' : $club->phone ?>", "facebook":"<?= $club->facebook == null || $club->facebook == '' ? 'N/A' : $club->facebook ?>"}'>
                                <button type="button" name="club-button" id="<?=$club->id?>" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#clubsModal"><?=$club->name?></button>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif; ?>
        </div>
    </section>
</div>

<script type="text/javascript" src="<?= base_url('assets/js/clubs.js'); ?>"></script>

<?= $this->endSection() ?>