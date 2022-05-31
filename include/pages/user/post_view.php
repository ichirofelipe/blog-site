<?php
require_once('../../../action/authentication.php');
require_once('../../../action/post_list.php');

$title = $posts['title'];
$url = $posts['url'];
$description = $posts['description'];

include_once("layout/header.php");
?>
    <div class="container">
        <div class="heading">
            <h1 class="title title--lg">Latest News</h1>
        </div>

        <section>
            <?php 

                includeWithVariables(dirname(__FILE__).'/components/card.php', 
                    array(
                        'post' => $posts,
                        'local_link' => false,
                    )
                );
                
            ?>
        </section>
    </div>
    
</div>
<?php
include_once("layout/footer.php");
?>