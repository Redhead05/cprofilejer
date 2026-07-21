@extends('layouts.layout')

@php
    $partners = range(1, 8);

    $whyChooseCards = [
        ['icon' => 'ri-fingerprint-2-line', 'title' => 'Easy Track User Analytics', 'desc' => 'Monitor user behavior and engagement easily.'],
        ['icon' => 'ri-timer-line', 'title' => 'Real-Time Analytics', 'desc' => 'Track key metrics and take data drive decision faster ever in life.'],
        ['icon' => 'ri-eye-line', 'title' => 'Monitor Customer Activities', 'desc' => 'Keep a detailed log of all customer transactions.'],
    ];

//    $integrations = ['mailchimp.svg', 'google.svg', 'slack.svg', 'onedrive.svg', 'teams.svg', 'github.svg'];

    $testimonials = [
        [
            'quote' => '"This platform completely changed how we work.',
            'body' => 'Before, we were buried in spreadsheets, wasting hours pulling reports manually. Now, with automated dashboards and real-time metrics, our marketing and sales teams are always aligned.”',
            'name' => 'Daniel K.',
            'role' => 'Product Lead',
            'avatar' => 'user3.jpg',
        ],
        [
            'quote' => '"RFJ Law Firm makes analytics effortless for our team.',
            'body' => 'RFJ Law Firm gives us instant access to the data we need, without any complicated setup. The intuitive interface and real-time updates help us make smarter decisions every day.',
            'name' => 'Sarah M.',
            'role' => 'Marketing Manager',
            'avatar' => 'user1.jpg',
        ],
    ];

    $pricingPlans = [
        [
            'name' => 'Starter Plan',
            'price' => '$ 4.99',
            'featured' => false,
            'ctaClass' => 'inline-block text-center rounded-[4px] bg-white dark:bg-dark border border-[#3368FC] text-[#3368FC] uppercase text-xs font-bold tracking-[1.8px] py-[14px] md:py-[15px] lg:py-[16px] px-[20px] md:px-[23px] transition-all hover:bg-primary-500 hover:text-white',
            'features' => ['Pre-Built Templates', 'Real-Time Dashboard Access', 'Up to 3 Data Source Integrations', 'User-Friendly Interface', 'Daily Email Reports'],
        ],
        [
            'name' => 'BASIC Plan',
            'price' => '$ 7.99',
            'featured' => true,
            'ctaClass' => 'inline-block text-center rounded-[4px] bg-white dark:bg-dark border border-white dark:border-dark text-[#3368FC] uppercase text-xs font-bold tracking-[1.8px] py-[14px] md:py-[15px] lg:py-[16px] px-[20px] md:px-[23px] transition-all hover:bg-dark hover:text-white hover:border-dark',
            'features' => ['Pre-Built Templates', 'Real-Time Dashboard Access', 'Up to 5 Data Source Integrations', 'User-Friendly Interface', '24/7 Email Supports'],
        ],
        [
            'name' => 'PRO Plan',
            'price' => '$ 11.99',
            'featured' => false,
            'ctaClass' => 'inline-block text-center rounded-[4px] bg-white dark:bg-dark border border-[#3368FC] text-[#3368FC] uppercase text-xs font-bold tracking-[1.8px] py-[14px] md:py-[15px] lg:py-[16px] px-[20px] md:px-[23px] transition-all hover:bg-primary-500 hover:text-white',
            'features' => ['Pre-Built Templates', 'Real-Time Dashboard Access', 'Up to 10 Data Source Integrations', 'User-Friendly Interface', '24/7 Online Supports'],
        ],
    ];

@endphp

@section('title', 'RFJ Law Firm - Tailwind CSS Admin Dashboard Template')
@section('body-class', 'bg-white dark:bg-black text-[#1b1b18] overflow-x-hidden antialiased')

@section('content')
    @php($assets = asset('assets'))

    <!-- Banner -->
    <div class="py-[60px] md:py-[80px] lg:py-[100px] relative z-[1]">
        <div class="container sm:max-w-[540px] md:max-w-[720px] lg:max-w-[960px] xl:max-w-[1832px] mx-auto px-[12px] relative">
            @if ($carousels->isNotEmpty())
                <div id="bannerCarousel" class="relative">
                    <div class="swiper bannerCarouselSwiper overflow-hidden">
                        <div class="swiper-wrapper">
                            @foreach ($carousels as $carousel)
                                <div class="swiper-slide">
                                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-[30px] lg:gap-[25px] items-center">
                                        <div class="xl:max-w-[660px] 2xl:max-w-[670px] ltr:xl:ml-[22px] rtl:xl:mr-[22px]">
                                            <span class="inline-block rounded-[4px] uppercase font-bold tracking-[1.8px] text-[11px] md:text-xs bg-primary-500 text-white mb-[10px] md:mb-[12px] lg:mb-[15px] py-[3px] px-[10px]">Carousel Banner</span>
                                            <h1 class="-tracking-[1.5px] md:-tracking-[2.2px] lg:-tracking-[3px] xl:-tracking-[3.2px] !text-4xl md:!text-[46px] lg:!text-[53px] xl:!text-[64px] !mb-[12px] lg:!mb-[15px]">{{ $carousel->title }}</h1>
                                            @if ($carousel->description)
                                                <p class="-tracking-[0.16px] lg:text-[15px] xl:text-md xl:max-w-[617px]">{{ $carousel->description }}</p>
                                            @endif

                                            @if ($carousel->link)
                                                <a href="{{ $carousel->link }}" target="_blank" rel="noreferrer noopener" class="inline-block mt-[20px] text-center rounded-[4px] bg-[#3368FC] border border-[#3368FC] text-white uppercase text-xs font-bold tracking-[1.8px] py-[14px] md:py-[15px] lg:py-[16px] px-[20px] md:px-[23px] transition-all hover:bg-primary-500">
                                                    <span class="inline-block relative ltr:pr-[27px] rtl:pl-[27px]">Learn More <i class="ri-arrow-right-long-line absolute top-1/2 -translate-y-1/2 ltr:-right-[2px] rtl:-left-[2px] text-lg"></i></span>
                                                </a>
                                            @endif
                                        </div>

                                        <div class="text-center ltr:xl:-ml-[100px] rtl:xl:-mr-[100px] -my-[13px] md:-my-[25px]">
                                            @if ($carousel->image_url)
                                                <img src="{{ $carousel->image_url }}" class="inline-block max-h-[520px] w-auto rounded-[18px] object-contain" alt="{{ $carousel->title }}">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    @if ($carousels->count() > 1)
                        <div class="flex items-center justify-center lg:justify-start gap-[10px] mt-[25px] xl:ml-[22px]">
                            <button type="button" class="banner-carousel-prev flex h-[46px] w-[46px] items-center justify-center rounded-full bg-white/70 text-[#3368FC] shadow-sm transition-all hover:bg-[#3368FC] hover:text-white">
                                <i class="ri-arrow-left-line text-[22px]"></i>
                            </button>
                            <button type="button" class="banner-carousel-next flex h-[46px] w-[46px] items-center justify-center rounded-full bg-white/70 text-[#3368FC] shadow-sm transition-all hover:bg-[#3368FC] hover:text-white">
                                <i class="ri-arrow-right-line text-[22px]"></i>
                            </button>
                        </div>
                        <div class="banner-carousel-pagination mt-[20px] xl:ml-[22px]"></div>
                    @endif
                </div>
            @else
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-[30px] lg:gap-[25px] items-center">
                    <div class="xl:max-w-[660px] 2xl:max-w-[670px] ltr:xl:ml-[22px] rtl:xl:mr-[22px]">
                        <span class="inline-block rounded-[4px] uppercase font-bold tracking-[1.8px] text-[11px] md:text-xs bg-primary-500 text-white mb-[10px] md:mb-[12px] lg:mb-[15px] py-[3px] px-[10px]">Drive Smarter Strategies with Real-Time Analytics</span>
                        <h1 class="-tracking-[1.5px] md:-tracking-[2.2px] lg:-tracking-[3px] xl:-tracking-[3.2px] !text-4xl md:!text-[46px] lg:!text-[53px] xl:!text-[64px] !mb-[12px] lg:!mb-[15px]">Turn Data Into Decisions: Unleash The Power Of Analytics With RFJ Law Firm</h1>
                        <p class="-tracking-[0.16px] lg:text-[15px] xl:text-md xl:max-w-[617px]">Unlock the full potential of your data with cutting-edge analytics tools. Make faster, smarter decisions backed by real-time insights and intuitive dashboards.</p>
                    </div>
                    <div class="text-center ltr:xl:-ml-[100px] rtl:xl:-mr-[100px] -my-[13px] md:-my-[25px]">
                        <img src="{{ $assets }}/images/analytics/banner.png" class="inline-block" alt="banner-image">
                    </div>
                </div>
            @endif

            <div class="absolute top-0 left-0 right-0 bottom-0 -z-[1] bg-cover bg-no-repeat bg-center dark:hidden" style="background-image: url('{{ $assets }}/images/analytics/banner-bg.jpg');"></div>
            <div class="bg-[#93CCE6] w-[50px] h-[50px] rounded-full absolute bottom-[170px] ltr:right-[44%] rtl:left-[44%] -z-[1] hidden lg:block"></div>
            <div class="bg-primary-500 w-[10px] h-[10px] rounded-full absolute bottom-[120px] ltr:right-[39.2%] rtl:left-[39.2%] -z-[1] hidden lg:block"></div>
            <div class="absolute ltr:right-[180px] rtl:left-[180px] top-1/2 -translate-y-1/2 w-[515px] h-[515px] 2xl:w-[595px] 2xl:h-[595px] rounded-full -z-[1] hidden xl:block" style="background: linear-gradient(180deg, #93CCE6 0%, #3368FC 100%);"></div>
            <div class="absolute top-0 bottom-0 ltr:right-0 rtl:left-0 w-[340px] 2xl:w-[460px] bg-white/20 dark:bg-white/10 -z-[1] hidden lg:block" style="backdrop-filter: blur(22px);"></div>
        </div>
    </div>

    <!-- Partners -->
{{--    <div class="py-[60px] md:py-[80px] lg:py-[100px] bg-[#06004B]">--}}
{{--        <div class="container sm:max-w-[540px] md:max-w-[720px] lg:max-w-[960px] xl:max-w-[1920px] mx-auto px-[12px]">--}}
{{--            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-8 gap-[25px]">--}}
{{--                @foreach ($partners as $partner)--}}
{{--                    <div class="text-center">--}}
{{--                        <img src="{{ $assets }}/images/analytics/partners/partner{{ $partner }}.svg" class="inline-block" alt="partner-image">--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <!-- Key servicess -->
    <div id="services" class="py-[60px] md:py-[80px] lg:py-[100px] relative z-[1]">
        <div class="container sm:max-w-[540px] md:max-w-[720px] lg:max-w-[960px] xl:max-w-[1308px] mx-auto px-[12px]">
            <div class="mb-[30px] md:mb-[40px] lg:mb-[50px] mx-auto text-center lg:max-w-[905px]">
                <span class="inline-block rounded-[4px] uppercase font-bold tracking-[1.8px] text-[11px] md:text-xs bg-primary-500 text-white mb-[10px] md:mb-[12px] lg:mb-[15px] py-[3px] px-[10px]">Kami Menangani</span>
                <h2 class="!mb-0 !text-[26px] md:!text-4xl lg:!text-[46px] -tracking-[1px] md:-tracking-[1.5px] lg:-tracking-[2.3px]">-</h2>
            </div>

            <div class="xl:max-w-[1205px] mx-auto">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-[25px]">
                    @forelse ($keyFeatures as $feature)
                        <div class="bg-white dark:bg-[#0a0e19] rounded-[5px] py-[25px] md:py-[30px] lg:py-[35px] xl:py-[50px] px-[20px] md:px-[25px] lg:px-[30px] transition-all hover:-translate-y-[20px]" style="box-shadow: 0px 2px 34px 0px rgba(226, 234, 237, 0.30);">
                            <div class="mb-[20px] md:mb-[28px] lg:mb-[35px] leading-none text-[#3368FC] text-3xl"><i class="{{ $feature->icon }}"></i></div>
                            <h3 class="!text-md md:!text-lg lg:!text-[20px] -tracking-[0.2px] !font-semibold !leading-[1.4] !mb-[13px] md:!mb-[20px] lg:!mb-[30px] max-w-[187px]">{{ $feature->title }}</h3>
                            <p class="-tracking-[0.16px] lg:text-[15px] xl:text-md">{{ $feature->description }}</p>
                        </div>
                    @empty
                        <div class="sm:col-span-2 lg:col-span-4 rounded-[5px] border border-dashed border-slate-300 bg-white py-[35px] px-[30px] text-center text-slate-500">
                            Key features akan segera ditampilkan di sini.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="absolute left-0 right-0 bottom-0 bg-[#EEF4F6] dark:bg-[#0a0e19] h-[75%] sm:h-[60%] lg:h-[300px] -z-[1] sm:mx-[20px] xl:mx-[50px] 2xl:mx-[200px] rounded-[5px]"></div>
    </div>

    <!-- Features -->
    <div class="py-[60px] md:py-[80px] lg:py-[100px]">
        <div class="container sm:max-w-[540px] md:max-w-[720px] lg:max-w-[960px] xl:max-w-[1308px] mx-auto px-[12px]">
            <div class="relative">
                @forelse ($featurePanels as $panel)
                    <div class="lg:sticky lg:top-[80px] bg-white dark:bg-dark rounded-[15px] grid grid-cols-1 lg:grid-cols-2 gap-[15px] md:gap-[20px] lg:gap-[25px] items-center mb-[25px] last:mb-0">
                        <div class="text-center rounded-[15px] ltr:lg:-mr-[115px] rtl:lg:-ml-[115px]"><img src="{{ $panel->image_url }}" class="inline-block rounded-[15px]" alt="feature-image"></div>
                        <div class="ltr:lg:pl-[115px] rtl:lg:pr-[115px]">
                            <div class="leading-none -mb-[15px] md:-mb-[20px] lg:-mb-[25px] -tracking-[3px] md:-tracking-[4px] font-bold text-[50px] md:text-[65px] lg:text-[80px] text-[#06021d]/5 dark:text-white/15">{{ $panel->big_label }}</div>
                            <span class="inline-block rounded-[4px] uppercase font-bold tracking-[1.8px] text-[11px] md:text-xs bg-primary-500 text-white mb-[10px] md:mb-[12px] lg:mb-[15px] py-[3px] px-[10px]">{{ $panel->eyebrow }}</span>
                            <h2 class="!mb-[12px] lg:!mb-[25px] !text-[26px] md:!text-4xl lg:!text-[46px] -tracking-[1px] md:-tracking-[1.5px] lg:-tracking-[2.3px]">{{ $panel->headline }}</h2>
                            <p class="-tracking-[0.16px] lg:text-[15px] xl:text-md">{{ $panel->description }}</p>
                        </div>
                    </div>
                @empty
                    <div class="rounded-[15px] border border-dashed border-slate-300 bg-white py-[35px] px-[30px] text-center text-slate-500">
                        Feature panels akan segera ditampilkan di sini.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Text -->
    <div class="container sm:max-w-[540px] md:max-w-[720px] lg:max-w-[960px] xl:max-w-[1308px] mx-auto px-[12px] relative z-[1]">
        <div class="text-center leading-none text-[30px] md:text-[35px] lg:text-5xl xl:text-[43px] font-bold md:-tracking-[.5px] lg:-tracking-[1px] text-transparent dark:invert" style="-webkit-text-stroke-color: rgba(6, 0, 75, 0.60); -webkit-text-stroke-width: 1.5px;">* Kami Mempelajari dan Mendalami kasus dengan sangat detil *</div>
    </div>

    <!-- Why Choose RFJ Law Firm -->
{{--    <div class="py-[60px] md:py-[80px] lg:py-[100px] relative z-[1]">--}}
{{--        <div class="container sm:max-w-[540px] md:max-w-[720px] lg:max-w-[960px] xl:max-w-[1308px] mx-auto px-[12px]">--}}
{{--            <div class="mb-[30px] md:mb-[40px] lg:mb-[50px] mx-auto text-center lg:max-w-[905px]">--}}
{{--                <span class="inline-block rounded-[4px] uppercase font-bold tracking-[1.8px] text-[11px] md:text-xs bg-primary-500 text-white mb-[10px] md:mb-[12px] lg:mb-[15px] py-[3px] px-[10px]">Why Choose RFJ Law Firm</span>--}}
{{--                <h2 class="!mb-0 !text-[26px] md:!text-4xl lg:!text-[46px] -tracking-[1px] md:-tracking-[1.5px] lg:-tracking-[2.3px]">Lead Tracking To Analytics, Everything Your Team Need For Success</h2>--}}
{{--            </div>--}}

{{--            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-[25px]">--}}
{{--                <div class="sm:order-1 lg:order-1 bg-white dark:bg-[#0a0e19] rounded-[10px] p-[20px] md:p-[25px] lg:p-[30px] xl:p-[50px]">--}}
{{--                    <div class="mb-[20px] md:mb-[25px] lg:mb-[30px] dark:bg-black flex items-center justify-center relative z-[1] w-[80px] md:w-[100px] h-[80px] md:h-[100px] rounded-full text-[37px] text-black dark:text-white">--}}
{{--                        <i class="ri-fingerprint-2-line"></i>--}}
{{--                        <div class="absolute top-0 left-0 right-0 bottom-0 -z-[1] rounded-full dark:hidden" style="background: linear-gradient(180deg, #FFF -54.67%, #AED6E8 100%);"></div>--}}
{{--                    </div>--}}
{{--                    <h3 class="!text-md md:!text-lg lg:!text-[20px] -tracking-[0.2px] !font-semibold !leading-[1.4] !mb-[15px] md:!mb-[20px] lg:!mb-[25px] max-w-[187px]">{{ $whyChooseCards[0]['title'] }}</h3>--}}
{{--                    <p class="-tracking-[0.16px] lg:text-[15px] xl:text-md">{{ $whyChooseCards[0]['desc'] }}</p>--}}
{{--                </div>--}}

{{--                <div class="sm:order-3 lg:order-2 sm:col-span-2 bg-white dark:bg-[#0a0e19] rounded-[10px] p-[20px] md:p-[25px] lg:p-[30px] xl:p-[50px]">--}}
{{--                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-[25px] items-center">--}}
{{--                        <div>--}}
{{--                            <div class="mb-[20px] md:mb-[25px] lg:mb-[30px] dark:bg-black flex items-center justify-center relative z-[1] w-[80px] md:w-[100px] h-[80px] md:h-[100px] rounded-full text-[37px] text-black dark:text-white">--}}
{{--                                <i class="ri-timer-line"></i>--}}
{{--                                <div class="absolute top-0 left-0 right-0 bottom-0 -z-[1] rounded-full dark:hidden" style="background: linear-gradient(180deg, #FFF -54.67%, #AED6E8 100%);"></div>--}}
{{--                            </div>--}}
{{--                            <h3 class="!text-md md:!text-lg lg:!text-[20px] -tracking-[0.2px] !font-semibold !leading-[1.4] !mb-[15px] md:!mb-[20px] lg:!mb-[25px] max-w-[187px]">{{ $whyChooseCards[1]['title'] }}</h3>--}}
{{--                            <p class="-tracking-[0.16px] lg:text-[15px] xl:text-md">{{ $whyChooseCards[1]['desc'] }}</p>--}}
{{--                        </div>--}}
{{--                        <div class="text-center">--}}
{{--                            <img src="{{ $assets }}/images/analytics/customer-conversion-rate.jpg" class="inline-block rounded-[10px]" alt="customer-conversion-rate">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="sm:order-2 lg:order-3 bg-white dark:bg-[#0a0e19] rounded-[10px] p-[20px] md:p-[25px] lg:p-[30px] xl:p-[50px]">--}}
{{--                    <div class="mb-[20px] md:mb-[25px] lg:mb-[30px] dark:bg-black flex items-center justify-center relative z-[1] w-[80px] md:w-[100px] h-[80px] md:h-[100px] rounded-full text-[37px] text-black dark:text-white">--}}
{{--                        <i class="ri-eye-line"></i>--}}
{{--                        <div class="absolute top-0 left-0 right-0 bottom-0 -z-[1] rounded-full dark:hidden" style="background: linear-gradient(180deg, #FFF -54.67%, #AED6E8 100%);"></div>--}}
{{--                    </div>--}}
{{--                    <h3 class="!text-md md:!text-lg lg:!text-[20px] -tracking-[0.2px] !font-semibold !leading-[1.4] !mb-[15px] md:!mb-[20px] lg:!mb-[25px] max-w-[187px]">{{ $whyChooseCards[2]['title'] }}</h3>--}}
{{--                    <p class="-tracking-[0.16px] lg:text-[15px] xl:text-md">{{ $whyChooseCards[2]['desc'] }}</p>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="text-center mt-[25px] md:mt-[30px] lg:mt-[40px]">--}}
{{--                <ul class="lg:text-[15px] xl:text-md -tracking-[0.16px] text-black dark:text-white">--}}
{{--                    <li class="inline-block mx-[10px] md:mx-[15px] lg:mx-[20px] ltr:first:ml-0 rtl:first:mr-0 ltr:last:mr-0 rtl:last:ml-0"><div class="flex items-center gap-[10px]"><span class="flex items-center justify-center w-[36px] h-[36px] bg-white/20 dark:bg-dark/20 rounded-full text-primary-500 text-xl"><i class="ri-check-double-line"></i></span> AI Sales Automation</div></li>--}}
{{--                    <li class="inline-block mx-[10px] md:mx-[15px] lg:mx-[20px] ltr:first:ml-0 rtl:first:mr-0 ltr:last:mr-0 rtl:last:ml-0"><div class="flex items-center gap-[10px]"><span class="flex items-center justify-center w-[36px] h-[36px] bg-white/20 dark:bg-dark/20 rounded-full text-primary-500 text-xl"><i class="ri-check-double-line"></i></span> Best Lead and Deal Management</div></li>--}}
{{--                    <li class="inline-block mx-[10px] md:mx-[15px] lg:mx-[20px] ltr:first:ml-0 rtl:first:mr-0 ltr:last:mr-0 rtl:last:ml-0"><div class="flex items-center gap-[10px]"><span class="flex items-center justify-center w-[36px] h-[36px] bg-white/20 dark:bg-dark/20 rounded-full text-primary-500 text-xl"><i class="ri-check-double-line"></i></span> Advanced Reporting</div></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <!-- Integrations -->
{{--    <div id="integrations" class="pb-[60px] md:pb-[80px] lg:pb-[100px] relative z-[1]">--}}
{{--        <div class="container sm:max-w-[540px] md:max-w-[720px] lg:max-w-[960px] xl:max-w-[1308px] mx-auto px-[12px]">--}}
{{--            <div class="text-center relative">--}}
{{--                <img src="{{ $assets }}/images/analytics/border.png" class="hidden lg:inline-block" alt="border">--}}
{{--                <div class="lg:absolute lg:left-0 lg:right-0 lg:top-1/2 lg:-translate-y-1/2 mx-auto md:max-w-[420px]">--}}
{{--                    <span class="inline-block rounded-[4px] uppercase font-bold tracking-[1.8px] text-[11px] md:text-xs bg-[#01030A] text-white mb-[10px] md:mb-[12px] lg:mb-[15px] py-[3px] px-[10px]">INTEGRATION</span>--}}
{{--                    <h2 class="!mb-[18px] md:!mb-[22px] lg:!mb-[30px] !text-[26px] md:!text-4xl lg:!text-[46px] -tracking-[1px] md:-tracking-[1.5px] lg:-tracking-[2.3px] lg:!text-white">Seamlessly Integrate With All Other Apps Within RFJ Law Firm</h2>--}}
{{--                    <a href="#pricing" class="inline-block text-center rounded-[4px] bg-[#93CCE6] border border-[#93CCE6] text-black uppercase text-xs font-bold tracking-[1.8px] py-[14px] md:py-[15px] lg:py-[16px] px-[20px] md:px-[23px] transition-all hover:bg-primary-500 hover:text-white hover:border-primary-500">--}}
{{--                        <span class="inline-block relative ltr:pr-[27px] rtl:pl-[27px]">GET STARTED <i class="ri-arrow-right-long-line absolute top-1/2 -translate-y-1/2 ltr:-right-[2px] rtl:-left-[2px] text-lg"></i></span>--}}
{{--                    </a>--}}
{{--                </div>--}}

{{--                <div class="mt-[25px] lg:mt-0 flex xl:block justify-center flex-wrap gap-[15px] md:gap-[20px]">--}}
{{--                    @foreach ($integrations as $icon)--}}
{{--                        <div class="lg:absolute {{ $loop->index === 0 ? 'lg:top-0 ltr:lg:left-0 rtl:lg:right-0 ltr:xl:left-[150px] rtl:xl:right-[150px]' : '' }} {{ $loop->index === 1 ? 'lg:top-0 ltr:lg:right-0 rtl:lg:left-0 ltr:xl:right-[150px] rtl:xl:left-[150px]' : '' }} {{ $loop->index === 2 ? 'lg:top-1/2 lg:-translate-y-1/2 ltr:lg:left-0 rtl:lg:right-0' : '' }} {{ $loop->index === 3 ? 'lg:top-1/2 lg:-translate-y-1/2 ltr:lg:right-0 rtl:lg:left-0' : '' }} {{ $loop->index === 4 ? 'lg:bottom-0 ltr:lg:left-0 rtl:lg:right-0 ltr:xl:left-[150px] rtl:xl:right-[150px]' : '' }} {{ $loop->index === 5 ? 'lg:bottom-0 ltr:lg:right-0 rtl:lg:left-0 ltr:xl:right-[150px] rtl:xl:left-[150px]' : '' }} w-[100px] h-[100px] md:w-[150px] md:h-[150px] bg-white dark:bg-[#0a0e19] rounded-full flex items-center justify-center" style="box-shadow: 0px 4px 40px 0px rgba(11, 53, 161, 0.05);">--}}
{{--                            <img src="{{ $assets }}/images/analytics/icons/{{ $icon }}" class="{{ in_array($icon, ['mailchimp.svg', 'github.svg']) ? 'dark:invert' : '' }}" alt="{{ pathinfo($icon, PATHINFO_FILENAME) }}">--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <!-- Testimonials -->
    <div class="pt-[60px] md:pt-[80px] lg:pt-[100px] pb-[210px] md:pb-[270px] lg:pb-[330px] relative z-[1]">
        <div class="container sm:max-w-[540px] md:max-w-[720px] lg:max-w-[960px] xl:max-w-[1308px] mx-auto px-[12px]">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-[25px]">
                <div class="xl:max-w-[526px]">
                    <span class="inline-block rounded-[4px] uppercase font-bold tracking-[1.8px] text-[11px] md:text-xs bg-primary-500 text-white mb-[10px] md:mb-[12px] lg:mb-[15px] py-[3px] px-[10px]">Testimonials</span>
                    <h2 class="!mb-[15px] md:!mb-[20px] lg:!mb-[30px] xl:!mb-[50px] !text-[26px] md:!text-4xl lg:!text-[46px] -tracking-[1px] md:-tracking-[1.5px] lg:-tracking-[2.3px] !text-white">Hear From Our Customers - Why They Love Our Product</h2>
                    <div class="flex items-center gap-[10px]">
                        <div class="flex items-center justify-center w-[46px] h-[46px] bg-white/20 rounded-full"><img src="{{ $assets }}/images/analytics/icons/google.svg" class="w-[24px]" alt="google"></div>
                        <div>
                            <span class="block font-semibold text-[#E5E5E5] mb-[3px] -tracking-[0.16px] lg:text-[15px] xl:text-md">4.7</span>
                            <span class="block uppercase font-semibold text-xs text-[#ACB2B4] tracking-[0.48px]">Google Ratings</span>
                        </div>
                    </div>
                </div>

                <div id="analyticsTestimonialsSlides">
                    <div class="swiper mySwiper relative ltr:xl:ml-auto rtl:xl:mr-auto xl:max-w-[612px]">
                        <div class="swiper-wrapper">
                            @foreach ($testimonials as $testimonial)
                                <div class="swiper-slide">
                                    <div class="bg-[#1F195D] rounded-[10px] p-[20px] md:p-[30px] lg:p-[35px] xl:p-[50px]">
                                        <div class="mb-[20px] md:mb-[30px] lg:mb-[35px] xl:mb-[40px] flex items-center justify-between">
                                            <img src="{{ $assets }}/images/analytics/icons/quote.svg" alt="quote">
                                            <div class="leading-none text-[#FFE713] flex items-center text-lg gap-[3px]"><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i></div>
                                        </div>
                                        <h3 class="!text-white !font-normal -tracking-[0.18px] !text-md md:!text-lg !mb-[12px] md:!mb-[15px] lg:!mb-[20px]">{{ $testimonial['quote'] }}</h3>
                                        <p class="text-[#A2A5AE] lg:text-[15px] xl:text-md -tracking-[0.16px]">{{ $testimonial['body'] }}</p>
                                        <div class="mt-[15px] md:mt-[20px] lg:mt-[25px] xl:mt-[45px] flex items-center gap-[15px]">
                                            <img src="{{ $assets }}/images/analytics/users/{{ $testimonial['avatar'] }}" class="w-[46px] rounded-full" alt="user-image">
                                            <div>
                                                <h6 class="!font-semibold -tracking-[0.16px] !text-[#E5E5E5] !text-base md:!text-md !mb-[7px]">{{ $testimonial['name'] }}</h6>
                                                <span class="block tracking-[1.8px] text-xs uppercase text-[#93CCE6]">{{ $testimonial['role'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="lg:absolute lg:bottom-[35px] xl:bottom-[50px] ltr:lg:right-[35px] rtl:lg:left-[35px] ltr:xl:right-[50px] rtl:xl:left-[50px] flex justify-center items-center gap-[10px] mt-[20px] md:mt-[25px] lg:mt-0">
                            <div class="swiper-button-prev !relative !top-0 !w-[46px] !h-[46px] !rounded-full !left-0 !right-0 !mt-0 after:hidden bg-white/10 !text-[22px] !text-[#93CCE6] transition-all hover:!bg-[#3368FC] hover:!text-white"><i class="ri-arrow-left-line"></i></div>
                            <div class="swiper-button-next !relative !top-0 !w-[46px] !h-[46px] !rounded-full !left-0 !right-0 !mt-0 after:hidden bg-white/10 !text-[22px] !text-[#93CCE6] transition-all hover:!bg-[#3368FC] hover:!text-white"><i class="ri-arrow-right-line"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute top-0 left-0 right-0 bottom-0 -z-[1] bg-cover bg-no-repeat bg-center lg:mx-[10px] xl:mx-[20px]" style="background-image: url('{{ $assets }}/images/analytics/testimonials-bg.jpg');"></div>
    </div>

    <!-- Customers -->
    <div class="relative z-[1] -mt-[150px] md:-mt-[190px] lg:-mt-[230px]">
        <div class="container sm:max-w-[540px] md:max-w-[720px] lg:max-w-[960px] xl:max-w-[1308px] mx-auto px-[12px]">
            <div class="rounded-[10px] p-[20px] md:p-[40px] lg:p-[70px]" style="background: linear-gradient(277deg, #93CCE6 -2.16%, #3368FC 101%);">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-[25px] items-center">
                    <div class="text-center"><img src="{{ $assets }}/images/analytics/customers.png" class="inline-block" alt="customers-image"></div>
                    <div>
                        <span class="inline-block rounded-[4px] uppercase font-bold tracking-[1.8px] text-[11px] md:text-xs bg-[#01030A] text-[#93CCE6] mb-[10px] md:mb-[12px] lg:mb-[15px] py-[3px] px-[10px]">SEE YOUR CUSTOMERS</span>
                        <h2 class="!mb-[12px] lg:!mb-[15px] !text-[26px] md:!text-4xl lg:!text-[46px] -tracking-[1px] md:-tracking-[1.5px] lg:-tracking-[2.3px] !text-white">Client Kami adalah parter</h2>
                        <p class="-tracking-[0.16px] lg:text-[15px] xl:text-md text-white/70 max-w-[486px]">Discover your most active users of countries to expand your business in the future by the help of RFJ Law Firm’s most polar tool of user metrics by country.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pricing -->
    <div id="team" class="py-[60px] md:py-[80px] lg:py-[100px]">
        <div class="container sm:max-w-[540px] md:max-w-[720px] lg:max-w-[960px] xl:max-w-[1308px] mx-auto px-[12px]">
            <div class="mb-[30px] md:mb-[40px] lg:mb-[50px] mx-auto text-center lg:max-w-[710px]">
                <span class="inline-block rounded-[4px] uppercase font-bold tracking-[1.8px] text-[11px] md:text-xs bg-primary-500 text-white mb-[10px] md:mb-[12px] lg:mb-[15px] py-[3px] px-[10px]">Teams</span>
                <h2 class="!mb-0 !text-[26px] md:!text-4xl lg:!text-[46px] -tracking-[1px] md:-tracking-[1.5px] lg:-tracking-[2.3px]">Profesional Team</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-[25px]">
                @forelse ($teamMembers as $teamMember)
                    <div class="rounded-[18px] bg-white shadow-sm p-[24px] text-center transition-all hover:-translate-y-[8px] hover:shadow-lg">
                        @if ($teamMember->photo_url)
                            <img alt="{{ $teamMember->name }}" class="mx-auto rounded-[16px] w-full h-56 object-cover object-center mb-4" src="{{ $teamMember->photo_url }}">
                        @else
                            <div class="mx-auto mb-4 flex h-56 w-full items-center justify-center rounded-[16px] bg-[#EEF4F6] text-5xl font-bold text-[#3368FC]">
                                {{ \Illuminate\Support\Str::of($teamMember->name)->explode(' ')->map(fn ($part) => \Illuminate\Support\Str::substr($part, 0, 1))->take(2)->implode('') }}
                            </div>
                        @endif

                        <div class="w-full">
                            <h3 class="title-font font-semibold text-[22px] text-gray-900 mb-2">{{ $teamMember->name }}</h3>
                            <p class="text-[#3368FC] uppercase tracking-[1.8px] text-xs font-bold mb-3">{{ $teamMember->position }}</p>
                            <p class="mb-5 text-gray-500 leading-[1.8]">{{ $teamMember->bio }}</p>

                            <div class="inline-flex gap-[10px] text-[#3368FC] text-lg">
                                @if ($teamMember->facebook_url)
                                    <a href="{{ $teamMember->facebook_url }}" target="_blank" rel="noreferrer noopener" class="">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                @endif

                                @if ($teamMember->twitter_url)
                                    <a href="{{ $teamMember->twitter_url }}" target="_blank" rel="noreferrer noopener" class="">
                                        <i class="ri-twitter-x-fill"></i>
                                    </a>
                                @endif

                                @if ($teamMember->whatsapp_url)
                                    <a href="{{ $teamMember->whatsapp_url }}" target="_blank" rel="noreferrer noopener" class="">
                                        <i class="ri-whatsapp-line"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full rounded-[18px] border border-dashed border-slate-300 bg-slate-50 p-[32px] text-center text-slate-500">
                        Team profesional akan segera ditampilkan di sini.
                    </div>
                @endforelse
            </div>
        </div>
    </div>


    <!-- FAQ -->
    <div id="contact" class="pb-[60px] md:pb-[80px] lg:pb-[100px] relative z-[1]">
        <div class="container sm:max-w-[540px] md:max-w-[720px] lg:max-w-[960px] xl:max-w-[1308px] mx-auto px-[12px]">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-[25px] items-center">
                <div class="md:max-w-[496px]">
                    <span class="inline-block rounded-[4px] uppercase font-bold tracking-[1.8px] text-[11px] md:text-xs bg-primary-500 text-white mb-[10px] md:mb-[12px] lg:mb-[15px] py-[3px] px-[10px]">FAQ</span>
                    <h2 class="!mb-[20px] md:!mb-[25px] lg:!mb-[35px] xl:!mb-[40px] !text-[26px] md:!text-4xl lg:!text-[46px] -tracking-[1px] md:-tracking-[1.5px] lg:-tracking-[2.3px]">Have Questions In Mind? Contact With Us Anytime, From Anywhere</h2>
                    <a href="mailto:hello@rfjlawfirm.local" class="inline-block text-center rounded-[4px] bg-[#3368FC] border border-[#3368FC] text-white uppercase text-xs font-bold tracking-[1.8px] py-[14px] md:py-[15px] lg:py-[16px] px-[20px] md:px-[23px] transition-all hover:bg-primary-500">CONTACT US</a>
                </div>

                <div class="accordion" id="rfjAccordion">
                    @forelse ($faqItems as $index => $faqItem)
                        <div class="accordion-item bg-white rounded-[10px] dark:bg-[#0a0e19] mb-[15px] last:mb-0">
                            <button class="accordion-button {{ $index ===0 ? 'open' : '' }} text-base md:text-md font-normal px-[15px] md:px-[20px] py-[15px] md:py-[18px] flex items-center justify-between w-full ltr:text-left rtl:text-right relative text-black dark:text-white -tracking-[0.16px]"
                                    type="button"
                                    aria-expanded="{{ $index ===0 ? 'true' : 'false' }}"
                            >
                                {{ $loop->iteration }}. {{ $faqItem->question }}
                                <span class="block leading-none text-primary-500 text-[22px]"><i class="ri-arrow-down-s-line"></i></span>
                            </button>

                            <div class="accordion-collapse -mt-[3px] px-[15px] md:px-[20px] pb-[15px] md:pb-[18px] {{ $index ===0 ? 'block' : 'hidden' }}">
                                <p>{{ $faqItem->answer }}</p>
                            </div>
                        </div>
                    @empty <div class="accordion-item bg-white rounded-[10px] dark:bg-[#0a0e19] mb-[15px] last:mb-0">
                        <div class="px-[15px] md:px-[20px] py-[18px] text-black dark:text-white -tracking-[0.16px]">
                            FAQ akan segera tersedia.
                        </div>
                    </div>
                    @endforelse </div>
            </div>
        </div>

        <div class="absolute -z-[1] ltr:left-[30%] rtl:right-[30%] ltr:xl:left-[35%] rtl:xl:right-[35%] bottom-[100px] hidden lg:block">
            <img src="{{ $assets }}/images/analytics/shape.png" alt="shape">
        </div>
        <div class="absolute left-0 right-0 ltr:md:left-[20px] rtl:md:right-[20px] ltr:lg:left-[80px] rtl:lg:right-[80px] ltr:md:right-auto rtl:md:left-auto bottom-0 rounded-[420px] h-[347px] w-[290px] md:w-[550px] lg:w-[916px] mx-auto bg-[#3368fc]/40 blur-[232px] -z-[2]"></div>
        <div class="absolute left-0 right-0 ltr:md:right-[20px] rtl:md:left-[20px] ltr:lg:right-[80px] rtl:lg:left-[80px] ltr:md:left-auto rtl:md:right-auto bottom-[347px] md:bottom-0 rounded-[420px] h-[347px] w-[290px] md:w-[550px] lg:w-[862px] mx-auto bg-[#93cce6]/70 blur-[232px] -z-[2]"></div>
    </div>
<style>
    .float {
    position: fixed;
    width:60px;
    height:60px;
    bottom:90px;
    right:40px;
    background-color: #25d366;
    color: #fff;
    border-radius:50px;
    text-align: center;
    font-size:30px;
    box-shadow:2px2px3px #999;
    z-index:100;
    }
    </style>

    <a href="https://wa.me/919876543210"
       class="float"
       target="_blank"
       rel="noopener noreferrer"
       aria-label="Connect with me on WhatsApp"
    >
        <img class="my-float" src="{{ asset('assets/images/wa-logo.png') }}" alt="WhatsApp">
    </a>
@endsection

@push('scripts')

    @if ($carousels->count() > 1)
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const bannerCarousel = document.getElementById('bannerCarousel');

                if (! bannerCarousel || typeof Swiper === 'undefined') {
                    return;
                }

                new Swiper('.bannerCarouselSwiper', {
                    slidesPerView: 1,
                    loop: true,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: '.banner-carousel-next',
                        prevEl: '.banner-carousel-prev',
                    },
                    pagination: {
                        el: '.banner-carousel-pagination',
                        clickable: true,
                    },
                });
            });
        </script>
    @endif
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const root = document.getElementById('rfjAccordion');
                if (!root) return;

                root.querySelectorAll('.accordion-button').forEach((button) => {
                    button.addEventListener('click', function () {
                        const item = button.closest('.accordion-item');
                        const panel = item ? item.querySelector('.accordion-collapse') : null;
                        if (!panel) return;

                        const isOpen = !panel.classList.contains('hidden');

                        root.querySelectorAll('.accordion-collapse').forEach((el) => {
                            el.classList.add('hidden');
                            el.classList.remove('block');
                        });
                        root.querySelectorAll('.accordion-button').forEach((btn) => {
                            btn.classList.remove('open');
                            btn.setAttribute('aria-expanded', 'false');
                        });

                        if (!isOpen) {
                            panel.classList.remove('hidden');
                            panel.classList.add('block');
                            button.classList.add('open');
                            button.setAttribute('aria-expanded', 'true');
                        }
                    });
                });
            });
        </script>
@endpush

