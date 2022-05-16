<x-app-layout>{{-- tranking to Reviewer--}}
    <x-slot name="header">
        <h2 class="text-lg text-gray-400 leading-tight text-right">
            {{ __('عرض جميع الأبحاث') }}
        </h2>
    </x-slot>
    <div class="w-full h-100 overflow-y-auto" dir="rtl">
        <div class="tableContanier">
            <div class="text-right mb-5">
                <x-jet-validation-errors class="mb-4" />
            </div>
            <div class="tableContent">
                @if ($review->isEmpty())
                    <h1 class="msg text-bold">
                        لا يوجد أبحاث لعرضها
                    </h1>
                @else
                    <table>
                        <tr class="tableHead">
                            <th>عنوان البحث</th>
                            <th>وصف البحث</th>
                            <th>نوع البحث</th>
                            <th>مجال البحث</th>
                            <th>حالة البحث</th>
                        </tr>
                        @foreach($review as $item)
                            <tr class="tableBody">
                                <td>{{$item->research_title}}</td>
                                <td>
                                    <div class="fix">
                                        {{$item->abstract}}
                                    </div>
                                </td>
                                <td> {{$item->type_research}}</td>
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
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
