<?php
/**
 * @param string $groupName <p>Name of section (Singular). E.g., 'Team', 'Club', 'Committee', etc.</p>
 * @param array $rows <p>Array of entities from section model. E.g., clubs table, teams table, etc. Recommended to use the findAll() model function.</p>
 * @param string $typeOfSearch <p>Type of search. E.g., 'Edit', 'Search', 'Find', etc.</p>
 */
?>

    <form method="post" action="edit<?= $groupName ?>" autocomplete="off" id="search-form" class="margin-bottom-1rem">
        <table class="table margin-bottom-0">
            <thead>
                <tr>
                    <th scope="col" class="border-bottom-width-0 padding-bottom-0">Search</th>
                    <th scope="col" class="border-bottom-width-0 padding-bottom-0"></th>
                </tr>
            </thead>
            <tbody>
            <tr class="border-style-none">
                <td class="col-11">
                    <div class="autocomplete">
                        <input class="form-control form-control-sm" type="text" id="search" name="search" placeholder="Type to search <?= strtolower($groupName); ?>...">
                    </div>
                </td>

                <td class="col-1">
                    <button type="button" id="search-bar-button" class="btn btn-primary btn-sm"><?= $typeOfSearch ?? 'Search' ?></button>
                </td>
            </tr>
            </tbody>
        </table>
    </form>

    <script>
        let array = ['Falcons', 'Lions', 'Tigers', 'Test Team', 'Certified Bruh Moments']
    </script>
    <script type="text/javascript" src="<?= base_url('assets/js/search.js'); ?>"></script>