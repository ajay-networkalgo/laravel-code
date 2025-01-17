@extends('layout.frontend')
@section('page-content')
<style>
    .tab-content {
        display: none;
        width: 100%;
        top: 0;
    }

    .tab-content.active {
        display: block;
        animation: tabAnimation 0.5s ease-in-out;
    }

    @keyframes tabAnimation {
        0% {
            opacity: 0;
            transform: translateY(15px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
<!-- hero section -->
<section class="pb-24 pt-24 bg-primary-white">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col lg:flex-row gap-10 md:gap-[90px]">
            <div class="lg:w-[50%] flex flex-col gap-10 relative lg:sticky top-[10%] h-full">
                <img class="lazyload" data-src="{{ asset('/assets/A1Hybrid/es2.webp') }}" alt="">
            </div>
            <div class="flex flex-col gap-10 md:gap-[7px]" style="margin-top:100px">
                <div class="flex flex-col gap-3">
                    <div>
                        <span class="font-primary text-lg text-[#3f3f3f] font-medium uppercase">Energy Storage System</span>
                    </div>
                    <div class="flex flex-col gap-6">
                        <span class="font-primary font-medium text-primary-black text-[42px] leading-[48px] sm:text-[52px] sm:leading-[58px] lg:text-[72px] lg:leading-[80px] xl:text-[80px] xl:leading-[88px]  drop-shadow-2xl">A1-ESS-G2</span>
                        <span class="text-primary-black font-secondary text-[20px] leading-[24px]  xl:w-[100%]">3.8kW / 5kW / 6kW / 7.6kW</span>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
<section class="pb-24 pt-24 bg-primary-white">
<div
class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
<div class="row">
    <div class="lg:w-[100%] flex flex-col ">
        
        <ul class="list-circle flex flex-col md:flex-row tems-center gap-6 md:gap-20" style="list-style:circle">
            <div class=" flex flex-col gap-6 richtext">
            <h4 class="font-primary font-medium md:text-[38px] text-[32px] leading-[57px] text-primary-black">Superior Performance</h4>
            <li>Stacked installation, saving installation costs</li>
            <li>Up to 3 MPPTs</li>
            <li>Up to 200% oversizing allowed</li>
            <li>Maximum 16A PV input current, support high power solar panel</li>
            <li>Peak efficiency: 98%</li>
            <li>Up to 4 ESS in parallel</li>
            <li>Support Maximum 200A main panel</li>
            </div>
            <div class=" flex flex-col gap-5 richtext">
                <h4 class="font-primary font-medium md:text-[38px] text-[32px] leading-[57px] text-primary-black">Safe & Reliable</h4>
            <li>Integrated ARC fault protection and rapid shutdown transmitter</li>
            <li>AC&DC SPD type II, always guarding the inverter</li>
            <li>NEMA 4X protection level</li>
            <li>Automatic black start function</li>
            </div>
        </ul>

    </div>
</div>
</div>

</section>

<section class="pb-24 pt-24 bg-primary-white">
<div
class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
<div class="row">
    <div class="lg:w-[100%] flex flex-col ">
        
        <ul class="list-circle flex flex-col md:flex-row tems-center gap-6 md:gap-20" style="list-style:circle">
            <div class=" flex flex-col gap-6">
            <h4 class="font-primary font-medium md:text-[38px] text-[32px] leading-[57px] text-primary-black">Multi-function Integrated</h4>
            <li>Max. 100A generator supported, depending on different BI Version</li>
            <li>Smart load management</li>
            <li>Micro-grid ready, supporting real-time power balance</li>
            <li>Support multiple power distribution solutions (Partial or Whole Home)</li>
            <li>VPP ready, Olax cloud support resource aggregator (IEEE 2030.5, OpenADR)</li>
            </div>
        </ul>

    </div>
</div>
</div>

</section>
<section class="pb-24 pt-24 bg-primary-white">
<div
class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
<div class="row">
    <div class="lg:w-[100%] flex flex-col ">
    <h4 class="font-primary font-medium md:text-[38px] text-[32px] leading-[57px] text-primary-black">Why <span class="font-primary text-base leading-[24px] lg:w-[100%] text-primary-black">A1 ESS G2</span></h4>
        <p class="font-primary text-base leading-[24px] lg:w-[100%] text-primary-black">A1 ESS G2 stands out for its safety, reliability, superior performance, and versatile integration. With advanced ARC fault protection, NEMA 4X protection level, and black start capability, it ensures safe and uninterrupted operation. Its high performance is highlighted by 98% peak efficiency, support for 200% oversizing, and compatibility with high-power solar panels and up to 4 ESS systems in parallel. Additionally, it integrates seamlessly with smart load management, micro-grid support, and multiple distribution solutions, making it suitable for varied applications. Its VPP-ready design and support for advanced resource aggregation protocols further enhance its appeal for modern energy systems.</p>

    </div>
</div>
</div>

</section>
<section class="bg-primary-white">
  <div class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
    <div class="sep-in-detail-text-thumb-list flex-wrap mt70 ">
      <div class="lis-boxs ons11">
        <div class="sep-in-pro-title-list flex-wrap">
          <div class="p-lists medium fz21 ls25 pointer active font-primary font-medium md:text-[38px] text-[32px] leading-[57px] text-primary-black"> A1-ESS-G2 </div>
          <div class="p-lists medium fz21 ls25"></div>
        </div>
        <div class="sep-in-pro-text-list mt30">
          <div class="p-lists flex-wrap fz17 ls25 active">
            <table cellpadding="0" cellspacing="0" height="402">
              <colgroup>
                <col>
                <col>
              </colgroup>
              <tbody>
                <tr height="28" class="firstRow">
                  <td height="14" x:str="">Rated Output Power [kW]</td>
                  <td x:str="">3.8/5.0/6.0/7.6</td>
                </tr>
                <tr height="28">
                  <td height="14" x:str="">Nominal Capacity [kWh]①</td>
                  <td x:str="">10/15/20</td>
                </tr>
                <tr height="28">
                  <td height="14" x:str="">Usable Energy [kWh]②</td>
                  <td x:str="">9/13.5/18</td>
                </tr>
                <tr height="28">
                  <td height="14" x:str="">Degree of Protection</td>
                  <td x:str="">NEMA 4X</td>
                </tr>
                <tr height="28">
                  <td height="14" x:str="">Altitude [ft / m]</td>
                  <td x:str="">9843 / 3000 MAX</td>
                </tr>
                <tr height="28">
                  <td height="14" x:str="">Cooling</td>
                  <td x:str="">Natural convection</td>
                </tr>
                <tr height="28">
                  <td height="14" x:str="">Topology</td>
                  <td x:str="">Transformerless</td>
                </tr>
                <tr height="28">
                  <td height="14" x:str="">Communication interfaces</td>
                  <td x:str="">RS485, CAN, WIFI (optional) / 4G (optional), Dry Contact</td>
                </tr>
                <tr height="28">
                  <td height="14" x:str="">Warranty</td>
                  <td x:str="">12 years③</td>
                </tr>
                <tr height="150">
                  <td colspan="2" height="75" x:str="" style="word-break: break-all;">① Test Conditions: 0.2C charge &amp; discharge at + 25 °C. <br>② Usable system energy may vary with different inverter settings. <br>③ The 12-year warranty is valid only in North America. </td>
                </tr>
              </tbody>
            </table>
            <p>
              <br>
            </p>
            <p>
              <br>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


@include('layout.download-products')

<!-- third section -->
@include('layout.related-products')

<!-- sixth section -->
@include('layout.newsletter')

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const tabLinks = document.querySelectorAll(".tab-link");
        const tabContents = document.querySelectorAll(".tab-content");

        tabLinks.forEach((link) => {
            link.addEventListener("click", () => {
                const tab = link.getAttribute("data-tab");

                tabLinks.forEach((link) =>
                    link.classList.remove(
                        "text-primary-yellow",
                        "border-primary-yellow"
                    )
                );
                link.classList.add("text-primary-yellow", "border-primary-yellow");

                tabContents.forEach((content) => {
                    content.classList.remove("active");
                    if (content.getAttribute("id") === tab) {
                        content.classList.add("active");
                    }
                });
            });
        });
    });
</script>
@endsection
