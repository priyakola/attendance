# **Attendance Management App** #
===========================================

Language  : *PHP* 

Framework : **Yii2 Framework** 

===========================================

Introduction 

My second project using Yii2 framework. 

This is a simple attendance management for employee/company. 

This application is built based on Yii2 Framework Simple Template. 



Application Requirements
------------------------------------------
1. PHP 5.1.0 or above
2. MySQL
3. [Composer](http://www.getcomposer.org)


Installation Instructions
------------------------------------------
1. Checkout

2. Go into this application root directory, then type the following code: `php init`
  Choose either development or production depending on your needs (choose no if prompt to overwrite).

3. Create and Configure your database in `common\config\main-local.php` then type `yii migrate`
  This migration will construct the necessary tables.



Configuration File
------------------------------------------
1. The database configuration (host, database name, user/password) is located at `config\db.php` 

2. By default, you don't need to confirm your email address after signing up. To enable this set the `'enableUnconfirmedLogin'` to `false` inside `config\web.php`


Application Functionality and Features
------------------------------------------

• User/Employee Clock-In / Clock-Out (automatically switch based on your server datetime). 

• Data is saved into database 

• User/Employee can retrieve their timesheet (exported to Excel via ``phpoffice/phpexcel`` extension).


----


Known Bugs / Unfinished Features
------------------------------------------
