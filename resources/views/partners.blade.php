@extends('partial.layout')
@section('content')
   <!-- Hero Section matching reference screenshot -->
        <section class="hero partners-hero">
            <div class="container hero-content">
                <div class="hero-copy">
                    <div class="hero-eyebrow-pill">
                        <span class="hero-heart">♥</span> FIND YOUR PERFECT PARTNER
                    </div>
                    <h1 class="hero-heading">Explore &amp; Connect<br><span class="hero-highlight">With Amazing
                            People</span></h1>
                    <p class="hero-subtext">Browse through genuine profiles, find the right companion for your special
                        moments, and make memories together.</p>
                </div>
                <div class="hero-tag partners-hero-tag">Real People<br><span>Real Connections</span><br>Real Moments ♡
                </div>
            </div>

            <!-- Floating Hero Search Bar -->
            <div class="container searchbox-wrapper">
                <form class="searchbox partners-searchbox" onsubmit="return false">
                    <div class="searchfield">
                        <div class="field-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#d80b76"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </div>
                        <div class="field-info">
                            <label>Location</label>
                            <select id="heroLocationSelect">
                                <option value="Delhi, India" selected>Delhi, India</option>
                                <option value="Mumbai, India">Mumbai, India</option>
                                <option value="Bangalore, India">Bangalore, India</option>
                                <option value="Pune, India">Pune, India</option>
                                <option value="Gurgaon, India">Gurgaon, India</option>
                                <option value="Jaipur, India">Jaipur, India</option>
                                <option value="Chandigarh, India">Chandigarh, India</option>
                            </select>
                        </div>
                    </div>

                    <div class="searchfield">
                        <div class="field-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#d80b76"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z">
                                </path>
                                <line x1="7" y1="7" x2="7.01" y2="7"></line>
                            </svg>
                        </div>
                        <div class="field-info">
                            <label>Category</label>
                            <select id="heroCategorySelect">
                                <option value="">All Categories</option>
                                @foreach($categories as $cat)
                                <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="searchfield">
                        <div class="field-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#d80b76"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                        </div>
                        <div class="field-info">
                            <label>Date</label>
                            <input type="text" id="heroDateInput" placeholder="Select date" onfocus="(this.type='date')"
                                onblur="if(!this.value)this.type='text'">
                        </div>
                    </div>

                    <button type="button" class="btn-search-partners" id="searchPartnersBtn">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        Search Partners
                    </button>
                </form>
            </div>
        </section>

        <!-- Main Directory Section: Filters & Partner Grid -->
        <section class="partners-directory-section" id="partnersDirectory">
            <div class="container">
                <div class="partners-layout">

                    <!-- Left Column: Filters Sidebar -->
                    <aside class="filters-sidebar" id="filtersSidebar">
                        <form method="GET" action="{{ route('partners') }}">
                        <div class="filters-header">
                            <h3 class="filters-title">Filters</h3>
                            <a href="{{ route('partners') }}" class="clear-filters-btn">Clear All</a>
                        </div>
                        <style>
                            @media(min-width: 992px) {
                                .sidebar-header-mobile { display: none !important; }
                            }
                        </style>
                        <div class="sidebar-header-mobile" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                            <h3 style="margin: 0;">Filters</h3>
                            <button type="button" class="close-filter-btn" id="closeMobileFilterBtn"
                                aria-label="Close filters" style="background: none; border: none; font-size: 24px; cursor: pointer; color: #1e293b;">&times;</button>
                        </div>

                        <!-- Category Filter -->
                        <div class="filter-group">
                            <h4 class="filter-heading">Category</h4>
                            <div class="filter-options">
                                @forelse($categories as $cat)
                                <label class="filter-checkbox-item">
                                    <input type="checkbox" name="category[]" value="{{ $cat->name }}" {{ in_array($cat->name, (array)request('category', [])) ? 'checked' : '' }}>
                                    <span class="custom-check"></span>
                                    <span class="option-label">{{ $cat->name }}</span>
                                </label>
                                @empty
                                <p class="text-muted" style="font-size:0.85rem;">No categories yet.</p>
                                @endforelse
                            </div>
                        </div>

                        <!-- Gender Filter -->
                        <div class="filter-group">
                            <h4 class="filter-heading">Gender</h4>
                            <div class="filter-options">
                                <label class="filter-checkbox-item">
                                    <input type="checkbox" name="gender" value="Male">
                                    <span class="custom-check"></span>
                                    <span class="option-label">Male</span>
                                    <span class="option-count">78</span>
                                </label>
                                <label class="filter-checkbox-item">
                                    <input type="checkbox" name="gender" value="Female">
                                    <span class="custom-check"></span>
                                    <span class="option-label">Female</span>
                                    <span class="option-count">122</span>
                                </label>
                            </div>
                        </div>

                        <!-- Age Range Filter -->
                        <div class="filter-group">
                            <h4 class="filter-heading">Age Range</h4>
                            <div class="age-range-buttons">
                                <button type="button" class="age-chip" data-range="18-25">18 - 25 <span
                                        class="chip-arrow">▾</span></button>
                                <button type="button" class="age-chip active" data-range="26-35">26 - 35 <span
                                        class="chip-arrow">▾</span></button>
                                <button type="button" class="age-chip" data-range="36-45">36 - 45 <span
                                        class="chip-arrow">▾</span></button>
                                <button type="button" class="age-chip" data-range="46+">46+ <span
                                        class="chip-arrow">▾</span></button>
                            </div>
                        </div>

                        <!-- Location Filter -->
                        <div class="filter-group">
                            <h4 class="filter-heading">Location</h4>
                            <div class="filter-select-wrapper">
                                <select class="filter-select" id="filterLocationSelect">
                                    <option value="">Select City</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Mumbai">Mumbai</option>
                                    <option value="Bangalore">Bangalore</option>
                                    <option value="Pune">Pune</option>
                                    <option value="Gurgaon">Gurgaon</option>
                                    <option value="Jaipur">Jaipur</option>
                                    <option value="Chandigarh">Chandigarh</option>
                                </select>
                            </div>
                        </div>

                        <!-- Price Range Filter -->
                        <div class="filter-group">
                            <div class="filter-heading-flex">
                                <h4 class="filter-heading">Price Range (per hour)</h4>
                            </div>
                            <div class="price-slider-box">
                                <input type="range" class="custom-range" id="priceRange" min="500" max="5000" step="100"
                                    value="2500">
                                <div class="slider-labels">
                                    <span>₹500</span>
                                    <span id="priceCurrentLabel">₹2,500</span>
                                    <span>₹5,000+</span>
                                </div>
                            </div>
                        </div>

                        <!-- Availability Filter -->
                        <div class="filter-group">
                            <h4 class="filter-heading">Availability</h4>
                            <div class="filter-options">
                                <label class="filter-checkbox-item">
                                    <input type="checkbox" name="availability" value="Today">
                                    <span class="custom-check"></span>
                                    <span class="option-label">Today</span>
                                </label>
                                <label class="filter-checkbox-item">
                                    <input type="checkbox" name="availability" value="Tomorrow">
                                    <span class="custom-check"></span>
                                    <span class="option-label">Tomorrow</span>
                                </label>
                                <label class="filter-checkbox-item">
                                    <input type="checkbox" name="availability" value="This Week">
                                    <span class="custom-check"></span>
                                    <span class="option-label">This Week</span>
                                </label>
                                <label class="filter-checkbox-item">
                                    <input type="checkbox" name="availability" value="This Month">
                                    <span class="custom-check"></span>
                                    <span class="option-label">This Month</span>
                                </label>
                            </div>
                        </div>

                        <!-- Verified Profiles -->
                        <div class="filter-group">
                            <h4 class="filter-heading">Verified Profiles <span class="shield-icon">🛡️</span></h4>
                            <div class="filter-options">
                                <label class="filter-checkbox-item">
                                    <input type="checkbox" name="verified" value="true" checked>
                                    <span class="custom-check"></span>
                                    <span class="option-label">Only Verified</span>
                                </label>
                            </div>
                        </div>

                        <div class="filter-actions">
                            <button type="submit" class="btn btn-primary" style="width: 100%;">Apply Filters</button>
                        </div>
                        </form>
                    </aside>

                    <!-- Right Column: Main Partner Cards & Header -->
                    <div class="partners-main">
                        <!-- Toolbar -->
                        <div class="partners-toolbar">
                            <div class="toolbar-left">
                                <p class="results-count">Showing <strong>1 - 12</strong> of <strong>200+</strong>
                                    partners</p>
                            </div>
                            <div class="toolbar-right">
                                <!-- Mobile Filter Trigger Button (visible <= 992px) -->
                                <button type="button" class="mobile-filter-btn" id="openMobileFilterBtn"
                                    aria-label="Open Filters">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="4" y1="21" x2="4" y2="14"></line>
                                        <line x1="4" y1="10" x2="4" y2="3"></line>
                                        <line x1="12" y1="21" x2="12" y2="12"></line>
                                        <line x1="12" y1="8" x2="12" y2="3"></line>
                                        <line x1="20" y1="21" x2="20" y2="16"></line>
                                        <line x1="20" y1="12" x2="20" y2="3"></line>
                                        <line x1="1" y1="14" x2="7" y2="14"></line>
                                        <line x1="9" y1="8" x2="15" y2="8"></line>
                                        <line x1="17" y1="16" x2="23" y2="16"></line>
                                    </svg>
                                    Filters
                                    <span class="filter-count-badge" id="mobileFilterBadge">1</span>
                                </button>

                                <div class="sort-wrapper">
                                    <label for="sortSelect">Sort by:</label>
                                    <div class="sort-select-box">
                                        <select id="sortSelect" class="sort-select">
                                            <option value="recommended" selected>Recommended</option>
                                            <option value="rating">Highest Rated</option>
                                            <option value="price-low">Price: Low to High</option>
                                            <option value="price-high">Price: High to Low</option>
                                            <option value="popularity">Most Popular</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 12 Partners Cards Grid -->
                        <div class="partners-grid" id="partnersGrid">
@foreach($partners as $partner)
<article class="partner-card">
    <div class="partner-card-media">
        <img src="{{ get_media_url($partner->image) }}" alt="{{ $partner->name }}" loading="lazy">
        <div class="badge-verified">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
            Verified
        </div>
        <button type="button" class="btn-fav" aria-label="Add to favorites">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
            </svg>
        </button>
    </div>
    <div class="partner-card-body">
        <div class="partner-rating">
            <span class="stars">★★★★★</span>
            <span class="score">4.8</span>
            <span class="reviews-count">(134)</span>
        </div>
        <h3 class="partner-name">
            {{ $partner->name }} <span class="gender-sym {{ strtolower($partner->gender) }}">{{ strtolower($partner->gender) == 'male' ? '♂' : '♀' }}</span>
        </h3>
        <div class="partner-meta">
            <span><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12 6 12 12 16 14"></polyline>
                </svg> {{ \Carbon\Carbon::parse($partner->dob)->age }}</span>
            <span class="meta-sep">•</span>
            <span>{{ $partner->height ?? "5'5\"" }}</span>
            <span class="meta-sep">•</span>
            <span><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                </svg> {{ $partner->city }}</span>
        </div>
        <div class="partner-tags">
            @php
                $catSlugs = is_string($partner->category) ? explode(',', $partner->category) : [];
                $tagCategories = \App\Models\Category::whereIn('slug', $catSlugs)->get();
            @endphp
            @foreach($tagCategories as $tagCat)
            <span class="tag">{{ $tagCat->name }}</span>
            @endforeach
        </div>
        <div class="partner-price">
            <span class="amount">₹{{ number_format($partner->price_per_hour, 0) }}</span> <span class="unit">/ hour</span>
        </div>
        <div class="partner-card-actions">
            <a href="{{ url('partners-profile') }}?id={{ $partner->id }}" class="btn-view-profile">View Profile</a>
            <button type="button" class="btn-message" aria-label="Message {{ $partner->name }}">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                </svg>
            </button>
        </div>
    </div>
</article>
@endforeach

                        </div>
                        <!-- Pagination Section -->
                        <div class="partners-pagination">
                            {{ $partners->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </section>
@endsection