<?= $this->extend('layouts/admin') ?>
<?= $this->section('adminContent') ?>
<?php $clubIsSet = isset($club) ?>

<div class="row">
    <div class="col-lg-4 mb-3 mb-lg-0">
        <?= view_cell('\App\Libraries\Contents::searchPanel',['groupName' => 'Club', 'rows' => $clubs]); ?>
        <?= view_cell('\App\Libraries\Contents::groupEditListPanel', ['title' => 'Club', 'rows' => $clubs, 'groupIsSet' => $clubIsSet]); 
        /*<div class="card h-100 shadow">
            <div class="card-header">Club List</div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Club name</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <!-- THIS PART NEEDS TO BE DYNAMICALLY GENERATED -->
                        <?php
                        foreach ($clubs as $club): ?>
                        <tr>
                            <td><?= $club->name ?></td>
                            <td><button type="button" action="display(<?php $club->name ?>)" name="edit-button" data-name="<?= $club->name ?>" class="btn btn-primary btn-sm">Edit</button></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>*/
        ?>
    </div>
    <div class="col-lg-8">
        <div class="card h-100 shadow">
            <div class="card-header">Club details: <b>Halifax Cricket Club</b></div>
            <!-- make into a form redirecting to ClubsController!-->
            <form class="card-body" action="updateClub" method="POST">
                <img src="/assets/images/teamProfilePictures/HalifaxCC.jpg" class="card-img-top mb-3 mx-auto d-block" style="width: 150px; height: 150px" alt="club_image">
                <div class="input-group mb-3">
                    <input type="file" class="form-control">
                </div>
                <hr>
                <!-- Club name input-->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="clubName">Name</label>
                    <input type="text" class="form-control" name="clubName" <?= $clubIsSet ? "value='" . $club->name . "'" : "disabled" ?>>
                </div>
                <!-- Phone input-->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" <?= $clubIsSet ? "value='" . $club->name . "'" : "disabled" ?>>
                </div>
                <!-- Email input-->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="email">Email</label>
                    <input type="text" class="form-control" name="email" <?= $clubIsSet ? "value='" . $club->name . "'" : "disabled" ?>>
                </div>
                <!-- Facebook input-->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="fb">Facebook</label>
                    <input type="text" class="form-control" name="fb" <?= $clubIsSet ? "value='" . $club->name . "'" : "disabled" ?>>
                </div>
                <!-- Website input-->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="clubName">Website</label>
                    <input type="text" class="form-control" name="www" <?= $clubIsSet ? "value='" . $club->name . "'" : "disabled" ?>>
                </div>
                <br>
                <!-- Update Button-->
                <div class="form-group margin-bottom-0">
                    <button type="submit" name ="formSubmit" class="btn btn-primary w-25"<?= $clubIsSet ?: " disabled" ?>>Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?= base_url('assets/js/admin/teams.js'); ?>"></script>

<?= $this->endSection() ?>