<div class="container container--full mb-2">
    <div class="heading">
        <h1 class="title title--md">Users</h1>
    </div>

    <div class="table__container">
        <?php
            includeWithVariables(dirname(__FILE__).'/components/table.php', 
                array(
                    'columns' => $columns,
                    'data' => $users,
                    'action' => 'user',
                    'url' => '/admin/users',
                    'approve' => 'is_admin_approved',
                )
            );
        ?>
    </div>
    <?php
        includeWithVariables(dirname(__FILE__).'/../components/pagination.php', 
            array(
                'currentPage' => $listPage,
                'pagination' => $pagination,
                'url' => '/admin/users'
            )
        );
    ?>
</div>

<?php include 'includes/footer.php' ?>