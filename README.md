Instructions - Assesement  for Synergy Code

<h1><strong>Project Overview <strong></h1>  

<p> This code base is aimed  at testing a canidates laravel skills, the Canidate is required to complete the assesment as efficiently as possible.
</p>

<h1><strong>Technical Details: <strong></h1>  


<p> 
    Which ever Environment you  Choose  make sure that you  have Mysql  installed
    and  make  Sure that the chosen  user  has the appropirate rights to the DB

    Instructions  for creating  the Database ( It is assumed  that you are fimilar with Mysql and have acces to a user  with appropriate user rights , else please refur to your administrator) below

</p>


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

    - also make  sure the that the phpunit.xml  file is also Correctly update 

        EG : 
            <env name="DB_CONNECTION" value="mysql"/>
            <env name="DB_DATABASE" value="synergicode_test"/>
            <env name="DB_USERNAME" value="root"/>
            <env name="DB_PASSWORD" value="kickstart"/>
    -run the Following  command  to  create the Database tables
     php artisan migrate

    - Login into  Mysql  to make sure the tables  have been created 
    
    - Only unique Emails are allowed 


<h1><strong>Runnig Code :  <strong></h1>  


    - Make sure that  Mysql is up and running and that the databases  have been created 
    - Make Sure the Migrations  have bee run 
        - php artisan migrate

    - Runnig  on Local  machine
        - php artisan serve 
        - in a browser navigate to http://127.0.0.1:8000 
        - alternatively create a Docker Container 
        - or Vm  machine  with a configured Environment ( Apache / php / laravel / mysql)
        - this environment can also be configured  on you  local machine


<h1><strong>Additional features :  <strong></h1>  
-  The only additional feature is the addition  of an Error Page
 

<h1><strong>Testing :  <strong></h1>  
- before  you  run any tests make sure that the following command has been run 
 php artisan db:seed --class=TestDataSeeder --env=testing


- run php artisan test  , this  will run the feature test 

