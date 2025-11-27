 

<header class="e2m-navbar">
    <div class="section-container">
        <div class="liquidGlass-wrapper navbar relative rounded-xl">
            <div class="navbar-overlay"></div>
            <div class="liquidGlass-effect"></div>
            <div class="liquidGlass-tint"></div>
            <div class="liquidGlass-shine"></div>
            <div class="liquidGlass-text py-2">
                <div class="flex items-center justify-between relative z-10 py-2">
                    <div class="flex items-center space-x-3" id="logoBox">
                        <img src="{{ asset('images/e2m-mark.png') }}" alt="E2M Logo" class="relative z-10 h-11 w-auto">
                    </div>
                    <nav class="flex items-center space-x-8" id="navPrimary">
                        <a href="#mainContainer" class="nav-link text-sm font-medium tracking-wider transition-all duration-300 ease-out opacity-90 text-white no-underline py-2 relative hover:opacity-100 hover:text-orange-primary hover:-translate-y-px">Inicio</a>
                        <a href="#nosotros" class="nav-link text-sm font-medium tracking-wider transition-all duration-300 ease-out opacity-90 text-white no-underline py-2 relative hover:opacity-100 hover:text-orange-primary hover:-translate-y-px">Nosotros</a>
                        <div class="nav-dropdown">
                            <a href="javascript:void(0)" class="nav-link nav-dropdown-trigger text-sm font-medium tracking-wider transition-all duration-300 ease-out opacity-90 text-white no-underline py-2 relative hover:opacity-100 hover:text-orange-primary hover:-translate-y-px" aria-expanded="false">Servicios <i class="fa-solid fa-angle-down nav-arrow"></i></a>
                            <div class="nav-dropdown-menu">
                                <a href="#servicios-uc">Usuarios Calificados</a>
                                <a href="#servicios-ucgp">Usuarios Calificados con Generación Propia</a>
                                <a href="#servicios-ce">Centrales Eléctricas</a>
                            </div>
                        </div>
                        <a href="{{ route('esg') }}" class="nav-link text-sm font-medium tracking-wider transition-all duration-300 ease-out opacity-90 text-white no-underline py-2 relative hover:opacity-100 hover:text-orange-primary hover:-translate-y-px">ESG</a>
                        <a href="#blog" class="nav-link text-sm font-medium tracking-wider transition-all duration-300 ease-out opacity-90 text-white no-underline py-2 relative hover:opacity-100 hover:text-orange-primary hover:-translate-y-px">Blog</a>
                        <a href="#contacto" class="nav-link text-sm font-medium tracking-wider transition-all duration-300 ease-out opacity-90 text-white no-underline py-2 relative hover:opacity-100 hover:text-orange-primary hover:-translate-y-px">Contacto</a>
                    </nav>
                    <div class="flex items-center space-x-4" id="authBox">
                        <a href="https://portal.e2m.mx/login" class="login-btn inline-flex relative z-10 py-3 px-6 text-sm tracking-wider no-underline">Login</a>
                        <a href="https://portal.e2m.mx/registro" class="register-btn inline-flex relative z-10 py-3 px-6 text-sm tracking-wider no-underline">Registro</a>
                        <button id="hamburgerBtn" class="mobile-menu-btn relative z-10 hidden text-white" aria-expanded="false" aria-controls="mobileMenu">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div id="mobileMenu" class="mobile-menu lg:hidden mt-4 pb-4 liquidGlass-wrapper w-full rounded-xl">
            <div class="liquidGlass-effect"></div>
            <div class="liquidGlass-tint"></div>
            <div class="liquidGlass-shine"></div>
            <div class="liquidGlass-text py-3 text-white">
                <div class="space-y-2">
                    <a href="#mainContainer" class="mobile-nav-link block px-4 py-2">Inicio</a>
                    <div class="mobile-dropdown">
                        <button class="mobile-dropdown-trigger w-full text-left px-4 py-2 flex items-center justify-between">
                            <span>Servicios</span>
                            <svg class="w-4 h-4 mobile-dropdown-arrow transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="mobile-dropdown-content hidden pl-4 space-y-1">
                            <a href="#servicios-uc" class="mobile-nav-link block px-4 py-2 text-sm">Usuarios Calificados</a>
                            <a href="#servicios-ucgp" class="mobile-nav-link block px-4 py-2 text-sm">Usuarios Calificados con Generación Propia</a>
                            <a href="#servicios-ce" class="mobile-nav-link block px-4 py-2 text-sm">Centrales Eléctricas</a>
                        </div>
                    </div>
                    <a href="#esg" class="mobile-nav-link block px-4 py-2">ESG</a>
                    <a href="#nosotros" class="mobile-nav-link block px-4 py-2">Nosotros</a>
                    <a href="#blog" class="mobile-nav-link block px-4 py-2">Blog</a>
                    <a href="#contacto" class="mobile-nav-link block px-4 py-2">Contacto</a>
                    <div class="border-t border-white/20 pt-2 mt-2 px-4 flex items-center gap-3">
                        <a href="https://portal.e2m.mx/login" class="mobile-auth-btn">Login</a>
                        <a href="#contacto" class="mobile-auth-btn mobile-auth-primary">Registro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@push('scripts')
<script>
    const mobileMenuBtn = document.getElementById('hamburgerBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('active');
            const expanded = mobileMenu.classList.contains('active');
            mobileMenuBtn.setAttribute('aria-expanded', expanded ? 'true' : 'false');
        });
        document.addEventListener('click', (e) => {
            if (!mobileMenu.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                mobileMenu.classList.remove('active');
                mobileMenuBtn.setAttribute('aria-expanded', 'false');
            }
        });
        const headerBar = document.querySelector('header');
        const logoBox = document.getElementById('logoBox');
        const navPrimary = document.getElementById('navPrimary');
        const authBox = document.getElementById('authBox');
        const updateMobileMenuState = () => {
            if (!headerBar || !logoBox || !navPrimary || !authBox || !mobileMenuBtn) return;
            const headerWidth = headerBar.clientWidth;
            const neededWidth = logoBox.clientWidth + navPrimary.clientWidth + authBox.clientWidth + 10;
            const forceMobile = window.innerWidth <= 1024;
            if (neededWidth > headerWidth || forceMobile) {
                mobileMenuBtn.classList.remove('hidden');
            } else {
                mobileMenuBtn.classList.add('hidden');
                mobileMenu.classList.remove('active');
            }
        };
        window.addEventListener('resize', updateMobileMenuState);
        updateMobileMenuState();
    }

    const dropdown = document.querySelector('.nav-dropdown');
    const dropdownTrigger = document.querySelector('.nav-dropdown-trigger');
    const originalMenu = dropdown ? dropdown.querySelector('.nav-dropdown-menu') : null;
    let overlayMenu = null;
    let hoverCloseTimer = null;

    function openOverlay() {
        if (!dropdownTrigger || !originalMenu) return;
        if (window.innerWidth <= 1024) return; // no overlay en móvil
        if (!overlayMenu) {
            overlayMenu = originalMenu.cloneNode(true);
            overlayMenu.classList.add('global-dropdown-menu');
            overlayMenu.id = 'globalDropdownMenu';
            document.body.appendChild(overlayMenu);
            overlayMenu.addEventListener('mouseenter', () => {
                if (hoverCloseTimer) {
                    clearTimeout(hoverCloseTimer);
                    hoverCloseTimer = null;
                }
            });
            overlayMenu.addEventListener('mouseleave', () => {
                hoverCloseTimer = setTimeout(closeOverlay, 150);
            });
        } else {
            overlayMenu.innerHTML = originalMenu.innerHTML;
            overlayMenu.classList.add('global-dropdown-menu');
        }
        const rect = dropdownTrigger.getBoundingClientRect();
        const left = Math.max(8, rect.left);
        const top = rect.bottom + 8;
        overlayMenu.style.left = `${left}px`;
        overlayMenu.style.top = `${top}px`;
        overlayMenu.style.display = 'block';
        dropdownTrigger.setAttribute('aria-expanded', 'true');
    }

    function closeOverlay() {
        if (overlayMenu) overlayMenu.style.display = 'none';
        dropdownTrigger && dropdownTrigger.setAttribute('aria-expanded', 'false');
    }

    if (dropdown && dropdownTrigger && originalMenu) {
        // Hover abre overlay en desktop
        dropdownTrigger.addEventListener('mouseenter', () => {
            if (hoverCloseTimer) {
                clearTimeout(hoverCloseTimer);
                hoverCloseTimer = null;
            }
            openOverlay();
        });
        dropdownTrigger.addEventListener('mouseleave', () => {
            hoverCloseTimer = setTimeout(closeOverlay, 150);
        });
        // Click alterna overlay en desktop, y cierra si click fuera
        dropdownTrigger.addEventListener('click', (e) => {
            e.preventDefault();
            if (window.innerWidth <= 1024) return; // en móvil se usa el menú interno
            if (overlayMenu && overlayMenu.style.display === 'block') {
                closeOverlay();
            } else {
                openOverlay();
            }
        });
        document.addEventListener('click', (e) => {
            if (overlayMenu && overlayMenu.style.display === 'block') {
                const within = overlayMenu.contains(e.target) || dropdownTrigger.contains(e.target);
                if (!within) closeOverlay();
            }
        });
        window.addEventListener('resize', () => {
            if (overlayMenu && overlayMenu.style.display === 'block') openOverlay();
        });
    }

    const mobileDropdownTrigger = document.querySelector('.mobile-dropdown-trigger');
    const mobileDropdownContent = document.querySelector('.mobile-dropdown-content');
    const mobileDropdownArrow = document.querySelector('.mobile-dropdown-arrow');
    if (mobileDropdownTrigger && mobileDropdownContent) {
        mobileDropdownTrigger.addEventListener('click', () => {
            mobileDropdownContent.classList.toggle('hidden');
            if (mobileDropdownArrow) {
                mobileDropdownArrow.style.transform = mobileDropdownContent.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
            }
        });
    }
</script>
@endpush
