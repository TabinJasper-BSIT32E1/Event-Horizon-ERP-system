document.addEventListener('DOMContentLoaded', () => {
    const menuItems = document.querySelectorAll('.menu-item');
    const contentContainer = document.getElementById('content-container');
    const sidebar = document.querySelector('.sidebar-nav');
    const toggleButton = document.querySelector('.sidebar-toggle');

    // Load dashboard.html by default
    const loadDefaultPage = () => {
        const iframe = document.createElement('iframe');
        iframe.src = '../html/dashboard.php'; // Correct relative path
        iframe.style.width = '100%';
        iframe.style.height = '100%';
        iframe.style.border = 'none'; 
        contentContainer.innerHTML = ''; 
        contentContainer.appendChild(iframe);

        // Highlight the Dashboard menu item
        document.querySelectorAll('.menu-item a').forEach(link => {
            link.classList.remove('active'); // Remove active class from all links
        });
        const defaultMenuItem = document.querySelector('.menu-item a[data-target="../html/dashboard.php"]');
        if (defaultMenuItem) {
            // Remove active from all menu-items (not just links)
            document.querySelectorAll('.menu-item, .submenu li a').forEach(link => {
                link.classList.remove('active');
            });
        
            // Add active class properly
            defaultMenuItem.classList.add('active');
            defaultMenuItem.closest('.menu-item')?.classList.add('active'); 
        }
    };

    loadDefaultPage(); // Call the function to load the default page

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
                    iframe.style.border = 'none'; // Optional: Remove iframe border
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
                        iframe.style.border = 'none'; // Optional: Remove iframe border
                        contentContainer.innerHTML = '';
                        contentContainer.appendChild(iframe);
                    }
                });
            }
        }
    });
});
