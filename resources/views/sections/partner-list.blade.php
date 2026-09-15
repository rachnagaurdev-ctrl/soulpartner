@php
    $partners = get_partners(12);
    $categories = get_catgeories(100);
@endphp
<style>
/* Custom Pagination Styles */
.partners-pagination .pagination {
    display: flex;
    padding-left: 0;
    list-style: none;
    border-radius: 0.25rem;
    gap: 8px;
    margin-bottom: 0;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
}
.partners-pagination .page-item .page-link {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ff1493;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ffccdf;
    border-radius: 8px;
    min-width: 40px;
    height: 40px;
    padding: 0 12px;
    font-weight: 600;
    transition: all 0.3s ease;
}
.partners-pagination .page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #ff1493;
    border-color: #ff1493;
}
.partners-pagination .page-item.disabled .page-link {
    color: #aaa;
    pointer-events: none;
    background-color: #f9f9f9;
    border-color: #eee;
}
.partners-pagination .page-link:hover {
    z-index: 2;
    color: #fff;
    background-color: #ff1493;
    border-color: #ff1493;
}
.partners-pagination nav {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
}
.partners-pagination p.small {
    margin-top: 15px;
    color: #666;
    text-align: center;
}
.partners-pagination .hidden {
    display: none !important;
}
</style>
<section class="partners-directory-section" id="partnersDirectory">
            <div class="container">
                <div class="partners-layout">

                    <!-- Left Column: Filters Sidebar -->
                    <aside class="filters-sidebar" id="filtersSidebar">
                        <form method="GET" action="" id="filterForm">
                        <input type="hidden" name="age_range" id="ageRangeInput" value="{{ request('age_range') }}">
                        <input type="hidden" name="sort" id="sortInput" value="{{ request('sort', 'recommended') }}">
                        <div class="filters-header">
                            <h3 class="filters-title">Filters</h3>
                            <a href="" class="clear-filters-btn">Clear All</a>
                        </div>
                        <div class="sidebar-header-mobile">
                            <h3>Filters</h3>
                            <button type="button" class="close-filter-btn" id="closeMobileFilterBtn"
                                aria-label="Close filters">×</button>
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
                                    <input type="checkbox" name="gender[]" value="Male" {{ in_array('Male', (array)request('gender', [])) ? 'checked' : '' }}>
                                    <span class="custom-check"></span>
                                    <span class="option-label">Male</span>
                                </label>
                                <label class="filter-checkbox-item">
                                    <input type="checkbox" name="gender[]" value="Female" {{ in_array('Female', (array)request('gender', [])) ? 'checked' : '' }}>
                                    <span class="custom-check"></span>
                                    <span class="option-label">Female</span>
                                </label>
                            </div>
                        </div>

                        <!-- Age Range Filter -->
                        <div class="filter-group">
                            <h4 class="filter-heading">Age Range</h4>
                            <div class="age-range-buttons">
                                <button type="button" class="age-chip {{ request('age_range') == '18-25' ? 'active' : '' }}" data-range="18-25">18 - 25</button>
                                <button type="button" class="age-chip {{ request('age_range') == '26-35' ? 'active' : '' }}" data-range="26-35">26 - 35</button>
                                <button type="button" class="age-chip {{ request('age_range') == '36-45' ? 'active' : '' }}" data-range="36-45">36 - 45</button>
                                <button type="button" class="age-chip {{ request('age_range') == '46+' ? 'active' : '' }}" data-range="46+">46+</button>
                            </div>
                        </div>

                        <!-- Location Filter -->
                        <div class="filter-group">
                            <h4 class="filter-heading">Location</h4>
                            <div class="filter-select-wrapper">
                                <select name="city" class="filter-select" id="filterLocationSelect" onchange="document.getElementById('filterForm').submit()">
                                    <option value="">Select City</option>
                                    <option value="Delhi" {{ request('city') == 'Delhi' ? 'selected' : '' }}>Delhi</option>
                                    <option value="Mumbai" {{ request('city') == 'Mumbai' ? 'selected' : '' }}>Mumbai</option>
                                    <option value="Bangalore" {{ request('city') == 'Bangalore' ? 'selected' : '' }}>Bangalore</option>
                                    <option value="Pune" {{ request('city') == 'Pune' ? 'selected' : '' }}>Pune</option>
                                    <option value="Gurgaon" {{ request('city') == 'Gurgaon' ? 'selected' : '' }}>Gurgaon</option>
                                    <option value="Jaipur" {{ request('city') == 'Jaipur' ? 'selected' : '' }}>Jaipur</option>
                                    <option value="Chandigarh" {{ request('city') == 'Chandigarh' ? 'selected' : '' }}>Chandigarh</option>
                                </select>
                            </div>
                        </div>

                        <!-- Price Range Filter -->
                        <div class="filter-group">
                            <div class="filter-heading-flex">
                                <h4 class="filter-heading">Price Range (per hour)</h4>
                            </div>
                            <div class="price-slider-box">
                                <input type="range" name="max_price" class="custom-range" id="priceRange" min="500" max="5000" step="100"
                                    value="{{ request('max_price', 2500) }}" oninput="document.getElementById('priceCurrentLabel').innerText = '₹' + this.value" onchange="document.getElementById('filterForm').submit()">
                                <div class="slider-labels">
                                    <span>₹500</span>
                                    <span id="priceCurrentLabel">₹{{ request('max_price', 2500) }}</span>
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
                                <p class="results-count">Showing <strong>{{ $partners->firstItem() ?? 0 }} - {{ $partners->lastItem() ?? 0 }}</strong> of <strong>{{ $partners->total() }}</strong>
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
                                        <select id="sortSelect" class="sort-select" onchange="document.getElementById('sortInput').value = this.value; document.getElementById('filterForm').submit()">
                                            <option value="recommended" {{ request('sort') == 'recommended' ? 'selected' : '' }}>Recommended</option>
                                            <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Highest Rated</option>
                                            <option value="price-low" {{ request('sort') == 'price-low' ? 'selected' : '' }}>Price: Low to High</option>
                                            <option value="price-high" {{ request('sort') == 'price-high' ? 'selected' : '' }}>Price: High to Low</option>
                                            <option value="popularity" {{ request('sort') == 'popularity' ? 'selected' : '' }}>Most Popular</option>
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
                                    <img src="{{ $partner->profile_image ? get_media_url($partner->profile_image) : 'https://placehold.co/400x500/e2e8f0/94a3b8?text=No+Photo' }}" alt="{{ $partner->name }}" loading="lazy">
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
                                        @foreach(explode(',', $partner->category) as $cat)
                                            @php
                                                $categoryModel = \App\Models\Category::find(trim($cat));
                                            @endphp
                                            <span class="tag">{{ $categoryModel ? $categoryModel->name : trim($cat) }}</span>
                                        @endforeach
                                    </div>
                                    <!-- <div class="partner-price">
                                        <span class="amount">₹{{ number_format($partner->price_per_hour, 0) }}</span> <span class="unit">/ hour</span>
                                    </div> -->
                                    <div class="partner-card-actions">
                                        <a href="{{ route('partners.profile', $partner->profile_id) }}" class="btn-view-profile">View Profile</a>
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
                        <div class="partners-pagination d-flex justify-content-center mt-4">
                            {{ $partners->links('pagination::bootstrap-5') }}
                        </div>

                    </div>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const ageChips = document.querySelectorAll('.age-chip');
                    const ageInput = document.getElementById('ageRangeInput');
                    const form = document.getElementById('filterForm');

                    ageChips.forEach(chip => {
                        chip.addEventListener('click', function() {
                            const range = this.getAttribute('data-range');
                            if (ageInput.value === range) {
                                ageInput.value = ''; // toggle off
                            } else {
                                ageInput.value = range;
                            }
                            form.submit();
                        });
                    });
                });
            </script>
        </section>