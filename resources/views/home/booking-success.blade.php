@extends('layout.frontend')
@section('page-content')
<section class="h-[80vh] bg-primary-white">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto h-full">
        <div class="flex justify-center items-center h-full">
            <div class="flex flex-col gap-8">
                <div class="flex justify-center items-center">
                    <img class="lazyload" data-src="{{ asset('/assets/CheckCircle.png') }}" alt="" />
                </div>

                <div class="flex flex-col gap-4">
                    <h2
                        class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-black font-medium text-center lg:max-w-[70%] mx-auto">
                        Free Consultation Has Been Scheduled
                    </h2>

                    <div>
                        <h3
                            class="font-secondary text-primary-black text-center text-lg">
                            Appointment Details
                        </h3>
                        <p class="font-secondary text-primary-black text-center">
                            @php
                            $formattedDate = Carbon\Carbon::createFromFormat('Y-m-d', $booking->date)->format('m/d/Y');
                            @endphp
                            {{$formattedDate}} {{$booking->time_slot}}
                        </p>
                    </div>

                    <div>
                        <p class="font-secondary text-primary-black text-center">
                            Check your email for a confirmation and what to expect for
                            your consultation
                        </p>
                    </div>
                </div>

                <div class="primary-btn flex justify-center">
                    <button
                        onclick="window.location.href='/'"
                        class="bg-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium">
                        Go To Home
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
