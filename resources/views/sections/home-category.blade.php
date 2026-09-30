    

    <section class="section categories" id="categories">
      <div class="container">
        <div class="section-head">
          <h2>{{$data['title']}}</h2>
          <p>{!!($data['description'])!!}</p>
        </div>
        @php
            $limit = $data['limit'] ?? 4;
            $categories = get_catgeories($limit);
        @endphp
        <div class="category-grid">
          @forelse($categories as $cat)
          <article class="category-card">
            <div class="category-img">
                @if($cat->horizontal_image)
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($cat->horizontal_image) }}" alt="{{ $cat->name }}">
                @else
                    <img src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?auto=format&fit=crop&q=80&w=2426" alt="Default Blog">
                @endif
                <div class="category-icon">
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
            </div>
            <div class="category-body">
              <h3 class="category-title">{{ $cat->name }}</h3>
              <p class="category-desc">{{ $cat->description ?? 'Find the perfect companion for this activity.' }}</p>
              
              <div class="category-meta">
                  <div class="category-meta-item">
                      <i class="fa-solid fa-indian-rupee-sign category-meta-icon"></i>
                      <span class="category-meta-text">
                          @if($cat->min_price && $cat->max_price)
                              {{ number_format($cat->min_price, 0) }} - {{ number_format($cat->max_price, 0) }}
                          @elseif($cat->min_price)
                              From {{ number_format($cat->min_price, 0) }}
                          @elseif($cat->prices)
                              {{ number_format($cat->prices, 0) }}
                          @else
                              N/A
                          @endif
                      </span>
                  </div>
                  <div class="category-meta-item">
                      <i class="fa-regular fa-clock category-meta-icon"></i>
                      <span class="category-meta-text">{{ ($cat->hours* 60 + $cat->minutes) ? ( ($cat->hours* 60 + $cat->minutes)/60 ) . ' hrs' :  0 }}</span>
                  </div>
              </div>
              
              <a href="{{ route('page.show', ['slug' => 'partners', 'category' => $cat->slug]) }}" class="category-btn">
                  View Details <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </article>
          @empty
          <p class="text-center" style="grid-column:1/-1;">No categories found.</p>
          @endforelse

          {{-- View All Categories Card --}}
          <article class="category-card category-card--viewall">
            <a href="{{ route('page.show', ['slug' => 'categories']) }}" class="viewall-inner">
              <div class="viewall-icon-wrap">
                <span class="viewall-icon">
                  <i class="fa-solid fa-grid-2"></i>
                </span>
              </div>
              <h3 class="viewall-title">View All<br>Categories</h3>
              <p class="viewall-sub">Explore every activity &amp; find your ideal companion</p>
              <span class="viewall-btn">
                Browse All <i class="fa-solid fa-arrow-right viewall-arrow"></i>
              </span>
            </a>
          </article>

        </div>
      </div>
    </section>


