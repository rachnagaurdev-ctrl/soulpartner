<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page->meta_title ?: $page->title }} |  Victura</title>
    <meta name="description" content="{{ $page->meta_description }}">
    <meta name="keywords" content="{{ $page->meta_keywords }}">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $page->meta_title ?: $page->title }}">
    <meta property="og:description" content="{{ $page->meta_description }}">
    @if($page->og_image)
        @php $ogMedia = \Awcodes\Curator\Models\Media::find($page->og_image); @endphp
        @if($ogMedia)
            <meta property="og:image" content="{{ $ogMedia->url }}">
        @endif
    @endif

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="{{ $page->meta_title ?: $page->title }}">
    <meta property="twitter:description" content="{{ $page->meta_description }}">
    <link rel="stylesheet" href="{{asset('assets/css/custom-style.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    @livewireStyles
</head>
<body class="bg-gray-50 text-gray-900">
@php
    $siteName   = \App\Models\Setting::get('site_name', 'VICTORA GROUP');
    $headerNav  = \App\Models\Setting::get('header_nav', []);
    $headerSecondaryNav = \App\Models\Setting::get('header_secondary_nav', []);
    $headerButtons = \App\Models\Setting::get('header_buttons', []);
    $footerNav  = \App\Models\Setting::get('footer_nav', []);
    $footerButtons = \App\Models\Setting::get('footer_buttons', []);
    $tagline    = \App\Models\Setting::get('footer_tagline', '');
    $copyright  = \App\Models\Setting::get('copyright_text', '© ' . date('Y') . ' Victora Group.');
    $linkedin   = \App\Models\Setting::get('social_linkedin');
    $twitter    = \App\Models\Setting::get('social_twitter');
    $facebook   = \App\Models\Setting::get('social_facebook');
    $instagram  = \App\Models\Setting::get('social_instagram');
    $email      = \App\Models\Setting::get('contact_email');
    $phone      = \App\Models\Setting::get('contact_phone');
    $address    = \App\Models\Setting::get('contact_address');

    $logoId = \App\Models\Setting::get('logo');
    $logoMedia = $logoId ? \Awcodes\Curator\Models\Media::find($logoId) : null;
@endphp

    @if(!empty($headerSecondaryNav))
    <div class="header_top border-b" style="background: #f8f9fa; padding: 5px 0;">
        <div class="custom-container">
            <ul class="secondary_menu list-unstyled d-flex justify-content-end gap-4 m-0" style="font-size: 12px;">
                @foreach($headerSecondaryNav as $item)
                <li>
                    <a href="{{ $item['url'] }}" class="text-gray-600 hover:text-[#ED1C24]" @if(!empty($item['open_in_new_tab'])) target="_blank" @endif>
                        {{ $item['label'] }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
      <nav class="navbar">
        <div class="custom-container">
            <div class="navbar__wrap">
                <div class="header_logo">
                    <a href="/">
                         @if($logoMedia)
                            <img src="{{ get_media_url($logoId) }}" alt="{{ get_media_alt($logoId) }}" class="img-fluid" width="100" height="40">
                        @else
                            <span class="text-2xl font-bold text-[#E31E24]">{{ $siteName }}</span>
                        @endif
                    </a>
                </div>
                <div class="menu_row">
                    <div class="nav_wrapper">
                        <ul class="menu list-unstyled d-flex">
                            @foreach($headerNav as $item)
                            <li><a href="{{ $item['url'] ?: 'javascript:void(0);' }}" @if(!empty($item['open_in_new_tab'])) target="_blank" @endif> {{$item['label']}} 
                              @if($item['children'] && count($item['children']) > 0)
                                <span class="arrow-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="6" viewBox="0 0 10 6" fill="none">
                                        <path d="M8.34328 0.198796C8.60835 -0.0662655 9.0381 -0.0662655 9.30316 0.198796C9.56822 0.463858 9.56822 0.893608 9.30316 1.15867L5.23076 5.23107C4.9657 5.49613 4.53595 5.49613 4.27089 5.23107L0.198488 1.15867C-0.0665732 0.893607 -0.0665732 0.463857 0.198488 0.198796C0.46355 -0.0662662 0.8933 -0.0662662 1.15836 0.198796L4.75082 3.79126L8.34328 0.198796Z" fill="#ED1C24"/>
                                    </svg>
                                </span>
                                @endif
                            </a></li>
                            @endforeach

                           
                        </ul>
                    </div>

                    <div class="nav_btn_wrap">
                        <div class="nav_btn_menu">
                            @foreach($headerButtons as $button)
                            <a class="primary_btn" href="{{ $button['url'] ?? 'javascript:void(0);' }}" target="{{ $button['target'] ?? '_self' }}">
                                <span class="primary_btn_text"> {{ $button['label'] }}
                                    <div class="arrow_main">
                                        <span class="primary_btn_icon  primary_btn_top">
                                            <img class="img-fluid" src="{{ asset('assets/images/arrow-icon-white.svg') }}" alt="">
                                        </span>  

                                        <span class="primary_btn_icon primary_btn_bottom">
                                            <img class="img-fluid" src="{{ asset('assets/images/arrow-icon-white.svg') }}" alt="">
                                        </span>
                                    </div>
                                </span>
                            </a>
                            @endforeach
                        </div>
                        <div class="header-toggle" id="toggle">
                            <a href="javascript:void(0);">
                                <img src="{{ asset('assets/images/toggle.svg') }}" alt="Toggle Menu" width="30" height="30" loading="lazy">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    


    <main>
     

        @foreach($page->content as $section)
            @php
                $type = $section['type'];
                $data = $section['data'];

                // Handle global sections
                if ($type === 'global_section') {
                    $global = \App\Models\GlobalSection::with('sectionType')->find($data['global_section_id']);
                    if ($global) {
                        $type = $global->sectionType->identifier;
                        $data = $global->data;
                    }
                }
                
                // Handle dynamic section builder
                if ($type === 'section') {
                    $sectionTypeModel = \App\Models\SectionType::find($data['section_type_id'] ?? null);
                    if ($sectionTypeModel) {
                        $type = $sectionTypeModel->identifier;
                        $data = $data['data'] ?? [];
                    }
                }
                
                $template = 'sections.' . $type;
            @endphp
            @if(view()->exists($template))
                @include($template, ['data' => $data])
            @else
                <div class="container mx-auto px-6 py-12 text-center bg-yellow-50 border border-yellow-200 rounded-xl my-8">
                    <p class="text-yellow-700 font-medium">Section template <code>{{ $type }}</code> not found.</p>
                    <p class="text-sm text-yellow-600 mt-2">Create a Blade file at <code>resources/views/sections/{{ $type }}.blade.php</code></p>
                </div>
            @endif
        @endforeach
    </main>

        <footer class="footer">
        <div class="custom-container">
            <div class="footer__row">
                <div class="footer__social_row d-flex align-items-end justify-content-between">
                    <div class="footer_subscribe">
                        <h5 class="fs-22 fw-600 text-white"> Subscribe to our Newsletter </h5>
                        <p class="fs-16 fw-400 text-white-80"> Stay up to date with our latest news and products </p>
                        @livewire('footer-subscription')
                    </div>

                    <div class="footer_social">
                        <div class="cnt__wrap fs-18 fw-700 text-white">
                            <p> stay in touch: </p>
                        </div>
                        <div class="social_icons">
                            <ul class="list-unstyled d-flex">
                                @if($linkedin) 
                                    <li>
                                        <a href="{{ $linkedin }}" target="_blank" >
                                            <img class="img-fluid" src="{{ asset('assets/images/linkedin-icon.svg') }}" alt="LinkedIn" width="24" height="24" loading="lazy">
                                        </a> 
                                    </li>
                                    @endif
                                @if($twitter) 
                                    <li>
                                        <a href="{{ $twitter }}" target="_blank" >
                                            <img class="img-fluid" src="{{ asset('assets/images/whatsapp-icon.svg') }}" alt="WhatsApp" width="24" height="24" loading="lazy">
                                        </a> 
                                    </li>
                                    @endif
                                @if($facebook) 
                                    <li>
                                        <a href="{{ $facebook }}" target="_blank" >
                                            <img class="img-fluid" src="{{ asset('assets/images/facebook-icon.svg') }}" alt="Facebook" width="24" height="24" loading="lazy">
                                        </a> 
                                    </li>
                                    @endif
                                @if($instagram) 
                                    <li>
                                        <a href="{{ $instagram }}" target="_blank" >
                                            <img class="img-fluid" src="{{ asset('assets/images/instagram-icon.svg') }}" alt="Instagram" width="24" height="24" loading="lazy">
                                        </a> 
                                    </li>
                                    @endif
                   
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="footer__nav pt-30 pb-80">
                    <ul class="footer__col list-unstyled">
                        @foreach($footerButtons as $button)
                        <li> 
                            <a href="{{ $button['url'] ?? '' }}"> {{ strtoupper($button['label'] ?? '') }} 
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="8" viewBox="0 0 16 8" fill="none">
                                        <path d="M15.5876 4.38248C15.7996 4.17044 15.7996 3.82664 15.5876 3.61459L12.132 0.159041C11.92 -0.0530081 11.5762 -0.0530081 11.3641 0.159041C11.1521 0.37109 11.1521 0.71489 11.3641 0.92694L14.4357 3.99854L11.3641 7.07013C11.1521 7.28218 11.1521 7.62598 11.3641 7.83803C11.5762 8.05008 11.92 8.05008 12.132 7.83803L15.5876 4.38248ZM0 3.99854V4.54152H15.2036V3.99854V3.45555H0V3.45555V3.99854Z" fill="#FF2931"/>
                                    </svg>
                                </span>
                            </a>
                            
                        </li>
                        @endforeach
                    </ul>

                    @foreach($footerNav as $column)
                    <div class="footer_link">
                        <h5 class="flink-heading fs-18 fw-700">{{ $column['column_title'] ?? '' }}</h5>
                            <div class="footer_acordian_arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="6" viewBox="0 0 10 6" fill="none">
                                  <path d="M8.34359 0.198796C8.60865 -0.0662655 9.0384 -0.0662655 9.30346 0.198796C9.56852 0.463858 9.56852 0.893608 9.30346 1.15867L5.23106 5.23107C4.966 5.49613 4.53625 5.49613 4.27119 5.23107L0.198793 1.15867C-0.066268 0.893607 -0.066268 0.463857 0.198793 0.198796C0.463855 -0.0662662 0.893605 -0.0662662 1.15867 0.198796L4.75113 3.79126L8.34359 0.198796Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <ul class="footer__wrapper list-unstyled">
                                @foreach($column['links'] ?? [] as $link)
                                <li>
                                    <a href="{{ $link['url'] }}"> {{ $link['label'] ?? '' }} </a>
                                </li>
                                @endforeach

                            
                            </ul>
                    </div>
                @endforeach


                </div>

                <div class="footer__bottom">
                    <div class="cnt__wrap fs-16 fw-400 text-white">
                        <p> {{ $copyright }} </p>
                    </div>
                </div>
            </div>
        </div>
        
    </footer>
    @include('partial.leader-popup')
    
    <script src="{{asset('assets/js/jquery.min.js')}}" defer></script>
    <script src="{{asset('assets/js/component.js')}}" defer></script>
    <script src="{{asset('assets/js/gsap.min.js')}}" defer></script>
    <script src="{{asset('assets/js/leadership.js')}}" defer></script>
    <script src="{{asset('assets/js/ScrollTrigger.min.js')}}" defer></script>
    <script src="{{asset('assets/js/custom-script.js')}}" defer></script>
    <script src="{{asset('assets/js/our-journey.js')}}" defer></script>
    @livewireScripts
</body>
</html> 