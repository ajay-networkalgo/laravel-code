@extends('layout.frontend')
@section('page-content')
<section
    class="relative h-screen overflow-x-hidden">
    <video
        autoplay
        muted
        loop
        id="banner-video"
        poster=""
        class="h-full w-full object-cover">
        <source id="banner-video-src" data-src-desktop="{{ asset('/assets/videos/compressed/' . $installerPageContent['installer_banner_video']['value'] ?? '') }}" data-src-mobile="{{ asset('/assets/videos/compressed/' . $installerPageContent['installer_mobile_banner_video']['value'] ?? '') }}" type="video/mp4" />
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
                        {{ $installerPageContent['installer_banner_video_title']['value'] ?? '' }}
                    </h1>
                    <p
                        class="hidden lg:block font-secondary font-medium text-lg lg:text-xl text-primary-white">
                        {{ $installerPageContent['installer_banner_video_sub_title']['value'] ?? '' }}
                    </p>
                </div>

                <div
                    class="hero-content-btm flex flex-col lg:flex-row items-center justify-center gap-4 max-w-[80%] md:max-w-none">
                    <button onclick="document.getElementById('ms_frame_container').scrollIntoView({ behavior: 'smooth' });"
                        class="bg-primary-yellow border border-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium flex items-center gap-2 w-full md:w-auto text-sm lg:text-base transition-all duration-300 group hover:bg-transparent hover:border-primary-white hover:text-primary-white">
                        <span>Watch Video</span>
                    </button>

                    <button onclick="window.location.href='/book-appointment#book-appointment'"
                        class="px-6 py-3 rounded-full font-primary text-primary-white font-medium border border-primary-white w-full md:w-auto text-sm lg:text-base transition-all duration-300 hover:bg-primary-yellow hover:text-primary-black hover:border-primary-yellow">
                        Learn More
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- second section -->
<section class="bg-primary-white py-24 flex flex-col gap-10" id="installer-iframe">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col items-center gap-2">
            <span
                class="font-primary text-lg text-primary-orange font-medium uppercase text-center">{{ $installerPageContent['installer_learn_more_title']['value'] ?? '' }}</span>
            <h2
                class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-black font-medium text-center">
                {{ $installerPageContent['installer_learn_more_sub_title']['value'] ?? '' }}
            </h2>
        </div>
    </div>
    <div class="mt-6">
        <!-- Mindtree code starts -->
        <div id='ms_frame_container' class="landscape">
            <iframe
                id='ms_frame'
                loading='lazy'
                src='https://embed.mindstamp.com/e/dxGGFcfHQKXx?autoplay=1&t=48'
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
        <!-- Mindtree code ends -->
    </div>
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div>
            <p
                class="font-secondary font-medium text-primary-black lg:max-w-[80%]">
                {{ $installerPageContent['installer_learn_more_content']['value'] ?? '' }}
            </p>
        </div>
    </div>
</section>

<!-- third section -->
<section class="relative">
    <div class="flex flex-col lg:flex-row">
        <div class="">
            <img
                class="lg:sticky top-0"
                src="{{ asset('assets/installer/installer-3.webp') }}"
                alt="installer-3"  width="750" height="1079"/>
        </div>

        <div
            class="lg:w-[55%] lg:ml-auto flex flex-col gap-10 px-8 lg:pl-10 lg:pr-0 py-24">
            <div class="flex flex-col gap-2">
                <span
                    class="font-primary text-lg text-primary-orange font-medium uppercase">{{ $installerPageContent['installer_benefits_title']['value'] ?? '' }}</span>
                <h2
                    class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-white font-medium">
                    Benefits of <br />{{ $installerPageContent['installer_benefits_sub_title']['value'] ?? '' }}
                </h2>
            </div>

            <!--<ul class="lg:max-w-[80%] xl:max-w-[60%]">
                <li class="flex flex-col gap-4 pb-8 border-b border-[#C8C8C8]">
                    <div>
                        <img src="{{ asset('assets/installer/fi_3174745.svg') }}" alt="icon_1" width="35" height="35" />
                    </div>
                    <div class="flex flex-col gap-4">
                        <h3
                            class="font-secondary text-lg text-primary-white font-bold">
                            Leads Provided to Our Installer Partners
                        </h3>
                        <p class="font-secondary text-base text-primary-white">
                            Maximize your energy production and storage capacity,
                            ensuring your home remains powered even during high-demand
                            periods.
                        </p>
                    </div>
                </li>

                <li class="flex flex-col gap-4 py-8 border-b border-[#C8C8C8]">
                    <div>
                        <img src="{{ asset('assets/installer/fi_7848502.svg') }}" alt="icon_2" width="35" height="35" />
                    </div>
                    <div class="flex flex-col gap-4">
                        <h3
                            class="font-secondary text-lg text-primary-white font-bold">
                            Easy Installation, Even with Existing Systems
                        </h3>
                        <p class="font-secondary text-base text-primary-white">
                            Our solutions are designed for seamless integration,
                            reducing installation time.
                        </p>
                    </div>
                </li>

                <li class="flex flex-col gap-4 py-8 border-b border-[#C8C8C8]">
                    <div>
                        <img src="{{ asset('assets/installer/fi_4460756.svg') }}" alt="icon_3" width="35" height="35" />
                    </div>
                    <div class="flex flex-col gap-4">
                        <h3
                            class="font-secondary text-lg text-primary-white font-bold">
                            Customer Support During and After Installation
                        </h3>
                        <p class="font-secondary text-base text-primary-white">
                            Benefit from our dedicated support team, available
                            throughout the installation process and beyond.
                        </p>
                    </div>
                </li>

                <li class="flex flex-col gap-4 py-8 border-b border-[#C8C8C8]">
                    <div>
                        <img src="{{ asset('assets/installer/fi_9485711.svg') }}" alt="icon_4" width="35" height="35"/>
                    </div>
                    <div class="flex flex-col gap-4">
                        <h3
                            class="font-secondary text-lg text-primary-white font-bold">
                            Fast Battery Commissioning
                        </h3>
                        <p class="font-secondary text-base text-primary-white">
                            Quickly get systems up and running, minimizing downtime.
                        </p>
                    </div>
                </li>

                <li class="flex flex-col gap-4 py-8 border-b border-[#C8C8C8]">
                    <div>
                        <img src="{{ asset('assets/installer/fi_16231352.svg') }}" alt="icon_5" width="35" height="35" />
                    </div>
                    <div class="flex flex-col gap-4">
                        <h3
                            class="font-secondary text-lg text-primary-white font-bold">
                            Gamification Programs for Sales and Installers
                        </h3>
                        <p class="font-secondary text-base text-primary-white">
                            Gamification Programs for Sales and Installers
                        </p>
                    </div>
                </li>

                <li class="flex flex-col gap-4 py-8">
                    <div>
                        <img src="{{ asset('assets/installer/fi_10539350.svg') }}" alt="icon_6" width="35" height="35"/>
                    </div>
                    <div class="flex flex-col gap-4">
                        <h3
                            class="font-secondary text-lg text-primary-white font-bold">
                            Free Access to Our CRM System
                        </h3>
                        <p class="font-secondary text-base text-primary-white">
                            Manage leads and customer interactions more efficiently with
                            our free CRM system.
                        </p>
                    </div>
                </li>
            </ul>-->
            {!! $installerPageContent['installer_benefits_description']['value'] ?? '' !!}
        </div>
    </div>
</section>

<!-- forth section -->
<section
    class="py-24 bg-[url('./../assets/installer/installer-4.webp')] bg-cover bg-no-repeat">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div
            class="bg-[#151515] opacity-80 mix-blend-luminosity py-10 px-8 lg:py-20 lg:px-16 lg:w-4/5 xl:w-1/2">
            <!--<ul class="grid lg:grid-cols-2 gap-y-14 gap-x-20">
                <li class="flex items-center gap-6">
                    <div>
                        <img
                            src="{{ asset('assets/installer/fi_10267315(1).svg') }}"
                            alt="fi_10267315(1)" width="24" height="24" />
                    </div>
                    <span class="font-secondary text-primary-white">Long Life & Safe LFP Battery</span>
                </li>
                <li class="flex items-center gap-6">
                    <div>
                        <img
                            src="{{ asset('assets/installer/fi_709711(1).svg') }}"
                            alt="fi_709711(1)"   width="21" height="21"/>
                    </div>
                    <span class="font-secondary text-primary-white">Simple Control and Monitoring via Mobile App</span>
                </li>
                <li class="flex items-center gap-6">
                    <div>
                        <img
                            src="{{ asset('assets/installer/fi_8860853(1).svg') }}"
                            alt="fi_709711(1)"  width="21" height="21"/>
                    </div>
                    <span class="font-secondary text-primary-white">Stackable Batteries to 20 KWH & Up to 4 in parallel total 80KWH</span>
                </li>
                <li class="flex items-center gap-6">
                    <div>
                        <img
                            src="{{ asset('assets/installer/fi_3103584(1).svg') }}"
                            alt="fi_709711(1)" width="24" height="25"/>
                    </div>
                    <span class="font-secondary text-primary-white">Effective Load Shedding</span>
                </li>

                <li class="flex items-center gap-6">
                    <div>
                        <img
                            src="{{ asset('assets/installer/fi_9321681(1).svg') }}"
                            alt="fi_10267315(1)" width="24" height="25"/>
                    </div>
                    <span class="font-secondary text-primary-white">Whole Home Backup</span>
                </li>
                <li class="flex items-center gap-6">
                    <div>
                        <img
                            src="{{ asset('assets/installer/fi_6015532(1).svg') }}"
                            alt="fi_709711(1)" width="24" height="25"/>
                    </div>
                    <span class="font-secondary text-primary-white">Floor or Wall Mounted</span>
                </li>
                <li class="flex items-center gap-6">
                    <div>
                        <img
                            src="{{ asset('assets/installer/fi_1706192(1).svg') }}"
                            alt="fi_709711(1)" width="24" height="25"/>
                    </div>
                    <span class="font-secondary text-primary-white">Built-in Energy Management Meter/Cr</span>
                </li>
                <li class="flex items-center gap-6">
                    <div>
                        <img
                            src="{{ asset('assets/installer/smart-lighting.svg') }}"
                            alt="fi_709711(1)" width="24" height="25"/>
                    </div>
                    <span class="font-secondary text-primary-white">Module Design & Easy Installation</span>
                </li>
                <li class="flex items-center gap-6">
                    <div>
                        <img
                            src="{{ asset('assets/installer/fi_11498251(1).svg') }}"
                            alt="fi_709711(1)" width="24" height="25"/>
                    </div>
                    <span class="font-secondary text-primary-white">Smart Management ofPower Sources</span>
                </li>
                <li class="flex items-center gap-6">
                    <div>
                        <img
                            src="{{ asset('assets/installer/smart-lighting.svg') }}"
                            alt="fi_709711(1)" width="24" height="25"/>
                    </div>
                    <span class="font-secondary text-primary-white">Plug and Play</span>
                </li>
            </ul>-->
            {!! $installerPageContent['installer_batteries_features_description']['value'] ?? '' !!}
        </div>
    </div>
</section>

<!-- fifth section -->
<section class="bg-primary-white py-24">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-16">
            <div class="flex flex-col items-center gap-2">
                <span
                    class="font-primary text-lg text-primary-orange font-medium uppercase text-center">Case studies</span>
                <h2
                    class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-black font-medium text-center">
                    Our Success Stories
                </h2>
            </div>

            <div class="bg-primary-black p-8 lg:p-16 flex flex-col gap-10">
                <div class="tabs grid lg:grid-cols-3">
                    <button data-tab="1" class="tab-link py-5 border-b border-[#C8C8C8] font-secondary text-xl text-primary-white successStories" id="inverter">PV Inverter</button>
                    <button data-tab="2" class="tab-link py-5 border-b border-[#C8C8C8] font-secondary text-xl text-primary-white successStories" id="storage_system">Energy Storage Systemss</button>
                    <button data-tab="3" class="tab-link py-5 border-b border-[#C8C8C8] font-secondary text-xl text-primary-white successStories" id="charger">EV Chargerss</button>
                </div>

                <div class="tab-contents">
                    <!-- pv inverter content -->
                    <div id="pv-inverter" class="tab-content active"></div>
                </div>

                <div class="flex justify-center">
                    <button onclick="window.location.href='/case'" class="px-6 py-3 rounded-full font-primary text-primary-white font-medium border border-primary-white w-full md:w-auto  transition-all duration-300 hover:bg-primary-yellow hover:text-primary-black hover:border-primary-yellow" id="redirectButton">
                        View More
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- sixth section -->
<section
    class="py-24 lg:py-44  bg-cover bg-no-repeat relative" style="background-image: url('{{ asset('/assets/installer/' . $installerPageContent['installer_become_a_certified_image']['value'] ?? '') }}')">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col items-center md:items-start gap-10">
            <div class="flex flex-col gap-8 lg:max-w-[60%]">
                <h2
                    class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-white font-medium">
                    {{ $installerPageContent['installer_become_a_certified_title']['value'] ?? '' }}
                </h2>
                <div>
                    <button
                        onclick="window.location.href='/book-consultation'"
                        class="bg-primary-yellow border border-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium flex items-center justify-center gap-2 w-full md:w-auto transition-all duration-300 group hover:bg-transparent hover:border-primary-white hover:text-primary-white">
                        <span>Schedule a Consultation</span>
                        <img
                            class="hidden lg:inline-block transition-all duration-300 group-hover:invert group-hover:translate-x-2"
                            src="{{ asset('assets/ArrowLeft.svg') }}"
                            alt="best battery for solar power storage"  width="24px" height="24px"/>
                    </button>

                    <!-- <button
                  class="bg-primary-yellow border border-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium flex items-center justify-center gap-2 w-full md:w-auto"
                >
                  <span>Schedule a Consultation</span>
                  <img
                    class="hidden lg:inline-block"
                    src="./assets/ArrowLeft.svg"
                    alt="arrowLeft"
                  />
                </button> -->
                </div>
            </div>

            <div class="hidden lg:block lg:absolute bottom-10 right-10">
                <img src="{{ asset('assets/homepage_4.svg') }}" alt="battery energy storage system" width="75" height="77" />
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function() {
        var siteUrl = "{{ config('app.site_url') }}";
        loadContentSuccess('inverter', '1');
        $(".successStories").on("click", function() {
            var tab = $(this).attr('data-tab');
            var id = $(this).attr('id');
            loadContentSuccess(id, tab);
        });
        $("#redirectButton").on("click", function() {
            window.location.href = siteUrl + 'case';
        });

        function loadContentSuccess(add, tab) {
            var posturl = siteUrl + "installer/case";
            $.ajax({
                url: posturl,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    type: tab
                },
                success: function(data) {
                    $('.successStories').removeClass('text-primary-yellow border-primary-yellow');
                    $('#' + add).addClass('text-primary-yellow border-primary-yellow');
                    $('#pv-inverter').html(data);

                },
                error: function(response) {
                    loader.classList.add('hidden');
                    successStoryModalBody.classList.remove('hidden');
                    console.log('Success stories not loaded');
                }
            });
        }
    });
</script>
@endsection
