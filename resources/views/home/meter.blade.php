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
<section class="pb-24 pt-24 bg-primary-white">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col lg:flex-row gap-10 md:gap-[90px]">
            <div class="lg:w-[50%] flex flex-col gap-10 relative lg:sticky top-[10%] h-full">
                <div class="relative">
                    <img id="currentImage" class="lazyload object-cover rounded-lg shadow-lg w-full h-auto" data-src="{{ asset('/assets/A1Hybrid/ddsu666-5-80a.webp') }}" alt="">
                </div>
                <div class="grid grid-cols-3 lg:flex flex-row items-center gap-5">
                    <img id="thumb-0" onclick="selectImage(0)" data-src="{{ asset('/assets/A1Hybrid/ddsu666-5-80a.webp') }}" class="lazyload object-cover w-[115px] h-[80px]  md:w-[190px] md:h-[120px]" alt="">
                    <img id="thumb-1" onclick="selectImage(1)" data-src="{{ asset('/assets/A1Hybrid/dtsu666-5-80a.webp') }}" class="lazyload object-cover w-[115px] h-[80px]  md:w-[190px] md:h-[120px]" alt="">
                    <img id="thumb-2" onclick="selectImage(2)" data-src="{{ asset('/assets/A1Hybrid/dtsu666-ct-200a-5a.webp') }}" class="lazyload object-cover w-[115px] h-[80px]  md:w-[190px] md:h-[120px]" alt="">
                    <img id="thumb-3" onclick="selectImage(3)" data-src="{{ asset('/assets/A1Hybrid/dtsu666-5-80a_1684895627.webp') }}" class="lazyload object-cover w-[115px] h-[80px]  md:w-[190px] md:h-[120px]" alt="">
                </div>
            </div>
            <div class="flex flex-col gap-10 md:gap-[77px] overflow-y-scroll">
                <div class="flex flex-col gap-3">
                    <div>
                        <span class="font-primary text-lg text-[#EF6818] font-medium uppercase">Smart Management</span>
                    </div>
                    <div class="flex flex-col gap-6  ">
                        <span class="font-primary font-medium text-primary-black text-[42px] leading-[48px] sm:text-[52px] sm:leading-[58px] lg:text-[72px] lg:leading-[80px] xl:text-[80px] xl:leading-[88px]  drop-shadow-2xl">Energy Meter</span>
                        <span class="text-primary-black font-secondary text-[18px] leading-[24px]  xl:w-[50%]">80A | 200A<br />Direct | CT</span>
                    </div>
                </div>
                <div class="flex flex-col gap-10 md:gap-[64px]">
                    <span class="text-base text-primary-black font-medium font-primary leading-[24px]">Key Features</span>
                    <div class="flex flex-col gap-6">
                        <span class="text-base font-bold font-secondary leading-[24px]">Accurate</span>
                        <ul class="list-none flex flex-col gap-6">
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Class 1 measurement accuracy
                            </li>
                        </ul>
                    </div>
                    <div class="flex flex-col gap-6">
                        <span class="text-base font-bold font-secondary leading-[24px]">Smart Energy</span>
                        <ul class="list-none flex flex-col gap-6">
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Use clean, efficient renewable energy without pollution.
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Green and low carbon, saving economy, sustainable development
                            </li>
                        </ul>
                    </div>
                    <div class="flex flex-col gap-6">
                        <span class="text-base font-bold font-secondary leading-[24px]">Convenience</span>
                        <ul class="list-none flex flex-col gap-6">
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Optional 35mm DIN rail or front mounting
                            </li>
                        </ul>
                    </div>
                    <div class="flex flex-col gap-6">
                        <span class="text-base font-bold font-secondary leading-[24px]">Safe & Reliable</span>
                        <ul class="list-none flex flex-col gap-6">
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Use-free design for superior safety
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                International authoritative certification, more reliable
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Natural cooling fully sealed design for better reliability
                            </li>
                        </ul>
                    </div>
                    <div class="flex flex-col gap-6">
                        <span class="text-base font-bold font-secondary leading-[24px]">Energy Saving</span>
                        <ul class="list-none flex flex-col gap-6">
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Overall power consumption ≤1 W
                            </li>
                        </ul>
                    </div>
                    <div class="flex flex-col gap-6">
                        <span class="text-base font-bold font-secondary leading-[24px]">Smart Monitoring</span>
                        <ul class="list-none flex flex-col gap-6">
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                One terminal can control multiple devices, and perform parameter monitoring and fault query
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>

<!-- second section -->
<section class="hidden py-24">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-16">
            <div class="flex flex-col items-center gap-6">
                <span
                    class="font-primary text-lg text-primary-orange font-medium text-center uppercase">A1 HYBRID G2</span>
                <h2
                    class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-white font-medium text-center">
                    X Power Difference
                </h2>
                <p class="font-secondary text-base leading-[24px] text-[#F5F5F5] font-normal lg:w-[70%] text-center">
                    Our expertly designed products seamlessly integrate with your existing photovoltaic system, allowing you to connect up to four systems in parallel. Create ample storage with our stackable battery modules T-BAT-SYS-HV-5.0, providing 80kWh of energy for extended power usage. Our system provides multiclass loads management, classifying home loads to prioritize essential ones that meet customers' needs. Embrace the versatility of microgrid operation, wide temperature range, and flexible whole home or partial backup options. With automatic black start and integrated arc fault protection, safety and peace of mind are assured. Experience the true power of our hybrid, AC coupled inverter, and battery systems, revolutionizing your energy management with ease.
                </p>
            </div>

            <div class="flex flex-col lg:flex-row gap-10">

                <div class="  flex flex-col gap-6 lg:w-[60%]  border border-[#C8C8C83D]">
                    <div class="tabs grid lg:grid-cols-2">
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

                    </div>

                    <div class="tab-contents">
                        <!-- pv inverter content -->
                        <div id="pv-inverter" class="tab-content active">
                            <div class="flex flex-col px-5 ">
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5 border-b border-[#C8C8C83D] ">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Max. efficiency</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">98.00%</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">No. of MPP trackers/Strings per MPP tracker</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">3.1/1/1</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Max. charge/discharge current</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">54A</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Dimensions (W*H*D)</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">33.5*17.91*5.8in / 850*455*148mm</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  ">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Net weight</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">75lb / 34kg</span>
                                </div>
                            </div>
                        </div>

                        <!-- energy storage system -->
                        <div id="energy-storage" class="tab-content">
                            <div class="flex flex-col px-5 ">
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5 border-b border-[#C8C8C83D] ">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Max. efficiency</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">98.00%</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">No. of MPP trackers/Strings per MPP tracker</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">3.1/1/1</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Max. charge/discharge current</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">54A</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Dimensions (W*H*D)</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">33.5*17.91*5.8in / 850*455*148mm</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  ">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Net weight</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">75lb / 34kg</span>
                                </div>
                            </div>
                        </div>



                    </div>


                </div>

                <div class="lg:w-[40%] bg-[#FFF] flex justify-center items-end">
                    <img class="lazyload" data-src="{{ asset('/assets/A1Hybrid/Hybrid.png') }}" alt="">
                </div>
            </div>

        </div>
    </div>
</section>

@include('layout.download-products')

<!-- third section -->
@include('layout.related-products')

<!-- sixth section -->
@include('layout.newsletter')

<script>
    const images = [
        "/assets/A1Hybrid/ddsu666-5-80a.webp",
        "/assets/A1Hybrid/dtsu666-5-80a.webp",
        "/assets/A1Hybrid/dtsu666-ct-200a-5a.webp",
        "/assets/A1Hybrid/dtsu666-5-80a_1684895627.webp",
    ];

    // let currentThumbnail = document.getElementById('thumb-0');
    // currentThumbnail.classList.add('border', 'border-[#EEBB0C]');

    let currentIndex = 0;

    function selectImage(index) {
        const currentImage = document.getElementById("currentImage");
        currentImage.src = images[index];
        currentIndex = index;
        highlightThumbnail(index);
    }

    function nextImage() {
        currentIndex = (currentIndex + 1) % images.length;
        selectImage(currentIndex);
    }

    function prevImage() {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        selectImage(currentIndex);
    }

    function highlightThumbnail(index) {
        for (let i = 0; i < images.length; i++) {
            const thumb = document.getElementById(`thumb-${i}`);
            if (thumb != null) {
                if (i === index) {
                    thumb.classList.add('border', 'border-[#EEBB0C]');
                } else {
                    thumb.classList.remove('border', 'border-[#EEBB0C]');
                }
            }
        }
    }

    // Initial highlight
    highlightThumbnail(currentIndex);
    //

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
