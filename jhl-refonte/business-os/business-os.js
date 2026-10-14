/**
 * JHL Business OS — Landing Page JavaScript
 * Formulaire, FAQ accordion, animations, analytics
 */

'use strict';

// ============================================
// FAQ ACCORDION
// ============================================
function initFAQ() {
  const items = document.querySelectorAll('.bos-faq-item');
  if (!items.length) return;

  items.forEach(item => {
    const question = item.querySelector('.bos-faq-question');
    if (!question) return;

    question.addEventListener('click', () => {
      const isOpen = item.classList.contains('open');

      // Fermer tous les autres
      items.forEach(other => {
        if (other !== item) {
          other.classList.remove('open');
          const q = other.querySelector('.bos-faq-question');
          if (q) q.setAttribute('aria-expanded', 'false');
        }
      });

      // Basculer le courant
      item.classList.toggle('open', !isOpen);
      question.setAttribute('aria-expanded', !isOpen ? 'true' : 'false');
    });
  });
}

// ============================================
// SMOOTH SCROLL ANCHORS
// ============================================
function initBosScrollLinks() {
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const href = this.getAttribute('href');
      if (!href || href === '#') return;
      e.preventDefault();

      const target = document.getElementById(href.substring(1));
      if (target) {
        const offset = target.getBoundingClientRect().top + window.scrollY - 90;
        window.scrollTo({ top: offset, behavior: 'smooth' });
      }
    });
  });
}

// ============================================
// FORMULAIRE DE PARTICIPATION — VALIDATION OPTIMISÉE ADS
// Seuls le Nom, l'Email et le Consentement sont bloquants
// ============================================
const BOS_FIELDS_REQUIRED = [
  'bos_nom',
  'bos_email',
  'bos_consentement'
];

const BOS_FIELD_MESSAGES = {
  bos_nom: 'Veuillez indiquer votre nom et prénom.',
  bos_email: 'Veuillez entrer une adresse e-mail valide.',
  bos_consentement: 'Veuillez accepter d\'être recontacté pour activer votre accès.'
};

function validateBosForm(form) {
  let valid = true;
  const errors = {};

  // Champ nom
  const nomEl = form.elements['bos_nom'];
  if (nomEl) {
    const val = nomEl.value ? nomEl.value.trim() : '';
    if (!val || val.length < 2) {
      errors['bos_nom'] = BOS_FIELD_MESSAGES['bos_nom'];
      valid = false;
    }
  }

  // Champ email
  const emailEl = form.elements['bos_email'];
  if (emailEl) {
    const val = emailEl.value ? emailEl.value.trim() : '';
    const emailOk = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val);
    if (!val || !emailOk) {
      errors['bos_email'] = BOS_FIELD_MESSAGES['bos_email'];
      valid = false;
    }
  }

  // Consentement
  const consent = form.elements['bos_consentement'];
  if (!consent || !consent.checked) {
    errors['bos_consentement'] = BOS_FIELD_MESSAGES['bos_consentement'];
    valid = false;
  }

  return { valid, errors };
}

function showBosFieldErrors(form, errors) {
  // Réinitialiser
  form.querySelectorAll('.bos-form-input, .bos-form-select, .bos-form-textarea').forEach(el => {
    el.classList.remove('error');
  });
  form.querySelectorAll('.bos-form-error').forEach(el => {
    el.textContent = '';
    el.classList.remove('visible');
  });

  // Afficher les erreurs
  Object.entries(errors).forEach(([name, msg]) => {
    const input = form.elements[name];
    const errorEl = form.querySelector(`[data-error="${name}"]`);

    if (input) {
      input.classList.add('error');
    }
    if (errorEl) {
      errorEl.textContent = msg;
      errorEl.classList.add('visible');
    }
  });

  // Focus sur le premier champ en erreur
  const firstError = Object.keys(errors)[0];
  if (firstError) {
    const el = form.elements[firstError];
    if (el && el.focus) {
      el.scrollIntoView({ behavior: 'smooth', block: 'center' });
      setTimeout(() => el.focus(), 300);
    }
  }
}

// ============================================
// ANTI-SPAM HONEYPOT
// ============================================
function addHoneypot(form) {
  const hp = document.createElement('input');
  hp.type = 'text';
  hp.name = '_hp_business_os';
  hp.style.cssText = 'position:absolute;left:-9999px;opacity:0;pointer-events:none;tabindex:-1;';
  hp.setAttribute('tabindex', '-1');
  hp.setAttribute('autocomplete', 'off');
  form.appendChild(hp);
}

function isSpam(form) {
  const hp = form.elements['_hp_business_os'];
  return hp && hp.value.length > 0;
}

// ============================================
// PROTECTION DOUBLE SOUMISSION
// ============================================
let bosSubmitting = false;

function setSubmitState(btn, loading) {
  if (loading) {
    btn.disabled = true;
    btn.dataset.originalText = btn.innerHTML;
    btn.innerHTML = `<span class="bos-spinner" aria-hidden="true"></span> Envoi en cours…`;
    bosSubmitting = true;
  } else {
    btn.disabled = false;
    btn.innerHTML = btn.dataset.originalText || 'Soumettre ma demande de test';
    bosSubmitting = false;
  }
}

// ============================================
// SOUMISSION — PHP SMTP (avec détection automatique d'URL relative ou absolue)
// ============================================
async function submitBosForm(form) {
  // Construire l'objet de données
  const formData = new FormData(form);
  const data = {};

  // Champs simples
  [
    'bos_nom', 'bos_entreprise', 'bos_email', 'bos_whatsapp',
    'bos_ville', 'bos_secteur', 'bos_volume_mensuel', 'bos_volume_ia',
    'bos_difficulte', 'bos_budget', 'bos_participation', 'bos_consentement'
  ].forEach(name => {
    data[name] = formData.get(name) || '';
  });

  // Checkboxes multiples (plateformes)
  const platforms = formData.getAll('bos_plateformes[]');
  data['bos_plateformes'] = platforms.length > 0 ? platforms.join(', ') : 'Non spécifié';

  // S'assurer que le consentement est bien valorisé
  if (!data['bos_consentement']) {
    data['bos_consentement'] = 'oui';
  }

  // Déterminer l'endpoint de manière dynamique et infaillible
  const isSubdir = window.location.pathname.includes('/business-os');
  let endpoint = isSubdir ? '../business-os-form.php' : 'business-os-form.php';

  // Si ouvert directement en fichier local (file:///)
  if (window.location.protocol === 'file:') {
    throw new Error('Pour tester l\'envoi du formulaire en local, ouvrez la page via un serveur HTTP (ex: http://localhost/ ou http://127.0.0.1:8000/).');
  }

  let response;
  try {
    // Utiliser FormData pour une compatibilité native 100% avec tous les serveurs PHP Apache/Nginx
    response = await fetch(endpoint, {
      method: 'POST',
      body: formData
    });
  } catch (networkErr) {
    // Fallback 1 : essayer avec la racine absolue
    try {
      response = await fetch('/business-os-form.php', {
        method: 'POST',
        body: formData
      });
    } catch (fallbackErr) {
      // Fallback 2 : essayer avec JSON
      response = await fetch(endpoint, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json'
        },
        body: JSON.stringify(data)
      });
    }
  }

  const result = await response.json().catch(() => ({}));

  if (!response.ok) {
    if (result.errors) {
      showBosFieldErrors(form, result.errors);
      const firstMsg = Object.values(result.errors)[0];
      throw new Error(firstMsg || 'Veuillez vérifier les informations saisies.');
    }
    throw new Error(result.message || `Erreur serveur (${response.status})`);
  }

  return result;
}

// ============================================
// AFFICHER SUCCÈS
// ============================================
function showBosSuccess(form) {
  const successEl = document.getElementById('bosFormSuccess');
  const errorEl = document.getElementById('bosFormError');
  if (successEl) {
    successEl.classList.add('visible');
  }
  if (errorEl) {
    errorEl.classList.remove('visible');
  }

  // Masquer le formulaire après succès
  const formFields = form.querySelector('.bos-form__fields');
  if (formFields) {
    formFields.style.opacity = '0.4';
    formFields.style.pointerEvents = 'none';
  }

  if (successEl) {
    successEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
  }

  // Analytics custom event
  trackBosEvent('form_submitted', { label: 'bos_participation_form' });
}

// ============================================
// AFFICHER ERREUR GLOBALE
// ============================================
function showBosGlobalError(msg) {
  const errorEl = document.getElementById('bosFormError');
  if (errorEl) {
    errorEl.textContent = msg || 'Une erreur est survenue. Veuillez réessayer ou écrire à contact@jhl.ma';
    errorEl.classList.add('visible');
    errorEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
  }
}

// ============================================
// INIT FORMULAIRE
// ============================================
function initBosForm() {
  const form = document.getElementById('bosForm');
  if (!form) return;

  // Ajouter honeypot
  addHoneypot(form);

  // Validation temps réel (au blur)
  form.querySelectorAll('.bos-form-input, .bos-form-select, .bos-form-textarea').forEach(el => {
    el.addEventListener('blur', () => {
      if (!el.name) return;
      const { errors } = validateBosForm(form);
      const errorEl = form.querySelector(`[data-error="${el.name}"]`);

      if (errors[el.name]) {
        el.classList.add('error');
        if (errorEl) {
          errorEl.textContent = errors[el.name];
          errorEl.classList.add('visible');
        }
      } else {
        el.classList.remove('error');
        if (errorEl) {
          errorEl.textContent = '';
          errorEl.classList.remove('visible');
        }
      }
    });

    el.addEventListener('input', () => {
      el.classList.remove('error');
      const errorEl = form.querySelector(`[data-error="${el.name}"]`);
      if (errorEl) {
        errorEl.textContent = '';
        errorEl.classList.remove('visible');
      }
    });
  });

  // Soumission
  form.addEventListener('submit', async (e) => {
    e.preventDefault();

    if (bosSubmitting) return;

    // Vérification anti-spam
    if (isSpam(form)) {
      console.warn('Spam détecté, soumission ignorée.');
      return;
    }

    // Validation
    const { valid, errors } = validateBosForm(form);
    if (!valid) {
      showBosFieldErrors(form, errors);
      trackBosEvent('form_validation_error', { fields: Object.keys(errors) });
      return;
    }

    const submitBtn = form.querySelector('button[type="submit"]');
    setSubmitState(submitBtn, true);

    // Masquer les erreurs globales
    const globalError = document.getElementById('bosFormError');
    if (globalError) globalError.classList.remove('visible');

    try {
      await submitBosForm(form);
      showBosSuccess(form);

    } catch (err) {
      console.error('Erreur soumission:', err);
      showBosGlobalError(err.message || 'Une erreur est survenue lors de l\'enregistrement. Veuillez vérifier les champs.');
      setSubmitState(submitBtn, false);
    }
  });
}

// ============================================
// ANALYTICS — MESURES DE VALIDATION MARCHÉ
// ============================================
function trackBosEvent(eventName, params = {}) {
  // Google Analytics 4 (si disponible)
  if (typeof gtag === 'function') {
    gtag('event', eventName, {
      event_category: 'business_os',
      ...params
    });
  }

  // Plausible (si disponible)
  if (typeof plausible === 'function') {
    plausible(eventName, { props: params });
  }

  // Log en développement
  if (window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1') {
    console.log('[BOS Analytics]', eventName, params);
  }
}

function initBosAnalytics() {
  // CTA principaux
  document.querySelectorAll('[data-bos-track]').forEach(el => {
    el.addEventListener('click', () => {
      const eventName = el.dataset.bosTrack;
      trackBosEvent(eventName, { label: el.textContent.trim() });
    });
  });

  // Début de saisie formulaire
  let formStarted = false;
  const form = document.getElementById('bosForm');
  if (form) {
    form.addEventListener('focusin', () => {
      if (!formStarted) {
        formStarted = true;
        trackBosEvent('form_started', { label: 'bos_participation_form' });
      }
    });
  }

  // Vue de page
  trackBosEvent('page_view', { page: 'business_os_landing' });
}

// ============================================
// STICKY HEADER SCROLL
// ============================================
function initBosHeaderScroll() {
  const header = document.querySelector('.header');
  if (!header) return;

  window.addEventListener('scroll', () => {
    if (window.scrollY > 80) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
  });
}

// ============================================
// REVEAL ON SCROLL (réutilise la logique existante)
// ============================================
function initBosReveal() {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, {
    threshold: 0.08,
    rootMargin: '0px 0px -40px 0px'
  });

  document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .reveal-scale').forEach(el => {
    observer.observe(el);
  });
}

// ============================================
// ANIMATION MAQUETTE — Simulation live
// ============================================
function initMockupAnimation() {
  const typingEl = document.getElementById('bosTypingIndicator');
  if (!typingEl) return;

  // Simuler l'apparition du message IA après un délai
  setTimeout(() => {
    typingEl.style.display = 'flex';
  }, 2000);

  setTimeout(() => {
    typingEl.style.display = 'none';
    const aiMsg = document.getElementById('bosAiResponse');
    if (aiMsg) {
      aiMsg.style.display = 'flex';
      aiMsg.style.animation = 'bos-fadeIn 0.4s ease';
    }
  }, 4500);
}

// ============================================
// MOBILE MENU (réutilise la logique existante)
// ============================================
function initBosMobileMenu() {
  const toggle = document.querySelector('.header__toggle');
  const mobileMenu = document.querySelector('.header__mobile-menu');
  if (!toggle || !mobileMenu) return;

  toggle.addEventListener('click', () => {
    const isExpanded = toggle.getAttribute('aria-expanded') === 'true';
    toggle.setAttribute('aria-expanded', !isExpanded);
    toggle.classList.toggle('active');
    mobileMenu.classList.toggle('active');
  });

  mobileMenu.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      toggle.classList.remove('active');
      mobileMenu.classList.remove('active');
      toggle.setAttribute('aria-expanded', 'false');
    });
  });
}

// ============================================
// INIT ALL
// ============================================
document.addEventListener('DOMContentLoaded', () => {
  console.log('🚀 JHL Business OS — Landing page chargée');

  initFAQ();
  initBosScrollLinks();
  initBosForm();
  initBosAnalytics();
  initBosHeaderScroll();
  initBosReveal();
  initMockupAnimation();
  initBosMobileMenu();
});
