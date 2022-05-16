{{-- contact-us section start --}}

    <div class="mt-40 feaders relative" id="Contact">

        {{-- section title start --}}

            <div class="relative z-10">

                <h1 class="mx-auto w-28 p-2 text-3xl text-center font-bold text-indigo-500 border-2 border-indigo-500 bg-white rounded-lg">تواصل</h1>

            </div>

        {{-- section title end --}}

        {{-- section content start --}}

            <div class="mt-5 p-10 flex flex-col justify-center items-center relative">

                <div class=" w-full h-full absolute bottom-0 left-0 bg-gradient-to-r from-indigo-500 to-purple-400">
                </div>
                {{-- form start --}}
                    <div class="h-200 sm:w-max w-full realtive z-10 shadow-lg flex flex-row-reverse justify-center items-stretch bg-white">
                        <form action="{{route("feedback")}}" method="POST" dir="rtl" class="w-200 h-full p-5 rounded-sm text-gray-500" enctype="multipart/form-data">
                            @csrf
                            <input name="name"type="text" placeholder="أسم المستخدم" class="focus:border-indigo-500 w-full p-2 rounded-sm border border-gray-200 my-2">
                            <input name="email"type="email" placeholder="البريد الأكتروني" class="focus:border-indigo-500 w-full p-2 rounded-sm border border-gray-200 my-2">
                            <textarea name="msgContent" cols="30" rows="10" placeholder="رسالتك..." class="focus:border-indigo-500 w-full p-2 rounded-sm border border-gray-200 my-2 resize-none"></textarea>
                            <input type="submit" value="ارسال" class="w-full p-2 rounded-sm bg-indigo-500 text-white text-lg cursor-pointer transition-colors duration-300 ease-linear hover:bg-indigo-700">
                        </form>
                        <div class="w-200 h-full p-5 bg-indigo-100 hidden lg:block">
                            <img src="images/svg/Contact us-rafiki.svg" class="h-full" alt="">
                        </div>
                    </div>
                {{-- form end --}}

            </div>

        {{-- section content end --}}

    </div>

{{-- contact-us section start --}}
