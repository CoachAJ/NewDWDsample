/**
 * Daily with Doc - Joomla 6.0 Mobile-Friendly Template Script
 */

document.addEventListener('DOMContentLoaded', function () {
    var mobileToggle = document.querySelector('.dwd-mobile-toggle');
    var navMenu = document.querySelector('.dwd-nav-menu');
    var searchBtn = document.querySelector('.dwd-search-btn');
    var searchModal = document.querySelector('.dwd-search-modal');
    var searchInput = document.querySelector('.dwd-search-input');

    // Create backdrop element if not already present
    var backdrop = document.querySelector('.dwd-nav-backdrop');
    if (!backdrop) {
        backdrop = document.createElement('div');
        backdrop.className = 'dwd-nav-backdrop';
        document.body.appendChild(backdrop);
    }

    function closeMobileMenu() {
        if (navMenu) navMenu.classList.remove('active');
        if (mobileToggle) {
            mobileToggle.classList.remove('is-active');
            mobileToggle.setAttribute('aria-expanded', 'false');
        }
        if (backdrop) backdrop.classList.remove('active');
        document.body.classList.remove('nav-open');
    }

    function openMobileMenu() {
        if (navMenu) navMenu.classList.add('active');
        if (mobileToggle) {
            mobileToggle.classList.add('is-active');
            mobileToggle.setAttribute('aria-expanded', 'true');
        }
        if (backdrop) backdrop.classList.add('active');
        document.body.classList.add('nav-open');
        // Close search if open
        if (searchModal) searchModal.classList.remove('active');
    }

    // Toggle Mobile Navigation
    if (mobileToggle && navMenu) {
        mobileToggle.addEventListener('click', function (e) {
            e.stopPropagation();
            if (navMenu.classList.contains('active')) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }
        });
    }

    // Backdrop click closes mobile menu
    if (backdrop) {
        backdrop.addEventListener('click', function () {
            closeMobileMenu();
            if (searchModal) searchModal.classList.remove('active');
        });
    }

    // Touch accordion for submenus on mobile
    var dropdownParents = document.querySelectorAll('.dwd-nav-menu > li.deeper');
    dropdownParents.forEach(function (parent) {
        var link = parent.querySelector('> a, > .nav-heading');

        if (link) {
            link.addEventListener('click', function (e) {
                // If on mobile (or small screen)
                if (window.innerWidth <= 860 || (navMenu && navMenu.classList.contains('active'))) {
                    // Check if clicking link with children
                    var submenu = parent.querySelector('.dropdown-menu');
                    if (submenu) {
                        e.preventDefault();
                        e.stopPropagation();

                        var isOpen = parent.classList.contains('open');

                        // Close sibling accordions for clean UX
                        dropdownParents.forEach(function (other) {
                            if (other !== parent) {
                                other.classList.remove('open');
                            }
                        });

                        parent.classList.toggle('open', !isOpen);
                    }
                }
            });
        }
    });

    // Close mobile menu when clicking internal anchor links
    var menuLinks = document.querySelectorAll('.dwd-nav-menu a:not(.dropdown-toggle)');
    menuLinks.forEach(function (link) {
        link.addEventListener('click', function () {
            if (window.innerWidth <= 860) {
                closeMobileMenu();
            }
        });
    });

    // Search Bar Toggle
    if (searchBtn && searchModal) {
        searchBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            searchModal.classList.toggle('active');
            if (searchModal.classList.contains('active')) {
                closeMobileMenu();
                if (searchInput) searchInput.focus();
            }
        });

        // Close search when clicking outside
        document.addEventListener('click', function (e) {
            if (!searchModal.contains(e.target) && !searchBtn.contains(e.target)) {
                searchModal.classList.remove('active');
            }
        });
    }

    // Escape key closes menus
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' || e.key === 'Esc') {
            closeMobileMenu();
            if (searchModal) searchModal.classList.remove('active');
        }
    });

    // Newsletter form validation feedback
    var newsletterForm = document.querySelector('.dwd-newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function (e) {
            var emailInput = newsletterForm.querySelector('input[type="email"]');
            if (emailInput && !emailInput.value.trim()) {
                e.preventDefault();
                alert('Please enter a valid email address.');
                emailInput.focus();
            }
        });
    }

    // Close mobile menu on orientation change or desktop resize
    window.addEventListener('resize', function () {
        if (window.innerWidth > 860) {
            closeMobileMenu();
            dropdownParents.forEach(function (parent) {
                parent.classList.remove('open');
            });
        }
    });
});
