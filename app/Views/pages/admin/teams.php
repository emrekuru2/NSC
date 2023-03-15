<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

<div class="row">
    <div class="col-sm-4 mb-3 mb-sm-0">
        <?= view_cell('\App\Libraries\Contents::searchPanel', ['title' => $title, 'rows' => $allTeams]); ?>
        <?= view_cell('\App\Libraries\Contents::groupEditListPanel', ['title' => $title, 'rows' => $allTeams]); ?>
    </div>

    <div class="col-sm-8">
        <div class="card shadow">
            <div class="card-header">Edit Team: <b></b></div>

            <?php
                if ($team == null) {
                // No Team Selected
            ?>

            <form class="card-body">
                <!-- Logo and Name -->
                <img src="<?php echo base_url('assets/images/Teams/logos/defaultTeam.png'); ?>" class="card-img-top mb-3 mx-auto d-block" style="width: 150px; height: 150px" alt="Team Logo">
                <h4 class="card-title text-bold text-center">Select a Team</h4>

                <!-- Edit Name -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="teamName">Name</label>
                    <input type="text" class="form-control" name="teamName" id="teamName" disabled>
                </div>

                <!-- Edit Club -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="clubName">Club</label>
                    <select class="form-control" name="clubName" id="clubName" aria-label="Club Name" disabled>
                    </select>
                </div>

                <!-- Edit Description -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="teamDescription">Description</label>
                    <textarea class="form-control" name="teamDescription" id="teamDescription" rows="3" disabled></textarea>
                </div>

                <!-- Edit Logo -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="teamLogo">Logo</label>
                    <input class="form-control" type="file" name="teamLogo" id="teamLogo" disabled>
                </div>

                <!-- Edit Members -->
                <div class="form-group margin-bottom-0">
                    <label class="margin-bottom-0" for="">Members</label>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Rank</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="col-8 line-height-2rem"></td>
                                <td class="col-3 line-height-2rem"></td>
                                <td class="col-1">
                                    <button type="button" name="edit-button" class="btn btn-danger btn-sm" disabled>Remove</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <br>

                <!-- Delete Team Button -->
                <div class="form-group margin-bottom-0">
                    <button type="button" name="edit-button" class="btn btn-danger" disabled>Delete Team</button>
                </div>
            </form>

            <?php
                } else {
                // Team Selected
            ?>

            <form class="card-body">
                <!-- Logo and Name -->
                <img src="<?= base_url('assets/images/teamProfilePictures/') . $team->image; ?>" class="card-img-top mb-3 mx-auto d-block" style="width: 150px; height: 150px" alt="Team Logo">
                <h4 class="card-title text-bold text-center"><?= $team->name ?></h4>

                <!-- Edit Name -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="teamName">Name</label>
                    <input type="text" class="form-control" name="teamName" id="teamName" value="<?= $team->name ?>">
                </div>

                <!-- Edit Club -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="clubName">Club</label>
                    <select class="form-control" name="clubName" id="clubName" aria-label="Club Name">
                        <?php foreach ($allClubs as $club):
                            if ($club->id == $team->clubID) {
                        ?>
                            <option value="<?= $club->name ?>" selected>
                        <?php
                            } else {
                        ?>
                            <option value="<?= $club->name ?>">
                        <?php
                            }
                        endforeach ?>
                    </select>
                </div>

                <!-- Edit Description -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="teamDescription">Description</label>
                    <textarea class="form-control" name="teamDescription" id="teamDescription" rows="3"><?= $team->description ?></textarea>
                </div>

                <!-- Edit Logo -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="teamLogo">Logo</label>
                    <input class="form-control" type="file" name="teamLogo" id="teamLogo">
                </div>

                <!-- Edit Members -->
                <div class="form-group margin-bottom-0">
                    <?= view_cell('\App\Libraries\Contents::groupMemberEditList', ['title' => $title, 'members' => $teamMembers]); ?>
                </div>

                <br>

                <!-- Delete Team Button -->
                <div class="form-group margin-bottom-0">
                    <button type="button" name="edit-button" class="btn btn-danger" disabled>Delete Team</button>
                </div>
            </form>

            <?php
                }
            ?>

        </div>
    </div>
</div>

<p id="base-url" data-url="<?= base_url(); ?>" hidden></p>
<script type="text/javascript" src="<?= base_url('assets/js/admin/teams.js'); ?>"></script>

<?= $this->endSection() ?>