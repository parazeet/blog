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
                        <h1><?php echo $post['title'] ?></h1>
                        <!--<h2 class="subheading">Problems look mighty small from 150 miles up</h2>-->
                        <span class="meta">
                                Posted by
                                Anyone <!--<a href="#!">Start Bootstrap</a>-->
                                on <?php echo date( 'F d, Y', strtotime($post['created_at'])) ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <?php echo $post['body'] ?>
                    <a class='btn btn-outline-primary' href="<?php echo url('home'); ?>">На главную</a>
                </div>
            </div>
        </div>
    </article>
<?php
include "Layouts/footer.php";
?>