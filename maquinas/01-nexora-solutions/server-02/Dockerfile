FROM ubuntu:24.04

ENV DEBIAN_FRONTEND=noninteractive

# Instalación de servicios y herramientas
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
        apache2 \
        php \
        libapache2-mod-php \
        php-mysql \
        mariadb-server \
        openssh-server \
        findutils && \
    rm -rf /var/lib/apt/lists/* && \
    rm -f /var/www/html/index.html

# Creación del usuario del sistema
RUN useradd -m -s /bin/bash analista && \
    echo 'analista:AnalistaLab2026!' | chpasswd

# Configuración de SSH
RUN printf 'PasswordAuthentication yes\nPermitRootLogin no\nAllowUsers analista\n' \
    > /etc/ssh/sshd_config.d/99-tfg-lab.conf

# Vulnerabilidad intencionada: binario find con permisos SUID
RUN chown root:root /usr/bin/find && \
    chmod 4755 /usr/bin/find

# Archivos de la intranet
COPY html/ /var/www/html/
COPY init/01-schema.sql /opt/nexora/init/01-schema.sql
COPY start.sh /start.sh

# Permisos
RUN chmod +x /start.sh && \
    chown -R www-data:www-data /var/www/html

# Puertos SSH y HTTP
EXPOSE 22 80

CMD ["/start.sh"]