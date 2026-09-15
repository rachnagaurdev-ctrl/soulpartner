  <section class="sustainability__section pt-60 pb-60 pos-relative">
                <div class="bg-img">
                    <img class="img-fluid" src="{{get_media_url($data['background_image'])}}" alt="{{get_media_alt($data['background_image'])}}">
                </div>
                <div class="custom-container">
                    <div class="sustainability_inner">
                        <div class="sustainability_col sustainability_col_top">
                            <div class="custom-heading">
                                <div class="sub_heading fs-24 fw-300 mb-10 text-primary-black-80"> {!! $data['subtitle'] ?? '' !!} </div>
                                <h4 class="heading fs-76 fw-600 text-primary">{!! $data['title'] ?? '' !!}</h4>
                                <div class="sustain_cnt__wrap fs-16 text-primary-black-80">
                                    <p>
                                        {!! $data['description'] ?? '' !!}
                                    </p>
                                </div>
                                @if(isset($data['cta']) && $data['cta'] != '')
                                <div class="sustainability-btn mt-45">
                                    <a class="primary_btn" href="{{ $data['cta']['url'] ?? 'javascript:void(0);' }}">
                                        <span class="primary_btn_text"> {!! $data['cta']['label'] !!}
                                            <span class="primary_btn_icon">
                                                <img class="img-fluid" src="{{ asset('assets/images/arrow-icon-white.svg') }}" alt="arrow">
                                            </span>      
                                        </span>
                                    </a>
                                </div>
                                @endif
                            </div>

                            @if(count($data['list']) > 0)
                            <div class="sustainability_card">
                                <img class="img-fluid" src="{{ get_media_url($data['list'][0]['image']) }}" alt="{{get_media_alt($data['list'][0]['image'])}}">
                                <div class="content_area d-flex">
                                    <div class="left-block">
                                        <img class="img-fluid" src="{{ asset('assets/images/tick-icon-white.svg')}}" alt="tick">
                                    </div>
                                    <div class="cnt__wrap fs-24">
                                        <p>
                                            {!! $data['list'][0]['title'] ?? '' !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        @if(count($data['list']) > 1)

                        <div class="sustainability_col sustainability_col_center">
                            <div class="sustainability_card">
                                <img class="img-fluid" src="{{get_media_url($data['list'][1]['image'])}}" alt="{{get_media_alt($data['list'][1]['image'])}}">
                                <div class="content_area d-flex">
                                    <div class="left-block">
                                        <img class="img-fluid" src="{{ asset('assets/images/tick-icon-white.svg')}}" alt="tick">
                                    </div>
                                    <div class="cnt__wrap fs-24">
                                        <p>
                                            {!! $data['list'][1]['title'] ?? '' !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if(count($data['list']) > 2)
                        <div class="sustainability_col sustainability_col_bottom">
                            <div class="sustain_cnt__wrap fs-16 text-primary-black-80">
                                <p>
                                    {!! $data['description'] ?? '' !!}
                                </p>
                            </div>

                            <div class="sustainability_card">
                                <img class="img-fluid" src="{{get_media_url($data['list'][2]['image'])}}" alt="{{get_media_alt($data['list'][2]['image'])}}">
                                <div class="content_area d-flex">
                                    <div class="left-block">
                                        <img class="img-fluid" src="{{ asset('assets/images/tick-icon-white.svg')}}" alt="tick">
                                    </div>
                                    <div class="cnt__wrap fs-24">
                                        <p>
                                              {!! $data['list'][2]['title'] ?? '' !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </section>