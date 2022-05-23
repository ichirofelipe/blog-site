
    <div class="container">
        <div class="heading">
            <h1 class="title title--lg">Latest News</h1>
        </div>

        <section>
            <?php if($posts){ ?>
                <?php foreach($posts as $post){ ?>
                    <?php include 'components/card.php'; ?>
                <?php } ?>
            <?php } ?>


            <?php for($i=0; $i<3; $i++){
                include 'components/card.php';
            } ?>
            
            <?php
                include 'components/pagination.php';
            ?>
        </section>
    </div>

    <?php
        // include 'components/modal/login.php';
    ?>
    
</div>


<?php include 'includes/footer.php' ?>