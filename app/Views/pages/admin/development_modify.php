<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete development program</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Are you sure you want to delete <?=$program->name?>?
      <form method="post" action="deleteProgram" id="delete">
                    <input type="hidden" value=<?=$program->id?> name="id">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="delete-button" id="delete-button" class="btn btn-danger">Delete Program</button>
      </div>
      </form>
    </div>
  </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
<div class="row">
    <div class="col-lg-4">
        <div class="row-lg">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header">Attendees</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php if (! empty($users) && is_array($users)) : ?>
                                    <?php foreach ($users as $user) : ?>
                                        <tr>
                                            <td><?= esc($user->first_name) ?> <?= esc($user->last_name) ?></td>
                                            <td><?= esc($user->email) ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card shadow">
            <div class="card-header">Modify program</div>
            <div class="card-body">
                <form method="post" action="modifyProgram">
                    <input type="hidden" value=<?=$program->id?> name="id">
                    <input type="hidden" value=<?=$program->image?> name="image">
                    <div class="row g-3 justify-content-center">
                        <div class="col-12">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="title" name="name" value='<?=$program->name?>' required>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="w-100">
                                <label for="start_time" class="form-label">Start time:</label>
                                <input type="time" class="form-control" id="start_time" name="start_time" value=<?=$program->start_time?> required>
                            </div>
                            <div class="w-100">
                                <label for="end_time" class="form-label">End time:</label>
                                <input type="time" class="form-control" id="end_time" name="end_time" value=<?=$program->end_time?> required>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="w-100">
                                <label for="start_date" class="form-label">Start date:</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" value=<?=$program->start_date?> required>
                            </div>
                            <div class="w-100">
                                <label for="end_date" class="form-label">End date:</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" value=<?=$program->end_date?> required>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="price" class="form-label">Price:</label>
                            <input type="number" class="form-control" id="price" name="price" value=<?=$program->price?> required>
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="days[]" class="form-label">Days running:</label>
                            <select id="days[]" name="days[]" multiple="multiple" required>
                                <?php foreach($days as $day) : ?>
                                    <!-- check if day is a substring of daysRun -->
                                    <?php if(strpos($program->daysRun, $day) !== false) : ?>
                                        <option value=<?= esc($day) ?> selected>
                                            <?= esc($day) ?>
                                        </option>
                                    <?php else : ?>
                                        <option value=<?= esc($day) ?>>
                                            <?= esc($day) ?>
                                        </option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="typeID" class="form-label">Program Type:</label>
                            <select name="typeID" id="typeID" name="typeID" required>
                                <?php if (! empty($devTypes) && is_array($devTypes)) : ?>
                                    <?php foreach ($devTypes as $devType) : ?>
                                        <option value=<?= esc($devType->id) ?>>
                                            <?= esc($devType->name) ?>
                                        </option>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
                        </div>

                        <div class="col-12 col-lg-6">
                            <label for="location" class="form-label">Location:</label>
                            <input type="text" class="form-control" id="location" name="location" value=<?=$program->location?> required>
                        </div>
                        <div class="col-12 col-lg-12">
                            <label for="description" class="form-label">Program description</label>
                            <textarea class="form-control" id="description" rows="10" name="description" required><?=$program->description?></textarea>
                        </div>
                        <div>

                        <div class="form-group margin-bottom-0">
                            <button type="submit" id="update-button" class="btn btn-primary">Update</button>
                        </div>
                        <hr class="divider">

                        </div>

                    </div>
                </form>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete Program</button>
                <hr class="divider">
                <a href="development" name="delete-button" id="delete-button" class="btn btn-warning">Back</a>
            </div>
        </div>
    </div>
</div>
<script>
    new MultiSelectTag('days[]') // id
</script>


<?= $this->endSection() ?>