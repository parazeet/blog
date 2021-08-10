<!-- Navigation-->
<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            Blog
            <!--<svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>-->
        </a>
        <?php
            $home = url('home');
            $register = url('register');
            $myPost = url('myPosts');
            $addPost = url('createPost');
            if($_SESSION['user_name']) {
                echo "<ul class=\"nav col-12 col-md-auto mb-2 justify-content-center mb-md-0\">
                        <li><a href=\"{$home}\" class=\"nav-link px-2 link-secondary\">Home</a></li>
                        <li class=\"nav-item dropdown\">
                              <a class=\"nav-link link-secondary dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                                {$_SESSION['user_name']}
                              </a >
                                <ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
                                    <li><a class=\"dropdown-item\" href=\"{$myPost}\">My post</a></li>
                                    <li><a class=\"dropdown-item\" href=\"{$addPost}\">Add post</a></li>
                                    <li><hr class=\"dropdown-divider\"></li>
                                    <li><a class=\"dropdown-item\" href=\"{$logout}\">Logout</a></li>
                                </ul >
                                </li >
                    </ul>";
            } else {
                $login = url('login');
                $logout = url('logout');
                echo "<div class=\"col-md-3 text-end\">
                    <a href=\"{$login}\" class=\"btn btn-outline-primary me-2\">Login</a>
                    <a href=\"{$register}\" class=\"btn btn-outline-primary\">Sign-up</a>
                </div>";
            }
        ?>
    </header>
</div>