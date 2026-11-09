<?php

return [

    'nexora' => [
        'nombre' => 'Nexora Solutions',
        'dificultad' => 'Intermedia',
        'nivel' => 'medium',
        'categorias' => ['Web', 'Linux', 'Pivoting'],
        'descripcion' => 'Investiga una infraestructura empresarial, encuentra vulnerabilidades en sus servicios y consigue acceso al sistema.',
        'objetivo' => 'Comprometer la aplicación web, conseguir acceso inicial y avanzar por la infraestructura hasta obtener privilegios elevados.',
        'estado' => 'En desarrollo',
        'stack' => 'Apache · PHP · MariaDB · SSH'
    ],

    'ssh-suid' => [
        'nombre' => 'SSH & SUID',
        'dificultad' => 'Fácil',
        'nivel' => 'easy',
        'categorias' => ['SSH', 'Fuerza bruta', 'Linux'],
        'descripcion' => 'Consigue acceso a un servidor Linux mediante SSH y encuentra una forma de escalar privilegios.',
        'objetivo' => 'Identificar credenciales débiles, acceder mediante SSH y aprovechar un binario SUID para conseguir privilegios de root.',
        'estado' => 'En desarrollo',
        'stack' => 'Ubuntu · OpenSSH · Docker'
    ],

    'sqli' => [
        'nombre' => 'SQL Injection',
        'dificultad' => 'Fácil',
        'nivel' => 'easy',
        'categorias' => ['Web', 'SQL Injection', 'Bases de datos'],
        'descripcion' => 'Analiza una aplicación web vulnerable y descubre cómo un error en las consultas SQL puede comprometer su información.',
        'objetivo' => 'Identificar y explotar una vulnerabilidad de inyección SQL.',
        'estado' => 'Planificada',
        'stack' => 'Apache · PHP · MariaDB'
    ]

];