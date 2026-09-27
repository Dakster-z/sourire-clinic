# Sourire Clinic Casablanca — Démo Cabinet Dentaire 3D

> **Facteur différenciant n°1 :** Un **Hero 3D interactif** modélisant l'arcade dentaire supérieure, les facettes ultra-fines E.max No-Prep (0.25 mm) et les aligneurs transparents 3D, réactif au curseur et au toucher.
> Conçu pour faire dire au prospect : *« Je n'ai jamais vu ça chez un cabinet dentaire au Maroc »* et positionner l'offre largement au-dessus des standards du marché.

---

## ⚡ Démarrage Rapide sous VS Code (Local)

Pour lancer le projet directement sur votre machine locale dans Visual Studio Code :

### 1. Prérequis
- **PHP** (8.2 ou supérieur) avec extensions standard (`pdo_sqlite`, `mbstring`, `xml`, `curl`)
- **Composer** (gestionnaire de dépendances PHP)
- **Node.js** (v18 ou supérieur) & **NPM**

---

### 2. Lancement en 5 commandes simples

Ouvrez le terminal intégré de VS Code (`Ctrl + \`` ou `Cmd + \``) dans le dossier du projet :

```bash
# 1. Installer les dépendances PHP & Node
composer install
npm install

# 2. Configurer l'environnement local
cp .env.example .env
php artisan key:generate

# 3. Créer la base de données SQLite locale et exécuter les migrations
touch database/database.sqlite
php artisan migrate

# 4. Compiler les assets ou lancer le serveur de développement Vite
npm run dev

# 5. Démarrer le serveur Laravel (dans un second onglet terminal)
php artisan serve
```

👉 Ouvrez ensuite votre navigateur à l'adresse : **`http://localhost:8000`**

> **Note pratique :** Le dossier `public/compiled/` contient déjà les assets compilés prêts pour la production. Vous pouvez exécuter `php artisan serve` immédiatement après l'étape 3 sans même recompiler si vous souhaitez simplement tester le site !

---

### 3. Aperçu autonome de la modélisation 3D (Zéro dépendance)
Un fichier autonome haute définition est inclus à la racine du projet :
- Ouvrez simplement **`arcade-sourire-3d.html`** avec un double-clic dans votre navigateur (Chrome, Safari, Edge, Firefox) ou avec l'extension **Live Server** de VS Code.
- Toutes les ressources (textures, ombrages scialytiques, script parallaxe 360°, contrôle de la facette #11 et aligneur ClinCheck) y sont 100% embarquées.

---

## 1. Identité & Positionnement de Démonstration

| Élément | Spécification |
| :--- | :--- |
| **Nom** | Sourire Clinic Casablanca |
| **Positionnement** | Cabinet dentaire moderne, soins généraux biomimétiques + esthétique dentaire haute définition |
| **Localisation** | Casablanca, Maroc *(aucune fausse adresse physique inventée)* |
| **Palette de couleurs** | Blanc clinique `#FAFAFA`, Menthe/Teal `#0D9488`, Bleu doux `#1E3A5F`, Accent corail léger `#FF8C7A` |
| **Typographie** | Inter / Satoshi (moderne, aérée, lisible, inspirée des meilleurs studios Awwwards) |
| **Ton** | Rassurant, moderne, humain — sans froideur clinique excessive |
| **Mode Démo** | Badge « Démonstration » bien visible, balise `noindex, nofollow`, aucun envoi SMS/email payant réel (notifications capturées localement), aucune fausse certification ordinale |

---

## 2. Le Hero 3D : Cœur de la Différenciation

Le site embarque une double solution 3D d'avant-garde :

1. **Moteur 3D temps réel Three.js ultra-optimisé (`resources/js/dental3d.js`) :**
   - Modélisation procédurale d'une molaire anatomique (4 cuspides sculptées, sillon central et double racine).
   - Matériau physique simulant la translucidité et la brillance de l'émail dentaire (`MeshPhysicalMaterial` avec reflets iridescents menthe/teal `#0D9488`).
   - Réactivité subtile au déplacement du curseur de la souris (parallaxe douce) + rotation 360° libre au clic/tactile.
   - **4 modes interactifs commutables en 1 clic :**
     - *Émail Nacré 360°* (rendu cosmétique)
     - *Scanner LiDAR 3D* (effet caméra optique intra-orale avec balayage laser vert menthe)
     - *Couches Anatomiques* (enveloppe translucide révélant la dentine et la pulpe)
     - *Simulateur de Blanchiment* (curseur dynamique passant de la teinte A3.5 à B1 Hollywood Smile)
   - Performance : 60 FPS constants, poids plume, aucun temps de chargement excessif, fallback statique automatique si WebGL indisponible.

2. **Intégration Spline Design (`spline-assets/`) :**
   - Bouton de bascule en direct permettant d'activer le conteneur Spline Cloud (`iframe` ou runtime `@splinetool/runtime`).
   - Guide et spécifications de réutilisation fournis dans `spline-assets/README.md`.

---

## 3. Structure des Pages & Contenu Médical

- **Accueil :** Hero 3D interactif avec réassurance clinique instantanée (100% sans empreinte pâte, &lt; 20µm de précision, zéro anxiété).
- **Nos 5 Soins Phares :**
  1. *Soins Généraux & Conservateurs* (composites biomimétiques, dévitalisation douce)
  2. *Détartrage & Aéropolissage Prophylactique* (protocole suisse GBT)
  3. *Blanchiment Dentaire Haute Définition* (Philips Zoom! LED sans sensibilité)
  4. *Orthodontie & Aligneurs Invisibles 3D* (planification prédictive numérique)
  5. *Urgences Dentaires Casablanca* (prise en charge douleur le jour même)
  - Chaque carte dispose d'un tiroir latéral affichant le protocole détaillé pas à pas et pré-remplit le formulaire de prise de rendez-vous.
- **Le Cabinet :** Écosystème technologique moderne (scanner intra-oral 3D, stérilisation autoclave Classe B, anesthésie SleeperOne).
- **Simulateur Nuancier VITA :** Comparatif visuel avant/après éclaircissement.
- **FAQ Clinique :** 5 réponses précises aux freins majeurs (douleur, mutuelles CNSS/CNOPS/Assurances, aligneurs, urgences).
- **Accès Casablanca :** Localisation et horaires d'ouverture.
- **Mentions Légales Démo :** Encadré explicatif délimitant le cadre de la présentation commerciale.

---

## 4. Formulaire de Rendez-vous Fonctionnel (Persistance SQLite)

Le formulaire respecte scrupuleusement les exigences techniques :
- **Architecture Laravel :** `StoreAppointmentRequest` + `StoreAppointmentAction` + `AppointmentController`.
- **Validation serveur complète :** contrôle du nom, téléphone, soin sélectionné, créneau et date.
- **Protection Anti-Spam :** champ honeypot caché (`website_hp`) bloquant les robots sans captcha intrusif.
- **Persistance réelle :** enregistrement en base SQLite (`database/database.sqlite`).
- **Génération d'une référence clinique unique :** ex. `#SC-26-XXXXX`.
- **Notification test capturée :** affichage instantané dans une modale de l'aperçu du SMS / WhatsApp simulé envoyé au patient (pour prouver l'automatisation au médecin lors du rendez-vous).
- **Drawer Backoffice Démo :** le bouton *« Voir les RDV en base »* permet au prospect de visualiser en direct les rendez-vous stockés dans la base SQLite.

---

## 5. Démarrage Rapide

### Prérequis
- PHP 8.2 ou supérieur avec extension `php-sqlite3`
- Node.js 18+ et NPM
- Composer

### Installation

```bash
# 1. Cloner ou se positionner dans le dossier
cd /home/user/sourire-clinic

# 2. Installer les dépendances PHP et Node
composer install
npm install

# 3. Préparer l'environnement
cp .env.example .env
php artisan key:generate

# 4. Migrer et initialiser la base SQLite de démo
touch database/database.sqlite
php artisan migrate --seed

# 5. Compiler les assets Vite
npm run build

# 6. Démarrer le serveur
php artisan serve --host=0.0.0.0 --port=8000
```

L'application est immédiatement accessible sur `http://localhost:8000`.

---

## 6. Guide d'Argumentation Commerciale (Pitch Prospect)

Lors de l'appel direct avec la praticienne ou la direction de clinique à Casablanca :

1. **La claque visuelle d'entrée (0 à 30 secondes) :**
   *« Regardez sur votre écran, faites bouger la dent 3D avec votre souris. 99% des sites de dentistes au Maroc utilisent des photos de stock froides et génériques. Ici, le patient comprend immédiatement que vous travaillez avec des scanners 3D et des technologies d'élite. »*
2. **La preuve de rentabilité :**
   Montrez les 5 soins à forte valeur ajoutée (Aligneurs invisibles, Blanchiment Zoom, Esthétique).
3. **Le test en direct du formulaire :**
   Invitez le prospect à saisir son prénom et son téléphone dans le formulaire. Cliquez sur Valider :
   - Montrez la modale avec le SMS de confirmation généré.
   - Ouvrez le tiroir *« Voir les RDV en base »* pour lui prouver que la donnée est déjà stockée proprement dans son fichier patients.
4. **Justification du tarif (&gt; 6 500 DH) :**
   Ce niveau de finition (3D interactive, réactivité mobile, expérience sans anxiété) positionne le cabinet sur le segment haut de gamme et attire une patientèle prête à investir dans des actes esthétiques et orthodontiques rentables.

---

## 7. Réutilisation pour la niche Food / Glovo (Suite de la Stratégie)

La même architecture (Laravel + Three.js / Spline + SQLite) est conçue pour être dupliquée en quelques minutes sur la prochaine niche (restauration premium / dark kitchens Glovo à Casablanca) :
- Remplacer le modèle dentaire par un burger gourmet, une pâtisserie fine ou un tajine signature en rotation 3D.
- Remplacer les 5 soins par 5 plats signatures avec personnalisation des ingrédients.
- Conserver le formulaire de commande / réservation instantanée.
