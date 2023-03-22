<?= $this->extend("layouts/admin") ?>

<?= $this->section("adminContent") ?>

<div class="row text-center">
    <div class="col">
        <div class="card text-bg-success shadow">
            <div class="card-header">Total Users</div>
            <div class="card-body">
                <h2 class="card-title"><?= esc($users) ?></h2>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-bg-primary shadow">
            <div class="card-header">Total Players</div>
            <div class="card-body">
                <h2 class="card-title"><?= esc($players) ?></h2>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-bg-secondary shadow">
            <div class="card-header">Total Clubs</div>
            <div class="card-body">
                <h2 class="card-title"><?= esc($clubs) ?></h2>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-bg-danger shadow">
            <div class="card-header">Total Teams</div>
            <div class="card-body">
                <h2 class="card-title"><?= esc($teams) ?></h2>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-12">
        <div class="card h-100 shadow">
            <div class="card-header">Player Waitlist</div>
            <div class="card-body">
                <table class="table table-striped text-center table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Club to join</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php foreach ($joinlist as $row) : ?>
                            <tr>
                                <td><?= esc($row['first_name']) . " " . esc($row['last_name']) ?></td>
                                <td><?= esc($row['club_name']) ?></td>
                                <td>
                                    <button type="submit" name="accept" class="btn btn-primary mx-2">Accept</button>
                                    <button type="submit" name="decline" class="btn btn-danger mx-2">Decline</button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection() ?>