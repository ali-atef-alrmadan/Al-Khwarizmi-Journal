<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg text-gray-400 leading-tight text-right">
            {{ __('الصفحة الرئيسية') }}
        </h2>
    </x-slot>
    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5" dir="rtl">
                <div>
                    <h1 class="text-3xl text-gray-600">
                        <span class="font-semibold text-indigo-500">أهلاً بك</span>
                        <span class="font-bold"> {{Auth::user()->name}} </span>
                        <span class="text-xl"> في مجلة الخوارزمي </span>
                    </h1>
                </div>
                <div class="mt-10">
                    <div class="text-xl text-gray-500 font-semibold">
                        تمكنك مجلة الخوارزمي من:
                    </div>
                    <div class="mt-5 text-gray-600 text-lg font-medium bg-indigo-50 p-5 h-200 overflow-y-auto scrollbar scrollbar-thumb-gray-300 scrollbar-track-gray-100">
                        <div>
                            الوظائف الأساسية الموكلة اليك:
                        </div>
                        <div class="mt-5">
                            <ul class="list-disc p-5 space-y-8">
                                <li>
                                    استلام البحث من الناشر.
                                </li>
                                <li>
                                    إرسال البحث لتحكيمه.
                                </li>
                                <li>
                                    إستلام قرار المحكم وملاحظاته على البحث ومراجعتها.
                                </li>
                                <li>
                                    اعطاء القرار النهائي للبحث.
                                </li>
                                <li>
                                    يمكنك ترقية الباحثين الى محكمين في المجلة.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
