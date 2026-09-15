
  <div class="custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__wrapper">
                        <ol class="breadcrumb__list list-unstyled d-flex text-primary fw-500">
                        @foreach($data['breadcumblist'] as $breadcrumb)
                            <li class="list-style-none fw-500">
                                <a href="{{ get_cta_link($breadcrumb['cta']['label']) }}">{{ $breadcrumb['cta']['label'] }}</a>
                            </li>
                        @endforeach
                    </ol>
                </div>  
            </div>
        </div>