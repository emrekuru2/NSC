<?php
/**
 * @param string $groupName <p>Name of section (Singular). E.g., 'Team', 'Club', 'Committee', etc.</p>
 * @param array $members <p>Array of user entities that are in the same group. E.g., club members, team members, etc.</p>
 */
?>

<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Rank</th>
        <th scope="col">Options</th>
    </tr>
    </thead>

    <tbody>
    <?php if ($members == null || sizeof($members) == 0) { ?>
        <tr>
            <td class="col-8 line-height-2rem">No <?= strtolower($groupName) ?> selected</td>
            <td class="col-3 line-height-2rem"></td>
            <td class="col-1 line-height-2rem"></td>
        </tr>
    <?php } else { foreach ($members as $member): ?>
        <tr>
            <td class="col-8 line-height-2rem"><?= $member->first_name ?> <?= $member->last_name ?></td>
            <td class="col-3 line-height-2rem">Temp Value</td>
            <td class="col-1">
                <form>
                    <button type="button" name="remove-member-button" class="btn btn-danger btn-sm">Remove</button>
                </form>
            </td>
        </tr>
    <?php endforeach; } ?>
    </tbody>
</table>