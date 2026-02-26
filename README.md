Instructions - Assesement  for Synergy Code

<h1><strong>Project Overview <strong></h1>  

<p> This code base is aimed  at testing a canidates laravel skills, the Canidate is required to complete the assesment as efficiently as possible.

The Form has 3 fields name , email and additionl comments. Basic premis is that when the submit button  is  clicked  the record will be written to the database ,  assuming all validation criteria is met . 

Once the criteria has been met the data will be commited to the database and the user will be redirected to a succes page,  assuming nothing  goes wrong.  If Something goes wrong a error page will be displayed . 

<strong> Assumption : </strong>  it is assumed  that  this project  will  be run in a Ubunutu Linux  Environment or any  Debian  based os 

if an alternative OS  is  used  please update the   docker/php/Dockerfile to  reflect the relevant OS 

</p>

<h1><strong>Technical Details: <strong></h1>  


<p>
    Running the following data base chanes is only nesssary  if  running the apllication  using  php artisan serve and  you have a  local mysql runnig 
    Database -  Mysql  is used  for the database a database called synergicode is created ,  having a table called users
    
    +-------------------+-----------------+------+-----+---------+----------------+
    | Field             | Type            | Null | Key | Default | Extra          |
    +-------------------+-----------------+------+-----+---------+----------------+
    | id                | bigint unsigned | NO   | PRI | NULL    | auto_increment |
    | name              | varchar(255)    | NO   |     | NULL    |                |
    | email             | varchar(255)    | NO   | UNI | NULL    |                |
    | additionalcomment | varchar(255)    | YES  |     | NULL    |                |
    | created_at        | timestamp       | YES  |     | NULL    |                |
    | updated_at        | timestamp       | YES  |     | NULL    |                |
    +-------------------+-----------------+------+-----+---------+----------------+

    - mysql -u root -p
    -   CREATE DATABASE synergicode
        CHARACTER SET utf8mb4
        COLLATE utf8mb4_unicode_ci;
    
    - if you need to  create a unique  user for your database ,   you can run the Following commands

        - CREATE USER 'my_app_user'@'%' IDENTIFIED BY 'StrongPassword123!';
        -  Production Environment
            
            GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, ALTER, INDEX
            ON synergicode.*
            TO 'my_app_user'@'localhost';

            Test / Dev Environments 

            GRANT ALL PRIVILEGES ON synergicode.* TO 'my_app_user'@'localhost';

        - FLUSH PRIVILEGES;
        - SHOW GRANTS FOR 'my_app_user'@'localhost'; ( This will Show user grants)

    - Once done make sure to  update the .env file  with the  created user name  and password under the #DB  Config  section

    -  repeat the steps  above  for created a test database  (synergicode_test) and make sure to update the .env.tsesting file 

    - also make  sure that the phpunit.xml  file is also Correctly updated

        EG : 
            <env name="DB_CONNECTION" value="mysql"/>
            <env name="DB_DATABASE" value="synergicode_test"/>
            <env name="DB_USERNAME" value="root"/>
            <env name="DB_PASSWORD" value="kickstart"/>
    -run the Following  command  to  create the Database tables
     php artisan migrate

    - Login into  Mysql  to make sure the tables  have been created 
</p>
<p>

Docker -  if  you  are running the application  in the  Docker  Container the  Following needs to be run 

    -  git config --global --add safe.directory /var/www/html
    - ./start.sh  
    - navigate to http://localhost:8000  to access the Web page 
    - if you  wish to  Stop the service  run , docker compose down 
    - if you want to restart the Container run docker compose up 
    
    for more  indepth Docker Commands  you  can refer to the following 
    https://docs.docker.com/get-started/docker_cheatsheet.pdf

</p>

<p>
Architecture  - a Model-View-Controller (MVC) architectural pattern  has been  Followed,  using standard laravel blade templating  to render the  views.

Model - app/Models/User.php
View  - resources/views/user.blade.php
Controler - app/Http/Controllers/UserController.php 

Users model , The Standard Laravel  users model has been ammended  to  accomodate the new table structure . 

The Standard laravel users migration file has also been amended to take the database changes into account.

For more information About  MVC architecture Please  refer to laravel documents, 
https://laravel.com/learn/getting-started-with-laravel/what-is-mvc

</p>

<p>
Validation criteria - The following validation Criteria has been introduced in the controler 

    - The name has to be a valid String no longer than 255 Characters.
    - the Email has to be a valid  Email ,  and has to be unique  and also no longer than 255 chracters. 
    - The additional Comments has to be a valid string no longer than 255 Characters.
</p>


<h1><strong>Runnig Code :  <strong></h1>  

<p>
    - Bare basics
        - Make sure that  Mysql is up and running and that the databases  have been created 
        - make Sure  the Correct version of php is installed
        - make sure laravel and composer is installed 
        - Make Sure the Migrations  have bee run 
        - php artisan migrate
        - php artisan serve 
        - in a browser navigate to http://127.0.0.1:8000 
        
    - alternatively create a Docker Container 
    - or Vm  machine  with a configured Environment ( Apache / php / laravel / mysql)
    - this environment can also be configured  on you  local machine
    - once you  have navigated to http://127.0.0.1:8000  you can start testing 

    - Docker 
        -  git config --global --add safe.directory /var/www/html
        - ./start.sh  
        - navigate to http://localhost:8000  to access the Web page 
        - if you  wish to  Stop the service  run , docker compose down 
        - if you want to restart the Container run docker compose up 
    
</p>

<h1><strong>Additional features :  <strong></h1>  
<p>
  The only additional feature is the addition  of an Error Page, this is to cater for error Messeges begin display separately  for the confirmation messages.

  From a environment perspective I have  used Docker run the site 

  <strong> NOTE </strong>
  given the nature  of the assesment I found it unnesasary to add any additional functionality. additionally I have opted to not implement any additional javascript frameworks such as react/vue or  any other CSS frame works such as tailwind

 <p>

<h1><strong>Testing :  <strong></h1>  
- before  you  run any tests make sure that the following command has been run 
 php artisan db:seed --class=TestDataSeeder --env=testing


- run php artisan test  , this  will run the feature test ( assuming you are running in bare basics  mode as described above) ELSE  if running in docker 

docker compose exec app php artisan test
-

- complete user testing , with various test Scenarios.

