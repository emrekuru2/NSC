<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

<div class="row">
    <div class="col-lg-4">
        <div class="row-lg">
            <div class="col-lg-12">
            </div>
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header">DevelopmentTypes List</div>
                    <div class="card-body">
                        <ul class="list-group w-100">
                            <?php if ($devType) : ?>
                                <?php foreach ($devType as $row) : ?>
                                    <li class="list-group-item">
                                        <div class="form-check d-flex align-items-center">
                                            <label class="form-check-label mx-1 flex-grow-1" for="<?= $row->id ?>"><?= $row->name ?></label>
                                            <div class="">
                                                <a class="btn btn-primary" href=<?= url_to('admin_edit_development_type', $row->id) ?> role="button">Edit</a>
                                                <a class="btn btn-primary btn-danger btn-sm" href="<?= url_to('admin_delete_development_type', $row->id) ?>" role="button" data-bs-toggle="modal" data-bs-target="<?= '#delete_devType' . $row->id  ?>">Delete</a>
                                            </div>
                                        </div>
                                    </li>
                                    <?= view_cell('ModalCell',  ['type' => 'prompt', 'content' => 'Are you sure you want to remove ' . $row->name, 'id' => 'delete_devType' . $row->id,  "action" => url_to('admin_delete_development_type', $row->id)]) ?>
                                <?php endforeach ?>
                            <?php else : ?>
                            <?php endif ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="card shadow">
            <div class="card-header d-flex">
                <span class="flex-grow-1">Development Type Details</span>
                <?php if (isset($editMode)) : ?>
                    <a href=<?= url_to('admin_development_types') ?> role="button">Return back</a>
                <?php endif ?>
            </div>
            <div class="card-body">
                <form class="d-flex flex-column align-items-center" method="post" action="<?= $editMode ? url_to('admin_update_development_type', $currentDev->id) : url_to('admin_create_development_type') ?>">
                    <div class="w-100 mb-3">
                        <label for="title" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="title" value="<?= $editMode ? $currentDev->name : null ?>" required>
                    </div>
                    <div class="w-100 mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="des" name="description" rows="10" required><?= $editMode ? $currentDev->description : null ?></textarea>
                    </div>
                    <div class="w-100 mb-3">
                        <label for="minAge" class="form-label">Minimum Age</label>
                        <input type="number" class="form-control" name="min_age" id="minAge" value="<?= $editMode ? $currentDev->min_age : null ?>" required>
                    </div>
                    <div class="w-100 mb-3">
                        <label for="maxAge" class="form-label">Maximum Age</label>
                        <input type="number" class="form-control" name="max_age" id="maxAge" value="<?= $editMode ? $currentDev->max_age : null ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-50"><?= $editMode ? "Update" : "Create" ?> the development Type</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>