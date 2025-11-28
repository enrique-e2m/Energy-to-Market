<footer class="footer-bg py-16 px-6 md:px-12 text-white relative overflow-hidden z-10">
    <div class="absolute inset-0 w-full h-full z-0 bg-black/30"></div>
    <div class="footer-modern max-w-7xl mx-auto relative z-10">
        <div class="footer-top grid grid-cols-1 md:grid-cols-3 gap-10">
            <div class="footer-brand">
                <div class="footer-brand-row">
                    <img src="{{ asset('images/e2m-blanco-logo.png') }}" alt="E2M" class="footer-brand-logo">
                </div>

                <div class="social-links">
                    <a href="#" aria-label="LinkedIn"><i class="fa-brands fa-linkedin"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer-links grid grid-cols-2 gap-8">
                <div>
                    <div class="footer-section-title">Servicios</div>
                    <ul class="footer-list">
                        <li><a class="footer-link" href="#servicios">Usuarios Calificados</a></li>
                        <li><a class="footer-link" href="#servicios">Generación propia</a></li>
                        <li><a class="footer-link" href="#servicios">Centrales Eléctricas</a></li>
                        <li><a class="footer-link" href="#esg">Sostenibilidad</a></li>
                    </ul>
                </div>
                <div>
                    <div class="footer-section-title">Sitio</div>
                    <ul class="footer-list">
                        <li><a class="footer-link" href="#blog">Noticias</a></li>
                        <li><a class="footer-link" href="#blog">Blog</a></li>
                        <li><a class="footer-link" href="#contacto">Contacto</a></li>
                        <li><a class="footer-link" href="#mainContainer">Inicio</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-contact">
                <div class="footer-section-title">Contacto</div>
                <ul class="footer-list">
                    <li class="footer-contact-item"><i class="fa-solid fa-phone"></i> +52 (55) 91317151</li>
                    <li class="footer-contact-item"><i class="fa-solid fa-envelope"></i> info@e2m.mx</li>
                    <li class="footer-contact-item"><i class="fa-solid fa-location-dot"></i> Guillermo González Camarena 1600, Oficina 4-B, Santa Fe, Álvaro Obregón, CP 01210, Ciudad de México</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-copy">© {{ date('Y') }} E2M Energy to Market</div>
            <div class="footer-mini-links">
                <a href="#" class="footer-link">Aviso de privacidad</a>
                <a href="#" class="footer-link">Términos</a>
            </div>
        </div>
    </div>
</footer>