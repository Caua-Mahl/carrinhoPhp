# Imagem oficial do PHP como base
FROM php:7.4-apache

# Diretório de trabalho dentro do contêiner
WORKDIR /var/www/html

# Copie os arquivos para o diretório /var/www/html no contêiner
COPY . /var/www/html

# Instalação do cURL 
RUN apt-get update && apt-get install -y libcurl4-openssl-dev
RUN docker-php-ext-install curl

# Exponha a porta 80 para o Apache
EXPOSE 80

#1. Baixar a imagem do php, usar este comando no terminal - docker pull php:7.4
#3. Abrir com o caminho da pasta e o codigo no terminal e dar o comando para construir a imagem -> docker build -t nomedaimagem .
#4.  após isso subir o container com a imagem -> docker run -dp 8100:80 nomedaimagem
#5.  para ver se o container esta sendo executado -> docker ps para ver os que não estão sendo executados -> docker ps -a