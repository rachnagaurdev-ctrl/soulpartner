@php
    $footerButtons = \App\Models\Setting::get('footer_buttons', []);
@endphp
  <footer class="footer">
        <div class="custom-container">
            <div class="footer__row">
                <div class="footer__social_row d-flex align-items-end justify-content-between">
                    <div class="footer_subscribe">
                        <h5 class="fs-22 fw-600 text-white"> Subscribe to our Newsletter </h5>
                        <p class="fs-16 fw-400 text-white-80"> Stay up to date with our latest news and products </p>
                        @livewire('footer-subscription')
                    </div>

                    <div class="footer_social">
                        <div class="cnt__wrap fs-18 fw-700 text-white">
                            <p> stay in touch: </p>
                        </div>
                        <div class="social_icons">
                            <ul class="list-unstyled d-flex">
                                <li><a href="javascript:void(0);">
                                        <img class="img-fluid" src="assets/images/facebook-icon.svg" alt="">
                                </a></li>

                                <li><a href="javascript:void(0);">
                                        <img class="img-fluid" src="assets/images/instagram-icon.svg" alt="">
                                </a></li>

                                <li><a href="javascript:void(0);">
                                        <img class="img-fluid" src="assets/images/linkedin-icon.svg" alt="">
                                </a></li>

                                <li><a href="javascript:void(0);">
                                        <img class="img-fluid" src="assets/images/whatsapp-icon.svg" alt="">
                                </a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="footer__nav pt-30 pb-70">
                    <ul class="footer__col list-unstyled">
                        @foreach($footerButtons as $button)
                        <li> 
                            <a class="text-uppercase" href="{{ $button['url'] ?? '' }}"> {{ $button['label'] ?? '' }} 
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="8" viewBox="0 0 16 8" fill="none">
                                        <path d="M15.5876 4.38248C15.7996 4.17044 15.7996 3.82664 15.5876 3.61459L12.132 0.159041C11.92 -0.0530081 11.5762 -0.0530081 11.3641 0.159041C11.1521 0.37109 11.1521 0.71489 11.3641 0.92694L14.4357 3.99854L11.3641 7.07013C11.1521 7.28218 11.1521 7.62598 11.3641 7.83803C11.5762 8.05008 11.92 8.05008 12.132 7.83803L15.5876 4.38248ZM0 3.99854V4.54152H15.2036V3.99854V3.45555H0V3.99854Z" fill="#FF2931"/>
                                    </svg>
                                </span>
                            </a>
                        </li>
                        @endforeach
                    </ul>

                    <div class="footer_link">
                        <h5 class="flink-heading fs-18 fw-700"> ABOUT US </h5>
                            <div class="footer_acordian_arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="6" viewBox="0 0 10 6" fill="none">
                                  <path d="M8.34359 0.198796C8.60865 -0.0662655 9.0384 -0.0662655 9.30346 0.198796C9.56852 0.463858 9.56852 0.893608 9.30346 1.15867L5.23106 5.23107C4.966 5.49613 4.53625 5.49613 4.27119 5.23107L0.198793 1.15867C-0.066268 0.893607 -0.066268 0.463857 0.198793 0.198796C0.463855 -0.0662662 0.893605 -0.0662662 1.15867 0.198796L4.75113 3.79126L8.34359 0.198796Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <ul class="footer__wrapper list-unstyled">
                                <li>
                                    <a href="javascript:void(0);"> Overview </a>
                                </li>

                                <li>
                                    <a href="javascript:void(0);"> Our Journey </a>
                                </li>

                                <li>
                                    <a href="javascript:void(0);"> Numbers </a>
                                </li>

                                <li>
                                    <a href="javascript:void(0);"> Leadership </a>
                                </li>

                                <li>
                                    <a href="javascript:void(0);"> Sustainability </a>
                                </li>

                                <li>
                                    <a href="javascript:void(0);"> Global Reach </a>
                                </li>

                                <li>
                                    <a href="javascript:void(0);"> Customers </a>
                                </li>
                            </ul>
                    </div>

                    <div class="footer_link">
                            <h5 class="flink-heading fs-18 fw-700"> R&D </h5>
                            <div class="footer_acordian_arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="6" viewBox="0 0 10 6" fill="none">
                                  <path d="M8.34359 0.198796C8.60865 -0.0662655 9.0384 -0.0662655 9.30346 0.198796C9.56852 0.463858 9.56852 0.893608 9.30346 1.15867L5.23106 5.23107C4.966 5.49613 4.53625 5.49613 4.27119 5.23107L0.198793 1.15867C-0.066268 0.893607 -0.066268 0.463857 0.198793 0.198796C0.463855 -0.0662662 0.893605 -0.0662662 1.15867 0.198796L4.75113 3.79126L8.34359 0.198796Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <ul class="footer__wrapper list-unstyled">
                                <li>
                                    <a href="javascript:void(0);"> Research & Development </a>
                                </li>

                                <li>
                                    <a href="javascript:void(0);"> Highlights </a>
                                </li>

                                <li>
                                    <a href="javascript:void(0);"> Deep Dive </a>
                                </li>

                                <li>
                                    <a href="javascript:void(0);"> Thought Leadership </a>
                                </li>
                            </ul>
                    </div>

                    <div class="footer_link">
                            <h5 class="flink-heading fs-18 fw-700"> MANUFACTURING INFRA </h5>
                            <div class="footer_acordian_arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="6" viewBox="0 0 10 6" fill="none">
                                  <path d="M8.34359 0.198796C8.60865 -0.0662655 9.0384 -0.0662655 9.30346 0.198796C9.56852 0.463858 9.56852 0.893608 9.30346 1.15867L5.23106 5.23107C4.966 5.49613 4.53625 5.49613 4.27119 5.23107L0.198793 1.15867C-0.066268 0.893607 -0.066268 0.463857 0.198793 0.198796C0.463855 -0.0662662 0.893605 -0.0662662 1.15867 0.198796L4.75113 3.79126L8.34359 0.198796Z" fill="currentColor"/>
                                </svg>
                            </div>
                        <ul class="footer__wrapper list-unstyled">
                            <li>
                                <a href="javascript:void(0);"> Infra Numbers </a>
                            </li>

                            <li>
                                <a href="javascript:void(0);"> Process Video </a>
                            </li>

                            <li>
                                <a href="javascript:void(0);"> Plant & production </a>
                            </li>

                            <li>
                                <a href="javascript:void(0);"> Certifications </a>
                            </li>

                            <li>
                                <a href="javascript:void(0);"> Downloads </a>
                            </li>
                        </ul>
                    </div>

                    <div class="footer_link">
                            <h5 class="flink-heading fs-18 fw-700"> INDUSTRIES SERVED </h5>
                            <div class="footer_acordian_arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="6" viewBox="0 0 10 6" fill="none">
                                  <path d="M8.34359 0.198796C8.60865 -0.0662655 9.0384 -0.0662655 9.30346 0.198796C9.56852 0.463858 9.56852 0.893608 9.30346 1.15867L5.23106 5.23107C4.966 5.49613 4.53625 5.49613 4.27119 5.23107L0.198793 1.15867C-0.066268 0.893607 -0.066268 0.463857 0.198793 0.198796C0.463855 -0.0662662 0.893605 -0.0662662 1.15867 0.198796L4.75113 3.79126L8.34359 0.198796Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <ul class="footer__wrapper list-unstyled">
                                <li>
                                    <a href="javascript:void(0);"> Automotive </a>
                                </li>

                                <li>
                                    <a href="javascript:void(0);"> Railways </a>
                                </li>

                                <li>
                                    <a href="javascript:void(0);"> Defense </a>
                                </li>

                                <li>
                                    <a href="javascript:void(0);"> Med Tech </a>
                                </li>

                                <li>
                                    <a href="javascript:void(0);"> E-Mobility </a>
                                </li>

                                <li>
                                    <a href="javascript:void(0);"> Consumer Electronics </a>
                                </li>

                                <li>
                                    <a href="javascript:void(0);"> Others </a>
                                </li>
                            </ul>
                    </div>

                    <div class="footer_link">
                            <h5 class="flink-heading fs-18 fw-700"> Resources </h5>
                            <div class="footer_acordian_arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="6" viewBox="0 0 10 6" fill="none">
                                  <path d="M8.34359 0.198796C8.60865 -0.0662655 9.0384 -0.0662655 9.30346 0.198796C9.56852 0.463858 9.56852 0.893608 9.30346 1.15867L5.23106 5.23107C4.966 5.49613 4.53625 5.49613 4.27119 5.23107L0.198793 1.15867C-0.066268 0.893607 -0.066268 0.463857 0.198793 0.198796C0.463855 -0.0662662 0.893605 -0.0662662 1.15867 0.198796L4.75113 3.79126L8.34359 0.198796Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <ul class="footer__wrapper list-unstyled">
                                <li>
                                    <a href="javascript:void(0);"> Watch Videos </a>
                                </li>

                                <li>
                                    <a href="javascript:void(0);"> Downloads </a>
                                </li>

                                <li>
                                    <a href="javascript:void(0);"> Social Media </a>
                                </li>

                                <li>
                                    <a href="javascript:void(0);"> News </a>
                                </li>

                                <li>
                                    <a href="javascript:void(0);"> Blogs </a>
                                </li>

                                <li>
                                    <a href="javascript:void(0);"> Customer Stories </a>
                                </li>

                                <li>
                                    <a href="javascript:void(0);"> Newsletter </a>
                                </li>
                            </ul>
                    </div>

                    <div class="footer_link">
                            <h5 class="flink-heading fs-18 fw-700"> Quick Links </h5>
                            <div class="footer_acordian_arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="6" viewBox="0 0 10 6" fill="none">
                                  <path d="M8.34359 0.198796C8.60865 -0.0662655 9.0384 -0.0662655 9.30346 0.198796C9.56852 0.463858 9.56852 0.893608 9.30346 1.15867L5.23106 5.23107C4.966 5.49613 4.53625 5.49613 4.27119 5.23107L0.198793 1.15867C-0.066268 0.893607 -0.066268 0.463857 0.198793 0.198796C0.463855 -0.0662662 0.893605 -0.0662662 1.15867 0.198796L4.75113 3.79126L8.34359 0.198796Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <ul class="footer__wrapper list-unstyled">
                                <li>
                                    <a href="javascript:void(0);"> Contact Us </a>
                                </li>

                                <li>
                                    <a href="javascript:void(0);"> CSR </a>
                                </li>

                                <li>
                                    <a href="javascript:void(0);"> Terms & Conditions </a>
                                </li>

                                <li>
                                    <a href="javascript:void(0);"> Privacy Policy </a>
                                </li>

                                <li>
                                    <a href="javascript:void(0);"> Sitemap </a>
                                </li>
                            </ul>
                    </div>
                </div>

                <div class="footer__bottom">
                    <div class="cnt__wrap fw-400 text-light-gray">
                        <p> Copyright © 2026 , Inc. All rights reserved. </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>