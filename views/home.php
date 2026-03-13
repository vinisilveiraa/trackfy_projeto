<?php

/**
 * TRACKFY - Home Page
 * Página principal após login
 */

$page_title = 'Início';
$page_description = 'Descubra músicas em alta, reviews recentes e sua biblioteca pessoal';
$page_css = 'home.css';

// echo '<pre>'; print_r($_SESSION); echo '</pre>';
?>
<!-- head / navbar -->
<?php include 'layouts/head.php'; ?>
<?php include 'layouts/navbar.php'; ?>

<!-- Main Content -->
<main class="main-content">
  <div class="container">
    <!-- Hero Section -->
    <section class="hero-section">
      <div class="hero-content">
        <h1>Bem-vindo ao Trackfy
          <strong><?= isset($_SESSION['nome']) ? ", " . $_SESSION['nome'] : "" ?></strong>
          !</h1>
        <p>Descubra, avalie e compartilhe suas músicas favoritas com a comunidade</p>
        <div class="hero-actions">
          <a href="/search" class="btn btn-primary btn-lg">
            <i class="fas fa-search"></i>
            Explorar Músicas
          </a>
          <a href="/library" class="btn btn-outline btn-lg">
            <i class="fas fa-bookmark"></i>
            Minha Biblioteca
          </a>
        </div>
      </div>
    </section>

    <!-- Trending Tracks Section -->
    <section class="section">
      <div class="section-header">
        <h2>
          <i class="fas fa-fire"></i>
          Músicas em Alta
        </h2>
        <a href="/search?sort=trending" class="view-all">Ver todas</a>
      </div>

      <div class="tracks-grid">
        <!-- Track Card 1 -->
        <div class="track-card">
          <div class="track-image">
            <img src="https://i.pinimg.com/564x/83/18/00/831800e46da1b318faba6ae08edee957.jpg" alt="Album Cover">
            <div class="track-overlay">
              <button class="btn-play" title="Reproduzir">
                <i class="fas fa-play"></i>
              </button>
            </div>
          </div>
          <div class="track-info">
            <h3 class="track-title">Norman Fucking Rockwell</h3>
            <p class="track-artist">Lana del Rey</p>
            <div class="track-meta">
              <span class="rating">
                <i class="fas fa-star"></i>
                4.8
              </span>
              <span class="reviews">(2.3K reviews)</span>
            </div>
          </div>
          <a href="/track/1" class="track-link"></a>
        </div>

        <!-- Track Card 2 -->
        <div class="track-card">
          <div class="track-image">
            <img src="https://upload.wikimedia.org/wikipedia/en/b/b0/Glass_Animals_-_Heat_Waves.png" alt="Album Cover">
            <div class="track-overlay">
              <button class="btn-play" title="Reproduzir">
                <i class="fas fa-play"></i>
              </button>
            </div>
          </div>
          <div class="track-info">
            <h3 class="track-title">Heat Waves</h3>
            <p class="track-artist">Glass Animals</p>
            <div class="track-meta">
              <span class="rating">
                <i class="fas fa-star"></i>
                4.7
              </span>
              <span class="reviews">(1.9K reviews)</span>
            </div>
          </div>
          <a href="/track/2" class="track-link"></a>
        </div>

        <!-- Track Card 3 -->
        <div class="track-card">
          <div class="track-image">
            <img src="https://cdn-images.dzcdn.net/images/cover/dcacd1ec05df9b16b85f0d2b71816b55/0x1900-000000-80-0-0.jpg" alt="Album Cover">
            <div class="track-overlay">
              <button class="btn-play" title="Reproduzir">
                <i class="fas fa-play"></i>
              </button>
            </div>
          </div>
          <div class="track-info">
            <h3 class="track-title">Levitating</h3>
            <p class="track-artist">Dua Lipa</p>
            <div class="track-meta">
              <span class="rating">
                <i class="fas fa-star"></i>
                4.9
              </span>
              <span class="reviews">(3.1K reviews)</span>
            </div>
          </div>
          <a href="/track/3" class="track-link"></a>
        </div>

        <!-- Track Card 4 -->
        <div class="track-card">
          <div class="track-image">
            <img src="https://akamai.sscdn.co/uploadfile/letras/albuns/c/f/d/b/1801611685385276.jpg" alt="Album Cover">
            <div class="track-overlay">
              <button class="btn-play" title="Reproduzir">
                <i class="fas fa-play"></i>
              </button>
            </div>
          </div>
          <div class="track-info">
            <h3 class="track-title">As It Was</h3>
            <p class="track-artist">Harry Styles</p>
            <div class="track-meta">
              <span class="rating">
                <i class="fas fa-star"></i>
                4.6
              </span>
              <span class="reviews">(2.7K reviews)</span>
            </div>
          </div>
          <a href="/track/4" class="track-link"></a>
        </div>
      </div>
    </section>

    <!-- Recent Reviews Section -->
    <section class="section">
      <div class="section-header">
        <h2>
          <i class="fas fa-comments"></i>
          Reviews Recentes
        </h2>
        <a href="/search?sort=recent" class="view-all">Ver todas</a>
      </div>

      <div class="reviews-list">
        <!-- Review Item 1 -->
        <div class="review-item">
          <div class="review-header">
            <div class="reviewer-info">
              <img src="https://via.placeholder.com/40x40?text=User" alt="User Avatar" class="reviewer-avatar">
              <div>
                <h4 class="reviewer-name">João Silva</h4>
                <p class="review-date">há 2 horas</p>
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
          <div class="review-track">
            <span class="track-badge">
              <i class="fas fa-music"></i>
              Blinding Lights - The Weeknd
            </span>
          </div>
          <p class="review-text">Uma música absolutamente incrível! A produção é impecável e a voz do The Weeknd nunca foi tão boa. Recomendo muito!</p>
          <div class="review-actions">
            <button class="btn-action">
              <i class="fas fa-thumbs-up"></i>
              <span>42</span>
            </button>
            <button class="btn-action">
              <i class="fas fa-comment"></i>
              <span>5</span>
            </button>
          </div>
        </div>

        <!-- Review Item 2 -->
        <div class="review-item">
          <div class="review-header">
            <div class="reviewer-info">
              <img src="https://via.placeholder.com/40x40?text=User" alt="User Avatar" class="reviewer-avatar">
              <div>
                <h4 class="reviewer-name">Maria Santos</h4>
                <p class="review-date">há 4 horas</p>
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
          <div class="review-track">
            <span class="track-badge">
              <i class="fas fa-music"></i>
              Heat Waves - Glass Animals
            </span>
          </div>
          <p class="review-text">Perfeito! Esta música tem um vibe tão especial. Ouço todos os dias e nunca fica chata. Obra-prima!</p>
          <div class="review-actions">
            <button class="btn-action">
              <i class="fas fa-thumbs-up"></i>
              <span>89</span>
            </button>
            <button class="btn-action">
              <i class="fas fa-comment"></i>
              <span>12</span>
            </button>
          </div>
        </div>

        <!-- Review Item 3 -->
        <div class="review-item">
          <div class="review-header">
            <div class="reviewer-info">
              <img src="https://via.placeholder.com/40x40?text=User" alt="User Avatar" class="reviewer-avatar">
              <div>
                <h4 class="reviewer-name">Pedro Costa</h4>
                <p class="review-date">há 6 horas</p>
              </div>
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
          <div class="review-track">
            <span class="track-badge">
              <i class="fas fa-music"></i>
              Levitating - Dua Lipa
            </span>
          </div>
          <p class="review-text">Boa música, mas acho que é um pouco overrated. Tem seus momentos, mas não é nada excepcional.</p>
          <div class="review-actions">
            <button class="btn-action">
              <i class="fas fa-thumbs-up"></i>
              <span>23</span>
            </button>
            <button class="btn-action">
              <i class="fas fa-comment"></i>
              <span>8</span>
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- Your Saved Tracks Section -->
    <section class="section">
      <div class="section-header">
        <h2>
          <i class="fas fa-bookmark"></i>
          Suas Músicas Salvas
        </h2>
        <a href="/library" class="view-all">Ver biblioteca completa</a>
      </div>

      <div class="tracks-grid">
        <!-- Track Card 1 -->
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

        <!-- Track Card 2 -->
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

        <!-- Track Card 3 -->
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

        <!-- Track Card 4 -->
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
    </section>
  </div>
</main>

<!-- Footer -->
<?php include 'layouts/footer.php'; ?>

<script src="/assets/js/main.js"></script>
</body>

</html>