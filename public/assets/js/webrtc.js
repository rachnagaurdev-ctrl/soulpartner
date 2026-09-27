let localStream = null;
let peerConnection = null;
let currentCallId = null;
let pollInterval = null;
let isInitiator = false;

const config = {
    iceServers: [{ urls: 'stun:stun.l.google.com:19302' }]
};

const ui = {
    modal: document.getElementById('videoCallModal'),
    localVideo: document.getElementById('localVideo'),
    remoteVideo: document.getElementById('remoteVideo'),
    endBtn: document.getElementById('vcEndBtn'),
    statusText: document.getElementById('vcStatusText'),
    statusDot: document.getElementById('vcStatusDot'),
    
    inModal: document.getElementById('incomingCallModal'),
    inName: document.getElementById('incomingCallerName'),
    inAccept: document.getElementById('icAcceptBtn'),
    inReject: document.getElementById('icRejectBtn'),
};

const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
const headers = { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': csrf };

// Initialize a call (Caller)
window.startVideoCall = async function(bookingId) {
    isInitiator = true;
    try {
        const res = await fetch(`/video-call/initiate/${bookingId}`, { method: 'POST', headers });
        const data = await res.json();
        
        if (data.error) throw new Error(data.error);
        
        currentCallId = data.call_id;
        showVideoModal('Calling...');
        
        await setupMedia();
        await setupPeerConnection();
        
        const offer = await peerConnection.createOffer();
        await peerConnection.setLocalDescription(offer);
        
        await fetch(`/video-call/${currentCallId}/offer`, {
            method: 'POST', headers, body: JSON.stringify({ offer: offer.sdp })
        });
        
        startPolling();
    } catch (e) {
        console.error(e);
        if (window.showToast) showToast('Error', 'Could not start call.', 'error');
        closeVideoModal();
    }
};

// Polling for incoming calls (for all users)
setInterval(async () => {
    if (currentCallId || ui.inModal.style.display === 'flex') return; // Don't poll if in call
    
    try {
        const res = await fetch('/video-call/incoming', { headers: { 'Accept': 'application/json' } });
        const data = await res.json();
        if (data.incoming) {
            currentCallId = data.call_id;
            ui.inName.textContent = data.caller_name;
            
            // Populate booking details
            const bd = data.booking_details;
            if (bd) {
                const bId = document.getElementById('inBookingId');
                const bSrv = document.getElementById('inBookingService');
                const bDate = document.getElementById('inBookingDate');
                const bTime = document.getElementById('inBookingTime');
                
                if (bId) bId.textContent = bd.id_label;
                if (bSrv) bSrv.textContent = bd.service;
                if (bDate) bDate.textContent = bd.date;
                if (bTime) bTime.textContent = bd.time;
            }
            
            ui.inModal.style.display = 'flex';
        }
    } catch (e) {}
}, 3000);

// Answer call
ui.inAccept?.addEventListener('click', async () => {
    ui.inModal.style.display = 'none';
    isInitiator = false;
    showVideoModal('Connecting...');
    
    try {
        await setupMedia();
        await setupPeerConnection();
        
        // Fetch offer
        const res = await fetch(`/video-call/${currentCallId}/poll`);
        const data = await res.json();
        
        if (data.status === 'ended') throw new Error('Call ended.');
        
        await peerConnection.setRemoteDescription(new RTCSessionDescription({ type: 'offer', sdp: data.offer }));
        
        const answer = await peerConnection.createAnswer();
        await peerConnection.setLocalDescription(answer);
        
        await fetch(`/video-call/${currentCallId}/answer`, {
            method: 'POST', headers, body: JSON.stringify({ answer: answer.sdp })
        });
        
        startPolling();
    } catch (e) {
        console.error(e);
        if (window.showToast) showToast('Error', 'Could not connect.', 'error');
        closeVideoModal();
    }
});

// Reject call
ui.inReject?.addEventListener('click', async () => {
    ui.inModal.style.display = 'none';
    if (currentCallId) {
        await fetch(`/video-call/${currentCallId}/end`, { method: 'POST', headers });
    }
    currentCallId = null;
});

// Setup Media
async function setupMedia() {
    try {
        localStream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
        ui.localVideo.srcObject = localStream;
    } catch (e) {
        console.error("Camera/mic access denied", e);
        if (window.showToast) showToast('Permission Denied', 'Please allow camera and microphone access.', 'error');
        throw e;
    }
}

// Setup PeerConnection
function setupPeerConnection() {
    peerConnection = new RTCPeerConnection(config);
    
    localStream.getTracks().forEach(track => peerConnection.addTrack(track, localStream));
    
    peerConnection.ontrack = event => {
        ui.remoteVideo.srcObject = event.streams[0];
        updateStatus('Connected', '#10B981');
    };
    
    peerConnection.onicecandidate = async event => {
        if (event.candidate && currentCallId) {
            await fetch(`/video-call/${currentCallId}/candidate`, {
                method: 'POST', headers, body: JSON.stringify({ candidate: JSON.stringify(event.candidate) })
            });
        }
    };
    
    peerConnection.oniceconnectionstatechange = () => {
        if (peerConnection.iceConnectionState === 'disconnected' || peerConnection.iceConnectionState === 'failed') {
            endCall();
        }
    };
}

// Poll for signaling data
function startPolling() {
    let lastCandidatesCount = 0;
    
    pollInterval = setInterval(async () => {
        if (!currentCallId) return;
        
        try {
            const res = await fetch(`/video-call/${currentCallId}/poll`);
            const data = await res.json();
            
            if (data.status === 'ended' || data.status === 'rejected') {
                endCall();
                return;
            }
            
            // If caller, wait for answer
            if (isInitiator && data.answer && !peerConnection.currentRemoteDescription) {
                await peerConnection.setRemoteDescription(new RTCSessionDescription({ type: 'answer', sdp: data.answer }));
            }
            
            // Process new ICE candidates
            const candidates = isInitiator ? data.receiver_candidates : data.caller_candidates;
            if (candidates && candidates.length > lastCandidatesCount) {
                for (let i = lastCandidatesCount; i < candidates.length; i++) {
                    try {
                        await peerConnection.addIceCandidate(new RTCIceCandidate(JSON.parse(candidates[i])));
                    } catch (e) { console.error('Error adding candidate', e); }
                }
                lastCandidatesCount = candidates.length;
            }
        } catch (e) {}
    }, 2000);
}

// End call
async function endCall() {
    if (currentCallId) {
        try {
            await fetch(`/video-call/${currentCallId}/end`, { method: 'POST', headers });
        } catch(e) {}
    }
    closeVideoModal();
}

ui.endBtn?.addEventListener('click', endCall);

function showVideoModal(text) {
    ui.modal.style.display = 'flex';
    updateStatus(text, '#F59E0B');
}

function updateStatus(text, color) {
    ui.statusText.textContent = text;
    ui.statusDot.style.background = color;
}

function closeVideoModal() {
    ui.modal.style.display = 'none';
    if (pollInterval) clearInterval(pollInterval);
    if (peerConnection) {
        peerConnection.close();
        peerConnection = null;
    }
    if (localStream) {
        localStream.getTracks().forEach(t => t.stop());
        localStream = null;
    }
    ui.localVideo.srcObject = null;
    ui.remoteVideo.srcObject = null;
    currentCallId = null;
    isInitiator = false;
}
