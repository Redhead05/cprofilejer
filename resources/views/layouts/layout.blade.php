<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>@yield('title', config('app.name', 'LawFirm'))</title>

        <link rel="stylesheet" href="{{ asset('assets/css/remixicon.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

        @stack('styles')
    </head>
    <body class="@yield('body-class', 'bg-white dark:bg-black text-[#1b1b18] overflow-x-hidden antialiased')">
        @php($assets = asset('assets'))

        <div class="sidebar-settings fixed top-1/2 -translate-y-1/2 ltr:right-0 rtl:left-0 bg-white dark:bg-[#0a0e19] ltr:rounded-l-[10px] rtl:rounded-r-[10px] border border-gray-100 dark:border-[#202c4b] ltr:border-r-0 rtl:border-l-0 shadow-sm z-[9] p-[10px] md:p-[15px]">
            <button type="button" class="light-dark-toggle leading-none transition-all text-black dark:text-white font-medium flex items-center gap-[10px]" id="light-dark-toggle">
                Light/Dark:
                <i class="material-symbols-outlined !text-[20px] md:!text-[22px] text-orange-400">light_mode</i>
            </button>
            <button type="button" class="rtl-mode-toggle flex items-center text-black dark:text-white font-medium mt-[10px] gap-[10px]" id="rtl-mode-toggle">
                LTR/RTL:
                <span class="inline-block relative rounded-full w-[35px] h-[20px] bg-gray-50 dark:bg-black">
                    <span class="inline-block transition-all absolute h-[12px] w-[12px] bg-black dark:bg-white rounded-full top-1/2 -translate-y-1/2"></span>
                </span>
            </button>
        </div>

        <header
            class="analytics-navbar bg-white dark:bg-black relative top-0 right-0 left-0 transition-all h-auto z-[5] py-[15px]"
            style="box-shadow: 0px 4px 30px 0px rgba(146, 139, 221, 0.10);"
            id="navbar"
        >
            <div class="container sm:max-w-[540px] md:max-w-[720px] lg:max-w-[960px] xl:max-w-[1414px] 2xl:max-w-[1788px] mx-auto px-[12px]">
                <div class="flex items-center relative flex-wrap lg:flex-nowrap justify-between lg:justify-start">
                    <a href="{{ url('/') }}" class="inline-block w-[110px] ltr:mr-[15px] rtl:ml-[15px]">
                        <img src="{{ asset('assets/images/logo.png') }}" height="40" width="40" alt="logo" class="inline-block dark:hidden">
                        <img src="{{ asset('assets/images/analytics/white-logo.svg') }}" height="40" width="40" alt="logo" class="hidden dark:inline-block">
                    </a>

                    <button type="button" class="inline-block relative leading-none lg:hidden" id="navbar-burger-menu">
                        <span class="h-[3px] w-[30px] my-[5px] block bg-dark dark:bg-white"></span>
                        <span class="h-[3px] w-[30px] my-[5px] block bg-dark dark:bg-white"></span>
                        <span class="h-[3px] w-[30px] my-[5px] block bg-dark dark:bg-white"></span>
                    </button>

                    <div class="hidden lg:flex items-center grow basifeaturess-full basis-auto">
                        <ul class="flex ltr:ml-auto rtl:mr-auto flex-row gap-[30px] xl:gap-[45px]">
                            <li><a href="{{ url('/') }}" class="text-[#3368FC] font-medium transition-all hover:text-[#3368FC]">Home</a></li>
                            <li><a href="#services" class="text-black dark:text-white font-medium transition-all hover:text-[#3368FC]">Services</a></li>
{{--                            <li><a href="{{ auth()->check() ? route('admin.dashboard') : route('login') }}" class="text-black dark:text-white font-medium transition-all hover:text-[#3368FC]">Dashboard</a></li>--}}
{{--                            <li><a href="#integrations" class="text-black dark:text-white font-medium transition-all hover:text-[#3368FC]">Integrations</a></li>--}}
                            <li><a href="#team" class="text-black dark:text-white font-medium transition-all hover:text-[#3368FC]">team</a></li>
                            <li><a href="#contact" class="text-black dark:text-white font-medium transition-all hover:text-[#3368FC]">Contact</a></li>
                        </ul>

{{--                        <div class="flex items-center gap-[30px] xl:gap-[40px] ltr:ml-[30px] rtl:mr-[30px] ltr:xl:ml-[50px] rtl:xl:mr-[50px]">--}}
{{--                            <a href="https://trezo-twcss.envytheme.com/analytics-index.html" target="_blank" rel="noreferrer" class="text-[#3368FC] uppercase text-xs tracking-[1.8px] transition-all hover:underline font-bold inline-block">LOG IN</a>--}}
{{--                            <a href="https://trezo-twcss.envytheme.com/analytics-index.html" class="inline-block text-center rounded-[4px] bg-[#3368FC] border border-[#3368FC] text-white uppercase text-xs font-bold tracking-[1.8px] py-[14px] md:py-[15px] lg:py-[16px] px-[20px] md:px-[23px] transition-all hover:bg-primary-500">--}}
{{--                                <span class="inline-block relative ltr:pr-[27px] rtl:pl-[27px]">Sign Up <i class="ri-arrow-right-long-line absolute top-1/2 -translate-y-1/2 ltr:-right-[2px] rtl:-left-[2px] text-lg"></i></span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
                    </div>

                    <div class="bg-white dark:bg-[#0a0e19] rounded-[15px] border border-gray-200 dark:border-[#202c4b] mt-[15px] p-[20px] md:p-[30px] w-full hidden lg:!hidden" id="navbar-collapse">
                        <ul>
                            <li class="my-[14px] md:my-[16px] first:mt-0 last:mb-0"><a href="{{ url('/') }}" class="text-[#3368FC] font-medium transition-all hover:text-[#3368FC]">Home</a></li>
                            <li class="my-[14px] md:my-[16px] first:mt-0 last:mb-0"><a href="#services" class="text-black dark:text-white font-medium transition-all hover:text-[#3368FC]">Features</a></li>
                            <li class="my-[14px] md:my-[16px] first:mt-0 last:mb-0"><a href="{{ auth()->check() ? route('admin.dashboard') : route('login') }}" class="text-black dark:text-white font-medium transition-all hover:text-[#3368FC]">Dashboard</a></li>
                            <li class="my-[14px] md:my-[16px] first:mt-0 last:mb-0"><a href="#integrations" class="text-black dark:text-white font-medium transition-all hover:text-[#3368FC]">Integrations</a></li>
                            <li class="my-[14px] md:my-[16px] first:mt-0 last:mb-0"><a href="#team" class="text-black dark:text-white font-medium transition-all hover:text-[#3368FC]">team</a></li>
                            <li class="my-[14px] md:my-[16px] first:mt-0 last:mb-0"><a href="#contact" class="text-black dark:text-white font-medium transition-all hover:text-[#3368FC]">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        @yield('content')



        <footer
            class="lg:mx-[10px] lg:mb-[10px] xl:mx-[20px] xl:mb-[20px] lg:rounded-[15px] pt-[60px] md:pt-[80px] lg:pt-[100px] bg-cover bg-no-repeat bg-center"
            style="background-image: url('{{ asset('assets/images/analytics/footer-bg.jpg') }}');"
        >
            <div class="container sm:max-w-[540px] md:max-w-[720px] lg:max-w-[960px] xl:max-w-[1308px] mx-auto px-[12px]">
                <div class="text-center mx-auto md:max-w-[557px]">
{{--                    <span class="inline-block rounded-[4px] uppercase font-bold tracking-[1.8px] text-[11px] md:text-xs bg-primary-500 text-white mb-[10px] md:mb-[12px] lg:mb-[15px] py-[3px] px-[10px]">Subscribe</span>--}}
{{--                    <h2 class="!mb-[20px] md:!mb-[25px] lg:!mb-[30px] md:max-w-[526px] mx-auto !text-[26px] md:!text-4xl lg:!text-[46px] -tracking-[1px] md:-tracking-[1.5px] lg:-tracking-[2.3px] !text-white">Stay Connected With Us All The Time</h2>--}}
{{--                    <form class="relative">--}}
{{--                        <input type="email" class="block w-full outline-0 h-[50px] md:h-[60px] bg-white/10 border border-white/10 rounded-[4px] text-white placeholder:text-white/60 text-sm md:text-base px-[15px] md:px-[20px] lg:px-[25px]" placeholder="Your Email here">--}}
{{--                        <button type="submit" class="inline-block text-center rounded-[4px] bg-[#3368FC] border border-[#3368FC] text-white uppercase text-xs font-bold tracking-[1.8px] py-[14px] md:py-[15px] lg:py-[16px] px-[20px] md:px-[23px] transition-all hover:bg-primary-500 md:absolute md:top-[5px] ltr:md:right-[5px] rtl:md:left-[5px] mt-[15px] md:mt-0">--}}
{{--                            <span class="inline-block relative ltr:pr-[27px] rtl:pl-[27px]">Subscribe Now <i class="ri-arrow-right-long-line absolute top-1/2 -translate-y-1/2 ltr:-right-[2px] rtl:-left-[2px] text-lg"></i></span>--}}
{{--                        </button>--}}
{{--                    </form>--}}
                </div>

                <div class="pt-[60px] md:pt-[80px] lg:pt-[100px] border-b border-white/20"></div>

                <div class="py-[25px] md:py-[35px] lg:py-[50px]">
                    <div class="grid grid-cols-1 md:grid-cols-2 md:gap-[25px] items-center">
                        <div class="text-center ltr:md:text-left rtl:md:text-right">
                            <a href="{{ url('/') }}" class="inline-block mb-[10px]"><img src="{{ asset('assets/images/logo.png') }}" width="50" height="50" alt="logo"></a>
                            <p class="text-[#A7A5B2]">© <span class="text-[#93CCE6]">RFJ</span> Law Firm</p>
                        </div>
                        <div class="text-center ltr:md:text-right rtl:md:text-left">
                            <a href="#services" class="inline-block text-white font-medium transition-all hover:text-[#93CCE6] mx-[5px] md:mx-[9px] lg:mx-[15px] xl:mx-[22px] ltr:first:ml-0 rtl:first:mr-0 ltr:last:mr-0 rtl:last:ml-0 mt-[10px]">Features</a>
                            <a href="#integrations" class="inline-block text-white font-medium transition-all hover:text-[#93CCE6] mx-[5px] md:mx-[9px] lg:mx-[15px] xl:mx-[22px] ltr:first:ml-0 rtl:first:mr-0 ltr:last:mr-0 rtl:last:ml-0 mt-[10px]">Integrations</a>
                            <a href="#team" class="inline-block text-white font-medium transition-all hover:text-[#93CCE6] mx-[5px] md:mx-[9px] lg:mx-[15px] xl:mx-[22px] ltr:first:ml-0 rtl:first:mr-0 ltr:last:mr-0 rtl:last:ml-0 mt-[10px]">Team</a>
                            <a href="#contact" class="inline-block text-white font-medium transition-all hover:text-[#93CCE6] mx-[5px] md:mx-[9px] lg:mx-[15px] xl:mx-[22px] ltr:first:ml-0 rtl:first:mr-0 ltr:last:mr-0 rtl:last:ml-0 mt-[10px]">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

{{--        <button id="backToTopBtn" class="fixed bottom-[20px] right-[20px] lg:bottom-[30px] lg:right-[30px] xl:bottom-[40px] xl:right-[40px] z-[9] flex items-center justify-center w-[40px] h-[40px] bg-primary-500 hover:bg-[#3368FC] text-white rounded-full transition-all text-[20px]" type="button">--}}
        <button
            id="backToTopBtn"
            class="fixed bottom-[20px] right-[20px] lg:bottom-[30px] lg:right-[30px] xl:bottom-[40px] xl:right-[40px] z-[9] flex items-center justify-center w-[40px] h-[40px] bg-primary-500 hover:bg-[#3368FC] text-white rounded-full transition-all text-[20px]"
            type="button"
        >
            <i class="ri-arrow-up-line"></i>
        </button>

        <script src="{{ asset('assets/js/fslightbox.js') }}"></script>
        <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>

        @stack('scripts')
    </body>
</html>
