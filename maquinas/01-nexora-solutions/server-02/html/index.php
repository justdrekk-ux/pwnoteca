<?php

session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: panel.php');
    exit;
}

require_once __DIR__ . '/config/database.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    /*
     * VULNERABILIDAD INTENCIONADA PARA EL TFG.
     */
    $sql = "SELECT id, username, role
            FROM users
            WHERE username = '$username'
            AND password = '$password'
            LIMIT 1";

    try {
        $stmt = $pdo->query($sql);
        $user = $stmt->fetch();

        if ($user) {
            session_regenerate_id(true);

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            header('Location: panel.php');
            exit;
        }

        $error = 'Usuario o contraseña incorrectos.';

    } catch (PDOException $e) {
        error_log('Error en el login del laboratorio: ' . $e->getMessage());
        $error = 'No se ha podido procesar la solicitud.';
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Acceso interno | Nexora Solutions</title>

    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <main class="login-container">
        <section class="login-card">

            <div class="brand">
                <div class="brand-mark">N</div>

                <div>
                    <h1>NEXORA</h1>
                    <p>SOLUTIONS</p>
                </div>
            </div>

            <div class="login-heading">
                <p class="eyebrow">INTERNAL NETWORK</p>

                <h2>Acceso a la intranet</h2>

                <p>
                    Identifícate con tus credenciales corporativas.
                </p>
            </div>

            <?php if ($error !== ''): ?>
                <div class="error-message">
                    <?= htmlspecialchars(
                        $error,
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="index.php">

                <label for="username">Usuario</label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Nombre de usuario"
                    autocomplete="username"
                    required
                >

                <label for="password">Contraseña</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Introduce tu contraseña"
                    autocomplete="current-password"
                    required
                >

                <button type="submit">Iniciar sesión</button>

            </form>

            <div class="security-notice">
                <span class="status-dot"></span>
                Acceso restringido a personal autorizado
            </div>

            <footer>
                Nexora Solutions · Sistemas internos
            </footer>

        </section>
    </main>

</body>
</html>