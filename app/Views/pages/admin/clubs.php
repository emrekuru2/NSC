<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

<?php $clubIsSet = isset($club) ?>

<!-- Remove Team Modal -->
<form method="post" action="removeTeamFromClub" id="removeTeamModal" class="modal fade" tabindex="-2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Remove Club</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <?php if ($clubIsSet) : ?>
                    <label class="margin-bottom-half-rem" id="remove-team-message"><?= str_contains(strtolower($club->name), 'club') ? $club->name : $club->name . ' Club' ?></label>
                <?php else : ?>
                    <label class="margin-bottom-half-rem" id="remove-team-message">Select a team to remove.</label>
                <?php endif ?>
            </div>

            <div class="modal-footer group-modal-footer">
                <input type="hidden" value="" name="remove-team-name" id="remove-team-name">
                <button type="submit" class="btn btn-danger" <?= $clubIsSet ? '' : ' disabled' ?>>Remove</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</form>

<!-- Add Teams Modal -->
<form method="post" action="addTeamsToClub" id="addTeamToClubModal" class="modal fade" tabindex="-2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Add Team</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <p class="text-start">
                    Select teams to add to the
                    <b>
                        <?php if ($clubIsSet) : ?>
                            <?= str_contains(strtolower($club->name), 'club') ? $club->name : $club->name . ' Club' ?>
                        <?php endif ?>
                    </b>
                </p>

                <table class="table<?= $clubIsSet && ! empty($unassignedTeams) ? ' table-hover' : '' ?>" id="add-team-table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Add</th>
                        </tr>
                    </thead>

                    <tbody id="add-team-list">
                        <?php if (! $clubIsSet || empty($unassignedTeams)) : ?>
                            <tr>
                                <td class="col-11 line-height-2rem">No teams available</td>
                                <td class="col-1"></td>
                            </tr>
                        <?php else : ?>
                            <?php foreach ($unassignedTeams as $unassignedTeam) : ?>
                                <tr>
                                    <td class="col-11 line-height-2rem"><label for="team-check-<?= $unassignedTeam->name ?>"><?= $unassignedTeam->name ?></label></td>
                                    <td class="col-1">
                                        <input type="checkbox" id="team-check-<?= $unassignedTeam->name ?>" class="form-check-input shadow check-margin" value="<?= $unassignedTeam->name ?>" name="add-teams-check">
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>

            <div class="modal-footer group-modal-footer">
                <input type="hidden" value="<?= $clubIsSet ? $club->id : '' ?>" name="add-team-club-id">
                <input type="hidden" value="" name="add-teams-JSON" id="add-teams-JSON">
                <button type="button" id="add-teams-button" class="btn btn-primary" <?= $clubIsSet ? '' : ' disabled' ?>>Add</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</form>

<!-- Add Member Modal -->
<form method="post" action="addClubMembers" id="addMemberModal" class="modal fade" tabindex="-2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Add Club Member</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <p class="text-start">
                    Select members to add to the
                    <b>
                        <?php if ($clubIsSet) : ?>
                            <?= str_contains(strtolower($club->name), 'club') ? $club->name : $club->name . ' Club' ?>
                        <?php endif ?>
                    </b>
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
                        <?php if (! $clubIsSet && empty($allUsers)) : ?>
                            <tr>
                                <td class="col-7 line-height-2rem">No users available</td>
                                <td class="col-4"></td>
                                <td class="col-1"></td>
                            </tr>
                        <?php else : ?>
                            <?php foreach ($allUsers as $user) : ?>
                                <tr>
                                    <td class="col-7 line-height-2rem"><label for="member-check-<?= $user->first_name . '-' . $user->last_name ?>"><?= $user->first_name . ' ' . $user->last_name ?></label></td>
                                    <td class="col-4">
                                        <select name="add-member-role" class="form-select form-select-sm">
                                            <option value="player">Player</option>
                                            <option value="manager">Manager</option>
                                        </select>
                                    </td>
                                    <td class="col-1">
                                        <input type="checkbox" id="member-check-<?= $user->first_name . '-' . $user->last_name ?>" class="form-check-input shadow check-margin" value="<?= $user->id ?>" data-role="player" name="add-member-check">
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>

            <div class="modal-footer group-modal-footer">
                <input type="hidden" value="<?= $clubIsSet ? $club->id : '' ?>" name="add-member-club-id">
                <input type="hidden" value="" name="add-members-JSON" id="add-members-JSON">
                <button type="button" id="add-member-button" class="btn btn-primary" <?= $clubIsSet ?: ' disabled' ?>>Add</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</form>

<!-- Remove Member Modal -->
<form method="post" action="removeClubMember" id="removeMemberModal" class="modal fade" tabindex="-2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Remove Club Member</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <?php if ($clubIsSet) : ?>
                    <label class="margin-bottom-half-rem" id="remove-member-message"><?= str_contains(strtolower($club->name), 'club') ? $club->name : $club->name . ' Club' ?></label>
                <?php else : ?>
                    <label class="margin-bottom-half-rem" id="remove-member-message">Select a member to remove.</label>
                <?php endif ?>
            </div>

            <div class="modal-footer group-modal-footer">
                <input type="hidden" value="<?= $clubIsSet ? $club->id : '' ?>" name="remove-member-club-id">
                <input type="hidden" value="" name="remove-member-name" id="remove-member-name">
                <button type="submit" class="btn btn-danger" <?= $clubIsSet ? '' : ' disabled' ?>>Remove</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</form>

<!-- Delete Club Modal -->
<form method="post" action="deleteClub" class="modal fade" id="deleteClubModal" tabindex="-2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Delete Club</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <?php if ($clubIsSet) : ?>
                    <label class="margin-bottom-half-rem">Are you sure you want to delete the <b><?= str_contains(strtolower($club->name), 'club') ? $club->name : $club->name . ' Club' ?></b>?<br>This action <u>cannot</u> be undone.</label>
                <?php else : ?>
                    <label class="margin-bottom-half-rem">Select a club to delete.</label>
                <?php endif ?>
            </div>

            <div class="modal-footer group-modal-footer">
                <input type="text" value="<?= $clubIsSet ? $club->id : '' ?>" name="deleteClubID" hidden>
                <button type="submit" class="btn btn-danger" <?= $clubIsSet ? '' : ' disabled' ?>>Delete</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</form>

<!-- Create Club Modal -->
<form method="post" action="createClub" enctype="multipart/form-data" class="modal fade" id="createClubModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Create Club</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <!-- Name -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="newName">Name</label>
                    <input type="text" class="form-control" name="name" id="newName" maxlength="64" required>
                </div>

                <!-- Abbreviation -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="newAbbr">Abbreviation</label>
                    <input type="text" class="form-control" name="abbreviation" id="newAbbr" maxlength="64" required>
                </div>

                <!-- Description -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="newDescription">Description</label>
                    <textarea class="form-control" name="description" id="newDescription" rows="2" maxlength="512" placeholder="Maximum 512 characters" required></textarea>
                </div>

                <!-- Email -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="newEmail">Email</label>
                    <input type="email" class="form-control" name="email" id="newEmail" maxlength="128">
                </div>

                <!-- Phone -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="newPhone">Phone</label>
                    <input type="tel" class="form-control" name="phone" id="newPhone" maxlength="12" pattern="^[1-9]\d{2}-\d{3}-\d{4}" placeholder="123-456-7890">
                </div>

                <!-- Website -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="newWebsite">Website</label>
                    <input type="text" class="form-control" name="website" id="newWebsite" maxlength="128">
                </div>

                <!-- Facebook -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="newFacebook">Facebook</label>
                    <input type="text" class="form-control" name="facebook" id="newFacebook" maxlength="256">
                </div>

                <!-- Logo -->
                <div class="form-group margin-bottom-half-rem">
                    <label class="margin-bottom-half-rem" for="newImage">Logo</label>
                    <input class="form-control" type="file" name="image" id="newImage">
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
    <!-- Edit Club -->
    <div class="col-lg-7">
        <div class="card shadow">
            <div class="card-header">Edit Club</div>

            <form class="card-body" method="post" action="updateClub" enctype="multipart/form-data" id="update-form">
                <!-- Logo and Name -->
                <img src="<?= $clubIsSet ? base_url($club->image) : base_url('assets/images/Clubs/default.png') ?>" class="card-img-top mb-3 mx-auto d-block" style="width: 150px; height: 150px" alt="club_image">
                <h4 class="card-title text-bold text-center"><?= $club->name ?? 'Select Club' ?></h4>

                <br>
                <hr class="divider">

                <!-- Edit Logo -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="updateClubImage">Logo</label>
                    <input type="file" class="form-control" name="image" id="updateClubImage" <?= $clubIsSet ? '' : ' disabled' ?>>
                    <div class="form-text">SVG filetype recommended.</div>
                </div>

                <!-- Edit Name -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="updateClubName">Name</label>
                    <input type="text" maxlength="64" class="form-control" name="updateClubName" id="updateClubName" <?= $clubIsSet ? "value='" . $club->name . "' required" : ' disabled' ?>>
                </div>

                <!-- Edit Name Abbreviation-->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="abbreviation">Abbreviation</label>
                    <input type="text" maxlength="64" class="form-control" name="abbreviation" id="updateClubAbbreviation" <?= $clubIsSet ? "value='" . $club->abbreviation . "' placeholder='Name' required" : ' disabled' ?>>
                </div>

                <!-- Edit Description -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="updateClubDescription">Description</label>
                    <textarea maxlength="512" class="form-control" name="description" id="updateClubDescription" rows="3" <?= $clubIsSet ? '>' . $club->description : 'disabled>' ?></textarea>
                </div>

                <!-- Edit Email -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="updateClubEmail">Email</label>
                    <input type="email" maxlength="125" class="form-control" name="email" id="updateClubEmail"<?= $clubIsSet ? "value='" . $club->email . "' placeholder='example@email.com'" : ' disabled' ?>>
                </div>

                <!-- Edit Phone -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="updateClubPhone">Phone</label>
                    <input type="tel" class="form-control" name="phone" id="updateClubPhone" maxlength="12" pattern="^[1-9]\d{2}-\d{3}-\d{4}"<?= $clubIsSet ? "value='" . $club->phone . "' placeholder='123-456-7890'" : ' disabled' ?>>
                </div>

                <!-- Edit Website -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="updateClubWebsite">Website</label>
                    <input type="text" maxlength="128" class="form-control" name="website" id="updateClubWebsite"<?= $clubIsSet ? "value='" . $club->website . "' placeholder='https://www.website.com'" : ' disabled' ?>>
                </div>

                <!-- Edit Facebook -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="updateClubFacebook">Facebook</label>
                    <input type="text" maxlength="256" class="form-control" name="facebook" id="updateClubFacebook"<?= $clubIsSet ? "value='" . $club->facebook . "' placeholder='https://www.facebook.com/Group-Name'" : ' disabled' ?>>
                </div>

                <!-- Edit Club Teams -->
                <div class="form-group margin-bottom-1rem">
                    <div class="margin-bottom-half-rem">
                        <label>Teams</label>
                    </div>

                    <div class="border-round">
                        <table class="table<?= $clubIsSet && ! empty($clubTeams) ? ' table-hover' : '' ?> margin-bottom-half-rem">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Options</th>
                                </tr>
                            </thead>

                            <tbody id="club-team-list" data-club-isset="<?= $clubIsSet ?>">
                                <?php if (! $clubIsSet || empty($clubTeams)) : ?>
                                    <tr>
                                        <td class="col-11 line-height-2rem">No teams</td>
                                        <td class="col-1"></td>
                                    </tr>
                                <?php else : ?>
                                    <?php foreach ($clubTeams as $team) : ?>
                                    <tr>
                                        <td class="col-11 line-height-2rem"><a class="club-link" href="teams?name=<?= str_replace(' ', '+', $team->name) ?>"><?= $team->name ?></a></td>
                                        <td class="col-1">
                                            <button type="button" name="remove-team-button" data-name="<?= $team->name ?>" data-bs-toggle="modal" data-bs-target="#removeTeamModal" class="btn btn-danger btn-sm">Remove</button>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </tbody>
                        </table>

                        <button type="button" id="new-group-button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addTeamToClubModal"<?= $clubIsSet ?: ' disabled' ?>><i class="fa-solid fa-plus"></i> Add Team</button>
                    </div>
                </div>

                <!-- Edit Club Members -->
                <div class="form-group margin-bottom-0">
                    <div class="margin-bottom-half-rem">
                        <label>Members</label>
                    </div>

                    <div class="border-round">
                        <table class="table<?= $clubIsSet && ! empty($clubMembers) ? ' table-hover' : '' ?> margin-bottom-half-rem">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Role</th>
                                    <th scope="col"></th>
                                    <th scope="col">Options</th>
                                </tr>
                            </thead>

                            <tbody id="club-member-list" data-club-isset="<?= $clubIsSet ?>">
                                <?php if (! $clubIsSet || empty($clubMembers)) : ?>
                                    <tr>
                                        <td class="col-5 line-height-2rem">No club members</td>
                                        <td class="col-4 line-height-2rem"></td>
                                        <td class="col-2 line-height-2rem"></td>
                                        <td class="col-1 line-height-2rem"></td>
                                    </tr>
                                <?php else : ?>
                                    <?php foreach ($clubMembers as $member) : ?>
                                        <tr>
                                            <td class="col-5 line-height-2rem"><?= $member->first_name . ' ' . $member->last_name ?></td>
                                            <td class="col-4 line-height-2rem">
                                                <select name="role" class="form-select form-select-sm">
                                                    <option value="player"<?= $member->isManager == 0 ? ' selected' : ''; ?>>Player</option>
                                                    <option value="manager"<?= $member->isManager == 1 ? ' selected' : ''; ?>>Manager</option>
                                                </select>
                                            </td>
                                            <td class="col-2"></td>
                                            <td class="col-1">
                                                <button type="button" name="remove-member-button" data-name="<?= $member->first_name . '|' . $member->last_name ?>" data-bs-toggle="modal" data-bs-target="#removeMemberModal" class="btn btn-danger btn-sm">Remove</button>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </tbody>
                        </table>

                        <button type="button" id="new-group-button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addMemberModal"<?= $clubIsSet ?: ' disabled' ?>><i class="fa-solid fa-plus"></i> Add Member</button>
                    </div>
                </div>

                <br>

                <!-- Update Club Button-->
                <div class="form-group margin-bottom-0">
                    <input type="hidden" value="<?= $clubIsSet ? $club->id : '' ?>" name="update-club-id" id="update-club-id">
                    <input type="hidden" value="" name="update-members-JSON" id="update-members-JSON">
                    <button type="button" name="update-button" id="update-button" class="btn btn-primary margin-bottom-1rem"<?= $clubIsSet ?: ' disabled' ?>>Update Club</button>
                </div>

                <hr class="divider">

                <!-- Delete Team Button -->
                <button type="button" name="delete-button" id="delete-button" data-bs-toggle="modal" data-bs-target="#deleteClubModal" class="btn btn-danger margin-bottom-0"<?= $clubIsSet ?: ' disabled' ?>>Delete Club</button>
            </form>
        </div>
    </div>
    <!-- All Clubs List -->
    <div class="col-lg-5 mb-3 mb-lg-0">
        <div class="card shadow">
            <div class="card-header">
                <div class="d-md-flex justify-content-md-end group-list-header">
                    <div class="line-height-2rem">All Clubs</div>
                    <button type="button" id="new-group-button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createClubModal"><i class="fa-solid fa-plus"></i> Create Club</button>
                </div>
            </div>
            <div class="card-body padding-top-half-rem">
                <?= view_cell('\App\Libraries\Contents::search', ['route' => 'clubs', 'name' => 'Club', 'array' => $allClubs, 'fields' => ['name'], 'useName' => true, 'useDivider' => true]); ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="padding-top-0">Name</th>
                            <th scope="col" class="padding-top-0"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= (count($allClubs) === 0) ? '<p class="text-start margin-bottom-0">No clubs available.</p>' : null ?>
                        <?php foreach ($allClubs as $clubIndex) : ?>
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
</div>

<script type="text/javascript" src="<?= base_url('assets/js/admin/clubs.js'); ?>"></script>

<?= $this->endSection() ?>