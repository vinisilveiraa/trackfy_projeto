<?php

/**
 * TRACKFY - User Profile Page
 * Página de perfil do usuário
 */

$page_title = 'Perfil do Usuário';
$page_description = 'Veja o perfil e as estatísticas do usuário';
$page_css = 'profile.css';

// Simular dados do usuário

// Determinar se é o perfil do usuário logado
$is_own_profile = true; // Simular
// $is_own_profile = false; // Simular

// var_dump($user);

?>


<!-- head / navbar -->
<?php include 'layouts/head.php'; ?>
<?php include 'layouts/navbar.php'; ?>

<!-- Main Content -->
<main class="main-content">
  <div class="container">
    <!-- Profile Header -->
    <div class="profile-header">
      <div class="profile-cover"></div>

      <div class="profile-info">
        <img src="<?php echo htmlspecialchars($user['foto']); ?>" alt="<?php echo htmlspecialchars($user['username']); ?>" class="profile-avatar">

        <div class="profile-details">
          <h1 class="profile-name"><?php echo htmlspecialchars($user['username']); ?></h1>
          <p class="profile-username">@<?php echo htmlspecialchars($user['username']); ?></p>
          <p class="profile-bio"><?php echo htmlspecialchars($user['bio']); ?></p>

          <div class="profile-meta">
            <span class="meta-item">
              <i class="fas fa-calendar"></i>
              Membro desde <?php echo htmlspecialchars($user['created_at']); ?>
            </span>
          </div>

          <?php if ($is_own_profile): ?>
            <div class="profile-actions">
              <button class="btn btn-primary">
                <i class="fas fa-edit"></i>
                Editar Perfil
              </button>
              <button class="btn btn-ghost">
                <i class="fas fa-cog"></i>
                Configurações
              </button>
            </div>
          <?php else: ?>
            <div class="profile-actions">
              <button class="btn btn-primary">
                <i class="fas fa-user-plus"></i>
                Seguir
              </button>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <!-- profile favorites -->

    <!-- Profile Stats -->
    <div class="profile-stats">
      <div class="stat-box">
        <div class="stat-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="stat-content">
          <span class="stat-value"><?php echo $user['reviews_count']; ?></span>
          <span class="stat-label">Reviews</span>
        </div>
      </div>

      <div class="stat-box">
        <div class="stat-icon">
          <i class="fas fa-bookmark"></i>
        </div>
        <div class="stat-content">
          <span class="stat-value"><?php echo $user['saved_tracks_count']; ?></span>
          <span class="stat-label">Músicas Salvas</span>
        </div>
      </div>

      <div class="stat-box">
        <div class="stat-icon">
          <i class="fas fa-chart-line"></i>
        </div>
        <div class="stat-content">
          <span class="stat-value"><?php echo number_format($user['average_rating'], 1); ?></span>
          <span class="stat-label">Nota Média</span>
        </div>
      </div>
    </div>

    <!-- Tabs -->
    <div class="profile-tabs">
      <div class="tabs-header">
        <button class="tab-button active" data-tab="reviews">
          <i class="fas fa-comments"></i>
          Reviews (<?php echo $user['reviews_count']; ?>)
        </button>
        <button class="tab-button" data-tab="saved">
          <i class="fas fa-bookmark"></i>
          Salvos (<?php echo $user['saved_tracks_count']; ?>)
        </button>
      </div>

      <!-- Reviews Tab -->
      <div class="tab-content active" id="reviews-tab">
        <div class="reviews-list">
          <!-- Review 1 -->
          <div class="review-item">
            <div class="review-header">
              <div class="review-track">
                <span class="track-badge">
                  <i class="fas fa-music"></i>
                  Blinding Lights - The Weeknd
                </span>
              </div>
              <div class="review-rating">
                <span class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                </span>
                <span class="rating-value">4.5</span>
              </div>
            </div>
            <p class="review-date">há 3 dias</p>
            <p class="review-text">Uma música absolutamente incrível! A produção é impecável e a voz do The Weeknd nunca foi tão boa. Recomendo muito!</p>
            <div class="review-actions">
              <button class="btn-action">
                <i class="fas fa-thumbs-up"></i>
                <span>142</span>
              </button>
              <button class="btn-action">
                <i class="fas fa-comment"></i>
                <span>12</span>
              </button>
            </div>
          </div>

          <!-- Review 2 -->
          <div class="review-item">
            <div class="review-header">
              <div class="review-track">
                <span class="track-badge">
                  <i class="fas fa-music"></i>
                  Heat Waves - Glass Animals
                </span>
              </div>
              <div class="review-rating">
                <span class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </span>
                <span class="rating-value">5</span>
              </div>
            </div>
            <p class="review-date">há 1 semana</p>
            <p class="review-text">Perfeito! Esta música tem um vibe tão especial. Ouço todos os dias e nunca fica chata. Obra-prima!</p>
            <div class="review-actions">
              <button class="btn-action">
                <i class="fas fa-thumbs-up"></i>
                <span>289</span>
              </button>
              <button class="btn-action">
                <i class="fas fa-comment"></i>
                <span>34</span>
              </button>
            </div>
          </div>

          <!-- Review 3 -->
          <div class="review-item">
            <div class="review-header">
              <div class="review-track">
                <span class="track-badge">
                  <i class="fas fa-music"></i>
                  Levitating - Dua Lipa
                </span>
              </div>
              <div class="review-rating">
                <span class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                </span>
                <span class="rating-value">3.5</span>
              </div>
            </div>
            <p class="review-date">há 2 semanas</p>
            <p class="review-text">Boa música, mas acho que é um pouco overrated. Tem seus momentos, mas não é nada excepcional.</p>
            <div class="review-actions">
              <button class="btn-action">
                <i class="fas fa-thumbs-up"></i>
                <span>56</span>
              </button>
              <button class="btn-action">
                <i class="fas fa-comment"></i>
                <span>18</span>
              </button>
            </div>
          </div>
        </div>

        <div class="load-more">
          <button class="btn btn-ghost">
            <i class="fas fa-chevron-down"></i>
            Carregar mais reviews
          </button>
        </div>
      </div>

      <!-- Saved Tracks Tab -->
      <div class="tab-content" id="saved-tab">
        <div class="saved-tracks-grid">
          <!-- Track 1 -->
          <div class="track-card">
            <div class="track-image">
              <img src="https://via.placeholder.com/200x200?text=Album+Cover" alt="Album Cover">
              <div class="track-overlay">
                <button class="btn-play" title="Reproduzir">
                  <i class="fas fa-play"></i>
                </button>
              </div>
            </div>
            <div class="track-info">
              <h3 class="track-title">Midnight City</h3>
              <p class="track-artist">M83</p>
              <div class="track-meta">
                <span class="rating">
                  <i class="fas fa-star"></i>
                  4.8
                </span>
                <span class="reviews">(1.2K reviews)</span>
              </div>
            </div>
            <a href="/track/5" class="track-link"></a>
          </div>

          <!-- Track 2 -->
          <div class="track-card">
            <div class="track-image">
              <img src="https://via.placeholder.com/200x200?text=Album+Cover" alt="Album Cover">
              <div class="track-overlay">
                <button class="btn-play" title="Reproduzir">
                  <i class="fas fa-play"></i>
                </button>
              </div>
            </div>
            <div class="track-info">
              <h3 class="track-title">Take Me Home</h3>
              <p class="track-artist">Phil Collins</p>
              <div class="track-meta">
                <span class="rating">
                  <i class="fas fa-star"></i>
                  4.9
                </span>
                <span class="reviews">(2.1K reviews)</span>
              </div>
            </div>
            <a href="/track/6" class="track-link"></a>
          </div>

          <!-- Track 3 -->
          <div class="track-card">
            <div class="track-image">
              <img src="https://via.placeholder.com/200x200?text=Album+Cover" alt="Album Cover">
              <div class="track-overlay">
                <button class="btn-play" title="Reproduzir">
                  <i class="fas fa-play"></i>
                </button>
              </div>
            </div>
            <div class="track-info">
              <h3 class="track-title">Dreams</h3>
              <p class="track-artist">Fleetwood Mac</p>
              <div class="track-meta">
                <span class="rating">
                  <i class="fas fa-star"></i>
                  4.7
                </span>
                <span class="reviews">(3.4K reviews)</span>
              </div>
            </div>
            <a href="/track/7" class="track-link"></a>
          </div>

          <!-- Track 4 -->
          <div class="track-card">
            <div class="track-image">
              <img src="https://via.placeholder.com/200x200?text=Album+Cover" alt="Album Cover">
              <div class="track-overlay">
                <button class="btn-play" title="Reproduzir">
                  <i class="fas fa-play"></i>
                </button>
              </div>
            </div>
            <div class="track-info">
              <h3 class="track-title">Wonderwall</h3>
              <p class="track-artist">Oasis</p>
              <div class="track-meta">
                <span class="rating">
                  <i class="fas fa-star"></i>
                  4.6
                </span>
                <span class="reviews">(4.2K reviews)</span>
              </div>
            </div>
            <a href="/track/8" class="track-link"></a>
          </div>
        </div>

        <div class="load-more">
          <button class="btn btn-ghost">
            <i class="fas fa-chevron-down"></i>
            Carregar mais músicas
          </button>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Footer -->
<?php include 'layouts/footer.php'; ?>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Tab switching
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');

    tabButtons.forEach(button => {
      button.addEventListener('click', function() {
        const tabName = this.dataset.tab;

        tabButtons.forEach(btn => btn.classList.remove('active'));
        tabContents.forEach(content => content.classList.remove('active'));

        this.classList.add('active');
        document.getElementById(tabName + '-tab').classList.add('active');
      });
    });
  });
</script>
</body>

</html>