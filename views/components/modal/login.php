<div id="modal" class="modal__overlay">
    <span class="modal__close"></span>
    <div class="container">
        <div class="modal">
            <div class="modal__heading">
                <h3 class="title--sm mt-0">User Login</h3>
            </div>
            <form class="form--validate" method="POST" action="/login">
                <div class="form__group form__group--append">
                    <span class="icon-user-1"></span>
                    <input data-fieldname="Username" data-rules="required" type="text" name="username" placeholder="Username *">
                </div>
                <div class="form__group form__group--append">
                    <span class="icon-lock"></span>
                    <input data-fieldname="Password" data-rules="required" class="password" id="password" type="password" name="password" placeholder="Password *">
                    <label for="password" class="icon-eye form__toggle-password"></label>
                </div>

                <div class="divider"></div>

                <div class="bg-dimwhite form__group m-0">
                    <span title="reload" class="captcha__refresh icon-cw"></span>
                    <div class="catcha__container">
                        <input class="text-center captcha" type="text" id="captcha" name="captcha" readonly disabled oncopy="return false" oncut="return false">
                    </div>
                </div>

                <div class="form__group">
                    <input data-fieldname="Captcha" data-rules="required,confirm" data-confirm="#captcha" class="text-center" placeholder="Please copy the captcha displayed" type="text" id="captcha-input" name="captcha-input" onpaste="return false">
                </div>
                <!-- <small class="d-block mt-1"><a class="color-default" href="/forgot-password">Forgot Password?</a></small> -->

                <div class="form__actions">
                    <button type="submit" class="form__submit d-block">Continue</button>
                    <a class="color-default d-block mt-1" data-toggle="modal" data-target="signup" href="javascript:void(0)">Create New Account</a>
                </div>
            </form>
        </div>
    </div>
</div>