<section class="py-24 bg-white">
    <div class="container mx-auto px-6">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ $data['title'] ?? 'Latest from the Blog' }}</h2>
                <p class="text-gray-600 max-w-xl">{{ $data['subtitle'] ?? 'Stay updated with our latest news and articles.' }}</p>
            </div>
            <a href="#" class="text-indigo-600 font-semibold hover:text-indigo-700 transition flex items-center">
                View all posts
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
        </div>
        
        @php
            $limit = $data['limit'] ?? 3;
            $posts = \App\Models\Post::with('category')->latest('published_at')->take($limit)->get();
        @endphp
        
        <div class="grid md:grid-cols-3 gap-12">
            @forelse($posts as $post)
                <article class="group">
                    <div class="aspect-video overflow-hidden rounded-2xl mb-6 bg-gray-100">
                        @if($post->image)
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        @else
                            <img src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?auto=format&fit=crop&q=80&w=2426" alt="Default Blog" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        @endif
                    </div>
                    <div class="flex items-center space-x-4 mb-4 text-sm text-gray-500">
                        @if($post->category)
                            <span class="px-2 py-0.5 bg-indigo-50 text-indigo-600 rounded-full text-xs font-semibold">{{ $post->category->name }}</span>
                        @endif
                        <span>{{ $post->published_at?->format('M d, Y') ?? 'Recently' }}</span>
                        <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                        <span>5 min read</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-indigo-600 transition leading-tight">
                        <a href="#">{{ $post->title }}</a>
                    </h3>
                    <p class="text-gray-600 text-sm line-clamp-3 leading-relaxed">
                        {{ $post->summary ?? strip_tags($post->content) }}
                    </p>
                </article>
            @empty
                <div class="col-span-3 py-12 text-center bg-gray-50 rounded-2xl border border-dashed border-gray-300">
                    <p class="text-gray-500">No blog posts found. Create some in the admin panel!</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
