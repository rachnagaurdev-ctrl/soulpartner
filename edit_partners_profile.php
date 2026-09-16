<?php
$file = 'c:\xampp\htdocs\rachna\solepartner\resources\views\partners-profile.blade.php';
$content = file_get_contents($file);

// Replace name
$content = preg_replace('/Priya Sharma/', '{{ $partner->name }}', $content);

// Replace submeta
$content = preg_replace('/26 • 5\'4" • 📍 Delhi/', '{{ \Carbon\Carbon::parse($partner->dob)->age }} • {{ $partner->height ?? "5\'5\"" }} • 📍 {{ $partner->city }}', $content);

// Replace tags row
$tagsHtml = '<div class="profile-tags-row">
                            @foreach(explode(\',\', $partner->category) as $cat)
                            <span class="tag-pill">{{ trim($cat) }}</span>
                            @endforeach
                        </div>';
$content = preg_replace('/<div class="profile-tags-row">.*?<\/div>/s', $tagsHtml, $content, 1);

// Replace Gender
$content = preg_replace('/<span class="spec-label">Gender<\/span>\s*<strong class="spec-value">Female<\/strong>/', '<span class="spec-label">Gender</span>
                                    <strong class="spec-value">{{ ucfirst($partner->gender) }}</strong>', $content);

// Replace Age
$content = preg_replace('/<span class="spec-label">Age Range<\/span>\s*<strong class="spec-value">18 - 35<\/strong>/', '<span class="spec-label">Age</span>
                                    <strong class="spec-value">{{ \Carbon\Carbon::parse($partner->dob)->age }}</strong>', $content);

// Replace Location
$content = preg_replace('/<span class="spec-label">Location<\/span>\s*<strong class="spec-value">Delhi<\/strong>/', '<span class="spec-label">Location</span>
                                    <strong class="spec-value">{{ $partner->city }}</strong>', $content);

// Replace Price
$content = preg_replace('/<span class="price-amount">₹1,500<\/span>/', '<span class="price-amount">₹{{ number_format($partner->price_per_hour, 0) }}</span>', $content);

// Replace main gallery image
$content = preg_replace('/<img id="mainGalleryImage" src="assets\/images\/partners\/priya\.jpg"/', '<img id="mainGalleryImage" src="{{ get_media_url($partner->image) }}"', $content);

file_put_contents($file, $content);
echo "Success\n";
