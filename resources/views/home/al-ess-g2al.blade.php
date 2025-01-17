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
                    <img id="currentImage" data-src="{{ asset('/assets/A1Hybrid/es2.webp') }}" alt="" class="object-cover rounded-lg shadow-lg w-full h-auto lazyload">
                </div>

                <div class="grid grid-cols-3 lg:flex flex-row items-center gap-5">
                    <img id="thumb-0" onclick="selectImage(0)" data-src="{{ asset('/assets/A1Hybrid/es2.webp') }}" class="lazyload object-cover w-[115px] h-[80px]  md:w-[190px] md:h-[120px]" alt="">
                </div>
            </div>
            <div class="flex flex-col gap-10 md:gap-[77px] overflow-y-scroll">
                <div class="flex flex-col gap-3">
                    <div>
                        <span class="font-primary text-lg text-[#EF6818] font-medium uppercase">Energy Storage System</span>
                    </div>
                    <div class="flex flex-col gap-6  ">
                        <span class="font-primary font-medium text-primary-black text-[42px] leading-[48px] sm:text-[52px] sm:leading-[58px] lg:text-[72px] lg:leading-[80px] xl:text-[80px] xl:leading-[88px]  drop-shadow-2xl">A1-ESS-G2</span>
                        <span class="text-primary-black font-secondary text-[18px] leading-[24px]  xl:w-[50%]">3.8kW / 5kW / 6kW / 7.6kW</span>
                    </div>
                </div>
                <div class="flex flex-col gap-10 md:gap-[64px]">
                    <span class="text-base text-primary-black font-medium font-primary leading-[24px]">Key Features</span>
                    <div class="flex flex-col gap-6">
                        <span class="text-base font-bold font-secondary leading-[24px]">Superior Performance</span>
                        <ul class="list-none flex flex-col gap-6">
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Stacked installation, saving installation costs
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Up to 3 MPPTs
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Up to 200% oversizing allowed
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Maximum 16A PV input current, support high power solar panel
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Peak efficiency: 98%
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Up to 4 ESS in parallel
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Support Maximum 200A main panel
                            </li>
                        </ul>
                    </div>
                    <div class="flex flex-col gap-6">
                        <span class="text-base font-bold font-secondary leading-[24px]">Safe & Reliable</span>
                        <ul class="list-none flex flex-col gap-6">
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Integrated ARC fault protection and rapid shutdown transmitter
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                AC&DC SPD type II, always guarding the inverter
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                NEMA 4X protection level
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Automatic black start function
                            </li>
                        </ul>
                    </div>
                    <div class="flex flex-col gap-6">
                        <span class="text-base font-bold font-secondary leading-[24px]">Multi-function Integrated</span>
                        <ul class="list-none flex flex-col gap-6">
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Max. 100A generator supported, depending on different BI Version
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Smart load management
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Micro-grid ready, supporting real-time power balance
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Support multiple power distribution solutions (Partial or Whole Home)
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                VPP ready, SolaX cloud support resource aggregator (IEEE 2030.5, OpenADR)
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
                    class="font-primary text-lg text-primary-orange font-medium text-center uppercase">A1-ESS-G2</span>
                <h2
                    class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-white font-medium text-center">
                    X Power Difference
                </h2>
                <p class="font-secondary text-base leading-[24px] text-[#F5F5F5] font-normal lg:w-[70%] text-center">A1 ESS G2 stands out for its safety, reliability, superior performance, and versatile integration. With advanced ARC fault protection, NEMA 4X protection level, and black start capability, it ensures safe and uninterrupted operation. Its high performance is highlighted by 98% peak efficiency, support for 200% oversizing, and compatibility with high-power solar panels and up to 4 ESS systems in parallel. Additionally, it integrates seamlessly with smart load management, micro-grid support, and multiple distribution solutions, making it suitable for varied applications. Its VPP-ready design and support for advanced resource aggregation protocols further enhance its appeal for modern energy systems.</p>
            </div>

            <div class="flex flex-col lg:flex-row gap-10">

                <div class="flex flex-col gap-12 lg:w-[100%]  border border-[#C8C8C83D]">
                    <div class="tabs grid ">
                        <button
                            data-tab="pv-inverter"
                            class="tab-link py-5 border-b border-[#C8C8C8] font-secondary text-xl text-primary-white text-primary-yellow border-primary-yellow">
                            A1-ESS-G2
                        </button>

                    </div>

                    <div class="tab-contents">
                        <!-- pv inverter content -->
                        <div id="pv-inverter" class="tab-content active">
                            <div class="flex flex-col px-5 ">
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5 border-b border-[#C8C8C83D] ">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">
                                    Rated Output Power [kW]</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">3.8/5.0/6.0/7.6</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Nominal Capacity [kWh]①</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">10/15/20</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Usable Energy [kWh]②</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">9/13.5/18</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Degree of Protection</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">NEMA 4X</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]"">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Altitude [ft / m]</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">9843 / 3000 MAX</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Cooling</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Natural convection</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Topology</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Transformerless</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Communication interfaces</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">RS485, CAN, WIFI (optional) / 4G (optional), Dry Contact</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Warranty</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">12 years③</span>
                                </div>
                                
                                <tr>
                                <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">
                                    ① Test Conditions: 0.2C charge &amp; discharge at + 25 °C. <br>
                                    ② Usable system energy may vary with different inverter settings. <br>
                                    ③ The 12-year warranty is valid only in North America. 
                                </span>
                                </tr>
                            </div>
                            
                
                        </div>

                        <!-- energy storage system -->



                    </div>


                </div>

                <div class="lg:w-[80%] bg-[#FFF] flex justify-center ">
                    <img class="lazyload" data-src="{{ asset('/assets/A1Hybrid/es2dd.jpg') }}" alt="">
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
        "/assets/A1Hybrid/solax.webp"
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
            if(thumb != null) {
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
