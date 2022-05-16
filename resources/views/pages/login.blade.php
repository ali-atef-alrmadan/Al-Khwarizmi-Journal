<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    @livewireStyles
    <title>{{$page_name}}</title>
</head>
<body>
    <div class="w-screen h-screen flex flex-wrap justify-center items-center">
        <div class="w-2/5 h-full bg-indigo-500 flex justify-center items-center">
            <img class="w-3/4" src="images/SVG/Tablet login-bro.svg">
        </div>
        <div class="w-3/5 h-full bg-indigo-50 flex justify-center items-center relative">
            <div style="background-image: url(images/SVG/polygon-scatter-haikei.svg)" class="w-full h-full absolute left-0 top-0 z-10 bg-cover">
            </div>
            <div class="w-2/4 bg-indigo-50 p-5 shadow relative z-50">
                @csrf
                <form class="w-full flex flex-col justify-start items-start" method="POST" action="{{ route('login') }}" dir="rtl">
                    <h1 class="w-full text-3xl text-gray-600 text-center font-bold mb-10"> {{ __('تسجيل الدخول') }}</h1>
                    <input type="email" name="email" :value="old('email')" required autofocus  class="w-full p-2 mb-2 border border-indigo-100 rounded-md focus:border-indigo-500" placeholder="البريد الأكتروني">
                    <input type="password" name="password" required autocomplete="current-password" class="w-full p-2 mb-2 border border-indigo-100 rounded-md focus:border-indigo-500" placeholder="كلمة السر">
                    <a class="inline-block text-gray-400 mb-20 hover:text-indigo-500" href="{{ route('password.request') }}">
                        {{ __('هل نسيت الرقم السري؟') }}
                    </a>
                    <input type="submit" value="تسجيل" class="w-full p-2 bg-indigo-500 rounded-md text-xl text-white text-center cursor-pointer hover:bg-indigo-600 active:bg-indigo-600">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
