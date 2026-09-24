@extends('layouts.dashboard')
@section('title', 'Messages | Soulmate India')

@section('styles')
<style>
/* ═══════════════════════════════════════════════
   CHAT PAGE – FULL LAYOUT
═══════════════════════════════════════════════ */
*, *::before, *::after { box-sizing: border-box; }

/* Override dashboard main-content overflow so chat fills height */
.main-content { padding: 0 !important; overflow: hidden !important; height: calc(100vh - 70px) !important; }
.middle-col   { max-width: 100% !important; height: 100%; padding: 0 !important; }

/* ── Chat shell ───────────────────────────── */
.chat-shell {
    display: flex;
    height: calc(100vh - 70px);
    background: #F8FAFC;
    font-family: 'DM Sans', sans-serif;
}

/* ══ LEFT: Conversations list ══════════════ */
.conv-panel {
    width: 340px;
    flex-shrink: 0;
    border-right: 1.5px solid #F1F5F9;
    background: #fff;
    display: flex;
    flex-direction: column;
    overflow: hidden;
}
.conv-header {
    padding: 20px 20px 12px;
    border-bottom: 1px solid #F1F5F9;
}
.conv-header h2 {
    font-size: 20px;
    font-weight: 800;
    color: #1E293B;
    margin: 0 0 14px;
    letter-spacing: -0.4px;
}
.conv-search {
    position: relative;
}
.conv-search input {
    width: 100%;
    padding: 10px 14px 10px 36px;
    border: 1.5px solid #E2E8F0;
    border-radius: 10px;
    font-size: 13px;
    color: #334155;
    outline: none;
    transition: border-color .2s;
}
.conv-search input:focus { border-color: #E91E63; }
.conv-search svg {
    position: absolute; left: 11px; top: 50%;
    transform: translateY(-50%);
    color: #94A3B8; width: 15px; height: 15px; pointer-events: none;
}

.conv-list { flex: 1; overflow-y: auto; }

.conv-item {
    display: flex;
    gap: 12px;
    align-items: center;
    padding: 14px 20px;
    cursor: pointer;
    border-bottom: 1px solid #F8FAFC;
    transition: background .15s;
    text-decoration: none;
    color: inherit;
    position: relative;
}
.conv-item:hover   { background: #FDF2F8; }
.conv-item.active  { background: linear-gradient(135deg, #FDF2F8, #f5e8ff); border-right: 3px solid #E91E63; }

.conv-avatar {
    position: relative; flex-shrink: 0;
}
.conv-avatar img {
    width: 46px; height: 46px;
    border-radius: 50%; object-fit: cover;
    border: 2px solid #FCE7F3;
}
.online-dot {
    position: absolute; bottom: 2px; right: 2px;
    width: 10px; height: 10px; border-radius: 50%;
    background: #10B981; border: 2px solid #fff;
}

.conv-info { flex: 1; min-width: 0; }
.conv-name {
    font-size: 14px; font-weight: 700; color: #1E293B;
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
    margin-bottom: 3px;
}
.conv-preview {
    font-size: 12px; color: #94A3B8;
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
}
.conv-preview.unread { color: #475569; font-weight: 600; }

.conv-meta { display: flex; flex-direction: column; align-items: flex-end; gap: 5px; flex-shrink: 0; }
.conv-time { font-size: 11px; color: #94A3B8; }
.unread-badge {
    background: linear-gradient(135deg, #E91E63, #9c27b0);
    color: #fff; font-size: 10px; font-weight: 800;
    min-width: 18px; height: 18px; border-radius: 9px;
    display: flex; align-items: center; justify-content: center;
    padding: 0 4px;
}
.conv-service-tag {
    font-size: 10px; color: #E91E63;
    background: #FCE7F3; padding: 2px 7px;
    border-radius: 20px; font-weight: 600;
}

.conv-empty {
    text-align: center; padding: 60px 20px;
    color: #94A3B8; font-size: 14px;
}

/* ══ RIGHT: Chat window ═════════════════════ */
.chat-window {
    flex: 1;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    background: #F8FAFC;
}

/* ── Chat header ── */
.chat-header {
    background: #fff;
    border-bottom: 1.5px solid #F1F5F9;
    padding: 16px 24px;
    display: flex;
    align-items: center;
    gap: 14px;
    flex-shrink: 0;
}
.chat-header-avatar img {
    width: 44px; height: 44px;
    border-radius: 50%; object-fit: cover;
    border: 2px solid #FCE7F3;
}
.chat-header-info { flex: 1; }
.chat-header-name {
    font-size: 16px; font-weight: 800; color: #1E293B; margin-bottom: 2px;
    display: flex; align-items: center; gap: 8px;
}
.chat-header-sub { font-size: 12px; color: #94A3B8; display: flex; align-items: center; gap: 5px; }
.online-label { color: #10B981; font-weight: 600; display: flex; align-items: center; gap: 4px; }
.online-label::before { content: ''; display: inline-block; width: 7px; height: 7px; border-radius: 50%; background: #10B981; }

.chat-header-actions { display: flex; gap: 10px; }
.icon-action {
    width: 38px; height: 38px; border-radius: 50%;
    border: 1.5px solid #E2E8F0; background: #fff;
    display: flex; align-items: center; justify-content: center;
    cursor: pointer; color: #64748B; transition: all .2s;
}
.icon-action:hover { border-color: #E91E63; color: #E91E63; background: #FDF2F8; }

/* ── Messages area ── */
.chat-messages {
    flex: 1;
    overflow-y: auto;
    padding: 20px 24px;
    display: flex;
    flex-direction: column;
    gap: 4px;
    scroll-behavior: smooth;
}

/* Date separator */
.date-separator {
    display: flex; align-items: center; gap: 12px;
    margin: 14px 0; color: #94A3B8; font-size: 11px; font-weight: 600;
    text-transform: uppercase; letter-spacing: .5px;
}
.date-separator::before, .date-separator::after {
    content: ''; flex: 1; height: 1px; background: #E2E8F0;
}

/* Message bubble */
.msg-row {
    display: flex;
    gap: 10px;
    align-items: flex-end;
    margin-bottom: 6px;
}
.msg-row.mine { flex-direction: row-reverse; }

.msg-avatar { flex-shrink: 0; }
.msg-avatar img {
    width: 32px; height: 32px; border-radius: 50%; object-fit: cover;
    border: 1.5px solid #F1F5F9;
}

.msg-content {
    max-width: 65%;
    display: flex;
    flex-direction: column;
}
.msg-row.mine .msg-content { align-items: flex-end; }

.msg-bubble {
    width: fit-content;
    padding: 11px 15px;
    border-radius: 18px;
    font-size: 14px;
    line-height: 1.55;
    position: relative;
    word-break: break-word;
}
.msg-row:not(.mine) .msg-bubble {
    background: #fff;
    border: 1.5px solid #F1F5F9;
    border-bottom-left-radius: 4px;
    color: #1E293B;
    box-shadow: 0 2px 8px rgba(0,0,0,.04);
}
.msg-row.mine .msg-bubble {
    background: linear-gradient(135deg, #E91E63, #9c27b0);
    color: #fff;
    border-bottom-right-radius: 4px;
    box-shadow: 0 4px 14px rgba(233,30,99,.25);
}

.msg-time {
    font-size: 10px; color: #94A3B8;
    margin-top: 4px; display: block;
}
.msg-row.mine .msg-time { color: rgba(255,255,255,.65); text-align: right; }

.msg-tick {
    font-size: 12px; margin-left: 4px;
    color: rgba(255,255,255,.7);
}
.msg-tick.read { color: #7dd3fc; }

/* ── Typing indicator ── */
.typing-indicator {
    display: none;
    align-items: flex-end; gap: 10px; margin-bottom: 6px;
}
.typing-dots {
    background: #fff; border: 1.5px solid #F1F5F9;
    padding: 12px 18px; border-radius: 18px; border-bottom-left-radius: 4px;
    display: flex; gap: 5px; align-items: center;
}
.typing-dot {
    width: 7px; height: 7px; border-radius: 50%;
    background: #94A3B8; animation: typeBounce 1.2s infinite ease-in-out;
}
.typing-dot:nth-child(2) { animation-delay: .2s; }
.typing-dot:nth-child(3) { animation-delay: .4s; }
@keyframes typeBounce {
    0%, 60%, 100% { transform: translateY(0); }
    30% { transform: translateY(-6px); background: #E91E63; }
}

/* ── Message input bar ── */
.chat-input-bar {
    background: #fff;
    border-top: 1.5px solid #F1F5F9;
    padding: 14px 20px;
    display: flex;
    align-items: flex-end;
    gap: 10px;
    flex-shrink: 0;
}
.chat-input-wrap {
    flex: 1;
    background: #F8FAFC;
    border: 1.5px solid #E2E8F0;
    border-radius: 14px;
    display: flex;
    align-items: flex-end;
    padding: 8px 12px;
    gap: 8px;
    transition: border-color .2s;
}
.chat-input-wrap:focus-within { border-color: #E91E63; background: #fff; }

#chatTextarea {
    flex: 1;
    border: none; background: transparent;
    font-family: 'DM Sans', sans-serif;
    font-size: 14px; color: #1E293B;
    resize: none; outline: none;
    max-height: 120px;
    line-height: 1.5;
    padding: 2px 0;
}

.attach-btn {
    background: none; border: none; cursor: pointer;
    color: #94A3B8; padding: 4px;
    transition: color .2s;
}
.attach-btn:hover { color: #E91E63; }

.send-btn {
    width: 46px; height: 46px; border-radius: 14px;
    background: linear-gradient(135deg, #E91E63, #9c27b0);
    border: none; cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    color: #fff; flex-shrink: 0;
    box-shadow: 0 4px 14px rgba(233,30,99,.35);
    transition: transform .15s, box-shadow .15s;
}
.send-btn:hover { transform: scale(1.07); box-shadow: 0 6px 18px rgba(233,30,99,.45); }
.send-btn:active { transform: scale(.96); }
.send-btn:disabled { opacity: .5; cursor: not-allowed; transform: none; }

/* ── No active conversation ── */
.no-chat {
    flex: 1;
    display: flex; flex-direction: column;
    align-items: center; justify-content: center;
    gap: 16px; color: #94A3B8;
    padding: 40px;
    text-align: center;
}
.no-chat-icon {
    width: 90px; height: 90px; border-radius: 50%;
    background: linear-gradient(135deg, #FCE7F3, #f5e8ff);
    display: flex; align-items: center; justify-content: center;
    font-size: 40px;
}
.no-chat h3 { font-size: 20px; font-weight: 800; color: #334155; margin: 0; }
.no-chat p  { font-size: 14px; margin: 0; max-width: 300px; line-height: 1.6; }

/* ── Scrollbar ── */
.conv-list::-webkit-scrollbar,
.chat-messages::-webkit-scrollbar { width: 4px; }
.conv-list::-webkit-scrollbar-track,
.chat-messages::-webkit-scrollbar-track { background: transparent; }
.conv-list::-webkit-scrollbar-thumb,
.chat-messages::-webkit-scrollbar-thumb { background: #E2E8F0; border-radius: 4px; }

/* ── Responsive ── */
@media (max-width: 700px) {
    .conv-panel { width: 100%; }
    .chat-window { display: none; }
    .chat-window.mobile-active { display: flex; width: 100%; }
}
</style>
@endsection

@section('content')
<div class="middle-col">
<div class="chat-shell">

    {{-- ══ LEFT: Conversations ══ --}}
    <div class="conv-panel">
        <div class="conv-header">
            <h2>Messages</h2>
            <div class="conv-search">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <input type="text" id="convSearch" placeholder="Search conversations…">
            </div>
        </div>

        <div class="conv-list" id="convList">
            @forelse($conversations as $conv)
            @php
                $other   = $conv->chat_partner;
                $avatar  = $other->profile_image
                    ? asset('storage/' . $other->profile_image)
                    : 'https://ui-avatars.com/api/?name=' . urlencode($other->name) . '&background=E91E63&color=fff&size=80';
                $isActive = $activeBooking && $activeBooking->id == $conv->id;
                $preview  = $conv->latest_message
                    ? ($conv->latest_message->sender_id == auth()->id() ? 'You: ' : '') . \Illuminate\Support\Str::limit($conv->latest_message->message, 40)
                    : 'No messages yet. Say hello! 👋';
            @endphp
            <a href="{{ route('dashboard.messages', ['booking' => $conv->id]) }}"
               class="conv-item {{ $isActive ? 'active' : '' }}"
               data-name="{{ strtolower($other->name) }}">
                <div class="conv-avatar">
                    <img src="{{ $avatar }}" alt="{{ $other->name }}">
                    @if($other->isOnline())
                    <div class="online-dot"></div>
                    @endif
                </div>
                <div class="conv-info">
                    <div class="conv-name">{{ $other->name }}</div>
                    <div class="conv-preview {{ $conv->unread_count ? 'unread' : '' }}">{{ $preview }}</div>
                    <div style="margin-top:5px;">
                        <span class="conv-service-tag">{{ $conv->category ? $conv->category->name : 'Booking' }}</span>
                    </div>
                </div>
                <div class="conv-meta">
                    <span class="conv-time">
                        {{ $conv->latest_message ? $conv->latest_message->created_at->diffForHumans(null, true, true) : '' }}
                    </span>
                    @if($conv->unread_count > 0)
                    <span class="unread-badge">{{ $conv->unread_count }}</span>
                    @endif
                </div>
            </a>
            @empty
            <div class="conv-empty">
                <div style="font-size:48px; margin-bottom:12px;">💬</div>
                <div style="font-weight:700; color:#334155; margin-bottom:6px;">No conversations yet</div>
                <div>Make a booking to start chatting with your partner.</div>
            </div>
            @endforelse
        </div>
    </div>

    {{-- ══ RIGHT: Chat window ══ --}}
    <div class="chat-window">

        @if($activeBooking)
        @php
            $partner = $activeBooking->chat_partner;
            $partnerAvatar = $partner->profile_image
                ? asset('storage/' . $partner->profile_image)
                : 'https://ui-avatars.com/api/?name=' . urlencode($partner->name) . '&background=E91E63&color=fff&size=80';
        @endphp

        {{-- Chat header --}}
        <div class="chat-header">
            <div class="chat-header-avatar">
                <img src="{{ $partnerAvatar }}" alt="{{ $partner->name }}">
            </div>
            <div class="chat-header-info">
                <div class="chat-header-name">
                    {{ $partner->name }}
                    @if($partner->is_verified)
                    <svg width="16" height="16" fill="#3B82F6" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    @endif
                </div>
                <div class="chat-header-sub">
                    @if($partner->isOnline())
                    <span class="online-label">Online</span>
                    &nbsp;·&nbsp;
                    @else
                    <span style="color:#94A3B8;">Offline</span>
                    &nbsp;·&nbsp;
                    @endif
                    {{ $activeBooking->category ? $activeBooking->category->name : 'General' }}
                    &nbsp;·&nbsp;
                    {{ \Carbon\Carbon::parse($activeBooking->booking_date)->format('d M Y') }}
                </div>
            </div>
            <div class="chat-header-actions">
                <div class="icon-action" title="View Booking">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <div class="icon-action" title="Partner Profile">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </div>
            </div>
        </div>

        {{-- Messages --}}
        <div class="chat-messages" id="chatMessages">
            @php
                $lastDate = null;
                $lastSenderId = null;
            @endphp

            @forelse($messages as $msg)
            @php
                $msgDate = \Carbon\Carbon::parse($msg->created_at)->format('d M Y');
                $isMine  = $msg->sender_id === auth()->id();
            @endphp

            @if($msgDate !== $lastDate)
            <div class="date-separator">
                {{ $msgDate === now()->format('d M Y') ? 'Today' : ($msgDate === now()->subDay()->format('d M Y') ? 'Yesterday' : $msgDate) }}
            </div>
            @php $lastDate = $msgDate; @endphp
            @endif

            <div class="msg-row {{ $isMine ? 'mine' : '' }}" data-msg-id="{{ $msg->id }}">
                @if(!$isMine)
                <div class="msg-avatar">
                    <img src="{{ $msg->sender->profile_image ? asset('storage/'.$msg->sender->profile_image) : 'https://ui-avatars.com/api/?name='.urlencode($msg->sender->name).'&background=E91E63&color=fff&size=80' }}"
                         alt="{{ $msg->sender->name }}">
                </div>
                @endif
                <div class="msg-content">
                    <div class="msg-bubble">
                        {{ $msg->message }}
                    </div>
                    <span class="msg-time">
                        {{ \Carbon\Carbon::parse($msg->created_at)->format('h:i A') }}
                        @if($isMine)
                        <span class="msg-tick {{ $msg->read_at ? 'read' : '' }}">{{ $msg->read_at ? '✓✓' : '✓' }}</span>
                        @endif
                    </span>
                </div>
                @if($isMine)
                <div class="msg-avatar">
                    <img src="{{ auth()->user()->profile_image ? asset('storage/'.auth()->user()->profile_image) : 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name).'&background=9c27b0&color=fff&size=80' }}"
                         alt="Me">
                </div>
                @endif
            </div>
            @empty
            <div style="text-align:center; color:#94A3B8; padding:40px 20px;">
                <div style="font-size:48px; margin-bottom:12px;">👋</div>
                <div style="font-size:16px; font-weight:700; color:#334155; margin-bottom:6px;">Start the conversation!</div>
                <div style="font-size:13px;">Say hello to {{ $partner->name }}</div>
            </div>
            @endforelse

            {{-- Typing indicator --}}
            <div class="typing-indicator" id="typingIndicator">
                <div class="msg-avatar">
                    <img src="{{ $partnerAvatar }}" alt="{{ $partner->name }}">
                </div>
                <div class="typing-dots">
                    <div class="typing-dot"></div>
                    <div class="typing-dot"></div>
                    <div class="typing-dot"></div>
                </div>
            </div>
        </div>

        {{-- Input bar --}}
        <div class="chat-input-bar">
            <div class="chat-input-wrap">
                <button class="attach-btn" type="button" title="Attach file">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/></svg>
                </button>
                <textarea id="chatTextarea" rows="1" placeholder="Type a message…"></textarea>
                <button class="attach-btn" type="button" title="Emoji">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </button>
            </div>
            <button class="send-btn" id="sendBtn" type="button" title="Send">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
            </button>
        </div>

        @else
        {{-- No active chat --}}
        <div class="no-chat">
            <div class="no-chat-icon">💬</div>
            <h3>Select a conversation</h3>
            <p>Choose a booking from the left to open the chat and start messaging.</p>
        </div>
        @endif

    </div>{{-- /chat-window --}}

</div>{{-- /chat-shell --}}
</div>{{-- /middle-col --}}

@if($activeBooking)
<script>
(function () {
    var BOOKING_ID  = {{ $activeBooking->id }};
    var MY_ID       = {{ auth()->id() }};
    var MY_AVATAR   = '{{ auth()->user()->profile_image ? asset("storage/".auth()->user()->profile_image) : "https://ui-avatars.com/api/?name=".urlencode(auth()->user()->name)."&background=9c27b0&color=fff&size=80" }}';
    var CSRF        = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    var lastId      = {{ $messages->last() ? $messages->last()->id : 0 }};
    var pollTimer   = null;
    var sending     = false;

    var messagesEl  = document.getElementById('chatMessages');
    var textarea    = document.getElementById('chatTextarea');
    var sendBtn     = document.getElementById('sendBtn');

    // ── Scroll to bottom ──────────────────────
    function scrollBottom(smooth) {
        messagesEl.scrollTo({ top: messagesEl.scrollHeight, behavior: smooth ? 'smooth' : 'instant' });
    }
    scrollBottom(false);

    // ── Auto-grow textarea ────────────────────
    textarea.addEventListener('input', function () {
        this.style.height = 'auto';
        this.style.height = Math.min(this.scrollHeight, 120) + 'px';
    });

    // ── Send on Enter (Shift+Enter = newline) ─
    textarea.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendMessage();
        }
    });
    sendBtn.addEventListener('click', sendMessage);

    // ── Render a single message bubble ────────
    function renderBubble(msg) {
        var isMine = msg.is_mine;
        var tick   = isMine ? '<span class="msg-tick">' + (msg.read_at ? '✓✓' : '✓') + '</span>' : '';

        var avatarSrc = isMine ? MY_AVATAR : msg.sender_avatar;
        var avatarEl  = '<div class="msg-avatar"><img src="' + avatarSrc + '" alt="' + msg.sender_name + '"></div>';

        var el = document.createElement('div');
        el.className = 'msg-row' + (isMine ? ' mine' : '');
        el.setAttribute('data-msg-id', msg.id);

        el.innerHTML = (!isMine ? avatarEl : '') +
            '<div class="msg-content">' +
            '<div class="msg-bubble">' + escHtml(msg.message) + '</div>' +
            '<span class="msg-time">' + msg.time + ' ' + tick + '</span>' +
            '</div>' +
            (isMine ? avatarEl : '');

        return el;
    }

    function escHtml(str) {
        return str.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/\n/g,'<br>');
    }

    // ── Send message ──────────────────────────
    function sendMessage() {
        var text = textarea.value.trim();
        if (!text || sending) return;

        sending = true;
        sendBtn.disabled = true;

        fetch('/chat/send', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': CSRF,
                'Accept': 'application/json',
            },
            body: JSON.stringify({ booking_id: BOOKING_ID, message: text }),
        })
        .then(function(r) { return r.json(); })
        .then(function(data) {
            if (data.success) {
                var bubble = renderBubble(data.message);
                // Insert before typing indicator
                var typingEl = document.getElementById('typingIndicator');
                messagesEl.insertBefore(bubble, typingEl);
                lastId = data.message.id;
                textarea.value = '';
                textarea.style.height = 'auto';
                scrollBottom(true);
            }
        })
        .catch(function(e) { console.error('Send error:', e); })
        .finally(function() {
            sending = false;
            sendBtn.disabled = false;
            textarea.focus();
        });
    }

    // ── Poll for new messages ─────────────────
    function poll() {
        fetch('/chat/poll?booking_id=' + BOOKING_ID + '&after_id=' + lastId, {
            headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': CSRF }
        })
        .then(function(r) { return r.json(); })
        .then(function(data) {
            if (data.messages && data.messages.length) {
                var typingEl = document.getElementById('typingIndicator');
                var wasAtBottom = messagesEl.scrollHeight - messagesEl.scrollTop - messagesEl.clientHeight < 80;

                data.messages.forEach(function(msg) {
                    // Skip messages I already rendered (mine)
                    if (!document.querySelector('[data-msg-id="' + msg.id + '"]')) {
                        var bubble = renderBubble(msg);
                        messagesEl.insertBefore(bubble, typingEl);
                        lastId = Math.max(lastId, msg.id);
                    }
                });

                if (wasAtBottom) scrollBottom(true);
            }
        })
        .catch(function() {}) // silent fail — network hiccup
        .finally(function() {
            pollTimer = setTimeout(poll, 2500); // poll every 2.5s
        });
    }

    // Start polling
    pollTimer = setTimeout(poll, 2500);

    // Stop polling when page hidden, resume when visible
    document.addEventListener('visibilitychange', function() {
        if (document.hidden) {
            clearTimeout(pollTimer);
        } else {
            clearTimeout(pollTimer);
            pollTimer = setTimeout(poll, 500);
        }
    });
})();
</script>
@endif

{{-- Conversation search filter --}}
<script>
document.getElementById('convSearch').addEventListener('input', function() {
    var q = this.value.toLowerCase();
    document.querySelectorAll('.conv-item').forEach(function(item) {
        var name = item.getAttribute('data-name') || '';
        item.style.display = name.includes(q) ? '' : 'none';
    });
});
</script>
@endsection
