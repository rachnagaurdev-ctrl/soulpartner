<section class="py-16 bg-gray-50 border-y border-gray-100 overflow-hidden">
    <div class="container mx-auto px-6">
        <div class="text-center mb-10">
            <h3 class="text-sm font-semibold text-indigo-600 uppercase tracking-widest">{{ $data['label'] ?? 'Trusted by leading companies' }}</h3>
        </div>
        
        @php
            $clients = \App\Models\Client::orderBy('sort_order')->get();
        @endphp
        
        <div class="flex flex-wrap justify-center items-center gap-12 md:gap-20 opacity-60 hover:opacity-100 transition-opacity duration-500">
            @forelse($clients as $client)
                @php $media = \Awcodes\Curator\Models\Media::find($client->logo); @endphp
                <a href="{{ $client->website_url ?? '#' }}" class="block group" target="_blank" title="{{ $client->name }}">
                    @if($media)
                        <img src="{{ $media->url }}" alt="{{ $media->alt ?? $client->name }}" class="h-8 md:h-10 w-auto object-contain grayscale group-hover:grayscale-0 transition duration-300">
                    @else
                        <span class="font-bold text-gray-400 group-hover:text-indigo-600 transition">{{ $client->name }}</span>
                    @endif
                </a>
            @empty
                <p class="text-gray-400 italic">Add your clients in the admin panel to show them here.</p>
            @endforelse
        </div>
    </div>
</section>
