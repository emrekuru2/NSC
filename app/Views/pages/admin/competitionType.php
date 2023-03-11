<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>
    <div class="row">
        <div class="col-lg-4">
            <div class="row-lg">
                <div class="col-lg-12">

                </div>
                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="card-header">Competition Type List</div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Competiton Type Name</th>
                                </tr>
                                </thead>
                                <?php
                                    if(session()->getFlashdata('status')){
                                        ?>
                                          <div>
                                              <strong>Hey!</strong> <?=session()->getFlashdata('status');?>
                                          </div>
                                        <?php
                                    }

                                ?>
                                <tbody class="table-group-divider">
                                <!-- THIS PART NEEDS TO BE DYNAMICALLY GENERATED -->
                                <?php if ($competitionType):?>
                                    <?php foreach($competitionType as $row) :?>
                                    <tr>
                                        <td><?php echo $row['id']?></td>
                                        <td><?php echo $row['name']?></td>
                                        <td>
                                            <a href="<?= base_url('admin/CompetitionType/edit/' .$row['id']) ?>" class="">Edit</a>
                                            <a href="#" class="">Delete</a>
                                        </td>
                                    </tr>
                                   <?php endforeach; ?>
                                <?php endif;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header">Create Competition Type: </div>
                <div class="card-body">
                    <form class="d-flex flex-column align-items-center"<?= base_url('add')?> method="POST">
                        <div class="w-100 mb-3">
                            <label for="content" class="form-label">Competition Type Name</label>
                            <label for="title"></label><input type="text" name="name" class="form-control" id="title">
                        </div>
                        <div class="w-100 mb-3">
                            <label for="content" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="content" rows="10"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-25">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>