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
        /* box-shadow: 0px 5px 7px 0px #1515151A; */
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
<section class="bg-primary-white pt-24 pb-24">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex xl:flex-row flex-col items-center gap-10">
            <div class=" lg:w-[80%] xl:w-[40%] flex flex-col gap-6">
                <span
                    class="font-primary text-lg text-primary-orange font-medium uppercase">Our Products</span>
                <h1
                    class="font-primary font-medium text-primary-black text-[42px] leading-[48px] sm:text-[52px] sm:leading-[58px] lg:text-[72px] lg:leading-[80px] xl:text-[80px] xl:leading-[88px] drop-shadow-2xl">
                    Full Range of Solar Products
                </h1>
                <div>
                    <button
                        onclick="document.getElementById('product-view').scrollIntoView({ behavior: 'smooth' });"
                        class="bg-gradient-to-r from-[#EEBB0C] to-[#EF6818] px-6 py-3 rounded-full font-primary text-primary-black font-medium flex justify-center items-center gap-2 w-full md:w-auto">
                        <span>Scroll Down</span>
                    </button>
                </div>
            </div>

            <div class="grid  md:grid-cols-2 gap-5 grow tabs ">
                <div class="relative md:row-span-2">
                    <div>
                        <img
                            class="w-full lazyload"
                            data-src="{{ asset('/assets/ourProduct/productImage.png') }}"
                            alt="energy storage battery" />
                    </div>
                    <div
                        class="absolute w-full h-full bg-[#15151580] top-0 left-0 backdrop-blur py-8 px-5 flex flex-col justify-between">
                        <div>
                            <h3
                                class="font-primary font-medium text-3xl text-primary-white">
                                Energy Storage Inverter
                            </h3>
                            <button
                                onclick="document.getElementById('product-view').scrollIntoView({ behavior:  'smooth' });"
                                id="check-now-1"
                                class="font-secondary font-bold text-primary-yellow text-sm underline">
                                Check Now
                            </button>
                        </div>
                        <div class="flex justify-center">
                            <img
                                class="lazyload"
                                data-src="{{ asset('/assets/ourProduct/a1-hybrid-g2.webp') }}"
                                alt="solar power battery backup" />
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div>
                        <img
                            class="w-full lazyload"
                            data-src="{{ asset('/assets/ourProduct/productImage_2.png') }}"
                            alt="battery storage system for solar" />
                    </div>
                    <div
                        class="absolute w-full h-full bg-[#15151580] top-0 left-0 backdrop-blur py-8 px-5 flex items-end justify-between">
                        <div>
                            <h3
                                class="font-primary font-medium text-3xl text-primary-white">
                                Battery System
                            </h3>
                            <button
                                onclick="document.getElementById('product-view').scrollIntoView({ behavior: 'smooth' });"
                                id="check-now-2"
                                class="font-secondary font-bold text-primary-yellow text-sm underline">
                                Check Now
                            </button>
                        </div>
                        <div class="flex justify-center items-center">
                            <img class="h-[150px] lg:h-auto lazyload"
                                data-src="{{ asset('/assets/ourProduct/t-bat-sys-hv-5-0.webp') }}"
                                alt="solar power battery bank" />
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div>
                        <img
                            class="w-full lazyload"
                            data-src="{{ asset('/assets/ourProduct/productImage_3.png') }}"
                            alt="energy storage battery" />
                    </div>
                    <div
                        class="absolute w-full h-full bg-[#15151580] top-0 left-0 backdrop-blur py-8 px-5 flex flex-col">
                        <div>
                            <h3
                                class="font-primary font-medium text-3xl text-primary-white">
                                Accessories
                            </h3>
                            <button
                                onclick="document.getElementById('product-view').scrollIntoView({ behavior: 'smooth' });"
                                id="check-now-3"
                                class="font-secondary font-bold text-primary-yellow text-sm underline">
                                Check Now
                            </button>
                        </div>
                        <div class="flex justify-end absolute bottom-5 right-2 lg:static">
                            <img
                                class="lazyload" data-src="{{ asset('/assets/ourProduct/Accessories.png') }}"
                                alt="energy storage for solar power" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  -->

<section class="bg-primary-white py-10 md:pt-24  md:pb-24">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col items-center gap-5" id="product-view">
            <div class="tabs grid lg:grid-cols-4 gap-3 w-full bg-[#C8C8C829] border border-[#C8C8C873]  rounded-[8px] p-2">
                <?php foreach ($productCat as $type) { ?>
                    <button
                        data-tab="{{ $type->slug }}"
                        class="tab-link py-4 px-5 flex flex-col lg:items-center justify-between gap-3 md:gap-6 font-secondary text-xl text-primary-white rounded-[4px] <?php if ($type->slug == $category) echo 'bg-[#F5F5F5] shadow-lg'; ?>">
                        <span
                            class="font-secondary text-[16px] md:text-[20px] md:leading-[24px] text-primary-black tracking-[-3%]">{{ $type->name }}</span>
                    </button>
                <?php } ?>
            </div>

            <div
                class="tab-contents py-[60px] px-5 bg-[#C8C8C829] border border-[#C8C8C873] rounded-[8px] w-full">
                <!-- energy_storage_system content -->
                <?php foreach ($productCat as $type) { ?>
                    <div id="{{$type->slug}}" class="tab-content <?php if ($type->slug == $category) echo 'active'; ?>">
                        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
                            <?php foreach ($type->productCat as $cat) {
                                foreach ($cat->productItem as $item) {
                            ?>
                                    <div>
                                        <a href="{{ url('/products/'.$type->slug.'/'.$item->slug)}}">
                                            <div
                                                class="bg-[url('./../assets/ourProduct/tabBg.png')] px-[50px] py-8">
                                                <img class="lazyload" data-src="/img/product_images/{{$item->feature_image}}" alt="" />
                                            </div>
                                            <div class="py-3.5 px-4 flex flex-col gap-1 border-x border-b border-[#C8C8C899]">
                                                <span
                                                    class="text-[#EF6818] font-primary font-medium text-[12px] tracking-[4%]">{{$cat->name}}</span>
                                                <span
                                                    class="text-primary-black font-primary font-semibold tracking-[1px] text-[16px] leading-[24px]">{{$item->name}}</span>
                                            </div>
                                        </a>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

@if($category == 'energy-storage-inverter')
<!-- Energy System Invertor Features  -->
<section class="py-10 md:py-24" id="energy-storage-invertor-feature">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-10 md:gap-[90px] xl:gap-[140px]">
            <div class="flex flex-col items-center gap-6">
                <span
                    class="font-primary text-base md:text-lg text-primary-orange font-medium text-center uppercase">features</span>
                <h2
                    class="font-primary text-[24px] md:text-4xl lg:text-6xl lg:leading-[70px] text-primary-white font-medium text-center">
                    Why Olax Products
                </h2>
            </div>

            <div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-5">
                <div class="flex flex-col h-full w-full">
                    <div class="w-full">
                        <img class="w-full h-auto object-cover lazyload" data-src="{{ asset('/assets/ourProduct/cardone.png') }}" alt="battery storage for house" />
                    </div>
                    <div class="p-6 flex flex-col flex-grow justify-between gap-4 border-x border-b border-[#C8C8C83D]">
                        <span class="font-secondary text-[20px] leading-[24px] text-[#EEBB0C]">High Efficiency</span>
                        <span class="font-secondary text-base leading-[24px] text-primary-white">
                            Olax Power Energy Storage Inverters have high efficiency and can convert a large amount of DC power into AC power for use in homes or businesses.
                        </span>
                    </div>
                </div>
                <div class="flex flex-col h-full w-full">
                    <div class="w-full">
                        <img class="w-full h-auto object-cover lazyload" data-src="{{ asset('/assets/ourProduct/cardTwo.png') }}" alt="solar panel battery storage" />
                    </div>
                    <div class="p-6 flex flex-col flex-grow justify-between gap-4 border-x border-b border-[#C8C8C83D]">
                        <span class="font-secondary text-[20px] leading-[24px] text-[#EEBB0C]">Reliable Performance</span>
                        <span class="font-secondary text-base leading-[24px] text-primary-white">
                            Olax Power Energy Storage Inverters are known for their reliable performance and can deliver consistent power output in different weather conditions.
                        </span>
                    </div>
                </div>
                <div class="flex flex-col h-full w-full">
                    <div class="w-full">
                        <img class="w-full h-auto object-cover lazyload" data-src="{{ asset('/assets/ourProduct/cardThree.png') }}" alt="home solar power battery bank" />
                    </div>
                    <div class="p-6 flex flex-col flex-grow justify-between gap-4 border-x border-b border-[#C8C8C83D]">
                        <span class="font-secondary text-[20px] leading-[24px] text-[#EEBB0C]">Easy Installation</span>
                        <span class="font-secondary text-base leading-[24px] text-primary-white">
                            Olax Power Energy Storage Inverters are designed for easy installation and can be mounted on any wall or installed in a garage or utility room.
                        </span>
                    </div>
                </div>
                <div class="flex flex-col h-full w-full">
                    <div class="w-full">
                        <img class="w-full h-auto object-cover lazyload" data-src="{{ asset('/assets/ourProduct/cardFour.png') }}" alt="solar electric battery storage" />
                    </div>
                    <div class="p-6 flex flex-col flex-grow justify-between gap-4 border-x border-b border-[#C8C8C83D]">
                        <span class="font-secondary text-[20px] leading-[24px] text-[#EEBB0C]">Multiple Modes</span>
                        <span class="font-secondary text-base leading-[24px] text-primary-white">
                            Olax Power Energy Storage Inverters offer multiple modes of operation, including Grid-tie, Grid-tie with battery backup, and Off-grid modes, giving customers flexibility and options.
                        </span>
                    </div>
                </div>
                <div class="flex flex-col h-full w-full">
                    <div class="w-full">
                        <img class="w-full h-auto object-cover lazyload" data-src="{{ asset('/assets/ourProduct/cardFive.png') }}" alt="solar energy battery storage" />
                    </div>
                    <div class="p-6 flex flex-col flex-grow justify-between gap-4 border-x border-b border-[#C8C8C83D]">
                        <span class="font-secondary text-[20px] leading-[24px] text-[#EEBB0C]">Affordable Prices</span>
                        <span class="font-secondary text-base leading-[24px] text-primary-white">
                            Olax Power Energy Storage Inverters are priced competitively, making them an affordable option for customers looking to invest in renewable energy.
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@if($category == 'triple-power-battery')
<!-- Batter Features  -->
<section class="py-10 md:py-24" id="battery-feature">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-10 md:gap-[90px] xl:gap-[140px]">
            <div class="flex flex-col items-center gap-6">
                <span
                    class="font-primary text-base md:text-lg text-primary-orange font-medium text-center uppercase">features</span>
                <h2
                    class="font-primary text-[24px] md:text-4xl lg:text-6xl lg:leading-[70px] text-primary-white font-medium text-center">
                    Why Olax Products
                </h2>
            </div>

            <div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-5">
                <div class="flex flex-col h-full w-full">
                    <div class="w-full">
                        <img class="w-full h-auto object-cover lazyload" data-src="{{ asset('/assets/ourProduct/cardone.png') }}" alt="battery storage for house" />
                    </div>
                    <div class="p-6 flex flex-col flex-grow justify-between gap-4 border-x border-b border-[#C8C8C83D]">
                        <span class="font-secondary text-[20px] leading-[24px] text-[#EEBB0C]">High Capacity</span>
                        <span class="font-secondary text-base leading-[24px] text-primary-white">
                            Olax solar batteries have a high storage capacity, with options ranging from 3.3kWh to 17.6kWh. This allows for long-term storage of solar energy and can help reduce dependency on grid power.
                        </span>
                    </div>
                </div>
                <div class="flex flex-col h-full w-full">
                    <div class="w-full">
                        <img class="w-full h-auto object-cover lazyload" data-src="{{ asset('/assets/ourProduct/cardTwo.png') }}" alt="solar panel battery storage" />
                    </div>
                    <div class="p-6 flex flex-col flex-grow justify-between gap-4 border-x border-b border-[#C8C8C83D]">
                        <span class="font-secondary text-[20px] leading-[24px] text-[#EEBB0C]">Advanced Technology</span>
                        <span class="font-secondary text-base leading-[24px] text-primary-white">
                            Olax Power uses advanced battery technology, such as Lithium-ion phosphate batteries, which provide high energy density and long-lasting performance. The Olax batteries also have advanced battery management systems that protect them from overcharging or discharging, ensuring long life.
                        </span>
                    </div>
                </div>
                <div class="flex flex-col h-full w-full">
                    <div class="w-full">
                        <img class="w-full h-auto object-cover lazyload" data-src="{{ asset('/assets/ourProduct/cardThree.png') }}" alt="home solar power battery bank" />
                    </div>
                    <div class="p-6 flex flex-col flex-grow justify-between gap-4 border-x border-b border-[#C8C8C83D]">
                        <span class="font-secondary text-[20px] leading-[24px] text-[#EEBB0C]">Expandable</span>
                        <span class="font-secondary text-base leading-[24px] text-primary-white">
                            The Olax Power energy storage system is modular and expandable, allowing customers to add additional batteries as their energy storage needs grow over time.
                        </span>
                    </div>
                </div>
                <div class="flex flex-col h-full w-full">
                    <div class="w-full">
                        <img class="w-full h-auto object-cover lazyload" data-src="{{ asset('/assets/ourProduct/cardFour.png') }}" alt="solar electric battery storage" />
                    </div>
                    <div class="p-6 flex flex-col flex-grow justify-between gap-4 border-x border-b border-[#C8C8C83D]">
                        <span class="font-secondary text-[20px] leading-[24px] text-[#EEBB0C]">User-Friendly</span>
                        <span class="font-secondary text-base leading-[24px] text-primary-white">
                            Olax Power energy storage systems come with user-friendly software that allows for easy monitoring and control of energy usage. Customers can view data and receive notifications via their mobile phone, tablet, or personal computer.
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@if($category == 'accessories')
<!-- Accessories Features  -->
<section class="py-10 md:py-24" id="battery-feature">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-10 md:gap-[90px] xl:gap-[140px]">
            <div class="flex flex-col items-center gap-6">
                <span
                    class="font-primary text-base md:text-lg text-primary-orange font-medium text-center uppercase">features</span>
                <h2
                    class="font-primary text-[24px] md:text-4xl lg:text-6xl lg:leading-[70px] text-primary-white font-medium text-center">
                    Why Olax Products
                </h2>
            </div>

            <div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-5">
                <div class="flex flex-col h-full w-full">
                    <div class="w-full">
                        <img class="w-full h-auto object-cover lazyload" data-src="{{ asset('/assets/ourProduct/cardone.png') }}" alt="battery storage for house" />
                    </div>
                    <div class="p-6 flex flex-col flex-grow justify-between gap-4 border-x border-b border-[#C8C8C83D]">
                        <span class="font-secondary text-[20px] leading-[24px] text-[#EEBB0C]">Olax Power Accessories Stand</span>
                        <span class="font-secondary text-base leading-[24px] text-primary-white">
                            Olax Power accessories stand out because they are designed to enhance the performance of their solar power systems. They offer real-time monitoring and control, which allows homeowners to optimize their energy usage and maximize their savings.
                        </span>
                    </div>
                </div>
                <div class="flex flex-col h-full w-full">
                    <div class="w-full">
                        <img class="w-full h-auto object-cover lazyload" data-src="{{ asset('/assets/ourProduct/cardTwo.png') }}" alt="solar panel battery storage" />
                    </div>
                    <div class="p-6 flex flex-col flex-grow justify-between gap-4 border-x border-b border-[#C8C8C83D]">
                        <span class="font-secondary text-[20px] leading-[24px] text-[#EEBB0C]">Additionally</span>
                        <span class="font-secondary text-base leading-[24px] text-primary-white">
                            Additionally, the accessories are easy to install and use, making them accessible to a wide range of customers. Olax Power also offers excellent customer support and warranties for their accessories, ensuring a reliable and hassle-free experience for their customers.
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@if($faq->isNotEmpty())
<section class="py-10 md:py-24 bg-primary-white" id="energy-storage-invertor-faq">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col items-center gap-6 md:gap-10 lg:gap-[90px]">
            <div class="flex flex-col items-center gap-4 md:gap-6">
                <span
                    class="font-primary text-base md:text-lg text-primary-orange font-medium text-center uppercase">FAQ’s</span>
                <h2
                    class="font-primary text-[24px] md:text-4xl lg:text-6xl lg:leading-[70px] text-primary-black font-medium text-center">
                    Frequently Asked Questions
                </h2>
            </div>
            <ul class="accordion flex flex-col gap-0 lg:w-[80%] xl:w-[70%]">
                @foreach($faq as $index => $faq)
                <li class="accordion-item py-4 {{ $index === 0 ? '' : 'pt-0 md:pt-10 border-t border-[#C8C8C8]' }}">
                    <button
                        class="accordion-header py-4 inline-block w-full flex justify-between gap-2">
                        <h3
                            class="font-primary font-semibold text-primary-black text-lg leading-[24px] text-justify w-[90%]">
                            {!! $faq['feature_title'] !!}
                        </h3>
                        <div class="relative w-6 h-6">
                            <img
                                class="faq-plus absolute transition-opacity duration-300 opacity-1 w-full h-full"
                                src="{{ asset('/assets/ourProduct/plus.png') }}"
                                alt="solar panel energy storage" />
                            <img
                                class="faq-minus absolute transition-opacity duration-300 opacity-0 lazyload" src="{{ asset('/assets/ourProduct/MinusCircle.png') }}"
                                alt="solar panel battery bank" />
                        </div>
                    </button>

                    <div
                        class="accordion-content overflow-hidden transition-all duration-300 max-h-0">
                        <span
                            class="font-secondary text-primary-black text-[18px] leading-[28px]">{!! $faq['feature_content'] !!}</span>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
@endif
@include('layout.newsletter')

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const tabLinks = document.querySelectorAll(".tab-link");
        const tabContents = document.querySelectorAll(".tab-content");

        tabLinks.forEach((link) => {
            link.addEventListener("click", () => {
                const tab = link.getAttribute("data-tab");

                tabLinks.forEach((link) => link.classList.remove("bg-[#F5F5F5]", "shadow-lg"));
                link.classList.add("bg-[#F5F5F5]", "shadow-lg");

                tabContents.forEach((content) => {
                    content.classList.remove("active");
                    if (content.getAttribute("id") === tab) {
                        content.classList.add("active");
                    }
                });
            });
        });
    });
    //
    // Event listeners for "Check Now" buttons
    document.querySelector("#check-now-1").addEventListener("click", () => {
        document.querySelector("[data-tab='energy-storage-inverter']").click();
    });

    document.querySelector("#check-now-2").addEventListener("click", () => {
        document.querySelector("[data-tab='triple-power-battery']").click();
    });

    document.querySelector("#check-now-3").addEventListener("click", () => {
        document.querySelector("[data-tab='accessories']").click();
    });
    // for FAQ - ourProduct

    document.querySelectorAll(".accordion-header").forEach((button, index) => {
        const content = button.nextElementSibling;
        const plusIcon = button.querySelector('.faq-plus');
        const minusIcon = button.querySelector('.faq-minus');

        // If it's the first item, open it by default
        if (index === 0) {
            content.style.maxHeight = "2000px"; // Open the first accordion content
            plusIcon.classList.add("opacity-0");
            minusIcon.classList.remove("opacity-0");
        }

        button.addEventListener("click", () => {
            // Close all other accordion contents
            document.querySelectorAll(".accordion-content").forEach((item) => {
                if (item !== content && item.style.maxHeight && item.style.maxHeight !== "0px") {
                    item.style.maxHeight = "0px";
                    const otherPlusIcon = item.previousElementSibling.querySelector('.faq-plus');
                    const otherMinusIcon = item.previousElementSibling.querySelector('.faq-minus');

                    otherPlusIcon.classList.remove("opacity-0");
                    otherMinusIcon.classList.add("opacity-0");
                }
            });

            // Toggle the clicked accordion content
            if (content.style.maxHeight && content.style.maxHeight !== "0px") {
                content.style.maxHeight = "0px";
                plusIcon.classList.remove("opacity-0");
                minusIcon.classList.add("opacity-0");
            } else {
                content.style.maxHeight = "2000px"; // Open the accordion content
                plusIcon.classList.add("opacity-0");
                minusIcon.classList.remove("opacity-0");
            }
        });
    });
</script>
@endsection
