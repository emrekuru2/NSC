<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>
<div class="col-lg-8">
    <div class="card shadow">
        <div class="card-header">Competition Details:
            <button style="float:right;" type="button" class="btn btn-secondary btn-sm w-25" onclick="history.back();">Back</button>
        </div>
        <div class="card-body">
            <form class="d-flex flex-column align-items-center" action="<?= base_url('admin/competitions/update' . "/" . $competition->id) ?>" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <div class="w-100 mb-3">
                    <label for="content" class="form-label">Competition Name</label>

                    <label for="title"></label><input type="text" name="name" value="<?= $competition->name ?>" class="form-control" id="title" readonly>
                </div>
                <div class="w-100 mb-3">
                    <label for="content" class="form-label">Description</label>
                    <label for="title"></label><input type="text" name="description" value="<?= $competition->description ?>" class="form-control" id="title" readonly>
                </div>
                <div class="w-100 mb-3">
                    <label for="content" class="form-label">Year Running</label>
                    <label for="title"></label><input type="text" name="yearRunning" value="<?= $competition->yearRunning ?>" class="form-control" id="title" readonly>
                </div>
                <?php
                // Connecting to the database and querying the competition type name
                $conn = mysqli_connect("localhost", "root", "", "cricket");
                $query = mysqli_query($conn, "SELECT name FROM nsca_competition_types WHERE id = '$competition->typeID'");
                $result1 = mysqli_fetch_array($query);
                $competitionTypeName = $result1['name'];
                ?>
                <div class="w-100 mb-3">
                    <label for="content" class="form-label">Competition Type</label>
                    <label for="title"></label><input type="text" name="competitionType" value="<?= $competitionTypeName ?>" class="form-control" id="title" readonly>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection() ?>