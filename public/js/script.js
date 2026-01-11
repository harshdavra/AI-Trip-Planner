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