@extends('layout.frontend')
@section('page-content')
<section class="pt-44 pb-24">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-6">
            <div class="flex flex-col gap-6">
                <h1
                    class="font-primary text-primary-white font-medium text-[140px] md:text-[200px] leading-[200px] text-center">
                    404
                </h1>
                <p
                    class="font-secondary font-medium text-[24px] leading-[30px] text-primary-white text-center">
                    Page Not Found!
                </p>
            </div>

            <div class="flex justify-center items-center">
                <a
                    href="{{ url('/') }}"
                    class="bg-primary-yellow border border-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium flex items-center gap-2 w-full md:w-auto justify-center">
                    <span>Go to Home Page</span>
                </a>
            </div>
        </div>
    </div>
</section>

@include('layout.newsletter')
@endsection
