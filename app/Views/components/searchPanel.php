<?php
/**
 * @param string $groupName <p>Name of section (Singular). E.g., 'Team', 'Club', 'Committee', etc.</p>
 * @param array $rows <p>Array of entities from section model. E.g., clubs table, teams table, etc. Recommended to use the findAll() model function.</p>
 * @param string $typeOfSearch <p>Type of search. E.g., 'Edit', 'Search', 'Find', etc.</p>
 */
?>

<div class="card shadow">
    <div class="card-header">Search <?= $groupName ?>s</div>
    <div class="card-body">

        <table class="table margin-bottom-0">
            <tbody>
                <form method="post" action="edit<?= $groupName ?>" id="search-form">
                    <tr class="border-style-none">
                        <td class="col-11">
                            <input class="form-control form-control-sm" list="<?= strtolower($groupName); ?>s-list" name="search" id="search-bar" placeholder="Type to search <?= strtolower($groupName); ?>...">
                            <datalist id="<?= strtolower($groupName); ?>s-list">
                                <?php foreach ($rows as $row): ?>
                                    <option value="<?= $row->name ?>">
                                <?php endforeach ?>
                            </datalist>
                        </td>

                        <td class="col-1">
                            <button type="button" id="search-bar-button" class="btn btn-primary btn-sm"><?= $typeOfSearch ?? 'Search' ?></button>
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>

    </div>
</div>