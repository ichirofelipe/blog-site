
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