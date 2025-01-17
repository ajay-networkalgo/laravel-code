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
<!-- hero section -->
<section
    class="bg-primary-white bg-[url(./../assets/CloudApp/cloud.webp)] bg-cover bg-center bg-no-repeat h-screen">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex justify-center md:justify-start lg:items-center items-end h-[100vh] pb-16 lg:pb-0">
            <span
                class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-white font-medium text-center">
                The Cloud App
            </span>
        </div>
    </div>
</section>

<!-- second section -->
<section class="py-24 bg-primary-white">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col lg:gap-[90px] gap-10">
            <div class="flex flex-col gap-6">
                <span
                    class="font-primary text-base xl:text-lg text-primary-orange font-medium uppercase">EASY, SAFE, SMART LIFE</span>
                <h2
                    class="font-primary text-[32px] leading-[36px] lg:text-4xl xl:text-6xl lg:leading-[70px] text-primary-black font-medium md:w-[60%]">
                    Olax Smart Energy Management System
                </h2>
                <p
                    class="font-secondary text-lg leading-[24px] md:text-[24px] md:leading-[32px] xl:text-[32px] xl:leading-[44px] md:w-[70%] text-primary-black">
                    The Smart Energy Management System is designed to offer
                    real-time monitoring and control of your entire solar system,
                    providing you with comprehensive data to manage your costs and
                    embrace a green lifestyle.
                </p>
            </div>

            <div>
                <img class="lazyload" data-src="{{ asset('/assets/CloudApp/smartLife.png') }}" alt="" />
            </div>
        </div>
    </div>
</section>

<!-- third section -->
<section class="py-24">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-10 lg:gap-[140px]">
            <div class="flex flex-col items-center gap-6">
                <span
                    class="font-primary text-base xl:text-lg text-primary-orange font-medium text-center uppercase">why Olax cloud</span>
                <h2
                    class="font-primary text-[32px] leading-[36px] xl:text-4xl lg:text-6xl text-primary-white font-medium text-center">
                    Olax Cloud App Features
                </h2>
            </div>

            <div class="flex flex-col gap-10">
                <div class="flex flex-col sm:flex-row justify-between gap-10 xl:gap-[90px]">
                    <div
                        class="bg-[url(./../assets/Energy_Storage/bg-dark.png)] sm:w-[50%] flex justify-center px-8 py-10">
                        <img class="lazyload" data-src="{{ asset('/assets/CloudApp/cloud1.png') }}" alt="" />
                    </div>
                    <div class="flex flex-col gap-[14px] sm:w-[40%]">
                        <span
                            class="font-primary font-semibold text-lg leading-[26px] text-[#EEBB0C]">01</span>
                        <div class="flex flex-col gap-3 md:gap-6">
                            <span
                                class="font-primary font-medium text-[24px] leading-[28px] md:text-[32px] md:leading-[36px] lg:text-[48px] lg:leading-[62px] text-[#F5F5F5]">Flexible to Integrate Third-Party Systems</span>
                            <span
                                class="font-secondary text-sm md:text-base lg:text-lg md:leading-[21px] text-[#F5F5F5] lg:w-[60%]">Geo location weather information. Olax Cloud makes life
                                simple.</span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col-reverse sm:flex-row justify-between gap-10 xl:gap-[90px]">

                    <div class="flex flex-col gap-[14px] sm:w-[40%]">
                        <span
                            class="font-primary font-semibold text-lg leading-[26px] text-[#EEBB0C]">02</span>
                        <div class="flex flex-col  gap-3 md:gap-6">
                            <span
                                class="font-primary font-medium text-[24px] leading-[28px] md:text-[32px] md:leading-[36px] lg:text-[48px] lg:leading-[62px] text-[#F5F5F5]">Web Browser & APP
                                Supported</span>
                            <span
                                class="font-secondary text-sm md:text-base lg:text-lg md:leading-[21px] text-[#F5F5F5]"></span>
                        </div>
                    </div>

                    <div
                        class="bg-[url(./../assets/Energy_Storage/bg-dark.png)] sm:w-[50%] flex justify-center px-8 py-10">
                        <img class="lazyload" data-src="{{ asset('/assets/CloudApp/cloud2.png') }}" alt="" />
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row justify-between gap-10 xl:gap-[90px]">
                    <div
                        class="bg-[url(./../assets/Energy_Storage/bg-dark.png)] sm:w-[50%] flex justify-center px-8 py-10">
                        <img class="lazyload" data-src="{{ asset('/assets/CloudApp/cloud3.png') }}" alt="" />
                    </div>
                    <div class="flex flex-col gap-[14px] sm:w-[40%]">
                        <span
                            class="font-primary font-semibold text-lg leading-[26px] text-[#EEBB0C]">03</span>
                        <div class="flex flex-col  gap-3 md:gap-6">
                            <span
                                class="font-primary font-medium text-[24px] leading-[28px] md:text-[32px] md:leading-[36px] lg:text-[48px] lg:leading-[62px] text-[#F5F5F5]">Visualized Energy
                                Graphs</span>
                            <span
                                class="font-secondary text-sm md:text-base lg:text-lg md:leading-[21px] text-[#F5F5F5] ">Monitor your product's status in real-time with an intuitive visualization view, making data detection effortless.</span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col-reverse sm:flex-row justify-between gap-10 xl:gap-[90px]">

                    <div class="flex flex-col gap-[14px] sm:w-[40%]">
                        <span
                            class="font-primary font-semibold text-lg leading-[26px] text-[#EEBB0C]">04</span>
                        <div class="flex flex-col  gap-3 md:gap-6">
                            <span
                                class="font-primary font-medium text-[24px] leading-[28px] md:text-[32px] md:leading-[36px] lg:text-[48px] lg:leading-[62px] text-[#F5F5F5]">Remote Device Monitoring and Controlling</span>
                            <span
                                class="font-secondary text-sm md:text-base lg:text-lg md:leading-[21px] text-[#F5F5F5] ">At your fingertips, you can control and remotely manage the system, monitoring your machine's operating status instantly. Achieve data zero carbon emissions.</span>
                        </div>
                    </div>
                    <div
                        class="bg-[url(./../assets/Energy_Storage/bg-dark.png)] sm:w-[50%] flex justify-center px-8 py-10">
                        <img class="lazyload" data-src="{{ asset('/assets/A1Hybrid/energyCard4.png') }}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- fourth section -->
<section class="bg-primary-white py-24">
    <div class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-10 md:gap-[90px] ">
            <span class="font-primary font-medium md:text-[48px] text-[32px] leading-[57px] text-primary-black">Other Products</span>
            <div class="grid md:grid-cols-3 gap-5 md:gap-10">
            <?php foreach($otherProducts as $product) { ?>
                <a href="{{ url("/products/accessories/".$product->slug) }}" class="flex flex-col justify-between">
                    <div class="bg-[url(./../assets/A1Hybrid/cardBg.png)] flex justify-center items-center p-6 h-full">
                        <img class="lazyload" data-src="{{ asset('/assets/A1Hybrid/energyCard5.png') }}" alt="">
                    </div>
                    <div class="py-5 flex justify-center items-center bg-primary-black">
                        <span class="text-[#EEBB0C] text-[24px] font-primary font-medium leading-[28px]">{{ $product->name }}</span>
                    </div>
                </a>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<!-- sixth section -->
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
