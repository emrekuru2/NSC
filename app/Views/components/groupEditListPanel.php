<?php
/**
 * @param string $title <p>Name of section (Singular). E.g., 'Team', 'Club', 'Committee', etc.</p>
 * @param array $rows <p>Array of entities from section model. Recommended to use the findAll() model function.</p>
 */
?>

<div class="card shadow">
    <div class="card-header">All <?= $title . 's' ?></div>
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
                    echo '<p class="text-start margin-bottom-0">No ' . strtolower($title) . 's available.</p>';
                }

                foreach ($rows as $row): ?>
                    <tr>
                        <td class="col-11 line-height-2rem"><label for="teamID"><?= $row->name ?></label></td>
                        <td class="col-1">
                            <form method="post" action="edit<?= $title ?>">
                                <input value="<?= $row->id ?>" name="teamID" id="teamID" hidden>
                                <button type="submit" name="edit-button" class="btn btn-primary btn-sm">Edit</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>
</div>