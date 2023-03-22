<?= $this->extend('layouts/admin') ?>
<?= $this->section('adminContent') ?>
<?php $clubIsSet = isset($club) || isset($club) && $club == null ?>

<div class="row">
    <div class="col-lg-4 mb-3 mb-lg-0">
        <?= view_cell('\App\Libraries\Contents::searchPanel',['groupName' => 'Club', 'rows' => $allClubs]); ?>
        <?= view_cell('\App\Libraries\Contents::groupEditListPanel', ['title' => 'Club', 'rows' => $allClubs, 'groupIsSet' => $clubIsSet]); ?>
    </div>

    <div class="col-lg-8">
        <div class="card h-100 shadow">
            <div class="card-header">Edit Club</b></div>

            <form class="card-body" action="updateClub" method="post" id="update-form">
                <img src="<?= $clubIsSet ? base_url($club->image) : base_url('assets/images/Clubs/default.png') ?>" class="card-img-top mb-3 mx-auto d-block" style="width: 150px; height: 150px" alt="club_image">
                <h4 class="card-title text-bold text-center"><?= $club->name ?? "Select Club" ?></h4>

                <br>

                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="updateClubImage">Logo</label>
                    <input type="file" class="form-control"  name="updateClubImage" id="updateClubImage"<?= $clubIsSet ?: " disabled" ?>>
                    <div class="form-text">SVG filetype recommended.</div>
                </div>

                <hr class="divider">

                <!-- Edit Name -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name"<?= $clubIsSet ? "value='" . $club->name . "' required" : " disabled" ?>>
                </div>

                <!-- Edit Name Abbreviation-->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="abbreviation">Abbreviation</label>
                    <input type="text" class="form-control" name="abbreviation" id="abbreviation"<?= $clubIsSet ? "value='" . $club->abbreviation . "' placeholder='Name' required" : " disabled" ?>>
                </div>

                <!-- Edit Description -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="abbreviation">Description</label>
                    <textarea class="form-control" name="updateClubDescription" id="updateClubDescription" rows="3" <?= $clubIsSet ? ">" . $club->description : "disabled>" ?></textarea>
                </div>

                <!-- Edit Email -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email"<?= $clubIsSet ? "value='" . $club->email . "' placeholder='example@email.com'" : " disabled" ?>>
                </div>

                <!-- Edit Phone -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="phone">Phone</label>
                    <input type="tel" class="form-control" name="phone" id="phone"<?= $clubIsSet ? "value='" . $club->phone . "' placeholder='123-456-7890'" : " disabled" ?>>
                </div>

                <!-- Edit Website -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="website">Website</label>
                    <input type="text" class="form-control" name="website" id="website"<?= $clubIsSet ? "value='" . $club->website . "' placeholder='https://www.website.com'" : " disabled" ?>>
                </div>

                <!-- Edit Facebook -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="facebook">Facebook</label>
                    <input type="text" class="form-control" name="facebook" id="facebook"<?= $clubIsSet ? "value='" . $club->facebook . "' placeholder='https://www.facebook.com/Group-Name'" : " disabled" ?>>
                </div>

                <br>

                <!-- Update Club Button-->
                <div class="form-group margin-bottom-0">
                    <button type="button" name="update-button" id="update-button" class="btn btn-primary margin-bottom-1rem"<?= $clubIsSet ?: " disabled" ?>>Update</button>
                </div>

                <hr class="divider">

                <!-- Delete Team Button -->
                <button type="button" name="delete-button" id="delete-button" data-bs-toggle="modal" data-bs-target="#deleteClubModal" class="btn btn-danger margin-bottom-0"<?= $clubIsSet ?: " disabled" ?>>Delete Club</button>
            </form>

        </div>
    </div>
</div>

<?= $this->endSection() ?>