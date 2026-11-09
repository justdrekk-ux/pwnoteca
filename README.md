# Pwnoteca

Pwnoteca es una plataforma de laboratorios prácticos de
ciberseguridad, diseñada para facilitar el aprendizaje
mediante máquinas vulnerables ejecutadas localmente.

## ¿Cómo funciona?

Los usuarios pueden explorar un catálogo de laboratorios,
consultar sus características y descargar los archivos
necesarios para desplegarlos mediante Docker.

Cada laboratorio está diseñado para practicar técnicas
de ciberseguridad en un entorno controlado.

## Tecnologías

- PHP, HTML y CSS
- Apache
- Docker y Docker Compose
- Linux
- Git y GitHub

## Laboratorios

| Máquina | Dificultad | Estado |
|---|---|---|
| Nexora Solutions | Intermedia | En desarrollo |
| SSH & SUID | Fácil | En pruebas |
| SQL Injection | Fácil | Planificada |

## Ejecutar la plataforma

Requisitos: Docker y Docker Compose.

```bash
cd plataforma
docker compose up -d --build
```

Acceder desde el navegador:

http://localhost:8090

## Aviso

Los laboratorios contienen vulnerabilidades intencionadas
con fines educativos.

Deben ejecutarse exclusivamente en entornos controlados.

## Proyecto

Proyecto de Administración de Sistemas Informáticos en Red
(ASIR) - IES Al-Ándalus, Almería.
