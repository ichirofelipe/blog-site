<div class="container container--full mb-2">
    <div class="heading d-flex justify-between align-items-center">
        <h1 class="title title--md">News</h1>

        <button data-table="posts" data-toggle="modal" data-target="upload" class="button button--default">
            <i class="icon-plus"></i>
            <span class="ml-1">Add News</span>
        </button>
    </div>

    <div class="table__container">
        <?php
            includeWithVariables(dirname(__FILE__).'/components/table.php', 
                array(
                    'columns' => $columns,
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
                'currentPage' => $listPage,
                'pagination' => $pagination,
                'url' => '/admin/news'
            )
        );
    ?>
</div>

<?php include 'includes/footer.php' ?>