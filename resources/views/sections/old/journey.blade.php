@php
$cnt = 1;
@endphp
 <section class="journey__section pos-relative">
            <div class="custom-container">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-10 col-xl-11">
                        <div class="timeline__data_wrapper d-flex">
                            <div class="timeline__img_area">
                                <ul class="timline__left_year list-unstyled">
                                    <div class="timline_left_year_slider swiper">
                                        <div class="swiper-wrapper">
                                            @foreach($data['journey-year'] as $journey)
                                            <div class="swiper-slide">
                                                  <li class="list-style-none {{ $cnt == 1 ? 'active' : '' }}" data-year="{{$journey['year']}}">{{ $journey['year'] }}</li>
                                            </div>
                                            @php
                                            $cnt++;
                                            @endphp
                                            @endforeach
                                           
                                        </div>
                                    </div>
                                </ul>
                                <div class="timeline__lg_img">
                                    <div class="img__border top-left">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="86" height="79" viewBox="0 0 86 79" fill="none">
                                            <path d="M1 79V1H86" stroke="url(#paint0_linear_325_215)" stroke-width="2"/>
                                            <defs>
                                            <linearGradient id="paint0_linear_325_215" x1="4.74" y1="5.10526" x2="34.9111" y2="40.1864" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FF2931"/>
                                            <stop offset="1" stop-color="#FF2931" stop-opacity="0"/>
                                            </linearGradient>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="img__border top-right">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="86" height="79" viewBox="0 0 86 79" fill="none">
                                            <path d="M85 79V1H-8.9407e-07" stroke="url(#paint0_linear_325_218)" stroke-width="2"/>
                                            <defs>
                                            <linearGradient id="paint0_linear_325_218" x1="81.26" y1="5.10526" x2="51.0889" y2="40.1864" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FF2931"/>
                                            <stop offset="1" stop-color="#FF2931" stop-opacity="0"/>
                                            </linearGradient>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="img__border bottom-left">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="86" height="79" viewBox="0 0 86 79" fill="none">
                                            <path d="M1 1.96695e-06V78H86" stroke="url(#paint0_linear_325_236)" stroke-width="2"/>
                                            <defs>
                                            <linearGradient id="paint0_linear_325_236" x1="4.74" y1="73.8947" x2="34.9111" y2="38.8136" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FF2931"/>
                                            <stop offset="1" stop-color="#FF2931" stop-opacity="0"/>
                                            </linearGradient>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="img__border bottom-right">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="86" height="79" viewBox="0 0 86 79" fill="none">
                                            <path d="M85 1.96695e-06V78H-8.9407e-07" stroke="url(#paint0_linear_325_239)" stroke-width="2"/>
                                            <defs>
                                            <linearGradient id="paint0_linear_325_239" x1="81.26" y1="73.8947" x2="51.0889" y2="38.8136" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FF2931"/>
                                            <stop offset="1" stop-color="#FF2931" stop-opacity="0"/>
                                            </linearGradient>
                                            </defs>
                                        </svg>
                                    </div>
                                    @php
                                    $img_cnt = 1;
                                    @endphp
                                    <div class="timeline__img_space">
                                        <div class="timeline__lgimg__wrapper">
                                            <div class="timeline_lgimg_slider swiper">
                                                <div class="swiper-wrapper">
                                                    @foreach($data['journey-year'] as $jr_img)
                                                    <div class="swiper-slide">
                                                        <div class="img__wrapper {{ $img_cnt ==1 ? 'active' : '' }}" data-img="{{ $jr_img['year'] }}">
                                                            <img class="img-fluid" src="{{ get_media_url($jr_img['image']) }}" alt="">
                                                        </div>
                                                    </div>
                                                    @php
                                                    $img_cnt++;
                                                    @endphp
                                                    @endforeach

                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php
                            $des_cnt = 1;
                            @endphp
                            <div class="timeline__content_area">
                                <div class="content__timeline">
                                    <div class="content_timeline_slider swiper">
                                        <div class="swiper-wrapper">
                                            @foreach($data['journey-year'] as $jrny_des)
                                            <div class="swiper-slide">
                                                <div class="content__area {{$des_cnt==1 ?'active': ''}}" data-content="{{$jrny_des['year']}}">
                                                    <h2 class="heading fs-48 fw-600 text-primary">{{ $jrny_des['title'] }}</h2>
                                                    <div class="content_wrap text-primary-black fs-18 fw-300">
                                                        <p>{{ $jrny_des['description'] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @php
                                            $des_cnt++;
                                            @endphp
                                            @endforeach
                                        
                                          
                                        </div>
                                    </div>
                                </div>
                                @php
                                $year_cnt = 1;
                                @endphp
                                <div class="timeline__sm_img_area">
                                    <ul class="timeline__right_year fs-18 fw-500 list-unstyled">
                                        <div class="timeline_right_year_slider swiper">
                                            <div class="swiper-wrapper">
                                                @foreach($data['journey-year'] as $jrny_year)
                                                <div class="swiper-slide">
                                                    <li class="list-style-none text-primary-black text-center {{ $year_cnt == 2 ? 'active' : '' }}" data-year="{{ $jrny_year['year'] }}">{{ $jrny_year['year'] }}</li>
                                                </div>
                                                    @php
                                                    $year_cnt++;
                                                    @endphp 
                                                    @endforeach

                                               
                                            </div>
                                        </div>
                                    </ul>
                                    @php
                                    $img_cnt = 1;
                                    @endphp
                                    <div class="timeline__separator">
                                        <div class="line--seperator"></div>
                                        <div class="timeline__smimg__wrapper">
                                            <div class="timeline_smimg_slider swiper">
                                                <div class="swiper-wrapper">
                                                    @foreach($data['journey-year'] as $jrny_img)
                                                    <div class="swiper-slide">
                                                        <div class="img__wrap {{ $img_cnt == 2 ? 'active' : '' }}" data-img="{{$jrny_img['year']}}">
                                                            <img class="img-fluid" src="{{ get_media_url($jrny_img['image']) }}" alt="">
                                                        </div>
                                                    </div>
                                                    @php
                                                    $img_cnt++;
                                                    @endphp
                                                    @endforeach
                                    
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @php    
                        $year_cnt = 1;
                        @endphp
                            <div class="timeline__mobile_nav">
                                <button class="timeline-prev">←</button>
                                <button class="timeline-next">→</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-auto col-xl-auto">
                        <ul class="timeline_wrapper list-unstyled d-flex">
                            @foreach($data['journey-year'] as $jrny_year)
                            <li class="single_item list-style-none {{$year_cnt == 1 ? 'active' : ''}}" data-year="{{ $jrny_year['year']}}">
                                <a href="javascript:void(0);">{{ $jrny_year['year'] }}</a>
                            </li>
                            @php
                            $year_cnt++;
                            @endphp
                            @endforeach
                          
                        </ul>
                    </div>
                </div>
            </div>
        </section>