/**
 * JHL.ma — Form Validation & Submission
 * Gestion du formulaire de contact
 */

// ============================================
// FORM VALIDATION
// ============================================
function validateForm(formData) {
  const errors = {};
  
  // Validation Nom
  if (!formData.name || formData.name.trim().length < 2) {
    errors.name = 'Le nom doit contenir au moins 2 caractères';
  }
  
  // Validation Email
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!formData.email || !emailRegex.test(formData.email)) {
    errors.email = 'Veuillez entrer une adresse email valide';
  }
  
  // Validation Téléphone
  const phoneRegex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
  if (!formData.phone || !phoneRegex.test(formData.phone.replace(/\s/g, ''))) {
    errors.phone = 'Veuillez entrer un numéro de téléphone valide';
  }
  
  // Validation Service
  if (!formData.service || formData.service === '') {
    errors.service = 'Veuillez sélectionner un service';
  }
  
  // Validation Message
  if (!formData.message || formData.message.trim().length < 10) {
    errors.message = 'Le message doit contenir au moins 10 caractères';
  }
  
  return errors;
}

// ============================================
// DISPLAY ERRORS
// ============================================
function displayErrors(errors) {
  // Réinitialiser tous les messages d'erreur
  document.querySelectorAll('.form-error').forEach(el => {
    el.textContent = '';
  });
  
  // Réinitialiser les bordures
  document.querySelectorAll('.form-input, .form-select, .form-textarea').forEach(el => {
    el.style.borderColor = '';
  });
  
  // Afficher les nouvelles erreurs
  Object.keys(errors).forEach(field => {
    const errorElement = document.getElementById(`${field}Error`);
    const inputElement = document.getElementById(field);
    
    if (errorElement) {
      errorElement.textContent = errors[field];
    }
    
    if (inputElement) {
      inputElement.style.borderColor = 'var(--color-accent-soft)';
      
      // Focus sur le premier champ en erreur
      if (Object.keys(errors)[0] === field) {
        inputElement.focus();
      }
    }
  });
}

// ============================================
// SUBMIT FORM
// ============================================
async function submitForm(formData) {
  try {
    // Ici, vous pouvez implémenter l'appel à votre API
    // Pour l'instant, simulons un envoi
    
    // Option 1 : Envoi via Laravel (route web.php)
    const response = await fetch('/contact', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
      },
      body: JSON.stringify(formData)
    });
    
    if (!response.ok) {
      throw new Error('Erreur lors de l\'envoi du formulaire');
    }
    
    const result = await response.json();
    return result;
    
  } catch (error) {
    console.error('Erreur:', error);
    throw error;
  }
}

// ============================================
// SHOW SUCCESS MESSAGE
// ============================================
function showSuccessMessage() {
  const form = document.getElementById('contactForm');
  
  // Créer le message de succès
  const successMessage = document.createElement('div');
  successMessage.style.cssText = `
    padding: var(--space-6);
    background: rgba(34, 197, 94, 0.1);
    border: 1px solid rgba(34, 197, 94, 0.3);
    border-radius: 12px;
    margin-bottom: var(--space-6);
    text-align: center;
    animation: fadeIn 0.5s ease-in;
  `;
  successMessage.innerHTML = `
    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin: 0 auto var(--space-3);">
      <path d="M22 11.08V12C21.9988 14.1564 21.3005 16.2547 20.0093 17.9818C18.7182 19.709 16.9033 20.9725 14.8354 21.5839C12.7674 22.1953 10.5573 22.1219 8.53447 21.3746C6.51168 20.6273 4.78465 19.2461 3.61096 17.4371C2.43727 15.628 1.87979 13.4881 2.02168 11.3363C2.16356 9.18455 2.99721 7.13631 4.39828 5.49706C5.79935 3.85781 7.69279 2.71537 9.79619 2.24013C11.8996 1.7649 14.1003 1.98232 16.07 2.85999" stroke="#22C55E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M22 4L12 14.01L9 11.01" stroke="#22C55E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    <h3 style="color: #22C55E; margin-bottom: var(--space-2); font-size: var(--text-xl);">Message envoyé avec succès !</h3>
    <p style="color: var(--color-text-muted); margin: 0;">Nous vous contacterons dans les plus brefs délais.</p>
  `;
  
  form.insertBefore(successMessage, form.firstChild);
  
  // Réinitialiser le formulaire
  form.reset();
  
  // Supprimer le message après 5 secondes
  setTimeout(() => {
    successMessage.style.animation = 'fadeOut 0.5s ease-out';
    setTimeout(() => successMessage.remove(), 500);
  }, 5000);
  
  // Scroll vers le message
  successMessage.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}

// ============================================
// SHOW ERROR MESSAGE
// ============================================
function showErrorMessage(message = 'Une erreur est survenue. Veuillez réessayer.') {
  const form = document.getElementById('contactForm');
  
  const errorMessage = document.createElement('div');
  errorMessage.style.cssText = `
    padding: var(--space-4);
    background: rgba(30, 64, 175, 0.1);
    border: 1px solid rgba(30, 64, 175, 0.3);
    border-radius: 12px;
    margin-bottom: var(--space-6);
    text-align: center;
    color: var(--color-accent-soft);
    animation: fadeIn 0.5s ease-in;
  `;
  errorMessage.textContent = message;
  
  form.insertBefore(errorMessage, form.firstChild);
  
  setTimeout(() => {
    errorMessage.style.animation = 'fadeOut 0.5s ease-out';
    setTimeout(() => errorMessage.remove(), 500);
  }, 5000);
}

// ============================================
// INIT FORM
// ============================================
function initContactForm() {
  const form = document.getElementById('contactForm');
  if (!form) return;
  
  // Real-time validation
  const inputs = form.querySelectorAll('.form-input, .form-select, .form-textarea');
  inputs.forEach(input => {
    input.addEventListener('blur', () => {
      const formData = new FormData(form);
      const data = Object.fromEntries(formData);
      const errors = validateForm(data);
      
      // Afficher uniquement l'erreur pour ce champ
      if (errors[input.name]) {
        const errorElement = document.getElementById(`${input.name}Error`);
        if (errorElement) {
          errorElement.textContent = errors[input.name];
        }
        input.style.borderColor = 'var(--color-accent-soft)';
      } else {
        const errorElement = document.getElementById(`${input.name}Error`);
        if (errorElement) {
          errorElement.textContent = '';
        }
        input.style.borderColor = '';
      }
    });
    
    // Réinitialiser l'erreur à la saisie
    input.addEventListener('input', () => {
      const errorElement = document.getElementById(`${input.name}Error`);
      if (errorElement) {
        errorElement.textContent = '';
      }
      input.style.borderColor = '';
    });
  });
  
  // Submit handler
  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const formData = new FormData(form);
    const data = Object.fromEntries(formData);
    
    // Valider
    const errors = validateForm(data);
    
    if (Object.keys(errors).length > 0) {
      displayErrors(errors);
      return;
    }
    
    // Désactiver le bouton pendant l'envoi
    const submitButton = form.querySelector('button[type="submit"]');
    const originalText = submitButton.innerHTML;
    submitButton.disabled = true;
    submitButton.innerHTML = `
      <span class="spinner"></span>
      Envoi en cours...
    `;
    
    try {
      // Soumettre le formulaire
      await submitForm(data);
      
      // Afficher le message de succès
      showSuccessMessage();
      
      // Si Laravel n'est pas configuré, utiliser un simple console.log
      console.log('Données du formulaire:', data);
      
    } catch (error) {
      // Afficher le message d'erreur
      showErrorMessage();
    } finally {
      // Réactiver le bouton
      submitButton.disabled = false;
      submitButton.innerHTML = originalText;
    }
  });
}

// ============================================
// AUTO-FORMAT PHONE NUMBER
// ============================================
function initPhoneFormatter() {
  const phoneInput = document.getElementById('phone');
  if (!phoneInput) return;
  
  phoneInput.addEventListener('input', (e) => {
    let value = e.target.value.replace(/\D/g, '');
    
    // Format: +212 6XX-XXXXXX
    if (value.startsWith('212')) {
      value = value.substring(3);
    }
    
    if (value.length > 0) {
      if (value.length <= 3) {
        e.target.value = '+212 ' + value;
      } else if (value.length <= 6) {
        e.target.value = '+212 ' + value.substring(0, 3) + '-' + value.substring(3);
      } else {
        e.target.value = '+212 ' + value.substring(0, 3) + '-' + value.substring(3, 9);
      }
    }
  });
}

// ============================================
// INIT ALL
// ============================================
document.addEventListener('DOMContentLoaded', () => {
  console.log('📧 Formulaire de contact initialisé');
  
  initContactForm();
  initPhoneFormatter();
});

// ============================================
// FALLBACK: Submit via Email (si pas de backend)
// ============================================
function submitViaEmail(data) {
  const subject = encodeURIComponent(`Contact JHL - ${data.service}`);
  const body = encodeURIComponent(`
Nom: ${data.name}
Email: ${data.email}
Téléphone: ${data.phone}
Service: ${data.service}

Message:
${data.message}
  `);
  
  window.location.href = `mailto:contact@jhl.ma?subject=${subject}&body=${body}`;
}
