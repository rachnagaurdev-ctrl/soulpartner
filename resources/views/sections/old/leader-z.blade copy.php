
@if(isset($data['template']))
    @php
        $staff = [];
        if (isset($data['staff_type'])) {
            $staff = App\Models\Staff::where('category', $data['staff_type'])->get();
        }
    @endphp

    <!-- leadership section start -->
    <section class="pb-60 leadership__section pos-relative">
        <div class="custom-container">
            <div class="leadership__slider swiper">
                @if($data['template'] == "slider")
                <div class="swiper-wrapper">
                                        @foreach($staff as $item)
                                        <div class="swiper-slide">
                                            <div class="item__wrap">
                                                <div class="row">
                                                    <div class="col-12 col-md-5 col-lg-4 col-xl-4">
                                                        <div class="img__Wrap">
                                                            <img class="img-fluid" src="{{get_media_url($item['image'])}}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-7 col-lg-8 col-xl-6">
                                                        <div class="content__area">
                                                            <div class="section__header">
                                                                <div class="leadership_post fs-26 fw-300 text-primary-black-80">
                                                                    {{$item['position']}}
                                                                </div>
                                                                <h4 class="leadership_name fs-76 fw-600 text-primary">{{$item['name']}}
                                                                    <span class="arrow-btn">
                                                                        <button class="open-popup">
                                                                            <svg class="arrow_icon" xmlns="http://www.w3.org/2000/svg"
                                                                                width="59" height="59" viewBox="0 0 59 59" fill="none">
                                                                                <rect width="58.8092" height="58.8092" rx="28.7208"
                                                                                    fill="#EA1C25" />
                                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                    d="M35.2294 21.7699C35.5221 21.7701 35.8028 21.8865 36.0098 22.0934C36.2168 22.3004 36.3331 22.5811 36.3333 22.8738L36.3333 35.3712C36.3386 35.5194 36.3139 35.6672 36.2608 35.8057C36.2076 35.9442 36.1272 36.0706 36.0241 36.1773C35.9211 36.284 35.7976 36.3689 35.6611 36.4269C35.5246 36.4849 35.3777 36.5147 35.2294 36.5147C35.0811 36.5147 34.9342 36.4849 34.7977 36.4269C34.6612 36.3689 34.5377 36.284 34.4347 36.1773C34.3316 36.0706 34.2512 35.9442 34.198 35.8057C34.1449 35.6672 34.1202 35.5194 34.1255 35.3712L34.1255 25.5399L22.2879 37.3775C22.0808 37.5846 21.7998 37.701 21.5069 37.701C21.2139 37.701 20.9329 37.5846 20.7258 37.3775C20.5186 37.1703 20.4022 36.8893 20.4022 36.5964C20.4022 36.3034 20.5186 36.0225 20.7258 35.8153L32.5633 23.9778L22.7321 23.9778C22.5838 23.983 22.436 23.9583 22.2975 23.9052C22.159 23.8521 22.0327 23.7716 21.9259 23.6686C21.8192 23.5656 21.7343 23.4421 21.6763 23.3055C21.6184 23.169 21.5885 23.0222 21.5885 22.8738C21.5885 22.7255 21.6184 22.5787 21.6763 22.4421C21.7343 22.3056 21.8192 22.1821 21.9259 22.0791C22.0327 21.9761 22.159 21.8956 22.2975 21.8425C22.436 21.7894 22.5838 21.7647 22.7321 21.7699L35.2294 21.7699Z"
                                                                                    fill="white" />

                                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                    d="M35.2294 21.7699C35.5221 21.7701 35.8028 21.8865 36.0098 22.0934C36.2168 22.3004 36.3331 22.5811 36.3333 22.8738L36.3333 35.3712C36.3386 35.5194 36.3139 35.6672 36.2608 35.8057C36.2076 35.9442 36.1272 36.0706 36.0241 36.1773C35.9211 36.284 35.7976 36.3689 35.6611 36.4269C35.5246 36.4849 35.3777 36.5147 35.2294 36.5147C35.0811 36.5147 34.9342 36.4849 34.7977 36.4269C34.6612 36.3689 34.5377 36.284 34.4347 36.1773C34.3316 36.0706 34.2512 35.9442 34.198 35.8057C34.1449 35.6672 34.1202 35.5194 34.1255 35.3712L34.1255 25.5399L22.2879 37.3775C22.0808 37.5846 21.7998 37.701 21.5069 37.701C21.2139 37.701 20.9329 37.5846 20.7258 37.3775C20.5186 37.1703 20.4022 36.8893 20.4022 36.5964C20.4022 36.3034 20.5186 36.0225 20.7258 35.8153L32.5633 23.9778L22.7321 23.9778C22.5838 23.983 22.436 23.9583 22.2975 23.9052C22.159 23.8521 22.0327 23.7716 21.9259 23.6686C21.8192 23.5656 21.7343 23.4421 21.6763 23.3055C21.6184 23.169 21.5885 23.0222 21.5885 22.8738C21.5885 22.7255 21.6184 22.5787 21.6763 22.4421C21.7343 22.3056 21.8192 22.1821 21.9259 22.0791C22.0327 21.9761 22.159 21.8956 22.2975 21.8425C22.436 21.7894 22.5838 21.7647 22.7321 21.7699L35.2294 21.7699Z"
                                                                                    fill="white" />
                                                                            </svg>
                                                                        </button>
                                                                    </span>
                                                                </h4>


                                                                <div class="cnt__wrap fs-18 fw-300 mt-20 text-primary-black-80">
                                                                    <p>
                                                                        {{$item['description']}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-5 col-lg-4 col-xl-4"></div>
                            <div class="col-12 col-md-7 col-lg-8 col-xl-6">
                                <div class="leadership-pagination"></div>
                            </div>
                        </div>
                        </div>
                        <div class="pos-absolute shape">
                            <img class="img-fluid" src="assets/images/leadership/leadership-shape.webp" alt="shape">
                        </div>
                    </section>
                    <!-- leadership section end -->
                    <div class="separator_block">
                        <div class="custom-container">
                            <div class="line--separator"></div>
                        </div>
                    </div>


                    <!-- Board directors section start -->
                    <section class="board_directors__section pt-50 pos-relative">
                        <div class="custom-container">
                @elseif($data['template'] == "card-view" && $data['staff_type'] == 'Boards of Director')
                <div class="row">
                    <div class="col-12">
                        <div class="section__header custom-heading">
                                        
                                        <h4 class="heading fs-76 fw-600 text-primary">{{ $data['staff_type']}}</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="board_directors_wrapper section_divider_line pb-50">
                                <div class="row">
                                    @foreach($staff as $items)
                                    <div class="col-12 col-xl-3 col-lg-4 col-md-4">
                                        <div class="item__wrap">
                                            <div class="single_item">
                                                <div class="img-block pos-relative">
                                                    <div class="img__wrap">
                                                        <img class="img-fluid" src="{{get_media_url($items['image'])}}" alt="">
                                                    </div>
                                                    <a href="javascript:void(0);" class="arrow-btn">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                                                            fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M10.8414 0.000685853C11.0555 0.000818957 11.2607 0.0859022 11.412 0.237247C11.5634 0.388591 11.6485 0.593821 11.6486 0.807855L11.6486 9.94562C11.6524 10.054 11.6344 10.1621 11.5955 10.2633C11.5567 10.3646 11.4979 10.457 11.4225 10.5351C11.3472 10.6131 11.2569 10.6752 11.1571 10.7175C11.0573 10.7599 10.9499 10.7818 10.8414 10.7818C10.733 10.7818 10.6256 10.7599 10.5258 10.7175C10.426 10.6752 10.3357 10.6131 10.2603 10.5351C10.185 10.457 10.1262 10.3646 10.0873 10.2633C10.0485 10.1621 10.0304 10.054 10.0343 9.94562L10.0343 2.75724L1.37893 11.4126C1.22746 11.5641 1.02202 11.6491 0.807816 11.6491C0.593609 11.6491 0.388174 11.5641 0.236706 11.4126C0.085238 11.2611 0.000145596 11.0557 0.000145295 10.8415C0.000145668 10.6273 0.0852382 10.4218 0.236707 10.2704L8.89205 1.61502L1.70368 1.61502C1.59528 1.61885 1.48723 1.6008 1.38596 1.56196C1.28469 1.52312 1.19228 1.46428 1.11424 1.38895C1.0362 1.31362 0.974139 1.22334 0.93175 1.12351C0.88936 1.02367 0.867514 0.916316 0.867514 0.807853C0.867514 0.69939 0.88936 0.592038 0.931749 0.492201C0.974139 0.392364 1.0362 0.302087 1.11424 0.226757C1.19228 0.151427 1.28469 0.0925854 1.38596 0.0537445C1.48723 0.0149033 1.59528 -0.0031422 1.70368 0.000683838L10.8414 0.000685853Z"
                                                                fill="white"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                                <div class="content__area">
                                                    <div class="leadership_post fs-18 fw-300 text-dark-gray">{{$items['position']}}</div>
                                                    <h4 class="leadership_name fs-32 fw-600 text-primary">{{$items['name']}}</h4>
                                                    <div class="cnt__wrap fs-16 fw-300 text-gray">
                                                        <p>
                                                            {{$items['description']}}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="hover_bg_sm_circle"></div>
                                                <div class="hover_bg_lg_circle"></div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                            </div>
                </section>
                <!-- Board directors section end -->

                <!-- Key Management Team section start -->
                <section class="board_directors__section management_team__section pt-50 pb-75 pos-relative">
                    <!-- <div class="custom-container"> -->
            @elseif($data['template'] == "card-view" && $data['staff_type'] == 'Key Management Team')
            <div class="row">
                <div class="col-12">
                    <div class="custom-heading">
                        <h4 class="heading fs-76 fw-600 text-primary">{{$data['staff_type']}}</h4>
                    </div>
                </div>
            </div>
            
            <div class="board_directors_wrapper">
                <div class="row">
                            @foreach($staff as $item_s)
                            <div class="col-12 col-xl-3 col-md-4">
                                <div class="item__wrap">
                                    <div class="single_item">
                                        <div class="img-block pos-relative">
                                            <div class="img__wrap">
                                                <img class="img-fluid" src="{{get_media_url($item_s['image'])}}" alt="">
                                            </div>
                                            <a href="javascript:void(0);" class="arrow-btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                                                    fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10.8414 0.000685853C11.0555 0.000818957 11.2607 0.0859022 11.412 0.237247C11.5634 0.388591 11.6485 0.593821 11.6486 0.807855L11.6486 9.94562C11.6524 10.054 11.6344 10.1621 11.5955 10.2633C11.5567 10.3646 11.4979 10.457 11.4225 10.5351C11.3472 10.6131 11.2569 10.6752 11.1571 10.7175C11.0573 10.7599 10.9499 10.7818 10.8414 10.7818C10.733 10.7818 10.6256 10.7599 10.5258 10.7175C10.426 10.6752 10.3357 10.6131 10.2603 10.5351C10.185 10.457 10.1262 10.3646 10.0873 10.2633C10.0485 10.1621 10.0304 10.054 10.0343 9.94562L10.0343 2.75724L1.37893 11.4126C1.22746 11.5641 1.02202 11.6491 0.807816 11.6491C0.593609 11.6491 0.388174 11.5641 0.236706 11.4126C0.085238 11.2611 0.000145596 11.0557 0.000145295 10.8415C0.000145668 10.6273 0.0852382 10.4218 0.236707 10.2704L8.89205 1.61502L1.70368 1.61502C1.59528 1.61885 1.48723 1.6008 1.38596 1.56196C1.28469 1.52312 1.19228 1.46428 1.11424 1.38895C1.0362 1.31362 0.974139 1.22334 0.93175 1.12351C0.88936 1.02367 0.867514 0.916316 0.867514 0.807853C0.867514 0.69939 0.88936 0.592038 0.931749 0.492201C0.974139 0.392364 1.0362 0.302087 1.11424 0.226757C1.19228 0.151427 1.28469 0.0925854 1.38596 0.0537445C1.48723 0.0149033 1.59528 -0.0031422 1.70368 0.000683838L10.8414 0.000685853Z"
                                                        fill="white" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="content__area">
                                            <div class="leadership_post fs-18 fw-300 text-dark-gray"> {{$item_s['position']}}
                                            </div>
                                            <h4 class="leadership_name fs-32 fw-600 text-primary">{{$item_s['name']}}</h4>
                                            <div class="cnt__wrap fs-16 fw-300 text-gray">
                                                <p>
                                                    {{$item_s['description']}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="hover_bg_sm_circle"></div>
                                        <div class="hover_bg_lg_circle"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="load_more_wrap fs-14 fw-400 mt-40 text-center">
                                <a href="javascript:void(0);" class="load_more_btn">
                                    LOAD MORE
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="8" viewBox="0 0 16 8"
                                            fill="none">
                                            <path
                                                d="M15.5876 4.38248C15.7996 4.17044 15.7996 3.82664 15.5876 3.61459L12.132 0.159041C11.92 -0.0530081 11.5762 -0.0530081 11.3641 0.159041C11.1521 0.37109 11.1521 0.71489 11.3641 0.92694L14.4357 3.99854L11.3641 7.07013C11.1521 7.28218 11.1521 7.62598 11.3641 7.83803C11.5762 8.05008 11.92 8.05008 12.132 7.83803L15.5876 4.38248ZM0 3.99854V4.54152H15.2036V3.99854V3.45555H0V3.99854Z"
                                                fill="#FF2931" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                        
                        @endif
                    <!-- </div> -->
                </section>
@endif
<!-- Key Management Team section end -->