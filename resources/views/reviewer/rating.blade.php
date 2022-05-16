<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg text-gray-400 leading-tight text-right">
            {{ __('تقييم الأبحاث') }}
        </h2>
    </x-slot>
    <div class="w-full h-100 overflow-y-auto" dir="rtl">
        <div class="tableContanier">
            <div class="text-right mb-5">
                <x-jet-validation-errors class="mb-4" />
            </div>
            <div class="tableContent">
                @if ($research->isempty())
                    <h1 class="msg text-bold">
                        قائمة الأبحاث فارغة
                    </h1>
                @else
                    <table>
                        <tr class="tableHead">
                            <th>تقييم البحث</th>
                            <th>ملاحظات البحث</th>
                            <th>عنوان البحث</th>
                            <th>نوع البحث</th>
                            <th>مجال البحث</th>
                            <th>وصف البحث</th>
                            <th>تحميل</th>
                        </tr>
                        @foreach($research as $item)
                            <tr class="tableBody">
                                <form method="POST" action="{{route("SendRatingResearch")}}" enctype="multipart/form-data" class="w-full">
                                    @csrf
                                    <td>
                                        <div class="space-y-2">
                                            <input type="text" name="id" value="{{$item->id}}" hidden>
                                            <input class="w-20 p-2 rounded-lg inline-block bg-green-500 text-white hover:bg-green-600 cursor-pointer" type="submit" name="submit" value="مقبول">
                                            <input class="w-20 p-2 rounded-lg inline-block bg-red-400 text-white hover:bg-red-500 cursor-pointer" type="submit" name="submit" value="مرفوض">
                                        </div>
                                    </td>
                                    <td>
                                        <label id="{{$item->id.'0'}}" class="p-2 rounded-lg border border-indigo-500 cursor-pointer" for="{{$item->id}}">
                                                اختار ملف
                                        </label>
                                        <div class="hidden">
                                            <input type="file" name="file" id="{{$item->id}}" onchange="changeName(this)">
                                        </div>
                                    </td>
                                </form>
                                <td>
                                    <div class="fix">
                                        {{$item->research_title}}
                                    </div>
                                </td>
                                <td>
                                    {{$item->type_research}}
                                </td>
                                <td>
                                    {{$item->research_field}}
                                </td>
                                <td>
                                    <div class="fix">
                                        {{$item->abstract}}
                                    </div>
                                </td>
                                <td>
                                    <a class="text-indigo-500" href="{{route('download',$item->address_file)}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
