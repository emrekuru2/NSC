<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/css/autoComplete.01.min.css">

<input id="autoComplete"  type="search" dir="ltr" spellcheck=false autocorrect="off" autocomplete="off" autocapitalize="off" maxlength="2048" tabindex="1">

<script src="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/autoComplete.min.js"></script>
<script>
    const config = {
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
        }
    }
    const autoCompleteJS = new autoComplete(config);
</script>
