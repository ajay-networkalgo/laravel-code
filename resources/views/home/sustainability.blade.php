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
        <source id="banner-video-src" data-src-desktop="{{ asset('/assets/videos/compressed/substainbility_banner.mp4') }}" data-src-mobile="{{ asset('/assets/videos/compressed/news-mobile-video.mp4') }}" type="video/mp4" />
        Your browser does not support the video tag.
    </video>
    <div class="content absolute bg-[#15151580] w-full h-full top-0 left-0">
        <div
            class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
            <div
                class="hero-content h-screen flex flex-col justify-end lg:justify-center items-center gap-6 pb-24 lg:pb-0">
                <div class="hero-content-top flex flex-col items-center gap-4 xl:w-[50%] 2xl:w-[40%]">
                    <span
                        class="font-primary text-lg text-primary-yellow font-medium uppercase">sustainability</span>
                    <h1
                        class="font-primary font-medium text-primary-white text-[32px] leading-[40px] sm:text-[40px] sm:leading-[46px] lg:text-[72px] lg:leading-[80px] xl:text-[80px] xl:leading-[88px] text-center drop-shadow-2xl">
                        Powering a Green Future
                    </h1>
                </div>

                <div
                    class="hero-content-btm flex flex-col lg:flex-row items-center justify-center gap-4 max-w-[80%] md:max-w-none">
                    <button
                        onclick="document.getElementById('our-mission').scrollIntoView({ behavior: 'smooth' });"
                        class="bg-primary-yellow border border-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium flex items-center gap-2 w-full md:w-auto text-sm lg:text-base transition-all duration-300 group hover:bg-transparent hover:border-primary-white hover:text-primary-white">
                        <span>Our Mission</span>
                    </button>
                    <button
                        onclick="document.getElementById('our-vision').scrollIntoView({ behavior: 'smooth' });"
                        class="bg-transparent border border-[#F5F5F5] px-6 py-3 rounded-full font-primary text-[#F5F5F5] font-medium flex items-center gap-2 w-full md:w-auto text-sm lg:text-base transition-all duration-300 hover:bg-primary-yellow hover:text-primary-black hover:border-primary-yellow">
                        <span>Our Vision</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-24 lg:py-32 bg-primary-white">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-16 lg:gap-24">
            <div
                class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-10" id="our-mission">
                <div class="">
                    <img
                        class="w-full lazyload"
                        data-src="{{ asset('/assets/sustaibility/sustainability_2.png') }}"
                        alt="" width="612" height="733" />
                </div>

                <div class="flex flex-col lg:w-[45%]">
                    <div class="flex flex-col gap-6">
                        <span
                            class="font-primary font-medium text-primary-black text-[42px] leading-[48px] sm:text-[52px] sm:leading-[58px] lg:text-[72px] lg:leading-[80px] xl:text-[80px] xl:leading-[88px] drop-shadow-2xl">Our Mission</span>
                        <span
                            class="text-primary-black font-secondary font-base leading-[24px]">At SolaX Power, our mission is to empower energy independence through innovative, reliable, and sustainable energy storage solutions. We are dedicated to advancing renewable energy efficiency and driving the global shift towards a cleaner, greener future.</span>
                    </div>
                </div>
            </div>

            <div
                class="flex flex-col lg:flex-row-reverse lg:items-center lg:justify-between gap-10" id="our-vision">
                <div class="">
                    <img
                        class="w-full lazyload"
                        data-src="{{ asset('/assets/sustaibility/sustainability_1.png') }}"
                        alt="" width="612" height="733"/>
                </div>

                <div class="flex flex-col lg:w-[45%]">
                    <div class="flex flex-col gap-6">
                        <span
                            class="font-primary font-medium text-primary-black text-[42px] leading-[48px] sm:text-[52px] sm:leading-[58px] lg:text-[72px] lg:leading-[80px] xl:text-[80px] xl:leading-[88px] drop-shadow-2xl">Our Vision</span>
                        <span
                            class="text-primary-black font-secondary font-base leading-[24px]">Our vision is to lead the global transformation towards sustainable energy by becoming the world's most trusted provider of innovative energy storage solutions, empowering a green tomorrow where clean energy powers every home, business, and community.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- third section -->
<section class="bg-primary-black py-24">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-16">

            <div class="  flex flex-col gap-10 lg:gap-[90px]">
                <div class="tabs grid lg:grid-cols-3">
                    <button
                        data-tab="pv-inverter"
                        class="tab-link py-5 border-b border-[#C8C8C8] font-secondary text-xl text-primary-white text-primary-yellow border-primary-yellow">
                        Mission
                    </button>
                    <button
                        data-tab="energy-storage"
                        class="tab-link py-5 border-b border-[#C8C8C8] font-secondary text-xl text-primary-white">
                        Vision
                    </button>
                    <button
                        data-tab="ev-charger"
                        class="tab-link py-5 border-b border-[#C8C8C8] font-secondary text-xl text-primary-white">
                        Business Ethics
                    </button>
                </div>

                <div class="tab-contents">
                    <!-- pv inverter content -->
                    <div id="pv-inverter" class="tab-content active">
                        <div class="w-full flex flex-col lg:flex-row items-center gap-5 lg:gap-20">
                            <div class="lg:w-[50%]">
                                <img class="lazyload" data-src="{{ asset('assets/sustaibility/sustainability1.webp') }}" alt="sustainability1" width="600" height="477" />
                            </div>
                            <div class="flex flex-col gap-5 lg:w-[50%]">
                                <p class="font-secondary text-base leading-[24px] text-primary-white">Our mission is simple yet powerful: To accelerate the development of renewable energy and bring us closer to a future where clean and sustainable energy is a reality for all.</p>
                                <p class="font-secondary text-base leading-[24px] text-primary-white">At SolaX Power, we are dedicated to providing innovative energy storage solutions that not only meet the needs of today but also pave the way for a greener tomorrow. Our cutting-edge technology and commitment to excellence drive us to create products that empower individuals, businesses, and communities to harness the full potential of renewable energy.</p>
                                <p class="font-secondary text-base leading-[24px] text-primary-white">We believe that through our efforts, we can help reduce the carbon footprint, promote environmental stewardship, and contribute to a healthier planet for future generations. Together, let's power a green future.</p>
                            </div>
                        </div>
                    </div>

                    <!-- energy storage system -->
                    <div id="energy-storage" class="tab-content">
                        <div class="w-full flex flex-col lg:flex-row items-center gap-5 lg:gap-20">
                            <div class="lg:w-[50%]">
                                <img class="lazyload" data-src="{{ asset('assets/sustaibility/sustainability2.jpg') }}" alt="sustainability2" width="600" height="416">
                            </div>
                            <div class="flex flex-col gap-5 lg:w-[50%]">
                                <p class="font-secondary text-base leading-[24px] text-primary-white">Our vision is to empower a green future by leading the way in renewable energy innovation and sustainability.</p>
                                <p class="font-secondary text-base leading-[24px] text-primary-white">We envision a world where clean energy is accessible to everyone, where our homes and businesses are powered by the sun, and where our children inherit a planet that is thriving and sustainable. At SolaX Power, we are committed to making this vision a reality through relentless innovation, exceptional products, and unwavering dedication to our customers and partners.</p>
                                <p class="font-secondary text-base leading-[24px] text-primary-white">Our team of over 800 research and development professionals works tirelessly to push the boundaries of what's possible, ensuring that our solutions are not only effective but also reliable and user-friendly. We stand behind our industry-leading warranties and rigorous testing processes, so you can trust that our products are built to last.</p>
                                <p class="font-secondary text-base leading-[24px] text-primary-white">Join us on this journey towards a brighter, greener future. Together, we can make a lasting impact and realize mankind's aspiration for clean, sustainable energy.</p>
                            </div>
                        </div>
                    </div>

                    <!-- EV Charger -->
                    <div id="ev-charger" class="tab-content">
                        <div class="w-full flex flex-col lg:flex-row  items-center gap-5 lg:gap-20">
                            <div class="lg:w-[50%]">
                                <img class="lazyload" data-src="{{ asset('assets/sustaibility/sustainability3.jpg') }}" alt="sustainability3"  width="600" height="506">
                            </div>
                            <div class="flex flex-col gap-5 lg:w-[50%]">
                                <p class="font-secondary text-base leading-[24px] text-primary-white">SolaX Power is committed to building an honest, fair and compliant supply chain system. Our supplier compliance monitoring mechanism is designed to ensure that all of our suppliers meet our ethical business standards and legal and regulatory requirements, including but not limited to human rights, labor, environmental, and anti-corruption aspects. We monitor our suppliers through a variety of measures, including review of contracts and policy documents, site visits, third-party audits, etc., to ensure supplier compliance and reliability.</p>
                                <p class="font-secondary text-base leading-[24px] text-primary-white">If you become aware of any violations of business ethics standards or laws and regulations by our suppliers, please report them to us promptly. We will carefully investigate and handle your reports, take necessary corrective measures, and ensure that relevant information is kept confidential. We appreciate your support and help in maintaining an honest, fair and compliant business environment together.</p>
                                <p class="font-primary text-base leading-[24px] text-primary-white">If you have any questions or comments, please feel free to contact us.</p>
                                <p class="font-primary text-base leading-[24px] text-primary-yellow"><a href="{{ url('/usa-contact')}}">Click To Contact Us</a></p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
@include('layout.newsletter')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const tabLinks = document.querySelectorAll(".tab-link");
        const tabContents = document.querySelectorAll(".tab-content");

        tabLinks.forEach((link) => {
            link.addEventListener("click", () => {
                const tab = link.getAttribute("data-tab");

                tabLinks.forEach((link) =>
                    link.classList.remove(
                        "text-primary-yellow",
                        "border-primary-yellow"
                    )
                );
                link.classList.add("text-primary-yellow", "border-primary-yellow");

                tabContents.forEach((content) => {
                    content.classList.remove("active");
                    if (content.getAttribute("id") === tab) {
                        content.classList.add("active");
                    }
                });
            });
        });
    });
</script>
@endsection
