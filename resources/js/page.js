export function initializePage() {
    const textarea = document.getElementById('content');
    const status = document.getElementById('status');
    let timeout = null;
    const userId = crypto.randomUUID(); 
    const slug = document.querySelector('h1').textContent.replace('Editing: ', '');


    window.Echo.channel(`page-updated.${slug}`)
        .listen('PageUpdated', (event) => {
            if (event.slug === slug && event.userId !== userId) {
                textarea.value = event.content;
                status.textContent = 'Conteúdo atualizado em tempo real!';
            }
        });

    const sendUpdate = () => {
        status.textContent = 'Salvando...';

        fetch(`/${slug}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ content: textarea.value, userId: userId }) 
        })
            .then(response => response.json())
            .then(data => {
                status.textContent = data.message;
            });
    };

    textarea.addEventListener('input', () => {
        clearTimeout(timeout);
        timeout = setTimeout(sendUpdate, 500); 
    });
}