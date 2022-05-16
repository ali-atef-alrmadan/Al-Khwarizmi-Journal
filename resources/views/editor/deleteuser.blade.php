<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg text-gray-400 leading-tight text-right">
            {{ __('حذف الاعضاء') }}
        </h2>
    </x-slot>
        <div class="w-full h-100 overflow-y-auto" dir="rtl">
            <div class="tableContanier">
                <div class="text-right mb-5">
                    <x-jet-validation-errors class="mb-4" />
                </div>
                <div class="tableContent">
                    @if($User->isEmpty())
                        <h1 class="msg text-bold">
                            لا يوجد نتائج
                        </h1>
                    @else
                        <table>
                            <tr class="tableHead">
                                <th>اسم الباحث</th>
                                <th>الدرجة العلمية</th>
                                <th>مكان العمل</th>
                                <th>البريد الإلكتروني</th>
                                <th>حذف العضو</th>
                            </tr>
                            @foreach ($User as $item)
                                <tr class="tableBody">
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->degree}}</td>
                                    <td>{{$item->Institution}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>
                                        <form method="POST" action="{{route("DeleteUser")}}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="text" name="id" value="{{$item->id}}" hidden>
                                            <button class="w-20 p-2 rounded-lg inline-block bg-red-500 text-white hover:bg-red-600" type="submit" name="submit" value="accept">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @endif
                </div>
            </div>
        </div>
</x-app-layout>
