<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

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
        <div class="card shadow">
            <div class="card-header"><i class="fa-solid fa-clock-rotate-left"></i> Player Waitlist</div>
            <div class="card-body p-0">
                <table id="dataTable" class="table table-striped text-center table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Club to join</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php foreach ($joinlist as $row) : ?>
                            <tr>
                                <td><a class="text-decoration-none" href="<?= url_to('admin_read_user', $row['userID']) ?>"><b><?= esc($row['first_name']) . ' ' . esc($row['last_name']) ?></b></a></td>
                                <td><a class="text-decoration-none" href="<?= url_to('admin_read_club', $row['club_name']) ?>"><b><?= esc($row['club_name']) ?></b></a></td>
                                <td>
                                    <?= form_open(url_to('admin_accept_user')) ?>
                                    <input type="hidden" value="<?= esc($row['userID']) ?>" id="userID" name="userID">
                                    <input type="hidden" value="<?= esc($row['clubID']) ?>" id="clubID" name="clubID">
                                    <input type="hidden" value="<?= esc($row['recordID']) ?>" id="recordID" name="recordID">
                                    <input type="hidden" value="<?= esc($row['club_name']) ?>" id="club_name" name="club_name">
                                    <button type="submit" name="action" value="accept" class="btn btn-success mx-2"><i class="fa-solid fa-check"></i> Accept</button>
                                    <button type="submit" name="action" value="deny" class="btn btn-danger mx-2"><i class="fa-solid fa-xmark"></i> Decline</button>
                                    <?= form_close() ?>
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