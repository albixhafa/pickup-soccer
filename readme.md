ABOUT : PICKUP SOCCER is a social network built with Laravel Framework that allows registered users to coordinate pickup games and/or join games organized by other members. By utilizing Google Maps API, members are also able to interact with others within the range of their respective location.

DEMO : https://pickupsoccer.net/

INSTALLATION GUIDE<br>

Download pickupsoccer project and run the following commands inside "pickupsoccer-master" directory :

1. Dependencies<br>
  $ sudo apt install openssl php-common php-curl php-json php-mbstring php-mysql php-xml php-zip <br>
  $ composer install <br>
  $ npm install <br>
  
2. Install .env file and generate key<br>
  $ cp .env.example .env <br>
  $ php artisan key:generate <br>
  
3. Modify .env file<br>
  DB_DATABASE=pk_soccer<br>
  DB_USERNAME=laravel<br>
  DB_PASSWORD=laravelpass<br>
  
3. Import DB file<br>
  $ sudo mysql -u root<br>
  mysql> CREATE DATABASE pk_soccer;<br>
  mysql> CREATE USER 'laravel'@'localhost' IDENTIFIED BY 'laravelpass';<br>
  mysql> GRANT ALL PRIVILEGES ON pk_soccer . * TO 'laravel'@'localhost';<br>
  mysql> use pk_soccer;<br>
  mysql> source importdb.sql;<br>
  mysql> exit;<br>
  
4. Run Application<br>
  $ php artisan serve<br>

5. Login to Application<br>
  127.0.0.1:8000<br>
  u: pickupsoccer@test.com<br>
  p: soccer12<br>
  
** NOTE - THE APPLICATION WILL REQUIRES A NEW GOOGE PLACES API KEY in :<br>
  views/item.blade.php<br>
  views/layouts/app.blade.php<br>
  views/include/jsprofile.blade.php<br>
  views/include/jspost.blade.php<br>
  views/include/jsmainpage.blade.php<br>
  views/include/jsitem.blade.php<br> 

<img src="public/images/pickupsoccer1.png">
<img src="public/images/pickupsoccer2.png">
<img src="public/images/pickupsoccer3.png">
<img src="public/images/pickupsoccer4.png">
<img src="public/images/pickupsoccer5.png">
<img src="public/images/pickupsoccer6.png">
<img src="public/images/pickupsoccer7.png">
<img src="public/images/pickupsoccer8.png">
<img src="public/images/pickupsoccer9.png">
<img src="public/images/pickupsoccer10.png">
