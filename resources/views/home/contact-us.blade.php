@extends('layout.frontend')
@section('page-content')

<section class="pt-16 lg:pt-32 bg-primary-white">
    <div class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col lg:flex-row justify-between gap-10 ">
            <div class="flex flex-col gap-10 w-full lg:gap-10 lg:w-1/2">
                <div class="flex flex-col gap-2">
                    <h1 class="font-primary font-medium text-primary-black text-[42px] leading-[48px] sm:text-[52px] sm:leading-[58px] lg:text-[72px] lg:leading-[80px] xl:text-[80px] xl:leading-[88px] drop-shadow-2xl">Contact Us</h1>
                    <span class="font-secondary text-[20px]  text-primary-black font-medium ">Our team would love to hear from you!</span>
                </div>
                <div id="contact-form">
                    @if(Session::has('success'))
                    <div class="flex flex-col items-center lg:w-[100%]">
                        <div class="px-4 py-3 rounded-lg mb-4 mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-md lg:w-[100%]">
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
                    <div class="flex flex-col items-center lg:w-[100%]">
                        <div class="px-4 py-3 rounded-lg mb-4 mt-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-md  lg:w-[100%]">
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
                    
                    
                        <form id="savecontactForm" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="enquiry_type" id="enquiry_type" value="Contacts">
                        <div class="flex items-center gap-3">
                            <div class="formGroup flex gap-1">
                                <input class="px-2 py-3 border border-[#C8C8C8] bg-transparent font-secondary text-primary-black" id="type" name="type" type="radio" value="homeowner" checked="checked" />
                                <label class="font-secondary font-medium text-primary-black" for="type">I am a Homeowner</label>
                            </div>
                            <div class="formGroup flex gap-1">
                                <input class="px-2 py-3 border border-[#C8C8C8] bg-transparent font-secondary text-primary-black" id="type" name="type" type="radio" value="installer" />
                                <label class="font-secondary font-medium text-primary-black" for="type">I am an Installer</label>
                            </div>
                        </div>
                        <div class="formGroup flex flex-col gap-1">
                            <label class="font-secondary font-medium text-primary-black" for="name">Your Full Name<span style="color:red;">*</span></label>
                            <input class="px-2 py-3 border border-[#C8C8C8] bg-transparent font-secondary text-primary-black" id="name" name="fullName" placeholder="Enter Your Name" type="text" value="{{ old('fullName') }}" />
                            @error('fullName')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <br/>
                        <div class="grid lg:grid-cols-2 gap-4 w-full">
                            <div class="formGroup flex flex-col gap-1">
                                <label class="font-secondary font-medium text-primary-black" for="email">Your Email ID<span style="color:red;">*</span></label>
                                <input class="px-2 py-3 border border-[#C8C8C8] bg-transparent font-secondary text-primary-black" id="email" name="email" placeholder="Enter Your Email" type="email" value="{{ old('email') }}" />
                                @error('email')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="formGroup flex flex-col gap-1">
                            <label class="font-secondary font-medium text-primary-black" for="phone">Your Phone Number<span style="color:red;">*</span></label>
                            <div class="flex items-center gap-2">
                                <select id="countryDropdown" class="w-full md:w-1/2 lg:w-1/3 px-2 py-3  border border-[#C8C8C8] bg-transparent font-secondary text-primary-black">
                                    <option value="91">(+91)</option>
                                </select>
                                <input class="px-2 py-3 border border-[#C8C8C8] bg-transparent font-secondary text-primary-black" id="phone" name="phone" placeholder="Enter Your Phone Number" type="text" value="{{ old('phone') }}" />
                                
                            </div>
                            @error('phone')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            <input type="hidden" id="countryCode" name="countryCode" value="91">
                        </div>

                        </div>
                        <br/>
                        <div class="grid lg:grid-cols-2 gap-4 w-full">
                            <div class="formGroup flex flex-col gap-1">
                                <label class="font-secondary font-medium text-primary-black" for="country">Country<span style="color:red;">*</span></label>
                                <div class="relative w-[100%]">
                                    <input class="w-full px-2 py-3 border border-[#C8C8C8] bg-transparent font-secondary text-primary-black" id="country" name="country" placeholder="Enter Your Country" type="text" value="{{ old('country') }}" />

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
                            <div class="formGroup flex flex-col gap-1">
                                <label class="font-secondary font-medium text-primary-black" for="files">Attachment <span class="text-xs font-semibold">(JPG, GIF, PNG and PDF of max 2MB)</span></label>
                                <input class="w-full px-[9px] py-[9px] border border-[#C8C8C8] bg-transparent font-secondary text-primary-black" type="file" id="files" name="files" placeholder="Attachment" />
                                @error('files')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <br/>
                        <div class="formGroup flex flex-col gap-1">
                            <label class="font-secondary font-medium text-primary-black" for="message">Message<span style="color:red;">*</span></label>
                            <textarea class="px-2 py-3 border border-[#C8C8C8] bg-transparent font-secondary text-primary-black" id="message" name="message" placeholder="Write Your Message Here...">{{ old('message') }}</textarea>
                            @error('message')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <br/>
                        <div class="flex flex-col gap-2 w-full">
                            <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY')}}"></div>
                            @error('g-recaptcha-response')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <br/>
                        <div class="formGroup flex  gap-1">
                            <button
                                type='submit'
                                class="border border-primary-yellow px-6 py-3 bg-primary-yellow rounded-full font-primary text-primary-black font-medium transition-all duration-300 hover:bg-transparent hover:text-primary-black hover:border-primary-black">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="grow h-[630px]">
                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6489225.146606274!2d-124.5845062917413!3d37.16298408809854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8d74e6d951c9b64d%3A0x428c278ac38a6944!2sOlax%20Power%20US!5e0!3m2!1sen!2sin!4v1723722227094!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3170.6145709212997!2d-121.96337382393664!3d37.375295872088664!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fca27c3f7468b%3A0xaa895ba2ad8726bd!2s2908%20Scott%20Blvd%2C%20Santa%20Clara%2C%20CA%2095054%2C%20USA!5e0!3m2!1sen!2sin!4v1728465131187!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>
<section class="py-24 bg-primary-white">
    <div class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            <div class="flex flex-col gap-6 border border-[#C8C8C8] p-6">
                <div class="flex flex-col items-center gap-4">
                    <img class="w-[32px] h-[32px] lazyload" data-src="{{ asset('assets/contact/MapPin.png') }}" alt="MapPin" width="32" height="32">
                    <span class="font-semibold text-[24px] font-primary text-primary-black">Address</span>
                </div>
                <div class="flex items-center">
                    <span class="font-secondary text-[20px] text-center leading-[32px] text-primary-black">2908 Scott Blvd, Santa Clara, CA 95054</span>
                </div>
            </div>
            <div class="flex flex-col gap-6 border border-[#C8C8C8] p-6">
                <div class="flex flex-col items-center gap-4">
                    <img class="w-[32px] h-[32px] lazyload" data-src="{{ asset('assets/contact/Phone.png') }}" alt="Phone" width="32" height="32">
                    <span class="font-semibold text-[24px] font-primary text-primary-black">Telephone</span>
                </div>
                <div class="mx-auto ">
                    <span class="font-secondary text-[20px] text-center  leading-[32px] text-primary-black">+1-877-899-9937</span>
                </div>
            </div>
            <div class="flex flex-col gap-6 border border-[#C8C8C8] p-6">
                <div class="flex flex-col items-center gap-4">
                    <img class="w-[32px] h-[32px] lazyload" data-src="{{ asset('assets/contact/EnvelopeSimple.png') }}" alt="EnvelopeSimple" width="32" height="32">
                    <span class="font-semibold text-[24px] font-primary text-primary-black">Email</span>
                </div>
                <div class="flex items-center">
                    <span class="font-secondary text-[20px] text-center leading-[32px] text-primary-black"> info@Olaxpower.com
                          service.us@Olaxpower.com</span>
                </div>
            </div>
        </div>
    </div>
</section>
<!--<div id="page-loader" class="hidden text-center py-4">
    <svg class="page-spinner animate-spin h-10 w-10 text-primary-yellow mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
    </svg>
</div>-->
<!-- OTP Modal -->
<div id="otpModal" class="fixed inset-0 bg-gray-500 bg-opacity-50 flex items-center justify-center hidden transition-opacity duration-300 opacity-0">
    <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
        <h2 class="text-xl font-semibold mb-4">OTP Verification</h2>
        <p>Your OTP has been sent. Please check your mobile.</p>

        <!-- OTP Input -->
        <div class="mb-4">
            <label for="otp" class="block text-sm font-medium text-gray-700">Enter OTP</label>
            <input type="text" id="otp" name="otp" class="mt-1 p-2 border border-gray-300 rounded w-full" required placeholder="Enter OTP">
            <span id="otpError" class="text-red-500 text-sm hidden">OTP is required</span>
        </div>

        <!-- Submit Button -->
        <button id="verifyOtp" class="mt-4 px-4 py-2  text-black rounded-full " style="background-color: #eebb0c;">Verify OTP</button>
        <!--<button id="closeModal" class="mt-4 px-4 py-2 bg-gray-500 text-black rounded-full ml-2" style="background-color: #eebb0c;">Close</button>-->
    </div>
</div>


<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script type="text/javascript">
    $(document).ready(function () {

        

        $("#savecontactForm").validate({
        ignore: [],
        debug: false,
        rules: {
            fullName: {
                required: true,
                noSpace: true,
                allowedCharacter: true
            },
            email: {
                required: true,
                email: true, // Ensures a valid email format
            },
            phone: {
                required: true,
                noSpace: true,
                minlength: 10,
                maxlength: 15, // Restrict max digits
                digits: true // Only digits allowed
            },
            message: {
                required: true,
                noSpace: true,
            },
            country: {
                required: true,
                noSpace: true,
                allowedCharacter: true
            },
            files: {
                validate_file_type_size: true, // Custom validation for file type and size
            },
        },
        messages: {
            fullName: {
                required: 'Please enter your full name',
            },
            email: {
                required: 'Please enter your email',
                email: 'Please enter a valid email address',
            },
            phone: {
                required: 'Please enter your phone number',
                minlength: 'Your phone number must be at least 10 digits',
                maxlength: 'Your phone number must not exceed 15 digits',
                digits: 'Please enter only numbers',
            },
            message: {
                required: 'Please enter a message',
            },
            country: {
                required: 'Please select a country',
            },
            files: {
                validate_file_type_size: 'Only JPG, GIF, PNG, JPEG, and PDF of max 2MB are allowed',
            },
        },
        
    });
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
        });

        
        $('#savecontactForm').on('submit', function (event) {
            
            event.preventDefault(); 
            const formData = new FormData(this); 

            $.ajax({
                url: '{{ route("frontened.contact.us.save") }}',
                method: 'POST',
                data: formData,
                processData: false, 
                contentType: false,
                success: function (response) {
                    if (response.success) {
                        showModal();
                        $('#savecontactForm')[0].reset();
                    } 
                },
               error: function(xhr, status, error) {
                alert('Something went wrong, please try again.');
            }
            });
        });

        
        $.get('{{ route("countries.get") }}', function (countries) {
            const dropdown = $('#countryDropdown');
            countries.forEach(function (country) {
                dropdown.append(
                    `<option value="${country.phonecode}" data-iso2="${country.sortname}">
                        ${country.name} (+${country.phonecode})
                    </option>`
                );
            });
        });

       
        $('#countryDropdown').on('change', function () {
            const selectedOption = $(this).find(':selected');
            const countryCode = selectedOption.val();
            $('#countryCode').val(countryCode);
        });
        function showModal() {
    const modal = document.getElementById('otpModal');
    modal.classList.remove('hidden', 'opacity-0');
    modal.classList.add('opacity-100');
}

function hideModal() {
    const modal = document.getElementById('otpModal');
    modal.classList.remove('opacity-100');
    modal.classList.add('opacity-0');
    setTimeout(() => modal.classList.add('hidden'), 300); // Hide after the transition ends
}

$('#verifyOtp').on('click', function() {
    var otp = $('#otp').val(); 
    $.ajax({
      url: '{{ route("verify-otp") }}',  
        method: 'POST',
        data: {
            otp: otp,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            alert(response.message);  
            hideModal(); 
        },
        error: function(xhr, status, error) {
            alert(xhr.responseJSON.error);  
        }
    });
});

    });

</script>



@endsection
