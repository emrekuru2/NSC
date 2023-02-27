<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>
<div class="row">
    <div class="col-lg-4">
        <div class="row-lg">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header">Current Alert</div>
                    <div class="card-body d-flex">
                        <h2 class="card-title flex-grow-1">2</h2>
                        <a class="btn btn-outline-danger">Disable</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header">Alert List</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Alert title</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <!-- THIS PART NEEDS TO BE DYNAMICALLY GENERATED -->
                                <tr>
                                    <td>1</td>
                                    <td>No games today!</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Otto</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card shadow">
            <div class="card-header">Alert Card: <b>2</b></div>
            <div class="card-body">
                <form class="d-flex flex-column align-items-center">
                    <div class="w-100 mb-3">
                        <label for="title" class="form-label">Alert title</label>
                        <input type="text" class="form-control" id="title">
                    </div>
                    <div class="w-100 mb-3">
                        <label for="content" class="form-label">Alert content</label>
                        <textarea class="form-control" id="content" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-25">Publish</button>
                </form>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection() ?>