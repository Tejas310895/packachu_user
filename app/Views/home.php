<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-12 my-2 fixed-top">
            <img class="img-thumbnail w-75 d-block mx-auto border-0" src="public/assets/images/logo.jpg" alt="">
        </div>
        <div class="col-md-12 my-5 py-5">
            <div class="row">
                <?php foreach ($products as $items) : ?>
                    <div class="col-4 g-3">
                        <div class="card border-0 shadow">
                            <img src="<?= $image_url  . $items['product_img'] ?>" class="card-img-top p-0 pb-2" alt="...">
                            <div class="card-body pb-2 pt-0 px-2 text-center">
                                <h6 class="card-text text-muted fw-bold" style="font-size:0.6em !important;"><?= $items['name'] ?></h6>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
<ul class="nav justify-content-center fixed-bottom bg-white shadow-lg">
    <li class="nav-item text-center" style="width:33%;">
        <a class="nav-link text-secondary text-opacity-75" href="<?= base_url() ?>">
            <i class="fa-solid fa-house fa-2xl"></i>
        </a>
    </li>
    <li class="nav-item text-center" style="width:33%;">
        <a class="nav-link text-secondary text-opacity-75" href="products">
            <i class="fa-solid fa-boxes-stacked fa-2xl"></i>
        </a>
    </li>
    <li class="nav-item text-center" style="width:33%;">
        <a class="nav-link text-secondary text-opacity-75" href="profile">
            <i class="fa-solid fa-user fa-2xl"></i>
        </a>
    </li>
</ul>