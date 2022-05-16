@extends('layouts.layout')
@section('content')
    <div class="w-full">
        <form class="w-full flex justify-center items-center flex-col p-5" type="get" action="{{url('/search')}}">
            @csrf
            <div class="md:w-max w-full">
                {{-- <img class="w-80 mx-auto" src="images/SVG/Search-rafiki.svg"> --}}
                <div class="bg-white border-2 border-indigo-500 rounded-full overflow-hidden flex justify-start items-center">
                    <input dir="rtl" class="bg-transparent border-none focus:outline-none md:w-96 w-full" type="search" placeholder="بحث" name="query">
                    <button type="submit" class="inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500 hover:text-indigo-800 mx-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </div>
        </form>
        <div class="flex flex-wrap flex-row-reverse justify-center items-center gap-10 p-5">
            @if($post->isEmpty())
                <h1 class="text-3xl text-bold text-gray-300 text-center mt-20 mx-auto">
                    لا يوجد نتائج لعرضها
                </h1>
            @else
                @foreach ($post as $item)
                    <div style="height: 500px" class="md:w-96 w-full bg-white shadow rounded-md flex flex-col relative" dir="rtl">
                        <div class="w-full h-64 overflow-hidden p-3 rounded-sm">
                            <img class="w-full rounded-sm" src="{{asset('storage/images research/'.$item->address_img)}}">
                        </div>
                        <div class="w-full h-20 p-3">
                            <a href="{{route('download',$item->address_file)}}">
                                <h1 name="name" class="text-2xl font-semibold text-gray-800 mb-2 hover:text-indigo-500">{{$item->research_title}}</h1>
                            </a>
                            <h1 class="mb-2">{{$item->type_research}}   |   {{$item->research_field}}</h1>
                        </div>
                        <div class="w-full h-24 p-3 text-gray-400 overflow-y-auto scrollbar scrollbar-thumb-gray-300 scrollbar-track-gray-100">
                            <p class="w-full">{{$item->abstract}}</p>
                        </div>
                        <div class="w-full absolute bottom-0 left-0 p-3" dir="rtl">
                            <a class="w-min p-2 bg-indigo-500 text-white flex justify-center items-center rounded-md hover:bg-indigo-800" href="{{route('download',$item->address_file)}}">
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </button>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
