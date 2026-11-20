# Nexora Solutions

**Pwnoteca · Laboratorio de ciberseguridad**

> **Dificultad:** Intermedia  
> **Sistema base:** Ubuntu 24.04  
> **Tecnologías:** Docker Compose, Apache, PHP, MariaDB y SSH  
> **Modalidad:** Laboratorio local de dos contenedores

## Descripción

Nexora Solutions simula la infraestructura de una empresa tecnológica ficticia. El entorno incluye una **web corporativa pública** y un **servidor interno** que no publica directamente sus servicios al equipo anfitrión.

La finalidad es practicar reconocimiento, análisis de aplicaciones web, obtención de acceso inicial, exploración de redes internas y escalada de privilegios en un entorno controlado.

## Objetivo

Partiendo de la web pública de Nexora Solutions, investiga los servicios disponibles, encuentra posibles debilidades y progresa por la infraestructura hasta conseguir privilegios administrativos en el servidor interno.

Este README **no incluye contraseñas, payloads ni la solución**.

## Arquitectura

```text
Equipo anfitrión / máquina de prácticas
          |
     puerto 8080
          |
    [ web-01 ]  <- web corporativa (Apache/PHP)
          |
   red Docker interna
          |
   [ server-02 ] <- intranet, MariaDB y SSH
```

- `web-01` participa en una red de acceso y en otra interna.
- `server-02` únicamente participa en la red interna.
- El acceso público previsto para el desafío es **HTTP en el puerto 8080**.
- No hay un puerto SSH ni un puerto HTTP del servidor interno publicados directamente al anfitrión.

## Requisitos

- Docker Engine funcionando.
- Docker Compose (`docker compose`).
- Un equipo de prácticas con espacio para descargar y construir imágenes de Ubuntu.
- Herramientas de pentesting de tu elección, instaladas en un entorno propio y autorizado.

Comprobación rápida:

```bash
docker --version
docker compose version
```

## Descarga y despliegue

1. Descarga el ZIP de **Nexora Solutions** desde Pwnoteca y descomprímelo.
2. Entra en el directorio extraído; debe contener el `docker-compose.yml` junto a `web-01/` y `server-02/`.
3. Desde ese directorio, ejecuta:

```bash
docker compose up -d --build
```

> Si tu usuario no tiene permisos para usar Docker, puedes ejecutar los comandos con `sudo`. No es obligatorio pertenecer al grupo `docker`.

Verifica el estado:

```bash
docker compose ps
```

Deberían mostrarse los servicios `web-01` y `server-02` en ejecución.

### Acceder a la web

En el mismo equipo donde se ejecuta Docker, visita:

**http://127.0.0.1:8080**

Si despliegas el laboratorio en un equipo diferente al atacante, utiliza la dirección de ese equipo **solo dentro de tu red de prácticas autorizada**. Asegúrate de que el firewall y la configuración de red aíslan el laboratorio de terceros.

## Estructura de archivos

```text
01-nexora-solutions/
├── docker-compose.yml
├── README.md
├── web-01/
│   ├── Dockerfile
│   ├── start.sh
│   └── html/
│       ├── index.php
│       ├── upload/
│       ├── uploads/
│       └── ...
└── server-02/
    ├── Dockerfile
    ├── start.sh
    ├── init/
    │   └── 01-schema.sql
    └── html/
        ├── index.php
        ├── panel.php
        └── ...
```

El árbol es orientativo; puede haber más recursos HTML, CSS y PHP.

## Detener o reiniciar

Detener y eliminar los contenedores del laboratorio:

```bash
docker compose down
```

Volver a levantarlos:

```bash
docker compose up -d --build
```

**Persistencia:** en la configuración actual, el contenido de `web-01/html` está montado desde el directorio local, por lo que los archivos subidos pueden permanecer en `web-01/html/uploads/` después de detener los contenedores. Los datos de MariaDB, en cambio, no tienen un volumen persistente independiente: al eliminar el contenedor de `server-02` se pierde el estado de esa base de datos y se recrea con el script de inicialización al reconstruir/levantar el servicio.

## Problemas frecuentes

**El puerto 8080 ya está ocupado.** Comprueba si hay otro laboratorio usando ese puerto y detenlo antes de iniciar Nexora.

**La web no responde.** Comprueba el estado y los registros:

```bash
docker compose ps
docker compose logs --tail=80
```

**La intranet no abre desde el navegador del anfitrión.** Es deliberado: `server-02` no publica sus puertos al exterior de Docker.

**Una prueba dejó archivos en `uploads/`.** Recuerda que esa carpeta está montada desde tu equipo; revisa y elimina manualmente tus archivos de prueba si quieres preparar una ejecución limpia.

## Seguridad

Este laboratorio contiene vulnerabilidades deliberadas. **No lo publiques en Internet ni lo ejecutes en redes que no controles.** En el Compose actual, la publicación `8080:80` acepta conexiones en las interfaces del anfitrión; utiliza una red de prácticas y reglas de firewall adecuadas. Si solo necesitas acceso desde el mismo equipo, puedes adaptar *tu copia local* del puerto a `127.0.0.1:8080:80`.

No reutilices los ajustes vulnerables ni las credenciales ficticias de este laboratorio en sistemas reales.

## Resolución

La solución se documenta por separado en el [walkthrough de Nexora Solutions](https://github.com/justdrekk-ux/pwnoteca/blob/main/walkthroughs/01-nexora-solutions/walkthrough.md). **Contiene spoilers**: intenta resolver el laboratorio antes de consultarlo.

---

Proyecto educativo **Pwnoteca**, desarrollado para el ciclo de Administración de Sistemas Informáticos en Red (ASIR).
