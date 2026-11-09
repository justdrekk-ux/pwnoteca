# SSH & SUID

**Pwnoteca — Laboratorio de ciberseguridad**

![Dificultad](https://img.shields.io/badge/Dificultad-Fácil-brightgreen)
![Sistema](https://img.shields.io/badge/Sistema-Ubuntu_24.04-orange)
![Docker](https://img.shields.io/badge/Docker-Requerido-blue)
![Estado](https://img.shields.io/badge/Estado-Disponible-success)

## 1. Descripción

**SSH & SUID** es un laboratorio de ciberseguridad de dificultad fácil, diseñado para introducir al usuario en la explotación de credenciales débiles y la escalada de privilegios en sistemas Linux.

El laboratorio simula un servidor Ubuntu con el servicio SSH habilitado y una configuración deliberadamente vulnerable.

El objetivo es identificar las debilidades del sistema, conseguir acceso inicial y obtener privilegios administrativos.

Este laboratorio forma parte de **Pwnoteca**, una plataforma educativa de máquinas vulnerables que permite practicar técnicas de ciberseguridad mediante entornos Docker.

---

## 2. Información del laboratorio

| Característica | Descripción |
|---|---|
| Nombre | SSH & SUID |
| Dificultad | Fácil |
| Sistema operativo | Ubuntu 24.04 |
| Servicio principal | OpenSSH |
| Puerto de acceso | 2222/TCP |
| Tecnologías | Linux, SSH, Docker |
| Categoría | Credenciales débiles, escalada de privilegios |
| Objetivo | Obtener privilegios de root |

### Conocimientos recomendados

Para completar este laboratorio se recomienda tener conocimientos básicos sobre:

- Comandos fundamentales de Linux.
- Conexiones remotas mediante SSH.
- Enumeración de usuarios y permisos.
- Conceptos básicos de seguridad informática.
- Herramientas de auditoría de contraseñas.

No es necesario tener experiencia avanzada en pentesting.

---

## 3. Objetivo

El objetivo principal consiste en comprometer un servidor Linux mediante la identificación y explotación de vulnerabilidades de seguridad.

Para completar el desafío, el usuario deberá:

1. Identificar el servicio expuesto.
2. Investigar posibles debilidades en el mecanismo de autenticación.
3. Conseguir acceso al sistema como usuario sin privilegios administrativos.
4. Examinar la configuración de seguridad y los permisos del sistema.
5. Identificar una vía de escalada de privilegios.
6. Obtener acceso como usuario `root`.

**Importante:** esta documentación no incluye las credenciales ni la solución del laboratorio.

---

## 4. Requisitos

Para ejecutar el laboratorio es necesario disponer de:

- Docker instalado.
- Docker Compose disponible.
- Un sistema compatible con contenedores Docker.
- Una terminal para ejecutar los comandos.
- Un cliente SSH.

Para comprobar que Docker está instalado correctamente:

```bash
docker --version
```

Comprobar Docker Compose:

```bash
docker compose version
```

El laboratorio se ha desarrollado utilizando contenedores basados en Ubuntu 24.04.

No es necesario instalar Ubuntu en una máquina virtual.

---

## 5. Descarga e instalación

### Paso 1. Descargar el laboratorio

Accede a Pwnoteca, busca el laboratorio **SSH & SUID** y pulsa el botón de descarga.

Se descargará el archivo:

```text
02-ssh-suid.zip
```

### Paso 2. Descomprimir el archivo

Desde la terminal:

```bash
unzip 02-ssh-suid.zip
```

Se creará la siguiente estructura:

```text
02-ssh-suid/
├── Dockerfile
└── docker-compose.yml
```

El archivo `Dockerfile` contiene las instrucciones necesarias para construir el servidor vulnerable.

El archivo `docker-compose.yml` permite desplegar y administrar el laboratorio.

### Paso 3. Acceder al directorio

```bash
cd 02-ssh-suid
```

### Paso 4. Iniciar el laboratorio

Ejecuta:

```bash
docker compose up -d --build
```

Este comando realiza las siguientes operaciones:

1. Construye la imagen Docker a partir del Dockerfile.
2. Crea el contenedor del laboratorio.
3. Configura el servicio SSH.
4. Expone el puerto definido en Docker Compose.
5. Inicia el laboratorio en segundo plano.

La primera ejecución puede tardar más porque Docker necesita descargar la imagen base e instalar los paquetes necesarios.

### Paso 5. Comprobar el estado

Ejecuta:

```bash
docker compose ps
```

El contenedor debe aparecer en ejecución.

También puedes comprobarlo mediante:

```bash
docker ps
```

---

## 6. Acceso al laboratorio

El laboratorio expone el servicio SSH mediante la siguiente dirección:

| Parámetro | Valor |
|---|---|
| Dirección IP | `127.0.0.1` |
| Puerto | `2222` |
| Protocolo | SSH |

La IP `127.0.0.1` corresponde a la propia máquina donde se ejecuta Docker.

El puerto `2222` del anfitrión está asociado al puerto SSH del contenedor.

**No se proporcionan credenciales de acceso.** Descubrirlas forma parte del desafío.

El laboratorio está diseñado para ejecutarse localmente, sin exponer el servicio vulnerable a Internet.

---

## 7. Detener y eliminar el laboratorio

Para detener y eliminar el contenedor:

```bash
docker compose down
```

Esto elimina los contenedores y las redes creadas por Compose, pero conserva las imágenes Docker.

Para volver a iniciar el laboratorio:

```bash
docker compose up -d
```

Para reconstruirlo desde cero:

```bash
docker compose down
docker compose up -d --build
```

---

## 8. Solución de problemas

### Docker no está iniciado

Si aparece un error relacionado con el demonio Docker, comprueba el estado del servicio:

```bash
sudo systemctl status docker
```

En sistemas Linux que utilizan systemd puedes iniciarlo mediante:

```bash
sudo systemctl start docker
```

### El puerto 2222 está ocupado

Si otro servicio o contenedor está utilizando el puerto `2222`, Docker no podrá iniciar correctamente el laboratorio.

Puedes comprobar qué proceso utiliza ese puerto:

```bash
sudo ss -ltnp | grep ':2222'
```

Si tienes otra instancia del laboratorio ejecutándose, detenla antes de continuar.

### El contenedor no arranca

Consulta los registros:

```bash
docker compose logs
```

Esto permite identificar errores relacionados con la construcción o ejecución del contenedor.

### No puedo conectarme mediante SSH

Comprueba que el contenedor está en ejecución:

```bash
docker compose ps
```

Recuerda que el servicio SSH utiliza el puerto `2222` en la máquina anfitriona, no el puerto predeterminado `22`.

---

## 9. Recomendaciones de seguridad

Este laboratorio contiene vulnerabilidades introducidas deliberadamente con fines educativos.

Por seguridad:

- Ejecútalo únicamente en entornos propios y controlados.
- No expongas el puerto SSH vulnerable a Internet.
- No utilices sus configuraciones inseguras en servidores de producción.
- No reutilices sus credenciales en sistemas reales.
- Detén el laboratorio cuando hayas terminado de practicar.

**Pwnoteca está destinada exclusivamente a la formación y experimentación autorizada en ciberseguridad.**

---

## 10. Walkthrough

El laboratorio dispone de una guía de resolución independiente:

`walkthrough.md`

Esta documentación explica el proceso completo para resolver la máquina.

**Recomendación:** intenta completar el desafío antes de consultar la solución.

---

## 11. Sobre Pwnoteca

Pwnoteca es un proyecto educativo desarrollado como Trabajo de Fin de Grado Superior del ciclo de **Administración de Sistemas Informáticos en Red (ASIR)**.

Su objetivo es facilitar el aprendizaje práctico de ciberseguridad mediante laboratorios vulnerables reproducibles con Docker.

Los laboratorios están orientados a estudiantes, aficionados a la seguridad informática y personas interesadas en aprender técnicas de pentesting en entornos controlados.