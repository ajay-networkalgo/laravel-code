<?php if ($upcomingEvents->count() > 0) { ?>
<div id="upcoming-events" class="tab-content active">
    <ul class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-10">
        <?php foreach ($upcomingEvents as $event_item) {
            $encryptId = base64_encode($event_item->id); ?>
            <li>
                <a href="{{ route('events.frontened.details', $encryptId) }}" class="flex flex-col gap-4">
                    <div>
                        <img class="w-full" src="/img/events_images/feature_image/{{$event_item->featured_image}}" alt="event_1" />
                    </div>
                    <div class="flex flex-col gap-1">
                        <h3 class="font-primary text-xl font-medium text-primary-black">{{$event_item->title}}</h3>
                        <div>
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('assets/events/calendar-silhouette.svg') }}" alt="calendar" />
                                <span class="font-secondary text-[#444444] font-bold">{{$event_item->formatted_date_range}}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('/assets/events/location_icon.svg') }}" alt="location_icon" />
                                <span class="font-secondary text-[#444444] font-bold">{{$event_item->location}}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
        <?php } ?>
    </ul>
</div>
<?php } ?>
<?php if ($pastEvents->count() > 0) { ?>
<div id="past-events" class="tab-content">
    <ul class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-10">
        <?php foreach ($pastEvents as $event_item) {
            $encryptId = base64_encode($event_item->id); ?>
            <li>
                <a href="{{ route('events.frontened.details', $encryptId) }}" class="flex flex-col gap-4">
                    <div>
                        <img class="w-full" src="/img/events_images/feature_image/{{$event_item->featured_image}}" alt="event_1" />
                    </div>
                    <div class="flex flex-col gap-1">
                        <h3 class="font-primary text-xl font-medium text-primary-black">{{$event_item->title}}</h3>
                        <div>
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('assets/events/calendar-silhouette.svg') }}" alt="calendar" />
                                <span class="font-secondary text-[#444444] font-bold">{{$event_item->formatted_date_range}}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('/assets/events/location_icon.svg') }}" alt="location_icon" />
                                <span class="font-secondary text-[#444444] font-bold">{{$event_item->location}}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
        <?php } ?>
    </ul>
</div>
<?php } ?>
