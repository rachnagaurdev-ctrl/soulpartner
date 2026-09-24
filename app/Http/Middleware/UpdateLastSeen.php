<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UpdateLastSeen
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            // Only update if last_seen_at is empty or more than 1 minute old to save DB queries
            if (!$user->last_seen_at || $user->last_seen_at->diffInMinutes(now()) >= 1) {
                // Avoid using Eloquent's save() to prevent updated_at changes or observers, just update the column
                \DB::table('users')->where('id', $user->id)->update([
                    'last_seen_at' => now()
                ]);
                $user->last_seen_at = now();
            }
        }

        return $next($request);
    }
}
