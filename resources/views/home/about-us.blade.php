@extends('layout.frontend')
@section('page-content')
<style>

    .swiper-pagination-bullet {
        background: none !important;
        /* Remove background color */
        width: auto !important;
        /* Auto width to fit the text */
        height: auto !important;
        /* Auto height to fit the text */
        font-family: "Jost", "sans-serif";
        font-size: 18px;
        font-weight: 500;
        color: #151515;
        opacity: 0.5;
        border-radius: 0 !important;
        /* Remove rounded corners */
        display: inline-block;
        /* Display bullets inline */
        cursor: pointer;
        /* Show pointer on hover */
    }

    .swiper-pagination-bullet-active {
        opacity: 1;
    }

    .swiper-pagination-progressbar .swiper-pagination-progressbar-fill {
        background-color: #151515;
        /* Fill color */
        transition: all 0.3s ease;
        /* Smooth transition */
    }

    html {
        scroll-behavior: smooth;
    }

    /* @media (min-width: 992px) {
        .swiper-slide {
            display: flex !important;
        }
    } */
</style>
<section class="relative h-screen overflow-x-hidden">
    <video
        autoplay
        muted
        loop
        id="banner-video"
        poster=""
        class="h-full w-full object-cover">
        <source id="banner-video-src" data-src-desktop="{{ asset('/assets/videos/compressed/' . $aboutpagecontent['about_banner_video']['value'] ?? '') }}" data-src-mobile="{{ asset('/assets/videos/compressed/' . $aboutpagecontent['about_mobile_banner_video']['value'] ?? '') }}" type="video/mp4" />
        Your browser does not support the video tag.
    </video>
    <div class="content absolute bg-[#15151580] w-full h-full top-0 left-0">
        <div
            class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
            <div
                class="hero-content h-screen flex flex-col items-center gap-6 pt-20 pb-24 justify-end">
                <div class="hero-content-top flex flex-col items-center gap-4">
                    <!-- <span
            class="font-primary text-lg text-primary-yellow font-medium uppercase"
            >about us</span
          > -->
                    <h1
                        class="font-primary text-primary-white text-[42px] leading-[48px] sm:text-[52px] sm:leading-[58px] lg:text-[72px] lg:leading-[80px] xl:text-[80px] xl:leading-[88px] lg:max-w-[65%] text-center">
                        {{ $aboutpagecontent['about_banner_video_title']['value'] ?? '' }}
                    </h1>
                    <!-- <p
            class="font-secondary font-medium text-lg lg:text-xl text-primary-white lg:max-w-[50%] text-center"
          >
            Forward-Thinking, Superior Quality, Integrity, Collaborative
            Advantage
          </p> -->
                </div>

                <div
                    class="hero-content-btm flex flex-col md:flex-row items-center justify-center gap-4 w-[80%] md:max-w-none">
                    <button onclick="document.getElementById('our-mission').scrollIntoView({ behavior: 'smooth' });"
                        class="bg-primary-yellow border border-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium flex items-center gap-2 w-full md:w-auto text-sm lg:text-base justify-center transition-all duration-300 group hover:bg-transparent hover:border-primary-white hover:text-primary-white">
                        <span>Mission</span>
                    </button>

                    <button onclick="document.getElementById('our-vision').scrollIntoView({ behavior: 'smooth' });"
                        class="px-6 py-3 rounded-full font-primary text-primary-white font-medium border border-primary-white w-full md:w-auto text-sm lg:text-base transition-all duration-300 hover:bg-primary-yellow hover:text-primary-black hover:border-primary-yellow">
                        Vision
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- second section -->
<section class="bg-primary-white py-24" id="our-vision">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-20">
            <div class="flex flex-col gap-6">
                <span
                    class="font-primary text-lg text-primary-orange font-medium uppercase">{{ $aboutpagecontent['about_who_we_are_title']['value'] ?? '' }}</span>
                <h2
                    class="font-primary font-medium text-4xl lg:text-6xl lg:leading-[70px] text-primary-black font-medium">
                    {{ $aboutpagecontent['about_who_we_are_sub_title']['value'] ?? '' }}
                </h2>
                <p class="font-secondary text-primary-black md:max-w-[72%]">
                {!! $aboutpagecontent['about_who_we_are_content']['value'] ?? '' !!}
                </p>
            </div>

            <div class="flex flex-col md:flex-row gap-5">
                <div><img class="lazyload" data-src="{{ asset('/assets/about_us/' . $aboutpagecontent['about_who_we_are_invention_image']['value'] ?? '') }}" alt="abtUs_1" width="349" height="525" /></div>
                <div class="grow">
                    <img class="lazyload" data-src="{{ asset('/assets/about_us/' . $aboutpagecontent['about_who_we_are_invention_image_two']['value'] ?? '') }}" alt="abtUs_2" width="871" height="520" />
                </div>
            </div>
        </div>
    </div>
</section>

<!-- third section -->
<section id="our-mission"
    class="h-screen  bg-cover bg-no-repeat bg-bottom" style="background-image: url('{{ asset('/assets/about_us/' . $aboutpagecontent['about_mission_image']['value'] ?? '') }}')">
    <div
        class="w-full h-full bg-[url('./../assets/about_us/bg-linear-gradient.svg')] py-24">
        <div
            class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
            <div class="flex flex-col gap-3">
                <h2
                    class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-white font-medium">
                    {{ $aboutpagecontent['about_mission_title']['value'] ?? '' }}
                </h2>
                <p class="font-secondary text-primary-white md:max-w-[30%]">
                {!! $aboutpagecontent['about_mission_content']['value'] ?? '' !!}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- forth section -->
<section class="py-24 bg-primary-white">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-16">
            <div class="flex flex-col gap-4">
                <span
                    class="font-primary text-lg text-primary-orange font-medium uppercase">{{ $aboutpagecontent['about_global_reach_title']['value'] ?? '' }}</span>
                <h2
                    class="font-primary font-medium text-4xl lg:text-6xl lg:leading-[70px] text-primary-black md:max-w-[60%]">
                    {{ $aboutpagecontent['about_global_reach_sub_title']['value'] ?? '' }}
                </h2>
                <p class="font-secondary text-primary-black md:max-w-[75%]">
                {!! $aboutpagecontent['about_global_reach_content']['value'] ?? '' !!}
                </p>
            </div>

            <div class="relative">
                <div class="">
                    <img
                        class="w-full lazyload" data-src="{{ asset('/assets/about_us/' . $aboutpagecontent['about_global_reach_image']['value'] ?? '') }}"
                        alt="abtUs_4" width="1280" height="720" />
                </div>
                <div
                    class="absolute left-0 top-0 w-full h-full bg-gradient-to-b from-[#15151500] to-[#151515] flex items-center lg:items-end lg:pb-10">
                    <div class="absolute right-8 top-8">
                        <img
                            width="42"
                            height="42"
                            class="lazyload" data-src="{{ asset('assets/homepage_4.svg') }}"
                            alt="battery energy storage system" />
                    </div>

                    <ul
                        class="grid grid-cols-2 gap-2 lg:flex justify-between lg:w-2/3 lg:mx-auto">
                        <li class="flex flex-col items-center gap-2">
                            <div>
                                <img
                                    class="lazyload" data-src="{{ asset('assets/about_us/employees.svg') }}"
                                    alt="employees"  width="20" height="20"/>
                            </div>
                            <div>
                                <h4
                                    class="font-secondary font-bold lg:text-xl text-center text-primary-white">
                                    {{ $aboutpagecontent['about_global_reach_number_of_employees']['value'] ?? '' }}+
                                </h4>
                                <p
                                    class="font-secondary text-xs lg:text-base text-primary-white text-center">
                                    Employees
                                </p>
                            </div>
                        </li>
                        <li class="flex flex-col items-center gap-2">
                            <div>
                                <img
                                    class="lazyload" data-src="{{ asset('assets/about_us/searching.svg') }}"
                                    alt="searching" width="20" height="20"/>
                            </div>
                            <div>
                                <h4
                                    class="font-secondary font-bold lg:text-xl text-center text-primary-white">
                                    {{ $aboutpagecontent['about_global_reach_number_of_r_and_staff']['value'] ?? '' }}+
                                </h4>
                                <p
                                    class="font-secondary text-xs lg:text-base text-primary-white text-center">
                                    R&D Staff
                                </p>
                            </div>
                        </li>
                        <li class="flex flex-col items-center gap-2">
                            <div>
                                <img class="lazyload" data-src="{{ asset('assets/about_us/building.svg') }}" alt="building" width="20" height="20"/>
                            </div>
                            <div>
                                <h4
                                    class="font-secondary font-bold lg:text-xl text-center text-primary-white">
                                    {{ $aboutpagecontent['about_global_reach_number_of_r_and_d_centers']['value'] ?? '' }}
                                </h4>
                                <p
                                    class="font-secondary text-xs lg:text-base text-primary-white text-center">
                                    R&D Centers
                                </p>
                            </div>
                        </li>
                        <li class="flex flex-col items-center gap-2">
                            <div>
                                <img class="lazyload" data-src="{{ asset('assets/about_us/web.svg') }}" alt="web" width="20" height="20" />
                            </div>
                            <div>
                                <h4
                                    class="font-secondary font-bold lg:text-xl text-center text-primary-white">
                                    {{ $aboutpagecontent['about_global_reach_number_of_global_markets']['value'] ?? '' }}+
                                </h4>
                                <p
                                    class="font-secondary text-xs lg:text-base text-primary-white text-center font-light">
                                    Global Markets
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- award section -->
<section class="py-24 bg-primary-white">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-8 lg:gap-16">
            <div class="flex flex-col items-center gap-4">
                <span
                    class="font-primary text-lg text-primary-orange font-medium uppercase">{{ $aboutpagecontent['about_recognitions_title']['value'] ?? '' }}</span>
                <h2
                    class="font-primary font-medium text-4xl lg:text-6xl lg:leading-[70px] text-primary-black text-center">
                    {{ $aboutpagecontent['about_recognitions_sub_title']['value'] ?? '' }}
                </h2>
            </div>

            <!-- slider -->
            <div class="award-slider overflow-hidden">
                <div class="swiper-wrapper">
                    @if($awards)
                    @foreach($awards as $award)
                    <div
                        class="swiper-slide py-8 px-10 bg-[#C8C8C8] flex flex-col items-center gap-6 justify-center min-h-[250px]">
                        <div>
                            <img class="lazyload" data-src="{{ asset('/assets/about_us/' . $award['award_logo'] ?? '') }}" alt="award_1" width="104" height="113" />
                        </div>
                        <div class="flex flex-col gap-2">
                            <h6
                                class="font-primary text-primary-black text-sm font-bold text-center">
                                {{ $award['award_year'] ?? '' }}
                            </h6>
                            <p
                                class="font-primary text-primary-black text-sm text-center">
                                {{ $award['award_title'] ?? '' }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- fifth section -->
<section class="py-24">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-8 lg:gap-24">
            <div class="flex flex-col items-center gap-4">
                <span
                    class="font-primary text-lg text-primary-orange font-medium uppercase">{{ $aboutpagecontent['about_trust_global_title']['value'] ?? '' }}</span>
                <h2
                    class="font-primary font-medium text-4xl lg:text-6xl lg:leading-[70px] text-primary-white text-center">
                    {{ $aboutpagecontent['about_trust_global_sub_title']['value'] ?? '' }}
                </h2>
            </div>
            <!-- for responsive -->
            <div class="lg:hidden">
                <div>
                    <img class="lazyload" data-src="{{ asset('/assets/about_us/' . $aboutpagecontent['about_trust_global_image']['value'] ?? '') }}" alt="abtUs_map"  width="1280" height="532"/>
                </div>
            </div>

            <div class="relative hidden lg:block">
                <div>
                    <img class="lazyload" data-src="{{ asset('assets/about_us/abtUs_map.svg') }}" alt="abtUs_map" width="1280" height="532"/>
                </div>
                <ul>
                    <li
                        class="absolute top-[24%] left-[88px] 2xl:top-[24%] xl:left-[115px] 2xl:left-[130px] group">
                        <div
                            class="w-5 h-5 bg-primary-yellow rounded-full flex items-center justify-center cursor-pointer">
                            <div class="w-3 h-3 bg-primary-black rounded-full"></div>
                        </div>

                        <div
                            class="flex flex-col items-center absolute -top-[80px] -left-[90px] origin-bottom transition-all duration-500 ease-in-out scale-y-0 opacity-0 group-hover:scale-y-100 group-hover:opacity-100">
                            <div
                                class="px-2 py-2.5 rounded-full bg-gradient-to-r from-[#EEBB0C] to-[#EF6818]">
                                <span
                                    class="whitespace-nowrap font-secondary text-primary-black">United States (BRANCH)</span>
                            </div>
                            <div>
                                <img
                                    width="35"
                                    height="45"
                                    class="lazyload" data-src="{{ asset('assets/about_us/mapVector.svg') }}"
                                    alt="mapVector" />
                            </div>
                        </div>
                    </li>

                    <li
                        class="absolute top-[18%] left-[360px] xl:left-[470px] 2xl:left-[520px] group">
                        <div
                            class="w-5 h-5 bg-primary-yellow rounded-full flex items-center justify-center cursor-pointer">
                            <div class="w-3 h-3 bg-primary-black rounded-full"></div>
                        </div>

                        <div
                            class="flex flex-col items-center absolute -top-[80px] -left-[100px] origin-bottom transition-all duration-500 ease-in-out scale-y-0 opacity-0 group-hover:scale-y-100 group-hover:opacity-100">
                            <div
                                class="px-2 py-2.5 rounded-full bg-gradient-to-r from-[#EEBB0C] to-[#EF6818]">
                                <span
                                    class="whitespace-nowrap font-secondary text-primary-black">United Kingdom (BRANCH)</span>
                            </div>
                            <div>
                                <img
                                    width="35"
                                    height="45"
                                    class="lazyload" data-src="{{ asset('assets/about_us/mapVector.svg') }}"
                                    alt="mapVector" />
                            </div>
                        </div>
                    </li>

                    <li
                        class="absolute top-[20%] left-[420px] xl:left-[500px] 2xl:left-[550px] group">
                        <div
                            class="w-5 h-5 bg-primary-yellow rounded-full flex items-center justify-center cursor-pointer">
                            <div class="w-3 h-3 bg-primary-black rounded-full"></div>
                        </div>

                        <div
                            class="flex flex-col items-center absolute -top-[80px] -left-[90px] origin-bottom transition-all duration-500 ease-in-out scale-y-0 opacity-0 group-hover:scale-y-100 group-hover:opacity-100">
                            <div
                                class="px-2 py-2.5 rounded-full bg-gradient-to-r from-[#EEBB0C] to-[#EF6818]">
                                <span
                                    class="whitespace-nowrap font-secondary text-primary-black">Netherlands (BRANCH)</span>
                            </div>
                            <div>
                                <img
                                    width="35"
                                    height="45"
                                    class="lazyload" data-src="{{ asset('assets/about_us/mapVector.svg') }}"
                                    alt="mapVector" />
                            </div>
                        </div>
                    </li>

                    <li
                        class="absolute top-[24%] left-[420px] xl:left-[530px] 2xl:left-[580px] group">
                        <div
                            class="w-5 h-5 bg-primary-yellow rounded-full flex items-center justify-center cursor-pointer">
                            <div class="w-3 h-3 bg-primary-black rounded-full"></div>
                        </div>

                        <div
                            class="flex flex-col items-center absolute -top-[80px] -left-[80px] origin-bottom transition-all duration-500 ease-in-out scale-y-0 opacity-0 group-hover:scale-y-100 group-hover:opacity-100">
                            <div
                                class="px-2 py-2.5 rounded-full bg-gradient-to-r from-[#EEBB0C] to-[#EF6818]">
                                <span
                                    class="whitespace-nowrap font-secondary text-primary-black">Germany (BRANCH)</span>
                            </div>
                            <div>
                                <img
                                    width="35"
                                    height="45"
                                    class="lazyload" data-src="{{ asset('assets/about_us/mapVector.svg') }}"
                                    alt="mapVector" />
                            </div>
                        </div>
                    </li>

                    <li
                        class="absolute top-[36%] right-[220px] xl:right-[280px] 2xl:right-[310px] group">
                        <div
                            class="w-5 h-5 bg-primary-yellow rounded-full flex items-center justify-center cursor-pointer">
                            <div class="w-3 h-3 bg-primary-black rounded-full"></div>
                        </div>

                        <div
                            class="flex flex-col items-center absolute -top-[80px] -left-[90px] origin-bottom transition-all duration-500 ease-in-out scale-y-0 opacity-0 group-hover:scale-y-100 group-hover:opacity-100">
                            <div
                                class="px-2 py-2.5 rounded-full bg-gradient-to-r from-[#EEBB0C] to-[#EF6818]">
                                <span
                                    class="whitespace-nowrap font-secondary text-primary-black">Hangzhou, China (HQ)</span>
                            </div>
                            <div>
                                <img
                                    width="35"
                                    height="45"
                                    class="lazyload" data-src="{{ asset('assets/about_us/mapVector.svg') }}"
                                    alt="mapVector" />
                            </div>
                        </div>
                    </li>

                    <li
                        class="absolute top-[32%] right-[170px] xl:right-[230px] 2xl:right-[245px] group">
                        <div
                            class="w-5 h-5 bg-primary-yellow rounded-full flex items-center justify-center cursor-pointer">
                            <div class="w-3 h-3 bg-primary-black rounded-full"></div>
                        </div>

                        <div
                            class="flex flex-col items-center absolute -top-[80px] -left-[70px] origin-bottom transition-all duration-500 ease-in-out scale-y-0 opacity-0 group-hover:scale-y-100 group-hover:opacity-100">
                            <div
                                class="px-2 py-2.5 rounded-full bg-gradient-to-r from-[#EEBB0C] to-[#EF6818]">
                                <span
                                    class="whitespace-nowrap font-secondary text-primary-black">Japan (BRANCH)</span>
                            </div>
                            <div>
                                <img
                                    width="35"
                                    height="45"
                                    class="lazyload" data-src="{{ asset('assets/about_us/mapVector.svg') }}"
                                    alt="mapVector" />
                            </div>
                        </div>
                    </li>

                    <li
                        class="absolute bottom-[14%] right-[90px] xl:right-[115px] 2xl:right-[135px] group">
                        <div
                            class="w-5 h-5 bg-primary-yellow rounded-full flex items-center justify-center cursor-pointer">
                            <div class="w-3 h-3 bg-primary-black rounded-full"></div>
                        </div>

                        <div
                            class="flex flex-col items-center absolute -top-[80px] -left-[80px] origin-bottom transition-all duration-500 ease-in-out scale-y-0 opacity-0 group-hover:scale-y-100 group-hover:opacity-100">
                            <div
                                class="px-2 py-2.5 rounded-full bg-gradient-to-r from-[#EEBB0C] to-[#EF6818]">
                                <span
                                    class="whitespace-nowrap font-secondary text-primary-black">Australia (BRANCH)</span>
                            </div>
                            <div>
                                <img
                                    width="35"
                                    height="45"
                                    class="lazyload" data-src="{{ asset('assets/about_us/mapVector.svg') }}"
                                    alt="mapVector" />
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- sixth section -->
<section class="py-24 bg-primary-white">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-20">
            <div class="flex flex-col items-center gap-6">
                <span
                    class="font-primary text-lg text-primary-orange font-medium uppercase"> {{ $aboutpagecontent['about_energy_storage_title']['value'] ?? '' }}</span>
                <h2
                    class="font-primary font-medium text-4xl lg:text-6xl lg:leading-[70px] text-primary-black font-medium text-center lg:max-w-[60%]">
                    {{ $aboutpagecontent['about_energy_storage_sub_title']['value'] ?? '' }}
                </h2>
            </div>

            <div class="bg-[#F5F5F5] border border-[#C8C8C8] p-5 lg:p-10">
                <div class="swiper slider">
                    <!-- 1 -->
                    <div class="swiper-wrapper">
                        @if($journeys)
                        @foreach($journeys as $journey)
                        <div
                            class="flex flex-col-reverse swiper-slide lg:flex-row justify-between">
                            <div
                                class="lg:w-[40%] flex flex-col justify-between pt-10 lg:pt-20">
                                <p
                                    class="font-secondary font-medium text-lg text-primary-black">
                                    {{ $journey['journey_description'] ?? '' }}
                                </p>

                                <h2
                                    class="font-primary font-medium text-[120px] text-primary-black opacity-20">
                                    {{ $journey['journey_year'] ?? '' }}
                                </h2>
                            </div>

                            <div>
                                <img
                                    class="w-[456px] lazyload" data-src="{{ asset('/assets/about_us/' . $journey['journey_image'] ?? '') }}"
                                    alt="2012" width="456" height="461" />
                            </div>
                        </div>
                        @endforeach
                        @endif
                        <!-- 2 -->
                         
                        
                    </div>

                    <!-- Separate pagination elements for progress bar and bullets -->
                    <div
                        class="swiper-pagination-progressbar swiper-pagination !static mt-10"></div>
                    <div
                        class="swiper-pagination-bullets swiper-pagination !static !w-full flex gap-8 justify-between mt-10 overflow-scroll lg:overflow-auto"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<script defer type="text/javascript">
    // Award Slider
    window.addEventListener('DOMContentLoaded', function () {
        var awardSwiper = new Swiper(".award-slider", {
        slidesPerView: 1,
        spaceBetween: 20,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        loop: true,
        breakpoints: {
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            },
            1280: {
                slidesPerView: 4,
            },
        },
    });

    // Journey Slider
    var years = [
        @if($journeys)
            {!! $journeys->pluck('journey_year')->map(fn($year) => "'$year'")->join(', ') !!}
        @endif ];
    var swiper2 = new Swiper(".slider", {
        pagination: {
            el: ".swiper-pagination-progressbar",
            type: "progressbar",
        },
    });

    var swiperBullets = new Swiper(".slider", {
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination-bullets",
            clickable: true,
            renderBullet: function (index, className) {
                return '<span class="' + className + '">' + years[index] + "</span>";
            },
        },
        on: {
            slideChange: function () {
                swiper2.slideTo(this.activeIndex);
            },
        },
    });
  });
</script>
@endsection
