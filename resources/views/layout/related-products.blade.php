<section class="bg-primary-white py-24">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-10 md:gap-[90px] ">
            <span class="font-primary font-medium md:text-[48px] text-[32px] leading-[57px] text-primary-black">Other Products</span>
            <div class="grid md:grid-cols-3 gap-5 md:gap-10">
                <?php foreach($otherProducts as $product) { ?>
                <a href='{{ url("/products/".$product->type_slug."/".$product->slug) }}' class="flex flex-col justify-between">
                    <div class="bg-[url(./../assets/A1Hybrid/cardBg.png)] flex justify-center items-center p-6 h-full">
                        <img class="lazyload" data-src="/img/product_images/{{$product->feature_image}}" alt="">
                    </div>
                    <div class="py-5 flex justify-center items-center bg-primary-black">
                        <span class="text-[#EEBB0C] text-[20px] font-primary font-medium leading-[28px]">{{ $product->name }}</span>
                    </div>
                </a>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
