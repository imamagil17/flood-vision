function toggleChat() {
    const chatWindow = document.getElementById('chatWindow');
    if(!chatWindow) return;
    
    if (chatWindow.classList.contains('hidden')) {
        chatWindow.classList.remove('hidden');
        chatWindow.classList.add('flex');
        setTimeout(() => {
            chatWindow.classList.remove('scale-y-0', 'opacity-0');
            chatWindow.classList.add('scale-y-100', 'opacity-100');
            const input = document.getElementById('chatInput');
            if(input) input.focus();
        }, 10);
    } else {
        chatWindow.classList.remove('scale-y-100', 'opacity-100');
        chatWindow.classList.add('scale-y-0', 'opacity-0');
        setTimeout(() => {
            chatWindow.classList.add('hidden');
            chatWindow.classList.remove('flex');
        }, 300);
    }
}

async function sendChatMessage(e) {
    e.preventDefault();
    const input = document.getElementById('chatInput');
    const message = input.value.trim();
    if (!message) return;

    const chatMessages = document.getElementById('chatMessages');
    
    const userHtml = `
        <div class="flex gap-3 flex-row-reverse">
            <div class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center shrink-0">
                <i data-lucide="user" class="w-4 h-4 text-slate-500"></i>
            </div>
            <div class="bg-blue-600 p-3.5 rounded-2xl rounded-tr-none shadow-sm text-sm text-white font-medium">
                ${message}
            </div>
        </div>
    `;
    chatMessages.insertAdjacentHTML('beforeend', userHtml);
    input.value = '';
    if(typeof lucide !== 'undefined') lucide.createIcons();
    chatMessages.scrollTop = chatMessages.scrollHeight;

    const loadingId = 'loading-' + Date.now();
    const loadingHtml = `
        <div id="${loadingId}" class="flex gap-3">
            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-500 to-indigo-500 flex items-center justify-center shrink-0 shadow-sm animate-pulse">
                <i data-lucide="sparkles" class="w-4 h-4 text-white"></i>
            </div>
            <div class="bg-white p-3.5 rounded-2xl rounded-tl-none shadow-sm text-sm text-slate-500 flex items-center gap-2">
                <i data-lucide="loader-2" class="w-4 h-4 animate-spin"></i> Mengetik balasan...
            </div>
        </div>
    `;
    chatMessages.insertAdjacentHTML('beforeend', loadingHtml);
    if(typeof lucide !== 'undefined') lucide.createIcons();
    chatMessages.scrollTop = chatMessages.scrollHeight;

    try {
        const csrfMeta = document.querySelector('meta[name="csrf-token"]');
        const csrfToken = csrfMeta ? csrfMeta.getAttribute('content') : '';
        const response = await fetch('/api/chat', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ message: message, context: window.globalContext || "" })
        });

        const data = await response.json();
        const loader = document.getElementById(loadingId);
        if(loader) loader.remove();

        const botHtml = `
            <div class="flex gap-3">
                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-500 to-indigo-500 flex items-center justify-center shrink-0 shadow-sm">
                    <i data-lucide="sparkles" class="w-4 h-4 text-white"></i>
                </div>
                <div class="bg-white p-3.5 rounded-2xl rounded-tl-none shadow-sm text-sm text-slate-700 border border-slate-100 leading-relaxed whitespace-pre-wrap">
                    ${data.reply}
                </div>
            </div>
        `;
        chatMessages.insertAdjacentHTML('beforeend', botHtml);
        if(typeof lucide !== 'undefined') lucide.createIcons();
        chatMessages.scrollTop = chatMessages.scrollHeight;

    } catch (error) {
        const loader = document.getElementById(loadingId);
        if(loader) loader.remove();
        chatMessages.insertAdjacentHTML('beforeend', `
            <div class="flex gap-3">
                <div class="bg-red-50 text-red-600 p-3 rounded-xl text-sm border border-red-100">
                    Gagal terhubung ke server AI.
                </div>
            </div>
        `);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
}
