  <section class="section faq-section" id="faq">
    <div class="container faq-container">
      <div class="faq-head">
        <h2>{{$data['title'] ?? ''}}</h2>
        <p>{{$data['description'] ?? ''}}</p>
      </div>

      <div class="faq-list">

       @foreach($data['list'] ?? [] as $index => $step)
        <div class="faq-item">
          <button class="faq-question" aria-expanded="false">
            <span>{{$step['question']}}</span>
            <span class="faq-icon">▼</span>
          </button>
          <div class="faq-answer">
            {!!($step['answer'] ?? '')!!}
          </div>
        </div>
        @endforeach

        
      </div>
    </div>
  </section>