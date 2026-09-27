import './bootstrap';
import { DentalHero3D } from './dental3d';

function startApp() {
    // 1. Initialisation de la scène 3D & Viewport Interactif
    const viewport = document.getElementById('dental-hero-viewport');
    const stage = document.getElementById('dental-stage');
    const scanImg = document.getElementById('dental-hero-img');
    const laserLine = document.getElementById('hero-laser-line');
    const veneerCallout = document.getElementById('hero-veneer-callout');
    const alignerHalo = document.getElementById('hero-aligner-halo');

    let rotY = 0, rotX = 0;
    let targetRotY = 0, targetRotX = 0;
    let isDragging = false;
    let startX = 0, startY = 0;

    if (viewport && stage) {
        viewport.addEventListener('mousemove', (e) => {
            const rect = viewport.getBoundingClientRect();
            const nx = (e.clientX - (rect.left + rect.width / 2)) / (rect.width / 2);
            const ny = (e.clientY - (rect.top + rect.height / 2)) / (rect.height / 2);
            if (!isDragging) {
                targetRotY = nx * 12;
                targetRotX = -ny * 8;
            }
        });

        viewport.addEventListener('mousedown', (e) => {
            isDragging = true;
            startX = e.clientX;
            startY = e.clientY;
        });

        window.addEventListener('mousemove', (e) => {
            if (!isDragging) return;
            const dx = e.clientX - startX;
            const dy = e.clientY - startY;
            targetRotY += dx * 0.18;
            targetRotX -= dy * 0.14;
            targetRotX = Math.max(-18, Math.min(18, targetRotX));
            startX = e.clientX;
            startY = e.clientY;
        });

        window.addEventListener('mouseup', () => isDragging = false);

        viewport.addEventListener('touchstart', (e) => {
            if (e.touches.length === 1) {
                isDragging = true;
                startX = e.touches[0].clientX;
                startY = e.touches[0].clientY;
            }
        }, { passive: true });

        window.addEventListener('touchmove', (e) => {
            if (!isDragging || e.touches.length !== 1) return;
            const dx = e.touches[0].clientX - startX;
            const dy = e.touches[0].clientY - startY;
            targetRotY += dx * 0.18;
            targetRotX -= dy * 0.14;
            targetRotX = Math.max(-18, Math.min(18, targetRotX));
            startX = e.touches[0].clientX;
            startY = e.touches[0].clientY;
        }, { passive: true });

        window.addEventListener('touchend', () => isDragging = false);

        function updateParallax() {
            rotY += (targetRotY - rotY) * 0.08;
            rotX += (targetRotX - rotX) * 0.08;
            if (stage) stage.style.transform = `rotateX(${rotX}deg) rotateY(${rotY}deg)`;
            requestAnimationFrame(updateParallax);
        }
        updateParallax();
    }

    // 2. Contrôles interactifs du modèle 3D
    const modeButtons = document.querySelectorAll('[data-3d-mode]');
    const veneerControl = document.getElementById('veneer-slider-container');
    const alignerControl = document.getElementById('aligner-slider-container');
    const whiteningControl = document.getElementById('whitening-slider-container');

    modeButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const mode = btn.dataset['3dMode'];
            modeButtons.forEach(b => {
                b.classList.remove('bg-teal-600', 'text-white', 'shadow-md');
                b.classList.add('bg-white/80', 'text-navy-700', 'hover:bg-white');
            });
            btn.classList.add('bg-teal-600', 'text-white', 'shadow-md');
            btn.classList.remove('bg-white/80', 'text-navy-700', 'hover:bg-white');

            // Affichage des curseurs
            if (veneerControl) veneerControl.classList.toggle('hidden', mode !== 'veneer');
            if (alignerControl) alignerControl.classList.toggle('hidden', mode !== 'aligner');
            if (whiteningControl) whiteningControl.classList.toggle('hidden', mode !== 'whitening');

            // Éléments visuels dans le viewport
            if (alignerHalo) alignerHalo.classList.toggle('hidden', mode !== 'aligner');
            if (laserLine) laserLine.classList.toggle('hidden', mode !== 'scanner');
            if (veneerCallout) veneerCallout.classList.toggle('hidden', mode !== 'veneer');

            if (mode === 'scanner' && laserLine) {
                laserLine.style.animation = 'sweep 2.5s ease-in-out infinite alternate';
            }

            if (mode !== 'whitening' && scanImg) {
                scanImg.style.filter = 'drop-shadow(0 20px 35px rgba(0,0,0,0.85))';
            }
        });
    });

    // Curseur de pose de facette
    const veneerSlider = document.getElementById('veneer-slider');
    const veneerLabel = document.getElementById('veneer-value-label');
    if (veneerSlider) {
        veneerSlider.addEventListener('input', (e) => {
            const val = parseFloat(e.target.value);
            const percent = val * 100;
            if (veneerLabel) {
                if (val < 0.15) {
                    veneerLabel.textContent = 'Facette E.max plaquée sur l\'émail (Zéro fraisage)';
                    if (veneerCallout) veneerCallout.style.transform = 'translate(0px, 0px) scale(1)';
                } else if (val < 0.6) {
                    veneerLabel.textContent = `Ajustage micrométrique en cours (${Math.round(percent)}%)`;
                    if (veneerCallout) veneerCallout.style.transform = `translate(${-percent * 0.45}px, ${percent * 0.35}px) scale(1.04)`;
                } else {
                    veneerLabel.textContent = 'Facette E.max détachée pour inspection 360°';
                    if (veneerCallout) veneerCallout.style.transform = `translate(${-percent * 0.75}px, ${percent * 0.55}px) scale(1.08)`;
                }
            }
        });
    }

    // Curseur d'aligneur transparent
    const alignerSlider = document.getElementById('aligner-slider');
    const alignerLabel = document.getElementById('aligner-value-label');
    if (alignerSlider) {
        alignerSlider.addEventListener('input', (e) => {
            const val = parseFloat(e.target.value);
            if (alignerLabel) {
                if (val < 0.2) alignerLabel.textContent = 'Phase 1 : Chevauchement initial (-15°)';
                else if (val < 0.8) alignerLabel.textContent = `Phase de redressement dynamique (${Math.round(val * 100)}%)`;
                else alignerLabel.textContent = 'Phase finale : Alignement idéal du sourire (100%)';
            }
            if (alignerHalo) {
                alignerHalo.style.opacity = `${0.3 + val * 0.7}`;
            }
        });
    }

    // Curseur de blanchiment interactif
    const whiteningSlider = document.getElementById('whitening-slider');
    const whiteningValueLabel = document.getElementById('whitening-value-label');
    if (whiteningSlider) {
        whiteningSlider.addEventListener('input', (e) => {
            const val = parseFloat(e.target.value);
            if (whiteningValueLabel) {
                if (val < 0.3) whiteningValueLabel.textContent = 'Teinte A3.5 (Naturelle ambrée)';
                else if (val < 0.7) whiteningValueLabel.textContent = 'Teinte A1 (Standard lumineux)';
                else whiteningValueLabel.textContent = 'Teinte B1 (Éclat Hollywood Smile)';
            }
            if (scanImg) {
                const brightness = 1 + val * 0.25;
                const contrast = 1 + val * 0.15;
                scanImg.style.filter = `brightness(${brightness}) contrast(${contrast}) drop-shadow(0 20px 35px rgba(0,0,0,0.85))`;
            }
        });
    }

    // 3. Curseur interactif Avant / Après (Split Slider)
    const splitSlider = document.getElementById('before-after-split-slider');
    const beforeImageWrap = document.getElementById('before-image-wrap');
    const splitDividerHandle = document.getElementById('split-divider-handle');

    if (splitSlider && beforeImageWrap && splitDividerHandle) {
        const updateSplit = (percent) => {
            const clamped = Math.max(0, Math.min(100, percent));
            beforeImageWrap.style.width = `${clamped}%`;
            splitDividerHandle.style.left = `${clamped}%`;
        };

        splitSlider.addEventListener('input', (e) => {
            updateSplit(e.target.value);
        });

        // Clic ou drag direct sur l'image
        const splitContainer = document.getElementById('before-after-container');
        if (splitContainer) {
            let isDraggingSplit = false;
            const handleMove = (clientX) => {
                const rect = splitContainer.getBoundingClientRect();
                const x = clientX - rect.left;
                const percent = (x / rect.width) * 100;
                splitSlider.value = percent;
                updateSplit(percent);
            };

            splitContainer.addEventListener('mousedown', (e) => {
                isDraggingSplit = true;
                handleMove(e.clientX);
            });
            window.addEventListener('mousemove', (e) => {
                if (isDraggingSplit) handleMove(e.clientX);
            });
            window.addEventListener('mouseup', () => isDraggingSplit = false);

            splitContainer.addEventListener('touchstart', (e) => {
                if (e.touches.length === 1) {
                    isDraggingSplit = true;
                    handleMove(e.touches[0].clientX);
                }
            }, { passive: true });
            window.addEventListener('touchmove', (e) => {
                if (isDraggingSplit && e.touches.length === 1) {
                    handleMove(e.touches[0].clientX);
                }
            }, { passive: true });
            window.addEventListener('touchend', () => isDraggingSplit = false);
        }
    }

    // Bascule entre Moteur WebGL custom & Spline Embed
    const switchSplineBtn = document.getElementById('toggle-spline-btn');
    const splineContainer = document.getElementById('spline-embed-container');
    const threeContainer = document.getElementById('dental-hero-canvas');
    if (switchSplineBtn && splineContainer && threeContainer) {
        switchSplineBtn.addEventListener('click', () => {
            const isSplineActive = !splineContainer.classList.contains('hidden');
            if (isSplineActive) {
                splineContainer.classList.add('hidden');
                threeContainer.classList.remove('hidden');
                switchSplineBtn.innerHTML = `
                    <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
                    <span>Basculer sur Scène Spline Design</span>
                `;
            } else {
                splineContainer.classList.remove('hidden');
                threeContainer.classList.add('hidden');
                switchSplineBtn.innerHTML = `
                    <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
                    <span>Revenir au Rendu 3D Haute Définition</span>
                `;
            }
        });
    }

    // 4. Formulaire de rendez-vous (AJAX + persistance SQLite)
    const appointmentForm = document.getElementById('appointment-form');
    const submitBtn = document.getElementById('submit-rdv-btn');

    if (appointmentForm) {
        appointmentForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            // Honeypot check
            const hp = appointmentForm.querySelector('input[name="website_hp"]');
            if (hp && hp.value.length > 0) {
                alert('Requête non autorisée.');
                return;
            }

            const originalBtnText = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = `
                <svg class="animate-spin -ml-1 mr-2 h-5 w-5 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                </svg>
                Enregistrement sécurisé...
            `;

            document.querySelectorAll('.field-error-msg').forEach(el => el.textContent = '');
            const formData = new FormData(appointmentForm);

            try {
                const response = await fetch(appointmentForm.action, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                    },
                    body: formData
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    appointmentForm.reset();
                    showNotificationModal(data.appointment, data.notification_preview);
                    updateLiveAppointmentBadge();
                } else if (response.status === 422) {
                    if (data.errors) {
                        for (const [field, messages] of Object.entries(data.errors)) {
                            const errEl = document.getElementById(`error-${field}`);
                            if (errEl) errEl.textContent = messages[0];
                        }
                    }
                } else {
                    alert('Une erreur est survenue lors de l\'enregistrement. Veuillez réessayer.');
                }
            } catch (error) {
                console.error('Erreur submission:', error);
                alert('Erreur réseau. Veuillez vérifier votre connexion.');
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
            }
        });
    }

    // Modal de confirmation & aperçu SMS
    function showNotificationModal(appointment, notification) {
        const modal = document.getElementById('notification-modal');
        if (!modal) return;

        document.getElementById('notif-patient-name').textContent = appointment.name;
        document.getElementById('notif-ref-code').textContent = appointment.reference;
        document.getElementById('notif-treatment').textContent = appointment.treatment;
        document.getElementById('notif-slot').textContent = `${appointment.date} (${appointment.slot})`;
        document.getElementById('notif-phone').textContent = appointment.phone;
        document.getElementById('notif-timestamp').textContent = notification.timestamp || new Date().toLocaleString('fr-FR');
        document.getElementById('notif-body-text').textContent = notification.message || '';

        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    const closeNotifBtn = document.getElementById('close-notif-btn');
    if (closeNotifBtn) {
        closeNotifBtn.addEventListener('click', () => {
            const modal = document.getElementById('notification-modal');
            if (modal) modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        });
    }

    // Drawer de consultation des RDV capturés en démo (SQLite)
    const openDemoAdminBtn = document.getElementById('open-demo-admin-btn');
    const demoAdminDrawer = document.getElementById('demo-admin-drawer');
    const closeDemoAdminBtn = document.getElementById('close-demo-admin-btn');
    const refreshAppointmentsBtn = document.getElementById('refresh-appointments-btn');
    const resetDemoBtn = document.getElementById('reset-demo-btn');

    if (openDemoAdminBtn && demoAdminDrawer) {
        openDemoAdminBtn.addEventListener('click', () => {
            demoAdminDrawer.classList.remove('translate-x-full');
            loadDemoAppointments();
        });
    }

    if (closeDemoAdminBtn && demoAdminDrawer) {
        closeDemoAdminBtn.addEventListener('click', () => {
            demoAdminDrawer.classList.add('translate-x-full');
        });
    }

    if (refreshAppointmentsBtn) refreshAppointmentsBtn.addEventListener('click', loadDemoAppointments);

    if (resetDemoBtn) {
        resetDemoBtn.addEventListener('click', async () => {
            if (confirm('Voulez-vous réinitialiser les enregistrements de test de la base SQLite ?')) {
                try {
                    const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                    const res = await fetch('/api/demo/reset', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrf,
                            'Accept': 'application/json'
                        }
                    });
                    if (res.ok) {
                        loadDemoAppointments();
                        updateLiveAppointmentBadge();
                    }
                } catch (e) {
                    console.error(e);
                }
            }
        });
    }

    async function loadDemoAppointments() {
        const listContainer = document.getElementById('demo-appointments-list');
        if (!listContainer) return;

        listContainer.innerHTML = '<div class="p-6 text-center text-slate-500">Chargement de la base SQLite...</div>';

        try {
            const res = await fetch('/api/demo/appointments');
            const data = await res.json();

            if (data.appointments && data.appointments.length > 0) {
                listContainer.innerHTML = data.appointments.map(item => `
                    <div class="bg-white p-4 rounded-xl border border-slate-200/80 shadow-sm space-y-2 hover:border-teal-500 transition-all">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-mono font-semibold px-2 py-0.5 rounded bg-teal-50 text-teal-800 border border-teal-200">#${item.reference}</span>
                            <span class="text-xs text-slate-400">${item.created_at}</span>
                        </div>
                        <div class="font-semibold text-navy-800">${item.name}</div>
                        <div class="text-xs text-slate-600 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            ${item.phone}
                        </div>
                        <div class="text-xs font-medium text-teal-700 bg-teal-50/60 p-2 rounded-lg">
                            ${item.treatment} (${item.slot})
                        </div>
                        ${item.message ? `<p class="text-xs text-slate-500 italic bg-slate-50 p-2 rounded">"${item.message}"</p>` : ''}
                    </div>
                `).join('');
            } else {
                listContainer.innerHTML = '<div class="p-8 text-center text-slate-400">Aucun rendez-vous enregistré.</div>';
            }
        } catch (e) {
            listContainer.innerHTML = '<div class="p-6 text-center text-red-500">Erreur de lecture SQLite.</div>';
        }
    }

    async function updateLiveAppointmentBadge() {
        try {
            const res = await fetch('/api/demo/appointments');
            const data = await res.json();
            const badge = document.getElementById('demo-appointments-count-badge');
            if (badge) badge.textContent = data.count || '0';
        } catch (e) {}
    }

    // 5. Tiroir détail du soin
    const treatmentCards = document.querySelectorAll('[data-treatment-modal]');
    const treatmentDrawer = document.getElementById('treatment-detail-drawer');
    const closeTreatmentBtn = document.getElementById('close-treatment-drawer-btn');

    treatmentCards.forEach(card => {
        card.addEventListener('click', () => {
            const data = JSON.parse(card.dataset.treatmentData);
            document.getElementById('drawer-treatment-name').textContent = data.name;
            document.getElementById('drawer-treatment-category').textContent = data.category;
            document.getElementById('drawer-treatment-summary').textContent = data.summary;
            document.getElementById('drawer-treatment-duration').textContent = data.duration;
            document.getElementById('drawer-treatment-tech').textContent = data.tech;
            document.getElementById('drawer-treatment-pricing').textContent = data.pricing_hint;

            const stepsList = document.getElementById('drawer-treatment-steps');
            stepsList.innerHTML = data.steps.map((st, idx) => `
                <li class="flex items-start gap-3">
                    <span class="flex-shrink-0 w-6 h-6 rounded-full bg-teal-50 text-teal-700 border border-teal-200 text-xs font-bold flex items-center justify-center">${idx + 1}</span>
                    <span class="text-sm text-slate-600">${st}</span>
                </li>
            `).join('');

            const selectBtn = document.getElementById('drawer-select-treatment-btn');
            if (selectBtn) {
                selectBtn.onclick = () => {
                    treatmentDrawer.classList.add('translate-x-full');
                    const selectEl = document.querySelector('select[name="treatment"]');
                    if (selectEl) selectEl.value = data.id;
                    const rdvSection = document.getElementById('rdv-section');
                    if (rdvSection) rdvSection.scrollIntoView({ behavior: 'smooth' });
                };
            }

            treatmentDrawer.classList.remove('translate-x-full');
        });
    });

    if (closeTreatmentBtn && treatmentDrawer) {
        closeTreatmentBtn.addEventListener('click', () => {
            treatmentDrawer.classList.add('translate-x-full');
        });
    }

    // 6. Accordéon FAQ
    const faqButtons = document.querySelectorAll('[data-faq-toggle]');
    faqButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const answer = btn.nextElementSibling;
            const icon = btn.querySelector('.faq-icon');
            const isOpen = !answer.classList.contains('hidden');

            faqButtons.forEach(otherBtn => {
                const otherAnswer = otherBtn.nextElementSibling;
                const otherIcon = otherBtn.querySelector('.faq-icon');
                if (otherAnswer && !otherAnswer.classList.contains('hidden')) {
                    otherAnswer.classList.add('hidden');
                    if (otherIcon) otherIcon.style.transform = 'rotate(0deg)';
                }
            });

            if (!isOpen) {
                answer.classList.remove('hidden');
                if (icon) icon.style.transform = 'rotate(180deg)';
            }
        });
    });

    // 7. Mobile Menu
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
        mobileMenu.querySelectorAll('a').forEach(a => {
            a.addEventListener('click', () => mobileMenu.classList.add('hidden'));
        });
    }
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', startApp);
} else {
    startApp();
}
