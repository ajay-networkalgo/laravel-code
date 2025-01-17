@extends('layout.frontend')
@section('page-content')
<section class=" bg-cover bg-no-repeat h-screen" style="background-image: url('{{ asset('/assets/blog/' . $blogspagecontent['blogs_banner_image']['value'] ?? '') }}')">>
  <div class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto h-full">
    <div class="flex justify-center items-center h-full">
      <div class="hero-content-top flex flex-col items-center gap-4">
        <h1 class="font-primary text-primary-white text-[42px] leading-[48px] sm:text-[52px] sm:leading-[58px] lg:text-[72px] lg:leading-[80px] xl:text-[80px] xl:leading-[88px] text-center">{{ $blogspagecontent['blogs_section_title']['value'] ?? '' }}</h1>
        <p class="font-secondary font-medium text-lg lg:text-xl text-primary-white text-center lg:max-w-[42%]">
        {{ $blogspagecontent['blogs_section_content']['value'] ?? '' }}
        </p>
      </div>
    </div>
  </div>
</section>
<section class="bg-primary-white lg:py-24 md:py-16 py-10">
  <div class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto h-full">
    <div class="flex flex-col md:gap-16 gap-10">
      <!-- <div class="overflow-x-scroll py-3">
        <ul class="flex items-center lg:gap-4 gap-2">
          <li>
            <a href="{{ route('blogs.frontened.index','') }}" class="px-6 py-2 rounded-full font-secondary font-medium whitespace-nowrap {{ Route::currentRouteName() == 'blogs.frontened.index' && !request()->route('slug') ? 'bg-primary-orange text-primary-white' : 'text-primary-black' }}">All Blogs</a>
          </li>
          <li>
            <a href="{{ route('blogs.frontened.index','Olax-accessories') }}" class="px-6 py-2 rounded-full font-secondary font-medium whitespace-nowrap {{ Route::currentRouteName() == 'blogs.frontened.index' && request()->route('slug') == 'Olax-accessories' ? 'bg-primary-orange text-primary-white' : 'text-primary-black' }}">Olax Accessories</a>
          </li>
          <li>
            <a href="{{ route('blogs.frontened.index','installers') }}" class="px-6 py-2 rounded-full font-secondary font-medium whitespace-nowrap {{ Route::currentRouteName() == 'blogs.frontened.index' && request()->route('slug') == 'installers' ? 'bg-primary-orange text-primary-white' : 'text-primary-black' }}">Installers</a>
          </li>
          <li>
            <a href="{{ route('blogs.frontened.index','homeowners') }}" class="px-6 py-2 rounded-full font-secondary font-medium whitespace-nowrap {{ Route::currentRouteName() == 'blogs.frontened.index' && request()->route('slug') == 'homeowners' ? 'bg-primary-orange text-primary-white' : 'text-primary-black' }}">Homeowners</a>
          </li>
          <li>
            <a href="{{ route('blogs.frontened.index','innovation') }}" class="px-6 py-2 rounded-full font-secondary font-medium {{ Route::currentRouteName() == 'blogs.frontened.index' && request()->route('slug') == 'innovation' ? 'bg-primary-orange text-primary-white' : 'text-primary-black' }}">Innovation</a>
          </li>
        </ul>
      </div> -->
      <div>
        <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-4 gap-y-8" id="blog-list">
          <?php if(count($blog) > 0){?>
            <?php foreach($blog as $blog_item){ ?>
              <li>
                <a class="flex flex-col gap-4" href="/blogs/{{ $blog_item->slug }}">
                  <div class="flex flex-col gap-4">
                    <div class="h-[250px] lg:h-[300px] overflow-hidden">
                        <!--h-full on img--->
                      @foreach($blog_item->images as $image)
                        <img class="w-full lazyload" data-src="/img/blog_images/feature_image/{{$image->images}}" alt="blog_pic" width="416" height="297" />
                      @endforeach
                    </div>
                    <div class="flex gap-4 items-center">
                      <!-- <span class="px-2 py-1 bg-primary-orange rounded-full font-secondary text-xs text-primary-white">
                        {{ $blog_type[$blog_item->type] }}
                      </span> -->
                      <!-- <span class="font-secondary text-xs text-primary-black">{{$blog_item->date}}</span> -->
                      <span class="font-secondary font-semibold text-xs text-primary-white px-2 py-1 bg-primary-orange rounded-full">
                            @php
                            $formattedDate = Carbon\Carbon::createFromFormat('Y-m-d', $blog_item->date)->format('m/d/Y');
                            @endphp
                            {{$formattedDate}}</span>
                    </div>
                  </div>
                  <div class="flex flex-col gap-4">
                    <h3 class="font-primary font-medium text-xl lg:text-2xl text-primary-black">
                      {{$blog_item->title}}
                    </h3>
                    <?php
                      $cleanedText = preg_replace('/<img[^>]*>/', '', $blog_item->description);
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
      <?php if(count($blog) > 0){?>
      <!-- more blog -->
      <div class="flex justify-center">
        <button class="flex justify-center bg-primary-yellow border border-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium flex items-center gap-2 w-full md:w-auto transition-all duration-300 hover:bg-transparent hover:text-primary-black hover:border-primary-black" id="load-more">
          <span>More Blogs</span>
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
      fetch(`/load-more-blogs/`+slug+`?skip=${skip}`, {
        method: 'GET',
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
        },
      })
      .then(response => response.text())
      .then(data => {
        if(data){
          document.getElementById('blog-list').insertAdjacentHTML('beforeend', data);
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
