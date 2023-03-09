<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
<div class="row">
    <div class="col-lg-4">
        <div class="row-lg">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header">Create Program Type</div>
                    <div class="card-body">
                    <form method="get" action="createProgType">
                    <div class="w-100 mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="title" name="name">
                    </div>                        
                    <div class="w-50 mb-3">
                            <label for="min_age" class="form-label">Minimum age:</label>
                            <input type="number" class="form-control" id="min_age" name="min_age">
                    </div>
                    <div class="w-50 mb-3">
                            <label for="max_age" class="form-label">Maximum age:</label>
                            <input type="number" class="form-control" id="max_age" name="max_age">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Publish</button>
                </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header">Programs</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Dates</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php if (!empty($programs) && is_array($programs)) : ?>
                                    <?php foreach ($programs as $program) : ?>
                                        <tr>
                                            <td><?= esc($program->id) ?></td>
                                            <td><?= esc($program->name) ?></td>
                                            <td><?= date('m/d/y',strtotime(esc($program->start_date))) ?>-<?= date('m/d/y',strtotime(esc($program->end_date)))?></td>
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
            <div class="card-header"><b>Create Program</b></div>
            <div class="card-body">
            <form method="post" action="createDev">
                    <div class="w-100 mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="title" name="name">
                    </div>
                        <div>
                            <div class="w-25">
                                <label for="start_time" class="form-label">Start time:</label>
                                <input type="time" class="form-control" id="start_time" name="start_time">
                            </div>
                            <div class="w-25">
                                <label for="end_time" class="form-label">End time:</label>
                                <input type="time" class="form-control" id="end_time" name="end_time">
                            </div>
                        </div>
                        <div>
                            <div class="w-25">
                                <label for="start_date" class="form-label">Start date:</label>
                                <input type="date" class="form-control" id="start_date" name="start_date">
                            </div>
                            <div class="w-25">
                                <label for="end_date" class="form-label">End date:</label>
                                <input type="date" class="form-control" id="end_date" name="end_date">
                            </div>
                        </div>
                        <div class="w-25 mb-3">
                            <label for="price" class="form-label">Price:</label>
                            <input type="number" class="form-control" id="price" name="price">
                        </div>
                        <div class="w-100">
                            <label for="days[]" class="form-label">Days running:</label>
                            <select name="days[]" id="days[]" name="days[]" multiple="multiple">
                            <option value="Sunday">Sunday</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                        </select>
                        </div>
                        <div class="w-100">
                            <label for="devType" class="form-label">Program Type:</label>
                            <select name="devType" id="devType" name="devType">
                            <?php if (!empty($devTypes) && is_array($devTypes)) : ?>
                                    <?php foreach ($devTypes as $devType) : ?>
                                        <option value=<?=esc($devType->id)?>>
                                            <?= esc($devType->name)?>
                                        </option>
                                    <?php endforeach ?>
                                <?php endif ?>
                        </select>
                        </div>
                        
                    <div class="w-100">
                        <label for="location" class="form-label">Location:</label>
                        <input type="text" class="form-control" id="location" name="location">
                    </div>
                    <div class="w-100 mb-3">
                        <label for="description" class="form-label">Program description</label>
                        <textarea class="form-control" id="description" rows="10" name="description""></textarea>
                    </div>
                    <div class="w-50 mb-3">
                        <label for="image" class="form-label">Image:</label>
                        <input type="file" accept=".png, .jpeg, .jpg" class="form-control" id="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary w-25">Publish</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    new MultiSelectTag('days[]')  // id
</script>  


<?= $this->endSection() ?>