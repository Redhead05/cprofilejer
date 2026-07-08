(function() {
	"use strict";

    // Navbar Sticky
    const getNavbarID = document.getElementById("navbar");
    if (getNavbarID) {
        window.addEventListener('scroll', event => {
            const height = 150;
            const { scrollTop } = event.target.scrollingElement;
            document.querySelector('#navbar').classList.toggle('is-sticky', scrollTop >= height);
        });
    }

    // Navbar Collapse
    const getNavbarBurgerMenuID = document.getElementById("navbar-burger-menu");
    if (getNavbarBurgerMenuID) {
        const button = document.getElementById('navbar-burger-menu');
        const div = document.getElementById('navbar-collapse');
        button.addEventListener('click', function() {
            button.classList.toggle('active'); // Toggle active class on the button
            div.classList.toggle('active');    // Toggle active class on the div
        });
    }

    // Dark/Light Toggle
	const getSwitchToggleID = document.getElementById('light-dark-toggle');
	if (getSwitchToggleID) {
		const switchToggle = document.getElementById('light-dark-toggle');
        const html = document.documentElement;  // Targeting the <html> element
        if (switchToggle) {
            const savedTheme = localStorage.getItem("trezo_theme");
            // Apply the saved theme class if it exists
            if (savedTheme) {
                html.classList.add(savedTheme === "dark" ? "dark" : "light");
            }
            // Add event listener to switch between themes
            switchToggle.addEventListener("click", () => {
                if (html.classList.contains("dark")) {
                    // Switch to light theme
                    html.classList.remove("dark");
                    html.classList.add("light");
                    localStorage.setItem("trezo_theme", "light");
                } else {
                    // Switch to dark theme
                    html.classList.remove("light");
                    html.classList.add("dark");
                    localStorage.setItem("trezo_theme", "dark");
                }
            });
        }
	}

    // Shipment Dashboard Showcase Slides
    const shipmentDashboardShowcaseSlides = document.getElementById("shipmentDashboardShowcaseSlides");
    if (shipmentDashboardShowcaseSlides) {
        var swiper2 = new Swiper(".mySwiper2", {
            slidesPerView: 1,
            loop: true,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: ".swiper-button-next.dashboard-showcase-swiper-button",
                prevEl: ".swiper-button-prev.dashboard-showcase-swiper-button"
            }
        });
    }

    // Shipment Testimonials Slides
    const shipmentTestimonialsSlides = document.getElementById("shipmentTestimonialsSlides");
    if (shipmentTestimonialsSlides) {
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            loop: true,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            }
        });
    }

    // Social Media Features Slides
    const socialMediaFeaturesSlides = document.getElementById("socialMediaFeaturesSlides");
    if (socialMediaFeaturesSlides) {
        var swiper = new Swiper(".mySwiper2", {
            spaceBetween: 25,
            loop: true,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false
            },
            breakpoints: {
                640: {
                    slidesPerView: 2
                },
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                }
            }
        });
    }

    // Social Media Testimonials Slides
    const socialMediaTestimonialsSlides = document.getElementById("socialMediaTestimonialsSlides");
    if (socialMediaTestimonialsSlides) {
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            loop: true,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            }
        });
    }

    // Store Analysis Testimonials Slides
    const storeAnalysisTestimonialsSlides = document.getElementById("storeAnalysisTestimonialsSlides");
    if (storeAnalysisTestimonialsSlides) {
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            loop: true,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            }
        });
    }

    // Finance Testimonials Slides
    const financeTestimonialsSlides = document.getElementById("financeTestimonialsSlides");
    if (financeTestimonialsSlides) {
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            loop: true,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            }
        });
    }

    // CRM Features Slides
    const crmFeaturesSlides = document.getElementById("crmFeaturesSlides");
    if (crmFeaturesSlides) {
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            loop: true,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            }
        });
    }

    // CRM Feedback Slides
    const crmFeedbackSlides = document.getElementById("crmFeedbackSlides");
    if (crmFeedbackSlides) {
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            loop: true,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            }
        });
    }

    // Crypto Feedback Slides
    const cryptoFeedbackSlides = document.getElementById("cryptoFeedbackSlides");
    if (cryptoFeedbackSlides) {
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: 25,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            breakpoints: {
                640: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 1
                },
                1024: {
                    slidesPerView: 2
                }
            }
        });
    }

    // Analytics Testimonials Slides
    const analyticsTestimonialsSlides = document.getElementById("analyticsTestimonialsSlides");
    if (analyticsTestimonialsSlides) {
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            loop: true,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            }
        });
    }

    // Call Center Feedback Slides
    const callCenterFeedbackSlides = document.getElementById("callCenterFeedbackSlides");
    if (callCenterFeedbackSlides) {
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            loop: true,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            }
        });
    }

    // Real Estate Feedback Slides
    const realEstateFeedbackSlides = document.getElementById("realEstateFeedbackSlides");
    if (realEstateFeedbackSlides) {
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            loop: true,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            }
        });
    }

    // HRM Feedback Slides
    const hrmFeedbackSlides = document.getElementById("hrmFeedbackSlides");
    if (hrmFeedbackSlides) {
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            loop: true,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            }
        });
    }

    // NFT Testimonials Slides
    const nftTestimonialsSlides = document.getElementById("nftTestimonialsSlides");
    if (nftTestimonialsSlides) {
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            loop: true,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            }
        });
    }

    // Trezo Tabs
    const trezoTabsID = document.getElementById("trezo-tabs");
    if (trezoTabsID) {
        document.addEventListener("DOMContentLoaded", function () {
            function setupTabs() {
                const tabGroups = document.querySelectorAll('.trezo-tabs');
                tabGroups.forEach((group) => {
                    const tabs = document.querySelectorAll(".nav-link");
                    const contents = group.querySelectorAll(".tab-pane");
                    tabs.forEach(tab => {
                        tab.addEventListener("click", function () {
                            const contentId = tab.getAttribute("data-tab");
                            // Remove active from all nav-link with same group
                            tabs.forEach(t => {
                                if (group.contains(t)) {
                                    t.classList.remove("active");
                                }
                            });
                            // Add active class to all matching nav-link with the same data-tab
                            document.querySelectorAll(`.nav-link[data-tab="${contentId}"]`)
                            .forEach(t => t.classList.add("active"));
                            // Hide all tab content in current group
                            contents.forEach(content => content.classList.remove("active"));
                            // Show the correct content
                            const target = group.querySelector(`#${contentId}`);
                            if (target) {
                                target.classList.add("active");
                            }
                        });
                    });
                    // Auto-select the first tab in the group
                    const defaultTab = group.querySelector(".nav-link");
                    if (defaultTab) defaultTab.click();
                });
            }
            setupTabs();
        });
    }

    // Accordion
    const trezoAccordion = document.getElementById("trezoAccordion");
    if (trezoAccordion) {
        function initializeAccordions() {
            const accordions = document.querySelectorAll('.accordion-button');
            accordions.forEach((accordion) => {
                accordion.addEventListener('click', function () {
                    // Close all panels in the current accordion level
                    let siblingAccordions = Array.from(this.closest('.accordion-collapse')?.querySelectorAll('.accordion-button') || accordions);
                    siblingAccordions.forEach((acc) => {
                        if (acc !== accordion) {
                            acc.classList.remove('open');
                            acc.setAttribute('aria-expanded', 'false');
                            acc.nextElementSibling.style.display = 'none';
                        }
                    });
                    // Toggle current panel
                    this.classList.toggle('open');
                    const panel = this.nextElementSibling;
                    if (panel.style.display === 'block') {
                        panel.style.display = 'none';
                        this.setAttribute('aria-expanded', 'false');
                    } else {
                        panel.style.display = 'block';
                        this.setAttribute('aria-expanded', 'true');
                    }
                });
            });
        }
        document.addEventListener('DOMContentLoaded', () => {
            initializeAccordions();
        });
    }

    // RTL Mode Toggle
	const getRTLModeID = document.getElementById('rtl-mode-toggle');
	if (getRTLModeID) {
		// Function to toggle direction and active class
        function toggleDirection() {
            const htmlTag = document.documentElement; // Access the <html> tag
            const toggleButton = document.getElementById('rtl-mode-toggle'); // Access the button
            const currentDirection = htmlTag.getAttribute('dir');
            const newDirection = currentDirection === 'ltr' ? 'rtl' : 'ltr';
            // Set new direction on the <html> tag
            htmlTag.setAttribute('dir', newDirection);
            // Toggle the 'active' class on the button based on the new direction
            if (newDirection === 'rtl') {
                toggleButton.classList.add('open');
            } else {
                toggleButton.classList.remove('open');
            }
            // Save new direction in localStorage
            localStorage.setItem('textDirection', newDirection);
        }
        // On page load, check if there is a saved direction in localStorage
        window.onload = function() {
            const savedDirection = localStorage.getItem('textDirection') || 'ltr'; // Default to 'ltr' if not found
            const toggleButton = document.getElementById('rtl-mode-toggle'); // Access the button
            // Set the direction for <html> tag based on localStorage
            document.documentElement.setAttribute('dir', savedDirection);
            // Apply the 'active' class if the saved direction is 'rtl'
            if (savedDirection === 'rtl') {
                toggleButton.classList.add('open');
            }
            // Add click event listener to the button
            toggleButton.onclick = toggleDirection;
        };
	}

    // Back to Top
    const backToTopBtn = document.getElementById("backToTopBtn");
    if (backToTopBtn) {
        const backToTopBtn = document.getElementById("backToTopBtn");
        window.addEventListener("scroll", () => {
            if (window.scrollY > 300) {
                backToTopBtn.classList.add("show");
            } else {
                backToTopBtn.classList.remove("show");
            }
        });
        backToTopBtn.addEventListener("click", () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // Demos Popup
    document.addEventListener('DOMContentLoaded', () => {
        const openBtn = document.getElementById('openPopupBtn');
        const closeBtn = document.getElementById('closePopupBtn');
        const popup = document.getElementById('demosPopup');
        if (openBtn && popup) {
            openBtn.addEventListener('click', () => {
                popup.style.display = 'block';
            });
        }
        if (closeBtn && popup) {
            closeBtn.addEventListener('click', () => {
                popup.style.display = 'none';
            });
        }
    });
    
})();