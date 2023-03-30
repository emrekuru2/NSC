<?= $this->extend('layouts/default') ?>

<?= $this->section('mainContent') ?>
    <!-- Header-->
    <header class="py-5">
        <div class="container px-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xxl-6">
                    <div class="text-center my-5">
                        <h1 class="fw-bolder mb-3">Nova Scotia Cricket Association</h1>
                        <p class="lead fw-normal text-muted mb-4">In 1965 the Nova Scotia Cricket Association (NSCA) was officially formed at the first meeting called for that purpose, held at the YMCA, South Park Street, Halifax. Nova Scotia Cricket Association (NSCA) became a member of the national cricket body, Cricket Canada, (formerly Canadian Cricket Association) in 1966. In 1975 the City of Halifax granted permission for the sport to be played on the north commons.
                            (Excerpts taken from "A History of Cricket in Nova Scotia" by Bhan Deonarine)</p>
                        <a class="btn btn-primary btn-lg" href="http://cricketnovascotia.ca/documents/history.pdf">Read our story (Bhan Deonarine)</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- About section one-->
    <section class="py-5 bg-light" id="scroll-target">
        <div class="container px-5 my-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6"><img class="img-fluid rounded mb-5 mb-lg-0" src="https://dummyimage.com/600x400/343a40/6c757d" alt="..." /></div>
                <div class="col-lg-6">
                    <h2 class="fw-bolder">Constitution of the Nova Scotia Cricket Association</h2>
                    <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto est, ut esse a labore aliquam beatae expedita. Blanditiis impedit numquam libero molestiae et fugit cupiditate, quibusdam expedita, maiores eaque quisquam.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- About section two-->
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 order-first order-lg-last"><img class="img-fluid rounded mb-5 mb-lg-0" src="https://dummyimage.com/600x400/343a40/6c757d" alt="..." /></div>
                <div class="col-lg-6">
                    <h2 class="fw-bolder">Special Resolution - AGM 2019</h2>
                    <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto est, ut esse a labore aliquam beatae expedita. Blanditiis impedit numquam libero molestiae et fugit cupiditate, quibusdam expedita, maiores eaque quisquam.</p>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>