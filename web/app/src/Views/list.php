<?php
    include "Layouts/header.php";
    include "Layouts/navbar.php";
?>
    <div class="list-group">
    <?php
    if (!empty($posts)) {
        foreach ($posts as $post) {
            $array = explode(" ", $post['body']);
            $array = array_slice($array, 0, 7);
            $shotBody = implode(" ", $array);
            $date = date( 'F d, Y', strtotime($post['created_at']));

            echo "<a href=\"/show/{$post['id']}\" class=\"list-group-item list-group-item-action\" aria-current=\"true\">
                <div class=\"d-flex w-100 justify-content-between\">
                <h5 class=\"mb-1\">{$post['title']}</h5>
                <small>{$date}</small>
                </div>
                <p class=\"mb-1\">{$shotBody}...</p>
                <!--<small>And some small print.</small>-->
                </a>";

        }
    } else {
        echo "<h2 class=\"blog-post-title\">Публикации отсутствуют</h2>";
    }
    ?>
    </div>
<?php
    include "Layouts/footer.php";
?>