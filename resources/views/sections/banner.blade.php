<section class="hero"  style="--bg-image: url({{get_storage_url($data['background_image'])}});">
      <div class="container hero-content">
        <div class="hero-copy">
          @if(isset($data['title']))
          <div class="eyebrow">{{$data['title'] ?? ''}}</div>
          @endif
          <h1>{!!( $data['subtitle'] ?? '' )!!}</h1>
          @if(isset($data['description']))
          <p>{!!( $data['description'] ?? '' )!!}</p>
          @endif
        </div>
        @if(isset($data['tagline']))
        <div class="hero-tag">{!! $data['tagline'] !!}</div>
        @endif
      </div>

      @if(isset($data['filter_section']) && !empty($data['filter_section']) && $data['filter_section'] == 'yes')
        @php
          /* --- Categories from DB --- */
          $bannerCategories = get_catgeories($data['limit'] ?? 20);

          /* --- Cities: full India list via helper --- */
          $bannerCities = get_cities();

          /* --- Next 7 days as date options --- */
          $bannerDates = get_dates();
        @endphp

        <form class="searchbox" id="bannerSearchForm" action="{{ route('page.show', ['slug' => 'partners']) }}" method="GET">

          {{-- Category --}}
          <div class="searchfield sbd-wrap" data-sbd="category">
            <div class="ico">♙</div>
            <div class="sbd-inner">
              <label>What do you need?</label>
              <div class="sbd-selected" data-placeholder="e.g. Movie, Shopping, Travel">e.g. Movie, Shopping, Travel</div>
              <input type="hidden" name="category" class="sbd-value">
              <div class="sbd-dropdown">
                <ul class="sbd-list">
                  <li class="sbd-item" data-value="">e.g. Movie, Shopping, Travel</li>
                  @foreach ($bannerCategories as $cat)
                    <li class="sbd-item" data-value="{{ $cat->slug }}">{{ $cat->name }}</li>
                  @endforeach
                </ul>
              </div>
            </div>
            <svg class="sbd-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
          </div>

          {{-- City --}}
          <div class="searchfield sbd-wrap" data-sbd="location">
            <div class="ico">⌖</div>
            <div class="sbd-inner">
              <label>Location</label>
              <div class="sbd-selected" data-placeholder="Select city">Select city</div>
              <input type="hidden" name="city" class="sbd-value">
              <div class="sbd-dropdown sbd-has-search">
                <div class="sbd-search-wrap">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                  <input type="text" class="sbd-search" placeholder="Search city…">
                </div>
                <ul class="sbd-list">
                  <li class="sbd-item" data-value="">Select city</li>
                  @foreach ($bannerCities as $city)
                    <li class="sbd-item" data-value="{{ $city }}">{{ $city }}</li>
                  @endforeach
                </ul>
              </div>
            </div>
            <svg class="sbd-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
          </div>

          {{-- Date --}}
          <div class="searchfield sbd-wrap" data-sbd="date">
            <div class="ico">▣</div>
            <div class="sbd-inner">
              <label>Date</label>
              <div class="sbd-selected" data-placeholder="Select date">Select date</div>
              <input type="hidden" name="date" class="sbd-value">
              <div class="sbd-dropdown">
                <ul class="sbd-list">
                  <li class="sbd-item" data-value="">Select date</li>
                  @foreach ($bannerDates as $d)
                    <li class="sbd-item" data-value="{{ $d['value'] }}">{{ $d['label'] }}</li>
                  @endforeach
                </ul>
              </div>
            </div>
            <svg class="sbd-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
          </div>

          <button type="submit" class="searchbtn">⌕ &nbsp; Find Partners</button>
        </form>
      @endif
    </section>

{{-- ============================================================
     Custom Banner Dropdown Styles
     ============================================================ --}}


{{-- ============================================================
     Custom Banner Dropdown Script
     ============================================================ --}}
