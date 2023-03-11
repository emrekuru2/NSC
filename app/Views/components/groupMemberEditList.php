<?php
/**
 * @param string $title <p>Name of section. E.g., 'Teams', 'Clubs', 'Committees', etc.</p>
 * @param array $users <p>Array of user entities from section UserEmailModel. Recommended to use the findAll() model function.</p>
 */
?>

<label class="margin-bottom-0" for="">Members</label>

<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Type</th>
        <th scope="col">Options</th>
    </tr>
    </thead>

    <tbody>
    <?php
    if (sizeof($users) == 0) {
        echo '<p class="text-start margin-bottom-half-rem">No ' . strtolower($title) . ' members available.</p>';
    }

    foreach ($users as $user): ?>
        <tr>
            <th class="col-1 line-height-2rem"><?= $user->id ?></th>
            <td class="col-10 line-height-2rem"><?= $user->name ?></td>
            <td class="col-1">
                <button type="button" class="btn btn-danger btn-sm">Remove</button>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>