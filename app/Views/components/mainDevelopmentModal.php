<div id="<?= $id ?>" class="modal fade" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title" id="programDetailsModalLabel"><?= $program->name ?></h5>
      </div>

      <!-- Modal Body -->
      <div class="modal-body text-start">
        <p><b>General Information</b></p>
        <p><b>Days:</b> <?= $program->daysRun ?></p>
        <p><b>Dates:</b> <?= $program->start_date ?> - <?= $program->end_date ?></p>
        <p><b>Time:</b> <?= $program->start_time ?> - <?= $program->end_time ?></p>
        <p><b>Ages:</b> <?= $program->min_age ?> - <?= $program->max_age ?></p>
        <p><b>Location:</b> <?= $program->location ?></p>
        <p><b>Cost:</b> $<?= $program->price ?></p>
        <p><b>Description:</b></p>
        <p><?= $program->description ?></p>
      </div>

      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <?php if (auth()->loggedIn()) : ?>
          <?php if ($program->is_registered == 0) : ?>
          <a href="/development/<?= esc($program->id) ?>" class="btn btn-primary">Register</a>
          <?php else : ?>
          <a class="btn btn-secondary">Already registered</a>
          <?php endif ?>
        <?php else : ?>
          <a href="<?= url_to('login')?>" class="btn btn-primary">Login to Register</a>
        <?php endif ?>

      </div>
    </div>
  </div>
</div>