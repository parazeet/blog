<?php
    include "Layouts/header.php";
    include "Layouts/navbar.php";
?>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/post-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>Список всех статей</h1>
                        <span class="meta">
                            При клике на название статьи открывается список всех статей
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container px-4 px-lg-5 mb-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="list-group">
            <?php
            if (!empty($posts)) {
                foreach ($posts as $post) {
                    $array = explode(" ", $post['body']);
                    $array = array_slice($array, 0, 15);
                    $shotBody = implode(" ", $array);
                    $date = date( 'F d, Y', strtotime($post['created_at']));

                    echo "<a href=\"/show/{$post['id']}\" class=\"list-group-item list-group-item-action\" aria-current=\"true\">
                            <div class=\"d-flex w-100 justify-content-between\">
                                <h5 class=\"mb-1\">{$post['title']}</h5>
                                <small>{$date}</small>
                            </div>
                        </a>";

                }
            } else {
                echo "<h2 class=\"blog-post-title\">Публикации отсутствуют</h2>";
            }
            ?>
            </div>
        </div>
    </div>
<?php
    include "Layouts/footer.php";
?>