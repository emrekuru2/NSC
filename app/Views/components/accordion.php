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
            <input class="form-check-input me-1" type="checkbox" value="all-programs" id="all-programs">
            <label class="form-check-label" for="all-programs">All programs users</label>
          </li>
          <li class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="all-clubs" id="all-clubs">
            <label class="form-check-label" for="all-clubs">All club players</label>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
         Clubs
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordion">
      <div class="accordion-body">
        <?php
          if (sizeof($clubs) == 0) {
            echo '<p class="text-start margin-bottom-0">No clubs available.</p>';
          }

          foreach ($clubs as $club): ?>
            <li class="list-group-item">
              <input class="form-check-input me-1" type="checkbox" value="club-<?= $club->id ?>" id="club-<?= $club->id ?>">
              <label class="form-check-label" for="club-<?= $club->id ?>"><?= $club->name ?></label>
            </li>
        <?php endforeach ?>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Teams
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion">
      <div class="accordion-body">
        <?php
          if (sizeof($teams) == 0) {
            echo '<p class="text-start margin-bottom-0">No teams available.</p>';
          }

          foreach ($teams as $team): ?>
            <li class="list-group-item">
              <input class="form-check-input me-1" type="checkbox" value="team-<?= $team->id ?>" id="team-<?= $team->id ?>">
              <label class="form-check-label" for="team-<?= $team->id ?>"><?= $team->name ?></label>
            </li>
        <?php endforeach ?>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
        Committees
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordion">
      <div class="accordion-body">
          <?php
            if (sizeof($committees) == 0) {
              echo '<p class="text-start margin-bottom-0">No committees available.</p>';
            }

            foreach ($committees as $committee): ?>
              <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="committee-<?= $committee->id ?>" id="committee-<?= $committee->id ?>">
                <label class="form-check-label" for="committee-<?= $committee->id ?>"><?= $committee->name ?></label>
              </li>
          <?php endforeach ?>

      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingFive">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
        Regions
      </button>
    </h2>
    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordion">
      <div class="accordion-body">
          <?php
            if (sizeof($regions) == 0) {
              echo '<p class="text-start margin-bottom-0">No regions available.</p>';
            }

            foreach ($regions as $region): ?>
              <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="region-<?= $region->id ?>" id="region-<?= $region->id ?>">
                <label class="form-check-label" for="region-<?= $region->id ?>"><?= $region->name ?></label>
              </li>
          <?php endforeach ?>

      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingSix">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
        Programs
      </button>
    </h2>
    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordion">
      <div class="accordion-body">
          <?php
            if (sizeof($devs) == 0) {
              echo '<p class="text-start margin-bottom-0">No development programs available.</p>';
            }

            foreach ($devs as $dev): ?>
              <li class="list-group-item">
                <input class="form-check-input me-1" type="checkbox" value="dev-<?= $dev->id ?>" id="dev-<?= $dev->id ?>">
                <label class="form-check-label" for="dev-<?= $dev->id ?>"><?= $dev->name ?></label>
              </li>
          <?php endforeach ?>
      </div>
    </div>
  </div>
</div>