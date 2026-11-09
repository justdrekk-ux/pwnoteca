<?php

$maquinas = require __DIR__ . '/datos/maquinas.php';

$titulo = 'Laboratorios de ciberseguridad';

require __DIR__ . '/includes/header.php';

?>

<main>

    <!-- HERO -->
    <section class="hero">
        <div class="container hero-content">

            <div class="hero-label">
                <span class="status-dot"></span>
                PLATAFORMA DE LABORATORIOS DE CIBERSEGURIDAD
            </div>

            <h1>
                Aprende. Explora.<br>
                <span>Compromete sistemas.</span>
            </h1>

            <p class="hero-description">
                Una biblioteca de laboratorios vulnerables diseñados
                para aprender ciberseguridad mediante la práctica.
                Descarga, despliega y resuelve tus propios desafíos.
            </p>

            <div class="hero-actions">
                <a href="#catalogo" class="button button-primary">
                    Explorar laboratorios →
                </a>

                <a href="#sobre" class="button button-secondary">
                    Conocer Pwnoteca
                </a>
            </div>

            <div class="hero-terminal">
                <span class="terminal-indicator"></span>
                <span>root@pwnoteca:~$</span>
                <span class="terminal-command">start_learning.sh</span>
                <span class="terminal-cursor">_</span>
            </div>

        </div>

        <div class="hero-decoration"></div>
    </section>


    <!-- CATÁLOGO -->
    <section class="catalog section" id="catalogo">

        <div class="container">

            <div class="section-heading">

                <div>
                    <span class="section-eyebrow">BIBLIOTECA</span>
                    <h2>Explora los laboratorios</h2>
                    <p>
                        Encuentra tu próximo desafío y pon a prueba
                        tus conocimientos.
                    </p>
                </div>

                <span class="machine-count">
                    <?= count($maquinas) ?> LABORATORIOS
                </span>

            </div>


            <div class="machine-grid">

                <?php foreach ($maquinas as $slug => $maquina): ?>

                    <article class="machine-card">

                        <div class="card-top">

                            <span class="difficulty <?= htmlspecialchars($maquina['nivel']) ?>">
                                <?= htmlspecialchars($maquina['dificultad']) ?>
                            </span>

                            <span class="card-status">
                                <?= htmlspecialchars($maquina['estado']) ?>
                            </span>

                        </div>

                        <div class="card-icon">
                            &lt;/&gt;
                        </div>

                        <h3>
                            <?= htmlspecialchars($maquina['nombre']) ?>
                        </h3>

                        <p class="card-description">
                            <?= htmlspecialchars($maquina['descripcion']) ?>
                        </p>

                        <div class="tags">

                            <?php foreach ($maquina['categorias'] as $categoria): ?>

                                <span class="tag">
                                    <?= htmlspecialchars($categoria) ?>
                                </span>

                            <?php endforeach; ?>

                        </div>

                        <a
                            href="/maquina.php?slug=<?= urlencode($slug) ?>"
                            class="card-link"
                        >
                            Ver laboratorio <span>→</span>
                        </a>

                    </article>

                <?php endforeach; ?>

            </div>

        </div>

    </section>


    <!-- SOBRE EL PROYECTO -->
    <section class="about section" id="sobre">

        <div class="container about-content">

            <span class="section-eyebrow">SOBRE PWNOTECA</span>

            <h2>La práctica es la mejor forma de aprender.</h2>

            <p>
                Pwnoteca es un proyecto orientado al aprendizaje práctico
                de la ciberseguridad. Reúne laboratorios vulnerables que
                cualquier persona puede descargar y ejecutar en su propio
                entorno mediante Docker.
            </p>

            <p>
                Cada laboratorio incluye información sobre sus objetivos,
                tecnologías, instrucciones de despliegue y documentación
                para comprender las técnicas utilizadas.
            </p>

        </div>

    </section>

</main>

<?php require __DIR__ . '/includes/footer.php'; ?>