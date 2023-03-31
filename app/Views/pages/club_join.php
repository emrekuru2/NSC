<?= $this->extend('layouts/default') ?>

<?= $this->section('mainContent') ?>
<div class="container">
    <?php $session = \Config\Services::session(); ?>
    <?php if(session()->has('message')): ?>
        <script>
            toastr.success('<?php echo session()->getFlashdata("message"); ?>');
        </script>
    <?php endif; ?>
    
    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <form class="modal fade" id="confirmSubmission" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Confirm request to join club</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="hiddenPara" hidden></p>
                    <script>
                        const selectedClubID = document.getElementById('clubs-select').value;
                        document.getElementById('hiddenPara').innerHTML = selectedClubID;
                    </script>
                    <p>You have requested to join:</p>
                    <p id="modal-message"></p>
                    <p>Do you want to confirm?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="modal-submit" form="club-select-form" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </div>
    </form>
    
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-6 mx-auto">
            <h1>Request to join a club</h1>
        <div class="mb-3">
            <form method="post" id="club-select-form" action="join_club">
                <label for="clubs-select" class="form-label">Select club you want to join:</label>
                <select class="form-select form-select-lg" name="clubs-select" id="clubs-select">
                    <option selected value="0">Select one</option>
                    <?php foreach ($clubs as $club): ?>
                        <option value="<?= $club->name ?>"><?php echo $club->name ?></option>
                    <?php endforeach; ?>
                </select>
                <!-- Modal trigger button -->
                <button type="button"  id="submit" class="btn btn-primary btn-lg mt-1" data-bs-toggle="modal" data-bs-target="#confirmSubmission">
                    Submit request
                </button>
            </form>

        </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/clubJoin.js') ?>"></script>

<?= $this->endSection() ?>