@extends('layout.frontend')
@section('page-content')
<section class="pt-56 pb-24">
  <div class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
    <div class="flex flex-col gap-8">
      <div class="hero-content-top flex flex-col items-center gap-4">
        <h1 class="font-primary font-medium text-primary-white text-[42px] leading-[48px] sm:text-[52px] sm:leading-[58px] lg:text-[72px] lg:leading-[80px] xl:text-[80px] xl:leading-[88px] drop-shadow-2xl">
          Warranty Policy
        </h1>
      </div>
      <!-- <div class="flex flex-col gap-4">
        <h3 class="font-secondary text-primary-yellow text-sm font-medium text-center">Choose your country</h3>
        <form action="">
          <div class="w-[50%] lg:max-w-[20%] bg-primary-white mx-auto pr-4">
            <select class="w-full bg-primary-white pl-4 py-3 outline-none" name="country" id="countryId">
              <option value="global">Global</option>
              <option value="us">US</option>
            </select>
          </div>
        </form>
      </div> -->
    </div>
  </div>
</section>

<!-- <section class="bg-primary-white py-24" id="global_contacts">
  <div class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
    <div class="">
      <div id="us-content" class="flex flex-col gap-24  overflow-x-scroll">
        <ul class="flex flex-col gap-8 ">
          <li class="border-b border-[#C8C8C8] pb-4 overflow-x-scroll">
           <div class=" w-[900px] lg:w-full">
            <table class="w-full ">
              <thead>
                <th class="font-secondary font-medium text-primary-black w-2/5 pb-4">File</th>
                <th class="font-secondary font-medium text-primary-black w-1/5 pb-4">Language</th>
                <th class="font-secondary font-medium text-primary-black w-1/5 pb-4">Format</th>
                <th class="font-secondary font-medium text-primary-black w-1/5 pb-4">Size</th>
                <th class="font-secondary font-medium text-primary-black w-1/5 pb-4">Last Updated</th>
                <th></th>
              </thead>
              <tbody>
                <tr>
                  <td class="font-secondary text-primary-black pr-5 "><a href="{{ asset('assets/warranty/2024-US-Warranty-Terms-Conditions.pdf') }}" target="_blank">Olax Warranty Terms & Conditions - Global-2024</a></td>
                  <td class="font-secondary text-primary-black pr-5">English</td>
                  <td class="font-secondary text-primary-black pr-5">PDF</td>
                  <td class="font-secondary text-primary-black pr-5">978KB</td>
                  <td class="font-secondary text-primary-black pr-5">11/05/2024</td>
                  <td class="pl-10">
                    <a href="{{ asset('assets/warranty/2024-US-Warranty-Terms-Conditions.pdf') }}" class="border border-primary-yellow bg-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium  transition-all duration-300 hover:bg-transparent hover:text-primary-black hover:border-primary-black" download="">
                    Downloads</a>
                  </td>
                </tr>
              </tbody>
            </table>
           </div>
          </li>
        </ul>
        <ul class="accordion flex flex-col gap-5">
          <li class="accordion-item">
            <button class="accordion-header px-6 py-4 bg-primary-black inline-block w-full flex items-center gap-2">
              <div class="relative w-6 h-6">
                <img class="absolute transition-opacity duration-300" src="{{ asset('assets/download/PlusCircle.svg') }}"
                  alt="PlusCircle"/>
                <img class="absolute transition-opacity duration-300 opacity-0" src="{{ asset('assets/download/MinusCircle.svg') }}" alt="MinusCircle"/>
              </div>
              <h3 class="font-primary font-semibold text-primary-yellow text-lg">
                Warranty period for Inverters
              </h3>
            </button>
            <div class="accordion-content border-[#C8C8C8] overflow-hidden transition-all duration-300 max-h-0">
              <div class="py-6 px-4 grid grid-cols-1  lg:grid-cols-2 gap-4">
              <div class="flex flex-col gap-6">
                  <h3 class="bg-[#C8C8C8] font-secondary font-bold text-primary-black text-center py-4">
                    Product
                  </h3>
                  <ul class="flex flex-col gap-4">
                    <li class="pb-1 border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">X1/X3Hybrid-G4</span>
                    </li>
                  </ul>
                </div>
                <div class="flex flex-col gap-6">
                  <h3 class="bg-[#C8C8C8] font-secondary font-bold text-primary-black text-center py-4">Warranty Period</h3>
                  <div class="flex flex-col gap-4">
                    <span class="font-secondary text-primary-black">5 years standard warranty + 5 years parts warranty, starting from the earlier one of the following two dates:</span>
                    <ul>
                      <li>
                        <span class="font-secondary text-primary-black font-medium">
                        The date on which the product was first installed;</span>
                      </li>
                      <li>
                        <span class="font-secondary text-primary-black font-medium">6 months after the date of production</span>
                      </li>
                    </ul>
                  </div>
                </div>

                <div class="flex flex-col gap-6">
                  <h3 class="bg-[#C8C8C8] font-secondary font-bold text-primary-black text-center py-4">
                    Product
                  </h3>
                  <ul class="flex flex-col gap-4">
                    <li class="pb-1 border-b border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">X1-MINI/Boost/Smart</span>
                    </li>
                    <li class="pb-1 border-b border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">X3MICG1 & G2</span>
                    </li>
                    <li class="pb-1 border-b border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">X3MIC Pro-G1</span>
                    </li>
                    <li class="pb-1 border-b border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">X3MIC ProG2</span>
                    </li>
                    <li class="pb-1 border-b border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">X1-Hybrid/Fit</span>
                    </li>
                    <li class="pb-1 border-b border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">X3Hybrid/Fit</span>
                    </li>
                    <li class="pb-1 border-b border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">X1-AC</span>
                    </li>
                    <li class="pb-1 border-b border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">X3-MAX</span>
                    </li>
                    <li class="pb-1 border-b border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">X3MEGA-G1 & G2</span>
                    </li>
                    <li class="pb-1 border-b border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">X3-Forth</span>
                    </li>
                  </ul>
                </div>
                <div class="flex flex-col gap-6">
                  <h3 class="bg-[#C8C8C8] font-secondary font-bold text-primary-black text-center py-4">Warranty Period</h3>
                  <div class="flex flex-col gap-4">
                    <span class="font-secondary text-primary-black">5 years standard warranty, starting from the earlier one of the following two dates:</span>
                    <ul>
                      <li>
                        <span class="font-secondary text-primary-black font-medium">
                        The date on which the product was first installed;</span>
                      </li>
                      <li>
                        <span class="font-secondary text-primary-black font-medium">6 months after the date of production</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="accordion-item">
            <button class="accordion-header px-6 py-4 bg-primary-black inline-block w-full flex items-center gap-2">
              <div class="relative w-6 h-6">
                <img class="absolute transition-opacity duration-300" src="{{ asset('assets/download/PlusCircle.svg') }}" alt="PlusCircle"/>
                <img class="absolute transition-opacity duration-300 opacity-0" src="{{ asset('assets/download/MinusCircle.svg') }}" alt="MinusCircle"/>
              </div>
              <h3 class="font-primary font-semibold text-primary-yellow text-lg">
                Warranty period for Accessories
              </h3>
            </button>

            <div class="accordion-content border-[#C8C8C8] overflow-hidden transition-all duration-300 max-h-0">
              <div class="py-6 px-4 grid grid-cols-1  lg:grid-cols-2 gap-4">
                <div class="flex flex-col gap-6">
                  <h3 class="bg-[#C8C8C8] font-secondary font-bold text-primary-black text-center py-4">
                    Product
                  </h3>
                  <ul class="flex flex-col gap-4">
                    <li class="pb-1 border-b border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">Meter/CT</span>
                    </li>
                    <li class="pb-1 border-b border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">Pocket/Lan/4G</span>
                    </li>
                    <li class="pb-1 border-b border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">V1000</span>
                    </li>
                    <li class="pb-1 border-b border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">DataHub</span>
                    </li>
                    <li class="pb-1 border-b border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">X1/X3-EPS Box</span>
                    </li>
                    <li class="pb-1 border-b border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">X1/X3-Mate Box</span>
                    </li>
                    <li class="pb-1 border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">Adaptor Box</span>
                    </li>
                  </ul>
                </div>
                <div class="flex flex-col gap-6">
                  <h3 class="bg-[#C8C8C8] font-secondary font-bold text-primary-black text-center py-4">
                    Warranty Period
                  </h3>

                  <div class="flex flex-col gap-4">
                    <span class="font-secondary text-primary-black">2 years standard warranty, starting from the earlier one of the following two dates:</span>
                    <ul>
                      <li>
                        <span class="font-secondary text-primary-black font-medium">
                        The date on which the product was first installed;</span>
                      </li>
                      <li>
                        <span class="font-secondary text-primary-black font-medium">6 months after the date of production</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="py-6 px-4 grid grid-cols-1  lg:grid-cols-2 gap-4">
                <div class="flex flex-col gap-6">
                  <h3 class="bg-[#C8C8C8] font-secondary font-bold text-primary-black text-center py-4">
                    Product
                  </h3>
                  <ul class="flex flex-col gap-4">
                    <li class="pb-1 border-b border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">Off-grid eps parallel Box</span>
                    </li>
                    <li class="pb-1 border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">BMS Parallel Box</span>
                    </li>
                  </ul>
                </div>
                <div class="flex flex-col gap-6">
                  <h3 class="bg-[#C8C8C8] font-secondary font-bold text-primary-black text-center py-4">
                    Warranty Period
                  </h3>

                  <div class="flex flex-col gap-4">
                    <span class="font-secondary text-primary-black">5 years standard warranty, starting from the earlier one of the following two dates:</span>
                    <ul>
                      <li>
                        <span class="font-secondary text-primary-black font-medium">
                        The date on which the product was first installed;</span>
                      </li>
                      <li>
                        <span class="font-secondary text-primary-black font-medium">6 months after the date of production</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="accordion-item">
            <button class="accordion-header px-6 py-4 bg-primary-black inline-block w-full flex items-center gap-2">
              <div class="relative w-6 h-6">
                <img class="absolute transition-opacity duration-300" src="{{ asset('assets/download/PlusCircle.svg') }}" alt="PlusCircle"/>
                <img class="absolute transition-opacity duration-300 opacity-0" src="{{ asset('assets/download/MinusCircle.svg') }}" alt="MinusCircle"/>
              </div>
              <h3 class="font-primary font-semibold text-primary-yellow text-lg">5 years parts warranty</h3>
            </button>
            <div class="accordion-content border-[#C8C8C8] overflow-hidden transition-all duration-300 max-h-0">
              <div class="py-6 px-4 grid grid-cols-1 lg:grid-cols-1 gap-4">
                <div class="flex flex-col gap-6">
                  <h3 class="font-secondary text-primary-black p-4">
                    The warranty covers only the cost of hardware material required to get the device functioning again. It excludes any inbound/outbound transportation costs or labor costs of replacement/on‐site service.
                  </h3>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section> -->

<section class="bg-primary-white py-24" id="us_contacts">
  <div class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
    <div class="">
      <div id="us-content" class="flex flex-col gap-24  overflow-x-scroll">
        <ul class="flex flex-col gap-8 ">
          <li class="border-b border-[#C8C8C8] pb-4 overflow-x-scroll">
           <div class=" w-[900px] lg:w-full">
            <table class="w-full ">
              <thead>
                <th class="font-secondary font-medium text-primary-black w-2/5 pb-4">File</th>
                <th class="font-secondary font-medium text-primary-black w-1/5 pb-4">Language</th>
                <th class="font-secondary font-medium text-primary-black w-1/5 pb-4">Format</th>
                <th class="font-secondary font-medium text-primary-black w-1/5 pb-4">Size</th>
                <th class="font-secondary font-medium text-primary-black w-1/5 pb-4">Last Updated</th>
                <th></th>
              </thead>
              <tbody>
                <tr>
                  <td class="font-secondary text-primary-black pr-5 "><a href="{{ asset('assets/warranty/2023-us-inverters-warranty-terms-conditions-g2-new-regular.pdf') }}" target="_blank">2023-US-Inverters Warranty Terms & Conditions G2 New Regular</a></td>
                  <td class="font-secondary text-primary-black pr-5">English</td>
                  <td class="font-secondary text-primary-black pr-5">PDF</td>
                  <td class="font-secondary text-primary-black pr-5">328KB</td>
                  <td class="font-secondary text-primary-black pr-5">12/06/2023</td>
                  <td class="pl-10">
                    <a href="{{ asset('assets/warranty/2023-us-inverters-warranty-terms-conditions-g2-new-regular.pdf') }}" class="bg-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium" download="">
                    Downloads</a>
                  </td>
                </tr>
              </tbody>
            </table>
           </div>
          </li>
          <li class="border-b border-[#C8C8C8] pb-4 overflow-x-scroll">
           <div class=" w-[900px] lg:w-full">
            <table class="w-full ">
              <thead>
                <th class="font-secondary font-medium text-primary-black w-2/5 pb-4">File</th>
                <th class="font-secondary font-medium text-primary-black w-1/5 pb-4">Language</th>
                <th class="font-secondary font-medium text-primary-black w-1/5 pb-4">Format</th>
                <th class="font-secondary font-medium text-primary-black w-1/5 pb-4">Size</th>
                <th class="font-secondary font-medium text-primary-black w-1/5 pb-4">Last Updated</th>
                <th></th>
              </thead>
              <tbody>
                <tr>
                  <td class="font-secondary text-primary-black pr-5 "><a href="{{ asset('assets/warranty/warranty-terms-and-conditions-us-and-canada-english-20240723.pdf') }}" target="_blank">Warranty Terms and Conditions Us english-20240723</a></td>
                  <td class="font-secondary text-primary-black pr-5">English</td>
                  <td class="font-secondary text-primary-black pr-5">PDF</td>
                  <td class="font-secondary text-primary-black pr-5">978KB</td>
                  <td class="font-secondary text-primary-black pr-5">24/07/2024</td>
                  <td class="pl-10">
                    <a href="{{ asset('assets/warranty/warranty-terms-and-conditions-us-and-canada-english-20240723.pdf') }}" class="bg-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium" download="">
                    Downloads</a>
                  </td>
                </tr>
              </tbody>
            </table>
           </div>
          </li>
          <!-- <li class="border-b border-[#C8C8C8] pb-4 overflow-x-scroll">
           <div class=" w-[900px] lg:w-full">
            <table class="w-full ">
              <thead>
                <th class="font-secondary font-medium text-primary-black w-2/5 pb-4">File</th>
                <th class="font-secondary font-medium text-primary-black w-1/5 pb-4">Language</th>
                <th class="font-secondary font-medium text-primary-black w-1/5 pb-4">Format</th>
                <th class="font-secondary font-medium text-primary-black w-1/5 pb-4">Size</th>
                <th class="font-secondary font-medium text-primary-black w-1/5 pb-4">Last Updated</th>
                <th></th>
              </thead>
              <tbody>
                <tr>
                  <td class="font-secondary text-primary-black pr-5 "><a href="{{ asset('assets/warranty/2023-us-inverters-warranty-terms-conditions-g2-only-for-panasonic.pdf') }}" target="_blank">2023-US-Inverters Warranty Terms & Conditions G2 Only for Panasonic</a></td>
                  <td class="font-secondary text-primary-black pr-5">English</td>
                  <td class="font-secondary text-primary-black pr-5">PDF</td>
                  <td class="font-secondary text-primary-black pr-5">351KB</td>
                  <td class="font-secondary text-primary-black pr-5">12/06/2023</td>
                  <td class="pl-10">
                    <a href="{{ asset('assets/warranty/2023-us-inverters-warranty-terms-conditions-g2-only-for-panasonic.pdf') }}" class="bg-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium" download="">
                    Downloads</a>
                  </td>
                </tr>
              </tbody>
            </table>
           </div>
          </li> -->
        </ul>
        <ul class="accordion flex flex-col gap-5">
          <li class="accordion-item">
            <button class="accordion-header px-6 py-4 bg-primary-black inline-block w-full flex items-center gap-2">
              <div class="relative w-6 h-6">
                <img class="absolute transition-opacity duration-300" src="{{ asset('assets/download/PlusCircle.svg') }}"
                  alt="PlusCircle"/>
                <img class="absolute transition-opacity duration-300 opacity-0" src="{{ asset('assets/download/MinusCircle.svg') }}" alt="MinusCircle"/>
              </div>
              <h3 class="font-primary font-semibold text-primary-yellow text-lg">
                Warranty period for Inverters
              </h3>
            </button>
            <div class="accordion-content border-[#C8C8C8] overflow-hidden transition-all duration-300 max-h-0">
              <div class="py-6 px-4 grid grid-cols-1  lg:grid-cols-2 gap-4">
                <div class="flex flex-col gap-6">
                  <h3 class="bg-[#C8C8C8] font-secondary font-bold text-primary-black text-center py-4">
                    Product
                  </h3>
                  <ul class="flex flex-col gap-4">
                    <li class="pb-1 border-b border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">A1-HYB/AC-3.8K-G2</span>
                    </li>
                    <li class="pb-1 border-b border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">A1-HYB/AC-5.0K-G2</span>
                    </li>
                    <li class="pb-1 border-b border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">A1-HYB/AC-6.0K-G2</span>
                    </li>
                    <li class="pb-1 border-b border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">A1-HYB/AC-7.6K-G2</span>
                    </li>
                    <li class="pb-1 border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">A1-B1-200</span>
                    </li>
                    <!-- <li class="pb-1 border-b border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">BI PRO (only for Panasonic)</span>
                    </li> -->
                  </ul>
                </div>
                <div class="flex flex-col gap-6">
                  <h3 class="bg-[#C8C8C8] font-secondary font-bold text-primary-black text-center py-4">Warranty Period</h3>
                  <div class="flex flex-col gap-4">
                    <span class="font-secondary text-primary-black">12 years standard warranty starting from the earlier one of the following two dates:</span>
                    <ul>
                      <li>
                        <span class="font-secondary text-primary-black font-medium">
                          The date on which the product was first installed;</span>
                      </li>
                      <li>
                        <span class="font-secondary text-primary-black font-medium">9 months after the date</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="accordion-item">
            <button class="accordion-header px-6 py-4 bg-primary-black inline-block w-full flex items-center gap-2">
              <div class="relative w-6 h-6">
                <img class="absolute transition-opacity duration-300" src="{{ asset('assets/download/PlusCircle.svg') }}" alt="PlusCircle"/>
                <img class="absolute transition-opacity duration-300 opacity-0" src="{{ asset('assets/download/MinusCircle.svg') }}" alt="MinusCircle"/>
              </div>
              <h3 class="font-primary font-semibold text-primary-yellow text-lg">
                Warranty period for Battery
              </h3>
            </button>

            <div class="accordion-content border-[#C8C8C8] overflow-hidden transition-all duration-300 max-h-0">
              <div class="py-6 px-4 grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div class="flex flex-col gap-32">
                  <h3 class="bg-[#C8C8C8] font-secondary font-bold text-primary-black text-center py-4">
                    Product
                  </h3>
                  <ul class="flex flex-col gap-16">
                    <li class="pb-1 border-b border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">TBMS-MCS60060 (MC60060)</span>
                    </li>
                    <li class="pb-1 border-b border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">TP-HS50 (HV51100)</span>
                    </li>
                    <li class="pb-1 border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">Battery Base</span>
                    </li>
                  </ul>
                </div>
                <div class="flex flex-col gap-6">
                  <h3 class="bg-[#C8C8C8] font-secondary font-bold text-primary-black text-center py-4">
                    Warranty Period
                  </h3>

                  <div class="flex flex-col gap-4">
                    <span class="font-secondary text-primary-black">12 years standard warranty with 70% of rated capacity starting from the earlier one of the following two dates:</span>
                    <ul>
                      <li>
                        <span class="font-secondary text-primary-black font-medium">
                        The date on which the product was first installed;</span>
                      </li>
                      <li>
                        <span class="font-secondary text-primary-black font-medium">9 months after the date of production;</span>
                      </li>
                      <li>
                        <span class="font-secondary text-primary-black font-medium">Energy throughput 13.13MWh.</span>
                      </li>

                      <li>
                        <span class="font-secondary text-primary-black font-medium">Capacity measurement condition</span>
                      </li>
                      <li>
                        <span class="font-secondary text-primary-black font-medium">- Ambient temperature: 25-30°C</span>
                      </li>
                      <li>
                        <span class="font-secondary text-primary-black font-medium">- Initial battery temperature from BMS: 25-30°C</span>
                      </li>
                      <li>
                        <span class="font-secondary text-primary-black font-medium">- Current and voltage measurement at battery DC side</span>
                      </li>
                      <li>
                        <span class="font-secondary text-primary-black font-medium">- Charging/discharging method</span>
                      </li>
                      <li>
                        <span class="font-secondary text-primary-black font-medium">Charge: 0.2CC/CV (Constant voltage (58.4)V, Cut-off current (0.05)C)</span>
                      </li>
                      <li>
                        <span class="font-secondary text-primary-black font-medium">Discharge: 0.2CC/CV, (Cut- off voltage 42.5V)</span>
                      </li>
                      <li>
                        <span class="font-secondary text-primary-black font-medium">Current at 0.2C: 20A</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="accordion-item">
            <button class="accordion-header px-6 py-4 bg-primary-black inline-block w-full flex items-center gap-2">
              <div class="relative w-6 h-6">
                <img class="absolute transition-opacity duration-300" src="{{ asset('assets/download/PlusCircle.svg') }}" alt="PlusCircle"/>
                <img class="absolute transition-opacity duration-300 opacity-0" src="{{ asset('assets/download/MinusCircle.svg') }}" alt="MinusCircle"/>
              </div>
              <h3 class="font-primary font-semibold text-primary-yellow text-lg">
                Warranty period for Accessories
              </h3>
            </button>

            <div class="accordion-content border-[#C8C8C8] overflow-hidden transition-all duration-300 max-h-0">
              <div class="py-6 px-4 grid grid-cols-1  lg:grid-cols-2 gap-4">
                <div class="flex flex-col gap-6">
                  <h3 class="bg-[#C8C8C8] font-secondary font-bold text-primary-black text-center py-4">
                    Product
                  </h3>
                  <ul class="flex flex-col gap-4">
                    <li class="pb-1 border-b border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">CT</span>
                    </li>
                    <li class="pb-1 border-b border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">Pocket WIFI 3.0</span>
                    </li>
                    <li class="pb-1 border-b border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">Pocket WiFi+ LAN</span>
                    </li>
                    <li class="pb-1 border-b border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">Pocket WiFi+ 4G</span>
                    </li>
                    <li class="pb-1 border-b border-[#C8C8C8]">
                      <span class="font-secondary text-primary-black">Switch Box</span>
                    </li>
                  </ul>
                </div>
                <div class="flex flex-col gap-6">
                  <h3 class="bg-[#C8C8C8] font-secondary font-bold text-primary-black text-center py-4">
                    Warranty Period
                  </h3>

                  <div class="flex flex-col gap-4">
                    <span class="font-secondary text-primary-black">5 years standard warranty starting from the earlier one of the following two dates:</span>
                    <ul>
                      <li>
                        <span class="font-secondary text-primary-black font-medium">
                          The date on which the product was first installed;</span>
                      </li>
                      <li>
                        <span class="font-secondary text-primary-black font-medium">9 months after the date</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
@include('layout.newsletter')
<script>
  document.querySelectorAll(".accordion-header").forEach((button) => {
    button.addEventListener("click", () => {
      const content = button.nextElementSibling;
      const plusIcon = button.querySelector('img[alt="PlusCircle"]');
      const minusIcon = button.querySelector('img[alt="MinusCircle"]');
      // Toggle content
      if (content.style.maxHeight && content.style.maxHeight !== "0px") {
        content.style.maxHeight = "0px";
        if (content.classList.contains("accordion-content")) {
          content.classList.remove("border");
        }
        plusIcon.classList.remove("opacity-0");
        minusIcon.classList.add("opacity-0");
      }else{
        content.style.maxHeight = "2000px";
        if (content.classList.contains("accordion-content")) {
          content.classList.add("border");
        }
        plusIcon.classList.add("opacity-0");
        minusIcon.classList.remove("opacity-0");
      }
    });
  });
  $(document).ready(function(){
    $("#countryId").on('change', function(){
      var val = $(this).val();
      if(val == 'global'){
        $('#global_contacts').show();
        $('#us_contacts').hide();
      }else{
        $('#us_contacts').show();
        $('#global_contacts').hide();
      }
    });
  });
</script>
@endsection
