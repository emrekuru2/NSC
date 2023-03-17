<?php

use CodeIgniter\I18n\Time;
?>

<?= $this->extend('layouts/default') ?>

<?= $this->section('mainContent') ?>
<div class="container my-3">
<<<<<<< HEAD
    <h2 class="text-center">Development Programs</h2>
    <hr>
    <?php if (!empty($programs) && is_array($programs)) : ?>
        <?php foreach ($programs as $program) : ?>
            <div class="card my-3">
                <div class="card-header d-flex">
                    <?= esc($program->name) ?>
=======
        <h2 class="text-center">Development Programs</h2>
        <hr>
        <?php if (!empty($programs) && is_array($programs)) : ?>
            <?php foreach ($programs as $program) : ?>
                <?php if ($program->start_date < Time::now()):?>
                <div class="card my-3">
                    <div class="card-header d-flex">
                        <?= esc($program->name) ?> 

                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p><b>General Information</b></p>
                                <p><b>Days</b>: <?= esc($program->daysRun) ?></p>
                                <p><b>Dates:</b> <?= date('m/d/y',strtotime(esc($program->start_date))) ?>-<?= date('m/d/y',strtotime(esc($program->end_date)))?></p>
                                <p><b>Time:</b> <?= date('H:m', strtotime(esc($program->start_time))) ?>-<?= date('H:m', strtotime(esc($program->end_time)))?></p>
                                <p><b>Ages:</b> <?= esc($program->min_age) ?>-<?= esc($program->max_age) ?></p>
                                <p><b>Location:</b> <?= esc($program->location) ?></p>
                                <p><b>Cost:</b> $<?= esc($program->price) ?></p>
                                
                            </div>
                            <img src="<?php echo base_url(".".$program->image);?>"></img>
                        </div>
                        <hr>
                        <p><b>Description:</b></p>
                        <p><?= esc($program->description) ?></p>
                        
                        <?php if ((auth()->loggedIn()) && esc($program->is_registered) == 0):?>
                            <a href="/development/<?=esc($program->id)?>" class="btn btn-primary">Register</a>
                        <?php elseif ((auth()->loggedIn()) && esc($program->is_registered) == 1):?>
                            <a class="btn btn-secondary">Already registered</a>
                        <?php else: ?>
                            <a href="/login" class="btn btn-primary">Login to Register</a>
                        <?php endif ?>
                    <?php endif ?>

                    </div>
>>>>>>> c9db877 (disabled the option for double registeration for dev programs)

                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p><b>General Information</b></p>
                            <p><b>Days</b>: <?= esc($program->daysRun) ?></p>
                            <p><b>Dates:</b> <?= date('m/d/y', strtotime(esc($program->start_date))) ?>-<?= date('m/d/y', strtotime(esc($program->end_date))) ?></p>
                            <p><b>Time:</b> <?= date('H:m', strtotime(esc($program->start_time))) ?>-<?= date('H:m', strtotime(esc($program->end_time))) ?></p>
                            <p><b>Ages:</b> <?= esc($program->min_age) ?>-<?= esc($program->max_age) ?></p>
                            <p><b>Location:</b> <?= esc($program->location) ?></p>
                            <p><b>Cost:</b> $<?= esc($program->price) ?></p>

                        </div>
                        <img src="<?= esc($program->image) ?>" style="width:400px; height: 250px;" ></img>
                    </div>
                    <hr>
                    <p><b>Description:</b></p>
                    <p><?= esc($program->description) ?></p>

                    <?php if (auth()->loggedIn()) : ?>
                        <a href="/development/<?= esc($program->id) ?>" class="btn btn-primary">Register</a>

                    <?php else : ?>
                        <a href="/login" class="btn btn-primary">Login to Register</a>
                    <?php endif ?>
                </div>
            </div>
        <?php endforeach ?>
    <?php else : ?>
        <h3>No Programs</h3>
        <p>Unable to find any programs for you.</p>
    <?php endif ?>
</div>

<?= $this->endSection() ?>