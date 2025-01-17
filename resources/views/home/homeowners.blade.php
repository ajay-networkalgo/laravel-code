@extends('layout.frontend')
@section('page-content')
<style>
    .active {
        display: flex;
        animation: modalAnimation 0.3s ease-in-out;
    }

    @keyframes modalAnimation {
        0% {
            opacity: 0;
            transform: scale(1.2);
        }

        100% {
            opacity: 1;
            transform: scale(1);
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
        <source id="banner-video-src" data-src-desktop="{{ asset('/assets/videos/compressed/' . $homeOwnerPageContent['homeowner_banner_video']['value'] ?? '') }}" data-src-mobile="{{ asset('/assets/videos/compressed/' . $homeOwnerPageContent['homeowner_mobile_banner_video']['value'] ?? '') }}" type="video/mp4" />
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
                        {{ $homeOwnerPageContent['homeowner_banner_video_title']['value'] ?? '' }} <span class="italic">Home Owners</span>
                    </h1>
                    <p
                        class="hidden lg:block font-secondary font-medium text-lg lg:text-xl text-primary-white">
                        {{ $homeOwnerPageContent['homeowner_banner_video_sub_title']['value'] ?? '' }}
                    </p>
                </div>

                <div
                    class="hero-content-btm flex flex-col lg:flex-row items-center justify-center gap-4 max-w-[80%] md:max-w-none">
                    <button
                        onclick="window.location.href='/book-consultation'"
                        class="bg-primary-yellow border border-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium flex items-center gap-2 w-full md:w-auto text-sm lg:text-base transition-all duration-300 group hover:bg-transparent hover:border-primary-white hover:text-primary-white">
                        <span class="whitespace-nowrap">Free Energy Consultation</span>
                        <img src="{{ asset('/assets/ArrowLeft.svg') }}" alt="best battery for solar power storage" class="lazyload transition-all duration-300 group-hover:invert group-hover:translate-x-2" width="24px" height="24px" />
                    </button>

                    <button
                        onclick="document.getElementById('ms_frame_container').scrollIntoView({ behavior: 'smooth' });"
                        class="px-6 py-3 rounded-full font-primary text-primary-white font-medium border border-primary-white w-full md:w-auto text-sm lg:text-base transition-all duration-300 hover:bg-primary-yellow hover:text-primary-black hover:border-primary-yellow">
                        Learn More
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- second section -->
<section class="bg-primary-white py-24 flex flex-col gap-16" id="homeowner-section-2">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div>
            <div class="flex flex-col items-center gap-2">
                <!-- <span class="font-primary text-lg text-primary-orange font-medium uppercase text-center">easy installation</span> -->
                <h2
                    class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-black font-medium text-center">
                    Discover the <span class="text-primary-yellow">X</span>{{ $homeOwnerPageContent['homeowner_xpower_title']['value'] ?? '' }}
                </h2>
            </div>
        </div>
    </div>

    <div class="w-[96%] mx-auto">
        <div id='ms_frame_container' class="landscape">
            <iframe
                id='ms_frame'
                loading='lazy'
                src='https://embed.mindstamp.com/e/rlYthbyiOHkC?autoplay=1&fullscreen=1'
                style="position: absolute;top: 0;left: 0; width: 100%; height: 100%; min-height:unset; min-width: unset; border: 0"
                allowFullscreen
                allow='encrypted-media; microphone; camera; geolocation'
                scrolling='no'
                referrerpolicy='no-referrer-when-downgrade'>
            </iframe>
        </div>
        <script>
            window.addEventListener("load", (event) => {
                const container = document.getElementById('ms_frame_container');
                if (window.innerWidth < (window.innerHeight / 2)) {
                    container.classList.add("portrait");
                    container.classList.remove("landscape");
                    console.log('Portrait');
                } else {
                    console.log('Landscape');
                }
            })
        </script>
        <style>
            .portrait,
            .landscape {
                position: relative;
                overflow: hidden;
            }

            .portrait {
                padding-top: 178%;
                width: 100%;
                margin: 0 auto;
            }

            .landscape {
                padding-top: 56.25%;
            }
        </style>
        <script>
            window.addEventListener('message', (event) => {
                if (event.data && event.data.event == 'redirect') {
                    window.location.href = event.data.info.data.link
                }
            });
        </script>
    </div>

    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <!-- <p class="font-secondary text-primary-black lg:max-w-[80%]">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ut
            vulputate turpis, in auctor nulla. Aenean placerat id eros quis
            elementum. Phasellus at tincidunt eros. Vestibulum massa orci,
            vehicula ut nulla sit amet, luctus iaculis justo. In auctor enim at
            finibus laoreet. Nam a ipsum sit amet justo cursus maximus vitae at
            nisl. Cras non enim odio.
        </p> -->
    </div>
</section>

<section
    class="py-24 lg:py-32 bg-[url('./../assets/homeowner/homeowner_bg.png')] bg-no-repeat bg-cover bg-center">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-16 lg:gap-24">
            <div class="flex flex-col items-center gap-2">
                <span
                    class="font-primary text-lg text-primary-orange font-medium uppercase text-center">{{ $homeOwnerPageContent['homeowner_Olax_app_title']['value'] ?? '' }}</span>
                <h2
                    class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-white font-medium text-center">
                    {{ $homeOwnerPageContent['homeowner_Olax_app_sub_title']['value'] ?? '' }}
                </h2>
            </div>

            <div class="flex flex-col lg:flex-row gap-6 lg:gap-10">
                <div>
                    <img class="lazyload" data-src="{{ asset('/assets/homeowner/OlaxApp.png') }}" alt="home energy storage system"  width="527" height="517"/>
                </div>

                <div class="flex flex-col gap-10">
                    <div class="relative">
                        <div class="bg-primary-black px-16 pt-20">
                            <div>
                                <img class="lazyload"
                                    data-src="{{ asset('/assets/homeowner/homeowner_mobile.png') }}"
                                    alt="home battery backup" width="442" height="277" />
                            </div>
                        </div>

                        <div
                            class="bg-[#15151580] absolute top-0 left-0 w-full h-full flex justify-center items-center">
                            <button class="open-modal-btn" data-modal-id="videoModal">
                                <img src="{{ asset('/assets/homeowner/playBtn.svg') }}" alt="playBtn" width="90" height="90" />
                            </button>
                        </div>

                        <!-- modal -->
                        <div
                            id="videoModal"
                            class="modal hidden fixed inset-0 bg-primary-black bg-opacity-75 overflow-y-auto h-full w-full flex justify-center items-center backdrop-blur-lg z-[999]">
                            <div class="w-[90%] lg:w-[70%] relative">
                                <video
                                    controls
                                    autoplay
                                    muted
                                    loop
                                    id="cloud-app-video"
                                    poster=""
                                    class="h-full w-full xl:h-auto object-cover lazyload">
                                    <source
                                        data-src="{{ asset('/assets/videos/compressed/' . $homeOwnerPageContent['homeowner_Olax_app_video']['value'] ?? '') }}"
                                        type="video/mp4" />
                                    Your browser does not support the video tag.
                                </video>

                                <div
                                    class="w-full h-[50%] bg-gradient-to-b from-[#151515] to-[#15151500] absolute top-0 left-0 lg:px-6 lg:py-8 flex justify-end">

                                    <button class="close-modal-btn flex">
                                        <img
                                            src="{{ asset('/assets/homeowner/XCircle.svg') }}"
                                            alt="home battery power storage" />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center gap-6">
                        <a href="https://play.google.com/store/apps/details?id=com.Olaxcloud.starter">
                            <img
                                width="200" height="58"
                                src="{{ asset('/assets/homeowner/googleplay.png') }}"
                                alt="googleplay" />
                        </a>
                        <a href="https://apps.apple.com/us/app/Olaxcloud/id1300059673 ">
                            <img
                                width="200" height="58"
                                src="{{ asset('/assets/homeowner/appstore.png') }}"
                                alt="appstore" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section
    class="py-24 lg:py-32  bg-no-repeat bg-center bg-cover" style="background-image: url('{{ asset('/assets/homeowner/' . $homeOwnerPageContent['homeowner_configure_xpower_image']['value'] ?? '') }}')">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-16">
            <div class="flex flex-col items-center gap-2">
                <span
                    class="font-primary text-lg text-primary-orange font-medium uppercase text-center">{{ $homeOwnerPageContent['homeowner_configure_xpower_title']['value'] ?? '' }}</span>
                <h2
                    class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-white font-medium text-center">
                    {{ $homeOwnerPageContent['homeowner_configure_xpower_sub_title']['value'] ?? '' }}
                </h2>
            </div>

            <div class="flex flex-col gap-y-10 lg:flex-row">
                <div
                    class="flex flex-col lg:flex-row items-center justify-center gap-4 grow">
                    <div id="xpower-container" class="flex justify-center flex-wrap md:grid grid-cols-2 gap-4">
                        <div id="xpower" class="relative w-[150px]">
                            <img class="lazyload" data-src="{{ asset('/assets/product/product_2.png') }}" alt="solar energy storage solutions" width="150" height="195"/>
                        </div>
                    </div>
                    <div id="xpower-add-button">
                        <button
                            class="flex flex-col items-center gap-2  transition-all duration-300 group hover:bg-transparent hover:border-primary-white hover:text-primary-white"
                            onclick="addXPower()">
                            <img
                                src="{{ asset('/assets/homeowner/PlusCircle_xpower.svg') }}"
                                alt="PlusCircle_xpower" width="40" height="40"
                                class="transition-all duration-300 group-hover:invert group-hover:translate-x-2" />
                            <span class="font-secondary text-primary-white">Click to Add XPower</span>
                        </button>
                    </div>
                </div>

                <div class="lg:mx-auto lg:w-[50%]">
                  
                    {!! $homeOwnerPageContent['homeowner_configure_xpower_description']['value'] ?? '' !!}
                    <!-- SEO Content Commented -->
                    <div
                        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto mt-2">
                        <ul class="accordion flex flex-col gap-5">
                            <li class="accordion-item">
                                <button
                                    class="accordion-header inline-block w-full flex items-center gap-2">
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
                                    class="accordion-content overflow-scroll transition-all duration-300 max-h-0">
                                    <ul class="py-6">
                                        <li>
                                            <div class="text-white gap-4">
                                                <h1 class="text-2xl font-semibold text-left mb-6">
                                                Olax - Offering Home Energy Storage Solution for Your House
                                                </h1>
                                                <p class="font-secondary text-primary-white">
                                                Installing Olax’s advanced energy storage systems for your home means you have reduced risks of running out of electricity. Enhanced energy independence and reduced electricity bills are possible with our <strong>home battery backup systems</strong>. With our home solar battery systems, you can store energy that has been absorbed by your photovoltaic panels so that you can use it when needed most.
                                                </p>
                                                <br />
                                                <h2 class="text-xl font-semibold mt-12 mb-6">
                                                Get Reliable Home Battery Backup
                                                </h2>
                                                <div class="text-lg leading-relaxed space-y-6">
                                                    <p class="font-secondary text-primary-white">A home battery backup gives all support when there is a power outage. Generally, you will enjoy having comfort when you reside in areas prone to blackouts. Olax’s <strong>home solar energy storage</strong> systems will store extra energy produced during the day that can be used at night or even during emergencies. Hence, with our <strong>home battery power storage</strong> solutions, you can minimize your reliance on the grid while being sure that all your critical appliances keep humming within the system capacity: a fridge, an internet router, or even a small air conditioner.</p>
                                                </div>
                                                <br />
                                                <h2 class="text-xl font-semibold mt-12 mb-6">
                                                Maximize Your Solar Investment with Olax
                                                </h2>
                                                <div class="text-lg leading-relaxed space-y-6">
                                                    <p class="font-secondary text-primary-white">Add our <strong>home solar energy storage</strong> systems to your home! Store the excess energy generated by our <strong>solar backup generator</strong> instead of feeding it back into the grid. You'll be able to store this power and use it at peak hours when power rates are higher. This way, you'll save energy costs while having better control over your usage. With our solar energy storage solutions, you're not just investing in a solar system but also a <strong>home battery backup</strong> system that works for you all year round.</p>
                                                </div>
                                                <br />
                                                <h2 class="text-xl font-semibold mt-12 mb-6">
                                                Quick Access to Olax App for Managing Any Power Urgencies
                                                </h2>
                                                <div class="text-lg leading-relaxed space-y-6">
                                                    <p class="font-secondary text-primary-white">Our <strong>home solar battery system</strong> gives you so much more than just backup power! Olax lets you monitor and control the usage of your energy needs with our dedicated smartphone app. Our app allows you to set up your home battery backup system, monitor energy storage, and optimize your energy savings to ensure that you are getting more miles per dollar from the energy you produce at home. From small appliances such as a television to heavy appliances such as an EV charger, our app makes managing energy consumption simple.</p>
                                                </div>
                                                <br />
                                                <h2 class="text-xl font-semibold mt-12 mb-6">
                                                Enjoy Smart Energy Features for Your Home
                                                </h2>
                                                <div class="text-lg leading-relaxed space-y-6">
                                                    <p class="font-secondary text-primary-white">Our residential battery systems integrate with many devices and household appliances. From necessary appliances such as your microwave and refrigerator to larger manageable appliances like your heat pump or vacuum cleaner, our <strong>home energy storage system</strong> ensures you have reliable power. The Olax XPower system comes fitted with energy storage of up to 80KWh. This allows you to store energy for a longer period and increase savings in terms of the TOU (Time-of-Use) rate in your area.</p>
                                                </div>
                                                <br />
                                                <h2 class="text-xl font-semibold mt-12 mb-6">
                                                Make Good Savings on Your Energy Bills with Olax
                                                </h2>
                                                <div class="text-lg leading-relaxed space-y-6">
                                                    <p class="font-secondary text-primary-white">You save much on your energy bills with Olax. As you can store electricity during the low-rate off-peak time and utilize it when your rates are the highest, you get to control your electricity costs better. You do not pay for power at high utility rates while providing a reliable backup supply during blackouts. Our <strong>home backup battery system</strong> makes it easy for you to depend less on grid supply and avoid your increased monthly energy cost.</p>
                                                </div>
                                                <br />
                                                <h2 class="text-xl font-semibold mt-12 mb-6">
                                                Get Started with Olax Energy Solutions Today!
                                                </h2>
                                                <div class="text-lg leading-relaxed space-y-6">
                                                    <p class="font-secondary text-primary-white">Olax makes switching to solar energy and battery backup solutions for your home easy. Schedule a free consultation with us today and learn how our <strong>home energy storage systems</strong> can help you store, use, and save energy better. We’re here to help you at each stage of your energy journey: from new installation of home solar battery systems to needing a <strong>home battery backup</strong> system, we make it easy for you to do so!</p>
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
                                        content.style.maxHeight = "500px";
                                        if (content.classList.contains("accordion-content")) {
                                            // content.classList.add("border");
                                        }
                                        plusIcon.classList.add("opacity-0");
                                        minusIcon.classList.remove("opacity-0");
                                    }
                                });
                            });
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-primary-white py-24 lg:py-32">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div>
            <h2
                class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-black font-medium xl:max-w-[50%]">
                {{ $homeOwnerPageContent['homeowner_looking_to_offset_title']['value'] ?? '' }}
            </h2>
        </div>
    </div>
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex py-2 mt-[32px] justify-right">
            <p class="font-secondary text-primary-black lg:max-w-[52%]">
            {{ $homeOwnerPageContent['homeowner_looking_to_offset_content']['value'] ?? '' }}
            </p>
        </div>
    </div>

    <div class="relative">
        <div
            class="h-[30%] bg-gradient-to-b from-[#F5F5F5] to-[#F5F5F500] absolute w-full top-0 left-0"></div>
        <div>
            <img
                class="w-full lazyload"
                data-src="{{ asset('/assets/homeowner/' . $homeOwnerPageContent['homeowner_looking_to_offset_image']['value'] ?? '') }}"
                alt="homeowner_image" width="1903" height="1040"/>
        </div>
        <div
            class="h-[30%] bg-gradient-to-b from-[#F5F5F500] to-[#F5F5F5] absolute w-full bottom-0 left-0"></div>
    </div>
</section>

<section class="py-32">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-16 lg:gap-24">
            <div class="flex flex-col items-center gap-2">
                <!-- <span
                    class="font-primary text-lg text-primary-orange font-medium uppercase text-center">TOU rates</span> -->
                <h2
                    class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-white font-medium text-center">
                    {{ $homeOwnerPageContent['homeowner_states_with_height_title']['value'] ?? '' }}
                </h2>
            </div>

            <div>
                <div class="lg:hidden">
                    <img src="{{ asset('/assets/homeowner/' . $homeOwnerPageContent['homeowner_states_with_height_image']['value'] ?? '') }}" alt="MapUSA" width="1184" height="745" />
                </div>
                <div class="relative overflow-hidden hidden lg:block">
                    <div>
                        <img
                            class="w-full"
                            src="{{ asset('/assets/homeowner/OBJECTS.png') }}"
                            alt="OBJECTS" width="1280" height="827" />
                    </div>

                    <ul>
                        <li
                            class="absolute top-[45%] left-[75px] 2xl:top-[45%] 2xl:left-[95px] flex group">
                            <img
                                class="animate-bounce group-hover:animate-none"
                                src="{{ asset('/assets/homeowner/MapPin.svg') }}"
                                alt="MapPin" width="32" height="48" />
                            <span
                                class="bg-gradient-to-r from-[#EEBB0C] to-[#EF6818] px-6 py-3 rounded-full font-primary text-primary-black font-medium scale-x-0 origin-left transition-all duration-300 group-hover:scale-x-100">California</span>
                        </li>
                        <li
                            class="absolute top-[32%] left-[140px] 2xl:top-[32%] 2xl:left-[165px] flex group">
                            <img
                                class="animate-bounce group-hover:animate-none"
                                src="{{ asset('/assets/homeowner/MapPin.svg') }}"
                                alt="MapPin"  width="32" height="48"/>
                            <span
                                class="bg-gradient-to-r from-[#EEBB0C] to-[#EF6818] px-6 py-3 rounded-full font-primary text-primary-black font-medium scale-x-0 origin-left transition-all duration-300 group-hover:scale-x-100">Nevada</span>
                        </li>
                        <li
                            class="absolute top-[55%] left-[230px] 2xl:top-[55%] 2xl:left-[260px] flex group">
                            <img
                                class="animate-bounce group-hover:animate-none"
                                src="{{ asset('/assets/homeowner/MapPin.svg') }}"
                                alt="MapPin"  width="32" height="48" />
                            <span
                                class="bg-gradient-to-r from-[#EEBB0C] to-[#EF6818] px-6 py-3 rounded-full font-primary text-primary-black font-medium scale-x-0 origin-left transition-all duration-300 group-hover:scale-x-100">Arizona</span>
                        </li>
                        <li
                            class="absolute top-[36%] left-[485px] 2xl:top-[36%] 2xl:left-[410px] flex group">
                            <img
                                class="animate-bounce group-hover:animate-none"
                                src="{{ asset('/assets/homeowner/MapPin.svg') }}"
                                alt="MapPin"  width="32" height="48"/>
                            <span
                                class="bg-gradient-to-r from-[#EEBB0C] to-[#EF6818] px-6 py-3 rounded-full font-primary text-primary-black font-medium scale-x-0 origin-left transition-all duration-300 group-hover:scale-x-100">Colorado</span>
                        </li>
                        <li
                            class="absolute top-[65%] left-[530px] 2xl:top-[65%] 2xl:left-[560px] flex group">
                            <img
                                class="animate-bounce group-hover:animate-none"
                                src="{{ asset('/assets/homeowner/MapPin.svg') }}"
                                alt="MapPin"  width="32" height="48"/>
                            <span
                                class="bg-gradient-to-r from-[#EEBB0C] to-[#EF6818] px-6 py-3 rounded-full font-primary text-primary-black font-medium scale-x-0 origin-left transition-all duration-300 group-hover:scale-x-100">Texas</span>
                        </li>
                        <li
                            class="absolute bottom-[2%] left-[425px] 2xl:bottom-[2%] 2xl:left-[470px] flex group">
                            <img
                                class="animate-bounce group-hover:animate-none"
                                src="{{ asset('/assets/homeowner/MapPin.svg') }}"
                                alt="MapPin"  width="32" height="48"/>
                            <span
                                class="bg-gradient-to-r from-[#EEBB0C] to-[#EF6818] px-6 py-3 rounded-full font-primary text-primary-black font-medium scale-x-0 origin-left transition-all duration-300 group-hover:scale-x-100">Hawaii</span>
                        </li>
                        <li
                            class="absolute top-[20%] right-[30px] 2xl:top-[20%] 2xl:right-[50px] flex group">
                            <img
                                class="animate-bounce group-hover:animate-none"
                                src="{{ asset('/assets/homeowner/MapPin.svg') }}"
                                alt="MapPin"  width="32" height="48"/>
                            <span
                                class="bg-gradient-to-r from-[#EEBB0C] to-[#EF6818] px-6 py-3 rounded-full font-primary text-primary-black font-medium scale-x-0 origin-left transition-all duration-300 group-hover:scale-x-100">New York</span>
                        </li>
                        <li
                            class="absolute top-[25%] -right-[50px] 2xl:top-[25%] 2xl:-right-[30px] flex group">
                            <img
                                class="animate-bounce group-hover:animate-none"
                                src="{{ asset('/assets/homeowner/MapPin.svg') }}"
                                alt="MapPin"  width="32" height="48"/>
                            <span
                                class="bg-gradient-to-r from-[#EEBB0C] to-[#EF6818] px-6 py-3 rounded-full font-primary text-primary-black font-medium scale-x-0 origin-left transition-all duration-300 group-hover:scale-x-100">Connecticut</span>
                        </li>
                        <li
                            class="absolute top-[22%] -right-[85px] 2xl:top-[22%] 2xl:-right-[65px] flex group">
                            <img
                                class="animate-bounce group-hover:animate-none"
                                src="{{ asset('/assets/homeowner/MapPin.svg') }}"
                                alt="MapPin"  width="32" height="48"/>
                            <span
                                class="bg-gradient-to-r from-[#EEBB0C] to-[#EF6818] px-6 py-3 rounded-full font-primary text-primary-black font-medium scale-x-0 origin-left transition-all duration-300 group-hover:scale-x-100">Massachusetts</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pb-24 lg:pb-32">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-16 lg:gap-24">
            <div class="flex flex-col items-center gap-2">
                <!-- <span
                    class="font-primary text-lg text-primary-orange font-medium uppercase text-center">New Metering</span> -->
                <h2
                    class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-white font-medium text-center lg:max-w-[80%] xl:max-w-[60%]">
                    {{ $homeOwnerPageContent['homeowner_states_of_concern_title']['value'] ?? '' }}
                </h2>
                <p
                    class="font-secondary text-primary-white text-center lg:max-w-[80%] xl:max-w-[60%]">
                    {{ $homeOwnerPageContent['homeowner_states_of_concern_content']['value'] ?? '' }}
                </p>
            </div>

            <div>
                <div class="lg:hidden">
                    <img class="lazyload" data-src="{{ asset('/assets/homeowner/' . $homeOwnerPageContent['homeowner_states_of_concern_image']['value'] ?? '') }}" alt="MapUSA" />
                </div>
                <div class="relative overflow-hidden hidden lg:block">
                    <div>
                        <img
                            class="w-full lazyload"
                            data-src="{{ asset('/assets/homeowner/OBJECTS.png') }}"
                            alt="OBJECTS" width="1280" height="827"/>
                    </div>

                    <ul>
                        <li
                            class="absolute top-[32%] left-[140px] 2xl:top-[32%] 2xl:left-[165px] flex group">
                            <img
                                class="animate-bounce group-hover:animate-none"
                                src="{{ asset('/assets/homeowner/MapPin.svg') }}"
                                alt="MapPin"  width="32" height="48"/>
                            <span
                                class="bg-gradient-to-r from-[#EEBB0C] to-[#EF6818] px-6 py-3 rounded-full font-primary text-primary-black font-medium scale-x-0 origin-left transition-all duration-300 group-hover:scale-x-100">Nevada</span>
                        </li>
                        <li
                            class="absolute top-[55%] left-[230px] 2xl:top-[55%] 2xl:left-[260px] flex group">
                            <img
                                class="animate-bounce group-hover:animate-none"
                                src="{{ asset('/assets/homeowner/MapPin.svg') }}"
                                alt="MapPin"  width="32" height="48"/>
                            <span
                                class="bg-gradient-to-r from-[#EEBB0C] to-[#EF6818] px-6 py-3 rounded-full font-primary text-primary-black font-medium scale-x-0 origin-left transition-all duration-300 group-hover:scale-x-100">Arizona</span>
                        </li>
                        <li
                            class="absolute bottom-[2%] left-[425px] 2xl:bottom-[2%] 2xl:left-[470px] flex group">
                            <img
                                class="animate-bounce group-hover:animate-none"
                                src="{{ asset('/assets/homeowner/MapPin.svg') }}"
                                alt="MapPin"  width="32" height="48"/>
                            <span
                                class="bg-gradient-to-r from-[#EEBB0C] to-[#EF6818] px-6 py-3 rounded-full font-primary text-primary-black font-medium scale-x-0 origin-left transition-all duration-300 group-hover:scale-x-100">Hawaii</span>
                        </li>
                        <li
                            class="absolute top-[12%] right-[470px] 2xl:top-[12%] 2xl:right-[470px] flex group">
                            <img
                                class="animate-bounce group-hover:animate-none"
                                src="{{ asset('/assets/homeowner/MapPin.svg') }}"
                                alt="MapPin"  width="32" height="48"/>
                            <span
                                class="bg-gradient-to-r from-[#EEBB0C] to-[#EF6818] px-6 py-3 rounded-full font-primary text-primary-black font-medium scale-x-0 origin-left transition-all duration-300 group-hover:scale-x-100">Minnesota</span>
                        </li>
                        <li
                            class="absolute top-[15%] right-[330px] 2xl:top-[15%] 2xl:right-[360px] flex group">
                            <img
                                class="animate-bounce group-hover:animate-none"
                                src="{{ asset('/assets/homeowner/MapPin.svg') }}"
                                alt="MapPin"  width="32" height="48"/>
                            <span
                                class="bg-gradient-to-r from-[#EEBB0C] to-[#EF6818] px-6 py-3 rounded-full font-primary text-primary-black font-medium scale-x-0 origin-left transition-all duration-300 group-hover:scale-x-100">Wisconsin</span>
                        </li>
                        <li
                            class="absolute top-[20%] right-[230px] 2xl:top-[20%] 2xl:right-[260px] flex group">
                            <img
                                class="animate-bounce group-hover:animate-none"
                                src="{{ asset('/assets/homeowner/MapPin.svg') }}"
                                alt="MapPin"  width="32" height="48"/>
                            <span
                                class="bg-gradient-to-r from-[#EEBB0C] to-[#EF6818] px-6 py-3 rounded-full font-primary text-primary-black font-medium scale-x-0 origin-left transition-all duration-300 group-hover:scale-x-100">Michigan</span>
                        </li>
                        <li
                            class="absolute top-[24%] right-[460px] 2xl:top-[24%] 2xl:right-[490px] flex group">
                            <img
                                class="animate-bounce group-hover:animate-none"
                                src="{{ asset('/assets/homeowner/MapPin.svg') }}"
                                alt="MapPin"  width="32" height="48"/>
                            <span
                                class="bg-gradient-to-r from-[#EEBB0C] to-[#EF6818] px-6 py-3 rounded-full font-primary text-primary-black font-medium scale-x-0 origin-left transition-all duration-300 group-hover:scale-x-100">Iowa</span>
                        </li>
                        <li
                            class="absolute top-[30%] right-[270px] 2xl:top-[30%] 2xl:right-[300px] flex group">
                            <img
                                class="animate-bounce group-hover:animate-none"
                                src="{{ asset('/assets/homeowner/MapPin.svg') }}"
                                alt="MapPin"  width="32" height="48"/>
                            <span
                                class="bg-gradient-to-r from-[#EEBB0C] to-[#EF6818] px-6 py-3 rounded-full font-primary text-primary-black font-medium scale-x-0 origin-left transition-all duration-300 group-hover:scale-x-100">Indiana</span>
                        </li>
                        <li
                            class="absolute top-[30%] right-[210px] 2xl:top-[30%] 2xl:right-[240px] flex group">
                            <img
                                class="animate-bounce group-hover:animate-none"
                                src="{{ asset('/assets/homeowner/MapPin.svg') }}"
                                alt="MapPin"  width="32" height="48"/>
                            <span
                                class="bg-gradient-to-r from-[#EEBB0C] to-[#EF6818] px-6 py-3 rounded-full font-primary text-primary-black font-medium scale-x-0 origin-left transition-all duration-300 group-hover:scale-x-100">Ohio</span>
                        </li>
                        <li
                            class="absolute bottom-[46%] right-[50px] 2xl:bottom-[46%] 2xl:right-[80px] flex group">
                            <img
                                class="animate-bounce group-hover:animate-none"
                                src="{{ asset('/assets/homeowner/MapPin.svg') }}"
                                alt="MapPin"  width="32" height="48"/>
                            <span
                                class="bg-gradient-to-r from-[#EEBB0C] to-[#EF6818] px-6 py-3 rounded-full font-primary text-primary-black font-medium scale-x-0 origin-left transition-all duration-300 group-hover:scale-x-100">North Carolina</span>
                        </li>
                        <li
                            class="absolute bottom-[36%] right-[190px] 2xl:bottom-[36%] 2xl:right-[220px] flex group">
                            <img
                                class="animate-bounce group-hover:animate-none"
                                src="{{ asset('/assets/homeowner/MapPin.svg') }}"
                                alt="MapPin"  width="32" height="48"/>
                            <span
                                class="bg-gradient-to-r from-[#EEBB0C] to-[#EF6818] px-6 py-3 rounded-full font-primary text-primary-black font-medium scale-x-0 origin-left transition-all duration-300 group-hover:scale-x-100">Georgia</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-24 lg:py-32 bg-primary-white">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col items-center gap-10">
            <div class="flex flex-col items-center gap-4">
                <h2
                    class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-black font-medium text-center lg:max-w-[80%] xl:max-w-[60%]">
                    {{ $homeOwnerPageContent['homeowner_ready_to_see_title']['value'] ?? '' }}
                </h2>
                <p
                    class="font-secondary text-primary-black text-center lg:max-w-[80%] xl:max-w-[60%]">
                    {{ $homeOwnerPageContent['homeowner_ready_to_see_content']['value'] ?? '' }}
                </p>
            </div>

            <div class="flex justify-center">
                <button
                    onclick="window.location.href='/book-consultation'"
                    class="bg-primary-yellow border border-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium flex items-center gap-2 w-full md:w-auto  transition-all duration-300 group hover:bg-transparent hover:border-primary-black hover:text-primary-black">
                    <span>Get A Free Consultation</span>
                    <img src="{{ asset('/assets/ArrowLeft.svg') }}" alt="best battery for solar power storage" class="lazyload transition-all duration-300 group-hover:translate-x-2" width="24px" height="24px" />
                </button>
            </div>
        </div>
    </div>
</section>

<!-- forth section -->
@include('layout.newsletter')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get all open modal buttons
        const openModalBtns = document.querySelectorAll(".open-modal-btn");

        // Get all close modal buttons
        const closeModalBtns = document.querySelectorAll(".close-modal-btn");

        // Get all modals
        const modals = document.querySelectorAll(".modal");

        // Function to open modal
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.remove("hidden");
                modal.classList.add("active");
            }
        }

        // Function to close modal
        function closeModal(modal) {
            modal.classList.add("hidden");
            modal.classList.remove("active");
        }

        // Add click event listeners to open buttons
        openModalBtns.forEach((btn) => {
            btn.addEventListener("click", function() {
                const modalId = this.getAttribute("data-modal-id");
                openModal(modalId);
            });
        });

        // Add click event listeners to close buttons
        closeModalBtns.forEach((btn) => {
            btn.addEventListener("click", function() {
                const modal = this.closest(".modal");
                // Get the video element
                var video = document.getElementById('cloud-app-video');
                // Pause the video
                video.pause();
                // Optional: Reset video to the start
                video.currentTime = 0;
                closeModal(modal);
            });
        });

        // Close modal when clicking outside
        window.addEventListener("click", function(event) {
            modals.forEach((modal) => {
                if (event.target === modal) {
                    closeModal(modal);
                }
            });
        });
    });
</script>
<script>
    var xpowerDivs = 1;

    function addXPower() {
        const xpowerContainer = document.getElementById("xpower-container");
        xpowerDivs = xpowerContainer.querySelectorAll("#xpower");

        // Allow adding only if there are less than 3 clones
        if (xpowerDivs.length < 4) {
            // Clone the xpower div
            const xpowerDiv = document.getElementById("xpower");
            const newXPower = xpowerDiv.cloneNode(true);

            // Add the remove button only if it doesn't already exist
            if (!newXPower.querySelector(".remove-xpower")) {
                // Create a remove button
                const removeButton = document.createElement("button");
                removeButton.className = "remove-xpower absolute top-0 right-5";
                removeButton.onclick = function() {
                    removeXPower(this);
                };

                // Add the remove button image
                const removeImg = document.createElement("img");
                removeImg.src = "/assets/homeowner/xpower_closeBtn.svg";
                removeImg.alt = "";

                removeButton.appendChild(removeImg);

                // Append the remove button to the cloned div
                newXPower.appendChild(removeButton);
            }

            // Append the cloned xpower div to the xpower-container
            xpowerContainer.appendChild(newXPower);

            //active yellow icons
            xpowerDivs = xpowerContainer.querySelectorAll("#xpower");
            $('.section-' + xpowerDivs.length + '-yellow').removeClass('hidden');
            $('.section-' + xpowerDivs.length + '-gray').addClass('hidden');
            if (xpowerDivs.length == 4) {
                $('#xpower-add-button').addClass('hidden');
            }

        } else {
            // alert("You can only add up to 3 XPower items.");
        }
    }

    function removeXPower(button) {
        // Remove the parent xpower div
        const xpowerContainer = document.getElementById("xpower-container");
        xpowerDivs = xpowerContainer.querySelectorAll("#xpower");
        button.parentElement.remove();
        $('#xpower-add-button').removeClass('hidden');
        $('.section-' + xpowerDivs.length + '-yellow').addClass('hidden');
        $('.section-' + xpowerDivs.length + '-gray').removeClass('hidden');
    }
</script>
@endsection
