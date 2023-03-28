<?= $this->extend('layouts/admin') ?>
<?= $this->section('adminContent') ?>
<?php $clubIsSet = isset($club) || isset($club) && $club == null ?>

<div class="row">
    <!-- Club List -->
    <div class="col-lg-4 mb-3 mb-lg-0">
        <div class="card shadow">

            <div class="card-header">
                <div class="d-md-flex justify-content-md-end group-list-header">
                    <div class="line-height-2rem">All Clubs</div>
<!--                    <button type="button" id="new-group-button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#groupModal"><i class="fa-solid fa-plus"></i> New --><?php //= $groupName  ?><!--</button>-->
                </div>
            </div>

            <div class="card-body padding-top-half-rem">
                <?= view_cell('\App\Libraries\Contents::search', ['route' => 'clubs', 'name' => 'Club', 'array' => $allClubs, 'useName' => true, 'useDivider' => true]); ?>

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col" class="padding-top-0">Name</th>
                        <th scope="col" class="padding-top-0"></th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    if (sizeof($allClubs) == 0) {
                        echo '<p class="text-start margin-bottom-0">No ' . strtolower($groupName) . 's available.</p>';
                    }

                    foreach ($allClubs as $clubIndex): ?>
                        <tr>
                            <td class="col-11 line-height-2rem"><label for="name"><?= $clubIndex->name ?></label></td>
                            <td class="col-1">
                                <form method="get" action="">
                                    <input value="<?= $clubIndex->name ?>" name="name" id="name" hidden>
                                    <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div>

    <!-- Edit Club -->
    <div class="col-lg-8">
        <div class="card h-100 shadow">
            <div class="card-header">Edit Club</div>

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