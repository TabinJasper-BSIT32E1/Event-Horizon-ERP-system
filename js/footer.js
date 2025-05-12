// Footer JavaScript to load footer.php dynamically
document.addEventListener('DOMContentLoaded', function() {
    const footerPlaceholder = document.getElementById('footer-placeholder');
    if (footerPlaceholder) {
        fetch('../includes/footer.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to load footer.html: ' + response.status);
                }
                return response.text();
            })
            .then(data => {
                footerPlaceholder.innerHTML = data;
            })
            .catch(error => {
                console.error('Error loading footer:', error);
                footerPlaceholder.innerHTML = '<p>Sorry, the footer could not be loaded.</p>';
            });
    } else {
        console.error('footer-placeholder not found.');
    }
});
