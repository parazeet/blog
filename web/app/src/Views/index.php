<?php
    include "Layouts/header.php";
    include "Layouts/navbar.php";
?>
    <article class="blog-post">
    <?php
    foreach ($posts as $post) {
        echo "<h2 class=\"blog-post-title\">{$post['title']}</h2>";
        echo "<p class=\"blog-post-meta\">January 1, 2021 by <a href=\"#\">Mark</a></p>";
        echo "<p class>{$post['body']}</p>";
        echo "<a class='btn btn-outline-primary' href=\"/show/{$post['id']}\">Читать далее</a>";
        echo "<hr>";
    }
    ?>
    </article>
<?php
    include "Layouts/footer.php";
?>