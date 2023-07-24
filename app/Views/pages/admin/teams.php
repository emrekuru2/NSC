<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

<div class="row g-3">
    <!-- All teams List -->
    <div class="col-lg-5">
        <div class="row-lg">
            <div class="col-lg-12 mb-3">
                <div class="card shadow">
                    <div class="card-header d-flex align-items-center">
                        <span class="flex-grow-1"><i class="fa-solid fa-list"></i> teams List</span>
                        <?= view_cell('SearchCell', ['data' => $teams, 'fields' => ['name'], 'type' => 'teams']) ?>
                    </div>
                    <div class="card-body p-0">

                        <?php if (!empty($teams)): ?>
                            <table class="table table-hover table-striped align-middle table-bordered display"
                                style="margin: 0 !important;">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col" class="px-3">Name</th>
                                        <th scope="col">Teams</th>
                                        <th scope="col">Club</th>
                                        <th scope="col" class="no-sorting col-1 text-center px-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($teams as $team): ?>
                                        <tr <?= isset($currentTeam) ? (($currentTeam->name === $team->name) ? 'class="table-success"' : null) : null ?>>
                                            <td class="px-3"><a class="text-decoration-none"
                                                    href="<?= url_to('admin_read_team', $team->name) ?>"><b>
                                                        <?= $team->name ?>
                                                    </b></a></td>
                                            <td>
                                                <?= $team->description ?>
                                            </td>
                                            <td>
                                                <?php foreach ($clubs as $club): ?>
                                                    <?php if ($team->clubID == $club->id): ?>
                                                        <?= $club->name ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </td>
                                            <td class="text-center px-3">
                                                <div class="btn-group dropend">
                                                    <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa-solid fa-ellipsis"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><span class="dropdown-item text-danger" role="button"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="<?= '#delete' . $team->id ?>"><i
                                                                    class="fa-solid fa-trash"></i> Delete</span></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <?= view_cell('ModalCell', ['type' => 'prompt', 'content' => 'Are you sure you want to delete ' . $team->name, 'id' => 'delete' . $team->id, "action" => url_to('admin_delete_team', $team->id)]) ?>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <h4 class="text-muted text-center p-2">There are no teams to show</h4>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- View team -->
    <div class="col col-lg-7" id="view-team-card">
        <div class="card shadow">
            <div class="card-header d-flex align-items-center">
                <?php if (isset($currentTeam)): ?>
                    <span class="flex-grow-1"><i class="fa-solid fa-circle-info"></i> Team Details</span>
                    <div class="form-check form-switch mx-4">
                        <input class="form-check-input" type="checkbox" role="button" id="editSwitch">
                        <label class="form-check-label" for="editSwitch"><i class="fa-regular fa-pen-to-square"></i> Edit
                            mode</label>
                    </div>
                    <?= anchor(url_to('admin_teams'), '<i class="fa-solid fa-broom"></i> Clear', ['role' => 'button', 'class' => 'btn btn-primary']) ?>
                <?php else: ?>
                    <span class="flex-grow-1"><i class="fa-solid fa-pen-ruler"></i> Create team</span>
                <?php endif ?>
            </div>
            <div class="card-body">
                <?= form_open_multipart(isset($currentTeam) ? url_to('admin_update_team', $currentTeam->id) : url_to('admin_create_team'), ['class' => 'row g-3 justify-content-center', 'id' => 'edit_form']) ?>
                <?php if (isset($currentTeam)): ?>
                    <img src="<?= base_url($currentTeam->image) ?? base_url('assets/images/teams/default.png') ?>"
                        class="card-img-top " style="width: 150px; height: 150px" alt="team_image">
                    <h4 class="card-title text-bold text-center text-muted">
                        <?= $currentTeam->name ?? 'Select team' ?>
                    </h4>
                    <div class="divider"></div>
                <?php endif ?>
                <!-- Edit Logo -->
                <div class="col-md-12">
                    <label class="form-label" for="image">Logo</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <!-- Edit Name -->
                <div class="col-md-12">
                    <label class="form-label" for="team_name">Name <i
                            class="fa-solid fa-asterisk text-danger"></i></label>
                    <input type="text" maxlength="64" class="form-control" name="name"
                        value="<?= $currentTeam->name ?? null ?>" required>
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="description">Description <i
                            class="fa-solid fa-asterisk text-danger"></i></label>
                    <textarea maxlength="512" class="form-control" name="description" rows="12" style="resize: auto;"
                        required><?= $currentTeam->description ?? null ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-50">
                    <?= isset($currentTeam) ? 'Update team' : 'Create team' ?>
                </button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<?= script_tag(['src' => base_url('assets/js/admin/editMode.js'), 'isset' => isset($currentTeam), 'parent' => 'edit_form']) ?>
<?= $this->endSection() ?>