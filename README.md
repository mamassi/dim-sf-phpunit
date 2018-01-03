POC Symfony 3 PHPUnit
=====================

Installation
------------
    1.  $ git clone https://github.com/mamassi/dim-sf-phpunit.git
     
    2.  $ cd ../.. ../dim-sf-phpnit/
     
    3.  $ docker-compose build
         
    4.  $ docker-compose ps
     
    
              Name                         Command              State               Ports            
    -----------------------------------------------------------------------------------------------------------------------------------------
    dimsfphpunit_db_1           docker-entrypoint.sh mysqld     Up      0.0.0.0:3307->3306/tcp       
    dimsfphpunit_nginx_1        nginx                           Up      443/tcp, 0.0.0.0:8080->80/tcp
    dimsfphpunit_php_1          docker-php-entrypoint php-fpm   Up      9000/tcp                     
    dimsfphpunit_phpmyadmin_1   /run.sh phpmyadmin              Up      0.0.0.0:8181->80/tcp   
     
    5.  $ docker exec -ti dimsfphpunit_php_1 bash
     
    6.  root@6364ed1037ac:/var/www/dim-sf-phpunit#  php bin/console doctrine:schema:create --dump-sql
        
    CREATE TABLE employee (id INT AUTO_INCREMENT NOT NULL, salary DOUBLE PRECISION NOT NULL, bonus DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
     
    7.  root@6364ed1037ac:/var/www/dim-sf-phpunit#  php bin/console doctrine:schema:update --force
     
    8.  root@6364ed1037ac:/var/www/dim-sf-phpunit#  exit
     
    9.  $ docker exec -ti dimsfphpunit_mysql_1 bash
     
    10. root@8a7fb57a646b:/#  mysql -udimsfphpunit -pdimsfphpunit;
          Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.
          mysql> 
        
    11. mysql> use dimsfphpunit;
          Reading table information for completion of table and column names
          You can turn off this feature to get a quicker startup with -A
               
          Database changed
             
    12. mysql> INSERT INTO `employee` (`id`, `salary`, `bonus`) VALUES (1, 1200, 1000);
          Query OK, 1 row affected (0.01 sec)
    
Usage
-----

    $ docker exec -ti dimsfphpunit_php_1 bash 

Example 1
---------

**How to Test Code that Interacts with the Database**

    root@6364ed1037ac:/var/www/dim-sf-phpunit#  vendor/bin/phpunit src/AppBundle/Salary/SalaryCalculator/SalaryCalculatorTest.php

Example 2
---------

**How to Test Form**

    root@6364ed1037ac:/var/www/dim-sf-phpunit#  vendor/bin/phpunit tests/AppBundle/Form/EmployeeTypeTest.php

Example 3
---------

**How to Test Command**

    root@6364ed1037ac:/var/www/dim-sf-phpunit#  vendor/bin/phpunit tests/AppBundle/Command/CreateUserCommandTest.php

Example 4
---------

**How to Test Doctrine Repositories**

    root@6364ed1037ac:/var/www/dim-sf-phpunit#  vendor/bin/phpunit tests/AppBundle/Repository/EmployeeRepositoryTest.php

Example 5
---------

**How to test a controller that calls a service**

    root@6364ed1037ac:/var/www/dim-sf-phpunit#  vendor/bin/phpunit tests/AppBundle/Controller/ServiceControllerTest.php 
