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

const input=document.getElementById('dest-input');
const resultsBox = document.getElementById('results-box');
input.addEventListener('input', function() {
    let val = this.value;
    if (val.length < 3) {
        resultsBox.style.display = 'none';
        return;
    }

    fetch(`/api/autocomplete?q=${val}`)
        .then(res => res.json())
        .then(data => {
            resultsBox.innerHTML = ''; // Clear old results
            resultsBox.style.display = 'block';

            data.features.forEach(feature => {
                const city = feature.properties.name;
                const country = feature.properties.country;
                const fullText = `${city}, ${country}`;

                // Create the clickable item
                let btn = document.createElement('button');
                btn.type = 'button';
                btn.className = 'list-group-item list-group-item-action border-0';
                btn.innerHTML = `<i class="bi bi-geo-alt-fill text-muted me-2"></i><strong>${city}</strong>, <small class="text-secondary">${country}</small>`;
                
                btn.onclick = function() {
                    input.value = fullText;
                    resultsBox.style.display = 'none';
                };

                resultsBox.appendChild(btn);
            });
        });
});

// Close dropdown if user clicks elsewhere
document.addEventListener('click', (e) => {
    if (e.target !== input) resultsBox.style.display = 'none';
});