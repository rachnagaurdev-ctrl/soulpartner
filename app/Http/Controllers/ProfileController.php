<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        $categories = Category::all();
        
        return view('dashboard.profile', compact('user', 'categories'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        if ($request->has('set_primary') || $request->has('delete_photos')) {
            $photos = $user->profile_photos ?? [];
            if (!is_array($photos)) $photos = [];

            if ($request->has('set_primary')) {
                $user->profile_image = $request->input('set_primary');
            }

            if ($request->has('delete_photos')) {
                foreach ($request->input('delete_photos') as $delPath) {
                    if (($key = array_search($delPath, $photos)) !== false) {
                        unset($photos[$key]);
                        if (\Illuminate\Support\Facades\Storage::disk('public')->exists($delPath)) {
                            \Illuminate\Support\Facades\Storage::disk('public')->delete($delPath);
                        }
                    }
                    if ($user->profile_image == $delPath) {
                        $user->profile_image = null;
                    }
                }
            }
            
            $user->profile_photos = array_values($photos);
            $user->save();
            return redirect()->route('dashboard.profile')->with('success', 'Photos updated successfully!');
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'dob' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'iwantto' => 'nullable|in:become,find,both',
            'city' => 'nullable|string|max:255',
            'pincode' => 'required|string|max:20',
            'country' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
            'category' => 'nullable|array',
            'category.*' => 'exists:categories,slug',
            'category_prices' => 'nullable|array',
            'category_prices.*' => 'nullable|numeric|min:0',
            'bio' => 'nullable|string|max:1000',
            'height' => 'nullable|string|max:255',
            'religion' => 'nullable|string|max:255',
            'languages' => 'nullable|array',
            'preferred_location' => 'nullable|string|max:255',
            'available_from' => 'nullable|string|max:255',
            'available_time' => 'nullable|string|max:255',
            'interests' => 'nullable|array',
            'looking_for' => 'nullable|array',
            'availability' => 'nullable|array',
            // Profile photos handling is omitted for brevity in this step, 
            // but the field is mass-assignable.
        ]);

        if (isset($validatedData['category'])) {
            $selectedCategories = $validatedData['category'];
            $validatedData['category'] = implode(',', $selectedCategories);
            
            if (isset($validatedData['category_prices'])) {
                $filteredPrices = [];
                foreach ($selectedCategories as $catSlug) {
                    if (isset($validatedData['category_prices'][$catSlug]) && $validatedData['category_prices'][$catSlug] !== '') {
                        $filteredPrices[$catSlug] = (float)$validatedData['category_prices'][$catSlug];
                    }
                }
                $validatedData['category_prices'] = $filteredPrices;
            }
        } else {
            $validatedData['category'] = null;
            $validatedData['category_prices'] = null;
        }

        if ($request->hasFile('profile_photos')) {
            $request->validate(['profile_photos.*' => 'image|max:5120']);
            $photos = $user->profile_photos ?? [];
            if (!is_array($photos)) $photos = [];
            
            foreach ($request->file('profile_photos') as $photo) {
                $path = $photo->store('profiles', 'public');
                $photos[] = $path;
                
                // Auto-set as primary if there's no primary yet
                if (empty($user->profile_image) && empty($validatedData['profile_image'])) {
                    $user->profile_image = $path;
                    $validatedData['profile_image'] = $path;
                }
            }
            $validatedData['profile_photos'] = $photos;
        }

        $user->update($validatedData);

        return redirect()->route('dashboard.profile')->with('success', 'Profile updated successfully!');
    }
}
