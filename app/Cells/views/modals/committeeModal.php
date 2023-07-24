<div id="<?= $id ?>" class="modal fade" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title" id="committeeDetailsModalLabel"><?= $committee->name ?></h5>
      </div>

      <!-- Modal Body -->
      <div class="modal-body text-start">
        <p><b>Details:</b></p>
        <p><?= $committee->description ?></p>
        <p><b>Members:</b></p>
        <p><?php foreach($committee->getMembers() as $member): ?>
                <li>
                    <?= $member->getFullName() ?>
                </li>
            <?php endforeach ?></p>
      </div>

      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
</div>
</div>
