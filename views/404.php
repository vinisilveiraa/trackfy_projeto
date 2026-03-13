<?php

/**
 * TRACKFY - Home Page
 * Página principal após login
 */

$page_title = 'Início';
$page_description = 'Descubra músicas em alta, reviews recentes e sua biblioteca pessoal';
$page_css = 'home.css';

// echo '<pre>'; print_r($_SESSION); echo '</pre>';
$delay = 3;
header("Refresh: $delay; url=./home");
?>

<style>
    .erro_container {
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .erro-content {
        width: 100%;
    }
</style>

<!-- head / navbar -->
<?php include 'layouts/head.php'; ?>
<?php include 'layouts/navbar.php'; ?>

<!-- Main Content -->
<main class="main-content">
    <div class="container erro_container">
        <div class="erro-content">
            <h1>Erro 404 - Página não encontrada</h1>
            <p>Estamos te redirecionando a home em <?= $delay ?> segundos</p>
        </div>
    </div>
</main>

<?php include 'layouts/footer.php'; ?>