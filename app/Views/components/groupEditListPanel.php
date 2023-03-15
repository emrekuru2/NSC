<?php
/**
 * @param string $title <p>Name of section. E.g., 'Teams', 'Clubs', 'Committees', etc.</p>
 * @param array $rows <p>Array of entities from section model. Recommended to use the findAll() model function.</p>
 */
?>

<div class="card shadow">
    <div class="card-header">All <?= $title ?></div>
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
                    echo '<p class="text-start margin-bottom-0">No ' . strtolower($title) . ' available.</p>';
                }

                foreach ($rows as $row): ?>
                    <tr>
                        <td class="col-11 line-height-2rem"><?= $row->name ?></td>
                        <td class="col-1">
                            <a href="?name=<?= $row->name ?>">
                                <button type="submit" name="edit-button" data-name="<?= $row->name ?>" class="btn btn-primary btn-sm">Edit</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>
</div>