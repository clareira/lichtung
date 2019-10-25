# lichtung
/?

This is the repo containing all of the code currently running at clareira.org.



### SETUP
- Get a linux server (we are using Debian 10 from a reputable cloud VPS seller but you can do it at home too, or even in localhost)
- Install a lamp suite in your server. (In our case we use apache2, mariadb and php5.5)

- Setup a database your_db with a dedicated user with a table containing 2 collumns: 
```
CREATE TABLE mytable (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
your_submissions VARCHAR(10000) NOT NULL
)
```
- place lichtung.php in /var/www/html/

- change the db credentials, db name, table and column names in lichtung.php

- navigate to http://your_ip_or_domain/lichtung.php and enjoy.

most of your problems will be with permissions and apache2 settings but it's all been solved by someone in a forum somewhere, I'm sure.

### FOOTNOTES

All profits from this project go to the trash.

Be safe.
