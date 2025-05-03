// When a nav link is clicked, close the mobile menu
document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.querySelector('.navbar-collapse');

    // Add class to body on mobile size when section link is clicked
    const updateBodyClass = function() {
        // Check if we're on mobile viewport
        if (window.innerWidth <= 991.98) {
            // Check if URL has an ID parameter
            const urlParams = new URLSearchParams(window.location.search);
            const hasId = urlParams.has('id');

            // Update body class based on URL
            if (hasId) {
                document.body.classList.add('section-view');
            } else {
                document.body.classList.remove('section-view');
            }
        } else {
             // Ensure class is removed on larger screens if it was added
             document.body.classList.remove('section-view');
        }
    };

    // Run on page load
    updateBodyClass();

    // Add event listeners to section links
    const sectionLinks = document.querySelectorAll('.section-link');
    sectionLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Add class in anticipation of the new page load only on mobile
            if (window.innerWidth <= 991.98) {
                // Small delay to allow class addition before navigation potentially starts
                setTimeout(() => {
                    document.body.classList.add('section-view');
                }, 50);
            }
        });
    });

    // Close mobile menu when links are clicked
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Check if the menu is expanded (visible on mobile)
            if (navbarCollapse.classList.contains('show')) {
                // Use Bootstrap's collapse API to hide the menu
                // Check if bootstrap object and Collapse exist
                if (typeof bootstrap !== 'undefined' && bootstrap.Collapse) {
                    const collapseInstance = bootstrap.Collapse.getInstance(navbarCollapse);
                    if (collapseInstance) {
                        collapseInstance.hide();
                    } else {
                        // Fallback if instance not found but element has 'show'
                        new bootstrap.Collapse(navbarCollapse).hide();
                    }
                }
            }
        });
    });

    // Handle window resize
    window.addEventListener('resize', updateBodyClass);
});