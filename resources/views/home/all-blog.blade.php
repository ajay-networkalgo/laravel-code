<?php if (count($blog) > 0) { ?>
    <?php foreach ($blog as $blog_item) { ?>
        <li>
            <a class="flex flex-col gap-4" href="/blogs/{{ $blog_item->slug }}">
                <div class="flex flex-col gap-4">
                    <div class="h-[250px] lg:h-[300px] overflow-hidden">
                        @foreach($blog_item->images as $image)
                        <img class="w-full lazyload" data-src="/img/blog_images/feature_image/{{$image->images}}" alt="blog_pic" />
                        @endforeach
                    </div>
                    <div class="flex gap-4 items-center">
                        <!-- <span class="px-2 py-1 bg-primary-orange rounded-full font-secondary text-xs text-primary-white">
                            {{ $blog_type[$blog_item->type] }}
                        </span> -->
                        <!-- <span class="font-secondary text-xs text-primary-black">{{$blog_item->date}}</span> -->
                        <span class="font-secondary font-semibold text-xs text-primary-white px-2 py-1 bg-primary-orange rounded-full">
                            @php
                            $formattedDate = Carbon\Carbon::createFromFormat('Y-m-d', $blog_item->date)->format('m/d/Y');
                            @endphp
                            {{$formattedDate}}</span>

                    </div>
                </div>
                <div class="flex flex-col gap-4">
                    <h3 class="font-primary font-medium text-2xl text-primary-black">
                        {{$blog_item->title}}
                    </h3>
                    <?php
                    $cleanedText = preg_replace('/<img[^>]*>/', '', $blog_item->description);
                    $plainText = strip_tags($cleanedText);
                    $words = explode(' ', $plainText); // Split the text into an array of words
                    $shortText = html_entity_decode(implode(' ', array_slice($words, 0, 14)));
                    ?>
                    <p class="font-secondary font-medium text-[#444444]">
                        {{$shortText}}
                    </p>
                </div>
            </a>
        </li>
    <?php } ?>
<?php } ?>
