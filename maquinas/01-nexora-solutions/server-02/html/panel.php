<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

require_once __DIR__ . '/config/database.php';

// Obtener todos los usuarios de la intranet
$sql = "SELECT username, password, full_name, department, role
        FROM users
        ORDER BY id";

$stmt = $pdo->query($sql);
$usuarios = $stmt->fetchAll();

// Nombres de los roles
$roles = [
    'admin' => 'Administrador',
    'sysadmin' => 'Administrador de sistemas',
    'employee' => 'Empleado',
    'support' => 'Soporte técnico'
];

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Panel interno | Nexora Solutions</title>

    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <main class="login-container">

        <section class="login-card panel-card">

            <div class="brand">
                <div class="brand-mark">N</div>

                <div>
                    <h1>NEXORA</h1>
                    <p>SOLUTIONS</p>
                </div>
            </div>

            <div class="login-heading">

                <p class="eyebrow">INTERNAL NETWORK</p>

                <h2>Panel de administración</h2>

                <p>
                    Sesión iniciada como
                    <strong>
                        <?= htmlspecialchars($_SESSION['username']) ?>
                    </strong>.
                </p>

            </div>

            <h3>Directorio de usuarios</h3>

            <p class="panel-description">
                Listado de cuentas registradas en la intranet
                corporativa de Nexora Solutions.
            </p>

            <div class="users-table-container">

                <table class="users-table">

                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Nombre</th>
                            <th>Departamento</th>
                            <th>Rol</th>
                            <th>Contraseña</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($usuarios as $usuario): ?>

                            <tr>

                                <td>
                                    <strong>
                                        <?= htmlspecialchars($usuario['username']) ?>
                                    </strong>
                                </td>

                                <td>
                                    <?= htmlspecialchars($usuario['full_name']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($usuario['department']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars(
                                        $roles[$usuario['role']] ?? $usuario['role']
                                    ) ?>
                                </td>

                                <td>
                                    <code>
                                        <?= htmlspecialchars($usuario['password']) ?>
                                    </code>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

            <div class="panel-actions">

                <a href="logout.php" class="logout-button">
                    Cerrar sesión
                </a>

            </div>

            <div class="security-notice">
                <span class="status-dot"></span>
                Panel interno de Nexora Solutions
            </div>

            <footer>
                Nexora Solutions · Sistemas internos
            </footer>

        </section>

    </main>

</body>
</html>