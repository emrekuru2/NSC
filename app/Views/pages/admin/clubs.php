<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

<div class="row g-3">
    <!-- All Clubs List -->
    <div class="col-lg-5">
        <div class="row-lg">
            <div class="col-lg-12 mb-3">
                <div class="card shadow">
                    <div class="card-header"><i class="fa-solid fa-list"></i> Clubs List</div>
                    <div class="card-body">
                        <?php if (!empty($clubs)) : ?>
                            <div class="d-flex w-100 justify-content-center mb-3">
                                <?= view_cell('\App\Libraries\Contents::search', ['array' => $clubs, 'fields' => ['name'], 'type' => 'clubs']) ?>
                            </div>
                            <?= form_open(url_to('admin_enable_alert'), ['class' => 'd-flex flex-column align-items-center']) ?>
                            <div class="border-round p-0 w-100">
                                <table class="table table-hover table-striped align-middle m-0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col" class="text-center">Teams</th>
                                            <th scope="col" class="text-center">Members</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($clubs as $club) : ?>
                                            <tr>
                                                <td><a href="<?= url_to('admin_read_club', $club->name) ?>"><?= $club->name ?></a></td>
                                                <td class="text-center"><?= count($club->getTeams()) ?> </td>
                                                <td class="text-center"><?= count($club->getMembers()) ?> </td>
                                                <td class="text-center">
                                                    <div class="btn-group dropend">
                                                        <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa-solid fa-ellipsis"></i>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><span class="dropdown-item text-danger" role="button" data-bs-toggle="modal" data-bs-target="<?= '#delete' . $club->id  ?>"><i class="fa-solid fa-trash"></i> Delete</span></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?= view_cell('\App\Libraries\Alerts::modal',  ['content' => 'Are you sure you want to delete ' . $club->name, 'id' => 'delete' . $club->id, "action" => url_to('admin_delete_club', $club->id)]) ?>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <?= form_close() ?>
                        <?php else : ?>
                            <h4 class="text-muted text-center">There are no clubs to show</h4>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <?php if (isset($currentClub)) : ?>
                <div class="col-lg-12">
                    <?php foreach (array('Teams' => $currentClub->getTeams(), 'Members' => $currentClub->getMembers()) as $key => $value) : ?>
                        <div class="card shadow mb-3">
                            <div class="card-header"><i class="fa-solid fa-list"></i> <?= $key ?> for <b><?= $currentClub->name ?></b></div>
                            <div class="card-body">
                                <div class="d-flex p-1">
                                    <label class="form-label flex-grow-1"><?= $key ?></label>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target=<?= "#add" . $key . "Modal" ?>><i class="fa-solid fa-plus"></i> Add <?= $key ?></button>
                                </div>
                                <?php if (empty($value)) : ?>
                                    <h4 class="text-muted">No <?= $key ?></h4>
                                <?php else : ?>
                                    <div class="border-round p-0">
                                        <table class="table table-hover table-striped align-middle m-0">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col" class="text-center"> <?= $key === 'Teams' ? 'Players' : 'Role' ?></th>
                                                    <?= $key === 'Members' ? '<th scope="col" class="text-center">Is Manager</th>' : null ?>
                                                    <th scope="col" class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($value as $item) : ?>
                                                    <tr>
                                                        <td><a href="<?= url_to($key === 'Teams' ? 'admin_read_team' : 'admin_read_user', $item->name) ?>"><?= $key === 'Teams' ? $item->name : $item->getName() ?></a></td>
                                                        <td class="text-center"><?= $key === 'Teams' ? count($value) : $item->getRole() ?></td>
                                                        <?= $key === 'Members' ? '<td class="text-center">' . $item->isManager() . '</td>' : null ?>
                                                        <td class="text-center">
                                                            <div class="btn-group dropend">
                                                                <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="fa-solid fa-ellipsis"></i>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li><span class="dropdown-item text-danger" role="button" data-bs-toggle="modal" data-bs-target="<?= '#delete_' . $key . $item->id  ?>"><i class="fa-solid fa-trash"></i> Delete</span></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?= view_cell('\App\Libraries\Alerts::modal',  ['content' => 'Are you sure you want to remove ' . $item->name . ' from ' . $currentClub->name, 'id' => 'delete_' . $key . $item->id,  "action" => url_to('admin_delete_club', $item->name)]) ?>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php endif ?>
                                <?= view_cell('\App\Libraries\Alerts::clubModal',  ['action' => url_to('admin_club_add_team'), 'type' => $key, 'id' => 'add' . $key . 'Modal', 'currentClub' => $currentClub]) ?>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
        </div>
    </div>
    <!-- View Club -->
    <div class="col col-lg-7" id="view-club-card">
        <div class="card shadow">
            <div class="card-header d-flex align-items-center">
                <?php if (isset($currentClub)) : ?>
                    <span class="flex-grow-1"><i class="fa-solid fa-circle-info"></i> Club Details</span>
                    <div class="form-check form-switch mx-4">
                        <input class="form-check-input" type="checkbox" role="button" id="editSwitch">
                        <label class="form-check-label" for="editSwitch"><i class="fa-regular fa-pen-to-square"></i> Edit mode</label>
                    </div>
                    <?= anchor(url_to('admin_clubs'), '<i class="fa-solid fa-broom"></i> Clear', ['role' => 'button', 'class' => 'btn btn-primary']) ?>
                <?php else : ?>
                    <span class="flex-grow-1"><i class="fa-solid fa-pen-ruler"></i> Create Club</span>
                <?php endif ?>
            </div>
            <div class="card-body">
                <?= form_open_multipart(isset($currentClub) ? url_to('admin_update_club', $currentClub->id) : url_to('admin_create_club'), ['class' => 'row g-3 justify-content-center', 'id' => 'edit_form']) ?>
                <?php if (isset($currentClub)) : ?>
                    <img src="<?= base_url($currentClub->image) ?? base_url('assets/images/Clubs/default.png') ?>" class="card-img-top " style="width: 150px; height: 150px" alt="club_image">
                    <h4 class="card-title text-bold text-center text-muted"><?= $currentClub->name ?? 'Select Club' ?></h4>
                    <div class="divider"></div>
                <?php endif ?>
                <!-- Edit Logo -->
                <div class="col-md-6 ">
                    <label class="form-label" for="image">Logo</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <!-- Edit Name -->
                <div class="col-md-6">
                    <label class="form-label" for="club_name">Name <i class="fa-solid fa-asterisk text-danger"></i></label>
                    <input type="text" maxlength="64" class="form-control" name="name" value="<?= $currentClub->name ?? null ?>" required>
                </div>
                <!-- Edit Name Abbreviation-->
                <div class="col-md-6">
                    <div class="row g-3 justify-content-center">
                        <div class="col-12">
                            <label class="form-label" for="abbreviation">Abbreviation <i class="fa-solid fa-asterisk text-danger"></i></label>
                            <input type="text" maxlength="64" class="form-control" name="abbreviation" value="<?= $currentClub->abbreviation ?? null ?>" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="email">Email <i class="fa-solid fa-asterisk text-danger"></i></label>
                            <input type="email" maxlength="125" class="form-control" name="email" value="<?= $currentClub->email ?? null ?>" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="phone">Phone <i class="fa-solid fa-asterisk text-danger"></i></label>
                            <input type="text" class="form-control" name="phone" placeholder="Format: +1-123-456-6789" pattern="[+][0-9]{1}-[0-9]{3}-[0-9]{3}-[0-9]{4}" value="<?= $currentClub->phone ?? null ?>" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="website">Website</label>
                            <input type="text" maxlength="128" class="form-control" name="website" value="<?= $currentClub->website ?? null ?>">
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="facebook">Facebook</label>
                            <input type="text" maxlength="256" class="form-control" name="facebook" value="<?= $currentClub->facebook ?? null ?>">
                        </div>
                    </div>
                </div>
                <!-- Edit Description -->
                <div class="col-md-6">
                    <label class="form-label" for="description">Description <i class="fa-solid fa-asterisk text-danger"></i></label>
                    <textarea maxlength="512" class="form-control" name="description" rows="15" style="resize: none;" required><?= $currentClub->description ?? null ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-50"><?= isset($currentClub) ? 'Update Club' : 'Create Club' ?></button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<?= script_tag(['src' => base_url('assets/js/admin/editMode.js'), 'isset' => isset($currentClub), 'parent' => 'edit_form']) ?>
<?= $this->endSection() ?>