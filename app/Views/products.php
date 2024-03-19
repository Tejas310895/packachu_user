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
                                        <p class="text-muted mb-1" style="font-size:0.6em;"><strong><?= ($items['product_mrp'] != 0) ? round(100 - (($items['product_rate'] / $items['product_mrp']) * 100)) : 0; ?>/Pcs</strong></p>
                                    </div>
                                    <div class="col-12 mt-1 p-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control shadow-none" placeholder="Enter Qty">
                                            <button class="btn btn-danger" type="button" id="button-addon1">ADD</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<div class="container-fluid bg-light fixed-bottom py-2">
    <div class="row">
        <div class="col-6 pt-2">
            <h5>₹ 230 | 100 Items</h5>
        </div>
        <div class="col-6">
            <button type="button" class="btn btn-danger btn-lg btn-block w-100 py-1" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">View Cart</button>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-sm-down h-75">
        <div class="modal-content bg-body-secondary animate-bottom" style="border-radius: 30px 30px 0px 0px;">
            <div class="modal-body p-0" style="display: flex !important;align-items: flex-start;justify-content: center;">
                <button type="button" class="btn bg-danger btn-close text-white p-2" data-bs-dismiss="modal" aria-label="Close" style="border-radius: 20px;position: fixed;top: -35px;background-color:chocolate;"></button>
                <div class="container-fluid p-0">
                    <div class="container-fluid p-3 shadow bg-white" style="border-radius: 30px 30px 0px 0px;">
                        <h3 class="text-center">Your Cart</h3>
                    </div>
                    <div class="container-fluid p-1 ">
                        <div class="row bg-white" style="border-radius: 5px;">
                            <div class="col-12">
                                <div class="row pt-2">
                                    <div class="col-6">
                                        <h6 class="pt-1 pl-3">72mtr Aluminium Foil</h6>
                                    </div>
                                    <div class="col-3 pb-2 text-right">
                                        <input type="text" class="form-control py-0" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                    </div>
                                    <div class="col-3 pt-2 text-right">
                                        <h6 style="text-align: right;">₹ 230</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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