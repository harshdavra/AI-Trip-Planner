window.onload = function() {
    const element = document.getElementById("text");
    const originalText = element.textContent.trim();
    const words = originalText.split(/\s+/);

    element.innerHTML = ""; 
    
    words.forEach((word) => {
        const span = document.createElement("span");
        span.textContent = word + " ";
        span.className = "word"; 
        element.appendChild(span);
    });

    // 2. Reveal them one by one
    const spans = element.querySelectorAll(".word");
    spans.forEach((span, index) => {
        setTimeout(() => {
            span.classList.add("visible");
        }, index * 100); // Adjust speed here
    });
};


const input = document.getElementById('dest-input');
const resultsBox = document.getElementById('results-box');

let debounceTimer;

input.addEventListener('input', function () {
    clearTimeout(debounceTimer);

    const val = this.value.trim();
    if (val.length < 3) {
        resultsBox.style.display = 'none';
        return;
    }

    debounceTimer = setTimeout(() => {
         resultsBox.innerHTML = `
            <div class="list-group-item text-muted">
                <span class="spinner-border spinner-border-sm me-2"></span>
                Searching...
            </div>`;
        resultsBox.style.display = 'block';

        fetch(`/api/autocomplete?q=${encodeURIComponent(val)}`)
            .then(res => res.json())
            .then(data => {
                resultsBox.innerHTML = '';
                resultsBox.style.display = 'block';

                if (!data.features || data.features.length === 0) {
                    resultsBox.innerHTML = `
                        <div class="list-group-item text-muted">
                            No destinations found
                        </div>`;
                    return;
                }

                data.features.forEach(feature => {
                    const city = feature.properties.name;
                    const country = feature.properties.country || '';
                    const fullText = country ? `${city}, ${country}` : city;

                    const btn = document.createElement('button');
                    btn.type = 'button';
                    btn.className = 'list-group-item list-group-item-action border-0';
                    btn.innerHTML = `
                        <i class="bi bi-geo-alt-fill text-muted me-2"></i>
                        <strong>${city}</strong>
                        ${country ? `<small class="text-secondary">, ${country}</small>` : ''}
                    `;

                    btn.onclick = () => {
                        input.value = fullText;
                        resultsBox.style.display = 'none';
                    };

                    resultsBox.appendChild(btn);
                });
            })
            .catch(() => {
                resultsBox.innerHTML = `
                    <div class="list-group-item text-danger">
                        Error loading destinations
                    </div>`;
            });
    }, 120); // debounce delay
});

// Close dropdown when clicking outside
document.addEventListener('click', (e) => {
    if (!e.target.closest('.destination')) {
        resultsBox.style.display = 'none';
    }
});

