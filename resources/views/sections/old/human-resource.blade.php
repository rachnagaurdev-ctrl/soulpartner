 <section class="hr__section human__resource_section pt-60 pb-100 pos-relative">
                <div class="bg-logo">
                    <img src="assets/images/home-page/human-resource/bg-logo.webp" alt="">
                </div>
                <div class="custom-container">
                    <div class="human__resource_inner d-flex">
                        <div class="human__resource_left">
                            <div class="video__area pos-relative">
                                <div class="video__container">
                                    @php 
                                        $mediaUrl = get_media_url($data['video'] ?? 'assets/images/home-page/banner/banner-vid.mp4');
                                    @endphp
                                    @if(is_video($mediaUrl))
                                        <video id="video-about" autoplay muted loop playsinline width="100%" height="auto">
                                            <source src="{{ $mediaUrl }}" type="video/mp4">
                                        </video>
                                    
                                    @else
                                        <img src="{{ $mediaUrl }}" alt="{{ $slide['title'] ?? '' }}" class="img-fluid w-100 h-100 object-cover">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="human__resource_right">
                            <div class="section__header">
                                <div class="sub_heading fs-24 fw-300 text-uppercase mb-10 text-primary-black-80"> {!! $data['subtitle'] ?? '' !!}</div>
                                <h4 class="heading fs-42 fw-600 text-primary"> 
                                    {!! $data['title'] ?? '' !!}
                                </h4>
                                <div class="cnt__wrap fw-400 mt-35 text-primary-black-80">
                                    <p>
                                        {!! $data['description'] ?? '' !!}
                                    </p>
                                </div>
                            </div>
                             @if(!empty($data['cta']))
                            <div class="btn-group mt-35">
                                <a class="primary_btn" href="{{ get_cta_link($data['cta']) }}" target="{{ $data['cta']['target'] ?? '_self' }}">
                                    <span class="primary_btn_text">     {{ $data['cta']['label'] ?? 'Explore More' }} 
                                        <span class="primary_btn_icon">
                                            <img class="img-fluid" src="{{asset('assets/images/arrow-icon-white.svg')}}" alt="arrow icon">
                                        </span>      
                                    </span>
                                </a>
                            </div>
                            @endif

                          
                        </div>
                    </div>
                </div>
            </section>