<div id="<?= $id ?>" class="modal fade" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog text-light">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h1 class="modal-title fs-5 bg-dark" id="ModalLabel">Alert!</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bg-dark">
        <?= $content ?>
      </div>
      <div class="modal-footer bg-dark">
        <a href="<?= $action ?>" class="btn btn-secondary" role="button">Yes</a>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>