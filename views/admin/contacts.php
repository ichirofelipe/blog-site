<div class="container container--full mb-2">
    <div class="heading">
        <h1 class="title title--md">Contacts</h1>
    </div>

    <div class="table__container">
        <?php
            includeWithVariables(dirname(__FILE__).'/components/table.php', 
                array(
                    'columns' => $columns,
                    'data' => $contacts,
                    'action' => 'contact',
                    'url' => '/admin/contacts',
                )
            );
        ?>
    </div>
    <?php
        includeWithVariables(dirname(__FILE__).'/../components/pagination.php', 
            array(
                'currentPage' => $listPage,
                'pagination' => $pagination,
                'url' => '/admin/contacts'
            )
        );
    ?>
</div>

<?php include 'includes/footer.php' ?>