<!-- Models -->
<div id="success-story-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white w-[90%] md:w-[70%] lg:w-[60%] xl:w-[50%] rounded-lg p-8 shadow-lg relative">
        <!-- Close Button -->
        <button onclick="closeModal()" class="absolute top-4 right-4 text-black focus:outline-none">
            <img src="{{ asset('/assets/successStories/cross.png') }}" class="w-6 h-6" alt="">
        </button>

        <!-- Modal Content -->
        <h2 class="text-[32px] font-primary leading-[24px] text-primary-black font-semibold pb-3 mb-6 border-b border-[#F5F5F5]">Success Story</h2>
        <div id="success-story-modal-body" class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Left Side: Image -->
            <div>
                <img id="projectImage" src="" alt="Project Image" class="w-full rounded-lg">
            </div>

            <!-- Right Side: Details -->
            <div class="flex flex-col gap-10">
                <div>
                    <h3 class="text-base font-primary leading-[24px] text-primary-black font-semibold">Country</h3>
                    <p id="country_name" class="text-primary-black font-secondary text-base leading-[24px]"></p>
                </div>
                <div id="detail_box">
                    <h3 class="text-base font-primary leading-[24px] text-primary-black font-semibold" id="details_title">Details</h3>
                    <p id="details" class="text-primary-black font-secondary text-base leading-[24px]">

                    </p>
                </div>
                <div id="related_product_box" class="flex flex-col gap-2">
                    <h3 class="text-base font-primary leading-[24px] text-primary-black font-semibold" id="related_product_title">Related Products</h3>
                    <div class="flex items-center gap-3" id="related_product">
                    </div>
                </div>
            </div>
        </div>

        <div id="success-story-modal-loader" class="hidden text-center py-4">
            <svg class="animate-spin h-8 w-8 text-primary-yellow mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
            </svg>
        </div>
    </div>
</div>
