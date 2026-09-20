  
@if(isset($data['list']) && !empty($data['list']))
    <section class="about-mission-vision">
        <div class="container">
            <div class="mission-vision-grid">
                <!-- Our Mission Card -->
                    @foreach($data['list'] as $item)
                <div class="mv-card">
                    <div class="mv-header">
                        <div class="mv-icon-badge">
                            <i class="{{$item['icon'] ?? ''}}"></i>
                        </div>
                        <h3 class="mv-title">{{$item['title'] ?? ''}}</h3>
                    </div>
                    <p class="mv-desc">
                        {{$item['description'] ?? ''}}
                    </p>
                </div>
                @endforeach

            </div>
        </div>
    </section>
@endif