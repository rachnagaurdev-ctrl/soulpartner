<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoCall;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class VideoCallController extends Controller
{
    public function initiate(Request $request, $bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        $userId = Auth::id();

        if ($booking->user_id !== $userId && $booking->partner_id !== $userId) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $receiverId = ($booking->user_id === $userId) ? $booking->partner_id : $booking->user_id;

        // End any pending calls for this booking
        VideoCall::where('booking_id', $bookingId)->whereIn('status', ['pending', 'ongoing'])->update(['status' => 'ended']);

        $call = VideoCall::create([
            'booking_id' => $bookingId,
            'caller_id' => $userId,
            'receiver_id' => $receiverId,
            'status' => 'pending',
            'caller_candidates' => [],
            'receiver_candidates' => []
        ]);

        return response()->json(['call_id' => $call->id]);
    }

    public function offer(Request $request, $id)
    {
        $call = VideoCall::findOrFail($id);
        if ($call->caller_id !== Auth::id()) return response()->json(['error' => 'Unauthorized'], 403);

        $call->update(['offer' => $request->offer]);
        return response()->json(['success' => true]);
    }

    public function answer(Request $request, $id)
    {
        $call = VideoCall::findOrFail($id);
        if ($call->receiver_id !== Auth::id()) return response()->json(['error' => 'Unauthorized'], 403);

        $call->update(['answer' => $request->answer, 'status' => 'ongoing']);
        return response()->json(['success' => true]);
    }

    public function candidate(Request $request, $id)
    {
        $call = VideoCall::findOrFail($id);
        $isCaller = $call->caller_id === Auth::id();
        $isReceiver = $call->receiver_id === Auth::id();

        if (!$isCaller && !$isReceiver) return response()->json(['error' => 'Unauthorized'], 403);

        $col = $isCaller ? 'caller_candidates' : 'receiver_candidates';
        $candidates = $call->$col ?? [];
        $candidates[] = $request->candidate;

        $call->update([$col => $candidates]);
        return response()->json(['success' => true]);
    }

    public function poll(Request $request, $id)
    {
        $call = VideoCall::findOrFail($id);
        return response()->json([
            'status' => $call->status,
            'offer' => $call->offer,
            'answer' => $call->answer,
            'caller_candidates' => $call->caller_candidates ?? [],
            'receiver_candidates' => $call->receiver_candidates ?? []
        ]);
    }
    
    public function incoming()
    {
        $call = VideoCall::with('booking.user', 'booking.partner')
                         ->where('receiver_id', Auth::id())
                         ->where('status', 'pending')
                         ->where('created_at', '>=', now()->subSeconds(30))
                         ->latest()
                         ->first();
                         
        if ($call) {
            $callerName = ($call->caller_id === $call->booking->user_id) ? $call->booking->user->name : $call->booking->partner->name;
            return response()->json([
                'incoming' => true, 
                'call_id' => $call->id, 
                'booking_id' => $call->booking_id, 
                'caller_name' => $callerName, 
                'offer' => $call->offer,
                'booking_details' => [
                    'id_label' => 'SMI-' . date('Y', strtotime($call->booking->created_at)) . '-' . str_pad($call->booking->id, 6, '0', STR_PAD_LEFT),
                    'service' => $call->booking->category->name ?? 'General',
                    'date' => \Carbon\Carbon::parse($call->booking->booking_date)->format('d M Y'),
                    'time' => \Carbon\Carbon::parse($call->booking->booking_time)->format('h:i A') . ' - ' . \Carbon\Carbon::parse($call->booking->end_time)->format('h:i A')
                ]
            ]);
        }
        
        return response()->json(['incoming' => false]);
    }

    public function end(Request $request, $id)
    {
        $call = VideoCall::findOrFail($id);
        if ($call->status !== 'ended') {
            $call->update(['status' => 'ended']);
        }
        return response()->json(['success' => true]);
    }
}
