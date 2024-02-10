<div class="container-fluid px-0">
    <nav class="navbar fixed-top bg-white shadow">
        <div class="container-fluid" style="flex-wrap: wrap;justify-content: flex-start;">
            <a class="navbar-brand" href="#">
                <i class="fa fa-arrow-left text-muted"></i>
            </a>
            <h6 class="mb-0">
                Change Password
            </h6>
        </div>
    </nav>
</div>
<div class="container my-5 py-5">
    <?= form_open('', ['method' => 'post']) ?>
    <div class="form-floating mb-3">
        <input type="password" name="password" class="form-control" id="floatingInput">
        <label for="floatingInput">New Password</label>
    </div>
    <button type="submit" name="password_change" class="btn btn-primary float-right btn-block btn-md">Change Password</button>
    <?= form_close() ?>
</div>