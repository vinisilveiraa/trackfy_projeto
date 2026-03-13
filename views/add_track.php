<?php

/**
 * TRACKFY - Add Track Page
 * Página para adicionar uma nova música ao catálogo
 */

$page_title = 'Adicionar Música';
$page_description = 'Cadastre uma nova música no Trackfy';
$page_css = 'add-track.css';

// Simular lista de álbuns disponíveis
?>
<!-- head / navbar -->
<?php include 'layouts/head.php'; ?>
<?php include 'layouts/navbar.php'; ?>

<!-- Main Content -->
<main class="main-content">
  <div class="container">
    <!-- Page Header -->
    <div class="page-header">
      <div class="header-back">
        <a href="/" class="btn-back">
          <i class="fas fa-arrow-left"></i>
          Voltar
        </a>
      </div>
      <div class="header-content">
        <h1>
          <i class="fas fa-music"></i>
          Adicionar Nova Música
        </h1>
        <p>Cadastre uma nova música ao catálogo do Trackfy</p>
      </div>
    </div>

    <!-- Form Container -->
    <div class="form-container">
      <form class="add-track-form" id="addTrackForm">
        <!-- Left Column: Cover -->
        <div class="form-column-left">
          <div class="cover-section">
            <h2>Capa da Música</h2>

            <div class="cover-preview" id="coverPreview">
              <div class="cover-placeholder">
                <i class="fas fa-music"></i>
                <span>Nenhuma capa selecionada</span>
              </div>
            </div>

            <div class="upload-area" id="uploadArea">
              <div class="upload-icon">
                <i class="fas fa-cloud-upload-alt"></i>
              </div>
              <p>Arraste a capa aqui ou clique para selecionar</p>
              <span class="upload-hint">PNG, JPG ou GIF. Máximo 10MB. Recomendado: 300x300px</span>
              <input
                type="file"
                id="coverInput"
                name="cover_url"
                accept="image/*"
                style="display: none;">
            </div>

            <button type="button" class="btn btn-ghost" id="removeCover" style="display: none;">
              <i class="fas fa-trash"></i>
              Remover Capa
            </button>
          </div>
        </div>

        <!-- Right Column: Form Fields -->
        <div class="form-column-right">
          <div class="form-section">
            <h2>Informações da Música</h2>

            <!-- Album Selection -->
            <div class="form-group">
              <label for="albumSelect">
                <i class="fas fa-compact-disc"></i>
                Álbum
              </label>
              <select id="albumSelect" name="album_id" required>
                <option value="">Selecione um álbum</option>
                <?php foreach ($albums as $album): ?>
                  <option value="<?php echo $album['id']; ?>">
                    <?php echo htmlspecialchars($album['title']); ?> - <?php echo htmlspecialchars($album['artist']); ?>
                  </option>
                <?php endforeach; ?>
              </select>
              <span class="form-hint">Álbum ao qual a música pertence</span>
            </div>

            <!-- New Album Option -->
            <div class="form-group">
              <button type="button" class="btn-link" id="createNewAlbum">
                <i class="fas fa-plus"></i>
                Criar novo álbum
              </button>
            </div>

            <!-- Title -->
            <div class="form-group">
              <label for="trackTitle">
                <i class="fas fa-heading"></i>
                Título da Música
              </label>
              <input
                type="text"
                id="trackTitle"
                name="title"
                placeholder="Digite o título da música"
                required>
              <span class="form-hint">Nome da música</span>
            </div>

            <!-- Artist -->
            <div class="form-group">
              <label for="trackArtist">
                <i class="fas fa-microphone"></i>
                Artista
              </label>
              <input
                type="text"
                id="trackArtist"
                name="artist"
                placeholder="Nome do artista ou banda"
                required>
              <span class="form-hint">Artista responsável pela música</span>
            </div>

            <!-- Release Year -->
            <div class="form-row">
              <div class="form-group">
                <label for="trackYear">
                  <i class="fas fa-calendar"></i>
                  Ano de Lançamento
                </label>
                <input
                  type="number"
                  id="trackYear"
                  name="release_year"
                  placeholder="2024"
                  min="1900"
                  max="2099"
                  required>
                <span class="form-hint">Ano de lançamento</span>
              </div>

              <!-- Duration -->
              <div class="form-group">
                <label for="trackDuration">
                  <i class="fas fa-hourglass-end"></i>
                  Duração
                </label>
                <div class="input-with-suffix">
                  <input
                    type="number"
                    id="trackDuration"
                    name="duration_seconds"
                    placeholder="180"
                    min="1"
                    required>
                  <span class="suffix">segundos</span>
                </div>
                <span class="form-hint">Duração em segundos (ex: 180 = 3:00)</span>
              </div>
            </div>

            <!-- Duration Display -->
            <div class="duration-display">
              <span class="duration-label">Duração formatada:</span>
              <span class="duration-value" id="durationDisplay">0:00</span>
            </div>

            <!-- Genre -->
            <div class="form-group">
              <label for="trackGenre">
                <i class="fas fa-music"></i>
                Gênero (Opcional)
              </label>
              <select id="trackGenre" name="genre">
                <option value="">Selecione um gênero</option>
                <option value="pop">Pop</option>
                <option value="rock">Rock</option>
                <option value="hiphop">Hip-Hop</option>
                <option value="rnb">R&B</option>
                <option value="jazz">Jazz</option>
                <option value="classical">Clássico</option>
                <option value="electronic">Eletrônico</option>
                <option value="indie">Indie</option>
                <option value="country">Country</option>
                <option value="latin">Latino</option>
                <option value="other">Outro</option>
              </select>
              <span class="form-hint">Gênero musical da música</span>
            </div>

            <!-- Features -->
            <div class="form-group">
              <label for="trackFeatures">
                <i class="fas fa-users"></i>
                Featuring (Opcional)
              </label>
              <input
                type="text"
                id="trackFeatures"
                name="features"
                placeholder="ex: Artista 1, Artista 2">
              <span class="form-hint">Outros artistas que participam da música</span>
            </div>

            <!-- Lyrics -->
            <div class="form-group">
              <label for="trackLyrics">
                <i class="fas fa-align-left"></i>
                Letra (Opcional)
              </label>
              <textarea
                id="trackLyrics"
                name="lyrics"
                placeholder="Cole a letra da música aqui..."
                rows="5"
                maxlength="5000"></textarea>
              <span class="form-hint"><span id="lyricsCount">0</span>/5000 caracteres</span>
            </div>
          </div>

          <!-- Form Actions -->
          <div class="form-actions">
            <a href="/" class="btn btn-ghost">
              <i class="fas fa-times"></i>
              Cancelar
            </a>
            <button type="submit" class="btn btn-primary btn-lg">
              <i class="fas fa-plus"></i>
              Adicionar Música
            </button>
          </div>
        </div>
      </form>

      <!-- Info Box -->
      <div class="info-box">
        <div class="info-header">
          <i class="fas fa-lightbulb"></i>
          <h3>Dica</h3>
        </div>
        <p>Preencha todos os campos obrigatórios para adicionar a música. A letra é opcional mas ajuda na busca e descoberta. Você pode editar as informações depois se necessário.</p>
      </div>
    </div>
  </div>
</main>

<!-- Footer -->
<?php include '/layouts/footer.php'; ?>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const uploadArea = document.getElementById('uploadArea');
    const coverInput = document.getElementById('coverInput');
    const coverPreview = document.getElementById('coverPreview');
    const removeCover = document.getElementById('removeCover');
    const durationInput = document.getElementById('trackDuration');
    const durationDisplay = document.getElementById('durationDisplay');
    const lyricsTextarea = document.getElementById('trackLyrics');
    const lyricsCount = document.getElementById('lyricsCount');
    const form = document.getElementById('addTrackForm');
    const createNewAlbumBtn = document.getElementById('createNewAlbum');

    // Cover upload
    uploadArea.addEventListener('click', () => coverInput.click());

    uploadArea.addEventListener('dragover', (e) => {
      e.preventDefault();
      uploadArea.classList.add('dragover');
    });

    uploadArea.addEventListener('dragleave', () => {
      uploadArea.classList.remove('dragover');
    });

    uploadArea.addEventListener('drop', (e) => {
      e.preventDefault();
      uploadArea.classList.remove('dragover');
      if (e.dataTransfer.files.length) {
        coverInput.files = e.dataTransfer.files;
        handleCoverSelect();
      }
    });

    coverInput.addEventListener('change', handleCoverSelect);

    function handleCoverSelect() {
      const file = coverInput.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
          coverPreview.innerHTML = `<img src="${e.target.result}" alt="Capa da Música">`;
          uploadArea.style.display = 'none';
          removeCover.style.display = 'block';
        };
        reader.readAsDataURL(file);
      }
    }

    removeCover.addEventListener('click', () => {
      coverInput.value = '';
      coverPreview.innerHTML = `
          <div class="cover-placeholder">
            <i class="fas fa-music"></i>
            <span>Nenhuma capa selecionada</span>
          </div>
        `;
      uploadArea.style.display = 'flex';
      removeCover.style.display = 'none';
    });

    // Duration formatter
    function formatDuration(seconds) {
      seconds = parseInt(seconds) || 0;
      const minutes = Math.floor(seconds / 60);
      const secs = seconds % 60;
      return `${minutes}:${secs.toString().padStart(2, '0')}`;
    }

    durationInput.addEventListener('input', function() {
      durationDisplay.textContent = formatDuration(this.value);
    });

    // Initialize duration display
    durationDisplay.textContent = formatDuration(durationInput.value);

    // Lyrics counter
    lyricsTextarea.addEventListener('input', function() {
      lyricsCount.textContent = this.value.length;
    });

    // Create new album button
    createNewAlbumBtn.addEventListener('click', (e) => {
      e.preventDefault();
      window.location.href = '/add_album';
    });

    // Form submission
    form.addEventListener('submit', (e) => {
      e.preventDefault();

      const formData = new FormData(form);
      const data = Object.fromEntries(formData);

      console.log('Música a ser criada:', data);

      // Simular envio
      Trackfy.showNotification('Música adicionada com sucesso!', 'success');

      // Redirecionar após 1.5s
      setTimeout(() => {
        window.location.href = '/';
      }, 1500);
    });
  });
</script>
</body>

</html>