<?php
require_once('../../../action/authentication.php');
require_once('../../../action/post_list.php');

include_once("layout/header.php");
?>
    <div class="container">
        <div class="heading">
            <h1 class="title title--lg">Latest News</h1>
        </div>

        <section>
            <?php if($posts){ ?>
                <?php 
                    foreach($posts as $post){
                        includeWithVariables(dirname(__FILE__).'/components/card.php', 
                            array(
                                'post' => $post,
                                'local_link' => true,
                            )
                        );
                    }

                    includeWithVariables(dirname(__FILE__).'/components/pagination.php', 
                        array(
                            'currentPage' => $listPage,
                            'pagination' => $pagination, 
                            'url' => ''
                        )
                    );
                    
                ?>
            <?php }else{ ?>
                <p class="title alert-default">No news to display.</p>
            <?php } ?>
        </section>
    </div>
    
</div>

<?php
include_once("layout/footer.php");
?>