<?= $this->extend('layouts/default') ?>

<?= $this->section('mainContent') ?>
<div class="container">
    <?php $session = \Config\Services::session(); ?>
    <?php if(session()->has('message')): ?>
        <script>
            toastr.success('<?php echo session()->getFlashdata("message"); ?>');
        </script>
    <?php endif; ?>

    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-6 mx-auto">
            <h1>Request to join a club</h1>
        <div class="mb-3">
            <form method="post" action="join_club">
                <label for="clubs-select" class="form-label">Select club you want to join:</label>
                <select class="form-select form-select-lg" name="clubs-select" id="clubs-select">
                    <option selected>Select one</option>
                    <?php foreach ($clubs as $club): ?>
                        <option value="<?php echo $club->id ?>"><?php echo $club->name ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" class="btn btn-primary mt-1">Submist request</button>
            </form>

        </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<!-- <div class="col-12">
    <label for="preferredClub" class="form-label">Preffered Club</label>
    <select id="preferredClub" class="form-select" name="preferredClub">
        <option selected>Choose...</option>
        <option value="AB">Halifax Cricket Club</option>
        <option value="BC">East Coast Cricket Club</option>
        <option value="MB">Nova Scotia Avengers Cricket Club</option>
    </select>
</div> -->