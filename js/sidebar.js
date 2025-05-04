document.addEventListener('DOMContentLoaded', () => {
    const menuItems = document.querySelectorAll('.menu-item');
    const contentContainer = document.getElementById('content-container');
    const sidebar = document.querySelector('.sidebar-nav');
    const toggleButton = document.getElementById('toggle-sidebar-btn');

    // Load dashboard.php by default and highlight the Dashboard menu item
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
        const defaultItem = document.querySelector('.menu-item a[data-target="../html/dashboard.php"]');
if (defaultItem) {
    defaultItem.classList.add('active'); // Highlight the <a> tag
    defaultItem.closest('.menu-item').classList.add('active'); // Also highlight its parent <li>
}
    };

    loadDefaultPage(); // Call the function to load the default page

    // Sidebar toggle functionality
    if (toggleButton) {
        toggleButton.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
        });
    }

    menuItems.forEach(item => {
        const mainLink = item.querySelector('a.toggle-submenu');
        const submenuLinks = item.querySelectorAll('.submenu li a');

        if (mainLink) {
            mainLink.addEventListener('click', (event) => {
                event.preventDefault();
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
                document.querySelectorAll('.menu-item, .submenu li a').forEach(link => {
                    link.classList.remove('active');
                });
                submenuLink.classList.add('active');
                const target = submenuLink.getAttribute('data-target');
                if (target) {
                    const iframe = document.createElement('iframe');
                    iframe.src = target;
                    iframe.style.width = '100%';
                    iframe.style.height = '100%';
                    iframe.style.border = 'none';
                    contentContainer.innerHTML = '';
                    contentContainer.appendChild(iframe);
                }
            });
        });

        if (!item.classList.contains('has-submenu')) {
            const link = item.querySelector('a[data-target]');
            if (link) {
                link.addEventListener('click', (event) => {
                    event.preventDefault();
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
                        iframe.style.border = 'none';
                        contentContainer.innerHTML = '';
                        contentContainer.appendChild(iframe);
                    }
                });
            }
        }
    });
});