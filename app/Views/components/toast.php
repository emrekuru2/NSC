<div id="emailToast" class="toast bottom-0 start-50 position-absolute text-bg-<?= $type ?> " role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
        <div class="toast-body">
            <?= $content ?>
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
</div>
<script type='text/javascript' src="/assets/js/toast.js"></script>
