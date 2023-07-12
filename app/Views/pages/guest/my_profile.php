<?= $this->extend('layouts/default') ?>

<?= $this->section('mainContent') ?>

<div class="container px-5 py-5">
    <div class="row">
        <div class="col-md-3 text-center mb-5">
            <div class="avatar avatar-xl">
                <img src="<?= base_url(esc($user->image)) ?>" alt="User Image" class="avatar-img rounded-circle border bg-dark" height="150px" width="150px" />
            </div>
        </div>
        <div class="col-md-9">
            <div class="row align-items-center">
                <div class="col-12 d-flex margin-bottom ">
                    <h4 class="mb-1"><?= esc($user->getFullName()) ?></h4>
                    <h4 class="text-muted flex-grow-1 text-end">
                        Current Role: <b class="text-success"><?= esc($user->getGroups()[0]) ?></b>
                    </h4>
                </div>
            </div>
            <hr />
            <div class="row mb-4">
                <div class="col-md-4 col-4">
                    <h5>Email</h5>
                    <p class="small mb-0 text-muted"><?= esc($user->getEmail()) ?></p>
                </div>
                <div class="col-md-4 col-4">
                    <h5>Phone</h5>
                    <p class="small mb-0 text-muted"><?= esc($user->phone) ?></p>
                </div>
                <div class="col-md-4 col-4">
                    <h5>Address</h5>
                    <p class="small mb-0 text-muted"><?= esc($user->street) ?></p>
                    <p class="small mb-0 text-muted"><?= esc($user->city) . ", " . esc($user->region) ?></p>
                    <p class="small mb-0 text-muted"><?= esc($user->postal) . ", Canada" ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5 justify-content-center">
        <div class="col-md-6 col-12">
            <h4>Update Profile</h4>
            <hr />
            <?= form_open(url_to('guest_update_profile')) ?>
                <div class="mb-3">
                    <label for="inputFname" class="form-label">First name</label>
                    <input type="text" class="form-control" id="inputFname" name="first_name" inputmode="text" placeholder="First Name" value="<?= esc($user->first_name) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="inputLname" class="form-label">Last name</label>
                    <input type="text" class="form-control" id="inputLname" name="last_name" inputmode="text" placeholder="Last Name" value="<?= esc($user->last_name) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" inputmode="email" placeholder="Email Address" value="<?= esc($user->getEmail()) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="inputPhone" class="form-label">Phone number</label>
                    <input type="tel" class="form-control" id="inputPhone" name="phone" inputmode="tel" placeholder="Format: +1-123-456-7890" value="<?= esc($user->phone) ?>" required>
                </div>
                <div class="mb-3" id="addressDiv">
                    <label for="inputAddress" class="form-label">Street Address</label>
                    <input type="text" class="form-control" id="inputStreet" name="street" inputmode="text" placeholder="Street Address" value="<?= esc($user->street) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="inputCity" class="form-label">City</label>
                    <input type="text" class="form-control" id="inputCity" name="city" inputmode="text" placeholder="City" value="<?= esc($user->city) ?>">
                </div>
                <div class="mb-3">
                    <label for="inputRegion" class="form-label">Region</label>
                    <select id="inputRegion" class="form-select" name="region" required>
                        <option value="AB">Alberta</option>
                        <option value="BC">British Columbia</option>
                        <option value="MB">Manitoba</option>
                        <option value="NB">New Brunswick</option>
                        <option value="NL">Newfoundland and Labrador</option>
                        <option value="NS">Nova Scotia</option>
                        <option value="ON">Ontario</option>
                        <option value="PE">Prince Edward Island</option>
                        <option value="QC">Quebec</option>
                        <option value="SK">Saskatchewan</option>
                        <option value="NT">Northwest Territories</option>
                        <option value="NU">Nunavut</option>
                        <option value="YT">Yukon</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputPostal" class="form-label">Postal Code</label>
                    <input type="text" class="form-control" id="inputPostal" name="postal" inputmode="text" placeholder="Postal Code" value="<?= esc($user->postal) ?>">
                </div>
                <button type="submit" class="btn btn-primary">Update Profile</button>
            <?= form_close() ?>
        </div>
    </div>
</div>

<script type='text/javascript'>
    document.querySelector("#inputRegion").value = "<?= esc($user->region) ?>"
</script>
<script src="<?= base_url('/assets/js/addressAPI.js') ?>"></script>

<?= $this->endSection() ?>