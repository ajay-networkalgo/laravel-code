@extends('layout.frontend')
@section('page-content')
<section class="bg-primary-white pt-32 lg:pt-56 pb-24">
    <div class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-10 lg:gap-24">
            <div class="hero-content-top flex flex-col items-center gap-4">
                <h1 class="font-primary font-medium text-primary-black text-[42px] leading-[48px] sm:text-[52px] sm:leading-[58px] lg:text-[72px] lg:leading-[80px] xl:text-[80px] xl:leading-[88px] drop-shadow-2xl">Get in Touch</h1>
                <p class="font-secondary font-medium text-lg lg:text-xl text-primary-black">SolaX Team is here for you</p>
            </div>
            <div>
                <ul class="accordion flex flex-col gap-5">
                    <?php if (count($globalContact) > 0) { ?>
                        <?php foreach ($globalContact as $global_item) { ?>
                            <li class="accordion-item">
                                <button class="accordion-header px-6 py-4 bg-primary-black inline-block w-full flex items-center gap-2">
                                    <div class="relative w-6 h-6">
                                        <img class="absolute transition-opacity duration-300" src="{{ asset('assets/download/PlusCircle.svg') }}"
                                            alt="PlusCircle" />
                                        <img class="absolute transition-opacity duration-300 opacity-0" src="{{ asset('assets/download/MinusCircle.svg') }}" alt="MinusCircle" />
                                    </div>
                                    <h3 class="font-primary font-semibold text-primary-yellow text-lg">{{ $global_item->country->name }}</h3>
                                </button>
                                <div class="accordion-content border-[#C8C8C8] overflow-hidden transition-all duration-300 max-h-0">
                                    <ul class="py-6 px-5 md:px-14 flex flex-col gap-6 md:max-w-[60%]">
                                        <li class="grid md:grid-cols-2">
                                            <span class="font-secondary font-bold font-primary-black">Address</span>
                                            <span class="font-secondary font-primary-black">{{ $global_item->address }}</span>
                                        </li>
                                        <li class="grid md:grid-cols-2">
                                            <span class="font-secondary font-bold font-primary-black">Email</span>
                                            <span class="font-secondary font-primary-black">{{ $global_item->email }}</span>
                                        </li>
                                        <li class="grid md:grid-cols-2">
                                            <span class="font-secondary font-bold font-primary-black">Service Hotline</span>
                                            <span class="font-secondary font-primary-black">{{ $global_item->service_hotline }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        <?php } ?>
                    <?php } else { ?>
                        <p style="font-weight: bold;">No Record Found</p>
                    <?php } ?>
                </ul>
            </div>
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
                        <input type="hidden" name="enquiry_type" id="enquiry_type" value="Global Contacts">
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
                                    <div class="relative w-[100%]">
                                    <input class="bg-transparent py-[18px] px-[10px] border border-[#C8C8C8] w-full" id="country" name="country" type="text" placeholder="Enter Your Country" value="{{ old('country') }}">

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
                            <button class="border border-primary-yellow px-6 py-3 bg-primary-yellow rounded-full font-primary text-primary-black font-medium border border-primary-yellow transition-all duration-300 hover:bg-transparent hover:text-primary-black hover:border-primary-black" type="submit">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
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
<script>
    document.querySelectorAll(".accordion-header").forEach((button) => {
        button.addEventListener("click", () => {
            const content = button.nextElementSibling;
            const plusIcon = button.querySelector('img[alt="PlusCircle"]');
            const minusIcon = button.querySelector('img[alt="MinusCircle"]');

            // Toggle content
            if (content.style.maxHeight && content.style.maxHeight !== "0px") {
                content.style.maxHeight = "0px";
                if (content.classList.contains("accordion-content")) {
                    content.classList.remove("border");
                }
                plusIcon.classList.remove("opacity-0");
                minusIcon.classList.add("opacity-0");
            } else {
                content.style.maxHeight = "2000px";
                if (content.classList.contains("accordion-content")) {
                    content.classList.add("border");
                }
                plusIcon.classList.add("opacity-0");
                minusIcon.classList.remove("opacity-0");
            }
        });
    });
</script>
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
