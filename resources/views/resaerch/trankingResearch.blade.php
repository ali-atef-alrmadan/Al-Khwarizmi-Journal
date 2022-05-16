<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg text-gray-400 leading-tight text-right">
            {{ __('عرض أبحاثي') }}
        </h2>
    </x-slot>
    <div class="w-full h-100 overflow-y-auto" dir="rtl">
        <div class="tableContanier">
            <div class="text-right mb-5">
                <x-jet-validation-errors class="mb-4" />
            </div>
            {{-- {{dd($research)}} --}}
            <div class="tableContent">
                @if (empty($research))
                    <h1 class="msg text-bold">
                        قائمة الأبحاث فارغة
                    </h1>
                @else
                    <table>
                        <tr class="tableHead">
                            <th>عنوان البحث</th>
                            <th>وصف البحث</th>
                            <th>نوع البحث</th>
                            <th>مجال البحث</th>
                            <th>حالة البحث</th>
                            <th>ملاحظات البحث</th>
                            <th>تحميل البحث</th>
                        </tr>
                        @foreach($research as $item)
                            <tr class="tableBody">
                                <td>{{$item->research_title}}</td>
                                <td>
                                    <div class="fix">
                                        {{$item->abstract}}
                                    </div>
                                </td>
                                <td>{{$item->type_research}}</td>
                                <td>{{$item->research_field}}</td>
                                <td>
                                    @if($item->status_research === 'new')
                                        جديد
                                    @endif
                                    @if($item->status_research === 'in review')
                                        قيد التقييم
                                    @endif
                                    @if($item->status_research === 'reviewed')
                                        تم تقيمه
                                    @endif
                                    @if($item->status_research === 'post')
                                        منشور
                                    @endif
                                    @if($item->status_research === 'reject')
                                        مرفوض
                                    @endif
                                </td>
                                @if (empty($item->suggest))
                                <td>
                                    لا يوجد ملاحظات
                                </td>
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
