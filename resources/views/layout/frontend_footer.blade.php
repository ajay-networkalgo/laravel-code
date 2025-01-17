@php
$routeName = Route::currentRouteName();
@endphp
@if($routeName == 'frontened.book.consultation' || $routeName == 'frontened.book.success')
<section>
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div
            class="py-4 flex flex-col md:flex-row items-center justify-center gap-5">
            <div class="md:border-r border-[#C8C8C8] pr-5">
                <span class="font-secondary text-[#C8C8C8]">Copyright 2024 @Olax Power</span>
            </div>

            <ul class="flex items-center gap-6">
                <li>
                    <a class="font-secondary text-[#C8C8C8]" href="{{ route('frontened.sitemap') }}">Sitemap</a>
                </li>
                <li>
                    <a class="font-secondary text-[#C8C8C8]" href="{{ route('frontened.terms-of-use') }}">Terms of Use</a>
                </li>
                <li>
                    <a class="font-secondary text-[#C8C8C8]" href="{{ route('frontened.privacy-policy') }}">Privacy Policy</a>
                </li>
            </ul>
        </div>
    </div>
</section>
@else
<!-- <footer class="pt-24">
    <div class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-10 lg:flex-row lg:justify-between">
            <div class="flex justify-center">
                <a href="{{ url('/') }}">
                    <img class="lazyload" data-src="{{asset('assets/footer_logo.svg')}}" alt="footer_logo" />
                </a>
            </div>
            <ul class="grid grid-cols-2 gap-y-10 gap-x-6 lg:w-[70%] lg:flex lg:justify-between">
                <li class="flex flex-col gap-8">
                    <span class="font-primary text-primary-white text-base font-medium">Company</span>
                    <ul class="flex flex-col gap-4">
                        <li>
                            <a href="{{ route('frontened.about.us') }}" class="font-secondary text-primary-grey">About Olax</a>
                        </li>
                        <li>
                            <a href="{{ route('news.frontened.index') }}" class="font-secondary text-primary-grey">News</a>
                        </li>
                        <li>
                            <a href="{{ route('blogs.frontened.index') }}" class="font-secondary text-primary-grey">Blog</a>
                        </li>
                        <li>
                            <a href="{{ route('success_story.frontened.index') }}" class="font-secondary text-primary-grey">Success Stories</a>
                        </li>
                        <li>
                            <a href="{{ route('events.frontened.index') }}" class="font-secondary text-primary-grey">Events</a>
                        </li>
                        <li>
                            <a href="{{ route('frontened.sustainability') }}" class="font-secondary text-primary-grey">Sustainability</a>
                        </li>
                        <li>
                            <a href="{{ route('frontened.contact.us') }}" class="font-secondary text-primary-grey">Contact us</a>
                        </li>
                        <li>
                            <a href="{{ route('frontened.products') }}" class="font-secondary text-primary-grey">Products</a>
                        </li>
                    </ul>
                </li>
                <li class="flex flex-col gap-8">
                    <span class="font-primary text-primary-white text-base font-medium">Solutions</span>
                    <ul class="flex flex-col gap-4">
                        <li>
                            <a href="{{ route('frontened.energy.storage.system') }}" class="font-secondary text-primary-grey">Energy Storage System</a>
                        </li>
                    </ul>
                </li>
                <li class="flex flex-col gap-8">
                    <span class="font-primary text-primary-white text-base font-medium">Services</span>
                    <ul class="flex flex-col gap-4">
                        <li>
                            <a href="{{ route('frontened.download') }}" class="font-secondary text-primary-grey">Downloads</a>
                        </li>
                        <li>
                            <a href="{{ route('frontened.where.to.buy') }}" class="font-secondary text-primary-grey">Find a Distributor</a>
                        </li>
                        <li>
                            <a href="{{ route('frontened.global.contacts') }}" class="font-secondary text-primary-grey">Global Contacts</a>
                        </li>
                        <li>
                            <a href="{{ route('frontened.warranty.policy') }}" class="font-secondary text-primary-grey">Warranty Policy</a>
                        </li>
                        <li>
                            <a href="https://www.Olaxcloud.com/#/warranty" class="font-secondary text-primary-grey">Warranty Registration</a>
                        </li>
                    </ul>
                </li>
                <li class="flex flex-col gap-8">
                    <span class="font-primary text-primary-white text-base font-medium">Upgrade</span>
                    <ul class="flex flex-col gap-4">
                        <li>
                            <a href="https://www.Olaxcloud.com/#/login" class="font-secondary text-primary-grey">Olax Cloud</a>
                        </li>
                        <li>
                            <a href="https://kb.Olaxpower.com/support" class="font-secondary text-primary-grey">Support</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="mt-16">
            <div class="w-full h-[1px] bg-gradient-to-r from-[#15151566] via-[#7070705F] to-[#15151566]"></div>
            <div class="py-5 flex flex-col items-center gap-6 lg:flex-row lg:justify-between">
                <ul class="flex items-center gap-5">
                    <li>
                        <a href="https://www.facebook.com/Olaxpowerus">
                            <img class="lazyload" data-src="{{ asset('assets/fb.svg') }}" alt="fb" />
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/Olaxpowerglobal">
                            <img class="lazyload" data-src="{{ asset('assets/yt.svg') }}" alt="yt" />
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/company/Olax-power-us">
                            <img class="lazyload" data-src="{{ asset('assets/linkedin.svg') }}" alt="linkedin" />
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/Olaxpower">
                            <img class="lazyload" data-src="{{ asset('assets/twitter.svg') }}" alt="twitter" />
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/Olaxpowerglobal">
                            <img class="lazyload" data-src="{{ asset('assets/instagram.svg') }}" alt="instagram" />
                        </a>
                    </li>
                </ul>
                <ul class="flex gap-5">
                    <li>
                        <a href="{{ route('frontened.sitemap') }}" class="font-secondary text-primary-grey">Sitemap</a>
                    </li>
                    <li>
                        <a href="{{ route('frontened.terms-of-use') }}" class="font-secondary text-primary-grey">Terms of Use</a>
                    </li>
                    <li>
                        <a href="{{ route('frontened.privacy-policy') }}" class="font-secondary text-primary-grey">Privacy Policy</a>
                    </li>
                </ul>
                <p class="font-secondary text-primary-grey">
                    Copyright @Olax Power
                </p>
            </div>
        </div>
    </div>
</footer> -->

<!-- footer -->
<footer class="pt-24">
    <div
        class="default_container max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl xl:max-w-6xl 2xl:max-w-7xl mx-auto">
        <div class="flex flex-col gap-10 lg:flex-row lg:justify-between">
            <!-- footer logo -->
            <div class="flex justify-center">
                <a href="{{ url('/') }}">
                    <img class="lazyload" data-src="{{asset('assets/footer_logo.svg')}}" alt="footer_logo" />
                </a>
            </div>

            <!-- footer menu -->
            <ul class="flex flex-col gap-4 lg:w-[70%] lg:flex-row lg:justify-between">
                <!-- company section -->
                <li class="flex flex-col gap-4">
                    <button
                        class="font-primary text-primary-white text-base font-medium flex items-center justify-between lg:hidden"
                        onclick="toggleFooterSection('companySection', 'companyIcon')">
                        Company
                        <svg
                            id="companyIcon"
                            class="w-5 h-5 transition-transform duration-300 transform"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <span
                        class="font-primary text-primary-white text-base font-medium hidden lg:block">Company</span>

                    <ul
                        id="companySection"
                        class="flex flex-col gap-4 overflow-hidden max-h-0 transition-all duration-300 ease-in-out lg:max-h-full lg:flex">
                        <li>
                            <a href="{{ route('frontened.about.us') }}" class="font-secondary text-primary-grey">About Olax</a>
                        </li>
                        <li>
                            <a href="{{ route('news.frontened.index') }}" class="font-secondary text-primary-grey">News</a>
                        </li>
                        <li>
                            <a href="{{ route('blogs.frontened.index') }}" class="font-secondary text-primary-grey">Blog</a>
                        </li>
                        <li>
                            <a href="{{ route('success_story.frontened.index') }}" class="font-secondary text-primary-grey">Success Stories</a>
                        </li>
                        <li>
                            <a href="{{ route('events.frontened.index') }}" class="font-secondary text-primary-grey">Events</a>
                        </li>
                        <li>
                            <a href="{{ route('frontened.sustainability') }}" class="font-secondary text-primary-grey">Sustainability</a>
                        </li>
                        <li>
                            <a href="{{ route('frontened.contact.us') }}" class="font-secondary text-primary-grey">Contact us</a>
                        </li>
                        <li>
                            <a href="{{ route('frontened.products') }}" class="font-secondary text-primary-grey">Products</a>
                        </li>
                    </ul>
                </li>
                <li class="flex flex-col gap-4">
                    <button
                        class="font-primary text-primary-white text-base font-medium flex items-center justify-between lg:hidden"
                        onclick="toggleFooterSection('solutionsSection', 'solutionsIcon')">
                        Solutions
                        <svg
                            id="solutionsIcon"
                            class="w-5 h-5 transition-transform duration-300 transform"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <span
                        class="font-primary text-primary-white text-base font-medium hidden lg:block">Solutions</span>

                    <ul
                        id="solutionsSection"
                        class="flex flex-col gap-4 overflow-hidden max-h-0 transition-all duration-300 ease-in-out lg:max-h-full lg:flex">
                        <li>
                            <a href="{{ route('frontened.energy.storage.system') }}" class="font-secondary text-primary-grey">Energy Storage System</a>
                        </li>
                    </ul>
                </li>
                <li class="flex flex-col gap-4">
                    <button
                        class="font-primary text-primary-white text-base font-medium flex items-center justify-between lg:hidden"
                        onclick="toggleFooterSection('servicesSection', 'servicesIcon')">
                        Services
                        <svg
                            id="servicesIcon"
                            class="w-5 h-5 transition-transform duration-300 transform"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <span
                        class="font-primary text-primary-white text-base font-medium hidden lg:block">Services</span>

                    <ul
                        id="servicesSection"
                        class="flex flex-col gap-4 overflow-hidden max-h-0 transition-all duration-300 ease-in-out lg:max-h-full lg:flex">
                        <li>
                            <a href="{{ route('frontened.download') }}" class="font-secondary text-primary-grey">Downloads</a>
                        </li>
                        <li>
                            <a href="{{ route('frontened.where.to.buy') }}" class="font-secondary text-primary-grey">Find a Distributor</a>
                        </li>
                        <li>
                            <a href="{{ route('frontened.global.contacts') }}" class="font-secondary text-primary-grey">Global Contacts</a>
                        </li>
                        <li>
                            <a href="{{ route('frontened.warranty.policy') }}" class="font-secondary text-primary-grey">Warranty Policy</a>
                        </li>
                        <li>
                            <a href="https://www.Olaxcloud.com/#/warranty" class="font-secondary text-primary-grey">Warranty Registration</a>
                        </li>
                    </ul>
                </li>
                <li class="flex flex-col gap-4">
                    <button
                        class="font-primary text-primary-white text-base font-medium flex items-center justify-between lg:hidden"
                        onclick="toggleFooterSection('upgradeSection', 'upgradeIcon')">
                        Upgrade
                        <svg
                            id="upgradeIcon"
                            class="w-5 h-5 transition-transform duration-300 transform"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <span
                        class="font-primary text-primary-white text-base font-medium hidden lg:block">Upgrade</span>

                    <ul
                        id="upgradeSection"
                        class="flex flex-col gap-4 overflow-hidden max-h-0 transition-all duration-300 ease-in-out lg:max-h-full lg:flex">
                        <li>
                            <a href="https://www.Olaxcloud.com/#/login" class="font-secondary text-primary-grey">Olax Cloud</a>
                        </li>
                        <li>
                            <a href="https://kb.Olaxpower.com/support" class="font-secondary text-primary-grey">Support</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="mt-16">
            <div
                class="w-full h-[1px] bg-gradient-to-r from-[#15151566] via-[#7070705F] to-[#15151566]"></div>
            <div
                class="py-5 flex flex-col items-center gap-6 lg:flex-row lg:justify-between">
                <ul class="flex items-center gap-5">
                    <li>
                        <a href="https://www.facebook.com/Olaxpowerus">
                            <img class="lazyload" data-src="{{ asset('assets/fb.svg') }}" alt="fb" />
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/Olaxpowerglobal">
                            <img class="lazyload" data-src="{{ asset('assets/yt.svg') }}" alt="yt" />
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/company/Olax-power-us">
                            <img class="lazyload" data-src="{{ asset('assets/linkedin.svg') }}" alt="linkedin" />
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/Olaxpower">
                            <img class="lazyload" data-src="{{ asset('assets/twitter.svg') }}" alt="twitter" />
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/Olaxpowerglobal">
                            <img class="lazyload" data-src="{{ asset('assets/instagram.svg') }}" alt="instagram" />
                        </a>
                    </li>
                </ul>

                <!-- <ul class="flex gap-5">
                    <li>
                        <a href="" class="font-secondary text-primary-grey">Sitemap</a>
                    </li>
                    <li>
                        <a href="" class="font-secondary text-primary-grey">Terms of Use</a>
                    </li>
                    <li>
                        <a href="" class="font-secondary text-primary-grey">Privacy Policy</a>
                    </li>
                </ul> -->

                <ul class="flex gap-5">
                    <li>
                        <a href="{{ route('frontened.sitemap') }}" class="font-secondary text-primary-grey">Sitemap</a>
                    </li>
                    <li>
                        <a href="{{ route('frontened.terms-of-use') }}" class="font-secondary text-primary-grey">Terms of Use</a>
                    </li>
                    <li>
                        <a href="{{ route('frontened.privacy-policy') }}" class="font-secondary text-primary-grey">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="/privacy-policy#cookie-setting" class="font-secondary text-primary-grey">Cookie Settings</a>
                    </li>
                </ul>

                <p class="font-secondary text-primary-grey">
                    Copyright @Olax Power
                </p>
            </div>
        </div>
    </div>
</footer>
<script>
    function toggleFooterSection(sectionId, iconId) {
        const section = document.getElementById(sectionId);
        const icon = document.getElementById(iconId);

        // Toggle the section height
        if (section.style.maxHeight) {
            section.style.maxHeight = null; // Collapse the section
        } else {
            section.style.maxHeight = section.scrollHeight + "px"; // Expand the section
        }

        // Toggle the icon rotation
        icon.classList.toggle("rotate-180");
    }
</script>
@endif
