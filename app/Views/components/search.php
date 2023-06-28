<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/css/autoComplete.01.min.css">

<input id="autoComplete" class="border ">

<script src="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/autoComplete.min.js"></script>
<script>
    const autoCompleteJS = new autoComplete({
        placeHolder: "Search",
        data: {
            src: [
                <?php
                
                foreach ($array as $item) {
                    $value = '';

                    for ($i = 0; $i < count($fields); $i++) {
                        $value .= $item->{$fields[$i]};
                        if ($i !== count($fields) - 1) {
                            $value .= ' ';
                        }
                    }

                    if ($item === $array[count($array) - 1]) {
                        echo '"' . $value . '"';
                    } else {
                        echo '"' . $value . '",';
                    }
                }
                ?>
            ]
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
                }
            }
        }
    });
</script>