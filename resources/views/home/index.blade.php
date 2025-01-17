@extends('layout.frontend')
@section('page-content')
<style>
    #slider-image {
        transition: opacity 0.3s ease-in-out;
        opacity: 1;
    }

    #slider-image.fade-out {
        opacity: 0;
    }

    #slider-image.fade-in {
        opacity: 1;
    }
</style>
<section class="relative h-screen overflow-x-hidden">
    <!-- <video
        autoplay
        muted
        loop
        id="banner-video"
        poster=""
        class="h-full w-full object-cover">
        <source id="banner-video-src" data-src-desktop="{{ asset('/assets/videos/compressed/home-desktop-video.mp4') }}" data-src-mobile="{{ asset('/assets/videos/compressed/home-mobile-video.mp4') }}" type="video/mp4" />
        Your browser does not support the video tag.
    </video> -->
    <video
        autoplay
        muted
        rel="preload"
        loop
        id="banner-video"
        poster="{{asset('/assets/videos/compressed/frame.webp') }}"
        class="h-full w-full object-cover">
        <source id="banner-video-src" data-src-desktop="{{ asset('/assets/videos/compressed/' . $homepagecontent['home_banner_video']['value'] ?? '') }}" data-src-mobile="{{ asset('/assets/videos/compressed/' . $homepagecontent['home_mobile_banner_video']['value'] ?? '') }}" type="video/mp4" />
        Your browser does not support the video tag.
    </video>
    <div class="content absolute bg-[#15151580] w-full h-full top-0 left-0">
        <div
            class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
            <div
                class="hero-content h-screen flex flex-col justify-end lg:justify-center items-center gap-6 pb-24 lg:pb-0">
                <div class="hero-content-top flex flex-col items-center gap-4">
                    <h1
                        class="font-primary font-medium text-primary-white text-[32px] leading-[40px] sm:text-[40px] sm:leading-[46px] lg:text-[72px] lg:leading-[80px] xl:text-[80px] xl:leading-[88px] lg:max-w-[65%] text-center drop-shadow-2xl">
                        {{ $homepagecontent['home_banner_video_title']['value'] ?? '' }} <span class="italic">Home Owners</span>
                    </h1>
                    <p
                        class="hidden lg:block font-secondary font-medium text-lg lg:text-xl text-primary-white">
                        {{ $homepagecontent['home_banner_video_sub_title']['value'] ?? '' }}
                    </p>
                </div>

                <div
                    class="hero-content-btm flex flex-col lg:flex-row items-center justify-center gap-4 max-w-[80%] md:max-w-none">
                    <button
                        onclick="window.location.href='/book-consultation'"
                        class="bg-primary-yellow border border-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium flex items-center gap-2 w-full md:w-auto text-sm lg:text-base transition-all duration-300 group hover:bg-transparent hover:border-primary-white hover:text-primary-white">
                        <span class="whitespace-nowrap">Get A Free Consultation</span>
                        <img src="{{ asset('/assets/ArrowLeft.svg') }}" class="transition-all duration-300 group-hover:invert group-hover:translate-x-2" alt="best battery for solar power storage" width="24px" height="24px"  />
                    </button>

                    <button onclick="window.location.href='/homeowners#ms_frame_container'"
                        class="px-6 py-3 rounded-full font-primary text-primary-white font-medium border border-primary-white w-full md:w-auto text-sm lg:text-base transition-all duration-300 hover:bg-primary-yellow hover:text-primary-black hover:border-primary-yellow">
                        Learn More
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- second section -->
<section class="bg-primary-white">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="py-24 flex flex-col gap-16">
            <div class="flex flex-col items-center gap-2">
                <span
                    class="font-primary text-lg text-primary-orange font-medium uppercase text-center">{{ $homepagecontent['home_powering_title']['value'] ?? '' }}</span>
                <h2
                    class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-black font-medium text-center lg:max-w-[55%]">
                    {{ $homepagecontent['home_powering_sub_title']['value'] ?? '' }}
                </h2>
            </div>

            <div class="grid lg:grid-cols-2 gap-4">
                <div class="relative">
                    <video
                        autoplay
                        muted
                        loop
                        id="bg-video"
                        poster=""
                        class="h-[420px] lg:h-[500px] object-cover lazyload">
                        <source data-src="{{ asset('/assets/videos/compressed/' . $homepagecontent['home_owner_video']['value'] ?? '') }}" type="video/mp4" />
                        Your browser does not support the video tag.
                    </video>

                    <div
                        class="pb-10 absolute top-0 w-full h-full bg-gradient-to-b from-[#00000214] to-[#00000280] flex flex-col justify-end gap-4">
                        <div class="flex flex-col items-center gap-2">
                            <h3
                                class="font-primary text-[36px] leading-[42px] lg:text-[48px] lg:leading-[54px] font-medium text-[#FAFAFAE5] text-center">
                                Homeowners
                            </h3>
                            <p
                                class="font-secondary font-medium text-primary-white text-center max-w-[80%] lg:max-w-[45%]">
                                Discover Energy Freedom with Olax Home Power Solutions
                            </p>
                        </div>

                        <div class="flex justify-center">
                            <button
                                onclick="window.location.href='/homeowners'"
                                class="px-6 py-3 rounded-full font-primary text-primary-white font-medium border border-primary-white transition-all duration-300 hover:bg-primary-yellow hover:text-primary-black hover:border-primary-yellow">
                                Learn More
                            </button>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <video
                        autoplay
                        muted
                        loop
                        id="bg-video"
                        poster=""
                        class="h-[420px] lg:h-[500px] object-cover lazyload">
                        <source data-src="{{ asset('/assets/videos/compressed/' . $homepagecontent['home_installers_video']['value'] ?? '') }}" type="video/mp4" />
                        Your browser does not support the video tag.
                    </video>

                    <div
                        class="pb-10 absolute top-0 w-full h-full bg-gradient-to-b from-[#00000214] to-[#00000280] flex flex-col justify-end gap-4">
                        <div class="flex flex-col items-center gap-2">
                            <h3
                                class="font-primary text-[36px] leading-[42px] lg:text-[48px] lg:leading-[54px] font-medium text-[#FAFAFAE5] text-center">
                                Installers
                            </h3>
                            <p
                                class="font-secondary font-medium text-primary-white text-center max-w-[80%] lg:max-w-[42%]">
                                Empower Your Business with the Olax Certified Partner
                                Program
                            </p>
                        </div>

                        <div class="flex justify-center">
                            <button
                                class="px-6 py-3 rounded-full font-primary text-primary-white font-medium border border-primary-white transition-all duration-300 hover:bg-primary-yellow hover:text-primary-black hover:border-primary-yellow"
                                onclick="window.location.href='/installer'">
                                Learn More
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- third section -->
<section class="">
    <div class="py-24 flex flex-col">
        <!-- top -->
        <div
            class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
            <h2
                class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-white font-medium">
                Storms Happen—<br />{{ $homepagecontent['home_storm_happen_title']['value'] ?? '' }}
            </h2>
        </div>

        <!-- middle -->

        <div class="relative mt-20 w-full">
            <div>
                <img
                    class="w-full lazyload"
                    data-src="{{ asset('/assets/' . $homepagecontent['home_storm_happen_banner']['value'] ?? '') }}"
                    alt="solar battery energy storage system" width="1903px" height="1027px"   />
            </div>
            <div class="absolute w-full h-full top-0 left-0">
                <img data-src="{{ asset('/assets/Vector.webp') }}" class="lazyload" alt="residential solar battery" width="1440" height="786" />
            </div>
        </div>

        <!-- bottom -->
        <div
            class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
            <div class="flex justify-end mt-10">
                <p
                    class="font-secondary font-medium text-primary-white lg:max-w-[55%]">
                    {{ $homepagecontent['home_storm_happen_content']['value'] ?? '' }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- fourth section -->
<section class="py-24 bg-primary-white">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-10 lg:gap-16">
            <div class="flex flex-col items-center gap-2">
                <span
                    class="font-primary text-lg text-primary-orange font-medium uppercase text-center">{{ $homepagecontent['home_leading_the_way_title']['value'] ?? '' }}</span>
                <h2
                    class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-black font-medium text-center lg:max-w-[45%]">
                    {{ $homepagecontent['home_leading_the_way_sub_title']['value'] ?? '' }}
                </h2>
            </div>

            <div class="flex flex-col lg:flex-row">
                <div class="lg:py-16 relative z-50">
                    <img

                        id="slider-image"
                        class="lazyload"
                        data-src="{{ asset('/assets/' . $homepagecontent['home_leading_slide_one_image']['value'] ?? '') }}"
                        alt="solar battery installation" width="608" height="608" />
                </div>
                <div
                    class="bg-primary-black py-10 px-6 lg:pl-36 lg:pr-20 lg:pt-24 lg:w-[60%] lg:-ml-24">
                    <div class="swiper homeSwiper flex flex-col gap-20">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide flex flex-col gap-10"
                                data-image-src="{{ asset('/assets/' . $homepagecontent['home_leading_slide_one_image']['value'] ?? '') }}">
                                <div class="flex flex-col gap-4">
                                    <span
                                        class="font-primary text-sm text-primary-yellow font-semibold">1 of 3</span>
                                    <h3
                                        class="font-primary text-primary-white text-3xl font-medium">
                                        Benefits to Homeowners with Olax's Advanced Features:

                                    </h3>
                                </div>
                                <ul class="flex flex-col gap-4">
                                    <li class="flex gap-3">
                                        <div class="w-[24px]">
                                            <img
                                                class="w-full lazyload"
                                                data-src="{{ asset('/assets/CheckCircle.svg') }}"
                                                alt="home battery for solar panels" width="24px" height="24px"/>
                                        </div>
                                        <div class="max-w-[90%]">
                                            <p class="font-secondary text-primary-white">
                                                <span class="font-bold">200% Oversizing:</span>
                                                Maximize your energy production and storage capacity, ensuring your home remains powered even during high-demand periods.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="flex gap-3">
                                        <div class="w-[24px]">
                                            <img
                                                class="w-full lazyload"
                                                data-src="{{ asset('/assets/CheckCircle.svg') }}"
                                                alt="home battery for solar panels" width="24px" height="24px"/>
                                        </div>
                                        <div class="max-w-[90%]">
                                            <p class="font-secondary text-primary-white">
                                                <span class="font-bold">16A High-current Input:</span>
                                                Efficiently handle higher current loads, allowing for more robust and reliable energy management.

                                            </p>
                                        </div>
                                    </li>
                                    <li class="flex gap-3">
                                        <div class="w-[24px]">
                                            <img
                                                class="w-full lazyload"
                                                data-src="{{ asset('/assets/CheckCircle.svg') }}"
                                                alt="home battery for solar panels" width="24px" height="24px"/>
                                        </div>
                                        <div class="max-w-[90%]">
                                            <p class="font-secondary text-primary-white">
                                                <span class="font-bold">150% MPPT Power:</span>
                                                Optimize your solar panel performance, extracting the maximum possible power from your system, even under varying weather conditions.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="flex gap-3">
                                        <div class="w-[24px]">
                                            <img
                                                class="w-full lazyload"
                                                data-src="{{ asset('/assets/CheckCircle.svg') }}"
                                                alt="home battery for solar panels" width="24px" height="24px"/>
                                        </div>
                                        <div class="max-w-[90%]">
                                            <p class="font-secondary text-primary-white">
                                                <span class="font-bold">150% Off-grid Capability:</span>
                                                Enjoy enhanced off-grid performance, giving you greater energy independence and reliability during outages or in remote locations.
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="swiper-slide flex flex-col gap-10"
                                data-image-src="{{ asset('/assets/' . $homepagecontent['home_leading_slide_two_image']['value'] ?? '') }}">
                                <div class="flex flex-col gap-4">
                                    <span
                                        class="font-primary text-sm text-primary-yellow font-semibold">2 of 3</span>
                                    <h3
                                        class="font-primary text-primary-white text-3xl font-medium">
                                        Avoid Peak Pricing

                                    </h3>
                                </div>
                                <ul class="flex flex-col gap-4">
                                    <li class="flex gap-3">
                                        <div class="w-[24px]">
                                            <img
                                                class="w-full lazyload"
                                                data-src="{{ asset('/assets/CheckCircle.svg') }}"
                                                alt="home battery for solar panels" width="24px" height="24px" />
                                        </div>
                                        <div class="max-w-[90%]">
                                            <p class="font-secondary text-primary-white">
                                                <!-- <span class="font-bold">200% Oversizing:</span> -->
                                                Olax Energy Storage systems are designed to provide homeowners with the ability to manage and optimize their energy usage efficiently. By storing excess energy generated during off-peak hours, Olax systems allow you to utilize this stored energy during peak pricing periods, significantly reducing your reliance on the grid when electricity rates are highest.
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="swiper-slide flex flex-col gap-10"
                                data-image-src="{{ asset('/assets/' . $homepagecontent['home_leading_slide_three_image']['value'] ?? '') }}">
                                <div class="flex flex-col gap-4">
                                    <span
                                        class="font-primary text-sm text-primary-yellow font-semibold">3 of 3</span>
                                    <h3
                                        class="font-primary text-primary-white text-3xl font-medium">
                                        Benefits to Homeowners with Micro-Grid Functionality
                                    </h3>
                                </div>
                                <ul class="flex flex-col gap-4">
                                    <li class="flex gap-3">
                                        <div class="max-w-[90%]">
                                            <p class="font-secondary text-primary-white text-lg">
                                                <span class="font-bold">Enhanced Energy Independence:
                                                </span>
                                            <ul class="flex flex-col gap-4 py-4">
                                                <li class="flex gap-3">
                                                    <div class="w-[24px]">
                                                        <img
                                                            class="w-full lazyload"
                                                            data-src="{{ asset('/assets/CheckCircle.svg') }}"
                                                            alt="home battery for solar panels"  width="24px" height="24px"/>
                                                    </div>
                                                    <div class="max-w-[90%]">
                                                        <p class="font-secondary text-primary-white">
                                                            Achieve higher energy independence with the system's ability to function autonomously during power outages.
                                                        </p>
                                                    </div>
                                                </li>
                                                <li class="flex gap-3">
                                                    <div class="w-[24px]">
                                                        <img
                                                            class="w-full lazyload"
                                                            data-src="{{ asset('/assets/CheckCircle.svg') }}"
                                                            alt="home battery for solar panels" width="24px" height="24px"/>
                                                    </div>
                                                    <div class="max-w-[90%]">
                                                        <p class="font-secondary text-primary-white">
                                                            Ensures continuous power supply without relying on the main grid.
                                                        </p>
                                                    </div>
                                                </li>
                                            </ul>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="flex gap-3">
                                        <div class="max-w-[90%]">
                                            <p class="font-secondary text-primary-white text-lg">
                                                <span class="font-bold">Resilience During Outages:
                                                </span>
                                            <ul class="flex flex-col gap-4 py-4">
                                                <li class="flex gap-3">
                                                    <div class="w-[24px]">
                                                        <img
                                                            class="w-full lazyload"
                                                            data-src="{{ asset('/assets/CheckCircle.svg') }}"
                                                            alt="home battery for solar panels" width="24px" height="24px"/>
                                                    </div>
                                                    <div class="max-w-[90%]">
                                                        <p class="font-secondary text-primary-white">
                                                            Traditional grid-tied systems shut down during outages for safety; micro-grid functionality simulates grid conditions.

                                                        </p>
                                                    </div>
                                                </li>
                                                <li class="flex gap-3">
                                                    <div class="w-[24px]">
                                                        <img
                                                            class="w-full lazyload"
                                                            data-src="{{ asset('/assets/CheckCircle.svg') }}"
                                                            alt="home battery for solar panels" width="24px" height="24px"/>
                                                    </div>
                                                    <div class="max-w-[90%]">
                                                        <p class="font-secondary text-primary-white">
                                                            Activates the string inverter during off-grid periods, keeping critical appliances and systems powered during emergencies.

                                                        </p>
                                                    </div>
                                                </li>
                                            </ul>
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="flex justify-end gap-4">
                            <div class="buttonPrev rotate-180 group cursor-pointer">
                                <svg
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        class="group-hover:fill-primary-orange"
                                        d="M3 11.9999C3 12.1988 3.07902 12.3896 3.21967 12.5303C3.36032 12.6709 3.55109 12.7499 3.75 12.7499H18.4397L12.9694 18.2193C12.8997 18.289 12.8444 18.3717 12.8067 18.4628C12.769 18.5538 12.7496 18.6514 12.7496 18.7499C12.7496 18.8485 12.769 18.9461 12.8067 19.0371C12.8444 19.1281 12.8997 19.2109 12.9694 19.2806C13.0391 19.3502 13.1218 19.4055 13.2128 19.4432C13.3039 19.4809 13.4015 19.5003 13.5 19.5003C13.5985 19.5003 13.6961 19.4809 13.7872 19.4432C13.8782 19.4055 13.9609 19.3502 14.0306 19.2806L20.7806 12.5306C20.8504 12.4609 20.9057 12.3782 20.9434 12.2871C20.9812 12.1961 21.0006 12.0985 21.0006 11.9999C21.0006 11.9014 20.9812 11.8038 20.9434 11.7127C20.9057 11.6217 20.8504 11.539 20.7806 11.4693L14.0306 4.7193C13.8899 4.57857 13.699 4.49951 13.5 4.49951C13.301 4.49951 13.1101 4.57857 12.9694 4.7193C12.8286 4.86003 12.7496 5.05091 12.7496 5.24993C12.7496 5.44895 12.8286 5.63982 12.9694 5.78055L18.4397 11.2499H3.75C3.55109 11.2499 3.36032 11.3289 3.21967 11.4696C3.07902 11.6103 3 11.801 3 11.9999Z"
                                        fill="#FAFAFA99" />
                                </svg>
                            </div>

                            <div class="buttonNext group cursor-pointer">
                                <svg
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        class="group-hover:fill-primary-orange"
                                        d="M3 11.9999C3 12.1988 3.07902 12.3896 3.21967 12.5303C3.36032 12.6709 3.55109 12.7499 3.75 12.7499H18.4397L12.9694 18.2193C12.8997 18.289 12.8444 18.3717 12.8067 18.4628C12.769 18.5538 12.7496 18.6514 12.7496 18.7499C12.7496 18.8485 12.769 18.9461 12.8067 19.0371C12.8444 19.1281 12.8997 19.2109 12.9694 19.2806C13.0391 19.3502 13.1218 19.4055 13.2128 19.4432C13.3039 19.4809 13.4015 19.5003 13.5 19.5003C13.5985 19.5003 13.6961 19.4809 13.7872 19.4432C13.8782 19.4055 13.9609 19.3502 14.0306 19.2806L20.7806 12.5306C20.8504 12.4609 20.9057 12.3782 20.9434 12.2871C20.9812 12.1961 21.0006 12.0985 21.0006 11.9999C21.0006 11.9014 20.9812 11.8038 20.9434 11.7127C20.9057 11.6217 20.8504 11.539 20.7806 11.4693L14.0306 4.7193C13.8899 4.57857 13.699 4.49951 13.5 4.49951C13.301 4.49951 13.1101 4.57857 12.9694 4.7193C12.8286 4.86003 12.7496 5.05091 12.7496 5.24993C12.7496 5.44895 12.8286 5.63982 12.9694 5.78055L18.4397 11.2499H3.75C3.55109 11.2499 3.36032 11.3289 3.21967 11.4696C3.07902 11.6103 3 11.801 3 11.9999Z"
                                        fill="#FAFAFA99" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- fifth section -->
<section class="py-24">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-10 lg:flex-row lg:gap-20">
            <!-- left -->
            <div class="flex flex-col gap-6">
                <div class="flex flex-col gap-4">
                    <span
                        class="font-primary text-lg text-primary-orange font-medium">{{ $homepagecontent['home_Olax_smart_title']['value'] ?? '' }}</span>
                    <h2
                        class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-white font-medium">
                        {{ $homepagecontent['home_Olax_smart_sub_title']['value'] ?? '' }}
                    </h2>
                </div>
                <div>
                    <p class="font-secondary text-primary-white lg:max-w-[90%]">
                    {{ $homepagecontent['home_Olax_smart_content']['value'] ?? '' }}
                    </p>
                </div>
            </div>
            <!-- right -->
            <div class="grow">
                <video
                    autoplay
                    muted
                    loop
                    id="bg-video"
                    poster=""
                    class="object-cover lazyload">
                    <source data-src="{{ asset('/assets/videos/compressed/' . $homepagecontent['home_Olax_smart_video']['value'] ?? '') }}" type="video/mp4" />
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
    <!-- SEO Content Commented -->
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <ul class="accordion flex flex-col gap-5">
            <li class="accordion-item">
                <button
                    class="accordion-header bg-primary-black inline-block w-full flex items-center gap-2">
                    <div class="relative w-6 h-6">
                        <img
                            class="absolute transition-opacity duration-300"
                            src="./assets/download/PlusCircle.svg"
                            alt="PlusCircle" />
                        <img
                            class="absolute transition-opacity duration-300 opacity-0"
                            src="./assets/download/MinusCircle.svg"
                            alt="MinusCircle" />
                    </div>
                    <h3 class="font-primary font-semibold text-primary-yellow text-lg">
                        Know More >>
                    </h3>
                </button>

                <div
                    class="accordion-content overflow-hidden transition-all duration-300 max-h-0">
                    <ul class="py-6">
                        <li>
                            <div class="text-white gap-4">
                                <h1 class="text-4xl font-semibold text-left mb-6">
                                    Empowering a Brighter Tomorrow with Olax Power Whole Home Battery Backup
                                </h1>
                                <p class="font-secondary text-primary-white">
                                    Choosing solar power can help reduce earth’s carbon footprint and contribute to lowering energy bills, potentially improving property value and creating a more sustainable future.
                                    With Olax Power, you can readily unlock a sustainable future through our exclusive and innovative solar energy solutions. Choosing solar power can help reduce earth’s carbon footprint and contribute to lowering energy bills, potentially improving property value and creating a more sustainable future. Olax Power offers exclusive solar solutions like <strong class="font-semibold">solar battery installation</strong>, solar system design, consultation services, <strong class="font-semibold">backup battery installation</strong>, maintenance and repair facilities, and more.
                                </p>
                                <p class="font-secondary text-primary-white lg:max-w-[90%]">
                                    We are a trusted partner in harnessing renewable energy to light up your house sustainably. Our Olax Power team is dedicated to improving lives worldwide by embracing sustainable energy solutions at comprehensive pricing. From <strong class="font-semibold">home batteries for solar panels</strong> to other solar accessories, we offer comprehensive warranties and guarantees to provide confidence and peace of mind.
                                </p>
                                <br />
                                <h2 class="text-3xl font-semibold important-mt-8 mb-6">
                                    Benefits of Choosing Solar Power Storage in Harnessing a Greener Future
                                </h2>


                                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                                    <div class="shadow-lg rounded-lg">
                                        <div class="mb-4 flex items-center space-x-2">
                                            <div class="w-[24px]">
                                                <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="CheckCircle" width="24px" height="24px" />
                                            </div>
                                            <span class="font-bold">Sustainable Energy</span>
                                        </div>
                                        <p class="font-secondary text-primary-white">Solar energy is a completely renewable resource, offering sustainable solutions for the flourishing of mankind.</p>
                                    </div>
                                    <div class="shadow-lg rounded-lg">
                                        <div class="mb-4 flex items-center space-x-2">
                                            <div class="w-[24px]">
                                                <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" width="24px" height="24px"/>
                                            </div>
                                            <span class="font-bold">Air Pollution Reduction</span>
                                        </div>
                                        <p class="font-secondary text-primary-white">Utilizing fossil fuels leads to air degradation, significantly reduced by switching to solar energy with our <strong>solar battery storage</strong>.</p>
                                    </div>
                                    <div class="shadow-lg rounded-lg">
                                        <div class="mb-4 flex items-center space-x-2">
                                            <div class="w-[24px]">
                                                <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" width="24px" height="24px" />
                                            </div>
                                            <span class="font-bold">Water Conservation</span>
                                        </div>
                                        <p class="font-secondary text-primary-white">Solar energy solutions like <strong>solar battery backup</strong> use limited water, contributing significantly to water conservation.</p>
                                    </div>
                                    <div class="shadow-lg rounded-lg">
                                        <div class="mb-4 flex items-center space-x-2">
                                            <div class="w-[24px]">
                                                <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" width="24px" height="24px"/>
                                            </div>
                                            <span class="font-bold">Better Savings</span>
                                        </div>
                                        <p class="font-secondary text-primary-white">Switching to solar energy with a <strong>residential solar battery</strong> significantly reduces electricity bills, improving savings.</p>
                                    </div>
                                    <div class="shadow-lg rounded-lg">
                                        <div class="mb-4 flex items-center space-x-2">
                                            <div class="w-[24px]">
                                                <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" width="24px" height="24px"/>
                                            </div>
                                            <span class="font-bold">Increased Resale Value</span>
                                        </div>
                                        <p class="font-secondary text-primary-white">Properties with solar panels or <strong>residential energy storage</strong> have much-enhanced resale values.</p>
                                    </div>
                                    <div class="shadow-lg rounded-lg">
                                        <div class="mb-4 flex items-center space-x-2">
                                            <div class="w-[24px]">
                                                <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" width="24px" height="24px"/>
                                            </div>
                                            <span class="font-bold">Low Maintenance Cost</span>
                                        </div>
                                        <p class="font-secondary text-primary-white">Our <strong>solar battery energy storage system</strong> requires minimal maintenance, saving costs.</p>
                                    </div>
                                </div>
                                <br />
                                <h2 class="text-3xl font-semibold mt-12 mb-6">Our Exclusive Solar Power Solutions: Services We Offer</h2>

                                <ul class="space-y-6">
                                    <li class="flex gap-4 mt-6">
                                        <div class="w-[24px]">
                                            <img class="w-full ls-is-cached lazyloaded" data-src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" src="{{ asset('/assets/CheckCircle.svg') }}" width="24px" height="24px" />
                                        </div>
                                        <div>
                                            <span class="font-bold">Solar Energy Storage System Installation</span>
                                            <p class="font-secondary text-primary-white">Efficient installations to manage electricity bills and provide the best solar backup devices.</p>
                                        </div>
                                    </li>
                                    <li class="flex gap-4 mt-6">
                                        <div class="w-[24px]">
                                            <img class="w-full ls-is-cached lazyloaded" data-src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" src="{{ asset('/assets/CheckCircle.svg') }}" width="24px" height="24px" />
                                        </div>
                                        <div>
                                            <span class="font-bold">Battery Backup System Installation</span>
                                            <p class="font-secondary text-primary-white">We offer <strong>residential battery storage</strong> installations to save energy generated for later use.</p>
                                        </div>
                                    </li>
                                    <li class="flex gap-4 mt-6">
                                        <div class="w-[24px]">
                                            <img class="w-full ls-is-cached lazyloaded" data-src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" src="{{ asset('/assets/CheckCircle.svg') }}" width="24px" height="24px"/>
                                        </div>
                                        <div>
                                            <span class="font-bold">Maintenance and Repair Facilities</span>
                                            <p class="font-secondary text-primary-white">Get the best maintenance and repair facilities from our skilled technicians.</p>
                                        </div>
                                    </li>
                                    <li class="flex gap-4 mt-6">
                                        <div class="w-[24px]">
                                            <img class="w-full ls-is-cached lazyloaded" data-src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" src="{{ asset('/assets/CheckCircle.svg') }}" width="24px" height="24px"/>
                                        </div>
                                        <div>
                                            <span class="font-bold">Energy Audits</span>
                                            <p class="font-secondary text-primary-white">Professional energy audits to ensure optimal solar panel and battery system performance.</p>
                                        </div>
                                    </li>
                                </ul>
                                <br />
                                <h2 class="text-3xl font-semibold mt-12 mb-6">
                                    Join the Solar Revolution with Olax Power Battery Backup for Home
                                </h2>
                                <div class="text-lg leading-relaxed space-y-6">
                                    <p class="font-secondary text-primary-white">With experienced installers, certified products, competitive pricing, and exceptional customer service, Olax Power is your go-to partner for sustainable energy solutions.</p>
                                    <p class="font-secondary text-primary-white">To get started, call us at <a href="tel:8778999937" class="text-green-400 hover:underline">877-899-9937</a>, email us at <a href="mailto:info@Olaxpower.com" class="text-green-400 hover:underline">info@Olaxpower.com</a>, or <a href="mailto:service.us@Olaxpower.com" class="text-green-400 hover:underline">service.us@Olaxpower.com</a>. Join our newsletter for exclusive updates and offers!</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <!-- SEO Content Commented -->
    <script>
        document
            .querySelectorAll(
                ".accordion-header , .sub-accordion-header , .sub-accordionB-header , .inner-accordion-header"
            )
            .forEach((button) => {
                button.addEventListener("click", () => {
                    const content = button.nextElementSibling;
                    const plusIcon = button.querySelector('img[alt="PlusCircle"]');
                    const minusIcon = button.querySelector('img[alt="MinusCircle"]');

                    // Toggle content
                    if (content.style.maxHeight && content.style.maxHeight !== "0px") {
                        content.style.maxHeight = "0px";
                        if (content.classList.contains("accordion-content")) {
                            // content.classList.remove("border");
                        }
                        plusIcon.classList.remove("opacity-0");
                        minusIcon.classList.add("opacity-0");
                    } else {
                        content.style.maxHeight = "2000px";
                        if (content.classList.contains("accordion-content")) {
                            // content.classList.add("border");
                        }
                        plusIcon.classList.add("opacity-0");
                        minusIcon.classList.remove("opacity-0");
                    }
                });
            });
    </script>

    <script defer type="text/javascript">
        window.addEventListener('DOMContentLoaded', function() {
            // homepage slider
            const swiper = new Swiper(".homeSwiper", {
                on: {
                    slideChange: function() {
                        const activeSlide = this.slides[this.activeIndex];
                        const newImageSrc = activeSlide.getAttribute('data-image-src');
                        const sliderImage = document.getElementById('slider-image');

                        // Fade out the current image
                        sliderImage.classList.add('fade-out');

                        sliderImage.addEventListener('transitionend', function onTransitionEnd() {
                            sliderImage.removeEventListener('transitionend', onTransitionEnd);

                            // Change the image source after fade-out
                            sliderImage.src = newImageSrc;
                            sliderImage.alt = 'battery backup for home';

                            // Reset classes after changing the image
                            sliderImage.classList.remove('fade-out');
                            sliderImage.classList.add('fade-in');

                            // Ensure the fade-in effect occurs correctly
                            setTimeout(() => {
                                sliderImage.classList.remove('fade-in');
                            }, 500); // Match this delay to the transition duration
                        });
                    }
                },

                // Navigation arrows
                navigation: {
                    nextEl: ".buttonNext",
                    prevEl: ".buttonPrev",
                },
            });
        });
    </script>
</section>
@include('layout.newsletter')
@endsection
