 <section class="social__impact_section pos-relative pt-50 pb-90">
    <div class="section-overlay"></div>
                <div class="custom-container">
                    <div class="social_impact_heading">
                        <div class="custom-heading">
                            <div class="sub_heading fs-24 fw-300 mb-10 text-primary-black-80"> {!! $data['subtitle'] ?? '' !!} </div>
                            <h4 class="heading fs-76 fw-600 text-primary"> 
                               {!! $data['title'] ?? '' !!}
                            </h4>
                        </div>
                    </div>
            
                    <div class="social_impact_inner pt-50">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <div class="social_tab_mobile">
                                    <div class="social_tab_slider swiper">
                                        <div class="swiper-wrapper">
                                            @foreach($data['list'] ?? [] as $index => $item)
                                                <div class="swiper-slide">
                                                    <div data-toggle="tab" class="social_impact_tab @if($index == 0) active @endif mobile_social_impact_tab_{{$index}}" data-id="social_impact_tab_{{$index}}">
                                                        <a class="item d-flex align-items-center" href="javascript:void(0)">
                                                            <div class="social_impact-icon">
                                                                <img class="img-fluid" src="{{ get_media_url($item['icon']) }}" alt="{{ get_media_alt($item['icon']) }}" width="40" height="40" loading="lazy">
                                                            </div>
                                                            <div class="cnt__wrap">
                                                                <div class="tab_heading fs-24 fw-500">{{ $item['title'] ?? '' }}</div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="social_tab_pagination"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-3 col-lg-3">
                                <div class="social_impact_tabbing pos-relative">
                                    <ul class="fs-20 fw-400 text-white d-flex align-items-center">
                                        @foreach($data['list'] ?? [] as $index => $item)
                                        <li data-toggle="tab" class="social_impact_tab @if($index == 0) active @endif" data-id="social_impact_tab_{{$index}}" data-index="{{$index}}">
                                            <a class="d-flex align-items-center" href="javascript:void(0)">
                                                <div class="social_impact-icon">
                                                    <img class="img-fluid" src="{{ get_media_url($item['icon']) }}" alt="{{ get_media_alt($item['icon']) }}" width="40" height="40" loading="lazy">
                                                </div>
                                                <div class="cnt__wrap">
                                                    <div class="tab_heading fs-24 fw-500">{!! $item['title'] ?? '' !!}</div>
                                                </div>
                                            </a>
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>

                            <div class="col-12 col-xl-9 col-lg-9">
                                <div class="social_impact_wrapper">
                                @foreach($data['list'] ?? [] as $index => $item)
                                    <div class="social_impact_details @if($index == 0) tab-active @endif" data-id="social_impact_tab_{{ $index }}">
                                        <div class="single_item pos-relative">
                                            <div class="img__wrap">
                                                <img class="img-fluid" src="{{ get_media_url($item['image']) }}" alt="{{ get_media_alt($item['image']) }}" width="800" height="450" loading="lazy">
                                            </div>
                                            <div class="content__area">
                                                <div class="social_impact-icon">
                                                    <img class="img-fluid" src="{{ get_media_url($item['icon']) }}" alt="{{ get_media_alt($item['icon']) }}" width="60" height="60" loading="lazy">
                                                </div>
                                                <h5 class="fs-36 fw-600 mt-35 text-white"> {!! $item['title'] ?? '' !!} </h5>
                                                <div class="cnt__wrap fs-22 fw-300 mt-30 text-white">
                                                    <p>
                                                        {!! $item['description'] ?? '' !!}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                   
                            </div>

                        </div>
                    </div>
                </div>
            </section>