<?php
require_once('../../../action/authentication.php');
$status = $_GET['status']??false;

include_once("layout/header.php");
?>
    <div class="container align-self-center">
        <section class="d-block d-md-grid grid-cols-12">
            <div class="col-span-8 col-start-3">
                <div class="heading d-flex align-items-center justify-center flex-column">
                    <h1 class="title title--xl m-0">404</h1>
                    <p class="title title--md m-0">Page not found!</p>
                </div>
            </div>
        </section>
    </div>
</div>
<?php
include_once("layout/footer.php");
?>