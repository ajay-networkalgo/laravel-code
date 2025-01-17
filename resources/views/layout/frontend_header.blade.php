@php
$routeName = Route::currentRouteName();
@endphp
@if($routeName == 'frontened.book.consultation')
<header class="bg-primary-black absolute z-[999] w-full top-0 left-0 z-50">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="h-20 flex items-center justify-between">
            <a href="/">
                <img class="lazyload" data-src="{{ asset('assets/Solax_Logo.svg') }}" alt="Solax Power" />
            </a>

            <div>
                <button onclick="window.location.href='{{ url('/') }}'" class="font-primary text-[#C8C8C8] uppercase">
                    [X] Close
                </button>
            </div>
        </div>
    </div>
</header>
@elseif($routeName == 'frontened.book.success')
<header class="bg-primary-black">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="h-20 flex items-center justify-center">
            <a href="{{ url('/') }}">
                <img class="lazyload" data-src="{{ asset('assets/Solax_Logo.svg') }}" alt="Solax Power" />
            </a>
        </div>
    </div>
</header>
@else
<header class="bg-primary-black z-[999] w-full top-0 left-0 z-50">
    <div class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="h-20 flex items-center justify-between">
            <a href="{{ url('/') }}"><img class="lazyload" data-src="{{ asset('assets/Solax_Logo.svg') }}" alt="Solax Power" /></a>
            <div id="navMenu" class="nav-menu py-10 px-6 lg:px-0 lg:py-0 lg:w-2/3 flex flex-col lg:flex-row items-center justify-between gap-6 absolute z-50 w-[320px] sm:w-[448px] md:w-[672px] lg:w-[65%] rounded-2xl lg:rounded-none top-24 bg-primary-black lg:static">
                <ul class="flex flex-col lg:flex-row gap-6 lg:gap-10">
                    <li class="flex justify-center">
                        <a class="font-primary text-primary-white font-medium" href="{{ route('frontened.homeowners') }}">Homeowners</a>
                    </li>
                    <li class="flex justify-center">
                        <a class="font-primary text-primary-white font-medium" href="{{ route('frontened.installer') }}">Installers</a>
                    </li>
                    <li class="flex justify-center">
                        <a class="font-primary text-primary-white font-medium" href="{{ route('frontened.products') }}">Products</a>
                    </li>
                    <li class="flex justify-center">
                        <a class="font-primary text-primary-white font-medium" href="{{ route('news.frontened.index') }}">News</a>
                    </li>
                </ul>
                <div class="flex flex-row-reverse lg:flex-row items-center justify-center flex-wrap gap-4">
                    <!-- contact-button -->
                    <div>
                        <a href="tel:+1-877-899-9937" class="contactButton">
                            <svg
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                class="svgIcon">
                                <path
                                    d="M21.7388 16.4138C21.5716 17.6841 20.9477 18.8502 19.9837 19.6942C19.0196 20.5382 17.7813 21.0023 16.5 21.0001C9.05626 21.0001 3.00001 14.9438 3.00001 7.50005C2.99771 6.21876 3.4619 4.98045 4.30588 4.01639C5.14986 3.05234 6.31592 2.42847 7.58626 2.2613C7.9075 2.22208 8.2328 2.2878 8.51362 2.44865C8.79444 2.60951 9.0157 2.85687 9.14438 3.1538L11.1244 7.57412V7.58537C11.2229 7.81267 11.2636 8.06083 11.2428 8.30769C11.222 8.55455 11.1404 8.79242 11.0053 9.00005C10.9884 9.02537 10.9706 9.0488 10.9519 9.07224L9.00001 11.386C9.7022 12.8129 11.1947 14.2922 12.6403 14.9963L14.9222 13.0547C14.9446 13.0359 14.9681 13.0184 14.9925 13.0022C15.2 12.8639 15.4387 12.7794 15.687 12.7565C15.9353 12.7336 16.1854 12.7729 16.4147 12.871L16.4269 12.8766L20.8434 14.8557C21.1409 14.9839 21.3889 15.205 21.5503 15.4858C21.7116 15.7667 21.7778 16.0922 21.7388 16.4138Z" />
                            </svg>
                        </a>
                    </div>
                    <div class="primary-btn">
                        <button
                            onclick="window.location.href='/book-consultation'"
                            class="bg-primary-yellow border border-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium transition-all duration-300 group hover:bg-transparent hover:border-primary-white hover:text-primary-white">
                            Get Started
                        </button>
                    </div>
                </div>
            </div>
            <div class="relative lg:hidden">
                <input type="checkbox" id="checkbox" />
                <label for="checkbox" class="toggle">
                    <div class="bars" id="bar1"></div>
                    <div class="bars" id="bar2"></div>
                    <div class="bars" id="bar3"></div>
                </label>
            </div>
        </div>
    </div>
</header>

<!-- floating header - view in desktop only -->
<!-- <header class="floatingheader fixed top-6 z-[99] w-full hidden md:block">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex items-center">
            <div
                class="bg-[#15151580] border border-[#C8C8C824] flex items-center gap-4 p-4 rounded-full">
                <a href="{{ url('/') }}">
                    <img class="lazyload" data-src="{{ asset('assets/Solax_Logo.svg') }}" alt="Solax Power" />
                </a>

                @if($routeName == 'frontened.installer' || $routeName == 'frontened.book.appointment')
                <a
                    href="{{ url('/book-appointment#book-appointment') }}"
                    class="bg-primary-yellow border border-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium flex items-center gap-2 transition-all duration-300 group hover:bg-transparent hover:border-primary-white hover:text-primary-white">
                    <span>Book Appointment</span>
                    <img class="lazyload transition-all duration-300 group-hover:invert group-hover:translate-x-2" data-src="{{ asset('assets/ArrowLeft.svg') }}" alt="arrowLeft" />
                </a>
                @else
                <a
                    href="{{ url('/book-consultation') }}"
                    class="bg-primary-yellow border border-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium flex items-center gap-2  transition-all duration-300 group hover:bg-transparent hover:border-primary-white hover:text-primary-white">
                    <span>Get Started</span>
                    <img class="lazyload transition-all duration-300 group-hover:invert group-hover:translate-x-2" data-src="{{ asset('assets/ArrowLeft.svg') }}" alt="arrowLeft" />
                </a>
                @endif
            </div>
        </div>
    </div>
</header> -->

<header class="floatingheader fixed left-[5%] top-6 z-[99] hidden md:block">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex items-center">
            <div
                class="bg-[#15151580] border border-[#C8C8C824] flex items-center gap-4 p-4 rounded-full">
                <a href="{{ url('/') }}">
                    <img class="lazyload" data-src="{{ asset('assets/Solax_Logo.svg') }}" alt="Solax Power" />
                </a>

                @if($routeName == 'frontened.installer' || $routeName == 'frontened.book.appointment')
                <a
                    href="{{ url('/book-appointment#book-appointment') }}"
                    class="bg-primary-yellow border border-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium flex items-center gap-2 transition-all duration-300 group hover:bg-transparent hover:border-primary-white hover:text-primary-white">
                    <span>Book Appointment</span>
                    <img class="lazyload transition-all duration-300 group-hover:invert group-hover:translate-x-2" data-src="{{ asset('assets/ArrowLeft.svg') }}" alt="best battery for solar power storage" />
                </a>
                @else
                <a
                    href="{{ url('/book-consultation') }}"
                    class="bg-primary-yellow border border-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium flex items-center gap-2  transition-all duration-300 group hover:bg-transparent hover:border-primary-white hover:text-primary-white">
                    <span>Get Started</span>
                    <img class="lazyload transition-all duration-300 group-hover:invert group-hover:translate-x-2" data-src="{{ asset('assets/ArrowLeft.svg') }}" alt="best battery for solar power storage" />
                </a>
                @endif
            </div>
        </div>
    </div>
</header>
@endif
