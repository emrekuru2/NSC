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

            <form class="card-body">
                <!-- Logo and Name -->
                <img src="<?= isset($team->image) ? base_url('assets/images/teamProfilePictures/' . $team->image) : base_url('assets/images/Teams/logos/defaultTeam.png') ?>" class="card-img-top mb-3 mx-auto d-block" style="width: 150px; height: 150px" alt="Team Logo">
                <h4 class="card-title text-bold text-center"><?= $team->name ?? "Select a team to edit" ?></h4>

                <!-- Edit Name -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="teamName">Name</label>
                    <input type="text" class="form-control" name="teamName" id="teamName" <?= isset($team->name) ? "value='" . $team->name . "'" : "disabled" ?> >
                </div>

                <!-- Edit Club -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="clubName">Club</label>
                    <select class="form-control" name="clubName" id="clubName" aria-label="Club Name">
                        <?php //if(isset($team)) {
//                            foreach ($allClubs as $club) {
//                                if ($club->id == $team->clubID) {
//                                    echo "<option value=" . $club->name . " selected>";
//                                }
//                                else {
//                                    echo "<option value=" . $club->name . ">";
//                                }
//                            }
//                        } else {
//                            echo "<option value='No clubs available'>";
//                        }
                        ?>
                    </select>
                </div>

                <!-- Edit Description -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="teamDescription">Description</label>
                    <textarea class="form-control" name="teamDescription" id="teamDescription" rows="3" <?= isset($team->description) ? ">" . $team->description : "disabled>" ?> </textarea>
                </div>

                <!-- Edit Logo -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="teamLogo">Logo</label>
                    <input class="form-control" type="file" name="teamLogo" id="teamLogo">
                </div>

                <!-- Edit Members -->
                <div class="form-group margin-bottom-0">
                </div>

                <br>

                <!-- Update/Delete Team Button -->
                <div class="form-group margin-bottom-0">
                    <button type="button" name="edit-button" class="btn btn-primary" disabled>Save</button>
                    <button type="button" name="edit-button" class="btn btn-danger" disabled>Delete Team</button>
                </div>

            </form>

        </div>
    </div>
</div>

<script type="text/javascript" src="<?= base_url('assets/js/admin/teams.js'); ?>"></script>

<?= $this->endSection() ?>