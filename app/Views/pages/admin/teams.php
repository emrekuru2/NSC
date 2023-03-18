<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

<?php $teamIsSet = isset($team) ?>

<form method="post" action="createTeam" class="modal fade" id="groupModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create Team</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <!-- Name -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="newName">Name</label>
                    <input type="text" class="form-control" name="newName" id="newName" required>
                </div>

                <!-- Club -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="newClubID">Club</label>
                    <select class="form-control" name="newClubID" id="newClubID" required>
                        <?php foreach ($allClubs as $club) echo "<option value=" . $club->id . ">" . $club->name . "</option>"; ?>
                    </select>
                </div>

                <!-- Description -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="newDescription">Description</label>
                    <textarea class="form-control" name="newDescription" id="newDescription" rows="2" required></textarea>
                </div>

                <!-- Logo -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="image">Logo</label>
                    <input class="form-control" type="file" name="newImage" id="newImage">
                </div>

            </div>

            <div class="modal-footer group-modal-footer">
                <button type="submit" class="btn btn-primary">Create</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</form>

<div class="row">
    <div class="col-sm-4 mb-3 mb-sm-0">
        <?= view_cell('\App\Libraries\Contents::searchPanel', ['groupName' => 'Team', 'rows' => $allTeams, 'typeOfSearch' => 'Edit']); ?>
        <?= view_cell('\App\Libraries\Contents::groupEditListPanel', ['title' => 'Team', 'rows' => $allTeams, 'groupIsSet' => $teamIsSet]); ?>
    </div>

    <div class="col-sm-8">
        <div class="card shadow">
            <div class="card-header">Edit Team<b></b></div>

            <form method="post" action="updateTeam" class="card-body">
                <!-- Logo and Name -->
                <img src="<?= $teamIsSet ? base_url($team->image) : base_url('assets/images/Teams/default.png') ?>" class="card-img-top mb-3 mx-auto d-block" style="width: 150px; height: 150px" alt="Team Logo">
                <h4 class="card-title text-bold text-center"><?= $team->name ?? "Select Team" ?></h4>

                <!-- Edit Logo -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="teamImage">Logo</label>
                    <input class="form-control" type="file" name="teamImage" id="teamImage"<?= $teamIsSet ?: " disabled" ?>>
                </div>

                <hr class="divider">

                <!-- Edit Name -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="teamName">Name</label>
                    <input type="text" class="form-control" name="teamName" id="teamName" <?= $teamIsSet ? "value='" . $team->name . "'" : "disabled" ?>>
                </div>

                <!-- Edit Club -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="clubName">Club</label>
                    <select class="form-control" name="clubName" id="clubName" aria-label="Club Name"<?= $teamIsSet ?: " disabled" ?>>
                        <?php if($teamIsSet && !empty($allClubs)) {
                            foreach ($allClubs as $club) {
                                if ($club->id == $team->clubID) {
                                    echo "<option value=" . $club->id . " selected>" . $club->name . "</option>";
                                }
                                else {
                                    echo "<option value=" . $club->id . ">" . $club->name . "</option>";
                                }
                            }
                        } ?>
                    </select>
                </div>

                <!-- Edit Description -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="teamDescription">Description</label>
                    <textarea class="form-control" name="teamDescription" id="teamDescription" rows="3" <?= $teamIsSet ? ">" . $team->description : "disabled>" ?> </textarea>
                </div>

                <!-- Edit Members -->
                <div class="form-group margin-bottom-0">
                    <label class="margin-bottom-half-rem">Members</label>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Role</th>
                            <th scope="col"></th>
                            <th scope="col">Options</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php if ($teamMembers == null || sizeof($teamMembers) == 0) { ?>
                            <tr>
                                <td class="col-5 line-height-2rem">No team selected</td>
                                <td class="col-4 line-height-2rem"></td>
                                <td class="col-1 line-height-2rem"></td>
                                <td class="col-1 line-height-2rem"></td>
                                <td class="col-1 line-height-2rem"></td>
                            </tr>
                        <?php } else { foreach ($teamMembers as $member): ?>
                            <tr>
                                <td class="col-5 line-height-2rem"><?= $member->first_name ?> <?= $member->last_name ?></td>
                                <td class="col-4 line-height-2rem">
                                    <select name="role" id="role" class="form-select form-select-sm">
                                        <option value="player"<?= $member->isTeamCaptain == 0 && $member->isViceCaptain == 0 ? ' selected' : ''; ?>>Player</option>
                                        <option value="viceCaptain"<?= $member->isViceCaptain == 1 ? ' selected' : ''; ?>>Vice Captain</option>
                                        <option value="captain"<?= $member->isTeamCaptain == 1 ? ' selected' : ''; ?>>Captain</option>
                                    </select>
                                </td>
                                <td class="col-1"></td>
                                <td class="col-1">
                                    <form>
                                        <button type="button" name="update-member-button" class="btn btn-primary btn-sm">Update</button>
                                    </form>
                                </td>
                                <td class="col-1">
                                    <form>
                                        <button type="button" name="remove-member-button" class="btn btn-danger btn-sm">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; } ?>
                        </tbody>
                    </table>
                </div>

                <br>

                <!-- Update Team Button -->
                <div class="form-group margin-bottom-0">
                    <button type="button" name="update-button" id="update-button" class="btn btn-primary"<?= $teamIsSet ?: " disabled" ?>>Update</button>
                </div>
            </form>

            <hr class="divider">

            <form method="post" action="deleteTeam" id="delete-form">
                <!-- Delete Team Button -->
                <input value="<?= $teamIsSet ? $team->id : '' ?>" name="teamID" id="delete-team-id" hidden>
                <button type="button" name="delete-button" id="delete-button" class="btn btn-danger"<?= $teamIsSet ?: " disabled" ?>>Delete Team</button>
            </form>

        </div>
    </div>
</div>

<script type="text/javascript" src="<?= base_url('assets/js/admin/editGroup.js'); ?>"></script>

<?= $this->endSection() ?>