# alcoi

https://steinbergkarina.ikt.khk.ee/veebiarendus/alcoi/show_companies.php

Prototype database and page for showing companies. 
Steps to implement: 
-clone the project repository 
-upload the project to the server using cPanel or SFTP 
-server should have PHP and MySQL installed 
-in the server, import the database schema from the project folder 'database' (everything is easier with a UI such a cPanel but you can also use CLI) 
-the project should be hosted on a domain (currently this demo is hosted and running on VOCOs servers)

Future improvements: 
-on delete process page add nicer visuals and a “go back” button 
-adding login 
-adding different accounts with different permissions (currently we only have admin account) -add photo option which adds picture to the server 
-pages for info about users, events etc (other pages to use existing database tables) 
-insert fields should check inserted data’s type and give the user a warning if its wrong
