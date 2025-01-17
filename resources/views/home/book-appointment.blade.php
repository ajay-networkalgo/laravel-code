@extends('layout.frontend')
@section('page-content')
<section class="bg-primary-white pt-20 flex flex-col gap-10" id="installer-iframe">

    <div id="ms_frame_container" class="landscape">
  <iframe
    id="ms_frame"
    loading="lazy"
    src="https://embed.mindstamp.com/e/Bjjusqzpgnyc?t=47"
    style="
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      min-height: unset;
      min-width: unset;
      border: 0;
    "
    allowfullscreen
    allow="encrypted-media; microphone; camera; geolocation"
    scrolling="no"
    referrerpolicy="no-referrer-when-downgrade"
  >
  </iframe>
</div>
<script>
  window.addEventListener("load", (event) => {
    const container = document.getElementById("ms_frame_container");
    if (window.innerWidth < window.innerHeight / 2) {
      container.classList.add("portrait");
      container.classList.remove("landscape");
      console.log("Portrait");
    } else {
      console.log("Landscape");
    }
  });
</script>
<style>
  .portrait,
  .landscape {
    position: relative;
    overflow: hidden;
  }
  .portrait {
    padding-top: 178%;
    width: 100%;
    margin: 0 auto;
  }
  .landscape {
    padding-top: 56.25%;
  }
</style>
<script>
  window.addEventListener("message", (event) => {
    if (event.data && event.data.event == "redirect") {
      window.location.href = event.data.info.data.link;
    }
  });
</script>
</section>

<!-- second section -->
<section class="bg-primary-white py-24 flex flex-col gap-10">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col items-center gap-2">
            <span
                class="font-primary text-lg text-primary-orange font-medium uppercase text-center">Empower Your Business</span>
            <h2
                class="font-primary text-4xl lg:text-6xl lg:leading-[70px] text-primary-black font-medium text-center">
                Learn More About Our Certified Installer Program
            </h2>
        </div>
    </div>
    <div class="flex flex-col items-center" id="book-appointment">
        <div class="w-[70%] mt-0.5 justify-center">
        <iframe src="https://api.leadconnectorhq.com/widget/booking/chjrs5nh5ddF5T24KSGo" style="width: 100%;border:none;overflow: hidden;" scrolling="no" id="chjrs5nh5ddF5T24KSGo_1724341705914"></iframe><br><script src="https://link.msgsndr.com/js/form_embed.js" type="text/javascript"></script>
        </div>

    </div>
</section>
@include('layout.newsletter')
@endsection
