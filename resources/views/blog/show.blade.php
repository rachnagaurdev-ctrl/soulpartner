<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->meta_title ?: $post->title }} | VICTORA GROUP</title>
    <meta name="description" content="{{ $post->meta_description }}">
    <meta name="keywords" content="{{ $post->meta_keywords }}">
    
    <!-- Open Graph -->
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $post->meta_title ?: $post->title }}">
    <meta property="og:description" content="{{ $post->meta_description }}">
    @if($post->og_image)
        @php $ogMedia = \Awcodes\Curator\Models\Media::find($post->og_image); @endphp
        <meta property="og:image" content="{{ $ogMedia?->url }}">
    @endif

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .prose img { border-radius: 1rem; margin: 2rem 0; }
        .prose h2 { font-size: 1.875rem; font-weight: 700; color: #111827; margin-top: 2.5rem; margin-bottom: 1.25rem; }
        .prose p { margin-bottom: 1.5rem; line-height: 1.8; color: #4b5563; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900">
    <!-- Header -->
    <header class="bg-white/80 backdrop-blur-md border-b sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-[#E31E24]">VICTORA GROUP</a>
            <nav class="space-x-8 hidden md:flex items-center">
                <a href="/" class="text-sm font-medium hover:text-[#E31E24] transition">Home</a>
                <a href="/blog" class="text-sm font-medium text-[#E31E24]">Blog</a>
                <a href="/admin" class="px-4 py-2 bg-[#111827] text-white rounded text-sm font-semibold hover:bg-[#E31E24] transition">Admin Panel</a>
            </nav>
        </div>
    </header>

    <main class="py-16 min-h-screen">
        <article class="container mx-auto px-6 max-w-4xl">
            <!-- Breadcrumbs -->
            <nav class="flex items-center space-x-2 text-xs uppercase tracking-widest text-gray-400 mb-10">
                <a href="/" class="hover:text-[#E31E24]">Home</a>
                <span>/</span>
                <a href="/blog" class="hover:text-[#E31E24]">Blog</a>
                <span>/</span>
                <span class="text-gray-600 truncate">{{ $post->title }}</span>
            </nav>

            <!-- Header Section -->
            <header class="mb-12">
                @if($post->category)
                    <span class="inline-block px-4 py-1 bg-red-50 text-[#E31E24] rounded-full text-xs font-bold uppercase tracking-widest mb-6">
                        {{ $post->category->name }}
                    </span>
                @endif
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 leading-tight mb-8">
                    {{ $post->title }}
                </h1>
                
                <div class="flex items-center space-x-6 text-sm text-gray-500 border-y border-gray-100 py-6">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        {{ $post->published_at?->format('F d, Y') }}
                    </div>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        5 min read
                    </div>
                </div>
            </header>

            <!-- Featured Image -->
            @php $media = $post->image ? \Awcodes\Curator\Models\Media::find($post->image) : null; @endphp
            @if($media)
                <div class="rounded-3xl overflow-hidden shadow-2xl mb-16 aspect-video">
                    <img src="{{ $media->url }}" alt="{{ $media->alt ?? $post->title }}" class="w-full h-full object-cover">
                </div>
            @endif

            <!-- Content Area -->
            <div class="prose prose-lg max-w-none mb-20">
                {!! $post->content !!}
            </div>

            <!-- Author Box Placeholder -->
            <div class="bg-[#111827] rounded-3xl p-10 md:p-16 text-white flex flex-col md:flex-row items-center md:items-start text-center md:text-left gap-10">
                <div class="w-24 h-24 bg-[#E31E24] rounded-2xl flex-shrink-0 flex items-center justify-center font-bold text-3xl">V</div>
                <div>
                    <h3 class="text-2xl font-bold mb-4">About Victora Group</h3>
                    <p class="text-gray-400 leading-relaxed mb-6">
                        Leading the industry in automotive components and high-precision manufacturing. Our blog shares the latest technology updates, sustainable practices, and industry news.
                    </p>
                    <a href="#" class="text-[#E31E24] font-bold uppercase tracking-widest text-sm hover:underline">Learn More About Us</a>
                </div>
            </div>

            <!-- Back to Blog -->
            <div class="mt-20 pt-10 border-t border-gray-100 text-center">
                <a href="/blog" class="inline-flex items-center text-sm font-bold uppercase tracking-widest text-gray-900 hover:text-[#E31E24] transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Back to all articles
                </a>
            </div>
        </article>
    </main>

    <footer class="bg-[#111827] text-white py-20">
        <div class="container mx-auto px-6 text-center">
            <a href="/" class="text-3xl font-bold text-white mb-8 block">VICTORA GROUP</a>
            <div class="pt-10 border-t border-gray-800 text-xs text-gray-500 uppercase tracking-widest">
                &copy; {{ date('Y') }} Victora Group. All rights reserved.
            </div>
        </div>
    </footer>
</body>
</html>
