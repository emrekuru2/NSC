<div class="accordion" id="accordion">

  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        General
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion">
      <div class="accordion-body">
        <ul class="list-group">
          <li class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="all-users" id="all-users">
            <label class="form-check-label" for="all-users">All registered users</label>
          </li>
          <li class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="all-clubs" id="all-clubs">
            <label class="form-check-label" for="all-clubs">All club players</label>
          </li>
          <li class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="all-programs" id="all-programs">
            <label class="form-check-label" for="all-programs">All development program users</label>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <?php foreach ($items as $key => $values) : ?>

    <div class="accordion-item">
      <h2 class="accordion-header" id="heading-<?= esc($key) ?>">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= esc($key) ?>" aria-expanded="false" aria-controls="collapse-<?= esc($key) ?>">
          <?= esc(ucfirst($key)) ?>
        </button>
      </h2>
      <div id="collapse-<?= esc($key) ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?= esc($key) ?>" data-bs-parent="#accordion">
        <div class="accordion-body">
          <ul class="list-group">
            <?= sizeof($values) == 0 ? '<p class="text-start margin-bottom-0">No clubs available.</p>' : null ?>
            <?php foreach ($values as $value) : ?>
              <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" data-group-name="<?= esc(substr($key, 0, -1)) ?>" value="<?= esc($value->id) ?>" id="<?= esc(substr($key, 0, -1) . '-' . $value->id) ?>">
                <label class="form-check-label" for="<?= esc(substr($key, 0, -1) . '-' . $value->id) ?>"><?= esc($value->name) ?></label>
              </li>
            <?php endforeach ?>
          </ul>
        </div>
      </div>
    </div>

  <?php endforeach ?>

</div>