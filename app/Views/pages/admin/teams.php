<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>


<div class="row">
    <div class="col-sm-4 mb-3 mb-sm-0">
        <?= view_cell('\App\Libraries\Contents::list', ['title' => $title, 'rows' => $teams, 'users' => $users, 'teamUsers' => $teamUsers]); ?>
    </div>

    <div class="col-sm-8">
        <div class="card">
            <form class="card-body">


                <img src="<?php echo base_url('assets/images/Teams/logos/defaultTeam.png'); ?>" class="img-thumbnail rounded margin-bottom-half-rem" alt="Profile photo">
                <h4 class="card-title text-bold">Team Name</h4>

                <div class="mb-3 row">
                    <label for="teamName" class="col-2 col-form-label">Name</label>
                    <div class="col-10">
                        <input type="text" class="form-control" name="clubName" id="teamName">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="clubName" class="col-2 col-form-label">Club</label>
                    <div class="col-10">
                        <select class="form-select col-9" name="clubName" id="clubName" aria-label="Default select example">
                            <?php
                            if (sizeof($teams) == 0) {
                                echo '<option value="0">No Club</option>';
                            }

                            foreach ($teams as $team): ?>
                                <option value="<?= $team->id ?>"><?= $team->name ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="teamDescription" class="col-2 col-form-label">Description</label>
                    <div class="col-10">
                        <textarea class="form-control" name="teamDescription" id="teamDescription"></textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="teamLogo" class="col-2 col-form-label">Logo</label>
                    <div class="col-10">
                        <input class="form-control" type="file" name="teamLogo" id="teamLogo">
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>


<?= $this->endSection() ?>