<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>


<div class="row">
    <div class="col-sm-4 mb-3 mb-sm-0">
        <?= view_cell('\App\Libraries\Contents::searchPanel', ['title' => $title, 'rows' => $teams]); ?>
        <?= view_cell('\App\Libraries\Contents::groupEditListPanel', ['title' => $title, 'rows' => $teams]); ?>
    </div>

    <div class="col-sm-8">
        <div class="card shadow">
            <div class="card-header">Edit Team: <b></b></div>
            <form class="card-body">

                <!-- Logo and Name -->
                <img src="<?php echo base_url('assets/images/Teams/logos/defaultTeam.png'); ?>" class="card-img-top mb-3 mx-auto d-block" style="width: 150px; height: 150px" alt="Team Logo">
                <h4 class="card-title text-bold text-center">Team Name</h4>

                <!-- Edit Name -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="teamName">Name</label>
                    <input type="text" class="form-control" name="teamName" id="teamName" placeholder="Team Name">
                </div>

                <!-- Edit Club -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="clubName">Club</label>
                    <select class="form-control" name="clubName" id="clubName" aria-label="Club name">
                        <?php
                        if (sizeof($teams) == 0) {
                            echo '<option value="0">No clubs available.</option>';
                        }

                        foreach ($teams as $team): ?>
                            <option value="<?= $team->id ?>"><?= $team->name ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <!-- Edit Description -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="teamDescription">Description</label>
                    <textarea class="form-control" name="teamDescription" id="teamDescription" rows="3" placeholder="521 characters maximum."></textarea>
                </div>

                <!-- Edit Logo -->
                <div class="form-group margin-bottom-1rem">
                    <label class="margin-bottom-half-rem" for="teamLogo">Logo</label>
                    <input class="form-control" type="file" name="teamLogo" id="teamLogo">
                </div>

                <!-- Edit Members -->
                <div class="form-group margin-bottom-0">
                    <?= view_cell('\App\Libraries\Contents::groupMemberEditList', ['title' => $title, 'rows' => $teamUsers, 'users' => $users]); ?>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?= base_url('assets/js/admin/teams.js'); ?>"></script>

<?= $this->endSection() ?>