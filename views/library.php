<?php

/**
 * TRACKFY - Library Page
 * Página da biblioteca de músicas salvas
 */

$page_title = 'Minha Biblioteca';
$page_description = 'Acesse todas as suas músicas salvas no Trackfy';
$page_css = 'library.css';

// Simular filtros
$sort = $_GET['sort'] ?? 'recent';
$view = $_GET['view'] ?? 'grid';
?>

<!-- head / navbar -->
<?php include 'layouts/head.php'; ?>
<?php include 'layouts/navbar.php'; ?>

<!-- Main Content -->
<main class="main-content">
  <div class="container">
    <!-- Library Header -->
    <div class="library-header">
      <div class="header-content">
        <h1>
          <i class="fas fa-bookmark"></i>
          Minha Biblioteca
        </h1>
        <p>Você tem <strong>156 músicas</strong> salvas</p>
      </div>

      <div class="header-stats">
        <div class="stat">
          <span class="stat-icon">
            <i class="fas fa-music"></i>
          </span>
          <div>
            <span class="stat-value">156</span>
            <span class="stat-label">Músicas</span>
          </div>
        </div>
        <div class="stat">
          <span class="stat-icon">
            <i class="fas fa-clock"></i>
          </span>
          <div>
            <span class="stat-value">~12h</span>
            <span class="stat-label">Duração Total</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Library Controls -->
    <div class="library-controls">
      <div class="controls-left">
        <div class="sort-group">
          <label for="sortSelect">Ordenar por:</label>
          <select id="sortSelect" name="sort" class="sort-select">
            <option value="recent" <?php echo $sort === 'recent' ? 'selected' : ''; ?>>Adicionado Recentemente</option>
            <option value="title" <?php echo $sort === 'title' ? 'selected' : ''; ?>>Título (A-Z)</option>
            <option value="artist" <?php echo $sort === 'artist' ? 'selected' : ''; ?>>Artista (A-Z)</option>
            <option value="rating" <?php echo $sort === 'rating' ? 'selected' : ''; ?>>Melhor Avaliação</option>
          </select>
        </div>

        <div class="search-mini">
          <input
            type="search"
            placeholder="Pesquisar na biblioteca..."
            class="search-input-mini">
        </div>
      </div>

      <div class="controls-right">
        <div class="view-toggle">
          <button class="view-btn <?php echo $view === 'grid' ? 'active' : ''; ?>" data-view="grid" title="Visualização em Grade">
            <i class="fas fa-th"></i>
          </button>
          <button class="view-btn <?php echo $view === 'list' ? 'active' : ''; ?>" data-view="list" title="Visualização em Lista">
            <i class="fas fa-list"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Library Content -->
    <div class="library-content">
      <!-- Grid View -->
      <div class="tracks-grid" id="gridView">
        <!-- Track Card 1 -->
        <div class="track-card">
          <div class="track-image">
            <img src="https://via.placeholder.com/200x200?text=Album+Cover" alt="Album Cover">
            <div class="track-overlay">
              <button class="btn-play" title="Reproduzir">
                <i class="fas fa-play"></i>
              </button>
            </div>
            <button class="btn-remove" title="Remover da biblioteca">
              <i class="fas fa-trash"></i>
            </button>
          </div>
          <div class="track-info">
            <h3 class="track-title">Midnight City</h3>
            <p class="track-artist">M83</p>
            <div class="track-meta">
              <span class="rating">
                <i class="fas fa-star"></i>
                4.8
              </span>
              <span class="reviews">(1.2K)</span>
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
            <button class="btn-remove" title="Remover da biblioteca">
              <i class="fas fa-trash"></i>
            </button>
          </div>
          <div class="track-info">
            <h3 class="track-title">Take Me Home</h3>
            <p class="track-artist">Phil Collins</p>
            <div class="track-meta">
              <span class="rating">
                <i class="fas fa-star"></i>
                4.9
              </span>
              <span class="reviews">(2.1K)</span>
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
            <button class="btn-remove" title="Remover da biblioteca">
              <i class="fas fa-trash"></i>
            </button>
          </div>
          <div class="track-info">
            <h3 class="track-title">Dreams</h3>
            <p class="track-artist">Fleetwood Mac</p>
            <div class="track-meta">
              <span class="rating">
                <i class="fas fa-star"></i>
                4.7
              </span>
              <span class="reviews">(3.4K)</span>
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
            <button class="btn-remove" title="Remover da biblioteca">
              <i class="fas fa-trash"></i>
            </button>
          </div>
          <div class="track-info">
            <h3 class="track-title">Wonderwall</h3>
            <p class="track-artist">Oasis</p>
            <div class="track-meta">
              <span class="rating">
                <i class="fas fa-star"></i>
                4.6
              </span>
              <span class="reviews">(4.2K)</span>
            </div>
          </div>
          <a href="/track/8" class="track-link"></a>
        </div>

        <!-- Track Card 5 -->
        <div class="track-card">
          <div class="track-image">
            <img src="https://via.placeholder.com/200x200?text=Album+Cover" alt="Album Cover">
            <div class="track-overlay">
              <button class="btn-play" title="Reproduzir">
                <i class="fas fa-play"></i>
              </button>
            </div>
            <button class="btn-remove" title="Remover da biblioteca">
              <i class="fas fa-trash"></i>
            </button>
          </div>
          <div class="track-info">
            <h3 class="track-title">Blinding Lights</h3>
            <p class="track-artist">The Weeknd</p>
            <div class="track-meta">
              <span class="rating">
                <i class="fas fa-star"></i>
                4.8
              </span>
              <span class="reviews">(2.3K)</span>
            </div>
          </div>
          <a href="/track/1" class="track-link"></a>
        </div>

        <!-- Track Card 6 -->
        <div class="track-card">
          <div class="track-image">
            <img src="https://via.placeholder.com/200x200?text=Album+Cover" alt="Album Cover">
            <div class="track-overlay">
              <button class="btn-play" title="Reproduzir">
                <i class="fas fa-play"></i>
              </button>
            </div>
            <button class="btn-remove" title="Remover da biblioteca">
              <i class="fas fa-trash"></i>
            </button>
          </div>
          <div class="track-info">
            <h3 class="track-title">Heat Waves</h3>
            <p class="track-artist">Glass Animals</p>
            <div class="track-meta">
              <span class="rating">
                <i class="fas fa-star"></i>
                4.7
              </span>
              <span class="reviews">(1.9K)</span>
            </div>
          </div>
          <a href="/track/2" class="track-link"></a>
        </div>
      </div>

      <!-- List View (Hidden by default) -->
      <div class="tracks-list" id="listView" style="display: none;">
        <!-- Track Row 1 -->
        <div class="track-row">
          <div class="row-cover">
            <img src="https://via.placeholder.com/50x50?text=Cover" alt="Cover">
          </div>
          <div class="row-info">
            <h4 class="row-title">Midnight City</h4>
            <p class="row-artist">M83</p>
          </div>
          <div class="row-album">
            <span>Hurry Up, We're Dreaming</span>
          </div>
          <div class="row-rating">
            <span class="stars">
              <i class="fas fa-star"></i>
            </span>
            <span>4.8</span>
          </div>
          <div class="row-actions">
            <button class="btn-row-action" title="Reproduzir">
              <i class="fas fa-play"></i>
            </button>
            <button class="btn-row-action" title="Remover">
              <i class="fas fa-trash"></i>
            </button>
          </div>
          <a href="/track/5" class="row-link"></a>
        </div>

        <!-- Track Row 2 -->
        <div class="track-row">
          <div class="row-cover">
            <img src="https://via.placeholder.com/50x50?text=Cover" alt="Cover">
          </div>
          <div class="row-info">
            <h4 class="row-title">Take Me Home</h4>
            <p class="row-artist">Phil Collins</p>
          </div>
          <div class="row-album">
            <span>No Jacket Required</span>
          </div>
          <div class="row-rating">
            <span class="stars">
              <i class="fas fa-star"></i>
            </span>
            <span>4.9</span>
          </div>
          <div class="row-actions">
            <button class="btn-row-action" title="Reproduzir">
              <i class="fas fa-play"></i>
            </button>
            <button class="btn-row-action" title="Remover">
              <i class="fas fa-trash"></i>
            </button>
          </div>
          <a href="/track/6" class="row-link"></a>
        </div>

        <!-- Track Row 3 -->
        <div class="track-row">
          <div class="row-cover">
            <img src="https://via.placeholder.com/50x50?text=Cover" alt="Cover">
          </div>
          <div class="row-info">
            <h4 class="row-title">Dreams</h4>
            <p class="row-artist">Fleetwood Mac</p>
          </div>
          <div class="row-album">
            <span>Rumours</span>
          </div>
          <div class="row-rating">
            <span class="stars">
              <i class="fas fa-star"></i>
            </span>
            <span>4.7</span>
          </div>
          <div class="row-actions">
            <button class="btn-row-action" title="Reproduzir">
              <i class="fas fa-play"></i>
            </button>
            <button class="btn-row-action" title="Remover">
              <i class="fas fa-trash"></i>
            </button>
          </div>
          <a href="/track/7" class="row-link"></a>
        </div>
      </div>
    </div>

    <!-- Pagination -->
    <div class="pagination">
      <button class="btn-pagination" disabled>
        <i class="fas fa-chevron-left"></i>
        Anterior
      </button>
      <div class="pagination-info">
        Página <strong>1</strong> de <strong>7</strong>
      </div>
      <button class="btn-pagination">
        Próxima
        <i class="fas fa-chevron-right"></i>
      </button>
    </div>
  </div>
</main>

<!-- Footer -->
<?php include 'layouts/footer.php'; ?>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // View toggle
    const viewBtns = document.querySelectorAll('.view-btn');
    const gridView = document.getElementById('gridView');
    const listView = document.getElementById('listView');

    viewBtns.forEach(btn => {
      btn.addEventListener('click', function() {
        const view = this.dataset.view;

        viewBtns.forEach(b => b.classList.remove('active'));
        this.classList.add('active');

        if (view === 'grid') {
          gridView.style.display = 'grid';
          listView.style.display = 'none';
        } else {
          gridView.style.display = 'none';
          listView.style.display = 'flex';
        }
      });
    });

    // Sort functionality
    const sortSelect = document.getElementById('sortSelect');
    if (sortSelect) {
      sortSelect.addEventListener('change', function() {
        const searchParams = new URLSearchParams(window.location.search);
        searchParams.set('sort', this.value);
        window.location.href = '/library?' + searchParams.toString();
      });
    }
  });
</script>
</body>

</html>