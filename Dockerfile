# Use a imagem oficial do PHP como base
FROM php:8.0

# Instale as dependências necessárias
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Configure o diretório de trabalho
WORKDIR /app

# Copie os arquivos do seu projeto para o contêiner
COPY . /app

# Instale as dependências do Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Execute o Composer Install para instalar as dependências do projeto
RUN composer install

# Inicie o servidor PHP embutido
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
