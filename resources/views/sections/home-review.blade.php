  <section class="section reviews" id="discover">
      <div class="container">
        <div class="review-head">
          <div>
            <div class="eyebrow">{{$data['title'] ?? ''}}</div>
            <h2>{{$data['subtitle'] ?? ''}}</h2>
            <p>{{$data['description'] ?? ''}}</p>
          </div>
          <div class="review-arrows"><button class="arrow" id="prev">←</button><button class="arrow"
              id="next">→</button></div>
        </div>
        <div class="review-grid" id="reviewGrid">
          @php
            $reviews = $data['list'] ?? [
              ['name' => 'Priya Sharma', 'avatar' => 'assets/images/shopping.jpg', 'stars' => 5, 'review' => '"I booked a movie companion for the first time and it was an amazing experience. She was friendly, fun and made the evening special."', 'tag' => '▣ &nbsp; Movie Companion'],
              ['name' => 'Rahul Mehta',  'avatar' => 'assets/images/sports.jpg',   'stars' => 5, 'review' => '"The platform is simple to use and everything is so secure. I found a great travel partner and we had the best trip together!"', 'tag' => '✈ &nbsp; Travel Companion'],
              ['name' => 'Neha Verma',   'avatar' => 'assets/images/dining.jpg',   'stars' => 5, 'review' => '"Loved the whole experience! The partner was genuinely kind and the service was smooth from booking to meeting."', 'tag' => '♜ &nbsp; Dining Companion'],
              ['name' => 'Amit Singh',   'avatar' => 'assets/images/travel.jpg',   'stars' => 5, 'review' => '"Very professional and trustworthy platform. I\'ve already booked twice and both experiences were fantastic!"', 'tag' => '♨ &nbsp; Sports &amp; Activity'],
            ];
          @endphp
          @foreach($reviews as $review)
          <article class="review-card">
            <div class="user">
              <img class="avatar" src="{{ asset($review['avatar'] ?? 'assets/images/shopping.jpg') }}" alt="{{ $review['name'] ?? '' }}">
              <div>
                <strong>{{ $review['name'] ?? '' }}</strong>
                <div class="stars">{{ str_repeat('★', (int)($review['stars'] ?? 5)) }}</div>
              </div>
            </div>
            <p>{{ $review['review'] ?? '' }}</p>
            <div class="tag">{!! $review['tag'] ?? '' !!}</div>
          </article>
          @endforeach
        </div>
      </div>
    </section>