<x-jet-dropdown align="left" width="48">
    <x-slot name="content">
        @if (Auth::user()->hasRole('author|reviewer'))
            <?php
                $research_new = DB::select('select s.* from research s inner join reviews v on s.id=v.research_id where status_research="new" and author_id = ?', [Auth::user()->id]);
                $research_in_review = DB::select('select s.* from research s inner join reviews v on s.id=v.research_id where status_research="in review" and author_id = ?', [Auth::user()->id]);
                $research_reviewed = DB::select('select s.* from research s inner join reviews v on s.id=v.research_id where status_research="reviewed" and author_id = ?', [Auth::user()->id]);
                $research_post = DB::select('select s.* from research s inner join reviews v on s.id=v.research_id where status_research="post" and author_id = ?', [Auth::user()->id]);
                $research_reject = DB::select('select s.* from research s inner join reviews v on s.id=v.research_id where status_research="reject" and author_id = ?', [Auth::user()->id]);
                $Noti1 = count($research_new);
                $Noti2 = count($research_in_review);
                $Noti3 = count($research_reviewed);
                $Noti4 = count($research_post);
                $Noti5 = count($research_reject);

                //reviewer noti
                $research = DB::select('select s.* from research s inner join reviews v on s.id=v.research_id where status_research="in review" and reviewer_id = ?', [Auth::user()->id]);
                $Noti=count($research);
            ?>
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                @if($Noti + $Noti1 + $Noti2 + $Noti3 + $Noti4 + $Noti5 === 0)
                    <x-jet-dropdown-link href="">
                        لا يوجد أشعارات
                    </x-jet-dropdown-link>
                @endif
                @if($Noti1 > 0)
                    <x-jet-dropdown-link href="{{Route('trankingResearch')}}">
                        يوجد لديك {{$Noti1}} بحث جديد
                    </x-jet-dropdown-link>
                @endif
                @if($Noti2 > 0)
                    <x-jet-dropdown-link href="{{Route('trankingResearch')}}">
                        لديك {{$Noti2}} بحث قيد التقيم
                    </x-jet-dropdown-link>
                @endif
                @if($Noti3 > 0)
                    <x-jet-dropdown-link href="{{Route('trankingResearch')}}">
                        لديك {{$Noti3}} مقيم
                    </x-jet-dropdown-link>
                @endif
                @if($Noti4 > 0)
                    <x-jet-dropdown-link href="{{Route('trankingResearch')}}">
                        تم نشر {{$Noti4}} ابحاث
                    </x-jet-dropdown-link>
                @endif
                @if($Noti5 > 0)
                    <x-jet-dropdown-link href="{{Route('trankingResearch')}}">
                        تم رفض {{$Noti5}} بحث
                    </x-jet-dropdown-link>
                @endif
                @if (Auth::user()->hasRole('reviewer'))
                    @if($Noti > 0)
                        <x-jet-dropdown-link href="{{Route('RatingResearch')}}">
                            لديك {{$Noti}} بحث يحتاج تقيم
                        </x-jet-dropdown-link>
                    @endif
                @endif

            </div>

        @endif

        @if (Auth::user()->hasRole('editor'))
            <?php
                $research_new = DB::select('select s.* from research s inner join reviews v on s.id=v.research_id where status_research = ?', ["new"]);
                $research_reviewed = DB::select('select s.* from research s inner join reviews v on s.id=v.research_id where status_research = ?', ["reviewed"]);
                $Noti1 = count($research_new);
                $Noti2 = count($research_reviewed);
            ?>
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                @if($Noti1 + $Noti2 === 0)
                    <x-jet-dropdown-link href="">
                        لا يوجد أشعارات
                    </x-jet-dropdown-link>
                @endif
                @if($Noti1 > 0)
                    <x-jet-dropdown-link href="{{Route('SendtoReviewer')}}">
                        يوجد لديك {{$Noti1}} بحث جديد
                    </x-jet-dropdown-link>
                @endif
                @if($Noti2 > 0)
                    <x-jet-dropdown-link href="{{Route('decision')}}">
                        تم تقيم {{$Noti2}} من الابحاث
                    </x-jet-dropdown-link>
                @endif
            </div>
        @endif
    </x-slot>
    <x-slot name="trigger">
        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition text-indigo-300 relative">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
            {{-- new note svg --}}
            @if (Auth::user()->hasRole('author|reviewerr'))
                @if($Noti1 + $Noti2 + $Noti3 + $Noti4 + $Noti5 !== 0)
                    <div class="w-2 h-2 rounded-full bg-red-500 absolute right-0 top-0">
                    </div>
                @endif
            @endif
            @if (Auth::user()->hasRole('reviewer'))
                @if($Noti !== 0)
                    <div class="w-2 h-2 rounded-full bg-red-500 absolute right-0 top-0">
                    </div>
                @endif
            @endif
            @if (Auth::user()->hasRole('editor'))
                @if($Noti1 + $Noti2 !== 0)
                    <div class="w-2 h-2 rounded-full bg-red-500 absolute right-0 top-0">
                    </div>
                @endif
            @endif
        </button>
    </x-slot>
</x-jet-dropdown>



