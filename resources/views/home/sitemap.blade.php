@extends('layout.frontend')
@section('page-content')
<!-- hero section -->
<section class="pb-24 pt-24 md:pt-24 bg-primary-white">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-10 lg:gap-[60px]">
            <div class="lg:pb-2 border-b border-[#C8C8C8]">
                <h1 class="font-primary font-medium text-[42px] leading-[56px]  lg:text-[30px] lg:leading-[40px] text-primary-black">Sitemap</h1>
            </div>
            <div class="bg-white p-6 shadow-lg grid grid-cols-1 md:grid-cols-2 gap-3 lg:gap-8">
                <ul class="space-y-4">
                    <li class="flex gap-3 items-center">
                        <div class="w-[24px]">
                            <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" />
                        </div>
                        <a href="{{ env('SITE_URL') }}" class="font-primary text-lg text-[#EF6818] font-medium uppercase">Home</a>
                    </li>
                    <li class="flex gap-3 items-center">
                        <div class="w-[24px]">
                            <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" />
                        </div>
                        <a href="{{ env('SITE_URL') }}homeowners" class="font-primary text-lg text-[#EF6818] font-medium uppercase">Homeowners</a>
                    </li>
                    <li class="flex gap-3 items-center">
                        <div class="w-[24px]">
                            <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" />
                        </div>
                        <a href="{{ env('SITE_URL') }}installer" class="font-primary text-lg text-[#EF6818] font-medium uppercase">Installers</a>
                    </li>
                    <li class="flex gap-3 items-center">
                        <div class="w-[24px]">
                            <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" />
                        </div>
                        <a href="{{ env('SITE_URL') }}about" class="font-primary text-lg text-[#EF6818] font-medium uppercase">About Solax</a>
                    </li>
                    <li class="flex gap-3 items-center">
                        <div class="w-[24px]">
                            <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" />
                        </div>
                        <a href="{{ env('SITE_URL') }}events" class="font-primary text-lg text-[#EF6818] font-medium uppercase">Events</a>
                    </li>
                    <li class="flex gap-3 items-center">
                        <div class="w-[24px]">
                            <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" />
                        </div>
                        <a href="{{ env('SITE_URL') }}case" class="font-primary text-lg text-[#EF6818] font-medium uppercase">Success Stories</a>
                    </li>
                    <li class="flex gap-3 items-center">
                        <div class="w-[24px]">
                            <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" />
                        </div>
                        <a href="{{ env('SITE_URL') }}sustainability" class="font-primary text-lg text-[#EF6818] font-medium uppercase">Sustainability</a>
                    </li>
                    <li class="flex gap-3 items-center">
                        <div class="w-[24px]">
                            <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" />
                        </div>
                        <a href="{{ env('SITE_URL') }}usa-contact" class="font-primary text-lg text-[#EF6818] font-medium uppercase">Contact Us</a>
                    </li>
                    <li class="flex gap-3 items-center">
                        <div class="w-[24px]">
                            <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" />
                        </div>
                        <a href="{{ env('SITE_URL') }}products" class="font-primary text-lg text-[#EF6818] font-medium uppercase">Products</a>
                    </li>
                    <?php if ($products->count() > 0) {
                        foreach ($products as $product) {
                    ?>
                            <!-- Energy system storage -->
                            <li class="flex gap-3 items-center pl-10">
                                <div class="w-[12px]">
                                    <img class="w-full" src="{{ asset('/assets/Point.svg') }}"  alt="home battery for solar panels"/>
                                </div>
                                <a href="{{ env('SITE_URL') }}products/{{$product->slug}}" class="font-primary text-md text-[#EF6818] font-medium uppercase">{{$product->name}}</a>
                            </li>
                            <li class="flex gap-3 items-center">
                                <ul class="pl-10 gap-3">
                                    <?php foreach ($product->productCat as $cat) { ?>
                                        <!-- HYBRID INVERTER -->
                                        <li class="flex gap-3 items-center pl-10">
                                            <div class="w-[15px]">
                                                <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" />
                                            </div>
                                            <a href="javascript:void(0)" class="font-primary text-md text-[#EF6818] font-medium uppercase">{{ $cat->name }}</a>
                                        </li>
                                        <ul class="list-disc pl-20">
                                            <?php foreach ($cat->productItem as $item) { ?>
                                                <!-- A1 HYBRID INVERTER -->
                                                <li class="py-4">
                                                    <a href="{{ env('SITE_URL') }}products/{{$product->slug}}/{{$item->slug}}" class="font-primary text-md text-[#EF6818] font-medium uppercase">{{ $item->name }}</a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                </ul>
                            </li>
                    <?php }
                    } ?>
                    <li class="flex gap-3 items-center">
                        <div class="w-[24px]">
                            <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" />
                        </div>
                        <a href="{{ env('SITE_URL') }}solar-products-used-energy-storage-system" class="font-primary text-lg text-[#EF6818] font-medium uppercase">Energy Storage System</a>
                    </li>
                    <li class="flex gap-3 items-center">
                        <div class="w-[24px]">
                            <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" />
                        </div>
                        <a href="{{ env('SITE_URL') }}blogs" class="font-primary text-lg text-[#EF6818] font-medium uppercase">Blogs</a>
                    </li>
                    <li class="flex gap-3 items-center">
                        <ul class="list-disc pl-10">
                            <?php if ($blogs->count() > 0) {
                                foreach ($blogs as $val) { ?>
                                    <li class="py-1"><a href="{{ env('SITE_URL') }}blogs/{{ $val->slug}}" class="font-primary text-md text-[#EF6818] font-medium uppercase">{{ $val->title }}</a></li>
                            <?php }
                            } ?>
                        </ul>
                    </li>
                    <li class="flex gap-3 items-center">
                        <div class="w-[24px]">
                            <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" />
                        </div>
                        <a href="{{ env('SITE_URL') }}downloads" class="font-primary text-lg text-[#EF6818] font-medium uppercase">Download</a>
                    </li>
                    <li class="flex gap-3 items-center">
                        <div class="w-[24px]">
                            <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" />
                        </div>
                        <a href="{{ env('SITE_URL') }}where-to-buy" class="font-primary text-lg text-[#EF6818] font-medium uppercase">Find a Distributor</a>
                    </li>
                    <li class="flex gap-3 items-center">
                        <div class="w-[24px]">
                            <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" />
                        </div>
                        <a href="{{ env('SITE_URL') }}contacts" class="font-primary text-lg text-[#EF6818] font-medium uppercase">Global Contacts</a>
                    </li>
                    <li class="flex gap-3 items-center">
                        <div class="w-[24px]">
                            <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" />
                        </div>
                        <a href="{{ env('SITE_URL') }}warranty" class="font-primary text-lg text-[#EF6818] font-medium uppercase">Warranty Policy</a>
                    </li>
                    <li class="flex gap-3 items-center">
                        <div class="w-[24px]">
                            <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" />
                        </div>
                        <a href="https://www.solaxcloud.com/#/warranty" class="font-primary text-lg text-[#EF6818] font-medium uppercase">Warranty Registration</a>
                    </li>
                    <li class="flex gap-3 items-center">
                        <div class="w-[24px]">
                            <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" />
                        </div>
                        <a href="https://www.solaxcloud.com/#/login" class="font-primary text-lg text-[#EF6818] font-medium uppercase">SolaX Cloud</a>
                    </li>
                    <li class="flex gap-3 items-center">
                        <div class="w-[24px]">
                            <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" />
                        </div>
                        <a href="https://kb.solaxpower.com/support" class="font-primary text-lg text-[#EF6818] font-medium uppercase">Support</a>
                    </li>
                </ul>
                <ul class="space-y-4">
                    <li class="flex gap-3 items-center">
                        <div class="w-[24px]">
                            <img class="w-full" src="{{ asset('/assets/CheckCircle.svg') }}" alt="home battery for solar panels" />
                        </div>
                        <div class="max-w-[90%]"><a href="{{ env('SITE_URL') }}news" class="font-primary text-lg text-[#EF6818] font-medium uppercase">News</a></div>
                    </li>
                    <li>
                        <ul class="list-disc pl-14">
                            <?php if ($news->count() > 0) {
                                foreach ($news as $val) { ?>
                                    <li class="py-1"><a href="{{ env('SITE_URL') }}news/{{ $val->slug}}" class="font-primary text-md text-[#EF6818] font-medium uppercase">{{ $val->title }}</a></li>
                            <?php }
                            } ?>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- </div> -->


        </div>
    </div>
</section>


<!-- sixth section -->
@include('layout.newsletter')
@endsection
