@extends('layout.frontend')
@section('page-content')
<?php
$currentStep = 1;
if ($errors->has('address')) {
    $currentStep = 1;
}
if ($errors->any() && !$errors->has('address') && $errors->hasAny(['firstname', 'lastname', 'email', 'phone'])) {
    $currentStep = 2;
}
if ($errors->any() && !$errors->hasAny(['address', 'firstname', 'lastname', 'email', 'phone'])) {
    $currentStep = 3;
}
?>
<style>
    /* From Uiverse.io by ozgeozkaraa01 */
    /* .container {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f2f2f2;
      } */

    .custom-radio {
        display: grid;
        flex-direction: column;
        gap: 16px;
        background-color: transparent;
        /* overflow: hidden; */
    }

    .custom-radio input[type="radio"] {
        display: none;
    }

    .radio-label {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px 20px;
        cursor: pointer;
        border: solid 1px #c8c8c8;
        transition: background-color 0.3s ease-in-out;
    }

    .radio-circle {
        /* width: 20px;
        height: 20px;
        border: 2px solid #ffcc00;
        border-radius: 50%;
        margin-right: 10px;
        transition: border-color 0.3s ease-in-out,
          background-color 0.3s ease-in-out; */
        display: none;
    }

    .radio-text {
        font-size: 1rem;
        color: #333;
        transition: color 0.3s ease-in-out;
    }

    .custom-radio input[type="radio"]:checked+.radio-label {
        background-color: #151515;
    }

    .custom-radio input[type="radio"]:checked+.radio-label .radio-circle {
        border-color: #151515;
        background-color: #151515;
    }

    .custom-radio input[type="radio"]:checked+.radio-label .radio-text {
        color: #eebb0c;
    }

    /* Hide the default checkbox */
    .container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    .container {
        /* display: block; */
        position: relative;
        cursor: pointer;
        font-size: 20px;
        user-select: none;
    }

    /* Create a custom checkbox */
    .checkmark {
        position: relative;
        top: 0;
        left: 0;
        height: 1.3em;
        width: 1.3em;
        border: 1px solid #606062;
        border-radius: 5px;
        box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.3), 0px 1px 1px rgba(0, 5);
    }

    /* When the checkbox is checked, add a blue background */
    .container input:checked~.checkmark {
        background-color: #ef6818;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the checkmark when checked */
    .container input:checked~.checkmark:after {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Style the checkmark/indicator */
    .container .checkmark:after {
        left: 0.50em;
        top: 0.3em;
        width: 0.25em;
        height: 0.5em;
        border: solid white;
        border-width: 0 0.10em 0.10em 0;
        transform: rotate(45deg);
    }

    /* phone number */
    /* Custom Select Container */
    .custom-select-container {
        position: relative;
        user-select: none;
    }

    .custom-select-trigger {
        display: flex;
        gap: 8px;
        align-items: center;
        padding: 12px;
        border: 1px solid #c8c8c8;
        border-right: none;
        background-color: transparent;
        cursor: pointer;
    }

    .custom-arrow {
        font-size: 12px;
        color: #151515;
    }

    /* Custom Options Styling */
    .custom-options {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background-color: white;
        border: 1px solid #c8c8c8;
        display: none;
        flex-direction: column;
        z-index: 10;
    }

    .custom-option {
        padding: 10px;
        cursor: pointer;
        background-color: white;
        color: #000;
    }

    .custom-option:hover,
    .custom-option.selected {
        background-color: #f0f0f0;
        /* Change this to any color you prefer */
    }

    .custom-select-container.open .custom-options {
        display: flex;
    }

    /* custom datePicker */
    .calendar-box {
        position: relative;
    }

    .calendar {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        /* position: absolute;
        z-index: 1;
        display: none; */
    }

    .header {
        background-color: #eebb0c;
        color: #151515;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    #prevBtn,
    #nextBtn {
        background: none;
        border: none;
        color: #f5f5f5;
        cursor: pointer;
        font-size: 16px;
    }

    #monthYear {
        font-size: 18px;
        font-weight: bold;
    }

    .days {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 5px;
        padding: 10px;
        font-weight: bold;
    }

    .day {
        padding: 14px;
        border-radius: 50%;
        text-align: center;
        cursor: pointer;
    }

    @media (max-width: 480px) {
        .day {
            padding: 8px;
        }
    }

    .day.current {
        background-color: #eebb0c;
        color: #151515;
    }

    .day.selected {
        background-color: #eebb0c;
        color: #151515;
    }

    .day.disabled {
        /* color: #c8c8c8; */
        /* Example: Grey out disabled dates */
        cursor: not-allowed;
    }
</style>
<section class="bg-primary-white pt-20 relative">
    <div class="flex">
        <div
            class="w-full lg:w-[40%] max-w-xs mx-auto sm:max-w-md md:max-w-2xl lg:max-w-none lg:px-16 xl:px-20 py-16">
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
            <form method="post" class="" id="multi-step-form" action="/book-consultation">
                <!-- step-1 -->
                @csrf <!-- This generates the hidden CSRF token field -->
                <div class="step {{ $errors->has('address') ? 'block' : 'hidden'}}" id="step1">
                    <div class="flex flex-col gap-2">
                        <h2
                            class="font-primary text-primary-black font-medium text-4xl">
                            Free Consultation
                        </h2>
                        <p class="font-secondary text-primary-black font-medium">
                            Schedule a 30 minute online consultation with a SolaX Expert
                        </p>
                    </div>

                    <div
                        class="px-2.5 border border-[#C8C8C8] flex items-center gap-2 mt-10">
                        <img class="lazyload" data-src="{{ asset('/assets/book-schedule/MagnifyingGlass.svg') }}" alt="search" />
                        <input
                            onkeydown="return (event.keyCode!=13);"
                            class="bg-transparent focus:outline-none font-secondary text-primary-black w-full py-4"
                            placeholder="Enter Your Address"
                            name="address"
                            id="address"
                            type="text"
                            value="{{ old('address') }}" />
                    </div>
                    @error('address')
                    <div class="error text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror

                    <div class="mt-10 flex flex-col gap-4">
                        <h3
                            class="font-primary font-medium text-primary-black text-2xl">
                            Select Product
                        </h3>
                        <div class="custom-radio">
                            <input
                                type="radio"
                                id="radio-1"
                                name="product"
                                checked=""
                                value="Battery Only"
                                {{ old('product') == 'Battery Only' ? 'checked' : '' }} />
                            <label class="radio-label" for="radio-1">
                                <div class="radio-circle"></div>
                                <span
                                    class="radio-text font-secondary font-bold text-primary-black">Battery Only</span>
                            </label>
                            <input
                                type="radio"
                                id="radio-2"
                                name="product"
                                value="Battery with Existing Solar"
                                {{ old('product') == 'Battery with Existing Solar' ? 'checked' : '' }} />
                            <label class="radio-label" for="radio-2">
                                <div class="radio-circle"></div>
                                <span
                                    class="radio-text font-secondary font-bold text-primary-black">Battery with Existing Solar</span>
                            </label>
                            <input
                                type="radio"
                                id="radio-3"
                                name="product"
                                value="Battery with New Solar"
                                {{ old('product') == 'Battery with New Solar' ? 'checked' : '' }} />
                            <label class="radio-label" for="radio-3">
                                <div class="radio-circle"></div>
                                <span
                                    class="radio-text font-secondary font-bold text-primary-black">Battery with New Solar</span>
                            </label>
                            <input
                                type="radio"
                                id="radio-4"
                                name="product"
                                value="Not Sure Yet"
                                {{ old('product') == 'Not Sure Yet' ? 'checked' : '' }} />
                            <label class="radio-label" for="radio-4">
                                <div class="radio-circle"></div>
                                <span
                                    class="radio-text font-secondary font-bold text-primary-black">Not Sure Yet</span>
                            </label>
                            @error('product')
                            <div class="error text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- <div
                        class="mt-16 bg-primary-yellow flex justify-center items-center">
                        <button
                            type="button"
                            class="next-step py-5 w-full"
                            class="font-secondary text-primary-black text-lg font-bold">
                            Next
                        </button>
                    </div> -->
                    <!-- mt-10 updated also rounded-full next btn -->
                    <div class="mt-10 flex justify-center items-center">
                        <button
                            type="button"
                            class="next-step py-5 w-full rounded-full bg-primary-yellow font-secondary text-primary-black text-lg font-bold">
                            Next
                        </button>
                    </div>

                    <div class="flex items-center justify-center gap-2 mt-6">
                        <div
                            class="w-2 h-2 rounded-full bg-[#C8C8C8] overflow-hidden">
                            <div class="w-full h-full bg-primary-yellow"></div>
                        </div>
                        <div
                            class="w-2 h-2 rounded-full bg-[#C8C8C8] overflow-hidden">
                            <div class="w-full h-full"></div>
                        </div>
                        <div
                            class="w-2 h-2 rounded-full bg-[#C8C8C8] overflow-hidden">
                            <div class="w-full h-full"></div>
                        </div>
                    </div>
                </div>
                <!-- step-2 -->

                <div class="step {{ $errors->any() && !$errors->has('address') && $errors->hasAny(['firstname', 'lastname', 'email', 'phone']) ? 'block' : 'hidden' }}" id="step2">
                    <div>
                        <h2
                            class="font-primary text-primary-black font-medium text-4xl">
                            Enter Personal Details
                        </h2>
                    </div>

                    <div class="flex flex-col gap-6 mt-10">
                        <!-- divide in two part -->
                        <div class="grid grid-cols-2 gap-3">
                            <div class="flex flex-col gap-2">
                                <label
                                    class="font-secondary text-sm text-primary-black"
                                    for="">First Name</label>
                                <input
                                    placeholder="Enter Your First Name"
                                    name="firstname"
                                    class="px-2 py-4 border border-[#C8C8C8] font-secondary text-primary-black w-full bg-transparent"
                                    type="text"
                                    value="{{ old('firstname') }}" />
                                @error('firstname')
                                <div class="error text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col gap-2">
                                <label
                                    class="font-secondary text-sm text-primary-black"
                                    for="">Last Name</label>
                                <input
                                    placeholder="Enter Your Last Name"
                                    name="lastname"
                                    class="px-2 py-4 border border-[#C8C8C8] font-secondary text-primary-black w-full bg-transparent"
                                    type="text"
                                    value="{{ old('lastname') }}" />
                                @error('lastname')
                                <div class="error text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label
                                class="font-secondary text-sm text-primary-black"
                                for="">Email Address</label>
                            <input
                                placeholder="Enter Your Email"
                                name="email"
                                class="px-2 py-4 border border-[#C8C8C8] font-secondary text-primary-black w-full bg-transparent"
                                type="email"
                                value="{{ old('email') }}" />
                            @error('email')
                            <div class="error text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- <div class="flex flex-col gap-2">
                            <label
                                class="font-secondary text-sm text-primary-black"
                                for="">Confirm Email Address</label>
                            <input
                                name="last_name"
                                class="px-2 py-4 border border-[#C8C8C8] font-secondary text-primary-black w-full bg-transparent"
                                type="email" />
                        </div> -->
                        <div class="flex flex-col gap-2">
                            <label
                                class="font-secondary text-sm text-primary-black"
                                for="">Phone Number</label>

                            <div class="flex">
                                <div class="relative">
                                    <div class="custom-select-container h-full">
                                        <div class="custom-select-trigger h-full">
                                            <span
                                                class="whitespace-nowrap font-secondary font-medium text-primary-black" data-value="+1">+1 (US)</span>
                                            <div class="custom-arrow">▼</div>
                                        </div>
                                        <div class="custom-options">
                                            <?php //foreach($country as $code) {
                                            ?>
                                            <span
                                                class="custom-option font-secondary font-medium text-primary-black selected"
                                                data-value="+1">+1 (US)</span>
                                            <!-- <span
                                                class="custom-option font-secondary font-medium text-primary-black"
                                                data-value="+44">+44 (UK)</span>
                                            <span
                                                class="custom-option font-secondary font-medium text-primary-black"
                                                data-value="+91">+1 (CA)</span> -->
                                            <!-- Add more options as needed -->
                                            <?php //}
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <input
                                    name="phone"
                                    id="phone"
                                    class="px-2 py-4 border-y border-r border-[#C8C8C8] font-secondary text-primary-black w-full bg-transparent focus:outline-none"
                                    type="tel"
                                    placeholder="Enter Your Phone Number"
                                    value="{{ old('phone') }}"
                                    maxlength="12" />
                                <!-- take full-phone as value for form its include both countryCode and phoneNumber -->
                                <input type="hidden" id="full-phone" value="+1" name="full-phone" />
                                <input type="hidden" id="timezone" value="" name="timezone" />
                            </div>
                            @error('phone')
                            <div class="error text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label
                                class="flex container font-secondary text-sm text-primary-black items-center gap-2">
                                <input type="checkbox" name="newsletter" value="1" {{ (old('newsletter') == '1' || old('newsletter') == 'On') ? 'checked' : '' }} />
                                <div class="checkmark"></div>
                                <span class="text-base">Get Info & Helpful Energy Saving Tips</span>
                            </label>
                        </div>
                    </div>

                    <div class="mt-10 grid grid-cols-2 gap-4">
                        <button
                            type="button"
                            class="prev-step font-secondary text-primary-black py-4 font-bold w-1/2 border border-[#C8C8C8] w-full rounded-full">
                            Back
                        </button>

                        <button
                            type="button"
                            class="next-step font-secondary text-primary-black text-lg font-bold py-5 w-full bg-primary-yellow w-1/2 rounded-full">
                            Next
                        </button>
                    </div>

                    <!-- <div
                        class="mt-16 bg-primary-yellow flex justify-center items-center">
                        <button
                            type="button"
                            class="next-step font-secondary text-primary-black text-lg font-bold py-5 w-full">
                            Next
                        </button>
                    </div> -->
                    <div class="flex items-center justify-center gap-2 mt-6">
                        <div
                            class="w-2 h-2 rounded-full bg-[#C8C8C8] overflow-hidden">
                            <div class="w-full h-full bg-primary-yellow"></div>
                        </div>
                        <div
                            class="w-2 h-2 rounded-full bg-[#C8C8C8] overflow-hidden">
                            <div class="w-full h-full bg-primary-yellow"></div>
                        </div>
                        <div
                            class="w-2 h-2 rounded-full bg-[#C8C8C8] overflow-hidden">
                            <div class="w-full h-full"></div>
                        </div>
                    </div>

                    <!-- <div class="flex justify-center items-center mt-6">
                        <button
                            type="button"
                            class="prev-step font-secondary text-primary-black opacity-60 px-4 py-4 font-bold">
                            Back
                        </button>
                    </div> -->

                    <div class="mt-4">
                        <p
                            class="font-secondary text-sm text-primary-black opacity-60 text-center">
                            By clicking "Next" you agree to our
                            <a class="underline" href="{{ url('/terms-of-use') }}">Terms and Conditions</a>.
                        </p>
                    </div>
                </div>
                <!-- step-3 -->

                <div class="step {{ $errors->any() && !$errors->hasAny(['address', 'firstname', 'lastname', 'email', 'phone']) ? 'block' : 'hidden'}}" id="step3">
                    <div>
                        <h2
                            class="font-primary text-primary-black font-medium text-4xl">
                            Select Appointment
                        </h2>
                    </div>

                    <!-- <div class="border border-[#C8C8C8] px-4 mt-16">
                        <input class="py-4 w-full bg-transparent" type="date" name="date" value="{{ old('date') }}" />
                        @error('date')
                        <div class="error text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div> -->

                    <!-- custom datePicker -->
                    <div class="calendar-box">
                        <input
                            class="py-4 w-full bg-transparent focus:outline-none font-secondary text-primary-black opacity-0"
                            type="text"
                            id="dateInput"
                            placeholder="Select Date Of Appointment"
                            name="date" value="{{ old('date') }}"
                            readonly />
                        <div class="calendar" id="calendar">
                            <div class="header">
                                <button type="button" id="prevBtn">&lt;</button>
                                <h2
                                    class="font-secondary text-primary-black"
                                    id="monthYear">
                                    Month Year
                                </h2>
                                <button type="button" id="nextBtn">&gt;</button>
                            </div>
                            <div
                                class="days font-secondary text-primary-black"
                                id="daysContainer">
                                <!-- Days will be dynamically generated here -->
                            </div>
                        </div>
                    </div>
                    @error('date')
                    <div class="error text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror

                    <div class="mt-10 flex flex-col gap-4">
                        <h3 class="font-primary font-medium text-primary-black text-2xl">
                            Select Slot As Per Your Convenience
                        </h3>

                        <!-- Add overflow-auto to make the slot container scrollable -->
                        <div class="custom-radio grid grid-cols-3 overflow-scroll h-48"> <!-- Adjust height as needed -->
                            @php
                            // Define start and end times
                            $startTime = strtotime('10:00 AM');
                            $endTime = strtotime('6:00 PM');
                            $i = 1;
                            @endphp

                            @while ($startTime
                            <= $endTime)
                                @php
                                // Format the time in AM/PM format
                                $timeSlot=date('h:i A', $startTime);
                                @endphp

                                <input class="time-slot" type="radio" id="radioTime-{{ $i }}" name="time_slot" value="{{ $timeSlot }}"
                                {{ old('time_slot') == $timeSlot ? 'checked' : '' }} />
                            <label class="radio-label" for="radioTime-{{ $i }}">
                                <div class="radio-circle"></div>
                                <span class="radio-text font-secondary font-bold text-primary-black">{{ $timeSlot }}</span>
                            </label>

                            @php
                            $i++;
                            // Increment the time by 1 hour
                            $startTime = strtotime('+1 hour', $startTime);
                            @endphp
                            @endwhile
                        </div>

                        <div class="error text-red-500 text-sm mt-1" id="time-slot-error">@error('time_slot'){{ $message }}@enderror</div>
                    </div>

                    <div class="mt-10 grid grid-cols-2 gap-4">
                        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY')}}"></div>
                    </div>
                    @error('g-recaptcha-response')
                    <div class="error text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror

                    <!-- mt-10 updated also back-next divided into two part -->
                    <div class="mt-10 grid grid-cols-2 gap-4">
                        <button
                            type="button"
                            class="prev-step font-secondary text-primary-black py-4 font-bold w-1/2 border border-[#C8C8C8] w-full rounded-full">
                            Back
                        </button>

                        <button
                            type="submit"
                            class="next-step font-secondary text-primary-black text-lg font-bold py-5 w-full bg-primary-yellow w-1/2 rounded-full">
                            Submit
                        </button>
                    </div>

                    <!-- <div
                        class="mt-16 bg-primary-yellow flex justify-center items-center">
                        <button
                            type="submit"
                            class="next-step font-secondary text-primary-black text-lg font-bold py-5 w-full">
                            Next
                        </button>
                    </div> -->

                    <div class="flex items-center justify-center gap-2 mt-6">
                        <div
                            class="w-2 h-2 rounded-full bg-[#C8C8C8] overflow-hidden">
                            <div class="w-full h-full bg-primary-yellow"></div>
                        </div>
                        <div
                            class="w-2 h-2 rounded-full bg-[#C8C8C8] overflow-hidden">
                            <div class="w-full h-full bg-primary-yellow"></div>
                        </div>
                        <div
                            class="w-2 h-2 rounded-full bg-[#C8C8C8] overflow-hidden">
                            <div class="w-full h-full bg-primary-yellow"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="hidden lg:block h-full sticky top-0">
            <div class="h-full w-full flex justify-end">
                <img class="lazyload" data-src="{{ asset('/assets/book-schedule/image.png') }}" alt="image" />
            </div>
        </div>
    </div>
</section>
<div id="page-loader" class="hidden text-center py-4">
    <svg class="page-spinner animate-spin h-10 w-10 text-primary-yellow mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
    </svg>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.13/moment-timezone-with-data.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY')}}&libraries=places"></script>
<script>
    //Update timezone to add on GHL
    var timezone = moment.tz.guess();
    $("#timezone").val(timezone);

    function initAutocomplete() {
        const input = document.getElementById('address');
        const autocomplete = new google.maps.places.Autocomplete(input);

        // Optional: Add additional options to the autocomplete
        autocomplete.setFields(['address_component', 'geometry']);
    }

    // Initialize the autocomplete when the page loads
    window.onload = initAutocomplete;
</script>

<script>
    $.validator.addMethod("recaptchaCheck", function(value, element, param) {
        // reCAPTCHA will return a non-empty value if the user has completed the challenge
        return grecaptcha.getResponse() !== '';
    }, "Please complete the reCAPTCHA.");

    // var validationRules = {
    //     // ignore: [],
    //     debug: false,
    //     rules: {
    //         address: {
    //             required: true,
    //             minlength: 2
    //         },
    //         firstname: {
    //             required: true,
    //             minlength: 2
    //         },
    //         lastname: {
    //             required: true,
    //             minlength: 2
    //         },
    //         email: {
    //             required: true,
    //             email: true
    //         },
    //         phone: {
    //             required: true,
    //             digits: true,
    //             minlength: 10,
    //             maxlength: 15
    //         },
    //         product: {
    //             required: true
    //         },
    //         time_slot: {
    //             required: true,
    //             // checkTimeSlot: true  // Apply the custom validation rule
    //         },
    //         date: {
    //             required: true,
    //             date: true
    //         },
    //         'g-recaptcha-response': {
    //             recaptchaCheck: true
    //         }
    //     },
    //     messages: {
    //         address: {
    //             required: "Please enter your address",
    //             minlength: "Your address must be at least 2 characters long"
    //         },
    //         firstname: {
    //             required: "Please enter your first name",
    //             minlength: "Your first name must consist of at least 2 characters"
    //         },
    //         lastname: {
    //             required: "Please enter your last name",
    //             minlength: "Your last name must consist of at least 2 characters"
    //         },
    //         email: {
    //             required: "Please enter your email address",
    //             email: "Please enter a valid email address"
    //         },
    //         phone: {
    //             required: "Please enter your phone number",
    //             digits: "Please enter only digits",
    //             minlength: "Your phone number must be at least 10 digits long",
    //             maxlength: "Your phone number cannot exceed 15 digits"
    //         },
    //         date: {
    //             required: "Please select the date of appointment"
    //         },
    //         product: {
    //             required: "Please select a product type"
    //         },
    //         time_slot: {
    //             required: "Please select the time slot of appointment",
    //             checkTimeSlot: "You must pick a valid time slot!"
    //         },
    //         'g-recaptcha-response': {
    //             recaptchaCheck: "Please verify that you are not a robot"
    //         }
    //     },
    //     errorPlacement: function(error, element) {
    //         var name = element[0].name;
    //         error.addClass('text-red-500 text-sm mt-1');
    //         if (element[0].name == "address" || element[0].name == "product" || element[0].name == "phone" || element[0].name == "date") {
    //             // Place the error message after the parent div for the "email" input
    //             error.insertAfter(element.parent());
    //         } else if (name == "time_slot") {
    //             error.appendTo("#time-slot-error");
    //         } else {
    //             // Place the error message directly after the input for other elements
    //             error.insertAfter(element);
    //         }
    //     },
    //     // This function is called when the form is valid
    //     submitHandler: function(form) {
    //         const loader = $('#page-loader');
    //         loader.show(); // Show the loader
    //         form.submit();
    //     }
    // };

    // Initialize the validation
    // var formValidate = $("#multi-step-form").validate(validationRules);

    let currentStep = <?php echo $currentStep; ?>;
    const form = document.getElementById("multi-step-form");
    const steps = form.querySelectorAll(".step");
    const dots = form.querySelectorAll(".dot");
    var formValidate = null;
    var validationRules = null;

    function showStep(stepNumber) {
        if (stepNumber == 1) {
            if(formValidate != null) {
                formValidate.destroy();
            }
            var validationRules = {
                // ignore: [],
                debug: false,
                rules: {
                    address: {
                        required: true,
                        minlength: 2
                    },
                    product: {
                        required: true
                    }
                },
                messages: {
                    address: {
                        required: "Please enter your address",
                        minlength: "Your address must be at least 2 characters long"
                    },
                    product: {
                        required: "Please select a product type"
                    }
                },
                errorPlacement: function(error, element) {
                    var name = element[0].name;
                    error.addClass('text-red-500 text-sm mt-1');
                    if (element[0].name == "address" || element[0].name == "product") {
                        // Place the error message after the parent div for the "email" input
                        error.insertAfter(element.parent());
                    } else {
                        // Place the error message directly after the input for other elements
                        error.insertAfter(element);
                    }
                }
            };
            formValidate = $("#multi-step-form").validate(validationRules);
        }

        if (stepNumber == 2) {
            formValidate.destroy();
            validationRules = {
                // ignore: [],
                debug: false,
                rules: {
                    firstname: {
                        required: true,
                        minlength: 2
                    },
                    lastname: {
                        required: true,
                        minlength: 2
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    phone: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 15
                    }
                },
                messages: {
                    firstname: {
                        required: "Please enter your first name",
                        minlength: "Your first name must consist of at least 2 characters"
                    },
                    lastname: {
                        required: "Please enter your last name",
                        minlength: "Your last name must consist of at least 2 characters"
                    },
                    email: {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address"
                    },
                    phone: {
                        required: "Please enter your phone number",
                        digits: "Please enter only digits",
                        minlength: "Your phone number must be at least 10 digits long",
                        maxlength: "Your phone number cannot exceed 15 digits"
                    }
                },
                errorPlacement: function(error, element) {
                    var name = element[0].name;
                    error.addClass('text-red-500 text-sm mt-1');
                    if (element[0].name == "phone" || element[0].name == "date") {
                        // Place the error message after the parent div for the "email" input
                        error.insertAfter(element.parent());
                    } else {
                        // Place the error message directly after the input for other elements
                        error.insertAfter(element);
                    }
                }
            };
            formValidate = $("#multi-step-form").validate(validationRules);
        }


        if (stepNumber == 3) {
            formValidate.destroy();
            validationRules = {
                ignore: [],
                debug: false,
                rules: {
                    time_slot: {
                        required: true,
                        // checkTimeSlot: true  // Apply the custom validation rule
                    },
                    date: {
                        required: true,
                        date: true
                    },
                    'g-recaptcha-response': {
                        recaptchaCheck: true
                    }
                },
                messages: {
                    date: {
                        required: "Please select the date of appointment"
                    },
                    time_slot: {
                        required: "Please select the time slot of appointment"
                    },
                    'g-recaptcha-response': {
                        recaptchaCheck: "Please verify that you are not a robot"
                    }
                },
                errorPlacement: function(error, element) {
                    var name = element[0].name;
                    error.addClass('text-red-500 text-sm mt-1');
                    if (element[0].name == "date") {
                        // Place the error message after the parent div for the "email" input
                        error.insertAfter(element.parent());
                    } else if (name == "time_slot") {
                        error.appendTo("#time-slot-error");
                    } else {
                        // Place the error message directly after the input for other elements
                        error.insertAfter(element);
                    }
                },
                // This function is called when the form is valid
                submitHandler: function(form) {
                    const loader = $('#page-loader');
                    loader.show(); // Show the loader
                    form.submit();
                }
            };
            formValidate = $("#multi-step-form").validate(validationRules);
        }
        steps.forEach((step, index) => {
            if (index + 1 === stepNumber) {
                step.style.display = "block";
            } else {
                step.style.display = "none";
            }
        });
        // updateProgressDots(stepNumber);
    }

    form.addEventListener("click", (e) => {
        if (e.target.classList.contains("next-step")) {
            if (currentStep < steps.length) {
                if ($("#multi-step-form").valid()) {
                    currentStep++;
                    showStep(currentStep);
                }
            }
        } else if (e.target.classList.contains("prev-step")) {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        }
    });

    <?php if ($errors->count() == 0) { ?>
        // Initialize first step
        showStep(currentStep);
    <?php } ?>
</script>

<!-- for countryCode + phone number -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById("phone-form");
        const selectTrigger = document.querySelector(
            ".custom-select-trigger span"
        );
        const phoneInput = document.getElementById("phone");
        const hiddenInput = document.getElementById("full-phone");

        // Handle dropdown toggle
        document
            .querySelectorAll(".custom-select-trigger")
            .forEach((trigger) => {
                trigger.addEventListener("click", function() {
                    this.parentElement.classList.toggle("open");
                });
            });

        // Handle option selection
        document.querySelectorAll(".custom-option").forEach((option) => {
            option.addEventListener("click", function() {
                const selectContainer = this.closest(".custom-select-container");
                const selectedOption = this.dataset.value;

                // Update the select trigger text and data-value attribute
                const triggerSpan = selectContainer.querySelector(
                    ".custom-select-trigger span"
                );
                triggerSpan.textContent = this.textContent;
                triggerSpan.setAttribute("data-value", selectedOption);

                // Remove selected class from all options and add to the clicked option
                selectContainer
                    .querySelectorAll(".custom-option")
                    .forEach((opt) => opt.classList.remove("selected"));
                this.classList.add("selected");

                selectContainer.classList.remove("open");

                // Update the hidden input field with combined value
                updateHiddenInput();
            });
        });

        // Update the hidden input field with the combined value
        function updateHiddenInput() {
            const countryCode = selectTrigger.getAttribute("data-value");
            const phoneNumber = phoneInput.value;
            // const combinedValue = `${countryCode}${phoneNumber}`;
            const combinedValue = `${countryCode}`;
            hiddenInput.value = combinedValue;
        }

        // Update the hidden input when phone number changes
        phoneInput.addEventListener("input", updateHiddenInput);
    });
</script>
<script>
    const daysContainer = document.getElementById("daysContainer");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    const monthYear = document.getElementById("monthYear");
    const dateInput = document.getElementById("dateInput");
    const calendar = document.getElementById("calendar");
    let currentDate = new Date();
    let selectedDate = null;
    // Calculate the minimum selectable date (day after tomorrow)
    let minDate = new Date();
    minDate.setDate(minDate.getDate() + 1);
    // Calculate the maximum selectable date (one week after minDate)
    let maxDate = new Date(minDate);
    maxDate.setDate(minDate.getDate() + 7);

    document.addEventListener("DOMContentLoaded", function() {
        const oldDateValue = document.getElementById("dateInput").value;
        if (oldDateValue) {
            const [month, day, year] = oldDateValue.split('/');
            const oldDate = new Date(year, month - 1, day);
            if (oldDate >= minDate && oldDate <= maxDate) {
                selectedDate = oldDate;
                dateInput.value = selectedDate.toLocaleDateString("en-US");
                renderCalendar();
            }
        }
    });

    function handleDayClick(day) {
        const selected = new Date(currentDate.getFullYear(),
            currentDate.getMonth(),
            day
        );
        if (selected >= minDate && selected <= maxDate) {
            selectedDate = selected;
            dateInput.value = selectedDate.toLocaleDateString("en-US");
            // calendar.style.display = "none";
            renderCalendar();
        }
    }

    function createDayElement(day) {
        const date = new Date(
            currentDate.getFullYear(),
            currentDate.getMonth(),
            day
        );
        const dayElement = document.createElement("div");
        dayElement.classList.add("day");
        if (date.toDateString() === new Date().toDateString()) {
            dayElement.classList.add("current");
        }
        if (
            selectedDate &&
            date.toDateString() === selectedDate.toDateString()
        ) {
            dayElement.classList.add("selected");
        }
        // Disable dates outside the selectable range
        if (date < minDate || date > maxDate) {
            dayElement.classList.add("disabled");
            dayElement.style.pointerEvents = "none";
            dayElement.style.opacity = "0.5"; // Optional: visually indicate disabled dates
        } else {
            dayElement.addEventListener("click", () => {
                handleDayClick(day);
            });
        }
        dayElement.textContent = day;
        daysContainer.appendChild(dayElement);
    }

    function renderCalendar() {
        daysContainer.innerHTML = "";
        const firstDay = new Date(
            currentDate.getFullYear(),
            currentDate.getMonth(),
            1
        );
        const lastDay = new Date(
            currentDate.getFullYear(),
            currentDate.getMonth() + 1,
            0
        );
        monthYear.textContent = `${currentDate.toLocaleString("default", { month: "long", })} ${currentDate.getFullYear()}`;
        for (let day = 1; day <= lastDay.getDate(); day++) {
            createDayElement(day);
        }
    }
    prevBtn.addEventListener("click", () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar();
    });
    nextBtn.addEventListener("click", () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar();
    });
    dateInput.addEventListener("click", () => {
        calendar.style.display = "block";
        positionCalendar();
    });
    renderCalendar();

    $(document).ready(function() {
        $('input').keypress(function(event) {
            var enterOkClass = jQuery(this).attr('class');
            if (event.which == 13 && enterOkClass != 'enterSubmit') {
                event.preventDefault();
                return false;
            }
        });
    });
</script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection
