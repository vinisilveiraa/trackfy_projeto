<?php

/**
 * TRACKFY - Navbar Component
 * Componente de navegação principal
 */
?>

<nav class="navbar">
  <div class="navbar-container">
    <!-- Logo -->
    <div class="navbar-brand">
      <a href="/" class="navbar-logo">
        <i class="fas fa-music"></i>
        <span>Trackfy</span>
      </a>
    </div>

    <!-- Search Bar (visible on larger screens) -->
    <div class="navbar-search">
      <form action="/search" method="GET" class="search-form">
        <div class="search-input-wrapper">
          <i class="fas fa-search"></i>
          <input
            type="search"
            name="q"
            class="search-input"
            placeholder="Pesquisar músicas, artistas..."
            autocomplete="off">
        </div>
      </form>
    </div>

    <!-- Navigation Links & User Menu -->
    <div class="navbar-menu">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="/" class="nav-link">
            <i class="fas fa-home"></i>
            <span>Início</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="/library" class="nav-link">
            <i class="fas fa-bookmark"></i>
            <span>Biblioteca</span>
          </a>
        </li>
      </ul>

      <!-- User Menu -->
      <div class="navbar-user">
        <div class="user-menu-dropdown">

          <?php if (isset($_SESSION['id_user'])): ?>
            
            <button class="user-menu-toggle" id="userMenuToggle">

              <img src="<?php echo htmlspecialchars('imgs/' . $_SESSION['foto'] ?? 'imgs/default-user.png'); ?>"
                alt="<?php echo htmlspecialchars($_SESSION['username'] ?? 'Usuário'); ?>"
                class="user-avatar">

              <span class="user-name"><?php echo htmlspecialchars($_SESSION['username'] ?? 'Usuário'); ?></span>
              <i class="fas fa-chevron-down"></i>

            </button>

            <div class="dropdown-menu" id="userDropdown">

              <a href="/profile/<?php echo htmlspecialchars($_SESSION['username'] ?? $_SESSION['id_user']); ?>" class="dropdown-item">
                <i class="fas fa-user"></i>
                Perfil
              </a>
              <a href="/settings" class="dropdown-item">
                <i class="fas fa-cog"></i>
                Configurações
              </a>
              <hr class="dropdown-divider">
              <a href="/logout" class="dropdown-item text-error">
                <i class="fas fa-sign-out-alt"></i>
                Sair
              </a>
            </div>

        </div>

      <?php else: ?>

        <a href="/login" class="btn btn-primary btn-sm">
          <i class="fas fa-sign-in-alt"></i>
          Entrar
        </a>

        <a href="/register" class="btn btn-primary btn-sm">
          <i class="fas fa-sign-in-alt"></i>
          Cadastro
        </a>

      <?php endif; ?>

      </div>
    </div>

    <!-- Mobile Menu Toggle -->
    <button class="navbar-toggle" id="navbarToggle">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </div>
</nav>

<style>
  .navbar {
    background-color: var(--bg-secondary);
    border-bottom: 1px solid var(--border-color);
    position: sticky;
    top: 0;
    z-index: var(--z-sticky);
    padding: var(--spacing-md) 0;
  }

  .navbar-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 var(--spacing-md);
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: var(--spacing-lg);
  }

  .navbar-brand {
    flex-shrink: 0;
  }

  .navbar-logo {
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
    font-size: var(--font-size-xl);
    font-weight: var(--font-weight-bold);
    color: var(--primary-color);
    transition: color var(--transition-fast);
  }

  .navbar-logo:hover {
    color: var(--primary-dark);
  }

  .navbar-search {
    flex: 1;
    max-width: 400px;
  }

  .search-form {
    width: 100%;
  }

  .search-input-wrapper {
    position: relative;
    display: flex;
    align-items: center;
  }

  .search-input-wrapper i {
    position: absolute;
    left: var(--spacing-md);
    color: var(--text-tertiary);
    pointer-events: none;
  }

  .search-input {
    width: 100%;
    padding: var(--spacing-sm) var(--spacing-md) var(--spacing-sm) calc(var(--spacing-md) + 24px) !important;
    background-color: var(--bg-tertiary) !important;
    border: 1px solid var(--border-color) !important;
    border-radius: var(--radius-full) !important;
  }

  .search-input:focus {
    border-color: var(--primary-color) !important;
    box-shadow: 0 0 0 3px rgba(29, 185, 84, 0.1) !important;
  }

  .navbar-menu {
    display: flex;
    align-items: center;
    gap: var(--spacing-lg);
  }

  .navbar-nav {
    display: flex;
    list-style: none;
    gap: var(--spacing-lg);
    margin: 0;
    padding: 0;
  }

  .nav-item {
    display: flex;
  }

  .nav-link {
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
    padding: var(--spacing-sm) var(--spacing-md);
    color: var(--text-secondary);
    border-radius: var(--radius-md);
    transition: all var(--transition-fast);
  }

  .nav-link:hover {
    color: var(--primary-color);
    background-color: var(--bg-hover);
  }

  .navbar-user {
    display: flex;
    align-items: center;
    gap: var(--spacing-xs);
  }

  .navbar-user a:hover {
    color: white;
  }

  .user-menu-dropdown {
    position: relative;
  }

  .user-menu-toggle {
    display: flex;
    align-items: center;
    gap: var(--spacing-sm);
    background: none;
    border: none;
    color: var(--text-primary);
    cursor: pointer;
    padding: var(--spacing-xs) var(--spacing-sm);
    border-radius: var(--radius-md);
    transition: background-color var(--transition-fast);
  }

  .user-menu-toggle:hover {
    background-color: var(--bg-hover);
  }

  .user-avatar {
    width: 32px;
    height: 32px;
    border-radius: var(--radius-full);
    object-fit: cover;
  }

  .user-name {
    font-size: var(--font-size-sm);
    font-weight: var(--font-weight-medium);
  }

  .dropdown-menu {
    position: absolute;
    top: 100%;
    right: 0;
    background-color: var(--bg-secondary);
    border: 1px solid var(--border-color);
    border-radius: var(--radius-lg);
    min-width: 200px;
    margin-top: var(--spacing-sm);
    box-shadow: var(--shadow-lg);
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all var(--transition-fast);
    z-index: var(--z-dropdown);
  }

  .dropdown-menu.active {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
  }

  .dropdown-item {
    display: flex;
    align-items: center;
    gap: var(--spacing-md);
    padding: var(--spacing-md);
    color: var(--text-primary);
    transition: all var(--transition-fast);
  }

  .dropdown-item:hover {
    background-color: var(--bg-hover);
    color: var(--primary-color);
  }

  .dropdown-divider {
    margin: var(--spacing-sm) 0;
    border: none;
    border-top: 1px solid var(--border-color);
  }

  .navbar-toggle {
    display: none;
    background: none;
    border: none;
    cursor: pointer;
    flex-direction: column;
    gap: 5px;
    padding: var(--spacing-sm);
  }

  .navbar-toggle span {
    width: 24px;
    height: 2px;
    background-color: var(--text-primary);
    border-radius: var(--radius-full);
    transition: all var(--transition-fast);
  }

  /* Mobile Responsive */
  @media (max-width: 768px) {
    .navbar-search {
      display: none;
    }

    .navbar-nav {
      display: none;
    }

    .navbar-toggle {
      display: flex;
    }

    .navbar-toggle.active span:nth-child(1) {
      transform: rotate(45deg) translate(10px, 10px);
    }

    .navbar-toggle.active span:nth-child(2) {
      opacity: 0;
    }

    .navbar-toggle.active span:nth-child(3) {
      transform: rotate(-45deg) translate(7px, -7px);
    }
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const userMenuToggle = document.getElementById('userMenuToggle');
    const userDropdown = document.getElementById('userDropdown');
    const navbarToggle = document.getElementById('navbarToggle');

    if (userMenuToggle && userDropdown) {
      userMenuToggle.addEventListener('click', function(e) {
        e.stopPropagation();
        userDropdown.classList.toggle('active');
      });

      document.addEventListener('click', function() {
        userDropdown.classList.remove('active');
      });
    }

    if (navbarToggle) {
      navbarToggle.addEventListener('click', function() {
        this.classList.toggle('active');
      });
    }
  });
</script>