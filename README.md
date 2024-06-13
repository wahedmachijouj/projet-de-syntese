1 - git clone https://github.com/wahedmachijouj/projet-de-syntese.git </br>
2 - cd \projet-cloned </br>
3 - composer install </br>
4 - cp .env.example .env </br>
5 - php artisan key:generate </br>
6 - Configure the .env File :</br>
        DB_CONNECTION=mysql</br>
        DB_HOST=127.0.0.1</br>
        DB_PORT=3306</br>
        DB_DATABASE=your_database_name</br>
        DB_USERNAME=your_database_user</br>
        DB_PASSWORD=your_database_password</br>
7 - php artisan migrate</br>
8 - php artisan serve</br>

