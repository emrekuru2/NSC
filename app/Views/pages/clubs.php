<?= $this->extend('layouts/default') ?>

<?= $this->section('mainContent') ?>

<div class="container my-5">


        <!-- Section: Block Content -->
        <section class="dark-grey-text text-center">

            <h1 class="display-3 text-center font-weight-bold">Clubs</h1>
            <br>

            <!-- Grid row -->
            <div class="row">
                <?php if (!empty($clubs) && is_array($clubs)) : ?>
                    <?php foreach ($clubs as $club) : ?>
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" src="<?=base_url("/assets/images/Clubs/default.png")?>" alt="..." />
                            <div class="card-body p-4">
                                <input type="hidden" name="club-json" value="{ 'name':'<?=$club->name?>', 'email':'<?=$club->email?>', 'description':'<?=$club->description?>', 'website':'<?=$club->website?>', 'phone':'<?=$club->phone?>', 'facebook':'<?=$club->facebook?>' }" name="clubJSON">
                                <button type="button" name="club-button" id="<?=$club->id?>" class="btn btn-primary" ><?=$club->name?></button>                                
                            </div>
                        </div> 
                    </div>

                        <!-- Grid column -->
                    <?php 
                    endforeach; 
                    ?>

                    <!-- Modal -->
                    
                    <div class="modal fade" id="clubsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modal-header"><?= esc($clubs[1]->name) ?></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><?= esc($clubs[1]->email) ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                        </div>
                    </div>
                    </div>
                <?php endif; ?>
        

            </div>

        </section>
        <!-- Section: Block Content -->

        <script>

            let clubInfoButtons = document.getElementsByName('club-button');
            let clubJsons = document.getElementsByName('club-json');

            console.log(clubInfoButtons)

            for (let i = 0; i < clubInfoButtons.length; i++) {
                clubInfoButtons[i].addEventListener('click', (event) => {
                    let json = JSON.parse(clubJsons[i]);
                    console.log(json.name)
                    document.getElementById('model-header').innerText = json.name
                    
                })
            }
        </script>


    </div>


<?= $this->endSection() ?>