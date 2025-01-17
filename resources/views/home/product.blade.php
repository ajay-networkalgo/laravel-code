@extends('layout.frontend')
@section('page-content')
<section class="relative h-screen overflow-x-hidden">
    <video
        autoplay
        muted
        loop
        id="banner-video"
        poster=""
        class="h-full w-full object-cover">
        <!-- <source id="banner-video-src" data-src-desktop="{{ asset('/assets/videos/compressed/product-desktop-video.mp4') }}" data-src-mobile="{{ asset('/assets/videos/compressed/product-mobile-video.mp4') }}" type="video/mp4" /> -->
        <source id="banner-video-src" data-src-desktop="{{ asset('/assets/videos/compressed/' . $productpagecontent['product_banner_video']['value'] ?? '') }}" data-src-mobile="{{ asset('/assets/videos/compressed/' . $productpagecontent['product_mobile_banner_video']['value'] ?? '') }}" type="video/mp4" />
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
                        {{ $productpagecontent['product_banner_video_title']['value'] ?? '' }}
                    </h1>
                    <p
                        class="lg:block font-secondary font-medium text-lg lg:text-xl text-primary-white text-center lg:max-w-[60%]">
                        {{ $productpagecontent['product_banner_video_sub_title']['value'] ?? '' }}
                    </p>
                </div>

                <div
                    class="hero-content-btm flex flex-col md:flex-row items-center justify-center gap-4 w-[80%] md:max-w-none">

                    <button
                        onclick="document.getElementById('products-list').scrollIntoView({ behavior: 'smooth' });"
                        class="px-6 py-3 rounded-full font-primary text-primary-white font-medium border border-primary-white w-full md:w-auto text-sm lg:text-base transition-all duration-300 hover:bg-primary-yellow hover:text-primary-black hover:border-primary-yellow">
                        Learn More
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- second section -->
<section class="bg-primary-white py-24">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-16">
            <div class="flex flex-col items-center gap-2">
                <span
                    class="font-primary text-lg text-primary-orange font-medium uppercase text-center">{{ $productpagecontent['product_section_title']['value'] ?? '' }}</span>
                <h2
                    class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-black font-medium text-center lg:max-w-[55%]">
                    {{ $productpagecontent['product_section_sub_title']['value'] ?? '' }}
                </h2>
            </div>

            <div class="grid lg:grid-cols-2 gap-4" id="products-list">


                <div
                    class="bg-primary-black flex flex-col lg:flex-row items-center gap-8 lg:gap-16 lg:col-span-2">
                    <div class="relative">
                        <div class="flex items-center justify-center">
                            <img src="{{ asset('assets/product/Vector_1.svg') }}" alt="energy storage for home"  width="598" height="400"/>
                            <img
                                class="absolute top-0 lg:top-5"
                                src="{{ asset('/assets/product/' . $productpagecontent['product_one_image']['value'] ?? '') }}"
                                alt="home energy storage battery"  width="481" height="391"/>
                        </div>
                    </div>
                    <div class="grow flex flex-col gap-4 p-8 lg:p-0">
                        <h3
                            class="font-primary font-medium text-primary-white text-4xl">
                            {{ $productpagecontent['product_one_title']['value'] ?? '' }}
                        </h3>
                        <p class="font-secondary text-lg text-primary-white max-w-none">
                        {!! $productpagecontent['product_one_content']['value'] ?? '' !!}
                        </p>
                        <div>
                            <button
                                onclick="window.location.href='{!! $productpagecontent['product_one_slug']['value'] ?? '' !!}'"
                                class="open-modal-btn font-primary text-primary-yellow"
                                data-modal-id="modal1">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bg-primary-black flex flex-col gap-8 lg:gap-16">
                    <div class="flex justify-end">
                        <div
                            class="flex flex-col gap-4 px-8 pt-16 lg:pb-0 lg:pt-[60px] lg:pl-0 max-w-none lg:max-w-[70%]">
                            <h3
                                class="font-primary font-medium text-primary-white text-4xl">
                                {{ $productpagecontent['product_two_title']['value'] ?? '' }}
                            </h3>
                            <p class="font-secondary text-lg text-primary-white">
                            {!! $productpagecontent['product_two_content']['value'] ?? '' !!}
                            </p>
                            <div>
                                <button
                                    onclick="window.location.href='{!! $productpagecontent['product_two_slug']['value'] ?? '' !!}'"
                                    class="open-modal-btn font-primary text-primary-yellow"
                                    data-modal-id="modal2">
                                    View Details
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="flex">
                            <img src="{{ asset('assets/product/Vector_2.svg') }}" alt="battery energy storage system" width="573" height="429" />
                            <img
                                class="absolute h-full left-10 top-5 lg:left-0"
                                src="{{ asset('/assets/product/' . $productpagecontent['product_two_image']['value'] ?? '') }}"
                                alt="solar energy storage solutions" width="330" height="429" />
                        </div>
                    </div>
                </div>
                <div class="bg-primary-black flex flex-col">
                    <div class="relative">
                        <div class="flex justify-end">
                            <img src="{{ asset('assets/product/Vector_3.svg') }}" alt="energy storage for home" width="471" height="444" />
                            <img
                                class="absolute top-5"
                                src="{{ asset('/assets/product/' . $productpagecontent['product_three_image']['value'] ?? '') }}"
                                alt="home energy storage battery"  width="410" height="292"/>
                        </div>
                    </div>
                    <div
                        class="grow flex flex-col gap-4 p-8 lg:pb-0 lg:pl-[60px] max-w-none lg:max-w-[70%]">
                        <h3
                            class="font-primary font-medium text-primary-white text-4xl">
                            {{ $productpagecontent['product_three_title']['value'] ?? '' }}
                        </h3>
                        <p class="font-secondary text-lg text-primary-white">
                        {!! $productpagecontent['product_three_content']['value'] ?? '' !!}
                        </p>
                        <div>
                            <button
                                onclick="window.location.href='{!! $productpagecontent['product_three_slug']['value'] ?? '' !!}'"
                                class="open-modal-btn font-primary text-primary-yellow"
                                data-modal-id="modal3">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bg-primary-black flex flex-col lg:flex-row items-center gap-8 lg:gap-16 lg:col-span-2">
                    <div class="grow flex flex-col gap-4 p-8 lg:p-0 lg:pl-[20%]">
                        <h3
                            class="font-primary font-medium text-primary-white text-4xl">
                            {{ $productpagecontent['product_four_title']['value'] ?? '' }}
                        </h3>
                        <p class="font-secondary text-lg text-primary-white max-w-none">
                        {!! $productpagecontent['product_four_content']['value'] ?? '' !!}
                        </p>
                        <div>
                            <button
                                onclick="window.location.href='{!! $productpagecontent['product_four_slug']['value'] ?? '' !!}'"
                                class="open-modal-btn font-primary text-primary-yellow"
                                data-modal-id="modal1">
                                View Details
                            </button>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="flex items-center justify-center">
                            <img class="transform scale-x-[-1]" src="{{ asset('assets/product/Vector_1.svg') }}" alt="energy storage for home" width="598" height="400" />
                            <img
                                class="absolute top-0 lg:top-5 ml-20"
                                src="{{ asset('/assets/product/' . $productpagecontent['product_four_image']['value'] ?? '') }}"
                                alt="Microinverter"  width="518" height="379" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- third section -->
<section class="py-24">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-16">
            <div class="flex flex-col items-center gap-2">
                <span
                    class="font-primary text-lg text-primary-orange font-medium uppercase text-center">{{ $productpagecontent['product_feature_title']['value'] ?? '' }}</span>
                <h2
                    class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-white font-medium text-center lg:max-w-[55%]">
                    {{ $productpagecontent['product_feature_sub_title']['value'] ?? '' }}
                </h2>
            </div>

            <div class="flex flex-col gap-5">
                <div class="grid lg:grid-cols-2 gap-5">
                    <div
                        class="relative h-[320px] lg:h-auto lg:row-span-2 bg-cover bg-no-repeat bg-right" style="background-image: url('{{ asset('/assets/product/' . $productpagecontent['product_feature_image']['value'] ?? '') }}')">
                        <img
                            class="absolute top-8 left-8"
                            src="{{ asset('assets/homepage_4.svg') }}"
                            alt="battery energy storage system"
                            width="42"
                            height="42" />
                    </div>

                    <div class="relative border border-[#C8C8C83D]">
                        <img
                            class="w-full"
                            src="{{ asset('/assets/product/' . $productpagecontent['feature_one_image']['value'] ?? '') }}"
                            alt="solar energy storage solutions" width="411" height="432"/>
                        <div
                            class="bg-gradient-to-b from-[#15151500] to-[#151515] absolute top-0 left-0 w-full h-full p-5 flex items-end">
                            <div>
                                <h3 class="font-primary text-2xl text-primary-white">
                                {{ $productpagecontent['feature_one_title']['value'] ?? '' }}
                                </h3>
                                <p class="font-secondary text-sm text-primary-white lg:h-auto h-10 overflow-hidden">
                                {!! $productpagecontent['feature_one_content']['value'] ?? '' !!}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="relative border border-[#C8C8C83D]">
                        <img
                            class="w-full"
                            src="{{ asset('/assets/product/' . $productpagecontent['feature_two_image']['value'] ?? '') }}"
                            alt="energy storage battery" width="411" height="432"/>
                        <div
                            class="bg-gradient-to-b from-[#15151500] to-[#151515] absolute top-0 left-0 w-full h-full p-5 flex items-end">
                            <div>
                                <h3 class="font-primary text-2xl text-primary-white">
                                {{ $productpagecontent['feature_two_title']['value'] ?? '' }}
                                </h3>
                                <p class="font-secondary text-sm text-primary-white lg:h-auto h-10 overflow-hidden">{!! $productpagecontent['feature_two_content']['value'] ?? '' !!}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid lg:grid-cols-3 gap-5">
                    <div class="relative border border-[#C8C8C83D]">
                        <img
                            class="w-full"
                            src="{{ asset('/assets/product/' . $productpagecontent['feature_three_image']['value'] ?? '') }}"
                            alt="energy storage for solar power" width="411" height="432"/>
                        <div
                            class="bg-gradient-to-b from-[#15151500] to-[#151515] absolute top-0 left-0 w-full h-full p-5 flex items-end">
                            <div>
                                <h3 class="font-primary text-2xl text-primary-white">
                                {{ $productpagecontent['feature_three_title']['value'] ?? '' }}
                                </h3>
                                <p class="font-secondary text-sm text-primary-white">{!! $productpagecontent['feature_three_content']['value'] ?? '' !!}</p>
                            </div>
                        </div>
                    </div>

                    <div class="relative border border-[#C8C8C83D]">
                        <img
                            class="w-full"
                            src="{{ asset('/assets/product/' . $productpagecontent['feature_four_image']['value'] ?? '') }}"
                            alt="battery storage system for solar" width="411" height="432"/>
                        <div
                            class="bg-gradient-to-b from-[#15151500] to-[#151515] absolute top-0 left-0 w-full h-full p-5 flex items-end">
                            <div>
                                <h3 class="font-primary text-2xl text-primary-white">
                                {{ $productpagecontent['feature_four_title']['value'] ?? '' }}
                                </h3>
                                <p class="font-secondary text-sm text-primary-white">{!! $productpagecontent['feature_four_content']['value'] ?? '' !!}</p>
                            </div>
                        </div>
                    </div>

                    <div class="relative border border-[#C8C8C83D]">
                        <img
                            class="w-full"
                            src="{{ asset('/assets/product/' . $productpagecontent['feature_five_image']['value'] ?? '') }}"
                            alt="solar power battery backup" width="411" height="432"/>
                        <div
                            class="bg-gradient-to-b from-[#15151500] to-[#151515] absolute top-0 left-0 w-full h-full p-5 flex items-end">
                            <div>
                                <h3 class="font-primary text-2xl text-primary-white">
                                {{ $productpagecontent['feature_five_title']['value'] ?? '' }}
                                </h3>
                                <p class="font-secondary text-sm text-primary-white">{!! $productpagecontent['feature_five_content']['value'] ?? '' !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SEO Content Commented -->
    <div
        class="mt-6 default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
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
                        Know Everything About Our Products >>
                    </h3>
                </button>

                <div
                    class="accordion-content overflow-hidden transition-all duration-300 max-h-0">
                    <ul class="py-6">
                        <li>
                            <div class="text-white gap-4">
                                <h1 class="text-2xl font-semibold text-left mb-6">
                                SolaX Energy Storage for Home: Smart Power Solutions for Your Needs
                                </h1>
                                <p class="font-secondary text-primary-white">
                                We bring to you advanced solutions for <strong>energy storage for home</strong>, designed to enhance your home’s power efficiency and support reliable energy storage. Our systems aim to optimize both backup power and maximize the efficiency of solar panels, delivering optimized performance. Empower your lifestyle with sustainable energy built into cutting-edge technology now!
                                </p>
                                <br/>
                                <h2 class="text-2xl font-semibold important-mt-8 mb-6">
                                Our Product Portfolio: Innovative Energy Storage Systems
                                </h2>
                                <p class="font-secondary text-primary-white">From home energy storage batteries to energy storage battery systems, SolaX stands for reliable solutions for a wide range of residential energy needs. Our <strong>solar energy storage solutions</strong> are effectively integrated into your existing solar setup to provide you with smooth control over your energy management. Here are some of our key products.</p>

                                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 mt-6">
                                    <div class="shadow-lg rounded-lg">
                                        <div class="mb-4 flex items-center space-x-2">
                                            <div class="w-[24px]">
                                                <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" width="24" height="24" />
                                            </div>
                                            <span class="font-bold">Energy Storage Inverter</span>
                                        </div>
                                        <p class="font-secondary text-primary-white">Our <strong><a href="/products/energy-storage-inverter/a1-hybrid-g2">Energy Storage Inverter</a></strong> is an all-in-one solution tailored for the American market. It can intelligently classify home loads so that priority can be given to critical appliances during outages for convenience and energy efficiency.</p>
                                    </div>
                                    <div class="shadow-lg rounded-lg">
                                        <div class="mb-4 flex items-center space-x-2">
                                            <div class="w-[24px]">
                                                <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" width="24" height="24" />
                                            </div>
                                            <span class="font-bold">Battery System</span>
                                        </div>
                                        <p class="font-secondary text-primary-white">Our <strong><a href="/products/triple-power-battery/t-bat-sys-hv-5-0">battery energy storage systems</a></strong> are simple and reliable with modular, plug-in terminals. These systems therefore simplify the wiring and connection processes for easier system expansion. With these batteries, you'll have the consistency of available energy when you need it the most.</p>
                                    </div>
                                    <div class="shadow-lg rounded-lg">
                                        <div class="mb-4 flex items-center space-x-2">
                                            <div class="w-[24px]">
                                                <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" width="24" height="24" />
                                            </div>
                                            <span class="font-bold">Microinverter</span>
                                        </div>
                                        <p class="font-secondary text-primary-white">SolaX <strong><a href="/products/microinverter/microinverter-1-in-1">microinverters</a></strong> are built to address the challenge of the latest high-power solar panels. Featuring IP67-rated lightning protection, they are designed for reliable operations, even in challenging weather conditions within specified safety standards.</p>
                                    </div>
                                </div>
                                <br/>
                                <h2 class="text-2xl font-semibold mt-12 mb-6">Unique Features of SolaX Energy Storage Systems for Your Home</h2>

                                <p class="font-secondary text-primary-white">Investing in SolaX Power is an investment in technology that mirrors innovation, convenience, and sustainability. Our energy storage systems are specifically designed to provide more than simply backup power. Here's how we enhance the standards of home energy storage:</p>

                                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 mt-6">
                                    <div class="shadow-lg rounded-lg">
                                        <div class="mb-4 flex items-center space-x-2">
                                            <div class="w-[24px]">
                                                <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" width="24" height="24" />
                                            </div>
                                            <span class="font-bold">High Durability</span>
                                        </div>
                                        <p class="font-secondary text-primary-white">Our devices have to pass strict quality testing for durability because they are engineered to withstand a range of environmental conditions, such as extreme temperatures and vibrations. Therefore, SolaX systems are quite dependable for long-term energy management.</p>
                                    </div>
                                    <div class="shadow-lg rounded-lg">
                                        <div class="mb-4 flex items-center space-x-2">
                                            <div class="w-[24px]">
                                                <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" width="24" height="24" />
                                            </div>
                                            <span class="font-bold">Easy Installation</span>
                                        </div>
                                        <p class="font-secondary text-primary-white">We’ve designed our systems with ease in mind. All of our systems feature pre-drilled mounting holes, clear step-by-step guides, and plug-and-play connectors. Therefore, with just a minor effort, you can run your solar energy storage solution effectively, saving both your time and money.</p>
                                    </div>
                                    <div class="shadow-lg rounded-lg">
                                        <div class="mb-4 flex items-center space-x-2">
                                            <div class="w-[24px]">
                                                <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" width="24" height="24"/>
                                            </div>
                                            <span class="font-bold">Expert Support at Every Step</span>
                                        </div>
                                        <p class="font-secondary text-primary-white">SolaX has a global support network that ensures you get help when needed. From product queries to technical troubleshooting, our dedicated teams are here to guide you toward ensuring that your ownership experience is smooth.</p>
                                    </div>
                                    <div class="shadow-lg rounded-lg">
                                        <div class="mb-4 flex items-center space-x-2">
                                            <div class="w-[24px]">
                                                <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" width="24" height="24" />
                                            </div>
                                            <span class="font-bold">Long-Lasting Performance</span>
                                        </div>
                                        <p class="font-secondary text-primary-white">Every SolaX product is designed with high-quality materials and cutting-edge technology that will provide consistent and reliable energy storage. Such quality commitment maximizes the lifespan of your <strong>home energy storage battery</strong> and supports uninterrupted power for critical needs, depending on system capacity.</p>
                                    </div>
                                    <div class="shadow-lg rounded-lg">
                                        <div class="mb-4 flex items-center space-x-2">
                                            <div class="w-[24px]">
                                                <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" width="24" height="24" />
                                            </div>
                                            <span class="font-bold">Sustainable Solutions</span>
                                        </div>
                                        <p class="font-secondary text-primary-white">By integrating our <strong>battery energy storage systems</strong> into your home, you’re contributing to a greener planet. Our energy-efficient products help reduce your reliance on the grid, lower energy consumption, and minimize your carbon footprint, making sustainability a core part of your energy strategy.</p>
                                    </div>
                                </div>
                                <br/>
                                <h2 class="text-2xl font-semibold mt-12 mb-6">
                                Explore SolaX’s Diverse Range of Products for All Your Energy Storage Needs
                                </h2>
                                <div class="text-lg leading-relaxed space-y-6">
                                    <p class="font-secondary text-primary-white">Experience the freedom of storing energy efficiently and dependably for your home with SolaX. From tough backup power to easy installations, we have the right solution for you. Empower your home's energy management with our extensive <strong>solar energy storage solutions!</strong></p>
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
</section>
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
