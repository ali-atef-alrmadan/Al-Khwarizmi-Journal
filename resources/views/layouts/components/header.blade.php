{{-- header start --}}

    <header class="header h-20 bg-white sticky top-0 left-0 z-50">

        <nav class="h-full w-11/12 mx-auto flex justify-between items-center p-2" dir="rtl">

            {{-- logo & linkes wrapper start --}}

                <div class="h-full flex justify-center items-center gap-x-20 lg:gap-x-40">

                    {{-- logo start--}}
                    <div class="flex flex-col h-full">
                        <img class="h-4/6 min-w-min" src="images/SVG/newLogo.svg" alt="log">
                        <h1 class="focus:outline-none text-xl font-black text-center text-indigo-500">Alkhawarizmi</h1>
                    </div>

                    {{-- logo end--}}

                    {{-- links start --}}

                        <div class="h-full hidden md:flex md:justify-center md:items-center gap-x-10 lg:gap-x-20 text-gray-400">

                            {{-- Home page link start --}}

                                <a class="link-hover-effect p-2 relative" href="/">
                                الصحفة الرئيسية
                                </a>

                            {{-- Home page link end --}}

                            {{-- Research page link start --}}

                                <a class="link-hover-effect p-2 relative" href="/search">
                                    تصفح الأبحاث
                                </a>

                            {{-- Research page link end --}}

                            {{-- Services section link start --}}

                                <a class="link-hover-effect p-2 relative" href="/#Services">
                                    خدماتنا
                                </a>

                            {{-- Services section link end --}}

                            {{-- Contact us section link start --}}

                                <a class="link-hover-effect p-2 relative" href="/#Contact">
                                    تواصل معنا
                                </a>

                            {{-- Contact us section link end --}}

                        </div>

                    {{-- links end --}}

                </div>

            {{-- logo & linkes wrapper end --}}

            {{-- icons & hidden lists wrapper start --}}

                <div class="h-full flex justify-center items-center gap-x-5">

                    {{-- user list strat --}}

                        <div class="relative hidden md:block">

                            {{-- icon start --}}

                                <button class="btn-user p-2 rounded-full flex justify-center items-center bg-gray-200 transition-colors hover:bg-indigo-500 active:bg-indigo-500 text-gray-400 hover:text-white active:text-white">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>

                                </button>

                            {{-- icon end --}}

                            {{-- drop list start --}}

                                <div class="list-user p-2 mt-2 hidden flex-col justify-center items-center absolute left-0 top-full bg-white drop-shadow-lg rounded-md z-50">

                                    <a class="w-full whitespace-nowrap p-3 flex justify-start items-center gap-x-2 rounded-sm text-gray-400 transition-colors hover:bg-indigo-500 active:bg-indigo-500 hover:text-white active:text-white" href="/login">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        <span>تسجيل الدخول</span>
                                    </a>

                                    <a class="w-full whitespace-nowrap p-3 flex justify-start items-center gap-x-2 rounded-sm text-gray-400 transition-colors hover:bg-indigo-500 active:bg-indigo-500 hover:text-white active:text-white" href="/register">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>انشاء حساب جديد</span>
                                    </a>

                                </div>

                            {{-- drop list end --}}

                        </div>

                    {{-- user list end --}}

                    {{-- menu list start --}}

                        <div class="relative md:hidden">

                            {{-- icon start --}}

                                <button class="btn-menu p-2 rounded-full flex justify-center items-center bg-gray-200 transition-colors hover:bg-indigo-500 active:bg-indigo-500 text-gray-400 hover:text-white active:text-white">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    </svg>

                                </button>

                            {{-- icon end --}}

                            {{-- drop list start --}}

                                <div class="list-menu p-2 mt-2 hidden flex-col justify-center items-cente absolute left-0 top-full bg-white drop-shadow-lg rounded-md z-50">

                                    <a class="w-full whitespace-nowrap p-3 flex justify-start items-center gap-x-2 rounded-sm text-gray-400 transition-colors hover:bg-indigo-500 active:bg-indigo-500 hover:text-white active:text-white" href="/">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>

                                        <span>الصحفة الرئيسية</span>

                                    </a>


                                    <a class="w-full whitespace-nowrap p-3 flex justify-start items-center gap-x-2 rounded-sm text-gray-400 transition-colors hover:bg-indigo-500 active:bg-indigo-500 hover:text-white active:text-white" href="research">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>

                                        <span>تصفح الأبحاث</span>

                                    </a>


                                    <a class="w-full whitespace-nowrap p-3 flex justify-start items-center gap-x-2 rounded-sm text-gray-400 transition-colors hover:bg-indigo-500 active:bg-indigo-500 hover:text-white active:text-white" href="#Services">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>

                                        <span>خدماتنا</span>

                                    </a>

                                    <a class="w-full whitespace-nowrap p-3 flex justify-start items-center gap-x-2 rounded-sm text-gray-400 transition-colors hover:bg-indigo-500 active:bg-indigo-500 hover:text-white active:text-white" href="#Contact">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                        </svg>

                                        <span>تواصل معنا</span>

                                    </a>

                                    <a class="w-full whitespace-nowrap p-3 flex justify-start items-center gap-x-2 rounded-sm text-gray-400 transition-colors hover:bg-indigo-500 active:bg-indigo-500 hover:text-white active:text-white" href="/login">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>

                                        <span>تسجيل الدخول</span>

                                    </a>


                                    <a class="w-full whitespace-nowrap p-3 flex justify-start items-center gap-x-2 rounded-sm text-gray-400 transition-colors hover:bg-indigo-500 active:bg-indigo-500 hover:text-white active:text-white" href="/register">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>

                                        <span>انشاء حساب جديد</span>

                                    </a>

                                </div>

                            {{-- drop list end --}}

                        </div>

                    {{-- menu list end --}}

                </div>

            {{-- icons & hidden lists wrapper end --}}

        </nav>

    </header>

{{-- header end --}}
