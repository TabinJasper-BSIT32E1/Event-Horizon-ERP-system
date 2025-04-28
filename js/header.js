document.addEventListener('DOMContentLoaded', function() {
    // Check if the element exists
    const headerPlaceholder = document.getElementById('header-placeholder');
    if (headerPlaceholder) {
        fetch('../includes/header.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to load header.php: ' + response.status);
                }
                return response.text();
            })
            .then(data => {
                headerPlaceholder.innerHTML = data;
            })
            .catch(error => {
                console.error('Error loading header:', error);
                headerPlaceholder.innerHTML = '<p>Sorry, the header could not be loaded.</p>';
            });
    } else {
        console.error('header-placeholder not found.');
    }
});
