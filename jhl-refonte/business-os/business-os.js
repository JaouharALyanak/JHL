/**
 * JHL BUSINESS OS — JAVASCRIPT PRINCIPAL
 * Gestion de l'interactivité : FAQ, Toggle Démo Darija / Humain, Smooth Scroll, Formulaire
 */

'use strict';

document.addEventListener('DOMContentLoaded', () => {
  initNavbarScroll();
  initSmoothScroll();
  initFaqAccordion();
  initDarijaDemoToggle();
  initQualificationForm();
});

/* ==========================================================================
   1. NAVIGATION & SCROLL LINKS
   ========================================================================== */
function initNavbarScroll() {
  const navbar = document.querySelector('.bos-navbar');
  if (!navbar) return;

  window.addEventListener('scroll', () => {
    if (window.scrollY > 40) {
      navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.08)';
    } else {
      navbar.style.boxShadow = 'none';
    }
  }, { passive: true });
}

function initSmoothScroll() {
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      const targetId = this.getAttribute('href');
      if (!targetId || targetId === '#') return;

      const targetEl = document.querySelector(targetId);
      if (targetEl) {
        e.preventDefault();
        const navbarHeight = 80;
        const targetPosition = targetEl.getBoundingClientRect().top + window.pageYOffset - navbarHeight;

        window.scrollTo({
          top: targetPosition,
          behavior: 'smooth'
        });
      }
    });
  });
}

/* ==========================================================================
   2. FAQ ACCORDION (10 Questions Spécifiées)
   ========================================================================== */
function initFaqAccordion() {
  const faqItems = document.querySelectorAll('.bos-faq-item');
  if (!faqItems.length) return;

  faqItems.forEach(item => {
    const questionBtn = item.querySelector('.bos-faq-question');
    if (!questionBtn) return;

    questionBtn.addEventListener('click', () => {
      const isOpen = item.classList.contains('open');

      // Fermer tous les autres pour un confort de lecture optimal
      faqItems.forEach(otherItem => {
        if (otherItem !== item) {
          otherItem.classList.remove('open');
          const otherBtn = otherItem.querySelector('.bos-faq-question');
          if (otherBtn) otherBtn.setAttribute('aria-expanded', 'false');
        }
      });

      // Basculer l'item sélectionné
      item.classList.toggle('open', !isOpen);
      questionBtn.setAttribute('aria-expanded', String(!isOpen));
    });
  });
}

/* ==========================================================================
   3. TOGGLE DÉMONSTRATION DARIJA : RÉPONSE IA vs PRISE EN MAIN HUMAINE
   ========================================================================== */
function initDarijaDemoToggle() {
  const toggleBtns = document.querySelectorAll('.bos-darija-toggle-btn');
  const chatBubbleResponse = document.getElementById('bosDarijaResponseBubble');
  const chatMetaResponse = document.getElementById('bosDarijaResponseMeta');
  const chatSenderLabel = document.getElementById('bosDarijaSenderLabel');
  const takeoverAlert = document.getElementById('bosTakeoverAlert');

  if (!toggleBtns.length || !chatBubbleResponse) return;

  toggleBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      toggleBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const mode = btn.dataset.mode;

      if (mode === 'ai') {
        // Mode Réponse IA Automatique
        chatBubbleResponse.className = 'bos-chat-bubble-d bos-chat-bubble-d--ai';
        chatBubbleResponse.innerHTML = `Wa 3likom salam ! 😊 N9dro n2akdo lik disponibilité dyalo. 3tina smit lproduit bach n3tiwk taman s7i7.`;
        if (chatSenderLabel) {
          chatSenderLabel.innerHTML = `✨ Assistant IA JHL Business OS`;
          chatSenderLabel.style.color = 'var(--bos-primary)';
        }
        if (chatMetaResponse) {
          chatMetaResponse.textContent = `09:42 · Réponse automatique instantanée (2.1s)`;
        }
        if (takeoverAlert) {
          takeoverAlert.style.display = 'none';
        }
      } else {
        // Mode Prise en Main Humaine
        chatBubbleResponse.className = 'bos-chat-bubble-d bos-chat-bubble-d--human';
        chatBubbleResponse.innerHTML = `Wa 3likom salam ! C'est Mehdi de l'équipe commerciale. Je prends le relais de notre assistant : le produit est bien en stock en taille M et L au showroom de Casablanca !`;
        if (chatSenderLabel) {
          chatSenderLabel.innerHTML = `👤 Mehdi (Responsable Commercial) · Prise en main en direct`;
          chatSenderLabel.style.color = 'var(--bos-primary)';
        }
        if (chatMetaResponse) {
          chatMetaResponse.textContent = `09:43 · Prise de contrôle transparente sans interruption`;
        }
        if (takeoverAlert) {
          takeoverAlert.style.display = 'flex';
        }
      }
    });
  });
}

/* ==========================================================================
   4. FORMULAIRE DE QUALIFICATION COMPLET (15ème section)
   ========================================================================== */
function initQualificationForm() {
  const form = document.getElementById('bosMasterForm');
  const successBox = document.getElementById('bosFormSuccessAlert');
  const errorBox = document.getElementById('bosFormErrorAlert');
  const submitBtn = document.getElementById('bosFormSubmitBtn');

  if (!form) return;

  // Anti-spam honeypot injecté dynamiquement
  let hpField = form.querySelector('input[name="_hp_business_os"]');
  if (!hpField) {
    hpField = document.createElement('input');
    hpField.type = 'text';
    hpField.name = '_hp_business_os';
    hpField.style.cssText = 'position:absolute;left:-9999px;opacity:0;pointer-events:none;';
    hpField.tabIndex = -1;
    hpField.autocomplete = 'off';
    form.appendChild(hpField);
  }

  form.addEventListener('submit', async (e) => {
    e.preventDefault();

    // Vérification honeypot
    if (hpField && hpField.value.trim().length > 0) {
      form.style.display = 'none';
      if (successBox) successBox.style.display = 'block';
      return;
    }

    // Réinitialiser les messages d'erreur
    clearFormErrors(form);
    if (errorBox) {
      errorBox.style.display = 'none';
      errorBox.textContent = '';
    }

    // Validation locale préalable
    const isValid = validateClientSide(form);
    if (!isValid) {
      return;
    }

    // État de chargement
    setButtonLoading(submitBtn, true);

    try {
      const formData = new FormData(form);

      // Collecter les checkboxes multi-valeurs de manière lisible
      const plateformesSelected = Array.from(form.querySelectorAll('input[name="bos_plateformes[]"]:checked')).map(cb => cb.value);
      formData.set('bos_plateformes', plateformesSelected.length > 0 ? plateformesSelected.join(', ') : 'Non spécifié');

      const fonctionsSelected = Array.from(form.querySelectorAll('input[name="bos_fonctions_prioritaires[]"]:checked')).map(cb => cb.value);
      formData.set('bos_fonctions_prioritaires', fonctionsSelected.length > 0 ? fonctionsSelected.join(', ') : 'Non spécifié');

      // Détecter l'endpoint relatif ou absolu
      const isSubdir = window.location.pathname.includes('/business-os');
      let endpoint = isSubdir ? '../business-os-form.php' : 'business-os-form.php';

      if (window.location.protocol === 'file:') {
        throw new Error('Veuillez tester ce formulaire sur un serveur HTTP (ex: http://localhost ou sur jhl.ma).');
      }

      let response;
      try {
        response = await fetch(endpoint, {
          method: 'POST',
          body: formData
        });
      } catch (err) {
        // Fallback vers racine absolue
        response = await fetch('/business-os-form.php', {
          method: 'POST',
          body: formData
        });
      }

      const result = await response.json().catch(() => ({}));

      if (!response.ok) {
        if (result.errors) {
          displayFieldErrors(form, result.errors);
          const firstErr = Object.values(result.errors)[0];
          throw new Error(firstErr || 'Veuillez vérifier les informations saisies.');
        }
        throw new Error(result.message || `Une erreur est survenue (${response.status}).`);
      }

      // Succès !
      form.style.display = 'none';
      if (successBox) {
        successBox.style.display = 'block';
        successBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
      }

    } catch (error) {
      console.error('Erreur de soumission JHL Business OS:', error);
      if (errorBox) {
        errorBox.textContent = error.message || 'Une erreur est survenue lors de l\'envoi. Veuillez réessayer ou nous contacter à contact@jhl.ma.';
        errorBox.style.display = 'block';
        errorBox.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      }
    } finally {
      setButtonLoading(submitBtn, false);
    }
  });
}

function validateClientSide(form) {
  let valid = true;

  // Nom obligatoire
  const nomEl = form.querySelector('#bos_nom');
  if (nomEl && nomEl.value.trim().length < 2) {
    showFieldError('bos_nom', 'Veuillez indiquer votre nom et prénom.');
    valid = false;
  }

  // Email obligatoire
  const emailEl = form.querySelector('#bos_email');
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (emailEl && (!emailEl.value.trim() || !emailRegex.test(emailEl.value.trim()))) {
    showFieldError('bos_email', 'Veuillez indiquer une adresse e-mail valide.');
    valid = false;
  }

  // Consentement obligatoire
  const consentEl = form.querySelector('#bos_consentement');
  if (consentEl && !consentEl.checked) {
    showFieldError('bos_consentement', 'Veuillez accepter d\'être recontacté pour participer au test.');
    valid = false;
  }

  return valid;
}

function showFieldError(fieldName, message) {
  const errEl = document.querySelector(`.bos-field-error[data-for="${fieldName}"]`);
  if (errEl) {
    errEl.textContent = message;
    errEl.classList.add('visible');
  }
}

function clearFormErrors(form) {
  form.querySelectorAll('.bos-field-error').forEach(el => {
    el.textContent = '';
    el.classList.remove('visible');
  });
}

function displayFieldErrors(form, errors) {
  Object.keys(errors).forEach(key => {
    showFieldError(key, errors[key]);
  });
}

function setButtonLoading(btn, loading) {
  if (!btn) return;
  if (loading) {
    btn.disabled = true;
    btn.dataset.originalHtml = btn.innerHTML;
    btn.innerHTML = `<span class="bos-spinner" aria-hidden="true"></span> Envoi de votre candidature en cours…`;
  } else {
    btn.disabled = false;
    if (btn.dataset.originalHtml) {
      btn.innerHTML = btn.dataset.originalHtml;
    }
  }
}
