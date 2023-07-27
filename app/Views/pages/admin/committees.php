<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

<div class="row g-4">
    <!-- All Committees -->
    <div class="col-lg-5">
        <div class="row-lg">
        <div class="col-lg-12 mb-3">
                <div class="card shadow">
                    <div class="card-header d-flex align-items-center">
                        <span class="flex-grow-1"><i class="fa-solid fa-list"></i> Committee List</span>
                        <?= view_cell('SearchCell', ['data' => $committees, 'fields' => ['name'], 'type' => 'committees']) ?>
                    </div>
                    <div class="card-body p-0">
                        <?php if (!empty($committees)) : ?>
                            <table class="table table-hover table-striped align-middle table-bordered display" style="margin: 0 !important;">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col" class="px-3">Name</th>
                                        <th scope="col" class="no-sorting col-1 text-center px-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($committees as $committee) : ?>
                                        <tr <?= isset($currentCommittee) ? (($currentCommittee->name === $committee->name) ? 'class="table-success"' : null) : null ?>>
                                            <td class="px-3"><a class="text-decoration-none" href="<?= url_to('admin_read_committee', $committee->name) ?>"><b><?= $committee->name ?></b></a></td>
                                            <td class="text-center px-3">
                                                <div class="btn-group dropend">
                                                    <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa-solid fa-ellipsis"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><span class="dropdown-item text-danger" role="button" data-bs-toggle="modal" data-bs-target="<?= '#delete' . $committee->id  ?>"><i class="fa-solid fa-trash"></i> Delete</span></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <?= view_cell('ModalCell',  ['type' => 'prompt', 'content' => 'Are you sure you want to delete ' . $committee->name, 'id' => 'delete' . $committee->id, "action" => url_to('admin_delete_committee', $committee->id)]) ?>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <h4 class="text-muted text-center p-2">There are no committees to show</h4>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col col-lg-7" id="view-committee-card">
        <div class="card shadow">
            <div class="card-header d-flex align-items-center">
                <?php if (isset($currentCommittee)) : ?>
                    <span class="flex-grow-1"><i class="fa-solid fa-circle-info"></i> Committee Details</span>
                    <div class="form-check form-switch mx-4">
                        <input class="form-check-input" type="checkbox" role="button" id="editSwitch">
                        <label class="form-check-label" for="editSwitch"><i class="fa-regular fa-pen-to-square"></i> Edit mode</label>
                    </div>
                    <?= anchor(url_to('admin_committees'), '<i class="fa-solid fa-broom"></i> Clear', ['role' => 'button', 'class' => 'btn btn-primary']) ?>
                <?php else : ?>
                    <span class="flex-grow-1"><i class="fa-solid fa-pen-ruler"></i> Create Committee</span>
                <?php endif ?>
            </div>
            <div class="card-body">
                <?= form_open_multipart(isset($currentCommittee) ? url_to('admin_update_committee', $currentCommittee->id) : url_to('admin_create_committee'), ['class' => 'row g-3 justify-content-center', 'id' => 'edit_form']) ?>
                    <?php if (isset($currentCommittee)) : ?>
                    <img src="<?= base_url($currentCommittee->image) ?? base_url('assets/images/Committee/default.png') ?>" class="card-img-top " style="width: 150px; height: 150px" alt="committee_image">
                    <h4 class="card-title text-bold text-center text-muted"><?= $currentCommittee->name ?? 'Select Committee' ?></h4>
                    <div class="divider"></div>
                <?php endif ?>
                <!-- Edit Name -->
                <div class="col-12">
                    <label class="form-label" for="committee_name">Name <i class="fa-solid fa-asterisk text-danger"></i></label>
                    <input type="text" maxlength="64" class="form-control" name="name" value="<?= $currentCommittee->name ?? null ?>" required>
                </div>
                        <div class="col-12 col-lg-6">
                            <label for="startyear" class="form-label">Start Year <i class="fa-solid fa-asterisk text-danger"></i></label>
                            <input type="number" class="form-control" id="startyear" name="startyear" value="<?= $currentCommittee->start_date ?? null ?>" required>
                        </div>

                        <div class="col-12 col-lg-6" id="endyeardiv">
                            <div class="startyear">
                                <label for="endyear" class="form-label">End Year <i class="fa-solid fa-asterisk text-danger"></i></label>
                            </div>
                            <input type="number" class="form-control" id="endyear" name="endyear" value="<?= $currentCommittee->end_date ?? null ?>">
                            <div class="mt-1">
                            <input class="form-check-input" type="checkbox" value="1" data-status="open" id="flexCheckDefault" name="present"  <?= empty($currentCommittee->end_date) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="flexCheckDefault">Present</label>
                            </div>
                        </div>
                        <!-- Edit Description -->
                        <div class="col-12 mt-0">
                            <label class="form-label" for="description">Description <i class="fa-solid fa-asterisk text-danger"></i></label>
                            <textarea maxlength="512" class="form-control" name="description" rows="15" style="resize: none;" required><?= $currentCommittee->description ?? null ?></textarea>
                        </div>
                        <div class="col-12 col-lg-12">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" accept=".png, .jpeg, .jpg" class="form-control" id="image" name="image">
                        </div>
                <button type="submit" class="btn btn-primary w-50"><?= isset($currentCommittee) ? 'Update Committee' : 'Create Committee' ?></button>
                <?= form_close() ?>
            </div>
        </div>
    </div>   
</div>

<?= script_tag(['src' => base_url('assets/js/admin/editMode.js'), 'isset' => isset($currentCommitte), 'parent' => 'edit_form']) ?>

<?= $this->endSection() ?>

