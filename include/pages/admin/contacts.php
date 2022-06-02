<div class="container container--full mb-2">
    <div class="heading">
        <h1 class="title title--md">Contacts</h1>
    </div>

    <div class="table__container">
        <?php
        if($contacts){
            includeWithVariables(dirname(__FILE__).'/components/table.php', 
                array(
                    'columns' => $columns,
                    'data' => $contacts,
                    'action' => 'contact',
                    'url' => '/admin/contacts',
                    'table' => 'contacts',
                )
            );
        }
        else{
            echo "<p class='title alert-default'>No data to display.</p>";
        }
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