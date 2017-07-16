POC Symfony PHPUnit
===================

Installation
------------
1 - git clone https://github.com/mamassi/dim-sf-phpunit.git

2 - cd ... ../dim-sf-phpnit/

3 - composer install

Example 1
---------

**How to Test Code that Interacts with the Database**

cd dim-sf-phpnit/

Command :
vendor/bin/phpunit src/AppBundle/Salary/SalaryCalculator/SalaryCalculatorTest.php

Example 2
---------

**How to Test Form**

cd ... ../dim-sf-phpnit/

Command :
vendor/bin/phpunit tests/AppBundle/Form/EmployeeTypeTest.php

Example 3
---------

**How to Test Command**

cd ... ../dim-sf-phpnit/

Command :
vendor/bin/phpunit tests/AppBundle/Command/CreateUserCommandTest.php

Example 4
---------

**How to Test Doctrine Repositories**

cd ... ../dim-sf-phpnit/

Command :
vendor/bin/phpunit tests/AppBundle/Repository/EmployeeRepositoryTest.php
