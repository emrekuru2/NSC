<?php
/**
 * @param string $route <p>Function name of the desired route.</p>
 * @param string $name <p>Name of section (Singular). E.g., 'Team', 'Club', 'Committee', etc.</p>
 * @param array $rows <p>Array of entities from model. E.g., teams table, clubs table, etc.</p>
 */
?>

<form method="get" action="<?= $route ?>" autocomplete="off" id="search-form" class="margin-bottom-1rem">
    <table class="table margin-bottom-0">

        <thead class="border-style-none">
            <tr>
                <th scope="col" class="border-bottom-width-0 padding-bottom-0 border-style-none">Search</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="col-11 border-style-none">
                    <div class="autocomplete">
                        <input class="form-control form-control-sm" type="text" id="search" name="search" placeholder="Type to search <?= strtolower($name); ?>...">
                    </div>
                </td>
            </tr>
        </tbody>

    </table>
</form>

<script>
    let array = ['Falcons', 'Lions', 'Tigers', 'Test Team', 'Certified Bruh Moments']
</script>
<script type="text/javascript" src="<?= base_url('assets/js/search.js'); ?>"></script>