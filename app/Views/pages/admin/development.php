<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>

<div class="row">
    <div class="col-lg-4">
        <div class="row-lg">

            <!-- Create Development -->
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header">Create Program Type</div>
                    <div class="card-body">
                        <form method="post" action="createProgType">
                            <div class="w-100 mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="w-100 mb-3">
                                <label for="min_age" class="form-label">Minimum age:</label>
                                <input type="number" class="form-control" id="min_age" name="min_age">
                            </div>
                            <div class="w-100 mb-3">
                                <label for="max_age" class="form-label">Maximum age:</label>
                                <input type="number" class="form-control" id="max_age" name="max_age">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Create</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header">Programs</div>
                    <div class="card-body">
                        <?= view_cell('\App\Libraries\Contents::search', ['route' => 'modify_development', 'name' => 'Program', 'array' => $programs, 'fields' => ['name'], 'method' =>  'post', 'useName' => true, 'useDivider' => true]) ?>


                        <table class="table table-striped">

                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Dates</th>
                                    <th scope="col">Edit</th>
                                </tr>
                            </thead>

                            <tbody class="table-group-divider">
                                <?php if (!empty($programs) && is_array($programs)) :
                                    foreach ($programs as $program) : ?>
                                        <tr>
                                            <td><?= esc($program->id) ?></td>
                                            <td><?= esc($program->name) ?></td>
                                            <td><?= date('m/d/y', strtotime(esc($program->start_date))) ?>-<?= date('m/d/y', strtotime(esc($program->end_date))) ?></td>
                                            <td><form method="post" action="modify_development">
                                                <input type="hidden" name="id" value="<?=esc($program->id)?>">
                                                <button class="btn btn-primary" type="submit">Edit</button>
                                            </form></td>
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
            <div class="card-header">Create Program</div>
            <div class="card-body">
                <form method="post" action="createDev" enctype="multipart/form-data">
                    <div class="row g-3 justify-content-center">
                        <div class="col-12">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="title" name="name" required>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="w-100">
                                <label for="start_time" class="form-label">Start time:</label>
                                <input type="time" class="form-control" id="start_time" name="start_time" required>
                            </div>
                            <div class="w-100">
                                <label for="end_time" class="form-label">End time:</label>
                                <input type="time" class="form-control" id="end_time" name="end_time" required>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="w-100">
                                <label for="start_date" class="form-label">Start date:</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" required>
                            </div>
                            <div class="w-100">
                                <label for="end_date" class="form-label">End date:</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" required>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="price" class="form-label">Price:</label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="days[]" class="form-label">Days running:</label>
                            <select name="days[]" id="days[]" name="days[]" multiple="multiple" required>
                                <option value="Sunday">Sunday</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                            </select>
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="typeID" class="form-label">Program Type:</label>
                            <select name="typeID" id="typeID"  required>
                                <?php if (!empty($devTypes) && is_array($devTypes)) : ?>
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
                            <input type="text" class="form-control" id="location" name="location" required>
                        </div>
                        <div class="col-12 col-lg-12">
                            <label for="description" class="form-label">Program description</label>
                            <textarea class="form-control" id="description" rows="10" name="description" required></textarea>
                        </div>
                        <div class="col-12 col-lg-12">
                            <label for="image" class="form-label">Image:</label>
                            <input type="file" accept=".png, .jpeg, .jpg" class="form-control" id="image" name="image">
                        </div>
                        <button type="submit" class="col-12 col-lg-6 btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    new MultiSelectTag('days[]') // id
</script>

<?= $this->endSection() ?>
