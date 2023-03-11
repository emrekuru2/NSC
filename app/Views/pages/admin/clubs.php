<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>
<div class="row">
    <div class="col-lg-4 mb-3 mb-lg-0">
        <div class="card h-100 shadow">
            <div class="card-header">Club List</div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Club name</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <!-- THIS PART NEEDS TO BE DYNAMICALLY GENERATED -->
                        <tr>
                            <td>1</td>
                            <td>No games today!</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Otto</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card h-100 shadow">
            <div class="card-header">Club details: <b>Halifax Cricket Club</b></div>
            <div class="card-body text-center">
                <img src="/assets/images/teamProfilePictures/HalifaxCC.jpg" class="card-img-top mb-3" style="width: 150px; height: 150px" alt="club_image">
                <div class="input-group mb-3">
                    <input type="file" class="form-control">
                </div>
                <hr>
                <div class="input-group mb-3">
                    <span class="input-group-text" style="width: 20%;" id="name">Club name</span>
                    <input type="text" class="form-control" placeholder="Club name" aria-label="name" aria-describedby="name">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" style="width: 20%;" id="phone">Phone</span>
                    <input type="text" class="form-control" placeholder="Phone" aria-label="phone" aria-describedby="phone">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" style="width: 20%;" id="email">Email</span>
                    <input type="text" class="form-control" placeholder="Email" aria-label="email" aria-describedby="email">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" style="width: 20%;" id="fb">Facebook</span>
                    <input type="text" class="form-control" placeholder="Facebook" aria-label="fb" aria-describedby="fb">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" style="width: 20%;" id="www">Website</span>
                    <input type="text" class="form-control" placeholder="Website" aria-label="www" aria-describedby="www">
                </div>
                <button type="submit" class="btn btn-primary w-25">Update</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>