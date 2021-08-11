<?php
include __DIR__ . "/../Layouts/header.php";
include __DIR__ . "/../Layouts/navbarAuth.php";
?>
    <div class="container">
        <form action="<?= url('updatePost', ['id' => $post['id']]) ?>" method="post">
            <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">
            <input type="hidden" name="method" value="_PUT">
            <div class="mb-3">
                <label for="createTitle" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="createTitle" placeholder="Title Post" value="<?= $post['title'] ?>">
            </div>
            <div class="mb-3">
                <label for="createBody" class="form-label">Body</label>
                <textarea name="body" id="editor"><?= $post['body'] ?></textarea>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary" name="submit">Save</button>
            </div>
        </form>
    </div>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
<?php
include __DIR__ . "/../Layouts/footer.php";
?>