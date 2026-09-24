<section class="hero"  style="--bg-image: url({{get_storage_url($data['background_image'])}});">
      <div class="container hero-content">
        <div class="hero-copy">
          <div class="eyebrow">{{$data['title'] ?? ''}}</div>
          <h1>{!!( $data['subtitle'] ?? '' )!!}</h1>
          <p>{!!( $data['description'] ?? '' )!!}</p>
        </div>
        <div class="hero-tag">{!! $data['tagline'] ?? '' !!}</div>
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
                    <li class="sbd-item" data-value="{{ $cat->name }}">{{ $cat->name }}</li>
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
              <input type="hidden" name="location" class="sbd-value">
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
<style>
/* Dropdown wrapper */
.sbd-wrap {
  position: relative;
  cursor: pointer;
  user-select: none;
}

/* Inner flex column */
.sbd-inner {
  flex: 1;
  min-width: 0;
  position: relative;
}

/* Selected text display */
.sbd-selected {
  font-size: 14px;
  font-weight: 500;
  color: #333140;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  padding-right: 4px;
  transition: color 0.2s;
}

.sbd-selected.is-placeholder {
  color: #aaa;
}

/* Chevron arrow */
.sbd-arrow {
  width: 16px;
  height: 16px;
  flex-shrink: 0;
  color: #bba8c8;
  transition: transform 0.25s ease, color 0.2s;
  margin-left: 4px;
}

.sbd-wrap.sbd-open .sbd-arrow {
  transform: rotate(180deg);
  color: var(--pink, #d80b76);
}

/* Dropdown panel */
.sbd-dropdown {
  position: absolute;
  top: calc(100% + 14px);
  left: -60px;
  min-width: 240px;
  max-width: 300px;
  background: #fff;
  border-radius: 14px;
  box-shadow: 0 16px 48px rgba(19, 16, 43, 0.16), 0 4px 16px rgba(19,16,43,0.07);
  border: 1px solid #f0e6f4;
  z-index: 999;
  overflow: hidden;
  opacity: 0;
  transform: translateY(8px) scale(0.97);
  pointer-events: none;
  transition: opacity 0.2s ease, transform 0.2s ease;
}

.sbd-wrap.sbd-open .sbd-dropdown {
  opacity: 1;
  transform: translateY(0) scale(1);
  pointer-events: all;
}

/* Search bar inside dropdown */
.sbd-search-wrap {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 10px 14px;
  border-bottom: 1px solid #f3eaf6;
  position: sticky;
  top: 0;
  background: #fff;
  z-index: 2;
}

.sbd-search-wrap svg {
  width: 15px;
  height: 15px;
  flex-shrink: 0;
  color: #c084b4;
}

.sbd-search {
  border: none;
  outline: none;
  font-size: 13px;
  font-weight: 500;
  color: #333140;
  background: transparent;
  width: 100%;
  font-family: inherit;
}

.sbd-search::placeholder {
  color: #cbb8d8;
  font-weight: 400;
}

/* Scrollable list */
.sbd-list {
  list-style: none;
  margin: 0;
  padding: 6px 0;
  max-height: 240px;
  overflow-y: auto;
  scrollbar-width: thin;
  scrollbar-color: #e8cfe8 transparent;
}

.sbd-list::-webkit-scrollbar { width: 5px; }
.sbd-list::-webkit-scrollbar-track { background: transparent; }
.sbd-list::-webkit-scrollbar-thumb { background: #e8cfe8; border-radius: 10px; }

/* Individual item */
.sbd-item {
  padding: 9px 16px;
  font-size: 13.5px;
  font-weight: 500;
  color: #444;
  cursor: pointer;
  transition: background 0.15s, color 0.15s;
  display: flex;
  align-items: center;
  gap: 8px;
}

.sbd-item:hover {
  background: #fdf0f8;
  color: var(--pink, #d80b76);
}

.sbd-item.sbd-active {
  background: linear-gradient(90deg, #fce8f4, #f9f0fe);
  color: var(--pink, #d80b76);
  font-weight: 700;
}

.sbd-item.sbd-active::before {
  content: "✓";
  font-size: 11px;
  font-weight: 900;
  color: var(--pink, #d80b76);
  flex-shrink: 0;
}

.sbd-item.sbd-hidden {
  display: none;
}

/* Highlight open searchfield */
.sbd-wrap.sbd-open {
  background: #fdf5fb;
  border-radius: 10px;
}

/* Focus ring on open */
.searchbox:focus-within .sbd-wrap.sbd-open {
  outline: none;
}
</style>

{{-- ============================================================
     Custom Banner Dropdown Script
     ============================================================ --}}
<script>
(function () {
  const wraps = document.querySelectorAll('.sbd-wrap');

  wraps.forEach(function (wrap) {
    const selected  = wrap.querySelector('.sbd-selected');
    const hidden    = wrap.querySelector('.sbd-value');
    const dropdown  = wrap.querySelector('.sbd-dropdown');
    const items     = wrap.querySelectorAll('.sbd-item');
    const searchIn  = wrap.querySelector('.sbd-search');
    const placeholder = selected.dataset.placeholder || '';

    /* Toggle open */
    wrap.addEventListener('click', function (e) {
      if (searchIn && e.target === searchIn) return; // don't close when typing
      const isOpen = wrap.classList.contains('sbd-open');
      closeAll();
      if (!isOpen) {
        wrap.classList.add('sbd-open');
        if (searchIn) { searchIn.focus(); searchIn.value = ''; filterItems(searchIn, items); }
      }
    });

    /* Pick item */
    items.forEach(function (item) {
      item.addEventListener('click', function (e) {
        e.stopPropagation();
        const val   = item.dataset.value;
        const label = item.textContent.trim();

        hidden.value = val;

        if (val === '') {
          selected.textContent = placeholder;
          selected.classList.add('is-placeholder');
        } else {
          selected.textContent = label;
          selected.classList.remove('is-placeholder');
        }

        items.forEach(function (i) { i.classList.remove('sbd-active'); });
        if (val !== '') item.classList.add('sbd-active');

        closeAll();
      });
    });

    /* Search filter */
    if (searchIn) {
      searchIn.addEventListener('input', function () {
        filterItems(searchIn, items);
      });
      searchIn.addEventListener('click', function (e) { e.stopPropagation(); });
    }

    /* Init placeholder state */
    selected.classList.add('is-placeholder');
  });

  /* Close all dropdowns */
  function closeAll() {
    wraps.forEach(function (w) { w.classList.remove('sbd-open'); });
  }

  /* Filter list by search query */
  function filterItems(input, items) {
    const q = input.value.toLowerCase().trim();
    items.forEach(function (item) {
      const txt = item.textContent.toLowerCase();
      if (q === '' || txt.includes(q)) {
        item.classList.remove('sbd-hidden');
      } else {
        item.classList.add('sbd-hidden');
      }
    });
  }

  /* Close on outside click */
  document.addEventListener('click', function (e) {
    if (!e.target.closest('.sbd-wrap')) closeAll();
  });

  /* Close on Escape */
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') closeAll();
  });
})();
</script>