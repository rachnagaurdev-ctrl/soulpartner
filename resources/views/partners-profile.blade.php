@extends('partial.layout')
@section('content')
     <div class="container">
            <!-- Back to Search Breadcrumb -->
            <div class="profile-back-bar">
                <a href="/partners" class="back-link">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                        stroke-linecap="round" stroke-linejoin="round">
                        <line x1="19" y1="12" x2="5" y2="12"></line>
                        <polyline points="12 19 5 12 12 5"></polyline>
                    </svg>
                    Back to Search
                </a>
            </div>

            <!-- Top Profile Showcase Section (Gallery, Details, Booking Card) -->
            <section class="profile-showcase-section">
                <div class="profile-showcase-grid">

                    <!-- Col 1: Interactive Image Gallery -->
                    <div class="profile-gallery-block">
                        <!-- Vertical Thumbnails -->
                        <div class="gallery-thumbs" id="galleryThumbs">
    @if(is_array($partner->profile_photos))
        @foreach($partner->profile_photos as $index => $photo)
            <button type="button" class="thumb-btn {{ $index === 0 ? 'active' : '' }}" data-img="{{ get_media_url($photo) }}" data-index="{{ $index + 1 }}">
                <img src="{{ get_media_url($photo) }}" alt="Thumbnail {{ $index + 1 }}">
            </button>
        @endforeach
    @endif
</div>

                        <!-- Main Featured Image -->
                        <div class="gallery-main-view">
                            <img id="mainGalleryImage" src="{{ is_array($partner->profile_photos) && count($partner->profile_photos) > 0 ? get_media_url($partner->profile_photos[0]) : get_media_url($partner->profile_image) }}"
                                alt="{{ $partner->name }} featured portrait">

                            <!-- Counter Badge -->
                            <div class="gallery-counter" id="galleryCounter">1/{{ is_array($partner->profile_photos) ? count($partner->profile_photos) : 1 }}</div>

                            <!-- Verified Badge -->
                            <div class="badge-verified gallery-verified">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                Verified
                            </div>

                            <!-- Prev & Next Overlay Buttons -->
                            <button type="button" class="gallery-nav prev" id="galleryPrevBtn"
                                aria-label="Previous photo">‹</button>
                            <button type="button" class="gallery-nav next" id="galleryNextBtn"
                                aria-label="Next photo">›</button>

                            <!-- Media Play/Expand Icon -->
                            <button type="button" class="gallery-play-btn" aria-label="Watch intro video">▶</button>
                        </div>
                    </div>

                    <!-- Col 2: Partner Profile Overview -->
                    <div class="profile-info-block">
                        <div class="profile-header-row">
                            <div class="profile-name-area">
                                <h1 class="profile-name">
                                    {{ $partner->name }}
                                    <span class="verified-icon" title="Verified Profile">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="#6366f1">
                                            <path
                                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                                        </svg>
                                    </span>
                                </h1>
                                <p class="profile-submeta">{{ \Carbon\Carbon::parse($partner->dob)->age }} • {{ $partner->height ?? "5'5\"" }} • 📍 {{ $partner->city }}</p>
                            </div>

                            <div class="profile-header-actions">
                                <button type="button" class="btn-add-favorite" id="profileFavBtn">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path
                                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                        </path>
                                    </svg>
                                    <span>Add to Favorites</span>
                                </button>
                                <button type="button" class="btn-share-profile" id="profileShareBtn"
                                    aria-label="Share profile">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="18" cy="5" r="3"></circle>
                                        <circle cx="6" cy="12" r="3"></circle>
                                        <circle cx="18" cy="19" r="3"></circle>
                                        <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                                        <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Rating & Review Count -->
                        <div class="profile-rating-row">
                            <span class="stars">★★★★★</span>
                            <span class="rating-score">4.8</span>
                            <span class="reviews-count">(120 Reviews)</span>
                            <span class="pill-review-badge">4.8/5.0 Reviews</span>
                        </div>

                        <!-- Companion Tags -->
                        <div class="profile-tags-row">
                            @php
                                $catSlugs = is_string($partner->category) ? explode(',', $partner->category) : [];
                                $tagCategories = \App\Models\Category::whereIn('slug', $catSlugs)->get();
                            @endphp
                            @foreach($tagCategories as $tagCat)
                            <span class="tag-pill">{{ $tagCat->name }}</span>
                            @endforeach
                        </div>

                        <!-- Bio Highlight / Quote -->
                        <p class="profile-tagline">
                            "{{ $partner->bio ?? 'No bio provided yet.' }}"
                        </p>

                        <!-- Specification Grid (2 cols x 3 rows) -->
                        <div class="profile-specs-grid">
                            <div class="spec-item">
                                <div class="spec-icon">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6d6b78"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </div>
                                <div class="spec-content">
                                    <span class="spec-label">Gender</span>
                                    <strong class="spec-value">{{ ucfirst($partner->gender) }}</strong>
                                </div>
                            </div>

                            <div class="spec-item">
                                <div class="spec-icon">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6d6b78"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                </div>
                                <div class="spec-content">
                                    <span class="spec-label">Age</span>
                                    <strong class="spec-value">{{ \Carbon\Carbon::parse($partner->dob)->age }}</strong>
                                </div>
                            </div>

                            <div class="spec-item">
                                <div class="spec-icon">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6d6b78"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                </div>
                                <div class="spec-content">
                                    <span class="spec-label">Location</span>
                                    <strong class="spec-value">{{ $partner->city }}</strong>
                                </div>
                            </div>

                            <div class="spec-item">
                                <div class="spec-icon">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6d6b78"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                    </svg>
                                </div>
                                <div class="spec-content">
                                    <span class="spec-label">Languages</span>
                                    <strong class="spec-value">
                                        @php
                                            $langs = is_array($partner->languages) ? implode(', ', $partner->languages) : (is_string($partner->languages) ? implode(', ', json_decode($partner->languages, true) ?? []) : 'Not specified');
                                        @endphp
                                        {{ empty($langs) ? 'Not specified' : $langs }}
                                    </strong>
                                </div>
                            </div>
                                         <style>
                                .avail-day-pill {
                                    position: relative;
                                    display: inline-block;
                                    border-bottom: 1px dotted #d80b76;
                                    cursor: help;
                                    color: #1e293b;
                                    font-weight: 500;
                                }
                                .avail-day-pill .custom-tooltip {
                                    visibility: hidden;
                                    width: max-content;
                                    background-color: #1e293b;
                                    color: #fff;
                                    text-align: center;
                                    border-radius: 6px;
                                    padding: 6px 10px;
                                    position: absolute;
                                    z-index: 10;
                                    bottom: 125%;
                                    left: 50%;
                                    transform: translateX(-50%);
                                    opacity: 0;
                                    transition: opacity 0.3s;
                                    font-size: 12px;
                                    font-weight: normal;
                                    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
                                }
                                .avail-day-pill .custom-tooltip::after {
                                    content: "";
                                    position: absolute;
                                    top: 100%;
                                    left: 50%;
                                    margin-left: -5px;
                                    border-width: 5px;
                                    border-style: solid;
                                    border-color: #1e293b transparent transparent transparent;
                                }
                                .avail-day-pill:hover .custom-tooltip {
                                    visibility: visible;
                                    opacity: 1;
                                }
                            </style>
                            <div class="spec-item">
        <div class="spec-icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6d6b78" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
        </div>
        <div class="spec-content">
            <span class="spec-label">Availability</span>
            <strong class="spec-value" style="display: flex; flex-wrap: wrap; gap: 6px;">
                @php
                    $activeDays = [];
                    if (is_array($partner->availability)) {
                        foreach (["Mon","Tue","Wed","Thu","Fri","Sat","Sun"] as $day) {
                            if (isset($partner->availability[$day]["active"]) && $partner->availability[$day]["active"]) {
                                $from = $partner->availability[$day]["from"] ?? "";
                                $to = $partner->availability[$day]["to"] ?? "";
                                
                                $fromFormatted = $from ? date('h:i A', strtotime($from)) : '';
                                $toFormatted = $to ? date('h:i A', strtotime($to)) : '';
                                
                                $activeDays[] = "<span class=\"avail-day-pill\">$day<span class=\"custom-tooltip\">$fromFormatted - $toFormatted</span></span>";
                            }
                        }
                    }
                @endphp
                {!! count($activeDays) > 0 ? implode(", ", $activeDays) : "Not Specified" !!}
            </strong>
        </div>
    </div>

                            <div class="spec-item">
                                <div class="spec-icon">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6d6b78"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="12 6 12 12 14 10"></polyline>
                                    </svg>
                                </div>
                                <div class="spec-content">
                                    <span class="spec-label">Response Time</span>
                                    <strong class="spec-value">Within 1 hour</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Col 3: Right Sticky Booking Card -->
                    <div class="profile-booking-block">
                        <div class="booking-card">
                            <div class="booking-price-header">
                                <h3 style="margin:0;font-size:18px;color:#d80b76;">Book Partner</h3>
                                <span class="booking-note">(Minimum 2 hours booking)</span>
                            </div>

                            <form class="booking-form" id="bookingForm" onsubmit="return false;">
                                @php
                                    $catSlugs = is_string($partner->category) ? explode(",", $partner->category) : [];
                                    $categories = \App\Models\Category::whereIn("slug", $catSlugs)->get();
                                    $partnerPrices = is_string($partner->category_prices) ? json_decode($partner->category_prices, true) : ($partner->category_prices ?? []);
                                @endphp
                                <div class="booking-field">
                                    <label for="bookingService">Select Service</label>
                                    <div class="input-icon-wrap">
                                        <select id="bookingService" onchange="updateBookingForm()">
                                            @foreach($categories as $cat)
                                                @php
                                                    $customPrice = $partnerPrices[$cat->slug] ?? $cat->prices;
                                                @endphp
                                                <option value="{{ $cat->id }}" data-pricing="{{ $cat->pricing_type }}" data-price="{{ $customPrice }}" data-hours="{{ $cat->hours ?? 0 }}" data-minutes="{{ $cat->minutes ?? 0 }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="input-icon">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#d80b76" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                        </span>
                                    </div>
                                </div>

                                <div class="booking-field">
                                    <label for="bookingDate">Select Date</label>
                                    <div class="input-icon-wrap">
                                        <input type="date" id="bookingDate" value="{{ date('Y-m-d') }}">
                                        <span class="input-icon">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#d80b76" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                        </span>
                                    </div>
                                </div>

                                <div class="booking-field hourly-field">
                                    <label for="bookingStartTime">Start Time</label>
                                    <div class="input-icon-wrap">
                                        <select id="bookingStartTime">
                                            @for($i=0; $i<24; $i++)
                                                @php 
                                                    $t = sprintf('%02d:00', $i); 
                                                    $displayT = \Carbon\Carbon::createFromFormat('H:i', $t)->format('h:i A');
                                                @endphp
                                                <option value="{{ $t }}" {{ $t == '18:00' ? 'selected' : '' }}>{{ $displayT }}</option>
                                            @endfor
                                        </select>
                                        <span class="input-icon">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#d80b76" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                        </span>
                                    </div>
                                </div>

                                <div class="booking-field hourly-field">
                                    <label for="bookingEndTime">End Time</label>
                                    <div class="input-icon-wrap">
                                        <select id="bookingEndTime">
                                            @for($i=0; $i<24; $i++)
                                                @php 
                                                    $t = sprintf('%02d:00', $i); 
                                                    $displayT = \Carbon\Carbon::createFromFormat('H:i', $t)->format('h:i A');
                                                @endphp
                                                <option value="{{ $t }}" {{ $t == '20:00' ? 'selected' : '' }}>{{ $displayT }}</option>
                                            @endfor
                                        </select>
                                        <span class="input-icon">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#d80b76" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                        </span>
                                    </div>
                                </div>

                                <div class="booking-field package-field" style="display:none;">
                                    <label for="bookingTime">Select Start Time</label>
                                    <div class="input-icon-wrap">
                                        <select id="bookingTime">
                                            @for($i=0; $i<24; $i++)
                                                @php 
                                                    $t = sprintf('%02d:00', $i); 
                                                    $displayT = \Carbon\Carbon::createFromFormat('H:i', $t)->format('h:i A');
                                                @endphp
                                                <option value="{{ $t }}" {{ $t == '18:00' ? 'selected' : '' }}>{{ $displayT }}</option>
                                            @endfor
                                        </select>
                                        <span class="input-icon">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#d80b76" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="booking-field package-field" style="display:none; margin-top:15px;">
                                    <label>Calculated End Time</label>
                                    <div class="input-icon-wrap">
                                        <input type="text" id="packageEndTime" disabled style="background-color: #f8fafc; font-weight: 500; color: #d80b76;">
                                        <span class="input-icon">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#d80b76" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                        </span>
                                    </div>
                                </div>


                                <div class="booking-price-display" style="text-align: center; margin: 15px 0;">
                                    <span style="font-size: 14px; color: #6d6b78;">Total Price:</span>
                                    <h2 id="calculatedPriceDisplay" style="margin: 5px 0; font-size: 24px; color: #d80b76;">₹0</h2>
                                </div>

                                <button type="button" class="btn-book-now" id="bookNowBtn">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                    Book Now
                                </button>

                                <button type="button" class="btn-chat-now" id="chatNowBtn">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                    </svg>
                                    Chat Now
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </section>

            <!-- Navigation Tabs Bar -->
            <nav class="profile-tabs-nav" id="profileTabsNav">
                <a href="#aboutSec" class="tab-link active">About</a>
                <a href="#servicesSec" class="tab-link">Services &amp; Pricing</a>
                <a href="#availabilitySec" class="tab-link">Availability</a>
                <a href="#reviewsSec" class="tab-link">Reviews (120)</a>
            </nav>

            <!-- About Me & Quick Facts (2 Columns) -->
            <section class="profile-details-section" id="aboutSec">
                <div class="profile-details-layout">

                    <!-- Left Column: Bio & Personality & Photo Gallery -->
                    <div class="details-left-content">
                        <div class="about-card-box">
                            <h2 class="section-title">About Me</h2>
                            <p class="about-bio-text">
                                {{ $partner->bio ?? 'No bio provided yet.' }}
                            </p>

                            <!-- Interests / Personality Badges -->
                            <div class="personality-badges-grid">
                                @php
                                    $interests = is_array($partner->interests) ? $partner->interests : (is_string($partner->interests) ? json_decode($partner->interests, true) : []);
                                @endphp
                                @foreach($interests ?? [] as $interest)
                                <div class="personality-pill">
                                    <div class="vibe-icon-wrap">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#d80b76"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                        </svg>
                                    </div>
                                    <div class="vibe-text">
                                        <strong>{{ $interest }}</strong>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Photo Gallery Row -->
                        <div class="photo-gallery-section">
                            <div class="gallery-header">
                                <h3 class="section-subtitle">Photo Gallery</h3>
                                <a href="#galleryThumbs" class="view-all-link">View All →</a>
                            </div>
                            <div class="gallery-strip">
                                @if(is_array($partner->profile_photos))
                                    @foreach($partner->profile_photos as $photo)
                                    <div class="gallery-item-thumb">
                                        <img src="{{ get_media_url($photo) }}" alt="{{ $partner->name }} gallery photo" loading="lazy">
                                    </div>
                                    @endforeach
                                @else
                                    <div class="gallery-item-thumb">
                                        <img src="{{ get_media_url($partner->profile_image) }}" alt="{{ $partner->name }} gallery photo" loading="lazy">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Quick Facts Card -->
                    <div class="details-right-sidebar">
    <div class="quick-facts-card">
        <h3 class="quick-facts-title">Quick Facts</h3>
        <ul class="quick-facts-list">
            @if(!empty($partner->city))
            <li class="fact-item">
                <div class="fact-icon-wrap"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#d80b76" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg></div>
                <div class="fact-text"><span class="fact-label">Location</span><strong class="fact-val">{{ $partner->city }}</strong></div>
            </li>
            @endif
            <li class="fact-item">
                <div class="fact-icon-wrap"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#d80b76" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg></div>
                <div class="fact-text"><span class="fact-label">Gender</span><strong class="fact-val">{{ ucfirst($partner->gender) }}</strong></div>
            </li>
        </ul>
    </div>
</div>

                </div>
            </section>

            <!-- Services & Pricing Section -->
            <section class="profile-section-block" id="servicesSec">
                <h2 class="section-title">Services &amp; Pricing</h2>
                <div class="services-pricing-grid">
        @php
            $catSlugs = is_string($partner->category) ? explode(",", $partner->category) : [];
            $categories = \App\Models\Category::whereIn("slug", $catSlugs)->get();
            $partnerPrices = is_string($partner->category_prices) ? json_decode($partner->category_prices, true) : ($partner->category_prices ?? []);
        @endphp
        @foreach($categories as $cat)
        @php
            $customPrice = $partnerPrices[$cat->slug] ?? $cat->prices;
        @endphp
        <div class="service-price-card">
            <div class="service-icon-box">
                @if($cat->icon)
                    <span style="font-size: 24px; display:flex; align-items:center; justify-content:center; line-height: 1;">{!! $cat->icon !!}</span>
                @else
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d80b76" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle></svg>
                @endif
            </div>
            <h4 class="service-card-title">{{ $cat->name }}</h4>
            <div class="service-card-rate">
                <span class="rate-amount">₹{{ number_format($customPrice, 0) }}</span> 
                @if($cat->pricing_type == 'hourly')
                    <span class="rate-unit">/ hour</span>
                @else
                    <span class="rate-unit">/ session</span>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</section>

            <!-- Availability Anchor -->
            <div id="availabilitySec" style="height: 1px;"></div>

            <!-- Reviews Section -->
            <section class="profile-section-block" id="reviewsSec">
                <div class="reviews-header-bar">
                    <h2 class="section-title">Reviews (120)</h2>
                    <a href="#reviewsSec" class="view-all-link">View All →</a>
                </div>

                <div class="reviews-main-grid">
                    <!-- Left: Rating Summary & Progress Bars -->
                    <div class="rating-breakdown-card">
                        <div class="rating-big-score">4.8</div>
                        <div class="rating-big-stars">★★★★★</div>
                        <div class="rating-total-reviews">(120 Reviews)</div>

                        <!-- Progress Bars -->
                        <div class="breakdown-bars-list">
                            <div class="bar-row">
                                <span class="bar-label">5 ★</span>
                                <div class="bar-track">
                                    <div class="bar-fill" style="width: 88%;"></div>
                                </div>
                                <span class="bar-pct">88%</span>
                            </div>

                            <div class="bar-row">
                                <span class="bar-label">4 ★</span>
                                <div class="bar-track">
                                    <div class="bar-fill" style="width: 8%;"></div>
                                </div>
                                <span class="bar-pct">8%</span>
                            </div>

                            <div class="bar-row">
                                <span class="bar-label">3 ★</span>
                                <div class="bar-track">
                                    <div class="bar-fill" style="width: 2%;"></div>
                                </div>
                                <span class="bar-pct">2%</span>
                            </div>

                            <div class="bar-row">
                                <span class="bar-label">2 ★</span>
                                <div class="bar-track">
                                    <div class="bar-fill" style="width: 1%;"></div>
                                </div>
                                <span class="bar-pct">1%</span>
                            </div>

                            <div class="bar-row">
                                <span class="bar-label">1 ★</span>
                                <div class="bar-track">
                                    <div class="bar-fill" style="width: 1%;"></div>
                                </div>
                                <span class="bar-pct">1%</span>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Review Cards List (3 Cards) -->
                    <div class="customer-reviews-list">
                        <!-- Review 1: Amit Verma -->
                        <div class="review-comment-card">
                            <div class="comment-author-row">
                                <div class="author-avatar">
                                    <img src="assets/images/partners/amit.jpg" alt="Amit Verma">
                                </div>
                                <div class="author-meta">
                                    <h4 class="author-name">Amit Verma</h4>
                                    <div class="stars-gold">★★★★★</div>
                                </div>
                                <div class="comment-date">10 Sep 2025</div>
                            </div>
                            <p class="comment-text">
                                Priya is amazing! Very friendly, smart and made my evening really special. Highly
                                recommended!
                            </p>
                            <div class="comment-footer">
                                <button type="button" class="btn-helpful">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <path
                                            d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3">
                                        </path>
                                    </svg>
                                    <span>12</span>
                                </button>
                            </div>
                        </div>

                        <!-- Review 2: Neha Kapoor -->
                        <div class="review-comment-card">
                            <div class="comment-author-row">
                                <div class="author-avatar">
                                    <img src="assets/images/partners/neha.jpg" alt="Neha Kapoor">
                                </div>
                                <div class="author-meta">
                                    <h4 class="author-name">Neha Kapoor</h4>
                                    <div class="stars-gold">★★★★★</div>
                                </div>
                                <div class="comment-date">5 Sep 2025</div>
                            </div>
                            <p class="comment-text">
                                Had a great time with Priya. She is very genuine and fun to be around. Will book again
                                soon!
                            </p>
                            <div class="comment-footer">
                                <button type="button" class="btn-helpful">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <path
                                            d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3">
                                        </path>
                                    </svg>
                                    <span>8</span>
                                </button>
                            </div>
                        </div>

                        <!-- Review 3: Rohit Mehta -->
                        <div class="review-comment-card">
                            <div class="comment-author-row">
                                <div class="author-avatar">
                                    <img src="assets/images/partners/rohan.jpg" alt="Rohit Mehta">
                                </div>
                                <div class="author-meta">
                                    <h4 class="author-name">Rohit Mehta</h4>
                                    <div class="stars-gold">★★★★★</div>
                                </div>
                                <div class="comment-date">28 Aug 2025</div>
                            </div>
                            <p class="comment-text">
                                One of the best experiences I've had on this platform. Very sweet and professional.
                            </p>
                            <div class="comment-footer">
                                <button type="button" class="btn-helpful">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <path
                                            d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3">
                                        </path>
                                    </svg>
                                    <span>6</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<!-- Custom Alert Modal -->
<div id="customAlertModal" class="custom-alert-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 9999; justify-content: center; align-items: center; opacity: 0; transition: opacity 0.3s ease;">
    <div class="custom-alert-box" style="background: #fff; padding: 25px 30px; border-radius: 16px; width: 90%; max-width: 400px; text-align: center; box-shadow: 0 10px 25px rgba(0,0,0,0.2); transform: translateY(-20px); transition: transform 0.3s ease;">
        <div style="width: 50px; height: 50px; border-radius: 50%; background: #FDF2F8; color: #E91E63; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <h3 style="margin: 0 0 10px; color: #1E293B; font-size: 18px; font-weight: 700;">Notice</h3>
        <p id="customAlertMessage" style="margin: 0 0 20px; color: #64748B; font-size: 15px; line-height: 1.5;"></p>
        <button type="button" onclick="closeCustomAlert()" style="background: #E91E63; color: #fff; border: none; padding: 10px 25px; border-radius: 8px; font-weight: 600; font-size: 14px; cursor: pointer; transition: background 0.2s;">Got it</button>
    </div>
</div>
<script>
function showCustomAlert(message) {
    const modal = document.getElementById('customAlertModal');
    const msgEl = document.getElementById('customAlertMessage');
    const box = modal.querySelector('.custom-alert-box');
    msgEl.innerText = message;
    modal.style.display = 'flex';
    // Trigger reflow
    void modal.offsetWidth;
    modal.style.opacity = '1';
    box.style.transform = 'translateY(0)';
}
function closeCustomAlert() {
    const modal = document.getElementById('customAlertModal');
    const box = modal.querySelector('.custom-alert-box');
    modal.style.opacity = '0';
    box.style.transform = 'translateY(-20px)';
    setTimeout(() => {
        modal.style.display = 'none';
    }, 300);
}
</script>
<script>
function calculatePrice() {
    var select = document.getElementById('bookingService');
    if(!select) return;
    var option = select.options[select.selectedIndex];
    var pricingType = option.getAttribute('data-pricing');
    var basePrice = parseFloat(option.getAttribute('data-price')) || 0;
    var amount = basePrice;
    
    if (pricingType === 'hourly') {
        var startTime = document.getElementById('bookingStartTime').value;
        var endTime = document.getElementById('bookingEndTime').value;
        if(startTime && endTime) {
            var date = document.getElementById('bookingDate').value;
            var start = new Date(date + 'T' + startTime);
            var end = new Date(date + 'T' + endTime);
            if (end > start) {
                var hours = (end - start) / (1000 * 60 * 60);
                amount = basePrice * hours;
            } else {
                amount = 0;
            }
        } else {
            amount = 0;
        }
    } else if (pricingType === 'package') {
        var pkgHours = parseInt(option.getAttribute('data-hours')) || 0;
        var pkgMins = parseInt(option.getAttribute('data-minutes')) || 0;
        var startTime = document.getElementById('bookingTime').value;
        
        if (startTime) {
            var start = new Date('1970-01-01T' + startTime);
            start.setHours(start.getHours() + pkgHours);
            start.setMinutes(start.getMinutes() + pkgMins);
            
            var endH = start.getHours();
            var endM = start.getMinutes();
            var ampm = endH >= 12 ? 'PM' : 'AM';
            endH = endH % 12;
            endH = endH ? endH : 12;
            endH = endH < 10 ? '0' + endH : endH;
            endM = endM < 10 ? '0' + endM : endM;
            
            var displayEnd = endH + ':' + endM + ' ' + ampm;
            var endStr = start.getHours().toString().padStart(2, '0') + ':' + start.getMinutes().toString().padStart(2, '0');
            
            document.getElementById('packageEndTime').value = displayEnd;
            document.getElementById('packageEndTime').setAttribute('data-val', endStr);
        }
    }
    
    document.getElementById('calculatedPriceDisplay').innerText = '₹' + amount;
}

function updateBookingForm() {
    var select = document.getElementById('bookingService');
    if(!select) return;
    var pricingType = select.options[select.selectedIndex].getAttribute('data-pricing');
    
    if (pricingType === 'package') {
        document.querySelectorAll('.hourly-field').forEach(el => el.style.display = 'none');
        document.querySelectorAll('.package-field').forEach(el => el.style.display = 'block');
    } else {
        document.querySelectorAll('.hourly-field').forEach(el => el.style.display = 'block');
        document.querySelectorAll('.package-field').forEach(el => el.style.display = 'none');
    }
    calculatePrice();
}

document.addEventListener('DOMContentLoaded', function() {
    updateBookingForm();
    document.getElementById('bookingStartTime').addEventListener('change', calculatePrice);
    document.getElementById('bookingEndTime').addEventListener('change', calculatePrice);
    document.getElementById('bookingDate').addEventListener('change', calculatePrice);
    document.getElementById('bookingTime').addEventListener('change', calculatePrice);
});

var partnerAvailability = @json($partner->availability ?? []);
if (typeof partnerAvailability === 'string') {
    try {
        partnerAvailability = JSON.parse(partnerAvailability);
    } catch(e) {
        partnerAvailability = {};
    }
}

function validateAvailability(dateStr, startStr, endStr) {
    if (!dateStr) return { valid: false, message: 'Please select a date' };
    
    var dateObj = new Date(dateStr);
    var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    var dayName = days[dateObj.getDay()];
    
    var dayAvail = partnerAvailability[dayName];
    if (!dayAvail || (dayAvail.active != "1" && dayAvail.active !== true && dayAvail.active !== 1)) {
        return { valid: false, message: 'Partner is not available on ' + dayName };
    }
    
    var format12 = function(t) {
        if (!t) return t;
        var p = t.split(':');
        var h = parseInt(p[0], 10);
        var ampm = h >= 12 ? 'PM' : 'AM';
        h = h % 12;
        h = h ? h : 12;
        h = h < 10 ? '0' + h : h;
        return h + ':' + p[1] + ' ' + ampm;
    };
    
    if (startStr && dayAvail.from && dayAvail.to) {
        if (startStr < dayAvail.from || startStr > dayAvail.to) {
            return { valid: false, message: 'Partner is only available from ' + format12(dayAvail.from) + ' to ' + format12(dayAvail.to) + ' on ' + dayName };
        }
    }
    
    if (endStr && dayAvail.from && dayAvail.to) {
        if (endStr < dayAvail.from || endStr > dayAvail.to) {
            return { valid: false, message: 'Partner is only available from ' + format12(dayAvail.from) + ' to ' + format12(dayAvail.to) + ' on ' + dayName };
        }
    }
    
    // Check against existing confirmed bookings to prevent double-booking
    var bookedSlots = @json($bookedSlots ?? []);
    var reqStart = startStr;
    var reqEnd = endStr || startStr;
    var rEnd = (reqEnd === reqStart) ? reqStart + ":01" : reqEnd;
    
    for (var i = 0; i < bookedSlots.length; i++) {
        var b = bookedSlots[i];
        if (b.booking_date === dateStr) {
            var bStart = b.booking_time.substring(0, 5); // "18:00:00" -> "18:00"
            var bEnd = b.end_time ? b.end_time.substring(0, 5) : bStart;
            var bkEnd = (bStart === bEnd) ? bStart + ":01" : bEnd;
            
            // Overlap condition
            if (reqStart < bkEnd && rEnd > bStart) {
                return { valid: false, message: 'The partner is already booked for this time slot (' + format12(bStart) + ' - ' + format12(bEnd) + ').' };
            }
        }
    }
    
    return { valid: true };
}

document.getElementById('bookNowBtn').addEventListener('click', function(e) {
    e.preventDefault();
    @auth
        @if(auth()->user()->role === 'partner')
            showCustomAlert("Partners are not allowed to book other partners.");
            return;
        @endif
        
        @if(auth()->id() === $partner->id)
            showCustomAlert("You cannot book yourself.");
            return;
        @endif

        var select = document.getElementById('bookingService');
        var option = select.options[select.selectedIndex];
        var pricingType = option.getAttribute('data-pricing');
        var basePrice = parseFloat(option.getAttribute('data-price')) || 0;
        var categoryId = select.value;
        var date = document.getElementById('bookingDate').value;
        var amount = basePrice;
        
        var startTime = null;
        var endTime = null;
        var bookingTime = null;

        if (pricingType === 'hourly') {
            startTime = document.getElementById('bookingStartTime').value;
            endTime = document.getElementById('bookingEndTime').value;
            
            var start = new Date(date + 'T' + startTime);
            var end = new Date(date + 'T' + endTime);
            if (end <= start) {
                showCustomAlert("End time must be after start time");
                return;
            }
            var hours = (end - start) / (1000 * 60 * 60);
            amount = basePrice * hours;
        } else {
            bookingTime = document.getElementById('bookingTime').value;
            startTime = bookingTime; // for validation
            endTime = document.getElementById('packageEndTime').getAttribute('data-val');
        }

        var validation = validateAvailability(date, startTime, endTime);
        if (!validation.valid) {
            showCustomAlert(validation.message);
            return;
        }

        var amountInPaise = amount * 100;

        var options = {
            'key': '{{ $razorpayKey }}',
            'amount': amountInPaise,
            'currency': 'INR',
            'name': 'Soulmate India',
            'description': 'Booking Partner - {{ $partner->name }}',
            'handler': function (response) {
                fetch('{{ route("book.partner", $partner->profile_id) }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        razorpay_payment_id: response.razorpay_payment_id,
                        category_id: categoryId,
                        date: date,
                        time: pricingType === 'hourly' ? startTime : bookingTime,
                        end_time: endTime,
                        amount: amount
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        window.location.href = data.redirect_url;
                    } else {
                        showCustomAlert('Booking failed: ' + (data.message || 'Unknown error'));
                    }
                })
                .catch(err => {
                    console.error(err);
                    showCustomAlert('An error occurred while confirming booking.');
                });
            },
            'prefill': {
                'name': '{{ Auth::user()->name }}',
                'email': '{{ Auth::user()->email }}',
                'contact': '{{ Auth::user()->phone ?? "" }}'
            },
            'theme': {
                'color': '#d80b76'
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
    @else
        showCustomAlert('Please login to book a partner.');
        setTimeout(() => {
            window.location.href = '/login';
        }, 1500);
    @endauth
});
</script>
@endsection