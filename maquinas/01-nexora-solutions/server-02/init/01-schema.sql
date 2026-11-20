SET NAMES utf8mb4;

CREATE DATABASE IF NOT EXISTS nexora_intranet;

USE nexora_intranet;



CREATE USER IF NOT EXISTS 'nexora_app'@'localhost'
IDENTIFIED BY 'NexoraDB2026!';

GRANT SELECT, INSERT, UPDATE, DELETE
ON nexora_intranet.*
TO 'nexora_app'@'localhost';



CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    department VARCHAR(80) NOT NULL,
    role VARCHAR(30) NOT NULL DEFAULT 'employee',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE IF NOT EXISTS employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    department VARCHAR(80) NOT NULL,
    job_title VARCHAR(100) NOT NULL,
    email VARCHAR(120) NOT NULL UNIQUE
);



CREATE TABLE IF NOT EXISTS system_config (
    id INT AUTO_INCREMENT PRIMARY KEY,
    config_key VARCHAR(100) NOT NULL UNIQUE,
    config_value TEXT NOT NULL,
    description VARCHAR(255)
);



INSERT IGNORE INTO employees
    (id, full_name, department, job_title, email)
VALUES
    (
        1,
        'Laura Martin',
        'IT',
        'Systems Administrator',
        'laura.martin@nexora.test'
    ),
    (
        2,
        'Daniel Ruiz',
        'IT',
        'Network Technician',
        'daniel.ruiz@nexora.test'
    ),
    (
        3,
        'Marta Sanchez',
        'Human Resources',
        'HR Manager',
        'marta.sanchez@nexora.test'
    );



INSERT IGNORE INTO system_config
    (id, config_key, config_value, description)
VALUES
    (
        1,
        'intranet_version',
        '1.4.2',
        'Internal portal version'
    ),
    (
        2,
        'maintenance_host',
        'server-02',
        'Host used for internal maintenance'
    ),
    (
        3,
        'backup_policy',
        'Nightly backups',
        'Internal backup schedule'
    );



INSERT INTO users
    (id, username, password, full_name, department, role)
VALUES
    (1, 'admin', 'Nexora2026!',
     'Administrador', 'Dirección', 'admin'),

    (2, 'analista', 'AnalistaLab2026!',
     'Analista de Sistemas', 'Infraestructura', 'sysadmin'),

    (3, 'jperez', 'DemoJ2026!',
     'Javier Pérez', 'Desarrollo', 'employee'),

    (4, 'mlopez', 'DemoM2026!',
     'Marta López', 'Recursos Humanos', 'employee'),

    (5, 'agarcia', 'DemoA2026!',
     'Alberto García', 'Soporte Técnico', 'support'),

    (6, 'lmartin', 'DemoL2026!',
     'Laura Martín', 'Desarrollo', 'employee')

ON DUPLICATE KEY UPDATE
    password = VALUES(password),
    full_name = VALUES(full_name),
    department = VALUES(department),
    role = VALUES(role);

FLUSH PRIVILEGES;