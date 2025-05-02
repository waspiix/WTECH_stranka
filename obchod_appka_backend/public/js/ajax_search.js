document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('search-input');
    const results = document.getElementById('autocomplete-results');

    input.addEventListener('input', () => {
        const query = input.value;

        if (query.length < 2) {
            results.innerHTML = '';
            return;
        }

        fetch(`/produkty/search?query=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                results.innerHTML = '';

                if (data.length === 0) {
                    results.innerHTML = '<li class="p-2">Nič sa nenašlo</li>';
                    return;
                }

                data.forEach(produkt => {
                    const li = document.createElement('li');
                    li.classList.add('p-2', 'search-suggestion');
                    li.innerHTML = `<a href="/produkt/${produkt.id}" class="text-decoration-none text-dark">${produkt.name}</a>`;
                    results.appendChild(li);
                });
            });
    });

    // Skryť výsledky po kliknutí mimo
    document.addEventListener('click', (e) => {
        if (!results.contains(e.target) && e.target !== input) {
            results.innerHTML = '';
        }
    });
});
