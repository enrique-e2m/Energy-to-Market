const slides = [
  { background: '/images/back-1.png' },
  { background: '/images/back-2.png' },
  { background: '/images/back-3.avif' }
];

let currentSlide = 0;
let isAnimating = false;

 
const mainContainer = document.getElementById('mainContainer');
const heroLogo = document.getElementById('heroLogo');
const heroDivider = document.getElementById('heroDivider');
const heroTagline = document.getElementById('heroTagline');
const heroActions = document.getElementById('heroActions');
const bgA = document.querySelector('#mainContainer .bg-fade-a');
const bgB = document.querySelector('#mainContainer .bg-fade-b');
let activeBg = 'a';
const prefersReduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

function preloadImage(url) {
    const img = new Image();
    img.src = url;
}

 
function updateSlide(index, direction = 'next') {
    if (isAnimating) return;
    isAnimating = true;

    const slide = slides[index];

    if (prefersReduce) {
        if (mainContainer) mainContainer.style.backgroundImage = `url('${slide.background}')`;
        heroLogo && (heroLogo.style.opacity = '1');
        heroDivider && (heroDivider.style.opacity = '1');
        heroTagline && (heroTagline.style.opacity = '1');
        heroActions && (heroActions.style.opacity = '1');
        isAnimating = false;
        return;
    }

    // Animate out current content
    const timeline = [
        () => {
            heroLogo && (heroLogo.style.opacity = '0');
            heroLogo && (heroLogo.style.transform = 'translateY(-6px)');
        },
        () => {
            heroDivider && (heroDivider.style.opacity = '0');
            heroDivider && (heroDivider.style.transform = 'scaleX(.92)');
        },
        () => {
            heroTagline && (heroTagline.style.opacity = '0');
            heroTagline && (heroTagline.style.transform = 'translateY(6px)');
        },
        () => {
            heroActions && (heroActions.style.opacity = '0');
            heroActions && (heroActions.style.transform = 'translateY(6px)');
        }
    ];

    // Execute animations with delays
    timeline.forEach((animation, i) => {
        setTimeout(animation, i * 150);
    });

    if (bgA && bgB) {
        const incoming = activeBg === 'a' ? bgB : bgA;
        const outgoing = activeBg === 'a' ? bgA : bgB;
        incoming.style.backgroundImage = `url('${slide.background}')`;
        incoming.classList.add('active');
        outgoing.classList.remove('active');
        activeBg = activeBg === 'a' ? 'b' : 'a';
        setTimeout(() => {
            mainContainer.style.backgroundImage = `url('${slide.background}')`;
        }, 1200);
        const nextIdx = (index + 1) % slides.length;
        preloadImage(slides[nextIdx].background);
    } else {
        setTimeout(() => {
            mainContainer.style.backgroundImage = `url('${slide.background}')`;
        }, 300);
    }

    // Animate content back in
    setTimeout(() => {
        heroLogo && (heroLogo.style.opacity = '1');
        heroLogo && (heroLogo.style.transform = 'translateY(0)');
    }, 220);
    setTimeout(() => {
        heroDivider && (heroDivider.style.opacity = '1');
        heroDivider && (heroDivider.style.transform = 'scaleX(1)');
    }, 300);
    setTimeout(() => {
        heroTagline && (heroTagline.style.opacity = '1');
        heroTagline && (heroTagline.style.transform = 'translateY(0)');
    }, 380);
    setTimeout(() => {
        heroActions && (heroActions.style.opacity = '1');
        heroActions && (heroActions.style.transform = 'translateY(0)');
    }, 460);



    // Reset animation flag
    setTimeout(() => {
        isAnimating = false;
    }, 1500);
}

// Enhanced card update with staggered animations

// Navigation functions with direction tracking
function nextSlide() {
    if (isAnimating) return;
    currentSlide = (currentSlide + 1) % slides.length;
    updateSlide(currentSlide, 'next');
    updateIndicators();
}

function prevSlide() {
    if (isAnimating) return;
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    updateSlide(currentSlide, 'prev');
    updateIndicators();
}

// Enhanced event listeners with animation prevention
let autoTimer = null;
if (!(window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches)) {
    autoTimer = setInterval(() => {
        if (!isAnimating) nextSlide();
    }, 8000);
}

// Mobile navigation controls
// Mobile arrows removed
const slideIndicators = document.querySelectorAll('.slide-indicator');

// Mobile navigation event listeners
// No manual mobile controls

// Slide indicator event listeners
slideIndicators.forEach((indicator, index) => {
    indicator.addEventListener('click', () => {
        if (!isAnimating && index !== currentSlide) {
            currentSlide = index;
            updateSlide(currentSlide);
            updateIndicators();
        }
    });
});

// Update slide indicators
function updateIndicators() {
    slideIndicators.forEach((indicator, index) => {
        indicator.classList.toggle('active', index === currentSlide);
    });
}

// Keyboard navigation
document.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowRight') nextSlide();
    if (e.key === 'ArrowLeft') prevSlide();
});

// Add transition styles to elements
function initializeTransitions() {
    heroLogo && (heroLogo.style.transition = 'all 0.8s cubic-bezier(0.2, 0.8, 0.2, 1)');
    heroDivider && (heroDivider.style.transition = 'all 0.7s cubic-bezier(0.2, 0.8, 0.2, 1)');
    heroTagline && (heroTagline.style.transition = 'all 0.8s cubic-bezier(0.2, 0.8, 0.2, 1)');
    heroActions && (heroActions.style.transition = 'all 0.8s cubic-bezier(0.2, 0.8, 0.2, 1)');
    heroActions && (heroActions.style.opacity = '0');
    heroActions && (heroActions.style.transform = 'translateY(12px)');
}

// Initialize the slider
function initializeSlider() {
    initializeTransitions();
    if (slides && slides.length && mainContainer) {
        mainContainer.style.backgroundImage = `url('${slides[currentSlide].background}')`;
    }
    if (bgA && bgB) {
        bgA.style.backgroundImage = `url('${slides[currentSlide].background}')`;
        bgA.classList.add('active');
        bgB.classList.remove('active');
    }
    preloadImage(slides[(currentSlide + 1) % slides.length].background);
    updateSlide(currentSlide);
    updateIndicators();
}

// Navbar functionality
function initializeNavbar() {
    // Mobile menu toggle
    const mobileMenuBtn = document.getElementById('hamburgerBtn');
    const mobileMenu = document.querySelector('.mobile-menu');
    const headerBar = document.getElementById('headerBar');
    const logoBox = document.getElementById('logoBox');
    const navPrimary = document.getElementById('navPrimary');
    const authBox = document.getElementById('authBox');
    const loginLink = authBox ? authBox.querySelector('.login-btn') : null;
    const registerLink = authBox ? authBox.querySelector('.register-btn') : null;

    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('active');
            const expanded = mobileMenu.classList.contains('active');
            mobileMenuBtn.setAttribute('aria-expanded', expanded ? 'true' : 'false');
        });
    }

    // Mobile dropdown toggle
    const mobileDropdownTrigger = document.querySelector('.mobile-dropdown-trigger');
    const mobileDropdownContent = document.querySelector('.mobile-dropdown-content');
    const mobileDropdownArrow = document.querySelector('.mobile-dropdown-arrow');

    if (mobileDropdownTrigger && mobileDropdownContent) {
        mobileDropdownTrigger.addEventListener('click', () => {
            mobileDropdownContent.classList.toggle('hidden');
            mobileDropdownArrow.style.transform = mobileDropdownContent.classList.contains('hidden') ?
                'rotate(0deg)' :
                'rotate(180deg)';
        });
    }


    document.addEventListener('click', (e) => {
        if (!mobileMenu || !mobileMenuBtn) return;
        if (!mobileMenu.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
            mobileMenu.classList.remove('active');
            mobileMenuBtn.setAttribute('aria-expanded', 'false');
        }
    });

    function updateNavbarLayout() {
        if (!headerBar || !logoBox || !navPrimary || !authBox || !mobileMenuBtn) return;
        const available = headerBar.clientWidth - 32;
        const required = logoBox.scrollWidth + navPrimary.scrollWidth + authBox.scrollWidth;
        const forceMobile = window.innerWidth <= 1024;
        if (required > available || forceMobile) {
            navPrimary.classList.add('hidden');
            mobileMenuBtn.classList.remove('hidden');
            if (loginLink) loginLink.classList.add('hidden');
            if (registerLink) registerLink.classList.add('hidden');
        } else {
            navPrimary.classList.remove('hidden');
            mobileMenuBtn.classList.add('hidden');
            mobileMenu.classList.remove('active');
            if (loginLink) loginLink.classList.remove('hidden');
            if (registerLink) registerLink.classList.remove('hidden');
        }
    }

    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(updateNavbarLayout, 100);
    });
    updateNavbarLayout();
}

// Start when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    initializeSlider();
    // Menú móvil controlado por clase .active (sin inline display)
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    if (prevBtn && nextBtn) {
        prevBtn.addEventListener('click', () => {
            if (!isAnimating) prevSlide();
        });
        nextBtn.addEventListener('click', () => {
            if (!isAnimating) nextSlide();
        });
    }
    const nf = document.getElementById('newsletter-form');
    if (nf) {
        nf.addEventListener('submit', e => {
            e.preventDefault();
            document.getElementById('newsletter-toast').classList.remove('hidden');
        });
    }
    const cf = document.getElementById('contact-form');
    if (cf) {
        cf.addEventListener('submit', e => {
            e.preventDefault();
            document.getElementById('contact-toast').classList.remove('hidden');
        });
        const phoneInput = document.getElementById('contact-phone');
        const countrySelect = document.getElementById('countrySelect');
        const ISO_BY_DIAL = {
            '52': 'mx',
            '1': 'us',
            '34': 'es',
            '44': 'gb',
            '57': 'co',
            '55': 'br',
            '54': 'ar',
            '51': 'pe',
            '56': 'cl',
            '33': 'fr'
        };

        function updatePhonePlaceholder() {
            if (!phoneInput || !countrySelect) return;
            phoneInput.placeholder = `+${countrySelect.value} Número de teléfono`;
        }

        function updateCountryFlag() {
            if (!countrySelect) return;
            const iso = ISO_BY_DIAL[countrySelect.value] || 'mx';
            countrySelect.style.backgroundImage = `url('https://flagcdn.com/24x18/${iso}.png')`;
            countrySelect.style.backgroundRepeat = 'no-repeat';
            countrySelect.style.backgroundPosition = '12px 50%';
            countrySelect.style.backgroundSize = '24px 18px';
        }
        countrySelect && countrySelect.addEventListener('change', () => {
            updatePhonePlaceholder();
            updateCountryFlag();
        });
        updatePhonePlaceholder();
        updateCountryFlag();
    }
    
    const snapSections = Array.from(document.querySelectorAll('#mainContainer, #nosotros, #servicios, #blog, #contacto, #footer'));
    let sectionAnimating = false;
    let activeSectionIndex = 0;
    if (snapSections.length) {
        const observer = new IntersectionObserver((entries) => {
            let maxRatio = 0;
            let idx = activeSectionIndex;
            entries.forEach((entry) => {
                if (entry.isIntersecting && entry.intersectionRatio > maxRatio) {
                    maxRatio = entry.intersectionRatio;
                    idx = snapSections.indexOf(entry.target);
                }
            });
            if (idx !== activeSectionIndex) {
                activeSectionIndex = idx;
                toggleBackBtn();
                const anims = Array.from(document.querySelectorAll('.section-anim'));
                anims.forEach(el => el.classList.remove('visible'));
                const active = snapSections[activeSectionIndex].querySelector('.section-anim');
                if (active) active.classList.add('visible');
            }
        }, { threshold: [0.5, 0.6, 0.8, 1] });
        snapSections.forEach((el) => observer.observe(el));
    }

    function currentSectionIndex() {
        const y = window.scrollY;
        let idx = 0;
        let min = Infinity;
        snapSections.forEach((el, i) => {
            const top = el.getBoundingClientRect().top + window.scrollY;
            const d = Math.abs(top - y);
            if (d < min) {
                min = d;
                idx = i;
            }
        });
        return idx;
    }

    function snapTo(index) {
        if (!snapSections[index]) return;
        sectionAnimating = true;
        snapSections[index].scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
        setTimeout(() => {
            sectionAnimating = false;
        }, 700);
    }
    window.addEventListener('wheel', (e) => {
        if (sectionAnimating) return;
        if (Math.abs(e.deltaY) < 30) return;
        const idx = currentSectionIndex();
        const nextIdx = e.deltaY > 0 ? Math.min(idx + 1, snapSections.length - 1) : Math.max(idx - 1, 0);
        if (nextIdx !== idx) {
            e.preventDefault();
            snapTo(nextIdx);
        }
    }, {
        passive: false
    });

    document.addEventListener('keydown', (e) => {
        if (sectionAnimating) return;
        const idx = currentSectionIndex();
        if (e.key === 'ArrowDown' || e.key === 'PageDown') {
            e.preventDefault();
            snapTo(Math.min(idx + 1, snapSections.length - 1));
        }
        if (e.key === 'ArrowUp' || e.key === 'PageUp') {
            e.preventDefault();
            snapTo(Math.max(idx - 1, 0));
        }
    });

    const backBtn = document.getElementById('backToTopBtn');
    function toggleBackBtn() {
        if (!backBtn) return;
        backBtn.classList.toggle('visible', activeSectionIndex > 0);
    }
    toggleBackBtn();
    window.addEventListener('scroll', toggleBackBtn);
    document.addEventListener('wheel', toggleBackBtn, { passive: true });
    document.addEventListener('keydown', toggleBackBtn);
    if (backBtn) {
        backBtn.addEventListener('click', () => {
            if (typeof snapTo === 'function') {
                snapTo(0);
            } else {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        });
    }
    // Inicial: mostrar sección activa
    const initActive = snapSections[activeSectionIndex]?.querySelector('.section-anim');
    initActive && initActive.classList.add('visible');
});
