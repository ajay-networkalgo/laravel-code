<div class="grid lg:grid-cols-2 gap-6">
  <?php if(count($success_stories) > 0){ ?>
    <?php foreach($success_stories as $stories_item){ $encryptId = base64_encode($stories_item->id);?>
      <div class="relative border border-[#C8C8C83D]">
        <div>
        <img data-src="/img/success_stories_images/{{$stories_item->feature_image}}" class="w-full lazyload" />
        <div class="w-full h-full bg-gradient-to-b from-[#15151500] to-[#151515] flex flex-col justify-end gap-0.5 p-4 absolute top-0 left-0 w-full h-full">
            <span class="text-sm font-secondary text-[#C8C8C8]">Location</span>
            <span class="font-secondary font-medium text-primary-white">{{ucfirst($stories_item->country)}}</span>
          </div>
        </div>
      </div>
    <?php }?>
  <?php } else { ?>
    <div class="text-center py-4" style="color:white;">No stories found!</div>
  <?php } ?>
</div>
