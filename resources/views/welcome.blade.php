<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sourire Clinic Casablanca — Aligneurs Invisibles 3D &amp; Facettes Céramiques No-Prep</title>
    
    <!-- Polices Inter & Satoshi -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

    @php
        $manifestPath = public_path('compiled/manifest.json');
        $manifest = file_exists($manifestPath) ? json_decode(file_get_contents($manifestPath), true) : [];
        $cssAsset = $manifest['resources/css/app.css']['file'] ?? 'assets/app-CiTFCH4S.css';
        $jsAsset = $manifest['resources/js/app.js']['file'] ?? 'assets/app-BfSEDPMo.js';
        $v = time();
    @endphp
    <link rel="stylesheet" href="/compiled/{{ $cssAsset }}?v={{ $v }}">
    <script type="module" src="/compiled/{{ $jsAsset }}?v={{ $v }}"></script>
</head>
<body class="bg-clinic-bg text-navy-700 antialiased selection:bg-teal-100 selection:text-teal-900 font-sans">

    <!-- BANDEAU TOP DÉMONSTRATION COMMERCIALE -->
    <div class="bg-navy-900 text-white text-xs py-2 px-4 border-b border-navy-800 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-2">
            <div class="flex items-center space-x-2">
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold bg-teal-500/20 text-teal-300 border border-teal-500/30">
                    <span class="w-1.5 h-1.5 rounded-full bg-teal-400 mr-1.5 animate-pulse"></span>
                    PROTOTYPE DÉMO D'ÉLITE — CASABLANCA
                </span>
                <span class="hidden sm:inline text-slate-400">|</span>
                <span class="hidden sm:inline text-slate-300">Spécialité : Aligneurs 3D &amp; Facettes No-Prep (Zéro Mutilation)</span>
            </div>
            <div class="flex items-center space-x-3 text-[11px]">
                <button id="open-demo-admin-btn" class="inline-flex items-center gap-1.5 bg-teal-600 hover:bg-teal-500 text-white px-3 py-1 rounded-lg transition-all font-medium shadow-sm hover:scale-105">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2 1.5 3 3.5 3h9c2 0 3.5-1 3.5-3V7M4 7c0-2 1.5-3 3.5-3h9c2 0 3.5 1 3.5 3M4 7h16M9 11h6M9 15h4"/></svg>
                    <span>Voir la base RDV (<span id="demo-appointments-count-badge">{{ $recentAppointmentsCount }}</span>)</span>
                </button>
            </div>
        </div>
    </div>

    <!-- NAVIGATION PRINCIPALE -->
    <header class="sticky top-8 z-40 bg-white/95 backdrop-blur-md border-b border-slate-200/80 transition-all shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Logo Sourire Clinic -->
                <a href="#accueil" class="flex items-center space-x-3 group">
                    <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-teal-600 to-teal-400 flex items-center justify-center text-white shadow-md shadow-teal-600/20 group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 2C8.5 2 6 4 6 7c0 2.5 1 4.5 2 7.5 1 3 1.5 5.5 4 5.5s3-2.5 4-5.5c1-3 2-5 2-7.5 0-3-2.5-5-6-5z"/>
                            <path d="M12 2v5c0 1.5-1.5 2.5-1.5 2.5"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-xl font-bold tracking-tight text-navy-800 font-display flex items-center gap-1.5">
                            Sourire Clinic
                            <span class="text-xs uppercase tracking-widest font-semibold px-2 py-0.5 rounded bg-teal-50 text-teal-700 border border-teal-100">Casablanca</span>
                        </div>
                        <p class="text-xs text-slate-500 font-normal">Aligneurs 3D &amp; Facettes Céramiques No-Prep</p>
                    </div>
                </a>

                <!-- Liens de navigation Desktop -->
                <nav class="hidden md:flex items-center space-x-7 text-sm font-medium text-slate-600">
                    <a href="#hero-3d" class="hover:text-teal-600 transition-colors">Simulateur 3D</a>
                    <a href="#avant-apres" class="hover:text-teal-600 transition-colors">Avant / Après</a>
                    <a href="#soins" class="hover:text-teal-600 transition-colors">Nos Soins Phares</a>
                    <a href="#cabinet" class="hover:text-teal-600 transition-colors">Le Cabinet</a>
                    <a href="#equipe" class="hover:text-teal-600 transition-colors">L'Équipe</a>
                    <a href="#faq" class="hover:text-teal-600 transition-colors">FAQ</a>
                </nav>

                <!-- Actions Header -->
                <div class="hidden lg:flex items-center space-x-4">
                    <a href="tel:+212522000000" class="flex items-center gap-2 text-xs font-semibold text-navy-700 hover:text-teal-600 transition-colors">
                        <div class="w-8 h-8 rounded-full bg-teal-50 text-teal-700 flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <span class="font-mono text-slate-600">+212 522 00 00 00</span>
                    </a>

                    <a href="#rdv-section" class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl font-semibold text-sm text-white bg-teal-600 hover:bg-teal-500 shadow-md shadow-teal-600/20 transition-all hover:scale-[1.02] active:scale-[0.98]">
                        Bilan 3D &amp; Devis
                        <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>

                <!-- Bouton Mobile Menu -->
                <div class="md:hidden flex items-center space-x-2">
                    <button id="mobile-menu-btn" class="p-2 rounded-lg text-slate-600 hover:text-teal-600 hover:bg-slate-100 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden border-t border-slate-200 bg-white px-4 pt-3 pb-6 space-y-3">
            <a href="#hero-3d" class="block py-2 text-base font-medium text-navy-800">Simulateur 3D Facettes &amp; Aligneurs</a>
            <a href="#avant-apres" class="block py-2 text-base font-medium text-navy-800">Comparatif Avant / Après</a>
            <a href="#soins" class="block py-2 text-base font-medium text-navy-800">Nos 5 Soins Spécialisés</a>
            <a href="#cabinet" class="block py-2 text-base font-medium text-navy-800">Le Cabinet &amp; Galerie</a>
            <a href="#equipe" class="block py-2 text-base font-medium text-navy-800">L'Équipe Médicale</a>
            <a href="#faq" class="block py-2 text-base font-medium text-navy-800">Questions Fréquentes</a>
            <a href="#rdv-section" class="block text-center mt-3 py-3 px-4 rounded-xl font-semibold text-white bg-teal-600 shadow">
                Prendre Rendez-vous en ligne
            </a>
        </div>
    </header>

    <!-- SECTION HERO 3D : L'EXPÉRIENCE DÉCISIVE FACETTES & ALIGNEURS -->
    <section id="hero-3d" class="relative pt-8 pb-16 lg:pt-14 lg:pb-24 overflow-hidden bg-gradient-to-b from-white via-slate-50/70 to-clinic-bg">
        
        <div class="absolute inset-0 bg-grid-medical pointer-events-none opacity-40"></div>
        <div class="absolute top-1/4 right-1/4 w-96 h-96 enamel-radial-glow pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- COLONNE GAUCHE : LE DISCOURS QUI CONVERTIT (L'ŒIL DU DOCTEUR) -->
                <div class="lg:col-span-6 space-y-6 text-center lg:text-left">
                    
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-teal-50 border border-teal-200 text-teal-800 text-xs font-semibold tracking-wide">
                        <span class="w-2 h-2 rounded-full bg-teal-500 animate-pulse"></span>
                        Cabinet d'Alignement &amp; Esthétique du Sourire · Casablanca
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-navy-800 font-display leading-[1.12]">
                        Sublimez votre sourire. <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-teal-500">Zéro meulage. Zéro douleur.</span>
                    </h1>

                    <p class="text-lg text-slate-600 font-normal leading-relaxed max-w-xl mx-auto lg:mx-0">
                        La peur de tailler vos dents vivantes ou de porter des bagues visibles appartient au passé. Grâce aux <strong>facettes céramiques pelliculaires No-Prep</strong> et aux <strong>aligneurs 3D 100% invisibles</strong>, visualisez votre futur sourire numérique avant le premier geste.
                    </p>

                    <!-- Les 3 Garanties Cliniques qui rassurent immédiatement le patient -->
                    <div class="space-y-2.5 pt-1 text-left max-w-lg mx-auto lg:mx-0">
                        <div class="flex items-center gap-3 text-xs font-semibold text-navy-800 bg-white p-2.5 rounded-xl border border-slate-200 shadow-sm">
                            <span class="w-6 h-6 rounded-lg bg-teal-50 text-teal-700 flex items-center justify-center font-bold">✓</span>
                            <span><strong>Préservation de l'Émail :</strong> Vos dents naturelles ne sont jamais meulées en moignons.</span>
                        </div>
                        <div class="flex items-center gap-3 text-xs font-semibold text-navy-800 bg-white p-2.5 rounded-xl border border-slate-200 shadow-sm">
                            <span class="w-6 h-6 rounded-lg bg-teal-50 text-teal-700 flex items-center justify-center font-bold">✓</span>
                            <span><strong>Simulation 3D ClinCheck :</strong> Vous validez en vidéo le résultat final avant de débuter.</span>
                        </div>
                        <div class="flex items-center gap-3 text-xs font-semibold text-navy-800 bg-white p-2.5 rounded-xl border border-slate-200 shadow-sm">
                            <span class="w-6 h-6 rounded-lg bg-teal-50 text-teal-700 flex items-center justify-center font-bold">✓</span>
                            <span><strong>Discrétion Absolue :</strong> Aligneurs transparents amovibles, indétectables en réunion.</span>
                        </div>
                    </div>

                    <!-- Boutons d'appel à l'action -->
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
                        <a href="#rdv-section" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 rounded-xl font-bold text-base text-white bg-teal-600 hover:bg-teal-500 shadow-lg shadow-teal-600/25 transition-all hover:scale-105 active:scale-95">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            Réserver mon Bilan 3D Sourire
                        </a>
                        
                        <a href="#avant-apres" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-4 rounded-xl font-semibold text-base text-navy-700 bg-white hover:bg-slate-50 border border-slate-200 shadow-sm transition-all hover:border-teal-300">
                            Voir le Cas Avant / Après
                            <svg class="w-4 h-4 ml-2 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </a>
                    </div>

                </div>

                <!-- COLONNE DROITE : SIMULATEUR 3D INTERACTIF DÉCISIF -->
                <div class="lg:col-span-6 relative">
                    
                    <div class="relative bg-white/85 backdrop-blur-xl rounded-3xl border border-white p-3 sm:p-5 shadow-2xl shadow-teal-900/10 transition-all">
                        
                        <div class="flex flex-wrap items-center justify-between gap-2 pb-3 border-b border-slate-100">
                            <div class="flex items-center gap-2">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-teal-50 text-teal-700 border border-teal-100">
                                    <span class="w-2 h-2 rounded-full bg-teal-500 animate-ping"></span>
                                    Simulateur 3D Interactif
                                </span>
                                <span class="text-xs text-slate-400 hidden sm:inline">Glissez pour observer à 360°</span>
                            </div>

                            <button id="toggle-spline-btn" class="inline-flex items-center gap-1 text-[11px] font-semibold text-teal-700 bg-teal-50 hover:bg-teal-100 px-2.5 py-1 rounded-lg border border-teal-200/60 transition-colors">
                                <svg class="w-3.5 h-3.5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
                                <span>Variante Spline Embed</span>
                            </button>
                        </div>

                        <!-- 1. SÉLECTEUR DE PROTOCOLE 3D PHARE -->
                        <div class="flex flex-wrap gap-1.5 py-2.5">
                            <button data-3d-mode="veneer" class="px-3 py-1.5 rounded-lg text-xs font-semibold bg-teal-600 text-white shadow-sm transition-all flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                                ✨ Facette No-Prep
                            </button>
                            <button data-3d-mode="aligner" class="px-3 py-1.5 rounded-lg text-xs font-semibold bg-white/80 text-navy-700 hover:bg-white border border-slate-200 transition-all flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                                🦷 Aligneur 3D Transparent
                            </button>
                            <button data-3d-mode="molar" class="px-3 py-1.5 rounded-lg text-xs font-semibold bg-white/80 text-navy-700 hover:bg-white border border-slate-200 transition-all flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                                💎 Molaire Anatomique
                            </button>
                            <button data-3d-mode="scanner" class="px-3 py-1.5 rounded-lg text-xs font-semibold bg-white/80 text-navy-700 hover:bg-white border border-slate-200 transition-all flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/></svg>
                                ⚡ Scanner LiDAR
                            </button>
                            <button data-3d-mode="whitening" class="px-3 py-1.5 rounded-lg text-xs font-semibold bg-white/80 text-navy-700 hover:bg-white border border-slate-200 transition-all flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-coral-400" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"/></svg>
                                🌟 Blanchiment
                            </button>
                        </div>

                        <!-- SLIDER 1 : POSE FACETTE NO-PREP -->
                        <div id="veneer-slider-container" class="pb-2 px-3 bg-teal-50/60 rounded-xl mb-2 border border-teal-200/60">
                            <div class="flex items-center justify-between text-xs text-navy-800 pt-2 pb-1">
                                <span class="font-bold flex items-center gap-1.5">
                                    <span class="w-2 h-2 rounded-full bg-teal-600"></span>
                                    Ajustage de la Facette Céramique E.max :
                                </span>
                                <span id="veneer-value-label" class="font-mono text-teal-800 font-bold">Facette E.max plaquée sur l'émail (Zéro fraisage)</span>
                            </div>
                            <input id="veneer-slider" type="range" min="0" max="1" step="0.05" value="0" class="w-full accent-teal-600 cursor-pointer">
                            <div class="flex justify-between text-[10px] text-slate-500">
                                <span>Plaquée sur l'émail (0.25 mm)</span>
                                <span>Faites glisser pour décoller &amp; inspecter</span>
                            </div>
                        </div>

                        <!-- SLIDER 2 : SIMULATION ALIGNEUR TRANSPARENT -->
                        <div id="aligner-slider-container" class="hidden pb-2 px-3 bg-sky-50/70 rounded-xl mb-2 border border-sky-200/60">
                            <div class="flex items-center justify-between text-xs text-navy-800 pt-2 pb-1">
                                <span class="font-bold flex items-center gap-1.5">
                                    <span class="w-2 h-2 rounded-full bg-sky-600"></span>
                                    Simulation ClinCheck de Redressement :
                                </span>
                                <span id="aligner-value-label" class="font-mono text-sky-800 font-bold">Phase finale : Alignement idéal du sourire (100%)</span>
                            </div>
                            <input id="aligner-slider" type="range" min="0" max="1" step="0.05" value="1" class="w-full accent-teal-600 cursor-pointer">
                            <div class="flex justify-between text-[10px] text-slate-500">
                                <span>Chevauchement initial (-15°)</span>
                                <span>Alignement parfait (100%)</span>
                            </div>
                        </div>

                        <!-- SLIDER 3 : BLANCHIMENT VITA -->
                        <div id="whitening-slider-container" class="hidden pb-2 px-3 bg-slate-50 rounded-xl mb-2 border border-slate-200/60">
                            <div class="flex items-center justify-between text-xs text-slate-600 pt-2 pb-1">
                                <span class="font-semibold text-navy-800">Éclaircissement de l'Émail :</span>
                                <span id="whitening-value-label" class="font-mono text-teal-700 font-bold">Teinte B1 (Hollywood Smile)</span>
                            </div>
                            <input id="whitening-slider" type="range" min="0" max="1" step="0.05" value="0.90" class="w-full accent-teal-600 cursor-pointer">
                            <div class="flex justify-between text-[10px] text-slate-400">
                                <span>Teinte A3.5 (Naturelle ambrée)</span>
                                <span>Teinte B1 (Éclat maximal)</span>
                            </div>
                        </div>

                        <!-- ZONE DU CANVAS 3D INTERACTIF (VIEWPORT SCANNER OPTIQUE 3D) -->
                        <div class="relative w-full h-[440px] sm:h-[480px] rounded-2xl bg-[#070D1A] overflow-hidden cursor-grab active:cursor-grabbing border border-slate-700/60 shadow-2xl">
                            
                            <!-- Grille scanner optique et lueur teal d'arrière-plan -->
                            <div class="absolute inset-0 bg-grid-medical opacity-20 pointer-events-none"></div>
                            <div class="absolute inset-0 pointer-events-none" style="background: radial-gradient(circle at center, rgba(13,148,136,0.25) 0%, rgba(7,13,26,0.95) 75%);"></div>

                            <!-- Scène 3D Interactive Haute Définition -->
                            <div id="dental-hero-viewport" class="relative w-full h-full flex items-center justify-center overflow-hidden" style="perspective: 1000px;">
                                <div id="dental-stage" class="relative w-full h-full flex items-center justify-center transition-transform duration-75 ease-out">
                                    <img id="dental-hero-img" src="/images/dental-arch-3d-render.png" alt="Scanner 3D Arcade Dentaire Sourire Clinic" class="max-w-[94%] max-h-[94%] object-contain rounded-2xl drop-shadow-[0_20px_35px_rgba(0,0,0,0.85)] select-none pointer-events-none transition-all duration-300">
                                    
                                    <!-- Faisceau laser scanner LiDAR -->
                                    <div id="hero-laser-line" class="hidden absolute inset-x-0 h-[2px] bg-cyan-400 shadow-[0_0_15px_#00F0FF,0_0_30px_#0D9488] pointer-events-none"></div>

                                    <!-- Annotation Facette E.max -->
                                    <div id="hero-veneer-callout" class="absolute bottom-[20%] left-[16%] border border-teal-400/80 bg-teal-950/85 backdrop-blur-md rounded-xl p-3 text-[11px] text-teal-200 pointer-events-none shadow-2xl transition-all duration-300 flex flex-col gap-1">
                                        <span class="font-bold text-white flex items-center gap-1.5">
                                            <span class="w-2 h-2 rounded-full bg-teal-400 animate-pulse"></span>
                                            Facette E.max Press #11
                                        </span>
                                        <span class="text-teal-300 font-mono text-[10px]">Épaisseur : 0.25 mm ultra-fine</span>
                                        <span class="text-emerald-400 font-semibold text-[10px]">Zéro meulage d'émail naturel</span>
                                    </div>

                                    <!-- Gouttière Aligneurs Halo -->
                                    <div id="hero-aligner-halo" class="hidden absolute top-[12%] w-[72%] h-[36%] rounded-[50%_50%_30%_30%] border-2 border-sky-400/80 shadow-[0_0_30px_rgba(56,189,248,0.5),inset_0_0_20px_rgba(56,189,248,0.3)] pointer-events-none"></div>
                                </div>
                            </div>

                            <!-- Variante Spline Embed Iframe -->
                            <div id="spline-embed-container" class="hidden absolute inset-0 w-full h-full bg-navy-950 z-10 flex flex-col">
                                <div class="bg-navy-900 text-white text-[11px] py-1 px-3 flex justify-between items-center border-b border-navy-800">
                                    <span>Scène 3D Spline Design Embed</span>
                                    <span class="text-teal-400 font-mono">spline.design/embed</span>
                                </div>
                                <div class="relative flex-1 w-full h-full">
                                    <iframe src="https://my.spline.design/nexbotrobotcharacterconcept-2d3ff3cfad9913c1f440536c496e95c1/" 
                                            frameborder="0" width="100%" height="100%" class="w-full h-full" loading="lazy" title="Spline 3D Scene">
                                    </iframe>
                                </div>
                            </div>

                            <!-- Badges HUD Awwwards Haute Lisibilité -->
                            <div class="absolute top-4 left-4 pointer-events-none z-10">
                                <div class="bg-navy-900/85 backdrop-blur-md border border-slate-700/60 px-3 py-1.5 rounded-xl shadow-lg text-xs font-semibold text-white flex items-center gap-1.5">
                                    <span class="w-2 h-2 rounded-full bg-teal-400 animate-pulse"></span>
                                    <span>Maxillaire Supérieur · Proportions d'Or</span>
                                </div>
                            </div>

                            <div class="absolute bottom-4 right-4 pointer-events-none z-10">
                                <div class="bg-navy-900/85 backdrop-blur-md border border-slate-700/60 px-3 py-1.5 rounded-xl shadow-lg text-xs font-medium text-slate-200 flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/></svg>
                                    <span>Immersion 3D 360°</span>
                                </div>
                            </div>

                        </div>

                        <div class="flex items-center justify-between pt-3 text-[11px] text-slate-500">
                            <span class="flex items-center gap-1 text-teal-700 font-semibold">
                                <svg class="w-3.5 h-3.5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                Rendu 60 FPS · Zéro perte tissulaire
                            </span>
                            <span class="font-mono text-slate-400">Biomimétisme feldspathique</span>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- SECTION AVANT / APRÈS INTERACTIVE (LE DÉCLENCHEUR DE DÉCISION PATIENT) -->
    <section id="avant-apres" class="py-20 bg-white border-y border-slate-200/80">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="text-center max-w-3xl mx-auto space-y-4 mb-14">
                <span class="text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full bg-teal-50 text-teal-800 border border-teal-200">
                    Cas Clinique Réel · Casablanca
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-navy-800 font-display tracking-tight">
                    Faites Glisser : La Transformation Avant / Après
                </h2>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Cas d'une patiente traitée par <strong>aligneurs invisibles (6 mois)</strong> et <strong>pose de 6 facettes pelliculaires E.max no-prep</strong>. Aucune dent n'a été dévitalisée ni taillée en pointe.
                </p>
            </div>

            <div class="bg-slate-50 rounded-3xl p-6 sm:p-10 border border-slate-200 shadow-clinical">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    
                    <!-- COMPOSANT SPLIT SLIDER AVANT / APRÈS DRAGGABLE -->
                    <div class="lg:col-span-8">
                        <div id="before-after-container" class="relative w-full h-80 sm:h-96 rounded-2xl overflow-hidden shadow-xl border-2 border-white select-none cursor-ew-resize">
                            
                            <!-- Image APRÈS (Fond fixe) -->
                            <img src="/images/smile-aesthetic.jpg" alt="Après : Sourire harmonieux et éclatant" class="absolute inset-0 w-full h-full object-cover pointer-events-none">
                            <span class="absolute top-4 right-4 bg-teal-600/90 text-white text-xs font-bold px-3 py-1 rounded-full shadow pointer-events-none">
                                APRÈS : Aligneurs + Facettes
                            </span>

                            <!-- Image AVANT (Clipée dynamiquement par le width) -->
                            <div id="before-image-wrap" class="absolute inset-0 w-1/2 h-full overflow-hidden border-r-2 border-white pointer-events-none">
                                <img src="/images/smile-before.jpg" alt="Avant : Dents encombrées et teinte ambrée" class="absolute inset-0 w-full h-full object-cover pointer-events-none max-w-none" style="width: 100%; min-width: 100%;">
                                <span class="absolute top-4 left-4 bg-navy-900/90 text-white text-xs font-bold px-3 py-1 rounded-full shadow">
                                    AVANT : Chevauchement &amp; Teinte A3.5
                                </span>
                            </div>

                            <!-- Ligne de séparation et poignée centrale draggable -->
                            <div id="split-divider-handle" class="absolute top-0 bottom-0 left-1/2 -ml-4 flex items-center justify-center pointer-events-none">
                                <div class="w-8 h-8 rounded-full bg-white text-teal-700 shadow-xl border-2 border-teal-500 flex items-center justify-center text-xs font-bold">
                                    ↔
                                </div>
                            </div>

                        </div>

                        <!-- Curseur de contrôle manuel sous l'image -->
                        <div class="pt-4 flex items-center justify-between text-xs text-slate-500">
                            <span>◀ Glissez pour voir le départ (Avant)</span>
                            <input id="before-after-split-slider" type="range" min="0" max="100" value="50" class="w-48 accent-teal-600 cursor-pointer">
                            <span>Glissez pour voir le résultat (Après) ▶</span>
                        </div>
                    </div>

                    <!-- Fiche Diagnostic Clinique -->
                    <div class="lg:col-span-4 space-y-4">
                        <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-sm space-y-3">
                            <h4 class="font-bold text-navy-800 text-sm border-b border-slate-100 pb-2">Diagnostic &amp; Protocole Réalisé :</h4>
                            <div class="text-xs space-y-2">
                                <div>
                                    <span class="text-slate-400 font-medium">Motif initial :</span>
                                    <div class="font-semibold text-navy-800">Chevauchement incisif &amp; émail jauni</div>
                                </div>
                                <div>
                                    <span class="text-slate-400 font-medium">Phase 1 (Alignement) :</span>
                                    <div class="font-semibold text-teal-700">12 séries d'aligneurs transparents 3D</div>
                                </div>
                                <div>
                                    <span class="text-slate-400 font-medium">Phase 2 (Esthétique) :</span>
                                    <div class="font-semibold text-teal-700">6 facettes feldspathiques No-Prep (0.25mm)</div>
                                </div>
                                <div>
                                    <span class="text-slate-400 font-medium">Durée totale :</span>
                                    <div class="font-semibold text-navy-800">5 mois et demi</div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-2">
                            <a href="#rdv-section" onclick="document.querySelector('select[name=treatment]').value='orthodontie'" class="w-full inline-flex items-center justify-center py-3.5 px-4 rounded-xl bg-teal-600 text-white font-bold text-xs hover:bg-teal-500 shadow-md transition-all gap-1.5">
                                <span>Demander un bilan pour mon sourire</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <!-- SECTION GALERIE DU CABINET & AMBIANCE CLINIQUE -->
    <section id="cabinet" class="py-16 bg-clinic-bg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto space-y-3 mb-12">
                <span class="text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full bg-teal-50 text-teal-800 border border-teal-200">
                    L'Espace Clinique
                </span>
                <h2 class="text-3xl font-extrabold text-navy-800 font-display">
                    Un Sanctuaire Médical au Cœur de Casablanca
                </h2>
                <p class="text-sm text-slate-600">
                    Découvrez un cadre architectural apaisant, conçu pour effacer toute anxiété dentaire et sublimer vos soins.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <div class="group relative rounded-3xl overflow-hidden shadow-clinical border border-slate-200/80 aspect-[4/3]">
                    <img src="/images/clinic-interior.jpg" alt="Salon d'accueil Sourire Clinic Casablanca" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-navy-900/80 via-navy-900/20 to-transparent flex flex-col justify-end p-6 text-white">
                        <span class="text-xs font-mono text-teal-300">ESPACE ATTENTE &amp; SÉRÉNITÉ</span>
                        <h4 class="text-base font-bold font-display mt-0.5">Atmosphère Lounge &amp; Bois Chaud</h4>
                        <p class="text-xs text-slate-200 mt-1">Confort acoustique, thé d'accueil et zéro odeur d'hôpital.</p>
                    </div>
                </div>

                <div class="group relative rounded-3xl overflow-hidden shadow-clinical border border-slate-200/80 aspect-[4/3]">
                    <img src="/images/scanner-3d-action.jpg" alt="Caméra optique intra-orale 3D en action" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-navy-900/80 via-navy-900/20 to-transparent flex flex-col justify-end p-6 text-white">
                        <span class="text-xs font-mono text-teal-300">TECHNOLOGIE OPTIQUE 3D</span>
                        <h4 class="text-base font-bold font-display mt-0.5">Empreinte Numérique Sans Pâte</h4>
                        <p class="text-xs text-slate-200 mt-1">Scan complet des arcades en moins de 3 minutes chrono.</p>
                    </div>
                </div>

                <div class="group relative rounded-3xl overflow-hidden shadow-clinical border border-slate-200/80 aspect-[4/3]">
                    <img src="/images/dental-operatory.jpg" alt="Salle de soins moderne et fauteuil ergonomique" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-navy-900/80 via-navy-900/20 to-transparent flex flex-col justify-end p-6 text-white">
                        <span class="text-xs font-mono text-teal-300">PLATEAU TECHNIQUE</span>
                        <h4 class="text-base font-bold font-display mt-0.5">Fauteuil Ergonomique &amp; Écrans 4K</h4>
                        <p class="text-xs text-slate-200 mt-1">Suivez l'évolution de vos soins en direct sur écran suspendu.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION SOINS : LES 5 PRESTATIONS TYPES DU BRIEF -->
    <section id="soins" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
                <span class="text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full bg-teal-50 text-teal-800 border border-teal-200">
                    Notre Éventail Thérapeutique
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-navy-800 font-display tracking-tight">
                    5 Soins Spécialisés d'Avant-Garde
                </h2>
                <p class="text-slate-600 text-base leading-relaxed">
                    Chaque protocole allie confort absolu, préservation tissulaire maximale et prédictibilité esthétique garantie par l'imagerie 3D.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                @foreach ($treatments as $treatment)
                    <div class="bg-slate-50/60 rounded-3xl p-7 border border-slate-200/90 shadow-clinical hover:shadow-clinical-hover transition-all duration-300 flex flex-col justify-between group hover:-translate-y-1">
                        
                        <div class="space-y-5">
                            
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-semibold px-2.5 py-1 rounded-full {{ $treatment['tag_color'] === 'coral' ? 'bg-coral-50 text-coral-600 border border-coral-200' : 'bg-teal-50 text-teal-700 border border-teal-200' }}">
                                    {{ $treatment['tag'] }}
                                </span>
                                <span class="text-xs text-slate-400 font-medium flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    {{ $treatment['duration'] }}
                                </span>
                            </div>

                            <div>
                                <span class="text-xs uppercase tracking-wider font-semibold text-slate-400">{{ $treatment['category'] }}</span>
                                <h3 class="text-xl font-bold text-navy-800 font-display mt-1 group-hover:text-teal-600 transition-colors">
                                    {{ $treatment['name'] }}
                                </h3>
                            </div>

                            <p class="text-sm text-slate-600 leading-relaxed">
                                {{ $treatment['summary'] }}
                            </p>

                            <div class="space-y-2 pt-2">
                                <div class="text-xs font-semibold text-navy-800">Indiqué pour :</div>
                                <ul class="text-xs text-slate-500 space-y-1.5">
                                    @foreach ($treatment['indications'] as $indication)
                                        <li class="flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-teal-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                            <span>{{ $indication }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="p-3 bg-white rounded-xl border border-slate-200/80 text-xs text-slate-600">
                                <span class="font-semibold text-navy-800">Tarification :</span> {{ $treatment['pricing_hint'] }}
                            </div>

                        </div>

                        <div class="pt-6 mt-6 border-t border-slate-200/60 flex items-center justify-between gap-3">
                            <button data-treatment-modal data-treatment-data="{{ json_encode($treatment) }}" class="text-xs font-semibold text-navy-700 hover:text-teal-600 transition-colors inline-flex items-center gap-1">
                                <span>Voir le protocole</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </button>

                            <a href="#rdv-section" onclick="document.querySelector('select[name=treatment]').value='{{ $treatment['id'] }}'" class="text-xs font-semibold px-3.5 py-2 rounded-xl bg-teal-50 text-teal-700 hover:bg-teal-600 hover:text-white transition-all">
                                Réserver ce soin
                            </a>
                        </div>

                    </div>
                @endforeach

            </div>

        </div>
    </section>

    <!-- SECTION ÉQUIPE & DOCTEUR : CONFIANCE HUMAINE -->
    <section id="equipe" class="py-20 bg-clinic-bg border-t border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <div class="lg:col-span-5 relative">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white">
                        <img src="/images/doctor-consultation.jpg" alt="Chirurgien-dentiste Sourire Clinic" class="w-full h-[480px] object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-navy-900/80 via-transparent to-transparent flex flex-col justify-end p-6 text-white">
                            <span class="text-xs font-mono text-teal-300">DIRECTION MÉDICALE</span>
                            <h3 class="text-xl font-bold font-display">Dr. Chirurgien-Dentiste</h3>
                            <p class="text-xs text-slate-200">Diplômée d'orthodontie invisible &amp; dentisterie esthétique</p>
                        </div>
                    </div>

                    <div class="absolute -bottom-6 -right-6 glass-panel p-4 rounded-2xl shadow-xl max-w-xs hidden sm:block border border-slate-200">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-teal-50 text-teal-700 flex items-center justify-center font-bold text-sm">
                                12+
                            </div>
                            <div class="text-xs">
                                <div class="font-bold text-navy-800">Années d'Expérience</div>
                                <div class="text-slate-500">Praticienne certifiée Aligneurs 3D</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-7 space-y-6">
                    <span class="text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full bg-teal-50 text-teal-800 border border-teal-200">
                        L'Engagement du Praticien
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-navy-800 font-display tracking-tight leading-tight">
                        « Ne jamais mutiler une dent saine, toujours sublimer son harmonie naturelle. »
                    </h2>
                    <p class="text-slate-600 text-base leading-relaxed">
                        Chaque patient arrivant à Sourire Clinic Casablanca bénéficie d'une écoute bienveillante et sans jugement. Nous prenons le temps d'étudier les proportions de votre visage grâce au morphing numérique 3D avant d'engager le moindre soin. L'anesthésie informatisée permet d'éliminer définitivement l'angoisse de la piqûre.
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                        <div class="p-4 rounded-2xl bg-white border border-slate-200 space-y-1 shadow-sm">
                            <div class="text-sm font-bold text-navy-800 flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Bilan 3D Sans Engagement
                            </div>
                            <p class="text-xs text-slate-500">Scan complet de vos mâchoires et simulation numérique de votre futur sourire.</p>
                        </div>

                        <div class="p-4 rounded-2xl bg-white border border-slate-200 space-y-1 shadow-sm">
                            <div class="text-sm font-bold text-navy-800 flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Facilité de Règlement &amp; Mutuelles
                            </div>
                            <p class="text-xs text-slate-500">Paiement échelonné pour l'orthodontie adulte et devis conforme CNSS/CNOPS/Assurances.</p>
                        </div>
                    </div>

                    <div class="pt-2">
                        <a href="#rdv-section" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-teal-600 text-white font-bold text-sm hover:bg-teal-500 shadow-md transition-all">
                            <span>Planifier une consultation avec la docteure</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION FORMULAIRE DE PRISE DE RDV RÉEL AVEC PERSISTANCE SQLITE -->
    <section id="rdv-section" class="py-20 bg-white border-t border-slate-200/80 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="bg-slate-50 rounded-3xl p-8 sm:p-12 border border-slate-200 shadow-xl relative overflow-hidden">
                
                <div class="absolute top-0 right-0 bg-teal-600 text-white text-[10px] font-bold uppercase tracking-widest py-1.5 px-4 rounded-bl-xl shadow-sm">
                    Mode Démo Fonctionnel
                </div>

                <div class="max-w-2xl mb-10 space-y-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-teal-700">Consultation Rapide</span>
                    <h2 class="text-3xl font-extrabold text-navy-800 font-display">
                        Prendre Rendez-vous en Ligne
                    </h2>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Choisissez votre soin et votre créneau préférentiel. Votre demande sera instantanément enregistrée dans notre système clinique à Casablanca.
                    </p>
                </div>

                <!-- Formulaire interactif -->
                <form id="appointment-form" action="/rendez-vous" method="POST" class="space-y-6">
                    @csrf
                    
                    <div class="hidden" aria-hidden="true">
                        <label for="website_hp">Laissez ce champ vide</label>
                        <input type="text" id="website_hp" name="website_hp" tabindex="-1" autocomplete="off">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        
                        <div class="space-y-1.5">
                            <label for="name" class="block text-xs font-bold uppercase tracking-wider text-navy-800">
                                Nom et Prénom <span class="text-coral-500">*</span>
                            </label>
                            <input type="text" id="name" name="name" required placeholder="ex: Kenza Tazi" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent text-sm bg-white transition-all">
                            <span id="error-name" class="field-error-msg text-xs text-coral-500 font-medium"></span>
                        </div>

                        <div class="space-y-1.5">
                            <label for="phone" class="block text-xs font-bold uppercase tracking-wider text-navy-800">
                                Numéro de Téléphone <span class="text-coral-500">*</span>
                            </label>
                            <input type="tel" id="phone" name="phone" required placeholder="ex: +212 6 61 00 00 00" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent text-sm bg-white transition-all">
                            <span id="error-phone" class="field-error-msg text-xs text-coral-500 font-medium"></span>
                        </div>

                        <div class="space-y-1.5">
                            <label for="email" class="block text-xs font-bold uppercase tracking-wider text-navy-800">
                                Adresse Email <span class="text-slate-400 font-normal">(Optionnel)</span>
                            </label>
                            <input type="email" id="email" name="email" placeholder="kenza@exemple.ma" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent text-sm bg-white transition-all">
                            <span id="error-email" class="field-error-msg text-xs text-coral-500 font-medium"></span>
                        </div>

                        <div class="space-y-1.5">
                            <label for="treatment" class="block text-xs font-bold uppercase tracking-wider text-navy-800">
                                Type de Soin Souhaité <span class="text-coral-500">*</span>
                            </label>
                            <select id="treatment" name="treatment" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent text-sm bg-white transition-all">
                                <option value="">-- Sélectionnez un soin --</option>
                                <option value="orthodontie" selected>1. Orthodontie &amp; aligneurs invisibles 3D</option>
                                <option value="blanchiment">2. Blanchiment dentaire Philips Zoom &amp; facettes</option>
                                <option value="soins_generaux">3. Soins généraux &amp; conservateurs biomimétiques</option>
                                <option value="detartrage">4. Détartrage &amp; aéropolissage prophylactique GBT</option>
                                <option value="urgence">5. Urgence dentaire Casablanca (prioritaire)</option>
                            </select>
                            <span id="error-treatment" class="field-error-msg text-xs text-coral-500 font-medium"></span>
                        </div>

                        <div class="space-y-1.5">
                            <label for="preferred_slot" class="block text-xs font-bold uppercase tracking-wider text-navy-800">
                                Créneau Horaire Préféré <span class="text-coral-500">*</span>
                            </label>
                            <select id="preferred_slot" name="preferred_slot" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent text-sm bg-white transition-all">
                                <option value="matin">Matinée (09h00 - 12h30)</option>
                                <option value="apres_midi">Après-midi (14h00 - 17h00)</option>
                                <option value="fin_journee">Fin de journée (17h00 - 19h30)</option>
                                <option value="urgence_immediat">Urgence du jour (au plus vite)</option>
                            </select>
                            <span id="error-preferred_slot" class="field-error-msg text-xs text-coral-500 font-medium"></span>
                        </div>

                        <div class="space-y-1.5">
                            <label for="preferred_date" class="block text-xs font-bold uppercase tracking-wider text-navy-800">
                                Date Souhaitée <span class="text-slate-400 font-normal">(Optionnel)</span>
                            </label>
                            <input type="date" id="preferred_date" name="preferred_date" min="{{ date('Y-m-d') }}" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent text-sm bg-white transition-all">
                            <span id="error-preferred_date" class="field-error-msg text-xs text-coral-500 font-medium"></span>
                        </div>

                    </div>

                    <div class="space-y-1.5">
                        <label for="message" class="block text-xs font-bold uppercase tracking-wider text-navy-800">
                            Précisions / Attentes particulières <span class="text-slate-400 font-normal">(Optionnel)</span>
                        </label>
                        <textarea id="message" name="message" rows="3" placeholder="Ex: Souhaite un devis d'aligneurs invisibles ou d'éclaircissement dentaire..." class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent text-sm bg-white transition-all"></textarea>
                        <span id="error-message" class="field-error-msg text-xs text-coral-500 font-medium"></span>
                    </div>

                    <div class="pt-2">
                        <button id="submit-rdv-btn" type="submit" class="w-full py-4 rounded-xl font-bold text-base text-white bg-teal-600 hover:bg-teal-500 shadow-lg shadow-teal-600/25 transition-all hover:scale-[1.01] active:scale-[0.99] flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>Confirmer la demande de rendez-vous</span>
                        </button>
                    </div>

                    <div class="text-center text-xs text-slate-400">
                        🔒 Confidentialité médicale garantie. Enregistrement direct en base locale SQLite.
                    </div>

                </form>

            </div>

        </div>
    </section>

    <!-- SECTION QUESTIONS FRÉQUENTES (FAQ) -->
    <section id="faq" class="py-20 bg-clinic-bg border-t border-slate-200/80">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="text-center space-y-4 mb-14">
                <span class="text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full bg-teal-50 text-teal-800 border border-teal-200">
                    Transparence Médicale
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-navy-800 font-display tracking-tight">
                    Questions Fréquemment Posées
                </h2>
                <p class="text-slate-600 text-sm">
                    Tout ce que vous souhaitez savoir avant d'entamer votre alignement ou vos facettes à Sourire Clinic Casablanca.
                </p>
            </div>

            <div class="space-y-4">
                
                <div class="border border-slate-200 bg-white rounded-2xl overflow-hidden transition-all shadow-sm">
                    <button data-faq-toggle class="w-full text-left p-5 font-bold text-navy-800 text-sm flex items-center justify-between hover:bg-slate-50 transition-colors">
                        <span>Les facettes No-Prep nécessitent-elles de meuler ou dévitaliser mes dents ?</span>
                        <svg class="faq-icon w-5 h-5 text-teal-600 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="hidden p-5 pt-0 text-sm text-slate-600 border-t border-slate-100 bg-slate-50/50 leading-relaxed">
                        Non, absolument pas. Contrairement aux couronnes d'ancienne génération qui taillent la dent vivante en moignon pointu, les facettes céramiques pelliculaires No-Prep (0.2 à 0.3 mm) sont collées directement sur l'émail existant sans aucune anesthésie ni meulage agressif. Votre dent reste 100% saine et vivante.
                    </div>
                </div>

                <div class="border border-slate-200 bg-white rounded-2xl overflow-hidden transition-all shadow-sm">
                    <button data-faq-toggle class="w-full text-left p-5 font-bold text-navy-800 text-sm flex items-center justify-between hover:bg-slate-50 transition-colors">
                        <span>Puis-je prévisualiser mon futur sourire AVANT de payer le traitement ?</span>
                        <svg class="faq-icon w-5 h-5 text-teal-600 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="hidden p-5 pt-0 text-sm text-slate-600 border-t border-slate-100 bg-slate-50/50 leading-relaxed">
                        Oui. Dès votre première séance, nous réalisons un scan optique 3D sans pâte. Nous modélisons ensuite une simulation numérique prédictive (ClinCheck) et un masque esthétique provisoire (mock-up) directement dans votre bouche. Vous voyez et validez le résultat final dans un miroir avant de démarrer.
                    </div>
                </div>

                <div class="border border-slate-200 bg-white rounded-2xl overflow-hidden transition-all shadow-sm">
                    <button data-faq-toggle class="w-full text-left p-5 font-bold text-navy-800 text-sm flex items-center justify-between hover:bg-slate-50 transition-colors">
                        <span>Les aligneurs transparents sont-ils vraiment indétectables au travail ?</span>
                        <svg class="faq-icon w-5 h-5 text-teal-600 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="hidden p-5 pt-0 text-sm text-slate-600 border-t border-slate-100 bg-slate-50/50 leading-relaxed">
                        Totalement. Conçues en polymère thermoplastique médical ultra-fin et transparent, les gouttières épousent la courbure exacte de vos dents sans aucun fil métallique. Même à 50 cm de distance en réunion d'affaires ou lors d'un déjeuner, personne ne remarque que vous portez un aligneur.
                    </div>
                </div>

                <div class="border border-slate-200 bg-white rounded-2xl overflow-hidden transition-all shadow-sm">
                    <button data-faq-toggle class="w-full text-left p-5 font-bold text-navy-800 text-sm flex items-center justify-between hover:bg-slate-50 transition-colors">
                        <span>Prenez-vous en charge les mutuelles (CNSS, CNOPS, Saham, RMA, Axa) ?</span>
                        <svg class="faq-icon w-5 h-5 text-teal-600 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="hidden p-5 pt-0 text-sm text-slate-600 border-t border-slate-100 bg-slate-50/50 leading-relaxed">
                        Oui. Toutes nos feuilles de soins sont conformes pour le remboursement auprès de la CNSS, de la CNOPS et de toutes les compagnies d'assurances complémentaires marocaines et internationales. Nous établissons également des facilités de règlement échelonné sur la durée du traitement orthodontique.
                    </div>
                </div>

                <div class="border border-slate-200 bg-white rounded-2xl overflow-hidden transition-all shadow-sm">
                    <button data-faq-toggle class="w-full text-left p-5 font-bold text-navy-800 text-sm flex items-center justify-between hover:bg-slate-50 transition-colors">
                        <span>Les soins sont-ils garantis sans aucune douleur ?</span>
                        <svg class="faq-icon w-5 h-5 text-teal-600 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="hidden p-5 pt-0 text-sm text-slate-600 border-t border-slate-100 bg-slate-50/50 leading-relaxed">
                        Oui. Notre cabinet utilise l'anesthésie électronique SleeperOne : la vitesse d'injection est régulée au dixième de millilitre par microprocesseur, ce qui élimine totalement la sensation de piqûre et de brûlure.
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- FOOTER AVEC MENTIONS LÉGALES DU MODE DÉMO -->
    <footer class="bg-navy-900 text-slate-400 py-16 border-t border-navy-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                
                <div class="md:col-span-2 space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-9 h-9 rounded-xl bg-teal-600 flex items-center justify-center text-white">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2C8.5 2 6 4 6 7c0 2.5 1 4.5 2 7.5 1 3 1.5 5.5 4 5.5s3-2.5 4-5.5c1-3 2-5 2-7.5 0-3-2.5-5-6-5z"/></svg>
                        </div>
                        <span class="text-lg font-bold text-white font-display">Sourire Clinic Casablanca</span>
                    </div>
                    <p class="text-xs text-slate-400 leading-relaxed max-w-md">
                        Cabinet de démonstration technologique spécialisé en dentisterie 3D et esthétique de l'émail à Casablanca. Prototype conçu pour illustrer l'impact visuel et commercial d'un hero 3D interactif auprès des praticiens marocains.
                    </p>
                </div>

                <div class="space-y-3">
                    <div class="text-xs font-bold uppercase tracking-wider text-white">Soins Phares</div>
                    <ul class="text-xs space-y-2 text-slate-400">
                        <li>Orthodontie &amp; Aligneurs Invisibles 3D</li>
                        <li>Facettes Céramiques No-Prep E.max</li>
                        <li>Blanchiment Dentaire Philips Zoom</li>
                        <li>Détartrage &amp; Aéropolissage GBT</li>
                        <li>Urgences Dentaires Casablanca</li>
                    </ul>
                </div>

                <div class="space-y-3">
                    <div class="text-xs font-bold uppercase tracking-wider text-white">Outils de Démo</div>
                    <ul class="text-xs space-y-2 text-slate-400">
                        <li>Simulateur 3D Facette E.max &amp; Aligneur</li>
                        <li>Comparatif dynamique Avant / Après</li>
                        <li>Base de données SQLite temps réel</li>
                        <li>Simulateur SMS/WhatsApp capturé</li>
                        <li>Validation FormRequest Laravel 11</li>
                    </ul>
                </div>

            </div>

            <div class="p-5 rounded-2xl bg-navy-800/80 border border-slate-700/60 text-xs text-slate-400 space-y-2">
                <div class="font-bold text-slate-200 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-teal-400"></span>
                    Mentions Légales Démonstration &amp; Conformité
                </div>
                <p>
                    <strong>Mode Démo Actif :</strong> Ce site web est un démonstrateur technologique et commercial conçu pour présenter le savoir-faire de conception 3D aux cabinets dentaires du Maroc. Aucune donnée personnelle médicale n'est transmise à des tiers, aucune fausse certification n'est revendiquée et aucun faux numéro d'inscription à l'Ordre National des Médecins Dentistes n'est inventé. Les demandes de test sont enregistrées localement dans une base SQLite sandbox.
                </p>
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500 pt-6 border-t border-navy-800">
                <div>© 2026 Sourire Clinic Casablanca — Prototype Démo Freelance Senior.</div>
                <div class="mt-3 sm:mt-0">Technologies : Laravel 11 · Blade · Tailwind · Three.js 3D · Spline</div>
            </div>

        </div>
    </footer>

    <!-- MODAL 1 : NOTIFICATION CAPTURÉE -->
    <div id="notification-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-navy-900/70 backdrop-blur-sm">
        <div class="bg-white rounded-3xl max-w-lg w-full p-6 sm:p-8 shadow-2xl border border-slate-200 transform transition-all animate-float">
            
            <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-teal-100 text-teal-700 flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-navy-800 text-sm">Rendez-vous Confirmé avec Succès !</h4>
                        <span class="text-[11px] text-teal-600 font-mono">Enregistré dans SQLite</span>
                    </div>
                </div>
                <button id="close-notif-btn" class="p-1.5 rounded-lg text-slate-400 hover:text-navy-800 hover:bg-slate-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <div class="py-4 space-y-3 text-xs">
                <div class="bg-slate-50 p-3 rounded-xl border border-slate-100 grid grid-cols-2 gap-2">
                    <div>
                        <span class="text-slate-400">Patient :</span>
                        <div id="notif-patient-name" class="font-bold text-navy-800"></div>
                    </div>
                    <div>
                        <span class="text-slate-400">Réf. Dossier :</span>
                        <div id="notif-ref-code" class="font-mono font-bold text-teal-700"></div>
                    </div>
                    <div>
                        <span class="text-slate-400">Soin :</span>
                        <div id="notif-treatment" class="font-medium text-navy-800"></div>
                    </div>
                    <div>
                        <span class="text-slate-400">Créneau :</span>
                        <div id="notif-slot" class="font-medium text-navy-800"></div>
                    </div>
                </div>

                <div class="space-y-1.5">
                    <div class="font-bold text-navy-800 flex items-center gap-1.5 text-xs">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        Aperçu du SMS / WhatsApp automatique envoyé au patient :
                    </div>
                    <div class="p-4 rounded-xl bg-emerald-50/70 border border-emerald-200 text-emerald-950 font-sans text-xs leading-relaxed space-y-1.5">
                        <div class="flex justify-between text-[10px] text-emerald-700 font-medium">
                            <span id="notif-phone"></span>
                            <span id="notif-timestamp"></span>
                        </div>
                        <p id="notif-body-text" class="text-xs"></p>
                    </div>
                    <p class="text-[10px] text-slate-400 italic">
                        * En mode démo, la notification est capturée localement pour illustrer le parcours patient sans déclencher de coût SMS.
                    </p>
                </div>
            </div>

            <div class="pt-3 border-t border-slate-100 flex justify-end">
                <button onclick="document.getElementById('notification-modal').classList.add('hidden')" class="px-5 py-2.5 rounded-xl bg-teal-600 text-white font-semibold text-xs hover:bg-teal-500 transition-colors">
                    Fermer et continuer la visite
                </button>
            </div>

        </div>
    </div>

    <!-- TIROIR MODAL 2 : DÉTAIL D'UN SOIN -->
    <div id="treatment-detail-drawer" class="fixed inset-y-0 right-0 z-50 w-full max-w-md bg-white shadow-2xl border-l border-slate-200 transform translate-x-full transition-transform duration-300 flex flex-col justify-between">
        <div class="p-6 overflow-y-auto space-y-6">
            <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                <span id="drawer-treatment-category" class="text-xs uppercase tracking-wider font-semibold text-teal-700"></span>
                <button id="close-treatment-drawer-btn" class="p-2 rounded-lg text-slate-400 hover:text-navy-800 hover:bg-slate-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <div>
                <h3 id="drawer-treatment-name" class="text-2xl font-bold text-navy-800 font-display"></h3>
                <p id="drawer-treatment-summary" class="text-sm text-slate-600 mt-2 leading-relaxed"></p>
            </div>

            <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100 space-y-2 text-xs">
                <div>
                    <span class="text-slate-400 font-medium">Durée estimée :</span>
                    <span id="drawer-treatment-duration" class="font-bold text-navy-800 ml-1"></span>
                </div>
                <div>
                    <span class="text-slate-400 font-medium">Technologie clé :</span>
                    <span id="drawer-treatment-tech" class="font-medium text-navy-800 ml-1"></span>
                </div>
                <div>
                    <span class="text-slate-400 font-medium">Tarification :</span>
                    <span id="drawer-treatment-pricing" class="font-bold text-teal-700 ml-1"></span>
                </div>
            </div>

            <div class="space-y-3">
                <h4 class="text-xs font-bold uppercase tracking-wider text-navy-800">Protocole Étape par Étape :</h4>
                <ul id="drawer-treatment-steps" class="space-y-3"></ul>
            </div>
        </div>

        <div class="p-6 border-t border-slate-100 bg-slate-50">
            <button id="drawer-select-treatment-btn" class="w-full py-3.5 rounded-xl bg-teal-600 text-white font-bold text-sm hover:bg-teal-500 shadow-md transition-colors flex items-center justify-center gap-2">
                <span>Prendre RDV pour ce soin</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </button>
        </div>
    </div>

    <!-- TIROIR MODAL 3 : CONSULTATION BASE SQLITE -->
    <div id="demo-admin-drawer" class="fixed inset-y-0 right-0 z-50 w-full max-w-md bg-slate-50 shadow-2xl border-l border-slate-200 transform translate-x-full transition-transform duration-300 flex flex-col justify-between">
        <div class="p-6 overflow-y-auto space-y-4 flex-1">
            <div class="flex items-center justify-between pb-4 border-b border-slate-200">
                <div class="flex items-center gap-2">
                    <div class="w-7 h-7 rounded-lg bg-teal-600 text-white flex items-center justify-center text-xs font-bold">SQL</div>
                    <div>
                        <h3 class="font-bold text-navy-800 text-sm">RDV Enregistrés (SQLite)</h3>
                        <p class="text-[11px] text-slate-500">Persistance réelle locale</p>
                    </div>
                </div>
                <div class="flex items-center gap-1">
                    <button id="refresh-appointments-btn" title="Rafraîchir" class="p-2 rounded-lg text-slate-500 hover:text-teal-600 hover:bg-white transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                    </button>
                    <button id="close-demo-admin-btn" class="p-2 rounded-lg text-slate-500 hover:text-navy-800 hover:bg-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>

            <div id="demo-appointments-list" class="space-y-3"></div>
        </div>

        <div class="p-4 bg-white border-t border-slate-200 flex items-center justify-between text-xs">
            <span class="text-slate-400">Base : <code>database/database.sqlite</code></span>
            <button id="reset-demo-btn" class="text-xs text-coral-600 hover:text-coral-700 font-semibold px-2 py-1 rounded hover:bg-coral-50 transition-colors">
                Vider les tests
            </button>
        </div>
    </div>

</body>
</html>
