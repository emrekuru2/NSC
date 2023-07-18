<?= $this->extend('layouts/default') ?>

<?= $this->section('mainContent') ?>

<div class="container my-5">
  <!-- Section: Block Content -->
  <section class="dark-grey-text text-center">
    <h1 class="display-3 text-center font-weight-bold">Development Programs</h1>
    <!-- Grid row -->
    <div class="row">
      <?php if (!empty($programs) && is_array($programs)) : ?>
        <?php foreach ($programs as $program) : ?>
          <!-- Grid column -->
          <div class="col-md-6 mb-4">
            <div class="view overlay rounded">
              <a href="#" class="view-program" data-program="<?= $program->id ?>">
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
            <img src="<?= base_url('assets/images/Dev/default.png') ?>" class="img-thumbnail rounded" style="width: 235px; height: 235px;">
            <div class="px-3 pt-3 mx-1 mt-1 pb-0">
              <h4 class="font-weight-bold mb-3"><?= esc($program->name) ?></h4>
              <button type="button" class="btn btn-primary view-program" data-bs-toggle="modal" data-bs-target="<?= '#' . $program->id ?>">View</button>
            </div>
          </div>
          <!-- Grid column -->
          <?= view_cell('ModalCell', ['type' => 'dev', 'id' => $program->id, 'program' => $program]) ?>
        <?php endforeach; ?>
      <?php else : ?>
        <div class="col text-center">
          <h3>No Programs</h3>
          <p>Unable to find any programs for you.</p>
        </div>
      <?php endif; ?>
    </div>
  </section>
  <!-- Section: Block Content -->
</div>

<?= $this->endSection() ?>