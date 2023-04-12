<?= $this->extend('layouts/admin') ?>

<?= $this->section('adminContent') ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>


<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete committee</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Are you sure you want to delete <?=$committee->name?>?
      <form method="post" action="deleteCommittee" id="delete">
                    <input type="hidden" value=<?=$committee->id?> name="id">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="delete-button" id="delete-button" class="btn btn-danger">Delete committee</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div>
        <div class="card shadow">
            <div class="card-header">Modify <?=esc($committee->name)?></div>
            <div class="card-body">
                <form method="post" action="modifyCommittee" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=esc($committee->id)?>">
                    <div class="row g-3 justify-content-center">
                        <div class="col-12">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="title" name="name" value="<?=esc($committee->name)?>" required>
                        </div>

                        <div class="col-12 col-lg-6">
                                <label for="startyear" class="form-label">Start year:</label>
                            <input type="number" class="form-control" id="startyear" name="startyear" value=<?=esc($years[0])?> required>
                        </div>
                            <div class="col-12 col-lg-6" id="endyeardiv">
                                <div class="startyear">
                                    <label for="endyear" class="form-label">End year:</label>
                                </div>
                                <?php if ($isActive) : ?>
                                    <input type="number" class="form-control" id="endyear" name="endyear" disabled>
                                <?php else: ?>
                                    <input type="number" class="form-control" id="endyear" name="endyear" value=<?=esc($years[1])?>>
                                <?php endif; ?>
                                <div>
                                    <?php if ($isActive) : ?>
                                        <input class="form-check-input" type="checkbox"  data-status="open" id="flexCheckDefault" name="flexCheckDefault" checked>
                                        <label class="form-check-label" for="flexCheckDefault">Undetermined end year</label>
                                    <?php else: ?>
                                        <input class="form-check-input" type="checkbox"  data-status="open" id="flexCheckDefault" name="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">Undetermined end year</label>
                                    <?php endif; ?>

                                </div>
                            </div>
                            <label for="users[]" class="form-label">Committee members:</label>
                            <select id="users[]" name="users[]" multiple="multiple" required>
                                <?php foreach ($users as $user) : ?>

                                    <?php if(in_array($user->id, $members, true)) : ?>
                                        <option value="<?=esc($user->id)?>" selected>
                                        <?=esc($user->first_name)?> <?=esc($user->last_name)?>
                                    </option>
                                    <?php else : ?>
                                        <option value="<?=esc($user->id)?>">
                                        <?=esc($user->first_name)?> <?=esc($user->last_name)?>
                                    </option>
                                    <?php endif ?>

                                <?php endforeach; ?>
                            </select>
                        <div class="col-12">
                            <label for="description" class="form-label">committiee description</label>
                            <textarea class="form-control" id="description" rows="10" name="description" required ><?=esc($committee->description)?></textarea>
                        </div>
                        <button type="submit" class="col-12 col-lg-6 btn btn-primary">Update</button>
                    </div>
                </form>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete Committee</button>
                <hr class="divider">
                <a href="committees" name="delete-button" id="delete-button" class="btn btn-warning">Back</a>
            </div>
        </div>
    </div>
<script type="text/javascript" src="<?= base_url('assets/js/admin/committiees.js'); ?>"></script>
<script>
    new MultiSelectTag('users[]') // id
</script>
<?= $this->endSection() ?>