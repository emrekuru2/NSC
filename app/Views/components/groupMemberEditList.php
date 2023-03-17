<?php
/**
 * @param string $groupName <p>Name of section (Singular). E.g., 'Team', 'Club', 'Committee', etc.</p>
 * @param array $members <p>Array of user entities that are in the same group. E.g., club members, team members, etc.</p>
 */
?>

<label class="margin-bottom-0" for="">Members</label>

<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Rank</th>
        <th scope="col">Options</th>
    </tr>
    </thead>

    <tbody>
    <?php
    if (sizeof($members) == 0) {
        echo '<p class="text-start margin-bottom-half-rem">No ' . strtolower($groupName) . 's members available.</p>';
    }

    foreach ($members as $member): ?>
        <tr>
            <td class="col-8 line-height-2rem"><?= $member->first_name ?> <?= $member->last_name ?></td>
            <td class="col-3 line-height-2rem">temp</td>
            <td class="col-1">
                <button type="button" class="btn btn-danger btn-sm">Remove</button>
            </td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>