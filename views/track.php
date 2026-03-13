<?php

/**
 * TRACKFY - Track Detail Page
 * Página da música com reviews e avaliações
 */

$page_title = 'Blinding Lights';
$page_description = 'Veja detalhes, avaliações e reviews da música Blinding Lights';
$page_css = 'track.css';

$title = $track['title'] ?? 'Título desconhecido';
$artist = $track['artist-credit'][0]['name'] ?? 'Artista desconhecido';
$album = $track['releases'][0]['title'] ?? 'Single';
$year = isset($track['releases'][0]['date']) ? substr($track['releases'][0]['date'], 0, 4) : '';
$release_id = $track['releases'][0]['id'] ?? null;

$cover = $release_id
  ? "https://coverartarchive.org/release/$release_id/front-500"
  : "https://via.placeholder.com/500x500?text=No+Cover";
?>

<!-- head / navbar -->
<?php include 'layouts/head.php'; ?>
<?php include 'layouts/navbar.php'; ?>

<!-- Main Content -->
<main class="main-content">
  <div class="container">
    <!-- Track Header -->
    <div class="track-header">
      <div class="track-cover">
        <img src="<?php echo htmlspecialchars($cover); ?>" alt="<?php echo htmlspecialchars($title); ?>">
        <button class="btn-play-large" title="Reproduzir">
          <i class="fas fa-play"></i>
        </button>
      </div>

      <div class="track-details">
        <p class="track-label">Música</p>
        <h1 class="track-title"><?php echo htmlspecialchars($title); ?></h1>
        <p class="track-artist"><?php echo htmlspecialchars($artist); ?></p>

        <div class="track-meta-info">
          <div class="meta-item">
            <span class="meta-label">Álbum</span>
            <!-- <span class="meta-value"><?php echo htmlspecialchars($album); ?></span> -->
          </div>
          <div class="meta-item">
            <span class="meta-label">Ano</span>
            <!-- <span class="meta-value"><?php echo htmlspecialchars($year); ?></span> -->
          </div>
        </div>

        <div class="track-stats">
          <div class="stat">
            <span class="stat-value">
              <i class="fas fa-star"></i>
              <!-- <?php echo number_format($track['rating'], 1); ?> -->
            </span>
            <span class="stat-label"> <!-- <?php echo number_format($track['review_count']); ?> --> Reviews</span> 
          </div>
          <div class="stat">
            <span class="stat-value">
              <i class="fas fa-bookmark"></i>
              <!-- <?php echo number_format($track['save_count']); ?> -->
            </span>
            <span class="stat-label">Salvos</span>
          </div>
        </div>

        <div class="track-actions">
          <button class="btn btn-primary btn-lg">
            <i class="fas fa-star"></i>
            Avaliar
          </button>
          <button class="btn btn-outline btn-lg" id="saveBtn">
            <i class="fas fa-bookmark"></i>
            Salvar
          </button>
        </div>

        <!-- <p class="track-description"><?php echo htmlspecialchars($track['description']); ?></p> -->
      </div>
    </div>

    <!-- Tabs Section -->
    <div class="tabs-section">
      <div class="tabs-header">
        <button class="tab-button active" data-tab="reviews">
          <i class="fas fa-comments"></i>
          Reviews <!-- (<?php echo number_format($track['review_count']); ?>) -->
        </button>
        <button class="tab-button" data-tab="stats">
          <i class="fas fa-chart-bar"></i>
          Estatísticas
        </button>
      </div>

      <!-- Reviews Tab -->
      <div class="tab-content active" id="reviews-tab">
        <div class="reviews-header">
          <h2>Reviews dos Usuários</h2>
          <button class="btn btn-primary" id="openReviewModal">
            <i class="fas fa-plus"></i>
            Escrever Review
          </button>
        </div>

        <!-- Review Items -->
        <div class="reviews-container">
          <!-- Review 1 -->
          <div class="review-card">
            <div class="review-header">
              <div class="reviewer-info">
                <img src="https://via.placeholder.com/48x48?text=User" alt="User" class="reviewer-avatar">
                <div>
                  <h4 class="reviewer-name">João Silva</h4>
                  <p class="review-date">há 2 dias</p>
                </div>
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
            <p class="review-text">Uma música absolutamente incrível! A produção é impecável e a voz do The Weeknd nunca foi tão boa. Recomendo muito para quem gosta de synthwave e eletrônico.</p>
            <div class="review-footer">
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
          <div class="review-card">
            <div class="review-header">
              <div class="reviewer-info">
                <img src="https://via.placeholder.com/48x48?text=User" alt="User" class="reviewer-avatar">
                <div>
                  <h4 class="reviewer-name">Maria Santos</h4>
                  <p class="review-date">há 5 dias</p>
                </div>
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
            <p class="review-text">Perfeito! Uma obra-prima do The Weeknd. Ouço todos os dias e nunca fica chata. A melodia é tão pegajosa que fica na cabeça o tempo todo!</p>
            <div class="review-footer">
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
          <div class="review-card">
            <div class="review-header">
              <div class="reviewer-info">
                <img src="https://via.placeholder.com/48x48?text=User" alt="User" class="reviewer-avatar">
                <div>
                  <h4 class="reviewer-name">Pedro Costa</h4>
                  <p class="review-date">há 1 semana</p>
                </div>
              </div>
              <div class="review-rating">
                <span class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </span>
                <span class="rating-value">3</span>
              </div>
            </div>
            <p class="review-text">Boa música, mas acho que é um pouco overrated. Tem seus momentos, mas não é nada excepcional. Existem outras músicas do The Weeknd que acho melhores.</p>
            <div class="review-footer">
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

        <!-- Load More -->
        <div class="load-more">
          <button class="btn btn-ghost">
            <i class="fas fa-chevron-down"></i>
            Carregar mais reviews
          </button>
        </div>
      </div>

      <!-- Stats Tab -->
      <div class="tab-content" id="stats-tab">
        <div class="stats-grid">
          <!-- Rating Distribution -->
          <div class="stat-card">
            <h3>Distribuição de Avaliações</h3>
            <div class="rating-distribution">
              <div class="distribution-item">
                <span class="stars-label">
                  <i class="fas fa-star"></i>
                  5 estrelas
                </span>
                <div class="distribution-bar">
                  <div class="distribution-fill" style="width: 65%;"></div>
                </div>
                <span class="distribution-count">1523</span>
              </div>
              <div class="distribution-item">
                <span class="stars-label">
                  <i class="fas fa-star"></i>
                  4 estrelas
                </span>
                <div class="distribution-bar">
                  <div class="distribution-fill" style="width: 20%;"></div>
                </div>
                <span class="distribution-count">468</span>
              </div>
              <div class="distribution-item">
                <span class="stars-label">
                  <i class="fas fa-star"></i>
                  3 estrelas
                </span>
                <div class="distribution-bar">
                  <div class="distribution-fill" style="width: 10%;"></div>
                </div>
                <span class="distribution-count">234</span>
              </div>
              <div class="distribution-item">
                <span class="stars-label">
                  <i class="fas fa-star"></i>
                  2 estrelas
                </span>
                <div class="distribution-bar">
                  <div class="distribution-fill" style="width: 3%;"></div>
                </div>
                <span class="distribution-count">70</span>
              </div>
              <div class="distribution-item">
                <span class="stars-label">
                  <i class="fas fa-star"></i>
                  1 estrela
                </span>
                <div class="distribution-bar">
                  <div class="distribution-fill" style="width: 2%;"></div>
                </div>
                <span class="distribution-count">46</span>
              </div>
            </div>
          </div>

          <!-- Quick Stats -->
          <div class="stat-card">
            <h3>Informações Rápidas</h3>
            <div class="quick-stats">
              <div class="quick-stat">
                <span class="stat-icon">
                  <i class="fas fa-star"></i>
                </span>
                <div>
                  <span class="stat-title">Avaliação Média</span>
                  <span class="stat-big">4.8</span>
                </div>
              </div>
              <div class="quick-stat">
                <span class="stat-icon">
                  <i class="fas fa-comments"></i>
                </span>
                <div>
                  <span class="stat-title">Total de Reviews</span>
                  <span class="stat-big">2.3K</span>
                </div>
              </div>
              <div class="quick-stat">
                <span class="stat-icon">
                  <i class="fas fa-bookmark"></i>
                </span>
                <div>
                  <span class="stat-title">Salvos</span>
                  <span class="stat-big">5.2K</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Review Modal -->
<div class="modal" id="reviewModal">
  <div class="modal-content">
    <div class="modal-header">
      <h2>Escrever Review</h2>
      <button class="modal-close" id="closeReviewModal">
        <i class="fas fa-times"></i>
      </button>
    </div>

    <form class="review-form" id="reviewForm">
      <div class="form-group">
        <label>Sua Avaliação</label>
        <div class="star-rating" id="starRating">
          <button type="button" class="star" data-value="1">
            <i class="fas fa-star"></i>
          </button>
          <button type="button" class="star" data-value="2">
            <i class="fas fa-star"></i>
          </button>
          <button type="button" class="star" data-value="3">
            <i class="fas fa-star"></i>
          </button>
          <button type="button" class="star" data-value="4">
            <i class="fas fa-star"></i>
          </button>
          <button type="button" class="star" data-value="5">
            <i class="fas fa-star"></i>
          </button>
        </div>
        <input type="hidden" id="ratingValue" name="rating" value="0">
      </div>

      <div class="form-group">
        <label for="reviewText">Seu Review</label>
        <textarea
          id="reviewText"
          name="review"
          placeholder="Compartilhe sua opinião sobre esta música..."
          required></textarea>
      </div>

      <div class="modal-actions">
        <button type="button" class="btn btn-ghost" id="cancelReview">
          Cancelar
        </button>
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-paper-plane"></i>
          Publicar Review
        </button>
      </div>
    </form>
  </div>
</div>

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

    // Review Modal
    const reviewModal = document.getElementById('reviewModal');
    const openReviewModal = document.getElementById('openReviewModal');
    const closeReviewModal = document.getElementById('closeReviewModal');
    const cancelReview = document.getElementById('cancelReview');

    if (openReviewModal) {
      openReviewModal.addEventListener('click', () => {
        reviewModal.classList.add('active');
      });
    }

    const closeModal = () => {
      reviewModal.classList.remove('active');
    };

    if (closeReviewModal) closeReviewModal.addEventListener('click', closeModal);
    if (cancelReview) cancelReview.addEventListener('click', closeModal);

    reviewModal.addEventListener('click', (e) => {
      if (e.target === reviewModal) closeModal();
    });

    // Star Rating
    const stars = document.querySelectorAll('.star-rating .star');
    const ratingValue = document.getElementById('ratingValue');

    stars.forEach(star => {
      star.addEventListener('click', (e) => {
        e.preventDefault();
        const value = star.dataset.value;
        ratingValue.value = value;

        stars.forEach((s, index) => {
          if (index < value) {
            s.classList.add('active');
          } else {
            s.classList.remove('active');
          }
        });
      });
    });

    // Form submission
    const reviewForm = document.getElementById('reviewForm');
    if (reviewForm) {
      reviewForm.addEventListener('submit', (e) => {
        e.preventDefault();
        console.log('Review submitted');
        closeModal();
      });
    }

    // Save button
    const saveBtn = document.getElementById('saveBtn');
    if (saveBtn) {
      saveBtn.addEventListener('click', function() {
        this.classList.toggle('active');
        this.innerHTML = this.classList.contains('active') ?
          '<i class="fas fa-bookmark"></i> Salvo' :
          '<i class="fas fa-bookmark"></i> Salvar';
      });
    }
  });
</script>
</body>

</html>