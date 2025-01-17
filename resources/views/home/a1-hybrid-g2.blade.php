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
                @if (!empty($filterProd->feature_image))
                <img 
                    id="currentImage" 
                    data-src="{{ asset('/img/product_images/' . $filterProd->feature_image) }}" 
                    alt="" 
                    class="object-cover rounded-lg shadow-lg w-full h-auto lazyload">
                    @else
                    <p>featured iamge not found</p>
                    @endif
                </div>

                <div class="grid grid-cols-3 lg:flex flex-row items-center gap-5">
                     @foreach ($productSlider as $index => $slider)
                    <img 
                        id="thumb-{{ $index }}" 
                        onclick="selectImage({{ $index }})" 
                        data-src="{{ asset('/assets/related_products/' . $slider->image) }}" 
                        class="lazyload object-cover w-[115px] h-[80px] md:w-[190px] md:h-[120px]" 
                        alt="">
                    @endforeach
                </div>

            </div>
            <div class="flex flex-col gap-10 md:gap-[77px] overflow-y-scroll">
                <div class="flex flex-col gap-3">
                    <div>
                        <span class="font-primary text-lg text-[#EF6818] font-medium uppercase">{{$productCategory->name}}</span>
                    </div>
                    <div class="flex flex-col gap-6  ">
                        <span class="font-primary font-medium text-primary-black text-[42px] leading-[48px] sm:text-[52px] sm:leading-[58px] lg:text-[72px] lg:leading-[80px] xl:text-[80px] xl:leading-[88px]  drop-shadow-2xl">{{$filterProd->name}}</span>
                        <span class="text-primary-black font-secondary text-[18px] leading-[24px]  xl:w-[50%]">{{$filterProd->small_desc}}</span>
                    </div>
                </div>
                <div class="flex flex-col gap-10 md:gap-[64px]">
                    <span class="text-base text-primary-black font-medium font-primary leading-[24px]">Key Features</span>
                    @foreach ($productFeatures as $category => $features)
                    <div class="flex flex-col gap-6">
                        <!-- Display Feature Category -->
                        <span class="text-base font-bold font-secondary leading-[24px]">{{ $category }}</span>
                        <ul class="list-none flex flex-col gap-6">
                            <!-- Display Features -->
                            @foreach ($features as $feature)
                                <li class="flex text-base font-secondary leading-[24px] text-primary-black">
                                <img src="{{ asset('/assets/A1Hybrid/CheckCircle.png') }}" alt="Check" class="w-6 h-6 mr-2">
                                    {{ $feature->feature_key_value }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>


        </div>
    </div>
</section>

<!-- second section -->
<section class="py-24">
  <div class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
    <div class="flex flex-col gap-16">
      <div class="flex flex-col items-center gap-6">
        <span class="font-primary text-lg text-primary-orange font-medium text-center uppercase">{{ $productAssets['product_asset_title']['product_asset_value'] ?? '' }}</span>
        <h2 class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-white font-medium text-center">
          {{ $productAssets['product_asset_sub_title']['product_asset_value'] ?? '' }}
        </h2>
        <p class="font-secondary text-base leading-[24px] text-[#F5F5F5] font-normal lg:w-[70%] text-center">
          {{ $productAssets['product_asset_content']['product_asset_value'] ?? '' }}
        </p>
      </div>
      <div class="flex flex-col lg:flex-row gap-10">
        <div class="flex flex-col gap-6 lg:w-[60%]  border border-[#C8C8C83D]">
          <div class="tabs grid grid-cols-2"> 
            @foreach ($productSpecification as $specLabel => $specs) 
            <button data-tab="{{ Str::slug($specLabel) }}" class="tab-link py-5 border-b border-[#C8C8C8] font-secondary text-xl text-primary-white 
            {{ $loop->first ? 'text-primary-yellow border-primary-yellow' : '' }}">
              {{ $specLabel }}
            </button>
             @endforeach 
            </div>
          <div class="tab-contents"> 
            @foreach ($productSpecification as $specLabel => $specs) 
            <div id="{{ Str::slug($specLabel) }}" class="tab-content {{ $loop->first ? 'active' : '' }}">
              <div class="flex flex-col px-5"> 
                @foreach ($specs as $spec) 
                <div class="w-full flex flex-row justify-between py-6 px-4 items-center gap-5 @if($loop->last) 
                @else
                    border-b border-[#C8C8C83D] 
                @endif ">
                  <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">{{ $spec->specification_key }}</span>
                  <span class="text-[#F5F5F5] text-base leading-[24px] text-[#FFF]">{{ $spec->specification_value }}</span>
                </div> 
                @endforeach 
            </div>
            </div> @endforeach </div>
        </div>
        <div class="lg:w-[40%] bg-[#FFF] flex justify-center items-end">
          <img class="lazyload" data-src="{{ asset('/assets/A1Hybrid/' . $productAssets['product_asset_image_or_video_one']['product_asset_value'] ?? '') }}" alt="">
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
    const images = @json($productSlider->pluck('image')->map(fn($image) => asset('/assets/related_products/' . $image)));

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
