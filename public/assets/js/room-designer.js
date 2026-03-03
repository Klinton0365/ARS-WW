import * as THREE from 'three';
import { OrbitControls } from 'three/addons/controls/OrbitControls.js';

/* ═══════════════════════════════════════════════════════
   ARS Wood Works — 3D Room Designer
   Interactive room visualization with Three.js
   ═══════════════════════════════════════════════════════ */

const RM = { w: 10, h: 4, d: 8 };

const WOOD = {
    oak:    0xc4a76c,
    teak:   0x9a6b3a,
    walnut: 0x4a2c17
};

let scene, camera, renderer, controls;
let ambientLight, sunLight, roomLight, bulbMesh;
let wallMeshes = [], floorMesh, ceilMesh;
let furniture = [], selected = null;
let isDragging = false;
const dragOffset = new THREE.Vector3();
const floorPlane = new THREE.Plane(new THREE.Vector3(0, 1, 0), 0);
const raycaster = new THREE.Raycaster();
const mouse = new THREE.Vector2();
const tmpVec = new THREE.Vector3();
let isDay = true, lightsOn = true, curWood = 'oak';


// ── Procedural Textures ──────────────────────────────

function createWoodTexture(base) {
    const cv = document.createElement('canvas');
    cv.width = cv.height = 512;
    const ctx = cv.getContext('2d');
    const r = (base >> 16) & 255, g = (base >> 8) & 255, b = base & 255;
    ctx.fillStyle = `rgb(${r},${g},${b})`;
    ctx.fillRect(0, 0, 512, 512);
    for (let i = 0; i < 50; i++) {
        const y = Math.random() * 512;
        ctx.strokeStyle = `rgba(${r * .4|0},${g * .4|0},${b * .4|0},${.04 + Math.random() * .1})`;
        ctx.lineWidth = 1 + Math.random() * 2;
        ctx.beginPath();
        ctx.moveTo(0, y);
        for (let x = 0; x < 512; x += 18) ctx.lineTo(x, y + (Math.random() - .5) * 5);
        ctx.stroke();
    }
    for (let x = 80; x < 512; x += 80 + Math.random() * 20) {
        ctx.strokeStyle = `rgba(${r * .3|0},${g * .3|0},${b * .3|0},.2)`;
        ctx.lineWidth = 1;
        ctx.beginPath(); ctx.moveTo(x, 0); ctx.lineTo(x, 512); ctx.stroke();
    }
    const tex = new THREE.CanvasTexture(cv);
    tex.wrapS = tex.wrapT = THREE.RepeatWrapping;
    tex.repeat.set(2, 2);
    return tex;
}

function createMarbleTexture() {
    const cv = document.createElement('canvas');
    cv.width = cv.height = 512;
    const ctx = cv.getContext('2d');
    ctx.fillStyle = '#e8e0d8';
    ctx.fillRect(0, 0, 512, 512);
    for (let i = 0; i < 14; i++) {
        ctx.strokeStyle = `rgba(150,140,130,${.06 + Math.random() * .12})`;
        ctx.lineWidth = .8 + Math.random() * 1.5;
        ctx.beginPath();
        let x = Math.random() * 512, y = Math.random() * 512;
        ctx.moveTo(x, y);
        for (let s = 0; s < 7; s++) { x += (Math.random() - .5) * 130; y += (Math.random() - .5) * 130; ctx.lineTo(x, y); }
        ctx.stroke();
    }
    const tex = new THREE.CanvasTexture(cv);
    tex.wrapS = tex.wrapT = THREE.RepeatWrapping;
    tex.repeat.set(2, 2);
    return tex;
}

function createTileTexture() {
    const cv = document.createElement('canvas');
    cv.width = cv.height = 512;
    const ctx = cv.getContext('2d');
    const sz = 64;
    for (let i = 0; i < 512; i += sz)
        for (let j = 0; j < 512; j += sz) {
            ctx.fillStyle = ((i / sz + j / sz) % 2 === 0) ? '#d5cec6' : '#c8c0b8';
            ctx.fillRect(i, j, sz, sz);
            ctx.strokeStyle = 'rgba(170,160,150,.3)';
            ctx.lineWidth = 1.5;
            ctx.strokeRect(i + 1, j + 1, sz - 2, sz - 2);
        }
    const tex = new THREE.CanvasTexture(cv);
    tex.wrapS = tex.wrapT = THREE.RepeatWrapping;
    tex.repeat.set(3, 3);
    return tex;
}


// ── Scene Setup ──────────────────────────────────────

export function initRoomDesigner(container) {
    const w = container.clientWidth;
    const h = container.clientHeight || 550;

    // Scene
    scene = new THREE.Scene();
    scene.background = new THREE.Color(0xf5f0ea);

    // Camera
    camera = new THREE.PerspectiveCamera(40, w / h, 0.1, 100);
    camera.position.set(12, 9, 12);

    // Renderer
    renderer = new THREE.WebGLRenderer({ antialias: true });
    renderer.setSize(w, h);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.shadowMap.enabled = true;
    renderer.shadowMap.type = THREE.PCFSoftShadowMap;
    renderer.toneMapping = THREE.ACESFilmicToneMapping;
    renderer.toneMappingExposure = 1.1;
    container.appendChild(renderer.domElement);

    // Orbit Controls
    controls = new OrbitControls(camera, renderer.domElement);
    controls.enableDamping = true;
    controls.dampingFactor = 0.06;
    controls.target.set(0, 1.5, 0);
    controls.minDistance = 6;
    controls.maxDistance = 20;
    controls.maxPolarAngle = Math.PI / 2.05;
    controls.update();

    buildRoom();
    buildLighting();
    setupInteraction(container);

    // Responsive resize
    new ResizeObserver(() => {
        const rw = container.clientWidth, rh = container.clientHeight;
        if (rw === 0 || rh === 0) return;
        camera.aspect = rw / rh;
        camera.updateProjectionMatrix();
        renderer.setSize(rw, rh);
    }).observe(container);

    // Render loop
    (function animate() {
        requestAnimationFrame(animate);
        controls.update();
        renderer.render(scene, camera);
    })();
}


// ── Room Construction ────────────────────────────────

function buildRoom() {
    // Floor
    const floorMat = new THREE.MeshStandardMaterial({
        map: createWoodTexture(0xb08050),
        roughness: 0.65,
        metalness: 0.05
    });
    floorMesh = new THREE.Mesh(new THREE.PlaneGeometry(RM.w, RM.d), floorMat);
    floorMesh.rotation.x = -Math.PI / 2;
    floorMesh.receiveShadow = true;
    scene.add(floorMesh);

    // Wall factory
    const wallMat = () => new THREE.MeshStandardMaterial({ color: 0xf0e8dc, roughness: 0.92, metalness: 0 });

    // Back wall
    const back = new THREE.Mesh(new THREE.PlaneGeometry(RM.w, RM.h), wallMat());
    back.position.set(0, RM.h / 2, -RM.d / 2);
    back.receiveShadow = true;
    wallMeshes.push(back);
    scene.add(back);

    // Left wall
    const left = new THREE.Mesh(new THREE.PlaneGeometry(RM.d, RM.h), wallMat());
    left.position.set(-RM.w / 2, RM.h / 2, 0);
    left.rotation.y = Math.PI / 2;
    left.receiveShadow = true;
    wallMeshes.push(left);
    scene.add(left);

    // Right wall
    const right = new THREE.Mesh(new THREE.PlaneGeometry(RM.d, RM.h), wallMat());
    right.position.set(RM.w / 2, RM.h / 2, 0);
    right.rotation.y = -Math.PI / 2;
    right.receiveShadow = true;
    wallMeshes.push(right);
    scene.add(right);

    // Ceiling
    ceilMesh = new THREE.Mesh(
        new THREE.PlaneGeometry(RM.w, RM.d),
        new THREE.MeshStandardMaterial({ color: 0xfaf8f5, roughness: 0.95 })
    );
    ceilMesh.rotation.x = Math.PI / 2;
    ceilMesh.position.y = RM.h;
    scene.add(ceilMesh);

    // Baseboard trim
    const trimMat = new THREE.MeshStandardMaterial({ color: 0xffffff, roughness: 0.5 });
    const addTrim = (geo, pos) => { const m = new THREE.Mesh(geo, trimMat); m.position.copy(pos); scene.add(m); };
    addTrim(new THREE.BoxGeometry(RM.w + .1, .12, .06), new THREE.Vector3(0, .06, -RM.d / 2 + .03));
    addTrim(new THREE.BoxGeometry(.06, .12, RM.d + .1), new THREE.Vector3(-RM.w / 2 + .03, .06, 0));
    addTrim(new THREE.BoxGeometry(.06, .12, RM.d + .1), new THREE.Vector3(RM.w / 2 - .03, .06, 0));

    // Floor edge shadow strip
    const edgeMat = new THREE.MeshBasicMaterial({ color: 0x000000, transparent: true, opacity: 0.04 });
    const edgeBack = new THREE.Mesh(new THREE.PlaneGeometry(RM.w, .3), edgeMat);
    edgeBack.rotation.x = -Math.PI / 2;
    edgeBack.position.set(0, .001, -RM.d / 2 + .15);
    scene.add(edgeBack);
}


// ── Lighting ─────────────────────────────────────────

function buildLighting() {
    ambientLight = new THREE.AmbientLight(0xfff8f0, 0.5);
    scene.add(ambientLight);

    sunLight = new THREE.DirectionalLight(0xfff5e0, 1.5);
    sunLight.position.set(6, 10, 8);
    sunLight.castShadow = true;
    sunLight.shadow.mapSize.set(2048, 2048);
    sunLight.shadow.camera.left = -8;
    sunLight.shadow.camera.right = 8;
    sunLight.shadow.camera.top = 8;
    sunLight.shadow.camera.bottom = -8;
    sunLight.shadow.camera.near = 0.5;
    sunLight.shadow.camera.far = 30;
    sunLight.shadow.bias = -0.0005;
    sunLight.shadow.radius = 4;
    scene.add(sunLight);

    roomLight = new THREE.PointLight(0xffeedd, 0.8, 14);
    roomLight.position.set(0, RM.h - .3, 0);
    roomLight.castShadow = true;
    roomLight.shadow.radius = 6;
    scene.add(roomLight);

    // Light bulb visual
    bulbMesh = new THREE.Mesh(
        new THREE.SphereGeometry(.1, 16, 16),
        new THREE.MeshStandardMaterial({ color: 0xffffcc, emissive: 0xffeeaa, emissiveIntensity: 1 })
    );
    bulbMesh.position.copy(roomLight.position);
    scene.add(bulbMesh);

    // Fixture disc
    const fix = new THREE.Mesh(
        new THREE.CylinderGeometry(.25, .25, .04, 32),
        new THREE.MeshStandardMaterial({ color: 0x333333, metalness: 0.8, roughness: 0.2 })
    );
    fix.position.set(0, RM.h - .02, 0);
    scene.add(fix);

    // Fixture rod
    const rod = new THREE.Mesh(
        new THREE.CylinderGeometry(.015, .015, .25, 8),
        new THREE.MeshStandardMaterial({ color: 0x444444, metalness: 0.7, roughness: 0.3 })
    );
    rod.position.set(0, RM.h - .145, 0);
    scene.add(rod);
}


// ── Furniture Factories ──────────────────────────────

function getWoodMat() {
    return new THREE.MeshStandardMaterial({ color: WOOD[curWood], roughness: 0.4, metalness: 0.06 });
}
function getFabricMat(color) {
    return new THREE.MeshStandardMaterial({ color: color || 0x8b7355, roughness: 0.85, metalness: 0 });
}
function getMetalMat() {
    return new THREE.MeshStandardMaterial({ color: 0xcccccc, metalness: 0.9, roughness: 0.15 });
}

function makeSofa() {
    const g = new THREE.Group();
    const wm = getWoodMat(), fm = getFabricMat(0x7d6b52);
    const woodParts = [], fabricParts = [];

    // Base
    const base = box(2.4, .15, .95, wm); base.position.y = .175; g.add(base); woodParts.push(base);
    // Seat cushion
    const seat = box(2.2, .2, .78, fm); seat.position.set(0, .35, .05); g.add(seat); fabricParts.push(seat);
    // Back
    const bk = box(2.4, .5, .12, fm); bk.position.set(0, .6, -.42); g.add(bk); fabricParts.push(bk);
    // Arms
    [- 1.1, 1.1].forEach(x => { const arm = box(.12, .3, .95, fm); arm.position.set(x, .42, 0); g.add(arm); fabricParts.push(arm); });
    // Legs
    [[- 1.05, -.35], [- 1.05, .35], [1.05, -.35], [1.05, .35]].forEach(([x, z]) => {
        const leg = cyl(.03, .1, wm); leg.position.set(x, .05, z); g.add(leg); woodParts.push(leg);
    });
    // Cushion pillows
    [-.55, .55].forEach(x => {
        const p = box(.45, .12, .3, getFabricMat(0x9a8668)); p.position.set(x, .5, .1); g.add(p);
    });

    g.userData = { type: 'furniture', name: 'Sofa', woodParts, fabricParts };
    setShadows(g);
    return g;
}

function makeTable() {
    const g = new THREE.Group();
    const wm = getWoodMat();
    const woodParts = [];

    const top = box(1.4, .06, .8, wm); top.position.y = .75; g.add(top); woodParts.push(top);
    [[-.6, -.3], [-.6, .3], [.6, -.3], [.6, .3]].forEach(([x, z]) => {
        const leg = box(.06, .72, .06, wm); leg.position.set(x, .36, z); g.add(leg); woodParts.push(leg);
    });
    // Cross support
    const sup = box(1.08, .04, .04, wm); sup.position.set(0, .2, 0); g.add(sup); woodParts.push(sup);

    g.userData = { type: 'furniture', name: 'Table', woodParts };
    setShadows(g);
    return g;
}

function makeChair() {
    const g = new THREE.Group();
    const wm = getWoodMat(), cm = getFabricMat(0x9b8b6e);
    const woodParts = [];

    const seat = box(.48, .04, .48, wm); seat.position.y = .46; g.add(seat); woodParts.push(seat);
    const cushion = box(.42, .05, .42, cm); cushion.position.y = .51; g.add(cushion);
    const bk = box(.48, .42, .04, wm); bk.position.set(0, .71, -.22); g.add(bk); woodParts.push(bk);
    // Back slats
    [-.14, 0, .14].forEach(x => {
        const slat = box(.04, .3, .03, wm); slat.position.set(x, .65, -.22); g.add(slat); woodParts.push(slat);
    });
    [[-.18, -.18], [-.18, .18], [.18, -.18], [.18, .18]].forEach(([x, z]) => {
        const leg = cyl(.025, .44, wm); leg.position.set(x, .22, z); g.add(leg); woodParts.push(leg);
    });

    g.userData = { type: 'furniture', name: 'Chair', woodParts };
    setShadows(g);
    return g;
}

function makeCabinet() {
    const g = new THREE.Group();
    const wm = getWoodMat(), hm = getMetalMat();
    const woodParts = [];

    const body = box(1.4, 1.0, .45, wm); body.position.y = .55; g.add(body); woodParts.push(body);
    const topP = box(1.46, .04, .48, wm); topP.position.y = 1.07; g.add(topP); woodParts.push(topP);
    // Door center line
    const line = box(.01, .88, .46, new THREE.MeshStandardMaterial({ color: 0, transparent: true, opacity: .15 }));
    line.position.set(0, .55, .001); g.add(line);
    // Handles
    [-.12, .12].forEach(x => {
        const h = cyl(.015, .1, hm); h.rotation.x = Math.PI / 2; h.position.set(x, .55, .24); g.add(h);
    });
    // Legs
    [[-.65, -.18], [-.65, .18], [.65, -.18], [.65, .18]].forEach(([x, z]) => {
        const leg = box(.04, .06, .04, wm); leg.position.set(x, .03, z); g.add(leg); woodParts.push(leg);
    });

    g.userData = { type: 'furniture', name: 'Cabinet', woodParts };
    setShadows(g);
    return g;
}

// Helpers
function box(w, h, d, mat) { return new THREE.Mesh(new THREE.BoxGeometry(w, h, d), mat); }
function cyl(r, h, mat) { return new THREE.Mesh(new THREE.CylinderGeometry(r, r, h, 12), mat); }
function setShadows(group) {
    group.traverse(c => { if (c.isMesh) { c.castShadow = true; c.receiveShadow = true; } });
}

const FACTORIES = { sofa: makeSofa, table: makeTable, chair: makeChair, cabinet: makeCabinet };


// ── Furniture Management ─────────────────────────────

function addFurniture(type) {
    const factory = FACTORIES[type];
    if (!factory) return;
    const obj = factory();
    obj.position.set(
        (Math.random() - .5) * (RM.w - 4),
        0,
        (Math.random() - .5) * (RM.d - 3)
    );
    scene.add(obj);
    furniture.push(obj);
    selectFurniture(obj);
    refreshFurnitureList();
}

function removeFurniture(obj) {
    scene.remove(obj);
    obj.traverse(c => {
        if (c.isMesh) { c.geometry.dispose(); if (c.material.map) c.material.map.dispose(); c.material.dispose(); }
    });
    furniture = furniture.filter(f => f !== obj);
    if (selected === obj) selected = null;
    refreshFurnitureList();
    refreshSelectionUI();
}

function selectFurniture(obj) {
    if (selected) {
        selected.traverse(c => { if (c.isMesh && c.material.emissive) c.material.emissive.setHex(0); });
    }
    selected = obj;
    if (obj) {
        obj.traverse(c => {
            if (c.isMesh && c.material.emissive) {
                c.material.emissive.setHex(0x332200);
                c.material.emissiveIntensity = 0.12;
            }
        });
    }
    refreshSelectionUI();
    refreshFurnitureList();
}

function refreshSelectionUI() {
    const info = document.getElementById('rdSelectedInfo');
    const rotBtn = document.getElementById('rdRotateBtn');
    const delBtn = document.getElementById('rdDeleteBtn');
    if (!info) return;
    if (selected) {
        info.textContent = selected.userData.name || 'Object';
        if (rotBtn) rotBtn.style.display = 'inline-flex';
        if (delBtn) delBtn.style.display = 'inline-flex';
    } else {
        info.textContent = 'None';
        if (rotBtn) rotBtn.style.display = 'none';
        if (delBtn) delBtn.style.display = 'none';
    }
}

function refreshFurnitureList() {
    const list = document.getElementById('rdFurnitureList');
    if (!list) return;
    list.innerHTML = '';
    furniture.forEach((f, i) => {
        const el = document.createElement('div');
        el.className = 'rd-tag' + (f === selected ? ' active' : '');
        el.textContent = f.userData.name + ' ' + (i + 1);
        el.addEventListener('click', () => selectFurniture(f));
        list.appendChild(el);
    });
}


// ── Interaction ──────────────────────────────────────

function setupInteraction(container) {
    const cvs = renderer.domElement;
    const dragStart = new THREE.Vector2();

    function hitFurniture(e) {
        const rect = cvs.getBoundingClientRect();
        mouse.x = ((e.clientX - rect.left) / rect.width) * 2 - 1;
        mouse.y = -((e.clientY - rect.top) / rect.height) * 2 + 1;
        raycaster.setFromCamera(mouse, camera);
        const meshes = [];
        furniture.forEach(g => g.traverse(c => { if (c.isMesh) meshes.push(c); }));
        return raycaster.intersectObjects(meshes);
    }

    function findGroup(mesh) {
        let obj = mesh;
        while (obj.parent && obj.parent !== scene) obj = obj.parent;
        return furniture.includes(obj) ? obj : null;
    }

    // Mouse
    cvs.addEventListener('mousedown', e => {
        if (e.button !== 0) return;
        dragStart.set(e.clientX, e.clientY);
        const hits = hitFurniture(e);
        if (hits.length) {
            const grp = findGroup(hits[0].object);
            if (grp) {
                isDragging = true;
                controls.enabled = false;
                selectFurniture(grp);
                raycaster.ray.intersectPlane(floorPlane, tmpVec);
                dragOffset.subVectors(grp.position, tmpVec);
                cvs.style.cursor = 'grabbing';
            }
        }
    });

    cvs.addEventListener('mousemove', e => {
        if (isDragging && selected) {
            const rect = cvs.getBoundingClientRect();
            mouse.x = ((e.clientX - rect.left) / rect.width) * 2 - 1;
            mouse.y = -((e.clientY - rect.top) / rect.height) * 2 + 1;
            raycaster.setFromCamera(mouse, camera);
            const pt = new THREE.Vector3();
            raycaster.ray.intersectPlane(floorPlane, pt);
            pt.add(dragOffset);
            pt.x = Math.max(-RM.w / 2 + 1.2, Math.min(RM.w / 2 - 1.2, pt.x));
            pt.z = Math.max(-RM.d / 2 + .8, Math.min(RM.d / 2 - .8, pt.z));
            pt.y = 0;
            selected.position.copy(pt);
            cvs.style.cursor = 'grabbing';
        } else {
            const hits = hitFurniture(e);
            cvs.style.cursor = (hits.length && findGroup(hits[0].object)) ? 'grab' : 'default';
        }
    });

    window.addEventListener('mouseup', e => {
        if (isDragging) {
            isDragging = false;
            controls.enabled = true;
            cvs.style.cursor = 'grab';
            return;
        }
        const dist = Math.hypot(e.clientX - dragStart.x, e.clientY - dragStart.y);
        if (dist < 5) {
            const hits = hitFurniture(e);
            if (hits.length) {
                const grp = findGroup(hits[0].object);
                if (grp) selectFurniture(grp);
            } else {
                selectFurniture(null);
            }
        }
    });

    // Touch
    cvs.addEventListener('touchstart', e => {
        if (e.touches.length !== 1) return;
        const t = e.touches[0];
        const rect = cvs.getBoundingClientRect();
        mouse.x = ((t.clientX - rect.left) / rect.width) * 2 - 1;
        mouse.y = -((t.clientY - rect.top) / rect.height) * 2 + 1;
        raycaster.setFromCamera(mouse, camera);
        const meshes = [];
        furniture.forEach(g => g.traverse(c => { if (c.isMesh) meshes.push(c); }));
        const hits = raycaster.intersectObjects(meshes);
        if (hits.length) {
            const grp = findGroup(hits[0].object);
            if (grp) {
                e.preventDefault();
                isDragging = true;
                controls.enabled = false;
                selectFurniture(grp);
                raycaster.ray.intersectPlane(floorPlane, tmpVec);
                dragOffset.subVectors(grp.position, tmpVec);
            }
        }
    }, { passive: false });

    cvs.addEventListener('touchmove', e => {
        if (!isDragging || !selected) return;
        e.preventDefault();
        const t = e.touches[0];
        const rect = cvs.getBoundingClientRect();
        mouse.x = ((t.clientX - rect.left) / rect.width) * 2 - 1;
        mouse.y = -((t.clientY - rect.top) / rect.height) * 2 + 1;
        raycaster.setFromCamera(mouse, camera);
        const pt = new THREE.Vector3();
        raycaster.ray.intersectPlane(floorPlane, pt);
        pt.add(dragOffset);
        pt.x = Math.max(-RM.w / 2 + 1.2, Math.min(RM.w / 2 - 1.2, pt.x));
        pt.z = Math.max(-RM.d / 2 + .8, Math.min(RM.d / 2 - .8, pt.z));
        pt.y = 0;
        selected.position.copy(pt);
    }, { passive: false });

    cvs.addEventListener('touchend', () => {
        if (isDragging) { isDragging = false; controls.enabled = true; }
    });
}


// ── Public API ───────────────────────────────────────

window.rdSetWallColor = function(color) {
    wallMeshes.forEach(w => w.material.color.setStyle(color));
};

window.rdSetFloor = function(type) {
    const mat = floorMesh.material;
    if (mat.map) mat.map.dispose();
    if (type === 'wood')   { mat.map = createWoodTexture(0xb08050); mat.roughness = .65; mat.metalness = .05; }
    if (type === 'marble') { mat.map = createMarbleTexture();       mat.roughness = .15; mat.metalness = .2; }
    if (type === 'tiles')  { mat.map = createTileTexture();         mat.roughness = .5;  mat.metalness = .05; }
    mat.needsUpdate = true;
    document.querySelectorAll('.rd-floor-btn').forEach(b => b.classList.toggle('active', b.dataset.floor === type));
};

window.rdSetWoodFinish = function(finish) {
    curWood = finish;
    const color = new THREE.Color(WOOD[finish]);
    furniture.forEach(g => {
        (g.userData.woodParts || []).forEach(m => { if (m.material) m.material.color.copy(color); });
    });
    document.querySelectorAll('.rd-wood-btn').forEach(b => b.classList.toggle('active', b.dataset.wood === finish));
};

window.rdAddFurniture = addFurniture;

window.rdRotateSelected = function() {
    if (selected) selected.rotation.y += Math.PI / 4;
};

window.rdDeleteSelected = function() {
    if (selected) removeFurniture(selected);
};

window.rdToggleLights = function() {
    lightsOn = !lightsOn;
    roomLight.intensity = lightsOn ? (isDay ? .8 : 1.5) : 0;
    bulbMesh.material.emissiveIntensity = lightsOn ? 1 : 0;
    bulbMesh.material.color.setHex(lightsOn ? 0xffffcc : 0x444444);
    const btn = document.getElementById('rdLightBtn');
    if (btn) btn.classList.toggle('active', lightsOn);
};

window.rdSetDayMode = function(day) {
    isDay = day;
    if (day) {
        scene.background.setHex(0xf5f0ea);
        ambientLight.intensity = .5;  ambientLight.color.setHex(0xfff8f0);
        sunLight.intensity = 1.5;     sunLight.color.setHex(0xfff5e0);
        if (lightsOn) roomLight.intensity = .8;
        renderer.toneMappingExposure = 1.1;
    } else {
        scene.background.setHex(0x1a1520);
        ambientLight.intensity = .12; ambientLight.color.setHex(0x4466aa);
        sunLight.intensity = .08;     sunLight.color.setHex(0x6688cc);
        if (lightsOn) roomLight.intensity = 1.8;
        renderer.toneMappingExposure = .65;
    }
    const dBtn = document.getElementById('rdDayBtn');
    const nBtn = document.getElementById('rdNightBtn');
    if (dBtn) dBtn.classList.toggle('active', isDay);
    if (nBtn) nBtn.classList.toggle('active', !isDay);
};
