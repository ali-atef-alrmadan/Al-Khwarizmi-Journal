<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg text-gray-400 leading-tight text-right">
            {{ __('إرسال الأبحاث للتقييم') }}
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
                        لا يوجد أبحاث حالياً
                    </h1>
                @else
                    <form method="POST" action="{{route("SendtoReview")}}" enctype="multipart/form-data">
                        @csrf
                        <table>
                            <tr class="tableHead">
                                <th>اختار البحث</th>
                                <th>عنوان البحث</th>
                                <th>وصف البحث</th>
                                <th>نوع البحث</th>
                                <th>مجال البحث</th>
                                <th>تحميل</th>
                            </tr>
                            @foreach($research as $research)
                                <tr class="tableBody">
                                    <input type="text" name="author_id" value="{{$research->author_id}}" hidden>
                                    <td><input type="radio" required name="research_select" value="{{$research->id}}"></td>
                                    <td>{{$research->research_title}}</td>
                                    <td>
                                        <div class="fix">
                                            {{$research->abstract}}
                                        </div>
                                    </td>
                                    <td>{{$research->type_research}}</td>
                                    <td>{{$research->research_field}}</td>
                                    <td>
                                        <a class="text-indigo-500" href="{{route('download',$research->address_file)}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <table class="mt-10">
                            <tr class="tableHead">
                                <th>اختيار المحكم</th>
                                <th>اسم المحكم</th>
                                <th>شهادة المحكم</th>
                                <th>مكان عمل المحكم</th>
                                <th>بريد المحكم</th>
                            </tr>
                            @foreach($Reviewer as $Reviewer)
                                <tr class="tableBody">
                                    <td><input type="radio" required name="select_Reviewer" value="{{$Reviewer->id}}"></td>
                                    <td>{{$Reviewer->name}}</td>
                                    <td>{{$Reviewer->degree}}</td>
                                    <td>{{$Reviewer->Institution}}</td>
                                    <td>{{$Reviewer->email}}</td>
                                </tr>
                            @endforeach
                        </table>
                        <input type="submit" class="w-32 mt-5 rounded-md p-3 inline-block bg-indigo-500 text-white cursor-pointer hover:bg-indigo-600" value="إرسال">
                    </form>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
