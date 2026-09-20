 <section class="about-cta-section">
            <div class="container">
                <div class="about-cta-card">
                    <!-- Silhouette/Romantic photo at sunset right -->
                    <img src="{{isset($data['image']) && !empty($data['image']) ? get_storage_url($data['image']) : asset('assets/images/contact-couple.jpg')}}" alt="Romantic companion sunset" class="cta-backdrop-img">
                    <div class="cta-gradient-overlay"></div>

                    <!-- Content Layout -->
                    <div class="cta-content-container">
                        <!-- Left handwritten script note -->
                        <div class="cta-script-note">
                            {!! $data['tagline'] ?? ''!!}
                            <span class="cta-heart">♡</span>
                        </div>

                        <!-- Center Headline, Text and Button -->
                        <div class="cta-center-box">
                            <h2 class="cta-banner-title">{{$data['title'] ?? ''}}</h2>
                            <p class="cta-banner-sub">
                                {{ $data['description'] ?? ''}}
                            </p>
                            @if(isset($data['cta']['label']))
                                <a href="{{ get_cta_link($data['cta']['label']) }}" class="btn btn-primary">
                                    <span>{{ $data['cta']['label'] }}</span>
                                    <span>&rarr;</span>
                                </a>
                            @endif
                       
                        </div>

                        <!-- Right Spacer for the couple backdrop -->
                        <div class="cta-right-spacer" aria-hidden="true"></div>
                    </div>
                </div>
            </div>
        </section>