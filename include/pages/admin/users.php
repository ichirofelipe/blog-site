<?php
require_once('../../../action/authentication.php');
require_once('../../../action/user_list.php');

if(!$admin){
    header('Location: /admin');
}


$active = '';
if(isset($_GET['active_page']) && $_GET['active_page'])
    $active = clean_input($_GET['active_page']);

include_once("layout/header.php");
?>
<div class="container container--full mb-2">
    <div class="heading">
        <h1 class="title title--md">Users</h1>
    </div>

    <div class="table__container">
        <?php
        if($users){
            includeWithVariables(dirname(__FILE__).'/components/table.php', 
                array(
                    'columns' => $columns,
                    'data' => $users,
                    'action' => 'user',
                    'url' => '/admin/users',
                    'approve' => 'is_admin_approved',
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
                'url' => '/admin/users'
            )
        );
    ?>
</div>
<?php
include_once("layout/footer.php");
?>