<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

<div class="card shadow">
    <div class="card-header">Users</div>
    <div class="card-body">
        <?= view_cell('\App\Libraries\Contents::search', ['route' => 'users/edit', 'name' => 'User', 'array' => $users, 'fields' => ['first_name', 'last_name'], 'useName' => true, 'useDivider' => true]); ?>

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
                        <!-- if no team show not in team in red
                        if in team show team name in green -->
                        <?php if($user->team != 'none'):?>
                            <td><?= esc($user->team) ?></td>
                        <?php else: ?>
                            <td class="text-danger font-weight-bold">Not in a team</td>
                        <?php endif ?>
                        <?php if($user->club != 'none'):?>
                            <td><?= esc($user->club) ?></td>
                        <?php else: ?>
                            <td class="text-danger font-weight-bold">Not in a club</td>
                        <?php endif ?>
                        <td><?= esc($user->role) ?></td>
                        <td><a href="users/edit/<?= esc($user->id) ?>">Edit</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>


<?= $this->endSection() ?>