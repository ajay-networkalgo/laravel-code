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
    class="bg-primary-white pt-32 bg-[url(./../assets/PocketDongle/heroImg.webp)] bg-cover bg-center bg-no-repeat h-screen">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col justify-center md:flex-row md:justify-between items-center ">
            <div class="flex flex-col justify-center  gap-2 sm:gap-3.5">
                <span
                    class="font-primary text-sm  lg:text-lg text-primary-orange font-medium uppercase">Remote monitoring around the clock
                </span>
                <span
                    class="font-primary text-4xl lg:text-6xl text-center sm:text-justify lg:leading-[70px] text-primary-white font-medium">
                    Pocket Dongle
                </span>
            </div>
            <div class="pt-10"><img class="lazyload" data-src="{{ asset('/assets/PocketDongle/heroImg2.png') }}" alt=""></div>

        </div>

    </div>
</section>

<!-- second section -->
<section class="py-16 md:py-24 bg-primary-white">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-10 md:gap-[90px]">
            <div class="flex flex-col items-center gap-6">
                <span
                    class="font-primary text-lg text-primary-orange font-medium uppercase">the cutting-edge devices</span>
                <h2
                    class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-black font-medium sm:w-[80%] xl:w-[70%] 2xl:w-[60%] text-center">
                    Remote Monitoring and Management for your Data
                </h2>
                <p
                    class="font-secondary text-base leading-[24px] lg:w-[60%] text-primary-black text-center">
                    Introducing our game-changing accessories: Pocket Dongles! These cutting-edge devices are designed to bring a new level of convenience and control to your renewable energy experience. With Pocket Wi-Fi, Pocket LAN, and Pocket 4G options, say goodbye to limitations and hello to seamless connectivity. Our Pocket Dongles effortlessly plug into your inverter, unlocking a world of remote monitoring and management for your data, right from the palm of your hand!
                </p>
            </div>

            <div class="flex md:justify-center">
                <ul class="list-none flex flex-col md:flex-row tems-center gap-6 md:gap-20">
                    <div class=" flex flex-col gap-6">
                        <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                            <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                            Real-Time Display
                        </li>
                        <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                            <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                            Functionality Control
                        </li>
                        <li class="flex text-base  font-secondary leading-[24px] text-primary-black">
                            <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                            Plug & Play Installation
                        </li>
                    </div>
                    <div class=" flex flex-col gap-6">
                        <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                            <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                            Years Of Historical Data
                        </li>
                        <li class="flex text-base  font-secondary leading-[24px] text-primary-black items-center">
                            <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                            View Financial Savings
                        </li>
                        <li class="flex text-base  font-secondary leading-[24px] text-primary-black">
                            <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                            Email System Alerts
                        </li>
                    </div>

                </ul>
            </div>
        </div>
    </div>
</section>

<!-- third section  -->

<section class="py-10 md:py-24 bg-primary-white">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-10 md:gap-[90px]">
            <div class="flex flex-col items-center gap-6">
                <h2
                    class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-black font-medium md:w-[80%] xl:w-[60%] text-center">
                    Choose the Best options for your Home
                </h2>

            </div>
            <div class="  flex flex-col items-center gap-10 lg:gap-[90px]">
                <div class="tabs grid grid-cols-3 gap-5 md:gap-10 lg:gap-20 md:w-[80%]">
                    <button
                        data-tab="pv-inverter"
                        class="tab-link py-6 px-5 flex flex-col items-center justify-between gap-3 md:gap-6  font-secondary text-xl text-primary-white bg-[#C8C8C84D] ">
                        <img class="lazyload" data-src="{{ asset('/assets/PocketDongle/img1.png') }}" alt="">
                        <span class="font-primary font-medium text-[16px] md:text-[24px] md:leading-[28px] text-primary-black">Pocket WiFi</span>
                    </button>
                    <button
                        data-tab="energy-storage"
                        class="tab-link py-6 px-5 flex flex-col justify-between items-center gap-3 md:gap-6  font-secondary text-xl text-primary-white ">
                        <img class="lazyload" data-src="{{ asset('/assets/PocketDongle/img2.png') }}" alt="">
                        <span class="font-primary font-medium text-[16px] md:text-[24px] md:leading-[28px] text-primary-black">Pocket LAN</span>
                    </button>
                    <button
                        data-tab="ev-charger"
                        class="tab-link py-6 px-5 flex flex-col justify-between items-center gap-3 md:gap-6  font-secondary text-xl text-primary-white ">
                        <img class="lazyload" data-src="{{ asset('/assets/PocketDongle/img3.png') }}" alt="">
                        <span class="font-primary font-medium text-[16px] md:text-[24px] md:leading-[28px] text-primary-black">Pocket 4G</span>
                    </button>
                </div>

                <div class="tab-contents">
                    <!-- pv inverter content -->
                    <div id="pv-inverter" class="tab-content active">
                        <div class="flex flex-col items-center justify-center gap-[60px]">
                            <p class="font-secondary lg:text-[24px] text-lg leading-[31px] text-primary-black text-center lg:w-[60%]">
                                Harness the power of WiFi with our Pocket WiFi dongle, connect to a local network within 50m of the installation to enable access to the SolaX Cloud monitoring platform.
                            </p>
                            <ul class="list-none flex flex-col md:flex-row md:items-center gap-6 md:gap-20 lg:w-[70%] mx-auto">
                                <div class=" flex flex-col gap-6 md:w-[50%]">
                                    <li class="flex text-sm lg:text-base  font-secondary leading-[24px] text-primary-black items-center">
                                        <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                        Quick installation with "Plug & Play" function
                                    </li>
                                    <li class="flex text-sm lg:text-base  font-secondary leading-[24px] text-primary-black items-center">
                                        <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                        IP65 dust prevention water proofing designs
                                    </li>
                                    <li class="flex text-sm lg:text-base  font-secondary leading-[24px] text-primary-black">
                                        <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                        Stable data transmission and good reliability
                                    </li>
                                    <li class="flex text-sm lg:text-base  font-secondary leading-[24px] text-primary-black">
                                        <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                        Multiple antenna adaptations according to the situation
                                    </li>
                                </div>
                                <div class=" flex flex-col gap-6 md:w-[50%]">
                                    <li class="flex text-sm lg:text-base  font-secondary leading-[24px] text-primary-black items-center">
                                        <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                        Offline data storage and resuming
                                    </li>
                                    <li class="flex text-sm lg:text-base  font-secondary leading-[24px] text-primary-black items-center">
                                        <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                        10 second live data monitoring
                                    </li>
                                    <li class="flex text-sm lg:text-base  font-secondary leading-[24px] text-primary-black">
                                        <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                        Modbus TCP support
                                    </li>
                                    <li class="flex text-sm lg:text-base  font-secondary leading-[24px] text-primary-black">
                                        <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                        IEEE2030.5 support
                                    </li>
                                </div>

                            </ul>
                        </div>
                    </div>

                    <!-- energy storage system -->
                    <div id="energy-storage" class="tab-content">

                        <div class="flex flex-col items-center justify-center gap-[60px]">
                            <p class="font-secondary lg:text-[24px] text-lg leading-[31px] text-primary-black text-center lg:w-[60%]">
                                If WiFi isn’t suitable for your situation, the Pocket LAN enables you to connect to your network via an ethernet cable. Ethernet allows for a much more stable connection with less interference.
                            </p>
                            <ul class="list-none flex flex-col md:flex-row md:items-center gap-6 md:gap-20 lg:w-[70%] mx-auto">
                                <div class=" flex flex-col gap-6 md:w-[50%]">
                                    <li class="flex text-sm lg:text-base  font-secondary leading-[24px] text-primary-black items-center">
                                        <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                        Quick installation with "Plug & Play" function
                                    </li>
                                    <li class="flex text-sm lg:text-base  font-secondary leading-[24px] text-primary-black items-center">
                                        <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                        IP65 dust prevention water proofing designs
                                    </li>
                                    <li class="flex text-sm lg:text-base  font-secondary leading-[24px] text-primary-black">
                                        <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                        Stable data transmission and good reliability
                                    </li>
                                    <li class="flex text-sm lg:text-base  font-secondary leading-[24px] text-primary-black">
                                        <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                        IEEE2030.5 support
                                    </li>
                                </div>
                                <div class=" flex flex-col gap-6 md:w-[50%]">
                                    <li class="flex text-sm lg:text-base  font-secondary leading-[24px] text-primary-black items-center">
                                        <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                        Offline data storage and resuming
                                    </li>
                                    <li class="flex text-sm lg:text-base  font-secondary leading-[24px] text-primary-black items-center">
                                        <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                        10 second live data monitoring
                                    </li>
                                    <li class="flex text-sm lg:text-base  font-secondary leading-[24px] text-primary-black">
                                        <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                        Modbus TCP support
                                    </li>
                                </div>

                            </ul>
                        </div>
                    </div>

                    <!-- EV Charger -->
                    <div id="ev-charger" class="tab-content">
                        <div class="flex flex-col items-center justify-center gap-[60px]">
                            <p class="font-secondary lg:text-[24px] text-lg leading-[31px] text-primary-black text-center lg:w-[60%]">
                                No network? No problem, our SolaX Pocket 4G dongle allows you to use a 4G connection to monitor your system without the option of connecting to a local network. (This product is not available in the UK)
                            </p>
                            <ul class="list-none flex flex-col md:flex-row md:items-center gap-6 md:gap-20 lg:w-[70%] mx-auto">
                                <div class=" flex flex-col gap-6 md:w-[50%]">
                                    <li class="flex text-sm lg:text-base  font-secondary leading-[24px] text-primary-black items-center">
                                        <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                        Quick installation with "Plug & Play" function
                                    </li>
                                    <li class="flex text-sm lg:text-base  font-secondary leading-[24px] text-primary-black items-center">
                                        <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                        IP65 dust prevention water proofing designs
                                    </li>
                                    <li class="flex text-sm lg:text-base  font-secondary leading-[24px] text-primary-black">
                                        <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                        Stable data transmission and good reliability
                                    </li>
                                    <li class="flex text-sm lg:text-base  font-secondary leading-[24px] text-primary-black">
                                        <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                        Multi-communication operator support
                                    </li>
                                </div>
                                <div class=" flex flex-col gap-6 md:w-[50%]">
                                    <li class="flex text-sm lg:text-base  font-secondary leading-[24px] text-primary-black items-center">
                                        <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                        Offline data storage and resuming
                                    </li>
                                    <li class="flex text-sm lg:text-base  font-secondary leading-[24px] text-primary-black items-center">
                                        <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                        10 second live data monitoring
                                    </li>
                                    <li class="flex text-sm lg:text-base  font-secondary leading-[24px] text-primary-black">
                                        <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                        Modbus TCP support
                                    </li>
                                    <li class="flex text-sm lg:text-base  font-secondary leading-[24px] text-primary-black">
                                        <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                        IEEE2030.5 support
                                    </li>
                                </div>

                            </ul>
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
        <div class="flex flex-col gap-10 md:gap-[50px] xl:gap-[90px]">
            <div class="flex flex-col items-center gap-6">
                <span
                    class="font-primary text-base md:text-lg text-primary-orange font-medium text-center uppercase">Working with DataHub 1000</span>
                <h2
                    class="font-primary text-[24px] md:text-4xl lg:text-6xl lg:leading-[70px] text-primary-white font-medium text-center">
                    SolaX Cloud Intelligent Monitoring
                </h2>
            </div>

            <div class="flex flex-col gap-10">
                <div class="flex flex-col items-center xl:flex-row justify-between gap-10 md:gap-[90px]">
                    <div
                        class="bg-[url(./../assets/Energy_Storage/bg-dark.png)] xl:w-[50%] flex justify-center px-8 py-10">
                        <img class="lazyload" data-src="{{ asset('/assets/PocketDongle/pocket.png') }}" alt="" />
                    </div>
                    <div class="flex flex-col gap-[14px] xl:w-[50%]">
                        <div class="flex flex-col gap-10">

                            <div class="flex flex-col gap-5">
                                <span
                                    class="font-secondary text-base md:text-lg leading-[21px] text-[#F5F5F5]">Whether it’s for residential systems or commercial PV systems, centralized management and monitoring of PV systems saves time and money. With the SolaX Cloud, PV system operators and installers can always view key and up to date data.

                                </span>
                                <span
                                    class="font-secondary text-base md:text-lg leading-[21px] text-[#F5F5F5]">
                                    Designed with the end-user and also the installers in mind, the SolaX Cloud is the perfect real-time monitoring solution. Control systems through the cloud and perform key inverter maintenance and updates from anywhere in the world.</span>
                            </div>

                            <ul class="list-none flex flex-col gap-6">
                                <li class="flex text-base  font-secondary leading-[24px] text-primary-white items-center">
                                    <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                    Visualised Energy Graphs
                                </li>
                                <li class="flex text-base  font-secondary leading-[24px] text-primary-white items-center">
                                    <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                    Geo Location Weather Information
                                </li>
                                <li class="flex text-base  font-secondary leading-[24px] text-primary-white">
                                    <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                    Remote Access Inverter Control
                                </li>
                                <li class="flex text-base  font-secondary leading-[24px] text-primary-white">
                                    <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                    Compatible with Any Web Browse
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@include('layout.download-products')

<!-- fourth section -->
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
                        "bg-[#C8C8C84D]"
                    )
                );
                link.classList.add("bg-[#C8C8C84D]");

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
