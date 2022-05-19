<div id="modal" class="modal__overlay">
    <span class="modal__close"></span>
    <div class="container">
        <div class="modal">
            <div class="modal__heading">
                <h3 class="title--sm mt-0">Create New Account</h3>
            </div>
            <form class="form--validate" method="POST" action="/signup">
                <div class="form__group form__group--append">
                    <span class="icon-user-1"></span>
                    <input data-fieldname="Username" data-validation="required,limit:50" type="text" name="username" placeholder="Username *">
                </div>
                <div class="form__group form__group--append">
                    <span class="icon-lock"></span>
                    <input data-fieldname="Password" data-validation="required,limit:50" class="password" id="password" type="password" name="password" placeholder="Password *">
                    <label for="password" class="icon-eye form__toggle-password"></label>
                </div>
                <div class="form__group form__group--append">
                    <span class="icon-lock"></span>
                    <input class="password" id="c_password" type="password" name="c_password" placeholder="Confirm Password *">
                    <label for="c_password" class="icon-eye form__toggle-password"></label>
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

                <label class="d-flex align-items-center mt-1">
                    <input class="m-0" type="checkbox"><small class="ml-1 d-block color-default">Do you agree to the <a class="color-default" target="_blank" href="/terms">Terms and Conditions</a>?</small>
                </label>

                <div class="form__actions">
                    <button type="submit" class="form__submit d-block">Continue</button>
                    <a class="d-block mt-1 color-default" data-toggle="modal" data-target="login" href="javascript:void(0)">Login</a>
                </div>
            </form>
        </div>
    </div>
</div>