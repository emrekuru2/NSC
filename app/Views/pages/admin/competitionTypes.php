<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

<div class="row g-4">
    <div class="col-lg-5">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header d-flex align-items-center">
                    <span class="flex-grow-1"><i class="fa-solid fa-list"></i> Competition Types List</span>
                    <?= view_cell('SearchCell', ['data' => $types, 'fields' => ['name'], 'type' => 'competition_types']) ?>
                </div>
                <div class="card-body p-0">
                    <?php if (!empty($types)) : ?>
                        <table class="table table-hover table-striped align-middle table-bordered display" style="margin: 0 !important;">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col" class="px-3">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col" class="no-sorting col-1 text-center px-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($types as $type) : ?>
                                    <tr <?= isset($currentType) ? (($currentType->name === $type->name) ? 'class="table-success"' : null) : null ?>>
                                        <td class="px-3"><a class="text-decoration-none" href="<?= url_to('admin_read_competition_type', $type->name) ?>"><b><?= $type->name ?></b></a></td>
                                        <td> <?= character_limiter($type->description, 20); ?></td>
                                        <td class="text-center px-3">
                                            <div class="btn-group dropend">
                                                <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><span class="dropdown-item text-danger" role="button" data-bs-toggle="modal" data-bs-target="<?= '#delete' . $type->id ?>"><i class="fa-solid fa-trash"></i> Delete</span></li>
                                                </ul>
                                            </div>
                                            <?= view_cell('ModalCell', ['type' => 'prompt', 'content' => 'Are you sure you want to delete ' . $type->title . ' ?', 'id' => 'delete' . $type->id, "action" => url_to('admin_delete_competition_type', $type->id)]) ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <h4 class="text-muted text-center p-2">There are no competition types to show</h4>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="card shadow">
            <div class="card-header d-flex align-items-center">
                <?php if (isset($currentType)) : ?>
                    <span class="flex-grow-1"><i class="fa-solid fa-circle-info"></i> Competition Type Details</span>
                    <div class="form-check form-switch mx-4">
                        <input class="form-check-input" type="checkbox" role="button" id="editSwitch">
                        <label class="form-check-label" for="editSwitch"><i class="fa-regular fa-pen-to-square"></i> Edit mode</label>
                    </div>
                    <a href="<?= url_to('admin_competition_types') ?>" role="button" class="btn btn-primary"><i class="fa-solid fa-broom"></i> Clear</a>
                <?php else : ?>
                    <span class="flex-grow-1"><i class="fa-solid fa-pen-ruler"></i> Create type</span>
                <?php endif ?>
            </div>
            <div class="card-body">
                <?= form_open(isset($currentType) ? url_to('admin_update_competition_type', $currentType->id) : url_to('admin_create_competition_type'), ['class' => 'd-flex flex-column align-items-center', 'id' => 'editForm']) ?>
                <div class="w-100 mb-3">
                    <label for="name" class="form-label">Name <i class="fa-solid fa-asterisk text-danger"></i></label>
                    <input type="text" class="form-control" name="name" id="name" value="<?= $currentType->name ?? '' ?>" required>
                </div>
                <div class="w-100 mb-3">
                    <label for="description" class="form-label">Description <i class="fa-solid fa-asterisk text-danger"></i></label>
                    <textarea class="form-control" style="resize: none;" name="description" id="desciption" rows="15" required><?= $currentType->description ?? '' ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-50"><?= isset($currentType) ? "Update" : "Create" ?> type</button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<?= script_tag(['src' => base_url('assets/js/admin/editMode.js'), 'isset' => isset($currentType), 'parent' => 'editForm']) ?>
<?= $this->endSection() ?>