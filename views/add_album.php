<?php

/**
 * TRACKFY - Add Album Page
 * Página para adicionar um novo álbum ao catálogo
 */

$page_title = 'Adicionar Álbum';
$page_description = 'Cadastre um novo álbum no Trackfy';
$page_css = 'add-album.css';


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
          <i class="fas fa-compact-disc"></i>
          Adicionar Novo Álbum
        </h1>
        <p>Cadastre um novo álbum ao catálogo do Trackfy</p>
      </div>
    </div>

    <!-- Form Container -->
    <div class="form-container">
      <form class="add-album-form" id="addAlbumForm" action="/addAlbum" method="POST" enctype="multipart/form-data">

        <!-- Left Column: Cover -->
        <div class="form-column-left">
          <div class="cover-section">
            <h2>Capa do Álbum</h2>

            <div class="cover-preview" id="coverPreview">
              <div class="cover-placeholder">
                <i class="fas fa-compact-disc"></i>
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
                name="cover"
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

          <div id="Message" class="alert alert-success"
            style="display: <?= (!empty($msg_sucess[0]) || !empty($msg_sucess[1]) || !empty($msg_sucess[2])) ? 'block' : 'none' ?>">

            <i class="fas fa-exclamation-circle"></i>
            <span id="errorText">
              <?= ($msg_sucess[0] ?? '') . ($msg_sucess[1] ?? '') . ($msg_sucess[2] ?? '') ?>
            </span>
          </div>

          <div id="Message" class="alert alert-error"
            style="display: <?= (!empty($msg_error[0]) || !empty($msg_error[1]) || !empty($msg_error[2])) ? 'block' : 'none' ?>">

            <i class="fas fa-exclamation-circle"></i>
            <span id="errorText">
              <?= ($msg_error[0] ?? '') . ($msg_error[1] ?? '') . ($msg_error[2] ?? '') ?>
            </span>
          </div>


          <div class="form-section">
            <h2>Informações do Álbum</h2>

            <!-- Title -->
            <div class="form-group">
              <label for="albumTitle">
                <i class="fas fa-heading"></i>
                Título do Álbum
              </label>
              <input
                type="text"
                id="albumTitle"
                name="title"
                placeholder="Digite o título do álbum"
                required>
              <span class="form-hint">Nome do álbum</span>
            </div>

            <!-- Artist -->
            <div class="form-group">
              <label for="albumArtist">
                <i class="fas fa-microphone"></i>
                Artista
              </label>
              <input
                type="text"
                id="albumArtist"
                name="artist"
                placeholder="Nome do artista ou banda"
                required>
              <span class="form-hint">Artista ou banda responsável pelo álbum</span>
            </div>

            <!-- Release Year -->
            <div class="form-row">
              <div class="form-group">
                <label for="releaseYear">
                  <i class="fas fa-calendar"></i>
                  Ano de Lançamento
                </label>
                <input
                  type="number"
                  id="releaseYear"
                  name="release_year"
                  placeholder="2024"
                  min="1900"
                  max="2099"
                  required>
                <span class="form-hint">Ano em que o álbum foi lançado</span>
              </div>

              <!-- Total Duration -->
              <div class="form-group">
                <label for="totalDuration">
                  <i class="fas fa-hourglass-end"></i>
                  Duração Total
                </label>
                <div class="input-with-suffix">
                  <input
                    type="number"
                    id="totalDuration"
                    name="total_duration"
                    placeholder="0"
                    min="0"
                    required>
                  <span class="suffix">segundos</span>
                </div>
                <span class="form-hint">Duração total em segundos (será calculada automaticamente)</span>
              </div>
            </div>

            <!-- Additional Info
            <div class="form-group">
              <label for="albumDescription">
                <i class="fas fa-align-left"></i>
                Descrição (Opcional)
              </label>
              <textarea
                id="albumDescription"
                name="description"
                placeholder="Adicione informações sobre o álbum..."
                rows="4"
                maxlength="500"></textarea>
              <span class="form-hint"><span id="descCount">0</span>/500 caracteres</span>
            </div>

            Genre
            <div class="form-group">
              <label for="albumGenre">
                <i class="fas fa-music"></i>
                Gênero (Opcional)
              </label>
              <select id="albumGenre" name="genre">
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
              <span class="form-hint">Gênero musical principal</span>
            </div> -->
          </div>

          <!-- Form Actions -->
          <div class="form-actions">
            <a href="/" class="btn btn-ghost">
              <i class="fas fa-times"></i>
              Cancelar
            </a>
            <button type="submit" class="btn btn-primary btn-lg">
              <i class="fas fa-plus"></i>
              Criar Álbum
            </button>
          </div>
        </div>
      </form>

      <!-- Info Box -->
      <div class="info-box">
        <div class="info-header">
          <i class="fas fa-info-circle"></i>
          <h3>Dica</h3>
        </div>
        <p>Após criar o álbum, você poderá adicionar as músicas que fazem parte dele. Certifique-se de preencher todas as informações corretamente.</p>
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
    const descTextarea = document.getElementById('albumDescription');
    const descCount = document.getElementById('descCount');
    const form = document.getElementById('addAlbumForm');

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
          coverPreview.innerHTML = `<img src="${e.target.result}" alt="Capa do Álbum">`;
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
            <i class="fas fa-compact-disc"></i>
            <span>Nenhuma capa selecionada</span>
          </div>
        `;
      uploadArea.style.display = 'flex';
      removeCover.style.display = 'none';
    });

    // Description counter
    descTextarea.addEventListener('input', function() {
      descCount.textContent = this.value.length;
    });

    // Form submission
    form.addEventListener('submit', (e) => {
      e.preventDefault();

      const formData = new FormData(form);
      const data = Object.fromEntries(formData);

      console.log('Álbum a ser criado:', data);

      // Simular envio
      Trackfy.showNotification('Álbum criado com sucesso!', 'success');

      // Redirecionar após 1.5s
      setTimeout(() => {
        window.location.href = '/';
      }, 1500);
    });

    // Auto-calculate total duration if needed
    const totalDurationInput = document.getElementById('totalDuration');
    if (totalDurationInput) {
      totalDurationInput.addEventListener('change', function() {
        if (this.value === '0' || this.value === '') {
          this.value = '0';
        }
      });
    }
  });
</script>
</body>

</html>