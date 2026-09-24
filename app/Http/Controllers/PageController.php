<?php

namespace App\Http\Controllers;

use App\Http\Resources\StaffResource;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Page;
use App\Models\Staff;
use App\Http\Controllers\CheckoutController;

class PageController extends Controller
{
    public function show($slug = 'root')
    {
        try {
            $page = \Illuminate\Support\Facades\Cache::remember('page_' . $slug, 86400, function () use ($slug) {
                return Page::where('slug', $slug)
                    ->where('is_published', true)
                    ->firstOrFail();
            });

            // Pass categories and membership plans to every page view
            $categories  = Category::orderBy('name')->get();


            return view('page', compact('page'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            print_r($e->getMessage() . " | Failed URL: " . request()->url());
            die;
            abort(404, "Page not found.");
        } catch (\Exception $e) {
            \Log::error("Page Show Error: " . $e->getMessage());
            abort(500, "An error occurred while loading the page.");
        }
    }

//   public function loadMoreStaff(Request $request)
// {
//     $limit = 4;
   
//     $staff = Staff::query();
//     if(isset($request->staff_type)) {

//        $staff->where('category', $request->staff_type);
//     }
//     if($request->id) {
//         $staff->where('id', $request->id);
//     }
//     $staff = $staff->paginate(8);



//   $staff_pages = $staff->toArray();
//     return response()->json([
//         'data' => StaffResource::collection($staff),
//         'pages' => [
//             'current_page' => $staff_pages['current_page'],
//             'last_page' => $staff_pages['last_page'],

//         ]
//     ]);
// }



public function loadMoreStaff(Request $request)
{
    $limit = 8;
     $page = $request->input('page', 1);  // ← YE ADD KAR
    $staffType = $request->input('staff_type');

    $staff = Staff::where('category', $request->staff_type)
    ->paginate($limit, ['*'], 'page', $page);

return response()->json([
    'data' => StaffResource::collection($staff),

    'pages' => [
        'current_page' => $staff->currentPage(),
        'last_page' => $staff->lastPage(),
    ],

    'has_more' => $staff->hasMorePages(),
]);
}

public function getbyid($id)
{
    $staff = Staff::findOrFail($id);

    return response()->json([
        'success' => true,
        'data' => [
            'id' => $staff->id,
            'name' => $staff->name,
            'image' => get_media_url($staff->image),
            'position' => $staff->position,
            'description' => $staff->description,
            'linkdin_link' => $staff->linkdin_link,
        ]
    ]);
}

public function partners(Request $request)
{
    $query = \App\Models\User::where('is_admin', 0)
        ->whereIn('iwantto', ['become', 'both'])
        ->where('is_verified', 1)
        ->where('is_active', 1);

    if ($request->filled('category')) {
        $categories = is_array($request->category) ? $request->category : explode(',', $request->category);
        $query->whereIn('category', $categories);
    }

    if ($request->filled('gender')) {
        $genders = is_array($request->gender) ? $request->gender : explode(',', $request->gender);
        $query->whereIn('gender', $genders);
    }

    if ($request->filled('location')) {
        $query->where('city', $request->location);
    }

    if ($request->filled('price')) {
        $query->where('price_per_hour', '<=', $request->price);
    }

    if ($request->filled('age_range')) {
        $ranges = is_array($request->age_range) ? $request->age_range : explode(',', $request->age_range);
        $query->where(function ($q) use ($ranges) {
            foreach ($ranges as $range) {
                if ($range == '18-25') {
                    $q->orWhereBetween('dob', [now()->subYears(25)->format('Y-m-d'), now()->subYears(18)->format('Y-m-d')]);
                } elseif ($range == '26-35') {
                    $q->orWhereBetween('dob', [now()->subYears(35)->format('Y-m-d'), now()->subYears(26)->format('Y-m-d')]);
                } elseif ($range == '36-45') {
                    $q->orWhereBetween('dob', [now()->subYears(45)->format('Y-m-d'), now()->subYears(36)->format('Y-m-d')]);
                } elseif ($range == '46+') {
                    $q->orWhere('dob', '<=', now()->subYears(46)->format('Y-m-d'));
                }
            }
        });
    }

    $partners = $query->paginate(9)->withQueryString();

    $categories = Category::orderBy('name')->get();

    return view('partners', compact('partners', 'categories'));
}

public function partnerProfile($profile_id)
{
    $partner = \App\Models\User::where('profile_id', $profile_id)
        ->where('is_active', 1)
        ->firstOrFail();
        
    $bookedSlots = \App\Models\Booking::where('partner_id', $partner->id)
        ->where('booking_date', '>=', date('Y-m-d'))
        ->where('status', 'confirmed')
        ->get(['booking_date', 'booking_time', 'end_time']);
        
    $razorpayKey = env('RAZORPAY_KEY_ID');
    return view('partners-profile', compact('partner', 'razorpayKey', 'bookedSlots'));
}

}
