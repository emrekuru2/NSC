<div class="card">
    <div class="card-body">
        <h5 class="card-title text-bold">Search <?= $title ?></h5>
        <div class="container text-center">
            <div class="row">
                <div class="col-10">
                    <input class="form-control form-control-sm" list="<?= strtolower($title); ?>List" id="<?= strtolower($title); ?>SearchBar" placeholder="Type to search <?= strtolower($title); ?>...">
                    <datalist id="<?= strtolower($title); ?>List">
                        <?php foreach ($rows as $row): ?>
                            <option value="<?= $row->name ?>">
                        <?php endforeach ?>
                    </datalist>
                </div>
                <div class="col-2">
                    <button type="button" class="btn btn-primary btn-sm">Edit</button>
                </div>
            </div>
        </div>

        <br>

        <h5 class="card-title text-bold">All <?= $title ?></h5>
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
                        <th class="col-2"><?= $row->id ?></th>
                        <td><?= $row->name ?></td>
                        <td class="col-2">
                            <button type="button" class="btn btn-primary btn-sm">Edit</button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>
</div>