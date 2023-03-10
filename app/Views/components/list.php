<div class="card">
    <div class="card-body">
        <h5 class="card-title">All <?= $title ?></h5>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Button</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (sizeof($rows) == 0) {
                    echo '<p class="text-start margin-bottom-0">No teams available.</p>';
                }

                foreach ($rows as $row): ?>
                    <tr>
                        <th scope="row"><?= $row->id ?></th>
                        <td><?= $row->name ?></td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm">Edit</button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>
</div>