<?php

/**
 * TRACKFY - Search Page
 * Página de pesquisa de músicas
 */

$page = $_GET['page'] ?? 1;
$page = (int)$page;

$limit = 20;
$total_results = $results['count'] ?? 0;
$total_pages = ceil($total_results / $limit);

$prev = $page - 1;
$next = $page + 1;

$page_title = 'Pesquisar Músicas';
$page_description = 'Pesquise e descubra novas músicas no Trackfy';
$page_css = 'search.css';

// Simular parâmetro de busca
$search_query = $_GET['q'] ?? '';
$sort = $_GET['sort'] ?? 'relevance';

$results = $results ?? [];

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

          <!-- Result Card  -->

          <?php if (!empty($results['recordings'])): ?>

            <?php
            usort($results['recordings'], function ($a, $b) {
              return $b['score'] <=> $a['score'];
            }); ?>

            <?php foreach ($results['recordings'] as $track): ?>

              <?php
              $title = $track['title'] ?? 'Título desconhecido';
              $artist = $track['artist-credit'][0]['name'] ?? 'Artista desconhecido';

              $album = $track['releases'][0]['title'] ?? 'Single';
              $year = isset($track['releases'][0]['date'])
                ? substr($track['releases'][0]['date'], 0, 4)
                : '';

              $release_id = $track['releases'][0]['id'] ?? null;
              $track_id = $track['id'] ?? null;

              $cover = $release_id
                ? "https://coverartarchive.org/release/$release_id/front-250"
                : "https://via.placeholder.com/200x200?text=No+Cover";
              ?>

              <div class="result-card">
                <div class="result-image">
                  <img
                    src="<?= htmlspecialchars($cover) ?>"
                    alt="Album Cover"
                    onerror="this.src='https://via.placeholder.com/200x200?text=No+Cover'">
                  <div class="result-overlay">

                    <?php
                    $mbid = $track['id'];
                    $slug = strtolower(str_replace(' ', '-', $track['title']));
                    ?>

                    <a href="/track/<?= urlencode($track_id) ?>" class="btn-play">
                      <i class="fas fa-play"></i>
                    </a>
                  </div>
                </div>

                <div class="result-info">

                  <h3 class="result-title">
                    <?= htmlspecialchars($title) ?>
                  </h3>
                  <p class="result-artist">
                    <?= htmlspecialchars($artist) ?>
                  </p>
                  <p class="result-album">
                    <?= htmlspecialchars($album) ?>
                  </p>

                  <div class="result-meta">
                    <span class="rating">
                      <i class="fas fa-star"></i>
                      -
                    </span>
                    <?php if ($year): ?>
                      <span class="year"><?= htmlspecialchars($year) ?></span>
                    <?php endif; ?>
                  </div>

                </div>
                <a href="/track/<?= urlencode($track_id) ?>" class="result-link"></a>
              </div>

            <?php endforeach; ?>

          <?php endif; ?>

        </div>
        <!-- Pagination -->
        <div class="pagination">

          <!-- Botão anterior -->
          <?php if ($page > 1): ?>
            <a class="btn-pagination"
              href="/search?q=<?= urlencode($search_query) ?>&page=<?= $prev ?>">
              <i class="fas fa-chevron-left"></i>
              Anterior
            </a>
          <?php else: ?>
            <button class="btn-pagination" disabled>
              <i class="fas fa-chevron-left"></i>
              Anterior
            </button>
          <?php endif; ?>

          <!-- Info -->
          <div class="pagination-info">
            Página <strong><?= $page ?></strong>
            de <strong><?= $total_pages ?></strong>
          </div>

          <!-- Próxima -->
          <?php if ($page < $total_pages): ?>
            <a class="btn-pagination"
              href="/search?q=<?= urlencode($search_query) ?>&page=<?= $next ?>">
              Próxima
              <i class="fas fa-chevron-right"></i>
            </a>
          <?php else: ?>
            <button class="btn-pagination" disabled>
              Próxima
              <i class="fas fa-chevron-right"></i>
            </button>
          <?php endif; ?>

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