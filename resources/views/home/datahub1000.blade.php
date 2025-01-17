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
                    <img id="currentImage" class="lazyload object-cover rounded-lg shadow-lg w-full h-auto" data-src="{{ asset('/assets/A1Hybrid/datahub1.webp') }}" alt="">
                </div>
                <div class="grid grid-cols-3 lg:flex flex-row items-center gap-5">
                    <img id="thumb-0" onclick="selectImage(0)" data-src="{{ asset('/assets/A1Hybrid/datahub2.webp') }}" class="lazyload object-cover w-[115px] h-[80px]  md:w-[190px] md:h-[120px]" alt="">
                    <img id="thumb-1" onclick="selectImage(1)" data-src="{{ asset('/assets/A1Hybrid/datahub3.webp') }}" class="lazyload object-cover w-[115px] h-[80px]  md:w-[190px] md:h-[120px]" alt="">
                </div>
            </div>
            <div class="flex flex-col gap-10 md:gap-[77px] overflow-y-scroll">
                <div class="flex flex-col gap-3">
                    <div>
                        <span class="font-primary text-lg text-[#EF6818] font-medium uppercase">Massive Management Device</span>
                    </div>
                    <div class="flex flex-col gap-6  ">
                        <span class="font-primary font-medium text-primary-black text-[42px] leading-[48px] sm:text-[52px] sm:leading-[58px] lg:text-[72px] lg:leading-[80px] xl:text-[80px] xl:leading-[88px]  drop-shadow-2xl">DATAHUB 1000</span>
                        
                    </div>
                </div>
                <div class="flex flex-col gap-10 md:gap-[64px]">
                    <span class="text-base text-primary-black font-medium font-primary leading-[24px]">Key Features</span>
                    <div class="flex flex-col gap-6">
                        <span class="text-base font-bold font-secondary leading-[24px]"></span>
                        <ul class="list-none flex flex-col gap-6">
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Smart Schedule & Smart Scene AI-driven smart energy  management
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Local & Remote monitoring, setting, and upgrade of batch inverters
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Intelligent export control, DRM control, and ripple control, etc., of batch inverters
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Support large-capacity data storage
                            </li>
                        </ul>
                    </div>
                    
                    
                    
                 
                </div>
            </div>


        </div>
    </div>
</section>

<!-- second section -->
<section class="py-24">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-16">
            <div class="flex flex-col items-center gap-6">
                <span
                    class="font-primary text-lg text-primary-orange font-medium text-center uppercase">Why
                    DataHub 1000</span>
                <h2
                    class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-white font-medium text-center">
                    X Power Difference
                </h2>
                <p class="font-secondary text-base leading-[24px] text-[#F5F5F5] font-normal lg:w-[70%] text-center">Introducing the DataHub1000, a reliable device designed to effortlessly monitor and manage your site, particularly when equipped with multiple Olax inverters. With its advanced power control features, this professional device ensures that your system is compliant with local grid requirements, enabling you to maximize control and efficiency. Experience remote monitoring, intelligent power control, and robust data storage, all tailored to enhance the performance of your energy system.</p>
            </div>

            <div class="flex flex-col lg:flex-row gap-10">

                <div class="flex flex-col gap-12 lg:w-[100%]  border border-[#C8C8C83D]">
                    <div class="tabs grid ">
                        <button
                            data-tab="pv-inverter"
                            class="tab-link py-5 border-b border-[#C8C8C8] font-secondary text-xl text-primary-white text-primary-yellow border-primary-yellow">
                            DATAHUB-100
                        </button>

                    </div>

                    <div class="tab-contents">
                        <!-- pv inverter content -->
                        <div id="pv-inverter" class="tab-content active">
                            <div class="flex flex-col px-5 ">
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5 border-b border-[#C8C8C83D] ">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">
                                    Parameter</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Details</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Model</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">DataHub1000</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Power Adapter</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">100-240V 50/60HZ 1.5A AC input, 12V 2A DC output</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Wireless Module</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Wi-Fi 2.4GHz</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]"">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Ethernet</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">10/100M</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Manage Device Quantity	</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">60</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Interface</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">RS485 × 4, CAN × 1, Ethernet × 1</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Dry Contactor </span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">AI × 2, DI × 4, DO × 4</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Data Transfer Interval </span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">5 mins</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Expanded Storage Capacity </span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">8G/16G TF card (Optional)</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Dimensions (L × W × H)	</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">205 × 124 × 33 mm</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Weight</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">410 g</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Degree of Protection</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">IP21</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Operating Temperature Range</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">-20 ~ +60°C
                                    </span>
                                </div>
                                
                                
                            </div>
                            
                
                        </div>

                        <!-- energy storage system -->



                    </div>


                </div>

                <div class="lg:w-[80%] bg-[#FFF] flex justify-center ">
                    <img class="lazyload" data-src="{{ asset('/assets/A1Hybrid/datahub-1000.webp') }}" alt="">
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
        "/assets/A1Hybrid/datahub1.webp",
        "/assets/A1Hybrid/datahub2.webp",
        "/assets/A1Hybrid/datahub3.webp",
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
