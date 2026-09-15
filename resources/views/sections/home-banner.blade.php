<section class="hero">
      <div class="container hero-content">
        <div class="hero-copy">
          <div class="eyebrow">{{$data['title'] ?? ''}}</div>
          <h1>{!!( $data['subtitle'] ?? '' )!!}</h1>
          <p>{!!( $data['description'] ?? '' )!!}</p>
        </div>
        <div class="hero-tag">{!! $data['tagline'] ?? '' !!}</div>
      </div>
          @php
            $limit = $data['limit'] ?? 20;
            $categories = get_catgeories($limit);
        @endphp
      <form class="searchbox" onsubmit="return false">
        <div class="searchfield">
          <div class="ico">♙</div>
          <div><label>What do you need?</label><select>
              <option value="">e.g. Movie, Shopping, Travel</option>
              @foreach($categories as $cat)
              <option value="{{ $cat->name }}">{{ $cat->name }}</option>
              @endforeach
            </select></div>
        </div>
        <div class="searchfield">
          <div class="ico">⌖</div>
          <div><label>Location</label><select>
              <option>Select city</option>
              <option>Delhi</option>
              <option>Mumbai</option>
              <option>Bengaluru</option>
            </select></div>
        </div>
        <div class="searchfield">
          <div class="ico">▣</div>
          <div><label>Date & Time</label><select>
              <option>Select date & time</option>
              <option>Today</option>
              <option>Tomorrow</option>
            </select></div>
        </div>
        <button class="searchbtn">⌕ &nbsp; Find Partners</button>
      </form>
    </section>