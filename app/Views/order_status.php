<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Packachu</title>
    <link rel="stylesheet" href="<?= base_url() ?>/public/assets/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/assets/css/styles.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/assets/fontawesome/css/all.min.css">
    <script src="<?= base_url() ?>/public/assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/public/assets/bootstrap/dist/js/bootstrap.js"></script>
    <script src="<?= base_url() ?>/public/assets/bootstrap/dist/js/jquery-3.7.1.min.js"></script>
    <script src="<?= base_url() ?>/public/assets/fontawesome/js/all.min.js"></script>
    <script src="<?= base_url() ?>/public/assets/js/custom.js"></script>
</head>

<body>
    <div class="container-fluid p-0 bg-transparent h-100 d-flex align-items-center justify-content-center">
        <div class="row">
            <div class="col-12">
                <?php
                if ($status == 'success') :
                ?>
                    <img src="<?= $image_url . '/uploads/success.gif' ?>" class="img img-thumbnail border-0" alt="" srcset="">
                <?php elseif ($status == 'failed') : ?>
                    <img src="<?= $image_url . '/uploads/failed.png' ?>" class="img img-thumbnail border-0 p-5 w-75 d-block mx-auto" alt="" srcset="">
                <?php endif ?>
            </div>
            <div class="col-12 mb-3">
                <?php
                if ($status == 'success') :
                ?>
                    <h5 class=" text-center display-3">Order Placed Successfully</h5>
                <?php elseif ($status == 'failed') : ?>
                    <h5 class=" text-center display-3">Order Failed</h5>
                <?php endif ?>
            </div>
            <div class="col-12 text-center">
                <?php
                if ($status == 'success') :
                ?>
                    <a href="products" type="button" class="btn btn-danger">Order More</a>
                <?php elseif ($status == 'failed') : ?>
                    <a href="products" type="button" class="btn btn-danger">Try Again</a>
                <?php endif ?>
            </div>
        </div>
    </div>
</body>

</html>