document.addEventListener("DOMContentLoaded", function() {
    fetch('/includes/header.html') // Adjust path if needed
        .then(response => response.text())
        .then(data => {
            document.getElementById('header-placeholder').innerHTML = data;
        })
        .catch(error => console.error('Error loading header:', error));
});
