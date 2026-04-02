/**
 * JHL.ma — Main JavaScript
 * Intersection Observer, Smooth Scroll, Init
 */

// ============================================
// INTERSECTION OBSERVER — Reveal Elements
// ============================================
function initRevealOnScroll() {
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        
        // Si c'est un compteur, lancer l'animation
        if (entry.target.classList.contains('stat')) {
          const valueElement = entry.target.querySelector('.stat__number');
          if (valueElement && !valueElement.classList.contains('animated')) {
            animateCounter(valueElement);
            valueElement.classList.add('animated');
          }
        }
      }
    });
  }, observerOptions);

  // Observer tous les éléments avec la classe 'reveal'
  document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .reveal-scale').forEach(el => {
    observer.observe(el);
  });

  // Observer aussi les stats pour l'animation des compteurs
  document.querySelectorAll('.stat').forEach(el => {
    observer.observe(el);
  });
}

// ============================================
// COUNTER ANIMATION
// ============================================
function animateCounter(element) {
  const target = parseInt(element.getAttribute('data-target'));
  const suffix = element.getAttribute('data-suffix') || '';
  let start = 0;
  const duration = 2000; // 2 secondes
  const startTime = performance.now();

  function updateCounter(currentTime) {
    const elapsed = currentTime - startTime;
    const progress = Math.min(elapsed / duration, 1);
    
    // Easing function (easeOutCubic)
    const eased = 1 - Math.pow(1 - progress, 3);
    const current = Math.floor(eased * target);
    
    element.textContent = current + suffix;
    
    if (progress < 1) {
      requestAnimationFrame(updateCounter);
    } else {
      element.textContent = target + suffix;
      // Ajouter l'animation pulse une fois terminé
      element.classList.add('counter-animated');
    }
  }

  requestAnimationFrame(updateCounter);
}

// ============================================
// SMOOTH SCROLL FOR ANCHOR LINKS
// ============================================
function initSmoothScroll() {
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const href = this.getAttribute('href');
      
      // Ignorer les liens vides ou juste "#"
      if (href === '#' || !href) return;
      
      e.preventDefault();
      
      const targetId = href.substring(1);
      const targetElement = document.getElementById(targetId);
      
      if (targetElement) {
        const offsetTop = targetElement.offsetTop - 80; // Offset pour la navigation
        
        window.scrollTo({
          top: offsetTop,
          behavior: 'smooth'
        });
      }
    });
  });
}

// ============================================
// NAVBAR SCROLL EFFECT (si navigation sticky)
// ============================================
function initNavbarScroll() {
  const navbar = document.querySelector('.navbar');
  
  if (!navbar) return;
  
  window.addEventListener('scroll', () => {
    if (window.scrollY > 100) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });
}

// ============================================
// CUSTOM CURSOR (Optional - Advanced)
// ============================================
function initCustomCursor() {
  // Créer le curseur personnalisé
  const cursor = document.createElement('div');
  cursor.classList.add('custom-cursor');
  cursor.style.cssText = `
    position: fixed;
    width: 10px;
    height: 10px;
    background: var(--color-accent);
    border-radius: 50%;
    pointer-events: none;
    z-index: 10000;
    transition: transform 0.2s ease, opacity 0.2s ease;
    opacity: 0;
  `;
  document.body.appendChild(cursor);

  // Suivre la souris
  document.addEventListener('mousemove', (e) => {
    cursor.style.left = e.clientX + 'px';
    cursor.style.top = e.clientY + 'px';
    cursor.style.opacity = '1';
  });

  // Agrandir au survol des liens et boutons
  document.querySelectorAll('a, button, .btn').forEach(el => {
    el.addEventListener('mouseenter', () => {
      cursor.style.transform = 'scale(3)';
      cursor.style.opacity = '0.5';
    });
    
    el.addEventListener('mouseleave', () => {
      cursor.style.transform = 'scale(1)';
      cursor.style.opacity = '1';
    });
  });

  // Masquer au déplacement hors de la fenêtre
  document.addEventListener('mouseleave', () => {
    cursor.style.opacity = '0';
  });
}

// ============================================
// CANVAS MESH BACKGROUND (Hero)
// ============================================
function initHeroMesh() {
  const heroMesh = document.querySelector('.hero__mesh');
  if (!heroMesh) return;

  // Créer un canvas pour l'animation de particules
  const canvas = document.createElement('canvas');
  const ctx = canvas.getContext('2d');
  
  canvas.style.position = 'absolute';
  canvas.style.top = '0';
  canvas.style.left = '0';
  canvas.style.width = '100%';
  canvas.style.height = '100%';
  canvas.style.pointerEvents = 'none';
  
  heroMesh.appendChild(canvas);

  // Fonction de resize
  function resizeCanvas() {
    canvas.width = heroMesh.offsetWidth;
    canvas.height = heroMesh.offsetHeight;
  }
  
  resizeCanvas();
  window.addEventListener('resize', resizeCanvas);

  // Particules
  const particles = [];
  const particleCount = 50;
  const connectionDistance = 150;

  class Particle {
    constructor() {
      this.x = Math.random() * canvas.width;
      this.y = Math.random() * canvas.height;
      this.vx = (Math.random() - 0.5) * 0.5;
      this.vy = (Math.random() - 0.5) * 0.5;
      this.radius = 2;
    }

    update() {
      this.x += this.vx;
      this.y += this.vy;

      if (this.x < 0 || this.x > canvas.width) this.vx *= -1;
      if (this.y < 0 || this.y > canvas.height) this.vy *= -1;
    }

    draw() {
      ctx.beginPath();
      ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
      ctx.fillStyle = 'rgba(30, 64, 175, 0.5)';
      ctx.fill();
    }
  }

  // Créer les particules
  for (let i = 0; i < particleCount; i++) {
    particles.push(new Particle());
  }

  // Animation
  function animate() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // Mettre à jour et dessiner les particules
    particles.forEach(particle => {
      particle.update();
      particle.draw();
    });

    // Dessiner les connexions
    for (let i = 0; i < particles.length; i++) {
      for (let j = i + 1; j < particles.length; j++) {
        const dx = particles[i].x - particles[j].x;
        const dy = particles[i].y - particles[j].y;
        const distance = Math.sqrt(dx * dx + dy * dy);

        if (distance < connectionDistance) {
          const opacity = (1 - distance / connectionDistance) * 0.3;
          ctx.beginPath();
          ctx.strokeStyle = `rgba(30, 64, 175, ${opacity})`;
          ctx.lineWidth = 1;
          ctx.moveTo(particles[i].x, particles[i].y);
          ctx.lineTo(particles[j].x, particles[j].y);
          ctx.stroke();
        }
      }
    }

    requestAnimationFrame(animate);
  }

  animate();
}

// ============================================
// LAZY LOADING IMAGES (Fallback pour anciens navigateurs)
// ============================================
function initLazyLoading() {
  if ('loading' in HTMLImageElement.prototype) {
    // Le navigateur supporte le lazy loading natif
    return;
  }

  // Fallback pour anciens navigateurs
  const images = document.querySelectorAll('img[loading="lazy"]');
  
  const imageObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const img = entry.target;
        img.src = img.dataset.src || img.src;
        imageObserver.unobserve(img);
      }
    });
  });

  images.forEach(img => imageObserver.observe(img));
}

// ============================================
// INIT ALL
// ============================================
document.addEventListener('DOMContentLoaded', () => {
  console.log('🚀 JHL.ma — Site chargé');
  
  // Initialiser toutes les fonctionnalités
  initRevealOnScroll();
  initSmoothScroll();
  initNavbarScroll();
  initHeroMesh();
  initLazyLoading();
  initMobileMenu();

  // Optionnel : curseur personnalisé (décommenter si souhaité)
  // initCustomCursor();
});

// ============================================
// MOBILE MENU TOGGLE
// ============================================
function initMobileMenu() {
  const toggle = document.querySelector('.header__toggle');
  const mobileMenu = document.querySelector('.header__mobile-menu');
  
  if (!toggle || !mobileMenu) return;
  
  toggle.addEventListener('click', () => {
    const isExpanded = toggle.getAttribute('aria-expanded') === 'true';
    
    toggle.setAttribute('aria-expanded', !isExpanded);
    toggle.classList.toggle('active');
    mobileMenu.classList.toggle('active');
  });
  
  // Fermer le menu lors du clic sur un lien
  const mobileLinks = mobileMenu.querySelectorAll('a');
  mobileLinks.forEach(link => {
    link.addEventListener('click', () => {
      toggle.classList.remove('active');
      mobileMenu.classList.remove('active');
      toggle.setAttribute('aria-expanded', 'false');
    });
  });
  
  // Fermer le menu lors du scroll
  let lastScrollY = window.scrollY;
  window.addEventListener('scroll', () => {
    if (Math.abs(window.scrollY - lastScrollY) > 50) {
      toggle.classList.remove('active');
      mobileMenu.classList.remove('active');
      toggle.setAttribute('aria-expanded', 'false');
      lastScrollY = window.scrollY;
    }
  });
}

// ============================================// PERFORMANCE MONITORING
// ============================================
window.addEventListener('load', () => {
  // Log performance metrics
  if (window.performance && window.performance.timing) {
    const perfData = window.performance.timing;
    const pageLoadTime = perfData.loadEventEnd - perfData.navigationStart;
    console.log(`⚡ Page chargée en ${pageLoadTime}ms`);
  }
});
