<section class="hero">
      <div class="container hero-content">
        <div class="hero-copy">
          <div class="eyebrow">{{$data['title'] ?? ''}}</div>
          <h1>{!!( $data['subtitle'] ?? '' )!!}</h1>
          <p>{!!( $data['description'] ?? '' )!!}</p>
        </div>
        <div class="hero-tag">{!! $data['tagline'] ?? '' !!}</div>
      </div>
     
    </section>