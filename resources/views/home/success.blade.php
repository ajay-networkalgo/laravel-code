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

<section class="relative h-screen overflow-x-hidden">
    <video
        autoplay
        muted
        loop
        id="banner-video"
        poster=""
        class="h-full w-full object-cover">
        <source id="banner-video-src" data-src-desktop="{{ asset('/assets/videos/compressed/' . $successstoriespagecontent['success_stories_banner_video']['value'] ?? '') }}" data-src-mobile="{{ asset('/assets/videos/compressed/' . $successstoriespagecontent['success_stories_mobile_banner_video']['value'] ?? '') }}" type="video/mp4" />
        Your browser does not support the video tag.
    </video>
    <div class="content absolute bg-[#15151580] w-full h-full top-0 left-0">
        <div class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
            <div class="hero-content h-screen flex flex-col justify-end lg:justify-center items-center gap-6 pb-24 lg:pb-0">
                <div class="hero-content-top flex flex-col items-center gap-4">
                    <span class="font-primary text-lg text-primary-yellow font-medium uppercase">{{ $successstoriespagecontent['success_stories_banner_video_title']['value'] ?? '' }}</span>
                    <h1 class="font-primary font-medium text-primary-white text-[32px] leading-[40px] sm:text-[40px] sm:leading-[46px] lg:text-[72px] lg:leading-[80px] xl:text-[80px] xl:leading-[88px] text-center drop-shadow-2xl">{{ $successstoriespagecontent['success_stories_banner_video_sub_title']['value'] ?? '' }}</h1>
                </div>
                <div class="hero-content-btm flex flex-col lg:flex-row items-center justify-center gap-4 max-w-[80%] md:max-w-none">
                    <button data-modal-id="videoModal" class="open-modal-btn bg-primary-yellow border border-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium flex items-center gap-2 w-full md:w-auto text-sm lg:text-base transition-all duration-300 group hover:bg-transparent hover:border-primary-white hover:text-primary-white">
                        <span>Watch Video</span>
                    </button>
                    <div
                        id="videoModal"
                        class="modal hidden fixed inset-0 bg-primary-black bg-opacity-75 overflow-y-auto h-full w-full flex justify-center items-center backdrop-blur-lg z-[999]">
                        <div class="w-[90%] lg:w-[70%] relative">
                            <video
                                controls
                                autoplay
                                muted
                                loop
                                id="bg-video"
                                poster=""
                                class="h-full w-full xl:h-auto object-cover lazyload">
                                <source
                                    data-src="{{ asset('/assets/videos/success-stories-case.mp4') }}"
                                    type="video/mp4" />
                                Your browser does not support the video tag.
                            </video>

                            <div
                                class="w-full h-[50%] bg-gradient-to-b from-[#151515] to-[#15151500] absolute top-0 left-0 lg:px-6 lg:py-8 flex justify-end">

                                <button class="close-modal-btn flex">
                                    <img class="lazyload" data-src="{{ asset('/assets/homeowner/XCircle.svg') }}" alt="home battery power storage" />
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-10 lg:py-24 bg-primary-white">
    <div class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex lg:flex-row flex-col gap-6">
            <div class="grow flex flex-col">
                <button data-tab="1" class="tab-link px-4 py-6 bg-[#C8C8C83D] border-b border-[#C8C8C8] w-full text-center lg:text-left font-secondary text-lg text-primary-black transition-all duration-500 bg-primary-black text-primary-yellow successStories" id="inverter">
                    PV Inverter
                </button>
                <button data-tab="2" class="tab-link px-4 py-6 bg-[#C8C8C83D] border-b border-[#C8C8C8] w-full  text-center lg:text-left font-secondary text-lg text-primary-black transition-all duration-500 successStories" id="storage_system">
                    Energy Storage System
                </button>
                <button data-tab="3" class="tab-link px-4 py-6 bg-[#C8C8C83D] w-full text-left font-secondary  text-center lg:text-left text-primary-black transition-all duration-500 successStories" id="charger">
                    EV Charger
                </button>
            </div>
            <div class="relative lg:w-[75%]" id="loadContent"></div>
            <div id="loader" class="relative hidden text-center py-4 lg:w-[75%]">
                <svg class="animate-spin h-8 w-8 text-primary-yellow mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                </svg>
            </div>
            @include('modal.success-story-modal')
        </div>
    </div>
</section>

<!-- third section -->
<!-- <section class="py-24">
    <div class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-16">
            <div class="flex flex-col gap-2">
                <span class="font-primary text-lg text-primary-orange font-medium text-center uppercase">Testimonials</span>
                <h2 class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-white font-medium text-center">
                    What our Customer says
                </h2>
            </div>

            <ul class="grid lg:grid-cols-3 gap-6">
                <li class="border border-[#C8C8C83D]">
                    <div class="bg-[url('./../assets/successStories/customer_1.png')] bg-cover bg-no-repeat h-[260px]">
                        <div class="h-full w-full bg-gradient-to-b from-[#15151500] to-[#151515] px-[14px] pb-4 flex flex-col justify-end">
                            <div class="flex justify-between items-center">
                                <div class="flex flex-col">
                                    <span class="font-primary font-medium text-white">Brad Cumbers</span>
                                    <span class="font-secondary text-primary-white text-sm">Co-founder &amp; CEO Martialytics</span>
                                </div>
                                <div>
                                    <img class="lazyload" data-src="{{ asset('/assets/successStories/playIcon.svg') }}" alt="playIcon">
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="border border-[#C8C8C83D]">
                    <div class="bg-[url('./../assets/successStories/customer_2.png')] bg-cover bg-no-repeat h-[260px]">
                        <div class="h-full w-full bg-gradient-to-b from-[#15151500] to-[#151515] px-[14px] pb-4 flex flex-col justify-end">
                            <div class="flex justify-between items-center">
                                <div class="flex flex-col">
                                    <span class="font-primary font-medium text-white">Jude Cornish</span>
                                    <span class="font-secondary text-primary-white text-sm">Homeowner</span>
                                </div>
                                <div>
                                    <img class="lazyload" data-src="{{ asset('/assets/successStories/playIcon.svg') }}" alt="playIcon">
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="border border-[#C8C8C83D]">
                    <div class="bg-[url('./../assets/successStories/customer_3.png')] bg-cover bg-no-repeat h-[260px]">
                        <div class="h-full w-full bg-gradient-to-b from-[#15151500] to-[#151515] px-[14px] pb-4 flex flex-col justify-end">
                            <div class="flex justify-between items-center">
                                <div class="flex flex-col">
                                    <span class="font-primary font-medium text-white">Justin Veenema</span>
                                    <span class="font-secondary text-primary-white text-sm">Homeowner</span>
                                </div>
                                <div>
                                    <img class="lazyload" data-src="{{ asset('/assets/successStories/playIcon.svg') }}" alt="playIcon">
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section> -->

<!-- testimonial section -->
<section class="py-24">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-16">
            <div class="flex flex-col gap-2">
                <span
                    class="font-primary text-lg text-primary-orange font-medium text-center uppercase">{{ $successstoriespagecontent['success_stories_testimonial_title']['value'] ?? '' }}</span>
                <h2
                    class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-white font-medium text-center">
                    {{ $successstoriespagecontent['success_stories_testimonial_sub_title']['value'] ?? '' }}
                </h2>
            </div>

            <ul class="grid md:grid-cols-2 lg:grid-cols-2 gap-6">
                <li
                    class="border border-[#C8C8C83D] py-6 px-4 flex flex-col gap-6">
                    <div>
                        <p class="font-secondary text-primary-white">{!! $successstoriespagecontent['success_stories_testimonial_one_content']['value'] ?? '' !!}</p>
                    </div>

                    <div class="flex gap-4 items-center">
                        <div class="w-[60px] h-[60px] rounded-full overflow-hidden  border border-[#C8C8C83D]">
                            <img
                                class="lazyload"
                                data-src="{{ asset('/assets/' . $successstoriespagecontent['success_stories_testimonial_one_client_profile']['value'] ?? '') }}"
                                alt="backup power for home"  width="58" height="58"/>
                        </div>

                        <div>
                            <h5
                                class="font-primary text-[18px] leading-[26px] text-primary-white">
                                {{ $successstoriespagecontent['success_stories_testimonial_one_client_name']['value'] ?? '' }}
                            </h5>
                            <p class="font-secondary text-primary-white">
                                &nbsp;
                            </p>
                        </div>
                    </div>
                </li>

                <li
                    class="border border-[#C8C8C83D] py-6 px-4 flex flex-col gap-6">
                    <div>
                        <p class="font-secondary text-primary-white">
                        {!! $successstoriespagecontent['success_stories_testimonial_two_content']['value'] ?? '' !!}
                        </p>
                    </div>

                    <div class="flex gap-4 items-center">
                        <div class="w-[60px] h-[60px] rounded-full overflow-hidden border border-[#C8C8C83D]">
                            <img
                                class="lazyload"
                                src="{{ asset('/assets/' . $successstoriespagecontent['success_stories_testimonial_two_client_profile']['value'] ?? '') }}"
                                alt="backup power for home" width="58" height="58"/>
                        </div>

                        <div>
                            <h5
                                class="font-primary text-[18px] leading-[26px] text-primary-white">
                                {{ $successstoriespagecontent['success_stories_testimonial_two_client_name']['value'] ?? '' }}
                            </h5>
                            <p class="font-secondary text-primary-white">
                                &nbsp;
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>

@include('layout.newsletter')
<script type="text/javascript">
    $(document).ready(function() {
        var siteUrl = "{{ config('app.site_url') }}";
        loadContentSuccess('inverter', '1');
        $(".successStories").on("click", function() {
            var tab = $(this).attr('data-tab');
            var id = $(this).attr('id');
            loadContentSuccess(id, tab);
        });

        function loadContentSuccess(add, tab) {
            let loader = document.getElementById('loader');
            let successStoryModalBody = document.getElementById('loadContent');
            loader.classList.remove('hidden');
            successStoryModalBody.classList.add('hidden');
            var posturl = siteUrl + "succes-stories/case";
            $.ajax({
                url: posturl,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    type: tab
                },
                success: function(data) {
                    loader.classList.add('hidden');
                    successStoryModalBody.classList.remove('hidden');
                    $('#loadContent').html(data);
                    $('.successStories').removeClass('bg-primary-black text-primary-yellow');
                    $('#' + add).addClass('bg-primary-black text-primary-yellow');
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
@endsection
