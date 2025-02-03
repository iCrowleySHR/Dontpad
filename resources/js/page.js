import './echo';

const textarea = document.getElementById('content');
const status = document.getElementById('status');
let timeout = null;
const userId = crypto.randomUUID();
const slug = document.querySelector('h1').textContent.replace('Editing: ', '');

window.Echo.channel(`page-updated.${slug}`)
    .listen('PageUpdated', (event) => {
        if (event.slug === slug && event.userId !== userId) {
            textarea.value = event.content;
            adjustHeight(textarea);
            status.textContent = 'Content updated in real time!';
        }
    });

const sendUpdate = () => {
    status.textContent = 'Saving...';

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

adjustHeight(textarea);

function adjustHeight(el) {
    el.style.height = "auto";
    el.style.height = el.scrollHeight + "px";
}

textarea.addEventListener('input', () => {
    adjustHeight(textarea);
    clearTimeout(timeout);
    timeout = setTimeout(sendUpdate, 500);
});

