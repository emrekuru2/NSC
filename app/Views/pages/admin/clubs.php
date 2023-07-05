<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

<div class="row g-3">
    <!-- All Clubs List -->
    <div class="col-lg-5">
        <div class="row-lg">
            <div class="col-lg-12 mb-3">
                <div class="card shadow">
                    <div class="card-header d-flex align-items-center">
                        <span class="flex-grow-1"><i class="fa-solid fa-list"></i> Clubs List</span>
                        <?= view_cell('\App\Libraries\Contents::search', ['array' => $clubs, 'fields' => ['name'], 'type' => 'clubs']) ?>
                    </div>
                    <div class="card-body p-0">
                        <?php if (!empty($clubs)) : ?>
                            <?= form_open(url_to('admin_enable_alert')) ?>
                            <table class="table table-hover table-striped align-middle table-bordered display" style="margin: 0 !important;">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col" class="px-3">Name</th>
                                        <th scope="col">Teams</th>
                                        <th scope="col">Members</th>
                                        <th scope="col" class="no-sorting col-1 text-center px-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($clubs as $club) : ?>
                                        <tr <?= isset($currentClub) ? (($currentClub->name === $club->name) ? 'class="table-success"' : null) : null ?>>
                                            <td class="px-3"><a class="text-decoration-none" href="<?= url_to('admin_read_club', $club->name) ?>"><b><?= $club->name ?></b></a></td>
                                            <td><?= count($club->getTeams()) ?> </td>
                                            <td><?= count($club->getMembers()) ?> </td>
                                            <td class="text-center px-3">
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
                            <div class="card-header row m-0">
                                <div class="col-5 my-auto p-0"><i class="fa-solid fa-people-group"></i> <?= $key ?> for <b><?= $currentClub->name ?></b></div>
                                <div class="col text-end"><?= view_cell('\App\Libraries\Contents::search', ['array' => $value, 'fields' => ['name'], 'type' => strtolower($key), 'styling' => 'w-100 m-0']) ?></div>
                                <div class="col-1 p-0"><button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target=<?= "#add" . $key . "Modal" ?>><i class="fa-solid fa-plus"></i></button></div>
                            </div>
                            <div class="card-body p-0">
                                <?php if (empty($value)) : ?>
                                    <h4 class="text-muted">No <?= $key ?></h4>
                                <?php else : ?>
                                    <table class="table table-hover table-striped align-middle table-bordered display" style="margin: 0 !important;">
                                        <thead class="table-primary">
                                            <tr>
                                                <th scope="col" class="px-3">Name</th>
                                                <th scope="col"> <?= $key === 'Teams' ? 'Players' : 'Role' ?></th>
                                                <?= $key === 'Members' ? '<th scope="col">Is Manager</th>' : null ?>
                                                <th scope="col" class="no-sorting col-1 text-center px-3">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($value as $item) : ?>
                                                <tr>
                                                    <td class="px-3"><a class="text-decoration-none" href="<?= url_to($key === 'Teams' ? 'admin_read_team' : 'admin_read_user', $item->name) ?>"><b><?= $key === 'Teams' ? $item->name : $item->getName() ?></b></a></td>
                                                    <td><?= $key === 'Teams' ? count($value) : $item->getRole() ?></td>
                                                    <?= $key === 'Members' ? '<td>' . ($item->isManager() ? 'Yes' : 'No') . '</td>' : null ?>
                                                    <td class="text-center px-3">
                                                        <div class="btn-group dropend">
                                                            <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa-solid fa-ellipsis"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <?php if ($key === 'Members') : ?>
                                                                    <?php if ($item->isManager()) : ?>
                                                                        <li>
                                                                            <a href="<?= url_to('admin_club_remove_manager', $item->id) ?>" class="dropdown-item text-primary" role="button">
                                                                                <i class="fa-solid fa-chalkboard-user fa-fw"></i> Remove manager role
                                                                            </a>
                                                                        </li>
                                                                    <?php else : ?>
                                                                        <li>
                                                                            <a href="<?= url_to('admin_club_add_manager', $item->id) ?>" class="dropdown-item text-primary" role="button">
                                                                                <i class="fa-solid fa-chalkboard-user fa-fw"></i> Set as manager
                                                                            </a>
                                                                        </li>
                                                                    <?php endif ?>
                                                                <?php endif ?>
                                                                <li><span class="dropdown-item text-danger" role="button" data-bs-toggle="modal" data-bs-target="<?= '#delete_' . $key . $item->id  ?>"><i class="fa-solid fa-trash fa-fw"></i> Delete</span></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?= view_cell('\App\Libraries\Alerts::modal',  ['content' => 'Are you sure you want to remove ' . $item->name . ' from ' . $currentClub->name, 'id' => 'delete_' . $key . $item->id,  "action" => url_to('admin_club_remove_' . strtolower($key), $item->id)]) ?>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                <?php endif ?>
                                <?= view_cell('\App\Libraries\Alerts::clubModal',  ['action' => url_to('admin_club_add_' . strtolower($key)), 'type' => $key, 'id' => 'add' . $key . 'Modal', 'currentClub' => $currentClub]) ?>
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