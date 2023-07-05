<?php

use CodeIgniter\I18n\Time;

?>

<?= $this->extend('layouts/default') ?>

<?= $this->section('mainContent') ?>
<div class="container my-3">
<!--        <h2 class="text-center">Development Programs</h2>-->
        <br>
        <h1 class="display-3 text-center font-weight-bold">Development Programs</h1>
        <br>

        <style>
          
          .program-details {
            display: none;
          }

          .show-details {
            display: block;
          }
        </style>

<?php if (!empty($programs) && is_array($programs)) : ?>


<ul>

    <?php foreach ($programs as $program) : ?>

      <?php if ($program->start_date < Time::now()) : ?>

        <li class="program-item">

          <button class="program-button"><?= esc($program->name) ?></button>
          <div class="program-details">

            <p><b>General Information</b></p>
            <p><b>Days</b>: <?= esc($program->daysRun) ?></p>
            <p><b>Dates:</b> <?= date('m/d/y', strtotime(esc($program->start_date))) ?>-<?= date('m/d/y', strtotime(esc($program->end_date))) ?></p>
            <p><b>Time:</b> <?= date('H:m', strtotime(esc($program->start_time))) ?>-<?= date('H:m', strtotime(esc($program->end_time))) ?></p>
            <p><b>Ages:</b> <?= esc($program->min_age) ?>-<?= esc($program->max_age) ?></p>
            <p><b>Location:</b> <?= esc($program->location) ?></p>
            <p><b>Cost:</b> $<?= esc($program->price) ?></p>
            <p><b>Description:</b></p>
            <p><?= esc($program->description) ?></p>

            <?php if ((auth()->loggedIn()) && esc($program->is_registered) === 0) : ?>
              <a href="/development/<?= esc($program->id) ?>" class="btn btn-primary">Register</a>
            <?php elseif ((auth()->loggedIn()) && esc($program->is_registered) === 1) : ?>
              <a class="btn btn-secondary">Already registered</a>
            <?php else : ?>
              <a href="/login" class="btn btn-primary">Login to Register</a>
            <?php endif ?>

          </div>

        </li>

        <?php endif ?>
        <?php endforeach ?>
</ul>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var programButtons = document.querySelectorAll('.program-button');

      programButtons.forEach(function(button) {
        button.addEventListener('click', function() {
          var programDetails = this.nextElementSibling;
          programDetails.classList.toggle('show-details');
        });
      });
    });
  </script>


<?php else : ?>
  <h3>No Programs</h3>
  <p>Unable to find any programs for you.</p>
<?php endif ?>

</div>

<?= $this->endSection() ?>
