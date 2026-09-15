<?php

if (!function_exists('format_date')) {
    /**
     * Format a date string.
     *
     * @param string $date
     * @param string $format
     * @return string
     */
    function format_date($date, $format = 'd M Y')
    {
        return \Carbon\Carbon::parse($date)->format($format);
    }
}

if (!function_exists('get_asset_url')) {
    /**
     * Get the URL for an asset.    
     *
     * @param string $path
     * @return string
     */
    function get_asset_url($path)
    {
        return asset($path);
    }
}

if (!function_exists('get_media_url')) {
    /**
     * Get the media URL by ID or return the media string.
     *
     * @param mixed $media
     * @return string
     */
    function get_media_url($media)
    {
        if (is_numeric($media)) {
            $m = \Awcodes\Curator\Models\Media::find($media);
            return $m ? '/storage/' . ltrim($m->path, '/') : $media;
        }

        if (is_string($media) && !str_starts_with($media, 'http') && !str_starts_with($media, '/')) {
            return asset('storage/' . $media);
        }

        return $media;
    }
}

if (!function_exists('get_storage_url')) {
    /**
     * Get the storage URL by path or ID.
     *
     * @param mixed $document
     * @return string
     */
    function get_storage_url($document)
    {
        if (empty($document)) return 'javascript:void(0);';
        
        if (is_numeric($document)) {
            $m = \Awcodes\Curator\Models\Media::find($document);
            return $m ? '/storage/' . ltrim($m->path, '/') : $document;
        }

        if (str_starts_with($document, 'http')) return $document;

        return asset('storage/' . ltrim($document, '/'));
    }
}

if (!function_exists('get_media_alt')) {
    /**
     * Get the media alt text by ID.
     *
     * @param mixed $media
     * @return string
     */
    function get_media_alt($media)
    {
        if (is_numeric($media)) {
            $m = \Awcodes\Curator\Models\Media::find($media);
            return $m ? ($m->alt ?? '') : '';
        }
        return '';
    }
}

if (!function_exists('get_cta_link')) {
    /**
     * Get the CTA link from a CTA data array.
     *
     * @param mixed $cta
     * @return string
     */
    function get_cta_link($cta)
    {
        if (empty($cta) || !is_array($cta)) return 'javascript:void(0);';
        return ($cta['url_type'] ?? '') === 'internal' 
            ? ($cta['internal_url'] ?? '#') 
            : ($cta['external_url'] ?? '#');
    }
}

if (!function_exists('is_video')) {
    /**
     * Check if a URL or path is a video based on extension.
     *
     * @param string $url
     * @return bool
     */
    function is_video($url)
    {
        $extension = pathinfo($url, PATHINFO_EXTENSION);
        return in_array(strtolower($extension), ['mp4', 'webm', 'ogg', 'mov', 'm4v']);
    }
}

if(!function_exists('get_catgeories')){
    function get_catgeories($limit = 10) {
        return \App\Models\Category::latest()->take($limit)->get();
    }
}

if(!function_exists('get_partners')){
    function get_partners($limit = 12) {
        $query = \App\Models\User::where('is_admin', 0)->whereIn('iwantto', ['become', 'both']);
        
        $request = request();

        if ($request->filled('category')) {
            $categories = (array) $request->category;
            $query->where(function($q) use ($categories) {
                foreach ($categories as $cat) {
                    $q->orWhere('category', 'like', '%' . $cat . '%');
                }
            });
        }

        if ($request->filled('gender')) {
            $query->whereIn('gender', (array) $request->gender);
        }

        if ($request->filled('city') || $request->filled('location')) {
            $city = $request->city ?? $request->location;
            $query->where('city', 'like', '%' . $city . '%');
        }

        if ($request->filled('max_price')) {
            $query->where('price_per_hour', '<=', $request->max_price);
        }

        if ($request->filled('age_range')) {
            $range = $request->age_range;
            $now = \Carbon\Carbon::now();
            if ($range === '18-25') {
                $query->whereBetween('dob', [$now->copy()->subYears(25)->toDateString(), $now->copy()->subYears(18)->toDateString()]);
            } elseif ($range === '26-35') {
                $query->whereBetween('dob', [$now->copy()->subYears(35)->toDateString(), $now->copy()->subYears(26)->toDateString()]);
            } elseif ($range === '36-45') {
                $query->whereBetween('dob', [$now->copy()->subYears(45)->toDateString(), $now->copy()->subYears(36)->toDateString()]);
            } elseif ($range === '46+') {
                $query->where('dob', '<=', $now->copy()->subYears(46)->toDateString());
            }
        }

        $sort = $request->sort ?? 'recommended';
        if ($sort === 'price-low') {
            $query->orderBy('price_per_hour', 'asc');
        } elseif ($sort === 'price-high') {
            $query->orderBy('price_per_hour', 'desc');
        } else {
            $query->latest();
        }

        $partners = $query->paginate($limit)->withQueryString();
        return $partners;
    }
}

if(!function_exists('get_plans')){
    function get_plans($limit = 3) {
        return    $plans       = App\Http\Controllers\CheckoutController::getPlans();
    }
}