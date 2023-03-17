<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

<div class="row">
    <div class="col-12 col-lg-4">
        <div class="card shadow">
            <div class="card-header">User Details</div>
            <div class="card-body d-flex align-items-center flex-column">
                <img class="border" src="<?= esc($user->image) ?>" style="height: 150px; width: 150px;">
                <span> <?= esc($user->first_name) ?></span>
                <span> <?= esc($user->last_name) ?></span>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-8">
        <form>
            <div class="row gx-3 mb-3">
                <div class="col-md-6">
                    <label class="small mb-1" for="inputFirstName">User Role</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this to select a role</option>
                        <option value="manager">Manager</option>
                        <option value="player">Player</option>
                        <option value="Umpire">Umpire</option>
                        <option value="guest">Guest</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="small mb-1" for="inputLastName">Team</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this to select a team</option>
                        <?php foreach ($teams as $team) : ?>
                            <option value="<?= esc($team->id) ?>"><?= esc($team->name) ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="row gx-3 mb-3">
                <div class="col-md-6">
                    <label class="small mb-1" for="inputOrgName">Organization name</label>
                    <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your organization name" value="<?= esc($user->first_name) ?>">
                </div>
                <div class="col-md-6">
                    <label class="small mb-1" for="inputLocation">Location</label>
                    <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value="San Francisco, CA">
                </div>
            </div>
            <div class="mb-3">
                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="name@example.com">
            </div>
            <div class="row gx-3 mb-3">
                <div class="col-md-6">
                    <label class="small mb-1" for="inputPhone">Phone number</label>
                    <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="555-123-4567">
                </div>
                <div class="col-md-6">
                    <label class="small mb-1" for="inputBirthday">Birthday</label>
                    <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="Enter your birthday" value="06/10/1988">
                </div>
            </div>
            <button class="btn btn-primary" type="button">Save changes</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>