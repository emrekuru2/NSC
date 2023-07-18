<div class="modal fade" id="<?= $id ?>" aria-labelledby="ClubModalLabel" aria-hidden="true">
    <?= form_open($action, ['class' => 'modal-dialog editMode']) ?>
    <input type="hidden" value="<?= $currentClub->id ?>" name="clubID">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5">Add <?= $selection ?></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p class="text-start">Select <?= $selection ?> to add to the <b><?= $currentClub->name ?></b></p>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Add</th>
                    </tr>
                </thead>
                <tbody id="add-team-list">
                    <?php if ($selection === 'Teams') : ?>
                        <?php if (empty($currentClub->getUnassignedTeams())) : ?>
                            <tr>
                                <td class="col-11 line-height-2rem">No <?= $selection ?> available</td>
                                <td class="col-1"></td>
                            </tr>
                        <?php else : ?>
                            <?php foreach ($currentClub->getUnassignedTeams() as $unassignedTeam) : ?>
                                <tr>
                                    <td class="col-11 line-height-2rem"><?= $unassignedTeam->name ?></td>
                                    <td class="col-1">
                                        <input type="checkbox" class="form-check-input shadow check-margin" value="<?= $unassignedTeam->id ?>" name="teamID[]">
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php endif ?>
                    <?php else : ?>
                        <?php if (empty($currentClub->getUnassignedMembers())) : ?>
                            <tr>
                                <td class="col-11 line-height-2rem">No <?= $selection ?> available</td>
                                <td class="col-1"></td>
                            </tr>
                        <?php else : ?>
                            <?php foreach ($currentClub->getUnassignedMembers() as $unassignedMember) : ?>
                                <tr>
                                    <td class="col-11 line-height-2rem"><?= $unassignedMember->getFullName() ?></td>
                                    <td class="col-1">
                                        <input type="checkbox" class="form-check-input shadow check-margin" value="<?= $unassignedMember->id ?>" name="userID[]">
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php endif ?>
                    <?php endif ?>

                </tbody>
            </table>
        </div>
        <div class="modal-footer group-modal-footer">
            <button type="submit" id="add-teams-button" class="btn btn-primary">Add</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
    </div>
    <?= form_close() ?>
</div>