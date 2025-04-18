document.addEventListener('DOMContentLoaded', () => {
    const menuItems = document.querySelectorAll('.menu-item');

    menuItems.forEach(item => {
        item.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent default link behavior

            // Remove 'active' class from all menu items
            menuItems.forEach(menu => menu.classList.remove('active'));

            // Add 'active' class to the clicked menu item
            item.classList.add('active');

            // Load the target content dynamically
            const target = item.querySelector('a').getAttribute('data-target');
            const contentContainer = document.getElementById('content-container');

            fetch(target)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to load content');
                    }
                    return response.text();
                })
                .then(html => {
                    contentContainer.innerHTML = html;
                })
                .catch(error => {
                    console.error('Error loading content:', error);
                    contentContainer.innerHTML = '<p>Error loading content.</p>';
                });
        });
    });
});