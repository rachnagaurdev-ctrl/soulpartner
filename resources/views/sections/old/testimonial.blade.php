  <section class="testimonials__section pos-relative">
                <div class="testimonial-bg">
                    <img class="img-fluid" src="{{asset('assets/images/home-page/testimonials/testimonial-bg.webp')}}" alt="">
                </div>
                <div class="custom-container">
                    <div class="testimonials__inner">
                        <div class="row align-items-center">
                             <div class="col-12 col-md-12 col-lg-6 col-xl-5 ">
                                <div class="testimonials_left">
                                    <div class="custom-heading">
                                        <div class="sub_heading fs-24 fw-300 mb-10 text-primary-black-80"> {!! $data['subtitle'] ?? '' !!} </div>
                                        <h4 class="heading fs-76 fw-600 text-primary"> 
                                            {!! $data['title'] ?? '' !!} 
                                        </h4>
                                    </div>
                                    <div class="testimonials_cnt_slider swiper">
                                        <div class="swiper-wrapper">
                                            @foreach($data['list'] as $review)
                                            <!-- Slide -->
                                            <div class="swiper-slide">
                                                <div class="content__area">
                                                    <div class="quote_icon mt-50">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="76" height="60" viewBox="0 0 76 60" fill="none">
                                                            <path d="M25.0226 28.1505H6.59972C7.18103 24.2793 8.56334 20.5719 10.6584 17.2651C12.7534 13.9583 15.515 11.1248 18.767 8.94559L24.3658 5.19219L20.9252 0L15.3264 3.75339C10.6136 6.89397 6.74894 11.1493 4.07535 16.1419C1.40176 21.1344 0.00189886 26.7097 0 32.373V53.1731C0 54.8322 0.659076 56.4233 1.83224 57.5965C3.0054 58.7697 4.59655 59.4287 6.25566 59.4287H25.0226C26.6817 59.4287 28.2729 58.7697 29.446 57.5965C30.6192 56.4233 31.2783 54.8322 31.2783 53.1731V34.4061C31.2783 32.747 30.6192 31.1559 29.446 29.9827C28.2729 28.8095 26.6817 28.1505 25.0226 28.1505ZM68.8122 28.1505H50.3893C50.9706 24.2793 52.3529 20.5719 54.448 17.2651C56.543 13.9583 59.3046 11.1248 62.5566 8.94559L68.1554 5.19219L64.746 0L59.116 3.75339C54.4032 6.89397 50.5385 11.1493 47.8649 16.1419C45.1914 21.1344 43.7915 26.7097 43.7896 32.373V53.1731C43.7896 54.8322 44.4487 56.4233 45.6218 57.5965C46.795 58.7697 48.3862 59.4287 50.0453 59.4287H68.8122C70.4713 59.4287 72.0625 58.7697 73.2356 57.5965C74.4088 56.4233 75.0679 54.8322 75.0679 53.1731V34.4061C75.0679 32.747 74.4088 31.1559 73.2356 29.9827C72.0625 28.8095 70.4713 28.1505 68.8122 28.1505Z" fill="#BFC0C7"/>
                                                        </svg>
                                                    </div>
                                                    <div class="cnt__wrap fs-16 fw-300 mt-30 text-primary-black-80">
                                                        <p>
                                                            {!! $review['description'] ?? '' !!}
                                                        </p>
                                                    </div>
                                                    <div class="testimonials_person mt-30">
                                                        <h4 class="name fs-24 fw-500 mb-10 text-primary-black">{!! $review['author'] ?? '' !!}</h4>
                                                        <div class="designation fs-16 fw-500 text-primary-black-80">{!! $review['designation'] ?? '' !!}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach


                                        </div>

                                        <!-- Arrows -->
                                        <div class="testimonial_arrows mt-30 d-flex align-items-center justify-content-between">
                                            <div class="arrow_wrap d-flex align-items-center">
                                                <div class="swiper-btn-prev">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.197267 5.23132C0.0747989 5.34935 0.00418914 5.51117 0.000948029 5.68123C-0.00229308 5.85129 0.0620995 6.01568 0.179981 6.1383L5.21598 11.37C5.27353 11.4342 5.34342 11.4861 5.42147 11.5227C5.49952 11.5592 5.58413 11.5797 5.67027 11.5829C5.75641 11.586 5.8423 11.5718 5.92282 11.5411C6.00334 11.5103 6.07684 11.4637 6.13894 11.4039C6.20104 11.3441 6.25046 11.2724 6.28426 11.1931C6.31806 11.1138 6.33554 11.0286 6.33566 10.9424C6.33579 10.8562 6.31855 10.7708 6.28497 10.6914C6.2514 10.6121 6.20218 10.5402 6.14025 10.4803L2.17859 6.3647L11.9042 6.55006C12.0744 6.5533 12.2389 6.4888 12.3616 6.37075C12.4842 6.25269 12.5549 6.09075 12.5582 5.92056C12.5614 5.75036 12.4969 5.58584 12.3789 5.4632C12.2608 5.34056 12.0989 5.26984 11.9287 5.2666L2.20305 5.08124L6.31865 1.11958C6.38282 1.06204 6.43474 0.992151 6.47132 0.914101C6.50789 0.836052 6.52837 0.751434 6.53153 0.665298C6.5347 0.579161 6.52048 0.49327 6.48972 0.412748C6.45897 0.332226 6.41231 0.258724 6.35254 0.196624C6.29276 0.134525 6.22109 0.0851024 6.1418 0.0513038C6.06251 0.0175053 5.97722 2.38249e-05 5.89103 -9.80887e-05C5.80483 -0.000220002 5.71949 0.0170201 5.64011 0.0505942C5.56072 0.0841683 5.48891 0.133388 5.42896 0.195318L0.197267 5.23132Z" fill="#E81C25"/>
                                                    </svg>
                                                </div>
                                                <div class="swiper-btn-next">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.3613 6.35169C12.4838 6.23365 12.5544 6.07183 12.5576 5.90178C12.5609 5.73172 12.4965 5.56732 12.3786 5.44471L7.34261 0.213018C7.28506 0.148849 7.21518 0.0969299 7.13713 0.0603551C7.05908 0.0237803 6.97446 0.00330142 6.88832 0.000139338C6.80219 -0.0030237 6.7163 0.0111942 6.63577 0.0419473C6.55525 0.0726994 6.48175 0.119357 6.41965 0.179133C6.35755 0.23891 6.30813 0.310582 6.27433 0.389873C6.24053 0.469165 6.22305 0.55445 6.22293 0.640645C6.22281 0.726839 6.24005 0.812176 6.27362 0.891563C6.3072 0.97095 6.35642 1.04276 6.41835 1.10271L10.38 5.21831L0.654381 5.03295C0.484184 5.02971 0.319669 5.09421 0.197027 5.21226C0.0743851 5.33032 0.00366426 5.49225 0.000420514 5.66245C-0.00282323 5.83265 0.0616758 5.99716 0.17973 6.11981C0.297785 6.24245 0.459723 6.31317 0.62992 6.31641L10.3555 6.50177L6.23994 10.4634C6.17577 10.521 6.12385 10.5909 6.08728 10.6689C6.0507 10.747 6.03022 10.8316 6.02706 10.9177C6.0239 11.0038 6.03812 11.0897 6.06887 11.1703C6.09962 11.2508 6.14628 11.3243 6.20606 11.3864C6.26583 11.4485 6.3375 11.4979 6.4168 11.5317C6.49609 11.5655 6.58137 11.583 6.66757 11.5831C6.75376 11.5832 6.8391 11.566 6.91849 11.5324C6.99787 11.4988 7.06968 11.4496 7.12964 11.3877L12.3613 6.35169Z" fill="#E81C25"/>
                                                    </svg>
                                                </div>
                                            </div>

                                            <div class="testimonial_arrows_line-seprator"></div>

                                            <div class="testimonials_pagination swiper-pagination"></div>
                                        </div>

                                        <!-- CTA Btn -->
                                        <div class="testimonial-btn mt-30 d-flex align-items-center">
                                            @if(isset($data['cta']) && $data['cta'] != '')
                                            <a class="primary_btn" href="{{$data['cta']['url'] ?? 'javascript:void(0);' }}">
                                                <span class="primary_btn_text"> {{$data['cta']['label'] ?? ''}}
                                                    <span class="primary_btn_icon">
                                                        <img class="img-fluid" src="{{asset('assets/images/arrow-icon-white.svg')}}" alt="arrow-icon-white">
                                                    </span>      
                                                </span>
                                            </a>
                                            @endif
                                            @if(isset($data['video']) && $data['video'] != '')

                                            <a class="download-btn" href="{{$data['video']['url'] ?? 'javascript:void(0);' }}">
                                                <span class="download_btn_inr"> 
                                                    <span class="download_btn_icon">
                                                    <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="17.1041" cy="17.1041" r="16.4706" fill="white" stroke="#EA1C25" stroke-width="1.26697"/>
                                                        <path d="M13.9363 20.8594L13.9363 12.082L21.5388 16.4707L13.9363 20.8594Z" stroke="#EA1C25" stroke-width="1.26697"/>
                                                    </svg>

                                                    </span>
                                                    <div class="testimonial_vid-btn">{{$data['video']['label'] ?? ''}}</div>
                                                </span>
                                            </a>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>

                              <div class="col-12 col-md-12 col-lg-6 col-xl-7">
                                <div class="testimonials_right">
                                    <div class="testimonials__wrapper">
                                        <!-- Top Slider -->
                                        @php
                                            $top_logos = $data['top_logo'] ?? [];
                                            if (count($top_logos) > 0 && count($top_logos) < 12) {
                                                $top_logos = array_merge(...array_fill(0, ceil(12 / count($top_logos)), $top_logos));
                                            }
                                        @endphp
                                        <div class="testimonials_logo_slider swiper testimonial_logo_top_slider">
                                            <div class="swiper-wrapper">
                                                <!-- Slide -->
                                               
                                                @foreach($top_logos as $icon)
                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="{{ get_media_url($icon['icon'] ?? '') }}" alt="{{ get_media_alt($icon['icon'] ?? '') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach

                                               

                                            </div>
                                        </div>

                                        <!-- Center Slider -->
                                        @php
                                            $center_logos = $data['center_logo'] ?? [];
                                            if (count($center_logos) > 0 && count($center_logos) < 12) {
                                                $center_logos = array_merge(...array_fill(0, ceil(12 / count($center_logos)), $center_logos));
                                            }
                                        @endphp
                                        <div class="testimonials_logo_slider swiper testimonial_logo_center_slider">
                                            <div class="swiper-wrapper">
                                                <!-- Slide -->
                                                  @foreach($center_logos as $icon)
                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="{{ get_media_url($icon['icon'] ?? '') }}" alt="{{ get_media_alt($icon['icon'] ?? '') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                               

                                            </div>
                                        </div>

                                        <!-- Bottom Slider -->
                                        @php
                                            $bottom_logos = $data['bottom_logo'] ?? [];
                                            if (count($bottom_logos) > 0 && count($bottom_logos) < 12) {
                                                $bottom_logos = array_merge(...array_fill(0, ceil(12 / count($bottom_logos)), $bottom_logos));
                                            }
                                        @endphp
                                        <div class="testimonials_logo_slider swiper testimonial_logo_bottom_slider">
                                            <div class="swiper-wrapper">
                                                <!-- Slide -->
                                                  @foreach($bottom_logos as $icon)
                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="{{ get_media_url($icon['icon'] ?? '') }}" alt="{{ get_media_alt($icon['icon'] ?? '') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                              

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>