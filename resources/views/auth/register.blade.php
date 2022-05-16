<x-guest-layout>
    <div class="w-screen h-screen flex flex-wrap justify-center items-center">
        <div class="w-2/5 h-full bg-indigo-500 hidden md:flex justify-center items-center">
            <img class="w-3/4" src="images/SVG/Sign up-amico.svg">
        </div>
        <div class="md:w-3/5 w-full h-full bg-indigo-50 flex justify-center items-center relative p-5">
            <div style="background-image: url(images/SVG/polygon-scatter-haikei.svg)" class="w-full h-full absolute left-0 top-0 z-10 bg-cover">
            </div>
            <div class="lg:w-2/4 w-full h-screen bg-indigo-50 p-5 shadow relative z-50">
                <form class="overflow-y-auto" method="POST" action="{{ route('register') }}" dir="rtl">
                    @csrf
                    <a href="/">
                        <img src="images/SVG/NewLogo.svg" alt="logo" class="w-20 mx-auto my-5">
                    </a>
                    <x-jet-validation-errors class="mb-4" />
                    <fieldset class="p-2 border border-gray-300">
                        <legend class="text-gray-400 p-1">معلومات المستخدم</legend>
                        <div>
                            <x-jet-input type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="اسم المستخدم" />
                        </div>
                        <div>
                            @include('layouts.components.degree')
                        </div>
                        <div>
                            @include('layouts.components.prefix')
                        </div>
                        <div>
                            @include('layouts.components.countries')
                        </div>
                        <div>
                            <x-jet-label class="mb-2 text-gray-400" for="Institution">{{ __('أختياري') }}</x-jet-label>
                            <x-jet-input type="text" name="Institution" :value="old('Institution')" placeholder="مكان العمل" />
                        </div>
                        <div class="mt-2">
                            <x-jet-label class="mb-2 text-gray-400" for="birth_date">{{ __('تاريخ الميلاد') }}</x-jet-label>
                            <x-jet-input type="date" name="birth_date" :value="old('birth_date')" required placeholder="تاريخ الميلاد"/>
                        </div>
                    </fieldset>
                    <fieldset class="p-2 mt-2 border border-gray-300">
                        <legend class="text-gray-400 p-1">معلومات الحساب</legend>
                        <div>
                            <x-jet-input type="email" name="email" :value="old('email')" required placeholder="البريد الإلكتروني" />
                        </div>
                        <div>
                            <x-jet-input type="password" name="password" required autocomplete="new-password" placeholder="كلمة السر" />
                        </div>
                        <div>
                            <x-jet-input type="password" name="password_confirmation" required autocomplete="new-password" placeholder="تأكيد كلمة السر" />
                        </div>
                    </fieldset>
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-jet-label for="terms">
                                <div class="flex items-center">
                                    <x-jet-checkbox name="terms" id="terms"/>
                                    <div class="ml-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-jet-label>
                        </div>
                    @endif
                    <a class="inline-block text-gray-400 my-5 hover:text-indigo-500" href="{{ route('login') }}">
                        {{ __('لديك حساب بالفعل؟') }}
                    </a>
                    <x-jet-button>
                        {{ __('انشاء حساب جديد') }}
                    </x-jet-button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
