@extends('layout.frontend')
@section('page-content')
<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:300,400,500');

    /* body {
  margin: 0;
  padding: 0;
  background-color: #FFF;
  height: 100vh;
  width: 100vw;
  display: flex;
  flex-flow: column wrap;
  justify-content: center;

  font-family: 'Montserrat', sans-serif;
}
.container {
  display: flex;
  flex-flow: row wrap;
} */
    .container__title {
        width: 100%;
        color: #000;
        margin-bottom: 12px;
        font-weight: 400;
    }

    .select-dropdown {
        position: relative;
        display: inline-block;
        max-width: 100%;
    }

    .select-dropdown__button {
        padding: 10px 35px 10px 15px;
        background-color: #fff;
        color: #616161;
        border: 1px solid #cecece;
        border-radius: 3px;
        cursor: pointer;
        /* width: 210px; */
        text-align: left;
    }

    .select-dropdown__button::focus {
        outline: none;
    }

    .select-dropdown__button .caret-down {
        position: absolute;
        right: 10px;
        top: 12px;
    }

    .select-dropdown__list {
        position: absolute;
        display: block;
        left: 0;
        right: 0;
        max-height: 300px;
        overflow: auto;
        margin: 0;
        padding: 0;
        list-style-type: none;
        opacity: 1;
        pointer-events: none;
        transform-origin: top left;
        transform: scale(1, 0);
        transition: all ease-in-out 0.3s;
        z-index: 2;
    }

    .select-dropdown__list.active {
        opacity: 010;
        pointer-events: auto;
        transform: scale(1, 1);
    }

    .select-dropdown__list-item {
        display: block;
        list-style-type: none;
        padding: 10px 15px;
        background: #151515;
        border-top: 1px solid #e6e6e6;
        font-size: 14px;
        line-height: 1.4;
        cursor: pointer;
        color: #f5f5f5;
        transition: all ease-in-out 0.3s;
    }
</style>
<section class="bg-primary-white pt-[120px] sm:pt-56 sm:pb-24 pb-10">
    <div class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-10">
            <div class="flex flex-col gap-5 lg:flex-row justify-between lg:items-center">
                <div class="hero-content-top flex flex-col gap-4">
                    <h1 class="font-primary font-medium text-primary-black text-[42px] leading-[48px] sm:text-[52px] sm:leading-[58px] lg:text-[72px] lg:leading-[80px] xl:text-[80px] xl:leading-[88px] drop-shadow-2xl">Downloads</h1>
                    <p class="font-secondary font-medium text-lg lg:text-xl text-primary-black">
                        Technical / Marketing Material
                    </p>
                </div>
                <div class="lg:w-[25%]">
                    <form method="GET" action="{{ route('frontened.search') }}">
                        <div class="flex items-center gap-2 py-3 px-4 border overflow-hidden border-[#1515154D]">
                            <img class="lazyload" data-src="{{ asset('assets/download/SearchOutline.svg') }}" alt="SearchOutline" />
                            <input class="bg-transparent outline-none w-full" name="query" id="query" placeholder="Search Files" type="text" />
                        </div>
                    </form>
                </div>
            </div>
            <!-- <div class="w-64 py-2">
                <label for="language" class="block text-sm font-medium text-gray-700">Choose Language</label>
                <select class="mt-1 block w-full pl-3 pr-20 py-4 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="language" id="language">
                    <option value="English">English</option>
                    <option value="Global">Global</option>
                    <option value="Deutsch">Deutsch</option>
                    <option value="Francais">Francais</option>
                    <option value="Nederlands">Nederlands</option>
                    <option value="Polski">Polski</option>
                    <option value="Italiano">Italiano</option>
                    <option value="Japanese">Japanese</option>
                    <option value="Türkçe">Türkçe</option>
                    <option value="Português">Português</option>
                    <option value="Chinese">Chinese</option>
                    <option value="Spanish">Spanish</option>
                    <option value="Ukraine">Ukraine</option>
                </select>
            </div> -->

            <div>
            <div class="lg:w-64 py-2">
                <span class="container__title block text-sm font-medium text-gray-700">Choose Language</span>
                <div class="select-dropdown w-full lg:w-[320px]">
                    <button href="#" role="button" data-value="English" class="select-dropdown__button w-full"><span>English</span> <svg class="caret-down" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000000" viewBox="0 0 256 256">
                            <path d="M213.66,101.66l-80,80a8,8,0,0,1-11.32,0l-80-80A8,8,0,0,1,53.66,90.34L128,164.69l74.34-74.35a8,8,0,0,1,11.32,11.32Z"></path>
                        </svg>
                    </button>
                    <ul class="select-dropdown__list w-full" name="language" id="language">
                        <li data-value="English" class="active select-dropdown__list-item">English</li>
                        <li data-value="Global" class="select-dropdown__list-item">Global</li>
                        <li data-value="Deutsch" class="select-dropdown__list-item">Deutsch</li>
                        <li data-value="Francais" class="select-dropdown__list-item">Francais</li>
                        <li data-value="Nederlands" class="select-dropdown__list-item">Nederlands</li>
                        <li data-value="Polski" class="select-dropdown__list-item">Polski</li>
                        <li data-value="Italiano" class="select-dropdown__list-item">Italiano</li>
                        <li data-value="Japanese" class="select-dropdown__list-item">Japanese</li>
                        <li data-value="Türkçe" class="select-dropdown__list-item">Türkçe</li>
                        <li data-value="Português" class="select-dropdown__list-item">Português</li>
                        <li data-value="Chinese" class="select-dropdown__list-item">Chinese</li>
                        <li data-value="Spanish" class="select-dropdown__list-item">Spanish</li>
                        <li data-value="Ukraine" class="select-dropdown__list-item">Ukraine</li>
                    </ul>
                </div>
            </div>
            </div>

            <div>
                <ul class="accordion flex flex-col gap-5" id="all-downloads">
                </ul>
            </div>
            </li>
            </ul>
        </div>
    </div>
    </div>
</section>
@include('layout.newsletter')
<script type="text/javascript">
    var siteUrl = "{{ config('app.site_url') }}";
    function fetchProductInfoDataByLanguage(language) {
        var posturl = siteUrl + "downloads/product-info/" + language;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: posturl, // Adjust to your actual endpoint
            method: 'POST',
            // data: {
            //     _token: '{{ csrf_token() }}',
            // },
            success: function(data) {
                $("#all-downloads").html(data);
            },
            error: function(error) {
                console.error("Error fetching data:", error);
            }
        });
    }
    $(document).ready(function() {
        fetchProductInfoDataByLanguage('English');
    });
</script>
<script>
    const dropdownButton = document.querySelector('.select-dropdown__button');
    const dropdownList = document.querySelector('.select-dropdown__list');
    const dropdownItems = document.querySelectorAll('.select-dropdown__list-item');

    dropdownButton.addEventListener('click', function() {
        dropdownList.classList.toggle('active');
    });

    dropdownItems.forEach(item => {
        item.addEventListener('click', function() {
            const itemValue = this.getAttribute('data-value');

            fetchProductInfoDataByLanguage(itemValue);

            dropdownButton.querySelector('span').textContent = this.textContent;
            dropdownButton.setAttribute('data-value', itemValue);
            dropdownList.classList.remove('active');
        });
    });
</script>
@endsection
