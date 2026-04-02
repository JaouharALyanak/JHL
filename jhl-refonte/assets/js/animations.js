/**
 * JHL.ma — Animations JavaScript
 * Animations avancées et interactions
 */

// ============================================
// SPLIT TEXT ANIMATION (Hero Title)
// ============================================
function initSplitTextAnimation() {
  const splitLines = document.querySelectorAll('.split-line');
  
  splitLines.forEach((line, index) => {
    const text = line.textContent.trim();
    line.innerHTML = `<span>${text}</span>`;
  });
}

// ============================================
// PARALLAX EFFECT ON SCROLL
// ============================================
function initParallaxScroll() {
  const parallaxElements = document.querySelectorAll('[data-parallax]');
  
  if (parallaxElements.length === 0) return;
  
  window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    
    parallaxElements.forEach(el => {
      const speed = el.getAttribute('data-parallax') || 0.5;
      const yPos = -(scrolled * speed);
      el.style.transform = `translateY(${yPos}px)`;
    });
  });
}

// ============================================
// CARD TILT EFFECT (3D)
// ============================================
function initCardTilt() {
  const cards = document.querySelectorAll('.card, .project-card, .solution-card');
  
  cards.forEach(card => {
    card.addEventListener('mousemove', (e) => {
      const rect = card.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      
      const centerX = rect.width / 2;
      const centerY = rect.height / 2;
      
      const rotateX = (y - centerY) / 10;
      const rotateY = (centerX - x) / 10;
      
      card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-8px)`;
    });
    
    card.addEventListener('mouseleave', () => {
      card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateY(0)';
    });
  });
}

// ============================================
// MAGNETIC BUTTONS
// ============================================
function initMagneticButtons() {
  const buttons = document.querySelectorAll('.btn--primary');
  
  buttons.forEach(button => {
    button.addEventListener('mousemove', (e) => {
      const rect = button.getBoundingClientRect();
      const x = e.clientX - rect.left - rect.width / 2;
      const y = e.clientY - rect.top - rect.height / 2;
      
      button.style.transform = `translate(${x * 0.2}px, ${y * 0.2}px)`;
    });
    
    button.addEventListener('mouseleave', () => {
      button.style.transform = 'translate(0, 0)';
    });
  });
}

// ============================================
// SCROLL PROGRESS BAR
// ============================================
function initScrollProgress() {
  // Créer la barre de progression
  const progressBar = document.createElement('div');
  progressBar.style.cssText = `
    position: fixed;
    top: 0;
    left: 0;
    width: 0%;
    height: 3px;
    background: linear-gradient(90deg, #1E40AF, #3B82F6);
    z-index: 9999;
    transition: width 0.1s ease;
  `;
  document.body.appendChild(progressBar);
  
  // Mettre à jour la barre au scroll
  window.addEventListener('scroll', () => {
    const windowHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrolled = (window.pageYOffset / windowHeight) * 100;
    progressBar.style.width = scrolled + '%';
  });
}

// ============================================
// TEXT TYPING EFFECT (Optional)
// ============================================
function initTypingEffect(element, text, speed = 50) {
  if (!element) return;
  
  let i = 0;
  element.textContent = '';
  
  function type() {
    if (i < text.length) {
      element.textContent += text.charAt(i);
      i++;
      setTimeout(type, speed);
    }
  }
  
  type();
}

// ============================================
// BADGE DOT PULSE (Already in CSS but can be enhanced)
// ============================================
function enhanceBadgeDot() {
  const badgeDot = document.querySelector('.badge__dot');
  if (!badgeDot) return;
  
  // Ajouter un effet de ripple au clic
  badgeDot.addEventListener('click', (e) => {
    const ripple = document.createElement('span');
    ripple.style.cssText = `
      position: absolute;
      width: 20px;
      height: 20px;
      background: rgba(30, 64, 175, 0.5);
      border-radius: 50%;
      transform: scale(0);
      animation: ripple 0.6s ease-out;
    `;
    
    badgeDot.style.position = 'relative';
    badgeDot.appendChild(ripple);
    
    setTimeout(() => ripple.remove(), 600);
  });
}

// ============================================
// GRADIENT FOLLOWER (Mouse effect on hero)
// ============================================
function initGradientFollower() {
  const hero = document.querySelector('.hero');
  if (!hero) return;
  
  const gradient = document.createElement('div');
  gradient.style.cssText = `
    position: absolute;
    width: 400px;
    height: 400px;
    background: radial-gradient(circle, rgba(30, 64, 175, 0.15) 0%, transparent 70%);
    pointer-events: none;
    transform: translate(-50%, -50%);
    transition: opacity 0.3s ease;
    opacity: 0;
    z-index: 1;
  `;
  
  hero.appendChild(gradient);
  
  hero.addEventListener('mousemove', (e) => {
    const rect = hero.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    
    gradient.style.left = x + 'px';
    gradient.style.top = y + 'px';
    gradient.style.opacity = '1';
  });
  
  hero.addEventListener('mouseleave', () => {
    gradient.style.opacity = '0';
  });
}

// ============================================
// ANIMATE STATS ON HOVER
// ============================================
function initStatsHover() {
  const stats = document.querySelectorAll('.stat');
  
  stats.forEach(stat => {
    stat.addEventListener('mouseenter', () => {
      const value = stat.querySelector('.stat__value');
      value.style.animation = 'counterPulse 0.5s ease-in-out';
    });
    
    stat.addEventListener('mouseleave', () => {
      const value = stat.querySelector('.stat__value');
      value.style.animation = '';
    });
  });
}

// ============================================
// PRELOADER (Optional)
// ============================================
function initPreloader() {
  const preloader = document.createElement('div');
  preloader.id = 'preloader';
  preloader.style.cssText = `
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #0A0A0A;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 99999;
    transition: opacity 0.5s ease;
  `;
  
  preloader.innerHTML = `
    <div class="spinner" style="
      width: 50px;
      height: 50px;
      border: 3px solid rgba(255, 255, 255, 0.1);
      border-top-color: #1E40AF;
      border-radius: 50%;
      animation: spin 0.8s linear infinite;
    "></div>
  `;
  
  document.body.insertBefore(preloader, document.body.firstChild);
  
  window.addEventListener('load', () => {
    setTimeout(() => {
      preloader.style.opacity = '0';
      setTimeout(() => preloader.remove(), 500);
    }, 500);
  });
}

// ============================================
// INTERSECTION OBSERVER FOR STAGGER ANIMATIONS
// ============================================
function initStaggerAnimation() {
  const staggerContainers = document.querySelectorAll('.stagger-children');
  
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
  };
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const children = entry.target.querySelectorAll('.reveal');
        children.forEach((child, index) => {
          setTimeout(() => {
            child.classList.add('visible');
          }, index * 100);
        });
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);
  
  staggerContainers.forEach(container => observer.observe(container));
}

// ============================================
// INIT ALL ANIMATIONS
// ============================================
document.addEventListener('DOMContentLoaded', () => {
  console.log('🎨 Animations initialisées');
  
  // Initialiser les animations de base
  initSplitTextAnimation();
  initScrollProgress();
  enhanceBadgeDot();
  initStatsHover();
  
  // Animations avancées (optionnelles)
  // Décommenter si souhaité :
  // initCardTilt();
  // initMagneticButtons();
  // initParallaxScroll();
  // initGradientFollower();
  // initPreloader();
});

// Export functions for external use
window.JHL_Animations = {
  initTypingEffect,
  initCardTilt,
  initMagneticButtons,
  initParallaxScroll
};
