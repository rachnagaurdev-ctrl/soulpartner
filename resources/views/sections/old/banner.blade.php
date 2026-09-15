 @php
// dd($data);
$breadcrumb_count = 1;

 @endphp
     @if($data['content-alignment-set'] === 'left-align')
 <header class="inner__header pos-relative">
        <div class="custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__wrapper">
                        <ol class="breadcrumb__list list-unstyled d-flex text-primary fw-500">
                            @foreach($data['breadcrumb'] as $breadcrumb)
                            <li class="list-style-none fw-500 {{ $breadcrumb_count == 3 ? 'active' : '' }}"><a href="javascript:void(0);">{{ $breadcrumb['cta']['label']}}</a></li>
                            @php
                                $breadcrumb_count++;
                            @endphp
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-12 col-xl-10">
                        <div class="section__header">
                            <h1 class="heading fs-76 fw-600 text-primary text-capitalize">{{ $data['title'] }} </h1>
                            <div class="content_wrap fs-18 text-primary-black">
                                <p>{{ $data['description']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="pos-absolute shape">
            <!-- <img class="img-fluid" src="assets/images/our-journey/header-shape.webp" alt="shape"> -->
        </div>
    </header>
    @elseif($data['content-alignment-set'] === 'center-align')
    <header class="inner__header pos-relative" style="background-image: {{ get_media_url($data['backgroud-image']) }};">
        <div class="custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__wrapper">
                        <ol class="breadcrumb__list list-unstyled d-flex text-primary fw-500">
                            @foreach($data['breadcrumb'] as $breadcrumb)
                            <li class="list-style-none fw-500 {{ $breadcrumb_count == 3 ? 'active' : '' }}"><a href="javascript:void(0);">{{ $breadcrumb['cta']['label']}}</a></li>
                            @php
                                $breadcrumb_count++;
                            @endphp
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-12 col-xl-10" style="text-align:center;">
                        <div class="section__header">
                            <h1 class="heading fs-76 fw-600 text-primary text-capitalize">{{ $data['title'] }} </h1>
                            <div class="content_wrap fs-18 text-primary-black">
                                <p>{{ $data['description']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="pos-absolute shape">
            <!-- <img class="img-fluid" src="assets/images/our-journey/header-shape.webp" alt="shape"> -->
        </div>
    </header>
    @endif