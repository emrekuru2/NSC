<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

<div class="row">
    <div class="col-12 col-lg-5">
        <div class="card shadow">
            <div class="card-header ">User Details</div>
            <div class="card-body d-flex flex-column align-items-center ">
            <img src="<?= base_url(auth()->user()->image) ?>"   class="bg-dark" alt="profile" width="100px" height="100px">

                <h4 class="mt-3"> <?= esc($user->first_name) . ' ' . esc($user->last_name) ?></h4>
                <hr class="w-100">
                <ul class="list-group w-100">
                    <li class="list-group-item"><b>Email:</b> <?= esc($user->email) ?></li>
                    <li class="list-group-item"><b>Phone:</b> <?= esc($user->phone) ?></li>
                    <li class="list-group-item"><b>Street name:</b> <?= esc($user->street) ?></li>
                    <li class="list-group-item"><b>City:</b> <?= esc($user->city) ?></li>
                    <li class="list-group-item"><b>Region:</b> <?= esc($user->region) ?></li>
                    <li class="list-group-item"><b>Country:</b> <?= esc($user->country) ?></li>
                    <li class="list-group-item"><b>Postal:</b> <?= esc($user->postal) ?></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-7">
        <div class="row gx-3 mb-3">
            <div class="col-12">
                <h3>Current status</h3>
                <hr>
                <div class="input-group mb-3">
                    <span class="input-group-text w-25" id="role">User Role</span>
                    <input type="text" class="form-control" value="<?=esc($user->role)?>" aria-label="role" aria-describedby="role" disabled>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text w-25" id="inTeam">Current Team</span>
                    <input type="text" class="form-control" placeholder="<?= esc($user->team) ?>" aria-label="InTeam" aria-describedby="inClub" disabled>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text w-25" id="inClub">Current Club</span>
                    <input type="text" class="form-control" placeholder="<?= esc($user->club) ?>" aria-label="inClub" aria-describedby="inClub" disabled>
                </div>
            </div>
            <div class="col-12">
                <h3>Edit status</h3>
                <hr>
                <form method="post" action="<?= base_url("admin/editUser/{$user->id}") ?>">
                    <div class="input-group mb-3">
                        <span class="input-group-text w-25" id="roles">User Role</span>
                        <select class="form-select" aria-label="roles" name="role">
                            <option selected>Select a role</option>
                            <?php foreach ($roles as $role) : ?>
                                <?php if ($role->permission == $user->role) : ?>
                                    <option value="<?= esc($role->permission) ?>" selected><?= esc($role->permission) ?></option>
                                <?php else : ?>
                                    <option value="<?= esc($role->permission) ?>"><?= esc($role->permission) ?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text w-25" id="teams">Teams</span>
                        <select class="form-select" aria-label="teams" name="team">
                            <option selected>Select a team</option>
                            <?php foreach ($teams as $team) : ?>
                                <?php if ($team->name == $user->team) : ?>
                                    <option value="<?= esc($team->id) ?>" selected><?= esc($team->name) ?></option>
                                <?php else : ?>
                                    <option value="<?= esc($team->id) ?>"><?= esc($team->name) ?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text w-25" id="clubs">Clubs</span>
                        <select class="form-select" aria-label="clubs" name="club">
                            <option selected>Select a club</option>
                            <?php foreach ($clubs as $club) : ?>
                                <?php if ($club->name == $user->club) : ?>
                                    <option value="<?= esc($club->id) ?>" selected><?= esc($club->name) ?></option>
                                <?php else : ?>
                                    <option value="<?= esc($club->id) ?>"><?= esc($club->name) ?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>