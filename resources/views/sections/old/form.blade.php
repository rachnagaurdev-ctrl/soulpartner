<section class="form-section py-20 bg-white" id="{{ $data['section_id'] ?? '' }}">
    <div class="custom-container">
        <div class="row items-center">
            @if(!empty($data['title']) || !empty($data['subtitle']))
                <div class="col-12 col-lg-5 mb-12 lg:mb-0">
                    <div class="custom-heading mb-8">
                        @if(!empty($data['subtitle']))
                            <div class="sub_heading fs-24 fw-300 text-dark-gray mb-2">{{ $data['subtitle'] }}</div>
                        @endif
                        @if(!empty($data['title']))
                            <h2 class="heading fs-64 fw-600 text-primary">{{ $data['title'] }}</h2>
                        @endif
                    </div>
                    @if(!empty($data['description']))
                        <div class="text-gray-600 fs-18 fw-300 leading-relaxed">
                            {!! $data['description'] !!}
                        </div>
                    @endif
                </div>
                <div class="col-12 col-lg-6 offset-lg-1">
                    <div class="form-card bg-gray-50 p-8 lg:p-12 rounded-3xl border border-gray-100 shadow-xl shadow-gray-200/50">
                        @if(!empty($data['form_id']))
                            @php $form = \App\Models\Form::find($data['form_id']); @endphp
                            @if($form)
                                @livewire('dynamic-form', ['slug' => $form->slug])
                            @endif
                        @else
                            <div class="text-center py-12 border-2 border-dashed border-gray-200 rounded-2xl text-gray-400">
                                <p>Please select a form in the CMS settings.</p>
                            </div>
                        @endif
                    </div>
                </div>
            @else
                <div class="col-12 max-w-3xl mx-auto">
                    <div class="form-card bg-white p-8 lg:p-12 rounded-3xl border border-gray-100 shadow-2xl">
                        @if(!empty($data['form_id']))
                            @php $form = \App\Models\Form::find($data['form_id']); @endphp
                            @if($form)
                                @livewire('dynamic-form', ['slug' => $form->slug])
                            @endif
                        @else
                            <div class="text-center py-12 border-2 border-dashed border-gray-200 rounded-2xl text-gray-400">
                                <p>Please select a form in the CMS settings.</p>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
