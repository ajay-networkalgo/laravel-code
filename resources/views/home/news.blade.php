@extends('layout.frontend')
@section('page-content')
<!-- <section class="bg-[url('./../assets/news/news_bg.png')] bg-cover bg-center bg-no-repeat h-screen">
  <div class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto h-full">
    <div class="flex justify-center items-center h-full">
      <div class="hero-content-top flex flex-col items-center gap-4">
        <h1 class="font-primary text-primary-white text-[42px] leading-[48px] sm:text-[52px] sm:leading-[58px] lg:text-[72px] lg:leading-[80px] xl:text-[80px] xl:leading-[88px] text-center">Olax News</h1>
        <p class="font-secondary font-medium text-lg lg:text-xl text-primary-white text-center lg:max-w-[56%]">
          Stay informed with our up-to-the-minute news coverage. From breaking stories to in-depth analysis, we bring you the latest developments.
        </p>
      </div>
    </div>
  </div>
</section> -->
<section class="relative h-screen overflow-x-hidden">
    <video
        autoplay
        muted
        loop
        id="banner-video"
        poster=""
        class="h-full w-full object-cover">
        <source id="banner-video-src" data-src-desktop="{{ asset('/assets/videos/compressed/' . $newspagecontent['news_banner_video']['value'] ?? '') }}" data-src-mobile="{{ asset('/assets/videos/compressed/' . $newspagecontent['news_mobile_banner_video']['value'] ?? '') }}" type="video/mp4" />
        Your browser does not support the video tag.
    </video>
    <div class="content absolute bg-[#15151580] w-full h-full top-0 left-0">
        <div class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
            <div class="hero-content h-screen flex flex-col items-center gap-6 pt-20 pb-24 justify-end">
                <div class="hero-content-top flex flex-col items-center gap-4">
                    <h1 class="font-primary font-medium text-primary-white text-[32px] leading-[40px] sm:text-[40px] sm:leading-[46px] lg:text-[72px] lg:leading-[80px] xl:text-[80px] xl:leading-[88px] lg:max-w-[65%] text-center drop-shadow-2xl">{{ $newspagecontent['news_banner_video_title']['value'] ?? '' }}</h1>
                    <p class="font-secondary font-medium text-lg lg:text-xl text-primary-white text-center lg:max-w-[56%]">
                    {{ $newspagecontent['news_banner_video_sub_title']['value'] ?? '' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-primary-white py-16 md:py-24">
  <div class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto h-full">
    <div class="flex flex-col gap-16">
      <!-- <div>
        <ul class="flex items-center gap-4">
          <li>
            <a href="{{ route('news.frontened.index','') }}" class="sm:px-6 px-3 rounded-full font-secondary font-medium  {{ Route::currentRouteName() == 'news.frontened.index' && !request()->route('slug') ? 'py-2 bg-primary-orange text-primary-white' : 'text-primary-black' }}">All</a>
          </li>
          <li>
            <a href="{{ route('news.frontened.index','company-news') }}" class="sm:px-6 rounded-full font-secondary font-medium  {{ Route::currentRouteName() == 'news.frontened.index' && request()->route('slug') == 'company-news' ? 'py-2 bg-primary-orange text-primary-white' : 'text-primary-black' }}">Company News</a>
          </li>
          <li>
            <a href="{{ route('news.frontened.index','product-updates') }}" class="sm:px-6 rounded-full font-secondary font-medium  {{ Route::currentRouteName() == 'news.frontened.index' && request()->route('slug') == 'product-updates' ? 'py-2 bg-primary-orange text-primary-white' : 'text-primary-black' }}">Product Updates</a>
          </li>
        </ul>
      </div> -->
      <div>
        <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-4 gap-y-8" id="news-list">
          <?php if(count($news) > 0){?>
            <?php foreach($news as $news_item){ ?>
              <li>
                <a class="flex flex-col gap-4" href="/news/{{ $news_item->slug }}">
                  <div class="flex flex-col gap-4">
                    <div class="h-[250px] lg:h-[300px] overflow-hidden">
                      @foreach($news_item->images as $image)
                        <img class="w-full lazyload" data-src="/img/news_images/feature_image/{{$image->images}}" alt="blog_pic" width="416" height="297" />
                      @endforeach
                    </div>
                    <div class="flex gap-4 items-center">
                      <!-- <span class="px-2 py-1 bg-primary-orange rounded-full font-secondary text-xs text-primary-white">
                        @if($news_item->type == 1)
                          Company News
                        @else
                          Product Updates
                        @endif
                      </span
                      > -->
                      <span class="font-secondary font-semibold text-xs text-primary-white px-2 py-1 bg-primary-orange rounded-full">
                            @php
                            $formattedDate = Carbon\Carbon::createFromFormat('Y-m-d', $news_item->date)->format('m/d/Y');
                            @endphp
                            {{$formattedDate}}</span>
                    </div>
                  </div>
                  <div class="flex flex-col gap-4">
                    <h3 class="font-primary font-medium text-xl lg:text-2xl text-primary-black">
                      {{$news_item->title}}
                    </h3>
                    <?php
                      $cleanedText = preg_replace('/<img[^>]*>/', '', $news_item->description);
                      $plainText = strip_tags($cleanedText);
                      $words = explode(' ', $plainText); // Split the text into an array of words
                      $shortText = html_entity_decode(implode(' ', array_slice($words, 0, 14)));
                    ?>
                    <p class="font-secondary font-medium text-[#444444]">
                      {{$shortText}}
                    </p>
                  </div>
                </a>
              </li>
            <?php }?>
          <?php }else{ ?>
            <p style="font-weight: bold;">No Record Found</p>
          <?php } ?>
        </ul>
      </div>
      <?php if(count($news) > 0){?>
        <div class="flex justify-center">
          <button class="flex justify-center bg-primary-yellow border border-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium flex items-center gap-2 w-full md:w-auto transition-all duration-300 hover:bg-transparent hover:text-primary-black hover:border-primary-black" id="load-more">
            More News
          </button>
        </div>
      <?php } ?>
      <!-- Loader -->
      <div id="loader" class="hidden text-center py-4">
        <svg class="animate-spin h-5 w-5 text-primary-yellow mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
        </svg>
      </div>
    </div>
  </div>
</section>
@include('layout.newsletter')
<script type="text/javascript">
  var slug = '<?php echo request()->route('slug') ? request()->route('slug') : 'all'; ?>';
  document.addEventListener('DOMContentLoaded', function () {
    let skip = 6;
    document.getElementById('load-more').addEventListener('click', function () {
      let button = this;
      let loader = document.getElementById('loader');
      button.classList.add('hidden');
      loader.classList.remove('hidden');
      fetch(`/load-more-news/`+slug+`?skip=${skip}`, {
        method: 'GET',
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
        },
      })
      .then(response => response.text())
      .then(data => {
        if(data){
          document.getElementById('news-list').insertAdjacentHTML('beforeend', data);
          skip += 6;
          button.classList.remove('hidden');
          loader.classList.add('hidden');
        }else{
          loader.classList.add('hidden');
          button.classList.add('hidden');
        }

      })
      .catch(error => {
        console.error('Error:', error);
        button.classList.remove('hidden');
        loader.classList.add('hidden');
      });
    });
  });
</script>
@endsection
