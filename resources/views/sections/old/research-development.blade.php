   
   <section class="research__section research__dev_sec pos-relative pt-50 pb-40">
                <div class="section-gradient"></div>
                <div class="bg-gradient-bottom"></div>
                <div class="bg-gradient-circle"></div>
                <div class="bg-img">
                    <img class="img-fluid" src="{{get_media_url($data['background_image'])}}" alt="{{get_media_alt($data['background_image'])}}">
                </div>
                <div class="custom-container">
                    <div class="research_dev_inner">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-12 col-lg-5 col-xl-5">
                                <div class="content_area">
                                    <!-- <div class="custom-heading"> -->
                                        <div class="sub_heading fs-24 fw-300 text-uppercase text-primary-black-80"> {!! $data['subtitle'] ?? '' !!}</div>
                                        <h2 class="heading fs-76 fw-600 text-primary"> 
                                             {!! $data['title'] ?? '' !!}
                                        </h2>
                                        <div class="cnt__wrap fw-300 mt-20 text-primary-black-80">
                                            <p>
                                               {!! $data['description'] ?? '' !!}
                                            </p>
                                        </div>
                                        @if(isset($data['cta']) && !empty($data['cta']))
                                        <div class="btn-group mt-20">
                                            <a class="primary_btn" href="{{ get_cta_link($data['cta']) }}">
                                                <span class="primary_btn_text"> {{$data['cta']['label'] ?? ''}}
                                                    <span class="primary_btn_icon">
                                                        <img class="img-fluid" src="{{asset('assets/images/arrow-icon-white.svg')}}" alt="arrow">
                                                    </span>      
                                                </span>
                                            </a>
                                        </div>
                                        @endif
                                    <!-- </div> -->
                                </div>
                            </div>

                            <div class="col-12 col-md-12 col-lg-7 col-xl-7">
                                <div class="research_wrapper">
                                    <div class="research_slider_wrap">
                                        <div class="research_slider swiper">
                                            <div class="swiper-wrapper">
                                                <!-- Slide -->
                                                @foreach($data['image_list'] as $image)
                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="{{ get_media_url($image['image']) }}" alt="{{ get_media_alt($image['image']) }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="pagination_wrap">
                                            <div class="research_pagination swiper-pagination"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <!-- Counter Start -->
                    <div class="counter__wrapper">
                        <div class="counter_inr">
                            <!-- Slider -->
                            <div class="counter__slider swiper">
                                <div class="swiper-wrapper">
                                    <!-- Slide -->
                                     @foreach($data['list'] as $item)
                                    <div class="swiper-slide">
                                        <div class="counter_col">
                                            <div class="img__wrap">
                                                <img class="img-fluid" src="{{ get_media_url($item['icon'] ?? '') }}" alt=" {{ get_media_alt($item['icon'] ?? '') }} ">
                                            </div>
                                            <div class="content__area">
                                                <div class="counter_num fs-42 fw-300 text-primary-black-80"> {{ $item['value'] ?? '' }} </div>
                                                <div class="cnt__wrap fw-500 text-primary-black-80">
                                                    <p> {{ $item['title'] ?? '' }} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     @endforeach

                                   
                                </div>
                            </div>
                            <div class="counter_pagination swiper-pagination"></div>
                        </div>
                    </div>
                    <!-- Counter End -->
                </div>
            </section>