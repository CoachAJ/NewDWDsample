/**
 * Daily with Doc - Joomla 6.0 Template Script
 */

document.addEventListener('DOMContentLoaded', function () {
    // Mobile navigation toggle
    var mobileToggle = document.querySelector('.dwd-mobile-toggle');
    var navMenu = document.querySelector('.dwd-nav-menu');

    if (mobileToggle && navMenu) {
        mobileToggle.addEventListener('click', function () {
            navMenu.classList.toggle('active');
            var expanded = navMenu.classList.contains('active');
            mobileToggle.setAttribute('aria-expanded', expanded);
        });
    }

    // Search bar toggle
    var searchBtn = document.querySelector('.dwd-search-btn');
    var searchModal = document.querySelector('.dwd-search-modal');
    var searchInput = document.querySelector('.dwd-search-input');

    if (searchBtn && searchModal) {
        searchBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            searchModal.classList.toggle('active');
            if (searchModal.classList.contains('active') && searchInput) {
                searchInput.focus();
            }
        });

        // Close search when clicking outside
        document.addEventListener('click', function (e) {
            if (!searchModal.contains(e.target) && !searchBtn.contains(e.target)) {
                searchModal.classList.remove('active');
            }
        });
    }

    // Touch device dropdown support for mobile
    var dropdownParents = document.querySelectorAll('.dwd-nav-menu > li.deeper');
    dropdownParents.forEach(function (parent) {
        var link = parent.querySelector('> a, > .nav-heading');
        if (link && window.innerWidth <= 860) {
            link.addEventListener('click', function (e) {
                if (parent.querySelector('.dropdown-menu')) {
                    e.preventDefault();
                    parent.classList.toggle('open');
                    var menu = parent.querySelector('.dropdown-menu');
                    if (menu) {
                        menu.style.display = parent.classList.contains('open') ? 'block' : 'none';
                    }
                }
            });
        }
    });

    // Newsletter form enhancement
    var newsletterForm = document.querySelector('.dwd-newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function (e) {
            var emailInput = newsletterForm.querySelector('input[type="email"]');
            if (emailInput && !emailInput.value) {
                e.preventDefault();
                alert('Please enter a valid email address.');
                emailInput.focus();
            }
        });
    }
});

