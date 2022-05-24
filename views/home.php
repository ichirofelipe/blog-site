
    <div class="container">
        <div class="heading">
            <h1 class="title title--lg">Latest News</h1>
        </div>

        <section>
            <?php if($posts){ ?>
                <?php 

                    includeWithVariables(dirname(__FILE__).'/components/card.php', 
                        array(
                            'posts' => $posts
                        )
                    );

                    includeWithVariables(dirname(__FILE__).'/components/pagination.php', 
                        array(
                            'currentPage' => $postPage,
                            'pagination' => $pagination, 
                            'url' => '/'
                        )
                    );
                    
                ?>
            <?php }else{ ?>
                <p class="title alert-default">No news to display.</p>
            <?php } ?>
        </section>
    </div>

    <?php
        // include 'components/modal/login.php';
    ?>
    
</div>


<?php include 'includes/footer.php' ?>