<?= $this->extend('layouts/auth') ?>

<?= $this->section('title') ?><?= lang('Auth.register') ?> <?= $this->endSection() ?>

<?= $this->section('authContent') ?>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-6 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <?php if (session('error') !== null) : ?>
                        <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
                    <?php elseif (session('errors') !== null) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php if (is_array(session('errors'))) : ?>
                                <?php foreach (session('errors') as $error) : ?>
                                    <?= $error ?>
                                    <br>
                                <?php endforeach ?>
                            <?php else : ?>
                                <?= session('errors') ?>
                            <?php endif ?>
                        </div>
                    <?php endif ?>
                    <a href="index.php"><img src="/assets/images/General/logo2.png" class="img-fluid" alt="Responsive image"></a>
                    <hr>
                    <form action="<?= url_to('register') ?>" method="post" class="row g-3 justify-content-center my-4">
                        <?= csrf_field() ?>
                        <div class="col-md-6">
                            <label for="inputFname" class="form-label">First name</label>
                            <input type="text" class="form-control" id="inputFname" name="first_name" inputmode="text" placeholder="First Name" value="<?= old('first_name') ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputLname" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="inputLname" name="last_name" inputmode="text" placeholder="Last Name" value="<?= old('last_name') ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="email" inputmode="email" placeholder="Email Address" value="<?= old('email') ?>" required />
                        </div>
                        <div class="col-md-6">
                            <label for="inputPhone" class="form-label">Phone number</label>
                            <input type="text" class="form-control" id="inputPhone" name="phone" maxlength="15" inputmode="text" placeholder="Format: +1-123-456-6789" pattern="+[0-9]{1}-[0-9]{3}-[0-9]{3}-[0-9]{4}" value="<?= old('phone') ?>" required />
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="inputPassword" name="password" inputmode="text" placeholder="Password" required />
                        </div>
                        <div class="col-md-6">
                            <label for="inputConfirm" class="form-label">Confirm password</label>
                            <input type="password" class="form-control" id="inputPasswordConfirm" name="password_confirm" inputmode="text" placeholder="Password (again)" required />
                        </div>
                        <div class="col-12" id="addressDiv">
                            <label for="inputAddress" class="form-label">Street Address</label>
                            <input type="address" class="form-control" id="inputStreet" name="street" inputmode="text" placeholder="Street Address" value="<?= old('street') ?>" required />
                        </div>
                        <div class="col-md-5">
                            <label for="inputCity" class="form-label">City</label>
                            <input type="text" class="form-control" id="inputCity" name="city" inputmode="text" placeholder="City" value="<?= old('city') ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="inputRegion" class="form-label">Region</label>
                            <select id="inputRegion" class="form-select" name="region" value="<?= old('region') ?>" required>
                                <option value="" selected disabled>Choose...</option>
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
                        <div class="col-md-3">
                            <label for="inputPostal" class="form-label">Postal Code</label>
                            <input type="text" class="form-control" id="inputPostal" name="postal" inputmode="text" placeholder="Postal Code" value="<?= old('postal') ?>">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary col-4">Register</button>
                    </form>
                    <div class="text-center">
                        <span>Already a member? <a href="/login">Login</a></span>
                        <br>
                        <span>or</span>
                        <br>
                        <span>Return back to <a href="/">Home</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/addressAPI.js"></script>
<?= $this->endSection() ?>