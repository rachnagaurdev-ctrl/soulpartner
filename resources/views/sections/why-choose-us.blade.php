 <section class="section why" id="why">
      <div class="container">
        <div class="why-grid">
          <div class="why-intro">
            <div class="eyebrow">{{ $data['title'] ?? 'Why Choose Us?' }}</div>
            <h2>{!! $data['subtitle'] !!}</h2>
            <p>{{ $data['description'] ?? 'Your safety and comfort are our priority.' }}</p>
          </div>
          @foreach($data['list'] ?? [] as $feature)
            <div class="feature-card">
                <div class="ficon">
                @if(isset($feature['icon']) && $feature['icon'])
                    <i class="{{$feature['icon']}}"></i>
                @endif
                </div>
                <h3>{{ $feature['title'] }}</h3>
                <p>{{ $feature['description'] }}</p>
            </div>
        @endforeach 
         
        </div>
      </div>
    </section>