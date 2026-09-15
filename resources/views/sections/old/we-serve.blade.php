  <section class="we__serve_section pt-30 pb-40">
                <div class="custom-container">
                    <div class="we_serve_inner">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="we_serve_left">
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
                                                <img src="{{ $mediaUrl }}" alt="{{ $data['title'] ?? '' }}" class="img-fluid w-100 h-100 object-cover" width="600" height="400" loading="lazy">
                                            @endif
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="we_serve_right">
                                    <div class="section__header">
                                        <div class="custom-heading">
                                            <div class="sub_heading fs-24 fw-300 text-uppercase text-primary-black-80"> {!! $data['subtitle'] ?? ''  !!} </div>
                                            <h4 class="heading fs-76 fw-600 text-primary"> 
                                                {!! $data['title'] ?? '' !!}
                                            </h4>
                                            <div class="cnt__wrap fw-300 mt-20 text-primary-black-80">
                                                <p>
                                                    {!! $data['description'] ?? '' !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="we_serve_accordion">
                                        @forelse($data['list'] as $index => $item)
                                        <div class="single_item {{ $index == 0 ? 'active' : '' }}">
                                            <a href="javascript:void(0);" class="icon_btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                    <path d="M0.871094 14.8071L14.8071 0.871094M14.8071 0.871094H4.35509M14.8071 0.871094V11.3231" stroke="#3D3D3D" stroke-width="1.742" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </a>
                                            <h5 class="accordion_header"> {!! $item['title'] ?? '' !!} </h5>

                                            <div class="content_area">
                                                <div class="cnt__wrap fw-300 text-primary-black-80">
                                                    <p>
                                                        {!! $item['description'] ?? '' !!}
                                                    </p>
                                                </div>
                                                <div class="btn-group mt-30 d-flex align-items-center">
                                                    @if(isset($item['cta']) && !empty($item['cta']))
                                                        <a class="primary_btn" href="{{ get_cta_link($item['cta']) }}">
                                                            <span class="primary_btn_text">  {{$item['cta']['label'] ?? ''}}
                                                                <span class="primary_btn_icon">
                                                                    <img class="img-fluid" src="{{ asset('assets/images/arrow-icon-white.svg') }}" alt="arrow">
                                                                </span>      
                                                            </span>
                                                        </a>
                                                    @endif

                                                    @if(!empty($item['document']))
                                                   
                                                    <a class="link-btn" href="{{ get_storage_url($item['document'] ?? '') }}" target="_blank">
                                                        <span class="btn_icon"> 
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" viewBox="0 0 12 13" fill="none">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.00469 11.8918C5.88901 12.0074 5.7322 12.0723 5.56871 12.0723C5.40521 12.0723 5.24841 12.0074 5.13273 11.8918L0.197062 6.95617C0.136446 6.89969 0.08783 6.83158 0.05411 6.7559C0.0203891 6.68022 0.00225783 6.59852 0.000796804 6.51568C-0.000665172 6.43284 0.0145717 6.35056 0.0456014 6.27374C0.0766311 6.19691 0.122818 6.12713 0.181403 6.06854C0.239988 6.00996 0.309774 5.96377 0.386595 5.93274C0.463418 5.90171 0.545702 5.88647 0.628541 5.88794C0.71138 5.8894 0.793077 5.90753 0.868757 5.94125C0.944437 5.97497 1.01255 6.02359 1.06903 6.0842L4.95175 9.96693L4.95175 0.616748C4.95175 0.453121 5.01675 0.296195 5.13246 0.180493C5.24816 0.0647912 5.40508 -0.000209356 5.56871 -0.000209341C5.73234 -0.000209327 5.88926 0.0647912 6.00496 0.180493C6.12067 0.296196 6.18567 0.453121 6.18567 0.616748L6.18567 9.96693L10.0684 6.0842C10.1249 6.02359 10.193 5.97497 10.2687 5.94125C10.3443 5.90753 10.426 5.8894 10.5089 5.88794C10.5917 5.88648 10.674 5.90171 10.7508 5.93274C10.8276 5.96377 10.8974 6.00996 10.956 6.06854C11.0146 6.12713 11.0608 6.19691 11.0918 6.27374C11.1228 6.35056 11.1381 6.43284 11.1366 6.51568C11.1352 6.59852 11.117 6.68022 11.0833 6.7559C11.0496 6.83158 11.001 6.89969 10.9404 6.95617L6.00469 11.8918Z" fill="#EA1C24"/>
                                                            </svg>
                                                        </span>
                                                        <span class="btn_text">Download Brochure</span>
                                                    </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                   
                                        @empty 
                                            <div class="col-12">
                                                <div class="custom-heading">
                                                    <div class="sub_heading fs-24 fw-300 text-dark-gray"> No Data Found </div>
                                                </div>
                                            </div>
                                        @endempty

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>