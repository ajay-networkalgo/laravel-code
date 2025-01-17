<?php if (count($data) > 0) { ?>
    <?php foreach ($data as $key => $data_item) { ?>
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
                                                                    <td>{{ $value['name'] }}</td>
                                                                    <td>{{ $value['language'] }}</td>
                                                                    <td>{{ $value['format'] }}</td>
                                                                    <td>{{ $value['size'] }}</td>
                                                                    <td>{{ $value['last_updated'] }}</td>
                                                                    <td><a target="_blank" href="/uploads/file/{{ $value['name'] }}" class="bg-primary-yellow px-6 py-3 rounded-full font-primary text-primary-black font-medium">Download</a></td>
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
<?php }  ?>
<script>
    document
        .querySelectorAll(
            ".accordion-header , .sub-accordion-header , .sub-accordionB-header , .inner-accordion-header"
        )
        .forEach((button) => {
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
                    content.style.maxHeight = "2000px";
                    if (content.classList.contains("accordion-content")) {
                        content.classList.add("border");
                    }
                    plusIcon.classList.add("opacity-0");
                    minusIcon.classList.remove("opacity-0");
                }
            });
        });
    // }
    // callBackJavascript();
