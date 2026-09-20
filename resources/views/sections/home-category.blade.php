    <style>
      .category-grid {
          display: grid;
          grid-template-columns: repeat(1, 1fr);
          gap: 24px;
          margin-top: 30px;
      }
      @media (min-width: 576px) {
          .category-grid {
              grid-template-columns: repeat(2, 1fr);
          }
      }
      @media (min-width: 768px) {
          .category-grid {
              grid-template-columns: repeat(3, 1fr);
          }
      }
      @media (min-width: 992px) {
          .category-grid {
              grid-template-columns: repeat(4, 1fr);
          }
      }
      @media (min-width: 1200px) {
          .category-grid {
              grid-template-columns: repeat(5, 1fr);
          }
      }
      
      .category-card {
          border: 1px solid #f0f0f0;
          border-radius: 12px;
          overflow: hidden;
          box-shadow: 0 4px 10px rgba(0,0,0,0.03);
          transition: transform 0.3s ease, box-shadow 0.3s ease;
          display: flex;
          flex-direction: column;
          background: #fff;
          text-decoration: none;
          text-align: left; /* Explicitly override any centering */
      }
      
      .category-card:hover {
          transform: translateY(-5px);
          box-shadow: 0 10px 20px rgba(0,0,0,0.08);
      }
      
      .category-img {
          position: relative;
          height: 160px;
          overflow: hidden;
      }
      
      .category-img img {
          width: 100%;
          height: 100%;
          object-fit: cover;
      }
      
      .category-icon {
          position: absolute;
          bottom: -18px;
          left: 20px;
          width: 36px;
          height: 36px;
          background-color: #ff1493; /* Solid pink */
          color: #fff; /* White icon */
          border-radius: 50%;
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 1rem;
          border: 3px solid #fff;
          z-index: 2;
      }
      
      .category-body {
          padding: 25px 20px 20px;
          flex-grow: 1;
          display: flex;
          flex-direction: column;
          text-align: left;
      }
      
      .category-title {
          font-size: 1.05rem;
          font-weight: 700;
          margin-bottom: 6px;
          color: #2c3e50;
      }
      
      .category-desc {
          font-size: 0.85rem;
          color: #7f8c8d;
          margin-bottom: 15px;
          flex-grow: 1;
          line-height: 1.4;
      }
      
      .category-meta {
          display: flex;
          justify-content: space-between;
          align-items: center;
          font-size: 0.8rem;
          color: #555;
          margin-bottom: 15px;
          padding-bottom: 15px;
          border-bottom: 1px solid #f0f0f0;
      }
      
      .category-meta-item {
          display: flex;
          align-items: center;
          gap: 6px;
      }
      
      .category-meta-icon {
          color: #ff1493;
          font-size: 0.9rem;
      }
      
      .category-meta-text {
          font-weight: 600;
          color: #34495e;
          white-space: nowrap;
      }
      
      .category-btn {
          display: flex;
          align-items: center;
          justify-content: center;
          width: 100%;
          padding: 8px 0;
          border: 1px solid #ffccdf;
          border-radius: 20px;
          color: #ff1493;
          font-weight: 600;
          text-decoration: none;
          font-size: 0.85rem;
          transition: all 0.3s ease;
          background: transparent;
      }
      
      .category-btn:hover {
          background: #ff1493;
          color: #fff;
          border-color: #ff1493;
      }
      
      .category-btn i {
          margin-left: 6px;
          font-size: 0.75rem;
      }
    </style>

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
                @if($cat->image)
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($cat->image) }}" alt="{{ $cat->name }}">
                @else
                    <img src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?auto=format&fit=crop&q=80&w=2426" alt="Default Blog">
                @endif
                <div class="category-icon">
                    @if($cat->icon)
                       <i class="fa-solid fa-{{$cat->icon}}"></i>
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
                          @if($cat->prices)
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
              
              <a href="#" class="category-btn">
                  View Details <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </article>
          @empty
          <p class="text-center" style="grid-column:1/-1;">No categories found.</p>
          @endforelse

          {{-- View All Categories Card --}}
          <article class="category-card category-card--viewall">
            <a href="{{ route('page.show', ['slug' => 'partners']) }}" class="viewall-inner">
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

<style>
/* === View All Card === */
.category-card--viewall {
  background: linear-gradient(145deg, #1e1040 0%, #3b1d74 60%, #6b1fa8 100%);
  border: none;
  border-radius: 12px;
  overflow: hidden;
  position: relative;
  display: flex;
  align-items: stretch;
}

.category-card--viewall::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 80% 20%, rgba(216,11,118,0.28) 0%, transparent 65%);
  pointer-events: none;
}

.viewall-inner {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  padding: 32px 20px;
  width: 100%;
  text-decoration: none;
  position: relative;
  z-index: 1;
  gap: 10px;
}

.viewall-icon-wrap {
  width: 62px;
  height: 62px;
  border-radius: 50%;
  background: rgba(255,255,255,0.12);
  backdrop-filter: blur(6px);
  border: 1.5px solid rgba(255,255,255,0.2);
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 4px;
  transition: transform 0.3s ease, background 0.3s ease;
}

.category-card--viewall:hover .viewall-icon-wrap {
  transform: scale(1.12);
  background: rgba(216,11,118,0.35);
}

.viewall-icon {
  font-size: 24px;
  color: #fff;
}

.viewall-title {
  font-size: 1.15rem;
  font-weight: 800;
  color: #fff;
  line-height: 1.25;
  margin: 0;
}

.viewall-sub {
  font-size: 0.78rem;
  color: rgba(255,255,255,0.62);
  line-height: 1.4;
  margin: 0;
  max-width: 160px;
}

.viewall-btn {
  display: inline-flex;
  align-items: center;
  gap: 7px;
  margin-top: 6px;
  padding: 8px 20px;
  border-radius: 20px;
  background: linear-gradient(90deg, #d80b76, #c90070);
  color: #fff;
  font-size: 0.82rem;
  font-weight: 700;
  text-decoration: none;
  box-shadow: 0 4px 14px rgba(216,11,118,0.35);
  transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.category-card--viewall:hover .viewall-btn {
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(216,11,118,0.5);
}

.viewall-arrow {
  animation: arrowPulse 1.4s ease-in-out infinite;
}

@keyframes arrowPulse {
  0%, 100% { transform: translateX(0); }
  50%       { transform: translateX(4px); }
}
</style>