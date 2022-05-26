<div class="container container--full mb-2">
    <div class="heading">
        <h1 class="title title--md">News</h1>
    </div>

    <div class="table__container">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Url</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($posts as $post){ ?>
                    <tr>
                        <td><?= $post['id'] ?></td>
                        <td><?= $post['title'] ?></td>
                        <td><?= $post['url'] ?></td>
                        <td><?= $post['description'] ?></td>
                        <td>
                            <form method="POST" action="/controller/delete">
                                <button class="text-plain title--sm text-default text-clickable"><i class="icon-trash-empty"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php 
        
        includeWithVariables(dirname(__FILE__).'/components/pagination.php', 
            array(
                'currentPage' => $postPage,
                'pagination' => $pagination, 
                'url' => '/'
            )
        );

    ?>
</div>

<?php include 'includes/footer.php' ?>