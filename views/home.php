

    <div class="container">
        <div class="heading">
            <h1 class="title title--lg">Latest News</h1>
        </div>

        <section>
            <?php for($i=0; $i<3; $i++){
                include 'components/card.php';
            } ?>
            
            <?php
                include 'components/pagination.php';
            ?>
        </section>
    </div>

    <?php
        include 'components/modal/signup.php';
    ?>
    
</div>


<?php include 'includes/footer.php' ?>