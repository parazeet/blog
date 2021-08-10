<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="<?php echo url('home'); ?>">Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?= url('home'); ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="#">Search</a></li>
                <?php
                    $login = url('login');
                    $logout = url('logout');
                    $myPost = url('myPosts');
                    $addPost = url('createPost');
                    if($_SESSION['user_name']) {
                        echo "<li class=\"nav-item dropdown\">
                              <a class=\"nav-link dropdown-toggle px-lg-3 py-3 py-lg-4\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                {$_SESSION['user_name']}
                              </a>
                                <ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
                                    <li><a class=\"dropdown-item\" href=\"{$myPost}\">My post</a></li>
                                    <li><a class=\"dropdown-item\" href=\"{$addPost}\">add post</a></li>
                                    <li><hr class=\"dropdown-divider\"></li>
                                    <li><a class=\"dropdown-item\" href=\"{$logout}\">Logout</a></li>
                                </ul>
                                </li>";
                    } else {
                        echo "<li class=\"nav-item\"><a class=\"nav-link px-lg-3 py-3 py-lg-4\" href=\"{$login}\">Sing In</a></li>";
                    }
                ?>
            </ul>
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </form>
        </div>
    </div>
</nav>