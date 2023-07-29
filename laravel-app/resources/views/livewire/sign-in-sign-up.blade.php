{{--todo - develop--}}
<div>
    <div class="form position">
        <a>
            <button class="close" onclick='Livewire.emit("closeModal","sign-in-sign-up")'>x</button>
        </a>
        <div class="form-inner">
            <!-- Tabs-->
            <div class="tabs">
                <ul class="tabs">
                    <li class="current" data-tab="member">
                        <a href="#member">I am a member</a>
                    </li>
                    <li data-tab="new">
                        <a href="#new">I am new here</a>
                    </li>
                </ul>
                <!--Login Form -->
                <div class="form-content current" id="member">
                    <form id="sign-in">
                        <input type="email" name="login-id" id="user" placeholder="USERNAME / EMAIL" class="field"
                               required>
                        <input type="password" name="usrpw" placeholder="PASSWORD" class="field" required>
                        <div class="clear"></div>
                        <input type="checkbox" name="rmbrme" id="custom-check" class="check"><label for="custom-check"
                                                                                                    class="check-label secondary-text">Remember
                            me</label><a href=""><span class="forgot secondary-text">Forgot password?</span></a>
                        <button id="submit" name="sign-in-button" class="flat-button signin">Log In</button>
                    </form>
                </div>
                <!--Registration form-->
                <div class="form-content" id="new">
                    <form id="reg">
                        <input type="text" name="login-id" id="new-user" placeholder="USERNAME" class="field" required>
                        <input type="email" name="email" id="usremail" placeholder="EMAIL ADDRESS" class="field"
                               required>
                        <input type="password" name="usrpw" placeholder="PASSWORD" class="field" required>
                        <button id="submit-registration" name="register-button" class="flat-button signin">Sign Up
                        </button>
                        <div class="clear"></div>
                        <input type="checkbox" name="promo" id="promo-check" class="check" checked><label
                            for="promo-check"
                            class="check-label secondary-text promo">I'd
                            like to receive special offers and discount coupons. No spam!</label>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('ul.tabs li').click(function () {
            var tab_id = $(this).attr('data-tab');
            $('ul.tabs li').removeClass('current');
            $('.form-content').removeClass('current');
            $(this).addClass('current');
            $("#" + tab_id).addClass('current');
        })
    </script>
</div>
