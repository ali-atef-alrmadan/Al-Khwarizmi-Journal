<x-app-layout>{{-- feedback--}}
    <x-slot name="header">
        <h2 class="text-lg text-gray-400 leading-tight text-right">
            {{ __('مراجعات الزوار') }}
        </h2>
    </x-slot>
    <div class="w-full h-100 overflow-y-auto" dir="rtl">
        <div class="tableContanier">
            <div class="text-right mb-5">
                <x-jet-validation-errors class="mb-4" />
            </div>
            <div class="tableContent">
                @if ($feedback->isEmpty())
                    <h1 class="msg text-bold">
                        لا يوجد رسائل
                    </h1>
                @else
                    <table>
                        <tr class="tableHead">
                            <th>الاسم</th>
                            <th>الايميل</th>
                            <th>الرسائل</th>
                        </tr>
                        @foreach($feedback as $item)
                            <tr class="tableBody">
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>
                                    <div class="fix">
                                        {{$item->message}}
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
