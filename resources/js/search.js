import './bootstrap';
const input = document.getElementById('search');
const btn = document.getElementById('btn');

input.addEventListener('input', function() {
    const query = this.value;
    const suggestions = document.getElementById('suggestions');

    if (query.length >= 1) {
        axios.get("/search", { params: { query } })
            .then(response => {
                if (response.data.length > 0) {
                    suggestions.innerHTML = response.data.map(page => `
                        <a href="/${page}" target="_blank">
                            <li class="py-3 px-4 hover:bg-gray-200 hover:rounded-md transition duration-150 ease-in-out">
                                ${page}
                            </li>
                        </a>
                    `).join('');
                    suggestions.classList.remove('hidden');

                    btn.textContent = 'Search';
                    input.classList.remove('focus:ring-green-500');
                    input.classList.add('focus:ring-blue-500');
                    btn.classList.remove('bg-green-500');
                    btn.classList.add('bg-blue-500');
                    btn.classList.remove('hover:bg-green-600');
                    btn.classList.add('hover:bg-blue-600');

                } else {
                    btn.textContent = 'Create';
                    btn.classList.remove('bg-blue-500');
                    btn.classList.add('bg-green-500');
                    btn.classList.remove('hover:bg-blue-600');
                    btn.classList.add('hover:bg-green-600');
                    input.classList.remove('focus:ring-blue-500');
                    input.classList.add('focus:ring-green-500');

                    suggestions.innerHTML = '';
                    suggestions.classList.add('hidden');
                }
            })
            .catch(console.error);
    } else {
        suggestions.innerHTML = '';
        suggestions.classList.add('hidden');

        btn.textContent = 'Search';
        btn.classList.remove('bg-green-500');
        btn.classList.add('bg-blue-500');
        input.classList.remove('focus:ring-green-500');
        input.classList.add('focus:ring-blue-500');
        btn.classList.remove('hover:bg-green-600');
        btn.classList.add('hover:bg-blue-600');
    }
});

input.addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        const query = this.value;
        if (query.length >= 1) {
            window.location.href = `/${query}`;
        }
    }
});

btn.addEventListener('click', function() {
    const query = input.value;
    if (query.length >= 1) {
        window.location.href = `/${query}`;             
    }
})  