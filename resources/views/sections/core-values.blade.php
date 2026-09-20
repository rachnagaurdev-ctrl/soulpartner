  <section class="about-values">
            <div class="container">
                <div class="values-header">
                    <div class="values-divider-title">
                        <span class="values-heart">♥</span>
                        <span>{{$data['title'] ?? ''}}</span>
                    </div>
                </div>
                @if(isset($data['list']) && !empty($data['list']))

                <div class="values-grid">
                    <!-- Value 1: Trust -->
                     @foreach($data['list'] as $step)
                    <div class="value-card">
                        <div class="value-icon-wrap">
                            <i class="{{$step['icon'] ?? ''}}"></i>
                        </div>
                        <h4 class="value-title">{{$step['title'] ?? ''}}</h4>
                        <p class="value-desc">{{$step['description'] ?? ''}}</p>
                    </div>
                    @endforeach

                </div>
               
                @endif
            </div>
        </section>