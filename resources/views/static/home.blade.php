@extends('static.layout')

@section('content')

            <!-- Home Banner Start -->
            <section class="home__banner_section pos-relative">
                <div class="home__banner_screen">
                    <div class="home__banner_slider slider">
                        <!-- Slides -->
                        <div>
                            <div class="home__banner_inner">
                                <div class="overlay-vertical"></div>
                                <div class="overlay-horizontal"></div>
                                <div class="home__banner_wrapper">
                                    <div class="home__banner_video">
                                        <div class="video__area">
                                            <div class="video__container">
                                                <video id="video-about" autoplay muted loop playsinline width="100%" height="auto">
                                                    <source src="assets/images/home-page/banner/banner-vid.mp4" type="video/mp4">
                                                </video>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="home__banner_img">
                                        <div class="img_wrap">
                                            <img class="img-fluid" src="assets/images/home-page/banner/home-banner.jpg" alt="home banner">
                                        </div>
                                    </div> -->
                                    
                                </div>
                                <div class="home__banner_content">
                                    <div class="custom-container">
                                        <div class="custom-heading">
                                            <h1 class="heading fs-76 fw-600 text-white"> 
                                                Technology First. <br />
                                                Future Ready. <br />
                                                <span> World Proven. </span>
                                            </h1>
                                            <div class="home_banner-btn mt-15">
                                                <a class="primary_btn" href="javascript:void(0);">
                                                    <span class="primary_btn_text"> Explore More </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="home__banner_inner">
                                <div class="overlay-vertical"></div>
                                <div class="overlay-horizontal"></div>
                                <div class="home__banner_wrapper">
                                    <!-- <div class="home__banner_video">
                                        <div class="video__area">
                                            <div class="video__container">
                                                <video id="video-about" autoplay muted loop playsinline width="100%" height="auto">
                                                    <source src="assets/images/home-page/banner/banner-vid.mp4" type="video/mp4">
                                                </video>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="home__banner_img">
                                        <div class="img_wrap">
                                            <img class="img-fluid" src="assets/images/home-page/banner/home-banner.jpg" alt="home banner">
                                        </div>
                                    </div>
                                </div>
                                <div class="home__banner_content">
                                    <div class="custom-container">
                                        <div class="custom-heading">
                                            <h1 class="heading fs-76 fw-600 text-white"> 
                                                Technology First. <br />
                                                Future Ready. <br />
                                                <span> World Proven. </span>
                                            </h1>
                                            <div class="home_banner-btn mt-15">
                                                <a class="primary_btn" href="javascript:void(0);">
                                                    <span class="primary_btn_text"> Explore More </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="home__banner_inner">
                                <div class="overlay-vertical"></div>
                                <div class="overlay-horizontal"></div>
                                <div class="home__banner_wrapper">
                                    <!-- <div class="home__banner_video">
                                        <div class="video__area">
                                            <div class="video__container">
                                                <video id="video-about" autoplay muted loop playsinline width="100%" height="auto">
                                                    <source src="assets/images/home-page/banner/banner-vid.mp4" type="video/mp4">
                                                </video>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="home__banner_img">
                                        <div class="img_wrap">
                                            <img class="img-fluid" src="assets/images/home-page/banner/home-banner.jpg" alt="home banner">
                                        </div>
                                    </div>
                                </div>
                                <div class="home__banner_content">
                                    <div class="custom-container">
                                        <div class="custom-heading">
                                            <h1 class="heading fs-76 fw-600 text-white"> 
                                                Technology First. <br />
                                                Future Ready. <br />
                                                <span> World Proven. </span>
                                            </h1>
                                            <div class="home_banner-btn mt-15">
                                                <a class="primary_btn" href="javascript:void(0);">
                                                    <span class="primary_btn_text"> Explore More </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="banner_slider_nav">
                        

                        <div class="thumb__home_banner">

                            <div class="slider-nav-box d-flex">
                                <div class="dots-container">
                                    <ul class="custom-dots"></ul>
                                </div>
                                <div class="progress-box">
                                    <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                        <span class="slider__label sr-only">
                                    </div>
                                </div>
                                <div class="slide-count"></div>
                            </div>

                            <div class="thumb__home_banner_slider slider">
                                <!-- Slide -->
                                <div>
                                    <div class="thumb__home_img pos-relative">
                                        <img class="img-fluid" src="assets/images/home-page/banner/banner-thumb-img.webp" alt="">
                                        <!-- <span class="thumb__play_btn">
                                            <a href="#">
                                                <img class="img-fluid" src="assets/images/thumb-play-btn.svg" alt="">
                                            </a>
                                        </span> -->
                                    </div>
                                </div>

                                <div>
                                    <div class="thumb__home_img pos-relative">
                                        <img class="img-fluid" src="assets/images/home-page/banner/banner-thumb-img.webp" alt="">
                                        <!-- <span class="thumb__play_btn">
                                            <a href="#">
                                                <img class="img-fluid" src="assets/images/thumb-play-btn.svg" alt="">
                                            </a>
                                        </span> -->
                                    </div>
                                </div>

                                <div>
                                    <div class="thumb__home_img pos-relative">
                                        <img class="img-fluid" src="assets/images/home-page/banner/banner-thumb-img.webp" alt="">
                                        <span class="thumb__play_btn">
                                            <a href="#">
                                                <img class="img-fluid" src="assets/images/thumb-play-btn.svg" alt="">
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                    </div>


                    <div class="fixed_nav">
                        <div class="banner_social_icon d-flex">
                            <a class="nav_item" href="javascript:void(0);">
                                <div class="img__wrap">
                                    <!-- <img class="img-fluid" src="assets/images/home-page/banner/banner-whatsapp-icon.webp" alt=""> -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
                                        <path d="M22.0677 17.6291L18.2668 15.7286C18.192 15.6914 18.1087 15.6745 18.0253 15.6797C17.9419 15.6849 17.8613 15.712 17.7917 15.7583L15.8152 17.0768C14.7288 16.5557 13.8526 15.6796 13.3316 14.5931L14.65 12.6166C14.6963 12.5471 14.7234 12.4665 14.7287 12.3831C14.7339 12.2997 14.717 12.2163 14.6797 12.1415L12.7793 8.34063C12.7398 8.26129 12.679 8.19455 12.6037 8.14796C12.5283 8.10136 12.4414 8.07676 12.3528 8.07694C11.2188 8.07694 10.1312 8.52745 9.32924 9.32935C8.52733 10.1313 8.07683 11.2189 8.07683 12.353C8.07966 14.9983 9.13175 17.5344 11.0023 19.4049C12.8728 21.2754 15.4089 22.3275 18.0542 22.3303C19.1883 22.3303 20.2759 21.8798 21.0778 21.0779C21.8797 20.276 22.3302 19.1884 22.3302 18.0543C22.3303 17.966 22.3058 17.8795 22.2594 17.8044C22.213 17.7293 22.1467 17.6686 22.0677 17.6291ZM18.0542 21.3801C15.6608 21.3776 13.3662 20.4257 11.6738 18.7333C9.98145 17.041 9.02957 14.7463 9.02705 12.353C9.02691 11.5206 9.33891 10.7184 9.90144 10.1048C10.464 9.49128 11.2361 9.11098 12.0654 9.03904L13.7045 12.3185L12.398 14.2831C12.3544 14.3479 12.3275 14.4225 12.3197 14.5002C12.3118 14.5779 12.3232 14.6563 12.3528 14.7285C12.9841 16.2292 14.1779 17.4231 15.6786 18.0543C15.7509 18.0844 15.8295 18.0961 15.9075 18.0884C15.9854 18.0807 16.0602 18.0539 16.1252 18.0104L18.0898 16.7038L21.3693 18.3429C21.2971 19.1722 20.9165 19.9442 20.3027 20.5066C19.6889 21.0689 18.8866 21.3806 18.0542 21.3801ZM15.2035 3.32581C13.1357 3.32542 11.1036 3.86488 9.30822 4.89082C7.51284 5.91675 6.01641 7.39363 4.96694 9.17534C3.91746 10.9571 3.35131 12.9819 3.32449 15.0495C3.29766 17.1172 3.81109 19.156 4.81399 20.9644L3.40052 25.2036C3.31677 25.4547 3.30462 25.7242 3.36542 25.9819C3.42623 26.2395 3.55759 26.4752 3.74479 26.6624C3.93199 26.8496 4.16762 26.9809 4.42528 27.0417C4.68294 27.1025 4.95244 27.0904 5.20358 27.0066L9.44278 25.5932C11.0285 26.4718 12.7944 26.9758 14.605 27.0666C16.4156 27.1573 18.223 26.8324 19.8887 26.1167C21.5543 25.401 23.0341 24.3135 24.2145 22.9376C25.3949 21.5616 26.2447 19.9337 26.6988 18.1786C27.1528 16.4235 27.1991 14.5877 26.8341 12.8119C26.469 11.0361 25.7023 9.36748 24.5927 7.93379C23.4831 6.50011 22.0601 5.33945 20.4326 4.54072C18.8051 3.742 17.0164 3.32641 15.2035 3.32581ZM15.2035 26.1312C13.2822 26.1318 11.3948 25.6258 9.73141 24.6643C9.65912 24.6227 9.57726 24.6006 9.49385 24.6002C9.44255 24.6003 9.39161 24.6087 9.343 24.6251L4.90307 26.1051C4.81936 26.133 4.72952 26.1371 4.64364 26.1168C4.55775 26.0965 4.47921 26.0528 4.41681 25.9904C4.35441 25.928 4.31062 25.8494 4.29035 25.7635C4.27008 25.6776 4.27413 25.5878 4.30205 25.5041L5.78203 21.0642C5.80338 21.0003 5.81092 20.9327 5.80416 20.8657C5.79741 20.7988 5.7765 20.734 5.74283 20.6758C4.53807 18.5933 4.05423 16.1714 4.36637 13.7859C4.67851 11.4003 5.76919 9.18449 7.4692 7.48209C9.16921 5.77969 11.3835 4.68589 13.7686 4.3704C16.1537 4.0549 18.5762 4.53534 20.6604 5.73718C22.7446 6.93901 24.3739 8.79506 25.2956 11.0174C26.2172 13.2397 26.3797 15.7041 25.7579 18.0282C25.136 20.3523 23.7645 22.4062 21.8562 23.8713C19.9479 25.3364 17.6094 26.1308 15.2035 26.1312Z" fill="white"/>
                                    </svg>
                                </div>
                            </a>
                            <a class="nav_item" href="javascript:void(0);">
                                <div class="img__wrap">
                                    <!-- <img class="img-fluid" src="assets/images/home-page/banner/banner-tel-icon.webp" alt=""> -->
                                     <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                                        <path d="M15.7106 4.98445C15.7388 4.87587 15.8089 4.7829 15.9055 4.72585C16.002 4.66881 16.1173 4.65235 16.226 4.68008C17.7278 5.07124 19.0981 5.85606 20.1954 6.95355C21.2927 8.05104 22.0773 9.42145 22.4682 10.9234C22.497 11.0319 22.4816 11.1475 22.4254 11.2447C22.3691 11.3419 22.2766 11.4129 22.1681 11.442C22.1336 11.4517 22.0979 11.4567 22.062 11.4568C21.9682 11.4565 21.8772 11.4251 21.8031 11.3675C21.729 11.31 21.6761 11.2295 21.6527 11.1386C21.2988 9.7824 20.5898 8.54499 19.5987 7.55387C18.6075 6.56275 17.3701 5.85374 16.0139 5.49986C15.9055 5.47142 15.8128 5.40126 15.756 5.30469C15.6991 5.20813 15.6828 5.093 15.7106 4.98445ZM15.1655 8.89352C16.7563 9.32091 17.8284 10.3931 18.2558 11.9839C18.2793 12.0747 18.3322 12.1552 18.4063 12.2128C18.4803 12.2703 18.5714 12.3017 18.6652 12.302C18.7011 12.302 18.7367 12.297 18.7712 12.2872C18.8797 12.2581 18.9723 12.1872 19.0285 12.0899C19.0848 11.9927 19.1002 11.8772 19.0714 11.7686C18.5623 9.85966 17.2844 8.58703 15.3776 8.07374C15.2716 8.05325 15.1618 8.07393 15.0705 8.13157C14.9793 8.18921 14.9134 8.27948 14.8864 8.38398C14.8593 8.48848 14.8731 8.59936 14.925 8.69403C14.9769 8.7887 15.0629 8.86005 15.1655 8.89352ZM23.3251 19.363C23.1491 20.6981 22.4929 21.9235 21.4791 22.81C20.4654 23.6964 19.1635 24.1834 17.8168 24.1799C9.62956 24.1799 2.96949 17.5198 2.96949 9.33258C2.9667 7.98644 3.45403 6.68532 4.34046 5.67223C5.22689 4.65915 6.45179 4.00338 7.78638 3.82742C8.05979 3.79418 8.33661 3.85054 8.57526 3.98803C8.81391 4.12552 9.00152 4.33673 9.10991 4.58993L11.3476 9.58923C11.4312 9.78308 11.4653 9.99469 11.4468 10.205C11.4283 10.4153 11.3578 10.6177 11.2416 10.794C11.232 10.8078 11.2225 10.8216 11.2119 10.8343L8.96355 13.5078C8.92827 13.5664 8.90807 13.6328 8.90473 13.7011C8.9014 13.7694 8.91505 13.8375 8.94447 13.8992C9.77591 15.6013 11.5586 17.3703 13.2809 18.2017C13.3431 18.2306 13.4115 18.2436 13.4799 18.2397C13.5484 18.2358 13.6148 18.2151 13.6733 18.1794L16.3108 15.9396L16.3511 15.9089C16.5276 15.7923 16.7304 15.7215 16.9411 15.703C17.1519 15.6845 17.3639 15.7188 17.558 15.8028L22.5658 18.0469C22.8165 18.1559 23.0254 18.3428 23.1616 18.5799C23.2977 18.8169 23.354 19.0915 23.3219 19.363H23.3251ZM22.2275 18.82L17.2176 16.5759C17.1567 16.5504 17.0907 16.5397 17.0248 16.5446C16.959 16.5496 16.8953 16.5702 16.839 16.6046L14.211 18.8444L14.1718 18.8741C13.9891 18.9961 13.7779 19.0687 13.5587 19.0849C13.3396 19.101 13.1201 19.0602 12.9214 18.9663C11.0125 18.0448 9.11309 16.1581 8.1915 14.2714C8.09671 14.0743 8.05434 13.8561 8.06845 13.6378C8.08257 13.4195 8.15271 13.2086 8.2721 13.0253C8.28164 13.0105 8.29225 12.9977 8.30285 12.984L10.5501 10.3114C10.5838 10.2542 10.6035 10.1898 10.6078 10.1235C10.612 10.0571 10.6006 9.99075 10.5745 9.92965L8.33255 4.93036C8.30095 4.85286 8.24714 4.78643 8.17789 4.73945C8.10863 4.69246 8.02702 4.667 7.94333 4.66629C7.92638 4.66527 7.90938 4.66527 7.89243 4.66629C6.76219 4.81605 5.72518 5.37233 4.97528 6.23114C4.22539 7.08994 3.81396 8.19246 3.81791 9.33258C3.81791 17.051 10.0983 23.3314 17.8168 23.3314C18.9569 23.3354 20.0594 22.924 20.9182 22.1741C21.777 21.4242 22.3333 20.3872 22.4831 19.2569C22.4928 19.1659 22.4729 19.0742 22.4263 18.9955C22.3797 18.9167 22.3088 18.8552 22.2243 18.82H22.2275Z" fill="white"/>
                                    </svg>
                                </div>
                            </a>
                            <a class="nav_item" href="javascript:void(0);">
                                <div class="img__wrap">
                                    <!-- <img class="img-fluid" src="assets/images/home-page/banner/banner-msg-icon.webp" alt=""> -->
                                     <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
                                        <path d="M9.23065 15.7466H16.8325M9.23065 10.3167H13.0316M15.3881 22.686C19.9318 22.3852 23.5503 18.7146 23.8478 14.1068C23.9054 13.2054 23.9054 12.2715 23.8478 11.3701C23.5503 6.76344 19.9318 3.09503 15.3881 2.79204C13.8188 2.68862 12.2443 2.68862 10.675 2.79204C6.13128 3.09394 2.51282 6.76344 2.21526 11.3712C2.15774 12.2825 2.15774 13.1966 2.21526 14.1079C2.32386 15.7857 3.06558 17.3397 3.93979 18.6516C4.44694 19.5692 4.11246 20.7149 3.58359 21.7173C3.2035 22.4395 3.01237 22.8 3.16549 23.0606C3.31753 23.3213 3.65961 23.33 4.34269 23.3462C5.69472 23.3788 6.60585 22.9966 7.32911 22.4633C7.73852 22.1604 7.94377 22.0094 8.08495 21.992C8.22612 21.9747 8.50522 22.0898 9.06124 22.3178C9.56078 22.5242 10.1418 22.6512 10.6739 22.6871C12.2214 22.7891 13.8384 22.7891 15.3892 22.6871" stroke="white" stroke-width="1.08597" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Home Banner End -->

            <!-- Research Development Section Start -->
            <section class="research__dev_sec pos-relative pt-50 pb-40">
                <div class="section-gradient"></div>
                <div class="bg-gradient"></div>
                <div class="bg-gradient-circle"></div>
                <div class="bg-img">
                    <img class="img-fluid" src="assets/images/home-page/research-development/bg-img.webp" alt="">
                </div>
                <div class="custom-container">
                    <div class="research_dev_inner">
                        <div class="row align-items-center">
                            <div class="col-12 col-xl-5 col-md-6">
                                <div class="research_dev_heading">
                                    <div class="custom-heading">
                                        <div class="sub_heading fs-24 fw-300 mb-10 text-dark-gray"> Research & Development </div>
                                        <h2 class="heading fs-76 fw-600 text-primary"> 
                                            & Innovation Strength
                                        </h2>
                                        <div class="cnt__wrap fs-16 fw-400 mt-20 text-gray">
                                            <p>
                                                In our world class Research and Development Center, we have a multi-disciplinary 
                                                team of technocrats, engineers, material specialists, and product designers working 
                                                on latest software to offer best solution to our customers. Our R&D center has 
                                                enhanced our customers' confidence in supporting them by becoming their 
                                                development partner from the very beginning
                                            </p>
                                        </div>
                                        <div class="btn-group mt-20">
                                            <a class="primary_btn" href="javascript:void(0);">
                                                <span class="primary_btn_text"> Explore More
                                                    <span class="primary_btn_icon">
                                                        <img class="img-fluid" src="assets/images/arrow-icon-white.svg" alt="">
                                                    </span>      
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-xl-7 col-md-6">
                                <div class="research_dev_wrapper">
                                    <div class="research_dev_slider swiper">
                                        <div class="swiper-wrapper">
                                            <!-- Slide -->
                                            <div class="swiper-slide">
                                                <div class="single_item">
                                                    <div class="img__wrap">
                                                        <img class="img-fluid" src="assets/images/home-page/research-development/research-development-img.webp" alt="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="swiper-slide">
                                                <div class="single_item">
                                                    <div class="img__wrap">
                                                        <img class="img-fluid" src="assets/images/home-page/research-development/research-development-img.webp" alt="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="swiper-slide">
                                                <div class="single_item">
                                                    <div class="img__wrap">
                                                        <img class="img-fluid" src="assets/images/home-page/research-development/research-development-img.webp" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="research__dev_custom_pagination">
                                        <div class="research_pagination swiper-pagination"></div>
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
                                    <div class="swiper-slide">
                                        <div class="counter_col">
                                            <div class="img__wrap">
                                                <img class="img-fluid" src="assets/images/home-page/research-development/manpower.webp" alt="">
                                            </div>
                                            <div class="content__area">
                                                <div class="counetr_num fs-42 fw-300 text-light-black"> 10K </div>
                                                <div class="cnt__wrap fs-16 fw-500 text-light-black">
                                                    <p> Manpower </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="counter_col">
                                            <div class="img__wrap">
                                                <img class="img-fluid" src="assets/images/home-page/research-development/patents.webp" alt="">
                                            </div>
                                            <div class="content__area">
                                                <div class="counetr_num fs-42 fw-300 text-light-black"> 125 </div>
                                                <div class="cnt__wrap fs-16 fw-500 text-light-black">
                                                    <p> Patents </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="counter_col">
                                            <div class="img__wrap">
                                                <img class="img-fluid" src="assets/images/home-page/research-development/number-centre.webp" alt="">
                                            </div>
                                            <div class="content__area">
                                                <div class="counetr_num fs-42 fw-300 text-light-black"> 07 </div>
                                                <div class="cnt__wrap fs-16 fw-500 text-light-black">
                                                    <p> Number of Centres </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="counter_col">
                                            <div class="img__wrap">
                                                <img class="img-fluid" src="assets/images/home-page/research-development/number-prototypes.webp" alt="">
                                            </div>
                                            <div class="content__area">
                                                <div class="counetr_num fs-42 fw-300 text-light-black"> 253 </div>
                                                <div class="cnt__wrap fs-16 fw-500 text-light-black">
                                                    <p> Number of prototypes </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="counter_col">
                                            <div class="img__wrap">
                                                <img class="img-fluid" src="assets/images/home-page/research-development/production-ratio.webp" alt="">
                                            </div>
                                            <div class="content__area">
                                                <div class="counetr_num fs-42 fw-300 text-light-black"> 80% </div>
                                                <div class="cnt__wrap fs-16 fw-500 text-light-black">
                                                    <p> Prototype to Production ratio </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="counter_col">
                                            <div class="img__wrap">
                                                <img class="img-fluid" src="assets/images/home-page/research-development/machines.webp" alt="">
                                            </div>
                                            <div class="content__area">
                                                <div class="counetr_num fs-42 fw-300 text-light-black"> 95 </div>
                                                <div class="cnt__wrap fs-16 fw-500 text-light-black">
                                                    <p> Machines </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="counter_pagination swiper-pagination"></div>
                        </div>
                    </div>
                    <!-- Counter End -->
                </div>
            </section>
            <!-- Research Development Section End -->

            <!-- Our Capabilities Section Start -->
            <!-- <section class="our_capabilities__section pos-relative pt-45">
                <div class="bg-gradient-top"></div>
                <div class="custom-container">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="custom-heading">
                                <div class="sub_heading fs-24 fw-300 mb-10 text-dark-gray"> Manufacturing </div>
                                <h2 class="heading fs-76 fw-600 text-primary"> 
                                    Our Capabilities
                                </h2>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="cnt__wrap fs-16 fw-300 text-gray d-flex">
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting 
                                industry. Lorem Ipsum has been the industry's standard dummy text 
                                ever since the 1500s, when an unknown printer took a galley of type and
                            </p>
                            <div class="our_capabilities-btn">
                                <a class="primary_btn" href="javascript:void(0);">
                                    <span class="primary_btn_text"> Explore More
                                        <span class="primary_btn_icon">
                                            <img class="img-fluid" src="assets/images/arrow-icon-white.svg" alt="">
                                        </span>      
                                    </span>
                                </a>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="our_capabilities_heading d-flex align-items-center justify-content-between">
                        
                        
                    </div>

                    <div class="our_capabilities__inner mt-40">
                        <div class="our_capabilities_card active">
                            <img class="img-fluid" src="assets/images/home-page/our-capabilities/our-capabilities-img1.webp">
                            <div class="our_capabilities-arrow">
                                <img class="img-fluid" src="assets/images/arrow-icon-white.svg" alt="">
                            </div>
                            <div class="content__area">
                                <h3>Technology</h3>
                                <div class="cnt__wrap">
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and 
                                        typesetting industry. Lorem Ipsum has been the industry's 
                                        standard dummy tex Lorem Ipsum is simply dummy text of the 
                                        printing.
                                    </p>
                                </div>
                            </div>
                        </div>
                
                        <div class="our_capabilities_card">
                            <img src="assets/images/home-page/our-capabilities/our-capabilities-img2.webp">
                            <div class="our_capabilities-arrow">
                                <img src="assets/images/arrow-icon-white.svg" alt="">
                            </div>
                            <div class="content__area">
                                <h3>Technology</h3>
                                <div class="cnt__wrap">
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and 
                                        typesetting industry. Lorem Ipsum has been the industry's 
                                        standard dummy tex Lorem Ipsum is simply dummy text of the 
                                        printing.
                                    </p>
                                </div>
                            </div>
                        </div>
                
                        <div class="our_capabilities_card">
                            <img src="assets/images/home-page/our-capabilities/our-capabilities-img3.webp">
                            <div class="our_capabilities-arrow">
                                <img src="assets/images/arrow-icon-white.svg" alt="">
                            </div>
                            <div class="content__area">
                                <h3>Technology</h3>
                                <div class="cnt__wrap">
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and 
                                        typesetting industry. Lorem Ipsum has been the industry's 
                                        standard dummy tex Lorem Ipsum is simply dummy text of the 
                                        printing.
                                    </p>
                                </div>
                            </div>
                        </div>
                
                        <div class="our_capabilities_card">
                            <img src="assets/images/home-page/our-capabilities/our-capabilities-img4.webp">
                            <div class="our_capabilities-arrow">
                                <img src="assets/images/arrow-icon-white.svg" alt="">
                            </div>
                            <div class="content__area">
                                <h3>Technology</h3>
                                <div class="cnt__wrap">
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and 
                                        typesetting industry. Lorem Ipsum has been the industry's 
                                        standard dummy tex Lorem Ipsum is simply dummy text of the 
                                        printing.
                                    </p>
                                </div>
                            </div>
                        </div>
                
                        <div class="our_capabilities_card">
                            <img src="assets/images/home-page/our-capabilities/our-capabilities-img5.webp">
                            <div class="our_capabilities-arrow">
                                <img src="assets/images/arrow-icon-white.svg" alt="">
                            </div>
                            <div class="content__area">
                                <h3>Technology</h3>
                                <div class="cnt__wrap">
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and 
                                        typesetting industry. Lorem Ipsum has been the industry's 
                                        standard dummy tex Lorem Ipsum is simply dummy text of the 
                                        printing.
                                    </p>
                                </div>
                            </div>
                        </div>
                
                        <div class="our_capabilities_card">
                            <img src="assets/images/home-page/our-capabilities/our-capabilities-img6.webp">
                            <div class="our_capabilities-arrow">
                                <img src="assets/images/arrow-icon-white.svg" alt="">
                            </div>
                            <div class="content__area">
                                <h3>Technology</h3>
                                <div class="cnt__wrap">
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and 
                                        typesetting industry. Lorem Ipsum has been the industry's 
                                        standard dummy tex Lorem Ipsum is simply dummy text of the 
                                        printing.
                                    </p>
                                </div>
                            </div>
                        </div>
                
                        <div class="our_capabilities_card">
                            <img src="assets/images/home-page/our-capabilities/our-capabilities-img7.webp">
                            <div class="our_capabilities-arrow">
                                <img src="assets/images/arrow-icon-white.svg" alt="">
                            </div>
                            <div class="content__area">
                                <h3>Technology</h3>
                                <div class="cnt__wrap">
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and 
                                        typesetting industry. Lorem Ipsum has been the industry's 
                                        standard dummy tex Lorem Ipsum is simply dummy text of the 
                                        printing.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
            <section class="our_capabilities__section pos-relative pt-45 pb-20">
                <div class="bg-gradient-top"></div>
                <div class="custom-container">
                    <div class="row top-row">
                        <div class="col-12 col-md-12 col-lg-5 col-xl-6">
                            <div class="custom-heading">
                                <div class="sub_heading fs-24 fw-300 text-dark-gray"> Manufacturing </div>
                                <h3 class="heading fs-76 fw-600 text-primary"> 
                                    Our Capabilities
                                </h3>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-7 col-xl-6">
                            <div class="content-col d-flex">
                            <div class="cnt__wrap fs-16 fw-300 text-gray">
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting 
                                    industry. Lorem Ipsum has been the industry's standard dummy text 
                                    ever since the 1500s, when an unknown printer took
                                </p>
                            </div>
                            <div class="btn-group">
                                <a class="primary_btn" href="javascript:void(0);">
                                    <span class="primary_btn_text"> Explore More
                                        <span class="primary_btn_icon">
                                            <img class="img-fluid" src="assets/images/arrow-icon-white.svg" alt="">
                                        </span>      
                                    </span>
                                </a>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="our_capabilities__inner mt-40">
                        <div class="our_capabilities_card active">
                            <img class="img-fluid bg_img" src="assets/images/home-page/our-capabilities/our-capabilities-img1.webp">
                            <div class="our_capabilities-arrow">
                                <img class="img-fluid" src="assets/images/arrow-icon-white.svg" alt="">
                            </div>
                            <div class="content__block">
                                <h4 class="heading fs-18 fw-500 text-white">Technology</h4>
                            </div>
                            <div class="content__area">
                                <div class="heading fw-600">Technology</div>
                                <div class="cnt__wrap">
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and 
                                        typesetting industry. Lorem Ipsum has been the industry's 
                                        standard dummy tex Lorem Ipsum is simply dummy text of the 
                                        printing.
                                    </p>
                                </div>
                            </div>
                        </div>
                
                        <div class="our_capabilities_card">
                            <img class="img-fluid bg_img" src="assets/images/home-page/our-capabilities/our-capabilities-img2.webp">
                            <div class="our_capabilities-arrow">
                                <img class="img-fluid" src="assets/images/arrow-icon-white.svg" alt="">
                            </div>
                            <div class="content__block">
                                <h4 class="heading fs-18 fw-500 text-white">Manpower</h4>
                            </div>
                            <div class="content__area">
                                <div class="heading fw-600">Manpower</div>
                                <div class="cnt__wrap">
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and 
                                        typesetting industry. Lorem Ipsum has been the industry's 
                                        standard dummy tex Lorem Ipsum is simply dummy text of the 
                                        printing.
                                    </p>
                                </div>
                            </div>
                        </div>
                
                        <div class="our_capabilities_card">
                            <img class="img-fluid bg_img" src="assets/images/home-page/our-capabilities/our-capabilities-img3.webp">
                            <div class="our_capabilities-arrow">
                                <img class="img-fluid" src="assets/images/arrow-icon-white.svg" alt="">
                            </div>
                            <div class="content__block">
                                <h4 class="heading fs-18 fw-500 text-white">Area</h4>
                            </div>
                            <div class="content__area">
                                <div class="heading fw-600">Area</div>
                                <div class="cnt__wrap">
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and 
                                        typesetting industry. Lorem Ipsum has been the industry's 
                                        standard dummy tex Lorem Ipsum is simply dummy text of the 
                                        printing.
                                    </p>
                                </div>
                            </div>
                        </div>
                
                        <div class="our_capabilities_card">
                            <img class="img-fluid bg_img" src="assets/images/home-page/our-capabilities/our-capabilities-img4.webp">
                            <div class="our_capabilities-arrow">
                                <img class="img-fluid" src="assets/images/arrow-icon-white.svg" alt="">
                            </div>
                            <div class="content__block">
                                <h4 class="heading fs-18 fw-500 text-white">Production Capacity</h4>
                            </div>
                            <div class="content__area">
                                <div class="heading fw-600">Production Capacity</div>
                                <div class="cnt__wrap">
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and 
                                        typesetting industry. Lorem Ipsum has been the industry's 
                                        standard dummy tex Lorem Ipsum is simply dummy text of the 
                                        printing.
                                    </p>
                                </div>
                            </div>
                        </div>
                
                        <div class="our_capabilities_card">
                            <img class="img-fluid bg_img" src="assets/images/home-page/our-capabilities/our-capabilities-img5.webp">
                            <div class="our_capabilities-arrow">
                                <img class="img-fluid" src="assets/images/arrow-icon-white.svg" alt="">
                            </div>
                            <div class="content__block">
                                <h4 class="heading fs-18 fw-500 text-white">Machines</h4>
                            </div>
                            <div class="content__area">
                                <div class="heading fw-600">Machines</div>
                                <div class="cnt__wrap">
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and 
                                        typesetting industry. Lorem Ipsum has been the industry's 
                                        standard dummy tex Lorem Ipsum is simply dummy text of the 
                                        printing.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Our Capabilities Section End -->

            <!-- We Serve Section Start -->
            <section class="we__serve_section pt-30 pb-40">
                <div class="custom-container">
                    <div class="we_serve_inner">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="we_serve_left">
                                    <div class="we__serve_video">
                                        <div class="video__area">
                                            <div class="video__container">
                                                <video id="video-about" autoplay muted loop playsinline width="100%" height="auto">
                                                    <source src="assets/images/home-page/we-serve/we-serve-vid.mp4" type="video/mp4">
                                                </video>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="we_serve_right">
                                    <div class="we_serve_heading">
                                        <div class="custom-heading">
                                            <div class="sub_heading fs-24 fw-300 text-dark-gray"> Industries </div>
                                            <h4 class="heading fs-76 fw-600 text-primary"> 
                                                We Serve
                                            </h4>
                                            <div class="cnt__wrap fs-16 fw-300 mt-20 text-gray">
                                                <p>
                                                    Lorem ipsum dolor sit amet consectetur. Ullamcorper facilisi quis cras mauris praesent auctor 
                                                    diam. Vulputate venenatis integer ligula dolor felis at faucibus a nibh.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="we_serve_accordion">
                                        <div class="we_serve_accordion_item active">
                                            <div class="we_serve_accordion-arrow">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                    <path d="M0.871094 14.8071L14.8071 0.871094M14.8071 0.871094H4.35509M14.8071 0.871094V11.3231" stroke="#3D3D3D" stroke-width="1.742" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </div>
                                            <h2 class="we_serve_accordion_header"> Automotive </h2>

                                            <div class="we_serve_content_area">
                                                <div class="cnt__wrap fw-400 text-gray">
                                                    <p>
                                                        Victura is a leading manufacturer and supplier of world-class auto components in India 
                                                        with over 5 decades of experience in the industry.
                                                    </p>
                                                </div>
                                                <div class="we_serve-btn mt-30 d-flex align-items-center">
                                                    <a class="primary_btn" href="javascript:void(0);">
                                                        <span class="primary_btn_text"> Read More
                                                            <span class="primary_btn_icon">
                                                                <img class="img-fluid" src="assets/images/arrow-icon-white.svg" alt="">
                                                            </span>      
                                                        </span>
                                                    </a>
                                                    <a class="download-btn" href="javascript:void(0);">
                                                        <span class="download_btn_inr"> 
                                                            <span class="download_btn_icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" viewBox="0 0 12 13" fill="none">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.00469 11.8918C5.88901 12.0074 5.7322 12.0723 5.56871 12.0723C5.40521 12.0723 5.24841 12.0074 5.13273 11.8918L0.197062 6.95617C0.136446 6.89969 0.08783 6.83158 0.05411 6.7559C0.0203891 6.68022 0.00225783 6.59852 0.000796804 6.51568C-0.000665172 6.43284 0.0145717 6.35056 0.0456014 6.27374C0.0766311 6.19691 0.122818 6.12713 0.181403 6.06854C0.239988 6.00996 0.309774 5.96377 0.386595 5.93274C0.463418 5.90171 0.545702 5.88647 0.628541 5.88794C0.71138 5.8894 0.793077 5.90753 0.868757 5.94125C0.944437 5.97497 1.01255 6.02359 1.06903 6.0842L4.95175 9.96693L4.95175 0.616748C4.95175 0.453121 5.01675 0.296195 5.13246 0.180493C5.24816 0.0647912 5.40508 -0.000209356 5.56871 -0.000209341C5.73234 -0.000209327 5.88926 0.0647912 6.00496 0.180493C6.12067 0.296196 6.18567 0.453121 6.18567 0.616748L6.18567 9.96693L10.0684 6.0842C10.1249 6.02359 10.193 5.97497 10.2687 5.94125C10.3443 5.90753 10.426 5.8894 10.5089 5.88794C10.5917 5.88648 10.674 5.90171 10.7508 5.93274C10.8276 5.96377 10.8974 6.00996 10.956 6.06854C11.0146 6.12713 11.0608 6.19691 11.0918 6.27374C11.1228 6.35056 11.1381 6.43284 11.1366 6.51568C11.1352 6.59852 11.117 6.68022 11.0833 6.7559C11.0496 6.83158 11.001 6.89969 10.9404 6.95617L6.00469 11.8918Z" fill="#EA1C24"/>
                                                                </svg>
                                                            </span>
                                                            Download Brochure
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="we_serve_accordion_item">
                                            <div class="we_serve_accordion-arrow">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                    <path d="M0.871094 14.8071L14.8071 0.871094M14.8071 0.871094H4.35509M14.8071 0.871094V11.3231" stroke="#3D3D3D" stroke-width="1.742" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </div>
                                            <h2 class="we_serve_accordion_header"> Medical </h2>

                                            <div class="we_serve_content_area">
                                                <div class="cnt__wrap fw-400 text-gray">
                                                    <p>
                                                        Victura is a leading manufacturer and supplier of world-class auto components in India 
                                                        with over 5 decades of experience in the industry.
                                                    </p>
                                                </div>
                                                <div class="we_serve-btn mt-30 d-flex align-items-center">
                                                    <a class="primary_btn" href="javascript:void(0);">
                                                        <span class="primary_btn_text"> Read More
                                                            <span class="primary_btn_icon">
                                                                <img class="img-fluid" src="assets/images/arrow-icon-white.svg" alt="">
                                                            </span>      
                                                        </span>
                                                    </a>
                                                    <a class="download-btn" href="javascript:void(0);">
                                                        <span class="download_btn_inr"> 
                                                            <span class="download_btn_icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" viewBox="0 0 12 13" fill="none">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.00469 11.8918C5.88901 12.0074 5.7322 12.0723 5.56871 12.0723C5.40521 12.0723 5.24841 12.0074 5.13273 11.8918L0.197062 6.95617C0.136446 6.89969 0.08783 6.83158 0.05411 6.7559C0.0203891 6.68022 0.00225783 6.59852 0.000796804 6.51568C-0.000665172 6.43284 0.0145717 6.35056 0.0456014 6.27374C0.0766311 6.19691 0.122818 6.12713 0.181403 6.06854C0.239988 6.00996 0.309774 5.96377 0.386595 5.93274C0.463418 5.90171 0.545702 5.88647 0.628541 5.88794C0.71138 5.8894 0.793077 5.90753 0.868757 5.94125C0.944437 5.97497 1.01255 6.02359 1.06903 6.0842L4.95175 9.96693L4.95175 0.616748C4.95175 0.453121 5.01675 0.296195 5.13246 0.180493C5.24816 0.0647912 5.40508 -0.000209356 5.56871 -0.000209341C5.73234 -0.000209327 5.88926 0.0647912 6.00496 0.180493C6.12067 0.296196 6.18567 0.453121 6.18567 0.616748L6.18567 9.96693L10.0684 6.0842C10.1249 6.02359 10.193 5.97497 10.2687 5.94125C10.3443 5.90753 10.426 5.8894 10.5089 5.88794C10.5917 5.88648 10.674 5.90171 10.7508 5.93274C10.8276 5.96377 10.8974 6.00996 10.956 6.06854C11.0146 6.12713 11.0608 6.19691 11.0918 6.27374C11.1228 6.35056 11.1381 6.43284 11.1366 6.51568C11.1352 6.59852 11.117 6.68022 11.0833 6.7559C11.0496 6.83158 11.001 6.89969 10.9404 6.95617L6.00469 11.8918Z" fill="#EA1C24"/>
                                                                </svg>
                                                            </span>
                                                            Download Brochure
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="we_serve_accordion_item">
                                            <div class="we_serve_accordion-arrow">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                    <path d="M0.871094 14.8071L14.8071 0.871094M14.8071 0.871094H4.35509M14.8071 0.871094V11.3231" stroke="#3D3D3D" stroke-width="1.742" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </div>
                                            <h2 class="we_serve_accordion_header"> EV </h2>

                                            <div class="we_serve_content_area">
                                                <div class="cnt__wrap fw-400 text-gray">
                                                    <p>
                                                        Victura is a leading manufacturer and supplier of world-class auto components in India 
                                                        with over 5 decades of experience in the industry.
                                                    </p>
                                                </div>
                                                <div class="we_serve-btn mt-30 d-flex align-items-center">
                                                    <a class="primary_btn" href="javascript:void(0);">
                                                        <span class="primary_btn_text"> Read More
                                                            <span class="primary_btn_icon">
                                                                <img class="img-fluid" src="assets/images/arrow-icon-white.svg" alt="">
                                                            </span>      
                                                        </span>
                                                    </a>
                                                    <a class="download-btn" href="javascript:void(0);">
                                                        <span class="download_btn_inr"> 
                                                            <span class="download_btn_icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" viewBox="0 0 12 13" fill="none">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.00469 11.8918C5.88901 12.0074 5.7322 12.0723 5.56871 12.0723C5.40521 12.0723 5.24841 12.0074 5.13273 11.8918L0.197062 6.95617C0.136446 6.89969 0.08783 6.83158 0.05411 6.7559C0.0203891 6.68022 0.00225783 6.59852 0.000796804 6.51568C-0.000665172 6.43284 0.0145717 6.35056 0.0456014 6.27374C0.0766311 6.19691 0.122818 6.12713 0.181403 6.06854C0.239988 6.00996 0.309774 5.96377 0.386595 5.93274C0.463418 5.90171 0.545702 5.88647 0.628541 5.88794C0.71138 5.8894 0.793077 5.90753 0.868757 5.94125C0.944437 5.97497 1.01255 6.02359 1.06903 6.0842L4.95175 9.96693L4.95175 0.616748C4.95175 0.453121 5.01675 0.296195 5.13246 0.180493C5.24816 0.0647912 5.40508 -0.000209356 5.56871 -0.000209341C5.73234 -0.000209327 5.88926 0.0647912 6.00496 0.180493C6.12067 0.296196 6.18567 0.453121 6.18567 0.616748L6.18567 9.96693L10.0684 6.0842C10.1249 6.02359 10.193 5.97497 10.2687 5.94125C10.3443 5.90753 10.426 5.8894 10.5089 5.88794C10.5917 5.88648 10.674 5.90171 10.7508 5.93274C10.8276 5.96377 10.8974 6.00996 10.956 6.06854C11.0146 6.12713 11.0608 6.19691 11.0918 6.27374C11.1228 6.35056 11.1381 6.43284 11.1366 6.51568C11.1352 6.59852 11.117 6.68022 11.0833 6.7559C11.0496 6.83158 11.001 6.89969 10.9404 6.95617L6.00469 11.8918Z" fill="#EA1C24"/>
                                                                </svg>
                                                            </span>
                                                            Download Brochure
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="we_serve_accordion_item">
                                            <div class="we_serve_accordion-arrow">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                    <path d="M0.871094 14.8071L14.8071 0.871094M14.8071 0.871094H4.35509M14.8071 0.871094V11.3231" stroke="#3D3D3D" stroke-width="1.742" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </div>
                                            <h2 class="we_serve_accordion_header"> Railways </h2>

                                            <div class="we_serve_content_area">
                                                <div class="cnt__wrap fw-400 text-gray">
                                                    <p>
                                                        Victura is a leading manufacturer and supplier of world-class auto components in India 
                                                        with over 5 decades of experience in the industry.
                                                    </p>
                                                </div>
                                                <div class="we_serve-btn mt-30 d-flex align-items-center">
                                                    <a class="primary_btn" href="javascript:void(0);">
                                                        <span class="primary_btn_text"> Read More
                                                            <span class="primary_btn_icon">
                                                                <img class="img-fluid" src="assets/images/arrow-icon-white.svg" alt="">
                                                            </span>      
                                                        </span>
                                                    </a>
                                                    <a class="download-btn" href="javascript:void(0);">
                                                        <span class="download_btn_inr"> 
                                                            <span class="download_btn_icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" viewBox="0 0 12 13" fill="none">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.00469 11.8918C5.88901 12.0074 5.7322 12.0723 5.56871 12.0723C5.40521 12.0723 5.24841 12.0074 5.13273 11.8918L0.197062 6.95617C0.136446 6.89969 0.08783 6.83158 0.05411 6.7559C0.0203891 6.68022 0.00225783 6.59852 0.000796804 6.51568C-0.000665172 6.43284 0.0145717 6.35056 0.0456014 6.27374C0.0766311 6.19691 0.122818 6.12713 0.181403 6.06854C0.239988 6.00996 0.309774 5.96377 0.386595 5.93274C0.463418 5.90171 0.545702 5.88647 0.628541 5.88794C0.71138 5.8894 0.793077 5.90753 0.868757 5.94125C0.944437 5.97497 1.01255 6.02359 1.06903 6.0842L4.95175 9.96693L4.95175 0.616748C4.95175 0.453121 5.01675 0.296195 5.13246 0.180493C5.24816 0.0647912 5.40508 -0.000209356 5.56871 -0.000209341C5.73234 -0.000209327 5.88926 0.0647912 6.00496 0.180493C6.12067 0.296196 6.18567 0.453121 6.18567 0.616748L6.18567 9.96693L10.0684 6.0842C10.1249 6.02359 10.193 5.97497 10.2687 5.94125C10.3443 5.90753 10.426 5.8894 10.5089 5.88794C10.5917 5.88648 10.674 5.90171 10.7508 5.93274C10.8276 5.96377 10.8974 6.00996 10.956 6.06854C11.0146 6.12713 11.0608 6.19691 11.0918 6.27374C11.1228 6.35056 11.1381 6.43284 11.1366 6.51568C11.1352 6.59852 11.117 6.68022 11.0833 6.7559C11.0496 6.83158 11.001 6.89969 10.9404 6.95617L6.00469 11.8918Z" fill="#EA1C24"/>
                                                                </svg>
                                                            </span>
                                                            Download Brochure
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="we_serve_accordion_item">
                                            <div class="we_serve_accordion-arrow">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                    <path d="M0.871094 14.8071L14.8071 0.871094M14.8071 0.871094H4.35509M14.8071 0.871094V11.3231" stroke="#3D3D3D" stroke-width="1.742" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </div>
                                            <h2 class="we_serve_accordion_header"> Defence </h2>

                                            <div class="we_serve_content_area">
                                                <div class="cnt__wrap fw-400 text-gray">
                                                    <p>
                                                        Victura is a leading manufacturer and supplier of world-class auto components in India 
                                                        with over 5 decades of experience in the industry.
                                                    </p>
                                                </div>
                                                <div class="we_serve-btn mt-30 d-flex align-items-center">
                                                    <a class="primary_btn" href="javascript:void(0);">
                                                        <span class="primary_btn_text"> Read More
                                                            <span class="primary_btn_icon">
                                                                <img class="img-fluid" src="assets/images/arrow-icon-white.svg" alt="">
                                                            </span>      
                                                        </span>
                                                    </a>
                                                    <a class="download-btn" href="javascript:void(0);">
                                                        <span class="download_btn_inr"> 
                                                            <span class="download_btn_icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" viewBox="0 0 12 13" fill="none">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.00469 11.8918C5.88901 12.0074 5.7322 12.0723 5.56871 12.0723C5.40521 12.0723 5.24841 12.0074 5.13273 11.8918L0.197062 6.95617C0.136446 6.89969 0.08783 6.83158 0.05411 6.7559C0.0203891 6.68022 0.00225783 6.59852 0.000796804 6.51568C-0.000665172 6.43284 0.0145717 6.35056 0.0456014 6.27374C0.0766311 6.19691 0.122818 6.12713 0.181403 6.06854C0.239988 6.00996 0.309774 5.96377 0.386595 5.93274C0.463418 5.90171 0.545702 5.88647 0.628541 5.88794C0.71138 5.8894 0.793077 5.90753 0.868757 5.94125C0.944437 5.97497 1.01255 6.02359 1.06903 6.0842L4.95175 9.96693L4.95175 0.616748C4.95175 0.453121 5.01675 0.296195 5.13246 0.180493C5.24816 0.0647912 5.40508 -0.000209356 5.56871 -0.000209341C5.73234 -0.000209327 5.88926 0.0647912 6.00496 0.180493C6.12067 0.296196 6.18567 0.453121 6.18567 0.616748L6.18567 9.96693L10.0684 6.0842C10.1249 6.02359 10.193 5.97497 10.2687 5.94125C10.3443 5.90753 10.426 5.8894 10.5089 5.88794C10.5917 5.88648 10.674 5.90171 10.7508 5.93274C10.8276 5.96377 10.8974 6.00996 10.956 6.06854C11.0146 6.12713 11.0608 6.19691 11.0918 6.27374C11.1228 6.35056 11.1381 6.43284 11.1366 6.51568C11.1352 6.59852 11.117 6.68022 11.0833 6.7559C11.0496 6.83158 11.001 6.89969 10.9404 6.95617L6.00469 11.8918Z" fill="#EA1C24"/>
                                                                </svg>
                                                            </span>
                                                            Download Brochure
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- We Serve Section End -->

            <!-- Smart Systems Section Start -->
            <section class="smart__system pt-35 pb-50">
                <div class="custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="custom-heading smart_system_top_heading mb-60">
                                <div class="sub_heading fs-24 fw-300 text-dark-gray">Technology</div>
                                <h4 class="heading fs-76 fw-600 text-primary">Driven by Smart Systems</h4>
                            </div>
                        </div>
                    </div>
            
                    <div class="row">
                    </div>
            
                </div>
            
                <div class="custom-container text-center mb-5 mt-5"></div>
            
                <div class="bg-diffrent">
                    <div class="custom-container">
                        <div class="row snart__system_tab">
                            <div class="col-12 col-lg-12 col-xl-12">
                                <div class="category-lists-slider">
                                    <div class="catgory-slider swiper-container">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="category-button active" data-id="data1">
                                                    <div class="cat-heading fs-24 fw-400">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 7 7" fill="none">
                                                                <circle cx="3.5" cy="3.5" r="3.5" fill="currentColor"></circle>
                                                            </svg>
                                                        </span>Stamping
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="category-button" data-id="data2">
                                                    <div class="cat-heading fs-24 fw-400">
                                                        <span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 7 7" fill="none">
                                                                <circle cx="3.5" cy="3.5" r="3.5" fill="currentColor"></circle>
                                                            </svg>
                                                        </span>Tube & Rod Bending
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="category-button" data-id="data3">
                                                    <div class="cat-heading fs-24 fw-400"><span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 7 7" fill="none">
                                                                <circle cx="3.5" cy="3.5" r="3.5" fill="currentColor"></circle>
                                                            </svg>
                                                        </span>Forging
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="category-button" data-id="data4">
                                                    <div class="cat-heading fs-24 fw-400"><span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 7 7" fill="none">
                                                                <circle cx="3.5" cy="3.5" r="3.5" fill="currentColor"></circle>
                                                            </svg>
                                                        </span>Machining
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="category-button" data-id="data5">
                                                    <div class="cat-heading fs-24 fw-400"><span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 7 7" fill="none">
                                                                <circle cx="3.5" cy="3.5" r="3.5" fill="currentColor"></circle>
                                                            </svg>
                                                        </span>Aluminium Casting
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="category-button" data-id="data6">
                                                    <div class="cat-heading fs-24 fw-400"><span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 7 7" fill="none">
                                                                <circle cx="3.5" cy="3.5" r="3.5" fill="currentColor"></circle>
                                                            </svg>
                                                        </span>Investment Casting
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="category-button" data-id="data7">
                                                    <div class="cat-heading fs-24 fw-400"><span>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 7 7" fill="none">
                                                                <circle cx="3.5" cy="3.5" r="3.5" fill="currentColor"></circle>
                                                            </svg>
                                                        </span>Assembled Components
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
            
            
                                    </div>
            
                                    <div class="swiper-custom">
                                        <button data-slider-prev="#heroSlide1" class="slider-button slider-prev">
                                            <span><svg xmlns="http://www.w3.org/2000/svg" width="9" height="16" viewBox="0 0 9 16"
                                                    fill="none">
                                                    <path
                                                        d="M8.6705 1.92049C9.10983 1.48116 9.10983 0.768845 8.6705 0.329505C8.23116 -0.109835 7.51884 -0.109835 7.0795 0.329505L0.329504 7.0795C-0.109836 7.51884 -0.109836 8.23115 0.329504 8.67049L7.0795 15.4205C7.51884 15.8598 8.23116 15.8598 8.67049 15.4205C9.10983 14.9812 9.10983 14.2688 8.67049 13.8295L2.71599 7.875L8.6705 1.92049Z"
                                                        fill="#282828" />
                                                </svg></span>
                                        </button>
                                        <div class="slider-pagination"></div>
                                        <button data-slider-next="#heroSlide1" class="slider-button slider-next">
                                            <span><svg xmlns="http://www.w3.org/2000/svg" width="9" height="16" viewBox="0 0 9 16"
                                                    fill="none">
                                                    <path
                                                        d="M0.329505 1.92049C-0.109835 1.48116 -0.109835 0.768845 0.329505 0.329505C0.768845 -0.109835 1.48116 -0.109835 1.9205 0.329505L8.6705 7.0795C9.10984 7.51884 9.10984 8.23115 8.6705 8.67049L1.9205 15.4205C1.48116 15.8598 0.768845 15.8598 0.329505 15.4205C-0.109835 14.9812 -0.109835 14.2688 0.329505 13.8295L6.28401 7.875L0.329505 1.92049Z"
                                                        fill="#282828" />
                                                </svg></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-12 col-xl-12">
            
                                <div class="row ">
                                    <div class="col-12">
                                        <div class="data-text active " id="data1">
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
                                                                <h4 class="heading fs-76 fw-600 text-primary">Stamping </h4>
                                                                    <button class="arrow-btn">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                            height="12" viewBox="0 0 12 12" fill="none">
                                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                d="M10.8414 0.000685853C11.0555 0.000818957 11.2607 0.0859022 11.412 0.237247C11.5634 0.388591 11.6485 0.593821 11.6486 0.807855L11.6486 9.94562C11.6524 10.054 11.6344 10.1621 11.5955 10.2633C11.5567 10.3646 11.4979 10.457 11.4225 10.5351C11.3472 10.6131 11.2569 10.6752 11.1571 10.7175C11.0573 10.7599 10.9499 10.7818 10.8414 10.7818C10.733 10.7818 10.6256 10.7599 10.5258 10.7175C10.426 10.6752 10.3357 10.6131 10.2603 10.5351C10.185 10.457 10.1262 10.3646 10.0873 10.2633C10.0485 10.1621 10.0304 10.054 10.0343 9.94562L10.0343 2.75724L1.37893 11.4126C1.22746 11.5641 1.02202 11.6491 0.807816 11.6491C0.593609 11.6491 0.388174 11.5641 0.236706 11.4126C0.085238 11.2611 0.000145596 11.0557 0.000145295 10.8415C0.000145668 10.6273 0.0852382 10.4218 0.236707 10.2704L8.89205 1.61502L1.70368 1.61502C1.59528 1.61885 1.48723 1.6008 1.38596 1.56196C1.28469 1.52312 1.19228 1.46428 1.11424 1.38895C1.0362 1.31362 0.974139 1.22334 0.93175 1.12351C0.88936 1.02367 0.867514 0.916316 0.867514 0.807853C0.867514 0.69939 0.88936 0.592038 0.931749 0.492201C0.974139 0.392364 1.0362 0.302087 1.11424 0.226757C1.19228 0.151427 1.28469 0.0925854 1.38596 0.0537445C1.48723 0.0149033 1.59528 -0.0031422 1.70368 0.000683838L10.8414 0.000685853Z"
                                                                                fill="white" />
                                                                        </svg>
                                                                    </button>
                                                            </div>
                                                            <div class="smart_system_right_content fw-300 pt-10 text-gray">
                                                                <p>Lorem ipsum dolor sit amet consectetur. Quis nisl lacinia
                                                                    purus est commodo tristique posuere. Cras ac lacus
                                                                    fringilla amet eu. Purus tincidunt tempus diam ac massa
                                                                    nibh id. Nunc sit massa risus venenatis urna velit a
                                                                    donec. Egestas vel sed amet quisque. Massa vulputate at
                                                                    mattis eros .</p>
                                                            </div>
                                                            <div class="right_product_heading mt-60">
                                                                <div class="rp-heading fs-18 fw-500 text-primary">Products</div>
                                                            </div>
            
            
                                                            <div class="smart-system-slider swiper mt-20">
                                                                <div class="swiper-wrapper">
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-2.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-3.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
            
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-4.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
            
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-5.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
            
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-1.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-2.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
            
                                                                    </div>
            
            
            
                                                                </div>
                                                                <div class="smart-system-pagination swiper-pagination"></div>
            
                                                            </div>
            
            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
            
                                        </div>
                                        <div class="data-text " id="data2">
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
                                                                <h4 class="heading fs-76 fw-600 text-primary">Tube & Rod Bending </h4>
                                                                    <button class="arrow-btn">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                            height="12" viewBox="0 0 12 12" fill="none">
                                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                d="M10.8414 0.000685853C11.0555 0.000818957 11.2607 0.0859022 11.412 0.237247C11.5634 0.388591 11.6485 0.593821 11.6486 0.807855L11.6486 9.94562C11.6524 10.054 11.6344 10.1621 11.5955 10.2633C11.5567 10.3646 11.4979 10.457 11.4225 10.5351C11.3472 10.6131 11.2569 10.6752 11.1571 10.7175C11.0573 10.7599 10.9499 10.7818 10.8414 10.7818C10.733 10.7818 10.6256 10.7599 10.5258 10.7175C10.426 10.6752 10.3357 10.6131 10.2603 10.5351C10.185 10.457 10.1262 10.3646 10.0873 10.2633C10.0485 10.1621 10.0304 10.054 10.0343 9.94562L10.0343 2.75724L1.37893 11.4126C1.22746 11.5641 1.02202 11.6491 0.807816 11.6491C0.593609 11.6491 0.388174 11.5641 0.236706 11.4126C0.085238 11.2611 0.000145596 11.0557 0.000145295 10.8415C0.000145668 10.6273 0.0852382 10.4218 0.236707 10.2704L8.89205 1.61502L1.70368 1.61502C1.59528 1.61885 1.48723 1.6008 1.38596 1.56196C1.28469 1.52312 1.19228 1.46428 1.11424 1.38895C1.0362 1.31362 0.974139 1.22334 0.93175 1.12351C0.88936 1.02367 0.867514 0.916316 0.867514 0.807853C0.867514 0.69939 0.88936 0.592038 0.931749 0.492201C0.974139 0.392364 1.0362 0.302087 1.11424 0.226757C1.19228 0.151427 1.28469 0.0925854 1.38596 0.0537445C1.48723 0.0149033 1.59528 -0.0031422 1.70368 0.000683838L10.8414 0.000685853Z"
                                                                                fill="white" />
                                                                        </svg>
                                                                    </button>
                                                            </div>
                                                            <div class="smart_system_right_content fw-300 pt-10 text-gray">
                                                                <p>Lorem ipsum dolor sit amet consectetur. Quis nisl lacinia
                                                                    purus est commodo tristique posuere. Cras ac lacus
                                                                    fringilla amet eu. Purus tincidunt tempus diam ac massa
                                                                    nibh id. Nunc sit massa risus venenatis urna velit a
                                                                    donec. Egestas vel sed amet quisque. Massa vulputate at
                                                                    mattis eros .</p>
                                                            </div>
                                                            <div class="right_product_heading mt-60">
                                                                <div class="rp-heading fs-18 fw-500 text-primary">Products</div>
                                                            </div>
            
            
                                                            <div class="smart-system-slider swiper mt-20">
                                                                <div class="swiper-wrapper">
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-2.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-3.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
            
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-4.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
            
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-5.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
            
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-1.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-2.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
            
                                                                    </div>
            
            
            
                                                                </div>
                                                                <div class="smart-system-pagination swiper-pagination"></div>
            
                                                            </div>
            
            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
            
                                        </div>
                                        <div class="data-text " id="data3">
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
                                                                <h4 class="heading fs-76 fw-600 text-primary">Forging </h4>
                                                                    <button class="arrow-btn">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                            height="12" viewBox="0 0 12 12" fill="none">
                                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                d="M10.8414 0.000685853C11.0555 0.000818957 11.2607 0.0859022 11.412 0.237247C11.5634 0.388591 11.6485 0.593821 11.6486 0.807855L11.6486 9.94562C11.6524 10.054 11.6344 10.1621 11.5955 10.2633C11.5567 10.3646 11.4979 10.457 11.4225 10.5351C11.3472 10.6131 11.2569 10.6752 11.1571 10.7175C11.0573 10.7599 10.9499 10.7818 10.8414 10.7818C10.733 10.7818 10.6256 10.7599 10.5258 10.7175C10.426 10.6752 10.3357 10.6131 10.2603 10.5351C10.185 10.457 10.1262 10.3646 10.0873 10.2633C10.0485 10.1621 10.0304 10.054 10.0343 9.94562L10.0343 2.75724L1.37893 11.4126C1.22746 11.5641 1.02202 11.6491 0.807816 11.6491C0.593609 11.6491 0.388174 11.5641 0.236706 11.4126C0.085238 11.2611 0.000145596 11.0557 0.000145295 10.8415C0.000145668 10.6273 0.0852382 10.4218 0.236707 10.2704L8.89205 1.61502L1.70368 1.61502C1.59528 1.61885 1.48723 1.6008 1.38596 1.56196C1.28469 1.52312 1.19228 1.46428 1.11424 1.38895C1.0362 1.31362 0.974139 1.22334 0.93175 1.12351C0.88936 1.02367 0.867514 0.916316 0.867514 0.807853C0.867514 0.69939 0.88936 0.592038 0.931749 0.492201C0.974139 0.392364 1.0362 0.302087 1.11424 0.226757C1.19228 0.151427 1.28469 0.0925854 1.38596 0.0537445C1.48723 0.0149033 1.59528 -0.0031422 1.70368 0.000683838L10.8414 0.000685853Z"
                                                                                fill="white" />
                                                                        </svg>
                                                                    </button>
                                                            </div>
                                                            <div class="smart_system_right_content fw-300 pt-10 text-gray">
                                                                <p>Lorem ipsum dolor sit amet consectetur. Quis nisl lacinia
                                                                    purus est commodo tristique posuere. Cras ac lacus
                                                                    fringilla amet eu. Purus tincidunt tempus diam ac massa
                                                                    nibh id. Nunc sit massa risus venenatis urna velit a
                                                                    donec. Egestas vel sed amet quisque. Massa vulputate at
                                                                    mattis eros .</p>
                                                            </div>
                                                            <div class="right_product_heading mt-60">
                                                                <div class="rp-heading fs-18 fw-500 text-primary">Products</div>
                                                            </div>
            
            
                                                            <div class="smart-system-slider swiper mt-20">
                                                                <div class="swiper-wrapper">
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-2.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-3.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
            
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-4.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
            
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-5.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
            
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-1.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-2.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
            
                                                                    </div>
            
            
            
                                                                </div>
                                                                <div class="smart-system-pagination swiper-pagination"></div>
            
                                                            </div>
            
            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
            
                                        </div>
                                        <div class="data-text " id="data4">
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
                                                                <h4 class="heading fs-76 fw-600 text-primary">Machining </h4>
                                                                    <button class="arrow-btn">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                            height="12" viewBox="0 0 12 12" fill="none">
                                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                d="M10.8414 0.000685853C11.0555 0.000818957 11.2607 0.0859022 11.412 0.237247C11.5634 0.388591 11.6485 0.593821 11.6486 0.807855L11.6486 9.94562C11.6524 10.054 11.6344 10.1621 11.5955 10.2633C11.5567 10.3646 11.4979 10.457 11.4225 10.5351C11.3472 10.6131 11.2569 10.6752 11.1571 10.7175C11.0573 10.7599 10.9499 10.7818 10.8414 10.7818C10.733 10.7818 10.6256 10.7599 10.5258 10.7175C10.426 10.6752 10.3357 10.6131 10.2603 10.5351C10.185 10.457 10.1262 10.3646 10.0873 10.2633C10.0485 10.1621 10.0304 10.054 10.0343 9.94562L10.0343 2.75724L1.37893 11.4126C1.22746 11.5641 1.02202 11.6491 0.807816 11.6491C0.593609 11.6491 0.388174 11.5641 0.236706 11.4126C0.085238 11.2611 0.000145596 11.0557 0.000145295 10.8415C0.000145668 10.6273 0.0852382 10.4218 0.236707 10.2704L8.89205 1.61502L1.70368 1.61502C1.59528 1.61885 1.48723 1.6008 1.38596 1.56196C1.28469 1.52312 1.19228 1.46428 1.11424 1.38895C1.0362 1.31362 0.974139 1.22334 0.93175 1.12351C0.88936 1.02367 0.867514 0.916316 0.867514 0.807853C0.867514 0.69939 0.88936 0.592038 0.931749 0.492201C0.974139 0.392364 1.0362 0.302087 1.11424 0.226757C1.19228 0.151427 1.28469 0.0925854 1.38596 0.0537445C1.48723 0.0149033 1.59528 -0.0031422 1.70368 0.000683838L10.8414 0.000685853Z"
                                                                                fill="white" />
                                                                        </svg>
                                                                    </button>
                                                            </div>
                                                            <div class="smart_system_right_content fw-300 pt-10 text-gray">
                                                                <p>Lorem ipsum dolor sit amet consectetur. Quis nisl lacinia
                                                                    purus est commodo tristique posuere. Cras ac lacus
                                                                    fringilla amet eu. Purus tincidunt tempus diam ac massa
                                                                    nibh id. Nunc sit massa risus venenatis urna velit a
                                                                    donec. Egestas vel sed amet quisque. Massa vulputate at
                                                                    mattis eros .</p>
                                                            </div>
                                                            <div class="right_product_heading mt-60">
                                                                <div class="rp-heading fs-18 fw-500 text-primary">Products</div>
                                                            </div>
            
            
                                                            <div class="smart-system-slider swiper mt-20">
                                                                <div class="swiper-wrapper">
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-2.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-3.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
            
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-4.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
            
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-5.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
            
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-1.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-2.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
            
                                                                    </div>
            
            
            
                                                                </div>
                                                                <div class="smart-system-pagination swiper-pagination"></div>
            
                                                            </div>
            
            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
            
                                        </div>
                                        <div class="data-text " id="data5">
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
                                                                <h4 class="heading fs-76 fw-600 text-primary">Aluminium Casting </h4>
                                                                    <button class="arrow-btn">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                            height="12" viewBox="0 0 12 12" fill="none">
                                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                d="M10.8414 0.000685853C11.0555 0.000818957 11.2607 0.0859022 11.412 0.237247C11.5634 0.388591 11.6485 0.593821 11.6486 0.807855L11.6486 9.94562C11.6524 10.054 11.6344 10.1621 11.5955 10.2633C11.5567 10.3646 11.4979 10.457 11.4225 10.5351C11.3472 10.6131 11.2569 10.6752 11.1571 10.7175C11.0573 10.7599 10.9499 10.7818 10.8414 10.7818C10.733 10.7818 10.6256 10.7599 10.5258 10.7175C10.426 10.6752 10.3357 10.6131 10.2603 10.5351C10.185 10.457 10.1262 10.3646 10.0873 10.2633C10.0485 10.1621 10.0304 10.054 10.0343 9.94562L10.0343 2.75724L1.37893 11.4126C1.22746 11.5641 1.02202 11.6491 0.807816 11.6491C0.593609 11.6491 0.388174 11.5641 0.236706 11.4126C0.085238 11.2611 0.000145596 11.0557 0.000145295 10.8415C0.000145668 10.6273 0.0852382 10.4218 0.236707 10.2704L8.89205 1.61502L1.70368 1.61502C1.59528 1.61885 1.48723 1.6008 1.38596 1.56196C1.28469 1.52312 1.19228 1.46428 1.11424 1.38895C1.0362 1.31362 0.974139 1.22334 0.93175 1.12351C0.88936 1.02367 0.867514 0.916316 0.867514 0.807853C0.867514 0.69939 0.88936 0.592038 0.931749 0.492201C0.974139 0.392364 1.0362 0.302087 1.11424 0.226757C1.19228 0.151427 1.28469 0.0925854 1.38596 0.0537445C1.48723 0.0149033 1.59528 -0.0031422 1.70368 0.000683838L10.8414 0.000685853Z"
                                                                                fill="white" />
                                                                        </svg>
                                                                    </button>
                                                            </div>
                                                            <div class="smart_system_right_content fw-300 pt-10 text-gray">
                                                                <p>Lorem ipsum dolor sit amet consectetur. Quis nisl lacinia
                                                                    purus est commodo tristique posuere. Cras ac lacus
                                                                    fringilla amet eu. Purus tincidunt tempus diam ac massa
                                                                    nibh id. Nunc sit massa risus venenatis urna velit a
                                                                    donec. Egestas vel sed amet quisque. Massa vulputate at
                                                                    mattis eros .</p>
                                                            </div>
                                                            <div class="right_product_heading mt-60">
                                                                <div class="rp-heading fs-18 fw-500 text-primary">Products</div>
                                                            </div>
            
            
                                                            <div class="smart-system-slider swiper mt-20">
                                                                <div class="swiper-wrapper">
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-2.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-3.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
            
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-4.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
            
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-5.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
            
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-1.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-2.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
            
                                                                    </div>
            
            
            
                                                                </div>
                                                                <div class="smart-system-pagination swiper-pagination"></div>
            
                                                            </div>
            
            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
            
                                        </div>
                                        <div class="data-text " id="data6">
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
                                                                <h4 class="heading fs-76 fw-600 text-primary">Investment Casting </h4>
                                                                    <button class="arrow-btn">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                            height="12" viewBox="0 0 12 12" fill="none">
                                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                d="M10.8414 0.000685853C11.0555 0.000818957 11.2607 0.0859022 11.412 0.237247C11.5634 0.388591 11.6485 0.593821 11.6486 0.807855L11.6486 9.94562C11.6524 10.054 11.6344 10.1621 11.5955 10.2633C11.5567 10.3646 11.4979 10.457 11.4225 10.5351C11.3472 10.6131 11.2569 10.6752 11.1571 10.7175C11.0573 10.7599 10.9499 10.7818 10.8414 10.7818C10.733 10.7818 10.6256 10.7599 10.5258 10.7175C10.426 10.6752 10.3357 10.6131 10.2603 10.5351C10.185 10.457 10.1262 10.3646 10.0873 10.2633C10.0485 10.1621 10.0304 10.054 10.0343 9.94562L10.0343 2.75724L1.37893 11.4126C1.22746 11.5641 1.02202 11.6491 0.807816 11.6491C0.593609 11.6491 0.388174 11.5641 0.236706 11.4126C0.085238 11.2611 0.000145596 11.0557 0.000145295 10.8415C0.000145668 10.6273 0.0852382 10.4218 0.236707 10.2704L8.89205 1.61502L1.70368 1.61502C1.59528 1.61885 1.48723 1.6008 1.38596 1.56196C1.28469 1.52312 1.19228 1.46428 1.11424 1.38895C1.0362 1.31362 0.974139 1.22334 0.93175 1.12351C0.88936 1.02367 0.867514 0.916316 0.867514 0.807853C0.867514 0.69939 0.88936 0.592038 0.931749 0.492201C0.974139 0.392364 1.0362 0.302087 1.11424 0.226757C1.19228 0.151427 1.28469 0.0925854 1.38596 0.0537445C1.48723 0.0149033 1.59528 -0.0031422 1.70368 0.000683838L10.8414 0.000685853Z"
                                                                                fill="white" />
                                                                        </svg>
                                                                    </button>
                                                            </div>
                                                            <div class="smart_system_right_content fw-300 pt-10 text-gray">
                                                                <p>Lorem ipsum dolor sit amet consectetur. Quis nisl lacinia
                                                                    purus est commodo tristique posuere. Cras ac lacus
                                                                    fringilla amet eu. Purus tincidunt tempus diam ac massa
                                                                    nibh id. Nunc sit massa risus venenatis urna velit a
                                                                    donec. Egestas vel sed amet quisque. Massa vulputate at
                                                                    mattis eros .</p>
                                                            </div>
                                                            <div class="right_product_heading mt-60">
                                                                <div class="rp-heading fs-18 fw-500 text-primary">Products</div>
                                                            </div>
            
            
                                                            <div class="smart-system-slider swiper mt-20">
                                                                <div class="swiper-wrapper">
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-2.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-3.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
            
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-4.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
            
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-5.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
            
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-1.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-2.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
            
                                                                    </div>
            
            
            
                                                                </div>
                                                                <div class="smart-system-pagination swiper-pagination"></div>
            
                                                            </div>
            
            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
            
                                        </div>
                                        <div class="data-text " id="data7">
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
                                                                <h4 class="heading fs-76 fw-600 text-primary">Assembled Components </h4>
                                                                    <button class="arrow-btn">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                            height="12" viewBox="0 0 12 12" fill="none">
                                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                d="M10.8414 0.000685853C11.0555 0.000818957 11.2607 0.0859022 11.412 0.237247C11.5634 0.388591 11.6485 0.593821 11.6486 0.807855L11.6486 9.94562C11.6524 10.054 11.6344 10.1621 11.5955 10.2633C11.5567 10.3646 11.4979 10.457 11.4225 10.5351C11.3472 10.6131 11.2569 10.6752 11.1571 10.7175C11.0573 10.7599 10.9499 10.7818 10.8414 10.7818C10.733 10.7818 10.6256 10.7599 10.5258 10.7175C10.426 10.6752 10.3357 10.6131 10.2603 10.5351C10.185 10.457 10.1262 10.3646 10.0873 10.2633C10.0485 10.1621 10.0304 10.054 10.0343 9.94562L10.0343 2.75724L1.37893 11.4126C1.22746 11.5641 1.02202 11.6491 0.807816 11.6491C0.593609 11.6491 0.388174 11.5641 0.236706 11.4126C0.085238 11.2611 0.000145596 11.0557 0.000145295 10.8415C0.000145668 10.6273 0.0852382 10.4218 0.236707 10.2704L8.89205 1.61502L1.70368 1.61502C1.59528 1.61885 1.48723 1.6008 1.38596 1.56196C1.28469 1.52312 1.19228 1.46428 1.11424 1.38895C1.0362 1.31362 0.974139 1.22334 0.93175 1.12351C0.88936 1.02367 0.867514 0.916316 0.867514 0.807853C0.867514 0.69939 0.88936 0.592038 0.931749 0.492201C0.974139 0.392364 1.0362 0.302087 1.11424 0.226757C1.19228 0.151427 1.28469 0.0925854 1.38596 0.0537445C1.48723 0.0149033 1.59528 -0.0031422 1.70368 0.000683838L10.8414 0.000685853Z"
                                                                                fill="white" />
                                                                        </svg>
                                                                    </button>
                                                            </div>
                                                            <div class="smart_system_right_content fw-300 pt-10 text-gray">
                                                                <p>Lorem ipsum dolor sit amet consectetur. Quis nisl lacinia
                                                                    purus est commodo tristique posuere. Cras ac lacus
                                                                    fringilla amet eu. Purus tincidunt tempus diam ac massa
                                                                    nibh id. Nunc sit massa risus venenatis urna velit a
                                                                    donec. Egestas vel sed amet quisque. Massa vulputate at
                                                                    mattis eros .</p>
                                                            </div>
                                                            <div class="right_product_heading mt-60">
                                                                <div class="rp-heading fs-18 fw-500 text-primary">Products</div>
                                                            </div>
            
            
                                                            <div class="smart-system-slider swiper mt-20">
                                                                <div class="swiper-wrapper">
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-2.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-3.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
            
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-4.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
            
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-5.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
            
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-1.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
                                                                    </div>
                                                                    <div class="swiper-slide">
                                                                        <div class="smart_system_slider_right_inner">
                                                                            <div class="smart_system_slider_img">
                                                                                <img src="assets/images/home-page/smart-system/right-btm-slider/product-2.webp"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="prod-heading fs-20 fw-300 text-gray">Lorem Ipsum </div>
            
                                                                        </div>
            
                                                                    </div>
            
            
            
                                                                </div>
                                                                <div class="smart-system-pagination swiper-pagination"></div>
            
                                                            </div>
            
            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Smart Systems Section End -->

            <!-- Testimonials Section Start -->
            <section class="testimonials__section pos-relative">
                <div class="testimonial-bg">
                    <img class="img-fluid" src="assets/images/home-page/testimonials/testimonial-bg.webp" alt="">
                </div>
                <div class="custom-container">
                    <div class="testimonials__inner">
                        <div class="row align-items-center">
                            <div class="col-12 col-xl-5 col-md-12 col-lg-6">
                                <div class="testimonials_left">
                                    <div class="custom-heading">
                                        <div class="sub_heading fs-24 fw-300 mb-10 text-dark-gray"> testimonials </div>
                                        <h4 class="heading fs-76 fw-600 text-primary"> 
                                            Clientele
                                        </h4>
                                    </div>
                                    <div class="testimonials_cnt_slider swiper">
                                        <div class="swiper-wrapper">
                                            <!-- Slide -->
                                            <div class="swiper-slide">
                                                <div class="content__area">
                                                    <div class="quote_icon mt-50">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="76" height="60" viewBox="0 0 76 60" fill="none">
                                                            <path d="M25.0226 28.1505H6.59972C7.18103 24.2793 8.56334 20.5719 10.6584 17.2651C12.7534 13.9583 15.515 11.1248 18.767 8.94559L24.3658 5.19219L20.9252 0L15.3264 3.75339C10.6136 6.89397 6.74894 11.1493 4.07535 16.1419C1.40176 21.1344 0.00189886 26.7097 0 32.373V53.1731C0 54.8322 0.659076 56.4233 1.83224 57.5965C3.0054 58.7697 4.59655 59.4287 6.25566 59.4287H25.0226C26.6817 59.4287 28.2729 58.7697 29.446 57.5965C30.6192 56.4233 31.2783 54.8322 31.2783 53.1731V34.4061C31.2783 32.747 30.6192 31.1559 29.446 29.9827C28.2729 28.8095 26.6817 28.1505 25.0226 28.1505ZM68.8122 28.1505H50.3893C50.9706 24.2793 52.3529 20.5719 54.448 17.2651C56.543 13.9583 59.3046 11.1248 62.5566 8.94559L68.1554 5.19219L64.746 0L59.116 3.75339C54.4032 6.89397 50.5385 11.1493 47.8649 16.1419C45.1914 21.1344 43.7915 26.7097 43.7896 32.373V53.1731C43.7896 54.8322 44.4487 56.4233 45.6218 57.5965C46.795 58.7697 48.3862 59.4287 50.0453 59.4287H68.8122C70.4713 59.4287 72.0625 58.7697 73.2356 57.5965C74.4088 56.4233 75.0679 54.8322 75.0679 53.1731V34.4061C75.0679 32.747 74.4088 31.1559 73.2356 29.9827C72.0625 28.8095 70.4713 28.1505 68.8122 28.1505Z" fill="#BFC0C7"/>
                                                        </svg>
                                                    </div>
                                                    <div class="cnt__wrap fs-16 fw-300 mt-30 text-gray">
                                                        <p>
                                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem 
                                                            Ipsum has been the industry's standard dummy text ever since the 1500s, when an 
                                                            unknown printer took a galley of
                                                        </p>
                                                    </div>
                                                    <div class="testimonials_person mt-30">
                                                        <h4 class="name fs-24 fw-500 mb-10 text-dark">Rajesh Kumar</h4>
                                                        <div class="designation fs-16 fw-500 text-dark">Product Manager at Hush</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="swiper-slide">
                                                <div class="content__area">
                                                    <div class="quote_icon mt-50">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="76" height="60" viewBox="0 0 76 60" fill="none">
                                                            <path d="M25.0226 28.1505H6.59972C7.18103 24.2793 8.56334 20.5719 10.6584 17.2651C12.7534 13.9583 15.515 11.1248 18.767 8.94559L24.3658 5.19219L20.9252 0L15.3264 3.75339C10.6136 6.89397 6.74894 11.1493 4.07535 16.1419C1.40176 21.1344 0.00189886 26.7097 0 32.373V53.1731C0 54.8322 0.659076 56.4233 1.83224 57.5965C3.0054 58.7697 4.59655 59.4287 6.25566 59.4287H25.0226C26.6817 59.4287 28.2729 58.7697 29.446 57.5965C30.6192 56.4233 31.2783 54.8322 31.2783 53.1731V34.4061C31.2783 32.747 30.6192 31.1559 29.446 29.9827C28.2729 28.8095 26.6817 28.1505 25.0226 28.1505ZM68.8122 28.1505H50.3893C50.9706 24.2793 52.3529 20.5719 54.448 17.2651C56.543 13.9583 59.3046 11.1248 62.5566 8.94559L68.1554 5.19219L64.746 0L59.116 3.75339C54.4032 6.89397 50.5385 11.1493 47.8649 16.1419C45.1914 21.1344 43.7915 26.7097 43.7896 32.373V53.1731C43.7896 54.8322 44.4487 56.4233 45.6218 57.5965C46.795 58.7697 48.3862 59.4287 50.0453 59.4287H68.8122C70.4713 59.4287 72.0625 58.7697 73.2356 57.5965C74.4088 56.4233 75.0679 54.8322 75.0679 53.1731V34.4061C75.0679 32.747 74.4088 31.1559 73.2356 29.9827C72.0625 28.8095 70.4713 28.1505 68.8122 28.1505Z" fill="#BFC0C7"/>
                                                        </svg>
                                                    </div>
                                                    <div class="cnt__wrap fs-16 fw-300 mt-30 text-gray">
                                                        <p>
                                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem 
                                                            Ipsum has been the industry's standard dummy text ever since the 1500s, when an 
                                                            unknown printer took a galley of
                                                        </p>
                                                    </div>
                                                    <div class="testimonials_person mt-30">
                                                        <h4 class="name fs-24 fw-500 mb-10 text-dark">Rajesh Kumar</h4>
                                                        <div class="designation fs-16 fw-500 text-dark">Product Manager at Hush</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="swiper-slide">
                                                <div class="content__area">
                                                    <div class="quote_icon mt-50">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="76" height="60" viewBox="0 0 76 60" fill="none">
                                                            <path d="M25.0226 28.1505H6.59972C7.18103 24.2793 8.56334 20.5719 10.6584 17.2651C12.7534 13.9583 15.515 11.1248 18.767 8.94559L24.3658 5.19219L20.9252 0L15.3264 3.75339C10.6136 6.89397 6.74894 11.1493 4.07535 16.1419C1.40176 21.1344 0.00189886 26.7097 0 32.373V53.1731C0 54.8322 0.659076 56.4233 1.83224 57.5965C3.0054 58.7697 4.59655 59.4287 6.25566 59.4287H25.0226C26.6817 59.4287 28.2729 58.7697 29.446 57.5965C30.6192 56.4233 31.2783 54.8322 31.2783 53.1731V34.4061C31.2783 32.747 30.6192 31.1559 29.446 29.9827C28.2729 28.8095 26.6817 28.1505 25.0226 28.1505ZM68.8122 28.1505H50.3893C50.9706 24.2793 52.3529 20.5719 54.448 17.2651C56.543 13.9583 59.3046 11.1248 62.5566 8.94559L68.1554 5.19219L64.746 0L59.116 3.75339C54.4032 6.89397 50.5385 11.1493 47.8649 16.1419C45.1914 21.1344 43.7915 26.7097 43.7896 32.373V53.1731C43.7896 54.8322 44.4487 56.4233 45.6218 57.5965C46.795 58.7697 48.3862 59.4287 50.0453 59.4287H68.8122C70.4713 59.4287 72.0625 58.7697 73.2356 57.5965C74.4088 56.4233 75.0679 54.8322 75.0679 53.1731V34.4061C75.0679 32.747 74.4088 31.1559 73.2356 29.9827C72.0625 28.8095 70.4713 28.1505 68.8122 28.1505Z" fill="#BFC0C7"/>
                                                        </svg>
                                                    </div>
                                                    <div class="cnt__wrap fs-16 fw-300 mt-30 text-gray">
                                                        <p>
                                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem 
                                                            Ipsum has been the industry's standard dummy text ever since the 1500s, when an 
                                                            unknown printer took a galley of
                                                        </p>
                                                    </div>
                                                    <div class="testimonials_person mt-30">
                                                        <h4 class="name fs-24 fw-500 mb-10 text-dark">Rajesh Kumar</h4>
                                                        <div class="designation fs-16 fw-500 text-dark">Product Manager at Hush</div>
                                                    </div>
                                                </div>
                                            </div>
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

                                            <div class="swiper-pagination"></div>
                                        </div>

                                        <!-- CTA Btn -->
                                        <div class="testimonial-btn mt-30 d-flex align-items-center">
                                            <a class="primary_btn" href="javascript:void(0);">
                                                <span class="primary_btn_text"> Read All
                                                    <span class="primary_btn_icon">
                                                        <img class="img-fluid" src="assets/images/arrow-icon-white.svg" alt="">
                                                    </span>      
                                                </span>
                                            </a>
                                            <a class="download-btn" href="javascript:void(0);">
                                                <span class="download_btn_inr"> 
                                                    <span class="download_btn_icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="11" viewBox="0 0 10 11" fill="none">
                                                            <path d="M0.632812 9.875L0.632812 1.09766L8.23535 5.48633L0.632812 9.875Z" stroke="#EA1C25" stroke-width="1.26697"/>
                                                        </svg>
                                                    </span>
                                                    <div class="testimonial_vid-btn">Video Testimonials</div>
                                                </span>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-xl-7 col-md-12 col-lg-6">
                                <div class="testimonials_right">
                                    <div class="testimonials__wrapper">
                                        <!-- Top Slider -->
                                        <div class="testimonials_logo_slider swiper testimonial_logo_top_slider">
                                            <div class="swiper-wrapper">
                                                <!-- Slide -->
                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="assets/images/home-page/testimonials/testimonials-icon1.webp" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="assets/images/home-page/testimonials/testimonials-icon2.webp" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="assets/images/home-page/testimonials/testimonials-icon3.webp" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="assets/images/home-page/testimonials/testimonials-icon4.webp" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="assets/images/home-page/testimonials/testimonials-icon5.webp" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="assets/images/home-page/testimonials/testimonials-icon6.webp" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="assets/images/home-page/testimonials/testimonials-icon1.webp" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="assets/images/home-page/testimonials/testimonials-icon2.webp" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="assets/images/home-page/testimonials/testimonials-icon3.webp" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <!-- Center Slider -->
                                        <div class="testimonials_logo_slider swiper testimonial_logo_center_slider">
                                            <div class="swiper-wrapper">
                                                <!-- Slide -->
                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="assets/images/home-page/testimonials/testimonials-icon1.webp" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="assets/images/home-page/testimonials/testimonials-icon2.webp" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="assets/images/home-page/testimonials/testimonials-icon3.webp" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="assets/images/home-page/testimonials/testimonials-icon4.webp" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="assets/images/home-page/testimonials/testimonials-icon5.webp" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="assets/images/home-page/testimonials/testimonials-icon6.webp" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="assets/images/home-page/testimonials/testimonials-icon1.webp" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="assets/images/home-page/testimonials/testimonials-icon2.webp" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="assets/images/home-page/testimonials/testimonials-icon3.webp" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <!-- Bottom Slider -->
                                        <div class="testimonials_logo_slider swiper testimonial_logo_bottom_slider">
                                            <div class="swiper-wrapper">
                                                <!-- Slide -->
                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="assets/images/home-page/testimonials/testimonials-icon1.webp" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="assets/images/home-page/testimonials/testimonials-icon2.webp" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="assets/images/home-page/testimonials/testimonials-icon3.webp" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="assets/images/home-page/testimonials/testimonials-icon4.webp" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="assets/images/home-page/testimonials/testimonials-icon5.webp" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="assets/images/home-page/testimonials/testimonials-icon6.webp" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="assets/images/home-page/testimonials/testimonials-icon1.webp" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="assets/images/home-page/testimonials/testimonials-icon2.webp" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="swiper-slide">
                                                    <div class="single_item">
                                                        <div class="img__wrap">
                                                            <img class="img-fluid" src="assets/images/home-page/testimonials/testimonials-icon3.webp" alt="">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Testimonials Section End -->

            <!-- Sustainability Section Start -->
            <section class="sustainability__section pt-60 pb-100 pos-relative">
                <div class="bg-img">
                    <img class="img-fluid" src="assets/images/home-page/sustainability/bg-img.webp" alt="">
                </div>
                <div class="custom-container">
                    <div class="sustainability_inner">
                        <div class="sustainability_col sustainability_col_top">
                            <div class="custom-heading">
                                <div class="sub_heading fs-24 fw-300 mb-10 text-dark-gray"> Sustainability </div>
                                <h4 class="heading fs-76 fw-600 text-primary">We Care</h4>
                                <div class="sustain_cnt__wrap fs-16 text-gray">
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur. Velit 
                                        massa quis neque lacus. Non metus tincidunt 
                                        elementum pellentesque
                                    </p>
                                </div>
                                <div class="sustainability-btn mt-45">
                                    <a class="primary_btn" href="javascript:void(0);">
                                        <span class="primary_btn_text"> Explore More
                                            <span class="primary_btn_icon">
                                                <img class="img-fluid" src="assets/images/arrow-icon-white.svg" alt="">
                                            </span>      
                                        </span>
                                    </a>
                                </div>
                            </div>

                            <div class="sustainability_card">
                                <img class="img-fluid" src="assets/images/home-page/sustainability/sustainability-img1.webp" alt="">
                                <div class="content_area d-flex">
                                    <div class="left-block">
                                        <img class="img-fluid" src="assets/images/tick-icon-white.svg" alt="">
                                    </div>
                                    <div class="cnt__wrap fs-24">
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sustainability_col sustainability_col_center">
                            <div class="sustainability_card">
                                <img class="img-fluid" src="assets/images/home-page/sustainability/sustainability-img2.webp" alt="">
                                <div class="content_area d-flex">
                                    <div class="left-block">
                                        <img class="img-fluid" src="assets/images/tick-icon-white.svg" alt="">
                                    </div>
                                    <div class="cnt__wrap fs-24">
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sustainability_col sustainability_col_bottom">
                            <div class="sustain_cnt__wrap fs-16 text-gray">
                                <p>
                                    Lorem ipsum dolor sit amet consectetur. Velit 
                                    massa quis neque lacus. Non metus tincidunt 
                                    elementum pellentesque
                                </p>
                            </div>

                            <div class="sustainability_card">
                                <img class="img-fluid" src="assets/images/home-page/sustainability/sustainability-img3.webp" alt="">
                                <div class="content_area d-flex">
                                    <div class="left-block">
                                        <img class="img-fluid" src="assets/images/tick-icon-white.svg" alt="">
                                    </div>
                                    <div class="cnt__wrap fs-24">
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <!-- Sustainability Section End -->

            <!-- Social Impact Section Start -->
            <section class="social__impact_section pos-relative pt-50 pb-90">
                <div class="section-overlay"></div>
                <div class="custom-container">
                    <div class="social_impact_heading">
                        <div class="custom-heading">
                            <div class="sub_heading fs-24 fw-300 mb-10 text-dark-gray"> csr </div>
                            <h4 class="heading fs-76 fw-600 text-primary"> 
                                Driven by Social Impact
                            </h4>
                        </div>
                    </div>
            
                    <div class="social_impact_inner pt-50">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <div class="social_tab_mobile">
                                    <div class="social_tab_slider swiper">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div data-toggle="tab" class="social_impact_tab active" data-id="social_impact_tab_0">
                                                    <a class="item d-flex align-items-center" href="javascript:void(0)">
                                                        <div class="social_impact-icon">
                                                            <img class="img-fluid" src="assets/images/home-page/social-impact/social-impact-tabing-logo.webp" alt="">
                                                        </div>
                                                        <div class="cnt__wrap">
                                                            <div class="tab_heading fs-24 fw-500">Women Empowerment</div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div data-toggle="tab" class="social_impact_tab" data-id="social_impact_tab_1">
                                                    <a class="item d-flex align-items-center" href="javascript:void(0)">
                                                        <div class="social_impact-icon">
                                                            <img class="img-fluid" src="assets/images/home-page/social-impact/social-impact-tabing-logo.webp" alt="">
                                                        </div>
                                                        <div class="cnt__wrap">
                                                            <div class="tab_heading fs-24 fw-500">Education Support</div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div data-toggle="tab" class="social_impact_tab" data-id="social_impact_tab_2">
                                                    <a class="item d-flex align-items-center" href="javascript:void(0)">
                                                        <div class="social_impact-icon">
                                                            <img class="img-fluid" src="assets/images/home-page/social-impact/social-impact-tabing-logo.webp" alt="">
                                                        </div>
                                                        <div class="cnt__wrap">
                                                            <div class="tab_heading fs-24 fw-500">Community Healthcare</div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div data-toggle="tab" class="social_impact_tab" data-id="social_impact_tab_3">
                                                    <a class="item d-flex align-items-center" href="javascript:void(0)">
                                                        <div class="social_impact-icon">
                                                            <img class="img-fluid" src="assets/images/home-page/social-impact/social-impact-tabing-logo.webp" alt="">
                                                        </div>
                                                        <div class="cnt__wrap">
                                                            <div class="tab_heading fs-24 fw-500">Community Healthcare</div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div data-toggle="tab" class="social_impact_tab" data-id="social_impact_tab_4">
                                                    <a class="item d-flex align-items-center" href="javascript:void(0)">
                                                        <div class="social_impact-icon">
                                                            <img class="img-fluid" src="assets/images/home-page/social-impact/social-impact-tabing-logo.webp" alt="">
                                                        </div>
                                                        <div class="cnt__wrap">
                                                            <div class="tab_heading fs-24 fw-500">Education Support</div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div data-toggle="tab" class="social_impact_tab" data-id="social_impact_tab_5">
                                                    <a class="item d-flex align-items-center" href="javascript:void(0)">
                                                        <div class="social_impact-icon">
                                                            <img class="img-fluid" src="assets/images/home-page/social-impact/social-impact-tabing-logo.webp" alt="">
                                                        </div>
                                                        <div class="cnt__wrap">
                                                            <div class="tab_heading fs-24 fw-500">Community Healthcare</div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="social_tab_pagination"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-4 col-xl-3">
                                <div class="social_impact_tabbing pos-relative">
                                    <ul class="fs-20 fw-400 text-white d-flex align-items-center">
                                        <li data-toggle="tab" class="social_impact_tab active" data-id="social_impact_tab_0">
                                            <a class="d-flex align-items-center" href="javascript:void(0)">
                                                <div class="social_impact-icon">
                                                    <img class="img-fluid" src="assets/images/home-page/social-impact/social-impact-tabing-logo.webp" alt="">
                                                </div>
                                                <div class="cnt__wrap">
                                                    <div class="tab_heading fs-24 fw-500">Women Empowerment</div>
                                                </div>
                                            </a>
                                        </li>

                                        <li data-toggle="tab" class="social_impact_tab" data-id="social_impact_tab_1">
                                            <a class="d-flex align-items-center" href="javascript:void(0)">
                                                <div class="social_impact-icon">
                                                    <img class="img-fluid" src="assets/images/home-page/social-impact/social-impact-tabing-logo.webp" alt="">
                                                </div>
                                                <div class="cnt__wrap">
                                                    <div class="tab_heading fs-24 fw-500">Education Support</div>
                                                </div>
                                            </a>
                                        </li>

                                        <li data-toggle="tab" class="social_impact_tab" data-id="social_impact_tab_2">
                                            <a class="d-flex align-items-center" href="javascript:void(0)">
                                                <div class="social_impact-icon">
                                                    <img class="img-fluid" src="assets/images/home-page/social-impact/social-impact-tabing-logo.webp" alt="">
                                                </div>
                                                <div class="cnt__wrap">
                                                    <div class="tab_heading fs-24 fw-500">Community Healthcare</div>
                                                </div>
                                            </a>
                                        </li>

                                        <li data-toggle="tab" class="social_impact_tab" data-id="social_impact_tab_3">
                                            <a class="d-flex align-items-center" href="javascript:void(0)">
                                                <div class="social_impact-icon">
                                                    <img class="img-fluid" src="assets/images/home-page/social-impact/social-impact-tabing-logo.webp" alt="">
                                                </div>
                                                <div class="cnt__wrap">
                                                    <div class="tab_heading fs-24 fw-500">Community Healthcare</div>
                                                </div>
                                            </a>
                                        </li>

                                        <li data-toggle="tab" class="social_impact_tab" data-id="social_impact_tab_4">
                                            <a class="d-flex align-items-center" href="javascript:void(0)">
                                                <div class="social_impact-icon">
                                                    <img class="img-fluid" src="assets/images/home-page/social-impact/social-impact-tabing-logo.webp" alt="">
                                                </div>
                                                <div class="cnt__wrap">
                                                    <div class="tab_heading fs-24 fw-500">Education Support</div>
                                                </div>
                                            </a>
                                        </li>

                                        <li data-toggle="tab" class="social_impact_tab" data-id="social_impact_tab_5">
                                            <a class="d-flex align-items-center" href="javascript:void(0)">
                                                <div class="social_impact-icon">
                                                    <img class="img-fluid" src="assets/images/home-page/social-impact/social-impact-tabing-logo.webp" alt="">
                                                </div>
                                                <div class="cnt__wrap">
                                                    <div class="tab_heading fs-24 fw-500">Community Healthcare</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                
                            </div>

                            <div class="col-12 col-md-12 col-lg-8 col-xl-9">
                                <div class="social_impact_wrapper">
                                    <div class="social_impact_details tab-active" data-id="social_impact_tab_0">
                                        <div class="single_item pos-relative">
                                            <div class="img__wrap">
                                                <img class="img-fluid" src="assets/images/home-page/social-impact/social-impact-bg.webp" alt="">
                                            </div>
                                            <div class="content__area">
                                                <div class="social_impact-icon">
                                                    <img class="img-fluid" src="assets/images/home-page/social-impact/social-impact-tabing-logo.webp" alt="">
                                                </div>
                                                <h5 class="fs-36 fw-600 mt-35 text-white"> Women Empowerment </h5>
                                                <div class="cnt__wrap fs-22 fw-300 mt-30 text-white">
                                                    <p>
                                                        Lorem ipsum dolor sit amet consectetur. Eu suspendisse eget feugiat dolor proin risus. Sed nam velit mattis 
                                                        neque. Nulla mauris arcu quisque praesent tincidunt semper adipiscing orci.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="social_impact_details" data-id="social_impact_tab_1">
                                        <div class="single_item pos-relative">
                                            <div class="img__wrap">
                                                <img class="img-fluid" src="assets/images/home-page/social-impact/social-impact-bg.webp" alt="">
                                            </div>
                                            <div class="content__area">
                                                <div class="social_impact-icon">
                                                    <img class="img-fluid" src="assets/images/home-page/social-impact/social-impact-tabing-logo.webp" alt="">
                                                </div>
                                                <h5 class="fs-36 fw-600 mt-35 text-white"> Education Support </h5>
                                                <div class="cnt__wrap fs-22 fw-300 mt-30 text-white">
                                                    <p>
                                                        Lorem ipsum dolor sit amet consectetur. Eu suspendisse eget feugiat dolor proin risus. Sed nam velit mattis 
                                                        neque. Nulla mauris arcu quisque praesent tincidunt semper adipiscing orci.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="social_impact_details" data-id="social_impact_tab_2">
                                        <div class="single_item pos-relative">
                                            <div class="img__wrap">
                                                <img class="img-fluid" src="assets/images/home-page/social-impact/social-impact-bg.webp" alt="">
                                            </div>
                                            <div class="content__area">
                                                <div class="social_impact-icon">
                                                    <img class="img-fluid" src="assets/images/home-page/social-impact/social-impact-tabing-logo.webp" alt="">
                                                </div>
                                                <h5 class="fs-36 fw-600 mt-35 text-white"> Community Healthcare </h5>
                                                <div class="cnt__wrap fs-22 fw-300 mt-30 text-white">
                                                    <p>
                                                        Lorem ipsum dolor sit amet consectetur. Eu suspendisse eget feugiat dolor proin risus. Sed nam velit mattis 
                                                        neque. Nulla mauris arcu quisque praesent tincidunt semper adipiscing orci.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="social_impact_details" data-id="social_impact_tab_3">
                                        <div class="single_item pos-relative">
                                            <div class="img__wrap">
                                                <img class="img-fluid" src="assets/images/home-page/social-impact/social-impact-bg.webp" alt="">
                                            </div>
                                            <div class="content__area">
                                                <div class="social_impact-icon">
                                                    <img class="img-fluid" src="assets/images/home-page/social-impact/social-impact-tabing-logo.webp" alt="">
                                                </div>
                                                <h5 class="fs-36 fw-600 mt-35 text-white"> Community Healthcare4 </h5>
                                                <div class="cnt__wrap fs-22 fw-300 mt-30 text-white">
                                                    <p>
                                                        Lorem ipsum dolor sit amet consectetur. Eu suspendisse eget feugiat dolor proin risus. Sed nam velit mattis 
                                                        neque. Nulla mauris arcu quisque praesent tincidunt semper adipiscing orci.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="social_impact_details" data-id="social_impact_tab_4">
                                        <div class="single_item pos-relative">
                                            <div class="img__wrap">
                                                <img class="img-fluid" src="assets/images/home-page/social-impact/social-impact-bg.webp" alt="">
                                            </div>
                                            <div class="content__area">
                                                <div class="social_impact-icon">
                                                    <img class="img-fluid" src="assets/images/home-page/social-impact/social-impact-tabing-logo.webp" alt="">
                                                </div>
                                                <h5 class="fs-36 fw-600 mt-35 text-white"> Education Support5 </h5>
                                                <div class="cnt__wrap fs-22 fw-300 mt-30 text-white">
                                                    <p>
                                                        Lorem ipsum dolor sit amet consectetur. Eu suspendisse eget feugiat dolor proin risus. Sed nam velit mattis 
                                                        neque. Nulla mauris arcu quisque praesent tincidunt semper adipiscing orci.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="social_impact_details" data-id="social_impact_tab_5">
                                        <div class="single_item pos-relative">
                                            <div class="img__wrap">
                                                <img class="img-fluid" src="assets/images/home-page/social-impact/social-impact-bg.webp" alt="">
                                            </div>
                                            <div class="content__area">
                                                <div class="social_impact-icon">
                                                    <img class="img-fluid" src="assets/images/home-page/social-impact/social-impact-tabing-logo.webp" alt="">
                                                </div>
                                                <h5 class="fs-36 fw-600 mt-35 text-white"> Community Healthcare </h5>
                                                <div class="cnt__wrap fs-22 fw-300 mt-30 text-white">
                                                    <p>
                                                        Lorem ipsum dolor sit amet consectetur. Eu suspendisse eget feugiat dolor proin risus. Sed nam velit mattis 
                                                        neque. Nulla mauris arcu quisque praesent tincidunt semper adipiscing orci.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- Social Impact Section End -->

            <!-- Human Resource Section Start -->
            <section class="human__resource_section pt-60 pb-100 pos-relative">
                <div class="bg-logo">
                    <img class="img-fluid" src="assets/images/home-page/human-resource/bg-logo.webp" alt="">
                </div>
                <div class="custom-container">
                    <div class="human__resource_inner d-flex align-items-center">
                        <div class="human__resource_left">
                            <div class="human__resource_video">
                                <div class="video__area">
                                    <div class="video__container">
                                        <video id="video-about" autoplay muted loop playsinline width="100%" height="auto">
                                            <source src="assets/images/home-page/human-resource/human-resource-vid.mp4" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="human__resource_right">
                            <div class="custom-heading mb-35">
                                <div class="sub_heading fs-24 fw-300 mb-10 text-dark-gray"> HUMAN RESOURCE </div>
                                <h4 class="heading fs-42 fw-600 text-primary"> 
                                    We are a  collective
                                    of technical specialists 
                                    focused on advancing 
                                    performance, reliability, and 
                                    innovation in all our 
                                    solutions.
                                </h4>
                                <div class="cnt__wrap fs-16 fw-400 mt-35 text-gray">
                                    <p>
                                        We value our people and our reputation. At Victora, we put the highest 
                                        ethical standards at the helm of everything we do.
                                    </p>
                                </div>
                            </div>
                            <div class="human_resource-btn">
                                <a class="primary_btn" href="javascript:void(0);">
                                    <span class="primary_btn_text"> Explore More
                                        <span class="primary_btn_icon">
                                            <img class="img-fluid" src="assets/images/arrow-icon-white.svg" alt="">
                                        </span>      
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Human Resource Section End -->

@endsection