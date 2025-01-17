@extends('layout.frontend')
@section('page-content')
<style>
    .tab-content {
        display: none;
        width: 100%;
        top: 0;
    }

    .tab-content.active {
        display: block;
        animation: tabAnimation 0.5s ease-in-out;
    }

    @keyframes tabAnimation {
        0% {
            opacity: 0;
            transform: translateY(15px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
<section class="relative h-screen overflow-x-hidden">
<video
        autoplay
        muted
        loop
        id="banner-video"
        poster=""
        class="h-full w-full object-cover">
        <source id="banner-video-src" data-src-desktop="{{ asset('/assets/videos/compressed/event-banner.mp4') }}" data-src-mobile="{{ asset('/assets/videos/compressed/news-mobile-video.mp4') }}" type="video/mp4" />
        Your browser does not support the video tag.
    </video>
    <div class="content absolute bg-[#15151580] w-full h-full top-0 left-0">
        <div class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
            <div class="hero-content h-screen flex flex-col items-center gap-6 pt-20 pb-24 justify-end">
                <div class="hero-content-top flex flex-col items-center gap-4">
                    <span class="font-primary text-lg text-primary-yellow font-medium uppercase">Olax Power</span>
                    <h1 class="font-primary text-primary-white text-[42px] leading-[48px] sm:text-[52px] sm:leading-[58px] lg:text-[72px] lg:leading-[80px] xl:text-[80px] xl:leading-[88px] text-center">EVENTS</h1>
                </div>
                <div
                    class="hero-content-btm flex flex-col md:flex-row items-center justify-center gap-4 w-[80%] md:max-w-none">
                    <button onclick="document.getElementById('events-lineup').scrollIntoView({ behavior: 'smooth' });"
                        class="bg-primary-yellow border border-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium flex items-center gap-2 w-full md:w-auto text-sm lg:text-base justify-center transition-all duration-300 group hover:bg-transparent hover:border-primary-white hover:text-primary-white">
                        <span>Event Lineup</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-24 bg-primary-white">
    <div class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto" id="events-lineup">
        <div class="flex flex-col gap-12">
            <div class="flex">
                <button data-tab="upcoming-events" class="tab-link py-4 border-b-2 border-[#444444] font-secondary text-lg lg:text-3xl w-full border-primary-yellow">Upcoming Events</button>
                <button data-tab="past-events" class="tab-link py-4 border-b-2 border-[#444444] font-secondary text-lg lg:text-3xl w-full">
                    Past Events
                </button>
            </div>
            <div id="events-lists">
                <div id="upcoming-events" class="tab-content active">
                    <ul class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-10">

                        <?php if ($upcomingEvents->count() > 0) { ?>
                            <?php foreach ($upcomingEvents as $event_item) {
                                $encryptId = base64_encode($event_item->id); ?>
                                <li>
                                    <a href="{{ route('events.frontened.details', $event_item->slug) }}" class="flex flex-col gap-4">
                                        <div>
                                            <img class="w-full lazyload" data-src="/img/events_images/feature_image/{{$event_item->featured_image}}" alt="event_1" />
                                        </div>
                                        <div class="flex flex-col gap-1">
                                            <h3 class="font-primary text-xl font-medium text-primary-black">{{$event_item->title}}</h3>
                                            <div>
                                                <div class="flex items-center gap-2">
                                                    <img src="{{ asset('assets/events/calendar-silhouette.svg') }}" alt="calendar" />
                                                    <span class="font-secondary text-[#444444] font-bold">{{$event_item->formatted_date_range}}</span>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <img src="{{ asset('/assets/events/location_icon.svg') }}" alt="location_icon" />
                                                    <span class="font-secondary text-[#444444] font-bold">{{$event_item->location}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } else { ?>
                            <li>
                                <div class="flex flex-col gap-1">
                                    <h3 class="font-primary text-xl font-medium text-primary-black">No Upcoming Event Available!</h3>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>

                <div id="past-events" class="tab-content">
                    <ul class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-10">
                        <?php if ($pastEvents->count() > 0) { ?>
                            <?php foreach ($pastEvents as $event_item) {
                                $encryptId = base64_encode($event_item->id); ?>
                                <li>
                                    <a href="{{ route('events.frontened.details', $event_item->slug) }}" class="flex flex-col gap-4">
                                        <div>
                                            <img class="w-full lazyload" data-src="/img/events_images/feature_image/{{$event_item->featured_image}}" alt="event_1" />
                                        </div>
                                        <div class="flex flex-col gap-1">
                                            <h3 class="font-primary text-xl font-medium text-primary-black">{{$event_item->title}}</h3>
                                            <div>
                                                <div class="flex items-center gap-2">
                                                    <img src="{{ asset('assets/events/calendar-silhouette.svg') }}" alt="calendar" />
                                                    <span class="font-secondary text-[#444444] font-bold">{{$event_item->formatted_date_range}}</span>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <img src="{{ asset('/assets/events/location_icon.svg') }}" alt="location_icon" />
                                                    <span class="font-secondary text-[#444444] font-bold">{{$event_item->location}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } else { ?>
                            <li>
                                <div class="flex flex-col gap-1">
                                    <h3 class="font-primary text-xl font-medium text-primary-black">No Past Event Available!</h3>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <?php if($upcomingEventsCount > 6 || $pastEventsCount > 6) { ?>
            <div class="flex justify-center lg:pt-16">
                <button class="bg-primary-yellow border border-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium flex items-center gap-2 w-full md:w-auto justify-center transition-all duration-300 hover:bg-transparent hover:text-primary-black hover:border-primary-black" id="load-more">
                    <span>More Events</span>
                </button>
            </div>
            <?php } ?>
            <div id="loader" class="hidden text-center py-4">
                <svg class="animate-spin h-5 w-5 text-primary-yellow mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                </svg>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        let skip = 6;
        const tabLinks = document.querySelectorAll(".tab-link");
        const tabContents = document.querySelectorAll(".tab-content");
        tabLinks.forEach((link) => {
            link.addEventListener("click", () => {
                const tab = link.getAttribute("data-tab");

                tabLinks.forEach((link) =>
                    link.classList.remove("border-primary-yellow", "font-bold")
                );
                link.classList.add("border-primary-yellow", "font-bold");

                tabContents.forEach((content) => {
                    content.classList.remove("active");
                    if (content.getAttribute("id") === tab) {
                        content.classList.add("active");
                    }
                });
            });
        });
        document.getElementById('load-more').addEventListener('click', function () {
            let button = this;
            let loader = document.getElementById('loader');
            button.classList.add('hidden');
            loader.classList.remove('hidden');
            fetch(`/load-more-events/?skip=${skip}`, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                },
            })
            .then(response => response.text())
                .then(data => {
                    console.log(data);
                if(data){
                    document.getElementById('events-lists').insertAdjacentHTML('beforeend', data);
                    skip += 6;
                    button.classList.remove('hidden');
                    loader.classList.add('hidden');
                }else{
                    loader.classList.add('hidden');
                    button.classList.add('hidden');
                }

            })
            .catch(error => {
                console.error('Error:', error);
                button.classList.remove('hidden');
                loader.classList.add('hidden');
            });
        });
    });
</script>
@include('layout.newsletter')
@endsection
