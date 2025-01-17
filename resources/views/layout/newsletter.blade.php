<section class="lg:py-24 md:py-16">
    @if(Session::has('message_news'))
    @php
    $alertClass = Session::get('alert-class') ?? 'bg-gray-200 text-gray-800'; // Default styling
    $iconClass = Session::get('icon-class') ?? 'text-gray-600'; // Default icon styling
    @endphp
    <div class="relative px-4 py-3 rounded-lg {{ $alertClass }} mb-4" role="alert">
        <button type="button" class="absolute top-0 right-0 p-2" data-dismiss="alert" aria-label="Close">
            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <div class="flex items-center space-x-2" style="color:white">
            <i class="{{ $iconClass }}"></i>
            <p class="m-0">Contact us has been added successfully.</p>
        </div>
    </div>
    @endif
    <div class="default_container sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="bg-gradient-to-r from-[#EEBB0C] to-[#EF6818] py-10 px-[40px] md:px-[90px] flex flex-col-reverse gap-10 lg:flex-row justify-between items-center">
            <div class="flex flex-col gap-10 lg:max-w-[45%] xl:max-w-[35%]">
                <div class="flex flex-col gap-4">
                    <h3 class="font-primary text-4xl font-medium text-primary-black text-center lg:text-left">
                        Join Our Newsletter
                    </h3>
                    <p class="font-secondary text-primary-black text-center lg:text-left">
                        Keep yourself updated with latest news and updates
                    </p>
                </div>
                <form action="" method="post" id="addNewsLetterForm">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="flex py-2.5 pr-2.5 pl-[18px] bg-white rounded-full flex justify-between custom_email_message">
                        <input class="font-primary text-primary-black grow text-base focus:outline-none" type="text" id="email" name="email" placeholder="Enter your email" />
                        <button class="bg-primary-yellow border border-primary-yellow py-4 px-6 rounded-full flex items-center gap-2 font-medium transition-all duration-300 group hover:bg-transparent hover:border-primary-black hover:text-primary-black" type="submit">
                            <span>Subscribe
                                <div id="page-loader" class="hidden text-center py-4">
                                    <svg class="page-spinner animate-spin h-10 w-10 text-primary-yellow mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                                    </svg>
                                </div>
                            </span>
                            <img class="lazyload hidden lg:inline-block transition-all duration-300" data-src="{{ asset('assets/ArrowLeft.svg') }}" alt="best battery for solar power storage" />
                        </button>
                    </div>
                    <span style="color:green;font-weight: 500;display: none;" id="news_message">Thank You, You are subscribed successfully.</span>
                    <div id="error-messages" class="hidden text-red-600 mb-4"></div>
                </form>
            </div>
            <div>
                <img class="lazyload" data-src="{{ asset('assets/white-logo-17242101578945-removebg-preview1.png') }}" alt="backup power for home" />
            </div>
        </div>
    </div>
</section>
