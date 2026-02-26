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
            ON my_app_db.*
            TO 'my_app_user'@'localhost';

            Test / Dev Environments 

            GRANT ALL PRIVILEGES ON my_app_db.* TO 'my_app_user'@'localhost';

        - FLUSH PRIVILEGES;
        - SHOW GRANTS FOR 'my_app_user'@'localhost'; ( This will Show user grants)

    - Once done make sure to  update the .env file  with the  created user name  and password under the #DB  Config  section
    -run the Following  command  to  create the Database tables
     php artisan migrate

    - Login into  Mysql  to make sure the tables  have been created 
    
    - Only unique Emails are allowed 
    
<h1><strong>Runnig Code :  <strong></h1>  

<h1><strong>Additional features :  <strong></h1>  

<h1><strong>Testing :  <strong></h1>  


