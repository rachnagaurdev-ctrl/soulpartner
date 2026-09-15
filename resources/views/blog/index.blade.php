<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | VICTORA GROUP CMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .gradient-text {
            background: linear-gradient(135deg, #E31E24 0%, #111827 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
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
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Latest Insights</h1>
                <p class="text-gray-600 max-w-2xl mx-auto">Explore our latest news, technology updates, and industry insights.</p>
            </div>

            <!-- Categories -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <a href="/blog" class="px-5 py-2 rounded border {{ !request('category') ? 'bg-[#E31E24] text-white border-[#E31E24]' : 'bg-white text-gray-600 hover:bg-gray-50' }} transition text-sm font-semibold uppercase tracking-wider">
                    All
                </a>
                @foreach($categories as $category)
                    <a href="/blog?category={{ $category->slug }}" class="px-5 py-2 rounded border {{ request('category') == $category->slug ? 'bg-[#E31E24] text-white border-[#E31E24]' : 'bg-white text-gray-600 hover:bg-gray-50' }} transition text-sm font-semibold uppercase tracking-wider">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>

            <!-- Blog Grid -->
            <div class="grid md:grid-cols-3 gap-10">
                @forelse($posts as $post)
                    <article class="group bg-white border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-500">
                        <div class="aspect-[16/10] overflow-hidden bg-gray-200">
                            @php $media = $post->image ? \Awcodes\Curator\Models\Media::find($post->image) : null; @endphp
                            @if($media)
                                <img src="{{ $media->url }}" alt="{{ $media->alt ?? $post->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            @else
                                <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&q=80&w=2070" class="w-full h-full object-cover group-hover:scale-110 transition duration-700 opacity-80" alt="Placeholder">
                            @endif
                        </div>
                        <div class="p-8">
                            <div class="flex items-center justify-between mb-4">
                                @if($post->category)
                                    <span class="text-[10px] uppercase tracking-widest font-bold text-[#E31E24]">{{ $post->category->name }}</span>
                                @endif
                                <span class="text-[10px] uppercase tracking-widest text-gray-400">{{ $post->published_at?->format('M d, Y') }}</span>
                            </div>
                            <h2 class="text-xl font-bold text-gray-900 mb-4 leading-tight group-hover:text-[#E31E24] transition">
                                <a href="/blog/{{ $post->slug }}">{{ $post->title }}</a>
                            </h2>
                            <p class="text-gray-500 text-sm line-clamp-3 mb-6 leading-relaxed">
                                {{ $post->summary ?? strip_tags($post->content) }}
                            </p>
                            <a href="/blog/{{ $post->slug }}" class="inline-flex items-center text-xs font-bold uppercase tracking-widest text-gray-900 group-hover:text-[#E31E24] transition">
                                Read Article
                                <svg class="w-4 h-4 ml-2 group-hover:translate-x-2 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="col-span-3 py-24 text-center">
                        <p class="text-gray-400 italic">No articles found in this category.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-16 flex justify-center">
                {{ $posts->appends(request()->query())->links() }}
            </div>
        </div>
    </main>

    <footer class="bg-[#111827] text-white py-20 mt-20">
        <div class="container mx-auto px-6 text-center">
            <a href="/" class="text-3xl font-bold text-white mb-8 block">VICTORA GROUP</a>
            <p class="text-gray-400 max-w-xl mx-auto mb-10 leading-relaxed">Excellence in manufacturing and technology. Leading the way in automotive components and sustainable engineering.</p>
            <div class="flex justify-center space-x-8 mb-12">
                <a href="#" class="text-gray-400 hover:text-white transition">LinkedIn</a>
                <a href="#" class="text-gray-400 hover:text-white transition">Twitter</a>
                <a href="#" class="text-gray-400 hover:text-white transition">Facebook</a>
            </div>
            <div class="pt-10 border-t border-gray-800 text-xs text-gray-500 uppercase tracking-widest">
                &copy; {{ date('Y') }} Victora Group. All rights reserved.
            </div>
        </div>
    </footer>
</body>
</html>
