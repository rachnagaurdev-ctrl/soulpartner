 <section class="about-what-we-do">
            <div class="container">
                <div class="what-we-do-grid">
                    <!-- Left Copy & Button -->
                    <div class="what-we-do-copy">
                        <div class="about-eyebrow-badge">
                            <span class="eyebrow-heart">♥</span>
                            <span>{{$data['title'] ?? ''}}</span>
                            <span class="eyebrow-line"></span>
                        </div>
                        <h2 class="what-we-do-title">{{$data['sub_title'] ?? ''}}</h2>
                        <p class="what-we-do-desc">
                            {{$data['description'] ?? ''}}
                        </p>
                         @if(isset($data['cta']['label']))
                            <a href="{{ get_cta_link($data['cta']['label']) }}" class="btn btn-primary">
                                <span>{{ $data['cta']['label'] }}</span>
                                <span>&rarr;</span>
                            </a>
                         @endif
                      
                    </div>
                    @if(isset($data['list']))
                    <!-- Right 2x3 Category Cards Grid -->
                    <div class="category-mini-grid">
                        <!-- Card 1: Companionship -->
                         @foreach($data['list'] as $item)
                        <div class="mini-category-card">
                            <div class="mini-cat-icon">
                                <i class="{{$item['icon'] ?? ''}}"></i>
                            </div>
                            <h3 class="mini-cat-title">{{$item['title']}}</h3>
                            <p class="mini-cat-sub">{{$item['description']}}</p>
                        </div>
                        @endforeach

                      
                    </div>
                    @endif
                </div>
            </div>
        </section>