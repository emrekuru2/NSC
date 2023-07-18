<input id="autoComplete-<?= $type ?>" class="border <?= $styling ?? null ?>">

<script>
    new autoComplete({
        placeHolder: "Search",
        selector: "<?= '#autoComplete-' . $type ?>",
        data: {
            src: [<?= $data ?>]
        },
        resultItem: {
            highlight: "text-primary",
        },
        events: {
            input: {
                selection: (event) => {
                    const selection = event.detail.selection.value;
                    window.location.href = `<?= base_url('admin/' . $type . '/read') ?>/${selection}`
                    console.log(selection)
                },
            }
        }
    });

    const inputField<?= $type ?> = document.getElementById("autoComplete-<?= $type ?>");

    inputField<?= $type ?>.addEventListener('focus', function() {
        inputField<?= $type ?>.classList.add('border-primary');
    });

    inputField<?= $type ?>.addEventListener('blur', function() {
        inputField<?= $type ?>.classList.remove('border-primary');
    });
</script>