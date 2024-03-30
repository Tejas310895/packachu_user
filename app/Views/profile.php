<div class="container-fluid px-0">
    <nav class="navbar fixed-top bg-white shadow">
        <div class="container-fluid" style="flex-wrap: wrap;justify-content: flex-start;">
            <a class="navbar-brand" href="#" onclick="history.back()">
                <i class="fa fa-arrow-left text-muted"></i>
            </a>
            <h6 class="mb-0">
                Change Password
            </h6>
        </div>
    </nav>
</div>
<div class="container mt-5 mb-3 pt-5 ">
    <?= form_open('', ['method' => 'post']) ?>
    <div class="form-floating mb-3">
        <input type="password" name="password" class="form-control" id="floatingInput">
        <label for="floatingInput">New Password</label>
    </div>
    <button type="submit" name="password_change" class="btn btn-primary float-right btn-block btn-md">Change Password</button>
    <?= form_close() ?>
</div>
<div class="container">
    <div class="card mb-2">
        <div class="card-body text-center p-2">
            Order Details
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="accordion" id="accordionExample">
                <?php

                use App\Models\OrdersModal;

                foreach ($orders as $key => $value) :
                ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button <?= ($key == 0) ? '' : 'collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= $value['id'] ?>" aria-expanded="<?= ($key == 0) ? 'true' : 'false' ?>" aria-controls="collapseOne">
                                Order #<?= $value['id'] ?> &nbsp;<span class="badge text-bg-primary"><?= OrdersModal::$status[$value['status']] ?></span>
                            </button>
                        </h2>
                        <div id="collapse-<?= $value['id'] ?>" class="accordion-collapse collapse <?= ($key == 0) ? 'show' : '' ?>" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul class="list-group">
                                    <?php foreach (json_decode($value['inventory'], true) as $prod_id => $value) : ?>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <?= $products[$prod_id]['name'] ?>
                                            <span class="badge text-bg-primary rounded-pill"><?= $value['qty'] ?></span>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>