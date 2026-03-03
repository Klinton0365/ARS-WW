

<!-- GSAP CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

<!-- Three.js CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>

<style>
/* body {
  margin: 0;
  font-family: 'Segoe UI', sans-serif;
  background: #111;
  color: white;
  overflow-x: hidden;
} */

/* HERO SECTION */
.hero {
  height: 100vh;
  background: url('https://images.unsplash.com/photo-1505691938895-1758d7feb511') center/cover no-repeat;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  position: relative;
}

.hero::after {
  content: "";
  position: absolute;
  inset: 0;
  background: rgba(0,0,0,0.6);
}

.hero-content {
  position: relative;
  z-index: 2;
}

.hero h1 {
  font-size: 60px;
  letter-spacing: 3px;
  opacity: 0;
  transform: translateY(50px);
}

.hero button {
  padding: 12px 30px;
  border: none;
  background: #a66b3f;
  color: white;
  cursor: pointer;
  margin-top: 20px;
  font-size: 16px;
  opacity: 0;
  transform: translateY(50px);
}

/* INTERACTIVE SECTION */
.interactive {
  padding: 80px 20px;
  text-align: center;
  background: #1a1a1a;
}

#canvas-container {
  width: 100%;
  height: 400px;
}

.controls button {
  padding: 10px 20px;
  margin: 10px;
  border: none;
  cursor: pointer;
  background: #333;
  color: white;
}
</style>


<!-- HERO SECTION -->
<section class="hero">
  <div class="hero-content">
    <h1 id="hero-title">Crafting Timeless Interiors</h1>
    <button id="hero-btn">Explore Designs</button>
  </div>
</section>

<!-- INTERACTIVE SECTION -->
<section class="interactive">
  <h2>Build Your Table</h2>
  <div id="canvas-container"></div>

  <div class="controls">
    <button onclick="changeWood(0x8B4513)">Teak</button>
    <button onclick="changeWood(0xA0522D)">Walnut</button>
    <button onclick="changeWood(0xD2B48C)">Oak</button>
  </div>
</section>

<script>
/* ================= HERO ANIMATION ================= */

gsap.to("#hero-title", {
  duration: 1.5,
  opacity: 1,
  y: 0,
  ease: "power3.out"
});

gsap.to("#hero-btn", {
  duration: 1.5,
  opacity: 1,
  y: 0,
  delay: 0.5,
  ease: "power3.out"
});


/* ================= THREE JS SETUP ================= */

let scene = new THREE.Scene();
let camera = new THREE.PerspectiveCamera(75, window.innerWidth / 400, 0.1, 1000);
let renderer = new THREE.WebGLRenderer({ antialias: true });
renderer.setSize(window.innerWidth, 400);
document.getElementById("canvas-container").appendChild(renderer.domElement);

// Light
let light = new THREE.DirectionalLight(0xffffff, 1);
light.position.set(5, 10, 7);
scene.add(light);

// Table Top
let geometry = new THREE.BoxGeometry(5, 0.5, 3);
let material = new THREE.MeshStandardMaterial({ color: 0x8B4513 });
let table = new THREE.Mesh(geometry, material);
scene.add(table);

// Table Legs
function createLeg(x, z) {
  let legGeometry = new THREE.BoxGeometry(0.3, 2, 0.3);
  let legMaterial = new THREE.MeshStandardMaterial({ color: 0x8B4513 });
  let leg = new THREE.Mesh(legGeometry, legMaterial);
  leg.position.set(x, -1.25, z);
  scene.add(leg);
}

createLeg(-2, -1);
createLeg(2, -1);
createLeg(-2, 1);
createLeg(2, 1);

camera.position.z = 8;

/* ROTATION */
let isDragging = false;
let previousMousePosition = { x: 0, y: 0 };

renderer.domElement.addEventListener("mousedown", function(e) {
  isDragging = true;
});

renderer.domElement.addEventListener("mouseup", function(e) {
  isDragging = false;
});

renderer.domElement.addEventListener("mousemove", function(e) {
  if (isDragging) {
    let deltaMove = {
      x: e.offsetX - previousMousePosition.x,
      y: e.offsetY - previousMousePosition.y
    };

    table.rotation.y += deltaMove.x * 0.01;
  }

  previousMousePosition = {
    x: e.offsetX,
    y: e.offsetY
  };
});

/* ANIMATION LOOP */
function animate() {
  requestAnimationFrame(animate);
  renderer.render(scene, camera);
}
animate();

/* CHANGE WOOD COLOR */
function changeWood(color) {
  table.material.color.setHex(color);
}
</script>
