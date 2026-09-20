  <section class="about-reality-section">
            <div class="container">
                <div class="reality-gradient-card">
                    <!-- Section Title & Heart Divider -->
                    <div class="reality-header">
                        <h2 class="reality-title">{{$data['title'] ?? ''}}</h2>
                        <div class="reality-heart-divider">♡</div>
                    </div>

                    <!-- 2 Translucent Glass Cards -->
                    <div class="reality-cards-grid">
                        @if($data['list'])
                        @foreach($data['list'] as $list)
                        <div class="reality-box">
                            <div class="reality-box-icon">
                                <i class="{{$list['icon'] ?? ''}}" aria-hidden="true"></i>
                            </div>
                            <p>
                                {{$list['description'] ?? ''}}
                            </p>
                        </div>
                        @endforeach
                        @endif
                    </div>

                    <!-- Bottom Conclusion within Banner -->
                    <div class="reality-conclusion">
                        <div class="reality-conclusion-title">{{$data['subtitle'] ?? ''}}.</div>
                        <p class="reality-conclusion-sub">{{$data['description'] ?? ''}}</p>
                    </div>
                </div>
            </div>
        </section>