 <section class="about-hero">
            <div class="container">
                <div class="about-hero-grid">
                    <!-- Left Hero Copy -->
                    <div class="about-hero-copy">
                        <div class="about-eyebrow-badge">
                            <span class="eyebrow-heart">♥</span>
                            <span>{{$data['title'] ?? ''}}</span>
                            <span class="eyebrow-line"></span>
                        </div>
                        <h1 class="about-hero-title">
                            {!! $data['subtitle'] ?? '' !!} 
                        </h1>
                        <p class="about-hero-desc">
                            {{$data['description'] ?? ''}}
                        </p>
                    </div>

                    <!-- Right Hero Media with Handwritten Script Tag -->
                    <div class="about-hero-media">
                        <div class="about-hero-img-wrap">
                            <img src="assets/images/contact-couple.jpg" alt="Soulmate India companions enjoying sunset">
                            <div class="hero-script-tag">
                                Real People<br>
                                <span class="script-pink">Real Connections</span><br>
                                Real Moments <span class="script-heart">♡</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>