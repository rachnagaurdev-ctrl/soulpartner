   <section class="manufacturing__section our_capabilities__section pos-relative pt-45 pb-20">
                <div class="bg-gradient-top"></div>
                <div class="custom-container">
                    <div class="row top-row">
                        <div class="col-12 col-md-12 col-lg-5 col-xl-6">
                            <div class="section__header">
                                <div class="sub_heading fs-24 fw-300 text-uppercase text-primary-black-80"> {!! $data['subtitle'] ?? '' !!} </div>
                                <h3 class="heading fs-76 fw-600 text-primary"> 
                                    {!! $data['title'] ?? '' !!} 
                                </h3>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-7 col-xl-6">
                            <div class="content-col d-flex">
                            <div class="cnt__wrap fw-300 text-primary-black-80">
                                <p>
                                    {!! $data['description'] ?? '' !!} 
                                </p>
                            </div>
                               @if(isset($data['cta']) && !empty($data['cta']))
                                    <div class="btn-group">
                                        <a class="primary_btn" href="{{ get_cta_link($data['cta']) }}">
                                            <span class="primary_btn_text">  {{$data['cta']['label'] ?? ''}}
                                                <span class="primary_btn_icon">
                                                    <img class="img-fluid" src="{{asset('assets/images/arrow-icon-white.svg')}}" alt="arrow">
                                                </span>      
                                            </span>
                                        </a>
                                    </div>
                                       
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="cards__wrapper mt-40">
                        @forelse($data['list'] as $index => $item)
                         <div class="single_item {{ $index == 0 ? 'active' : '' }}">
                            <img class="img-fluid bg_img" src="{{ get_media_url($item['image'] ?? '') }}" alt="{{ get_media_alt($item['image'] ?? '') }}">
                            <a class="card_btn" href="javascript:void(0);">
                                <img class="img-fluid" src="{{asset('assets/images/arrow-icon-white.svg')}}" alt="">
                            </a>
                            <div class="content__block">
                                <h4 class="heading fs-18 fw-500 text-white">{{ $item['title'] ?? '' }}</h4>
                            </div>
                            <div class="content__area">
                                <div class="heading fw-600">{{ $item['title'] ?? '' }}</div>
                                <div class="cnt__wrap">
                                    <p>
                                        {{ $item['description'] ?? '' }}   
                                    </p>
                                </div>
                            </div>
                        </div>
                        @empty
                            
                        @endforelse
                
                       
                    </div>
                </div>
            </section>



            