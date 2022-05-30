<?php
require_once('../../../action/authentication.php');
include_once("layout/header.php");
?>
<div class="container">
    <div>
        <h1 class="title title--md text-center">Admin Bookmark</h1>
        <article class="card">
            <div class="card__body text-center">
                <h4 class="card__title title--sm text-bold m-0">Sign Up</h4>
                <div class="divider"></div>
                <form class="form--validate text-left" method="POST" action="/signup-request">
                    <div class="form__group form__group--append">
                        <span class="icon-user-1"></span>
                        <input data-fieldname="Username" data-rules="required,max:50" type="text" name="username" placeholder="Username *">
                    </div>
                    <div class="form__group form__group--append">
                        <span class="icon-lock"></span>
                        <input data-fieldname="Password" data-rules="required,max:50,min:5" class="password" id="password" type="password" name="password" placeholder="Password *">
                        <label for="password" class="icon-eye form__toggle-password"></label>
                    </div>
                    <div class="form__group form__group--append">
                        <span class="icon-lock"></span>
                        <input data-fieldname="Confirmation" data-rules="required,max:50,min:5,confirm" data-confirm="#password" class="password" id="c_password" type="password" name="c_password" placeholder="Confirm Password *">
                        <label for="c_password" class="icon-eye form__toggle-password"></label>
                    </div>

                    <div class="form__actions">
                        <button name="admin" type="submit" class="form__submit d-block">Continue</button>
                        <a class="d-block mt-1 color-default" href="/admin/login">Login</a>
                    </div>
                </form>
            </div>
        </article>
    </div>
</div>
<?php
include_once("layout/footer.php");
?>