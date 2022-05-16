<x-guest-layout>
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
    <div class="w-screen h-screen flex flex-wrap justify-center items-center">
        <div class="w-2/5 h-full bg-indigo-500 hidden md:flex justify-center items-center">
            <img class="w-3/4" src="images/SVG/Tablet login-bro.svg">
        </div>
        <div class="md:w-3/5 w-full h-full bg-indigo-50 flex justify-center items-center relative p-5">
            <div style="background-image: url(images/SVG/polygon-scatter-haikei.svg)" class="w-full h-full absolute left-0 top-0 z-10 bg-cover">
            </div>
            <div class="lg:w-2/4 w-full bg-indigo-50 p-5 shadow relative z-50">
                <form method="POST" action="{{ route('login') }}" dir="rtl">
                    @csrf
                    <a href="/">
                        <img src="images/SVG/NewLogo.svg" alt="logo" class="w-20 mx-auto my-5">
                    </a>
                    <x-jet-validation-errors class="mb-4" />
                    <div>
                        <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="البريد الإلكتروني" />
                    </div>
                    <div>
                        <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="كلمة السر" />
                    </div>
                    <div>
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <span class="mr-2 text-sm text-gray-400">{{ __('تذكرني') }}</span>
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="w-full inline-block text-gray-400 mt-5 hover:text-indigo-500" href="{{ route('password.request') }}">
                            {{ __('هل نسيت الرقم السري؟') }}
                        </a>
                    @endif
                    <a class="w-full inline-block text-gray-400 my-2 hover:text-indigo-500" href="{{ route('register') }}">
                        {{ __('انشاء حساب جديد') }}
                    </a>
                    <x-jet-button>
                        {{ __('تسجيل الدخول') }}
                    </x-jet-button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
