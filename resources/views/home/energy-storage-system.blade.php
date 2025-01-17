@extends('layout.frontend')
@section('page-content')
<style>
    .animation-pulse {
        /*box-shadow: 0 0 0 20px rgba(229,62,62, 0.5);
  transform: scale(0.8);*/
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(0.8);
            box-shadow: 0 0 0 0 #EF6818;
        }

        70% {
            transform: scale(1);
            box-shadow: 0 0 0 10px rgba(229, 62, 62, 0);
        }

        100% {
            transform: scale(0.8);
        }
    }
</style>
<!-- hero section -->
<section class="relative h-screen overflow-x-hidden">
    <video
        autoplay
        muted
        loop
        id="banner-video"
        poster=""
        class="h-full w-full object-cover">
        <source id="banner-video-src" data-src-desktop="{{ asset('/assets/videos/compressed/energy-solution-storage-banner.mp4') }}" data-src-mobile="{{ asset('/assets/videos/product-mobile-video.mp4') }}" type="video/mp4" />
        Your browser does not support the video tag.
    </video>
    <div class="content absolute bg-[#15151580] w-full h-full top-0 left-0">
        <div
            class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
            <div
                class="hero-content h-screen flex flex-col justify-center items-center gap-6">
                <div class="hero-content-top flex flex-col items-center gap-4">
                    <!-- <span
                        class="font-primary text-lg text-primary-yellow font-medium uppercase">Energy Storage Solutions</span> -->
                    <h1
                        class="font-primary font-medium text-primary-white text-[42px] leading-[48px] sm:text-[52px] sm:leading-[58px] lg:text-[72px] lg:leading-[80px] xl:text-[80px] xl:leading-[88px] lg:max-w-[65%] text-center drop-shadow-2xl">
                        Energy Storage Solutions
                    </h1>
                </div>

                <div
                    class="hero-content-btm flex flex-col lg:flex-row items-center justify-center gap-4 max-w-[80%] md:max-w-none">
                    <button
                        onclick="document.getElementById('learn-more-scroll').scrollIntoView({ behavior: 'smooth' });"
                        class="bg-transparent border border-[#F5F5F5] px-6 py-3 rounded-full font-primary text-[#F5F5F5] font-medium flex items-center gap-2 w-full md:w-auto transition-all duration-300 hover:bg-primary-yellow hover:text-primary-black hover:border-primary-yellow">
                        <span>Learn More</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- second section -->
<section class="py-10 md:py-20 xl:py-[140px] bg-[#FFF]">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col relative h-[550px] md:h-[650px] lg:h-[750px] xl:h-[950px]">
            <div class="flex flex-col items-center z-20">
                <div class=" flex flex-col gap-6 items-center ">
                    <span class="font-primary font-medium text-primary-black text-[42px] leading-[48px] sm:text-[52px] sm:leading-[58px] lg:text-[72px] lg:leading-[80px] xl:text-[80px] xl:leading-[88px] text-center drop-shadow-2xl">X Power</span>
                    <span class="text-primary-black font-secondary  text-[14px] md:text-base leading-[24px] text-center md:w-[80%] xl:w-[70%]">Our all-in-one system for the American market categorizes home loads to prioritize essential needs. Additionally, customers can remotely control home appliances, whether it's heating the water before arriving home or turning off the AC while away. With seamless integration and advanced energy management, the X Power system ensures optimal efficiency, convenience, and peace of mind, giving you complete control over your home's energy usage from anywhere.</span>
                </div>
            </div>
            <div class="absolute sm:bottom-[0%] bottom-[3%]">
                <div class="relative" id="learn-more-scroll">
                    <img data-src="{{ asset('/assets/Energy_Storage/Storage.webp') }}" width="448" height="274" class="w-full h-auto lazyload" alt="">
                    <div class="absolute inset-0 bg-gradient-to-t from-transparent via-transparent to-white"></div>
                    <div>
                        <a class="cursor-pointer" href="{{ url('products/accessories/monitoring-dongles') }}">
                            <div class="flex items-center gap-1 lg:gap-2 lg:py-2 lg:px-3 py-1 px-1 rounded-full bg-[#151515CC] absolute top-[40%] sm:top-[50%] sm:right-[26%] right-[5%]">
                                <span class="text-[12px] lg:text-[14px] font-bold font-secondary leading-[18px] text-[#EEBB0C]">Pocket Dongle</span>
                                <div class="animation-pulse rounded-full cursor-pointer"> <img class="lazyload" data-src="{{ asset('/assets/Energy_Storage/addBtn.png') }}" width="22" height="22"  alt="addBtn"></div>

                            </div>
                        </a>
                        <a href="{{ route('frontened.the.cloud.app') }}" class="cursor-pointer">
                            <div class="flex items-center gap-1 lg:gap-2 lg:py-2 lg:px-3 py-1 px-1 rounded-full bg-[#151515CC] absolute bottom-[40%] md:left-[26%] sm:left-[15%] left-[5%]">
                                <span class="text-[12px] lg:text-[14px] font-bold font-secondary leading-[18px] text-[#EEBB0C]">The Cloud App</span>
                                <div class="animation-pulse rounded-full cursor-pointer"> <img class="lazyload" data-src="{{ asset('/assets/Energy_Storage/addBtn.png') }}"  width="22" height="22" alt="addBtn" /></div>
                            </div>
                        </a>
                        <a href="{{ url('products/energy-storage-inverter/a1-hybrid-g2') }}" class="cursor-pointer">
                            <div class="flex items-center gap-1 lg:gap-2 lg:py-2 lg:px-3 py-1 px-1 rounded-full bg-[#151515CC] absolute bottom-[68%] lg:bottom-[41%] left-[44%]">
                                <span class="text-[12px] lg:text-[14px] font-bold font-secondary leading-[18px] text-[#EEBB0C]"> A1-ESS G2</span>
                                <div class="animation-pulse rounded-full cursor-pointer"> <img class="lazyload" data-src="{{ asset('/assets/Energy_Storage/addBtn.png') }}" alt="addBtn"  width="22" height="22"></div>
                            </div>
                        </a>
                        <a href="{{ url('products/energy-storage-inverter/a1-bi-g2') }}" class="cursor-pointer">
                        <div class="flex items-center gap-1 lg:gap-2 lg:py-2 lg:px-3 py-1 px-1 rounded-full bg-[#151515CC] absolute xl:right-[24%] md:right-[22%] md:bottom-[35%]  bottom-[25%] right-[16%]">
                            <div class="animation-pulse rounded-full cursor-pointer"> <img class="lazyload" data-src="{{ asset('/assets/Energy_Storage/addBtn.png') }}" alt="addBtn"  width="22" height="22"></div>
                            <span class="text-[12px] lg:text-[14px] font-bold font-secondary leading-[18px] text-[#EEBB0C]">A1 BI G2</span>
                        </div>
                        </a>
                        <a href="{{ url('products/energy-storage-inverter/switch-box') }}" class="cursor-pointer">
                            <div class="flex items-center gap-1 lg:gap-2 lg:py-2 lg:px-3 py-1 px-1 rounded-full bg-[#151515CC] absolute xl:bottom-[17%] xl:right-[24%] md:right-[20%]  md:bottom-[14%] right-[45%] bottom-[15%]">
                                <div class="animation-pulse rounded-full cursor-pointer"> <img class="lazyload" data-src="{{ asset('/assets/Energy_Storage/addBtn.png') }}"  width="22" height="22" alt="addBtn"></div>
                                <span class="text-[12px] lg:text-[14px] font-bold font-secondary leading-[18px] text-[#EEBB0C]">Switch Box</span>
                            </div>
                        </a>
                        <a href="{{ url('products/triple-power-battery/t-bat-sys-hv-5-0') }}" class="cursor-pointer">
                            <div class="flex items-center gap-1 lg:gap-2 lg:py-2 lg:px-3 py-1 px-1 rounded-full bg-[#151515CC] absolute xl:bottom-[4%] xl:right-[26%]  md:bottom-[2%] md:right-[24%] bottom-[0%] right-[20%]">
                                <div class="animation-pulse rounded-full cursor-pointer"> <img class="lazyload" data-src="{{ asset('/assets/Energy_Storage/addBtn.png') }}"  width="22" height="22" alt=""></div>
                                <span class="text-[12px] lg:text-[14px] font-bold font-secondary leading-[18px] text-[#EEBB0C]">T Bat Sys</span>
                            </div>
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- third section -->
<section class="py-10 md:py-20 xl:py-[140px] bg-primary-black">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col items-center gap-10 md:gap-[90px]">

            <span class="font-primary font-medium text-primary-white text-[32px] leading-[40px] lg:text-[52px] lg:leading-[68px] xl:text-[64px] xl:leading-[76px] text-center drop-shadow-2xl lg:w-[65%] xl:w-[65%]"> <span class="text-[#EEBB0C]">4</span> System in Parallel to Achieve <span class="text-[#EF6818]">30kW/80kWh</span>
                Energy Storage System</span>
            <div class="p-10 bg-[url(./../assets/Energy_Storage/bg-dark.png)]">
                <img class="lazyload" data-src="{{ asset('/assets/Energy_Storage/System1.png') }}" alt="System1" width="1030" height="667">
                <div class="flex flex-col gap-3">
                    <div class="flex items-center gap-3">
                        <img class="lazyload" data-src="{{ asset('/assets/Energy_Storage/bullet.png') }}"   width="20" height="20"  alt="bullet">
                        <span class="text-[#F5F5F5] text-xs md:text-base font-secondary leading-[24px]">Friendly with existing PV system</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <img class="lazyload" data-src="{{ asset('/assets/Energy_Storage/bullet.png') }}" width="20" height="20" alt="bullet">
                        <span class="text-[#F5F5F5] text-xs md:text-base font-secondary leading-[24px]">Up to 4 battery modules stackable, 20kWh each system</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Fourth Section -->

<section class="xl:py-[140px] py-10 md:py-20 bg-primary-black">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col items-center gap-10 md:gap-[90px]">
            <div class="flex flex-col items-center gap-6">
                <span class="font-primary font-medium text-primary-white text-[32px] leading-[40px] lg:text-[52px] lg:leading-[68px] xl:text-[64px] xl:leading-[76px] text-center drop-shadow-2xl "> <span class="text-[#EEBB0C]">Smart Home</span> Power Solution</span>
                <span class="font-secondary text-[14px] md:text-base leading-[24px] text-[#F5F5F5] text-center md:w-[70%] xl:w-[45%]">Not only A1-ESS G2 is capable to smartly power the entire house, customers are able to only connect essential loads to A1-ESS G2 and control on smart devices as needed. Also could be achieved flexible home backup energy by generator.</span>
            </div>
            <div class="p-10 bg-[url(./../assets/Energy_Storage/bg-dark.png)]">
                <img class="lazyload" data-src="{{ asset('/assets/Energy_Storage/Power.webp') }}" alt="Power" width="1200" height="675">

            </div>

        </div>
    </div>
</section>
<!-- sixth section -->
@include('layout.newsletter')

@endsection
