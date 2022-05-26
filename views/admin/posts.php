<div class="container container--full mb-2">
    <div class="heading">
        <h1 class="title title--md">News</h1>
    </div>

    <div class="table__container">
        <?php
            includeWithVariables(dirname(__FILE__).'/components/table.php', 
                array(
                    'data' => $posts,
                    'action' => 'post',
                    'url' => '/admin/news',
                )
            );
        ?>
    </div>
    <?php
        includeWithVariables(dirname(__FILE__).'/../components/pagination.php', 
            array(
                'currentPage' => $postPage,
                'pagination' => $pagination,
                'url' => '/admin/news'
            )
        );

    ?>
</div>

<?php include 'includes/footer.php' ?>