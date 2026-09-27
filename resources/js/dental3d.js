import * as THREE from 'three';

/**
 * Moteur 3D Clinique Haute Précision — Sourire Clinic Casablanca
 * 
 * 1. Mode Incisive Centrale Esthétique (La Dent Star) :
 *    Couronne anatomique avec galbe vestibulaire, lobes de développement, cingulum palatin,
 *    collet festonné, racine effilée et facette pelliculaire E.max détachable (0.25 mm).
 * 
 * 2. Mode Arcade Sourire Harmonieuse (Golden Ratio) :
 *    Alignement parfait des 6 dents antérieures (13 à 23) selon les proportions d'or,
 *    parfaitement rectifiées et symétriques.
 * 
 * 3. Mode Molaire Anatomique :
 *    4 cuspides sculptées avec sillons occlusaux et double racine.
 */
export class DentalHero3D {
    constructor(containerId) {
        this.container = document.getElementById(containerId);
        if (!this.container) return;

        this.currentMode = 'veneer'; // 'veneer' | 'tooth' | 'arch' | 'aligner' | 'molar' | 'scanner' | 'whitening'
        this.veneerOffset = 0.0;
        this.alignerProgress = 1.0;
        this.whiteningLevel = 0.90;

        this.targetRotationX = 0.12;
        this.targetRotationY = 0.0;
        this.currentRotationX = 0.12;
        this.currentRotationY = 0.0;
        this.isDragging = false;

        this.init();
    }

    init() {
        const rect = this.container.getBoundingClientRect();
        this.width = Math.max(rect.width || this.container.clientWidth || 540, 320);
        this.height = Math.max(rect.height || this.container.clientHeight || 450, 380);

        this.scene = new THREE.Scene();
        this.camera = new THREE.PerspectiveCamera(28, this.width / this.height, 0.1, 100);
        this.camera.position.set(0, 0.1, 7.8);
        this.camera.lookAt(0, 0, 0);

        this.renderer = new THREE.WebGLRenderer({
            antialias: true,
            alpha: true,
            powerPreference: 'high-performance'
        });
        this.renderer.setSize(this.width, this.height);
        this.renderer.setPixelRatio(Math.min(window.devicePixelRatio || 1, 2));
        this.renderer.toneMapping = THREE.ACESFilmicToneMapping;
        this.renderer.toneMappingExposure = 1.25;

        this.renderer.domElement.style.width = '100%';
        this.renderer.domElement.style.height = '100%';
        this.renderer.domElement.style.display = 'block';

        this.container.innerHTML = '';
        this.container.appendChild(this.renderer.domElement);

        this.rootGroup = new THREE.Group();
        this.scene.add(this.rootGroup);

        this.setupStudioLights();
        this.createMaterials();

        // Groupes de modèles
        this.buildSingleToothModel();
        this.buildSmileArchModel();
        this.buildMolarModel();

        this.createAtmosphere();
        this.createLaserScanner();
        this.bindEvents();

        this.startTime = performance.now();
        this.animate = this.animate.bind(this);
        requestAnimationFrame(this.animate);

        this.setMode('veneer');

        setTimeout(() => this.onResize(), 100);
        setTimeout(() => this.onResize(), 400);
    }

    setupStudioLights() {
        const ambient = new THREE.AmbientLight(0xf0f7ff, 1.8);
        this.scene.add(ambient);

        // Scialytique principal avant-droit
        this.keyLight = new THREE.DirectionalLight(0xffffff, 3.2);
        this.keyLight.position.set(3.5, 4.5, 6.0);
        this.scene.add(this.keyLight);

        // Lumière d'appoint avant-gauche (menthe très douce)
        this.fillLight = new THREE.DirectionalLight(0xE0F7FA, 2.2);
        this.fillLight.position.set(-4.0, 3.0, 5.0);
        this.scene.add(this.fillLight);

        // Éclairage turquoise pour reflets émail
        this.tealLight = new THREE.PointLight(0x0D9488, 3.5, 20);
        this.tealLight.position.set(-3.0, 0.5, 4.0);
        this.scene.add(this.tealLight);

        // Rim Light de contour arrière
        this.rimLight = new THREE.DirectionalLight(0x38BDF8, 2.4);
        this.rimLight.position.set(0, 5.0, -4.0);
        this.scene.add(this.rimLight);

        // Lumière inférieure
        this.bottomLight = new THREE.PointLight(0xFFE4E6, 1.2, 12);
        this.bottomLight.position.set(0, -4.0, 3.0);
        this.scene.add(this.bottomLight);
    }

    createMaterials() {
        // Émail Dentaire Naturel PBR (Organique, vernis liquide claircoat, reflets irisés)
        this.enamelMaterial = new THREE.MeshPhysicalMaterial({
            color: new THREE.Color(0xFAFCFF),
            roughness: 0.12,
            metalness: 0.0,
            clearcoat: 1.0,
            clearcoatRoughness: 0.03,
            reflectivity: 0.95,
            sheen: 0.85,
            sheenColor: new THREE.Color(0x99F6E4),
            side: THREE.DoubleSide
        });

        // Facette Céramique No-Prep E.max (Porcelaine feldspathique ultra-blanche polie miroir)
        this.veneerMaterial = new THREE.MeshPhysicalMaterial({
            color: new THREE.Color(0xFFFFFF),
            roughness: 0.02,
            metalness: 0.0,
            clearcoat: 1.0,
            clearcoatRoughness: 0.01,
            reflectivity: 1.0,
            sheen: 1.0,
            sheenColor: new THREE.Color(0x5EEAD4),
            side: THREE.DoubleSide
        });

        // Gencive Esthétique Rose Saine
        this.gingivaMaterial = new THREE.MeshStandardMaterial({
            color: 0xEE8290,
            roughness: 0.45,
            metalness: 0.0,
            side: THREE.DoubleSide
        });

        // Gouttière Aligneurs 3D
        this.alignerMaterial = new THREE.MeshPhysicalMaterial({
            color: new THREE.Color(0xBAE6FD),
            roughness: 0.04,
            metalness: 0.0,
            clearcoat: 1.0,
            transparent: true,
            opacity: 0.48,
            reflectivity: 0.92,
            side: THREE.DoubleSide
        });

        // Scanner Optique LiDAR 3D
        this.scannerMaterial = new THREE.MeshStandardMaterial({
            color: 0x00F0FF,
            wireframe: true,
            emissive: 0x0D9488,
            emissiveIntensity: 0.95
        });
    }

    /**
     * MODÈLE 1 : INCISIVE CENTRALE ANATOMIQUE HD (LA DENT MAJESTUEUSE)
     * Reproduit fidèlement une incisive centrale supérieure avec sa couronne trapézoïdale,
     * ses 3 lobes vestibulaires, son collet festonné et sa facette E.max ultra-fine.
     */
    buildSingleToothModel() {
        this.singleToothGroup = new THREE.Group();
        this.rootGroup.add(this.singleToothGroup);

        // 1. Couronne clinique anatomique
        const crownWidth = 1.50;
        const crownHeight = 1.90;
        const crownDepth = 0.85;

        const crownGeo = new THREE.CylinderGeometry(0.5, 0.5, crownHeight, 48, 36, false);
        const pos = crownGeo.attributes.position;

        for (let i = 0; i < pos.count; i++) {
            let x = pos.getX(i);
            let y = pos.getY(i); // De +h/2 (collet) à -h/2 (bord libre tranchant)
            let z = pos.getZ(i);

            const ny = Math.max(0, Math.min(1, (crownHeight / 2 - y) / crownHeight));
            const angle = Math.atan2(z, x);
            const isVestibular = Math.sin(angle) > 0;

            // Forme de profil : collet ovale en haut, tranchant fin biseauté en bas
            const curW = crownWidth * (0.75 + 0.38 * ny);
            const curT = crownDepth * (1.15 - 0.78 * ny);

            x = Math.cos(angle) * (curW * 0.5);
            z = Math.sin(angle) * (curT * 0.5);

            // Galbe vestibulaire naturel
            if (isVestibular) {
                const centerDist = 1 - Math.min(1, Math.abs(x) / (curW * 0.5));
                // Bombé au tiers moyen
                const bulge = Math.sin(ny * Math.PI) * 0.12;
                z += centerDist * 0.10 + bulge;

                // Deux dépressions verticales séparant les lobes de développement
                const lobeDepression = Math.sin((x / curW) * Math.PI * 4.0) * 0.02 * ny;
                z += lobeDepression;
            }

            // Bord libre incisif avec coins légèrement arrondis
            if (ny > 0.90) {
                const cornerDist = Math.abs(x) / (curW * 0.5);
                y += Math.pow(cornerDist, 3.0) * 0.08;
            }

            pos.setXYZ(i, x, y, z);
        }
        crownGeo.computeVertexNormals();

        this.singleCrownMesh = new THREE.Mesh(crownGeo, this.enamelMaterial);
        this.singleCrownMesh.position.y = -0.2;
        this.singleToothGroup.add(this.singleCrownMesh);

        // 2. Racine conique effilée anatomique
        const rootGeo = new THREE.CylinderGeometry(0.58, 0.12, 2.5, 36, 32);
        const rPos = rootGeo.attributes.position;
        for (let i = 0; i < rPos.count; i++) {
            let rx = rPos.getX(i);
            let ry = rPos.getY(i);
            let rz = rPos.getZ(i);

            // Légère courbure apicale distale
            const rt = (ry + 1.25) / 2.5; // 0 en bas (apex), 1 en haut (collet)
            rx -= Math.pow(1 - rt, 2.0) * 0.22;
            rz -= Math.pow(1 - rt, 2.0) * 0.10;

            rPos.setXYZ(i, rx, ry, rz);
        }
        rootGeo.computeVertexNormals();

        this.singleRootMesh = new THREE.Mesh(rootGeo, this.enamelMaterial);
        this.singleRootMesh.position.set(0, 1.95, -0.05);
        this.singleToothGroup.add(this.singleRootMesh);

        // 3. Collet festonné rose (gencive)
        const collarGeo = new THREE.TorusGeometry(0.82, 0.18, 16, 48);
        this.singleCollarMesh = new THREE.Mesh(collarGeo, this.gingivaMaterial);
        this.singleCollarMesh.rotation.x = Math.PI / 2;
        this.singleCollarMesh.position.set(0, 0.78, 0);
        this.singleToothGroup.add(this.singleCollarMesh);

        // 4. Facette pelliculaire E.max (0.25 mm) détachable
        const vGeo = new THREE.CylinderGeometry(0.51, 0.51, crownHeight * 0.98, 36, 24, true, 0, Math.PI);
        const vPos = vGeo.attributes.position;
        for (let i = 0; i < vPos.count; i++) {
            let vx = vPos.getX(i);
            let vy = vPos.getY(i);
            let vz = vPos.getZ(i);

            const vny = Math.max(0, Math.min(1, (crownHeight / 2 - vy) / crownHeight));
            const vAngle = Math.atan2(vz, vx);

            const curW = crownWidth * (0.75 + 0.38 * vny);
            const curT = crownDepth * (1.15 - 0.78 * vny);

            vx = Math.cos(vAngle) * (curW * 0.51);
            vz = Math.sin(vAngle) * (curT * 0.51);

            const centerDist = 1 - Math.min(1, Math.abs(vx) / (curW * 0.5));
            const bulge = Math.sin(vny * Math.PI) * 0.12;
            vz += centerDist * 0.10 + bulge + 0.03;

            vPos.setXYZ(i, vx, vy, vz);
        }
        vGeo.computeVertexNormals();

        this.singleVeneerMesh = new THREE.Mesh(vGeo, this.veneerMaterial);
        this.singleVeneerMesh.position.set(0, -0.2, 0.02);
        this.singleToothGroup.add(this.singleVeneerMesh);

        this.singleToothGroup.position.set(0, -0.4, 0);
        this.singleToothGroup.scale.set(1.4, 1.4, 1.4);
    }

    /**
     * MODÈLE 2 : ARCADE SOURIRE HARMONIEUSE (6 DENTS PARFAITEMENT ALIGNÉES)
     */
    buildSmileArchModel() {
        this.archGroup = new THREE.Group();
        this.rootGroup.add(this.archGroup);

        this.archTeeth = [];

        // 6 dents selon les proportions d'or, parfaitement alignées
        const teethData = [
            { id: '13', name: 'Canine D',          x: -1.75, z: -0.45, rotY:  0.30, w: 0.72, h: 1.15, t: 0.52, isCanine: true },
            { id: '12', name: 'Incisive Latérale D', x: -1.05, z: -0.12, rotY:  0.15, w: 0.65, h: 1.02, t: 0.40, isCanine: false },
            { id: '11', name: 'Incisive Centrale D', x: -0.38, z:  0.04, rotY:  0.04, w: 0.76, h: 1.18, t: 0.44, isCanine: false },
            { id: '21', name: 'Incisive Centrale G', x:  0.38, z:  0.04, rotY: -0.04, w: 0.76, h: 1.18, t: 0.44, isCanine: false },
            { id: '22', name: 'Incisive Latérale G', x:  1.05, z: -0.12, rotY: -0.15, w: 0.65, h: 1.02, t: 0.40, isCanine: false },
            { id: '23', name: 'Canine G',          x:  1.75, z: -0.45, rotY: -0.30, w: 0.72, h: 1.15, t: 0.52, isCanine: true },
        ];

        teethData.forEach(td => {
            const toothGroup = new THREE.Group();
            toothGroup.position.set(td.x, 0.0, td.z);
            toothGroup.rotation.y = td.rotY;

            const tGeo = new THREE.CylinderGeometry(0.5, 0.5, td.h, 32, 24, false);
            const pos = tGeo.attributes.position;
            for (let i = 0; i < pos.count; i++) {
                let x = pos.getX(i);
                let y = pos.getY(i);
                let z = pos.getZ(i);

                const ny = Math.max(0, Math.min(1, (td.h / 2 - y) / td.h));
                const angle = Math.atan2(z, x);
                const isVestibular = Math.sin(angle) > 0;

                const curW = td.w * (0.78 + 0.32 * ny);
                const curT = td.t * (1.10 - 0.70 * ny);

                x = Math.cos(angle) * (curW * 0.5);
                z = Math.sin(angle) * (curT * 0.5);

                if (isVestibular) {
                    const centerDist = 1 - Math.min(1, Math.abs(x) / (curW * 0.5));
                    z += centerDist * 0.08 + Math.sin(ny * Math.PI) * 0.06;
                    if (td.isCanine) z += (1 - Math.abs(x / (curW * 0.4))) * 0.08;
                }

                if (ny > 0.90) {
                    const cd = Math.abs(x) / (curW * 0.5);
                    if (td.isCanine) y -= (1 - Math.min(1, cd)) * 0.12;
                    else y += Math.pow(cd, 2.5) * 0.04;
                }

                pos.setXYZ(i, x, y, z);
            }
            tGeo.computeVertexNormals();

            const mesh = new THREE.Mesh(tGeo, this.enamelMaterial);
            toothGroup.add(mesh);

            this.archGroup.add(toothGroup);
            this.archTeeth.push({ id: td.id, group: toothGroup, data: td, mesh });
        });

        // Gencive supérieure
        const gumCurve = new THREE.CatmullRomCurve3([
            new THREE.Vector3(-2.1, 0.60, -0.65),
            new THREE.Vector3(-1.4, 0.62, -0.32),
            new THREE.Vector3(-0.7, 0.64, -0.05),
            new THREE.Vector3( 0.0, 0.65,  0.08),
            new THREE.Vector3( 0.7, 0.64, -0.05),
            new THREE.Vector3( 1.4, 0.62, -0.32),
            new THREE.Vector3( 2.1, 0.60, -0.65)
        ]);
        const gumGeo = new THREE.TubeGeometry(gumCurve, 40, 0.20, 16, false);
        this.gumMesh = new THREE.Mesh(gumGeo, this.gingivaMaterial);
        this.gumMesh.position.set(0, 0.05, -0.05);
        this.archGroup.add(this.gumMesh);

        // Gouttière transparente aligneur
        const alignerGeo = new THREE.TubeGeometry(gumCurve, 40, 0.44, 18, false);
        this.alignerArchMesh = new THREE.Mesh(alignerGeo, this.alignerMaterial);
        this.alignerArchMesh.position.set(0, -0.45, 0.02);
        this.alignerArchMesh.visible = false;
        this.archGroup.add(this.alignerArchMesh);

        this.archGroup.position.set(0, -0.15, 0);
        this.archGroup.scale.set(1.15, 1.15, 1.15);
        this.archGroup.visible = false;
    }

    /**
     * MODÈLE 3 : MOLAIRE ANATOMIQUE À 4 CUSPIDES
     */
    buildMolarModel() {
        this.molarGroup = new THREE.Group();
        this.rootGroup.add(this.molarGroup);

        const crownGeo = new THREE.CylinderGeometry(1.30, 1.10, 1.40, 48, 32);
        const pos = crownGeo.attributes.position;
        for (let i = 0; i < pos.count; i++) {
            let x = pos.getX(i);
            let y = pos.getY(i);
            let z = pos.getZ(i);
            const r = Math.sqrt(x * x + z * z);
            const angle = Math.atan2(z, x);

            if (y > 0.2) {
                const cusp = Math.sin(angle * 4.0 - 0.4) * 0.26 * (r / 1.2);
                const pit = Math.exp(-r * r * 3.5) * 0.50;
                y += cusp - pit;
            }
            pos.setXYZ(i, x, y, z);
        }
        crownGeo.computeVertexNormals();

        this.molarCrownMesh = new THREE.Mesh(crownGeo, this.enamelMaterial);
        this.molarCrownMesh.position.y = 0.5;
        this.molarGroup.add(this.molarCrownMesh);

        const r1Geo = new THREE.ConeGeometry(0.38, 1.9, 24);
        r1Geo.rotateX(Math.PI);
        const r1 = new THREE.Mesh(r1Geo, this.enamelMaterial);
        r1.position.set(-0.45, -1.0, 0);
        this.molarGroup.add(r1);

        const r2Geo = new THREE.ConeGeometry(0.38, 1.9, 24);
        r2Geo.rotateX(Math.PI);
        const r2 = new THREE.Mesh(r2Geo, this.enamelMaterial);
        r2.position.set(0.45, -1.0, 0);
        this.molarGroup.add(r2);

        this.molarGroup.position.set(0, 0.0, 0);
        this.molarGroup.scale.set(1.2, 1.2, 1.2);
        this.molarGroup.visible = false;
    }

    createAtmosphere() {
        const count = 40;
        const geo = new THREE.BufferGeometry();
        const pos = new Float32Array(count * 3);
        for (let i = 0; i < count; i++) {
            pos[i * 3] = (Math.random() - 0.5) * 8.0;
            pos[i * 3 + 1] = (Math.random() - 0.5) * 6.0;
            pos[i * 3 + 2] = (Math.random() - 0.5) * 5.0;
        }
        geo.setAttribute('position', new THREE.BufferAttribute(pos, 3));
        const mat = new THREE.PointsMaterial({
            color: 0x0D9488,
            size: 0.12,
            transparent: true,
            opacity: 0.50,
            blending: THREE.AdditiveBlending
        });
        this.particles = new THREE.Points(geo, mat);
        this.scene.add(this.particles);
    }

    createLaserScanner() {
        const ringGeo = new THREE.RingGeometry(0.1, 3.2, 48);
        const ringMat = new THREE.MeshBasicMaterial({
            color: 0x00F0FF,
            side: THREE.DoubleSide,
            transparent: true,
            opacity: 0.0,
            blending: THREE.AdditiveBlending
        });
        this.laserRing = new THREE.Mesh(ringGeo, ringMat);
        this.laserRing.rotation.x = Math.PI / 2;
        this.scene.add(this.laserRing);
    }

    bindEvents() {
        window.addEventListener('mousemove', (e) => {
            if (!this.container) return;
            const rect = this.container.getBoundingClientRect();
            if (e.clientY >= rect.top - 120 && e.clientY <= rect.bottom + 250) {
                const nx = (e.clientX - (rect.left + rect.width / 2)) / (rect.width / 2);
                const ny = (e.clientY - (rect.top + rect.height / 2)) / (rect.height / 2);

                if (!this.isDragging) {
                    this.targetRotationY = nx * 0.55;
                    this.targetRotationX = ny * 0.22 + 0.12;
                }
            }
        });

        let prevX = 0, prevY = 0;
        const onDown = (x, y) => {
            this.isDragging = true;
            prevX = x;
            prevY = y;
            if (this.container) this.container.style.cursor = 'grabbing';
        };

        const onMove = (x, y) => {
            if (!this.isDragging) return;
            const dx = x - prevX;
            const dy = y - prevY;

            this.targetRotationY += dx * 0.0075;
            this.targetRotationX += dy * 0.0075;
            this.targetRotationX = Math.max(-0.4, Math.min(0.6, this.targetRotationX));

            prevX = x;
            prevY = y;
        };

        const onUp = () => {
            this.isDragging = false;
            if (this.container) this.container.style.cursor = 'grab';
        };

        this.container.addEventListener('mousedown', (e) => onDown(e.clientX, e.clientY));
        window.addEventListener('mousemove', (e) => onMove(e.clientX, e.clientY));
        window.addEventListener('mouseup', onUp);

        this.container.addEventListener('touchstart', (e) => {
            if (e.touches.length === 1) onDown(e.touches[0].clientX, e.touches[0].clientY);
        }, { passive: true });

        window.addEventListener('touchmove', (e) => {
            if (this.isDragging && e.touches.length === 1) onMove(e.touches[0].clientX, e.touches[0].clientY);
        }, { passive: true });

        window.addEventListener('touchend', onUp);
        window.addEventListener('resize', () => this.onResize());
    }

    onResize() {
        if (!this.container || !this.renderer || !this.camera) return;
        const rect = this.container.getBoundingClientRect();
        this.width = Math.max(rect.width || this.container.clientWidth || 540, 320);
        this.height = Math.max(rect.height || this.container.clientHeight || 450, 380);

        this.camera.aspect = this.width / this.height;
        this.camera.updateProjectionMatrix();
        this.renderer.setSize(this.width, this.height);
    }

    setMode(mode) {
        this.currentMode = mode;

        if (mode === 'veneer') {
            // Mode Dent Star + Facette No-Prep
            this.singleToothGroup.visible = true;
            this.archGroup.visible = false;
            this.molarGroup.visible = false;

            this.singleVeneerMesh.visible = true;
            if (this.laserRing) this.laserRing.material.opacity = 0.0;
            this.setMaterialToAll(this.enamelMaterial);
            this.setVeneerOffset(this.veneerOffset);
            this.applyWhitening(this.whiteningLevel);
        } else if (mode === 'aligner') {
            // Mode Arcade Sourire + Aligneur transparent
            this.singleToothGroup.visible = false;
            this.archGroup.visible = true;
            this.molarGroup.visible = false;

            if (this.alignerArchMesh) this.alignerArchMesh.visible = true;
            if (this.laserRing) this.laserRing.material.opacity = 0.0;
            this.setMaterialToAll(this.enamelMaterial);
            this.setAlignerProgress(this.alignerProgress);
        } else if (mode === 'molar') {
            // Mode Molaire Anatomique
            this.singleToothGroup.visible = false;
            this.archGroup.visible = false;
            this.molarGroup.visible = true;

            if (this.laserRing) this.laserRing.material.opacity = 0.0;
            this.applyWhitening(this.whiteningLevel);
        } else if (mode === 'scanner') {
            // Mode Scanner Optique
            this.singleToothGroup.visible = true;
            this.archGroup.visible = false;
            this.molarGroup.visible = false;

            this.singleVeneerMesh.visible = false;
            this.setMaterialToAll(this.scannerMaterial);
            if (this.laserRing) this.laserRing.material.opacity = 0.85;
        } else if (mode === 'whitening') {
            // Mode Blanchiment Nuancier
            this.singleToothGroup.visible = true;
            this.archGroup.visible = false;
            this.molarGroup.visible = false;

            this.singleVeneerMesh.visible = true;
            if (this.laserRing) this.laserRing.material.opacity = 0.0;
            this.setMaterialToAll(this.enamelMaterial);
            this.setVeneerOffset(0.0);
            this.applyWhitening(this.whiteningLevel);
        }
    }

    setMaterialToAll(mat) {
        if (this.singleCrownMesh) this.singleCrownMesh.material = mat;
        if (this.singleRootMesh) this.singleRootMesh.material = mat;
        this.archTeeth.forEach(t => {
            if (t.mesh) t.mesh.material = mat;
        });
    }

    setVeneerOffset(val) {
        this.veneerOffset = val;
        if (this.singleVeneerMesh) {
            // La facette se détache vers l'avant (+Z) et s'élève légèrement
            this.singleVeneerMesh.position.z = 0.02 + val * 0.95;
            this.singleVeneerMesh.position.y = -0.2 - val * 0.05;
            this.singleVeneerMesh.rotation.x = val * 0.10;
        }
    }

    setAlignerProgress(val) {
        this.alignerProgress = val;
        if (this.archTeeth.length >= 4) {
            const malalignment = (1.0 - val) * 0.20;
            this.archTeeth[1].group.rotation.y = this.archTeeth[1].data.rotY + malalignment;
            this.archTeeth[2].group.rotation.z = -malalignment * 0.6;
            this.archTeeth[2].group.position.z = this.archTeeth[2].data.z - malalignment * 0.3;
        }
    }

    applyWhitening(val) {
        this.whiteningLevel = val;
        const warmA35 = new THREE.Color(0xF6E8CD);
        const pureB1 = new THREE.Color(0xFAFCFF);
        const currentColor = warmA35.clone().lerp(pureB1, val);

        this.enamelMaterial.color.copy(currentColor);
        this.enamelMaterial.sheenColor.set(val > 0.7 ? 0x99F6E4 : 0xE2E8F0);
        this.veneerMaterial.color.set(val > 0.7 ? 0xFFFFFF : 0xF9F6EE);
    }

    animate() {
        requestAnimationFrame(this.animate);
        const elapsedTime = (performance.now() - this.startTime) * 0.001;

        this.currentRotationY += (this.targetRotationY - this.currentRotationY) * 0.055;
        this.currentRotationX += (this.targetRotationX - this.currentRotationX) * 0.055;

        this.rootGroup.position.y = Math.sin(elapsedTime * 1.3) * 0.05;

        if (!this.isDragging) {
            this.targetRotationY += 0.0012;
        }

        this.rootGroup.rotation.y = this.currentRotationY;
        this.rootGroup.rotation.x = this.currentRotationX;

        if (this.currentMode === 'scanner') {
            this.laserRing.position.y = Math.sin(elapsedTime * 2.8) * 1.3;
            this.laserRing.rotation.z = elapsedTime * 0.7;
        }

        if (this.particles) {
            this.particles.rotation.y = elapsedTime * 0.025;
        }

        this.renderer.render(this.scene, this.camera);
    }
}
