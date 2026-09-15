<section class="py-24 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <h2 class="text-3xl font-bold mb-4 text-gray-900">{{ $data['title'] ?? 'Our Features' }}</h2>
            <p class="text-gray-600">{{ $data['description'] ?? 'Discover what makes Waaree CMS the best choice for your next project.' }}</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-shadow border border-gray-100">
                <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-lg flex items-center justify-center text-2xl mb-6">⚡</div>
                <h3 class="text-xl font-bold mb-3 text-gray-900">Lightning Fast</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Built with performance in mind from day one, ensuring your pages load instantly for every user.</p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-shadow border border-gray-100">
                <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-lg flex items-center justify-center text-2xl mb-6">🎨</div>
                <h3 class="text-xl font-bold mb-3 text-gray-900">Fully Customizable</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Define your own section types and layouts directly from the admin panel without writing any code.</p>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-shadow border border-gray-100">
                <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-lg flex items-center justify-center text-2xl mb-6">🔒</div>
                <h3 class="text-xl font-bold mb-3 text-gray-900">Secure by Default</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Enterprise-grade security protocols keep your content and user data safe and protected at all times.</p>
            </div>
        </div>
    </div>
</section>
