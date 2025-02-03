import './bootstrap';

document.getElementById('search').addEventListener('input', function() {
    const query = this.value;
    const suggestions = document.getElementById('suggestions');

    if (query.length >= 1) {
        axios.get("/search", { params: { query } })
            .then(response => {
                suggestions.innerHTML = response.data.map(page => `
                <a href="/${page}" target="_blank">
                    <li class="py-3 px-4 hover:bg-gray-200 hover:rounded-md transition duration-150 ease-in-out">
                        ${page}
                    </li>
                </a>
                `).join('');
                suggestions.classList.remove('hidden');
            })
            .catch(console.error);
    } else {
        suggestions.innerHTML = '';
        suggestions.classList.add('hidden'); 
    }
});