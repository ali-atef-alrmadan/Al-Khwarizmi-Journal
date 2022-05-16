<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg text-gray-400 leading-tight text-right">
            {{ __('انشاء بحث جديد') }}
        </h2>
    </x-slot>
    <div class="w-full p-5 flex flex-col justify-center items-center gap-y-3"  dir="rtl">
            <div class="w-100 text-right">
                <x-jet-validation-errors class="mb-4" />
            </div>
            <form class="md:w-100 w-full" name="uplode" method="post" action="{{route('research_store')}}"enctype="multipart/form-data">
                    @csrf
                    <x-jet-input class="block mt-1 w-full" type="text" name="research_title" autofocus required placeholder="عنوان البحث" />
                    @include('layouts.components.researchTypes')
                    <x-jet-input class="block mt-1 w-full" type="text" name="research_field" required placeholder="مجال البحث" />
                    <textarea class="w-full h-60 resize-none border border-indigo-100 rounded-md focus:border-indigo-500" required name="abstract" type="text" placeholder="وصف البحث"></textarea>
                    <div class="my-2 flex justify-start items-center flex-wrap">
                        <div class="md:w-2/4 w-full overflow-hidden">
                            <label id="filePDF0" class="w-full inline-block text-center text-white p-2 rounded-lg bg-indigo-500 hover:bg-indigo-600 cursor-pointer" for="filePDF">
                                اختار ملف البحث
                            </label>
                            <input id="filePDF" required name="address_file" type="file" hidden onchange="changeName(this)">
                        </div>
                        <div class="md:w-2/4 w-full p-2 overflow-hidden">
                            <label id="fileIMG0" class="w-full inline-block text-center text-white p-2 rounded-lg bg-indigo-500 hover:bg-indigo-600 cursor-pointer" for="fileIMG">
                                اختار صورة للبحث.
                            </label>
                            <input id="fileIMG" required name="address_img" type="file" hidden onchange="changeName(this)">
                        </div>
                    </div>
                    <label for="policy" class="flex items-center my-2">
                        <input type="checkbox" required class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <span class="mr-2 text-sm text-gray-400">{{ __('اوافق على سياسة النشر') }}</span>
                    </label>
                    <x-jet-button>
                        {{ __('إرسال') }}
                    </x-jet-button>
            </form>
    </div>
</x-app-layout>
