@php
$routeName = Route::currentRouteName();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="canonical" href="{{ url()->current() }}" />
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-15EX4GTVNL"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-15EX4GTVNL');
    </script>
    <!--custome code -->
    @if (!empty($customScripts))
        {!! $customScripts !!}
    @endif

    <!-- Event snippet for Submit lead form conversion page -->
    @if($routeName == 'frontened.book.success')
    <script>
        gtag('event', 'conversion', {
            'send_to': 'AW-16697750313/PvHQCIu7tNEZEKnmjZo-',
            'value': <?php echo $booking->email ?? '' ?>,
            'currency': <?php echo $booking->phone ?? '' ?>
        });
    </script>
    @endif
    <!-- Event snippet for Submit lead form conversion page -->

    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '536575802491528');
        fbq('track', 'PageView');
    </script><noscript> <img height="1" width="1" src="https://www.facebook.com/tr?id=536575802491528&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->

    <!-- AudienceLab Pixel Code -->
    <script type="text/javascript"> const pixelId = '22592129-f86f-4110-bd03-1707da1efaf5'; </script> <script src="https://cdn.audiencelab.io/pixel_V2.js" type="text/javascript"></script>
    <!-- End AudienceLab Pixel Code -->

    <title>{{ $metaTitle }}</title>
    <meta name="description" content="{{$metaDescription}}">
    <meta name="keywords" content="{{ $metaKeywords }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- <link rel="icon" type="image/png" href="{{ asset('/assets/favicon.png') }}"> -->
    <link rel="shortcut icon" href="{{ asset('/assets/favicon.ico') }}" />
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <script defer src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" /> -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="styles.css"></noscript>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/css/frontened/style.css') }}" />
    <style type="text/css">
        .error {
            color: red;
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-5px);
            }

            50% {
                transform: translateX(5px);
            }

            75% {
                transform: translateX(-5px);
            }
        }

        .shake {
            animation: shake 0.3s;
            animation-timing-function: ease-in-out;
        }
    </style>
    <style>
        /* From Uiverse.io by vinodjangid07 */
        .contactButton {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: rgb(20, 20, 20);
            border: 1px solid #f5f5f5;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.164);
            cursor: pointer;
            transition-duration: 0.3s;
            overflow: hidden;
            position: relative;
        }

        .svgIcon {
            transition-duration: 0.3s;
        }

        .svgIcon path {
            fill: white;
        }

        .contactButton:hover {
            width: 140px;
            border-radius: 50px;
            transition-duration: 0.3s;
            background-color: #eebb0c;
            align-items: center;
            border-color: #eebb0c;
        }

        .contactButton:hover .svgIcon {
            opacity: 0;
            width: 50px;
            transition-duration: 0.3s;
            transform: translateY(60%);
        }

        .contactButton:hover .svgIcon path {
            transition-duration: 0.3s;
            fill: #151515;
        }

        .contactButton::before {
            position: absolute;
            top: -20px;
            content: "+1-877-899-9937";
            color: white;
            transition-duration: 0.3s;
            font-size: 2px;
        }

        .contactButton:hover::before {
            font-size: 13px;
            opacity: 1;
            transform: translateY(35px);
            transition-duration: 0.3s;
            color: #151515;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <title>Olax Power</title>
</head>

<body class="bg-primary-black">
    @include('layout.frontend_header')
    <main>
        @yield('page-content')
        @include('layout.frontend_footer')
    </main>
    @if($routeName != 'frontened.book.consultation')
    <script src="{{ asset('/js/frontened/script.js') }}"></script>
    @endif
    <script type="text/javascript">
        $(document).ready(function() {
            const loader = $('#page-loader');
            var siteUrl = "{{ config('app.site_url') }}";
            $('#email').keypress(function() {
                $('#error-messages').html('');
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#addNewsLetterForm").validate({
                rules: {
                    'email': {
                        required: true,
                        email: true,
                    },
                },
                messages: {
                    'email': {
                        required: 'The email field is required.',
                        email: 'The email must be a valid email address.',
                    },
                },
                highlight: function(element) {
                    $(element).addClass('shake');
                },
                unhighlight: function(element) {
                    $(element).removeClass('shake');
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") == "email") {
                        error.insertAfter(".custom_email_message");
                    } else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function(form) {
                    var formData = new FormData(form);
                    $.ajax({
                        url: siteUrl + "news-letter/save",
                        method: 'POST',
                        global: false,
                        data: formData,
                        datatype: 'json',
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function() {
                            loader.show(); // Show the loader
                        },
                        complete: function() {
                            loader.hide(); // Show the loader
                        },
                        success: function(basicResult) {
                            $("#news_message").show();
                            $("#email").val('');
                            setTimeout(function() {
                                $('#news_message').fadeOut();
                            }, 2000);
                        },
                        error: function(xhr) {
                            // Hide loader
                            $('#page-loader').hide();

                            if (xhr.status === 422) {
                                // Display validation errors
                                let errors = xhr.responseJSON.errors;
                                let errorList = '';

                                $.each(errors, function(key, value) {
                                    errorList += '<li>' + value[0] + '</li>'; // Grab first error
                                });

                                $('#error-messages').html('<ul>' + errorList + '</ul>').removeClass('hidden');
                            } else {
                                alert('Something went wrong. Please try again.');
                            }
                        }
                    });
                }
            });
        });
    </script>
    <div id="cookie-consent-banner" class="fixed bottom-0 w-full bg-gray-800 text-white py-4 px-6 flex justify-between items-center z-50 hidden">
        <div>
            <p class="text-sm">We use cookies to improve your experience. By continuing, you agree to our use of cookies. <a href="/privacy-policy#cookie-setting" class="underline">Learn more</a>.</p>
        </div>
        <div>
            <button id="accept-cookies" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded mr-2">Accept</button>
            <button id="decline-cookies" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded">Decline</button>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Check if the user has already made a decision
            if (!localStorage.getItem('cookieConsent')) {
                document.getElementById('cookie-consent-banner').classList.remove('hidden');
            }

            // Handle Accept button
            document.getElementById('accept-cookies').addEventListener('click', function() {
                localStorage.setItem('cookieConsent', 'accepted');
                document.getElementById('cookie-consent-banner').classList.add('hidden');
                // Optional: Set cookies or load third-party scripts
            });

            // Handle Decline button
            document.getElementById('decline-cookies').addEventListener('click', function() {
                localStorage.setItem('cookieConsent', 'declined');
                document.getElementById('cookie-consent-banner').classList.add('hidden');
                // Optional: You may remove non-essential cookies here
            });
        });
    </script>
    <script defer id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=f7bf511e-8297-49fa-8619-603824a0e8be"> </script>
    <!-- End of Olaxpowerservice Zendesk Widget script -->

    <script>
        if (document.getElementById('country') != null) {
            document.getElementById('country').addEventListener('input', function() {
                const filter = this.value.toLowerCase();
                const items = document.querySelectorAll('.dropdown-item');

                // Show the dropdown
                const dropdown = document.getElementById('dropdown-list');
                dropdown.classList.remove('hidden');

                // Loop through dropdown items and hide those that don't match the search query
                let hasMatch = false;
                items.forEach(function(item) {
                    const text = item.textContent.toLowerCase();
                    if (text.includes(filter)) {
                        item.classList.remove('hidden');
                        hasMatch = true;
                    } else {
                        item.classList.add('hidden');
                    }
                });

                // Hide the dropdown if no text in the search input or no matches
                if (!filter || !hasMatch) {
                    dropdown.classList.add('hidden');
                }
            });

            // Handle dropdown item click
            document.querySelectorAll('.dropdown-item').forEach(function(item) {
                item.addEventListener('click', function() {
                    const selectedText = this.textContent;
                    // Set input value to the selected option
                    document.getElementById('country').value = selectedText;

                    // Hide the dropdown after selection
                    document.getElementById('dropdown-list').classList.add('hidden');
                });
            });

            // Optional: Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                const searchInput = document.getElementById('country');
                const dropdown = document.getElementById('dropdown-list');

                if (!searchInput.contains(e.target) && !dropdown.contains(e.target)) {
                    dropdown.classList.add('hidden');
                }
            });
        }
    </script>

    <!-- Load Css Files -->
    <script>
    // const link = document.createElement('link');
    // link.rel = 'stylesheet';
    // link.href = 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css';
    // document.head.appendChild(link);
    </script>
</body>

</html>
