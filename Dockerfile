FROM php:7.4-cli

WORKDIR /usr/src/app

COPY . .

CMD [ "php", "./api/index.php" ]