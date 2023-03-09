<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

<div class="row">
    <div class="col-12 col-lg-7">
        <div class="card shadow">
            <div class="card-header">Send email</div>
            <div class="card-body">
                <form id="send-email-form" method="post" action="sendEmail">
                    <div class="form-group mb-3">
                        <label for="mailTo" class="form-label">Receiver(s) email</label>
                        <input type="text" name="mailTo" placeholder="example@email.com;" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" name="subject" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="message" class="form-label">Message</label>
                        <?= view_cell('\App\Libraries\Contents::editor') ?>
                    </div>
                    <div class="form-group">
                        <button type="button" id="form-submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                    <input type="hidden" name="groups" value="">
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-5">
        <div class="card shadow">
            <div class="card-header">Email groups</div>
            <div class="card-body">
                <?= view_cell('\App\Libraries\Contents::accordion', ['teams' => $teams, 'clubs' => $clubs, 'committees' => $committees, 'locations' => $locations, 'devs' => $devs]) ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/js/admin/emailRecipients.js'); ?>"></script>

<?= $this->endSection() ?>