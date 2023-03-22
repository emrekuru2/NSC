<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

<div class="card shadow">
    <div class="card-header">Users</div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">In Team</th>
                    <th scope="col">In Club</th>
                    <th scope="col">User Role</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= esc($user->first_name) ?></td>
                        <td><?= esc($user->last_name) ?></td>
                        <td><?= esc($user->team) ?></td>
                        <td><?= esc($user->club) ?></td>
                        <td><?= esc($user->role) ?></td>
                        <td><a href="users/edit/<?= esc($user->id) ?>">Edit</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>


<?= $this->endSection() ?>