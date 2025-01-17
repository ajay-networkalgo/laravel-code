<?php if (count($news) > 0) { ?>
    <?php foreach ($news as $news_item) { ?>
        <li>
            <a class="flex flex-col gap-4" href="/news/{{ $news_item->slug }}">
                <div class="flex flex-col gap-4">
                    <div class="h-[250px] lg:h-[300px] overflow-hidden">
                        @foreach($news_item->images as $image)
                        <img class="w-full lazyload" data-src="/img/news_images/feature_image/{{$image->images}}" alt="blog_pic" />
                        @endforeach
                    </div>
                    <div class="flex gap-4 items-center">
                        <!-- <span class="px-2 py-1 bg-primary-orange rounded-full font-secondary text-xs text-primary-white">
                            @if($news_item->type == 1)
                            Company News
                            @else
                            Product Updates
                            @endif
                        </span> -->
                        <span class="font-secondary font-semibold text-xs text-primary-white px-2 py-1 bg-primary-orange rounded-full">
                            @php
                            $formattedDate = Carbon\Carbon::createFromFormat('Y-m-d', $news_item->date)->format('m/d/Y');
                            @endphp
                            {{$formattedDate}}</span>
                    </div>
                </div>
                <div class="flex flex-col gap-4">
                    <h3 class="font-primary font-medium text-2xl text-primary-black">
                        {{$news_item->title}}
                    </h3>
                    <?php
                    $cleanedText = preg_replace('/<img[^>]*>/', '', $news_item->description);
                    $plainText = strip_tags($cleanedText);
                    $words = explode(' ', $plainText); // Split the text into an array of words
                    $shortText = implode(' ', array_slice($words, 0, 15));
                    ?>
                    <p class="font-secondary font-medium text-[#444444]">
                        {{$shortText}}
                    </p>
                </div>
            </a>
        </li>
    <?php } ?>
<?php } ?>
