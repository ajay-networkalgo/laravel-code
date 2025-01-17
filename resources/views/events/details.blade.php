@extends('layout.frontend')
@section('page-content')
<section class="bg-primary-white py-24">
    <div class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="lg:px-24">
            <div class="flex flex-col items-center gap-4">
                <div class="flex justify-center items-center gap-2">
                    <img src="{{ asset('assets/events/calendar-silhouette.svg') }}" alt="calendar" />
                    <span class="font-secondary font-medium text-sm text-primary-black">{{ $formatted_date_range }}</span>
                </div>
                <h1 class="font-primary font-medium text-4xl lg:text-6xl lg:leading-[70px] text-primary-black font-medium text-center lg:max-w-[80%]">{{ $events->title }}</h1>
            </div>
            <div class="py-10 flex flex-col gap-5 border-b border-[#C8C8C8]">
                <div class="flex flex-col gap-5">
                    <h3 class="font-primary font-semibold text-3xl">About The Event</h3>
                    <div class="flex flex-col gap-4">
                        {!! $events->description !!}
                    </div>
                </div>
            </div>
            <div class="pt-8 flex flex-col items-center gap-6 lg:flex-row justify-between">
                <div class="px-2 py-2.5 rounded-full bg-gradient-to-r from-[#EEBB0C] to-[#EF6818] flex items-center gap-2">
                    <img src="{{ asset('assets/events/fi_3177361.svg') }}" alt="fi_3177361" />
                    <span class="whitespace-nowrap font-secondary text-primary-black">{{ $events->location }}</span>
                </div>

                <ul class="flex items-center gap-2">
                    <li>
                        <a
                            class="bg-[#C8C8C84D] w-10 h-10 rounded-full border border-[#C8C8C8] flex justify-center items-center"
                            href="https://www.facebook.com/sharer/sharer.php?u={{ env('SITE_URL').'events/'.$events->slug}}">
                            <img src="{{ asset('assets/events/inner_fb.svg') }}" alt="inner_icon" />
                        </a>
                    </li>
                    <li>
                        <a
                            class="bg-[#C8C8C84D] w-10 h-10 rounded-full border border-[#C8C8C8] flex justify-center items-center"
                            href="https://twitter.com/intent/tweet?text=Check+out+this+link!&url={{ env('SITE_URL').'events/'.$events->slug}}" target="_blank">
                            <img src="{{ asset('assets/events/inner_x.svg') }}" alt="inner_icon" />
                        </a>
                    </li>
                    <li>
                        <a
                            class="bg-[#C8C8C84D] w-10 h-10 rounded-full border border-[#C8C8C8] flex justify-center items-center"
                            href="https://www.linkedin.com/sharing/share-offsite/?url={{ env('SITE_URL').'events/'.$events->slug}}" target="_blank">
                            <img src="{{ asset('assets/events/linkedin.svg') }}" alt="inner_icon" />
                        </a>
                    </li>
                    <li>
                        <a
                            class="bg-[#C8C8C84D] w-10 h-10 rounded-full border border-[#C8C8C8] flex justify-center items-center"
                            href="https://www.instagram.com/solaxpowerglobal/sharer.php?u={{ env('SITE_URL').'events/'.$events->slug}}" target="_blank">
                            <img src="{{ asset('assets/events/instagram.svg') }}" alt="inner_icon" />
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- <section class="py-24">
  <div class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
    <div class="flex flex-col gap-16">
      <h2 class="font-primary font-medium text-4xl lg:text-5xl lg:leading-[56px] text-primary-white font-medium">
        You May Love these too
      </h2>
      <ul class="grid lg:grid-cols-3 gap-x-6 gap-y-10">
        <li class="flex flex-col gap-4">
          <div>
            <img class="w-full" src="{{ asset('assets/events/event_1.png') }}" alt="event_1"/>
          </div>
          <div class="flex flex-col gap-1">
            <h3 class="font-primary text-xl font-medium text-primary-white">
              The event title goes here.
            </h3>
            <div>
              <div class="flex items-center gap-2">
                <img class="invert" src="{{ asset('assets/events/calendar-silhouette.svg') }}" alt="calendar"/>
                <span class="font-secondary text-[#C8C8C8] font-bold">August 8 | 9:30pm - August 9 | 2:30am</span>
              </div>
              <div class="flex items-center gap-2">
                <img class="invert" src="{{ asset('assets/events/location_icon.svg') }}" alt="location_icon"/>
                <span class="font-secondary text-[#C8C8C8] font-bold">Hangzhou, China</span>
              </div>
            </div>
          </div>
        </li>
        <li class="flex flex-col gap-4">
          <div>
            <img class="w-full" src="{{ asset('assets/events/event_2.png') }}"alt="event_1"/>
          </div>
          <div class="flex flex-col gap-1">
            <h3 class="font-primary text-xl font-medium text-primary-white">
              The event title goes here.
            </h3>
            <div>
              <div class="flex items-center gap-2">
                <img class="invert" src="{{ asset('assets/events/calendar-silhouette.svg') }}" alt="calendar"/>
                <span class="font-secondary text-[#C8C8C8] font-bold">August 8 | 9:30pm - August 9 | 2:30am</span>
              </div>
              <div class="flex items-center gap-2">
                <img class="invert" src="{{ asset('assets/events/video.svg') }}" alt="lvideo"/>
                <span class="font-secondary text-[#C8C8C8] font-bold">Online</span>
              </div>
            </div>
          </div>
        </li>
        <li class="flex flex-col gap-4">
          <div>
            <img class="w-full" src="{{ asset('assets/events/event_3.png') }}" alt="event_1"/>
          </div>
          <div class="flex flex-col gap-1">
            <h3 class="font-primary text-xl font-medium text-primary-white">
              The event title goes here.
            </h3>
            <div>
              <div class="flex items-center gap-2">
                <img class="invert" src="{{ asset('assets/events/calendar-silhouette.svg') }}" alt="calendar"/>
                <span class="font-secondary text-[#C8C8C8] font-bold">August 8 | 9:30pm - August 9 | 2:30am</span>
              </div>
              <div class="flex items-center gap-2">
                <img class="invert" src="{{ asset('assets/events/location_icon.svg') }}" alt="location_icon"/>
                <span class="font-secondary text-[#C8C8C8] font-bold">Hangzhou, China</span>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</section> -->
@include('layout.newsletter')
@endsection
