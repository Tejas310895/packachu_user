<div class="container-fluid px-0">
    <nav class="navbar fixed-top bg-white shadow">
        <div class="container-fluid" style="flex-wrap: wrap;justify-content: flex-start;">
            <a class="navbar-brand" href="#" onclick="history.back()">
                <i class="fa fa-arrow-left text-muted"></i>
            </a>
            <?= form_open('/u/sign-up', ['csrf_id' => 'my-id', 'style' => 'width: 90%;']) ?>
            <input class="form-control rounded-1 shadow-none" placeholder="Search products here" oninput="search_product($(this))">
            <?= form_close() ?>
        </div>
    </nav>
</div>
<div class="container mb-5">    
    <div class="row h-40 mt-5 pt-4 px-2" id="product_bucket">
        <?php foreach ($products as $items) : ?>
            <div class="g-col-md-12">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-4">
                            <img src="<?= $image_url . $items['product_img'] ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-8">
                            <div class="card-body pb-0">
                                <h6 class="card-title"><?= $items['name'] ?></h6>
                                <div class="row">
                                    <div class="col-4 text-left">
                                        <h6 class="text-muted mb-1" style="font-size:0.6em;">MRP</h6>
                                        <p class="text-muted mb-1" style="font-size:0.6em;"><strong><?= $items['product_mrp'] ?>/Pcs</strong></p>
                                    </div>
                                    <div class="col-4 text-left">
                                        <h6 class="text-muted mb-1" style="font-size:0.6em;">Rate</h6>
                                        <p class="text-muted mb-1" style="font-size:0.6em;"><strong><?= $items['product_rate'] ?>/Pcs</strong></p>
                                    </div>
                                    <div class="col-4 text-left">
                                        <h6 class="text-muted mb-1" style="font-size:0.6em;">Margin</h6>
                                        <p class="text-muted mb-1" style="font-size:0.6em;"><strong><?= round(100 - (($items['product_rate'] / $items['product_mrp']) * 100)) ?>/Pcs</strong></p>
                                    </div>
                                    <!-- <div class="col-12">
                                        <span class="badge float-end text-bg-danger fw-lighter">20% discount</span>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<script>
    function search_product(element) {
        var search_text = element.val();
        if (search_text.length > 1) {
            $('div#product_bucket').find('.g-col-md-12').each(function() {
                if ($(this).find('.card-title').text().toUpperCase().indexOf(search_text.toUpperCase()) != -1) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            })
        } else {
            $('div#product_bucket').find('.g-col-md-12').each(function() {
                $(this).show();
            })
        }
    }
</script>