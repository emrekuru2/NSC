<?php
/**
 * @file search.php
 * @brief Search bar component.
 * @details Search bar component for searching entities in database. Use '$this->request->getVar('search')' inside a controller to get search term.
 *
 * Required:
 * @param string $route <p>Route name of the desired function.</p>
 * @param string $name <p>Name of section (Singular). E.g., 'Team', 'Club', 'Committee', etc.</p>
 * @param array $array <p>Array of entities from model. E.g., teams table, clubs table, etc.</p>
 * @param array $fields <p>Array of field names from model to display. E.g., ['name'], ['first_name', 'last_name'], etc.</p>
 *
 * Optional:
 * @param string $method <p>HTTP form method. 'get' or 'post' (Default = 'get').</p>
 * @param boolean $useName <p>Use name in search bar placeholder (Default = false). E.g., true = 'Type to search teams...', false = 'Type to search...'.</p>
 * @param boolean $useDivider <p>Use divider underneath search bar (Default = false).</p>
 */
?>

<form method="<?= $method ?? 'get' ?>" action="<?= $route ?>" autocomplete="off" id="search-form" class="margin-bottom-1rem">
    <table class="table margin-bottom-0">

        <thead class="border-style-none">
            <tr>
                <th scope="col" class="border-bottom-width-0 padding-top-0 padding-bottom-0 border-style-none">Search<?= isset($useName) ? ' ' . $name . 's' : '' ?></th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="col-11 border-style-none">
                    <div class="autocomplete">
                        <input class="form-control" type="text" id="search" name="search" placeholder="Type to search<?= isset($useName) ? ' ' . strtolower($name) . 's...' : '...' ?>">
                    </div>
                </td>
            </tr>
        </tbody>

    </table>
</form>

<?= isset($useDivider) ? '<hr class="divider">' : '' ?>

<script>
    let array = [
        <?php foreach ($array as $item) :
            $value = '';
            for ($i = 0; $i < count($fields); $i++) {
                $value .= $item->{$fields[$i]};
                if ($i != count($fields)-1) {
                    $value .= ' ';
                }
            }


            if ($item == $array[count($array)-1]) {
                echo '"' . $value . '"';
            }
            else {
                echo '"' . $value . '",';
            }
        endforeach; ?>
    ]
</script>
<script type="text/javascript" src="<?= base_url('assets/js/search.js'); ?>"></script>