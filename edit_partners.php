<?php
$file = 'c:\xampp\htdocs\rachna\solepartner\resources\views\partners.blade.php';
$content = file_get_contents($file);

$startStr = '<div class="partners-grid" id="partnersGrid">';
$endStr = '<!-- Pagination Section -->';

$start = strpos($content, $startStr);
$end = strpos($content, $endStr);

if ($start !== false && $end !== false) {
    $before = substr($content, 0, $start + strlen($startStr));
    $after = substr($content, $end);
    $newGrid = '
@foreach($partners as $partner)
<article class="partner-card">
    <div class="partner-card-media">
        <img src="{{ get_media_url($partner->image) }}" alt="{{ $partner->name }}" loading="lazy">
        <div class="badge-verified">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
            Verified
        </div>
        <button type="button" class="btn-fav" aria-label="Add to favorites">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
            </svg>
        </button>
    </div>
    <div class="partner-card-body">
        <div class="partner-rating">
            <span class="stars">★★★★★</span>
            <span class="score">4.8</span>
            <span class="reviews-count">(134)</span>
        </div>
        <h3 class="partner-name">
            {{ $partner->name }} <span class="gender-sym {{ strtolower($partner->gender) }}">{{ strtolower($partner->gender) == \'male\' ? \'♂\' : \'♀\' }}</span>
        </h3>
        <div class="partner-meta">
            <span><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12 6 12 12 16 14"></polyline>
                </svg> {{ \Carbon\Carbon::parse($partner->dob)->age }}</span>
            <span class="meta-sep">•</span>
            <span>{{ $partner->height ?? "5\'5\"" }}</span>
            <span class="meta-sep">•</span>
            <span><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                </svg> {{ $partner->city }}</span>
        </div>
        <div class="partner-tags">
            @foreach(explode(\',\', $partner->category) as $cat)
            <span class="tag">{{ trim($cat) }}</span>
            @endforeach
        </div>
        <div class="partner-price">
            <span class="amount">₹{{ number_format($partner->price_per_hour, 0) }}</span> <span class="unit">/ hour</span>
        </div>
        <div class="partner-card-actions">
            <a href="{{ url(\'partners-profile\') }}?id={{ $partner->id }}" class="btn-view-profile">View Profile</a>
            <button type="button" class="btn-message" aria-label="Message {{ $partner->name }}">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                </svg>
            </button>
        </div>
    </div>
</article>
@endforeach

                        </div>
                        ';
    $newContent = $before . $newGrid . $after;
    file_put_contents($file, $newContent);
    echo "Success\n";
} else {
    echo "Failed to find boundaries\n";
}
