FROM ubuntu:24.04

ENV DEBIAN_FRONTEND=noninteractive

# Instalación de Apache, PHP y cliente SSH
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
        apache2 \
        php \
        libapache2-mod-php \
        openssh-client && \
    rm -rf /var/lib/apt/lists/* && \
    rm -f /var/www/html/index.html

# Archivos de la página web
COPY html/ /var/www/html/
COPY start.sh /start.sh

# Permisos del script de inicio
RUN chmod +x /start.sh

EXPOSE 80

CMD ["/start.sh"]