  
  @php
    $categories = \App\Models\ProductCategory::with(['products' => function($query) {
        $query->where('is_active', true);
    }])->where('is_active', true)->get();
    
   
@endphp

  <section class="technology__section pos-relative smart__system pt-35 pb-50">
        <div class="bg-gradient"></div>
                <div class="custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section__header custom-heading smart_system_top_heading mb-60">
                                <div class="sub_heading fs-24 fw-300 text-uppercase text-primary-black-80">{!! $data['subtitle'] ?? '' !!}</div>
                                <h4 class="heading fs-76 fw-600 text-primary">{!! $data['title'] ?? '' !!}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="custom-container">
                    <div class="row snart__system_tab">
                        <div class="col-12 col-lg-12 col-xl-12">
                            <div class="category_wrapper">
                                <div class="category_slider swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach($categories as $index => $category)

                                        <!-- add on class in swiper slide on first item -->
                                        <div class="swiper-slide {{ $index === 0 ? 'on' : '' }}">
                                            <a href="javascript:void(0);" class="category-button {{ $index === 0 ? 'active' : '' }}" data-id="cat-{{ $category->id }}">
                                                <div class="cat-heading fs-24 fw-400">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 7 7" fill="none">
                                                            <circle cx="3.5" cy="3.5" r="3.5" fill="currentColor"></circle>
                                                        </svg>
                                                    </span>{{ $category->name }}
                                                </div>
                                            </a>
                                        </div>
                                        @endforeach
                                        
                                    </div>
        
        
                                </div>
        
                                <div class="swiper-custom">
                                    <div class="slider-button slider-prev">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="9" height="16" viewBox="0 0 9 16" fill="none">
                                                <path d="M8.6705 1.92049C9.10983 1.48116 9.10983 0.768845 8.6705 0.329505C8.23116 -0.109835 7.51884 -0.109835 7.0795 0.329505L0.329504 7.0795C-0.109836 7.51884 -0.109836 8.23115 0.329504 8.67049L7.0795 15.4205C7.51884 15.8598 8.23116 15.8598 8.67049 15.4205C9.10983 14.9812 9.10983 14.2688 8.67049 13.8295L2.71599 7.875L8.6705 1.92049Z" fill="#282828"/>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="slider-button slider-next">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="9" height="16" viewBox="0 0 9 16" fill="none">
                                                <path d="M0.329505 1.92049C-0.109835 1.48116 -0.109835 0.768845 0.329505 0.329505C0.768845 -0.109835 1.48116 -0.109835 1.9205 0.329505L8.6705 7.0795C9.10984 7.51884 9.10984 8.23115 8.6705 8.67049L1.9205 15.4205C1.48116 15.8598 0.768845 15.8598 0.329505 15.4205C-0.109835 14.9812 -0.109835 14.2688 0.329505 13.8295L6.28401 7.875L0.329505 1.92049Z" fill="#282828"/>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="row ">
                        <div class="col-12">
                            <div class="smarttab_slider swiper">
                                <div class="swiper-wrapper">
                                    @foreach($categories as $index => $category)
                                    <div class="swiper-slide">
                                        
                                            <div class="data-text {{ $index === 0 ? 'active' : '' }}" id="cat-{{ $category->id }}">
                                                <div class="smart__system_inner_section pt-50">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-6 col-xl-6">
                                                            <div class="smart_system_left">
                                                                <div class="smart_system_img_wrap">
                                                                    <img class="img-fluid" src="assets/images/home-page/smart-system/product-lg.webp" alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-6 col-xl-6">
                                                            <div class="smart_system_right">
                                                                <div class="smart_system_heading_right">
                                                                    <h4 class="heading fs-76 fw-600 text-primary">{{$category->name}} </h4>
                                                                        <a href="javascript:void(0);" class="arrow-btn">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                                height="12" viewBox="0 0 12 12" fill="none">
                                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                    d="M10.8414 0.000685853C11.0555 0.000818957 11.2607 0.0859022 11.412 0.237247C11.5634 0.388591 11.6485 0.593821 11.6486 0.807855L11.6486 9.94562C11.6524 10.054 11.6344 10.1621 11.5955 10.2633C11.5567 10.3646 11.4979 10.457 11.4225 10.5351C11.3472 10.6131 11.2569 10.6752 11.1571 10.7175C11.0573 10.7599 10.9499 10.7818 10.8414 10.7818C10.733 10.7818 10.6256 10.7599 10.5258 10.7175C10.426 10.6752 10.3357 10.6131 10.2603 10.5351C10.185 10.457 10.1262 10.3646 10.0873 10.2633C10.0485 10.1621 10.0304 10.054 10.0343 9.94562L10.0343 2.75724L1.37893 11.4126C1.22746 11.5641 1.02202 11.6491 0.807816 11.6491C0.593609 11.6491 0.388174 11.5641 0.236706 11.4126C0.085238 11.2611 0.000145596 11.0557 0.000145295 10.8415C0.000145668 10.6273 0.0852382 10.4218 0.236707 10.2704L8.89205 1.61502L1.70368 1.61502C1.59528 1.61885 1.48723 1.6008 1.38596 1.56196C1.28469 1.52312 1.19228 1.46428 1.11424 1.38895C1.0362 1.31362 0.974139 1.22334 0.93175 1.12351C0.88936 1.02367 0.867514 0.916316 0.867514 0.807853C0.867514 0.69939 0.88936 0.592038 0.931749 0.492201C0.974139 0.392364 1.0362 0.302087 1.11424 0.226757C1.19228 0.151427 1.28469 0.0925854 1.38596 0.0537445C1.48723 0.0149033 1.59528 -0.0031422 1.70368 0.000683838L10.8414 0.000685853Z"
                                                                                    fill="white" />
                                                                            </svg>
                                                                        </a>
                                                                </div>
                                                                <div class="smart_system_right_content fw-300 pt-10 text-primary-black-80">
                                                                    <p>{!! $category->description !!}</p>
                                                                </div>
                                                                <div class="right_product_heading mt-60">
                                                                    <div class="rp-heading fs-18 fw-500 text-primary">Products</div>
                                                                </div>


                                                                <div class="product_slider swiper mt-20">
                                                                    <div class="swiper-wrapper">
                                                                            @foreach($category->products as $product)
                                                                        <div class="swiper-slide">
                                                                            <div class="smart_system_slider_right_inner">
                                                                                <div class="smart_system_slider_img">
                                                                                    <img src="{{ get_media_url($product->image) }}" alt="{{ $product->name }}">
                                                                                </div>
                                                                                <div class="prod-heading fs-20 fw-300 text-primary-black-80">{{ $product->name }} </div>

                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                    <div class="product_pagination swiper-pagination"></div>

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
                    </div>
                </div>
            </section>