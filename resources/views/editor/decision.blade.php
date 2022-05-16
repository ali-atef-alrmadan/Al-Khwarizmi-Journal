<x-app-layout>{{-- tranking to Reviewer--}}
    <x-slot name="header">
        <h2 class="text-lg text-gray-400 leading-tight text-right">
            {{ __('القرار النهائي للأبحاث') }}
        </h2>
    </x-slot>
    <div class="w-full h-100 overflow-y-auto" dir="rtl">
        <div class="tableContanier">
            <div class="text-right mb-5">
                <x-jet-validation-errors class="mb-4" />
            </div>
            <div class="tableContent">
                @if($review->isempty())
                    <h1 class="text-3xl text-bold text-gray-300 text-center mt-20">
                        لا يوجد أبحاث لعرضها
                    </h1>
                @else
                    <table>
                            <tr class="tableHead">
                                <th>اسم المحكم</th>
                                <th>عنوان البحث</th>
                                <th>وصف البحث</th>
                                <th>قرار المحكم</th>
                                <th>ملاحظات البحث</th>
                                <th>القرار النهائي</th>
                            </tr>
                        @foreach($review as $item)
                            <tr class="tableBody">
                                <td>{{$item->name}}</td>
                                <td>{{$item->research_title}}</td>
                                <td>
                                    <div class='fix'>
                                        {{$item->abstract}}
                                    </div>
                                </td>
                                <td>{{$item->decision}}</td>
                                @if (empty($item->suggest))
                                    <td>لا يوجد ملاحظات</td>
                                @else
                                    <td>
                                        <a class="text-indigo-500" href="{{route('download',$item->suggest)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </a>
                                    </td>
                                @endif
                                <td>
                                    <div class="flex flex-wrap gap-2">
                                        <form method="POST" action="{{route("accept")}}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="text" name="id" value="{{$item->id}}" hidden>
                                            <button class="w-20 p-2 rounded-lg inline-block bg-green-500 text-white hover:bg-green-600" type="submit" name="submit" value="accept">نشر</button>
                                        </form>
                                        <form method="POST" action="{{route("reject")}}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="text" name="id" value="{{$item->id}}" hidden>
                                            <button class="w-20 p-2 rounded-lg inline-block bg-red-400 text-white hover:bg-red-500" type="submit" name="submit" value="reject">رفض</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
