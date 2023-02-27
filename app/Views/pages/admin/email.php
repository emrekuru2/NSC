<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>

<?php if (isset($type)) : ?>
    <?= view_cell('\App\Libraries\Alerts::toast', ['type' => $type, 'content' => $content]) ?>
    <script type='text/javascript' src="/assets/js/toast.js"></script>
<?php endif ?>

<div class="row">
    <div class="col-12 col-lg-7">
        <div class="card shadow">
            <div class="card-header">Send email</div>
            <div class="card-body">
                <form method="post" action="sendEmail">
                    <div class="form-group mb-3">
                        <label for="mailTo" class="form-label">Reciever(s) email</label>
                        <input type="text" name="mailTo" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" name="subject" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea rows="6" type="text" name="message" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-5">
        <div class="card shadow">
            <div class="card-header">Email groups</div>
            <div class="card-body">
                <?= view_cell('\App\Libraries\Contents::accordion') ?>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection() ?>