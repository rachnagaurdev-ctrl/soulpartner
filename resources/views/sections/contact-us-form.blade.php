 <section class="contact-main-section">
            <div class="container">
                <div class="contact-grid">

                    <!-- Left Column: Contact Information -->
                    <div class="contact-info-col">
                        <div class="section-subheading-block">
                            <h2 class="section-mini-title">
                                <span class="title-heart">♥</span> {{$data['title'] ?? ''}}
                            </h2>
                            <p class="section-mini-desc">{{$data['description'] ?? ''}}</p>
                        </div>

                        <!-- Card 1: Email Us -->
                        @if(isset($data['contact-list']) && !empty($data['contact-list']))
                        @foreach($data['contact-list'] as $contact)
                            <a href="{{isset($contact['link']) ? $contact['link'] : ''}}" class="contact-info-card" id="cardEmail">
                                <div class="card-icon-box icon-email">
                                    <i class="{{ isset($contact['icon']) ? $contact['icon'] : '' }}"></i>
                                </div>
                                <div class="card-text-content">
                                    <div class="card-label">{{ $contact['title'] ?? '' }}</div>
                                    <div class="card-primary-value">{{ $contact['line_1'] ?? '' }}</div>
                                    <div class="card-secondary-note">{{ $contact['line_2'] ?? '' }}</div>
                                </div>
                                <div class="card-chevron" aria-hidden="true">&rsaquo;</div>
                            </a>
                        @endforeach
                        @endif

                       
                    </div>

                    <!-- Right Column: Send Us a Message Form -->
                    <div class="contact-form-card">
                        <!-- Decorative Top Right Watermark Hearts -->
                        <div class="form-card-watermark" aria-hidden="true">
                            <svg width="42" height="42" viewBox="0 0 24 24">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                            </svg>
                            <svg width="26" height="26" viewBox="0 0 24 24" style="margin-top: 14px;">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                            </svg>
                        </div>

                        <div class="contact-form-header">
                            <h2 class="form-title">
                                <span class="title-heart">♥</span> Send Us a Message
                            </h2>
                            <p class="form-subtitle">Fill out the form below and we'll get back to you soon.</p>
                        </div>

                        <div class="mt-8" style="margin-top: 30px;">
                            @livewire('dynamic-form', ['slug' => 'contact-us-form'])
                        </div>
                    </div>

                </div>
            </div>
        </section>