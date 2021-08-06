<?php
include __DIR__ . "/../Layouts/header.php";
include __DIR__ . "/../Layouts/navbar.php";
?>
    <form action="<?= url(); ?>" method="post">
        <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword2" class="form-label">Password Confirm</label>
            <input type="password" class="form-control" id="exampleInputPassword2" name="password_conf" required>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
        <a href="/login" class="btn btn-danger">Назад</a>
    </form>
<?php
include __DIR__ . "/../Layouts/footer.php";
?>