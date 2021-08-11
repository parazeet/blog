<?php
include __DIR__ . "/../Layouts/header.php";
include __DIR__ . "/../Layouts/navbarAuth.php";
?>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Краткое содержание</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($posts as $post) {
                $csrf = csrf_token();
                $show = url('show', ['id' => $post['id']]);
                $edit = url('editPost', ['id' => $post['id']]);
                $delete = url('deletePost', ['id' => $post['id']]);

                $array = explode(" ", htmlspecialchars(strip_tags($post['body'])));
                $array = array_slice($array, 0, 10);
                $shotBody = implode(" ", $array);

                echo "<tr>
                <th scope=\"row\">{$post['id']}</th>
                <td>{$post{'title'}}</td>
                <td>{$shotBody}</td>
                <td>
                    <div class='row mx-0 px-0'>
                        <div class='col-sm-4 mx-0 px-1'>
                            <a href=\"{$show}\" class=\"btn btn-primary\">Show</a>
                        </div>
                        <div class='col-sm-4 mx-0 px-1'>
                            <a href=\"{$edit}\" class=\"btn btn-warning\">Edit</a>
                        </div>
                        <div class='col-sm-4 mx-0 px-0'>
                            <form method='post' action=\"{$delete}\" onsubmit=\"return confirm('Are you serious???')\">
                                <input type=\"hidden\" name=\"csrf_token\" value=\"{$csrf}\">
                                <input type=\"submit\" class=\"btn btn-danger\" value=\"Delete\">
                            </form>
                        </div>
                    </div>
                </td>
            </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
<?php
include __DIR__ . "/../Layouts/footer.php";
?>