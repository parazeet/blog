<?php
include __DIR__ . "/../Layouts/header.php";
include __DIR__ . "/../Layouts/navbarAuth.php";
?>
    <div class="container">
        <form action="<?= url('storePost') ?>" method="post">
            <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">
            <div class="mb-3">
                <label for="createTitle" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="createTitle" placeholder="Title Post" required
                <?php
                    if (isset($_SESSION['old'])) {
                        echo "value=\"{$_SESSION['old']['title']}\"";
                    }
                ?>
                >
            </div>
            <div class="mb-3">
                <label for="createBody" class="form-label">Body</label>
                <textarea name="body" id="editor">
                <?php
                    if (isset($_SESSION['old'])) {
                        echo $_SESSION['old']['body'];
                    }
                    unset($_SESSION['old']);
                ?>
                </textarea>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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