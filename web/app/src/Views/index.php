<?php
    include "Layouts/header.php";
    include "Layouts/navbar.php";
?>
    <article class="blog-post">
    <?php
    if (!empty($posts)) {
        foreach ($posts as $post) {
            $array = explode(" ", $post['body']);
            $array = array_slice($array, 0, 30);
            $shotBody = implode(" ", $array);

            echo "<a href=\"" . url('postsList') . "\"><h2 class=\"blog-post-title\">{$post['title']}</h2></a>";
            echo "<p class=\"blog-post-meta\">" . date( 'F d, Y', strtotime($post['created_at'])) . " <!--<a href=\"#\">Mark</a>--></p>";
            echo "<p class>{$shotBody}...</p>";
            echo "<a class='btn btn-outline-primary' href=\"/show/{$post['id']}\">Читать далее</a>";
            echo "<hr>";
        }
    } else {
        echo "<h2 class=\"blog-post-title\">Публикации отсутствуют</h2>";
    }
    ?>
    </article>
<?php
    include "Layouts/footer.php";
?>