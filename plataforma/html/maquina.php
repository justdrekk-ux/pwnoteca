<?php

$maquinas = require __DIR__ . '/datos/maquinas.php';

$slug = $_GET['slug'] ?? '';

if (!is_string($slug) || !isset($maquinas[$slug])) {
    http_response_code(404);
    $titulo = 'Laboratorio no encontrado';
    require __DIR__ . '/includes/header.php';
    echo '<main class="container not-found"><h1>404</h1><p>No encontramos este laboratorio.</p><a href="/index.php">Volver al catálogo</a></main>';
    require __DIR__ . '/includes/footer.php';
    exit;
}

$maquina = $maquinas[$slug];

$titulo = $maquina['nombre'];

require __DIR__ . '/includes/header.php';

?>

<main class="container detail-page">

    <a href="/index.php#catalogo" class="back-link">
        ← Volver al catálogo
    </a>

    <section class="detail-header">

        <div class="card-icon detail-icon">
            &lt;/&gt;
        </div>

        <div>

            <span class="section-eyebrow">LABORATORIO DE CIBERSEGURIDAD</span>

            <h1><?= htmlspecialchars($maquina['nombre']) ?></h1>

            <div class="detail-tags">

                <span class="difficulty <?= htmlspecialchars($maquina['nivel']) ?>">
                    <?= htmlspecialchars($maquina['dificultad']) ?>
                </span>

                <span class="card-status">
                    <?= htmlspecialchars($maquina['estado']) ?>
                </span>

            </div>

        </div>

    </section>


    <section class="detail-grid">

        <div class="detail-main">

            <div class="detail-panel">

                <h2>Descripción</h2>

                <p><?= htmlspecialchars($maquina['descripcion']) ?></p>

            </div>


            <div class="detail-panel">

                <h2>Objetivo del laboratorio</h2>

                <p><?= htmlspecialchars($maquina['objetivo']) ?></p>

            </div>


            <div class="detail-panel">

                <h2>Categorías</h2>

                <div class="tags">

                    <?php foreach ($maquina['categorias'] as $categoria): ?>

                        <span class="tag">
                            <?= htmlspecialchars($categoria) ?>
                        </span>

                    <?php endforeach; ?>

                </div>

            </div>

        </div>


        <aside class="detail-sidebar">

            <div class="detail-panel">

                <h3>Información</h3>

                <div class="info-row">
                    <span>Dificultad</span>
                    <strong><?= htmlspecialchars($maquina['dificultad']) ?></strong>
                </div>

                <div class="info-row">
                    <span>Estado</span>
                    <strong><?= htmlspecialchars($maquina['estado']) ?></strong>
                </div>

                <div class="info-row">
                    <span>Tecnologías</span>
                    <strong><?= htmlspecialchars($maquina['stack']) ?></strong>
                </div>

            </div>


            <div class="download-panel">

                <h3>¿Preparado para el desafío?</h3>

                <p>
                    La descarga de este laboratorio estará disponible
                    cuando publiquemos su versión inicial.
                </p>

                <button class="button button-disabled" disabled>
                    Descarga próximamente
                </button>

            </div>

        </aside>

    </section>

</main>

<?php require __DIR__ . '/includes/footer.php'; ?>