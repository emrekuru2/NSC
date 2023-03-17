<?= $this->extend('layouts\auth') ?>

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
                    <a href="index.php"><img src="/assets/images/logo2.png" class="img-fluid" alt="Responsive image"></a>
                    <hr>
                    <form action="<?= url_to('register') ?>" method="post" class="row g-3 justify-content-center my-4">
                        <div class="col-md-6">
                            <label for="inputFname" class="form-label">First name</label>
                            <input type="text" class="form-control" id="inputFname" name="first_name">
                        </div>
                        <div class="col-md-6">
                            <label for="inputLname" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="inputLname" name="last_name">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="email">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPhone" class="form-label">Phone number</label>
                            <input type="tel" class="form-control" id="inputPhone" name="phone">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="inputPassword" name="password">
                        </div>
                        <div class="col-md-6">
                            <label for="inputConfirm" class="form-label">Confirm password</label>
                            <input type="password" class="form-control" id="inputConfirm" name="password_confirm">
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Address</label>
                            <input type="text" class="form-control" id="inputAddress" name="address">
                        </div>
                        <div class="col-md-6">
                            <label for="inputCity" class="form-label">City</label>
                            <input type="text" class="form-control" id="inputCity" name="city">
                        </div>
                        <div class="col-md-4">
                            <label for="inputState" class="form-label">Province</label>
                            <select id="inputState" class="form-select" name="province">
                                <option selected>Choose...</option>
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
                        <div class="col-md-2">
                            <label for="inputZip" class="form-label">Zip</label>
                            <input type="text" class="form-control" id="inputZip" name="zip">
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
<?= $this->endSection() ?>