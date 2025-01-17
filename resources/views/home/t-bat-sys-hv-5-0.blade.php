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
                <img class="lazyload" data-src="{{ asset('/assets/A1Hybrid/battery-system-t-bat-sys-hv-5-0.webp') }}" alt="solar power battery backup">
                <div class="">
                    <img data-src="{{ asset('/assets/A1Hybrid/battery-system-t-bat-sys-hv-5-0.webp') }}" class="object-cover border border-[#EEBB0C] w-[190px] h-[120px] lazyload" alt="solar power battery bank">
                </div>
            </div>
            <div class="flex flex-col gap-10 md:gap-[77px] overflow-y-scroll">
                <div class="flex flex-col gap-3">
                    <div>
                        <span class="font-primary text-lg text-[#EF6818] font-medium uppercase">Battery</span>
                    </div>
                    <div class="flex flex-col gap-6  ">
                        <span class="font-primary font-medium text-primary-black text-[42px] leading-[48px] sm:text-[52px] sm:leading-[58px] lg:text-[72px] lg:leading-[80px] xl:text-[80px] xl:leading-[88px]  drop-shadow-2xl">T-BAT-SYS-HV-5.0</span>
                        <span class="text-primary-black font-secondary text-[18px] leading-[24px]  xl:w-[50%]">T-BAT H 10.0</span>
                        <span class="text-primary-black font-secondary text-[18px] leading-[24px]  xl:w-[50%]">T-BAT H 15.0</span>
                        <span class="text-primary-black font-secondary text-[18px] leading-[24px]  xl:w-[50%]">T-BAT H 20.0</span>
                    </div>
                </div>
                <div class="flex flex-col gap-10 md:gap-[64px]">
                    <span class="text-base text-primary-black font-medium font-primary leading-[24px]">Key Features</span>
                    <div class="flex flex-col gap-6">
                        <span class="text-base font-bold font-secondary leading-[24px]">Safety</span>
                        <ul class="list-none flex flex-col gap-6">
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img data-src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2 lazyload">
                                IP65 protection level for reliable operation
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img data-src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2 lazyload">
                                Safe LiFePO4 battery type
                            </li>
                        </ul>
                    </div>

                    <div class="flex flex-col gap-6">
                        <span class="text-base font-bold font-secondary leading-[24px]">Reliability</span>
                        <ul class="list-none flex flex-col gap-6">
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img data-src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2 lazyload">
                                Long life cycle
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img data-src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2 lazyload">
                                95% battery roundtrip efficiency
                            </li>
                        </ul>
                    </div>

                    <div class="flex flex-col gap-6">
                        <span class="text-base font-bold font-secondary leading-[24px]">User Friendly</span>
                        <ul class="list-none flex flex-col gap-6">
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img data-src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2 lazyload">
                                Compact design for small spaces
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img data-src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2 lazyload">
                                Easy installation with modular stacking
                            </li>
                        </ul>
                    </div>

                    <div class="flex flex-col gap-6">
                        <span class="text-base font-bold font-secondary leading-[24px]">Monitoring</span>
                        <ul class="list-none flex flex-col gap-6">
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img data-src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2 lazyload">
                                Real-time tracking and monitoring
                            </li>
                            <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                                <img data-src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2 lazyload">
                                Remote diagnosis and control
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
                    class="font-primary text-lg text-primary-orange font-medium text-center uppercase">T-BAT-SYS-HV-5.0</span>
                <h2
                    class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-white font-medium text-center">
                    X Power Difference
                </h2>
                <p class="font-secondary text-base leading-[24px] text-[#F5F5F5] font-normal lg:w-[70%] text-center">
                The T-BAT-SYS-HV-5.0 is an advanced and highly reliable energy storage system, featuring cutting-edge technology for effortless control. With an impressive battery roundtrip efficiency of 95% and a cycle life surpassing 6000 cycles, it delivers top-notch performance. With secondary protection and an IP65 rating, it ensures both safety and dependability. The system can be conveniently mounted on the floor or wall, making it a perfect fit for any space. Experience the power of our slim and modular design, delivering optimal energy solutions with ease.
                </p>
            </div>

            <div class="flex flex-col lg:flex-row gap-10">

                <div class="flex flex-col gap-6 lg:w-[60%]  border border-[#C8C8C83D]">
                    <div class="tabs grid lg:grid-cols-3">
                        <button
                            data-tab="specification-box-1"
                            class="tab-link py-5 border-b border-[#C8C8C8] font-secondary text-xl text-primary-white text-primary-yellow border-primary-yellow">
                            T-BAT H 10.0
                        </button>
                        <button
                            data-tab="specification-box-2"
                            class="tab-link py-5 border-b border-[#C8C8C8] font-secondary text-xl text-primary-white">
                            T-BAT H 15.0
                        </button>
                        <button
                            data-tab="specification-box-3"
                            class="tab-link py-5 border-b border-[#C8C8C8] font-secondary text-xl text-primary-white">
                            T-BAT H 20.0
                        </button>
                    </div>

                    <div class="tab-contents">
                        <!-- pv inverter content -->
                        <div id="specification-box-1" class="tab-content active">
                            <div class="flex flex-col px-5 ">
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5 border-b border-[#C8C8C83D] ">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Component</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">TBMS-MC60060(BMS)+2*TP-HS50(Battery)</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Usable capacity</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">9kWh</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Nominal voltage</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">102.4V</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Max. charge/discharge current</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">54A</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Max. operating altitude</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">9843ft /3000m</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Dimensions (W*H*D)</span>
                                    <div>
                                        <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">TBMS-MC60060(BMS): 33.5*5.2*5.8in / 850*133*148mm</span><br/>
                                        <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">2*TP-HS50(Battery): 33.5*23.6*5.8in / 850*600*148mm</span><br/>
                                        <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Base: 33.5*2.2*5.8in / 850*55*148mm</span>
                                    </div>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  ">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Net weight</span>
                                    <div>
                                        <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">TBMS-MC60060(BMS): 22lb / 10kg</span><br/>
                                        <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">2*TP-HS50(Battery): 238lb / 108kg</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- energy storage system -->
                        <div id="specification-box-2" class="tab-content">
                            <div class="flex flex-col px-5 ">
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5 border-b border-[#C8C8C83D] ">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Component</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">TBMS-MC60060(BMS)+3*TP-HS50(Battery)</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Usable capacity</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">13.5kWh</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Nominal voltage</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">153.6V</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Max. charge/discharge current</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">54A</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Max. operating altitude</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">9843ft /3000m</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Dimensions (W*H*D)</span>
                                    <div>
                                        <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">TBMS-MC60060(BMS): 33.5*5.2*5.8in / 850*133*148mm</span><br/>
                                        <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">3*TP-HS50(Battery): 33.5*35.4*5.8in / 850*900*148mm</span><br/>
                                        <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Base: 33.5*2.2*5.8in / 850*55*148mm</span>
                                    </div>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  ">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Net weight</span>
                                    <div>
                                        <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">TBMS-MC60060(BMS): 22lb / 10kg</span><br/>
                                        <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">TP-HS50(Battery): 357lb / 162kg</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="specification-box-3" class="tab-content">
                            <div class="flex flex-col px-5 ">
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5 border-b border-[#C8C8C83D] ">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Component</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">TBMS-MC60060(BMS)+4*TP-HS50(Battery)</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Usable capacity</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">18kWh</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Nominal voltage</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">204.8V</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Max. charge/discharge current</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">54A</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Max. operating altitude</span>
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">9843ft /3000m</span>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  border-b border-[#C8C8C83D]">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Dimensions (W*H*D)</span>
                                    <div>
                                        <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">TBMS-MC60060(BMS): 33.5*5.2*5.8in / 850*133*148mm</span><br/>
                                        <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">4*TP-HS50(Battery): 33.5*47.2*5.8in / 850*1200*148mm</span><br/>
                                        <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Base: 33.5*2.2*5.8in / 850*55*148mm</span>
                                    </div>
                                </div>
                                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5  ">
                                    <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">Net weight</span>
                                    <div>
                                        <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">TBMS-MC60060(BMS): 22lb / 10kg</span><br/>
                                        <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">TP-HS50(Battery): 476lb / 216kg</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-[40%] bg-[#FFF] flex justify-center items-end">
                    <img class="lazyload" data-src="{{ asset('/assets/A1Hybrid/t-bat-sys-hv-5-0.webp') }}" alt="solar power battery bank">
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
