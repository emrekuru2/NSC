<?= $this->extend('layouts/default') ?>

<?= $this->section('mainContent') ?>

<!-- Modal -->
<div class="modal fade" id="teamsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <section class="dark-grey-text text-center">
        <h1 class="display-3 text-center font-weight-bold">Teams</h1>
        <br>

        <div class="row">
            <?php if (! empty($teams) && is_array($teams)) : ?>
                <?php foreach ($teams as $team) : ?>
                    <div class="col-md w-50 p-3 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" src="<?=base_url($team->image)?>" alt="Team Image"/>
                            <div class="card-body p-4">
                                <input type="hidden" name="team-json" value='{"tName":"<?=$team->name?>", "description":"<?= $team->description == null || $team->description == '' ? 'N/A' : $team->description ?>"}'>
                                <button type="button" name="team-button" id="<?=$team->id?>" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#teamsModal"><?=$team->name?></button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

    </section>
</div>

<script type="text/javascript" src="<?= base_url('assets/js/teams.js'); ?>"></script>

<?= $this->endSection() ?>