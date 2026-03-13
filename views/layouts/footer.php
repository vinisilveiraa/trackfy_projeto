<?php
/**
 * TRACKFY - Footer Component
 * Componente de rodapé
 */
?>

<footer class="footer">
  <div class="footer-container">
    <div class="footer-content">
      <!-- About Section -->
      <div class="footer-section">
        <h4>Sobre</h4>
        <p>Trackfy é a plataforma para descobrir, avaliar e compartilhar suas músicas favoritas com a comunidade.</p>
      </div>

      <!-- Links Section -->
      <div class="footer-section">
        <h4>Links</h4>
        <ul class="footer-links">
          <li><a href="/">Início</a></li>
          <li><a href="/library">Biblioteca</a></li>
          <li><a href="/search">Explorar</a></li>
        </ul>
      </div>

      <!-- Legal Section -->
      <div class="footer-section">
        <h4>Legal</h4>
        <ul class="footer-links">
          <li><a href="/privacy">Privacidade</a></li>
          <li><a href="/terms">Termos de Uso</a></li>
          <li><a href="/contact">Contato</a></li>
        </ul>
      </div>

      <!-- Social Section -->
      <div class="footer-section">
        <h4>Redes Sociais</h4>
        <div class="social-links">
          <a href="#" class="social-link" title="Twitter">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#" class="social-link" title="Instagram">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="#" class="social-link" title="GitHub">
            <i class="fab fa-github"></i>
          </a>
        </div>
      </div>
    </div>

    <!-- Copyright -->
    <div class="footer-bottom">
      <p>&copy; 2026 Trackfy. Todos os direitos reservados.</p>
    </div>
  </div>
</footer>

<script src="js/main.js"></script>

</html>

<style>
.footer {
  background-color: var(--bg-secondary);
  border-top: 1px solid var(--border-color);
  margin-top: var(--spacing-2xl);
  padding: var(--spacing-2xl) 0 var(--spacing-lg);
}

.footer-container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 var(--spacing-md);
}

.footer-content {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: var(--spacing-2xl);
  margin-bottom: var(--spacing-2xl);
}

.footer-section h4 {
  font-size: var(--font-size-base);
  font-weight: var(--font-weight-semibold);
  margin-bottom: var(--spacing-md);
  color: var(--text-primary);
}

.footer-section p {
  font-size: var(--font-size-sm);
  color: var(--text-secondary);
  margin-bottom: 0;
}

.footer-links {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: column;
  gap: var(--spacing-sm);
}

.footer-links a {
  font-size: var(--font-size-sm);
  color: var(--text-secondary);
  transition: color var(--transition-fast);
}

.footer-links a:hover {
  color: var(--primary-color);
}

.social-links {
  display: flex;
  gap: var(--spacing-md);
}

.social-link {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  background-color: var(--bg-tertiary);
  border-radius: var(--radius-full);
  color: var(--text-secondary);
  transition: all var(--transition-fast);
}

.social-link:hover {
  background-color: var(--primary-color);
  color: var(--bg-primary);
}

.footer-bottom {
  text-align: center;
  padding-top: var(--spacing-lg);
  border-top: 1px solid var(--border-light);
  color: var(--text-tertiary);
  font-size: var(--font-size-sm);
}

.footer-bottom p {
  margin: 0;
}

@media (max-width: 768px) {
  .footer-content {
    grid-template-columns: repeat(2, 1fr);
    gap: var(--spacing-lg);
  }
}

@media (max-width: 576px) {
  .footer-content {
    grid-template-columns: 1fr;
  }
}
</style>
