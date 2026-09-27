const THREE = await import('three');
const { chromium } = require('playwright');
const fs = require('fs');

// Crée une vraie dent humaine par extrusion de section anatomique fermée
function createTrueIncisorGeometry(w, h, depth, isCanine = false) {
    // Profil horizontal (vue occlusale) : amande avec face avant convexe et face arrière concave (cingulum)
    const shape = new THREE.Shape();
    
    // Définition d'un contour d'incisive anatomique
    const hw = w / 2;
    const hd = depth / 2;
    
    shape.moveTo(-hw * 0.9, 0);
    // Face vestibulaire (avant) convexe et bombée
    shape.bezierCurveTo(-hw * 0.7, hd * 1.3,  hw * 0.7, hd * 1.3,  hw * 0.9, 0);
    // Angle mésial/distal arrondi
    shape.bezierCurveTo( hw * 1.05, -hd * 0.4,  hw * 0.8, -hd * 0.9,  hw * 0.5, -hd * 0.9);
    // Cingulum (face palatine arrière)
    shape.bezierCurveTo( 0, -hd * 0.6,  -hw * 0.5, -hd * 0.9, -hw * 0.9, 0);
    
    // Extrusion verticale
    const extrudeSettings = {
        steps: 16,
        depth: h,
        bevelEnabled: true,
        bevelThickness: 0.08,
        bevelSize: 0.06,
        bevelSegments: 6
    };
    
    const geo = new THREE.ExtrudeGeometry(shape, extrudeSettings);
    // Réoriente pour que l'extrusion soit verticale (axe Y)
    geo.rotateX(Math.PI / 2);
    geo.center();
    
    // Modification des sommets pour l'amincissement vers le bord incisif
    const pos = geo.attributes.position;
    for (let i = 0; i < pos.count; i++) {
        let x = pos.getX(i);
        let y = pos.getY(i); // De +h/2 (collet) à -h/2 (tranchant)
        let z = pos.getZ(i); // +z = vestibulaire, -z = palatin
        
        const t = (h / 2 - y) / h; // 0 au collet, 1 au tranchant incisif
        
        // 1. Amincissement antéro-postérieur vers le tranchant
        z *= (1.1 - 0.75 * Math.pow(t, 1.4));
        
        // 2. Évasement mésio-distal vers le bas
        x *= (0.85 + 0.30 * t);
        
        // 3. Galbe vestibulaire naturel
        if (z > 0) {
            z += Math.sin(t * Math.PI) * 0.08;
            if (isCanine) {
                z += (1 - Math.abs(x / (hw * 0.7))) * 0.12;
            }
        }
        
        // 4. Bord libre tranchant
        if (t > 0.90) {
            if (isCanine) {
                y -= (1 - Math.min(1, Math.abs(x) / (hw * 0.6))) * 0.18;
            } else {
                y += Math.pow(x / (hw * 0.8), 2) * 0.04;
            }
        }
        
        pos.setXYZ(i, x, y, z);
    }
    geo.computeVertexNormals();
    return geo;
}

console.log('Geometry function ready');
