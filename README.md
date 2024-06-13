1 - git clone https://github.com/wahedmachijouj/projet-de-syntese.git </br>
2 - cd \projet-cloned
3 - composer install
4 - cp .env.example .env
5 - php artisan key:generate
6 - Configure the .env File :
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=your_database_name
        DB_USERNAME=your_database_user
        DB_PASSWORD=your_database_password
7 - php artisan migrate
8 - php artisan serve
