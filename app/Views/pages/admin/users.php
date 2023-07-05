<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

<div class="card shadow">
    <div class="card-header">Users</div>
    <div class="card-body">
    <div id="checkboxes" style="margin: 8px; font-size:16px; margin-bottom:12px; ">
        <form id="filter_checkbox" >
            <a href="<?= base_url('admin/changeSearch/first_name') ?>" class="checkbox-value" style="margin:5px;  height:16px; width:16px; vertical-align: middle;" type="radio" name="users[]" value="name"   ><b>Name</b></a>
            <a href="<?= base_url('admin/changeSearch/last_name') ?>" class="checkbox-value" style="margin:5px;  height:16px; width:16px; vertical-align: middle;" type="radio" name="users[]" value="surname"><b>Surname</b></a>
            <a href="<?= base_url('admin/changeSearch/team') ?>" class="checkbox-value" style="margin:5px;  height:16px; width:16px; vertical-align: middle;" type="radio" name="users[]" value="team"><b>Team</b></a>
            <a href="<?= base_url('admin/changeSearch/club') ?>" class="checkbox-value" style="margin:5px; height:16px; width:16px; vertical-align: middle;" type="radio" name="users[]" value="club"><b>Club</b></a>
            <a href="<?= base_url('admin/changeSearch/role') ?>" class="checkbox-value" style="margin:5px; height:16px; width:16px; vertical-align: middle;" type="radio" name="users[]" value="role"><b>Role</b></a>
        </form>
       
    </div>
        <?= view_cell('\App\Libraries\Contents::search', ['array' => $users, 'fields' => $current_search, 'type' => 'users'])?>
   
    
        <table id="table1" class="table table-striped">
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
                        <?php if($user->role != 'none'):?>
                            <td><?= esc($user->role) ?></td>
                        <?php else: ?>
                            <td class="text-danger font-weight-bold">No assigned role</td>
                        <?php endif ?>
                        <td><a href="users/edit/<?= esc($user->id) ?>">Edit</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<script src="/assets/js/filter_users.js"></script>


<?= $this->endSection() ?>