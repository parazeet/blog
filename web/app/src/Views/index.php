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
                        <h1>Блог - сайт на котором можно публиковать статьи.</h1>
                        <h2 class="subheading">При разработке проекта показать:</h2>
                        <ol>
                            <li>
                                <span class="meta">Умение верстать формы на html</span>
                            </li>
                            <li>
                                <span class="meta">Умение использовать css селекторы</span>
                            </li>
                            <li>
                                <span class="meta">Умение декомпозировать код на процедуры или классы</span>
                            </li>
                            <li>
                                <span class="meta">Умение защищаться от sql инъекций и xss аттак</span>
                            </li>
                            <li>
                                <span class="meta">Понимание что такое сессии и авторизация</span>
                            </li>
                        </ol>

                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
    <?php
    if (!empty($posts)) {
        foreach ($posts as $key => $post) {
            $array = explode(" ", $post['body']);
            $array = array_slice($array, 0, 30);
            $shotBody = implode(" ", $array);
            $urlList = url('postsList');
            $url = url('show', ['id' => $post['id']]);
            $date = date( 'F d, Y', strtotime($post['created_at']));

            echo "<div class=\"post-preview\">
                        <a href=\"{$urlList}\">
                            <h2 class=\"post-title\">{$post['title']}</h2>
                        </a>
                        <h3 class=\"post-subtitle\">{$shotBody}</h3>
                        <p class=\"post-meta\">
                            Posted by
                                Anyone<!--<a href=\"#!\">Start Bootstrap</a>-->
                            on {$date}
                        </p>
                        <a href=\"{$url}\" class='btn btn-outline-info'>Читать далее</a>
                    </div>";
            echo (array_key_last($posts) != $key) ? "<hr class=\"my-4\" />" : "<div class=py-3></div>";
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