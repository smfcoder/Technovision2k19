# Technovision2k19
A National level Paper Presentation Event Website with Student, Moderator and Admin panels
# Technovision2k19

## Preview

![alt text](http://padmasoft.padmaacademy.com/technovision2k19/home.png)

## How to run it on localhost
Frist go to localhost/phpmyadmin/ and create data base name as 'padmaiyp_techfest2k19' then import the padmaiyp_techfest.sql file in phpmyadmin.
Then go to file name as "conn.php" then insert your "Username" and "Password" of your phpmyadmin.
### File path of conn.php
-	technovision/conn.php
-	technovision/admin/conn.php
-	technovision/mod/conn.php
-	technovision/user/conn.php
-	technovision/user/accounts/conn.php

## Google login changes
For google login do changes in - technovision/user/accounts/settings.php


## Google Login Instruction
1) Go to Google API Console : https://console.developers.google.com/
2) If you have not created a project, create a project by clicking Create Project (at the top)
3) After the project is created, select the created project from the top dropdown.
4) Now click on "Credentials" tab on the left sidebar. In the next screen click on "OAuth consent screen". Fill out Application Name and Authorized domains with the domain from where you intend to run the application. If you are just testing it out on localhost, you can Authorized domains as blank. 
5) Click on the button Create Credentials. Choose OAuth client ID in the dropdown.
6) In the next page choose application type as Web application. Add a name.
7) Add a redirect url in the section Authorised redirect URIs. This url should point to the redirect url script. (gauth.php in the attached codes). You can add a localhost url if you want.
8) You can leave out Authorised JavaScript origins as blank. Click on the Create button.
9) On success you will get the App Client ID and App Secret. Save those as they will be required later.
10) Edit settings.php and add your Client ID, Client Secret and Redirect Url
11) Run index.php in the browser

For more information visit the tutorial : http://usefulangle.com/post/9/google-login-api-with-php-curl


## Hosted At


-   <http://techfest2k19.padmaacademy.com>
-   <https://gcejtechfest.gcoej.ac.in>


## Designed and Developed by Shreyas Fegade and Bhavesh Wani

