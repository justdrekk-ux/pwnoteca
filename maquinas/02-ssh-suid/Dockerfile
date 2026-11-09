FROM ubuntu:24.04

ENV DEBIAN_FRONTEND=noninteractive


RUN apt-get update && \
    apt-get install -y --no-install-recommends openssh-server && \
    rm -rf /var/lib/apt/lists/*


RUN useradd -m -s /bin/bash soporte && \
    echo 'soporte:relicense' | chpasswd


RUN mkdir -p /etc/ssh/sshd_config.d /run/sshd && \
    printf '%s\n' \
    'PermitRootLogin no' \
    'PasswordAuthentication yes' \
    'KbdInteractiveAuthentication no' \
    'AllowUsers soporte' \
    > /etc/ssh/sshd_config.d/99-pwnoteca.conf


RUN chown root:root /usr/bin/env && \
    chmod 4755 /usr/bin/env


EXPOSE 22


CMD ["/bin/sh", "-c", "ssh-keygen -A && mkdir -p /run/sshd && /usr/sbin/sshd -t && exec /usr/sbin/sshd -D -e"]
