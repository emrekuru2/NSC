<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

<?php $teamIsSet = isset($team) ?>

<!-- Add Member Modal -->
<form method="post" action="addTeamMembers" id="addMemberModal" class="modal fade" tabindex="-2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Add Team Member</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <p class="text-start">
                    Select members to add to the <b><?= $team->name ?? '' ?></b> team.
                </p>

                <table class="table table-hover" id="add-member-table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col"></th>
                            <th scope="col">Add</th>
                        </tr>
                    </thead>

                    <tbody id="add-member-list">
                        <?php if (! $teamIsSet && empty($allUsers)) { ?>
                            <tr>
                                <td class="col-7 line-height-2rem">No users available</td>
                                <td class="col-4"></td>
                                <td class="col-1"></td>
                            </tr>
                            <?php } else {
                                foreach ($allUsers as $user) : ?>
                                <tr>
                                    <td class="col-7 line-height-2rem"><?= $user->first_name . ' ' . $user->last_name ?? '' ?></td>
                                    <td class="col-4">
                                        <select name="add-member-role" class="form-select form-select-sm">
                                            <option value="player">Player</option>
                                            <option value="vice">Vice Captain</option>
                                            <option value="captain">Captain</option>
                                        </select>
                                    </td>
                                    <td class="col-1">
                                        <input type="checkbox" class="form-check-input shadow check-margin" value="<?= $user->id ?? 'none' ?>" name="add-member-check">
                                    </td>
                                </tr>
                        <?php endforeach;
                            } ?>
                    </tbody>
                </table>
            </div>

            <div class="modal-footer group-modal-footer">
                <input type="hidden" value="<?= $teamIsSet ? $team->id : '' ?>" name="add-member-team-id">
                <input type="hidden" value="" name="add-members-JSON" id="add-members-JSON">
                <button type="button" id="add-member-button" class="btn btn-primary" <?= $teamIsSet ?: ' disabled' ?>>Add</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</form>

<!-- Remove Member Modal -->
<form method="post" action="removeTeamMember" id="removeMemberModal" class="modal fade" tabindex="-2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Remove Team Member</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <?php if ($teamIsSet) { ?>
                    <label class="margin-bottom-half-rem" id="remove-member-message"><?= $team->name ?></label>
                <?php } else { ?>
                    <label class="margin-bottom-half-rem" id="remove-member-message">Select a member to remove.</label>
                <?php } ?>
            </div>

            <div class="modal-footer group-modal-footer">
                <input type="hidden" value="<?= $teamIsSet ? $team->id : '' ?>" name="remove-member-team-id">
                <input type="hidden" value="0" name="remove-member-id" id="remove-member-id">
                <button type="submit" class="btn btn-danger" <?= $teamIsSet ? '' : ' disabled' ?>>Remove</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</form>

<!-- Delete Team Modal -->
<form method="post" action="deleteTeam" class="modal fade" id="deleteTeamModal" tabindex="-2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Delete Team</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <?php if ($teamIsSet) : ?>
                    <label class="margin-bottom-half-rem" for="deleteTeamID">Are you sure you want to delete the <b><?= $team->name ?></b> team?</label>
                <?php else : ?>
                    <label class="margin-bottom-half-rem" for="deleteTeamID">Select a team to delete.</label>
                <?php endif ?>
            </div>

            <div class="modal-footer group-modal-footer">
                <input type="text" value="<?= $teamIsSet ? esc($team->id) : '' ?>" name="deleteTeamID" hidden>
                <button type="submit" class="btn btn-danger" <?= $teamIsSet ?: ' disabled' ?>>Delete</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</form>

<!-- Create Team Modal -->
<form method="post" action="createTeam" enctype="multipart/form-data" class="modal fade" id="groupModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Create Team</h1>
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
                        <option value="none" selected>No Club</option>
                        <?php foreach ($allClubs as $club) : ?>
                            <option value="<?= esc($club->id) ?>"><?= esc($club->name) ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <!-- Description -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="newDescription">Description</label>
                    <textarea class="form-control" name="newDescription" id="newDescription" rows="2" required></textarea>
                </div>

                <!-- Logo -->
                <div class="form-group margin-bottom-half-rem">
                    <label class="margin-bottom-half-rem" for="newImage">Logo</label>
                    <input class="form-control" type="file" name="newImage" id="newImage">
                    <div class="form-text">SVG filetype recommended.</div>
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

    <!-- View Team -->
    <div class="col-sm-7" id="view-team-card">
        <div class="card shadow">
            <div class="card-header">
                <div class="d-md-flex justify-content-md-end group-list-header">
                    <div class="line-height-2rem">Team Info</div>
                    <button type="button" id="edit-team-button" class="btn btn-primary btn-sm" <?= $teamIsSet ? '' : ' disabled' ?>><i class="fa-solid fa-pen-to-square"></i> Edit Team</button>
                </div>
            </div>

            <div class="card-body">
                <!-- Logo and Name -->
                <img src="<?= $teamIsSet ? base_url($team->image) : base_url('assets/images/Teams/default.png') ?>" class="card-img-top mb-3 mx-auto d-block" style="width: 150px; height: 150px" alt="Team Logo">
                <h4 class="card-title text-bold text-center"><?= $team->name ?? 'Select Team' ?></h4>

                <br>
                <hr class="divider">

                <!-- View Club -->
                <div class="form-group margin-bottom-1rem">
                    <div class="mb-3 row">
                        <label class="col-2 col-form-label" for="viewTeamClub">Club</label>
                        <div class="col-10">
                            <input class="form-control" type="text" id="viewTeamClub" value="<?= $teamIsSet ? $teamClub->name : '' ?>" aria-label="readonly input" readonly>
                        </div>
                    </div>
                </div>

                <!-- View Description -->
                <div class="form-group margin-bottom-1rem">
                    <div class="mb-3 row">
                        <label class="col-2 col-form-label" for="viewTeamDescription">Description</label>
                        <div class="col-10">
                            <textarea class="form-control" id="updateTeamDescription" rows="3" aria-label="readonly input" readonly><?= $teamIsSet ? $team->description : '' ?></textarea>
                        </div>
                    </div>
                </div>


                <!-- View Members -->
                <div class="form-group margin-bottom-1rem">
                    <div class="mb-3 row">
                        <label class="col-2 col-form-label" for="viewTeamMembers">Members</label>
                        <div class="col-10">

                            <div class="border-round">
                                <table class="table<?= $teamIsSet && ! empty($teamMembers) ? ' table-hover' : '' ?> margin-bottom-half-rem">
                                    <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Role</th>
                                    </tr>
                                    </thead>

                                    <tbody id="team-member-list" data-team-isset="<?= $teamIsSet ?>">
                                    <?php if (! $teamIsSet) { ?>
                                        <tr>
                                            <td class="col-9 view-table-data"><br></td>
                                            <td class="col-3 view-table-data"></td>
                                        </tr>
                                    <?php } elseif (empty($teamMembers)) { ?>
                                        <tr>
                                            <td class="col-9 view-table-data">No team members</td>
                                            <td class="col-3 view-table-data"></td>
                                        </tr>
                                    <?php } else {
                                        foreach ($teamMembers as $member) : ?>
                                            <tr>
                                                <td class="col-9 view-table-data"><?= $member->first_name . ' ' . $member->last_name ?></td>
                                                <td class="col-3 view-table-data">
                                                    <?php if ($member->isTeamCaptain == 1) {
                                                        echo 'Captain';
                                                    } elseif ($member->isViceCaptain == 1) {
                                                        echo 'Vice Captain';
                                                    } else {
                                                        echo 'Player';
                                                    }  ?>
                                                </td>
                                            </tr>
                                        <?php endforeach;
                                    } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Edit Team -->
    <div class="col-sm-7" id="edit-team-card">
        <div class="card shadow">
            <div class="card-header">
                <div class="d-md-flex justify-content-md-end group-list-header">
                    <div class="line-height-2rem">Edit Team</div>
                    <button type="button" id="cancel-edit-team-button" class="btn btn-primary btn-sm"><i class="fa-solid fa-xmark"></i> Cancel Edit</button>
                </div>
            </div>

            <form method="post" action="updateTeam" enctype="multipart/form-data" class="card-body" id="update-form">
                <!-- Logo and Name -->
                <img src="<?= $teamIsSet ? base_url($team->image) : base_url('assets/images/Teams/default.png') ?>" class="card-img-top mb-3 mx-auto d-block" style="width: 150px; height: 150px" alt="Team Logo">
                <h4 class="card-title text-bold text-center"><?= $team->name ?? 'Select Team' ?></h4>

                <br>
                <hr class="divider">

                <!-- Edit Logo -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="updateTeamImage">Logo</label>
                    <input class="form-control" type="file" name="updateTeamImage" id="updateTeamImage" <?= $teamIsSet ?: ' disabled' ?>>
                    <div class="form-text">SVG filetype recommended.</div>
                </div>

                <!-- Edit Name -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="updateTeamName">Name</label>
                    <input type="text" class="form-control" name="updateTeamName" id="updateTeamName" <?= $teamIsSet ? "value='" . $team->name . "'" : 'disabled' ?>>
                </div>

                <!-- Edit Club -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="updateClubID">Club</label>
                    <select class="form-control" name="updateClubID" id="updateClubID" aria-label="Club" <?= $teamIsSet ?: ' disabled' ?>>
                        <?php if ($teamIsSet && ! empty($allClubs)) : ?>
                            <?php if ($team->clubID === null) : ?>
                                <option value="none" selected>No Club</option>
                            <?php else : ?>
                                <option value="none">No Club</option>
                            <?php endif ?>

                            <?php foreach ($allClubs as $club) : ?>
                                <?php if ($club->id === $team->clubID) : ?>
                                    <option value=<?= esc($club->id) ?> selected><?= esc($club->name) ?></option>
                                <?php else : ?>
                                    <option value=<?= esc($club->id) ?>><?= esc($club->name) ?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                </div>

                <!-- Edit Description -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="updateTeamDescription">Description</label>
                    <textarea class="form-control" name="updateTeamDescription" id="updateTeamDescription" rows="3" <?= $teamIsSet ? '>' . $team->description : 'disabled>' ?></textarea>
                </div>

                <!-- Edit Members -->
                <div class="form-group margin-bottom-0">
                    <div class="margin-bottom-half-rem">
                        <label>Members</label>
                    </div>

                    <div class="border-round">
                        <table class="table<?= $teamIsSet && ! empty($teamMembers) ? ' table-hover' : '' ?> margin-bottom-half-rem">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Role</th>
                                <th scope="col"></th>
                                <th scope="col">Options</th>
                            </tr>
                            </thead>

                            <tbody id="team-member-list" data-team-isset="<?= $teamIsSet ?>">
                                <?php if (! $teamIsSet || empty($teamMembers)) { ?>
                                    <tr>
                                        <td class="col-5 line-height-2rem">No team members</td>
                                        <td class="col-4 line-height-2rem"></td>
                                        <td class="col-2 line-height-2rem"></td>
                                        <td class="col-1 line-height-2rem"></td>
                                    </tr>
                                <?php } else {
                                    foreach ($teamMembers as $member) : ?>
                                    <tr>
                                        <td class="col-5 line-height-2rem"><?= $member->first_name . ' ' . $member->last_name ?></td>
                                        <td class="col-4 line-height-2rem">
                                            <select name="role" class="form-select form-select-sm">
                                                <option value="player"<?= $member->isTeamCaptain == 0 && $member->isViceCaptain == 0 ? ' selected' : '' ?>>Player</option>
                                                <option value="vice"<?= $member->isViceCaptain == 1 ? ' selected' : '' ?>>Vice Captain</option>
                                                <option value="captain"<?= $member->isTeamCaptain == 1 ? ' selected' : '' ?>>Captain</option>
                                            </select>
                                        </td>
                                        <td class="col-2"></td>
                                        <td class="col-1">
                                            <button type="button" name="remove-member-button" data-user="<?= $member->id ?>" data-name="<?= $member->first_name . '|' . $member->last_name ?>" data-bs-toggle="modal" data-bs-target="#removeMemberModal" class="btn btn-danger btn-sm">Remove</button>
                                        </td>
                                    </tr>
                                <?php endforeach;
                                } ?>
                            </tbody>
                        </table>

                        <button type="button" id="new-group-button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addMemberModal"<?= $teamIsSet ? '' : ' disabled' ?>><i class="fa-solid fa-plus"></i> Add Member</button>
                    </div>
                </div>

                <br>

                <!-- Update Team Button -->
                <div class="form-group margin-bottom-0">
                    <input type="text" value="<?= $teamIsSet ? $team->id : '' ?>" name="update-team-id" id="update-team-id" hidden>
                    <input type="text" value="" name="update-members-JSON" id="update-members-JSON" hidden>
                    <button type="button" name="update-button" id="update-button" class="btn btn-primary margin-bottom-1rem"<?= $teamIsSet ? '' : ' disabled' ?>>Update Team</button>
                </div>

                <hr class="divider">

                <!-- Delete Team Button -->
                <button type="button" name="delete-button" id="delete-button" data-bs-toggle="modal" data-bs-target="#deleteTeamModal" class="btn btn-danger margin-bottom-0"<?= $teamIsSet ? '' : 'disabled' ?>>Delete Team</button>
            </form>

        </div>
    </div>

    <!-- All Teams and Search -->
    <div class="col-sm-5 mb-3 mb-sm-0">
        <div class="card shadow">

            <div class="card-header">
                <div class="d-md-flex justify-content-md-end group-list-header">
                    <div class="line-height-2rem">All Teams</div>
                    <button type="button" id="new-group-button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#groupModal"><i class="fa-solid fa-plus"></i> Create Team</button>
                </div>
            </div>

            <div class="card-body padding-top-half-rem">
                <?= view_cell('\App\Libraries\Contents::search', ['name' => 'Team', 'array' => $allTeams, 'fields' => ['name'], 'useName' => true, 'useDivider' => true]); ?>

                <!-- Team List -->
                <table class="table<?= ! empty($allTeams) ? ' table-hover' : '' ?> margin-bottom-half-rem">
                    <thead>
                        <tr>
                            <th scope="col" class="padding-top-0">Name</th>
                            <th scope="col" class="padding-top-0"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if (count($allTeams) === 0) {
                            echo '<p class="text-start margin-bottom-0">No teams available.</p>';
                        } else {
                            foreach ($allTeams as $teamIndex) : ?>
                            <tr>
                                <td class="col-12 line-height-2rem">
                                    <a href="<?= '?name=' . str_replace(' ', '+', $teamIndex->name) ?>">
                                        <label class="text-bold width-100" for="name"><?= $teamIndex->name ?></label>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?><?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?= base_url('assets/js/admin/teams.js'); ?>"></script>

<?= $this->endSection() ?>