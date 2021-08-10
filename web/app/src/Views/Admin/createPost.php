<?php
include __DIR__ . "/../Layouts/header.php";
include __DIR__ . "/../Layouts/navbarAuth.php";
?>
    <div class="container">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title Post">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
<?php
include __DIR__ . "/../Layouts/footer.php";
?>