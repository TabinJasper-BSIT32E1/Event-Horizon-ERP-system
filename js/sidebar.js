document.addEventListener('DOMContentLoaded', () => {
    const menuItems = document.querySelectorAll('.menu-item');
    const contentContainer = document.getElementById('content-container');
    const sidebar = document.querySelector('.sidebar-nav');
    const toggleButton = document.querySelector('.sidebar-toggle');

    // Sidebar toggle functionality
    if (toggleButton) {
        toggleButton.addEventListener('click', () => {
            sidebar.classList.toggle('open');
            contentContainer.classList.toggle('sidebar-open');
        });
    }

    menuItems.forEach(item => {
        const mainLink = item.querySelector('a.toggle-submenu');
        const submenuLinks = item.querySelectorAll('.submenu li a');

        if (mainLink) {
            // If menu item has a submenu (like Reports)
            mainLink.addEventListener('click', (event) => {
                event.preventDefault();

                // Toggle only this submenu, close others
                menuItems.forEach(menu => {
                    if (menu !== item) {
                        menu.classList.remove('open');
                    }
                });

                item.classList.toggle('open');
            });
        }

        submenuLinks.forEach(submenuLink => {
            submenuLink.addEventListener('click', (event) => {
                event.preventDefault();

                // Remove active class from ALL links first
                document.querySelectorAll('.menu-item, .submenu li a').forEach(link => {
                    link.classList.remove('active');
                });

                // Highlight the submenu link only
                submenuLink.classList.add('active');

                // Load the correct iframe content
                const target = submenuLink.getAttribute('data-target');
                if (target) {
                    const iframe = document.createElement('iframe');
                    iframe.src = target;
                    iframe.style.width = '100%';
                    iframe.style.height = '100%';
                    contentContainer.innerHTML = '';
                    contentContainer.appendChild(iframe);
                }
            });
        });

        // Handle main menu items without submenu
        if (!item.classList.contains('has-submenu')) {
            const link = item.querySelector('a[data-target]');
            if (link) {
                link.addEventListener('click', (event) => {
                    event.preventDefault();

                    // Remove active class from all
                    document.querySelectorAll('.menu-item, .submenu li a').forEach(link => {
                        link.classList.remove('active');
                    });

                    item.classList.add('active');

                    const target = link.getAttribute('data-target');
                    if (target) {
                        const iframe = document.createElement('iframe');
                        iframe.src = target;
                        iframe.style.width = '100%';
                        iframe.style.height = '100%';
                        contentContainer.innerHTML = '';
                        contentContainer.appendChild(iframe);
                    }
                });
            }
        }
    });
});