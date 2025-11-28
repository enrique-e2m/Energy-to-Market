(() => {
  const root = document.querySelector('#footer .client-carousel');
  if (!root) return;
  const track = root.querySelector('.track');
  if (!track) return;
  let items = Array.from(track.querySelectorAll('.logo-wrap'));
  if (items.length === 0) return;
  const clone = items.map(n => n.cloneNode(true));
  clone.forEach(n => track.appendChild(n));
  let x = 0;
  let speed = 0.5;
  const setSpeed = () => {
    const w = window.innerWidth;
    speed = w >= 1280 ? 1 : w >= 768 ? 0.8 : 0.6;
  };
  setSpeed();
  let totalWidth = 0;
  const computeWidth = () => {
    totalWidth = Array.from(track.children).reduce((sum, el) => sum + el.getBoundingClientRect().width + parseFloat(getComputedStyle(track).gap || 0), 0) / 2;
  };
  computeWidth();
  let running = true;
  const loop = () => {
    if (running) {
      x -= speed;
      if (-x >= totalWidth) x = 0;
      track.style.transform = `translateX(${x}px)`;
    }
    requestAnimationFrame(loop);
  };
  loop();
  window.addEventListener('resize', () => { setSpeed(); computeWidth(); });
})();
