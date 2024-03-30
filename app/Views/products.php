<?php

$jquery_products = array_reduce($products, function ($carry, $val) {
    $carry[$val['id']] = $val;
    return $carry;
});

?>
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
                            <img src="<?= (@file_get_contents($image_url . $items['product_img'])) ? $image_url . $items['product_img'] : $image_url . '/uploads/no-image.png' ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-8">
                            <div class="card-body pb-0 pe-2">
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
                                    <div class="row pe-0">
                                        <div class="col-4">
                                            <h6 class="text-muted mb-1" style="font-size:0.6em;">Box Size</h6>
                                            <p class="text-muted mb-1" style="font-size:0.6em;"><strong><?= $items['box_size']; ?> Pcs/Box</strong></p>
                                        </div>
                                        <div class="col-8 px-0" style="float: inline-end;">
                                            <div class="input-group">
                                                <button class="btn btn-danger" type="button" onclick="remove_item($(this))"><i class="fa fa-minus text-white"></i></button>
                                                <input type="text" name="item_qty" data-id="<?= $items['id'] ?>" data-price="<?= $items['product_rate'] ?>" class="form-control shadow-none text-center" value="0" readonly>
                                                <button class="btn btn-danger" type="button" onclick="add_item($(this))"><i class="fa fa-plus text-white"></i></button>
                                            </div>
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

<div class="container-fluid bg-light fixed-bottom py-2 d-none" id="view_cart_box">
    <div class="row">
        <div class="col-6 pt-2">
            <h5 class="view_cart_text text-center"></h5>
        </div>
        <div class="col-6">
            <button type="button" class="btn btn-danger btn-lg btn-block w-100 py-1" data-bs-toggle="modal" data-bs-target="#cartModal" data-bs-whatever="@mdo">View Cart</button>
        </div>
    </div>
</div>
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-sm-down h-75">
        <div class="modal-content bg-body-secondary animate-bottom" style="border-radius: 30px 30px 0px 0px;">
            <div class="modal-body p-0" style="display: flex !important;align-items: flex-start;justify-content: center;">
                <button type="button" class="btn bg-danger btn-close text-white p-2 cart_close" data-bs-dismiss="modal" aria-label="Close" style="border-radius: 20px;position: fixed;top: -35px;background-color:chocolate;"></button>
                <div class="container-fluid p-0">
                    <div class="container-fluid p-2 shadow bg-white" style="border-radius: 30px 30px 0px 0px;">
                        <h3 class="text-center">Your Cart</h3>
                    </div>
                    <?= form_open('', ['method' => 'post']) ?>
                    <div class="container-fluid h-100 bg-white px-0 rounded-0">
                        <select class="form-select rounded-0" name="customer" aria-label=" Default select example" required>
                            <option value="" selected disabled>Select Customers</option>
                            <?php foreach ($customers as $value) : ?>
                                <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="container-fluid h-100 bg-white px-0 rounded-0">
                        <input type="date" name="date" class="form-control" placeholder="Delivery Date" required>
                    </div>
                    <div class="container-fluid p-1 ">
                        <input type="hidden" name="inventory" id="inventory" required>
                        <div class="row bg-white m-2" id="cart_body" style="border-radius: 5px;max-height: 53vh;overflow-y: scroll;">
                        </div>
                    </div>
                    <div class="container-fluid h-100 bg-white">
                        <div class="row fixed-bottom">
                            <button type="submit" class="btn btn-danger btn-lg btn-block w-100 py-1 rounded-0">Place Order</button>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        add_cart();
        item_check();
        view_cart_box();
        $('#inventory').val(getCookie('products'));
    });

    function item_check() {
        var cart_vals = JSON.parse(getCookie('products'));
        $.each(cart_vals, function(i, v) {
            $('#product_bucket').find('[data-id=' + i + ']').val(v['qty']);
        });
    }

    function view_cart_box() {
        var cart_vals_view = JSON.parse(getCookie('products'));
        var items_count = 0;
        $.each(cart_vals_view, function(i, v) {
            items_count += parseInt(v['qty']);
        });
        if (items_count > 0) {
            $('#view_cart_box').removeClass('d-none');
            $('.view_cart_text').text(items_count + ' Items');
        } else {
            $('#view_cart_box').addClass('d-none');
        }
    }

    function add_cart() {
        var prods = <?= json_encode($jquery_products) ?>;
        var cart_vals = JSON.parse(getCookie('products'));
        $body_content = '';
        $.each(cart_vals, function(i, v) {
            var val_prods = prods[i];
            $body_content += '<div class="col-12">';
            $body_content += '<div class="row pt-1">';
            $body_content += '<div class="col-8">';
            $body_content += '<h6 class="pt-1 pl-3">7' + val_prods['name'] + '</h6>';
            $body_content += '</div>';
            $body_content += '<div class="col-4 p-1 text-right">';
            $body_content += '<div class="input-group">';
            $body_content += '<button class="btn btn-danger p-1" type="button" onclick="remove_item($(this))"><i class="fa fa-minus text-white"></i></button>';
            $body_content += '<input type="text" name="item_qty" data-id="' + val_prods['id'] + '" data-price="' + val_prods['product_rate'] + '" data-type="cart"  class="form-control shadow-none text-center" value="' + v['qty'] + '" readonly disabled>';
            $body_content += '<button class="btn btn-danger p-1" type="button" onclick="add_item($(this))"><i class="fa fa-plus text-white"></i></button>';
            $body_content += '</div>';
            $body_content += '</div>';
            $body_content += '</div>';
            $body_content += '</div>';
        });
        $('#cart_body').html($body_content);
    }

    $(window).on('shown.bs.modal', function() {
        $('#cartModal').modal('show');
        add_cart();
    });

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

    function add_item(element) {
        var inp_qty = element.parent().find('input[name="item_qty"]');
        if (getCookie('products') != '') {
            var storage_json = JSON.parse(getCookie('products'));
        } else {
            var storage_json = {};
        }
        var item_qty = parseInt(inp_qty.val()) + 1;
        var item_price = inp_qty.data('price');
        var item_id = inp_qty.data('id');
        $.extend(storage_json, {
            [item_id]: {
                'qty': item_qty,
                'price': item_price
            }
        });
        inp_qty.val(item_qty);
        setCookie('products', JSON.stringify(storage_json), 30);
        $('#inventory').val(JSON.stringify(storage_json));
        view_cart_box();
        item_check();
    }

    function remove_item(element) {
        var inp_qty = element.parent().find('input[name="item_qty"]');
        if (getCookie('products') != '') {
            var storage_json = JSON.parse(getCookie('products'));
        } else {
            var storage_json = {};
        }
        var item_qty = parseInt(inp_qty.val()) - 1;
        var item_price = inp_qty.data('price');
        var item_id = inp_qty.data('id');
        var type = inp_qty.data('type');
        if (inp_qty.val() > 1) {
            $.extend(storage_json, {
                [item_id]: {
                    'qty': item_qty,
                    'price': item_price
                }
            });
            inp_qty.val(item_qty);
        } else {
            delete storage_json[item_id];
            if (type == 'cart') {
                element.parent().parent().parent().remove();
                $('#product_bucket').find('[data-id=' + item_id + ']').val(item_qty);
            } else {
                if (item_qty >= 0) {
                    inp_qty.val(item_qty);
                }
            }
        }
        if (Object.keys(storage_json).length == 0) {
            $(".cart_close").click();
        }
        setCookie('products', JSON.stringify(storage_json), 30);
        $('#inventory').val(JSON.stringify(storage_json));
        view_cart_box();
        item_check();
    }
</script>