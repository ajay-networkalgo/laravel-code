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
                    <img id="currentImage" class="lazyload object-cover rounded-lg shadow-lg w-full h-auto" data-src="{{ asset('/assets/A1Hybrid/micro-1-in-1-1.webp') }}" alt="">
                </div>
                <div class="grid grid-cols-3 lg:flex flex-row items-center gap-5">
                    <img id="thumb-0" onclick="selectImage(0)" src="{{ asset('/assets/A1Hybrid/micro-1-in-1-1.webp') }}" class="object-cover w-[115px] h-[80px]  md:w-[190px] md:h-[120px]" alt="">
                    <img id="thumb-1" onclick="selectImage(1)" src="{{ asset('/assets/A1Hybrid/micro-1v1.59.webp') }}" class="object-cover w-[115px] h-[80px]  md:w-[190px] md:h-[120px]" alt="">
                    <img id="thumb-2" onclick="selectImage(2)" src="{{ asset('/assets/A1Hybrid/micro-1-in-1-2.webp') }}" class="object-cover w-[115px] h-[80px]  md:w-[190px] md:h-[120px]" alt="">
                </div>
            </div>
            <div class="flex flex-col gap-10 md:gap-[77px] overflow-y-scroll">
                <div class="flex flex-col gap-3">
                    <div>
                        <span class="font-primary text-lg text-[#EF6818] font-medium uppercase">Single Phase Inverter</span>
                    </div>
                    <div class="flex flex-col gap-6  ">
                        <span class="font-primary font-medium text-primary-black text-[42px] leading-[48px] sm:text-[52px] sm:leading-[58px] lg:text-[72px] lg:leading-[80px] xl:text-[72px] xl:leading-[88px]  drop-shadow-2xl">A1-MICRO 1 IN 1
                        </span>
                        <span class="text-primary-black font-secondary text-[18px] leading-[24px]  xl:w-[100%]">A1-Micro 300W / 400W / 450W / 500W / 600W</span>
                    </div>
                </div>
                <div class="flex flex-col gap-10 md:gap-[64px]">
                    <span class="text-base text-primary-black font-medium font-primary leading-[24px]">Key Features</span>
                    <div class="flex flex-col gap-6">
                        <span class="text-base font-bold font-secondary leading-[24px]">Flexible Adaptability</span>
                        <ul class="list-none flex flex-col gap-6">
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Support Zero Export Control
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Support micro-grid solution, AC coupling solution
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Support 1-phase microinverter integration into 3-phase power grids
                            </li>
                        </ul>
                    </div>
                    <div class="flex flex-col gap-6">
                        <span class="text-base font-bold font-secondary leading-[24px]">High Efficiency</span>
                        <ul class="list-none flex flex-col gap-6">
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Max. 600VA output power
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Max. 20A DC input current
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Single MPPT, small size, light weigh
                            </li>
                        </ul>
                    </div>
                    <div class="flex flex-col gap-6">
                        <span class="text-base font-bold font-secondary leading-[24px]">Assured Safety</span>
                        <ul class="list-none flex flex-col gap-6">
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Built-in industrial grade PLC module
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Safety protection relay integrated
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                IP67 protection class
                            </li>
                        </ul>
                    </div>
                    <div class="flex flex-col gap-6">
                        <span class="text-base font-bold font-secondary leading-[24px]">Intelligent Design</span>
                        <ul class="list-none flex flex-col gap-6">
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Reactive power control
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Rapid shutdown function
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                Easy to install and maintain
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
                    class="font-primary text-lg text-primary-orange font-medium text-center uppercase">A1-Microinverter 1 in 1</span>
                <h2
                    class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-white font-medium text-center">
                    X Power Difference
                </h2>
                <p class="font-secondary text-base leading-[24px] text-[#F5F5F5] font-normal lg:w-[70%] text-center">
                    Introducing the SolaX A1-Micro series - the apex of microinverter technology. With an exceptional capacity of up to 600 VA, these leading 1-in-1 microinverters provide unrivaled power efficiency and dependability. Engineered for high-power modules, the A1-Micro series boasts advanced MPPT technology, managing substantial input currents and exceptional output power. Integrated PLC communication ensures seamless monitoring and control. Ideal for both residential and commercial solar applications, the A1-Micro series others cost-effective solutions and integrates effortlessly with the SolaX Hybrid system and AC coupled systems.
                </p>

                <iframe width="100%" height="631" src="https://www.youtube.com/embed/1-zwaFbwJh8" title="SolaX Microinverter X1-Micro Series Introduction" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>

            <div class="flex flex-col lg:flex-row gap-10">

                <div class="flex flex-col gap-6 lg:w-[60%]  border border-[#C8C8C83D]">
                    <div class="tabs grid lg:grid-cols-4">
                        <button
                            data-tab="pv-inverter1"
                            class="tab-link py-5 border-b border-[#C8C8C8] font-secondary text-xl text-primary-white text-primary-yellow border-primary-yellow">
                            300W
                        </button>

                        <button
                            data-tab="pv-inverter2"
                            class="tab-link py-5 border-b border-[#C8C8C8] font-secondary text-xl text-primary-white">
                            400W
                        </button>

                        <button
                            data-tab="pv-inverter3"
                            class="tab-link py-5 border-b border-[#C8C8C8] font-secondary text-xl text-primary-white">
                            450W
                        </button>

                        <button
                            data-tab="pv-inverter4"
                            class="tab-link py-5 border-b border-[#C8C8C8] font-secondary text-xl text-primary-white">
                            500W/600W
                        </button>
                    </div>

                    <div class="tab-contents">
                        <!-- pv inverter content -->
                        <div id="pv-inverter1" class="tab-content active">
                            <div class="flex flex-col px-5 ">
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5 border-b border-[#C8C8C83D] ">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Max. PV input voltage</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">60V</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Max. PV input current</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">12A</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Start-up voltage</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">20V</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">No. of MPP trackers/Strings per MPP tracker</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">1/1</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Dimensions (W*H*D)</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">206*178*34mm</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Net weight</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">2.5kg</span>
                                </div>
                            </div>
                        </div>

                        <div id="pv-inverter2" class="tab-content">
                            <div class="flex flex-col px-5 ">
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5 border-b border-[#C8C8C83D] ">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Max. PV input voltage</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">60V</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Max. PV input current</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">15A</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Start-up voltage</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">20V</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">No. of MPP trackers/Strings per MPP tracker</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">1/1</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Dimensions (W*H*D)</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">206*178*34mm</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Net weight</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">2.5kg</span>
                                </div>
                            </div>
                        </div>

                        <div id="pv-inverter3" class="tab-content">
                            <div class="flex flex-col px-5 ">
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5 border-b border-[#C8C8C83D] ">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Max. PV input voltage</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">60V</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Max. PV input current</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">16A</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Start-up voltage</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">20V</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">No. of MPP trackers/Strings per MPP tracker</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">1/1</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Dimensions (W*H*D)</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">206*178*34mm</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Net weight</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">2.5kg</span>
                                </div>
                            </div>
                        </div>

                        <div id="pv-inverter4" class="tab-content">
                            <div class="flex flex-col px-5 ">
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5 border-b border-[#C8C8C83D] ">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Max. PV input voltage</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">60V</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Max. PV input current</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">18A-20A</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Start-up voltage</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">20V</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">No. of MPP trackers/Strings per MPP tracker</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">1/1</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Dimensions (W*H*D)</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">206*178*34mm</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Net weight</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">2.5kg</span>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="lg:w-[40%] bg-[#FFF] flex justify-center items-end">
                    <!-- <img class="lazyload" data-src="{{ asset('/assets/A1Hybrid/switch-box.webp') }}" alt="solar battery storage system"> -->
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/1-zwaFbwJh8" title="SolaX Microinverter X1-Micro Series Introduction" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
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
        "/assets/A1Hybrid/micro-1-in-1-1.webp",
        "/assets/A1Hybrid/micro-1v1.59.webp",
        "/assets/A1Hybrid/micro-1-in-1-2.webp"
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
