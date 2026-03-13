<?php

/**
 * TRACKFY - Register Page
 * Página de cadastro
 */

// var_dump($_POST);

$page_title = 'Criar Conta';
$page_description = 'Crie sua conta Trackfy e comece a avaliar músicas';
$page_css = 'auth.css';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
  <title><?php echo htmlspecialchars($page_title); ?> - Trackfy</title>

  <link rel="stylesheet" href="/css/global.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="/css/auth.css">
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

    <!-- Right Side - Register Form -->
    <div class="auth-form-wrapper">
      <div class="auth-form-container">
        <h2>Criar Conta</h2>
        <p class="auth-subtitle">Junte-se à comunidade Trackfy</p>

        <!-- Error Message -->
        <div id="errorMessage" class="alert alert-error"
          style="display: <?= (!empty($msg[0]) || !empty($msg[1]) || !empty($msg[2])) ? 'inline' : 'none' ?>">

          <i class="fas fa-exclamation-circle"></i>
          <span id="errorText">
            <?= ($msg[0] ?? '') . ($msg[1] ?? '') . ($msg[2] ?? '') ?>
          </span>
        </div>

        <!-- Success Message -->
        <div id="successMessage" class="alert alert-success" style="display: none;">
          <i class="fas fa-check-circle"></i>
          <span id="successText"></span>
        </div>

        <!-- Register Form -->
        <form id="registerForm" class="auth-form" action="/register" method="POST" novalidate>
          <div class="form-group">
            <label for="nome">Nome de Usuario</label>
            <div class="input-wrapper">
              <i class="fas fa-user"></i>
              <input
                type="text"
                id="nome"
                name="username"
                placeholder="Seu nome"
                required>
            </div>
          </div>

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
                id="password"
                name="senha"
                placeholder="Crie uma senha forte"
                required>
              <button type="button" class="toggle-password" id="togglePassword">
                <i class="fas fa-eye senha-olho"></i>
              </button>
            </div>
          </div>

          <div class="form-group">
            <label for="confirmPassword">Confirmar Senha</label>
            <div class="input-wrapper">
              <i class="fas fa-lock"></i>
              <input
                type="password"
                id="confirmPassword"
                name="confirmPassword"
                placeholder="Confirme sua senha"
                required>
              <button type="button" class="toggle-password" id="toggleConfirmPassword">
                <i class="fas fa-eye senha-olho"></i>
              </button>
            </div>
          </div>

          <div class="form-options">
            <label class="checkbox-label">
              <input type="checkbox" name="terms" id="terms" required>
              <span>Concordo com os <a href="#" class="text-primary">Termos de Uso</a></span>
            </label>
          </div>

          <button type="submit" class="btn btn-primary btn-block btn-lg">
            <i class="fas fa-user-plus"></i>
            Criar Conta
          </button>
        </form>

        <!-- Divider -->
        <div class="form-divider">
          <span>Ou continue com</span>
        </div>

        <!-- Social Login -->
        <div class="social-login">
          <button type="button" class="btn-social" title="Cadastrar com Spotify">
            <i class="fab fa-spotify"></i>
          </button>
          <button type="button" class="btn-social" title="Cadastrar com Google">
            <i class="fab fa-google"></i>
          </button>
        </div>

        <!-- Login Link -->
        <p class="auth-footer">
          Já tem uma conta?
          <a href="/login" class="text-primary">Fazer login</a>
        </p>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const togglePassword = document.getElementById('togglePassword');
      const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
      const passwordInput = document.getElementById('password');
      const confirmPasswordInput = document.getElementById('confirmPassword');

      // Toggle password visibility
      if (togglePassword) {
        togglePassword.addEventListener('click', function() {
          const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
          passwordInput.setAttribute('type', type);
          this.querySelector('i').classList.toggle('fa-eye');
          this.querySelector('i').classList.toggle('fa-eye-slash');
        });
      }

      if (toggleConfirmPassword) {
        toggleConfirmPassword.addEventListener('click', function() {
          const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
          confirmPasswordInput.setAttribute('type', type);
          this.querySelector('i').classList.toggle('fa-eye');
          this.querySelector('i').classList.toggle('fa-eye-slash');
        });
      }

      // Form submission
      const registerForm = document.getElementById('registerForm');
      if (registerForm) {
        registerForm.addEventListener('submit', function(e) {

          const password = passwordInput.value;
          const confirmPassword = confirmPasswordInput.value;

          // Validação básica
          if (password !== confirmPassword) {
            showError('As senhas não coincidem');
            return;
          }

          if (password.length < 6) {
            showError('A senha deve ter no mínimo 6 caracteres');
            return;
          }

          // Aqui você faria a requisição ao backend
          console.log('Register form submitted');
        });
      }

      function showError(message) {
        const errorMessage = document.getElementById('errorMessage');
        const errorText = document.getElementById('errorText');
        errorText.textContent = message;
        errorMessage.style.display = 'flex';
      }
    });
  </script>
</body>

</html>