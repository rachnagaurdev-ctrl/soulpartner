 
 @if(isset($data['list']))
 <section class="about-stats-section">
            <div class="container">
                <div class="stats-strip-card">
                    <!-- Stat 1: 10K+ Happy Members -->
                     @foreach($data['list'] as $list)
                    <div class="stat-item">
                        <div class="stat-icon-wrap">
                            <i class="{{$list['icon'] ?? ''}}" aria-hidden="true"></i>
                        </div>
                        <div class="stat-info">
                            <span class="stat-number">{{$list['number'] ?? ''}}</span>
                            <span class="stat-label">{{$list['title'] ?? ''}}</span>
                        </div>
                    </div>
                    @endforeach

                   
                </div>
            </div>
        </section>

@endif