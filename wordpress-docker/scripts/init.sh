#!/bin/bash

echo "Iniciando containers..."
docker-compose up -d

echo "Aguardando inicialização dos serviços..."
sleep 30

echo "Configurando permissões..."
docker exec -it wp-rafael-base chown -R www-data:www-data /var/www/html

echo "Instalação concluída!"
echo "WordPress: http://localhost:${WORDPRESS_PORT:-8080}"
echo "PHPMyAdmin: http://localhost:${PHPMYADMIN_PORT:-8081}"