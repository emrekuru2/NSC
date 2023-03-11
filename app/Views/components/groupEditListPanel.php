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
                    <th scope="col">ID</th>
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
                        <th class="col-1 line-height-2rem"><?= $row->id ?></th>
                        <td class="col-10 line-height-2rem"><?= $row->name ?></td>
                        <td class="col-1">
                            <button type="button" class="btn btn-primary btn-sm">Edit</button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>
</div>