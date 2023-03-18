<?php
/**
 * @param string $groupName <p>Name of section (Singular). E.g., 'Team', 'Club', 'Committee', etc.</p>
 * @param array $rows <p>Array of entities from section model. Recommended to use the findAll() model function.</p>
 */
?>

<div class="card shadow">
    <div class="card-header">
        <div class="d-md-flex justify-content-md-end group-list-header">
            <div class="line-height-2rem">All <?= $groupName . 's' ?></div>
            <button type="button" id="new-group-button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#groupModal"><i class="fa-solid fa-plus"></i> New <?= $groupName  ?></button>
        </div>
    </div>

    <div class="card-body">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody>
                <?php
                if (sizeof($rows) == 0) {
                    echo '<p class="text-start margin-bottom-0">No ' . strtolower($groupName) . 's available.</p>';
                }

                foreach ($rows as $row): ?>
                    <tr>
                        <td class="col-11 line-height-2rem"><label for="groupID"><?= $row->name ?></label></td>
                        <td class="col-1">
                            <form method="post" action="edit<?= $groupName ?>">
                                <input value="<?= $row->id ?>" name="groupID" id="groupID" hidden>
                                <button type="submit" name="edit-button" class="btn btn-primary btn-sm">Edit</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>
</div>