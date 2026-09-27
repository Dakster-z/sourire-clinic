# Scène 3D Spline — Sourire Clinic (Kit Démo Réutilisable)

Ce dossier contient les ressources et directives pour personnaliser et réutiliser la scène 3D auprès de futurs prospects de cabinets dentaires au Maroc (ex: Dental Masters, cabinets d'esthétique dentaire à Casablanca, Rabat, Marrakech).

---

## 1. Modèles 3D Spline recommandés (Bibliothèque Spline Community)

Dans l'interface [Spline.design](https://spline.design) (compte gratuit) :

1. **Recherche 1 : « Dental Tooth » ou « Tooth Stylized »**
   - Modèle minimaliste de couronne dentaire blanche avec reflets lisses.
   - Idéal pour une réplique directe de l'organe dentaire.
   - Lien direct Spline Community : [spline.design/community](https://spline.design/community) (requêtes : *tooth, medical, organic sculpt, crystal*).

2. **Recherche 2 (Alternative moderne & plus abstraite) : « Organic Iridescent Pearl / Liquid Mesh »**
   - Sphère ou ruban organique blanc nacré avec reflets menthe/cyan (#0D9488) réagissant au scroll et au curseur.
   - L'effet "waouh" provient de la fluidité et du rendu studio Awwwards.

3. **Paramétrage des matériaux Spline aux couleurs de la clinique :**
   - **Couleur principale (Base Color) :** Blanc pur `#FAFAFA` ou nacré `#F4F7FB`
   - **Roughness :** 0.12 - 0.18 (effet émail dentaire poli)
   - **Clearcoat :** 1.0 (vernis protecteur vitrifié)
   - **Transmission / Dispersion :** 0.10 (translucidité naturelle du bord incisif)
   - **Lumière d'accentuation (Rim Light) :** Menthe / Teal `#0D9488`
   - **Lumière chaude secondaire :** Corail doux `#FF8C7A`

---

## 2. Intégration dans le projet Laravel Blade

### Méthode A : Iframe directe (zéro dépendance JS)

```html
<iframe src="https://my.spline.design/VOTRE_SCENE_ID/" 
        frameborder="0" width="100%" height="100%" loading="lazy"
        title="Modèle 3D Cabinet Dentaire">
</iframe>
```

### Méthode B : Runtime JS (pour contrôler la caméra ou réagir au scroll)

```html
<canvas id="canvas3d" class="w-full h-full"></canvas>

<script type="module">
  import { Application } from 'https://unpkg.com/@splinetool/runtime@latest/build/runtime.js';
  const canvas = document.getElementById('canvas3d');
  const app = new Application(canvas);
  app.load('https://prod.spline.design/VOTRE_SCENE_ID/scene.splinecode');
</script>
```

---

## 3. Scène Three.js native incluse en secours haute performance

Le projet inclut également un moteur 3D natif Three.js (`resources/js/dental3d.js`) qui :
- Génère la morphologie exacte d'une molaire anatomique (4 cuspides, sillon central et deux racines).
- Ne dépend d'aucun CDN tiers ou hébergement Spline payant.
- Tourne à 60 FPS garantis avec suivi du curseur de la souris (parallax) et rotation 360° par glissement.
- Propose 4 modes interactifs en direct :
  1. Émail nacré haute brillance
  2. Scanner LiDAR 3D (mode caméra optique intra-orale)
  3. Coupe anatomique (Émail, dentine, pulpe)
  4. Simulateur de blanchiment (changement de teinte A3.5 à B1)
