@extends('layout.frontend')
@section('page-content')
<section class="bg-primary-white py-32">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="md:px-24">
            <div class="flex flex-col items-center gap-4">
                <div class="flex gap-4 items-center">
                    <span class="px-2 py-1 bg-primary-orange rounded-full font-secondary font-semibold text-xs text-primary-white">
                        @php
                        $formattedDate = Carbon\Carbon::createFromFormat('Y-m-d', $news->date)->format('m/d/Y');
                        @endphp
                        {{$formattedDate}}
                    </span>
                    <!-- <span class="font-secondary text-xs text-primary-black"></span> -->
                </div>

                <h1 class="font-primary font-medium text-4xl xl:text-6xl xl:leading-[70px] text-primary-black font-medium text-center lg:max-w-[80%]">
                    {{$news->title}}
                </h1>
            </div>

            <div class="py-10 flex flex-col gap-5 border-b border-[#C8C8C8]">
                <div class="flex flex-col gap-5">
                    <div class="flex flex-col gap-4 !font-secondary">
                        {!! $news->description !!}
                    </div>
                </div>
            </div>

            <div class="pt-8 flex justify-between items-center">
                <div class="">
                    <span class="font-primary text-primary-black font-medium">Share this News</span>
                </div>

                <ul class="flex items-center gap-2">
                    <li>
                        <a
                            class="bg-[#C8C8C84D] w-10 h-10 rounded-full border border-[#C8C8C8] flex justify-center items-center"
                            href="https://www.facebook.com/sharer/sharer.php?u={{ env('SITE_URL').'news/'.$news->slug}}">
                            <img src="{{ asset('assets/events/inner_fb.svg') }}" alt="inner_icon" />
                        </a>
                    </li>
                    <li>
                        <a
                            class="bg-[#C8C8C84D] w-10 h-10 rounded-full border border-[#C8C8C8] flex justify-center items-center"
                            href="https://twitter.com/intent/tweet?text=Check+out+this+link!&url={{ env('SITE_URL').'news/'.$news->slug}}" target="_blank">
                            <img src="{{ asset('assets/events/inner_x.svg') }}" alt="inner_icon" />
                        </a>
                    </li>
                    <li>
                        <a
                            class="bg-[#C8C8C84D] w-10 h-10 rounded-full border border-[#C8C8C8] flex justify-center items-center"
                            href="https://www.linkedin.com/sharing/share-offsite/?url={{ env('SITE_URL').'news/'.$news->slug}}" target="_blank">
                            <img src="{{ asset('assets/events/linkedin.svg') }}" alt="inner_icon" />
                        </a>
                    </li>
                    <li>
                        <a
                            class="bg-[#C8C8C84D] w-10 h-10 rounded-full border border-[#C8C8C8] flex justify-center items-center"
                            href="https://www.instagram.com/solaxpowerglobal/sharer.php?u={{ env('SITE_URL').'news/'.$news->slug}}"  target="_blank">
                            <img src="{{ asset('assets/events/instagram.svg') }}" alt="inner_icon" />
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="xl:py-24 md:py-16 py-10">
    <div class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-16">
            <h2 class="font-primary font-medium text-4xl lg:text-5xl lg:leading-[56px] text-primary-white font-medium">
                More News
            </h2>
            <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-4 gap-y-10">
                <?php if (count($relatedNews) > 0) { ?>
                    <?php foreach ($relatedNews as $news_item) {
                        $encryptId = base64_encode($news_item->id); ?>
                        <li>
                            <a class="flex flex-col gap-4" href="/news/{{ $news_item->slug }}">
                                <div class="flex flex-col gap-4">
                                    <div class="h-[250px] lg:h-[300px] mx-auto">
                                        @foreach($news_item->images as $image)
                                        <img class="w-full lazyload" data-src="/img/news_images/feature_image/{{$image->images}}" alt="blog_pic" />
                                        @endforeach
                                    </div>
                                    <div class="flex gap-4 items-center">
                                        <span class="px-2 py-1 bg-primary-orange rounded-full font-secondary font-semibold text-xs text-primary-white">
                                            @php
                                            $formattedDate = Carbon\Carbon::createFromFormat('Y-m-d', $news_item->date)->format('m/d/Y');
                                            @endphp
                                            {{$formattedDate}}
                                        </span>
                                        <!-- <span class="font-secondary text-xs text-primary-white">{{$news_item->date}}</span> -->
                                    </div>
                                </div>
                                <div class="flex flex-col gap-4">
                                    <h3
                                        class="font-primary font-medium text-2xl text-primary-white">
                                        {{$news_item->title}}
                                    </h3>
                                    <?php
                                    $cleanedText = preg_replace('/<img[^>]*>/', '', $news_item->description);
                                    $plainText = strip_tags($cleanedText);
                                    $words = explode(' ', $plainText); // Split the text into an array of words
                                    $shortText = implode(' ', array_slice($words, 0, 12));
                                    ?>
                                    <p class="font-secondary font-medium text-[#C8C8C8] overflow-hidden">
                                        {{$shortText}}
                                    </p>
                                </div>
                            </a>
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>
        </div>
    </div>
</section>
@include('layout.newsletter')
@endsection
