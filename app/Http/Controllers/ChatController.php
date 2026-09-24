<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ChatMessage;
use App\Models\Booking;

class ChatController extends Controller
{
    /**
     * Full chat page — lists all conversations (bookings with messages).
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        // All bookings this user is part of (as customer OR partner)
        $bookings = Booking::where(function ($q) use ($user) {
                $q->where('user_id', $user->id)
                  ->orWhere('partner_id', $user->id);
            })
            ->with(['user', 'partner', 'category'])
            ->whereIn('status', ['confirmed', 'upcoming', 'completed', 'pending'])
            ->orderBy('created_at', 'desc')
            ->get();

        // Attach latest message and unread count to each booking
        $conversations = $bookings->map(function ($booking) use ($user) {
            $latest = ChatMessage::where('booking_id', $booking->id)
                ->with('sender')
                ->latest()
                ->first();

            $unread = ChatMessage::where('booking_id', $booking->id)
                ->where('receiver_id', $user->id)
                ->whereNull('read_at')
                ->count();

            // The "other" person
            $other = $booking->user_id === $user->id ? $booking->partner : $booking->user;

            $booking->latest_message   = $latest;
            $booking->unread_count     = $unread;
            $booking->chat_partner     = $other;

            return $booking;
        })
        ->sortByDesc(function ($b) {
            return $b->latest_message ? $b->latest_message->created_at : $b->created_at;
        })
        ->values();

        // Active booking for right-pane (from ?booking= query param)
        $activeBookingId = $request->query('booking');
        $activeBooking   = null;
        $messages        = collect();

        if ($activeBookingId) {
            $activeBooking = $bookings->firstWhere('id', $activeBookingId);
            if ($activeBooking) {
                $messages = ChatMessage::where('booking_id', $activeBookingId)
                    ->with('sender')
                    ->orderBy('created_at')
                    ->get();

                // Mark all messages sent to me in this booking as read
                ChatMessage::where('booking_id', $activeBookingId)
                    ->where('receiver_id', $user->id)
                    ->whereNull('read_at')
                    ->update(['read_at' => now()]);

                $activeBooking->chat_partner = $activeBooking->user_id === $user->id
                    ? $activeBooking->partner
                    : $activeBooking->user;
            }
        }

        return view('dashboard.chat', compact('conversations', 'activeBooking', 'messages', 'user'));
    }

    /**
     * Send a new message — JSON API.
     */
    public function send(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|integer|exists:bookings,id',
            'message'    => 'required|string|max:2000',
        ]);

        $user    = Auth::user();
        $booking = Booking::findOrFail($request->booking_id);

        // Security: only participants can chat
        if ($booking->user_id !== $user->id && $booking->partner_id !== $user->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $receiverId = $booking->user_id === $user->id ? $booking->partner_id : $booking->user_id;

        $msg = ChatMessage::create([
            'booking_id'   => $booking->id,
            'sender_id'    => $user->id,
            'receiver_id'  => $receiverId,
            'message'      => trim($request->message),
            'message_type' => 'text',
        ]);

        $msg->load('sender');

        return response()->json([
            'success' => true,
            'message' => $this->formatMessage($msg, $user->id),
        ]);
    }

    /**
     * Poll for new messages — JSON API (used for real-time polling).
     */
    public function poll(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|integer|exists:bookings,id',
            'after_id'   => 'nullable|integer',
        ]);

        $user    = Auth::user();
        $booking = Booking::findOrFail($request->booking_id);

        if ($booking->user_id !== $user->id && $booking->partner_id !== $user->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $query = ChatMessage::where('booking_id', $request->booking_id)
            ->with('sender')
            ->orderBy('created_at');

        if ($request->after_id) {
            $query->where('id', '>', $request->after_id);
        }

        $messages = $query->get();

        // Mark as read
        ChatMessage::where('booking_id', $request->booking_id)
            ->where('receiver_id', $user->id)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        return response()->json([
            'messages' => $messages->map(fn($m) => $this->formatMessage($m, $user->id)),
        ]);
    }

    /**
     * Get unread message count across all conversations.
     */
    public function unreadCount()
    {
        $count = ChatMessage::where('receiver_id', Auth::id())
            ->whereNull('read_at')
            ->count();

        return response()->json(['count' => $count]);
    }

    /** Format a message for JSON response. */
    private function formatMessage(ChatMessage $msg, int $myId): array
    {
        return [
            'id'         => $msg->id,
            'booking_id' => $msg->booking_id,
            'sender_id'  => $msg->sender_id,
            'is_mine'    => $msg->sender_id === $myId,
            'message'    => $msg->message,
            'type'       => $msg->message_type,
            'sender_name'  => $msg->sender->name,
            'sender_avatar'=> $msg->sender->profile_image
                ? asset('storage/' . $msg->sender->profile_image)
                : 'https://ui-avatars.com/api/?name=' . urlencode($msg->sender->name) . '&background=E91E63&color=fff&size=80',
            'time'       => $msg->created_at->format('h:i A'),
            'date'       => $msg->created_at->format('d M Y'),
            'read_at'    => $msg->read_at?->toISOString(),
        ];
    }
}
