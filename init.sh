#!/usr/bin/env bash
apt-get update
apt-get install -y php-pgsql
# Atualiza pacotes e instala extensões necessárias
apt-get update && apt-get install -y \
    php-pgsql \
    php-pdo-pgsql \
    postgresql-client
