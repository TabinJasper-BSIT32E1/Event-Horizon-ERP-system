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
                // Remove the active class from all links
                document.querySelectorAll('.menu-item, .submenu li a').forEach(link => {
                    link.classList.remove('active');
                });

                // Add the active class to the clicked submenu link only
                submenuLink.classList.add('active');
                
                // Only highlight the current submenu item, not the whole menu
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

        // Handling non-submenu items
        if (!item.classList.contains('has-submenu')) {
            const link = item.querySelector('a[data-target]');
            if (link) {
                link.addEventListener('click', (event) => {
                    event.preventDefault();
                    // Remove the active class from all links
                    document.querySelectorAll('.menu-item, .submenu li a').forEach(link => {
                        link.classList.remove('active');
                    });
                    item.classList.add('active'); // Highlight the parent <li> for non-submenu items
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

// Event listener for message-based navigation
window.addEventListener('message', (event) => {
    if (event.data && event.data.type === 'navigate') {
        const target = event.data.target;

        // Load the page into the iframe
        const iframe = document.createElement('iframe');
        iframe.src = target;
        iframe.style.width = '100%';
        iframe.style.height = '100%';
        iframe.style.border = 'none';

        const contentContainer = document.getElementById('content-container');
        contentContainer.innerHTML = '';
        contentContainer.appendChild(iframe);

        // Remove the active class from all sidebar links
        document.querySelectorAll('.menu-item a').forEach(link => {
            link.classList.remove('active');
            link.closest('.menu-item')?.classList.remove('active');
        });

        // Add the active class to the matching sidebar link
        const matchingLink = document.querySelector(`a[data-target="${target}"]`);
        if (matchingLink) {
            matchingLink.classList.add('active');
            
            // Ensure only the specific link is marked as active, not its parent menu item
            const submenuItem = matchingLink.closest('li');
            if (submenuItem) {
                submenuItem.classList.add('active'); // Only this specific submenu item should be active
            }

            // Automatically open the Reports submenu if the page belongs to the Reports section
            if (target.includes('reports.php') || target.includes('summaryreport.php') || target.includes('deduction.php')) {
                const reportMenuItem = document.querySelector('.menu-item.has-submenu');
                if (reportMenuItem) {
                    reportMenuItem.classList.add('open');
                }
            }
        }
    }
});
