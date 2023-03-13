<?php
/**
 * @param string $title <p>Name of section. E.g., 'Teams', 'Clubs', 'Committees', etc.</p>
 * @param array $rows <p>Array of entities from section model. E.g., clubs table, teams table, etc. Recommended to use the findAll() model function.</p>
 */
?>

<div class="card shadow">
    <div class="card-header">Search <?= $title ?></div>
    <div class="card-body">

        <table class="table margin-bottom-0">
            <tbody>
            <tr class="border-style-none">
                <td class="col-11">
                    <input class="form-control form-control-sm" list="<?= strtolower($title); ?>-list" id="search-bar" placeholder="Type to search <?= strtolower($title); ?>...">
                    <datalist id="<?= strtolower($title); ?>-list">
                        <?php foreach ($rows as $row): ?>
                            <option value="<?= $row->name ?>">
                        <?php endforeach ?>
                    </datalist>
                </td>

                <td class="col-1">
                    <button type="button" id="search-bar-button" class="btn btn-primary btn-sm">Edit</button>
                </td>
            </tr>
            </tbody>
        </table>

    </div>
</div>