<!-- Company Info HTML START -->
<li class="accordion-item">
    <button class="accordion-header px-6 py-4 bg-primary-black inline-block w-full flex items-center gap-2">
        <div class="relative w-6 h-6">
            <img class="absolute transition-opacity duration-300 lazyload" data-src="{{ asset('assets/download/PlusCircle.svg') }}" alt="PlusCircle" />
            <img class="absolute transition-opacity duration-300 opacity-0 lazyload" data-src="{{ asset('assets/download/MinusCircle.svg') }}" alt="MinusCircle" />
        </div>
        <h3 class="font-primary font-semibold text-primary-yellow text-lg">Company Info</h3>
    </button>

    <div class="accordion-content border-[#C8C8C8] overflow-hidden transition-all duration-300 max-h-0">
        <ul class="py-6 px-5 lg:px-14">
            <?php if ($companyDownload->count() > 0) { ?>
                <li class="overflow-x-scroll">
                    <div class=" w-[900px] lg:w-full">
                        <table class="w-full ">
                            <thead>
                                <th
                                    class="font-secondary font-medium text-primary-black w-2/5 pb-4">
                                    File
                                </th>
                                <th
                                    class="font-secondary font-medium text-primary-black w-1/5 pb-4">
                                    Language
                                </th>
                                <th
                                    class="font-secondary font-medium text-primary-black w-1/5 pb-4">
                                    Format
                                </th>
                                <th
                                    class="font-secondary font-medium text-primary-black w-1/5 pb-4">
                                    Size
                                </th>
                                <th
                                    class="font-secondary font-medium text-primary-black w-1/5 pb-4">
                                    Last Updated
                                </th>
                                <th></th>
                            </thead>

                            <tbody>
                                <?php foreach ($companyDownload as $item) { ?>
                                    <tr>
                                        <td class="font-secondary text-primary-black pr-5 ">
                                            {{ $item->name }}
                                        </td>
                                        <td class="font-secondary text-primary-black pr-5">
                                            {{ $item->language }}
                                        </td>
                                        <td class="font-secondary text-primary-black pr-5">{{ $item->format}}</td>
                                        <td class="font-secondary text-primary-black pr-5">{{ $item->size}}</td>
                                        <td class="font-secondary text-primary-black pr-5">
                                            {{ $item->last_updated }}
                                        </td>
                                        <td class="pl-10">
                                            <button
                                                onclick="window.open('/uploads/file/{{ $item->file_name }}')"
                                                class="bg-primary-yellow border border-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium transition-all duration-300 hover:bg-transparent hover:text-primary-black hover:border-primary-black">
                                                Download
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </li>
            <?php } else { ?>
                <li>
                    <p>No Company Info Found!</p>
                </li>
            <?php } ?>
        </ul>
    </div>
</li>

<!-- Product Info HTML START -->
<li class="accordion-item">
    <button class="accordion-header px-6 py-4 bg-primary-black inline-block w-full flex items-center gap-2">
        <div class="relative w-6 h-6">
            <img class="absolute transition-opacity duration-300 lazyload" data-src="{{ asset('assets/download/PlusCircle.svg') }}"
                alt="PlusCircle" />
            <img class="absolute transition-opacity duration-300 opacity-0 lazyload" data-src="{{ asset('assets/download/MinusCircle.svg') }}" alt="MinusCircle" />
        </div>
        <h3 class="font-primary font-semibold text-primary-yellow text-lg">
            Product
        </h3>
    </button>

    <div class="accordion-content border-[#C8C8C8] overflow-hidden transition-all duration-300 max-h-0">
        <ul class="flex flex-col py-6 px-5 lg:px-14 gap-5" id="product_info_data">
            <?php if (count($productInfo) > 0) { ?>
                <?php foreach ($productInfo as $key => $value1) { ?>
                    <li class="accordion-sub-item">
                        <button class="sub-accordion-header px-6 py-4 bg-[#C8C8C84D] inline-block w-full flex items-center gap-2">
                            <div class="relative w-6 h-6">
                                <img class="absolute transition-opacity duration-300 lazyload" data-src="{{ asset('assets/download/PlusCircleBlack.svg') }}" alt="PlusCircle" />
                                <img class="absolute transition-opacity duration-300 opacity-0 lazyload" data-src="{{ asset('assets/download/MinusCircleBlack.svg') }}" alt="MinusCircle" />
                            </div>
                            <h3 class="font-primary font-semibold text-primary-black text-lg">{{ $key }}</h3>
                        </button>
                        <div class="sub-accordion-content overflow-hidden transition-all duration-300 max-h-0">
                            <ul class="py-6 lg:pl-14">
                                <li>
                                    <ul class="flex flex-col gap-5">
                                        <?php foreach ($value1 as $key1 => $value2) { ?>
                                            <li>
                                                <button class="sub-accordionB-header px-6 py-4 bg-[#C8C8C84D] inline-block w-full flex items-center gap-2">
                                                    <div class="relative w-6 h-6">
                                                        <img class="absolute transition-opacity duration-300 lazyload" data-src="{{ asset('assets/download/PlusCircleBlack.svg') }}" alt="PlusCircle" />
                                                        <img class="absolute transition-opacity duration-300 opacity-0 lazyload" data-src="{{ asset('assets/download/MinusCircleBlack.svg') }}" alt="MinusCircle" />
                                                    </div>
                                                    <h3 class="font-primary font-semibold text-primary-black text-lg">{{ $key1 }}</h3>
                                                </button>
                                                <div class="sub-accordionB-content overflow-hidden transition-all duration-300 max-h-0">
                                                    <ul class="py-6 lg:pl-14">
                                                        <?php foreach ($value2 as $key3 => $value3) { ?>
                                                            <li>
                                                                <button class="inner-accordion-header py-2 inline-block w-full flex items-center gap-2">
                                                                    <div class="relative w-6 h-6">
                                                                        <img
                                                                            class="absolute transition-opacity duration-300 lazyload"
                                                                            data-src="{{ asset('assets/download/PlusCircleBlack.svg') }}"
                                                                            alt="PlusCircle" />
                                                                        <img
                                                                            class="absolute transition-opacity duration-300 opacity-0 lazyload"
                                                                            data-src="{{ asset('assets/download/MinusCircleBlack.svg') }}"
                                                                            alt="MinusCircle" />
                                                                    </div>
                                                                    <h3 class="font-primary font-semibold text-primary-black text-lg">{{ $key3 }}</h3>
                                                                </button>
                                                                <div class="inner-accordionB-content overflow-hidden pl-4 transition-all duration-300 max-h-0">
                                                                    <ul class="py-6">
                                                                        <?php foreach ($value3 as $key4 => $value4) {
                                                                            if ($key3 == 'Certification') { ?>
                                                                                <li>
                                                                                    <button class="inner-accordion-header py-2 inline-block w-full flex items-center gap-2">
                                                                                        <div class="relative w-6 h-6">
                                                                                            <img
                                                                                                class="absolute transition-opacity duration-300 lazyload"
                                                                                                data-src="{{ asset('assets/download/PlusCircleBlack.svg') }}"
                                                                                                alt="PlusCircle" />
                                                                                            <img
                                                                                                class="absolute transition-opacity duration-300 opacity-0 lazyload"
                                                                                                data-src="{{ asset('assets/download/MinusCircleBlack.svg') }}"
                                                                                                alt="MinusCircle" />
                                                                                        </div>
                                                                                        <h3 class="font-primary font-semibold text-primary-black text-lg">{{ $value4[0]['certificate']['name']??'' }}</h3>
                                                                                    </button>
                                                                                    <div class="inner-accordionB-content overflow-hidden pl-4 transition-all duration-300 max-h-0">

                                                                                    <?php foreach ($value4 as $key5 => $value5) { ?><ul class="py-6">
                                                                                            <?php
                                                                                            // print_r($value5); exit;
                                                                                            // foreach ($value5 as $key6 => $value6) {
                                                                                            ?>

                                                                                            <li class="border-b border-[#C8C8C8] pb-4 overflow-x-scroll">
                                                                                                <div class=" w-[900px] lg:w-full">
                                                                                                    <table class="w-full ">
                                                                                                        <thead>
                                                                                                            <th class="font-secondary font-medium text-primary-black w-2/5 pb-4">File</th>
                                                                                                            <th class="font-secondary font-medium text-primary-black w-1/5 pb-4">Language</th>
                                                                                                            <th class="font-secondary font-medium text-primary-black w-1/5 pb-4">Format</th>
                                                                                                            <th class="font-secondary font-medium text-primary-black w-1/5 pb-4">Size</th>
                                                                                                            <th class="font-secondary font-medium text-primary-black w-1/5 pb-4"> Last Updated</th>
                                                                                                            <th></th>
                                                                                                        </thead>
                                                                                                        <tbody>

                                                                                                                <tr>
                                                                                                                    <td class="font-secondary text-primary-black pr-5">{{ $value5['file_name']??'' }}</td>
                                                                                                                    <td class="font-secondary text-primary-black pr-5">{{ $value5['language']??'' }}</td>
                                                                                                                    <td class="font-secondary text-primary-black pr-5">{{ $value5['format']??'' }}</td>
                                                                                                                    <td class="font-secondary text-primary-black pr-5">{{ $value5['size']??'' }}</td>
                                                                                                                    <td class="font-secondary text-primary-black pr-5">{{ $value5['date']??'' }}</td>
                                                                                                                    <td class="pl-10">
                                                                                                                        <button
                                                                                                                            onclick="window.open('/uploads/file/{{ $value5['file']??'' }}')"
                                                                                                                            class="bg-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium border border-primary-yellow transition-all duration-300 hover:bg-transparent hover:text-primary-black hover:border-primary-black" formtarget="_blank">
                                                                                                                            Download
                                                                                                                        </button>
                                                                                                                    </td>
                                                                                                                </tr>

                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </div>
                                                                                            </li>

                                                                                        </ul> <?php } ?>
                                                                                    </div>
                                                                                </li>
                                                                            <?php } else { ?>
                                                                                <li class="border-b border-[#C8C8C8] pb-4 overflow-x-scroll">
                                                                                    <div class=" w-[900px] lg:w-full">
                                                                                        <table class="w-full ">
                                                                                            <thead>
                                                                                                <th class="font-secondary font-medium text-primary-black w-2/5 pb-4">File</th>
                                                                                                <th class="font-secondary font-medium text-primary-black w-1/5 pb-4">Language</th>
                                                                                                <th class="font-secondary font-medium text-primary-black w-1/5 pb-4">Format</th>
                                                                                                <th class="font-secondary font-medium text-primary-black w-1/5 pb-4">Size</th>
                                                                                                <th class="font-secondary font-medium text-primary-black w-1/5 pb-4"> Last Updated</th>
                                                                                                <th></th>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td class="font-secondary text-primary-black pr-5">{{ $value4['file_name'] }}</td>
                                                                                                    <td class="font-secondary text-primary-black pr-5">{{ $value4['language'] }}</td>
                                                                                                    <td class="font-secondary text-primary-black pr-5">{{ $value4['format'] }}</td>
                                                                                                    <td class="font-secondary text-primary-black pr-5">{{ $value4['size'] }}</td>
                                                                                                    <td class="font-secondary text-primary-black pr-5">{{ $value4['date'] }}</td>
                                                                                                    <td class="pl-10"><button onclick="window.open('/uploads/file/{{ $value4['file'] }}')" class="bg-primary-yellow border border-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium  transition-all duration-300 hover:bg-transparent hover:text-primary-black hover:border-primary-black">Download</button></td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </li>
                                                                        <?php }
                                                                        } ?>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php } ?>
            <?php } else { ?>
                <li>
                    <p>No Product Data Found!</p>
                </li>
            <?php } ?>
        </ul>
    </div>
</li>
<!-- Product Info HTML END -->

<!-- Marketing Info HTML START -->
<li class="accordion-item">
    <button
        class="accordion-header px-6 py-4 bg-primary-black inline-block w-full flex items-center gap-2">
        <div class="relative w-6 h-6">
            <img
                class="absolute transition-opacity duration-300 lazyload"
                data-src="{{ asset('assets/download/PlusCircle.svg') }}"
                alt="PlusCircle" />
            <img
                class="absolute transition-opacity duration-300 opacity-0 lazyload"
                data-src="{{ asset('assets/download/MinusCircle.svg') }}"
                alt="MinusCircle" />
        </div>
        <h3
            class="font-primary font-semibold text-primary-yellow text-lg">
            Marketing Material
        </h3>
    </button>

    <div class="accordion-content border-[#C8C8C8] overflow-hidden transition-all duration-300 max-h-0">
        <ul class="flex flex-col py-6 px-5 lg:px-14 gap-5" id="material_marketing_data">
            <?php if (count($marketingInfo) > 0) { ?>
                <?php foreach ($marketingInfo as $key => $data_item) { ?>
                    <li class="accordion-sub-item">
                        <button class="sub-accordion-header px-6 py-4 bg-[#C8C8C84D] inline-block w-full flex items-center gap-2">
                            <div class="relative w-6 h-6">
                                <img class="absolute transition-opacity duration-300" src="{{ asset('assets/download/PlusCircleBlack.svg') }}" alt="PlusCircle" />
                                <img class="absolute transition-opacity duration-300 opacity-0" src="{{ asset('assets/download/MinusCircleBlack.svg') }}" alt="MinusCircle" />
                            </div>
                            <h3 class="font-primary font-semibold text-primary-black text-lg">{{ $key }}</h3>
                        </button>
                        <div class="sub-accordion-content overflow-hidden transition-all duration-300 max-h-0">
                            <ul class="py-6 lg:pl-14">
                                <li>
                                    <ul class="flex flex-col gap-5">
                                        <?php foreach ($data_item as $x => $item) { ?>
                                            <li>
                                                <button class="sub-accordionB-header px-6 py-4 bg-[#C8C8C84D] inline-block w-full flex items-center gap-2">
                                                    <div class="relative w-6 h-6">
                                                        <img class="absolute transition-opacity duration-300" src="{{ asset('assets/download/PlusCircleBlack.svg') }}" alt="PlusCircle" />
                                                        <img class="absolute transition-opacity duration-300 opacity-0" src="{{ asset('assets/download/MinusCircleBlack.svg') }}" alt="MinusCircle" />
                                                    </div>
                                                    <h3 class="font-primary font-semibold text-primary-black text-lg">{{ $x }}</h3>
                                                </button>
                                                <div class="sub-accordionB-content border-[#C8C8C8] overflow-hidden transition-all duration-300 max-h-0">
                                                    <ul class="py-6 px-5 lg:px-14">
                                                        <?php foreach ($item as $y => $value) { ?>
                                                            <li class="border-b border-[#C8C8C8] pb-4 overflow-x-scroll">
                                                                <div class="w-[900px] lg:w-full">
                                                                    <table id="companyInfoTable" class="w-full ">
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
                                                                                <td class="font-secondary text-primary-black pr-5">{{ $value['name'] }}</td>
                                                                                <td class="font-secondary text-primary-black pr-5">{{ $value['language'] }}</td>
                                                                                <td class="font-secondary text-primary-black pr-5">{{ $value['format'] }}</td>
                                                                                <td class="font-secondary text-primary-black pr-5">{{ $value['size'] }}</td>
                                                                                <td class="font-secondary text-primary-black pr-5">{{ $value['last_updated'] }}</td>
                                                                                <!-- <td><a target="_blank" href="/uploads/file/{{ $value['name'] }}" class="bg-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium">Download</a></td> -->
                                                                                <td class="pl-10"><button onclick="window.open('/uploads/file/{{ $value['file_name'] }}')" class="bg-primary-yellow border border-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium  transition-all duration-300 hover:bg-transparent hover:text-primary-black hover:border-primary-black">Download</button></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php } ?>
            <?php } else { ?>
                <li>
                    <p>No marketing Material Found!</p>
                </li>
            <?php } ?>
        </ul>
    </div>
</li>
<!-- Marketing Info HTML END -->
<script>
    document.querySelectorAll(".accordion-header , .sub-accordion-header , .sub-accordionB-header , .inner-accordion-header").forEach((button) => {
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
            } else {
                content.style.maxHeight = "10000px";
                // content.style.overflow = "scroll";
                if (content.classList.contains("accordion-content")) {
                    content.classList.add("border");
                }
                plusIcon.classList.add("opacity-0");
                minusIcon.classList.remove("opacity-0");
            }
        });
    });
</script>
