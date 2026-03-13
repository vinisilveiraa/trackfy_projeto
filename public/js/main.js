/**
 * TRACKFY - Main JavaScript
 * Funcionalidades compartilhadas entre páginas
 */

document.addEventListener('DOMContentLoaded', function () {
  // Inicializar componentes
  initNavbar();
  initTooltips();
  initAnimations();
});

/**
 * Inicializar navbar
 */
function initNavbar() {
  const userMenuToggle = document.getElementById('userMenuToggle');
  const userDropdown = document.getElementById('userDropdown');
  const navbarToggle = document.getElementById('navbarToggle');

  if (userMenuToggle && userDropdown) {
    userMenuToggle.addEventListener('click', function (e) {
      e.stopPropagation();
      userDropdown.classList.toggle('active');
    });

    document.addEventListener('click', function () {
      userDropdown.classList.remove('active');
    });
  }

  if (navbarToggle) {
    navbarToggle.addEventListener('click', function () {
      this.classList.toggle('active');
    });
  }
}

/**
 * Inicializar tooltips
 */
function initTooltips() {
  const tooltipElements = document.querySelectorAll('[title]');

  tooltipElements.forEach(element => {
    element.addEventListener('mouseenter', function () {
      const tooltip = createTooltip(this.getAttribute('title'));
      document.body.appendChild(tooltip);

      const rect = this.getBoundingClientRect();
      tooltip.style.top = (rect.top - tooltip.offsetHeight - 10) + 'px';
      tooltip.style.left = (rect.left + rect.width / 2 - tooltip.offsetWidth / 2) + 'px';

      setTimeout(() => tooltip.classList.add('visible'), 10);
    });

    element.addEventListener('mouseleave', function () {
      const tooltip = document.querySelector('.tooltip');
      if (tooltip) {
        tooltip.classList.remove('visible');
        setTimeout(() => tooltip.remove(), 300);
      }
    });
  });
}

/**
 * Criar elemento de tooltip
 */
function createTooltip(text) {
  const tooltip = document.createElement('div');
  tooltip.className = 'tooltip';
  tooltip.textContent = text;
  tooltip.style.cssText = `
    position: fixed;
    background-color: var(--bg-tertiary);
    color: var(--text-primary);
    padding: 8px 12px;
    border-radius: var(--radius-md);
    font-size: 12px;
    white-space: nowrap;
    z-index: 9999;
    opacity: 0;
    transition: opacity 0.3s;
    pointer-events: none;
  `;
  return tooltip;
}

/**
 * Inicializar animações ao scroll
 */
function initAnimations() {
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };

  const observer = new IntersectionObserver(function (entries) {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('fade-in');
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);

  document.querySelectorAll('.track-card, .review-card, .track-row').forEach(el => {
    observer.observe(el);
  });
}

/**
 * Função para formatar números
 */
function formatNumber(num) {
  if (num >= 1000000) {
    return (num / 1000000).toFixed(1) + 'M';
  } else if (num >= 1000) {
    return (num / 1000).toFixed(1) + 'K';
  }
  return num.toString();
}

/**
 * Função para formatar data relativa
 */
function formatRelativeDate(date) {
  const now = new Date();
  const diff = now - new Date(date);
  const seconds = Math.floor(diff / 1000);
  const minutes = Math.floor(seconds / 60);
  const hours = Math.floor(minutes / 60);
  const days = Math.floor(hours / 24);
  const weeks = Math.floor(days / 7);
  const months = Math.floor(days / 30);

  if (seconds < 60) return 'agora';
  if (minutes < 60) return `há ${minutes} minuto${minutes > 1 ? 's' : ''}`;
  if (hours < 24) return `há ${hours} hora${hours > 1 ? 's' : ''}`;
  if (days < 7) return `há ${days} dia${days > 1 ? 's' : ''}`;
  if (weeks < 4) return `há ${weeks} semana${weeks > 1 ? 's' : ''}`;
  if (months < 12) return `há ${months} mês${months > 1 ? 'es' : ''}`;
  return 'há muito tempo';
}

/**
 * Função para validar email
 */
function validateEmail(email) {
  const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return re.test(email);
}

/**
 * Função para mostrar notificação
 */
function showNotification(message, type = 'info', duration = 3000) {
  const notification = document.createElement('div');
  notification.className = `notification notification-${type}`;
  notification.innerHTML = `
    <div class="notification-content">
      <i class="fas fa-${getNotificationIcon(type)}"></i>
      <span>${message}</span>
    </div>
  `;
  notification.style.cssText = `
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: var(--bg-secondary);
    border: 1px solid var(--border-color);
    border-radius: var(--radius-lg);
    padding: 16px;
    z-index: 10000;
    animation: slideDown 0.3s ease-out;
    display: flex;
    align-items: center;
    gap: 12px;
  `;

  document.body.appendChild(notification);

  setTimeout(() => {
    notification.style.animation = 'slideUp 0.3s ease-out';
    setTimeout(() => notification.remove(), 300);
  }, duration);
}

/**
 * Obter ícone de notificação
 */
function getNotificationIcon(type) {
  const icons = {
    'success': 'check-circle',
    'error': 'exclamation-circle',
    'warning': 'exclamation-triangle',
    'info': 'info-circle'
  };
  return icons[type] || icons['info'];
}

/**
 * Função para copiar para clipboard
 */
function copyToClipboard(text) {
  navigator.clipboard.writeText(text).then(() => {
    showNotification('Copiado para a área de transferência!', 'success');
  }).catch(() => {
    showNotification('Erro ao copiar', 'error');
  });
}

/**
 * Função para fazer requisição AJAX
 */
function fetchAPI(url, options = {}) {
  const defaultOptions = {
    method: 'GET',
    headers: {
      'Content-Type': 'application/json'
    }
  };

  return fetch(url, { ...defaultOptions, ...options })
    .then(response => {
      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }
      return response.json();
    })
    .catch(error => {
      console.error('Fetch error:', error);
      showNotification('Erro ao carregar dados', 'error');
      throw error;
    });
}

/**
 * Função para debounce
 */
function debounce(func, wait) {
  let timeout;
  return function executedFunction(...args) {
    const later = () => {
      clearTimeout(timeout);
      func(...args);
    };
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
  };
}

/**
 * Função para throttle
 */
function throttle(func, limit) {
  let inThrottle;
  return function (...args) {
    if (!inThrottle) {
      func.apply(this, args);
      inThrottle = true;
      setTimeout(() => inThrottle = false, limit);
    }
  };
}


// Exportar funções globais
window.Trackfy = {
  formatNumber,
  formatRelativeDate,
  validateEmail,
  showNotification,
  copyToClipboard,
  fetchAPI,
  debounce,
  throttle
};

const message = document.getElementById('Message');

// se estiver visível
if (message && message.style.display === 'block') {
  // define tempo para sumir (ex: 3 segundos)
  setTimeout(() => {
    // adiciona animação de fade-out opcional
    message.style.transition = 'opacity 0.5s';
    message.style.opacity = 0;

    // depois do fade, remove do layout
    setTimeout(() => {
      message.style.display = 'none';
    }, 500);
  }, 3000); // 3000ms = 3 segundos
}
