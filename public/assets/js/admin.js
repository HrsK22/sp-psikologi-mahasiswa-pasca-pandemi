// This event listener runs once the entire HTML document has been loaded.
document.addEventListener('DOMContentLoaded', function () {
    const mainLayout = document.querySelector('.main-layout');
    const toggler = document.getElementById('universal-toggler');
    const sidebarNavLinks = document.querySelectorAll('#sidebar .nav-pills .nav-link');

    // --- Sidebar Toggle Logic ---
    const toggleSidebar = () => {
        mainLayout.classList.toggle('sidebar-collapsed');
    };

    // Event listener for the universal toggle button
    if (toggler) {
        toggler.addEventListener('click', toggleSidebar);
    }
    
    // Automatically collapse sidebar on smaller screens on initial load
    if (window.innerWidth < 992) {
        mainLayout.classList.add('sidebar-collapsed');
    }
});