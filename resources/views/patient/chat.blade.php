@extends('layouts.app-pat')

@section('title','Patient chat')

@section('content')

<div class="flex h-screen bg-gray-50">
    {{-- Left Sidebar: Contacts --}}
    <aside class="w-1/4 border-r bg-white p-5 overflow-y-auto shadow-sm">
        <h2 class="text-xl font-semibold text-gray-800 mb-5">📇 Your Contacts</h2>
        @foreach ($contacts as $contact)
            <a href="{{ url('patient/chat/' . $contact->id) }}"
               class="block p-3 mb-3 rounded-lg transition
                      @if($receiver->id === $contact->id) bg-blue-100 border border-blue-400
                      @else bg-gray-100 hover:bg-blue-50 @endif">
                <p class="font-medium text-gray-800">{{ $contact->name }}</p>
                <span class="text-sm text-gray-600">{{ ucfirst($contact->role) }}</span>
            </a>
        @endforeach
    </aside>

    {{-- Right Panel: Chat Box --}}
    <main class="flex-1 flex flex-col p-6 space-y-4">
        {{-- Header --}}
        <header class="flex items-center justify-between border-b pb-3 mb-3">
            <h2 class="text-2xl font-bold text-gray-800">
                💬 Chatting with <span class="text-blue-600">{{ $receiver->name }}</span>
            </h2>
        </header>

        {{-- Chat Messages Box --}}
        <section id="chat-box"
                 class="flex-1 overflow-y-auto border rounded-lg bg-white p-5 shadow-inner space-y-4 text-black">
            {{-- Messages will be dynamically loaded here --}}
        </section>

        {{-- Message Input --}}
        <footer class="flex items-center gap-3 pt-2 border-t">
            <input id="message-input"
                   type="text"
                   class="flex-1 px-4 py-2 rounded-lg border shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                   placeholder="Type your message here..." />
            <button onclick="sendMessage()"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow">
                Send
            </button>
        </footer>
    </main>
</div>

<!-- Only include Axios -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>



<script>
    const receiverId = {{ $receiver->id }};
    const currentUserId = {{ auth()->id() }};
    const chatBox = document.getElementById('chat-box');
    const input = document.getElementById('message-input');

    function appendMessage(message) {
        const mine = message.sender_id === currentUserId;
        const div = document.createElement('div');
        div.className = mine ? 'text-right mb-2' : 'text-left mb-2';
        div.innerHTML = `<span class="inline-block px-3 py-2 rounded ${mine ? 'bg-blue-500 text-white' : 'bg-gray-200'}">
                            ${message.message}
                         </span>`;
        chatBox.appendChild(div);
        chatBox.scrollTop = chatBox.scrollHeight;
    }

    function sendMessage() {
        const text = input.value.trim();
        if (!text) return;
        axios.post(`/patient/send/${receiverId}`, { message: text });
        input.value = '';
    }

    // Fetch initial messages
    axios.get(`/patient/messages/${receiverId}`).then(res => {
        res.data.forEach(appendMessage);
    });

    // Initialize Echo with Reverb
    window.Echo = new Echo({
        broadcaster: 'reverb',
        host: 'http://127.0.0.1:8080', // Reverb default for local
        forceTLS: false,
    });

    // Listen for messages on a private channel (if needed, adjust channel name)
    window.Echo.channel('chat')
        .listen('MessageSent', (e) => {
            const msg = e.message;
            if (
                (msg.sender_id === receiverId && msg.receiver_id === currentUserId) ||
                (msg.sender_id === currentUserId && msg.receiver_id === receiverId)
            ) {
                appendMessage(msg);
            }
        });
</script>

@endsection
