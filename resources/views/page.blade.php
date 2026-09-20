<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description"
    content="Soulmate India - Find a trusted companion for movies, shopping, travel, dining and special moments.">
  <title>Soulmate India | Partner on Rent</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/about.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/contact.css')}}">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css" integrity="sha512-QeR2VH+lsBE5LSAe1Q5EnTBbe7XTBubt8dG93Y7gidSgdMCr8nVqKcfKAMyN96SV8KDbZVTDXChatu5G2KQGzg==" crossorigin="anonymous" referrerpolicy="no-referrer">
   <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

  @include('partial.header')

  <main id="home">
      @foreach($page->content as $section)
            @php
                $type = $section['type'];
                $data = $section['data'];

                // Handle global sections
                if ($type === 'global_section') {
                    $global = \App\Models\GlobalSection::with('sectionType')->find($data['global_section_id']);
                    if ($global) {
                        $type = $global->sectionType->identifier;
                        $data = $global->data;
                    }
                }
                
                // Handle dynamic section builder
                if ($type === 'section') {
                    $sectionTypeModel = \App\Models\SectionType::find($data['section_type_id'] ?? null);
                    if ($sectionTypeModel) {
                        $type = $sectionTypeModel->identifier;
                        $data = $data['data'] ?? [];
                    }
                }
                
                $template = 'sections.' . $type;
            @endphp
            @if(view()->exists($template))
                @include($template, ['data' => $data])
            @else
                <div class="container mx-auto px-6 py-12 text-center bg-yellow-50 border border-yellow-200 rounded-xl my-8">
                    <p class="text-yellow-700 font-medium">Section template <code>{{ $type }}</code> not found.</p>
                    <p class="text-sm text-yellow-600 mt-2">Create a Blade file at <code>resources/views/sections/{{ $type }}.blade.php</code></p>
                </div>
            @endif
        @endforeach
  </main>


 @include('partial.footer')

  <script src="{{asset('assets/js/script.js')}}"></script>
</body>

</html>