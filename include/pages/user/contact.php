<?php
require_once('../../../action/authentication.php');

include_once("layout/header.php");
?>
<div class="container">

        <section class="d-block d-md-grid grid-cols-12">
            <div class="col-span-6 col-start-4">
                <div class="heading">
                    <h1 class="title">Contact Us</h1>
                </div>
                <form class="form--validate" method="POST" action="/contact-request">
                    <div class="form__group">
                        <input data-fieldname="Full Name" data-rules="required,max:50" type="text" name="name" placeholder="Full Name *">
                    </div>
                    <div class="form__group">
                        <input data-fieldname="E-mail" data-rules="required,max:50" type="email" name="email" placeholder="E-mail *">
                    </div>
                    <div class="form__group">
                        <input data-fieldname="Phone Number" data-rules="max:25" type="text" name="phone" placeholder="Phone Number">
                    </div>
                    <div class="form__group">
                        <textarea data-fieldname="Short Description" data-rules="required,max:2048" name="message" id="" cols="30" rows="10" placeholder="Message *"></textarea>
                    </div>
                    
                    <?php if(empty($captcha)){ ?>
                    <div class="divider"></div>

                    <div class="bg-dimwhite form__group m-0">
                        <span title="reload" class="captcha__refresh icon-cw"></span>
                        <div class="captcha__container">
                            <input class="text-center captcha" type="text" id="captcha2" name="captcha" readonly disabled oncopy="return false" oncut="return false">
                        </div>
                    </div>

                    <div class="form__group">
                        <input data-fieldname="Captcha" data-rules="required,confirm" data-confirm="#captcha2" class="text-center" placeholder="Please copy the captcha displayed" type="text" id="captcha-input" name="captcha-input" onpaste="return false">
                    </div>
                    <?php } ?>

                    <div class="form__actions">
                        <button type="submit" class="form__submit d-block">Continue</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
    
</div>
<?php
include_once("layout/footer.php");
?>