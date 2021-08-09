<?php
include "Layouts/header.php";
include "Layouts/navbar.php";
?>
    <article class="blog-post">
        <h2 class=\"blog-post-title\"><?php echo $post['title'] ?></h2>
        <p class=\"blog-post-meta\"><?php echo date( 'F d, Y', strtotime($post['created_at'])) ?><!--<a href="#">Mark</a>--></p>
        <p class><?php echo $post['body'] ?></p>
        <a class='btn btn-outline-primary' href="/">Назад</a>
    </article>
<?php
include "Layouts/footer.php";
?>