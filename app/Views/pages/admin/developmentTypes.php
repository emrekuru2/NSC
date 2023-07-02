<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?> 

<!-- Style for the deletion success alert -->
<style>
    .alert {
        padding: 10px;
        color: white;
        opacity: 1;
        transition: opacity 0.6s;
        margin-bottom: 15px;
        width: 400px;

    }

    .alert.success {
        background-color: #4CAF50;
    }

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 10px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }
</style>


<div class="row">
    <div class="col-lg-4">
            <div class="row-lg">
                <div class="col-lg-12">
                </div>
                <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header">DevelopmentTypes List</div>
                        <div class="card-body">
                                <ul class="list-group w-100">
                                        <?php if ($devType) : ?>
                                            <?php foreach ($devType as $row) : ?>
                                                <li class="list-group-item">
                                                    <div class="form-check d-flex align-items-center">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" value="<?= $row->id ?>" id="<?= $row->id ?>">
                                                        <label class="form-check-label mx-1 flex-grow-1" for="<?= $row->id ?>"><?= $row->name ?></label>
                                                        <div class="">
                                                            <a class="btn btn-primary" href=<?= base_url('admin/editDevType/' . $row->id) ?> role="button">Edit</a>
                                                            <a class="btn btn-primary btn-danger btn-sm" href="<?= base_url('admin/developmentTypes/delete/' . $row->id) ?>" onclick="return confirm('Are you sure you want to delete this Development Type?')">Delete</a>
                                                        </div>
                                                    </div>   
                                                </li>
                                            <?php endforeach ?>
                                        <?php else : ?>
                                 <?php endif ?>
                            </ul>
                        </div>
                 </div>
             </div>
            </div>
        </div>
        <div class="col-lg-7">
        <div class="card shadow">
            <div class="card-header d-flex">
                <span class="flex-grow-1">Development Type Details</span>
                <?php if (isset($editMode)) : ?>
                    <a href=<?= base_url('admin/developmentTypes') ?> role="button">Return back</a>
                <?php endif ?>
            </div>
            <div class="card-body">
                <form class="d-flex flex-column align-items-center" method="post" action="<?= $editMode ? base_url('admin/updateDev/' . $currentDev->id) : base_url('admin/developmentTypes/store') ?>">
                    <div class="w-100 mb-3">
                        <label for="title" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="title" value="<?= $editMode ? $currentDev->name : null ?>" required>
                    </div>
                    <div class="w-100 mb-3">
                        <label for="content" class="form-label">Description</label>
                        <textarea class="form-control" id="des" name="desc" rows="10" required><?= $editMode ? $currentDev->desc : null ?></textarea>
                    </div>
                    <div class="w-100 mb-3">
                        <label for="minAge" class="form-label">Minimum Age</label>
                        <input type="number" class="form-control" name="min_age" id="minAge" value="<?= $editMode ? $currentDev->min_age : null ?>" required>
                     </div>
                     <div class="w-100 mb-3">
                        <label for="maxAge" class="form-label">Maximum Age</label>
                        <input type="number" class="form-control" name="max_age" id="maxAge" value="<?= $editMode ? $currentDev->max_age : null ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-50"><?= $editMode ? "Update" : "Create" ?> the development Type</button>
                </form>
            </div>
        </div>
     </div>
    </div>
</div>

<!-- Script to close the deletion successful message -->
<script>
    function closeAlert() {
        document.getElementById("alertMessage").style.display = 'none';
    }
</script>

<?= $this->endSection() ?>  

<!-- <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header">Create Development Type: </div>
                <div class="card-body">
                    <form class="d-flex flex-column align-items-center" action = "<?= base_url('admin/developmentTypes/store') ?>" method="POST">
                        <div class="w-100 mb-3">
                            <label for="content" class="form-label">Development Type Name</label>
                            <label for="title"></label><input type="text" name="name" class="form-control" id="title" required>
                        </div>
                        <div class="w-100 mb-3">
                            <label for="content" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="content" rows="10" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-25">Create</button>
                    </form>
                </div>
            </div>
        </div> -->