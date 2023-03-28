<?php
/**
 * @file search.php
 * @brief Search bar component.
 * @details Search bar component for searching entities in database.
 *
 * @param string $route <p>Route name of the desired function.</p>
 * @param string $name <p>Name of section (Singular). E.g., 'Team', 'Club', 'Committee', etc.</p>
 * @param array $array <p>Array of entities from model. E.g., teams table, clubs table, etc.</p>
 *
 * Optional:
 * @param string $method <p>HTTP method of search (Default = 'get'). E.g., 'get', 'post', etc.</p>
 * @param boolean $useName <p>Use name in search bar title. E.g., true = 'Type to search teams...', false = 'Type to search...'.</p>
 */
?>

<form method="<?= $method ?? 'get' ?>" action="<?= $route ?>" autocomplete="off" id="search-form" class="margin-bottom-1rem">
    <table class="table margin-bottom-0">

        <thead class="border-style-none">
            <tr>
                <th scope="col" class="border-bottom-width-0 padding-bottom-0 border-style-none">Search<?= isset($useName) ? ' ' . $name . 's' : '' ?></th>
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

<script>
    let array = [
        <?php foreach ($array as $item) :
            if ($item != $array[count($array)-1]) echo '"' . $item->name . '",';
            else echo '"' . $item->name . '"';
        endforeach; ?>
    ]
</script>
<script type="text/javascript" src="<?= base_url('assets/js/search.js'); ?>"></script>