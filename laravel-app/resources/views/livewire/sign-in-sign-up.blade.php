{{--todo - develop--}}
<div class="modal">
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
                    <form id="sign-in" method="post" action="{{ route('homepage-log-in') }}">
                        @csrf
                        <div>
                            <x-input-label for="user" :value="__('User')" class="hidden" />
                            <x-text-input id="user" class="field" type="user" name="user" :value="old('user')" required autofocus placeholder="USERNAME / EMAIL" autocomplete="username" />
                        </div>
                        <div >
                            <x-input-label for="password" :value="__('Password')" class="hidden" />

                            <x-text-input id="password" class="field"
                                          type="password"
                                          name="password"
                                          placeholder="PASSWORD"
                                          required autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <x-primary-button id="submit" name="sign-in-button" class="flat-button signin justify-center">
                            {{ __('Log in') }}
                        </x-primary-button>
                        <div class="clear"></div>
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                               href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </form>
                </div>
                <!--Registration form-->
                <div class="form-content" id="new">
                    <form method="post" action="{{ route('homepage-register') }}" id="reg">
                        @csrf
                        <div>
                            <x-input-label for="name" :value="__('Username')" class="hidden" />
                            <x-text-input id="name" placeholder="USERNAME" class="field" type="text" name="name" :value="old('name')" required autofocus autocomplete="username" />
                        </div>
                        <div>
                            <x-input-label for="email" :value="__('Email')" class="hidden" />
                            <x-text-input id="email" placeholder="EMAIL ADDRESS" class="field" type="email" name="email" :value="old('email')" required autocomplete="email" />
                        </div>
                        <div>
                            <x-input-label for="password" :value="__('Password')" class="hidden" />
                            <x-text-input id="password" class="field"
                                          type="password"
                                          name="password"
                                          placeholder="PASSWORD"
                                          required autocomplete="new-password" />
                        </div>
                        <div>
                            <x-primary-button class="flat-button signin justify-center">
                                {{ __('Sign Up') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('ul.tabs li').click(function () {
            var tab_id = $(this).attr('data-tab');
            $('ul.tabs li').removeClass('current');
            $('.form-content').removeClass('current');
            $(this).addClass('current');
            $("#" + tab_id).addClass('current');
        })
    </script>
</div>
