  <section class="section how-section" id="how">
      <div class="container">
        <div class="how-title">
          <h2><span class="heart-icon">♥</span> {{$data['title'] ?? ''}}</h2>
          <p>{{$data['description'] ?? ''}}</p>
        </div>

        <div class="how-grid">
          <div class="steps-container">
            <div class="steps">
                  @foreach($data['list'] ?? [] as $index => $step)
                    <div class="step">
                        <div class="step-top">
                        <span class="step-num">{{$index+1}}</span>
                        <div class="step-icon">
                            @if(isset($step['icon']) && $step['icon'])
                                <i class="{{$step['icon']}}"></i>
                            @endif
                        </div>
                        </div>
                        <div class="step-body">
                        <h3>{{ $step['title'] }}</h3>
                        <p>{{ $step['description'] }}</p>
                        </div>
                    </div>
                    @if(count($data['list']) != $index+1)
                        <div class="step-arrow">→</div>
                    @endif
                @endforeach 
             

            </div>
          </div>

          <aside class="cta-card">
            <div class="cta-content">
              <h3>{!! $data['card_title'] !!}</h3>
              <p>{{$data['card_desc']}}</p>
              @if(isset($data['cta']['label']))
                <a href="{{ get_cta_link($data['cta']['label']) }}" class="btn btn-primary">{{ $data['cta']['label'] }} →</a>
              @endif

            </div>
          </aside>
        </div>
      </div>
    </section>