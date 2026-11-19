<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>I Love You Ruba 🌹</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }

  body {
    background: #000;
    overflow: hidden;
    height: 100vh;
    width: 100vw;
    font-family: 'Georgia', serif;
    cursor: default;
  }

  /* ============ START SCREEN ============ */
  #start-screen {
    position: fixed;
    inset: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: radial-gradient(circle at 50% 40%, #2a001a 0%, #0a0005 60%, #000 100%);
    z-index: 1000;
    transition: opacity 1.2s ease, transform 1.2s ease;
  }
  #start-screen.hide {
    opacity: 0;
    transform: scale(1.15);
    pointer-events: none;
  }

  .bg-heart {
    position: absolute;
    color: rgba(255, 80, 130, 0.15);
    font-size: 24px;
    animation: floatUp linear infinite;
    user-select: none;
  }
  @keyframes floatUp {
    0%   { transform: translateY(0) scale(0.6); opacity: 0; }
    20%  { opacity: 0.8; }
    100% { transform: translateY(-110vh) scale(1.2); opacity: 0; }
  }

  .start-title {
    font-size: clamp(26px, 5vw, 52px);
    color: #ffd1dc;
    letter-spacing: 3px;
    text-shadow: 0 0 20px #ff3d7f, 0 0 40px #ff3d7f;
    margin-bottom: 12px;
    animation: glowPulse 2.5s ease-in-out infinite;
    text-align: center;
    padding: 0 20px;
  }
  .start-sub {
    font-size: clamp(14px, 2.5vw, 20px);
    color: #ff8fab;
    letter-spacing: 2px;
    margin-bottom: 50px;
    opacity: 0.9;
    text-align: center;
    padding: 0 20px;
  }
  @keyframes glowPulse {
    0%, 100% { text-shadow: 0 0 20px #ff3d7f, 0 0 40px #ff3d7f; }
    50%      { text-shadow: 0 0 35px #ff3d7f, 0 0 70px #ff3d7f, 0 0 90px #ff6b9d; }
  }

  #start-btn {
    position: relative;
    padding: 20px 55px;
    font-size: clamp(18px, 3vw, 24px);
    font-family: 'Georgia', serif;
    letter-spacing: 2px;
    color: #fff;
    background: linear-gradient(135deg, #ff4d79, #c9184a);
    border: 2px solid #ffb3c6;
    border-radius: 60px;
    cursor: pointer;
    box-shadow: 0 0 25px rgba(255, 60, 110, 0.6),
                0 0 60px rgba(255, 60, 110, 0.3),
                inset 0 0 20px rgba(255, 255, 255, 0.15);
    transition: all 0.35s ease;
    animation: btnPulse 2s ease-in-out infinite;
    overflow: hidden;
  }
  #start-btn::before {
    content: '';
    position: absolute;
    top: 0; left: -100%;
    width: 100%; height: 100%;
    background: linear-gradient(120deg, transparent, rgba(255,255,255,0.5), transparent);
    animation: shine 2.8s ease-in-out infinite;
  }
  @keyframes shine {
    0%   { left: -100%; }
    60%  { left: 100%; }
    100% { left: 100%; }
  }
  @keyframes btnPulse {
    0%, 100% { transform: scale(1);   box-shadow: 0 0 25px rgba(255,60,110,0.6), 0 0 60px rgba(255,60,110,0.3); }
    50%      { transform: scale(1.05); box-shadow: 0 0 40px rgba(255,60,110,0.9), 0 0 90px rgba(255,60,110,0.5); }
  }
  #start-btn:hover {
    transform: scale(1.12) translateY(-3px);
    background: linear-gradient(135deg, #ff6b8a, #e0185a);
    box-shadow: 0 0 50px rgba(255,60,110,1), 0 0 100px rgba(255,60,110,0.6);
  }
  #start-btn:active { transform: scale(1.02); }

  /* ============ STAGE ============ */
  #stage {
    position: relative;
    width: 100vw;
    height: 100vh;
    background: radial-gradient(circle at center, #1a0010 0%, #000 100%);
    opacity: 0;
    transition: opacity 1s ease;
    overflow: hidden;
  }
  #stage.show { opacity: 1; }

  .petal {
    position: absolute;
    width: 40px;
    height: 40px;
    background: radial-gradient(circle at 30% 30%, #ff6b9d, #c9184a);
    border-radius: 50% 0 50% 50%;
    transform-origin: center;
    box-shadow: 0 0 15px rgba(255, 50, 100, 0.7);
    opacity: 0;
  }

  #rose-bloom {
    position: absolute;
    left: 50%;
    top: 45%;
    transform: translate(-50%, -50%);
  }

  .flower {
    position: absolute;
    font-size: 30px;
    opacity: 0;
    filter: drop-shadow(0 0 8px rgba(255, 80, 130, 0.8));
    user-select: none;
    will-change: transform, top, opacity;
  }

  #fragment-stage {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
  }
  .fragment {
    position: absolute;
    width: 12px;
    height: 12px;
    background: radial-gradient(circle at 30% 30%, #ffb3c6, #e63946);
    border-radius: 50% 0 50% 50%;
    opacity: 0;
    box-shadow: 0 0 10px rgba(255, 100, 140, 0.9);
    will-change: transform, opacity;
  }

  /* ============ FINAL TEXT + BUTTONS ============ */
  #final-text {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: #fff;
    opacity: 0;
    width: 90%;
    max-width: 900px;
  }
  #final-text h1 {
    font-size: clamp(28px, 6.5vw, 78px);
    letter-spacing: 4px;
    color: #ffd1dc;
    margin-bottom: 22px;
    text-shadow: 0 0 20px #ff3d7f, 0 0 40px #ff3d7f, 0 0 60px #ff3d7f;
    animation: glowPulse 2.5s ease-in-out infinite;
  }
  #final-text h2 {
    font-size: clamp(20px, 4.2vw, 48px);
    letter-spacing: 3px;
    color: #ff8fab;
    text-shadow: 0 0 15px #ff3d7f, 0 0 35px #ff3d7f;
    margin-bottom: 40px;
  }

  #answer-buttons {
    display: flex;
    gap: 30px;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.8s ease, transform 0.8s ease;
  }
  #answer-buttons.show {
    opacity: 1;
    transform: translateY(0);
  }

  .ans-btn {
    position: relative;
    padding: 18px 55px;
    font-size: clamp(18px, 3vw, 26px);
    font-family: 'Georgia', serif;
    letter-spacing: 3px;
    border-radius: 60px;
    cursor: pointer;
    border: 2px solid;
    transition: all 0.3s ease;
    overflow: hidden;
    font-weight: bold;
    min-width: 160px;
  }

  #yes-btn {
    color: #fff;
    background: linear-gradient(135deg, #ff4d79, #c9184a);
    border-color: #ffb3c6;
    box-shadow: 0 0 25px rgba(255, 60, 110, 0.7), 0 0 60px rgba(255, 60, 110, 0.35);
    animation: btnPulse 1.8s ease-in-out infinite;
  }
  #yes-btn:hover {
    transform: scale(1.12) translateY(-3px);
    box-shadow: 0 0 50px rgba(255, 60, 110, 1), 0 0 100px rgba(255, 60, 110, 0.6);
  }

  #no-btn {
    color: #ffb3c6;
    background: rgba(30, 0, 15, 0.6);
    border-color: #ff6b9d;
    box-shadow: 0 0 15px rgba(255, 100, 140, 0.4);
  }
  #no-btn:hover {
    transform: scale(1.05);
    background: rgba(60, 0, 30, 0.8);
    box-shadow: 0 0 25px rgba(255, 100, 140, 0.7);
  }

  .ans-btn:active { transform: scale(1.02); }

  .confetti-heart {
    position: absolute;
    font-size: 22px;
    opacity: 0;
    pointer-events: none;
    will-change: transform, opacity;
  }

  /* ============================================================
     CELEBRATION SCREEN — FIXED POSITIONING
     ============================================================ */
  #celebration {
    position: fixed;
    inset: 0;
    display: none;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: radial-gradient(circle at center, #4a001f 0%, #1a0008 50%, #000 100%);
    z-index: 2000;
    text-align: center;
    padding: 30px 20px;
    overflow-y: auto;
    overflow-x: hidden;
  }
  #celebration.show {
    display: flex;
    animation: fadeIn 0.8s ease;
  }
  @keyframes fadeIn {
    from { opacity: 0; }
    to   { opacity: 1; }
  }

  /* Content wrapper — prevents overflow going above */
  #celebration-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    max-width: 900px;
    width: 100%;
    margin: auto;
    position: relative;
    z-index: 2;
  }

  #celebration h1 {
    font-size: clamp(30px, 7vw, 85px);
    color: #ffd1dc;
    letter-spacing: 4px;
    text-shadow: 0 0 25px #ff3d7f, 0 0 50px #ff3d7f, 0 0 90px #ff3d7f;
    animation: glowPulse 1.5s ease-in-out infinite, popIn 0.8s cubic-bezier(0.34,1.56,0.64,1);
    margin-bottom: 12px;
    line-height: 1.15;
  }
  @keyframes popIn {
    0%   { transform: scale(0.2); opacity: 0; }
    70%  { transform: scale(1.15); }
    100% { transform: scale(1); opacity: 1; }
  }

  #celebration h2 {
    font-size: clamp(16px, 3vw, 32px);
    color: #ff8fab;
    letter-spacing: 2px;
    text-shadow: 0 0 20px #ff3d7f;
    margin-bottom: 18px;
    animation: fadeIn 1.5s ease 0.4s backwards;
  }

  /* ✨ Declaration text */
  #declaration {
    font-size: clamp(14px, 2.6vw, 26px);
    color: #ffd1dc;
    letter-spacing: 1.5px;
    line-height: 1.7;
    text-shadow: 0 0 18px #ff3d7f, 0 0 35px #ff3d7f;
    margin-bottom: 20px;
    padding: 0 15px;
    max-width: 850px;
    animation: fadeIn 2s ease 0.9s backwards;
    font-style: italic;
  }
  #declaration .name {
    color: #fff;
    font-weight: bold;
    font-style: normal;
    text-shadow: 0 0 15px #fff, 0 0 30px #ff3d7f, 0 0 50px #ff3d7f;
    display: inline-block;
    animation: nameGlow 2s ease-in-out infinite;
  }
  @keyframes nameGlow {
    0%, 100% { transform: scale(1); }
    50%      { transform: scale(1.08); }
  }

  /* Kiss animation area */
  #kiss-area {
    position: relative;
    width: 200px;
    height: 110px;
    margin: 10px auto 15px;
    flex-shrink: 0;
  }
  .kiss-lip {
    position: absolute;
    font-size: clamp(50px, 9vw, 75px);
    top: 15px;
    opacity: 0;
    filter: drop-shadow(0 0 20px #ff3d7f);
  }
  #lip-left  { left: 0;  animation: kissLeft 3s ease-in-out infinite; }
  #lip-right { right: 0; animation: kissRight 3s ease-in-out infinite; }

  @keyframes kissLeft {
    0%   { transform: translateX(-30px) rotate(-15deg); opacity: 0; }
    20%  { opacity: 1; }
    45%  { transform: translateX(42px) rotate(0deg); opacity: 1; }
    55%  { transform: translateX(46px) rotate(5deg) scale(1.15); opacity: 1; }
    70%  { transform: translateX(18px) rotate(-5deg); opacity: 1; }
    100% { transform: translateX(-30px) rotate(-15deg); opacity: 0; }
  }
  @keyframes kissRight {
    0%   { transform: translateX(30px) rotate(15deg); opacity: 0; }
    20%  { opacity: 1; }
    45%  { transform: translateX(-42px) rotate(0deg); opacity: 1; }
    55%  { transform: translateX(-46px) rotate(-5deg) scale(1.15); opacity: 1; }
    70%  { transform: translateX(-18px) rotate(5deg); opacity: 1; }
    100% { transform: translateX(30px) rotate(15deg); opacity: 0; }
  }

  .kiss-float {
    position: fixed;
    font-size: 36px;
    pointer-events: none;
    animation: kissFloat 3s ease-out forwards;
    filter: drop-shadow(0 0 15px #ff3d7f);
    z-index: 2005;
  }
  @keyframes kissFloat {
    0%   { transform: translate(0, 0) scale(0.3); opacity: 0; }
    25%  { opacity: 1; }
    100% { transform: translate(var(--dx), var(--dy)) scale(1.6); opacity: 0; }
  }

  #celebration .big-heart {
    font-size: clamp(50px, 11vw, 110px);
    animation: beat 1s infinite;
    filter: drop-shadow(0 0 30px #ff3d7f);
    flex-shrink: 0;
  }
  @keyframes beat {
    0%, 100% { transform: scale(1); }
    25%      { transform: scale(1.3); }
    50%      { transform: scale(0.95); }
    75%      { transform: scale(1.2); }
  }

  .celebration-heart {
    position: absolute;
    font-size: 26px;
    pointer-events: none;
    animation: floatUpCeleb linear infinite;
    opacity: 0;
    z-index: 1;
  }
  @keyframes floatUpCeleb {
    0%   { transform: translateY(0) scale(0.5) rotate(0deg); opacity: 0; }
    15%  { opacity: 1; }
    100% { transform: translateY(-115vh) scale(1.4) rotate(360deg); opacity: 0; }
  }

  /* Small screens */
  @media (max-height: 700px) {
    #declaration { font-size: clamp(12px, 2.3vw, 20px); line-height: 1.5; margin-bottom: 12px; }
    #celebration h1 { margin-bottom: 8px; }
    #celebration h2 { margin-bottom: 10px; }
    #kiss-area { margin: 5px auto 10px; height: 90px; }
    .kiss-lip { font-size: clamp(40px, 8vw, 60px); top: 8px; }
    #celebration .big-heart { font-size: clamp(40px, 9vw, 80px); }
  }
</style>
</head>
<body>

<!-- ================= START SCREEN ================= -->
<div id="start-screen">
  <div class="start-title">🌹 For You, Marziya Sultana Rubaiya 🌹</div>
  <div class="start-sub">Something special is waiting for you...</div>
  <button id="start-btn">💌 Click to Begin 💌</button>
</div>

<!-- ================= ANIMATION STAGE ================= -->
<div id="stage">
  <div id="rose-bloom"></div>
  <div id="fragment-stage"></div>

  <div id="final-text">
    <h1>I LOVE YOU RUBA</h1>
    <h2>DO YOU MARRY ME? 💍</h2>

    <div id="answer-buttons">
      <button id="yes-btn" class="ans-btn">YES 💍</button>
      <button id="no-btn"  class="ans-btn">NO 🙈</button>
    </div>
  </div>
</div>

<!-- ================= CELEBRATION SCREEN ================= -->
<div id="celebration">
  <div id="celebration-content">
    <h1>SHE SAID YES! 🎉</h1>
    <h2>Forever & Always ❤️</h2>

    <p id="declaration">
      <span class="name">Marziya Sultana Rubaiya</span> shudhu <span class="name">Sayem</span> er bou hobe,<br>
      onno karo hote parbe na. ❤️<br>
      <span class="name">Ruba</span> shudhu <span class="name">Sayem</span> er. 💕
    </p>

    <div id="kiss-area">
      <div class="kiss-lip" id="lip-left">💋</div>
      <div class="kiss-lip" id="lip-right">💋</div>
    </div>

    <div class="big-heart">💖</div>
  </div>
</div>

<script>
/* =========================================================
   REFS
   ========================================================= */
const startScreen = document.getElementById('start-screen');
const startBtn    = document.getElementById('start-btn');
const stage       = document.getElementById('stage');
const roseBloom   = document.getElementById('rose-bloom');
const fragStage   = document.getElementById('fragment-stage');
const finalText   = document.getElementById('final-text');
const answerBtns  = document.getElementById('answer-buttons');
const yesBtn      = document.getElementById('yes-btn');
const noBtn       = document.getElementById('no-btn');
const celebration = document.getElementById('celebration');
const kissArea    = document.getElementById('kiss-area');

/* ---------- Background hearts on start screen ---------- */
function spawnBgHearts() {
  const hearts = ['❤','💗','💖','🌹','💕','💋'];
  setInterval(() => {
    const h = document.createElement('div');
    h.className = 'bg-heart';
    h.textContent = hearts[Math.floor(Math.random()*hearts.length)];
    h.style.left = Math.random()*100 + 'vw';
    h.style.bottom = '-50px';
    h.style.fontSize = (16 + Math.random()*26) + 'px';
    const dur = 6 + Math.random()*6;
    h.style.animationDuration = dur + 's';
    startScreen.appendChild(h);
    setTimeout(() => h.remove(), dur * 1000 + 500);
  }, 350);
}
spawnBgHearts();

/* =========================================================
   PHASE 1 : Rose bloom
   ========================================================= */
function phase1RoseBloom() {
  const petalCount = 24;
  const petals = [];

  for (let i = 0; i < petalCount; i++) {
    const p = document.createElement('div');
    p.className = 'petal';
    const angle  = (i / petalCount) * Math.PI * 2;
    const layer  = i % 3;
    const radius = 20 + layer * 35;

    const startX = (Math.random() - 0.5) * window.innerWidth  * 0.95;
    const startY = (Math.random() - 0.5) * window.innerHeight * 0.95;

    p.style.left = startX + 'px';
    p.style.top  = startY + 'px';
    p.style.opacity = '0';
    p.style.transform = `rotate(${Math.random()*360}deg) scale(0.3)`;
    roseBloom.appendChild(p);
    petals.push({ el: p, angle, radius });
  }

  petals.forEach(({ el, angle, radius }, idx) => {
    const targetX = Math.cos(angle) * radius;
    const targetY = Math.sin(angle) * radius * 0.8;
    const rot     = (angle * 180 / Math.PI) + 90;

    setTimeout(() => {
      el.style.transition = 'all 1.4s cubic-bezier(0.34,1.56,0.64,1)';
      el.style.left = targetX + 'px';
      el.style.top  = targetY + 'px';
      el.style.opacity = '1';
      el.style.transform = `rotate(${rot}deg) scale(1)`;
    }, idx * 60 + 200);
  });

  setTimeout(() => {
    roseBloom.style.transition = 'transform 1s ease-in-out';
    roseBloom.style.transform  = 'translate(-50%, -50%) scale(1.08)';
    setTimeout(() => {
      roseBloom.style.transform = 'translate(-50%, -50%) scale(1)';
    }, 700);
  }, 2600);
}

/* =========================================================
   PHASE 2 : Floating flowers
   ========================================================= */
function phase2Flowers() {
  const flowerTypes = ['🌹','🌺','🌸','🌷','💐','🥀','💮'];
  const total = 65;

  for (let i = 0; i < total; i++) {
    const f = document.createElement('div');
    f.className = 'flower';
    f.textContent = flowerTypes[Math.floor(Math.random() * flowerTypes.length)];

    const startX = Math.random() * window.innerWidth;
    const startY = window.innerHeight + 60;
    const driftX = (Math.random() - 0.5) * 250;
    const size   = 20 + Math.random() * 45;
    const dur    = 3 + Math.random() * 3;

    f.style.left = startX + 'px';
    f.style.top  = startY + 'px';
    f.style.fontSize = size + 'px';
    stage.appendChild(f);

    setTimeout(() => {
      f.style.transition = `all ${dur}s linear`;
      f.style.opacity = '1';
      f.style.top  = '-120px';
      f.style.left = (startX + driftX) + 'px';
      f.style.transform = `rotate(${(Math.random()-0.5)*720}deg)`;
    }, Math.random() * 1500);

    setTimeout(() => f.remove(), 8000);
  }
}

/* =========================================================
   PHASE 3 : Petal fragments -> heart shape
   ========================================================= */
function phase3Fragments() {
  roseBloom.style.transition = 'opacity 1s, transform 1s';
  roseBloom.style.opacity = '0';
  roseBloom.style.transform = 'translate(-50%, -50%) scale(0.3)';

  const fragCount = 90;
  const frags = [];

  for (let i = 0; i < fragCount; i++) {
    const fr = document.createElement('div');
    fr.className = 'fragment';
    fragStage.appendChild(fr);
    frags.push(fr);
  }

  frags.forEach((fr, i) => {
    const t = i / fragCount;
    const startAngle = t * Math.PI * 2;
    const startRadius = 40;
    fr.style.transform = `translate(${Math.cos(startAngle)*startRadius}px, ${Math.sin(startAngle)*startRadius}px)`;
    fr.style.opacity = '1';

    setTimeout(() => {
      fr.style.transition = 'transform 2.5s cubic-bezier(0.4,0,0.2,1), opacity 2.5s';
      const hx = 16 * Math.pow(Math.sin(t * Math.PI * 2), 3);
      const hy = -(13 * Math.cos(t * Math.PI * 2)
                   - 5 * Math.cos(2 * t * Math.PI * 2)
                   - 2 * Math.cos(3 * t * Math.PI * 2)
                   - Math.cos(4 * t * Math.PI * 2));
      const scale = 18;
      fr.style.transform = `translate(${hx*scale}px, ${hy*scale}px) rotate(${startAngle*180}deg)`;
    }, 100 + i * 15);
  });

  setTimeout(() => {
    frags.forEach(f => {
      f.style.transition = 'opacity 1s, transform 1s';
      f.style.opacity = '0';
      f.style.transform += ' scale(2)';
    });
  }, 4300);
}

/* =========================================================
   PHASE 4 : Final text + answer buttons
   ========================================================= */
function phase4Text() {
  finalText.style.transition = 'opacity 1.5s ease-in';
  finalText.style.opacity = '1';

  setTimeout(() => {
    answerBtns.classList.add('show');
  }, 1200);

  const symbols = ['❤','💖','💕','🌹','💗','💘'];
  setInterval(() => {
    const h = document.createElement('div');
    h.className = 'confetti-heart';
    h.textContent = symbols[Math.floor(Math.random()*symbols.length)];
    h.style.left = Math.random() * 100 + 'vw';
    h.style.top = '-40px';
    h.style.fontSize = (16 + Math.random()*26) + 'px';
    h.style.opacity = '1';
    stage.appendChild(h);

    const dur = 4 + Math.random() * 4;
    requestAnimationFrame(() => {
      h.style.transition = `transform ${dur}s linear, opacity ${dur}s linear`;
      h.style.transform = `translateY(${window.innerHeight + 80}px) rotate(${(Math.random()-0.5)*720}deg)`;
      h.style.opacity = '0';
    });
    setTimeout(() => h.remove(), dur * 1000 + 500);
  }, 400);
}

/* =========================================================
   ANSWER HANDLING
   ========================================================= */
yesBtn.addEventListener('click', () => {
  showCelebration();
});

noBtn.addEventListener('click', () => {
  noBtn.style.transition = 'transform 0.4s';
  noBtn.style.transform = 'rotate(-10deg) scale(0.9)';
  noBtn.textContent = 'YES ❤️';

  setTimeout(() => {
    noBtn.style.transform = 'rotate(10deg) scale(1.1)';
  }, 200);

  setTimeout(() => {
    showCelebration();
  }, 700);
});

/* ---------- Celebration screen ---------- */
let celebrationStarted = false;
function showCelebration() {
  if (celebrationStarted) return;
  celebrationStarted = true;
  celebration.classList.add('show');
  spawnCelebrationHearts();
  startKissAnimation();
}

function spawnCelebrationHearts() {
  const hearts = ['❤','💖','💕','🌹','💗','💘','🌷','💐'];
  setInterval(() => {
    const h = document.createElement('div');
    h.className = 'celebration-heart';
    h.textContent = hearts[Math.floor(Math.random()*hearts.length)];
    h.style.left = Math.random() * 100 + 'vw';
    h.style.bottom = '-50px';
    h.style.fontSize = (20 + Math.random()*40) + 'px';
    const dur = 5 + Math.random()*5;
    h.style.animationDuration = dur + 's';
    celebration.appendChild(h);
    setTimeout(() => h.remove(), dur * 1000 + 500);
  }, 200);
}

/* =========================================================
   💋 KISS ANIMATION
   ========================================================= */
function startKissAnimation() {
  setInterval(() => {
    const rect = kissArea.getBoundingClientRect();
    const cx = rect.left + rect.width / 2;
    const cy = rect.top + rect.height / 2;

    const k = document.createElement('div');
    k.className = 'kiss-float';
    k.textContent = Math.random() > 0.5 ? '💋' : '😘';
    k.style.left = cx + 'px';
    k.style.top  = cy + 'px';
    k.style.setProperty('--dx', (Math.random() - 0.5) * 300 + 'px');
    k.style.setProperty('--dy', -(100 + Math.random() * 300) + 'px');
    celebration.appendChild(k);
    setTimeout(() => k.remove(), 3200);
  }, 550);
}

/* =========================================================
   START
   ========================================================= */
startBtn.addEventListener('click', () => {
  startScreen.classList.add('hide');
  setTimeout(() => startScreen.style.display = 'none', 1300);

  stage.classList.add('show');

  setTimeout(phase1RoseBloom, 400);
  setTimeout(phase2Flowers,   3600);
  setTimeout(phase3Fragments, 8000);
  setTimeout(phase4Text,     12500);
});
</script>
</body>
</html>
