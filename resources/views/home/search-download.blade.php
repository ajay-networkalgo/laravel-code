@extends('layout.frontend')
@section('page-content')
<section class="bg-primary-white pt-[120px] sm:pt-56 sm:pb-24 pb-10">
    <div class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-10 lg:gap-24">
            <div class="flex flex-col gap-5 lg:flex-row justify-between items-center">
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
                            <input class="bg-transparent outline-none w-full" name="query" id="query" placeholder="Search Files" type="text" value="{{ request('query') }}" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <ul class="py-6">
            <?php if (count($results) > 0) { ?>
                <?php foreach ($results as $key =>  $value) { ?>
                    <li class="border-b border-[#C8C8C8] py-4 overflow-x-scroll">
                        <div class="w-[900px] lg:w-full">
                            <table class="w-full ">
                                <thead>
                                    <th class="font-secondary font-medium text-primary-black w-2/5 pb-4">File</th>
                                    <th class="font-secondary font-medium text-primary-black w-1/5 pb-4">Language</th>
                                    <th class="font-secondary font-medium text-primary-black w-1/5 pb-4">Format</th>
                                    <th class="font-secondary font-medium text-primary-black w-1/5 pb-4">Size</th>
                                    <th class="font-secondary font-medium text-primary-black w-1/5 pb-4">Last Updated</th>
                                    <th></th>
                                </thead>
                                <tbody></tbody>
                                <tr>
                                    <td class="font-secondary text-primary-black pr-5 ">
                                        {{ $value->name }}
                                    </td>
                                    <td class="font-secondary text-primary-black pr-5">
                                        {{ $value->language }}
                                    </td>
                                    <td class="font-secondary text-primary-black pr-5">{{ $value->format}}</td>
                                    <td class="font-secondary text-primary-black pr-5">{{ $value->size}}</td>
                                    <td class="font-secondary text-primary-black pr-5">
                                        {{ $value->last_updated }}
                                    </td>
                                    <td class="pl-10">
                                        <button
                                            onclick="window.location.href='/uploads/file/{{ $value->file_name }}'"
                                            class="bg-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium">
                                            Download
                                        </button>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </li>
                <?php } ?>
            <?php } else { ?>
                <p>No records Found</p>
            <?php } ?>
        </ul>
        <div class="mt-4">
            {{ $results->links() }}
        </div>
    </div>
</section>
@include('layout.newsletter')
@endsection
