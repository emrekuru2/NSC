<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">

<div class="row">

    <!-- Committees -->
    <div class="col-lg-4">
        <div class="row-lg">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header">Committees</div>
                    <div class="card-body">
                        <?= view_cell('\App\Libraries\Contents::search', ['route' => 'modify_committee', 'name' => 'Committee', 'array' => $committiees, 'fields' => ['name'], 'method' =>  'post', 'useName' => true, 'useDivider' => true]) ?>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Dates</th>
                                    <th scope="col">Edit</th>
                                </tr>
                            </thead>

                            <tbody class="table-group-divider">
                                <?php if (!empty($committiees) && is_array($committiees)) : ?>
                                    <?php foreach ($committiees as $committiee) : ?>
                                        <tr>
                                            <td><?= esc($committiee->id) ?></td>
                                            <td><?= esc($committiee->name) ?></td>
                                            <td><?= esc($committiee->years) ?></td>
                                            <td><form method="post" action="modify_committee">
                                                <input type="hidden" name="id" value="<?=esc($committiee->id)?>">
                                                <button class="btn btn-primary" type="submit">Edit</button>
                                            </form></td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create committee -->
    <div class="col-lg-8">
        <div class="card shadow">
            <div class="card-header">Create committiee</div>
            <div class="card-body">

                <form method="post" action="createCommittee" enctype="multipart/form-data">
                    <div class="row g-3 justify-content-center">
                        <div class="col-12">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="title" name="name" required>
                        </div>

                        <div class="col-12 col-lg-6">
                            <label for="startyear" class="form-label">Start year:</label>
                            <input type="number" class="form-control" id="startyear" name="startyear" required>
                        </div>

                        <div class="col-12 col-lg-6" id="endyeardiv">
                            <div class="startyear">
                                <label for="endyear" class="form-label">End year:</label>
                                <div>
                                    <input class="form-check-input" type="checkbox" value="" data-status="open" id="flexCheckDefault" name="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">Undetermined end year</label>
                                </div>
                            </div>
                            <input type="number" class="form-control" id="endyear" name="endyear">

                        </div>

                        <div class="col-12">
                            <label for="description" class="form-label">committiee description</label>
                            <textarea class="form-control" id="description" rows="10" name="description" required></textarea>
                        </div>

                        <div class="col-12 col-lg-12">
                            <label for="image" class="form-label">Image:</label>
                            <input type="file" accept=".png, .jpeg, .jpg" class="form-control" id="image" name="image">
                        </div>

                        <button type="submit" class="col-12 col-lg-6 btn btn-primary">Create</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>

<script>
    new MultiSelectTag('days[]') // id
</script>
<script type="text/javascript" src="<?= base_url('assets/js/admin/committiees.js');?>"></script>
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>

<?= $this->endSection() ?>
