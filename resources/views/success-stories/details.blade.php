<div id="pv-inverter" class="tab-content w-full active">
  <ul class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php if(count($success_stories) > 0){ ?>
      <?php foreach($success_stories as $stories_item){ $encryptId = base64_encode($stories_item->id);?>
        <li class="group">
          <a href="javascript:void(0)" class="openModal" id="{{ $encryptId }}">
            <div>
              <img src="/img/success_stories_images/{{$stories_item->feature_image}}" alt="tabImg" />
            </div>
            <div class="border-x border-b border-[#C8C8C8]">
              <div class="p-4 flex justify-between">
                <span class="font-primary text-primary-black">{{$stories_item->country}}</span>
                <div class="origin-center rotate-45 transition-all duration-300 group-hover:rotate-0">
                  <img src="{{ asset('assets/ArrowCircleUpRight.svg') }}" alt="ArrowCircleUpRight"/>
                </div>
              </div>
            </div>
          </a>
        </li>
      <?php }?>
    <?php } else { ?>
        <div class="text-center py-4"><li class="group">No stories found!</li></div>
    <?php } ?>
  </ul>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    var siteUrl = "{{ config('app.site_url') }}";
    const modal = document.getElementById('modal');
    $(".openModal").on('click',function(){
        $("#detail_box").removeClass('hidden');
        $("#related_product_box").removeClass('hidden');
        let loader = document.getElementById('success-story-modal-loader');
        let successStoryModalBody = document.getElementById('success-story-modal-body');
        loader.classList.remove('hidden');
        successStoryModalBody.classList.add('hidden');
        // Show the modal
        document.getElementById('success-story-modal').classList.remove('hidden');
        document.getElementById('success-story-modal').classList.add('flex');
      var id = $(this).attr("id");
      var posturl = siteUrl+"case/"+id;
      fetch(posturl)
      .then(response => response.json())
      .then(data => {
        loader.classList.add('hidden');
        successStoryModalBody.classList.remove('hidden');
        $("#country_name").html(data.country);
        if(data.details.length == 0){
            $("#detail_box").addClass('hidden');
        } else {
            $("#details").html(data.details);
        }
        var image_path = '/img/success_stories_images/';
        $("#projectImage").attr("src",image_path+'/'+data.feature_image);
        let content = '';
        data.related_products.forEach(item => {
          var product_images = '<?php echo '/img/product_images/'; ?>';
          content += '<img data-src='+product_images+'/'+item.product.feature_image+' id="feature_image" alt="Product Image" class="lazyload w-24 h-24 object-cover rounded" />';
        });
        if(content.length == 0) {
            $('#related_product_box').addClass('hidden');
        } else {
            $('#related_product').html(content);
        }
        modal.classList.remove('hidden');
      })
      .catch(error => console.error('Error fetching modal data:', error));
    });
  });
</script>
