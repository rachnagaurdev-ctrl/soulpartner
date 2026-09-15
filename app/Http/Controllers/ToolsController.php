<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class ToolsController extends Controller
{
    /**
     * Clear all application cache.
     *
     * @return \Illuminate\Http\Response
     */
    public function clearCache(Request $request)
    {
        try {
            // Clear application cache
            Artisan::call('cache:clear');
            
            // Clear view cache
            Artisan::call('view:clear');
            
            // Clear config cache
            Artisan::call('config:clear');
            
            // Clear route cache
            Artisan::call('route:clear');

            if ($request->wantsJson()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'All caches cleared successfully!'
                ]);
            }

            return redirect()->back()->with('status', 'All caches cleared successfully!');
        } catch (\Exception $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Failed to clear cache: ' . $e->getMessage()
                ], 500);
            }

            return redirect()->back()->with('error', 'Failed to clear cache: ' . $e->getMessage());
        }
    }
}
