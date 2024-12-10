# Clinic Management System
## DAW's Final Degree Project
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-yellow?logo=javascript)
![HTML](https://img.shields.io/badge/HTML-gray?logo=html5)
![CSS](https://img.shields.io/badge/CSS-gray?logo=css3)
![PHP](https://img.shields.io/badge/PHP-gray?logo=php)
![MySQL](https://img.shields.io/badge/MySQL-gray?logo=mysql)

This proyect is a Clinic Management System, with focus on role distinction and their own functional areas.
Also, this user a built from scratch Router.

## Install project dependencies

In order to run this project, you will need to have installed the following:
1. Apache web server
2. MariaDB / MySQL

## Config and run the project.

1. You should move the whole source code of this project into the htdocs folder of Apache.
2. Config as it shoud in config.inc.php.example and rename it to config.inc.php.
3. Ensure that the RewriteCond module (Apache) is enabled.
4. Use the Database dump in BBDD/seed.sql to create the database.
5. Use the population.sql in the same directory to populate of data the database. Otherwise, it will not be able to work.
6. Go to localhost/login to login. There are four roles, Patient, Assistant, Doctor and Admin. The users and passwords are the same as the role. You can also register, but it will only be as a patient.
