<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

<div class="row g-4">
    <div class="col-lg-5">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header d-flex align-items-center">
                    <span class="flex-grow-1"><i class="fa-solid fa-list"></i> Competitions List</span>
                    <?= view_cell('SearchCell', ['data' => $competitions, 'fields' => ['name'], 'type' => 'competitions']) ?>
                </div>
                <div class="card-body p-0">
                    <?php if (!empty($competitions)) : ?>
                        <table class="table table-hover table-striped align-middle table-bordered display" style="margin: 0 !important;">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col" class="px-3">Name</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Year</th>
                                    <th scope="col" class="no-sorting col-1 text-center px-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($competitions as $competition) : ?>
                                    <tr <?= isset($currentComp) ? (($currentComp->name === $competition->name) ? 'class="table-success"' : null) : null ?>>
                                        <td class="px-3"><a class="text-decoration-none" href="<?= url_to('admin_read_competition', $competition->name) ?>"><b><?= $competition->name ?></b></a></td>
                                        <td><a class="text-decoration-none" href="<?= url_to('admin_read_competition_type', $competition->getType()->name) ?>"><b><?= $competition->getType()->name ?></b></a></td>
                                        <td> <?= character_limiter($competition->description, 20); ?></td>
                                        <td> <?= $competition->yearRunning ?></td>
                                        <td class="text-center px-3">
                                            <div class="btn-group dropend">
                                                <button competition="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><span class="dropdown-item text-danger" role="button" data-bs-toggle="modal" data-bs-target="<?= '#delete' . $competition->id ?>"><i class="fa-solid fa-trash"></i> Delete</span></li>
                                                </ul>
                                            </div>
                                            <?= view_cell('ModalCell', ['type' => 'prompt', 'content' => 'Are you sure you want to delete ' . $competition->title . ' ?', 'id' => 'delete' . $competition->id, "action" => url_to('admin_delete_competition', $competition->id)]) ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <h4 class="text-muted text-center p-2">There are no competitions to show</h4>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="card shadow">
            <div class="card-header d-flex align-items-center">
                <?php if (isset($currentComp)) : ?>
                    <span class="flex-grow-1"><i class="fa-solid fa-circle-info"></i> Competition Details</span>
                    <div class="form-check form-switch mx-4">
                        <input class="form-check-input" type="checkbox" role="button" id="editSwitch">
                        <label class="form-check-label" for="editSwitch"><i class="fa-regular fa-pen-to-square"></i> Edit mode</label>
                    </div>
                    <a href="<?= url_to('admin_competitions') ?>" role="button" class="btn btn-primary"><i class="fa-solid fa-broom"></i> Clear</a>
                <?php else : ?>
                    <span class="flex-grow-1"><i class="fa-solid fa-pen-ruler"></i> Create Competition</span>
                <?php endif ?>
            </div>
            <div class="card-body">
                <?= form_open(isset($currentComp) ? url_to('admin_update_competition', $currentComp->id) : url_to('admin_create_competition'), ['class' => 'row g-3 justify-content-center', 'id' => 'edit_Form']) ?>
                <div class="col-lg-6 col-12">
                    <div class="row g-3 justify-content-center">
                        <div class="col-12">
                            <label class="form-label" for="abbreviation">Name <i class="fa-solid fa-asterisk text-danger"></i></label>
                            <input type="text" class="form-control" name="name" value="<?= $currentComp->name ?? null ?>" required>
                        </div>
                        <div class="col-12">
                            <label for="inputType" class="form-label">Competition Type <i class="fa-solid fa-asterisk text-danger"></i></label>
                            <select id="dropdown" class="form-select" name="typeID" value="<?= isset($currentComp) ? $currentComp->getType()->id : null ?>" required>
                                <option value="" selected>Choose...</option>
                                <?php foreach ($compTypes as $compType) : ?>
                                    <option value="<?= $compType->id ?>"><?= $compType->name ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="phone">Year Running <i class="fa-solid fa-asterisk text-danger"></i></label>
                            <input type="number" class="form-control" name="yearRunning" value="<?= $currentComp->yearRunning ?? null ?>" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <label for="description" class="form-label">Description <i class="fa-solid fa-asterisk text-danger"></i></label>
                    <textarea class="form-control" style="resize: none;" name="description" id="desciption" rows="8" required><?= $currentComp->description ?? '' ?></textarea>
                </div>
                <button competition="submit" class="btn btn-primary w-50"><?= isset($currentComp) ? "Update" : "Create" ?> competition</button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<script type='text/javascript'>
    document.querySelector("#inputType").value = "<?= isset($currentComp) ? esc($currentComp->getType()->id) : null ?>"
</script>
<?= script_tag(['src' => base_url('assets/js/admin/editMode.js'), 'isset' => isset($currentComp), 'parent' => 'edit_Form']) ?>
<?= $this->endSection() ?>