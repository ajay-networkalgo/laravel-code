@extends('layout.frontend')
@section('page-content')
<section class="bg-[url('./../assets/Distributor/distributor.webp')] bg-cover bg-center bg-no-repeat h-screen">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto h-full">
        <div class="flex justify-center items-center h-full">
            <div class="hero-content-top flex flex-col items-center gap-4">
                <h1
                    class="font-primary font-medium text-primary-white text-[42px] leading-[48px] sm:text-[52px] sm:leading-[58px] lg:text-[72px] lg:leading-[80px] xl:text-[80px] xl:leading-[88px] text-center">
                    Find a Distributor
                </h1>
                <p
                    class="font-secondary font-medium text-lg lg:text-xl text-primary-white text-center lg:max-w-[56%]">
                    Reliable service and product support to Olax customers
                </p>
            </div>
        </div>
    </div>
</section>

<!-- second section -->
<section class="py-24 bg-primary-white">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-10 lg:gap-[90px]">
            <div class="flex flex-col items-center gap-4">
                <span class="font-primary text-base sm:text-lg text-[#EF6818] font-medium uppercase">whenever and wherever needed</span>
                <span class="font-primary font-medium text-primary-black text-[42px] leading-[48px] sm:text-[52px] sm:leading-[58px] lg:text-[72px] lg:leading-[80px] text-center drop-shadow-2xl">Where To Buy</span>

            </div>
            <div class="w-full h-[630px]">
                <iframe class="lazyload" data-src="https://www.google.com/maps/d/embed?mid=1aSRSIl8rEGJ4AxmLJ0wn564UFOHZC6s&ehbc=2E312F&noprof=1" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

<!-- third section -->
<section class="py-24 bg-primary-black">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-[90px]">
            <div class="flex flex-col items-center gap-4">
                <span class="font-primary text-lg text-[#EF6818] font-medium uppercase">playing a key role</span>
                <span class="font-primary font-medium text-primary-white text-[42px] leading-[48px] sm:text-[52px] sm:leading-[58px] lg:text-[72px] lg:leading-[80px] text-center drop-shadow-2xl">Our Distributors</span>

            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
                <!-- <div class="flex flex-col justify-between items-center  border border-[#C8C8C83D]">
                    <div class="py-[50px] px-[73px]">
                        <img class="lazyload" data-src="{{ asset('assets/Distributor/disCard1.png') }}" alt="">
                    </div>
                    <button class="font-lg font-medium text-primary-black w-full text-lg py-4 px-2.5 bg-[#EEBB0C] text-center">Visit Website</button>
                </div> -->

                <!--  -->
                <div class="flex flex-col justify-between items-center border border-[#C8C8C83D]">
                    <div class="py-[50px] px-[73px]">
                        <img class="lazyload" data-src="{{ asset('assets/Distributor/card2.png') }}" width="149" height="60" alt="card2">
                    </div>
                    <button onclick="window.open('https://www.emporiaenergy.com/')" class="font-lg font-medium text-primary-black w-full text-lg py-4 px-2.5 bg-[#EEBB0C] text-center">Visit Website</button>
                </div>
                <!--  -->

                <div class="flex flex-col justify-between items-center border border-[#C8C8C83D]">
                    <div class="py-[50px] px-[73px]">
                        <img class="lazyload" data-src="{{ asset('assets/Distributor/card3.png') }}" width="149" height="65" alt="card3">
                    </div>
                    <button onclick="window.open('https://www.cleanpowerstore.com/')" class="font-lg font-medium text-primary-black w-full text-lg py-4 px-2.5 bg-[#EEBB0C] text-center">Visit Website</button>
                </div>
                <!--  -->
                <div class="flex flex-col justify-between items-center border border-[#C8C8C83D]">
                    <div class="py-[50px] px-[73px]">
                        <img src="{{ asset('assets/Distributor/card4.png') }}" alt="card4"  width="232" height="31" >
                    </div>
                    <button onclick="window.open('https://acessolarcorp.com/')" class="font-lg font-medium text-primary-black w-full text-lg py-4 px-2.5 bg-[#EEBB0C] text-center">Visit Website</button>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- forth section -->

<section class="py-24 bg-primary-white">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-10 lg:gap-[90px]">
            <div class="flex flex-col items-center gap-4">
                <span class="font-primary lg:text-lg text-[#EF6818] font-medium uppercase">Still got some questions?</span>
                <span class="font-primary font-medium text-primary-black text-[42px] leading-[48px] sm:text-[52px] sm:leading-[58px] lg:text-[72px] lg:leading-[80px] text-center drop-shadow-2xl">Leave us a Message</span>

            </div>

            <div id="contact-form">
                @if(Session::has('success'))
                <div class="flex flex-col items-center lg:w-[100%] mb-10">
                    <div class="px-4 py-3 rounded-lg mb-4 mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-md lg:w-[60%]">
                        <i class="text-gray-600"></i>
                        <button type="button" class="absolute top-0 right-0 p-2" data-dismiss="alert" aria-label="Close">
                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                        <p class="m-0">{{ session('success') }}</p>
                    </div>
                </div>
                @endif
                @if(Session::has('error'))
                <div class="flex flex-col items-center lg:w-[100%] mb-10">
                    <div class="px-4 py-3 rounded-lg mb-4 mt-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-md  lg:w-[60%]">
                        <i class="text-gray-600"></i>
                        <button type="button" class="absolute top-0 right-0 p-2" data-dismiss="alert" aria-label="Close">
                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                        <p class="m-0">{{ session('error') }}</p>
                    </div>
                </div>
                @endif
                <form action="{{ route('frontened.contact.us.save') }}" method="post" id="contactForm" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="enquiry_type" id="enquiry_type" value="Distributor">
                    <input type="hidden" name="type" id="type" value="0">
                    <div class="flex flex-col gap-6 items-center lg:w-[60%] mx-auto">
                        <div class="flex flex-col gap-2 w-full">
                            <label class="font-secondary text-primary-black" for="">Your Full Name<span style="color:red;">*</span></label>
                            <input class="bg-transparent py-[18px] px-[10px] border border-[#C8C8C8] w-full" id="fullName" name="fullName" type="text" placeholder="Enter Your Name" value="{{ old('fullName') }}">
                            @error('fullName')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="grid lg:grid-cols-2 w-full gap-4">
                            <div class="flex flex-col gap-2 w-full">
                                <label class="font-secondary text-primary-black" for="">Your Email ID<span style="color:red;">*</span></label>
                                <input class="bg-transparent py-[18px] px-[10px] border border-[#C8C8C8] w-full" id="email" name="email" type="email" placeholder="Enter Your Email" value="{{ old('email') }}">
                                @error('email')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col gap-2 w-full">
                                <label class="font-secondary text-primary-black" for="">Your Phone Number<span style="color:red;">*</span></label>
                                <input class="bg-transparent py-[18px] px-[10px] border border-[#C8C8C8] w-full" id="phone" name="phone" type="text" placeholder="Enter Your Phone Number" value="{{ old('phone') }}" maxlength="15">
                                @error('phone')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="grid lg:grid-cols-2 w-full gap-4">
                            <div class="flex flex-col gap-2 w-full">
                                <label class="font-secondary text-primary-black" for="">Country<span style="color:red;">*</span></label>
                                <!-- <input class="bg-transparent py-[18px] px-[10px] border border-[#C8C8C8] w-full" id="country" name="country" type="text" placeholder="Enter country" value="{{ old('country') }}"> -->
                                <div class="relative w-[100%]">
                                <input class="w-full bg-transparent py-[18px] px-[10px] border border-[#C8C8C8] w-full" id="country" name="country" type="text" placeholder="Enter Your Country" value="{{ old('country') }}">

                                    <ul id="dropdown-list" class="absolute w-full bg-white border border-gray-300 rounded-md mt-2 max-h-60 overflow-y-auto hidden">
                                        <?php foreach($countries as $c) { ?>
                                        <li class="dropdown-item px-4 py-2 hover:bg-gray-100 cursor-pointer">{{$c}}</li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                @error('country')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col gap-2 w-full">
                                <label class="font-secondary text-primary-black" for="">Attachment (<span class="text-xs font-semibold">Only JPG, GIF, PNG, JPEG and PDF of max 2MB</span>)</label>
                                <input class="bg-transparent py-[15px] px-[10px] border border-[#C8C8C8] w-full" id="files" name="files" type="file">
                                @error('files')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-col gap-2 w-full">
                            <label class="font-secondary text-primary-black" for="">Your Message<span style="color:red;">*</span></label>
                            <textarea class="font-secondary text-primary-black bg-transparent py-[18px] px-[10px] border border-[#C8C8C8] w-full" id="message" name="message" placeholder="Write Your Message Here...">{{ old('message') }}</textarea>
                            @error('message')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex flex-col gap-2 w-full">
                            <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY')}}"></div>
                            @error('g-recaptcha-response')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <button id="submit" class="border border-primary-yellow px-6 py-3 bg-primary-yellow rounded-full font-primary text-primary-black font-medium transition-all duration-300 hover:bg-transparent hover:text-primary-black hover:border-primary-black" type="submit">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@include('layout.newsletter')

<div id="page-loader" class="hidden text-center py-4">
    <svg class="page-spinner animate-spin h-10 w-10 text-primary-yellow mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
    </svg>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection
