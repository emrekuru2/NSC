<?= $this->extend('layouts/default') ?>

<?= $this->section('mainContent') ?>
<div class="container" style="height: 100%;">
    <?php $session = \Config\Services::session(); ?>
    <?php if(session()->has('message')): ?>
        <script>
            toastr.success('<?php echo session()->getFlashdata("message"); ?>');
        </script>
    <?php endif; ?>
    
    <!-- confirm join modal -->
    <form class="modal fade" id="confirmSubmission" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Confirm request to join club</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>You have requested to join: <span id="modal-message" style="font-weight: bold;"></span>.</p>
                    <p>Do you want to confirm?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="modal-submit" form="club-select-form" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </div>
    </form>

    <!-- confirm delete modal -->
    <form class="modal fade" id="confirmDelete" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Confirm deletion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete your previous request?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="modal-submit" form="request-delete-form" class="btn btn-primary">Delete request</button>
                </div>
            </div>
        </div>
    </form>
    
    <div class="row card h-100 shadow border-0 mt-5">
        <div class="col-sm-9 col-md-7 col-lg-6 mx-auto">
            <h1 style="margin-top: 5vh;" >Request to join a club</h1>
        <div style="margin-top: 5vh;" class="mb-3">
            <form method="post" id="club-select-form" action="join_club">
                <label for="clubs-select" class="form-label" hidden>Select club you want to join:</label>
                <select class="form-select form-select-lg" name="clubs-select" id="clubs-select">
                    <option selected value="0">Select club</option>
                    <?php foreach ($clubs as $club): ?>
                        <option value="<?= $club->name ?>"><?php echo $club->name ?></option>
                    <?php endforeach; ?>
                </select>
                <!-- Modal trigger button -->
                <button type="button"  id="submit" class="btn btn-primary btn-lg mt-3" data-bs-toggle="modal" data-bs-target="#confirmSubmission">Submit request</button>
            </form>

        </div>
        </div>
    </div>
    
    <div class="row card h-100 shadow border-0 mt-5">
        <div class="col-sm-9 col-md-7 col-lg-6 mx-auto">
            <div class="table-responsive">
                <table class="table table-primary mt-3 border-round">
                    <thead>
                        <tr>
                            <th scope="col">You requested to join:</th>
                            <th scope="col">Date</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="border-round">
                        <tr class="">
                            <td scope="row"><?= $previousRequest != null ? $previousRequestClub : 'none' ?></td>
                            <td><?= $previousRequest != null ? $previousRequestDate : '' ?></td>
                            <td> <!-- Add a delete button that calls the deleteRow() function -->
                            <?php if ($previousRequest != null): ?>
                                <form id="request-delete-form" action="<?= site_url('delete_request') ?>" method="post">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#confirmDelete" class="btn btn-danger"<?= $previousRequest != null ? '' : 'disabled' ?>>Delete</button>
                                </form>
                            <?php endif; ?>
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/clubJoin.js') ?>"></script>

<?= $this->endSection() ?>