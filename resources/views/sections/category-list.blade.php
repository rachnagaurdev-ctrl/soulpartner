    

    <section class="section categories" id="categories">
      <div class="container">
        <div class="section-head">
       
        </div>
        @php
            $limit = 100;
            $categories = get_catgeories($limit);
        @endphp
        <div class="catlist-grid">
          @forelse($categories as $cat)
          <article class="catlist-card">
            <div class="catlist-img">
                @if($cat->image)
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($cat->image) }}" alt="{{ $cat->name }}">
                @else
                    <img src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?auto=format&fit=crop&q=80&w=2426" alt="Default Blog">
                @endif
            </div>
            <div class="catlist-body">
              <div class="catlist-icon">
                  @if($cat->icon)
                      @if(preg_match('/^[a-z0-9-]+$/i', $cat->icon))
                          <i class="fa-solid fa-{{$cat->icon}}"></i>
                      @else
                          <span style="display:inline-block; font-size: 1.5em; line-height: 1;">{!! $cat->icon !!}</span>
                      @endif
                  @else
                      <i class="fa-solid fa-star"></i>
                  @endif
              </div>
              <h3 class="catlist-title">{{ $cat->name }}</h3>
              <p class="catlist-desc">{{ $cat->description ?? 'Find the perfect companion for this activity.' }}</p>
              
              <div class="catlist-pricing">
                  <div class="catlist-price">
                      @if($cat->min_price && $cat->max_price)
                          <strong>₹{{ number_format($cat->min_price, 0) }} - ₹{{ number_format($cat->max_price, 0) }}</strong>
                      @elseif($cat->min_price)
                          From <strong>₹{{ number_format($cat->min_price, 0) }}</strong>
                      @elseif($cat->prices)
                          From <strong>₹{{ number_format($cat->prices, 0) }}</strong>
                      @else
                          <strong>N/A</strong>
                      @endif
                  </div>
                  <div class="catlist-time">
                      Minimum {{ ($cat->hours* 60 + $cat->minutes)/60 }} Hours
                  </div>
              </div>
              
              <a href="{{ route('page.show', ['slug' => 'partners', 'category' => $cat->slug]) }}" class="catlist-btn">
                  View Partners <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </article>
          @empty
          <p class="text-center" style="grid-column:1/-1;">No categories found.</p>
          @endforelse

        

        </div>
      </div>
    </section>


