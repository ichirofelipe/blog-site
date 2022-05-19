    <div class="container">

        <section class="d-block d-md-grid grid-cols-12">
            <div class="col-span-6 col-start-4">
                <div class="heading">
                    <h1 class="title">Contact Us</h1>
                </div>
                <form method="POST" action="/contact">
                    <div class="form__group">
                        <input type="text" name="name" placeholder="Full Name *">
                    </div>
                    <div class="form__group">
                        <input type="email" name="email" placeholder="Email *">
                    </div>
                    <div class="form__group">
                        <input type="text" name="phone" placeholder="Phone Number">
                    </div>
                    <div class="form__group">
                        <textarea name="" id="" cols="30" rows="10" placeholder="Message"></textarea>
                    </div>

                    <div class="divider"></div>

                    <div class="bg-dimwhite form__group m-0">
                        <span title="reload" class="captcha__refresh icon-cw"></span>
                        <div class="captcha__container">
                            <input class="text-center captcha" type="text" id="captcha" name="captcha" readonly disabled oncopy="return false" oncut="return false">
                        </div>
                    </div>

                    <div class="form__group">
                        <input class="text-center" placeholder="Please enter the text displayed" type="text" id="captcha-input" name="captcha-input" onpaste="return false">
                    </div>
                    <!-- <small class="d-block mt-1"><a class="color-default" href="/forgot-password">Forgot Password?</a></small> -->

                    <div class="form__actions">
                        <button type="submit" class="form__submit d-block">Continue</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
    
</div>


<?php include 'includes/footer.php' ?>