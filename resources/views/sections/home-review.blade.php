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
          <article class="review-card">
            <div class="user"><img class="avatar" src="{{asset('assets/images/shopping.jpg')}}" alt="">
              <div><strong>Priya Sharma</strong>
                <div class="stars">★★★★★</div>
              </div>
            </div>
            <p>“I booked a movie companion for the first time and it was an amazing experience. She was friendly, fun
              and made the evening special.”</p>
            <div class="tag">▣ &nbsp; Movie Companion</div>
          </article>
          <article class="review-card">
            <div class="user"><img class="avatar" src="{{asset('assets/images/sports.jpg')}}" alt="">
              <div><strong>Rahul Mehta</strong>
                <div class="stars">★★★★★</div>
              </div>
            </div>
            <p>“The platform is simple to use and everything is so secure. I found a great travel partner and we had the
              best trip together!”</p>
            <div class="tag">✈ &nbsp; Travel Companion</div>
          </article>
          <article class="review-card">
            <div class="user"><img class="avatar" src="{{asset('assets/images/dining.jpg')}}" alt="">
              <div><strong>Neha Verma</strong>
                <div class="stars">★★★★★</div>
              </div>
            </div>
            <p>“Loved the whole experience! The partner was genuinely kind and the service was smooth from booking to
              meeting.”</p>
            <div class="tag">♜ &nbsp; Dining Companion</div>
          </article>
          <article class="review-card">
            <div class="user"><img class="avatar" src="{{asset('assets/images/travel.jpg')}}" alt="">
              <div><strong>Amit Singh</strong>
                <div class="stars">★★★★★</div>
              </div>
            </div>
            <p>“Very professional and trustworthy platform. I've already booked twice and both experiences were
              fantastic!”</p>
            <div class="tag">♨ &nbsp; Sports &amp; Activity</div>
          </article>
        </div>
      </div>
    </section>