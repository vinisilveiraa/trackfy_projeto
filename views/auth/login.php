<?php

/**
 * TRACKFY - Login Page
 * Página de autenticação
 */

$page_title = 'Entrar';
$page_description = 'Faça login na sua conta Trackfy';
$page_css = 'auth.css';

// Simular verificação de sessão (em produção, usar $_SESSION)
$is_logged_in = false;
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
  <title><?php echo htmlspecialchars($page_title); ?> - Trackfy</title>

  <link rel="stylesheet" href="css/global.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="css/auth.css">
</head>

<body class="auth-body">
  <div class="auth-container">
    <!-- Left Side - Branding -->
    <div class="auth-branding">
      <div class="branding-content">

        <div class="branding-goback">
          <a href="/">
            <i class="fa-solid fa-angle-left"></i>
            Home
          </a>
        </div>

        <div class="branding-logo">
          <i class="fas fa-music"></i>
        </div>

        <h1>Trackfy</h1>
        <p>Descubra, avalie e compartilhe suas músicas favoritas com a comunidade.</p>

        <div class="branding-features">
          <div class="feature">
            <i class="fas fa-star"></i>
            <span>Avalie suas músicas favoritas</span>
          </div>
          <div class="feature">
            <i class="fas fa-bookmark"></i>
            <span>Crie sua biblioteca pessoal</span>
          </div>
          <div class="feature">
            <i class="fas fa-users"></i>
            <span>Conecte com outros fãs</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Right Side - Login Form -->
    <div class="auth-form-wrapper">
      <div class="auth-form-container">
        <h2>Bem-vindo de volta</h2>
        <p class="auth-subtitle">Faça login para acessar sua conta</p>

        <!-- Error Message -->
        <div id="errorMessage" class="alert alert-error"
          style="display: <?= (!empty($msg[0]) || !empty($msg[1]) || !empty($msg[2])) ? 'inline' : 'none' ?>">

          <i class="fas fa-exclamation-circle"></i>
          <span id="errorText">
            <?= ($msg[0] ?? '') . ($msg[1] ?? '') . ($msg[2] ?? '') ?>
          </span>
        </div>


        <!-- Login Form -->
        <form id="loginForm" class="auth-form" action="/login" method="POST">
          <div class="form-group">
            <label for="email">Email</label>
            <div class="input-wrapper">
              <i class="fas fa-envelope"></i>
              <input
                type="email"
                id="email"
                name="email"
                placeholder="seu@email.com"
                required>
            </div>
          </div>

          <div class="form-group">
            <label for="senha">Senha</label>
            <div class="input-wrapper">
              <i class="fas fa-lock"></i>
              <input
                type="senha"
                id="senha"
                name="senha"
                placeholder="Sua senha"
                required>
              <button type="button" class="toggle-password" id="togglePassword">
                <i class="fas fa-eye senha-olho"></i>
              </button>
            </div>
          </div>

          <div class="form-options">
            <label class="checkbox-label">
              <input type="checkbox" name="remember" id="remember">
              <span>Lembrar-me</span>
            </label>
            <a href="#" class="forgot-password">Esqueceu a senha?</a>
          </div>

          <button type="submit" class="btn btn-primary btn-block btn-lg">
            <i class="fas fa-sign-in-alt"></i>
            Entrar
          </button>
        </form>

        <!-- Divider -->
        <div class="form-divider">
          <span>Ou continue com</span>
        </div>

        <!-- Social Login -->
        <div class="social-login">
          <button type="button" class="btn-social" title="Entrar com Spotify">
            <i class="fab fa-spotify"></i>
          </button>
          <button type="button" class="btn-social" title="Entrar com Google">
            <i class="fab fa-google"></i>
          </button>
        </div>

        <!-- Register Link -->
        <p class="auth-footer">
          Não tem uma conta?
          <a href="/register" class="text-primary">Criar conta</a>
        </p>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const togglePassword = document.getElementById('togglePassword');
      const passwordInput = document.getElementById('senha');

      if (togglePassword) {
        togglePassword.addEventListener('click', function() {
          const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
          passwordInput.setAttribute('type', type);
          this.querySelector('i').classList.toggle('fa-eye');
          this.querySelector('i').classList.toggle('fa-eye-slash');
        });
      }

      // Form submission (exemplo)
      const loginForm = document.getElementById('loginForm');
      if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
          // Aqui você faria a requisição ao backend
          console.log('Login form submitted');
        });
      }
    });
  </script>
</body>

</html>