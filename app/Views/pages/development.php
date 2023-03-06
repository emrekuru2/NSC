<?= $this->extend('layouts/default') ?>

<?= $this->section('mainContent') ?>
<div class="container my-3">
        <h2 class="text-center">Development Programs</h2>
        <hr>
        <?php if (!empty($programs) && is_array($programs)) : ?>
            <?php foreach ($programs as $program) : ?>
                <div class="card my-3">
                    <div class="card-header d-flex">
                        <?= esc($program->name) ?> 

                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p><b>General Information</b></p>
                                <p><b>Duration:</b> <?= esc($program->time) ?></p>
                                <p><b>Days:</b> <?= esc($program->daysRun) ?></p>
                                <p><b>Time:</b> <?= esc($program->time) ?></p>
                                <p><b>Price:</b> <?= esc($program->charges) ?></p>
                                <p><b>Location:</b> Halifax</p>
                                <p><b>Start Date:</b></p>
                            </div>
                            <img src="<?php echo base_url(".".$program->image);?>"></img>
                        </div>
                        <hr>
                        <p><b>Description:</b></p>
                        <p><?= esc($program->description) ?></p>
                        
                        <?php if (auth()->loggedIn()): ?>
                            <a href="/development/<?=esc($program->id)?>" class="btn btn-primary">Register</a>

                        <?php else: ?>
                            <a href="/login" class="btn btn-primary">Login to Register</a>
                        <?php endif ?>


                    </div>

                </div>
            <?php endforeach ?>
        <?php else : ?>
            <h3>No News</h3>
            <p>Unable to find any news for you.</p>
        <?php endif ?>
    </div>

<?= $this->endSection() ?>