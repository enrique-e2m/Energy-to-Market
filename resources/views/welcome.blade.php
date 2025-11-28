<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portal de Clientes y Proveedores E2M - Sector Eléctrico">
    <meta name="keywords" content="E2M, portal, clientes, proveedores, sector eléctrico, usuarios calificados, centrales eléctricas">
    <title>E2M | Energy to Market</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="{{ asset('js/carousel.js') }}" defer></script>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @livewireStyles
    @stack('styles')

</head>

<body class="m-0 p-0 bg-gradient-to-b from-[#eef2ff] to-[#f8fafc] text-slate-900 font-inter box-border overflow-x-hidden">
    <svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" style="position:absolute">
        <filter id="glass-distortion">
            <feTurbulence type="fractalNoise" baseFrequency="0.02" numOctaves="2" seed="3" result="noise" />
            <feGaussianBlur in="noise" stdDeviation="4" result="blur" />
            <feDisplacementMap in="SourceGraphic" in2="blur" scale="6" xChannelSelector="R" yChannelSelector="G" />
        </filter>
    </svg>


    <!-- Main Container -->
    <div id="mainContainer" class="main-container min-h-screen flex items-center relative">
        <livewire:site-navbar />
        <div class="hero-overlay"></div>
        <div class="relative z-2 w-full h-screen flex items-center
                    lg:flex-row lg:gap-8
                    md:flex-col md:h-auto md:min-h-[calc(100vh-120px)] md:p-8 md:pt-32 md:gap-8
                    sm:flex-col sm:h-auto sm:min-h-[calc(100vh-120px)] sm:p-8 sm:pt-32 sm:gap-6
                    max-sm:flex-col max-sm:h-auto max-sm:min-h-[calc(100vh-100px)] max-sm:p-4 max-sm:pt-24 max-sm:gap-4">
            <!-- Left Content -->
            <div class="flex-1 px-8 lg:px-16 text-white
                       lg:w-1/2
                       md:w-full md:mb-0 md:z-10 md:px-4
                       sm:w-full sm:mb-0 sm:z-10 sm:px-4
                       max-sm:w-full max-sm:mb-0 max-sm:z-10 max-sm:px-4">
                <div class="w-full flex flex-col items-center justify-center text-center gap-4">
                    <div class="hero-brand">
                        <img id="heroLogo" src="{{ asset('images/favicon.png') }}" alt="E2M Logo" class="hero-logo">
                        <div id="heroDivider" class="hero-divider"></div>
                    </div>
                    <p id="heroTagline" class="hero-tagline">Tu mano derecha en el Mercado Eléctrico Mexicano</p>
                    <div id="heroActions" class="hero-actions">
                        <a href="https://portal.e2m.mx/login" class="hero-btn hero-btn-primary"><span class="btn-icon icon-sun"><i class="fa-solid fa-sun"></i></span><span>Ingresar</span></a>
                        <a href="#contacto" class="hero-btn hero-btn-secondary"><span class="btn-icon icon-envelope"><i class="fa-solid fa-envelope"></i></span><span>Contacto</span></a>
                    </div>
                </div>
            </div>


        </div>

        <div class="bottom-line-nav">
            <div class="line"></div>
            <div class="center-controls">
                <button class="nav-btn prev-btn" aria-label="Anterior">‹</button>
                <button class="nav-btn next-btn" aria-label="Siguiente">›</button>
            </div>
        </div>

    </div>

    <button id="backToTopBtn" class="back-to-top" aria-label="Volver arriba">
        <i class="fa-solid fa-arrow-up"></i>
    </button>


    <section id="nosotros" class="py-20 bg-transparent text-slate-900 relative overflow-hidden">
        <video class="absolute inset-0 w-full h-full object-cover z-0 pointer-events-none" src="{{ asset('images/blog.mp4') }}" autoplay muted loop playsinline></video>
        <div class="section-container grid md:grid-cols-2 gap-10 items-stretch relative z-10">
            <div class="liquidGlass-wrapper h-full">
                <div class="liquidGlass-effect"></div>
                <div class="liquidGlass-tint"></div>
                <div class="liquidGlass-shine"></div>
                <div class="liquidGlass-text p-8 h-full flex flex-col">
                    <h2 class="text-3xl md:text-4xl font-bold tracking-tight">E2M Energy to Market</h2>
                    <div class="section-accent"></div>
                    <p class="mt-6 text-slate-700">Somos una empresa proveedora de servicios y consultoría en el nuevo Mercado Eléctrico Mayorista (MEM).</p>
                    <p class="mt-4 text-slate-700">Representamos los intereses de nuestros clientes para ayudarlos a obtener los mayores beneficios económicos, tanto para clientes consumidores como para centrales eléctricas.</p>
                    <a href="#servicios" class="mt-8 btn-orange">Ver más <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="liquidGlass-wrapper h-full">
                <div class="liquidGlass-effect"></div>
                <div class="liquidGlass-tint"></div>
                <div class="liquidGlass-shine"></div>
                <div class="liquidGlass-text p-8 h-full flex flex-col">
                    <div class="grid grid-cols-2 max-sm:grid-cols-1 gap-6" style="grid-auto-rows: 1fr">
                        <div class="metric-card">
                            <img class="metric-image" src="{{ asset('images/e2m_back_profile.png') }}" alt="Clientes">
                            <div class="metric-label">Clientes</div>
                            <div class="metric-value">UC & Generación</div>
                        </div>
                        <div class="metric-card">
                            <img class="metric-image" src="{{ asset('images/e2m_back_profile.png') }}" alt="Operación">
                            <div class="metric-label">Operación</div>
                            <div class="metric-value">MEM</div>
                        </div>
                        <div class="metric-card">
                            <img class="metric-image" src="{{ asset('images/e2m_back_profile.png') }}" alt="Sostenibilidad">
                            <div class="metric-label">Sostenibilidad</div>
                            <div class="metric-value">Energías limpias</div>
                        </div>
                        <div class="metric-card">
                            <img class="metric-image" src="{{ asset('images/e2m_back_profile.png') }}" alt="Resultados">
                            <div class="metric-label">Resultados</div>
                            <div class="metric-value">Optimización</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="servicios" class="py-20 bg-transparent text-slate-900 relative overflow-hidden">
        <video class="absolute inset-0 w-full h-full object-cover z-0 pointer-events-none" src="{{ asset('images/blog.mp4') }}" autoplay muted loop playsinline></video>
        <div class="section-container relative z-10">
            <div class="liquidGlass-wrapper p-0 mt-10 services-block">
                <div class="liquidGlass-effect"></div>
                <div class="liquidGlass-tint"></div>
                <div class="liquidGlass-shine"></div>
                <div class="liquidGlass-text p-8 md:p-10 xl:p-12">
                    <h2 class="text-3xl md:text-4xl font-bold tracking-tight">Nuestros Servicios</h2>
                    <div class="grid services-grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10 xl:gap-12 mt-8">
                        <div class="liquidGlass-wrapper p-0 service-card" id="servicios-uc">
                            <div class="liquidGlass-effect"></div>
                            <div class="liquidGlass-tint"></div>
                            <div class="liquidGlass-shine"></div>
                            <div class="liquidGlass-text p-0">
                                <div class="service-visual" style="background-image:url('{{ asset('images/e2m_back_profile.png') }}')">
                                    <div class="service-overlay">
                                        <div class="service-header">
                                            <div class="service-icon"><i class="fa-solid fa-user-tie"></i></div>
                                            <div class="service-title">Usuarios Calificados</div>
                                        </div>
                                        <div class="service-more">
                                            <ul class="space-y-2 text-sm">
                                                <li class="flex items-center gap-2"><i class="fa-solid fa-check"></i>Migra tus cargas al MEM.</li>
                                                <li class="flex items-center gap-2"><i class="fa-solid fa-check"></i>Cumple con las normativas.</li>
                                                <li class="flex items-center gap-2"><i class="fa-solid fa-check"></i>Logra ahorros de hasta un 35%.</li>
                                            </ul>
                                        </div>
                                        <a href="https://e2m.mx/usuarios-calificados/" target="_blank" class="btn-glass service-cta">Ver más <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="liquidGlass-wrapper p-0 service-card" id="servicios-ce">
                            <div class="liquidGlass-effect"></div>
                            <div class="liquidGlass-tint"></div>
                            <div class="liquidGlass-shine"></div>
                            <div class="liquidGlass-text p-0">
                                <div class="service-visual" style="background-image:url('{{ asset('images/e2m_back_profile.png') }}')">
                                    <div class="service-overlay">
                                        <div class="service-header">
                                            <div class="service-icon"><i class="fa-solid fa-bolt"></i></div>
                                            <div class="service-title">Centrales Eléctricas</div>
                                        </div>
                                        <div class="service-more">
                                            <ul class="space-y-2 text-sm">
                                                <li class="flex items-center gap-2"><i class="fa-solid fa-check"></i>Maximiza tus ingresos.</li>
                                                <li class="flex items-center gap-2"><i class="fa-solid fa-check"></i>Identifica el potencial de tu planta.</li>
                                                <li class="flex items-center gap-2"><i class="fa-solid fa-check"></i>Optimiza proyectos financiables.</li>
                                            </ul>
                                        </div>
                                        <a href="https://e2m.mx/centrales-electricas/" target="_blank" class="btn-glass service-cta">Ver más <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="liquidGlass-wrapper p-0 service-card" id="esg">
                            <div class="liquidGlass-effect"></div>
                            <div class="liquidGlass-tint"></div>
                            <div class="liquidGlass-shine"></div>
                            <div class="liquidGlass-text p-0">
                                <div class="service-visual" style="background-image:url('{{ asset('images/e2m_back_profile.png') }}')">
                                    <div class="service-overlay">
                                        <div class="service-header">
                                            <div class="service-icon"><i class="fa-solid fa-solar-panel"></i></div>
                                            <div class="service-title">Sostenibilidad Empresarial</div>
                                        </div>
                                        <div class="service-more">
                                            <ul class="space-y-2 text-sm">
                                                <li class="flex items-center gap-2"><i class="fa-solid fa-check"></i>Cumple con objetivos de sostenibilidad.</li>
                                                <li class="flex items-center gap-2"><i class="fa-solid fa-check"></i>Empieza a consumir energías renovables.</li>
                                                <li class="flex items-center gap-2"><i class="fa-solid fa-check"></i>Adquiere certificados de energía limpia.</li>
                                            </ul>
                                        </div>
                                        <a href="https://e2m.mx/sostenibilidad-empresarial/" target="_blank" class="btn-glass service-cta">Ver más <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="liquidGlass-wrapper p-0 service-card" id="servicios-ucgp">
                            <div class="liquidGlass-effect"></div>
                            <div class="liquidGlass-tint"></div>
                            <div class="liquidGlass-shine"></div>
                            <div class="liquidGlass-text p-0">
                                <div class="service-visual" style="background-image:url('{{ asset('images/e2m_back_profile.png') }}')">
                                    <div class="service-overlay">
                                        <div class="service-header">
                                            <div class="service-icon"><i class="fa-solid fa-plug-circle-bolt"></i></div>
                                            <div class="service-title">Usuarios Calificados con Generación Propia</div>
                                        </div>
                                        <div class="service-more">
                                            <ul class="space-y-2 text-sm">
                                                <li class="flex items-center gap-2"><i class="fa-solid fa-check"></i>Migra tus cargas al MEM.</li>
                                                <li class="flex items-center gap-2"><i class="fa-solid fa-check"></i>Vende excedentes y genera beneficios.</li>
                                                <li class="flex items-center gap-2"><i class="fa-solid fa-check"></i>Compra faltantes al mejor precio.</li>
                                            </ul>
                                        </div>
                                        <a href="https://e2m.mx/usuarios-calificados-con-generacion-propia/" target="_blank" class="btn-glass service-cta">Ver más <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="blog" class="py-20 bg-slate-50 text-slate-900 relative overflow-hidden">
        <video class="absolute inset-0 w-full h-full object-cover z-0 pointer-events-none" src="{{ asset('images/blog.mp4') }}" autoplay muted loop playsinline></video>
        <div class="section-container relative z-10">
            <div class="liquidGlass-wrapper p-0 blog-block">
                <div class="liquidGlass-effect"></div>
                <div class="liquidGlass-tint"></div>
                <div class="liquidGlass-shine"></div>
                <div class="liquidGlass-text p-8 md:p-10 xl:p-12">
                    <h2 class="text-3xl md:text-4xl font-bold tracking-tight">Blog y Noticias</h2>
                    <div class="grid blog-grid grid-cols-1 md:grid-cols-2 gap-10 xl:gap-12 mt-8">
                        <div class="liquidGlass-wrapper p-0">
                            <div class="liquidGlass-effect"></div>
                            <div class="liquidGlass-tint"></div>
                            <div class="liquidGlass-shine"></div>
                            <div class="liquidGlass-text p-6">
                                <div class="text-sm font-semibold text-slate-600">Noticias</div>
                                <h3 class="mt-2 text-xl font-bold">Conectados para Crecer: La Reforma Energética y el Futuro del Mercado Eléctrico Mexicano</h3>
                                <p class="mt-3 text-slate-700">México redefine su futuro energético con inversión histórica, transición renovable y nearshoring, buscando crecimiento sostenible y soberanía eléctrica. Momento clave.</p>
                                <a href="#" class="mt-4 inline-flex items-center gap-2 text-slate-900">Leer post <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="liquidGlass-wrapper p-0">
                            <div class="liquidGlass-effect"></div>
                            <div class="liquidGlass-tint"></div>
                            <div class="liquidGlass-shine"></div>
                            <div class="liquidGlass-text p-6">
                                <div class="text-sm font-semibold text-slate-600">Noticias</div>
                                <h3 class="mt-2 text-xl font-bold">La Transición Energética, Lenta, pero Segura</h3>
                                <p class="mt-3 text-slate-700">El informe energético anual de JPMorgan ofrece una visión sobre el ritmo de la transición energética y el camino hacia la electrificación. Analiza los desafíos geopolíticos de una revolución que avanza.</p>
                                <a href="#" class="mt-4 inline-flex items-center gap-2 text-slate-900">Leer post <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <a href="#blog" class="mt-8 btn-orange inline-flex items-center gap-2">Ver más <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section id="contacto" class="py-20 bg-transparent text-slate-900 relative overflow-hidden">
        <video class="absolute inset-0 w-full h-full object-cover z-0 pointer-events-none" src="{{ asset('images/blog.mp4') }}" autoplay muted loop playsinline></video>
        <div class="contact-wrapper relative z-10">
            <div class="liquidGlass-wrapper p-0 contact-block">
                <div class="liquidGlass-effect"></div>
                <div class="liquidGlass-tint"></div>
                <div class="liquidGlass-shine"></div>
                <div class="liquidGlass-text p-4 md:p-5 xl:p-6">
                    <div class="contact-grid">
                        <div class="liquidGlass-wrapper p-0">
                            <div class="liquidGlass-effect"></div>
                            <div class="liquidGlass-tint"></div>
                            <div class="liquidGlass-shine"></div>
                            <div class="liquidGlass-text p-6">
                                <div class="section-header">
                                    <div class="section-title">Déjanos tu consulta</div>
                                    <div class="section-subtitlUe">Recibe asesoramiento personalizado</div>
                                    <div class="section-accent"></div>
                                </div>
                                <form id="contact-form" class="space-y-3">
                                    <div class="field-row">
                                        <div class="form-group input-with-icon">
                                            <div class="label-row">
                                                <label for="contact-name">Nombre completo*</label>
                                                <span class="help-icon"><i class="fa-solid fa-circle-question"></i><span class="help-tooltip">Tal como aparece en tus documentos</span></span>
                                            </div>
                                            <div class="input-wrapper">
                                                <i class="fa-solid fa-user input-icon"></i>
                                                <input id="contact-name" type="text" name="full_name" autocomplete="name" required placeholder="Ej.: Ana López" class="input">
                                            </div>
                                        </div>
                                        <div class="form-group input-with-icon">
                                            <div class="label-row">
                                                <label for="contact-email">Correo electrónico*</label>
                                                <span class="help-icon"><i class="fa-solid fa-circle-question"></i><span class="help-tooltip">Usaremos este correo para responderte</span></span>
                                            </div>
                                            <div class="input-wrapper">
                                                <i class="fa-solid fa-envelope input-icon"></i>
                                                <input id="contact-email" type="email" name="email" autocomplete="email" required placeholder="nombre@empresa.com" class="input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field-row">
                                        <div class="form-group col-span-2">
                                            <div class="label-row">
                                                <label for="contact-phone">Teléfono</label>
                                                <span class="help-icon"><i class="fa-solid fa-circle-question"></i><span class="help-tooltip">Opcional, nos ayuda a contactarte más rápido</span></span>
                                            </div>
                                            <div class="input-row mt-1">
                                                <div class="phone-row grid grid-cols-2 gap-4">
                                                    <select id="countrySelect" class="input country-select" aria-label="País">
                                                        <option value="52">+52</option>
                                                        <option value="1"> +1</option>
                                                        <option value="34">+34</option>
                                                        <option value="44">+44</option>
                                                        <option value="57">+57</option>
                                                        <option value="55">+55</option>
                                                        <option value="54">+54</option>
                                                        <option value="51">+51</option>
                                                        <option value="56">+56</option>
                                                        <option value="33">+33</option>
                                                    </select>
                                                    <div class="label-row">
                                                        <div class="input-wrapper">
                                                            <i class="fa-solid fa-phone input-icon"></i>
                                                            <input id="contact-phone" type="tel" class="input" placeholder="" aria-label="Número de teléfono">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field-row">
                                        <div class="form-group input-with-icon">
                                            <div class="label-row">
                                                <label for="contact-reason">Motivo de contacto*</label>
                                                <span class="help-icon"><i class="fa-solid fa-circle-question"></i><span class="help-tooltip">Sé lo más específico posible</span></span>
                                            </div>
                                            <div class="input-wrapper">
                                                <i class="fa-solid fa-list-check input-icon"></i>
                                                <input id="contact-reason" type="text" name="reason" required placeholder="Ej: Asesoría, Cotización, Soporte, Integración, etc." class="input">
                                            </div>
                                        </div>
                                        <div class="form-group input-with-icon">
                                            <div class="label-row">
                                                <label for="contact-company">Empresa</label>
                                                <span class="help-icon"><i class="fa-solid fa-circle-question"></i><span class="help-tooltip">Si no aplica, puedes dejarlo vacío</span></span>
                                            </div>
                                            <div class="input-wrapper">
                                                <i class="fa-solid fa-building input-icon"></i>
                                                <input id="contact-company" type="text" name="company" autocomplete="organization" placeholder="Nombre de tu empresa" class="input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field-row">
                                        <div class="form-group col-span-2">
                                            <div class="label-row">
                                                <label for="contact-message">Cuéntanos tu consulta*</label>
                                                <span class="help-icon"><i class="fa-solid fa-circle-question"></i><span class="help-tooltip">Incluye contexto y objetivos</span></span>
                                            </div>
                                            <textarea id="contact-message" name="message" required placeholder="Describe brevemente lo que necesitas..." class="input" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <label class="flex items-center gap-2 text-sm"><input type="checkbox" required class="rounded"> Acepto el <a href="{{ route('privacidad') }}" target="_blank" class="underline">Aviso de Privacidad</a> y autorizo el tratamiento de mis datos personales.</label>
                                    <button type="submit" class="submit-btn">Enviar consulta <i class="fa-solid fa-paper-plane"></i></button>
                                    <div id="contact-toast" class="mt-3 hidden text-emerald-700">Tu consulta fue enviada. Gracias.</div>
                                </form>
                            </div>
                        </div>

                        <div class="liquidGlass-wrapper p-0">
                            <div class="liquidGlass-effect"></div>
                            <div class="liquidGlass-tint"></div>
                            <div class="liquidGlass-shine"></div>
                            <div class="liquidGlass-text p-6">
                                <div class="info-grid">
                                    <div class="liquidGlass-wrapper p-0 iframe-card">
                                        <div class="liquidGlass-effect"></div>
                                        <div class="liquidGlass-tint"></div>
                                        <div class="liquidGlass-shine"></div>
                                        <div class="liquidGlass-text p-0">
                                            <div class="map-card">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3764.0812135938386!2d-99.26766742418879!3d19.36563584281484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d201f3c8cf7a2d%3A0xcf4065dc442863b3!2sE2M%20Energy%20to%20Market!5e0!3m2!1ses-419!2smx!4v1764289091183!5m2!1ses-419!2smx" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="contact-row">
                                        <div class="liquidGlass-wrapper p-0 contact-info-card">
                                            <div class="liquidGlass-effect"></div>
                                            <div class="liquidGlass-tint"></div>
                                            <div class="liquidGlass-shine"></div>
                                            <div class="liquidGlass-text p-5">
                                                <div class="flex items-center gap-3">
                                                    <div class="soft-icon"><i class="fa-solid fa-phone"></i></div>
                                                    <div>
                                                        <div class="info-label">Teléfono</div>
                                                        <div class="info-value">+52 (55) 91317151</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="liquidGlass-wrapper p-0 contact-info-card">
                                            <div class="liquidGlass-effect"></div>
                                            <div class="liquidGlass-tint"></div>
                                            <div class="liquidGlass-shine"></div>
                                            <div class="liquidGlass-text p-5">
                                                <div class="flex items-center gap-3">
                                                    <div class="soft-icon"><i class="fa-solid fa-location-dot"></i></div>
                                                    <div>
                                                        <div class="info-label">Dirección</div>
                                                        <div class="info-value">Guillermo González Camarena 1600, Oficina 4-B, Santa Fe, Álvaro Obregón, CP 01210, Ciudad de México</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="liquidGlass-wrapper p-0 contact-info-card">
                                            <div class="liquidGlass-effect"></div>
                                            <div class="liquidGlass-tint"></div>
                                            <div class="liquidGlass-shine"></div>
                                            <div class="liquidGlass-text p-5">
                                                <div class="flex items-center gap-3">
                                                    <div class="soft-icon"><i class="fa-solid fa-envelope"></i></div>
                                                    <div>
                                                        <div class="info-label">Correo</div>
                                                        <div class="info-value">info@e2m.mx</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    </div>
    <section id="footer" class="snap bg-white relative overflow-hidden">
        <video class="absolute inset-0 w-full h-full object-cover z-0 pointer-events-none" src="{{ asset('images/blog.mp4') }}" autoplay muted loop playsinline></video>


        <div class="prefooter-center relative z-10">
            <div class="liquidGlass-wrapper p-0">
                <div class="liquidGlass-effect"></div>
                <div class="liquidGlass-tint"></div>
                <div class="liquidGlass-shine"></div>
                <div class="liquidGlass-text p-6">
                    <div class="section-header-lite">
                        <div class="title">Suscríbete al boletín</div>
                        <div class="subtitle">Recibe novedades y actualizaciones de E2M</div>
                        <div class="accent"></div>
                    </div>
                    <div class="newsletter">
                        <form id="newsletter-form" class="newsletter-form" novalidate>
                            <input id="newsletterEmail" class="newsletter-input" type="email" placeholder="Tu correo electrónico" required>
                            <button class="newsletter-button" type="submit"><i class="fa-solid fa-paper-plane"></i> Suscribirme</button>
                        </form>
                        <div id="newsletter-toast" class="newsletter-message hidden" aria-live="polite">¡Gracias! Te hemos inscrito al boletín.</div>
                    </div>
                </div>
            </div>
            
        </div>
        <livewire:site-footer />
    </section>

    @stack('scripts')
    @livewireScripts
</body>

</html>
