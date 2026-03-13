<?php

/**
 * TRACKFY - Search Page
 * Página de pesquisa de músicas
 */

$page_title = 'Pesquisar Músicas';
$page_description = 'Pesquise e descubra novas músicas no Trackfy';
$page_css = 'search.css';

// Simular parâmetro de busca
$search_query = $_GET['q'] ?? '';
$sort = $_GET['sort'] ?? 'relevance';
?>

<!-- head / navbar -->
<?php include 'layouts/head.php'; ?>
<?php include 'layouts/navbar.php'; ?>


<!-- Main Content -->
<main class="main-content">
  <div class="container">
    <!-- Search Header -->
    <div class="search-header">
      <h1>Pesquisar Músicas</h1>
      <p class="search-subtitle">Encontre suas músicas, artistas e álbuns favoritos</p>
    </div>

    <!-- Search Bar -->
    <div class="search-wrapper">
      <form method="GET" action="/search" class="search-form-large">
        <div class="search-input-large">
          <i class="fas fa-search"></i>
          <input
            type="search"
            name="q"
            placeholder="Pesquisar músicas, artistas, álbuns..."
            value="<?php echo htmlspecialchars($search_query); ?>"
            autofocus>
          <?php if ($search_query): ?>
            <button type="button" class="btn-clear" id="clearSearch">
              <i class="fas fa-times"></i>
            </button>
          <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-search"></i>
          Pesquisar
        </button>
      </form>
    </div>

    <!-- Results Section -->
    <?php if ($search_query): ?>
      <div class="results-section">
        <!-- Filter & Sort -->
        <div class="results-controls">
          <div class="sort-options">
            <label for="sortSelect">Ordenar por:</label>
            <select id="sortSelect" name="sort" class="sort-select">
              <option value="relevance" <?php echo $sort === 'relevance' ? 'selected' : ''; ?>>Relevância</option>
              <option value="rating" <?php echo $sort === 'rating' ? 'selected' : ''; ?>>Melhor Avaliação</option>
              <option value="recent" <?php echo $sort === 'recent' ? 'selected' : ''; ?>>Mais Recente</option>
              <option value="trending" <?php echo $sort === 'trending' ? 'selected' : ''; ?>>Em Alta</option>
            </select>
          </div>
          <div class="results-count">
            Mostrando <strong>12</strong> resultados para "<strong><?php echo htmlspecialchars($search_query); ?></strong>"
          </div>
        </div>

        <!-- Search Results Grid -->
        <div class="results-grid">
          <!-- Result Card 1 -->
          <div class="result-card">
            <div class="result-image">
              <img src="https://via.placeholder.com/200x200?text=Album+Cover" alt="Album Cover">
              <div class="result-overlay">
                <button class="btn-play" title="Reproduzir">
                  <i class="fas fa-play"></i>
                </button>
              </div>
            </div>
            <div class="result-info">
              <h3 class="result-title">Blinding Lights</h3>
              <p class="result-artist">The Weeknd</p>
              <p class="result-album">After Hours</p>
              <div class="result-meta">
                <span class="rating">
                  <i class="fas fa-star"></i>
                  4.8
                </span>
                <span class="year">2019</span>
              </div>
            </div>
            <a href="/track/1" class="result-link"></a>
          </div>

          <!-- Result Card 2 -->
          <div class="result-card">
            <div class="result-image">
              <img src="https://via.placeholder.com/200x200?text=Album+Cover" alt="Album Cover">
              <div class="result-overlay">
                <button class="btn-play" title="Reproduzir">
                  <i class="fas fa-play"></i>
                </button>
              </div>
            </div>
            <div class="result-info">
              <h3 class="result-title">Heat Waves</h3>
              <p class="result-artist">Glass Animals</p>
              <p class="result-album">Dreamland</p>
              <div class="result-meta">
                <span class="rating">
                  <i class="fas fa-star"></i>
                  4.7
                </span>
                <span class="year">2020</span>
              </div>
            </div>
            <a href="/track/2" class="result-link"></a>
          </div>

          <!-- Result Card 3 -->
          <div class="result-card">
            <div class="result-image">
              <img src="https://via.placeholder.com/200x200?text=Album+Cover" alt="Album Cover">
              <div class="result-overlay">
                <button class="btn-play" title="Reproduzir">
                  <i class="fas fa-play"></i>
                </button>
              </div>
            </div>
            <div class="result-info">
              <h3 class="result-title">Levitating</h3>
              <p class="result-artist">Dua Lipa</p>
              <p class="result-album">Future Nostalgia</p>
              <div class="result-meta">
                <span class="rating">
                  <i class="fas fa-star"></i>
                  4.9
                </span>
                <span class="year">2020</span>
              </div>
            </div>
            <a href="/track/3" class="result-link"></a>
          </div>

          <!-- Result Card 4 -->
          <div class="result-card">
            <div class="result-image">
              <img src="https://via.placeholder.com/200x200?text=Album+Cover" alt="Album Cover">
              <div class="result-overlay">
                <button class="btn-play" title="Reproduzir">
                  <i class="fas fa-play"></i>
                </button>
              </div>
            </div>
            <div class="result-info">
              <h3 class="result-title">As It Was</h3>
              <p class="result-artist">Harry Styles</p>
              <p class="result-album">Harry's House</p>
              <div class="result-meta">
                <span class="rating">
                  <i class="fas fa-star"></i>
                  4.6
                </span>
                <span class="year">2022</span>
              </div>
            </div>
            <a href="/track/4" class="result-link"></a>
          </div>

          <!-- Result Card 5 -->
          <div class="result-card">
            <div class="result-image">
              <img src="https://via.placeholder.com/200x200?text=Album+Cover" alt="Album Cover">
              <div class="result-overlay">
                <button class="btn-play" title="Reproduzir">
                  <i class="fas fa-play"></i>
                </button>
              </div>
            </div>
            <div class="result-info">
              <h3 class="result-title">Midnight City</h3>
              <p class="result-artist">M83</p>
              <p class="result-album">Hurry Up, We're Dreaming</p>
              <div class="result-meta">
                <span class="rating">
                  <i class="fas fa-star"></i>
                  4.8
                </span>
                <span class="year">2011</span>
              </div>
            </div>
            <a href="/track/5" class="result-link"></a>
          </div>

          <!-- Result Card 6 -->
          <div class="result-card">
            <div class="result-image">
              <img src="https://via.placeholder.com/200x200?text=Album+Cover" alt="Album Cover">
              <div class="result-overlay">
                <button class="btn-play" title="Reproduzir">
                  <i class="fas fa-play"></i>
                </button>
              </div>
            </div>
            <div class="result-info">
              <h3 class="result-title">Take Me Home</h3>
              <p class="result-artist">Phil Collins</p>
              <p class="result-album">No Jacket Required</p>
              <div class="result-meta">
                <span class="rating">
                  <i class="fas fa-star"></i>
                  4.9
                </span>
                <span class="year">1985</span>
              </div>
            </div>
            <a href="/track/6" class="result-link"></a>
          </div>
        </div>

        <!-- Pagination -->
        <div class="pagination">
          <button class="btn-pagination" disabled>
            <i class="fas fa-chevron-left"></i>
            Anterior
          </button>
          <div class="pagination-info">
            Página <strong>1</strong> de <strong>5</strong>
          </div>
          <button class="btn-pagination">
            Próxima
            <i class="fas fa-chevron-right"></i>
          </button>
        </div>
      </div>
    <?php else: ?>
      <!-- Empty State -->
      <div class="empty-state">
        <div class="empty-icon">
          <i class="fas fa-search"></i>
        </div>
        <h2>Comece a pesquisar</h2>
        <p>Digite o nome de uma música, artista ou álbum para começar a explorar</p>
      </div>
    <?php endif; ?>
  </div>
</main>

<!-- Footer -->
<?php include 'layouts/footer.php'; ?>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const sortSelect = document.getElementById('sortSelect');
    const clearSearch = document.getElementById('clearSearch');

    if (sortSelect) {
      sortSelect.addEventListener('change', function() {
        const searchParams = new URLSearchParams(window.location.search);
        searchParams.set('sort', this.value);
        window.location.href = '/search?' + searchParams.toString();
      });
    }

    if (clearSearch) {
      clearSearch.addEventListener('click', function() {
        window.location.href = '/search';
      });
    }
  });
</script>
</body>

</html>